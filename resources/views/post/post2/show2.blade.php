@extends('layouts.plantilla')


@section('contenido')


<div class="container">
<h1 class="text-muted">{{$post->name}}</h1>

<div style="color:gray" class="text-lg-text-gray">
{{$post->extract}}

</div>



<div class="row">


  <div class="col">

    <figure>
      <img class="col-lg-12" height="300" width="200" src="{{asset('storage').'/'.$post->image->url}}">
    </figure>

    <div style="color:gray" class="text-justify">
      {{$post->body}}
    </div>

  </div>

<div style="color:gray" class="col-3">


  <aside >
<h4>Mas en {{$post->category->name}}</h4>

<ul>
  @foreach ($similares as $similar)



<li style="margin:bottom: 2px">
<a class="d-inline-flex p-2 bd-highlight" href="{{route('posts.show', $similar)}}">
<img   class="col-sm-7"height="100" width="250" src="{{asset('storage').'/'.$post->image->url}}" alt="">
<span style="margin-left: 2px;color:gray;">{{$similar->name}}</span>
</a>
</li>

  @endforeach
</ul>
  </aside>

</div>

</div>

</div>

@endsection
