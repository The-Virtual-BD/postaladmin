<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('admins.index')" :active="request()->routeIs('admins.index')">
            {{ __('Admins') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.create')" :active="request()->routeIs('admins.create')">
            {{ __('New Admin') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.edit',$admin->id)" :active="request()->routeIs('admins.edit')">
            {{ __('Edit This Admin') }}
        </x-nav-link>
    </x-slot>


    <div class="rounded-t bg-white p-4 flex justify-start items-center shadow">
        <div class="mx-6 relative group">
            <form id="studentppform" method="POST" action="{{ route('updateprofile', $admin->id) }}"
                enctype="multipart/form-data" class="d-none">
                @csrf
                <input type="file" name="profile_picture" id="selectedFile" style="display: none;" />
            </form>
            <img src="{{ $admin->profile->photo ? asset($admin->profile->photo) : asset('images/avatarbig.png') }}"
                alt="" class="w-24 h-auto rounded-full">
            <span class="iconify-inline absolute top-0 right-0 text-blue-500 hover:scale-105" data-icon="mdi:lead-pencil" onclick="document.getElementById('selectedFile').click();"></span>
            <span class="text-xs text-red-500">Image must be squire 1:1 <br> Max: 256x256</span>
        </div>
        <div class="font-inter">
            <h3 class="font-poppins font-medium text-xl text-blue-500">
                {{ $admin->firstname . ' ' . $admin->lastname }}
            </h3>
            <p class="text-gray-700 font-bold capitalize">Role: {{ $admin->roles->first()->name }}</p>
            <p class="text-gray-700 font-bold capitalize">Email: {{ $admin->email }}</p>
            <p class="text-gray-700 font-bold capitalize">NIB: {{ $admin->nib }}</p>
        </div>
    </div>

    <form action="{{ route('updateprofile', $admin->id) }}" method="POST" class="bg-white p-6 rounded-md mt-4">
        @csrf
        <div class="">
            <div class="grid grid-cols-6 gap-4">
                {{-- Company details --}}
                <div class="col-span-6 sm:col-span-3 companydetails hidden">
                    <x-input-label for="companyname">Company Name</x-input-label>
                    <x-text-input type="text" name="companyname" id="companyname" :value="$admin->profile->company_name ?? ''" class="w-full"/>
                </div>
                <div class="col-span-6 sm:col-span-3 companydetails hidden">
                    <x-input-label for="tin">TIN Number</x-input-label>
                    <x-text-input type="text" name="tin" id="tin" :value="$admin->profile->tin_number ?? ''" class="w-full"/>
                </div>
                {{-- Company details end --}}

                <div class="col-span-6 sm:col-span-3">
                    <x-input-label for="firstname">First Name</x-input-label>
                    <x-text-input type="text" name="firstname" id="firstname" :value="$admin->firstname" class="w-full" required/>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-input-label for="lastname">Last Name</x-input-label>
                    <x-text-input type="text" name="lastname" id="lastname" :value="$admin->lastname" class="w-full" required/>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-input-label for="email">Email</x-input-label>
                    <x-text-input type="email" name="email" id="email" :value="$admin->email" class="w-full" required readonly/>
                </div>
            </div>
        </div>
        <div class="py-3 text-right mt-4">

            <a href="{{ route('myprofile') }}"
                class="px-2 py-1 rounded bg-red-500 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
            <x-primary-button>
                {{ __('Update Information') }}
            </x-primary-button>
        </div>
    </form>


    <form action="{{ route('updateprofile', $admin->id) }}" method="POST" class="bg-white p-6 rounded-md mt-4">
        @csrf
        <div class="">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6">
                    <h3 class="font-poppins font-medium text-xl mb-2 uppercase text-blue">Password Reset</h3>
                </div>
                <div class="col-span-6">
                    <x-input-label for="password">New Password</x-input-label>
                    <x-text-input id="password" name="password" type="password" class="w-full" required/>
                </div>
                <div class="col-span-6">
                    <x-input-label for="password_confirmation">Confirm New Password</x-input-label>
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="w-full" required/>
                </div>
            </div>
        </div>
        <div class="py-3 text-right mt-4">
            <x-primary-button>
                {{ __('Update Password') }}
            </x-primary-button>
        </div>
    </form>

    {{-- Page script --}}
    <x-slot name="script">
        <script>
            $(document).ready(function() {

                $("#selectedFile").on('input', function() {
                    $("#studentppform").submit();
                });
            });
        </script>
    </x-slot>
</x-app-layout>
