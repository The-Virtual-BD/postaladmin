<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Edit Job</h1>
            </div>
            <div class="p-4">
                <a href="{{ route('vacancies.index') }}" class="py-1 px-2 rounded bg-blue-500 text-white">List of Jobs</a>
            </div>
        </div>

        <div class="p-4 w-full">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Information</h3>
                            <p class="mt-1 text-sm text-gray-600">This information will be displayed in Job list (Must
                                Needed).</p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{route('vacancies.update',$vacancy->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3">
                                            <label for="jobTitle" class="block text-sm font-medium text-gray-700">Job
                                                Title</label>
                                            <input type="text" name="jobTitle" id="jobTitle"
                                                class="mt-1 shadow-sm block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                placeholder="Designation of this job vacancy." required value="{{$vacancy->jobTitle}}">
                                        </div>
                                    </div>
                                    <div class="col-span-6 ">
                                        <label for="island" class="block text-sm font-medium text-gray-700">Island</label>
                                        <select id="island" name="island" autocomplete="island-name"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                            @foreach ($islands as $key => $value)
                                            <option value="{{$key}}" @if ($key == $vacancy->island) Selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid gap-6 grid-cols-6">

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="vacancy" class="block text-sm font-medium text-gray-700">Vacancy</label>
                                            <input type="number" name="vacancy" id="vacancy"
                                                autocomplete="address-level1"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required value="{{$vacancy->vacancy}}">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="jobType"
                                                class="block text-sm font-medium text-gray-700">Type</label>
                                            <select id="jobType" name="jobType" autocomplete="jobType-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                                @foreach ($jobTypes as $key => $value)
                                                <option value="{{$key}}" @if ($key == $vacancy->jobType) Selected @endif>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="lastDate" class="block text-sm font-medium text-gray-700">Application Last Date</label>
                                            <input type="date" name="lastDate" id="lastDate"
                                                autocomplete="lastDate"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required value="{{$vacancy->lastDate}}">
                                        </div>


                                    </div>


                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">Job
                                            Description</label>
                                        <div class="mt-1">
                                            <textarea id="description" name="description" rows="3"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                placeholder="Details about this Job" required>{{$vacancy->description}}</textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update Job</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('js/vacancy.js') }}"></script>
    </x-slot>

</x-app-layout>
{{-- <x-app-layout>


    <x-slot name="script">

    </x-slot>
</x-app-layout> --}}
