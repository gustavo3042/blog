<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{


  public function __construct(){

    $this->middleware('can:admin.tags.index')->only('index');
    $this->middleware('can:admin.tags.create')->only('create','store');
    $this->middleware('can:admin.tags.edit')->only('edit','update');
    $this->middleware('can:admin.tags.destroy')->only('destroy');
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //  $tag = Tag::select('id','name','slug')->get();

    $tags= Tag::all();
        return view('Admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $colors = [

'red'=>'Color rojo',
'yellow'=>'Color amarillo',
'green'=>'Color verde',
'blue'=>'Color azul',
'indigo'=>'Color indigo',
'purple'=>'Color morado',
'pink'=>'Color rosado'

];
        return view('Admin.tags.create',compact('colors'));
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

'name'=>'required',
'slug'=>'required|unique:tags',
'color'=>'required'

]);



$tag = Tag::create($request->all());

          return redirect()->route('tags.index',compact('tag'))->with('Mensaje','Registro creado con éxito');
    }

  
    public function edit(Tag $tag)
    {

      $colors = [

    'red'=>'Color rojo',
    'yellow'=>'Color amarillo',
    'green'=>'Color verde',
    'blue'=>'Color azul',
    'indigo'=>'Color indigo',
    'purple'=>'Color morado',
    'pink'=>'Color rosado'

    ];

            return view('Admin.tags.edit',compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

      $request->validate([

      'name'=>'required',
      'slug'=>"required|unique:tags,slug,$tag->id",
      'color'=>'required'

      ]);



      $tag->update($request->all());

                return redirect()->route('tags.index',compact('tag'))->with('Mensaje','Registro actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('Mensaje','Registro borrado con éxito');
    }
}
