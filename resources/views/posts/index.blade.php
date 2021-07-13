@extends('layouts.posts')
@section('contenido')




<a class="btn btn-secondary btn-sm float-right"href="{{route('posts.create')}}">Nuevo post</a>

<h1>Listado de Posts</h1>



@livewire('admin.posts-index')




@endsection
