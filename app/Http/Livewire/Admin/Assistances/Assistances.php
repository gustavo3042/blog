<?php

namespace App\Http\Livewire\Admin\Assistances;

use Livewire\Component;
use App\Models\CheckList;
use App\Models\Assistance;
use DB;

class Assistances extends Component
{

   

    public function mount($id){

        $this->checkList_id = $id;

        $this->absences = DB::table('absences')->get();

        $activeCheck = CheckList::find($this->checkList_id);

        $asistance = Assistance ::where('check_lists_id', $activeCheck->id)->first();

        $this->checkWorkers = DB::select(
            DB::raw("Select

                workers.name as name,
                workers.surname,
                workers.surname2,
                workers.id as idWorkers,
                check_lists_workers.id as checklistsWorkers_id,
                assistances.inasistencia_id,
                assistances.presente

                from check_lists_workers
                join workers on check_lists_workers.workers_id = workers.id
                left join assistances on assistances.workers_id = workers.id

                where check_lists_workers.check_lists_id = ". $activeCheck->id ."

        ")
        );

       // dd($activeCheck);
       // dd($checkWorkers);

      //  dd($this->assistance_id);
    }

    public function render()
    {

        

       //dd($checkWorkers);
        return view('livewire.admin.assistances.assistances');
    }



  
}
