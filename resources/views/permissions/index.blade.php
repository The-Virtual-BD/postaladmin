<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
            {{ __('All Permissions') }}
        </x-nav-link>
        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
            {{ __('All Role') }}
        </x-nav-link>
        <x-nav-link :href="route('roles.create')" :active="request()->routeIs('roles.create')">
            {{ __('New Role') }}
        </x-nav-link>
    </x-slot>



    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="name">Permission Name</x-input-label>
                        <x-text-input type="text" name="name" id="name" class="w-full"
                            placeholder="permission" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input-label for="guard_name">Guard Name</x-input-label>

                        <select id="guard_name" name="guard_name" autocomplete="country-name"
                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="web" selected>Web</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <x-primary-button>Save Persission</x-primary-button>
            </div>
        </div>
    </form>

    <x-table-scalatel />


    <div class="p-6 bg-white rounded-md w-full mt-4 invisible" id="table-div">


        <table id="permissionTable" class="display text-center">
            <thead>
                <tr>
                    <th class="text-left w-10">Sl</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>

        </table>
    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script>
            var permissionlist = null;

            $('#table-scalatel').removeClass('hidden');
            $('#permissionTable').on('init.dt',function() {
                $('#table-scalatel').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });


            setTimeout(function() {
                permissionlist = $('#permissionTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('permissions.index') !!}',
                    columns: [{
                            "render": function(data, type, full, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'guard_name',
                            name: 'guard_name'
                        },
                        {
                            data: null,
                            render: function(data) {

                                return `<div class="flex justify-end"><a href="${BASE_URL}permissions/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletepermission(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });
            }, 1000);


            function deletepermission(roleId) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Permissions ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'permissions/' + roleId,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    permissionlist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    permissionlist.draw();
                                }
                            }
                        });
                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
