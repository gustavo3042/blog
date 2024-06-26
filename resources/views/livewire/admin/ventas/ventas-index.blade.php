<div>
   
    <div class="card mt-5">
 
       <div class="card-body">
       
      <div class="card-title">
 
       <h3>Reparaciones</h3>
 
      </div>
 
    <table class="table">
       <thead>
           <tr>
               <th>ID</th>
               <th>Patente</th>
               <th>Reparaciones</th>
               <th>Costo Reparaciones</th>
               <th>Cantidad</th>
               <th>Costo Unitario</th>
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
 
                   <div class="btn-group">
 
                      <a class="btn btn-success btn-sm" href="{{route('check.show',$item->id)}}">Reparación</a>
 
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
             <td><p class="font-weight-bold">Total:{{ $totalPrice }}</p></td>
          </tr>
       </tfoot>
     
   </table>
 
 
 </div>
 
 
 <div class="card-body">
       
    <div class="card-title">
 
     <h3>Venta Insumos y Productos</h3>
 
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
 
                <a class="btn btn-info btn-sm" href="">Generar Venta</a>
 
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
 