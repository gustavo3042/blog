<div>

    <div class="card mt-5">


        <div class="card-header mt-4">

            <h3 class="card-title">Linea de Tiempo Reparación</h3>
        </div>

    <div class="card-body">

  


    <div class="container mt-4">

       
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group-horizontal">
                 {{--    @foreach ($fechas as $key => $evento) --}}



                        @if ($worksCar->status == 2 && !empty($worksCar->fecha))
                            
                    
                           
                        <li class="list-group-item text-center bg-primary text-white"  data-toggle="modal" data-target="#editarChange"  wire:click="changeStatus({{ $worksCar->id }})">
                            
                            <strong>1</strong> <br>
                            <strong></strong>
                            <small>{{ $worksCar->fecha }}</small>
                        </li>
                   

                            <li class="list-group-item border-0">
                                <span class="text-secondary">➡️</span>
                            </li>

                            @endif


                            @if ($worksCar->status == 2 && !empty($worksCar->fecha) && !empty($worksCar->fecha_intermedia))


                            <li class="list-group-item text-center text-center bg-warning text-white" data-toggle="modal" data-target="#editarChange"  wire:click="changeStatus({{ $worksCar->id }}, 'desactivar')">
                                <strong>2</strong> <br>
                                <strong></strong>
                                <small>{{ $worksCar->fecha_intermedia ?? '' }}</small>
                            </li>


                            <li class="list-group-item border-0">
                                <span class="text-secondary">➡️</span>
                            </li>


                            @elseif($worksCar->status == 2 && !empty($worksCar->fecha) && empty($worksCar->fecha_intermedia))
                            

                            <li class="list-group-item text-center text-center bg-secondary text-white" data-toggle="modal" data-target="#editarChange"  wire:click="changeStatus({{ $worksCar->id }}, 'activar')">
                                <strong>2</strong> <br>
                                <strong></strong>
                                <small>{{ $worksCar->fecha_intermedia ?? ''}}</small>
                            </li>


                            <li class="list-group-item border-0">
                                <span class="text-secondary">➡️</span>
                            </li>
                                
                            @endif


                            @if ($worksCar->status == 2 && empty($worksCar->fechaTermino))
                    
                            <li class="list-group-item text-center bg-secondary text-white">
                                <strong>3</strong> <br>
                                <small>{{ $worksCar->fecha_intermedia}}</small>
                            </li>

                            @endif
                    
                {{--     @endforeach --}}
                </ul>
            </div>
        </div>
    </div>


</div>
</div>


<div wire:ignore.self class="modal fade" id="editarChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Proceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                {{$fechaIntermedia}}
               


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click.prevent="closeModal(a)"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cerrar</span>
                    </button>
                    <button  type="button" wire:click.prevent="" class="btn btn-primary" data-dismiss="modal">Editar</button>
                </div>
               
            </div>
          
       </div>
    </div>
</div>

</div>
