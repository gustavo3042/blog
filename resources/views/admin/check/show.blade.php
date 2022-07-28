
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

<div class="card-header">

    <h1 style="font-weight: bold;" class="text-center">Detalles De la Reparación</h1>
    <p style="font-weight: bold;" class="text-center"></p>

    <a class="btn btn-primary" href="{{route('check.index')}}">volver</a>



    
   


</div>

@stop

@section('content')


<style>
    .image-wrapper{
  position: relative;
  padding-bottom: 56.25%;

    }

    .image-wrapper img{

  position: absolute;
  object-fit: cover;
  width: 100%;
  height: 100%;
    }

  </style>



<div class="card">


    <div class="card-body">

<h3 style="font-weight: bold;">Ficha Tecnica</h3>
<br>

        <div class="row">

            <div class="col-sm">
            
                <label>Imagen de la falla</label>

              <div class="image-wrapper">
            
            
                @isset($check->image)
            
            <img id="picture" src="{{asset('storage').'/'.$check->image->url}}" alt="">
            
                  @else
            
            <img id="picture" src="https://cdn.pixabay.com/photo/2018/06/30/09/29/monkey-3507317_960_720.jpg" alt="">
            
                @endif
            
              </div>
            
            </div>
            
            
            <div class="col-sm">
            
           
            
            
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            
            </div>
            
            
            </div>


            <br>

            <div class="form-group">
                <p class="font-weight-bold">Reparaciones Realizadas</p>
      
      
                @foreach ($reparaciones as $reparar )
      
                  <label class="mr-2">
      
                 <input type="text" value="  {{$reparar->name}}" class="form-control" readonly>
               
      
                  </label>
      
                @endforeach
      
                <br>
      
      
                @error ('reparaciones')
      
                  <small class="text-danger">{{$message}}</small>
      
                @enderror
      
              </div>



              <div class="form-group">

                {!! Form::label('problema','Descripción de la Falla') !!}
                <textarea class="form-control" cols="30" rows="5" readonly>{{$check->problema }}</textarea>
      
            
      
              </div>
      
              <br>
      
      
      
              <div class="form-group">
      
                {!! Form::label('solucion','Solución Encontrada') !!}
                <textarea class="form-control" cols="30" rows="5" readonly>{{$check->solucion }}</textarea>
               
      
             
      
              </div>



              <div class="container">
                <div class="row">
              
              
              
              
              
              <div class="col-sm">


              <div class="form-group">
                  <p style="font-weight: bold;">Datos del Cliente</p>
                  <br>
                {!! Form::label('nombre','Nombre del Cliente') !!}
      
            
      
             <input type="text" value="{{$clientes[0]->nombre}}" class="form-control" readonly>
      
         
      
              </div>
      
      
      
              <div class="form-group">
                {!! Form::label('direccion','Direccion') !!}
      
                <input type="text" value="{{$clientes[0]->direccion}}" class="form-control" readonly>
            
      
      
      
      
              </div>
      
      
      
              <div class="form-group">
                {!! Form::label('telefono','Telefono') !!}
      
                <input type="text" value="{{$clientes[0]->telefono}}" class="form-control" readonly>
              
      
      
      
             
      
              </div>
      
      
              <div class="form-group">
                {!! Form::label('correo','Correo') !!}
      
                <input type="text" value="{{$clientes[0]->correo}}" class="form-control" readonly>
             
      
      
      
             
      
              </div>


            </div>

            <div class="col-sm">

                <p style="font-weight: bold;">Datos del Vehículo</p>
                <br>



                <div class="form-group">
                  {!! Form::label('marca','Marca') !!}
          
                 

                  <input type="text" value="{{$autos[0]->marca}}" class="form-control" readonly>
          
          
          
            
          
                </div>
          
          
          
          
                <div class="form-group">
                  {!! Form::label('modelo','Modelo') !!}
          
                 
                  <input type="text" value="{{$autos[0]->modelo}}" class="form-control" readonly>
          
          
               
          
       </div>


       <div class="form-group">
        {!! Form::label('ano','Año') !!}

      
        <input type="text" value="{{$autos[0]->ano}}" class="form-control" readonly>


       

</div>




  <div class="form-group">
    {!! Form::label('color','Color') !!}

  

    <input type="text" value="{{$autos[0]->color}}" class="form-control" readonly>



  </div>


                
            </div>


        
        </div>


            </div>
      



    </div>


</div>




@stop

@section('css')

  <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')




<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>





<script>


    document.getElementById("file").addEventListener('change', cambiarImagen);
  
          function cambiarImagen(event){
              var file = event.target.files[0];
  
              var reader = new FileReader();
              reader.onload = (event) => {
                  document.getElementById("picture").setAttribute('src', event.target.result);
              };
  
              reader.readAsDataURL(file);
          }
  
  
  
    </script>
  @stop
  