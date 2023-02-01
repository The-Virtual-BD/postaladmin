<x-app-layout>


    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('admins.index')" :active="request()->routeIs('admins.index')">
            {{ __('Admins') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.create')" :active="request()->routeIs('admins.create')">
            {{ __('New Admin') }}
        </x-nav-link>
    </x-slot>

    <div class="bg-white p-6 rounded-md">
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <div class="text-gray-500">
                <div class="grid grid-cols-6 gap-4">

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="firstname">First Name</x-input-label>
                        <x-text-input type="text" name="firstname" id="firstname" class="w-full" required/>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="lastname">Last Name</x-input-label>
                        <x-text-input type="text" name="lastname" id="lastname" class="w-full" required/>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="phone">Phone</x-input-label>
                        <x-text-input type="text" name="phone" id="phone" class="w-full" required/>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input type="email" name="email" id="email" class="w-full" required/>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="nib">NIB</x-input-label>
                        <x-text-input type="text" name="nib" id="nib" class="w-full" required/>
                    </div>

                    <div class="col-span-6 grid grid-cols-6 gap-4">
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="password">Password</x-input-label>
                            <x-text-input type="password" name="password" id="password" class="w-full" required/>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-input-label for="password_confirmation">Confirm Password</x-input-label>
                            <x-text-input type="password" name="password_confirmation" id="password_confirmation" class="w-full" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3 text-right mt-4">

                <a href="{{ route('admins.index') }}" class="px-2 py-1 rounded bg-gray-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
                <x-primary-button>Save Admin</x-primary-button>

            </div>
        </form>
    </div>
</x-app-layout>
