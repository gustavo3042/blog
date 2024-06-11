<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ReparacionesController;
use App\Http\Controllers\Admin\CheckListController;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Controllers\Admin\ForoController;
use App\Http\Controllers\Admin\CategoryForoController;
use App\Http\Controllers\Admin\PostForoController;
use App\Http\Controllers\Admin\WorkersController;
use App\Http\Livewire\Admin\Workers\WorkersIndex;
use App\Http\Controllers\Admin\AsistenciaController;
use App\Http\Controllers\Admin\ProductionsController;
use App\Http\Livewire\Admin\CheckShow;
use App\Http\Livewire\Admin\CheckShowCreate;
use App\Http\Controllers\Admin\CheckShowCreateController;
use App\Http\Controllers\Admin\CheckShowEditController;
use App\Http\Livewire\Admin\CheckShowEdit;
use App\Http\Livewire\Admin\Clientes\ClientesCreate;
use App\Http\Controllers\Admin\AutosController;
use App\Http\Livewire\Admin\autos\AutosIndex;
use App\Http\Livewire\Admin\CheckCreate;
use App\Http\Livewire\Admin\Insumos\InsumosCreate;
use App\Http\Livewire\Admin\Insumos\InsumosEdit;
use App\Http\Controllers\Admin\ComprasController;
use App\Http\Controllers\Admin\VentasController;

