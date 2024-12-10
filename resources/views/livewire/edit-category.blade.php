<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-100 rounded-2xl">

    <!-- Card -->

    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">

        <form wire:submit.prevent="update">
            @csrf
            <!-- Section -->

            <div
                class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">

                <div class="sm:col-span-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                    Agregar Nueva Categoria
                    </h2>
                </div>
                <div class="sm:col-span-6 flex justify-end items-end">
                <a wire:navigate class="py-2 px-4 inline-flex justify-end items-end gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                href="/products">
                Cancelar
                </a>
                </div>
                

                <div class="sm:col-span-3">
                    <label for="name"
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                        Nombre
                    </label>
                </div>
                <!-- End Col -->
            
            <!-- End Section -->

                <div class="sm:col-span-9">
                    <input id="name" type="text" wire:model="category_name"
                        class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        @error('category_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- End Col -->


                </div>

                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Guardar
                </button>

        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->