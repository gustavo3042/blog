<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\testController;


use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Livewire\Navigation2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('post.most',[testController::class,'index'])->name('posts.most');


//Route::resource('admin','App\Http\Controllers\AdminController');



Route::get('/', function()
{
  return view('welcome');
});

//Route::get('app',[Navigation2::Class,'render'])->name('navigation2');

//ruta de las categorias
//Route::resource('categorias','App\Http\Controllers\Admin\CategoryController');
//Route::get('index',[CategoryController::class,'index'])->name('categories.index');
//ruta de los tags

//Route::resource('tags','App\Http\Controllers\Admin\TagController');
//Route::get('index',[TagController::class, 'index'])->name('tags.index');


Route::resource('posts','App\Http\Controllers\Admin\PostsController');
Route::get('posts.index',[PostsController::class,'index'])->name('posts.index');
Route::get('posts.edit/{post}',[PostsController::class,'edit'])->name('posts.edit');



//codigo realizado desde cero nuevamente
Route::get('/',[PostController::class,'index'])->name('post.index');






//Route::get('category{category}',[PostController::class, 'category'])->name('category');

Route::get('posts/{post}',[PostController::class, 'show'])->name('posts.show');


Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}',[PostController::class, 'tag'])->name('posts.tag');

//Route::get('/',[PostController::class, 'index'])->name('post.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
