@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

@if ($post->image)

<img class="w-full h-72 object-cover object-center" src="{{asset('storage').'/'.$post->image->url}}" alt="">

@else

<img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/05/27/20/53/field-6289253_960_720.jpg" alt="">

@endif

<div class="px-6 py-4">


<h1>
<a class="font-bold text-xl mb-2" href="{{route('posts.shows',$post)}}">{{$post->name}}</a>

</h1>

<div class="text-gray-700 text-base">
{!! $post->extract !!}
</div>

</div>


<div class="px-6 pt-4 pb-2">

@foreach ($post->tags as $tag)
<a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
@endforeach



</div>

</article>
