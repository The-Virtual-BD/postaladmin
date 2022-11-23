<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">{{$role->name}}</h1>
            </div>
            <div class="p-4">
                <a href="{{ route('roles.index') }}" class="py-1 px-2 rounded bg-blue-500 text-white">List of Roles</a>
            </div>
        </div>

        <div class="p-4 w-full">
            <div>
                    <div class="p-6">
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <p><span>Name : </span> <span>{{$role->name}}</span></p>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="text-base font-medium text-gray-900" aria-hidden="true">Permissions:</div>
                                    <div class="mt-4 space-y-4">
                                        <div class="grid grid-cols-4">
                                            @foreach ($rolePermissions as $value)
                                            <p for="comments" class="font-medium text-gray-700">{{ $value->name }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <a href="{{route('roles.edit',$role->id)}}">
                                    <button class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Edit This Role</button>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>
