<div class="font-sans p-4 mx-auto lg:max-w-5xl md:max-w-3xl sm:max-w-full">

    <h1 class="text-center mt-20 mb-10 text-5xl font-extrabold text-gray-800">{{$category->name}}</h1>

    <!-- Contenedor para centrar el buscador -->
    <div class="flex justify-center items-center mb-10">
        <div class="max-w-md w-full">
             <input type="search" wire:model.live="search" 
                class="peer w-full py-3 px-4 block bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Buscar">
            </div>
    </div>

    @if (count($products) != '0')

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($products as $product)

            <!-- ITEM CARD -->

                <div class="max-w-md w-full">
                    <a wire:navigate href="/product-details/{{$product->id}}">
                        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl">
                            <div class="relative">

                                <!-- ETIQUETA para new, oferta, etc-->
                                <div class="absolute inset-0 bg-gradient-to-br">

                                    <!-- <div
                                class="absolute top-3 right-2 bg-green-200 text-xs font-bold px-1 py-1 rounded-full z-20 transform rotate-12">
                                {{$product->category->name}}
                            </div> -->
                                </div>

                                <!-- Contenedor de imagen cuadrado -->
                                <div class="w-full aspect-square overflow-hidden">
                                    <!-- aspect-square crea un contenedor cuadrado -->
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Imgen de producto"
                                            class="w-full h-full object-cover"><!-- object-cover, lo que hace que la imagen se ajuste dentro del contenedor cuadrado sin distorsionarse y manteniendo sus proporciones. -->
                                    @else
                                        <img src="{{ asset('/images/defecto.jpg') }}" alt="Imagen no Disponible"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>

                            </div>

                            <!-- Contenedor de DATOS -->
                            <div class="px-2 py-3">
                                <h2 class="text-md font-bold text-gray-800 mb-2">{{$product->name}}</h2>

                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold text-blue-400">${{$product->price}}</span>
                                    <span
                                        class=" bg-blue-100 text-xs font-bold px-2 py-1 rounded-full">{{$product->category->name}}</span>
                                </div>

                                @if (auth()->check())

                                    @if($product->stock > 0)

                                        <a wire:click.prevent="addToCart({{$product->id}})" href="#"
                                            onclick="alert('Producto añadido al carrito.');"
                                            class="flex gap-1 justify-center items-center w-full rounded bg-blue-400 p-2 text-sm font-medium transition hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                            Añadir al carro
                                        </a>

                                    @else
                                        <a href="/product-details/{{$product->id}}"
                                            class="flex gap-1 justify-center items-center w-full rounded bg-gray-400 p-2 text-sm font-medium transition hover:scale-105">
                                            Sin Stock
                                        </a>

                                    @endif


                                @else

                                    @if($product->stock > 0)

                                        <a wire:navigate href="/login"
                                            class="flex gap-1 justify-center items-center w-full rounded bg-blue-400 p-2 text-sm font-medium transition hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>
                                            Añadir al carro
                                        </a>

                                    @else
                                        <a href="/product-details/{{$product->id}}"
                                            class="flex gap-1 justify-center items-center w-full rounded bg-gray-400 p-2 text-sm font-medium transition hover:scale-105">
                                            Sin Stock
                                        </a>

                                    @endif

                                @endif
                            </div>
                        </div>
                    </a>

                </div>

            <!-- FIN ITEM CARD -->
            @endforeach
        </div>
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

    <!-- Footer -->
    @if(count($products) != '0')
        <div class="px-10 py-10">
            {{ $products->links() }}
        </div>
    @endif



</div>