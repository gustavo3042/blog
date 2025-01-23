<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 100%; max-width: 800px; margin: 0 auto; }
        .header { text-align: center; padding: 20px; border-bottom: 2px solid #000; }
        .title { font-size: 24px; font-weight: bold; }
        .info { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .total { text-align: right; font-size: 18px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">Presupuesto</div>
        </div>

        <div class="info">
            <p><strong>Cliente:</strong> </p>
            <p><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</p>
        </div>

        <h3>Trabajos</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Trabajo</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                   
                    <th>Repuestos</th>
                    <th>Cantidad Repuestos</th>
                    <th>Total Repuestos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $trabajo)
                @foreach ($trabajo->presupuestosDetails as $item)
                        <tr>
                        <td>{{ $item->trabajo }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ number_format($item->precio, 2) }}</td>
                       
                        <td>{{$item->descripcion}}</td>
                        <td>{{$item->cantidadRepuestos }}</td>
                        <td>${{ number_format($item->totalRepuestos,2)}}</td>

                        <td>${{ number_format($item->cantidad * $item->amount, 2) }}</td> 
                        </tr>      
                @endforeach 
                @endforeach
            </tbody>
        </table>

       {{--  <h3>Repuestos</h3>
         <table>
            <thead>
                <tr>
                    <th>Nombre del Repuesto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $repuesto)

                @foreach ($repuesto->presupuestosDetails as $val)
                <tr>
                    <td>{{ $val->descripcion }}</td>
                    <td>{{ $val->cantidadRepuestos }}</td>
                    <td>${{ number_format($val->precioRepuestos, 2) }}</td>
                    <td>${{ number_format($val->cantidadRepuestos * $val->precioRepuestos, 2) }}</td>
                </tr>
                @endforeach
                   
                @endforeach
            </tbody>
        </table> --}}

        <div class="total">

            @foreach ($jobs as $totales)
            <p><strong>Subtotal:</strong> ${{ number_format($totales->total, 2) }}</p>
            <p><strong>IVA (19%):</strong> ${{ number_format($totales->iva, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($totales->subtotal, 2) }}</p>
            @endforeach
          
        </div> 
    </div>
</body>
</html>
