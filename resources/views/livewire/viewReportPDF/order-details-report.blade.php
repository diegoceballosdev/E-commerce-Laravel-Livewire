<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2, h3 {
            color: #064edb;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 18px;
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            border-bottom: 1px solid #ddd;
            padding: 8px 0;
        }

        .section {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .section-header {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 2px solid #064edb;
            padding-bottom: 5px;
        }

        .details {
            margin-top: 15px;
        }

        .details span {
            display: inline-block;
            width: 200px;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .shadow {
            box-shadow: 0 2px 10px -3px rgba(6, 81, 237, 0.3);
        }

        .highlight {
            color: #064edb;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="section shadow">
        <h2>Orden de Compra</h2>
        <p>Fecha: <span class="highlight">{{$order->created_at->format('d-m-Y')}}</span></p>
        <p>Hora: <span class="highlight">{{$order->created_at->format('H:i:s')}}</span></p>
    </div>

    @role('Admin')
    <div class="section shadow">
        <h3 class="section-header">Datos de Usuario</h3>
        <ul>
            <li>ID: <span class="text-right">{{$order->user_id}}</span></li>
            <li>Email: <span class="text-right">{{$order->user->email}}</span></li>
            <li>Rol: <span class="text-right">
                @if(Auth::user()->hasRole('Admin'))
                    Administrador
                @else
                    Usuario
                @endif
            </span></li>
        </ul>
    </div>
    @endrole

    <div class="section shadow">
        <h3 class="section-header">Datos del Comprador</h3>
        <ul>
            <li>Apellido y Nombre: <span class="text-right">{{$order->buyer_surname}}, {{$order->buyer_name}}</span></li>
            <li>DNI: <span class="text-right">{{$order->buyer_dni}}</span></li>
            <li>Teléfono: <span class="text-right">{{$order->buyer_tel}}</span></li>
        </ul>
    </div>

    <div class="section shadow">
        <h3 class="section-header">Productos</h3>
        <ul>
            @foreach ($order->products as $product)
            @php
                $product_data = App\Models\Product::find($product['id']);
            @endphp
            <li><b>{{$product_data->name}}</b> <span class="text-right">${{$product_data->price}}</span></li>
            <li>Cantidad: <span class="text-right">{{$product["quantity"]}} Un.</span></li>
            <li>Subtotal: <span class="text-right">${{$product["quantity"] * $product_data->price}}</span></li>
            @endforeach
        </ul>
    </div>

    <div class="section shadow">
        <h3 class="section-header">Datos de Facturación</h3>
        <ul>
            <li>Método de Pago: <span class="text-right">{{$order->payment_method}}</span></li>
            <li>Estado del Pago: <span class="text-right">{{$order->order_status}}</span></li>
            <li>Total: <span class="text-right">${{$order->payment_total}}</span></li>
        </ul>
    </div>

    <div class="section shadow">
        <h3 class="section-header">Datos de Envío</h3>
        <ul>
            <li>Dirección: <span class="text-right">{{$order->shipping_address[0]}}</span></li>
            <li>Localidad: <span class="text-right">{{$order->shipping_address[1]}}</span></li>
            <li>Provincia: <span class="text-right">{{$order->shipping_address[2]}}</span></li>
            <li>Código Postal: <span class="text-right">{{$order->shipping_address[3]}}</span></li>
            <li>Estado de Envío: <span class="text-right">{{$order->shipping_status}}</span></li>
        </ul>
    </div>

</div>
</body>
</html>
