<?php

namespace App\Http\Livewire\Admin;

use App\Models\CheckList;
use Livewire\Component;
use Carbon\Carbon;

class CalendarShow extends Component
{

    public $worksCar;
    public $worksCar_id;
    public $fechaInicio;
    public $fechaIntermedia;

    public function mount($id){

        $this->worksCar = CheckList::find($id);

    }

    public function render()
    {
        return view('livewire.admin.calendar-show');
    }

    public function changeStatus($id,$estado){

       //  dd($id,$estado);

       $this->worksCar_id = $id;
       $this->fechaInicio = $estado;
       $this->fechaIntermedia = $estado;

       if ($this->fechaIntermedia == 'activar') {

      
        
        $cambiarFechaIntermedio = CheckList::find($this->worksCar_id)->update([

            'fecha_intermedia' => Carbon::now()->format('Y-m-d')


        ]); 

       }

          



    }
}
