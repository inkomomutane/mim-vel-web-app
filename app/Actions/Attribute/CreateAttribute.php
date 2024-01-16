<?php

namespace App\Actions\Attribute;

use App\Models\Attribute;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class CreateAttribute
{
    use AsAction;
    use AsController;

    public function rules(): array
    {
        return [
            'name' => 'required|unique:attributes,name',
            'description' => 'required|string',
            'image' => 'required',
        ];
    }

    public function asController(ActionRequest $request): RedirectResponse
    {
        try {
            \DB::beginTransaction();
            $attribute = Attribute::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            if ($request->hasFile('image') && count($request->image) > 0) {
                $attribute->addMedia($request->image[0])->toMediaCollection('attributes', 'attributes');
            }
            \DB::commit();
            flash()->addSuccess('Attributo criado com sucesso.');
        } catch (\Exception $exception) {
            flash()->addError('Erro ao criar attributo.');
        }

        return \redirect()->back();
    }
}
