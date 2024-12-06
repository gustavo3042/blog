<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryForo;

class CategoryForoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

        $this->middleware('can:admin.foroCategory.index')->only('index');
        $this->middleware('can:admin.foroCategory.create')->only('create','store');
        $this->middleware('can:admin.foroCategory.edit')->only('edit','update');
        $this->middleware('can:admin.foroCategory.destroy')->only('destroy'); 
      }

    public function index()
    {

        $foroCategory = CategoryForo::all();

        return view('admin.foroCategory.index',compact('foroCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foroCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request->all());
        

       $most =  CategoryForo::create($request->all());

       return redirect()->route('foroCategory.index')->with('Mensaje','Categoria creada con éxito');



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
    public function edit(CategoryForo $id)
    {
       // dd($id);

        return view('admin.foroCategory.edit',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CategoryForo $id)
    {

       // dd($id);
        
        $id->update($request->all());


        return redirect()->route('foroCategory.index')->with('Mensaje','Categoria actualizada con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryForo $id)
    {
        
      //  dd($id);

        

        $id->delete();

        return redirect()->route('foroCategory.index',$id)->with('Mensaje','Categoria borrada con éxito');

        

    }
}
