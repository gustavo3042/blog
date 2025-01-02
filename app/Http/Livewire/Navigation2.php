<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class Navigation2 extends Component
{

  public $pruebas;

    public function render()
    {
     //dd('hola');
       $categories = Category::all();

        return view('livewire.navigation2',compact('categories'));
    }


    public function store(Request $request){

 

      $request->validate([
          
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'comentario' => 'required|string|max:500',
    ]);

    try {
      $coment = Comment::create([
          'nombre' => $request->nombre,
          'telefono' => $request->telefono,
          'email' => $request->email,
          'comentario' => $request->comentario,
      ]);

      return response()->json(['success' => 'Registro creado con éxito']);
  } catch (\Throwable $th) {
      return response()->json(['error' => 'Error al crear el registro'], 500);
  }
    
    }
}
