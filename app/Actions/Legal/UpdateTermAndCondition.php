<?php

namespace App\Actions\Legal;

use App\Data\TermAndConditionData;
use App\Models\Termo;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateTermAndCondition
{
    use AsAction;
    use AsController;

    public function handle(TermAndConditionData $term)
    {
        try {
            $termo = Termo::first();
            $termo->termos = $term->term;
            $termo->save();
            flash()->addSuccess('Termos e condiçõs actualizadas com sucesso.');

            return $termo->getData();
        } catch (\Throwable $e) {
            flash()->addError('Erro na actualização de termos e condições');

            return $termo->getData();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'termos' => 'string|nullable',
        ];
    }

    public function asController(ActionRequest $actionRequest)
    {
        $this->handle(new TermAndConditionData($actionRequest->termos));

        return redirect()->back();
    }
}
