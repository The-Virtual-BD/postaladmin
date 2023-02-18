<nav aria-label="alternative nav" class="">
    <!-- Logo -->
    <div class="shrink-0 flex justify-center items-center bg-white h-16 p-2">
        <a href="{{ route('index') }}" class="flex justify-center items-center">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
    </div>
    <div class="h-20 md:h-screen z-10 w-full  content-center">

        <div class=" content-center md:content-start text-left justify-between sidenav relative">
            <x-sidenav-link :href="route('index')" :active="request()->routeIs('index')">
                <span class="iconify" data-icon="ci:home-alt-fill"></span>
                <p class="sidelinktext">Dashboard</p>
            </x-sidenav-link>



            <x-sidenav-link :href="route('vacancies.index')" :active="request()->routeIs('vacancies.*')">
                <span class="iconify" data-icon="bxs:spreadsheet"></span>
                <p class="sidelinktext">Vacancies</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.*')">
                <span class="iconify" data-icon="ic:baseline-photo-library"></span>
                <p class="sidelinktext">Gallery</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('locations.index')" :active="request()->routeIs('locations.*')">
                <span class="iconify" data-icon="material-symbols:location-on"></span>
                <p class="sidelinktext">Locations</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('teamMembers.index')" :active="request()->routeIs('teamMembers.*')">
                <span class="iconify" data-icon="material-symbols:group-rounded"></span>
                <p class="sidelinktext">Team</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('quaries.all')" :active="request()->routeIs('quaries.*')">
                <span class="iconify" data-icon="tabler:message-circle-2-filled"></span>
                <p class="sidelinktext">Queries</p>
            </x-sidenav-link>
            <hr class="border border-blue-400/90">
            <x-sidenav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                <span class="iconify" data-icon="icon-park-solid:avatar"></span>
                <p class="sidelinktext">Users</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('admins.index')" :active="request()->routeIs('admins.*')">
                <span class="iconify" data-icon="eos-icons:admin"></span>
                <p class="sidelinktext">Admins</p>
            </x-sidenav-link>
            <x-sidenav-link :href="route('roles.index')" :active="request()->routeIs(['roles.*','permissions.*'])">
                <span class="iconify" data-icon="eos-icons:role-binding"></span>
                <p class="sidelinktext">Roles</p>
            </x-sidenav-link>

            <hr class="border border-blue-400/90">
            <x-sidenav-link :href="route('currier.dash')" :active="request()->routeIs('currier.dash')">
                <span class="iconify" data-icon="bxs:package"></span>
                <p class="sidelinktext">Courier</p>
            </x-sidenav-link>
            <div class="w-20"></div>

            <x-sidenav-link :href="route('settings.index')" :active="request()->routeIs('settings.*')" class="fixed bottom-0 w-52" id="settingmenu">
                <span class="iconify" data-icon="ant-design:setting-filled"></span>
                <p class="sidelinktext">Settings</p>
            </x-sidenav-link>


        </div>

    </div>


</nav>
