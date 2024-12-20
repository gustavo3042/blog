



<!--sesion parte datos del vehiculo -->


<div class="card-header mb-5">


  <h3   style="font-weight: bold;" class="mb-5" >Ficha Tecnica formulario</h1>



<div class="container">


  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
            data-bs-target="#home" type="button" role="tab" aria-controls="home"
            aria-selected="true"><i class="fas fa-user"></i>Datos Cliente</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
            aria-selected="false"> <i class="fas fa-car"></i>Datos Tecnicos del Vehículo</button>
    </li>


    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
          data-bs-target="#datos" type="button" role="tab" aria-controls="datos"
          aria-selected="false"> <i class="fas fa-wrench"></i> Datos del Vehículo</button>
  </li>
  
  </ul>
  
  <br>
  
  <div class="tab-content" id="myTabContent">
  
  
    <div class="tab-pane fade show active" id="home" role="tabpanel"
    aria-labelledby="home-tab">
  
  
  
<!--Primera parte -->
<div  class="col-sm">

  <br>
    
      <h5 class="text-center" style="">Datos del Cliente</h5>
    
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
              {!! Form::label('nombre','Nombre Cliente') !!}

            <input type="text" name="nombre" id="nombre" value="{{$clientes->nombre}}" class="form-control" placeholder="Ingrese Cliente">
    
            
    
    
    
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


    <!-- fin primera parte -->
    
  </div>
  
  
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
    

    
<!--Segunda parte -->
    
