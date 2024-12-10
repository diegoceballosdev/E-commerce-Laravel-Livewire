<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-100 rounded-2xl">

    <!-- Card -->

    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">

        <form wire:submit.prevent="save">
            @csrf
            <!-- Section -->

            <div
                class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                <div class="sm:col-span-12">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        Agregar Nuevo Producto
                    </h2>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-3">
                    <label for="name"
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nombre
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <input id="name" type="text" wire:model="product_name"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('product_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->

                <div class="sm:col-span-3">
                    <label for="category"
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Categoria
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <select id="category" wire:model="product_category_id"
                        class="py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                        <option selected>Elegir Categoria</option>

                        @foreach ($all_categories as $category)
                            <option value="{{$category->id}}" wire:key="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                    @error('product_category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->



                <div class="sm:col-span-3">
                    <div class="inline-block">
                        <label for="price"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Precio
                        </label>
                    </div>
                </div>


                <div class="sm:col-span-9">
                    <input id="price" type="number" wire:model="product_price"
                    step="0.01" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('product_price') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->



                <div class="sm:col-span-3">
                    <div class="inline-block">
                        <label for="stock"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Stock
                        </label>
                    </div>
                </div>


                <div class="sm:col-span-9">
                    <input id="stock" type="number" wire:model="product_stock"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    @error('product_stock') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->

            </div>
            <!-- End Section -->


            <!-- Section -->
            <div
                class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">

                <!-- IMAGENES -->

                <div class="sm:col-span-3">
                    <label for="image"
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Imagenes
                    </label>
                </div>
                <div class="sm:col-span-9" x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <label for="image" class="sr-only">Seleccionar Archivo</label>
                    <input id="image" type="file" wire:model="product_image"  class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10
           focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
           dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-100 file:border-0
           file:me-4 file:py-2 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400">

                    @error('product_images') <span class="text-red-500">{{ $message }}</span> @enderror

                    <!-- Barra de Progreso -->
                    <div x-show="uploading" class="w-full mt-4 bg-gray-200 rounded-full h-4 overflow-hidden">
                        <div class="bg-blue-600 h-full text-center text-white text-xs rounded-full transition-all duration-300"
                            x-bind:style="{ width: `${progress}%` }">
                            <span x-text="`${progress}%`"></span>
                        </div>
                    </div>
                </div>

                <!-- Vista Previa de Imágenes -->
                <div class="sm:col-span-3"></div>
                <div class="flex flex-wrap mt-4 gap-4 sm:col-span-9 justify-center">
                    @if ($product_image)
                        <img src="{{ $product_image->temporaryUrl() }}" alt="Vista previa de la imagen" class="h-32 w-32 object-cover rounded-lg">
                    @endif
                </div>


                <!-- End Col -->

                <div class="sm:col-span-3">
                    <div class="inline-block">
                        <label for="description"
                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Descripción
                        </label>
                    </div>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <textarea id="description" wire:model="product_description"
                        class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        rows="6" placeholder="Añadir caracteristicas y detalles del producto."></textarea>
                    @error('product_description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->
            </div>
            <!-- End Section -->

            <button type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Guardar
            </button>

            <!-- End Col -->
    <!-- End Section -->


</form>

</div>
<!-- End Card -->
</div>
<!-- End Card Section -->