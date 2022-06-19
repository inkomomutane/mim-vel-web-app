<?php

namespace App\Http\Livewire;

use Livewire\Component;


class PostFilter extends Component
{
    public $bairros;
    
    public function render()
    {
        return view('livewire.post-filter');
    }
}
