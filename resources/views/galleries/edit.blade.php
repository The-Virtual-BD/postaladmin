<x-app-layout>
    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    </x-slot>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Galleries</h1>
            </div>
        </div>

        <div class="">
            <!-- Create Modal -->
            <div class="p-4 w-full overflow-y-auto overflow-x-hidden top-28 left-48 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
                id="addEditVacancyModal">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{ route('galleries.update',$galary->id) }}" method="POST" enctype="multipart/form-data">

                    {{-- <form action="{{URL::to('/');}}/galleries/{{$galary->id}}/edit?id={{$galary->id}}" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        @method('PATCH')
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                <div class="col-span-6 ">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                    <select id="type" name="type" autocomplete="type-name"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                        <option value="1" @if ($galary->type == 1) selected @endif>Photo</option>
                                        <option value="2" @if ($galary->type == 2) selected @endif>Video</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2 vlink">
                                    <label for="vlink" class="block text-sm font-medium text-gray-700">Video Link</label>
                                    <input type="text" name="vlink" id="vlink"
                                        class="mt-1 shadow-sm block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                        placeholder="Designation of this job vacancy." @if ($galary->type == 2) value="{{$galary->vlink}}" @endif>
                                </div>
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2 photo">
                                    <label for="jobType" class="block text-sm font-medium text-gray-700">Photo</label>
                                    <p class="block text-xs font-medium text-gray-500">Image size should be 418*300 and less
                                        then 2MB</p>
                                    <input type="file" name="photo" id="photo"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm sm:text-sm">
                                </div>


                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Short
                                        Description</label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            placeholder="Details about this Job" required>{{$galary->short_description}}</textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button
                                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700"
                                    id="cancleCreate">Cancle</button>
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Update
                                    Media</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
