<div>


    <div class="card mt-5">

         <form wire:submit.prevent="submit"> 

  <!-- resources/views/livewire/tabs.blade.php -->
<div wire:ignore>
    <!-- Navegación por pestañas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Datos del Cliente</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Datos Tecnicos del Vehículo</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Datos del Vehículo</button>
        </li>
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h5 class="text-center mb-3 pt-3" style="">Recepción del Cliente</h5>

            <div class="container">

            <div class="form-group">
                <label for="patente">Patente</label>

                <input wire:model="patente" name="patente"  class="form-control" placeholder="Ingrese patente de un vehículo">

            </div>

           
        
            <div class="form-group">
            <label for="nombre">Nombre Cliente</label>
            <input type="text" wire:model="nombre" id="nombre"  class="form-control" placeholder="Ingrese Cliente">
              @error ('nombre')
    
                <small class="text-danger">{{$message}}</small>
    
              @enderror
    
            </div>


            <div class="form-group">
              <label for="direccion">Dirección</label>
      
              <input type="text" wire:model="direccion"  class="form-control" placeholder="Ingrese Dirección">
      
      
      
                @error ('direccion')
      
                  <small class="text-danger">{{$message}}</small>
      
                @enderror
      
              </div>
          

              <div class="form-group">
                <label for="telefono">Telefono</label>
        
                <input type="number" wire:model="telefono"  class="form-control" placeholder="Ingrese Telefono">
        
        
        
                  @error ('telefono')
        
                    <small class="text-danger">{{$message}}</small>
        
                  @enderror
        
                </div>



                <div class="form-group">
                    <label for="correo">Correo</label>
            
                    <input type="email" wire:model="correo"  class="form-control" placeholder="Ingrese Correo">
            
            
            
                      @error ('correo')
            
                        <small class="text-danger">{{$message}}</small>
            
                      @enderror
            
                </div>  
          
       
        </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <h5 class="text-center mb-3 pt-3" >Recepción del Vehículo</h5>

            <div class="container">

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" wire:model="fecha"  class="form-control" placeholder="Ingrese fecha de ingreso">
                  @error ('fecha')
        
                    <small class="text-danger">{{$message}}</small>
        
                  @enderror
        
            </div> 


            <div class="form-group">
                <label for="tipoDireccion">Tipo de Dirección</label>
             <select wire:model="tipoDireccion" class="form-control">

                @foreach ($tipoD as $item)

                <option value="{{$item}}">{{$item}}</option>
                    
                @endforeach


            @error ('tipoDireccion')
        
                <small class="text-danger">{{$message}}</small>
    
              @enderror
             </select>

               
        
            </div> 


            <div class="form-group">
                <label for="tipoTraccion">Tipo de Tracción</label>
             <select wire:model="tipoTraccion" class="form-control">

                @foreach ($tipoT as $item)

                <option value="{{$item}}">{{$item}}</option>
                    
                @endforeach


            @error ('tipoTraccion')
        
                <small class="text-danger">{{$message}}</small>
    
              @enderror
             </select>

               
        
            </div> 



            <div class="form-group">
                <label for="tipoCombustion">Tipo de Combustión</label>
             <select wire:model="tipoCombustion" class="form-control">

                @foreach ($tipoC as $item)

                <option value="{{$item}}">{{$item}}</option>
                    
                @endforeach


            @error ('tipoCombustion')
        
                <small class="text-danger">{{$message}}</small>
    
              @enderror
             </select>

               
        
            </div> 


            <div class="form-group">
                <label for="cilindrada">Cilindrada</label>
        
                <input type="number" wire:model="cilindrada"  class="form-control" placeholder="Ingrese Cilindros">
        
        
        
                  @error ('cilindrada')
        
                    <small class="text-danger">{{$message}}</small>
        
                  @enderror
        
                </div>


        </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <h5 class="text-center mb-3 pt-3" >Datos del Vehículo</h5>

            <div class="container">

                <div class="form-group">
                    <label for="marca">Marca</label>
            
                    <input type="text" wire:model="marca"  class="form-control" placeholder="Ingrese Marca">
            
            
            
                      @error ('marca')
            
                        <small class="text-danger">{{$message}}</small>
            
                      @enderror
            
                    </div>


                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                
                        <input type="text" wire:model="modelo"  class="form-control" placeholder="Ingrese Modelo">
                
                
                
                          @error ('modelo')
                
                            <small class="text-danger">{{$message}}</small>
                
                          @enderror
                
                        </div>   


                        <div class="form-group">
                            <label for="ano">Año</label>
                    
                            <input type="text" wire:model="ano"  class="form-control" placeholder="Ingrese Año">
                    
                    
                    
                              @error ('ano')
                    
                                <small class="text-danger">{{$message}}</small>
                    
                              @enderror
                    
                         </div>         



                         <div class="form-group">
                            <label for="color">Color</label>
                    
                            <input type="text" wire:model="color"  class="form-control" placeholder="Ingrese Color">
                    
                    
                    
                              @error ('color')
                    
                                <small class="text-danger">{{$message}}</small>
                    
                              @enderror
                    
                         </div>    


                         <div class="form-group">
                            <label for="kilometraje">Kilometraje</label>
                    
                            <input type="number" wire:model="kilometraje"  class="form-control" placeholder="Ingrese Kilometraje">
                    
                    
                    
                              @error ('kilometraje')
                    
                                <small class="text-danger">{{$message}}</small>
                    
                              @enderror
                    
                         </div>    

            </div>

        </div>
    </div>
</div>

 
    <div class="container">

        <h2  class="font-weight-bold text-center mb-5">Presupuesto</h2>

         <table>

          <thead>
            <tr>
                <th>Nombre</th>  
                <th>Apellido</th>  
                <th>Edad</th>
                <th>  
                    <button type="button"  wire:click="addField" class="btn btn-primary btn-sm">+</button>
                    
            </th>
            </tr>    
        </thead>  

        <tbody>
        @foreach($this->fields as $index => $field)

        <tr>

         

    
            <div class="flex space-x-2 mb-4">
                <td>
                <div>
                    
                    <input type="text" id="nombres_{{ $index }}" wire:model="fields.{{ $index }}.nombres" class="form-control">
                    @error('fields.' . $index . '.nombres') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>
            <td>
                <div>
                  
                    <input type="text" id="apellido_{{ $index }}" wire:model="fields.{{ $index }}.apellido" class="form-control">
                    @error('fields.' . $index . '.apellido') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>
            <td>
                <div>
                   
                    <input type="text" id="edad_{{ $index }}" wire:model="fields.{{ $index }}.edad" class="form-control">
                    @error('fields.' . $index . '.edad') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>
              
            </div>

            <td>
                	{{$index}}
                <button type="button" wire:click="removeField({{ $index }})" class="btn btn-danger text-red-500">Eliminar</button>

            </td>
        

            
           
    
        @endforeach
      
    </tr>
    </tbody>
    </table>
    
</div>


    <div class="pt-3">
    <button type="submit" class="btn btn-primary text-green-500">Guardar</button>
    </div>

   </form> 


</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

 
<!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->



{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"> </script> --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

