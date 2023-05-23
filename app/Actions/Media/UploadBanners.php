<?php

namespace App\Actions\Media;

use App\Models\Banner;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UploadBanners
{
    use AsController;

    public function rules(): array
    {
        return [
            'images' => 'required',
            'images.*' => 'required|image|max:15360',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {
        $banner = Banner::first();

        try {

            if ($actionRequest->file('images')) {

                foreach ($actionRequest->file('images') as $key => $file) {
                    $banner->addMedia($file)
                        ->withResponsiveImages()
                        ->toMediaCollection('banners', 'banners');
                }
            }

            flash()->addSuccess('Imagens carregadas com sucesso');
        } catch (\Throwable $th) {
            flash()->addError('Erro ao carregar imagens');
        }

        return \redirect()->back();
    }
}
