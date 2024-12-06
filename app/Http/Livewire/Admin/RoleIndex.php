<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination; //siempre que se quiera utilizar la paginacion se debe importar esta clase
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleIndex extends Component
{

    use WithPagination;

  public $search;

  protected $paginationTheme = "bootstrap";



   public function updatingSearch(){
     $this->resetPage();
   }

    public function render()
    {

        $roles = Role::where('name','LIKE','%'.$this->search.'%')
            /*   ->orWhere('email','LIKE','%'.$this->search.'%') */
              ->paginate(10);

        return view('livewire.admin.role-index',compact('roles'));
    }
}
