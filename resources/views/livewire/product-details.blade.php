<div class="bg-gray-100 py-16">
    <div class="container mx-auto py-8">
        <!-- Cambié el padding lateral de `px-4` a `px-20` para más espacio a los lados -->
        <div class="flex flex-wrap -mx-4">

            <!-- Product Images -->
            <div class="w-full md:w-1/2 v mb-8 flex justify-center px-4">
                <div class="w-112 h-112 bg-gray-200 rounded-lg shadow-md overflow-hidden">
                    <!-- Ajusté el tamaño del contenedor a `w-64 h-64` para hacerlo más pequeño -->
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imgen de producto"
                        class="object-cover w-full h-full">
                </div>
            </div>

            <!-- Product Details -->
            <div class="w-full md:w-1/2 justify-center px-0">

                <!-- NAME -->
                <h2 class="text-3xl font-bold mb-2">{{$product->name}}</h2><br>

                <!-- PRICE -->
                <div class="mb-4">
                    <span class="text-2xl font-bold mr-2">${{$product->price}}</span>

                    <!-- $SALE -->
                    <!-- <span class="text-gray-500 line-through">$399.99</span> -->
                </div>

                <!-- CATEGORY -->
                <div class="flex items-center mb-4">
                    <span
                        class="bg-green-200 flex gap-2 items-center  text-gray-800 px-3 py-1 rounded-md hover:bg-gray-300 text-sm font-bold">
                        {{$product->category->name}}
                    </span>
                </div>


                <!-- DESCRIPTION -->
                <p class="text-gray-700 mb-6">{{$product->description}}</p>

                <!-- Stock TAG -->
                @if($product->stock >= 20)
                <div class="flex items-center mb-4">
                        <span class="bg-blue-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                            Stock Alto
                        </span>
                    </div>
                @elseif ($product->stock < 20 && $product->stock > 0)
                    <div class="flex items-center mb-4">
                        <span class="bg-yellow-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                            Últimas Unidades
                        </span>
                    </div>
                @else
                    <div class="flex items-center mb-4">
                        <span class="bg-red-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                            Sin Stock
                        </span>
                    </div>
                @endif

                <!-- seleccionar cantidad a comprar -->
                <!-- <div class="mb-6">
                    <input type="number" id="quantity" name="quantity" min="1" value="1"
                        class="w-12 text-center rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring-indigo-200">
                </div> -->



                @if ($product->stock > 0)

                    @if (auth()->check())
                        <div class="flex space-x-4 mb-6">
                            <button wire:click="addToCart({{$product->id}})" onclick="alert('Producto añadido al carrito.');"
                                class="flex items-center gap-1 bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                Añadir al carro
                            </button>
                            <button
                                class="flex items-center gap-1 bg-gray-200 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                Favoritos
                            </button>
                        </div>

                    @else
                        <div class="flex space-x-4 mb-6">
                            <a href="/login"
                                class="flex items-center gap-1 bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>

                                Añadir al carro
                            </a>
                            <a href="/login"
                                class="flex items-center gap-1 bg-gray-200 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>

                                Favoritos
                            </a>
                        </div>

                    @endif

                @endif



            </div>

        </div>

    </div>
    {{-- Listado --}}
    <div class="px-4 md:px-20 sm:px-30">
        <h2 class="font-bold text-[20px] my-5 mx-10">Recomendados</h2>
        <livewire:product-listing :category_id="$product->category_id" :current_product_id="$product->id" />
        <!-- :current_product_id para no repetir el producto actual en la lista de recomendados -->
    </div>


    <!-- FUTURAS MEJORAS ----------------------------------------------------------->

    <!-- SKU ------------------------------------------->
    <!-- <p class="text-gray-600 mb-4">SKU: WH1000XM4</p> -->

    <!-- CARACTERISTICAS ------------------------------>
    <!-- <div>
                <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
                <ul class="list-disc list-inside text-gray-700">
                        <li>Industry-leading noise cancellation</li>
                        <li>30-hour battery life</li>
                        <li>Touch sensor controls</li>
                        <li>Speak-to-chat technology</li>
                    </ul>
                </div> -->

    <!-- COLOR ------------------------------------->
    <!-- <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Color:</h3>
                    <div class="flex space-x-2">
                        <button
                            class="w-8 h-8 bg-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"></button>
                        <button
                            class="w-8 h-8 bg-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"></button>
                    </div>
                </div> -->


    <!-- IMAGENES --------------------------------->

    <!-- <script>
                function changeImage(src) {
                    document.getElementById('mainImage').src = src;
                }
            </script> -->

    <!-- Product Images (REEMPLAZO MULTI IMAGEN)-->
    <!-- <div class="w-full md:w-1/2 px-4 mb-8">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Product" class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
                        <div class="flex gap-4 py-4 justify-center overflow-x-auto">
                            <img src="https://images.unsplash.com/photo-1505751171710-1f6d0ace5a85?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMnx8aGVhZHBob25lfGVufDB8MHx8fDE3MjEzMDM2OTB8MA&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Thumbnail 1"
                                class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                                onclick="changeImage(this.src)">
                            <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw0fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Thumbnail 2"
                                class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                                onclick="changeImage(this.src)">
                            <img src="https://images.unsplash.com/photo-1496957961599-e35b69ef5d7c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Thumbnail 3"
                                class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                                onclick="changeImage(this.src)">
                            <img src="https://images.unsplash.com/photo-1528148343865-51218c4a13e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                                alt="Thumbnail 4"
                                class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                                onclick="changeImage(this.src)">
                        </div> -->

</div>
</div>