<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $categories = Category::all();
        return view('categorias.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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

        'name' => 'required',
        'slug' => 'required|unique:categories'

      ]);


    $category =  Category::create($request->all());

        return redirect()->route('categorias.index')->with('Mensaje','Registro realizado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
      return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Category $categoria)
    {

        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $categoria)
    {
      $request->validate([

        'name' => 'required',
        'slug' => "required|unique:categories,slug,$categoria->id"

      ]);

      $categoria->update($request->all());

      return redirect()->route('categorias.index',$categoria)->with('Mensaje','Campo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
    // otra forma de hacerlo pero no redirecciona bn  $dato= Category::findOrFail($categoria->id);
      //Category::destroy($categoria->id);

$categoria->delete();


      return redirect()->route('categorias.index')->with('Mensaje','Registro eliminado con exito');
    }
}