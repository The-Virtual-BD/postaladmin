<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('myprofile')" :active="request()->routeIs('myprofile')">
            {{ __('My Profile') }}
        </x-nav-link>
        <x-nav-link :href="route('editprofile')" :active="request()->routeIs('editprofile')">
            {{ __('Edit Profile') }}
        </x-nav-link>

    </x-slot>

    <div class="rounded-md bg-white p-6 flex justify-start items-center shadow">
        <div class="mx-6">
            <img src="{{ Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('images/avatarbig.png') }}" alt="" class="w-24 h-auto rounded-full">
        </div>
        <div class="font-inter">
            <h3 class="font-poppins font-medium text-xl text-blue-500">
                {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
            </h3>
            <p class="text-gray-700 font-bold capitalize">Role: {{ Auth::user()->roles->first()->name }}</p>
            <p class="text-gray-700 font-bold capitalize">Email: {{ Auth::user()->email }}</p>
            <p class="text-gray-700 font-bold capitalize">NIB: {{ Auth::user()->nib }}</p>
        </div>
    </div>

    <div class="grid sm:grid-cols-6 bg-white p-6 rounded-md mt-4 text-gray-700">
        {{-- Contact Informations --}}
        <div class="col-span-2">
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Name :</p>
                <p>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Email :</p>
                <p>{{ Auth::user()->email }}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">Phone :</p>
                <p>{{ Auth::user()->phone }}</p>
            </div>
        </div>
    </div>
</x-app-layout>



