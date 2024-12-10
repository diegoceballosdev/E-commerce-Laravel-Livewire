<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-slate-100 rounded-2xl">
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
        <form wire:submit.prevent="changeRole">
            @csrf
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                <div class="sm:col-span-6">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Modificar Rol del Usuario</h2>
                </div>
                <div class="sm:col-span-6 flex justify-end items-end">
                <a wire:navigate class="py-2 px-4 inline-flex justify-end items-end gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                href="/users">
                Cancelar
                </a>
                </div>

                <!-- Ordenar por -->
                <div class="sm:col-span-3">
                    <label for="role" class="text-sm font-medium text-gray-500 dark:text-neutral-500 mt-2.5">Seleccion Rol</label>
                </div>
                <div class="sm:col-span-9 flex items-center space-x-3">

                    <select id="role" wire:model="user_role" class="py-2 pr-10 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">

                        <option value="">Elegir</option>
                        <option value="Admin">Administrador</option>
                        <option value="User">Usuario</option>
                    </select>
                    @error('user_role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

            </div>

            <button type="submit" class="w-full py-3 px-4 mt-4 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                Guardar
            </button>
        </form>
    </div>
</div>
