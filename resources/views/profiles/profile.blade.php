<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="shadow flex justify-between items-center">
            <div class="p-4">
                <h1 class="font-bold pl-2 text-2xl">My Profile</h1>

            </div>
            <a href="{{route('editprofile')}}" class="mr-4">
                <button class="px-2 py-1 rounded bg-blue-500 text-white">Edit My Profile</button>
            </a>
        </div>

        <div class="container mx-auto py-6">
            <div class="rounded-t bg-white p-4 flex justify-start items-center shadow">
                <div class="mx-6">
                    <img src="{{ Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('images/avatarbig.png') }}" alt="" class="w-24 h-auto rounded-full">
                </div>
                <div class="font-inter">
                    <h3 class="font-poppins font-medium text-xl">
                        {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                    </h3>
                    <p class="text-blue font-bold capitalize">Role: {{ Auth::user()->roles->first()->name }}</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto bg-white rounded-md p-4 mt-6 shadow">

            <div class="grid sm:grid-cols-6">
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
        </div>

    </div>
</x-app-layout>
