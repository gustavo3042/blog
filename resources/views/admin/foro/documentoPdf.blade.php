<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33AFFF;
        color: azure;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #faproveedor {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 10px;
    }

    #faproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #faccomprador {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #faccomprador thead {
        padding: 20px;
        background:#33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

</style>

<body>

    <header>
        {{--  <div id="logo">
            <img src="img/logo.png" alt="" id="imagen">
        </div>  --}}
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL MECANICO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre:{{$check->encargado}}<br>
                                {{--  {{$purchase->provider->document_type}}-COMPRA: {{$purchase->provider->document_number}}<br>  --}}
                                {{-- Dirección: {{$purchase->provider->address}}<br>
                                Teléfono: {{$purchase->provider->phone}}<br> --}}
                                Email:{{$correo->email}}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            {{--  <p>{{$purchase->provider->document_type}} COMPRA<br />
                {{$purchase->provider->document_number}}</p>  --}}
                <p style="text-align: center; margin-top: 1px;">NUMERO DE BOLETA<br />{{$check->id}}
                    </p>
        </div>
    </header>
    <br>


    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>MECANICO</th>
                        <th>FECHA DE EMISION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center;">{{$check->encargado}}</td>
                        <td style="text-align: center;">{{$check->fecha}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>SERVICIO</th>
                        <th>PRECIO REPARACIÓN (CHL)</th>
                        <th>REPUESTOS</th>
                        <th>CANTIDAD REPUESTOS</th>
                        <th>TOTAL REPUESTOS</th>
                        <th>IVA REPARACIÓN</th>
                        <th>SUBTOTAL (CHL)</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($presupuestDetails as $item)

                    <tr>

                        <td style="text-align: center;">{{$item->cantidad}}</td>
                        <td style="text-align: center;">{{$item->trabajo}}</td>
                        <td style="text-align: center;">{{$item->precio}}</td>
                        <td style="text-align: center;">{{$item->descripcion}}</td>
                        <td style="text-align: center;">{{$item->cantidadRepuestos}}</td>
                        <td style="text-align: center;">{{$item->precioRepuestos}}</td>
                        <td style="text-align: center;">{{number_format($item->precio * 0.19)}}</td>
                        <td style="text-align: center;">{{number_format(($item->precio * $item->cantidad) + ($item->precio * 0.19))}}</td>


                    </tr>
                        
                    @endforeach
                   
                </tbody>
                <br> <br> 

              

              
            {{--      <tfoot>

                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$/{{$presupuesto->subtotal}} <p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTO:</p>
                        </th>
                        <td>
                            <p align="right">$/{{$presupuesto->iva}} </p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL REPARACIONES:</p>
                        </th>
                        <td>
                            <p align="right">$/{{$presupuesto->total}} <p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL MAS REPUESTOS:</p>
                        </th>
                        <td>
                            <p align="right">$/{{number_format($presupuesto->total+$totalRepuestos)}} <p>
                        </td>
                    </tr>

                </tfoot>  --}}
            </table>



        </div>
    </section>
    <br>
    <br>

    <section>

        <table id="facproducto">
            <thead>

                <tr id="fa">

                    <th>Problema</th>
                    <th>Solucion</th>

                </tr>

            </thead>

            <tbody>

              
                    <tr>
                        <td style="text-align: center;"><p>{{$check->problema}}</p></td>
                        <td style="text-align: center;"><p>{{$check->solucion}}</p></td>

                    </tr>
           
                

            </tbody>
          
                    
        </table>

    </section>

        <!--puedes poner un mensaje aqui-->
        <div id="datos">
         
 
                <br><br><br>

                <table>
                    <tr>
                        <td>Total a pagar: ${{$presupuesto->total}}</td>
                    </tr>
                    <tr>
                        <td>IVA: ${{$presupuesto->iva}}</td>
                    </tr>
                    <tr>
                        <td>Repuestos: ${{$totalRepuestos}}</td>
                    </tr>
    
                </table>

          
        </div>

</body>

</html>
