



<!--sesion parte datos del vehiculo -->



  <h3 class="font-weight-bold ">Ficha formulario</h1>


<div class="card-header">

<div class="container">
  <div class="row">





<div class="col-sm">




        <div class="form-group">
          {!! Form::label('encargado','Encargado de la Reparación') !!}

          {!! Form::text('encargado',auth()->user()->name,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado','readonly']) !!}



          @error ('encargado')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>




        <div class="form-group">
          {!! Form::label('nombre','Nombre del Cliente') !!}

          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre Cliente']) !!}



          @error ('nombre')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>



        <div class="form-group">
          {!! Form::label('direccion','Direccion') !!}

          {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion']) !!}



          @error ('direccion')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>



        <div class="form-group">
          {!! Form::label('telefono','Telefono') !!}

          {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}



          @error ('telefono')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>


        <div class="form-group">
          {!! Form::label('correo','Correo') !!}

          {!! Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo']) !!}



          @error ('correo')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>






</div>


<div class="col-sm">



        <div class="form-group">
          {!! Form::label('fecha','Fecha') !!}

          {!! Form::date('fecha',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado']) !!}

          @error ('fecha')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>

        </div>


<div class="col-sm">


                <div class="form-group">
                  {!! Form::label('patente','Patente') !!}

                  {!! Form::text('patente',null,['class'=>'form-control','placeholder'=>'ingrese Patente del vehículo']) !!}

                  @error ('patente')

                    <small class="text-danger">{{$message}}</small>

                  @enderror

                </div>

                </div>



</div>

</div>

</div>





<!-- fin de la sesion datos del vehiculo,  en el futuro se agregaran datos como marca,modelo,año y color -->

<br>






        <div class="form-group">

          <p class="font-weight-bold">Estado</p>

          <label>

            {!! Form::radio('status',1,true) !!}
            No Publicar <!--El cliente no tendra acceso a esta publicacion y o reparacion -->
          </label>


          <label>

            {!! Form::radio('status',2) !!}
            Publicado
          </label>

          <br>

          @error ('status')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>



<br>



<!-- sesion de imagen, se debe crear un grid y poner dentro de un row y tantos div como columnas quiera crear -->
<div class="row">

<div class="col-sm">

  <div class="image-wrapper">



<img id="picture" src="https://cdn.pixabay.com/photo/2018/06/30/09/29/monkey-3507317_960_720.jpg" alt="">

  

  </div>

</div>


<div class="col-sm">

  <div class="form-group">

    {!! Form::label('file','Imagen que de la falla') !!}
    {!! Form::file('file',['class'=>'form-control-file','accept'=>'image/*']) !!}

    @error ('file')

      <span class="text-danger">{{$message}}</span>

    @enderror

  </div>



  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div>


</div>



<br>


        <div class="form-group">

          {!! Form::label('problema','Descripción de la Falla') !!}
          {!! Form::textarea('problema',null,['class'=>'form-control']) !!}

          @error ('problema')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>

        <br>



        <div class="form-group">

          {!! Form::label('solucion','Solución Encontrada') !!}
          {!! Form::textarea('solucion',null,['class'=>'form-control']) !!}

          @error ('solucion')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>

<br>
