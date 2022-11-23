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
            <div class="p-4">
                <button id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white">Add Media</button>
            </div>
        </div>

        <div class="">
            <!-- Create Modal -->
            <div class="hidden p-4 w-full overflow-y-auto overflow-x-hidden top-28 left-48 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
                id="addEditVacancyModal">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                <div class="col-span-6 ">
                                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                    <select id="type" name="type" autocomplete="type-name"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                        <option value="1">Photo</option>
                                        <option value="2">Video</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2 vlink">
                                    <label for="vlink" class="block text-sm font-medium text-gray-700">Video Link</label>
                                    <input type="text" name="vlink" id="vlink"
                                        class="mt-1 shadow-sm block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                        placeholder="Designation of this job vacancy.">
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
                                            placeholder="Details about this Job" required></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button
                                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700"
                                    id="cancleCreate">Cancle</button>
                                <button type="reset"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600">Reset</button>
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Save
                                    Media</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="p-4 w-full">
            <table id="vacancyTable" class="display text-center">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>

    {{-- Script --}}
    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/vacancy.js') }}"></script>
        <script>
            var vacancylist = null;
            $(document).ready(function() {
                $('#showCreateModal').click(function(e) {
                    e.preventDefault();
                    $("#addEditVacancyModal").show();
                });
                $('#cancleCreate').click(function(e) {
                    e.preventDefault();
                    $("#addEditVacancyModal").hide();
                });

            });

            vacancylist = $('#vacancyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('galleries.index') !!}',
                columns: [
                    // {
                    // data: null,
                    //     render: function(data) {
                    //         // if (data.type == '1') {
                    //         //     return '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded-full"><span class="iconify" data-icon="iconify" data-icon="heroicons:photo-solid"></span></span>';
                    //         // } else {
                    //         //     return '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-200 text-gray-700 rounded-full"><span class="iconify" data-icon="akar-icons:video"></span></span>';
                    //         // }
                    //         return `Hello`;
                    //     }
                    // },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'short_description',
                        name: 'short_description'
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `<div class="flex"><a href="${BASE_URL}galleries/${data.id}?id=${data.id}" target="_blank" class="bg-blue-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>
                            <a href="${BASE_URL}galleries/${data.id}/edit?id=${data.id}" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="mediadelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            });


            function mediadelete(mediaID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Media ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'galleries/' + mediaID + '?id=' + mediaID,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    vacancylist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    vacancylist.draw();
                                }
                            }
                        });
                    }
                });
            }

            // $('#type').change(function(e) {
            //     e.preventDefault();
            //     $('.vlink').toggleClass('hidden');
            //     $('.photo').toggleClass('hidden');
            // });
        </script>
    </x-slot>
</x-app-layout>
