
<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('All User') }}
            </x-nav-link>
            <x-nav-link :href="route('users.create')" :active="request()->routeIs('users.create')">
                {{ __('New User') }}
            </x-nav-link>
            <x-nav-link :href="route('users.edit',$user->id)" :active="request()->routeIs('users.edit')">
                {{ __('Edit This User') }}
            </x-nav-link>
    </x-slot>

    <div class="rounded-md bg-white p-6 flex justify-start items-center shadow">
        <div class="mx-6">
            <img src="{{ asset('images/avatarbig.png') }}" alt="" class="w-24 h-auto">
        </div>
        <div class="font-inter">
            <h3 class="font-poppins font-medium text-xl">
                {{ $user->firstname . ' ' . $user->lastname }}
            </h3>
            <p>NIB: {{ $user->nib }}</p>
            <p>Email: {{ $user->email }}</p>
            <p class="text-blue-500 font-bold">Suite: #{{ $user->suite }}</p>
        </div>
    </div>
    <div class="flex bg-white rounded-md p-4 mt-6 shadow">
        {{-- Contact Informations --}}
        <div class="col-span-2">
            <div class="grid grid-cols-2 mb-4">
                <h3 class="font-bold text-xl">Contact Information</h3>
            </div>
            <div class="my-2">
                <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Type of account</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Type of account :</p>
                <p>{{ $user->profile->account_type == 1 ? "Personal" : "Business"}}</p>
            </div>
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
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">Country :</p>
                <p>{{$user->profile->country}}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">Island :</p>
                <p>{{$user->profile->island}}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">STREET/ HOUSE NO :</p>
                <p>{{$user->profile->house}}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold ">Address :</p>
                <p>{{$user->profile->address}}</p>
            </div>
            <div class="mt-4 mb-2">
                <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Prefered Region</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Prefered Region :</p>
                <p>{{$user->profile->region}}</p>
            </div>

            <div class="mt-4 mb-2">
                <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Prefered location</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Prefered location :</p>
                <p>{{$user->profile->location}}</p>
            </div>

        </div>
        @if ($user->profile->account_type == 2)
        {{-- Business Informations --}}
        <div class="col-span-2">
            <div class="grid grid-cols-2 mb-4">
                &nbsp;
            </div>
            <div class="my-2">
                <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Business Information</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">Company Name :</p>
                <p>{{$user->profile->company_name}}</p>
            </div>
            <div class="grid grid-cols-2 text-sm my-1">
                <p class="font-bold">TIN No :</p>
                <p>{{$user->profile->tin_number}}</p>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
