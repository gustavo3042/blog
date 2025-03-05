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
                            
                       
                        <li class="list-group-item text-center bg-primary text-white">
                     {{--    <li class="list-group-item text-center {{ $worksCar->status == 1 ? 'bg-success text-white' : ($worksCar->status == 2 ? 'bg-warning text-dark' : 'bg-light') }}"> --}}
                            <strong>{{ $worksCar->id }}</strong> <br>
                            <small>{{ $worksCar->fecha }}</small>
                        </li>

                            <li class="list-group-item border-0">
                                <span class="text-secondary">➡️</span>
                            </li>

                            @endif


                            <li class="list-group-item text-center {{ $worksCar->status == 1 ? 'bg-success text-white' : ($worksCar->status == 2 ? 'bg-warning text-dark' : 'bg-light') }}">
                                <strong>{{ $worksCar->id }}</strong> <br>
                                <small>{{ $worksCar->fecha }}</small>
                            </li>


                            <li class="list-group-item border-0">
                                <span class="text-secondary">➡️</span>
                            </li>


                            <li class="list-group-item text-center {{ $worksCar->status == 1 ? 'bg-success text-white' : ($worksCar->status == 2 ? 'bg-danger text-dark' : 'bg-light') }}">
                                <strong>{{ $worksCar->id }}</strong> <br>
                                <small>{{ $worksCar->fecha }}</small>
                            </li>
                    
                {{--     @endforeach --}}
                </ul>
            </div>
        </div>
    </div>


</div>
</div>

</div>
