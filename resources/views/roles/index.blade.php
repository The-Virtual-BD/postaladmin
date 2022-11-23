<x-app-layout>

    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>

    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Vacancies</h1>
            </div>
            <div class="p-4">
                <a href="{{route('roles.create')}}" class="py-1 px-2 rounded bg-blue-500 text-white">Create Role</a>
            </div>
        </div>

        <div class="p-4 w-full">
            <table id="roleTable" class="display text-center">
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
            var roleList = null;

            roleList = $('#roleTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('roles.index') !!}',
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

                            return `<div class="flex"><a href="${BASE_URL}roles/${data.id}" target="_blank" class="bg-blue-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>
                            <a href="${BASE_URL}roles/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deleterole(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            });


            function deleterole(roleId) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Role ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'roles/'+roleId,
                            success: function (response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    roleList.draw();
                                }else if(response.status == "error"){
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    roleList.draw();
                                }
                            }
                        });
                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
