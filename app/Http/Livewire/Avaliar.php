<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class Avaliar extends Component
{


    public function render()
    {
        return view(
            'livewire.avaliar',
            [
                'stars' => [1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5]
            ]
        );
    }

    public $nome;
    public $rating;
    public $imovel_id;

    protected $rules =  [
        'nome' => 'required|string',
        'rating' => 'required|numeric|min:0|max:5',
    ];




    public function updated()
    {
    }


    public function send()
    {
        $validated = $this->validate(
            [
                'nome' => 'required|string',
                'rating' => 'required|numeric|min:0|max:5',
            ]
        );

        if ($validated) {
            try {
                Rating::create([
                    'nome' => $this->nome,
                    'rating' => $this->rating,
                    'imovel_id' => $this->imovel_id,
                    'ip' => request()->ip
                ]);
                $this->nome = "";
                $this->rating = "";
                session()->flash('success', 'Sua Avaliação foi enviada com sucesso.');
            } catch (\Throwable $th) {
                throw $th;
                session()->flash('error', 'Ocorreu um erro ao Enviar tua avaliação! Tente novamente.');
            }
        }
    }
}
