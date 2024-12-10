<div >

<!-- PERFIL -->
<div
      class="bg-white sm:p-8 p-4 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-xxl rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">
      <div class="flex items-center justify-between ">
        <div class=" items-start justify-items-start">
        <p class="text-md text-gray-600 text-right">Nombre: {{Auth::user()->name}}</p>
        <p class="text-md text-gray-600 text-right">Correo: {{Auth::user()->email}}</p>
        <p class="text-md text-gray-600 text-right">ID: {{Auth::user()->id}}</p>
        </div>

        <img src="images/profile.png" class="w-24 h-24 ml-6 rounded-full" />
      </div>
      <h3 class="text-gray-800 text-lg font-semibold mt-2">Administrador</h3>
    </div>

    <!-- METRICAS -->

    <div class="bg-white sm:p-8 p-4 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-xxl rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4"">
      <h2 class="text-gray-800 text-3xl font-bold mb-16 text-center">Estadisticas Generales</h2>
      <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6 max-lg:gap-12">
        <div class="text-center">
          <h3 class="text-gray-800 text-4xl font-extrabold">{{$total_users}}<span class="text-blue-600"> Usuarios</span></h3>
          <p class="text-base font-bold mt-4">Total de usarios registrados.</p>
        </div>
        <div class="text-center">
          <h3 class="text-gray-800 text-4xl font-extrabold">{{$total_products}}<span class="text-blue-600"> Productos</span></h3>
          <p class="text-base font-bold mt-4">Total de produtos en inventario.</p>
        </div>
        <div class="text-center">
          <h3 class="text-gray-800 text-4xl font-extrabold">{{$total_sales}}<span class="text-blue-600"> Ventas</span></h3>
          <p class="text-base font-bold mt-4">Total de produtos vendidos.</p>
        </div>
        <div class="text-center">
          <h3 class="text-gray-800 text-4xl font-extrabold">$<span class="text-blue-600">{{$total_incomes}}</span></h3>
          <p class="text-base font-bold mt-4">Ingresos totales por ventas.</p>
        </div>
      </div>
    </div>

</div>
