<?php

namespace App\Actions;

use App\Models\Imovel;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsCommand;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Vite;

class SitemapGeneratorCommand
{
    use AsCommand;

    public string $commandSignature = 'sitemap:generate';

    public function handle()
    {
        Sitemap::create(config('app.url'))
            ->add(Url::create(route('welcome'))->addImage(Vite::asset('resources/js/images/logo/logo.png')))
            ->add(Url::create(route('website.about'))->addImage(Vite::asset('resources/js/images/logo/logo.png')))
            ->add(Url::create(route('website.contact'))->addImage(Vite::asset('resources/js/images/logo/logo.png')))
            ->add(Url::create(route('website.policy'))->addImage(Vite::asset('resources/js/images/logo/logo.png')))
            ->add(Url::create(route('website.terms'))->addImage(Vite::asset('resources/js/images/logo/logo.png')))
            ->add(Imovel::all())
            ->add(Url::create(config('app.url').'/sitemap.xml'))
            ->writeToFile(public_path('sitemap.xml'));
    }

    public function asCommand(Command $command): void
    {
        try {
            $this->handle();
            $command->info('Sitemap generated successful!');
        } catch (\Throwable $th) {
            $command->error($th);
        }
    }

    public function getCommandDescription(): string
    {
        return 'Generate website sitemap.';
    }
}
