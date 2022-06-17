<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{
    use WithFileUploads;

    public $image;
    public $stored;

    public function mount($stored = null){
        $this->stored = $stored;
    }

    public function updated(){

    $this->validate(
        [
            'image.*' => 'required|image:'
        ]
    );
    }

    public function render()
    {
        return view('livewire.upload-images');
    }
}
