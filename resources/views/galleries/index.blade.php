<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.index')">
            {{ __('Gallery') }}
        </x-nav-link>
        <x-nav-link :href="route('galleries.create')" :active="request()->routeIs('galleries.create')">
            {{ __('New Gallery') }}
        </x-nav-link>
    </x-slot>


    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>



    <x-table-scalatel />

    <div class="p-6 bg-white rounded-md w-full invisible"  id="table-div">
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
    {{-- Script --}}
    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script>
            var vacancylist = null;


            $('#table-scalatel').removeClass('hidden');
            $('#vacancyTable').on('init.dt',function() {
                $('#table-scalatel').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });

            vacancylist = $('#vacancyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('galleries.index') !!}',
                columns: [
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


        </script>
    </x-slot>
</x-app-layout>
