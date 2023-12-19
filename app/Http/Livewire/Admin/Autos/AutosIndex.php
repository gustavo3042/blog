<?php

namespace App\Http\Livewire\Admin\Autos;

use Livewire\Component;
use App\Models\Autos;

class AutosIndex extends Component
{

    public $autos;

    public function render()
    {
        $this->autos = Autos::all();
        return view('livewire.admin.autos.autos-index',['autos'=> $this->autos ?? [],]);
    }
}
