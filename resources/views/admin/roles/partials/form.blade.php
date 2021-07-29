<div class="form-group">


  {!! Form::label('name','Nombre') !!}
  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre del Rol']) !!}


  @error ('name')
    <small class="text-danger">
{{$message}}
    </small>

  @enderror

</div>

<div class="form-group">


<h2 class="h3">Lista de Permisos</h2>

@foreach ($permisos as $permiso)

<div>

  <label>

{!! Form::checkbox('permisos[]',$permiso->id,null,['class'=>'mr-1']) !!}
{{$permiso->description}}

  </label>


  @endforeach

</div>
</div>
