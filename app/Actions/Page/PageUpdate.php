<?php

namespace App\Actions\Page;

use App\Models\Page;
use App\Support\Enums\Pages;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class PageUpdate
{
    use AsController;

    public function rules(): array
    {
        return
        [
            'name' => 'nullable|string|max:125',
            'content' => 'nullable|string|max:500',
            'slogan' => 'nullable|string|max:125',
            'email' => 'nullable|email',
            'location' => 'nullable|string|max:125',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'contacts' => 'nullable|array',

            'homeMedia' => 'nullable',
            'homeMedia.*' => 'nullable|image|max:15360',

            'imovelsMedia' => 'nullable',
            'imovelsMedia.*' => 'nullable|image|max:15360',

            'aboutMedia' => 'nullable',
            'aboutMedia.*' => 'nullable|image|max:15360',

            'contactMedia' => 'nullable',
            'contactMedia.*' => 'nullable|image|max:15360',

            'termsMedia' => 'nullable',
            'termsMedia.*' => 'nullable|image|max:15360',

            'policyMedia' => 'nullable',
            'policyMedia.*' => 'nullable|image|max:15360',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {
        try {

            $page = Page::all()->first();

            $page->content = $actionRequest->content;
            $page->name = $actionRequest->name;
            $page->slogan = $actionRequest->slogan;
            $page->location = $actionRequest->location;
            $page->email = $actionRequest->email;
            $page->facebook = $actionRequest->facebook;
            $page->instagram = $actionRequest->instagram;
            $page->whatsapp = $actionRequest->whatsapp;
            $page->save();

            if ($actionRequest->file('homeMedia')) {

                foreach ($actionRequest->file('homeMedia') as $file) {
                    $page->addMedia($file)->toMediaCollection(Pages::HOME, 'pages');
                }

            }

            if ($actionRequest->file('imovelsMedia')) {

                foreach ($actionRequest->file('imovelsMedia') as $file) {
                    $page->addMedia($file)
                        ->toMediaCollection(Pages::IMOVELS, 'pages');
                }

            }

            if ($actionRequest->file('aboutMedia')) {

                foreach ($actionRequest->file('aboutMedia') as $file) {
                    $page->addMedia($file)
                        ->toMediaCollection(Pages::ABOUT, 'pages');
                }

            }

            if ($actionRequest->file('contactMedia')) {

                foreach ($actionRequest->file('contactMedia') as $file) {
                    $page->addMedia($file)
                        ->toMediaCollection(Pages::CONTACT, 'pages');
                }

            }

            if ($actionRequest->file('termsMedia')) {

                foreach ($actionRequest->file('termsMedia') as $file) {
                    $page->addMedia($file)
                        ->toMediaCollection(Pages::TERMS, 'pages');
                }

            }

            if ($actionRequest->file('policyMedia')) {

                foreach ($actionRequest->file('policyMedia') as $file) {
                    $page->addMedia($file)
                        ->toMediaCollection(Pages::POLICY, 'pages');
                }

            }

            flash()->addSuccess('Dados globais do site actualizados com sucesso.');

        } catch (\Throwable $th) {
            throw $th;
            flash()->addErro('Erro ao actualizar dados globais do site.');
        }

         return to_route('mimovel');
    }
}
