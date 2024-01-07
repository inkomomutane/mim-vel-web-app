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

    /**
     *
     * @throws \Throwable
     */
    public function handle(array $attribute): void
    {
        \DB::beginTransaction();
         $attribute =    Attribute::create([
             'name' => $attribute['name'],
             'description' => $attribute['description']
         ]);
                $attribute->addMedia($attribute['image'])->toMediaCollection('attributes', 'attributes');
         \DB::commit();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:attributes,name',
            'description' => 'required|string',
            'image' => 'required'
        ];
    }

    public function asController(ActionRequest $request): RedirectResponse
    {
        try {
            $this->handle($request->validated());
            flash()->addSuccess('Attributo criado com sucesso.');
        }catch (\Exception $exception) {
            flash()->addError('Erro ao criar attributo.');
        }
        return \redirect()->back();
    }
}
