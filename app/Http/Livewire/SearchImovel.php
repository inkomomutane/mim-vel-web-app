<?php

namespace App\Http\Livewire;

use App\Models\Bairro;
use App\Models\Condicao;
use App\Models\Imovel;
use App\Models\TipoDeImovel;
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


    public function mount()
    {
        $this->orderOptions = [
            ['id' => 1, 'value' => 'Ordenar por: Mais Recente'],
            ['id' => 2, 'value' => 'Ordenar por: Mais Antigo'],

            ['id' => 3, 'value' => 'Ordenar por: Mais avaliado'],
            ['id' => 4, 'value' => 'Ordenar por: Menos avaliado'],

            ['id' => 5, 'value' => 'Ordenar por: Maior Preço'],
            ['id' => 6, 'value' => 'Ordenar por: Menor Preço'],
        ];
        // $this->order =  $this->orderOptions[0]['id'];
    }


    public function resetFilters()
    {
        $this->bairro = null;
        $this->condicao = null;
        $this->order = null;
        $this->tipoDeImovel = null;
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // $this->imovels = Imovel::with('ratings')
        // ->with('tipo_de_imovel')
        // ->with('condicao')
        // ->with('comentarios')->paginate(15);
        return view('livewire.search-imovel', [

            'imovels' => Imovel::with('ratings')
            ->with('tipo_de_imovel')
            ->with('condicao')
            ->with('comentarios')
                ->when($this->bairro,function($query,$bairro){
                    return $query->where('bairro_id',$bairro);
                })
                ->when($this->tipoDeImovel,function($query,$tipoDeImovel){
                    return $query->where('tipo_de_imovel_id',$tipoDeImovel);
                })
                ->when($this->condicao,function($query,$condicao){
                    return $query->where('condicao_id',$condicao);
                })
                ->paginate(15)            ,
            'bairros' => Bairro::all(),
            'tipoDeImovels' => TipoDeImovel::all(),
            'condicaoDeImovels' => Condicao::all()
        ]);
    }

    public function updatingOrder()

    {

        $this->resetPage();
    }
}
