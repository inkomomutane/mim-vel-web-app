<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WhatsappButton extends Component
{


    public string $hrefLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $hrefLink)
    {
        $this->hrefLink = $hrefLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.whatsapp-button');
    }
}
