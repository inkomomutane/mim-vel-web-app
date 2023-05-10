<?php

namespace App\Actions\Page;

use App\Models\Page;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class PageUpdate
{
    use AsController;

    public function rules():array {
        return
        [
            'name' => 'nullable|string|max:125',
            'content'  => 'nullable|string|max:500',
            'slogan' => 'nullable|string|max:125',
            'email' => 'nullable|email',
            'location' => 'nullable|string|max:125',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'tiktok' => 'nullable|string',
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
        $page = Page::first();
        if ($page == null) {$page  = Page::create([]);}
        $page->name = $actionRequest->name;
        $page->save();
        flash()->addSuccess('Dados globais do site actualizados com sucesso.');

       } catch (\Throwable $th) {
            throw $th;
            flash()->addErro('Erro ao actualizar dados globais do site.');
       }
        return \redirect()->back();
    }
}
