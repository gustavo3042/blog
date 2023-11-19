<div>
   
<div class="card">
   <div class="card-header">
      
     
      
      <a class="btn btn-primary btn-sm" href="{{route('check.show',$check)}}">Volver</a>
      @if ($check_lists->statusNow == 1 )
          Faena Activa

          @elseif($check_lists->statusNow == 0)

          Faena Finalizada

      @endif

      
      <br>
      Trabajador: <strong>{{$name}} {{$surname}} | {{$rut}}</strong>

     
   </div>
   <div class="card-body">
      <h4 class="card-title">Editar Producción</h4>

      <form method="POST" action="{{route('check.porcentaje')}}" >
                   
         @csrf
         
      

 
             <input type="text" name="idWorker"  wire:model="idWorker">
       
             <input type="text" name="check" value="{{$check}}">

             <table class="table">
                 <thead>
                     <tr>
                         <th>Trabajo</th>
                         <th>Precio $CLP</th>
                         <th>Porcentaje %</th>
                         <th>Pago porcentaje</th>
                     </tr>
                 </thead>
                 <tbody>
                @foreach ($faenasWorkers2 as $key => $item)
                    
             
                     <tr>
                         <input type="hidden" name="jobsId[]" value="{{$item->jobs_id}}" class="form-control">
                         <td><input style="font-size: 15px;" type="text" name="trabajo[]" class="form-control" value="{{$item->trabajo}}" readonly></td>
                         <td><input style="font-size: 15px;"  type="number" class="form-control" name="precio[]" value="{{$item->precio}}" readonly></td>

                     <td>

                      
                             
                         <input style="font-size: 15px;"  type="number"  name="porcent[]" class="form-control" value="{{ $item->totalPorcentaje }}" >
                         <input style="font-size: 15px;"  type="hidden" name="idFaenas[]" value="{{$item->idFaenas}}">

                      

                     </td>
                     <td>

                         <input style="font-size: 15px;"  type="number" value="{{ $item->amountPorcentaje }}" class="form-control" readonly>

                     </td>

                     </tr>
                 @endforeach   
                 </tbody>
                 <tfoot>
                 <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>Total: ${{$mostFinal}}</td>    
                 </tr>
                 </tfoot>
                 </table>
     



             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary"  data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">Cerrar</span>
                 </button>
                 <button  type="submit" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Guardar</button>
             </div>
       
     </form>
     
   </div>
   
</div>

</div>
