<div class="px-4 md:px-20 sm:px-30 my-10">
    {{-- Listados Fijos --}}

    <h2 class="font-medium text-[20px] my-10 mx-10">Nuevo Ingreso</h2>
    <livewire:product-listing :category_id="0" :current_product_id="0"/>

    <h2 class="font-medium text-[20px] my-10 mx-10">Mas Vendidos</h2>
    <livewire:product-listing :category_id="-1" :current_product_id="0"/>

    {{-- Listados Variables --}}

    <h2 class="font-medium text-[20px] my-10 mx-10">Camperas</h2>
    <livewire:product-listing :category_id="3" :current_product_id="0"/>

</div>
