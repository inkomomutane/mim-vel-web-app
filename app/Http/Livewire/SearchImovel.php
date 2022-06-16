<?php

namespace App\Http\Livewire;

use App\Models\Bairro;
use App\Models\Condicao;
use App\Models\Imovel;
use App\Models\TipoDeImovel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchImovel extends Component
{


    use WithPagination;
    public $order;
    public $search;

    public $orderOptions;
    private $imovels;
    public $bairro;
    public $condicao;
    public $tipoDeImovel;
    public $precoMin;
    public $precoMax;
    public $forRent;
    public $forBuy;




    public function resetFilters()
    {
        $this->bairro = null;
        $this->condicao = null;
        $this->order = null;
        $this->tipoDeImovel = null;
        $this->forRent = null;
        $this->forBuy = null;
        $this->mount();
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $preco = Imovel::select(DB::raw('MAX(preco) as max_price'),DB::raw('Min(preco) as min_price'))->first();
        $this->precoMin = (int)  $preco->min_price;
        $this->precoMax = (int)  $preco->max_price;
    }

    public function render()
    {
        return view('livewire.search-imovel', [

            'imovels' => Imovel::with('ratings')
                ->with('tipo_de_imovel')
                ->with('condicao')
                ->with('media')
                ->with('comentarios')
                ->when($this->bairro, function ($query, $bairro) {
                    return $query->where('bairro_id', $bairro);
                })
                ->when($this->tipoDeImovel, function ($query, $tipoDeImovel) {
                    return $query->where('tipo_de_imovel_id', $tipoDeImovel);
                })
                ->when($this->condicao, function ($query, $condicao) {
                    return $query->where('condicao_id', $condicao);
                })
                ->when($this->precoMin, function ($query, $precoMin) {
                    return $query->where('preco', '>=', $precoMin);
                })
                ->when($this->precoMax, function ($query, $precoMax) {
                    return $query->where('preco', '<=', $precoMax);
                })
                ->when($this->forRent, function ($query) {
                    return $query->where('for_rent', '=', true);
                })
                ->when($this->forBuy, function ($query) {
                    return $query->where('for_rent', '<>', true);
                })
                ->paginate(15),
            'bairros' => Bairro::all(),
            'tipoDeImovels' => TipoDeImovel::all(),
            'condicaoDeImovels' => Condicao::all()
        ]);
    }

    public function updatedForBuy()
    {

         $this->forRent = !$this->forBuy;
    }
    public function updatedForRent()
    {
        $this->forBuy = !$this->forRent;
    }


    public function updatingOrder()
    {

        $this->resetPage();
    }
}
