<x-app-layout>

    <x-slot name="submenu">
            <x-nav-link :href="route('vacancies.index')" :active="request()->routeIs('vacancies.index')">
                {{ __('Vacancies') }}
            </x-nav-link>
            <x-nav-link :href="route('vacancies.create')" :active="request()->routeIs('vacancies.create')">
                {{ __('New Vacancy') }}
            </x-nav-link>
    </x-slot>


    <div id="main" class="main-content flex-1 bg-white p-6 rounded-md">
        <h1 class="text-2xl mb-6 font-bold">Add Vacancy</h1>

        <form action="{{ route('vacancies.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
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
            <div class="text-right mt-4">
                <button type="reset"
                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600">Reset</button>
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700">Save
                    Job</button>
            </div>
        </form>
    </div>



    <x-slot name="script">
        <script src="{{ asset('js/vacancy.js') }}"></script>
    </x-slot>
</x-app-layout>
