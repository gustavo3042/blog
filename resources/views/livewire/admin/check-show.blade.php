<div>

 
  
<div style="padding: 15px;" class="card">

    <div class="card-header">
    
        <div style="padding: 3px;" class="">
            <span class="card-title">Faena Activa</span>
        </div>

        <br>

        <div style="padding: 4px;" class="float-left">

        <a class="btn btn-primary btn-sm mb-2 " href="{{route('check.index')}}" >volver</a>
        
        </div>
        
        </div>

 <div class="container pt-3" >

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




    @if (Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">
      {{Session::get('Mensaje')}}
    </div>

    @endif


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
                                class="fas fa-list"></i>
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
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i>%</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
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
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
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
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
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
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
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
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
                        </div>
                             <div class="widgets-icons bg-light-info text-info ms-auto"><i
                                class='bx bx-group'></i>
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
                          <p class="mb-0 text-secondary">Trabajadores</p>
                            <h4 class="my-1"> </h4>
                                <p class="mb-0 font-13 text-info"></i> En faena</p>
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
                                <th>Porcentaje</th>
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
                                    <td> {{ $workers->cantidad ?? 'Sin Producción' }} 

                                      

                                    </td>
                                    <td> {{ $workers->rendimiento ?? '-' }} hrs</td>
                                    <td>${{ $workers->pagodiario ?? '-' }}</td>
                                    <td>%{{ $workers->porcentaje ?? '-' }}</td>

                                    <td>${{ $workers->pagoporcentaje ?? '-' }}</td>
                                  
                                  
                                    <td>

                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="activeChore"
                                                value="">
                                            <input type="hidden" name="worker" value="">

                                            <button type="submit" class="btn btn-danger" style="width: 50%;"
                                                data-toggle="tooltip" data-placement="top" title="X">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>



        </div>

    


</div>


