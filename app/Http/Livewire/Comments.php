<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Imovel;
use Livewire\Component;

class Comments extends Component
{

    protected $rules = [
        'comentario' => 'required|string|min:3|max:800',
        'nome' => 'required|string|min:2|max:45',
    ];


    public $comments;
    public $comentario;
    public $nome;
    public $imovel;
    public $ip;

    public function mount(Imovel $imovel)
    {
        $this->comments = $imovel->comentarios;
        $this->imovel = $imovel;
        $this->nome = "";
        $this->comentario = "";
        $this->ip = request()->userAgent();

    }


    public function render()
    {
        return view('livewire.comments');
    }

    public function updated()
    {
    }
    public function submit(){

        $validatedData = $this->validate([
            'comentario' => 'required|string|min:3|max:800',
            'nome' => 'required|string|min:2|max:45',
        ]);

        if ($validatedData) {
            try {
               $comment =  Comentario::create([
                    'nome' => $validatedData['nome'],
                    'comentario' => $validatedData['comentario'],
                    'ip' => '127.0.0.1',
                    'imovel_id' => $this->imovel->id
                ]);

                $this->comments->push($comment);
                $this->nome = "";
                $this->comentario = "";
                $this->ip = "127.0.0.1";

                session()->flash('success', 'Seu comentário foi enviado com sucesso.');
            } catch (\Throwable $th) {
                session()->flash('error', 'Ocorreu um erro ao comentar! Tente novamente.');
            }
        }
    }
}
