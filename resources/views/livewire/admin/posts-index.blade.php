


<div class="card">


<div class="card-header">


    <a class="btn btn-primary   "href="{{route('posts.create')}}">Nuevo post</a>





  <form class="form-inline my-2 my-lg-0 float-right ">

  <input  type="search" name="buscar" class="form-control" value="" placeholder="Ingrese el nombre o correo de un usuario">

  <button class="btn btn-success my-2 my-sm-0 " type="submit">Search</button>
  
  </form>


</div>


  <div class="card-body">

    @if (Session::has('Mensaje'))

      <div class="alert alert-success" role="alert">
        {{Session::get('Mensaje')}}
      </div>

    @endif

<table class="table table-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th colspan="2"></th>
  </tr>
</thead>

<tbody>
@foreach ($posts as $post )

<tr>
  <td>{{$post->id}}</td>
  <td>{{$post->name}}</td>
  <td><input type="hidden" value="{{$post->user_id}}"></td>

  <td width="10px">

<a class="btn btn-primary btn-sm" href="{{route('posts.edit',$post)}}">Editar</a>

  </td>

  <td width="10px">

<form class="" action="{{route('posts.destroy',$post)}}" method="post">
  @csrf
  @method('DELETE')

<button onClick="return confirm('¿Borrar?');" class="btn btn-danger btn-sm" type="submit" name="button">Eliminar</button>

</form>

  </td>
</tr>
@endforeach
</tbody>
</table>
  </div>

  <div class="card-footer">
    {{$posts->links()}}
  </div>

</div>
