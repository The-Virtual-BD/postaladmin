<x-app-layout>

    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>

    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="p-6">
            <form action="{{route('permissions.store')}}" method="POST">
                @csrf
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Permission Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="permission-create">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="guard_name" class="block text-sm font-medium text-gray-700">Guard Name</label>
                                <select id="guard_name" name="guard_name" autocomplete="country-name"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                    <option value="web" selected>Web</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Permission</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="p-4 w-full">
            <table id="permissionTable" class="display text-center">
                <thead>
                    <tr>
                        {{-- <th>Sl</th> --}}
                        <th>Name</th>
                        <th>Guard</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script>
            var permissionlist = null;

            permissionlist = $('#permissionTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('permissions.index') !!}',
                columns: [
                    // {"render": function(data, type, full, meta) {
                    //         return meta.row + meta.settings._iDisplayStart + 1;
                    //         }
                    // },
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

                            return `<div class="flex"><a href="${BASE_URL}permissions/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletepermission(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            });


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
                            url: BASE_URL +'permissions/'+roleId,
                            success: function (response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    permissionlist.draw();
                                }else if(response.status == "error"){
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
