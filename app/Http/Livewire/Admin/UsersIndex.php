<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

use Livewire\WithPagination; //siempre que se quiera utilizar la paginacion se debe importar esta clase

class UsersIndex extends Component
{


  use WithPagination;

  //public $search;

  protected $paginationTheme = "bootstrap";



   public function updatingSearch(){
     $this->resetPage();
   }

    public function render(Request $request)
    {

$buscar = $request->get('buscar');

$users = User::where('name','LIKE','%'.$buscar.'%')
              ->orWhere('email','LIKE','%'.$buscar.'%')
              ->paginate(10);

        return view('livewire.admin.users-index',compact('users'));



    }
}
