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

Route::get('',[HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users','App\Http\Controllers\Admin\UserController')->only(['index','edit','update']);
Route::get('users',[UserController::class,'index'])->name('users.index');


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


Route::resource('reparaciones','App\Http\Controllers\Admin\ReparacionesController');
Route::get('reparaciones',[ReparacionesController::class, 'index'])->name('reparar.index');



Route::resource('clientes','App\Http\Controllers\Admin\ClientesController');
Route::get('clientes',[ClientesController::class, 'index'])->name('clientes.index');



Route::resource('orden','App\Http\Controllers\Admin\OrdenController');
Route::get('admin/orden/index',[OrdenController::class,'index'])->name('orden.index');
Route::get('admin/edit/{orden}',[OrdenController::class,'edit'])->name('orden.edit');
