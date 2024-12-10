<!-- Main navigation container -->
<header class="fixed top-0 left-0 z-50 w-full bg-white shadow">
<nav
  class="relative flex w-full flex-wrap items-center justify-between bg-zinc-50 py-2 shadow-dark-mild dark:bg-neutral-700 "
  data-twe-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-3">


    <!-- Hamburger button for mobile view -->
    <button
      class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 md:hidden"
      type="button" data-twe-collapse-init data-twe-target="#navbarSupportedContent4"
      aria-controls="navbarSupportedContent4" aria-expanded="false" aria-label="Toggle navigation">
      <!-- Hamburger icon -->
      <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 dark:[&>svg]:stroke-neutral-200">

        <!-- svg menu -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path fill-rule="evenodd"
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <div>
      <a class="mx-2 my-1 flex items-center lg:mb-0 lg:mt-0" href="/">
        <img class="me-2" src="{{ asset('storage/svg/kong.svg') }}" style="height: 50px"
          alt="TE Logo" loading="lazy" />
      </a>
    </div>

    <!-- Collapsible navbar container -->
    <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center md:mt-0 md:!flex md:basis-auto"
      id="navbarSupportedContent4" data-twe-collapse-item>

      <!-- Left links -->
      <ul class="list-style-none me-auto flex flex-col ps-0 lg:mt-1 md:flex-row" data-twe-navbar-nav-ref>

        <!-- Home link -->

        @role('Admin')

        <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
          <a class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            aria-current="page" data-twe-nav-link-ref href="/dashboard-admin">Administración</a>
        </li>

        @endrole

        <li class="static my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref data-twe-dropdown-ref>
          <a class="flex items-center whitespace-nowrappe-2 text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#" type="button" id="dropdownMenuButton1" data-twe-dropdown-toggle-ref aria-expanded="false"
            data-twe-nav-link-ref>
            Productos
            <span class="ms-2 [&>svg]:h-5 [&>svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </span>
          </a>
          <div
            class="absolute left-0 right-0 top-full z-[1000] mt-0 hidden w-full border-none bg-gray-100 bg-clip-padding data-[twe-dropdown-show]:block dark:bg-surface-dark"
            aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
            <div class="px-6 py-5 lg:px-8 bg-gray-100 ">
              <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">

              

                <div>
                  <p
                    class="bg-gray-100 block w-full border-b border-black-100 px-6 py-2 font-semibold uppercase text-gray-700 dark:border-white/10 dark:text-white">
                    <span class="bg-blue-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                      VESTIMENTA
                    </span>
                  </p>
                  <a href="{{ route('product-category-list', ['id' => 1]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Camperas
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 2]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Remeras
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 3]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-neutral-100  px-6 py-2 text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Pantalones
                  </a>
                </div>
                <div>
                  <p
                    class="bg-gray-100 block w-full border-b border-black-100 px-6 py-2 font-semibold uppercase text-gray-700 dark:border-white/10 dark:text-white">
                    <span class="bg-blue-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                      Accesorios
                    </span>
                  </p>
                  <a href="{{ route('product-category-list', ['id' => 4]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Guantes
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 5]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Mascaras
                  </a>
                </div>
                <div>
                  <p
                    class="bg-gray-100 block w-full border-b border-black-100 px-6 py-2 font-semibold uppercase text-gray-700 dark:border-white/10 dark:text-white">
                    <span class="bg-blue-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                      EQUIPAMIENTO
                    </span>
                  </p>
                  <a href="{{ route('product-category-list', ['id' => 6]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Fundas
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 7]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Mochilas
                  </a>
                </div>
                <div>
                  <p
                    class="bg-gray-100 block w-full border-b border-black-100 px-6 py-2 font-semibold uppercase text-gray-700 dark:border-white/10 dark:text-white">
                    <span class="bg-blue-200 text-gray-800 px-3 py-1 rounded-md text-sm font-bold">
                      Proteccion
                    </span>
                  </p>
                  <a href="{{ route('product-category-list', ['id' => 8]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Cascos
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 9]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Cuchillos
                  </a>
                  <a href="{{ route('product-category-list', ['id' => 10]) }}" aria-current="true"
                    class=" bg-gray-100 block w-full border-b border-black-100  px-6 py-2 text-gray-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:border-white/10 dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25">
                    Chalecos
                  </a>
                </div>

              </div>
            </div>
          </div>
        </li>

        <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
          <a class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            aria-current="page" data-twe-nav-link-ref href="/contact">Contacto</a>
        </li>

        <li class="my-4 ps-2 lg:my-0 lg:pe-1 lg:ps-2" data-twe-nav-item-ref>
          <a class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            aria-current="page" data-twe-nav-link-ref href="/about-us">Nosotros</a>
        </li>

      </ul>
    </div>

    <div class="flex">

    @if (!auth()->check())
    
      <!-- Buttons -->
      <div class="flex items-center">
      <a type="button" data-twe-ripple-init data-twe-ripple-color="light"
        class="me-3 inline-block rounded px-2 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-primary hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:text-secondary-600 dark:hover:text-secondary-500 dark:focus:text-secondary-500 dark:active:text-secondary-500"
        href="/login">
        Iniciar Sesión
      </a>
      <a type="button" data-twe-ripple-init data-twe-ripple-color="light"
        class="me-3 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
        href="/register">
        Registrarme
      </a>
      </div>

      @else
        <div class="flex items-center my-2">
          
        <!-- cart -->
         <livewire:shopping-cart-icon />

        </div>

        <!-- Profile -->
        <div class="flex items-center my-2">
                        <x-dropdown align="right" width="48">
                          <x-slot name="trigger">
                      
                        <button class="text-gray-500 bg-gray-100 px-4 py-2 gap-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
                        
                          <div class="px-0">        
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path
                              d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                            </svg>
                          </div>  

                          <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('purchases')">
                            Mis Compras
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
        </div>

      @endif
    </div>

    

  </div>

</nav>
</header>