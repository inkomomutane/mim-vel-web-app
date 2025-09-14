<?php

namespace App\Providers;

use App\Actions\Page\GetPage;
use App\Models\TipoDeImovel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(125);
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


       // Determine if HTTPS should be enforced
        $enforceHttps = $this->app->environment(['production', 'staging'])
            && !$this->app->runningUnitTests();
 
        // Force HTTPS for all generated URLs
        URL::forceHttps($enforceHttps);
 
        // Ensure proper server variable is set
        if ($enforceHttps) {
            $this->app['request']->server->set('HTTPS', 'on');
        }
 
        // Set up global middleware for security headers
        if ($enforceHttps) {
            $this->app['router']->pushMiddlewareToGroup('web', function ($request, $next){
                $response = $next($request);
 
                return $response->withHeaders([
                    'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
                    'Content-Security-Policy' => "upgrade-insecure-requests",
                    'X-Content-Type-Options' => 'nosniff'
                ]);
            });
        }

        Paginator::useBootstrapFive();
        view()->share([
            'globals' => GetPage::run()?->getData(),
            'imovelTypes' => TipoDeImovel::all(),
        ]);

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });
        try {
            \Storage::extend('google', function ($app, $config) {
                $options = [];

                if (! empty($config['teamDriveId'] ?? null)) {
                    $options['teamDriveId'] = $config['teamDriveId'];
                }

                $client = new \Google\Client();
                $client->setClientId($config['clientId']);
                $client->setClientSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);

                $service = new \Google\Service\Drive($client);
                $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, $config['folder'] ?? '/', $options);
                $driver = new \League\Flysystem\Filesystem($adapter);

                return new \Illuminate\Filesystem\FilesystemAdapter($driver, $adapter);
            });
        } catch (\Exception $e) {
            throw $e;
        }

        Str::macro('currencyFormat', function ($amount, $currencySymbol = 'MZN ', $decimals = 2) {
            $formattedAmount = number_format($amount, $decimals);
            $formattedAmount = $currencySymbol.$formattedAmount;

            return $formattedAmount;
        });
    }
}
