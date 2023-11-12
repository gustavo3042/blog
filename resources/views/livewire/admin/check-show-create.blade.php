<div>
    




<div class="card pt-4 mt-5">
    <div class="card-header">

        <a class="btn btn-primary btn-sm" href="{{route('check.show',$check_id)}}">Volver</a>
        <br>
        <div class="card-title">Trabajador:{{$name}} {{$surname}} | {{$rut}}</div>
    
      
    </div>
    <div class="card-body">
        <div class="container">

            <h4>Datos de la faena</h4>
            <div class="row">

            

                <div class="col">

                   
                    <div class="form-group">
                        <strong>Marca :</strong>
                        {{$auto->marca}}
                    </div>
                    <div class="form-group">
                        <strong>Modelo :</strong>
                        {{$auto->modelo}}
                    </div>
                    <div class="form-group">
                        <strong>Año :</strong>
                        {{$auto->ano}}
                    </div>
              

                </div>

                <div class="col">

                    <div class="form-group">
                        <strong>Reparacion :</strong>
                        {{$faena->problema}}
                    </div>


                    <div class="form-group">
                        <strong>Reparacion :</strong>
                        {{$faena->solucion}}
                    </div>

                </div>

            </div>
        <h1 class="card-title mb-3">Crear Porcentaje faena </h1>

         

        <form method="POST" action="{{route('edit.jobs')}}" >
                   
            @csrf

              

                <input type="hidden" name="idWorker"  value="{{$worker_id}}">

              
                    
             
                <input type="hidden" name="check" value="{{$check_id}}">

            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Trabajo</th>
                            <th>Precio</th>
                            <th>Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach ($faenasWorkers as $item)
                       
                
                        <tr>
                       
                            <td><input type="text" name="trabajo[]" class="form-control" value="{{$item->trabajo }}" readonly></td>
                            <td><input type="number" class="form-control" name="precio[]" value="{{$item->precio}}" readonly></td>

                        <td>

                         
                                
                            <input type="number"  name="porcent[]" class="form-control" >
                            <input type="hidden" name="idFaenas[]" value="{{$item->idFaenas}}">

                         

                        </td>

                        </tr>
                    @endforeach   
                    </tbody>
                    <tfoot>
                    <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>    
                    </tr>
                    </tfoot>
                    </table>



                <div class="modal-footer">
                
                    
                    <button  type="submit" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
          
        </form>
       

    </div>


    </div>
  
</div>


</div>
