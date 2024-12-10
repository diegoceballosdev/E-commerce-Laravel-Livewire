<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">Usuarios</h2>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">Gestion de Usuarios.</p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a href="#"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                    </svg>

                                    Generar Reporte
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/6"
                                    wire:click="sortBy('id')">
                                    <div class="flex items-center">
                                        ID
                                        @if ($sortField === 'id')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="{{ $sortDirection === 'asc' ? 'M5 10l5-5 5 5H5z' : 'M5 10l5 5 5-5H5z' }}"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/6"
                                    wire:click="sortBy('name')">
                                    <div class="flex items-center">
                                        Nombre
                                        @if ($sortField === 'name')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="{{ $sortDirection === 'asc' ? 'M5 10l5-5 5 5H5z' : 'M5 10l5 5 5-5H5z' }}"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/6"
                                    wire:click="sortBy('email')">
                                    <div class="flex items-center">
                                        Email
                                        @if ($sortField === 'email')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="{{ $sortDirection === 'asc' ? 'M5 10l5-5 5 5H5z' : 'M5 10l5 5 5-5H5z' }}"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                </th>

                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/6">
                                    <div class="flex items-center">
                                        Rol
                                    </div>
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/6"
                                    wire:click="sortBy('created_at')">
                                    <div class="flex items-center">
                                        Registro
                                        @if ($sortField === 'created_at')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="{{ $sortDirection === 'asc' ? 'M5 10l5-5 5 5H5z' : 'M5 10l5 5 5-5H5z' }}"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                </th>


                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">
                                    Modificar Rol
                                </th>

                            </tr>


                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($all_users as $user)
                                <tr>
                                    <td class="px-6 py-4 text-sm break-words w-1/6">{{$user->id}}</td>
                                    <td class="px-6 py-4 text-sm break-words w-1/6">{{$user->name}}</td>
                                    <td class="px-6 py-4 text-sm break-words w-1/6">{{$user->email}}</td>
                                    <td class="px-6 py-4 text-sm break-words w-1/6">{{$user->getRoleNames()->first()}}</td>
                                    <td class="px-6 py-4 text-sm break-words w-1/6">{{$user->created_at->format('d-m-Y')}}
                                    </td>


                                    <td class="px-6 py-4 text-sm break-words w-full">
                                        <div>
                                            <a wire:navigate href="/users/edit-role/{{$user->id}}"
                                                class="px-4 py-1 font-medium w-full text-white bg-blue-500 rounded-md hover:bg-blue-300 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">
                                                Modificar
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Footer -->
                    <div class="px-10 py-5">
                        {{ $all_users->links() }}
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Table Section -->