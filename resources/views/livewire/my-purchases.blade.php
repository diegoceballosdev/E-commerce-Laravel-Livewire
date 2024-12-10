<div class=" my-40 mx-10 h-max">

    <h1 class="text-center mb-10 text-5xl font-extrabold">Mis Compras</h1>
    @if (count($my_orders) > 0)
    <table class="min-w-full bg-white">
        <thead class="bg-blue-500 whitespace-nowrap">
            <tr>
                <th class="p-4 text-left text-sm font-medium text-white">
                    Fecha de Compra
                </th>
                <th class="p-4 text-left text-sm font-medium text-white">
                    Productos
                </th>
                <th class="p-4 text-left text-sm font-medium text-white">
                    Total
                </th>
                <th class="p-4 text-left text-sm font-medium text-white">
                    Estado del Envio
                </th>
                <th class="p-4 text-left text-sm font-medium text-white">
                    Detalles
                </th>
            </tr>
        </thead>


            <tbody class="whitespace-nowrap">

                @foreach ($my_orders as $order)


                        <tr class="even:bg-blue-50">
                            <td class="p-4 text-sm text-black">
                                {{$order->created_at}}
                            </td>
                            <td class="p-4 text-sm text-black">
                                @foreach ($order->products as $product)

                                                @php
                                                    $product_data = App\Models\Product::find($product['id']);
                                                @endphp


                                                <li class="my-3">
                                                    {{$product_data->name}}
                                                    <span
                                                        class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{$product["quantity"]}} un.</span>
                                                </li>
                                @endforeach
                            </td>

                            <td class="p-4 text-sm text-black">
                                ${{$order->payment_total}}
                            </td>
                            <td class="p-4 text-sm text-black">
                                {{$order->shipping_status}}
                            </td>

                            <td class="py-4 text-sm break-words w-1/6">
                                <div>
                                    <a wire:navigate href="/order-details/{{$order->id}}"
                                        class="px-4 py-1 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-300 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">
                                        Ver Detalles
                                    </a>
                                </div>
                            </td>
                        </tr>


                @endforeach

            
            </tbody>



    </table>

    
    @else

<!-- Alert Warning -->
<div class="my-40">
<div class=" bg-orange-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
<svg viewBox="0 0 24 24" class="text-yellow-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
    <path fill="currentColor"
        d="M23.119,20,13.772,2.15h0a2,2,0,0,0-3.543,0L.881,20a2,2,0,0,0,1.772,2.928H21.347A2,2,0,0,0,23.119,20ZM11,8.423a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Zm1.05,11.51h-.028a1.528,1.528,0,0,1-1.522-1.47,1.476,1.476,0,0,1,1.448-1.53h.028A1.527,1.527,0,0,1,13.5,18.4,1.475,1.475,0,0,1,12.05,19.933Z">
    </path>
</svg>
<span class="text-yellow-800">
    No se hallaron productos.
</span>
</div>
</div>

<!-- End Alert Warning -->

@endif
</div>