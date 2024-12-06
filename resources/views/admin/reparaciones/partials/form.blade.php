<div class="form-group">

{!! Form::label('name','Nombre:') !!}
{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese Reparacion']) !!}


@error ('name')


  <small class="text-danger">{{$message}}</small>
@enderror


</div>



<div class="form-group">

{!! Form::label('Precio','Precio:') !!}
{!! Form::text('Precio',null,['class'=>'form-control','placeholder'=>'Ingrese Precio']) !!}


@error ('Precio')


  <small class="text-danger">{{$message}}</small>
@enderror


</div>
