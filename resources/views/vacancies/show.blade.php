<x-app-layout>

    <x-slot name="submenu">
            <x-nav-link :href="route('vacancies.index')" :active="request()->routeIs('vacancies.index')">
                {{ __('Vacancies') }}
            </x-nav-link>
            <x-nav-link :href="route('vacancies.create')" :active="request()->routeIs('vacancies.create')">
                {{ __('New Vacancies') }}
            </x-nav-link>
    </x-slot>


    <div id="main" class="p-6 bg-white rounded-md">
        <div class="px-4 sm:px-0">
            <h3 class="text-2xl font-bold leading-6 text-gray-900">{{$vacancy->jobTitle}}</h3>
            <p class="mt-1 text-sm text-gray-600">This information will be displayed in Job list (Must
                Needed).</p>
        </div>
        <p class="mt-4"> Job Title : {{$vacancy->jobTitle}}</p>
        <p class="mt-2"> Island : {{$vacancy->island}}</p>
        <p class="mt-2"> Vacancy : {{$vacancy->vacancy}}</p>
        <p class="mt-2"> Type :
            @if ($vacancy->jobType == 1)
            Full Time
            @elseif($vacancy->jobType == 2)
            Part Time
            @else
            Remote
            @endif</p>
        <p class="mt-2"> Application Last Date : {{$vacancy->lastDate}}</p>
        <p class="mt-2"> Description : {{$vacancy->description}}</p>
        <div class="text-right mt-4">
            <a href="{{route('vacancies.edit',$vacancy->id)}}"
                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Edit Job</a>
        </div>
    </div>


    <x-slot name="script">
        <script src="{{ asset('js/vacancy.js') }}"></script>

    </x-slot>
</x-app-layout>
