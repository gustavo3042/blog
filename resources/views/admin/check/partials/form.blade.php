



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
          {!! Form::label('nombre','Datos del Cliente') !!}

          {!! Form::text('nombre',$clientes->nombre,['class'=>'form-control','placeholder'=>'Ingrese Nombre Cliente']) !!}



          @error ('nombre')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>



        <div class="form-group">
          {!! Form::label('direccion','Direccion') !!}

          {!! Form::text('direccion',$clientes->direccion,['class'=>'form-control','placeholder'=>'Ingrese Direccion']) !!}



          @error ('direccion')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>



        <div class="form-group">
          {!! Form::label('telefono','Telefono') !!}

          {!! Form::text('telefono',$clientes->telefono,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}



          @error ('telefono')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>


        <div class="form-group">
          {!! Form::label('correo','Correo') !!}

          {!! Form::text('correo',$clientes->correo,['class'=>'form-control','placeholder'=>'Ingrese Correo']) !!}



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


        <div class="form-group">

          {!! Form::label('tipoDireccion','Tipo Direccion') !!}

          <select name="tipoDireccion" class="form-control" id="tipoDireccion">
                            
                            
            @if (isset($tipoDireccion[0]->tipoDireccion))

            <option value="{{$tipoDireccion[0]->tipoDireccion}}">{{$tipoDireccion[0]->tipoDireccion}}</option>

            @endif



            <option value="Mecanica">Mecanica</option>
            <option value="Hidraulica">Hidraulica</option>
            <option value="Electrica">Electrica</option>




        </select>

          @error ('tipoDireccion')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>



      <div class="form-group">

        {!! Form::label('tipoTraccion','Tipo Traccion') !!}

        <select name="tipoTraccion" class="form-control" id="tipoTraccion">
                            
                            
          @if (isset($tipoTraccion[0]->tipoTraccion))

          <option value="{{$tipoTraccion[0]->tipoTraccion}}">{{$tipoTraccion[0]->tipoTraccion}}</option>

          @endif



          <option value="2x4">2x4</option>
          <option value="4x4">4x4</option>
          




      </select>
  
        
        @error ('tipoTraccion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>


    <div class="form-group">

      
      {!! Form::label('combustion','Tipo Combustion') !!}


      <select name="tipoCombustion" class="form-control" id="tipoCombustion">
                            
                            
        @if (isset($tipoCombustion[0]->tipoCombustion))

        <option value="{{$tipoCombustion[0]->tipoCombustion}}">{{$tipoCombustion[0]->tipoCombustion}}</option>

        @endif



        <option value="Gasolina">Gasolina</option>
        <option value="Diesel">Diesel</option>
        <option value="Gas">Gas</option>
        




    </select>

   
      
      @error ('combustion')
        <small class="text-danger">{{$message}}</small>
      @enderror
  </div>

  <div class="form-group">

    {!! Form::label('cilindros','Cilindrada') !!}
    {!! Form::text('cilindrada',$autos->cilindrada,['class'=>'form-control','placeholder'=>'Ingrese Cilindrada del motor']) !!}
    
    
    @error ('cilindrada')
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




                

                <div class="form-group">
                  {!! Form::label('marca','Datos del Vehículo') !!}
          
                  {!! Form::text('marca',$autos->marca,['class'=>'form-control','placeholder'=>'Ingrese Marca']) !!}
          
          
          
                  @error ('marca')
          
                    <small class="text-danger">{{$message}}</small>
          
                  @enderror
          
                </div>
          
          
          
          
                <div class="form-group">
                  {!! Form::label('modelo','Modelo') !!}
          
                  {!! Form::text('modelo',$autos->modelo,['class'=>'form-control','placeholder'=>'Ingrese Modelo']) !!}
          
          
          
                  @error ('modelo')
          
                    <small class="text-danger">{{$message}}</small>
          
                  @enderror
          
       </div>


       <div class="form-group">
        {!! Form::label('ano','Año') !!}

        {!! Form::text('ano',$autos->ano,['class'=>'form-control','placeholder'=>'Ingrese Año']) !!}



        @error ('ano')

          <small class="text-danger">{{$message}}</small>

        @enderror

</div>




  <div class="form-group">
    {!! Form::label('color','Color') !!}

    {!! Form::text('color',$autos->color,['class'=>'form-control','placeholder'=>'Ingrese Color']) !!}



    @error ('color')

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
          <p class="font-weight-bold">Reparaciones Realizada</p>


          @foreach ($reparaciones as $reparar )

            <label class="mr-2">

           {!!Form::checkbox('reparaciones[]',$reparar->id,null) !!} <!--dado q queremos q seleccione mas de un checkbox le ponemos reparaciones[] -->
           {{$reparar->name}}

            </label>

          @endforeach

          <br>


          @error ('reparaciones')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>

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


    @isset($check->image)

<img id="picture" src="{{asset('storage').'/'.$check->image->url}}" alt="">

      @else

<img id="picture" src="https://cdn.pixabay.com/photo/2018/06/30/09/29/monkey-3507317_960_720.jpg" alt="">

    @endif

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
