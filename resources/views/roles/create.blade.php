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

    <div class="bg-white rounded-md overflow-hidden">
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <x-input-label for="name">Role Name:</x-input-label>
                        <x-text-input type="text" name="name" id="name" class=""  placeholder="New role name"/>
                    </div>
                </div>
                <fieldset>
                    <div class="text-base font-medium text-gray-900" aria-hidden="true">Permissions:</div>
                    <div class="mt-4 space-y-4">
                        @foreach ($permissions as $value)
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="" name="permission[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" value="{{$value->id,}}">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">{{ $value->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <x-primary-button>Save</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
