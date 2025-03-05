<?php

namespace App\Http\Livewire\Admin;

use App\Models\CheckList;
use Livewire\Component;

class CalendarShow extends Component
{

    public $worksCar;

    public function mount($id){

        $this->worksCar = CheckList::find($id);

    //dd($id);
      /*   dd('hola desde el componente livewire'); */
        

    }

    public function render()
    {
        return view('livewire.admin.calendar-show');
    }
}
