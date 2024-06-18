<div>
   
   <div class="card mt-5">

      <div class="card-body">
      
     <div class="card-title">

      <h3>Compras Repuestos</h3>

     </div>

   <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Patente</th>
              <th>Reparaciones</th>
              <th>Costo Repuestos</th>
              <th>Cantidad Repuestos</th>
              <th>Costo Unitario Repuestos</th>
            
              <th>Repuestos</th>
              <th>Acciones</th>
             
          </tr>
      </thead>
      <tbody>


         @php
         $totalPrice = 0; // Inicializa el acumulador
         @endphp


          @foreach ($registros as $item)
          <tr>
              <td scope="row">{{$item->id}}</td>
              <td>{{$item->patente}}</td>


              @foreach ($item->presupuestos as $i)
              <td>
              <ul>
              @foreach ($i->presupuestosDetails as $e)
              
              <li>{{$e->trabajo}}</li>
              
              @endforeach
               </ul>
              </td>
              @endforeach
             
                  @foreach ($item->presupuestos as $val)
                  <td>
                     <ul>
                        @foreach ($val->presupuestosDetails as $k)
                  
                        <li>{{$k->totalRepuestos}}</li>

                        @php
                        $totalPrice += $k->totalRepuestos; // Acumula el precio
                        @endphp

                        @endforeach
                     </ul>   
                  </td>
                  @endforeach



                  @foreach ($item->presupuestos as $l)
                  <td>
                     <ul>
                        @foreach ($l->presupuestosDetails as $v)
                  
                        <li>{{$v->cantidadRepuestos}}</li>

                    

                        @endforeach
                     </ul>   
                  </td>
                  @endforeach


                  @foreach ($item->presupuestos as $n)
                  <td>
                     <ul>
                        @foreach ($n->presupuestosDetails as $m)
                  
                        <li>{{$m->precioRepuestos}}</li>

                      

                        @endforeach
                     </ul>   
                  </td>
                  @endforeach


                


               @foreach ($item->presupuestos as $u)
               <td>
               <ul>
               @foreach ($u->presupuestosDetails as $a)
               
               <li>{{$a->descripcion}}</li>
               
               @endforeach
                </ul>
               </td>
               @endforeach

               <td>

                  <div class="btn-group">

                     <a class="btn btn-success btn-sm" href="">Reparación</a>

                  </div>

               </td>


                  
             
          </tr>

        
          @endforeach
      </tbody>
      <tfoot>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><p class="font-weight-bold">Total:{{ $totalPrice }}</p></td>
         </tr>
      </tfoot>
    
  </table>


</div>


<div class="card-body">
      
   <div class="card-title">

    <h3>Compras Insumos</h3>

   </div>

 <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Acciones</th>
           
        </tr>
    </thead>
    <tbody>


      @php
          

          $acumInsumos = 0;
 
      @endphp


        @foreach ($insumos as $values)
        <tr>   
         <td>{{$values->id}}</td>
         <td>{{$values->name}}</td>
         <td>{{$values->descripcion}}</td>
         <td>{{$values->stock}}</td>
         <td>{{$values->precioCompra}}</td>
         <td>{{$values->precio}}</td>
           

         <td>

            <div class="btn-group">

               <a class="btn btn-success btn-sm" href="">Reparación</a>

            </div>

         </td>
                
         @php
             $acumInsumos += $values->precioCompra * $values->stock; 
         @endphp
           
        </tr>

      
        @endforeach
    </tbody>
    <tfoot>
       <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        
          <td><p class="font-weight-bold">Total:{{ $acumInsumos }}</p></td>
       </tr>
    </tfoot>
  
</table>


</div>

</div>
   
</div>
