<?php

namespace App\Actions\Attribute;

use App\Models\Attribute;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateAttribute
{
    use AsController;

    public function asController(Attribute $attribute, ActionRequest $actionRequest): \Illuminate\Http\RedirectResponse
    {
        $validated = request()?->validate([
            'name' => ['required', Rule::unique(Attribute::class, 'name')->ignore($attribute->id, 'id')],
            'description' => 'required|string',
            'image' => 'nullable',
        ]);

        try {

            $attribute->name = $validated['name'];
            $attribute->description = $validated['description'];
            $attribute->save();
            if ($actionRequest->hasFile('image')) {
                $attribute->addMedia($actionRequest->image)->toMediaCollection('attributes', 'attributes');
            }

            flash()->addSuccess('Attributo actualizado com sucesso.');
        } catch (\Throwable $th) {
            flash()->addError('Erro na actualização do attributo.');
        }

        return \redirect()->back();
    }
}
