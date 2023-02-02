<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5 ">

        <div class="p-4 w-full">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Site Settings</h3>
                            <p class="mt-1 text-sm text-gray-600">This information will be displayed in Job list (Must
                                Needed).</p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{ route('settings.store') }}" method="POST">
                            @csrf
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3">
                                            <label for="jobTitle" class="block text-sm font-medium text-gray-700">Frontend
                                                site Moode</label>
                                            <select id="appmode" name="appmode" autocomplete="appmode-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                required>
                                                <option value="1">Live</option>
                                                <option value="2">Under Development</option>
                                            </select>


                                        </div>
                                    </div>

                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save
                                        Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="">
                <h3>Current Settings</h3>
                <ul>
                    @foreach ($settings as $setting)
                        <li>
                            <span class="p-4 uppercase">{{ $setting->property }} : </span>

                            @if ($setting->value == 1)
                                <span>Live</span>
                            @else
                                <span>Under Development</span>
                            @endif

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
