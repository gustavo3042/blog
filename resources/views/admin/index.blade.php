@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')
   
@stop

@section('content')
 

    @if (auth()->user()->hasRole('Admin'))
        
  

    <div class="content-wrapper">
        <div class="page-header mt-5">
            <h3 class="page-title">
                Panel administrador
            </h3>
        </div>
    
     
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card text-white bg-warning">
    
                    <div class="card-body pb-0">
                        <div class="float-right">
                            <i class="fas fa-cart-arrow-down fa-4x"></i>
                        </div>
                        <div class="text-value h4"><strong>CLP {{$totalFinal + $totalCompras}} (MES ACTUAL)</strong>
                        </div>
                        <div class="h3">Compras e Insumos</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                        <a href="{{route('compras.index')}}" class="small-box-footer h4">Compras <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card  text-white bg-info">
    
                    <div class="card-body pb-0">
    
                        <div class="float-right">
                            <i class="fas fa-shopping-cart fa-4x"></i>
                        </div>
                        <div class="text-value h4"><strong>CLP {{$totalVentas}} (MES ACTUAL) </strong>
                        </div>
                        <div class="h3">Ventas</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                        <a href="{{route('ventas.index')}}" class="small-box-footer h4">Ventas <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
            </div>

        </div>
   
    
        <div class="container mt-5">


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                        aria-selected="true"><i class="fas fa-briefcase"></i>Ganancias Mes</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button  class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false"><i class="fas fa-cart-plus"></i>Compras Mes</button>
                </li>
        
        
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                      data-bs-target="#datos" type="button" role="tab" aria-controls="datos"
                      aria-selected="false"> <i class="fas fa-check"></i>Insumos Mes</button>
              </li>
              
              </ul>


        <div class="tab-content" id="myTabContent">
      
            <div class="tab-pane fade show active" id="home" role="tabpanel"
                aria-labelledby="home-tab">
                <canvas id="myChart"></canvas>

            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <canvas id="myChartCompras"></canvas>
            </div>

            <div class="tab-pane fade" id="datos" role="tabpanel" aria-labelledby="profile-tab">
                <p>Holis</p>
            </div>

         </div>


        </div>




        <div class="card-body mt-5 mb-5">


            <div class="container">


              
                <div class="card-title">
                    <h3>Reparaciones del Mes</h3>
                </div>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patente</th>
                                    <th>Total</th>
                                    <th>Reparaciones</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registros as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->patente}}</td>
                                   
                                        @foreach ($item->presupuestos as $val)
                                        <td>{{$val->total}}   </td>
                                        @endforeach


                                        @foreach ($item->presupuestos as $i)
                                        <td>
                                        <ul>
                                        @foreach ($i->presupuestosDetails as $e)
                                        
                                        <li>{{$e->trabajo}}</li>
                                        
                                        @endforeach
                                         </ul>
                                        </td>
                                        @endforeach

                                 

                                    <td>
                                            @if ($item->statusNow == 2)
                                            <span class="badge badge-success">Trabajo Terminado</span>
                                            @elseif($item->statusNow == 1)
                                            <span class="badge badge-danger">Trabajo En Proceso</span>
                                            @endif
                                      


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


            



               


            


        </div>
    
    </div>
            
 </div>


 @elseif(auth()->user()->hasRole('Cliente'))


 <div class="card mt-4">


    <div class="card-header">

        <h1 class="card-title">Bienvenido al Programa</h1>

    </div>

    <div class="card-body">


    </div>

 </div>

 


     
 @endif
      

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@php
    

@endphp

@section('js')
    <script> console.log('Hi!');</script>

   

     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"> </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


   {{--  <script>
        document.addEventListener('livewire:load', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
                    datasets: [{
                        label: 'Ganancias al Mes',
                        data: @json(array_values($totals)),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script> --}}



    <script>
        document.addEventListener('livewire:load', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets: [{
                        label: 'Ganancias Mes',
                        data: @json(array_values($totals)),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>



{{-- <script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('myChartCompras').getContext('2d');

        // Definir los nombres de los meses
        const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        // Obtener los datos desde PHP
        const totals = @json($totalComprasMes);

        // Crear los labels y datos para el gráfico
        const labels = [];
        const data = [];
        for (const [month, total] of Object.entries(totals)) {
            labels.push(monthNames[month - 1]);
            data.push(total);
        }

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Compras Mes',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script> --}}



{{-- <script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('myChartCompras').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre'],
                datasets: [{
                    label: 'Compras Repuestos Mes',
                    data: @json(array_values($totalComprasMes)),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script> --}}


 


{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('livewire:load', function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chartData = @json($chartData);
        
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: '# of Sales',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script> --}}



<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('myChartCompras').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Compra Repuestos',
                    data: @json(array_values($totalComprasMes)),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


@stop
