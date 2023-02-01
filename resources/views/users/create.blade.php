<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('All User') }}
            </x-nav-link>
            <x-nav-link :href="route('users.create')" :active="request()->routeIs('users.create')">
                {{ __('New User') }}
            </x-nav-link>
    </x-slot>

    <div class=" bg-white rounded-md p-6 shadow">
        <form action="{{ route('users.store')}}" method="POST">
            @csrf
            <div class="text-gray-500">
                <div class="grid grid-cols-6 gap-4">
                    <div class="flex justify-between items-center mb-4 col-span-6">
                        <h1 class="font-raleway font-bold uppercase text-eve">New Member Information</h1>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="firstname">First Name</x-input-label>
                        <x-text-input type="text" name="firstname" id="firstname" class="w-full" required/>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="lastname">Last name</x-input-label>
                        <x-text-input type="text" name="lastname" id="lastname" class="w-full" required/>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="phone">Phone</x-input-label>
                        <x-text-input  type="text" name="phone" id="phone" class="w-full" required />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input  type="email" name="email" id="email" class="w-full" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="nib">Email</x-input-label>
                        <x-text-input type="text" name="nib" id="nib" class="w-full" required />
                    </div>
                </div>
            </div>
            <div class="py-3 text-right mt-4">

                <a href="{{ route('users.index') }}" class="px-2 py-1 rounded bg-gray-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
                <x-primary-button>Save User</x-primary-button>

            </div>
        </form>
    </div>
</x-app-layout>
