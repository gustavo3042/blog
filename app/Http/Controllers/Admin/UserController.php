<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role; //para hacer el crud y asignar  un rol

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function __construct(){


//constructor con el middleware para proteger las rutas de los usuarios que no tengan permisos para entrar a determinadas vistas
// y realizar determinadas acciones, en este caso se restringe el acceso a esas rutas para que no se ingrese
//de manera manual dado que se puede ingresar por la url de un navegador de manera manual a una vista y realizar acciones de editar,
//borrar o crear algo.
$this->middleware('can:admin.users.index')->only('index');

$this->middleware('can:admin.users.edit')->only('edit','update');




}


public function autocompleteSearch()
{
  return view('admin.users.autocomplete');
}


function action(Request $request)
{
    $data = $request->all();

    $query = $data['query'];

    $filter_data = User::select('name')
                    ->where('name', 'LIKE', '%'.$query.'%')
                    ->get();

    return response()->json($filter_data);
}


    public function index()
    {
      return view('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

      $roles = Role::all();

        return view('admin.users.edit',compact('user','roles'));
    }




    public function update(Request $request,User $user)
    {
        $user->roles()->sync($request->roles);


        return redirect()->route('users.edit',$user)->with('Mensaje','Rol asignado con éxito');
    }

}
