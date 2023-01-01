<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Fileupload extends Component
{
    use WithFileUploads;

    public $file;
    public $original_filename = "";
    public $filepath = "";
    public $success = 0;
    public $isImage = false; 

    public function save(){
        // Reset value 
        $this->success = 0;
        $this->isImage = false;

        // Validate 
        $this->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,pdf|max:2048'
        ]);

        // Original file name 
        $this->original_filename = $this->file->getClientOriginalName();

        // Upload file 
        $filename = $this->file->store('files','public');

        // Check file extension 
        $extension = strtolower($this->file->extension());
        $image_exts = array('png','jpg','jpeg');
        if(in_array($extension, $image_exts)){
            $this->isImage = true;
        }

        // Success 
        $this->success = 1;

        // File path 
        $this->filepath = Storage::url($filename);
    }

    public function render()
    {
        return view('livewire.fileupload');
    }
}
