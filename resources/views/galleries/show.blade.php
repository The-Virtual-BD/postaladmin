<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">Media</h1>
            </div>
            <div class="p-4">
                <a href="{{route('galleries.index')}}" id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white">Media List</a>
            </div>
        </div>

        <div class="container mx-auto py-4 flex justify-center">
            <div class="w-[420px]">
                <div class="shadow-md bg-cover">
                    @if ($galary->type == 1)
                    <img src="{{asset($galary->photo)}}" alt=""
                        srcset="" class="w-full rounded-sm">
                    @else
                    <iframe class="w-full h-80" src="{{$galary->vlink}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif

                    <div class="py-6 px-7">
                        <p class="font-inter text-sm font-light text-black">{{$galary->short_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
