<div>

@include('livewire.admin.modals.update',['check'=>$check])


  
<div style="padding: 15px;" class="card">

    <div class="card-header">
    
        <div style="padding: 3px;" class="">

            @if ($checks->statusNow == 1)
            <span class="card-title">Faena Activa</span>
            @elseif($checks->statusNow == 0)
            <span class="card-title">Faena Terminada</span>
            @endif
          
        </div>

        <br>

        <div style="padding: 4px;" class="float-left">

        <a class="btn btn-primary btn-sm mb-2 " href="{{route('check.index')}}" >volver</a>
        
        </div>
        
        </div>

 <div class="container pt-3" >


   {{--  <div class="card-body">
        <div class="container">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>Hola</th>
                        <th>Perra</th>

                    </tr>

                </thead>


                <tbody>

                    <tr>

                        <td>Pruebas1</td>
                        <td>Pruebas2</td>

                    </tr>

                </tbody>

            </table>

        </div>
    </div> --}}

    <div class="row">

        <div class="col-sm-4">

         

    <div class="form-group">
        <strong>Faena:</strong>
        {{ $checks->id }}
    </div>
    <div class="form-group">
        <strong>Jefe de Faena:</strong>
        {{ $checks->user->name }}
    </div>
    <div class="form-group">
        <strong>Estado:</strong>
        {{$checks->status == 2 ? 'Publicado' : 'No Publicado'}}

    </div>
    <div class="form-group">
        <strong>Inicio:</strong>
        {{$checks->fecha}}
    </div>
    <div class="form-group">
        <strong>Horas Trabajadas:</strong>
        {{$checks->workHours}}

    </div>
        

    <div class="form-group">
        <strong>Cliente:</strong>
        {{$clientes->nombre }}
       
    </div>



</div>


<div class="col-sm-4">




<div class="form-group">
    <strong>Tipo Reparación:</strong>

    @foreach ($reparaciones as $item)
        
    {{$item->name}}

    @endforeach
 
    
</div>

<div class="form-group">

    <strong>Trabajos:</strong>
    @foreach ($details as $trabajos)
     {{$trabajos->trabajo}}<br/>   
    @endforeach

</div>


<div class="form-group">

    <strong>Repuestos:</strong>
    @foreach ($details as $repuestos)
     {{$repuestos->descripcion}}<br/>   
    @endforeach

</div>

</div>




<div class="col-sm-4">

    

    <div class="form-group">
        <strong  >Marca :</strong>
    {{$autos->marca}}
       
        
    </div>


    <div class="form-group">
        <strong>Modelo :</strong>
    {{$autos->modelo}}
       
        
    </div>


    <div class="form-group">
        <strong>Año :</strong>
    {{$autos->ano}}
       
        
    </div>

    <div class="form-group">
        <strong>Traccion :</strong>
    {{$autos->tipoTraccion}}
       
        
    </div>


    <div class="form-group">
        <strong>Combustion :</strong>
    {{$autos->tipoCombustion}}
       
        
    </div>


    <div class="form-group">
        <strong>Cilindros :</strong>
    {{$autos->cilindrada}}
       
        
    </div>


</div>

</div>

</div>

 

    <hr />

    <h6 class="mb-0 text-uppercase">Estadisticas</h6>
    <hr />




   


    @if (Session::has('Mensaje2'))

    <div class="alert alert-warning" role="alert">
      {{Session::get('Mensaje2')}}
    </div>

    @endif





    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">


        


        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1">{{$workersActive->count()}} </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='fas fa-user'></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Asistencia</p>
                            <h4 class="my-1">
                               {{$workExist}}/ {{$workersActive->count()}}
                               </h4>
                                <p class="mb-0 font-13 text-info"></i>%</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i 
                                class="fas fa-check"></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>


        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Inasistencias</p>
                            <h4 class="my-1">{{$allAsistencias}}</h4>
                                <p class="mb-0 font-13 text-info"></i>%</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto">
                                <i 
                                class="fas fa-calendar-times"></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>




        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Licencias</p>
                            <h4 class="my-1">{{$allLicencias}} </h4>
                                <p class="mb-0 font-13 text-info"></i>Ausente</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto">
                                <i 
                                class="fas fa-briefcase-medical"></i>
                                
                              </div>
                             </div>
                    </div>
             </div>
        </div>

        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Costo de Reparación</p>
                            <h4 class="my-1">${{ $allPrecioTotal->total}}</h4>
                                <p class="mb-0 font-13 text-info"></i>Por faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='fas fa-wrench'></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>




        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Total Pago Trabajadores</p>
                            <h4 class="my-1">{{$allJobs}}</h4>
                                <p class="mb-0 font-13 text-info"></i>Por faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='fas fa-chart-bar'></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>




        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Ganancias taller</p>
                            <h4 class="my-1">{{$allGanancias}} </h4>
                                <p class="mb-0 font-13 text-info"></i>Por faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='fas fa-child'></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>




        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                          <p class="mb-0 text-secondary">Estado actual de la faena</p>
                            <h4 class="my-1"> </h4>

                            <form method="POST" action="{{route('check.status',$check)}}">
                                @csrf
                                {{ method_field('PUT') }}
                                @if ($checks->statusNow == 1)
                                En Proceso:
                                <button type="submit" name="finalizar" value="1" class="btn btn-primary btn-sm">Finalizar?</button>
                                

                                @elseif($checks->statusNow == 0)

                                Finalizada:
                                <button type="submit" name="continuar" value="2" class="btn btn-primary btn-sm">Activar?</button>

                                @endif

                            </form>

                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
                              </div>
                             </div>
                    </div>
             </div>
        </div>


    </div>

