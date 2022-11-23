
<x-app-layout>
    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">

        <div class="shadow flex justify-between items-center">
            <div class="p-4  text-2xl">
                <h1 class="font-bold pl-2">{{$user->firstname." ".$user->lastname}}</h1>
            </div>
            <div class="p-4">
                <button id="showCreateModal" class="py-1 px-2 rounded bg-blue-500 text-white"><a href="{{route('users.edit',$user->id)}}">Edit this user</a></button>
            </div>
        </div>

        <div class="container mx-auto p-4">
            <div class="rounded-t bg-white p-4 flex justify-start items-center shadow">
                <div class="mx-6">
                    <img src="{{ asset('images/avatarbig.png') }}" alt="" class="w-24 h-auto">
                </div>
                <div class="font-inter">
                    <h3 class="font-poppins font-medium text-xl">
                        {{ $user->firstname . ' ' . $user->lastname }}
                    </h3>
                    <p>NIB: {{ $user->nib }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p class="text-blue-500 font-bold">Suite: #{{ $user->suite }}</p>
                </div>
            </div>
        </div>
        <div class="container mx-auto p-4">
            <div class="flex bg-white rounded-md p-4 mt-6 shadow">
                {{-- Contact Informations --}}
                <div class="col-span-2">
                    <div class="grid grid-cols-2 mb-4">
                        <h3 class="font-bold text-xl">Contact Information</h3>
                    </div>
                    <div class="my-2">
                        <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Type of account</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Type of account :</p>
                        <p>{{ $user->profile->account_type == 1 ? "Personal" : "Business"}}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Name :</p>
                        <p>{{ $user->firstname . ' ' . $user->lastname }}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Email :</p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold ">Phone :</p>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold ">Country :</p>
                        <p>{{$user->profile->country}}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold ">Island :</p>
                        <p>{{$user->profile->island}}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold ">STREET/ HOUSE NO :</p>
                        <p>{{$user->profile->house}}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold ">Address :</p>
                        <p>{{$user->profile->address}}</p>
                    </div>
                    <div class="mt-4 mb-2">
                        <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Prefered Region</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Prefered Region :</p>
                        <p>{{$user->profile->region}}</p>
                    </div>

                    <div class="mt-4 mb-2">
                        <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Prefered location</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Prefered location :</p>
                        <p>{{$user->profile->location}}</p>
                    </div>

                </div>
                @if ($user->profile->account_type == 2)
                {{-- Business Informations --}}
                <div class="col-span-2">
                    <div class="grid grid-cols-2 mb-4">
                        &nbsp;
                    </div>
                    <div class="my-2">
                        <p class="text-base text-blue-500 uppercase font-bold tracking-widest">Business Information</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">Company Name :</p>
                        <p>{{$user->profile->company_name}}</p>
                    </div>
                    <div class="grid grid-cols-2 text-sm my-1">
                        <p class="font-bold">TIN No :</p>
                        <p>{{$user->profile->tin_number}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
