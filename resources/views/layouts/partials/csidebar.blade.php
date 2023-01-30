<nav aria-label="alternative nav" class="">
    <!-- Logo -->
    <div class="shrink-0 flex justify-center items-center bg-white h-16 p-2">
        <a href="{{ route('index') }}" class="flex justify-center items-center">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
    </div>
    <div class="h-20 md:h-screen z-10 w-full  content-center">

        <div class=" content-center md:content-start text-left justify-between sidenav">
            <x-sidenav-link :href="route('index')" :active="request()->routeIs('index')">
                <span class="iconify" data-icon="ci:home-alt-fill"></span>
                <p class="sidelinktext">Admin Dash</p>
            </x-sidenav-link>

            <x-sidenav-link :href="route('currier.dash')" :active="request()->routeIs('currier.dash')">
                <span class="iconify" data-icon="bxs:package"></span>
                <p class="sidelinktext">Currier</p>
            </x-sidenav-link>

            <x-sidenav-link :href="route('flights.index')" :active="request()->routeIs('flights.*')">
                <span class="iconify" data-icon="mdi:flight"></span>
                <p class="sidelinktext">Flights</p>
            </x-sidenav-link>


        </div>

    </div>


</nav>
