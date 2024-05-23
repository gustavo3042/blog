<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

use Livewire\WithPagination; //siempre que se quiera utilizar la paginacion se debe importar esta clase

class UsersIndex extends Component
{


  use WithPagination;

  public $search;
  public $name;
  public $email;
  public $password;
  public $user_id;

  protected $paginationTheme = "bootstrap";



   public function updatingSearch(){
     $this->resetPage();
   }

    public function render(Request $request)
    {

//$buscar = $request->get('buscar');

$users = User::where('name','LIKE','%'.$this->search.'%')
              ->orWhere('email','LIKE','%'.$this->search.'%')
              ->paginate(10);

        return view('livewire.admin.users-index',compact('users'));



    }


    public function store()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email  = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();

     
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('users.index')->with('Mensaje', 'Usuario '.$user->name.' creado con éxito');
    }


    public function editar($id){

      $most = User::find($id);

      if ($most) {
          
          $this->user_id = $most->id;
          $this->name = $most->name;
          $this->email = $most->email;
          $this->password = $most->password;
         
      }
  
  }


  public function update(){

    $update = User::find($this->user_id)->update([

      'name' =>  $this->name,
      'email' =>   $this->email,
      'password' => bcrypt($this->password),

    ]);

    $this->resetInput();
    $this->dispatchBrowserEvent('close-modal');

    return redirect()->route('users.index')->with('Mensaje', 'Usuario '.$this->name.' actualizado con éxito');

  //    dd($update);

  }

  




  public function closeModal()
  {
      $this->resetInput();
  }

  public function resetInput()
  {
      $this->name = '';
      $this->email = '';
      $this->password = '';
  }


  public function delete($id){

    $borrar = User::find($id);

    $borrar->delete();

    return redirect()->route('users.index')->with('Mensaje', 'Usuario '.$this->name.' eliminado con éxito');

  }

}
