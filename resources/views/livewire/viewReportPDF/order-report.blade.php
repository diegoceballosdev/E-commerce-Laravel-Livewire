<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Lista de productos</h1>
    <h4>Fecha y Hora de Reporte: {{now()->format('d-m-Y H:i:s')}}</h4>
    <h4>Usuario: {{Auth::user()->email}}</h4>
    <h4>Cantidad de productos listados: {{count($orders)}}</h4>

    <table>
        <thead>
            <tr>
                <th>UsuarioID</th>
                <th>Comprador</th>
                <th>DNI</th>
                <th>Telefono</th>
                <th>Productos</th>
                <th>Direccion de Envio</th>
                <th>Estado Envio</th>
                <th>Fecha de Compra</th>
                <th>Metodo de Pago</th>
                <th>Total</th>
                <th>Estado Orden</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user_id}}</td>

                                <td>{{$order->buyer_surname}}, {{$order->buyer_name}}</td>
                                <td>{{$order->buyer_dni}}</td>
                                <td>{{$order->buyer_tel}}</td>

                                <td>
                                    @foreach ($order->products as $product)

                                        @php
                                            $product_data = App\Models\Product::find($product['id']);
                                        @endphp


                                        - <b>{{$product_data->name}}</b> x {{$product["quantity"]}}un.<br><br>
                                    @endforeach
                                </td>

                                <td>
                                    {{$order->shipping_address[0]}} <br> <br>
                                    <b>{{$order->shipping_address[1]}}</b> <br>
                                    <b>{{$order->shipping_address[2]}}</b> <br>
                                    <b>{{$order->shipping_address[3]}}</b>
                                </td>
                                <td>{{$order->shipping_status}}</td>

                                <td>{{$order->created_at->format('d-m-Y')}}</td>

                                <td>{{$order->payment_method}}</td>
                                
                                <td>${{ number_format($order->payment_total, 2) }}</td>

                                <td>{{$order->order_status}}</td>
                            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>