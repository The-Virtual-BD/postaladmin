<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Edit This User</h1>
            </div>
            <div class="p-4">
                <a href="{{route('users.index')}}"><button id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white">All Users</button></a>
            </div>
        </div>
        <div class="container mx-auto bg-white rounded-md p-4 mt-6 shadow">
            <form action="{{ route('users.update',$user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="text-gray-500">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <h3 class="font-poppins font-medium text-xl mb-2 uppercase text-blue-500">New User Information</h3>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block text-sm font-bold font-poppins">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{$user->phone}}"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm"
                                required >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-bold font-poppins">Email</label>
                            <input type="email" name="email" id="email" value="{{$user->email}}"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm"
                                required >
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nib" class="block text-sm font-bold font-poppins">NIB</label>
                            <input type="text" name="nib" id="nib" value="{{$user->nib}}"
                                class=" block w-full rounded-md bg-lgray focus:bg-white focus:ring-0 border-blue-500 shadow-sm sm:text-sm"
                                required >
                        </div>
                    </div>
                </div>
                <div class="py-3 text-right mt-4">

                    <a href="{{ route('users.index') }}"
                        class="px-2 py-1 rounded bg-gray-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">Cancel</a>
                    <button type ="submit" class="px-2 py-1 bg-gradient-to-tr rounded from-blue-400 to-blue-600 text-white hover:scale-105 focus:outline-none transition duration-150 ease-in-out">
                        Save User
                    </button>

                </div>
            </form>
        </div>



    </div>
</x-app-layout>
