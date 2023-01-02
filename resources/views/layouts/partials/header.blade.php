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
                        <span class="iconify" data-icon="material-symbols:search-rounded"></span>
                    </div>
                </span>
            </div>

        </div>

    </nav>
</header>
