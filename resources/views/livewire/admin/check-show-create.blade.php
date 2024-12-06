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

                    <div class="form-group">
                        <strong>Reparacion :</strong>

                        @if ($faena->statusNow == 1)
                            En Proceso

                            @elseif($faena->statusNow == 0)

                            Faena Finalizada

                        @endif
                      
                    </div>

                </div>

            </div>
        <h1 class="card-title mb-3">Crear Producción</h1>

         

        <form method="POST" action="{{route('edit.jobs')}}" >
                   
            @csrf

              

                <input type="text" name="idWorker"  value="{{$workers_id}}">

              
                    
             
                <input type="text" name="check" value="{{$check_id}}">

            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Trabajo</th>
                            <th>Precio $CLP</th>
                            <th>Porcentaje%</th>
                            <th>Horas Trabajadas</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach ($faenasWorkers as $item)
                       
                
                        <tr>
                       
                            <td><input type="text" name="trabajo[]" class="form-control" value="{{$item->trabajo }}" readonly></td>
                            <td><input type="number" class="form-control" name="precio[]" value="{{$item->precio}}" readonly></td>

                        <td>

                         
                                
                            <input type="number"  name="porcent[]" class="form-control" placeholder="10" >
                            <input type="hidden" name="idFaenas[]" value="{{$item->idFaenas}}">
                           

                         

                        </td>
                        <td>
                            <select class="form-control" name="workingHrs[]"
                            >
                            <option value="0"
                        > Sin
                                Rendimiento </option>
                            <option value="0.5"
                             >30
                                Minutos</option>
                            <option value="1"
                             >1 hora
                            </option>
                            <option value="1.5"
                             >1
                                hora y media</option>
                            <option value="2"
                             >2 horas
                            </option>
                            <option value="2.5"
                                >2
                                horas y media</option>
                            <option value="3"
                              > 3
                                horas</option>
                            <option value="3.5"
                             >3
                                horas y media</option>
                            <option value="4"
                               >4 horas
                            </option>
                            <option value="4.5"
                               >4
                                horas y media</option>
                            <option value="5"
                            >5 horas
                            </option>
                            <option value="5.5"
                               >5
                                horas y media</option>
                            <option value="6"
                                >6 horas
                            </option>
                            <option value="6.5"
                              >6
                                horas y media</option>
                            <option value="7"
                               >7 horas
                            </option>
                            <option value="7.5"
                           >7
                                horas y media</option>
                            <option value="8"
                             >8 horas
                            </option>
                            <option value="8.5"
                             >8
                                horas y media</option>
                            <option value="9"
                              >9 horas
                            </option>
                            <option value="9.5"
                              >9
                                horas y media</option>
                            <option value="10"
                               >10
                                horas</option>
                            <option value="10.5"
                              >10
                                horas y media</option>
                            <option value="11"
                               >11
                                horas</option>
                            <option value="11.5"
                                >11
                                horas y media</option>
                            <option value="12"
                            >12
                                horas</option>
                            <option value="12.5"
                             >12
                                horas y media</option>
                            <option value="13"
                           >13
                                horas</option>
                            <option value="13.5"
                              >13
                                horas y media</option>
                            <option value="14"
                             >14
                                horas</option>
                            <option value="14.5"
                                >14
                                horas y media</option>
                            <option value="15"
                                >15
                                horas</option>
                            <option value="15.5"
                                >15
                                horas y media</option>
                        </select>
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