</div>

     
<div style="padding: 15px;">
       
    <div class="row">
    
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('addWorkers') }}" method="POST">

                    {!! csrf_field() !!}
                    @csrf

                    <input type="hidden" name="faenaActiva_id" value="{{$checks->id}}">




                   
                        <div class="form-group">
                            {{ Form::label('Trabajadores') }}
                            <select class="form-control" id="workers" name="workers[]" multiple="multiple"
                                style="height: 20em;">

                                @foreach ($workers as $worker)
                                <option value="{{ $worker->id }}"> {{ $worker->name }}
                                    {{ $worker->surname }} {{ $worker->surname2 }} |
                                    {{ $worker->rut }}
                                </option>
                            @endforeach
                              
                            </select>
                        </div>

                        <div class="mt-5">


                            <input class="btn btn-primary btn-lg" id="submitButton" type="button"
                                value="Registrar" onclick="submitForm(this);" />

                        </div>
                  




                </form>
            </div>
        </div>
    </div>

</div>

</div>

  

 

        <div class="card">

            <div class="card-header">

                <div class="float-left">
                    
              
                    <a class="btn btn-primary" href="{{route('assistance.pasar',$checks->id)}}"> <i
                        class="fas fa-user-check"></i>Asistencia</a>

                    <a class="btn btn-primary" href="{{route('productions.produccion',$checks->id)}}">
                        <i class="fas fa-calculator"></i>Producción</a>

                </div>

            </div>


            <div class="card-body">

                @if (Session::has('Mensaje'))

                <div class="alert alert-success" role="alert">
                  {{Session::get('Mensaje')}}
                </div>
            
                @endif


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3"> </th>
                                <th colspan="2">Jornada a Trato</th>
                                <th colspan="2">Jornada al día</th>
                            </tr>


                            <tr>
                                <th>N°</th>
                                <th width="10%">Rut</th>
                                <th>Nombre</th>
                                <th>Asistencia</th>
                                <th>Cantidad</th>
                                <th>Rendimiento</th>
                                <th>Pago Diario</th>
                                <th>Porcentaje acumulado</th>
                                <th>Pago %</th>
                                
                             
                                <th width="10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($choreWorkers as $workers)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $workers->rut }}</td>
                                    <td> {{ $workers->name }} {{ $workers->surname }}
                                        {{ $workers->surname2 }}</td>
                                    <td>
                                        @if ($workers->presente == 1)
                                            <span class="badge rounded-pill bg-success">Presente</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inasistencia</span>
                                        @endif
                                    </td>
                                    <td>

                                    

                                            @if ($workers->cantidad > 0)
                                            <span class="badge  bg-info">{{ $workers->cantidad ?? 'Sin Producción' }} </span> 
                                            @else
                                            <span class="badge  bg-danger">{{ $workers->cantidad ?? 'Sin Producción' }} </span> 
                                            @endif

                                  
                                    
                        
                                    </td>
                                    <td> {{ $workers->rendimiento ?? '-' }} hrs</td>
                                    <td>${{ $workers->pagodiario ?? '-' }}</td>
                                    <td>

                                        @if ($workers->porcentaje > 0)

                                        <a type="submit" style="font-size: 10px;"   href="{{route('check.showEdit',$workers->workersCheck_id)}}" class="btn btn-primary btn-sm">
                                            <i class="">{{$workers->porcentaje}}%</i></a>
        

                                        @else

                                        <a type="submit" style="font-size: 10px;" href="{{route('check.showCreate',$workers->workersCheck_id)}}"  class="btn btn-danger btn-sm">
                                            <i style="font-size: 10px;" class="">{{$workers->porcentaje}}%</i>Sin Producción</a>
        
                                            
                                        @endif

                                 
                                    </td>

                                    <td>${{ $workers->pagoporcentaje ?? '-' }}</td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">


                                        <button style="font-size: 10px;" data-toggle="modal" data-target="#porcentajeModalDelete" wire:click="deletesPorcentajes({{ $workers->workersCheck_id }})" class="btn btn-danger">
                                            <i class="fas fa-trash"></i></button>

                                      

                                    </div>
                                    </td>

                                </tr>
                            @endforeach
                            <script type="text/javascript">
                                window.livewire.on('userStore', () => {
                                  //  $('#exampleModal').modal('hide');
                                    $('#porcentajeModal').modal('hide');
                                    $('#porcentajeModalEdit').modal('hide');
                                    $('#porcentajeModalDelete').modal('hide');
                                    
                                });
                            </script> 
                        </tbody>
                    </table>
                </div>


            </div>



        </div>

    


</div>


