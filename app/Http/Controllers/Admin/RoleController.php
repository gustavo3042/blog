<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct(){

$this->middleware('can:admin.roles.index')->only('index');
$this->middleware('can:admin.roles.create')->only('create','store');
$this->middleware('can:admin.roles.edit')->only('edit','update');
$this->middleware('can:admin.roles.destroy')->only('destroy');

     }


    public function index()
    {

      $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

$permisos = Permission::all();

        return view('admin.roles.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


$request->validate([
  'name' => 'required|string|max:125'

]);


$role = Role::create($request->all());

$role->permissions()->sync($request->permisos); // se debe poner el permisos[] del checkbox

return redirect()->route('roles.index')->with('Mensaje','El rol se creo con éxito');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
    return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permisos = Permission::all();

        return view('admin.roles.edit',compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {


      $request->validate([

'name' => 'required'

      ]);

$role->update($request->all());

$role->permissions()->sync($request->permisos);

return redirect()->route('roles.index')->with('Mensaje','El rol se actualizo con éxito');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('Mensaje','El rol se elimino con éxito');
    }
}