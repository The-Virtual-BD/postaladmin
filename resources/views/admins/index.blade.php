<x-app-layout>


    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('admins.index')" :active="request()->routeIs('admins.index')">
            {{ __('Admins') }}
        </x-nav-link>
        <x-nav-link :href="route('admins.create')" :active="request()->routeIs('admins.create')">
            {{ __('New Admin') }}
        </x-nav-link>
    </x-slot>


    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>

    <x-table-scalatel />

    <div class="p-6 bg-white rounded-md w-full invisible" id="table-div">
        <table id="userTable" class="display text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Phone</th>
                    <th>NIB</th>
                    <th>Suite Code</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('js/vacancy.js') }}"></script>
        <script>
            var vacancylist = null;
            $('#table-scalatel').removeClass('hidden');
            $('#userTable').on('init.dt', function() {
                $('#table-scalatel').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });


            setTimeout(function() {
                vacancylist = $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admins.index') !!}',
                    columns: [{
                            data: 'firstname',
                            name: 'firstname'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: null,
                            render: function(data) {
                                let roles = ``;
                                data.roles.forEach((role) => {
                                    roles +=
                                        `<span class="px-2 py-1 bg-green-200 mx-1 rounded-full capitalize">${role.name}</span>`
                                });
                                return roles;

                            }
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'nib',
                            name: 'nib'
                        },
                        {
                            data: 'suite',
                            name: 'suite'
                        },
                        {
                            data: null,
                            render: function(data) {

                                let bookInfoUrl = BASE_URL + 'books/info/' + data.id
                                return `<div class="flex"><a href="${BASE_URL}users/${data.id}" target="_blank" class="bg-blue-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>
                            <a href="${BASE_URL}admins/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="userDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });
            }, 1000);





            function userDelete(userID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Admin ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'users/' + userID,
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
            // BASE_URL +'users/'+userID
        </script>

    </x-slot>
</x-app-layout>
