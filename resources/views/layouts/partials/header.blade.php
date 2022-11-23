<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="pt-2 bg-white md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center justify-start">
            <div class="flex  md:w-48 justify-center items-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                </a>
            </div>

            <div class="flex flex-1 justify-center md:justify-start px-2">
                <span class="relative s:w-48 ">
                    <input aria-label="search" type="search" id="search" placeholder="Search"
                        class="w-full transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-2 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                    </div>
                </span>
            </div>


        </div>

    </nav>
</header>
