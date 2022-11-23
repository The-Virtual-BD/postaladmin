<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Edit This Locations</h1>
            </div>
            <div class="p-4">
                <a href="{{route('locations.index')}}"><button id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white">All Locations</button></a>
            </div>
        </div>
        <div class="container mx-auto bg-white rounded-md p-4 mt-6 shadow">
            <form action="{{route('locations.update',$location->id)}}" method="POST">
                @csrf
                @method('PATCH')

                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="{{$location->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>
            </form>
        </div>



    </div>
</x-app-layout>
