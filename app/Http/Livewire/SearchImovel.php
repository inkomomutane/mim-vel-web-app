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

    public $orderOptions;
    private $imovels;

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



    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->imovels = Imovel::with('ratings')
        ->with('tipo_de_imovel')
        ->with('condicao')
        ->with('comentarios')->paginate(15);

        // switch ($this->order) {
        //     case 1:
        //         $this->imovels = Imovel::orderBy('created_at', 'desc')->paginate(15);
        //         break;
        //     case 2:
        //         $this->imovels = Imovel::orderBy('created_at', 'asc')->paginate(15);
        //         break;
        //     case 3:
        //         $this->imovels = Imovel::withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', 'desc')->paginate(15);
        //         break;
        //     case 4:
        //         $this->imovels = Imovel::withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', 'asc')->paginate(15);
        //         break;
        //     case 5:
        //         $this->imovels = Imovel::orderBy('preco', 'desc')->paginate(15);
        //         break;

        //     case 6:
        //         $this->imovels = Imovel::orderBy('preco', 'asc')->paginate(15);
        //         break;

        //     default:
        //         $this->imovels = Imovel::paginate(15);
        //         break;
        // }


        return view('livewire.search-imovel', [
            'imovels' =>  $this->imovels,
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
