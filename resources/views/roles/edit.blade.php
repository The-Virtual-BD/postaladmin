<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Edit Job</h1>
            </div>
            <div class="p-4">
                <a href="{{ route('vacancies.index') }}" class="py-1 px-2 rounded bg-blue-500 text-white">List of Jobs</a>
            </div>
        </div>

        <div class="p-6">
            <form action="{{route('roles.update', $role->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Role
                                    Name:</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" value="{{$role->name}}" class="block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <div class="text-base font-medium text-gray-900" aria-hidden="true">Permissions:</div>
                            <div class="mt-4 space-y-4">
                                @foreach ($permissions as $value)
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="" name="permission[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                            value="{{$value->id}}" {{ in_array($value->id, $rolePermissions) ? 'checked' : 'false'}}>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments" class="font-medium text-gray-700" >{{ $value->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update Information</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


</x-app-layout>
