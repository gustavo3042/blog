<div>
   
    <div class="card mt-5">
 
       <div class="card-body">
       
      <div class="card-title">
 
       <h3>Reparaciones</h3>

       <a class="btn btn-primary" href="{{route('ventas.dynamicForm')}}">Dinamicos</a>
 
      </div>

   <div class="table-responsive">
    <table class="table">
       <thead>
           <tr>
               <th>ID</th>
               <th>Patente</th>
               <th>Reparaciones</th>
               <th>Costo Reparaciones</th>
               <th>Cantidad</th>
               <th>Costo Unitario</th>
               <th>Estado</th>
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
                   
                         <li>{{$k->amount}}</li>
 
                         @php
                         $totalPrice += $k->amount; // Acumula el precio
                         @endphp
 
                         @endforeach
                      </ul>   
                   </td>
                   @endforeach
 
 
 
                   @foreach ($item->presupuestos as $l)
                   <td>
                      <ul>
                         @foreach ($l->presupuestosDetails as $v)
                   
                         <li>{{$v->cantidad}}</li>
 
                     
 
                         @endforeach
                      </ul>   
                   </td>
                   @endforeach
 
 
                   @foreach ($item->presupuestos as $n)
                   <td>
                      <ul>
                         @foreach ($n->presupuestosDetails as $m)
                   
                         <li>{{$m->precio}}</li>
 
                       
 
                         @endforeach
                      </ul>   
                   </td>
                   @endforeach
 
 
                 
                   <td>
                     @if ($item->statusNow == 2)
                     <span class="badge badge-success">Trabajo Terminado</span>
                     @elseif($item->statusNow == 1)
                     <span class="badge badge-danger">Trabajo En Proceso</span>
                     @endif
               


                  </td>
 
              
 
                <td>
 
                   <div class="btn-group">
 
                      <a class="btn btn-info btn-sm" href="{{route('check.show',$item->id)}}">Reparación</a>
 
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
 </div>
 
 
 <div class="card-body">
       
    <div class="card-title">
 
     <h3>Venta Insumos y Productos</h3>
 
    </div>

<div class="table-responsive">
  <table class="table">
     <thead>
         <tr>
      
             <th>Nombre</th>
             <th>Descripción</th>
             <th>Stock</th>
             <th>Precio Compra</th>
             <th>Precio Venta</th>
             <th>Ventas</th>
             <th>Acciones</th>
            
         </tr>
     </thead>
     <tbody>
 
 
       @php
           
           $totalVentas = 0;
  
       @endphp
 
 
         @foreach ($insumos as $values)
         <tr>   
       
          <td>{{$values->name}}</td>
          <td>{{$values->descripcion}}</td>
          <td>{{$values->stock}}</td>
          <td>{{$values->precioCompra}}</td>
          <td>{{$values->precio}}</td>
          <td>{{$values->totalVentas()}}</td>
            
 
          <td>
 
             <div class="btn-group">
 
                <a class="btn btn-info btn-sm" href="{{route('ventas.createVenta',$values->id)}}">Generar Venta</a>
 
             </div>
 
          </td>
                 
          @php
           $totalVentas += $values->totalVentas();
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
         
           <td><p class="font-weight-bold">Total:{{ $totalVentas }}</p></td>
        </tr>
     </tfoot>
   
 </table>
</div>
 
 
 </div>
 
 </div>
    
 </div>
 