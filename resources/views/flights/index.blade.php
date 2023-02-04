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
            <form action="" method="post" id="flightfilter">

                <div class="flex gap-3 flex-wrap">

                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="requestDate" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Request
                            Date</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="date" name="requestDate" id="requestDate"
                                class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="deptime" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Departure
                            Time</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="time" name="deptime" id="deptime"
                                class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex justify-between min-w-[312px] items-center">
                        <label for="arrtime" class="block text-sm font-normal sm:font-medium text-gray-700 mr-2">Arrival Time</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="time" name="arrtime" id="arrtime"
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
                        <input type="number" name="connect" id="connect" value="0" min="0"
                            class="block w-48  flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                </div>
            </form>
            <input type="hidden" name="rqmode" id="rqmode" value="docready">
        </div>


        <x-table-scalatel />
        {{-- Flight Table --}}
        <div class="p-6 bg-white rounded-md w-full invisible" id="table-div">
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
        <script src="{{ asset('js/flight.js') }}"></script>
    </x-slot>
</x-currier-layout>
