<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Foro;
use App\Models\CheckList;
use App\Models\Cliente;
use Livewire\withPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;





class ForoIndex extends Component
{

    use withPagination;

    protected $paginationTheme= "bootstrap";
  
    public $search;
  
    public function updatingSearch(){
  
  $this->resetPage();
  
    }


    public function render()
    {

       /*
        $checkl = DB::table('users')
        ->join('clientes','clientes.nombre','=','users.id')
        ->join('check_lists','check_lists.id','=','clientes.check_lists_id')
        ->where('check_lists.patente','LIKE','%'.$this->search.'%')
        ->get();

        */
        
     // dd($checkl);

    /*  $checkl = CheckList::where('user_id','=', auth()->user()->id)
        ->where('patente','LIKE','%'.$this->search.'%')
        ->latest('id')
        ->paginate(5);


*/


//        return view('livewire.admin.checkindex',compact('checkl'));

        //return view('livewire.admin.foro-index',compact('checkl'));
    }
}
