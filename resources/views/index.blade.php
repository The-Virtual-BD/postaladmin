<x-app-layout>

    <x-slot name="submenu">
            <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Dashboard') }}
            </x-nav-link>
    </x-slot>

    <div id="main" class="grid grid-cols-1 sm:grid-cols-4">
        <div class="bg-white p-4 rounded-md flex justify-between items-center">
            <p>Total User</p>
            <p class="text-blue-500 text-lg">{{$totaluser}}</p>
        </div>

    </div>

    <x-slot name="script">
        <script>
        </script>
    </x-slot>
</x-app-layout>
