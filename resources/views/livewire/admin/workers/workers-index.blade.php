<div>



    <div class="card">

        @if (session()->has('Mensaje'))
            <div class="alert alert-success">
                {{ session('Mensaje') }}
            </div>
        @endif

       

        <div class="card-header">
            <div class="card-title">Trabajadores</div>
        </div>



        @if ($allWorkers->count())
            <div class="card-body">
                <div>

                    <input wire:model="search" class="form-control mb-5 float-right col-sm-3" placeholder="Buscar">
                    <a class="btn btn-info mr-3 " href="{{ route('workers.create') }}"> <i class="fas fa-check"></i>
                        Crear Trabajador</a>

                </div>

              

                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>

                            <tr>

                               
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Estado</th>
                                <th>Acciones</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($allWorkers as $item)
                                <tr>
                                    <td width="40%">
                                       
                                        @isset($item->image)

                                        <img id="picture" height="20%" width="20%" src="{{asset('storage').'/'.$item->image->url}}" alt="">
                                      
                                      @else
                                      
                                          <img id="picture" height="20%" width="20%" src="https://media.istockphoto.com/id/1400087171/es/foto/conceptos-de-planificaci%C3%B3n-empresarial-procesos-y-flujos-de-trabajo-empresariales-de-alto.jpg?s=1024x1024&w=is&k=20&c=tGGEjHYT-AK-WhWqfpk24U41CHPMTaXuqpLNFSRf6s8=" alt="">
                                      
                                      @endif
                                    </td>
                                 
                                    <td>{{ $item->name }} {{ $item->surname }}</td>
                                    <td>{{ $item->rut }}</td>
                                    <td>

                                        @if ($item->status == 1)
                                            <span class="badge  bg-success">Habilitado</span>
                                            @elseif($item->status == 0)
                                            <span class="badge  bg-danger">Deshabilitado</span>

                                        @endif

                                    </td>
                                    <td>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" class="btn btn-info btn-sm"
                                                href="{{route('workers.edit',$item->id)}}">Editar</a>

                                                <form action="{{route('workers.delete',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                           
                                                @if ($item->status == 1)

                                                <a type="button" class="btn btn-warning btn-sm" href="{{route('workers.disabled',$item->id)}}">Deshabilitar</a>

                                                @elseif($item->status == 0)
                                                <a type="button"  class="btn btn-success btn-sm" href="{{route('workers.enable',$item->id)}}">Habilitar</a>
                                                @endif
                                            

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                    {{$allWorkers->links()}}
                @else
                    <div class="card-body">
                        <div class="mb-5">

                            <input wire:model="search" class="form-control mb-5 float-right col-sm-3"
                                placeholder="Buscar">

                            <a class="btn btn-info mr-3 " href="{{ route('workers.create') }}"> <i
                                    class="fa-solid fa-plus"></i> Crear Trabajador</a>

                        </div>
                        <br>
                        <div class="alert alert-danger">
                            <strong>No existe el registro</strong>
                        </div>
                    </div>



                </div>


            </div>

        @endif

    </div>



</div>


<script>
    window.addEventListener('close-modal', event => {
  
  
  
        $('#importsModal').modal('hide');
  
    })
  </script>
