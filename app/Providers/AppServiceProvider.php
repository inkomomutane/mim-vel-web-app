<?php

namespace App\Providers;

use App\Models\Property;
use App\Services\CustomUserRepository;
use Auth0\Laravel\UserRepositoryContract;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, CustomUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        if ($this->app->runningInConsole()) {
            $mainPath = database_path('migrations');
            $subDirectories = glob($mainPath . '/*', GLOB_ONLYDIR);
            $paths = array_merge([$mainPath], $subDirectories);
            $this->loadMigrationsFrom($paths);
        }

        Relation::morphMap([
            'App\\Models\\Imovel' => Property::class,
        ]);
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
