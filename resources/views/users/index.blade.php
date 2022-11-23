
<x-app-layout>
    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Users</h1>
            </div>
            <div class="p-4">
                <a href="{{ route('users.create') }}"><button class="py-1 px-2 rounded bg-blue-500 text-white">Create
                        User</button></a>
            </div>
        </div>

        <div class="p-4 w-full">
            <table id="userTable" class="display text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>NIB</th>
                        <th>Suite Code</th>
                        <th>Action</th>
                    </tr>
                </thead>


            </table>
        </div>
    </div>


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

            vacancylist = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.index') !!}',
                columns: [{
                        data: 'firstname',
                        name: 'firstname'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
                            <a href="${BASE_URL}users/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="userDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            });




            function userDelete(userID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this User ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'users/'+userID,
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
