<div class="form-group">

  {!! Form::label('name','Nombre:') !!}
  {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese nombre de la etiqueta']) !!}


  @error ('name')
<small class="text-danger">{{$message}}</small>
  @enderror

</div>




<div class="form-group">

  {!! Form::label('slug','Slug:') !!}
  {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Ingrese nombre del slug','readonly']) !!}



@error ('slug')
<small class="text-danger">{{$message}}</small>
@enderror


</div>


<div class="form-group">

<!--<label for="">Color:</label>
<select class="form-control" id="" name="color">
<option value="red">Color rojo</option>
<option value="green">Color verde</option>
<option value="blue" selected>Color azul</option>
</select>
-->


{!! Form::label('color','Color:') !!}
{!! Form::select('color',$colors,null,['class'=>'form-control']) !!}


@error ('color')
<small class="text-danger">{{$message}}</small>
@enderror

</div>
