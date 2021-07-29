<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Storage;


use App\Http\Requests\PostRequest;

class PostsController extends Controller
{


  public function __construct(){

    $this->middleware('can:admin.posts.index')->only('index');
    $this->middleware('can:admin.posts.create')->only('create','store');
    $this->middleware('can:admin.posts.edit')->only('edit','update');
    $this->middleware('can:admin.posts.destroy')->only('destroy');
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = Category::pluck('name','id');


      $tags = Tag::all();


  return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

  //return  Storage::put('posts', $request->file('file'));


     $post =  Post::create($request->all());


//--------------insercion de la imagen------------------------------------------------------
     if ($request->file('file')) { //pregunta si existe una imagen

       //mover imagen a la carpeta storage si cumple la condicion if
       $url = Storage::put('posts', $request->file('file'));

       $post->image()->create([

         'url'=> $url

       ]);
     }
//______________________________________________________________________________________


Cache::flush(); //refrescar el cache



     //-------insersion del tag-------------------------------

    if ($request->tags) {


$post->tags()->attach($request->tags);

    }


    //--------------------------------------------------------------------------------------

    return redirect()->route('posts.index')->with('Mensaje','Dato creado con éxito');

    }


    public function edit(Post $post){


      $categories = Category::pluck('name','id');

$this->authorize('author',$post);


      $tags = Tag::all();

        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {


$this->authorize('author',$post);

$post->update($request->all());


//se pregunta primero en un if si hay una imagen, posteriormente se llama al metodo put y se agrega la direccion q es $request->file('file')
if ($request->file('file')) {

$url =  Storage::put('posts',$request->file('file')); //esta es la nueva imagen q acabamos de subir
//se guarda momentaneamente la nueva imagen en la variable $url

//se pregunta de nuevo dentro del mismo if, pregunta si existe en el post hay una imagen si la hay se borra y se reemplaza por una nueva
//para esto se utiliza el Storage::delete para borrar y el Storage::put para agregar la imagen como aparece arriba

if ($post->image) { //se pregunta si el post q estamos editando ya tiene una imagen asociada

  Storage::delete($post->image->url); //si el post tiene una imagen ya asociada se elimina

$post->image->update([

'url' => $url

]);


}else{

  $post->image()->create([

'url'=>$url

  ]);
}

}


//cierra if imagen


if ($request->tags) {


$post->tags()->sync($request->tags);

//metodo sync borra y despues actualiza por los datos nuevos

}


Cache::flush(); //refrescar el cache

return redirect()->route('posts.edit',$post)->with('Mensaje','El post se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

      $this->authorize('author',$post);

        $post->delete();
        
        Cache::flush(); //refrescar el cache

        return redirect()->route('posts.index')->with('Mensaje','El post fue eliminado con éxito');
    }
}
