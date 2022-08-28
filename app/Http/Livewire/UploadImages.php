<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class UploadImages extends Component
{
    use WithFileUploads;

    public $image;
    public $stored;
    public $label;
    public $multiple;

    public function mount($stored = null,$label = 'Imagens',$multiple = true){
        $this->stored = $stored;
        $this->label = $label;
        $this->multiple = $multiple;
    }

    public function updated(){

       if ($this->multiple) {
        $this->validate([
                'image.*' => 'required|image:']);
       }else{ $this->validate(['image' => 'required|image']);}
    }

    public function render()
    {
        return view('livewire.upload-images');
    }
}
