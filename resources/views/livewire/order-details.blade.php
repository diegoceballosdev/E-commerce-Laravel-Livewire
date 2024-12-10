<div class="mt-10 font-sans bg-white mx-8">
<form wire:submit.prevent="generateReportPDF">
@csrf

    <div class="pt-8 lg:max-w-7xl max-w-4xl mx-auto">

        <div
            class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6 rounded-lg">

            <div class="lg:col-span-2">
                <h2 class="text-4xl font-extrabold text-gray-800">Orden de Compra
                <button type="submit" class=" py-1 px-4 text-xs font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700">
                Imprimir
                </button>
                </h2>
                <div class="flex space-x-2 mt-4">
                    <h4 class="text-gray-800 text-base">Fecha: {{$order->created_at->format('d-m-Y')}}</h4>
                </div>
                <div class="flex space-x-2 mt-4">
                    <h4 class="text-gray-800 text-base">Hora: {{$order->created_at->format('H:i:s')}}</h4>
                </div>

            </div>
        </div>
        
        @role('Admin')

        <div class="mt-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-xl font-bold text-gray-800">Datos de Usuario</h3>
            <ul class="mt-4 space-y-6 text-gray-800">
                <li class="text-sm">ID <span class="ml-4 float-right">{{$order->user_id}}</span></li>
                <li class="text-sm">Email <span class="ml-4 float-right">{{$order->user->email}}</span></li>
                <li class="text-sm">Rol <span class="ml-4 float-right">
                        @if(Auth::user()->hasRole('Admin'))
                            Administrador
                        @else
                            Usuario
                        @endif
                    </span></li>
            </ul>
        </div>

        @endrole

        <div class="mt-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-xl font-bold text-gray-800">Datos del Comprador</h3>
            <ul class="mt-4 space-y-6 text-gray-800">
                <li class="text-sm">Apellido y Nombre <span class="ml-4 float-right">{{$order->buyer_surname}},
                        {{$order->buyer_name}}</span></li>
                <li class="text-sm">DNI <span class="ml-4 float-right">{{$order->buyer_dni}}</span></li>
                <li class="text-sm">Telefono <span class="ml-4 float-right">{{$order->buyer_tel}}</span></li>
            </ul>
        </div>

        <div class="mt-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-xl font-bold text-gray-800">Productos</h3><br>
            <ul class="mt-4 space-y-6 text-gray-800">

            @foreach ($order->products as $product)

                @php
                    $product_data = App\Models\Product::find($product['id']);
                @endphp

                <li class="text-sm"><b>{{$product_data->name}}</b><span class="ml-4 float-right">${{$product_data->price}}</span></li>
                <li class="text-sm">Cantidad<span class="ml-4 float-right">{{$product["quantity"]}} Un.</span></li>
                <li class="text-sm">Subtotal<span class="ml-4 float-right">${{$product["quantity"] * $product_data->price}}</span></li><br>

            @endforeach
            </ul>
        </div>

        <div class="mt-8 mb-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-xl font-bold text-gray-800">Datos de Facturacion</h3>
            <ul class="mt-4 space-y-6 text-gray-800">
                <li class="text-sm">Metodo de pago <span class="ml-4 float-right">{{$order->payment_method}}</span></li>
                <li class="text-sm">Estado del pago <span class="ml-4 float-right">{{$order->order_status}}</span></li>
                <li class="text-sm">Total <span class="ml-4 float-right">${{$order->payment_total}}</span></li>
            </ul>
        </div>

        <div class="mt-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-xl font-bold text-gray-800">Datos de Envio</h3>
            <ul class="mt-4 space-y-6 text-gray-800">
                <li class="text-sm">Direccion <span class="ml-4 float-right">{{$order->shipping_address[0]}}</span></li>
                <li class="text-sm">Localidad <span class="ml-4 float-right">{{$order->shipping_address[1]}}</span></li>
                <li class="text-sm">Provincia <span class="ml-4 float-right">{{$order->shipping_address[2]}}</span></li>
                <li class="text-sm">Codigo Postal <span class="ml-4 float-right">{{$order->shipping_address[3]}}</span></li>
                <li class="text-sm">Estado de Envio <span class="ml-4 float-right">{{$order->shipping_status}}</span></li>
            </ul>
        </div>

    </div>
</form>
</div>