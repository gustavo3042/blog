



<!--sesion parte datos del vehiculo -->






    <div class="card-header">

      <h3   style="font-weight: bold;" >Ficha Tecnica formulario</h1>
    
    <div class="container">
      <div class="row">
    
    
    
    
    
    <div style="border-style: groove;" class="col-sm">

  <br>
    
      <h5 class="text-center" style="font-weight: bold; background:#0000ff; border-radius:30px; color:white;">Datos del Cliente</h5>
    
      <!-- #0000ff color azul -->
        <!-- #1E90FF color celeste -->
    
  
            <div class="form-group">
              {!! Form::label('encargado','Encargado de la Reparación') !!}
    
              {!! Form::text('encargado',auth()->user()->name,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado','readonly']) !!}
    
    
    
              @error ('encargado')
    
                <small class="text-danger">{{$message}}</small>
    
              @enderror
    
            </div>
    
    
    
    
            <div class="form-group">
              {!! Form::label('nombre','Nombre') !!}

              <select name="nombre" id="" class="form-control">

          @foreach ($user as $item)


          <option value="{{$item->id}}">{{$item->name}}</option>
              
          @endforeach


              </select>
    
            
    
    
    
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


    
    <div style="border-style: groove;" class="col-sm">

      <br>
    
      <h5 class="text-center" style="font-weight: bold; background:#0000ff; border-radius:30px; color:white;">Datos Tecnicos del Vehículo</h5>
    
    
            <div class="form-group">
              {!! Form::label('fecha','Fecha') !!}
    
              {!! Form::date('fecha',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado']) !!}
    
              @error ('fecha')
    
                <small class="text-danger">{{$message}}</small>
    
              @enderror
    
            </div>


            <div class="form-group">

              {!! Form::label('tipoDireccion','Tipo de Dirección') !!}
              {!! Form::select('tipoDireccion',$tipoDireccion,null,['class'=>'form-control']) !!}
              
              
              @error ('tipoDireccion')
                <small class="text-danger">{{$message}}</small>
              @enderror
          </div>



          <div class="form-group">

            {!! Form::label('tipoTraccion','Tipo de Tracción') !!}
            {!! Form::select('tipoTraccion',$tipoTraccion,null,['class'=>'form-control']) !!}
            
            
            @error ('tipoTraccion')
              <small class="text-danger">{{$message}}</small>
            @enderror
        </div>


        <div class="form-group">

          {!! Form::label('combustion','Combustion') !!}
          {!! Form::select('combustion',$tipoCombustion,null,['class'=>'form-control']) !!}
          
          
          @error ('combustion')
            <small class="text-danger">{{$message}}</small>
          @enderror
      </div>

      <div class="form-group">

        {!! Form::label('cilindros','Cilindrada') !!}
        {!! Form::text('cilindrada',null,['class'=>'form-control','placeholder'=>'Ingrese Cilindrada del motor']) !!}
        
        
        @error ('cilindrada')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
          
    
      </div>
    
    
    <div style="border-style: groove;"  class="col-sm">

      <br>

      <h5 class="text-center" style="font-weight: bold; background:#0000ff; border-radius:30px; color:white;">Datos del Vehículo</h5>
    
    
    
                    <div class="form-group">
                      {!! Form::label('patente','Patente') !!}
    
                      {!! Form::text('patente',null,['class'=>'form-control','placeholder'=>'ingrese Patente del vehículo']) !!}
    
                      @error ('patente')
    
                        <small class="text-danger">{{$message}}</small>
    
                      @enderror
    
                    </div>



                 

                    <div class="form-group">
                      {!! Form::label('marca','Marca') !!}
              
                      {!! Form::text('marca',null,['class'=>'form-control','placeholder'=>'Ingrese Marca']) !!}
              
              
              
                      @error ('marca')
              
                        <small class="text-danger">{{$message}}</small>
              
                      @enderror
              
                    </div>
              
              
              
              
                    <div class="form-group">
                      {!! Form::label('modelo','Modelo') !!}
              
                      {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Ingrese Modelo']) !!}
              
              
              
                      @error ('modelo')
              
                        <small class="text-danger">{{$message}}</small>
              
                      @enderror
              
           </div>


           <div class="form-group">
            {!! Form::label('ano','Año') !!}
    
            {!! Form::text('ano',null,['class'=>'form-control','placeholder'=>'Ingrese Año']) !!}
    
    
    
            @error ('ano')
    
              <small class="text-danger">{{$message}}</small>
    
            @enderror
    
 </div>




      <div class="form-group">
        {!! Form::label('color','Color') !!}

        {!! Form::text('color',null,['class'=>'form-control','placeholder'=>'Ingrese Color']) !!}



        @error ('color')

          <small class="text-danger">{{$message}}</small>

        @enderror

      </div>





       </div>
  
    
    
    </div>
    
    </div>
    
    <br>
    
    </div>
    
    
    
    
    
    <!-- fin de la sesion datos del vehiculo,  en el futuro se agregaran datos como marca,modelo,año y color -->





    
    <br>
    
    
    
    
    
            <div class="form-group">
              <p class="font-weight-bold">Reparaciones Realizadas</p>
    
    
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
    

           

              <p class="font-weight-bold">Estado

               
              <a class="btn btn-primary btn-sm rounded-circle"  style=" color:white;" onclick="most();" >?</a>

              


            </p>
            

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
    
        {!! Form::label('file','Imagen de la falla') !!}
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
    
              {!! Form::label('solucion','Solución y Repuestos') !!}
              {!! Form::textarea('solucion',null,['class'=>'form-control']) !!}
    
              @error ('solucion')
    
                <small class="text-danger">{{$message}}</small>
    
              @enderror
    
            </div>
    
    <br>
    

  