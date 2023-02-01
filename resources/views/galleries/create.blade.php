<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
        <x-nav-link :href="route('galleries.index')" :active="request()->routeIs('galleries.index')">
            {{ __('Gallery') }}
        </x-nav-link>
        <x-nav-link :href="route('galleries.create')" :active="request()->routeIs('galleries.create')">
            {{ __('New Gallery') }}
        </x-nav-link>
    </x-slot>



    <!-- Create Modal -->
    <div class="w-full" id="addEditVacancyModal">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                        <div class="col-span-6 ">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type" autocomplete="type-name"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <option value="1">Photo</option>
                                <option value="2">Video</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3 lg:col-span-2 vlink hidden">
                            <label for="vlink" class="block text-sm font-medium text-gray-700">Video Link</label>
                            <input type="text" name="vlink" id="vlink"
                                class="mt-1 shadow-sm block w-full flex-1 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Designation of this job vacancy.">
                        </div>
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2 photo">
                            <label for="jobType" class="block text-sm font-medium text-gray-700">Photo</label>
                            <p class="block text-xs font-medium text-gray-500">Image size should be 418*300 and less
                                then 2MB</p>
                            <input type="file" name="photo" id="photo"
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm sm:text-sm">
                        </div>


                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Short
                                Description</label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Details about this Job" required></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-primary-button>Save Media</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function () {
                if ($('.type').val() == 1) {
                    $('.vlink').addClass('hidden');
                    $('.photo').removeClass('hidden');
                }else if($('.type').val() == 2){
                    $('.vlink').removeClass('hidden');
                    $('.photo').addClass('hidden');
                }
            });
            $('#type').change(function(e) {
                e.preventDefault();
                $('.vlink').toggleClass('hidden');
                $('.photo').toggleClass('hidden');
            });
        </script>
    </x-slot>
</x-app-layout>
