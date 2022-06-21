<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $author;
    public $title;
    public $price;
    public $description;
    public $ratings;
    public $quartos;
    public $area;
    public $suites;
    public $banheiros;
    public $piscinas;
    public $garagens;
    public $url;
    public  $date;
    public $comments;
    public $image;
    public $tipo;
    public $andares;
    public $ano;
    public $imovel;

    public function __construct(
        $author = "",
        $title = "",
        $price = 0,
        $description = "",
        $ratings = 0,
        $quartos = null,
        $area = null,
        $suites = null,
        $banheiros = null,
        $piscinas = null,
        $garagens = null,
        $andares = null,
        $tipo = null,
        $url = '',
        $date = null,
        $comments = 0,
        $image = "",
        $ano = null,
        $imovel = null


    ) {
        $this->author = $author;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->ratings = $ratings;
        $this->quartos = $quartos;
        $this->area = $area;
        $this->suites = $suites;
        $this->banheiros = $banheiros;
        $this->piscinas = $piscinas;
        $this->garagens = $garagens;
        $this->url = $url;
        $this->date =  is_null($date)? now() : $date;
        $this->comments = $comments;
        $this->image = $image;
        $this->tipo = $tipo;
        $this->andares = $andares;
        $this->ano = $ano;
        $this->imovel = $imovel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
