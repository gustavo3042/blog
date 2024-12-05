
{{-- <style>
  .image-wrapper{
position: relative;
padding-bottom: 56.25%;

  }

  .image-wrapper img{

position: absolute;
object-fit: cover;
width: 100%;
height: 100%;
  }

</style> --}}

{{-- 
<style>

  th,td{
    font-size: 13px;
  }

label {
            font-size: 13px;
        }

        input {
            font-size: 13px;
        }

</style> --}}

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
                <input type="date" wire:model="fecha"  class="form-control" placeholder="Ingrese fecha de ingreso">
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
                    
                            <input type="number" wire:model.live="kilometraje"  class="form-control" placeholder="Ingrese Kilometraje">
                    
                    
                    
                              @error ('kilometraje')
                    
                                <small class="text-danger">{{$message}}</small>
                    
                              @enderror
                    
                         </div>    

            </div>

        </div>
    </div>
</div>


{{$this->autos1}}
    

 
    <div class="container">

        <h2  class="font-weight-bold text-center mb-5">Presupuesto</h2>
        <br>

        <div class="form-group">
   
          @foreach($reparar as $value => $label)
          <label class="mr-2">
            
              <input type="checkbox" wire:model="reparaciones" value="{{ $label->id }}">
              <label>{{ $label->name }}</label> <!-- Ajusta el atributo según tu modelo -->
          
               
               

                </label>
          @endforeach

          <br>
      
      
        </div>

         <table class="table table-bordered">

          <thead>
            <tr>
                <th>Trabajo</th>  
                <th>Cantidad</th>  
                <th>Precio</th>
                <th>Repuestos</th>
                <th>Aceite</th>
                <th>Cantidad Repuestos</th>
                <th>Precio Repuestos</th>
                <th>Total</th>
                <th>  
                    <button type="button"  wire:click="addField" class="btn btn-primary btn-sm">+</button>
                    
            </th>
            </tr>    
        </thead>  

        <tbody>
        @foreach($this->fields as $index => $field)

        <tr>

         

    
            <div wire:key="field-{{ $field['id'] }}" class="flex space-x-2 mb-4" >
                <td>
                <div>
                    
                    <input type="text" id="trabajo_{{ $index }}" wire:model="fields.{{ $index }}.trabajo" class="form-control">
                    @error('fields.' . $index . '.trabajo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>
            <td>
                <div>
                  
                    <input type="number" id="cantidad_{{ $index }}" min="0"  wire:model.lazy="fields.{{ $index }}.cantidad" wire:change="calcularAmount({{ $index }})" class="form-control">
                    @error('fields.' . $index . '.cantidad') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>
            <td>
                <div>
                   
                    <input type="number" min="0" id="precio_{{ $index }}" wire:model.lazy="fields.{{ $index }}.precio" wire:change="calcularAmount({{ $index }})" class="form-control">
                    @error('fields.' . $index . '.precio') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </td>


            <td>
              <div>
                 
                  <input type="text" id="repuestos_{{ $index }}" wire:model="fields.{{ $index }}.repuestos" class="form-control">
                  @error('fields.' . $index . '.repuestos') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
           </td>

           <td>

            <div>

             {{--  <div>
                <input type="checkbox" wire:model="fields.{{$index}}.checkbox1" id="checkbox1_{{$index}}">
                <label for="checkbox1_{{$index}}">Si</label>
            </div>
            <div>
                <input type="checkbox" wire:model="fields.{{$index}}.checkbox2" id="checkbox2_{{$index}}">
                <label for="checkbox2_{{$index}}">No</label>
            </div> --}}


            <div class="form-check">
              <input type="checkbox" wire:model.live="fields.{{ $index }}.checkbox1" id="checkbox1_{{$index}}" class="form-check-input">
              <label for="checkbox1_{{$index}}" class="form-check-label">Cambio de aceite</label>

              
            </div>

            <div class="form-check">

            <input type="checkbox" wire:model.live="fields.{{ $index }}.checkbox2" id="checkbox2_{{$index}}" class="form-check-input">
              <label for="checkbox2_{{$index}}" class="form-check-label">Para otro trabajo</label>
           
            </div>

         

            @if ($this->fields[$index]['checkbox1'])
               

                <div>
                  <label for="TipoAceite">Aceite</label>
                  <select wire:model="fields.{{$index}}.tipoAceite" class="form-control"  id="">

                    @foreach ($this->aceites as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                  </select>
    
                </div>

                @elseif($this->fields[$index]['checkbox2'])

                <div>
                  <label for="TipoAceite">Aceite</label>
                  <select wire:model="fields.{{$index}}.tipoAceite" class="form-control"  id="">

                    @foreach ($this->aceites as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                  </select>
    
                </div>

            @endif

           

            

           </td>

           <td>
            <div>
               
                <input type="number" min="0" id="cantidadRepuestos_{{ $index }}" wire:model.lazy="fields.{{ $index }}.cantidadRepuestos" wire:change="calcularAmount({{ $index }})" class="form-control">
                @error('fields.' . $index . '.cantidadRepuestos') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
             </td>


              <td>
              <div>
             
              <input type="number" min="0" id="precioRepuestos_{{ $index }}" wire:model.lazy="fields.{{ $index }}.precioRepuestos" wire:change="calcularAmount({{ $index }})" class="form-control">
              @error('fields.' . $index . '.precioRepuestos') <span class="text-red-500">{{ $message }}</span> @enderror
              </div>
             </td>


               <td>
               <div>
           
             <input type="number" id="amount_{{ $index }}" wire:model="fields.{{ $index }}.amount" class="form-control" readonly>
            @error('fields.' . $index . '.amount') <span class="text-red-500">{{ $message }}</span> @enderror 

           
               </div>
                  </td>
              
       </div>

            <td>
                	{{$index}}
                <button type="button" wire:click="removeField({{ $index }})" class="btn btn-danger text-red-500"><i class="fas fa-trash"></i></button>

            </td>
        

            
           
    
        @endforeach
      
    </tr>
    </tbody>

    <tfoot>
      <tr>
        <td style="border: none"></td>
        <td style="border: none"></td>
        <td style="border: none"></td>
        <td style="border: none"></td>
        <td style="border: none"></td>
        <td style="border: none"></td>
        <td ><b class="text-lg font-bold">Total:</b></td>
        <td><b class="total"> ${{ number_format($total, 2) }}</b> </td>
      </tr>

    </tfoot>


    </table>
    
</div>





<div class="container">

<div class="form-group">
    
  <p class="font-weight-bold">Estado

</p>
  <label for="">
    <div class="form-check">
      <input class="form-check-input" type="radio" wire:model="status" id="opcion1" value="1" checked>
      <label class="form-check-label" for="status">
        No Publicar
      </label>
    </div>
  </label>
   
     <!--El cliente no tendra acceso a esta publicacion y o reparacion -->
     <label for="">
    <div class="form-check">
      <input class="form-check-input" type="radio" wire:model="status" id="opcion2" value="2">
      <label class="form-check-label" for="opcion2">
        Publicado
      </label>
    </div>
  </label>
   
  <br>

  @error ('status')

    <small class="text-danger">{{$message}}</small>

  @enderror

</div>

</div>


<div class="container">

  <div class="image-wrapper"> 

  @if ($currentImage)
      <div class="mb-4">
          <img src="{{ asset('storage/' . $currentImage) }}" alt="Imagen actual"  class="w-48 h-48 object-cover">
      </div>

   
  @endif

  <input type="file" wire:model="image">

  @error('image')
      <span class="error">{{ $message }}</span>
  @enderror

  <div wire:loading wire:target="image">Cargando...</div>

</div>

</div>

<br>

  <div class="container">

<div class="form-group">

  <label for="problema">Descripcion de la falla</label>
    <textarea wire:model="problema" id="" cols="5" class="form-control" rows="8"></textarea>

</div>


<div class="form-group">

  <label for="solucion">Solucion y repuestos</label>
  <textarea wire:model="solucion" id="" cols="5" class="form-control" rows="8"></textarea>

</div>


</div>



    <div class="pt-3">
    <button type="button" wire:click="store" class="btn btn-primary text-green-500">Guardar</button>
    </div>

   </form> 


</div>

</div>

@push('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>



    document.addEventListener('livewire:load', function () {
        Livewire.on('registroCreado', () => {
            Swal.fire({
                title: 'Registro guardado con éxito!',
                text: 'La orden de trabajo fue registrada con éxito!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    });


          document.addEventListener('livewire:load', function () {
            Livewire.on('kilometrajeErrado', () => {
              Swal.fire({
            icon: "error",
            title: "Kilometraje errado!",
            text: "El kilometraje no puede ser menor o igual al kilometraje registrado anteriormente",
          
          });
        });
      }); 
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

 
<!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->



{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"> </script> --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


 <script>
  document.addEventListener('livewire:load', function () {
      window.addEventListener('disable-checkbox', event => {
          let element = document.querySelector(`input[name="fields.${event.detail.id}.${event.detail.checkbox}"]`);
          if (element) {
              element.checked = false;
          }
      });
  });
</script>

@endpush