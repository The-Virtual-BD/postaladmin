<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
            {{ __('All Permissions') }}
        </x-nav-link>
        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
            {{ __('All Role') }}
        </x-nav-link>
        <x-nav-link :href="route('roles.create')" :active="request()->routeIs('roles.create')">
            {{ __('New Role') }}
        </x-nav-link>
    </x-slot>

    <div class="p-6">
        <form action="{{route('permissions.update',$permission->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Permission Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{$permission->name}}">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="guard_name" class="block text-sm font-medium text-gray-700">Guard Name</label>
                            <select id="guard_name" name="guard_name" autocomplete="country-name"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="web" selected>Web</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <x-primary-button>Save Permission</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
