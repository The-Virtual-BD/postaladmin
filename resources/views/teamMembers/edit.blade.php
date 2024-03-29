<x-app-layout>

    <x-slot name="submenu">
        <!-- Navigation Links -->
            <x-nav-link :href="route('teamMembers.index')" :active="request()->routeIs('teamMembers.index')">
                {{ __('All Member') }}
            </x-nav-link>
            <x-nav-link :href="route('teamMembers.create')" :active="request()->routeIs('teamMembers.create')">
                {{ __('New Member') }}
            </x-nav-link>
    </x-slot>

    <div id="main" class="main-content flex-1 bg-gray-100 pb-24 md:pb-5">
        <div class="p-6 bg-white rounded-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="font-raleway font-bold uppercase text-eve">New Member Information</h1>
            </div>
            <form action="{{route('teamMembers.update',$teamMember->id)}}" method="post" enctype="multipart/form-data" class="grid grid-cols-4 gap-5">
                @csrf
                @method("PATCH")
                <div class="">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input type="text" name="name" id="name" value="{{$teamMember->name}}" required/>
                </div>
                <div class="">
                    <x-input-label for="designation">Designation</x-input-label>
                    <x-text-input type="text" name="designation" id="designation" value="{{$teamMember->designation}}" required/>
                </div>
                <div class="">
                    <x-input-label for="email">Email</x-input-label>
                    <x-text-input type="email" name="email" id="email" value="{{$teamMember->email}}" required/>
                </div>
                <div class="">
                    <x-input-label for="phone">Phone</x-input-label>
                    <x-text-input type="text" name="phone" id="phone" value="{{$teamMember->phone}}" required class="onlynumber"/>
                </div>
                <div class="">
                    <x-input-label for="photo">Photo</x-input-label>
                    <x-file-input name="photo" id="photo"/>
                </div>
                <div class="col-span-4 flex justify-end">
                    <x-primary-button>Save</x-primary-button>
                </div>
            </form>
        </div>
    </div>


    <x-slot name="script">
        <script>
        </script>
    </x-slot>
</x-app-layout>
