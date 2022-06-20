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
    private $posts;
    public $bairros;
    public $condicaos;
    public $tipoDeImovels;
    public $precoMin;
    public $precoMax;
    public $forRent;
    public $forBuy;


    protected $paginationTheme = 'bootstrap';

    public function mount($posts = null)
    {

        $this->posts =  is_null($posts)? null: $posts;
        $preco = Imovel::select(DB::raw('MAX(preco) as max_price'), DB::raw('Min(preco) as min_price'))->first();
        $this->precoMin = (int)  $preco->min_price;
        $this->precoMax = (int)  $preco->max_price;
    }

    public function render()
    {
        return view('livewire.search-imovel', [
            'imovels' => Imovel::with('ratings')
                ->with('corretor')
                ->with('tipo_de_imovel')
                ->with('condicao')
                ->with('media')
                ->with('comentarios')
                ->when($this->posts, function ($query, $posts) {
                    return $query->whereIn('id',$posts->pluck('id'));
                })
                ->when($this->bairros, function ($query, $bairros) {
                    return $query->whereIn('bairro_id', $bairros);
                })
                ->when($this->tipoDeImovels, function ($query, $tipoDeImovels) {
                    return $query->whereIn('tipo_de_imovel_id', $tipoDeImovels);
                })
                ->when($this->condicaos, function ($query, $condicaos) {
                    return $query->whereIn('condicao_id', $condicaos);
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
                ->paginate(10),
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
