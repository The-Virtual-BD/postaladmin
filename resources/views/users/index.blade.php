<x-app-layout>


    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
            {{ __('All User') }}
        </x-nav-link>
        <x-nav-link :href="route('users.create')" :active="request()->routeIs('users.create')">
            {{ __('New User') }}
        </x-nav-link>
    </x-slot>


    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    </x-slot>


    <x-table-scalatel />


    <div class="p-6 bg-white rounded-md invisible" id="table-div">
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





    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{asset('js/jquery-barcode.js')}}"></script>
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
                                return `<div class="flex justify-end">
                                    <a href="${BASE_URL}users/${data.id}" class="bg-blue-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>

                                    <a href="${BASE_URL}users/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                    <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="userDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button>
                                    </div>`;
                            }
                        }
                    ]
                });
            }, 1000);

            // <button type="button"  class="bg-orange-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-orange-700" onclick="generateBarcode(${data.suite});"><span class="iconify" data-icon="mdi:barcode-scan"></span></button>





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


            function generateBarcode(suite) {
                var suitestr = suite.toString();
                console.log(suitestr);
                $('.barcodepop').toggleClass('hidden').toggleClass('flex');
                $("#barcode").barcode( suitestr , "ean8");
            }

            $('.barcodepop').click(function (e) {
                e.preventDefault();
                $('.barcodepop').toggleClass('hidden').toggleClass('flex');
            });


            // BASE_URL +'users/'+userID
        </script>

    </x-slot>
</x-app-layout>
