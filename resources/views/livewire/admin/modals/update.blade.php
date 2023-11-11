<!-- Modal -->



<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trabajos realizados por {{$name}} {{$surname}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('edit.jobs') }}">
                   
                    @csrf

                 

            
                        <input type="text" name="idWorker" wire:model="idWorker">
                  
                        <input type="text" name="check" value="{{$check}}">

                        <div class="form-group">

                            <p class="font-weight-bold">Trabajos</p>
                            
                       
        
                            @foreach ($details as $key => $jobs)
                                
        
                            <tr>
                            
                                <td scope="row">
                               
                                <input class="form-check-input ml-4"
                                type="checkbox" name="job[{{ $key }}]"
                                 value="{{$jobs->id}}" >
                                {{$jobs->trabajo}}
        
        
                                
                                </td>       

                                <td>

                                    <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                                </td>
                              
                            </tr>
        
                                                   
                            @endforeach
                            
                            </div>
        
        

                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>




<div wire:ignore.self class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trabajos realizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('change.jobs') }}">
                   
                    @csrf

                 

            
                    <input type="hidden" name="idWorker[]" wire:model="idWorker">
                  
                    <input type="text" name="check" value="{{$check}}">

                <div class="form-group">

                    <p class="font-weight-bold">Trabajos</p>
                    
                    @foreach ($jobNew as $index => $item)

                    @foreach ($details as $key => $jobs)
                        

                 
                        
                   
                    @if ($jobs->id == $item->presupuesto_details_id)
                        
                 
                        
                   
                    <tr>
                    
                        <td scope="row">
                       
                        <input class="form-check-input ml-4"
                        type="checkbox" name="job[{{ $key }}]"
                         value="{{$jobs->id}}" checked>
                        {{$jobs->trabajo}}


                        
                        </td>

                        <td>

                            <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                        </td>
                    
                      
                    </tr>

                    @elseif($jobs->id != $item->presupuesto_details_id)


                    <tr>
                    
                        <td scope="row">
                       
                        <input class="form-check-input ml-4"
                        type="checkbox" name="job[{{ $key }}]"
                         value="{{$jobs->id}}" >
                  
                        
                        </td>

                        
                        <td>

                            <input type="hidden" name="trabajos[{{$key}}]" value="{{$jobs->trabajo}}">

                        </td>
                      
                    </tr>

                    @endif
                  
                    @endforeach
                    
                    @endforeach
              
                    </div>



                    
                    

                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="porcentajeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Porcentajes por faena crear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <h5 class="modal-title text-center pt-3">Trabajador</h5>

            <div class="container pt-3">

                <div class="row">

                    <div class="col">
                        <p>Nombre:</p>
                        <p>{{$name}} {{$surname}}</p>

                    </div>

                    <div class="col">
                        <p>Rut</p>
                        <p>{{$rut}}</p>

                    </div>

                </div>

            </div>

            <div class="modal-body">
                <form method="POST" action="{{route('edit.jobs')}}" >
                   
                    @csrf

                        @if (isset($idWorker))

                        <input type="text" name="idWorker"  wire:model="idWorker">

                        @else

                        no hay
                            
                        @endif
                  
                        <input type="text" name="check" value="{{$check}}">

                    
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
                        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Cerrar</span>
                            </button>
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="porcentajeModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Porcentajes por faena</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <h5 class="modal-title text-center pt-3">Trabajador1</h5>

            <div class="container pt-3">

                <div class="row">

                    <div class="col">
                        <p>Nombre:</p>
                        <p>{{$name}} {{$surname}}</p>

                    </div>

                    <div class="col">
                        <p>Rut</p>
                        <p>{{$rut}}</p>

                    </div>

                </div>

            </div>

            <div class="modal-body">
                <form method="POST" action="{{route('check.porcentaje')}}" >
                   
                    @csrf

                 

            
                        <input type="text" name="idWorker"  wire:model="idWorker">
                  
                        <input type="text" name="check" value="{{$check}}">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Trabajo</th>
                                    <th>Precio</th>
                                    <th>Porcentaje</th>
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
                            <button  type="button" onclick="submitForm(this);" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                        </div>
                  
                </form>
            </div>
          
       </div>
    </div>
</div>