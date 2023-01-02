<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="shadow flex justify-between items-center">
            <div class="p-4">
                <h1 class="font-bold pl-2 text-2xl">Edit My Profile</h1>

            </div>
            <a href="{{ route('myprofile') }}" class="mr-4">
                <button class="px-2 py-1 rounded bg-blue-500 text-white">My Profile</button>
            </a>
        </div>

        <div class="container mx-auto py-6">
            <div class="rounded-t bg-white p-4 flex justify-start items-center shadow">
                <div class="mx-6 relative group">
                    <form id="studentppform" method="POST" action="{{ route('updateprofile', Auth::user()->id) }}"
                        enctype="multipart/form-data" class="d-none">
                        @csrf
                        <input type="file" name="profile_picture" id="selectedFile" style="display: none;" />
                    </form>
                    <img src="{{ Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('images/avatarbig.png') }}"
                        alt="" class="w-24 h-auto rounded-full">
                    <span class="iconify-inline absolute top-0 right-0 text-blue-500 hover:scale-105" data-icon="mdi:lead-pencil" onclick="document.getElementById('selectedFile').click();"></span>
                    <span class="text-xs text-red-500">Image must be squire 1:1 <br> Max: 256x256</span>
                </div>
                <div class="font-inter">
                    <h3 class="font-poppins font-medium text-xl">
                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                    </h3>
                    <p class="text-blue font-bold capitalize">Email: {{ Auth::user()->email }}</p>
                    <p class="text-blue font-bold capitalize">NIB: {{ Auth::user()->nib }}</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto bg-white rounded-md p-4 mt-2 shadow">
            <form action="{{ route('updateprofile', Auth::user()->id) }}" method="POST">
                @csrf
                <div class="">
                    <div class="grid grid-cols-6 gap-4">
                        {{-- Company details --}}
                        <div class="col-span-6 sm:col-span-3 companydetails hidden">
                            <label for="companyname" class="block text-sm font-bold font-poppins">Company
                                name</label>
                            <input type="text" name="companyname" id="companyname"
                                value="{{ Auth::user()->profile->company_name ?? '' }}"
                                class=" block w-full rounded-md bg-lblue focus:bg-white focus:ring-0 border-blue shadow-sm sm:text-sm">
                        </div>
                        <div class="col-span-6 sm:col-span-3 companydetails hidden">
                            <label for="tin" class="block text-sm font-bold font-poppins">TIN number</label>
                            <input type="text" name="tin" id="tin"
                                value="{{ Auth::user()->profile->tin_number ?? '' }}"
                                class=" block w-full rounded-md bg-lblue focus:bg-white focus:ring-0 border-blue shadow-sm sm:text-sm">
                        </div>
                        {{-- Company details end --}}

                        <div class="col-span-6 sm:col-span-3">
                            <label for="firstname" class="block text-sm font-bold font-poppins">First
                                name</label>
                            <input type="text" name="firstname" id="firstname" value="{{ Auth::user()->firstname }}"
                                class=" block w-full rounded-md bg-lblue focus:bg-white focus:ring-0 border-blue shadow-sm sm:text-sm"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="lastname" class="block text-sm font-bold font-poppins">Last name</label>
                            <input type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname }}"
                                class=" block w-full rounded-md bg-lblue focus:bg-white focus:ring-0 border-blue shadow-sm sm:text-sm"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-bold font-poppins">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-gray shadow-sm sm:text-sm"
                                required readonly>
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
        </div>


        <div class="container mx-auto bg-white rounded-md p-4 mt-2 shadow">
            <form action="{{ route('updateprofile', Auth::user()->id) }}" method="POST">
                @csrf
                <div class="">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <h3 class="font-poppins font-medium text-xl mb-2 uppercase text-blue">Password Reset</h3>
                        </div>
                        <div class="col-span-6">
                            <label for="password" class="block text-sm font-bold font-poppins">New pasword</label>
                            <input id="password" name="password"
                                type="password"class=" block w-full rounded-md border border-blue bg-lblue focus:bg-white focus:ring-0 py-2 px-3 shadow-sm sm:text-sm">
                        </div>
                        <div class="col-span-6">
                            <label for="password_confirmation" class="block text-sm font-bold font-poppins">New
                                pasword</label>
                            <input id="password_confirmation" name="password_confirmation"
                                type="password"class=" block w-full rounded-md border border-blue bg-lblue focus:bg-white focus:ring-0 py-2 px-3 shadow-sm sm:text-sm">
                        </div>
                    </div>
                </div>
                <div class="py-3 text-right mt-4">
                    <x-primary-button>
                        {{ __('Update Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

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
