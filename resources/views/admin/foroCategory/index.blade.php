@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')






<div class="card ">





    <div class="card-header">


        <h2 style="font-weight: bold;" class="text-center pt-5 mb-4">Categoria Foro Consultas</h2>
    
        <a class="btn btn-info btn-sm mb-4" href="{{route('foroCategory.create')}}">Crear categoria</a>
    
     
    
    </div>


    @if (Session::has('Mensaje'))
    <div class="alert alert-success " role="alert">
      {{Session::get('Mensaje')}}
    </div>
    @endif



    <div class="card-body">


        <table class="table table-striped">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
    
                <tbody>
    
                @foreach($foroCategory as $item)
    
              
                  
                    <tr>
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td width='10px'>
    
                            <div  class="btn-group" role="group" aria-label="Basic example">

                                <a type="submit" class="btn btn-primary btn-sm" href="{{route('foroCategory.edit',$item->id)}}">Editar</a>
    
                                <form action="{{route('foroCategory.delete',$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
    
                                <button onclick="confirm('¿Seguro desea borrar esta categoria?');" type="submit" class="btn btn-danger btn-sm">Borrar</button>
    
    
                                </form>
                            
                        </div>
    
    
                        </td>
                    </tr>
              
    
                @endforeach
    
            </tbody>
             
        </table>


    </div>




    



</div>
  
    
 


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
