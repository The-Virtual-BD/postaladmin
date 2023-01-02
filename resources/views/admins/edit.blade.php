<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Edit this Admin</h1>
            </div>
            <div class="p-4">
                <a href="{{ route('admins.index') }}"><button id="showCreateModal"
                        class="py-1 px-2 rounded bg-blue-500 text-white">All Admins</button></a>
            </div>
        </div>
        <div class="container mx-auto bg-white rounded-md p-4 mt-6 shadow">
            <form action="{{ route('admins.update',$admin->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="text-gray-500">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <h3 class="font-poppins font-medium text-xl mb-2 uppercase text-blue-500">{{$admin->firstname.' '.$admin->lastname}}'s' Information</h3>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="firstname" class="block text-sm font-bold font-poppins">First
                                name</label>
                            <input type="text" name="firstname" id="firstname"
                                class=" block w-full rounded-md bg-blue-100 focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm" value="{{$admin->firstname}}"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="lastname" class="block text-sm font-bold font-poppins">Last name</label>
                            <input type="text" name="lastname" id="lastname"
                                class=" block w-full rounded-md bg-blue-100 focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm" value="{{$admin->lastname}}"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block text-sm font-bold font-poppins">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm" value="{{$admin->phone}}"
                                required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-bold font-poppins">Email</label>
                            <input type="email" name="email" id="email"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm" value="{{$admin->email}}"
                                required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nib" class="block text-sm font-bold font-poppins">NIB</label>
                            <input type="text" name="nib" id="nib"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm" value="{{$admin->nib}}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="py-3 text-right mt-4">

                    <a href="{{ route('admins.index') }}"
                        class="px-2 py-1 rounded bg-gray-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
                    <button type="submit"
                        class="px-2 py-1 bg-gradient-to-tr rounded from-blue-400 to-blue-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">
                        Update Admin
                    </button>

                </div>
            </form>
        </div>

        {{-- Only Password Change --}}
        <div class="container mx-auto bg-white rounded-md p-4 mt-6 shadow">
            <form action="{{ route('admins.update',$admin->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="text-gray-500">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <h3 class="font-poppins font-medium text-xl mb-2 uppercase text-blue-500">Change Password</h3>
                        </div>
                        <div class="col-span-6 grid grid-cols-6 gap-4">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="password" class="block text-sm font-bold font-poppins">Password</label>
                                <input type="password" name="password" id="password"
                                    class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm"
                                    >
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-bold font-poppins">Confirm
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm"
                                    >
                            </div>

                        </div>
                    </div>
                </div>
                <div class="py-3 text-right mt-4">

                    <a href="{{ route('admins.index') }}"
                        class="px-2 py-1 rounded bg-gray-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
                    <button type="submit"
                        class="px-2 py-1 bg-gradient-to-tr rounded from-blue-400 to-blue-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">
                        Update Admin Password
                    </button>

                </div>
            </form>
        </div>



    </div>
</x-app-layout>
