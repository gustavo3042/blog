


<div class="card">


<div class="card-header">

<input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post" type="text" >

</div>


  <div class="card-body">

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
  <td width="10px">

<a class="btn btn-primary btn-sm" href="{{route('posts.edit',$post)}}">Editar</a>
  </td>
  <td width="10px">
<form class="" action="{{route('posts.destroy',$post)}}" method="post">
  @csrf
  @method('DELETE')

<button class="btn btn-danger btn-sm" type="submit" name="button">Eliminar</button>

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
