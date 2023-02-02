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
        <x-nav-link :href="route('roles.edit',$role->id)" :active="request()->routeIs('roles.edit')">
            {{ __('Edit this Role') }}
        </x-nav-link>
    </x-slot>


    <div class="rounded-md overflow-hidden">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <p><span>Name : </span> <span>{{$role->name}}</span></p>
                </div>
            </div>
            <fieldset>
                <div class="text-base font-medium text-gray-900" aria-hidden="true">Permissions:</div>
                <div class="mt-4 space-y-4">
                    <ul class="list-disc pl-6">
                        @foreach ($rolePermissions as $value)
                        <li>{{ $value->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </fieldset>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <a href="{{route('roles.edit',$role->id)}}">
                <x-primary-button>Edit This Role</x-primary-button>
            </a>
        </div>
    </div>

</x-app-layout>
