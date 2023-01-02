<nav aria-label="alternative nav" class="bg-blue-500">
    <div class="h-20  md:relative md:h-screen z-10 w-full md:w-48 content-center">

        <div
            class=" md:mt-[4rem] md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{ route('index') }}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="ci:home-alt-fill"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('vacancies.index') }}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="bxs:spreadsheet"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Vacancies</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('galleries.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="ic:baseline-photo-library"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Gallery</span>
                    </a>
                </li>
                {{-- <li class="mr-3 flex-1">
                    <a href="{{route('flightPlanner')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="ic:sharp-flight"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Flight Planner</span>
                    </a>
                </li> --}}
                <li class="mr-3 flex-1">
                    <a href="{{route('locations.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="material-symbols:location-on-outline"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Locations</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('teamMembers.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="ri:team-line"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Team Members</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('users.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="icon-park-solid:avatar"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Users</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('admins.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="eos-icons:admin"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Admins</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('roles.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="eos-icons:role-binding"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Roles</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('permissions.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="fluent-mdl2:permissions-solid"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Permissions</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{route('settings.index')}}"
                        class="flex items-center py-1 pl-1 align-middle text-white no-underline hover:text-white ">
                        <span class="iconify mr-4" data-icon="ant-design:setting-filled"></span><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-4 fixed w-48 bottom-0 left-0 bg-violet-800">
            <div class="flex justify-between items-center">

                <div class="">
                    <img src="{{ Auth::user()->profile->photo ? asset(Auth::user()->profile->photo) : asset('images/avatarbig.png') }}" alt="" srcset="" class="w-[50px] rounded-full">
                </div>
                <div class="ml-4 text-white">
                    <a href="{{route('myprofile')}}">
                        <p class="">Mehedi Hasan</p>
                        <p class="font-thin">Admin</p>
                    </a>
                </div>
            </div>


            <div class="pt-4 text-white text-lg">
                <ul class="flex justify-center">
                    <li class="mx-2 hover:text-blue-300"><a href="{{route('myprofile')}}"><span class="iconify"
                                data-icon="healthicons:ui-user-profile"></span></a></li>
                    <li class="mx-2 hover:text-blue-300">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"><span class="iconify"
                                data-icon="ri:logout-circle-line"></span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="flex-1 md:flex-none md:mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="#">Active</a>
                </li>
                <li class="flex-1 md:flex-none md:mr-3">
                    <a class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
                </li>
                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="relative inline-block">
                        <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2"> <span class="pr-2"><i class="em em-robot_face"></i></span> Hi, User <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                        <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                            <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-cog fa-fw"></i> Settings</a>
                            <div class="border border-gray-800"></div>
                            <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                        </div>
                    </div>
                </li>
            </ul> --}}
        </div>
    </div>


</nav>
