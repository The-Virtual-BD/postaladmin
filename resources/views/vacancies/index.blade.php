<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('vacancies.index')" :active="request()->routeIs('vacancies.index')">
            {{ __('Vacancies') }}
        </x-nav-link>
        <x-nav-link :href="route('vacancies.create')" :active="request()->routeIs('vacancies.create')">
            {{ __('New Vacancies') }}
        </x-nav-link>
    </x-slot>

    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    </x-slot>

    <x-table-scalatel />

    <div class="p-6 bg-white rounded-md w-full invisible" id="table-div">
        <table id="vacancyTable" class="display text-center"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Title</th>
                    <th data-priority="3">Location</th>
                    <th data-priority="3">Vacancy</th>
                    <th data-priority="3">Job Type</th>
                    <th data-priority="3">Last Date</th>
                    <th data-priority="2">Action</th>
                </tr>
            </thead>

        </table>
    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('js/vacancy.js') }}"></script>
        <script>
            var vacancylist = null;

            $('#table-scalatel').removeClass('hidden');
            $('#vacancyTable').on('init.dt', function() {
                $('#table-scalatel').addClass('hidden');
                $("#table-div").removeClass('invisible').show();
            });

            setTimeout(function() {
                vacancylist = $('#vacancyTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('vacancies.index') !!}',
                    columns: [{
                            data: 'jobTitle',
                            name: 'jobTitle'
                        },
                        {
                            data: 'island',
                            name: 'island'
                        },
                        {
                            data: 'vacancy',
                            name: 'vacancy'
                        },
                        {
                            data: null,
                            render: function(data) {
                                if (data.jobType == '1') {
                                    return '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded-full">Full Time</span>';
                                } else if (data.jobType == '2') {
                                    return '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-400 text-white rounded-full">Part Time</span>';
                                } else {
                                    return '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-200 text-gray-700 rounded-full">Remote</span>';
                                }
                            }
                        },
                        {
                            data: 'lastDate',
                            name: 'lastDate'
                        },
                        {
                            data: null,
                            render: function(data) {

                                let bookInfoUrl = BASE_URL + 'books/info/' + data.id
                                return `<div class="flex justify-end item-center"><a href="${BASE_URL}vacancies/${data.id}" class="bg-blue-500 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>
                            <a href="${BASE_URL}vacancies/${data.id}/edit" class="bg-green-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletevacancy(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                }).columns.adjust().responsive.recalc();
            }, 1000);




            function deletevacancy(vacID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Job ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL + 'vacancies/' + vacID,
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
