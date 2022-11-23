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
                <button id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white">Create Job</button>
            </div>
        </div>

        <div class="">
            <!-- Create Modal -->
            <div class="hidden p-4 w-full overflow-y-auto overflow-x-hidden top-28 left-48 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
                id="addEditVacancyModal">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{ route('vacancies.store') }}" method="POST">
                        @csrf
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <label for="jobTitle" class="block text-sm font-medium text-gray-700">Job
                                            Title</label>
                                        <input type="text" name="jobTitle" id="jobTitle"
                                            class="mt-1 shadow-sm block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            placeholder="Designation of this job vacancy." required>
                                    </div>
                                </div>
                                <div class="col-span-6 ">
                                    <label for="island" class="block text-sm font-medium text-gray-700">Island</label>
                                    <select id="island" name="island" autocomplete="island-name"
                                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                        required>
                                        @foreach ($islands as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid gap-6 grid-cols-6">

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="vacancy"
                                            class="block text-sm font-medium text-gray-700">Vacancy</label>
                                        <input type="number" name="vacancy" id="vacancy" autocomplete="address-level1"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="jobType" class="block text-sm font-medium text-gray-700">Type</label>
                                        <select id="jobType" name="jobType" autocomplete="jobType-name"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            required>
                                            @foreach ($jobTypes as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="lastDate" class="block text-sm font-medium text-gray-700">Application
                                            Last Date</label>
                                        <input type="date" name="lastDate" id="lastDate" autocomplete="lastDate"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                            required>
                                    </div>


                                </div>


                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Job
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
                                    Job</button>
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
                        <th>Title</th>
                        <th>Location</th>
                        <th>Vacancy</th>
                        <th>Job Type</th>
                        <th>Last Date</th>
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

            vacancylist = $('#vacancyTable').DataTable({
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
                            return `<div class="flex"><a href="${BASE_URL}vacancies/${data.id}" target="_blank" class="bg-blue-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-blue-700"><span class="iconify" data-icon="carbon:view-filled"></span></a>
                            <a href="${BASE_URL}vacancies/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletebook(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            });


            // function deletebook(bookId) {
            //     $.ajax({
            //         method: 'DELETE',
            //         url: BASE_URL +'vacancies/'+bookId,
            //         beforeSend:function(){
            //             return confirm("Are you sure?");
            //         },
            //         success: function (response) {
            //             if (response.status == "success") {
            //                 Swal.fire('Success!', response.message, 'success');
            //                 bookList.draw();
            //             }else if(response.status == "error"){
            //                 Swal.fire('This item is not deletable!', response.message, 'error');
            //                 bookList.draw();
            //             }
            //         }
            //     });
            // }



            function deletebook(bookId) {
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
                            url: BASE_URL +'vacancies/'+bookId,
                            success: function (response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    vacancylist.draw();
                                }else if(response.status == "error"){
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
