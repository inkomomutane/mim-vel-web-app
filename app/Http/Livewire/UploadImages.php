<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{
    use WithFileUploads;

    public $image;

    public function mount(){

    }

    public function updated(){

    $this->validate(
        [
            'image.*' => 'required|image|mimes:jpg,bmp,png,jpeg,svg|max:90288'
        ]
    );
    }

    public function render()
    {
        return view('livewire.upload-images');
    }
}
