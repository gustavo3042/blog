@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')


<style>

    .alerts{

        background: LightSeaGreen;
        height: 55px;
        border-radius: 5px;
        color: aliceblue;
        padding: 16px;

    }
</style>


<div class="card">


    <div class="card-header">

        <h2 class="text-center font-weight-bold pt-5 mb-4">{{$foroComent->nombre}}</h2>



        <a class="btn btn-primary btn-sm mb-4" href="{{route('foro.consultas')}}">Volver</a>

    </div>


   



    <div class="card-body">


        <div class="form-group">


            <label for="comentado">Posteado por:</label>
    
            <input type="text" class="form-control col-sm-3" name="" value="{{$foroComent->user->name}}" readonly>
    
    
        </div>

        <div class="form-group">


            <label for="fecha">Fecha Creacion:</label>
    
           <input type="text" class="form-control col-sm-3" value="{{$foroComent->fecha}}" readonly>
    
    
        </div>

        <div class="form-group">

            <label for="body">Post</label>
            <textarea name="" class="form-control" id="" cols="8" rows="8" readonly>{{$foroComent->body}}</textarea>
            
            </div>


        </div>


</div>


<div class="card-header">

    <form action="{{route('foro.comentCrear')}}" method="post">

        @csrf

        <div class="form-group">


            <label for="comentado">Comentar:</label>
    
            <textarea name="bodyComent" id="" class="form-control" cols="8" rows="8"></textarea>
    
    
        </div>

        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

        <input type="hidden" name="fechaComent" value="{{\Carbon\Carbon::now()->format('Y/m/d')}}">

        <input type="hidden" value="{{$foroComent->id}}" name="post_foro_consultas_id" >

        <input type="hidden" name="client" value="0">


       <div class="form-group">


        <button class="btn btn-primary btn-sm float-right" type="submit"  >Guardar</button>

       </div>

    </form>

</div>





@if (Session::has('Mensaje'))
<div class="alerts" role="alert">
<strong>{{Session::get('Mensaje')}}</strong>  
</div>
@endif

<div class="card-body mb-4 pt-5">

@foreach ($coment as $val)


@if($val->user_id != auth()->user()->id)

<form action="{{route('foro.comentarEdit',$val->id)}}" method="POST">

    {{ method_field('PUT') }}
    @csrf

<div class="form-group">

   
    @foreach ($users as $tot)
        
    @if ($val->user_id == $tot->id)

    <label class="form-label" for="">Comentado Por: {{$tot->name}} el {{$val->fechaComent}}</label>
        
    @endif

    @endforeach


<textarea  class="form-control" name="bodyComent"  cols="7" rows="7" readonly>{{$val->bodyComent}}</textarea>

</div>

<div  class="btn-group float-right mb-4" role="group" aria-label="Basic example">




   

</div>

</form>


@elseif($val->user_id == auth()->user()->id)


<form action="{{route('foro.comentarEdit',$val->id)}}" method="POST">

    {{ method_field('PUT') }}
    @csrf

<div class="form-group">

   
    @foreach ($users as $tot)
        
    @if ($val->user_id == $tot->id)

    <label class="form-label" for="">Comentado Por: {{$tot->name}} el {{$val->fechaComent}}</label>
        
    @endif

    @endforeach

<textarea  class="form-control" name="bodyComent"  cols="7" rows="7" >{{$val->bodyComent}}</textarea>

<input type="hidden" name="edits" value="0">

</div>

<div  class="btn-group float-right mb-4" role="group" aria-label="Basic example">

    
  

    <button class="btn btn-primary btn-sm " type="submit" >Editar</button>


   

</div>

</form>

@endif

@if($val->user_id != auth()->user()->id)




@elseif($val->user_id == auth()->user()->id)

<form action="{{route('foro.comentarDelete',$val->id)}}" method="POST" class="float-right">

    @csrf
    @method('DELETE')
  

    <button class="btn btn-danger btn-sm" type="submit">Borrar</button>

</form>

@endif
    
@endforeach

</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
