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
                <div class="w-full aspect-square overflow-hidden"> <!-- aspect-square crea un contenedor cuadrado -->
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Imgen de producto" class="w-full h-full object-cover"><!-- object-cover, lo que hace que la imagen se ajuste dentro del contenedor cuadrado sin distorsionarse y manteniendo sus proporciones. -->
                    @else
                        <img src="{{ asset('/images/defecto.jpg') }}" alt="Imagen no Disponible" class="w-full h-full object-cover">
                    @endif
                </div>

            </div>

            <!-- Contenedor de DATOS -->
            <div class="px-2 py-3">
                <h2 class="text-md font-bold text-gray-800 mb-2">{{$product->name}}</h2>

                <div class="flex items-center justify-between mb-4">
                    <span class="text-lg font-bold text-blue-400">${{$product->price}}</span>
                    <span class=" bg-blue-100 text-xs font-bold px-2 py-1 rounded-full">{{$product->category->name}}</span>
                </div>

                @if (auth()->check())

                    @if($product->stock>0)

                    <a wire:click.prevent="addToCart({{$product->id}})" href="#" onclick="alert('Producto añadido al carrito.');"
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

                    @if($product->stock>0)

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
