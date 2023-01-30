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
                <h1 class=" font-bold uppercase text-eve">Team Members</h1>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-6 gap-5">
                @forelse ($members as $member)
                    {{-- Member --}}
                    <div class="relative group">
                        <img src="{{ asset($member->photo) }}" alt="" srcset="" class="w-full mb-2 @if ($member->status == 2) blur-sm @endif">
                        <p class="text-center  font-semibold text-xl text-dark mb-1">
                            {{ $member->name }}</p>
                        <p class="text-center  text-base text-dark-light mb-1">{{ $member->designation }}</p>
                        <p class="text-center  text-base text-dark-light mb-1">{{ $member->email }}</p>
                        <p class="text-center  text-base text-dark-light mb-1">{{ $member->phone }}</p>
                        <div class="hidden group-hover:flex space-x-2 absolute top-1 left-1">
                            <a href="{{ route('teamMembers.edit', $member->id) }}"
                                class="bg-adam-light bg-gray-300/40 p-2 rounded text-xl text-blue-500"><span
                                    class="iconify" data-icon="material-symbols:edit"></span></a>
                            <form action="{{ route('teamMembers.destroy', $member->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-adam-light bg-gray-300/40 p-2 rounded text-xl text-red-500"><span
                                        class="iconify"
                                        data-icon="material-symbols:delete-rounded"></span></button>
                            </form>
                            <form action="{{ route('teamMembers.update', $member->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="{{$member->status}}">
                                <button type="submit"
                                    class="bg-adam-light bg-gray-300/40 p-2 rounded text-xl text-blue-500"><span class="iconify" data-icon="uim:redo"></span></button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No Member Found.</p>
                @endforelse
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script>
        </script>
    </x-slot>
</x-app-layout>
