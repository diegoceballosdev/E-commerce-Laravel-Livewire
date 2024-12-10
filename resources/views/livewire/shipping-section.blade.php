<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kong | Envio</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>

    <livewire:header />

    <div class="font-[sans-serif] bg-white">
        <div class="max-lg:max-w-xl mx-auto w-full">
            <div class="grid lg:grid-cols-3 gap-6">

                <!-- Seccion del fromulario -->
                <div class="lg:col-span-2 max-lg:order-0 p-6 !pr-0 max-w-4xl mx-auto w-full">
                    <div class="text-center max-lg:hidden mt-16">
                        <h2 class="text-3xl font-extrabold text-gray-800 inline-block border-b-2 border-gray-800 pb-1">
                            Envío</h2>
                    </div>

                    <form action="/session" method="POST" class="mt-16 mx-3">

                        @csrf

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Detalles Personales</h2>

                            <div class="grid sm:grid-cols-2 gap-8 mt-8">
                                <div>
                                    <input type="text" placeholder="Nombre" name="name"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Apellido" name="surname"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="number" placeholder="DNI" name="dni"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="number" placeholder="Telefono" name="tel"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                            </div><br><br>

                            <h2 class="text-xl font-bold text-gray-800">Dirección de Envío</h2>

                            <div class="grid sm:grid-cols-2 gap-8 mt-8">

                                <div>
                                    <input type="text" placeholder="Dirección" name="address"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Localidad" name="locality"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Provincia" name="province"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                                <div>
                                    <input type="number" placeholder="Postal code" name="postalcode"
                                        class="px-2 pb-2 bg-white text-gray-800 w-full text-sm border-b focus:border-blue-600 outline-none" />
                                </div>
                            </div>
                        </div><br>

                        <input type="hidden" name="total" value="{{ $total }}">

                        <div class="flex flex-wrap gap-4 mt-8 justify-center">
                            <a href="/shopping-cart"
                                class="text-center min-w-[150px] px-6 py-3.5 text-sm bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                Cancelar
                            </a>

                            <button type={{ (count($cartItems) > 0) ? 'submit' : "button"}}
                                class="min-w-[150px] px-6 py-3.5 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Ralizar Pago
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Seccion visual del carrito -->

                <div class="bg-gray-100 lg:h-screen lg:sticky lg:top-0">
                    <div class="relative h-full">
                        <div class="p-6 overflow-auto lg:max-h-[calc(100vh-150px)]">

                            <!-- Ajuste de altura aquí mantiene el scroll limitado a esta sección -->
                            <h2 class="text-xl font-bold text-gray-800">Productos</h2>

                            <div class="space-y-8 mt-8">
                                <div class="flex flex-col gap-4">
                                    @foreach ($cartItems as $item)  
                                           <div class="max-w-[140px] p-4 shrink-0 bg-gray-200 rounded-lg">
                                                        <img src='{{ asset('storage/' . $item->product->image) }}'
                                                            class="w-full object-contain" />
                                                    </div>
                                                    <div class="w-full">
                                                        <h3 class="text-base text-gray-800 font-bold">{{$item->product->name}}</h3>
                                                        <ul class="text-sm text-gray-800 space-y-2 mt-2">
                                                            <li class="flex flex-wrap gap-4">Precio <span
                                                                    class="ml-auto">${{$item->product->price}}</span></li>
                                                            <li class="flex flex-wrap gap-4">Cantidad <span
                                                                    class="ml-auto">{{$item->quantity}}</span></li>
                                                            <li class="flex flex-wrap gap-4">Subtotal del Producto <span
                                                                    class="ml-auto">${{$item->quantity * $item->product->price}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Sección de Totales -->
                        <div
                            class="lg:absolute lg:left-0 lg:bottom-0 w-full p-2 bg-gradient-to-tl from-[#b0baeb] via-[#bfdcf6] to-[#e0f6fb]">
                            <p class="flex flex-wrap gap-4 text-gray-800 text-sm p-2">Subtotal Acumulado <span
                                    class="ml-auto">${{$subtotal}}</span></p>
                            <h4 class="flex flex-wrap gap-4 text-gray-800 text-sm p-2">Impuestos <span
                                    class="ml-auto">${{$vat}}</span></h4>
                            <h4 class="flex flex-wrap gap-4 text-gray-800 text-sm p-2">Descuento <span class="ml-auto">-
                                    ${{$discount}}</span></h4>
                            <h4 class="flex flex-wrap gap-4 text-base text-gray-800 font-bold p-2">Total <span
                                    class="ml-auto">${{$total}}</span></h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <livewire:footer />

</body>

<script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</html>