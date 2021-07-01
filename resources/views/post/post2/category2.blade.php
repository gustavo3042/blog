@extends('layouts.plantilla')

@section('contenido')





<div style="padding:8px;" class="container">
  <h1 class=" text-center">Categoria :{{$category->name}}</h1>

  @foreach ($post as $posts)
    <div class="col-sm-7" style="display:inline-block">

      <article class="" style="padding:10px;">
        <img class="" height="300" width="1000" src="{{asset('storage').'/'.$posts->image->url}}" alt="">

        <div style="padding: 8px;"class="">

          <p >

            <a style="font:bold; margin:bottom:2px;color: black;" href="{{route('post.show',$posts)}}">{{$posts->name}}</a>
          </p>

          <div class="text-gray" >
            <p>{{$posts->extract}}</p>
          </div>
        </div>

        <div style="padding:8px;" class="">

          @foreach ($posts->tags as $tag)
      <a class=""  style="display:inline-block; padding:7px; height:35px; color:gray;background: #B0C4DE; border-radius:  10px;"
       href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>
          @endforeach

        </div>


      </article>

    </div>
  @endforeach





</div>

@endsection
