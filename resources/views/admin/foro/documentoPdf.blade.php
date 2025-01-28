<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Servicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 12px;
        }
        .table td {
            text-align: center;
        }
        .total-section {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="header">BOLETA DE SERVICIO</div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h6>Encargado Registro</h6>
            <p><strong>Nombre:</strong> {{ $check->encargado }}</p>
            <p><strong>Email:</strong> {{ $correo->email }}</p>
        </div>
        <div class="col-md-6 text-end">
            <h6><strong>Número de Boleta:</strong> {{ $check->id }}</h6>
            <p><strong>Fecha de Emisión:</strong> {{ $check->fecha }}</p>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Cantidad</th>
                <th>Servicio</th>
                <th>Precio Reparación (CHL)</th>
                <th>Repuestos</th>
                <th>Cantidad Repuestos</th>
                <th>Total Repuestos</th>
                <th>IVA Reparación</th>
                <th>Subtotal (CHL)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presupuestDetails as $item)
            <tr>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->trabajo }}</td>
                <td>${{ number_format($item->precio, 0, ',', '.') }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->cantidadRepuestos }}</td>
                <td>${{ number_format($item->precioRepuestos, 0, ',', '.') }}</td>
                <td>${{ number_format($item->precio * 0.19, 0, ',', '.') }}</td>
                <td>${{ number_format(($item->precio * $item->cantidad) + ($item->precio * 0.19), 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Problema</th>
                <th>Solución</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $check->problema }}</td>
                <td>{{ $check->solucion }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <p>Total a pagar: ${{ number_format($presupuesto->total, 0, ',', '.') }}</p>
        <p>IVA: ${{ number_format($presupuesto->iva, 0, ',', '.') }}</p>
        <p>Repuestos: ${{ number_format($totalRepuestos, 0, ',', '.') }}</p>
    </div>
</div>

</body>
</html>
