<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{
    use WithFileUploads;

    public $image;

    public function mount(){

    }

    public function updated($fields){

        $this->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|nullable'
        ]);
    }

    public function uploadImage(){
        $this->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|nullable'
        ]);
    }

    public function render()
    {
        return view('livewire.upload-images');
    }
}
