<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;

Route::get('',[HomeController::class, 'index'])->name('admin.home');

//ruta de las categorias
Route::resource('categorias','App\Http\Controllers\Admin\CategoryController');
Route::get('admin/categorias',[CategoryController::class,'index'])->name('categories.index');


Route::resource('tags','App\Http\Controllers\Admin\TagController');
Route::get('admin/tags',[TagController::class, 'index'])->name('tags.index');
