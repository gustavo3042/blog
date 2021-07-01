<x-app-layout>
<div class="container py-8 ">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


  @foreach ($posts as $post)
<article style="background-image: url( @if($post->image) {{asset('storage').'/'.$post->image->url}} @else https://cdn.pixabay.com/photo/2021/05/27/20/53/field-6289253_960_720.jpg @endif)" class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif">

<div class="w-full h-full px-8 flex flex-col justify-center">

  <div class="">
  @foreach ($post->tags as $tag)

  <a class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>

  @endforeach
  </div>

<h1 class="text-4xl text-white leading-8 foont-bold mt-2">
<a href="{{route('posts.show',$post)}}">
{{$post->name}}

</a>


</h1>
</div>



</article>
  @endforeach
</div>


<div class="mt-4">
  {{$posts->links()}}
</div>
</div>
</x-app-layout>
