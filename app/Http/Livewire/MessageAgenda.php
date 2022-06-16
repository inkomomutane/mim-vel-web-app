<?php

namespace App\Http\Livewire;

use App\Models\Agenda;
use Livewire\Component;

class MessageAgenda extends Component
{

    public $nome_do_cliente;
    public $mensagem;
    public $email;
    public $data_hora;
    public $contacto;
    public $corretor_id;
    public $imovel_id;

    protected $rules =  [
        'nome_do_cliente' => 'required|string',
        'mensagem' => 'required|string|max:400',
        'email' => 'required|email',
        'contacto' => 'required|string|max:20',
        'data_hora' => 'required|date',
    ];




    public function updated()
    {

    }


    public function render()
    {
        return view('livewire.message-agenda');
    }

    public function send()
    {
            $validated = $this->validate(
                [
                    'nome_do_cliente' => 'required|string',
                    'mensagem' => 'required|string|max:400',
                    'email' => 'required|email',
                    'contacto' => 'required|string|max:20',
                    'data_hora' => 'required|date',
                ]
                );

                if ($validated) {
                    try {
                        Agenda::create([
                            'nome_do_cliente' => $this->nome_do_cliente ,
                            'mensagem' => $this->mensagem,
                            'email' => $this->email ,
                            'contacto' =>  $this->contacto,
                            'data_hora' => $this->data_hora ,
                            'corretor_id' => $this->corretor_id,
                            'imovel_id' => $this->imovel_id
                        ]);
                        $this->nome_do_cliente = "";
                        $this->mensagem = "";
                        $this->email = "";
                        $this->contacto = "";
                        $this->data_hora = "";
                        session()->flash('success', 'Sua mensagem foi enviada com sucesso.');
                    } catch (\Throwable $th) {
                        throw $th;
                        session()->flash('error', 'Ocorreu um erro ao Enviar mensagem! Tente novamente.');
                    }
                }


    }
}
