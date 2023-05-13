<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostForoConsultas;
use App\Models\CategoryForo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.foroPosts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category_foro = CategoryForo::pluck('nombre','id');
        
        return view('admin.foroPosts.create',compact('category_foro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());


        $postsForo = PostForoConsultas::create($request->all());

        if ($request->file('file')) { //pregunta si existe una imagen

            //mover imagen a la carpeta storage si cumple la condicion if
            $url = Storage::put('postsForo', $request->file('file'));  //el 'posts'corresponde a la carpeta y el '$request->file('file')' es donde esta esta por el momento la imagen
          // el Storage::put se encargara de mover la imagen a determinada carpeta
            $postsForo->image()->create([
     
              'url'=> $url
     
            ]);
          }

          return redirect()->route('foroPosts.index')->with('Mensaje','Post de consulta registrado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostForoConsultas $postsForo)
    {
       // dd($id);
       $category_foro = CategoryForo::pluck('nombre','id');

        return view('admin.foroPosts.edit',compact('postsForo','category_foro'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PostForoConsultas $postsForo)
    {


       // dd($request->all());

      $postsForo->update($request->all());


        if ($request->file('file')) {

            $url =  Storage::put('postsForo',$request->file('file')); //esta es la nueva imagen q acabamos de subir
            //se guarda momentaneamente la nueva imagen en la variable $url
            
            //se pregunta de nuevo dentro del mismo if, pregunta si existe en el post hay una imagen si la hay se borra y se reemplaza por una nueva
            //para esto se utiliza el Storage::delete para borrar y el Storage::put para agregar la imagen como aparece arriba
            
            if ($postsForo->image) { //se pregunta si el post q estamos editando ya tiene una imagen asociada
            
              Storage::delete($postsForo->image->url); //si el post tiene una imagen ya asociada se elimina
            
            $postsForo->image->update([  //y crea o pone la imagen nueva
            
            'url' => $url
            
            ]);
            
            
            }else{
            
              $postsForo->image()->create([ //si no tiene una imagen asociada entonces crea la q seleccionamos actualmente
            
            'url'=>$url
            
              ]);
            }
            
            }



            return redirect()->route('foroPosts.index',$postsForo)->with('Mensaje','El post de consultas fue actulizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostForoConsultas $postsForo)
    {
        

        $postsForo->delete();


        return redirect()->route('foroPosts.index',$postsForo)->with('Mensaje','Post de consulta borrado con éxito');


    }
}
