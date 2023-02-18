<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('locations.index')" :active="request()->routeIs('locations.index')">
            {{ __('Locations') }}
        </x-nav-link>
    </x-slot>

    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>

    <div class="p-4 w-full grid grid-cols-2 gap-5">
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Prefered Location">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                </div>
            </div>
        </form>
        <div class="">

            <x-table-scalatel />

            <div class="bg-white p-6 rounded invisible" id="table-div">
                <table id="locationtable" class="display text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>


        </div>



    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script>
            var locationlist = null;


            $('#table-scalatel').removeClass('hidden');
            $('#locationtable').on('init.dt', function() {
                $('#table-scalatel').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });


            setTimeout(function() {

                locationlist = $('#locationtable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('locations.index') !!}',
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}locations/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="locationDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });
            }, 1000);




            function locationDelete(userID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Location ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'locations/' + userID,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    locationlist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    locationlist.draw();
                                }
                            }
                        });
                    }
                });
            }
            // BASE_URL +'users/'+userID
        </script>

    </x-slot>
</x-app-layout>