Route::get('',[HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users','App\Http\Controllers\Admin\UserController')->only(['index','edit','update']);
Route::get('users',[UserController::class,'index'])->name('users.index');
//Route::get('users/autocomplete', [UserController::class, 'autocompleteSearch'])->name('users.autocomplete');
//Route::get('users/typeahead_autocomplete/action', [UserController::class, 'action'])->name('typeahead_autocomplete.action');


Route::resource('roles','App\Http\Controllers\Admin\RoleController');
Route::get('roles',[RoleController::class, 'index'])->name('roles.index');
//Route::get('admin/roles/{role}/edit',[RoleController::class, 'edit'])->name('roles.editar');

//ruta de las categorias
Route::resource('categorias','App\Http\Controllers\Admin\CategoryController')->except('show');
Route::get('admin/categorias',[CategoryController::class,'index'])->name('categories.index');


Route::resource('tags','App\Http\Controllers\Admin\TagController')->except('show'); //el except nos sirve para q el middleware q esta en el controlador correspondiente no valla a la ruta show q no se usa
//Route::get('admin/tags',[TagController::class, 'index'])->name('tags.index');



Route::resource('posts','App\Http\Controllers\Admin\PostsController')->except('show');
//Route::get('admin/posts/index',[PostsController::class,'index'])->name('posts.index');
//Route::get('posts/edit/{post}',[PostsController::class,'edit'])->name('posts.edit');
//Route::put('admin/posts/update/{post}',[PostsController::class,'update'])->name('posts.update');

Route::resource('insumos','App\Http\Controllers\Admin\InsumosController');
//Route::get('insumos\edit\{id}',InsumosEdit::class)->name('insumos.editInsumos');
//Route::get('admin/insumos',[])

Route::resource('compras','App\Http\Controllers\Admin\ComprasController');

Route::resource('ventas','App\Http\Controllers\Admin\VentasController');


Route::resource('check','App\Http\Controllers\Admin\CheckListController');
//Route::get('admin/check/index',[CheckListController::class, 'index'])->name('check.index');
//Route::get('admin/check/{check}',[CheckListController::class, 'edit'])->name('check.edit');
//Route::get('admin/check/{check}/show',[CheckListController::class, 'show'])->name('check.show');
Route::get('admin/check/{check}/presupuesto',[CheckListController::class,'presupuesto'])->name('check.presupuesto');
Route::get('admin/check/cliente',[CheckListController::class, 'clientes'])->name('check.cliente');
Route::get('admin/check/pdf/{id}',[CheckListController::class, 'documentoPdf'])->name('check.pdf');
Route::post('addWorkers', [CheckListController::class, 'addWorkers'])->name('addWorkers');

Route::post('admin/checkshow/change/',[CheckShow::class, 'change'])->name('change.jobs');

Route::post('admin/checkshowcreate/update/',[CheckShowCreate::class, 'update'])->name('edit.jobs');

Route::get('admin/checkshowcreate/index/{id}',[CheckShowCreateController::class,'index'])->name('check.showCreate');
Route::get('admin/checkshowedit/index/{id}',[CheckShowEditController::class,'index'])->name('check.showEdit');
Route::post('admin/check/porcentajes',[CheckShowEdit::class, 'editPorcentaje'])->name('check.porcentaje');
Route::put('admin/checkshow/{check}',[CheckShow::class,'statusFaenas'])->name('check.status');

Route::post('admin/checkCreate/',[CheckCreate::class,'storePresupuesto'])->name('check.storePresupuesto');

//------------------------------------Rutas para el autocomplete--------------------------------------------
Route::get('admin/typeahead_autocomplete/action', [CheckListController::class, 'action'])->name('check.action');
Route::get('admin/typeahead_autocomplete/marca', [CheckListController::class, 'marca'])->name('check.marca');
Route::get('admin/typeahead_autocomplete/modelo', [CheckListController::class, 'modelo'])->name('check.modelo');
Route::get('admin/typeahead_autocomplete/ano', [CheckListController::class, 'ano'])->name('check.ano');
Route::get('admin/typeahead_autocomplete/color', [CheckListController::class, 'color'])->name('check.color');
Route::get('admin/typeahead_autocomplete/cilindrada', [CheckListController::class, 'cilindros'])->name('check.cilindrada');
Route::get('admin/typeahead_autocomplete/nombre', [CheckListController::class, 'nombre'])->name('check.nombre');
Route::get('admin/typeahead_autocomplete/direccion', [CheckListController::class, 'direccion'])->name('check.direccion');
Route::get('admin/typeahead_autocomplete/telefono', [CheckListController::class, 'telefono'])->name('check.telefono');
Route::get('admin/typeahead_autocomplete/correo', [CheckListController::class, 'correo'])->name('check.correo');

//Route::get('admin/datos/{id}',[CheckListController::class, 'datos'])->name('datos');


//------------------------Fin rutas del autocomplete--------------------------------------------------------------


Route::resource('foro','App\Http\Controllers\Admin\ForoController');
//Route::get('admin/foro/index',[ForoController::class, 'index'])->name('foro.index');
Route::get('admin/foro/buscar',[ForoController::class, 'buscar'])->name('foro.buscar');
Route::get('admin/foro/consultas',[ForoController::class, 'consultas'])->name('foro.consultas');
Route::get('admin/foro/{id}/comentarAdmin',[ForoController::class, 'comentarAdmin'])->name('foro.comentarAdmin');
Route::get('admin/foro/{id}/comentarClient',[ForoController::class, 'comentarClient'])->name('foro.comentarClient');
Route::post('admin/foro/comentCrear',[ForoController::class, 'comentCrear'])->name('foro.comentCrear');
Route::put('admin/foro/{id}/cometarEdit',[ForoController::class,'comentarEdit'])->name('foro.comentarEdit');
Route::delete('admin/foro/{id}/comentarDelete',[ForoController::class, 'comentarDelete'])->name('foro.comentarDelete');
Route::get('admin/foro/{id}',[ForoController::class, 'documentoPdf'])->name('foro.pdf');


Route::resource('foroCategory','App\Http\Controllers\Admin\CategoryForoController');
//Route::get('admin/foroCategory',[CategoryForoController::class, 'index'])->name('foroCategory.index');
//Route::get('admin/foroCategory/create',[CategoryForoController::class, 'create'])->name('foroCategory.create');
//Route::post('admin/foroCategory/store',[CategoryForoController::class, 'store'])->name('foroCategory.store');
//Route::get('admin/foroCategory/{id}/edit',[CategoryForoController::class, 'edit'])->name('foroCategory.edit');
//Route::put('admin/foroCategory/{id}/update',[CategoryForoController::class, 'update'])->name('foroCategory.update');
Route::delete('admin/foroCategory/{id}',[CategoryForoController::class, 'destroy'])->name('foroCategory.delete');


Route::resource('foroPosts','App\Http\Controllers\Admin\PostForoController');
//Route::get('admin/foroPosts',[PostForoController::class, 'index'])->name('foroPosts.index');
//Route::get('admin/foroPosts/create',[PostForoController::class, 'create'])->name('foroPosts.create');
//Route::post('admin/foroPosts/store',[PostForoController::class, 'store'])->name('foroPosts.store');
//Route::get('admin/foroPosts/{postsForo}/edit',[PostForoController::class, 'edit'])->name('foroPosts.edit');
//Route::put('admin/foroPosts/{postsForo}/update',[PostForoController::class, 'update'])->name('foroPosts.update');
//Route::delete('admin/foroPosts/{postsForo}/delete',[PostForoController::class, 'destroy'])->name('foroPosts.destroy');




Route::resource('reparaciones','App\Http\Controllers\Admin\ReparacionesController');
Route::get('reparaciones',[ReparacionesController::class, 'index'])->name('reparar.index');



Route::resource('clientes','App\Http\Controllers\Admin\ClientesController');
Route::get('clientes',[ClientesController::class, 'index'])->name('clientes.index');
Route::get('clientes/create',[ClientesController::class,'create'])->name('clientes.create');



Route::resource('autos','App\Http\Controllers\Admin\AutosController');
Route::get('autos',[AutosController::class, 'index'])->name('autos.index');
Route::get('autos/create',[AutosController::class,'create'])->name('autos.create');



/* Route::resource('orden','App\Http\Controllers\Admin\OrdenController');
Route::get('admin/orden/index',[OrdenController::class,'index'])->name('orden.index');
Route::get('admin/edit/{orden}',[OrdenController::class,'edit'])->name('orden.edit'); */



Route::resource('workers','App\Http\Controllers\Admin\WorkersController');
//Route::get('admin/workers/index', [WorkersController::class, 'index'])->name('workers.index');
//Route::get('admin/workers/create', [WorkersController::class, 'create'])->name('workers.create');
//Route::post('admin/workers/store', [WorkersController::class, 'store'])->name('workers.store');
//Route::get('admin/workers/edit/{worker}', [WorkersController::class, 'edit'])->name('workers.edit');
//Route::put('admin/workers/{worker}/update', [WorkersController::class, 'update'])->name('workers.update');
Route::delete('admin/workers/{worker}/delete', [WorkersController::class, 'destroy'])->name('workers.delete');
Route::get('admin/workers/enable/{worker}', [WorkersController::class, 'enable'])->name('workers.enable');
Route::get('admin/workers/disabled/{worker}', [WorkersController::class, 'disabled'])->name('workers.disabled');


Route::resource('assistences','App\Http\Controllers\Admin\AsistenciaController');
Route::get('assistences/edit/{id}', [AsistenciaController::class, 'edit'])->name('assistance.pasar');
Route::put('assistences/update/{id}', [AsistenciaController::class, 'update'])->name('assistance.update');


Route::resource('production','App\Http\Controllers\Admin\ProductionsController');
Route::get('production/edit/{id}', [ProductionsController::class, 'produccion'])->name('productions.produccion');
Route::put('production/update/{id}', [ProductionsController::class, 'update'])->name('productions.update');