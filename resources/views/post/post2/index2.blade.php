@extends('layouts.plantilla')
@section('contenido')


<div class="container">

  <div  class="text-dark">






@foreach ( $posts as $post)


<div class="" style="display:inline-block">


<article class="text-center m-2" style="padding:5px;">


<div >
  @foreach ($post->tags as $tag)




<a href="" class=" " style="display:inline-block; padding:1px; height:25px; color:black; "> {{$tag->name}}</a>



  @endforeach

</div>



<img class=" "  height="300" width="975" src="{{ asset('storage').'/'.$post->image->url}}" alt="">


<p class="text-sm">

<a style="color:gray;" class=""  href="{{route('posts.show',$post)}}">
{{$post->name}}
</a>
</p>


</article>



</div>
@endforeach

  </div>




</div>


@endsection
