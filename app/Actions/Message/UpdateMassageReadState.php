<?php

namespace App\Actions\Message;

use App\Models\Agenda;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateMassageReadState
{
    use AsAction;
    use AsController;

    public function handle(Agenda $agenda,bool $isReaded)
    {
        $agenda->is_readed = $isReaded;
        $agenda->save();
        return $agenda->getData();
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_readed' => 'boolean'
        ];
    }

    public function asController(Agenda $agenda,ActionRequest $actionRequest)
    {
        return $this->handle($agenda,$actionRequest->is_readed);

    }
}
