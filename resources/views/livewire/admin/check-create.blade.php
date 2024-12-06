<div >
    




<!--sesion parte datos del vehiculo -->





<body>
  



    <div class="card-body">

      <h3 class="font-weight-bold text-center mb-5 pt-5" >Ficha Tecnica formulario</h1>

        <a class="btn btn-primary mt-5 mb-5" href="{{route('check.index')}}">volver</a>

        

       

   
    
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
        
          <h5 class="text-center" style="">Recepción del Cliente</h5>
        
          <!-- #0000ff color azul -->
            <!-- #1E90FF color celeste -->
        
      
                <div class="form-group">
               
        
                  {!! Form::hidden('encargado',auth()->user()->name,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado','readonly']) !!}
        
        
        
        
                </div>




                <div class="form-group">
                    {!! Form::label('patente','Patente') !!}
  
              
                

                    <input wire:model="patente" name="patente"  class="form-control" placeholder="Ingrese patente de un vehículo">
  
                    
  
                  </div>


                    @if (empty($most))


                 


                      <div class="form-group">
                        {!! Form::label('nombre','Nombre Cliente') !!}
          
                      <input type="text" name="nombre" id="nombre"  class="form-control" placeholder="Ingrese Cliente">
              
                      
              
              
              
                        @error ('nombre')
              
                          <small class="text-danger">{{$message}}</small>
              
                        @enderror
              
                      </div>


                      @else


                      <div class="form-group">
                        {!! Form::label('nombre','Nombre Cliente') !!}
          
                      <input type="text" name="nombre" id="nombre" value="{{$most->nombre}}" class="form-control" placeholder="Ingrese Cliente">
              
                      
              
              
              
                        @error ('nombre')
              
                          <small class="text-danger">{{$message}}</small>
              
                        @enderror
              
                      </div>
                   

                        
                    @endif

                
             


              


                

               
    
               



             
                  

                      
              
                      @if (empty($most))

                      
                <div class="form-group">
                    {!! Form::label('direccion','Direccion') !!}
          
                    {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese Direccion']) !!}
          
          
          
                    @error ('direccion')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>
                          
                      @else


                      
                <div class="form-group">
                    {!! Form::label('direccion','Direccion') !!}
          
                    {!! Form::text('direccion',$most->direccion,['class'=>'form-control','placeholder'=>'Ingrese Direccion']) !!}
          
          
          
                    @error ('direccion')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>
                          
                      @endif
        
                

                  @if (empty($most))


                  <div class="form-group">
                    {!! Form::label('telefono','Telefono') !!}
          
                    {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}
          
          
          
                    @error ('telefono')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>

                      
                  @else


                  <div class="form-group">
                    {!! Form::label('telefono','Telefono') !!}
          
                    {!! Form::text('telefono',$most->telefono,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}
          
          
          
                    @error ('telefono')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>
                      
                  @endif
        
        
        
        
                  @if (empty($most))


                  <div class="form-group">
                    {!! Form::label('correo','Correo') !!}
          
                    {!! Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingrese Correo']) !!}
          
          
          
                    @error ('correo')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>


                  @else


                  <div class="form-group">
                    {!! Form::label('correo','Correo') !!}
          
                    {!! Form::text('correo',$most->correo,['class'=>'form-control','placeholder'=>'Ingrese Correo']) !!}
          
          
          
                    @error ('correo')
          
                      <small class="text-danger">{{$message}}</small>
          
                    @enderror
          
                  </div>
                      
                  @endif
        
             
        
        
                </div> 
      
        
              </div> 
    
    
        <!-- fin primera parte -->
        
      
      
      

      
        

        
  <!--Segunda parte -->
        
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div  class="col-sm">

      <br>
    
      <h5 class="text-center" >Recepción del Vehículo</h5>
    


      @if (empty($most))


      <div class="form-group">
        {!! Form::label('fecha','Fecha') !!}

        {!! Form::date('fecha',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado']) !!}

        @error ('fecha')

          <small class="text-danger">{{$message}}</small>

        @enderror

      </div>
          
      @else


      <div class="form-group">
        {!! Form::label('fecha','Fecha') !!}

        {!! Form::date('fecha',$most->fecha,['class'=>'form-control','placeholder'=>'ingrese el nombre del encargado']) !!}

        @error ('fecha')

          <small class="text-danger">{{$message}}</small>

        @enderror

      </div>
          
      @endif




      @if (empty($most))
          

      
      <div class="form-group">

        {!! Form::label('tipoDireccion','Tipo de Dirección') !!}
        {!! Form::select('tipoDireccion',$tipoDireccion,null,['class'=>'form-control']) !!}
        
        
        @error ('tipoDireccion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

      @else

      
      <div class="form-group">

        {!! Form::label('tipoDireccion','Tipo de Dirección') !!}

        {!! Form::select('tipoDireccion',$tipoDireccion,$most->tipoDireccion,['class'=>'form-control']) !!}
     

     
        
        @error ('tipoDireccion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
          
      @endif
      
    
           

      @if (empty($most))

      <div class="form-group">

        {!! Form::label('tipoTraccion','Tipo de Tracción') !!}
        {!! Form::select('tipoTraccion',$tipoTraccion,null,['class'=>'form-control']) !!}
        
        
        @error ('tipoTraccion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

          
      @else


      <div class="form-group">

        {!! Form::label('tipoTraccion','Tipo de Tracción') !!}
        {!! Form::select('tipoTraccion',$tipoTraccion,$most->tipoTraccion,['class'=>'form-control']) !!}
        
        
        @error ('tipoTraccion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

          
      @endif




      @if (empty($most))
          

      <div class="form-group">

        {!! Form::label('combustion','Combustion') !!}
        {!! Form::select('combustion',$tipoCombustion,null,['class'=>'form-control']) !!}
        
        
        @error ('combustion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>



      @else


      <div class="form-group">

        {!! Form::label('combustion','Combustion') !!}
        {!! Form::select('combustion',$tipoCombustion,$most->tipoCombustion,['class'=>'form-control']) !!}
        
        
        @error ('combustion')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

          
      @endif


      @if (empty($most))
          
      <div class="form-group">

        {!! Form::label('cilindros','Cilindrada') !!}
    <input type="text" name="cilindrada" id="cilindrada" placeholder="Cilindros" class="form-control">
        
        
        @error ('cilindrada')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

      @else

      <div class="form-group">

        {!! Form::label('cilindros','Cilindrada') !!}
    <input type="text" name="cilindrada" id="cilindrada" value="{{$most->cilindrada}}" placeholder="Cilindros" class="form-control">
        
        
        @error ('cilindrada')
          <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
          
      @endif

     

     
    </div>
          
    
      </div>

      <!--fin segunda parte -->
      
      


      


        

 <!--tercera parte -->

 <div class="tab-pane fade" id="datos" role="tabpanel" aria-labelledby="profile-tab">
    
    <div  class="col-sm">

      <br>

      <h5 class="text-center" >Datos del Vehículo</h5>
    
    
    
                    
            @if (empty($most))

            <div class="form-group">
                {!! Form::label('marca','Marca') !!}
        
          
                {!! Form::text('marca',null,['class'=>'form-control','placeholder'=>'Ingrese Marca']) !!}
        
                @error ('marca')
        
                  <small class="text-danger">{{$message}}</small>
        
                @enderror
        
              </div>
                
            @else


            <div class="form-group">
                {!! Form::label('marca','Marca') !!}
        
          
                {!! Form::text('marca',$most->marca,['class'=>'form-control','placeholder'=>'Ingrese Marca']) !!}
        
                @error ('marca')
        
                  <small class="text-danger">{{$message}}</small>
        
                @enderror
        
              </div>
                
            @endif


                 

            @if (empty($most))

            <div class="form-group">
              {!! Form::label('modelo','Modelo') !!}
      
              {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Ingrese Modelo']) !!}
      
      
      
              @error ('modelo')
      
                <small class="text-danger">{{$message}}</small>
      
              @enderror
      
             </div>
                
            @else


            <div class="form-group">
              {!! Form::label('modelo','Modelo') !!}
      
              {!! Form::text('modelo',$most->modelo,['class'=>'form-control','placeholder'=>'Ingrese Modelo']) !!}
      
      
      
              @error ('modelo')
      
                <small class="text-danger">{{$message}}</small>
      
              @enderror
      
             </div>
                
            @endif
                   
              
              

            @if (empty($most))
                
            <div class="form-group">
              {!! Form::label('ano','Año') !!}
      
              {!! Form::text('ano',null,['class'=>'form-control','placeholder'=>'Ingrese Año']) !!}
      
      
      
              @error ('ano')
      
                <small class="text-danger">{{$message}}</small>
      
              @enderror
      
            </div>

            @else


            <div class="form-group">
              {!! Form::label('ano','Año') !!}
      
              {!! Form::text('ano',$most->ano,['class'=>'form-control','placeholder'=>'Ingrese Año']) !!}
      
      
      
              @error ('ano')
      
                <small class="text-danger">{{$message}}</small>
      
              @enderror
      
   </div>
                
            @endif
              
              
                   
              @if(empty($most))

              <div class="form-group">
                {!! Form::label('color','Color') !!}
        
                {!! Form::text('color',null,['class'=>'form-control','placeholder'=>'Ingrese Color']) !!}
        
        
        
                @error ('color')
        
                  <small class="text-danger">{{$message}}</small>
        
                @enderror
        
              </div>
       
              @else


              <div class="form-group">
                {!! Form::label('color','Color') !!}
        
                {!! Form::text('color',$most->color,['class'=>'form-control','placeholder'=>'Ingrese Color']) !!}
        
        
        
                @error ('color')
        
                  <small class="text-danger">{{$message}}</small>
        
                @enderror
        
              </div>
       
              @endif

              @if (empty($most))

              <div class="form-group">
                <label for="kilometraje">Kilometraje</label>
                <input type="number" name="kilometraje" id="" class="form-control" placeholder="" >
               
              </div>
                  
              @else

              <div class="form-group">
                <label for="kilometraje">Kilometraje</label>
                <input type="number" name="kilometraje" value="{{$most->kilometraje}}" id="" class="form-control" placeholder="" >
               
              </div>
                  
              @endif


            

       




              <div class="form-group">

                {{ Form::label('Tipo Aceite') }} <br>
    
                <div class="form-check">
    
                    <input class="form-check-input" wire:model.live="tipoAceite1" value="1" type="radio" name="tipoAceite"
                    checked>
    
                    <label class="form-check-label" for="status1">
                        Aceite mineral 5000 km
                    </label>
    
                </div>
    
    
                <div class="form-check">
    
                    <input class="form-check-input" wire:model.live="tipoAceite2" value="2" type="radio" name="tipoAceite" >
    
                    <label class="form-check-label" for="status2">
                        Aceite semisintetico 10000 km
                    </label>
                </div>


                
                <div class="form-check">
    
                  <input class="form-check-input" wire:model.live="tipoAceite3" value="3" type="radio" name="tipoAceite" >
  
                  <label class="form-check-label" for="status3">
                      Aceite sintetico 20000 km
                  </label>
              </div>


              <div class="form-check">
    
                <input class="form-check-input" wire:model.live="tipoAceite4" value="4" type="radio" name="tipoAceite" >

                <label class="form-check-label" for="status4">
                    Aceite alto kilometraje 30000 km
                </label>
            </div>
    

            <div class="form-check">
    
              <input class="form-check-input" wire:model.live="tipoAceite5" value="5" type="radio" name="tipoAceite" >

              <label class="form-check-label" for="status5">
                  Sin cambio de aceite 0 km
              </label>
          </div>
    
            </div>




       </div>

       <!-- tercera parte -->


    
      
      
        </div>

  
    </div>
    
    <br>
    
    </div>
    
  </div>
    
    
    
    
    <!-- fin de la sesion datos del vehiculo,  en el futuro se agregaran datos como marca,modelo,año y color -->





    
    <br>

  

 


        
   
    
        <div class="container">


           
    
    
            <div class="form-group">
              <h3 class="font-weight-bold text-center mb-5" >Presupuesto</h3>

              <br>
    
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
          <tr>
          <td><input type="text" name="product_name[]"  class="form-control" required=""></td>
          <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
          <td><input type="text" name="budget[]" class="form-control budget"></td>
        
          @if ($tipoAceite1)
          <td><select name="brand[]" class="form-control">
            <option >--Seleccione--</option>
            @foreach ($insumos as $item)

            <option value="{{$item->id}}">{{$item->name}}</option>  
            @endforeach
  
          </select></td>
          @elseif($tipoAceite5)    
          <td><input type="text" name="brand[]" class="form-control"></td>


          @elseif($tipoAceite1 == null && $tipoAceite2 == null && $tipoAceite3 == null && $tipoAceite4 == null && $tipoAceite5 == null  )

          <td><input type="text" name="brand[]" class="form-control"></td>

          @endif
         
          <td><input type="text" name="cantidadRepuestos[]" class="form-control cantidadRepuestos" required=""></td>
          <td><input type="text" name="precioRepuestos[]" class="form-control precioRepuestos" required=""></td>
        
          <td><input type="text" name="amount[]" class="form-control amount"></td>
          <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
          </tr>
                          </tr>
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


        </div>
    

     
    
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
    
    <img id="picture" src="https://cdn.pixabay.com/photo/2014/06/04/16/36/man-362150_1280.jpg" alt="">
    
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
              <textarea name="problema" id="" cols="5" class="form-control" rows="8"></textarea>
    
              @error ('problema')
    
                <small class="text-danger">{{$message}}</small>
    
              @enderror
    
            </div>
    
            <br>
    
    
    
            <div class="form-group">
    
              {!! Form::label('solucion','Solución y Repuestos') !!}
       

              <textarea name="solucion" id="" cols="5" class="form-control" rows="8"></textarea>
    
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




</body>


</div>
