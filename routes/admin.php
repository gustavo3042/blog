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
Route::get('admin/tags',[TagController::class, 'index'])->name('tags.index');



Route::resource('posts','App\Http\Controllers\Admin\PostsController')->except('show');
Route::get('admin/posts/index',[PostsController::class,'index'])->name('posts.index');
Route::get('posts/edit/{post}',[PostsController::class,'edit'])->name('posts.edit');
//Route::put('admin/posts/update/{post}',[PostsController::class,'update'])->name('posts.update');


Route::resource('check','App\Http\Controllers\Admin\CheckListController');
Route::get('admin/check/index',[CheckListController::class, 'index'])->name('check.index');
Route::get('admin/check/{check}',[CheckListController::class, 'edit'])->name('check.edit');
Route::get('admin/check/{check}/show',[CheckListController::class, 'show'])->name('check.show');
Route::get('admin/check/{check}/presupuesto',[CheckListController::class,'presupuesto'])->name('check.presupuesto');
Route::get('admin/check/cliente',[CheckListController::class, 'clientes'])->name('check.cliente');
Route::get('admin/check/pdf/{id}',[CheckListController::class, 'documentoPdf'])->name('check.pdf');

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
Route::get('admin/foro/index',[ForoController::class, 'index'])->name('foro.index');
Route::get('admin/foro/buscar',[ForoController::class, 'buscar'])->name('foro.buscar');
Route::get('admin/foro/consultas',[ForoController::class, 'consultas'])->name('foro.consultas');
Route::get('admin/foro/{id}/comentarAdmin',[ForoController::class, 'comentarAdmin'])->name('foro.comentarAdmin');
Route::post('admin/foro/comentCrear',[ForoController::class, 'comentCrear'])->name('foro.comentCrear');
Route::put('admin/foro/{id}/cometarEdit',[ForoController::class,'comentarEdit'])->name('foro.comentarEdit');
Route::delete('admin/foro/{id}/comentarDelete',[ForoController::class, 'comentarDelete'])->name('foro.comentarDelete');


Route::resource('foroCategory','App\Http\Controllers\Admin\CategoryForoController');
Route::get('admin/foroCategory',[CategoryForoController::class, 'index'])->name('foroCategory.index');
Route::get('admin/foroCategory/create',[CategoryForoController::class, 'create'])->name('foroCategory.create');
Route::post('admin/foroCategory/store',[CategoryForoController::class, 'store'])->name('foroCategory.store');
Route::get('admin/foroCategory/{id}/edit',[CategoryForoController::class, 'edit'])->name('foroCategory.edit');
Route::put('admin/foroCategory/{id}/update',[CategoryForoController::class, 'update'])->name('foroCategory.update');
Route::delete('admin/foroCategory/{id}',[CategoryForoController::class, 'destroy'])->name('foroCategory.delete');


Route::resource('foroPosts','App\Http\Controllers\Admin\PostForoController');
Route::get('admin/foroPosts',[PostForoController::class, 'index'])->name('foroPosts.index');
Route::get('admin/foroPosts/create',[PostForoController::class, 'create'])->name('foroPosts.create');
Route::post('admin/foroPosts/store',[PostForoController::class, 'store'])->name('foroPosts.store');
Route::get('admin/foroPosts/{postsForo}/edit',[PostForoController::class, 'edit'])->name('foroPosts.edit');
Route::put('admin/foroPosts/{postsForo}/update',[PostForoController::class, 'update'])->name('foroPosts.update');
Route::delete('admin/foroPosts/{postsForo}/delete',[PostForoController::class, 'destroy'])->name('foroPosts.destroy');




Route::resource('reparaciones','App\Http\Controllers\Admin\ReparacionesController');
Route::get('reparaciones',[ReparacionesController::class, 'index'])->name('reparar.index');



Route::resource('clientes','App\Http\Controllers\Admin\ClientesController');
Route::get('clientes',[ClientesController::class, 'index'])->name('clientes.index');



Route::resource('orden','App\Http\Controllers\Admin\OrdenController');
Route::get('admin/orden/index',[OrdenController::class,'index'])->name('orden.index');
Route::get('admin/edit/{orden}',[OrdenController::class,'edit'])->name('orden.edit');

