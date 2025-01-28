<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ForoDocument extends Component
{

    public $docs;

    public function mount($id){

       // dd($id);

        $this->docs = DB::table('image_files')->where('imageable_id',$id)->get(); 
       // dd($this->docs);
    }


    public function render()
    {
        return view('livewire.admin.foro-document');
    }
}
