
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



   


@section('content')





<div class="card-header">

    <h2 style="font-weight: bold;" class="text-center pt-5 mb-4">Foro Consultas</h2>
    
    <a class="btn btn-primary btn-sm mb-4" href="{{route('foro.index')}}">Volver</a>


</div>


   

    <div class="container pt-5">

        <div class="row">

            @foreach ($postsForo as $item)

            <div class="col-sm-3 ">


              
                   
                

                <div class="card">
    
                    <img id="picture" class="card-img-top" height="200" src="{{asset('storage').'/'.$item->image->url}}" alt="">

                    <div class="card-body">
                       <h5 class="text-center font-weight-bold">{{$item->nombre}}</h5>
               
                      
                       
                   </div>   

                   <br>
                   <br>
             
                   <a  class="btn btn-primary   " type="submit" href="">Comentar</a>
               
                   </div>
                 
            </div>


            @endforeach



        </div>

      
    
    
    </div>
        











@stop