<div  class="col-sm">

  <br>

  <h5 class="text-center" >Datos Tecnicos del Vehículo</h5>


        <div class="form-group">
          {!! Form::label('fecha','Fecha') !!}

          {!! Form::date('fecha',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado']) !!}        

          @error ('fecha')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>


        <div class="form-group">

          {!! Form::label('tipoDireccion','Tipo de Dirección') !!}
       
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

        {!! Form::label('tipoTraccion','Tipo de Tracción') !!}

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

      {!! Form::label('combustion','Combustion') !!}

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

  <!--fin segunda parte -->
  
  </div>


  <div class="tab-pane fade" id="datos" role="tabpanel" aria-labelledby="profile-tab">


    

<!--tercera parte -->

<div  class="col-sm">

  <br>

  <h5 class="text-center" >Datos del Vehículo</h5>



                <div class="form-group">
                  {!! Form::label('patente','Patente') !!}

            
                  {!! Form::text('patente',null,['class'=>'form-control','placeholder'=>'ingrese Patente del vehículo']) !!}

                  @error ('patente')

                    <small class="text-danger">{{$message}}</small>

                  @enderror

                </div>



             

                <div class="form-group">
                  {!! Form::label('marca','Marca') !!}

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

   <!-- tercera parte -->


  </div>
  
  
    </div>

 














</div>

<br>

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



    {{--     <section>
          <div class="panel panel-header">

            
          
          <div class="panel panel-footer" >
              <table class="table table-bordered hover">
                  <thead>
                      <tr>
                          <th>Trabajo</th>
                          <th>Descripción</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Total</th>

                          <!--boton addRow para agregar input para abajo class addRow -->
                          <th><a href="#" class="addRow"><i class="fa fa-plus"></i></a></th>
                      </tr>
                  </thead>

              
                      
                 

                  <tbody>

                    @foreach ($presupuestoDetails as $item)
      <tr>
      <td><input type="text" name="product_name[]" class="form-control" value="{{$item->trabajo}}" required=""></td>
      <td><input type="text" name="brand[]" class="form-control" value="{{$item->descripcion}}"></td>
        <td><input type="text" name="quantity[]" class="form-control quantity" value="{{$item->cantidad}}" required=""></td>
        <td><input type="text" name="budget[]" class="form-control budget" value="{{$item->precio}}"></td>
        <td><input type="text" name="amount[]" class="form-control amount" value="{{$item->amount}}"></td>
      <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
      </tr>

      @endforeach
                      </tr>
                  </tbody>

                

                  <tfoot>
                      <tr>
                          <td style="border: none"></td>
                          <td style="border: none"></td>
                          <td style="border: none"></td>
                          <td >Total :</td>
                          <td><b class="total"></b> </td>
                        
                      </tr>
                  </tfoot>



              </table>


          </div>
      </section> --}}



      <section>


             

        <div class="panel panel-header">

          
        
        <div class="panel panel-footer" >
            <table class="table table-bordered hover">
                <thead>
                    <tr>
                        <th>Trabajo</th>
                    
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Repuestos</th>
                        <th>Cantidad Repuestos</th>
                        <th>Precio Repuestos</th>

                        <th>Total</th>
                      

                        <!--boton addRow para agregar input para abajo class addRow -->
                        <th><a href="#" class="addRow"><i class="fa fa-plus"></i></a></th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($presupuestoDetails as $item)
    <tr>
    <td><input type="text" name="product_name[]" value="{{$item->trabajo}}" class="form-control" required=""></td>
    <td><input type="text" name="quantity[]" value="{{$item->cantidad}}" class="form-control quantity" required=""></td>
    <td><input type="text" name="budget[]" value="{{$item->precio}}" class="form-control budget"></td>
  

    <td><input type="text" name="brand[]" value="{{$item->descripcion}}" class="form-control"></td>
    <td><input type="text" name="cantidadRepuestos[]" value="{{$item->cantidadRepuestos}}" class="form-control cantidadRepuestos" required=""></td>
    <td><input type="text" name="precioRepuestos[]" value="{{$item->precioRepuestos}}" class="form-control precioRepuestos" required=""></td>
  
    <td><input type="text" name="amount[]" value="{{$item->amount}}" class="form-control amount"></td>
    <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
    </tr>
                    </tr>
                    @endforeach
                </tbody>


                <tfoot>
                    <tr>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td >Total :</td>
                        <td><b class="total"></b> </td>
                      
                      
                    </tr>
                </tfoot>



            </table>


        </div>



    </section>



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

<img id="picture" src="https://cdn.pixabay.com/photo/2014/06/04/16/36/man-362150_1280.jpg" alt="">

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

          {!! Form::label('solucion','Solucion y Repuestos') !!}
          {!! Form::textarea('solucion',null,['class'=>'form-control']) !!}

          @error ('solucion')

            <small class="text-danger">{{$message}}</small>

          @enderror

        </div>

<br>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>




<script>
var path = "{{ route('check.action')  }}";
$('#patente').typeahead({

  source:  function (query, process) {

  return $.get(path, { term: query }, function (data) {

          return process(data);
      });
  }
});



var marcas = "{{ route('check.marca')  }}";
$('#marca').typeahead({

  source:  function (query, process) {

  return $.get(marcas, { term: query }, function (data) {

          return process(data);
      });
  }
});



var modelos = "{{ route('check.modelo')  }}";
$('#modelo').typeahead({

  source:  function (query, process) {

  return $.get(modelos, { term: query }, function (data) {

          return process(data);
      });
  }
});

var anos = "{{ route('check.ano')  }}";
$('#ano').typeahead({

  source:  function (query, process) {

  return $.get(anos, { term: query }, function (data) {

          return process(data);
      });
  }
});


var colors = "{{ route('check.color')  }}";
$('#color').typeahead({

  source:  function (query, process) {

  return $.get(colors, { term: query }, function (data) {

          return process(data);
      });
  }
});


var cilindrada = "{{ route('check.cilindrada')  }}";
$('#cilindrada').typeahead({

  source:  function (query, process) {

  return $.get(cilindrada, { term: query }, function (data) {

          return process(data);
      });
  }
});



var nombre = "{{ route('check.nombre')  }}";
$('#nombre').typeahead({

  source:  function (query, process) {

  return $.get(nombre, { term: query }, function (data) {

          return process(data);
      });
  }
});

var direccion = "{{ route('check.direccion')  }}";
$('#direccion').typeahead({

  source:  function (query, process) {

  return $.get(direccion, { term: query }, function (data) {

          return process(data);
      });
  }
});


var telefono = "{{ route('check.telefono')  }}";
$('#telefono').typeahead({

  source:  function (query, process) {

  return $.get(telefono, { term: query }, function (data) {

          return process(data);
      });
  }
});


var correo = "{{ route('check.correo')  }}";
$('#correo').typeahead({

  source:  function (query, process) {

  return $.get(correo, { term: query }, function (data) {

          return process(data);
      });
  }
});

</script>