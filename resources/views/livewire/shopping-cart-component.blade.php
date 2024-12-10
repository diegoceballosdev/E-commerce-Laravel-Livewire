<div class="my-20 mx-10">
    <div class="grid lg:grid-cols-3 gap-4 max-lg:max-w-3xl mx-auto">

        <div class="lg:col-span-2 bg-white divide-y divide-gray-300 px-4">

            @foreach($cartItems as $item)

                <div class="grid md:grid-cols-4 items-center gap-4 py-4">

                    <!-- NOMBRE - COLOR - IMG -->
                    <div class="col-span-2 flex items-center gap-6">
                        <div class="w-28 h-28 shrink-0">
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="Imgen de producto"
                                class="w-full h-full object-contain" />
                        </div>

                        <div>
                            <h3 class="text-base font-bold text-gray-800">
                                <a href="/product-details/{{$item->product->id}}">
                                    {{ $item->product->name }}
                                </a>
                            </h3>
                            <!-- <h6 class="text-sm text-gray-500 mt-1">Color: <span class="ml-2 font-semibold">Black</span></h6> -->
                        </div>
                    </div>

                    <!-- INCREMENTO Y DECREMENTO DE PRODUCTO -->
                    <div class="flex items-center gap-3">

                        <form>
                            <label for="Line{{ $item->id }}Qty" class="sr-only"> Quantity </label>
                            <input type="number" min="1" max="{{$item->product->stock}}" value="{{ $item->quantity }}"
                                id="Line{{ $item->id }}Qty"
                                wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                        </form>
                        <h6 class="text-xs">Stock Actual: {{$item->product->stock}} </h6>
                    </div>

                    <!-- PRECIO Y BOTON DELETE -->
                    <div class="flex items-center justify-between">
                        <h4 class="text-base font-bold text-gray-800">${{ $item->product->price }}</h4>

                        <a wire:click="removeItem({{ $item->id }})" href="/shopping-cart"
                            class="text-gray-600 transition hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-3 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500 ml-auto"
                                viewBox="0 0 320.591 320.591">
                                <path
                                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                    data-original="#000000"></path>
                                <path
                                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                    data-original="#000000"></path>
                            </svg>
                        </a>

                    </div>
                </div>

            @endforeach
        </div>

        <!-- DATOS DE LA COMPRA: SUBTOTAL - TOTAL - IMPUESTOS - DESCUENTOS -->

        <div class="bg-gradient-to-tl from-[#b0baeb] via-[#bfdcf6] to-[#e0f6fb] p-6 lg:sticky top-0 rounded-lg">

            <div class="flex border border-black-600 overflow-hidden max-w rounded-lg mt-4">
                <button wire:click="clearCart()" href="#"
                    class="flex items-center w-full justify-center bg-red-400 hover:bg-red-500 px-6 py-3 font-semibold tracking-wide text-sm text-white outline-none">
                    Vaciar Carito
                </button>
            </div><br><br>

            <ul class="text-gray-800 divide-y divide-gray-300">

                <li class="flex flex-wrap gap-4 text-sm pb-4 font-semibold">Subtotal <span
                        class="ml-auto">${{ $subtotal }}</span></li>

                <li class="flex flex-wrap gap-4 text-sm py-4 font-semibold">Impuestos <span
                        class="ml-auto">${{ $vat }}</span></li>

                <li class="flex flex-wrap gap-4 text-sm py-4 font-semibold">Descuento <span
                        class="ml-auto">${{ $discount }}</span></li>

                <li class="flex flex-wrap gap-4 text-sm pt-4 font-bold">Total <span class="ml-auto">${{ $total }}</span>
                </li>

            </ul>

            <div class="mt-8 justify-center items-center">
                <h3 class="text-base font-bold text-gray-800">Aplicar codigo de promocion</h3>
                <div class="flex border border-blue-600 overflow-hidden max-w rounded-lg mt-4">
                    <input type="email" placeholder="Codigo"
                        class="w-full outline-none bg-white text-gray-800 text-sm px-4 py-3" />
                    <button type='button'
                        class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 px-6 py-3 font-semibold tracking-wide text-sm text-white outline-none">
                        Aplicar
                    </button>
                </div>

                <form method="POST" action="/shipping">

                    @csrf

                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                    <input type="hidden" name="vat" value="{{ $vat }}">
                    <input type="hidden" name="discount" value="{{ $discount }}">
                    <input type="hidden" name="total" value="{{ $total }}">

                    @if ((count($cartItems) > 0))

                        <div class="flex border border-blue-600 overflow-hidden max-w rounded-lg mt-4">
                            <button 

                                @foreach ($cartItems as $item)

                                    @if ($item->quantity > $item->product->stock || $item->quantity < 1 )
                                        {{$go_to_pay = false}}
                                    @endif
                                    
                                @endforeach

                                @if($go_to_pay)
                                type='submit'
                                @else
                                type="button" onclick="alert('Stock suficiente.\n\nPor favor ingresa una cantidad adecuada a nuestro stock');"
                                @endif
                                class="flex items-center w-full justify-center bg-blue-600 hover:bg-blue-700 px-6 py-3 font-semibold tracking-wide text-sm text-white outline-none">
                                Ir al Pago
                            </button>
                        </div>
                    
                    @else
                        <div class="flex border border-blue-600 overflow-hidden max-w rounded-lg mt-4">
                            <button type="button" onclick="alert('Tu carrito esta vacio.');"
                                class="flex items-center w-full justify-center bg-blue-600 hover:bg-blue-700 px-6 py-3 font-semibold tracking-wide text-sm text-white outline-none">
                                Ir al Pago
                            </button>
                        </div>

                    @endif


                </form>


                <div class="flex border border-black-600 overflow-hidden max-w rounded-lg mt-4">
                    <a href="/"
                        class="flex items-center w-full justify-center bg-gray-100 hover:bg-gray-200 px-6 py-3 font-semibold tracking-wide text-sm text-black outline-none">
                        Continuar Comprando
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>