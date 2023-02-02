<x-currier-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
            <x-nav-link :href="route('flights.index')" :active="request()->routeIs('flights.index')">
                {{ __('Flight Planes') }}
            </x-nav-link>
            <x-nav-link :href="route('flights.create')" :active="request()->routeIs('flights.create')">
                {{ __('Quick Create') }}
            </x-nav-link>
    </x-slot>

    {{-- Header style --}}
    <x-slot name="headcss">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    </x-slot>

    <div id="main" class="">

        <div class="p-6 bg-white rounded-md w-full mb-4">
            <form action="" method="post">

                <div class="flex gap-3 flex-wrap">
                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="requestDate" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Request
                            Date</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="requestDate" id="requestDate"
                                class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="deptime" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Departure
                            Time</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="deptime" id="deptime"
                                class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="arrtime" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Arrival Time</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="arrtime" id="arrtime"
                                class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>
                </div>



                <div class="flex flex-wrap gap-3 mt-3">
                    <div class="min-w-[312px] flex justify-between items-center">
                        <label for="origin" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Origin</label>
                        <select id="origin" name="origin"
                            class="mt-1 block w-48  rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="MIM">MIM</option>
                            <option value="NAS">NAS</option>
                        </select>
                    </div>
                    <div class="min-w-[312px] flex justify-between items-center">
                        <label for="deperture" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Departure</label>
                        <select id="deperture" name="deperture"
                            class="mt-1 block w-48  rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="MIM">MIM</option>
                            <option value="NAS">NAS</option>
                        </select>
                    </div>
                    <div class="min-w-[312px] flex justify-between items-center">
                        <label for="change" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Change</label>
                        <select id="change" name="change"
                            class="mt-1 block w-48  rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="N">No</option>
                            <option value="Y">Yes</option>
                        </select>
                    </div>
                    <div class="min-w-[312px] flex justify-between items-center">
                        <label for="connect" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Connect</label>
                        <input type="number" name="connect" id="connect" value="0"
                            class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>
            </form>
        </div>




        <div class="p-6 bg-white rounded-md w-full hidden">
            <table id="flighttable" class="display text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr class="uppercase">
                        <th>Request Date</th>
                        <th>LEG</th>
                        <th>Flight No</th>
                        <th>Origin</th>
                        <th>Departure</th>
                        <th>Departure, LT</th>
                        <th>Arrival, LT</th>
                        <th>Flight Time</th>
                        <th>Equipment</th>
                        <th>Change</th>
                        <th>Connect</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    <x-slot name="script">
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
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

            vacancylist = $('#flighttable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('flights.index') !!}',
                columns: [{
                        data: 'requestDate',
                        name: 'requestDate'
                    },
                    {
                        data: 'leg',
                        name: 'leg'
                    },
                    {
                        data: 'flightNo',
                        name: 'flightNo'
                    },
                    {
                        data: 'origin',
                        name: 'origin'
                    },
                    {
                        data: 'deperture',
                        name: 'deperture'
                    },
                    {
                        data: 'deptime',
                        name: 'deptime'
                    },
                    {
                        data: 'arrtime',
                        name: 'arrtime'
                    },
                    {
                        data: 'ftime',
                        name: 'ftime'
                    },
                    {
                        data: 'equipment',
                        name: 'equipment'
                    },
                    {
                        data: 'change',
                        name: 'change'
                    },
                    {
                        data: 'connect',
                        name: 'connect'
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `<div class="flex justify-end item-center">
                            <a href="${BASE_URL}flights/${data.id}/edit" class="bg-green-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                            <button type="button"  class="bg-red-400 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="deletevacancy(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                        }
                    }
                ]
            }).columns.adjust().responsive.recalc();




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
                            url: BASE_URL +'flights/'+vacID,
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
</x-currier-layout>
