<?php

namespace App\Http\Livewire;

use App\Models\Bairro;
use App\Models\Condicao;
use App\Models\Imovel;
use App\Models\Status;
use App\Models\TipoDeImovel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class PostFilter extends Component
{
    public $bairros;
    public $tipoDeImovels;
    public $condicaos;
    public $estados;
    public $precoMin;
    public $precoMax;


    public function mount($search = null)
    {
        $this->bairros = Bairro::all();
        $this->tipoDeImovels = TipoDeImovel::all();
        $this->condicaos = Condicao::all();
        $this->estados = Status::all();
        $preco = Imovel::select(DB::raw('MAX(preco) as max_price'), DB::raw('Min(preco) as min_price'))->first();
        $this->precoMin = (int)  $preco->min_price;
        $this->precoMax = (int)  $preco->max_price;
    }

    public function render()
    {
        return view('livewire.post-filter');
    }
}
