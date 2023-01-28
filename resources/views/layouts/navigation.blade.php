<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6">
        <div class="flex justify-between h-16">


            <div class="hidden sm:flex">
                <!-- Hamburger -->
                <div class=" hidden sm:flex items-center" id="sidemenutoggle" onclick="sidebartoggle()">
                    <button class="rotate-180 bg-blue-500/10 inline-flex items-center justify-center p-2 rounded-md text-eve bg-adam-light hover:text-white hover:bg-blue-500/70 focus:outline-none focus:bg-adam-light focus:text-eve transition duration-150 ease-in-out">
                        <span class="iconify" data-icon="material-symbols:chevron-right-rounded"></span>
                    </button>
                </div>

                <!-- Page Heading -->
                @if (isset($submenu))
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        {{ $submenu }}
                    </div>
                @endif
            </div>

            <!-- Logo -->
            <div class="shrink-0 flex sm:hidden justify-center items-center bg-white h-16 p-2">
                <a href="{{ route('index') }}" class="flex justify-center items-center">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </a>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-adam hover:text-dark hover:border-gray-300 focus:outline-none focus:text-adam focus:border-gray-300 transition duration-150 ease-in-out">
                            @if (Auth::user()->profile->photo)
                                <img src="{{asset(Auth::user()->profile->photo)}}" alt="" class="w-10 mr-4 h-auto rounded-full">
                            @else
                                <div class="uppercase bg-blue-500 w-10 h-10 rounded-full flex justify-center items-center text-white font-bold mr-4">{{Auth::user()->firstname[0].Auth::user()->firstname[1]}}</div>
                            @endif
                            <div class="text-blue-500 capitalize mr-3">
                                <p class="font-semibold">{{ Auth::user()->firstname }}</p>
                                <p class="text-xs text-left">{{ Auth::user()->roles->first()->name }}</p>
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('myprofile')">
                            {{ __('Profile') }}
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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Page Heading -->
        @if (isset($submenu))
            <div class="space-x-8 p-4 flex bg-blue-500/10">
                {{ $submenu }}
            </div>
        @endif

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                <p class="sidelinktext">Dashboard</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('vacancies.index')" :active="request()->routeIs('vacancies.*')">
                <p class="sidelinktext">Vacancies</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')">
                <p class="sidelinktext">Gallery</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('locations.index')" :active="request()->routeIs('locations.*')">
                <p class="sidelinktext">Locations</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('teamMembers.index')" :active="request()->routeIs('teamMembers.*')">
                <p class="sidelinktext">Team</p>
            </x-responsive-nav-link>
            <hr class="border border-blue-400/90">
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                <p class="sidelinktext">Users</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admins.index')" :active="request()->routeIs('admins.*')">
                <p class="sidelinktext">Admins</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')">
                <p class="sidelinktext">Roles</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.*')">
            </x-responsive-nav-link>
            <hr class="border border-blue-400/90">
            <x-responsive-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')">
                <p class="sidelinktext">Settings</p>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
