<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('admins.index')" :active="request()->routeIs('admins.index')">
            {{ __('Admins') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.create')" :active="request()->routeIs('admins.create')">
            {{ __('New Admin') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.edit',$user->id)" :active="request()->routeIs('admins.edit')">
            {{ __('Edit This Admin') }}
        </x-nav-link>
    </x-slot>

    <div class="rounded-md bg-white p-6 flex justify-start items-center shadow">
        <div class="mx-6">
            <img src="{{ $user->profile->photo ? asset($user->profile->photo) : asset('images/avatarbig.png') }}" alt="" class="w-24 h-auto rounded-full">
        </div>
        <div class="font-inter">
            <h3 class="font-poppins font-medium text-xl text-blue-500">
                {{ $user->firstname . ' ' . $user->lastname }}
            </h3>
            <p class="text-gray-700 font-bold capitalize">Role: {{ $user->roles->first()->name }}</p>
            <p class="text-gray-700 font-bold capitalize">Email: {{ $user->email }}</p>
            <p class="text-gray-700 font-bold capitalize">NIB: {{ $user->nib }}</p>
        </div>
    </div>

    <div class="grid sm:grid-cols-6 bg-white p-6 rounded-md mt-4 text-gray-700">
        {{-- Contact Informations --}}
        <div class="col-span-2">
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Name :</p>
                <p>{{ $user->firstname . ' ' . $user->lastname }}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Email :</p>
                <p>{{ $user->email }}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">Phone :</p>
                <p>{{ $user->phone }}</p>
            </div>
        </div>
    </div>
</x-app-layout>



