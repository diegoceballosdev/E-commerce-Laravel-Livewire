<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-100 rounded-2xl">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
        <form wire:submit.prevent="generateReportPDF">
            @csrf
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                <div class="sm:col-span-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Reporte de Productos</h2>
                </div>
                <div class="sm:col-span-6 flex justify-end items-end">
                <a wire:navigate class="py-2 px-4 inline-flex justify-end items-end gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                href="/orders">
                Volver Atras
                </a>
                </div>

                <!-- Ordenar por -->
                <div class="sm:col-span-3">
                    <label for="sort" class="text-sm font-medium text-gray-500 dark:text-neutral-500 mt-2.5">Ordenar por</label>
                </div>
                <div class="sm:col-span-9 flex items-center space-x-3">
                    <select id="sort" wire:model="order_sortField" class="py-2 pr-10 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Elegir</option>
                        <option value="user_id">Usuario</option>
                        <option value="buyer_name">Nombre</option>
                        <option value="buyer_surname">Apellido</option>
                        <option value="buyer_dni">DNI</option>
                        <option value="buyer_tel">Telefono</option>
                        <option value="shipping_status">Estado de Envio</option>
                        <option value="payment_method">Metodo de Pago</option>
                        <option value="payment_total">Total($)</option>
                        <option value="created_at">Fecha de Compra</option>
                        <option value="order_status">Estado de la Orden</option>
                    </select>
                    @error('order_sortField') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <select id="order" wire:model="order_sortDirection" class="py-2 pr-10 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">

                        <option value="">Elegir</option>
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                    @error('order_sortDirection') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Cantidad de Productos -->
                <div class="sm:col-span-3">
                    <label for="quantity" class="text-sm font-medium text-gray-500 dark:text-neutral-500 mt-2.5">Cantidad (Si omite esto, obtendra TODAS las ordenes de compra)</label>
                </div>
                <div class="sm:col-span-9">
                    <input id="quantity" type="number" wire:model="order_quantity" step="1" min="1" class="py-2 px-6 w-24 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('order_quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>


            </div>

            <button type="submit" class="w-full py-3 px-4 mt-4 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                Generar Reporte
            </button>
        </form>
    </div>
</div>