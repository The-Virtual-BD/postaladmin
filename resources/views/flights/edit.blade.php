<x-currier-layout>
    <div class=" sm:px-6 lg:px-8">
        <div class="mb-4 md:col-span-2 md:mt-0 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <form action="{{route('flights.update',$flight->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="overflow-hidden sm:rounded-md">
                    <div class="">
                        <div class="grid grid-cols-8 gap-6">
                            <div class="col-span-8">
                                <label for="requestDate" class="block text-sm text-gray-700 font-bold">REQUEST
                                    DATE</label>
                                <input type="date" name="requestDate" id="requestDate" value="{{$flight->requestDate}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>

                            <div class="col-span-8 sm:col-span-2">
                                <label for="leg" class="block text-sm font-bold text-gray-700">LEG</label>
                                <input type="number" name="leg" id="leg" min="1" value="{{$flight->leg}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-8 sm:col-span-2">
                                <label for="flightNo" class="block text-sm font-bold text-gray-700">FLIGHT NO.</label>
                                <input type="text" name="flightNo" id="flightNo" value="{{$flight->flightNo}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-8 sm:col-span-2">
                                <label for="origin" class="block text-sm font-bold text-gray-700">ORIGIN</label>
                                <select id="origin" name="origin" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                        <option value="MIM" @if ($flight->origin == 'MIM') selected @endif>MIM</option>
                                        <option value="NAS" @if ($flight->origin == 'NAS') selected @endif>NAS</option>
                                </select>
                            </div>
                            <div class="col-span-8 sm:col-span-2">
                                <label for="deperture" class="block text-sm font-bold text-gray-700">DEPARTURE</label>
                                <select id="deperture" name="deperture" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                    <option value="MIM" @if ($flight->deperture == 'MIM') selected @endif>MIM</option>
                                    <option value="NAS" @if ($flight->deperture == 'NAS') selected @endif>NAS</option>
                                </select>
                            </div>
                            <div class="col-span-8">
                                <label for="deptime" class="block text-sm font-bold text-gray-700">DEPARTURE,LT</label>
                                <input type="datetime-local" name="deptime" id="deptime" value="{{$flight->deptime}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-8">
                                <label for="arrtime" class="block text-sm font-bold text-gray-700">ARRIVAL,LT</label>
                                <input type="datetime-local" name="arrtime" id="arrtime" value="{{$flight->arrtime}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-8 sm:col-span-2">
                                <label for="ftime" class="block text-sm font-bold text-gray-700">FLIGHT TIME</label>
                                <input type="time" name="ftime" id="ftime" value="{{$flight->ftime}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                            </div>

                            <div class="col-span-8 sm:col-span-2">
                                <label for="equipment" class="block text-sm font-bold text-gray-700">EQUIPMENT</label>
                                <select id="equipment" name="equipment" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                    <option value="77W"  @if ($flight->equipment == '77W') selected @endif>77W</option>
                                    <option value="75W"  @if ($flight->equipment == '75W') selected @endif>75W</option>
                                </select>
                            </div>

                            <div class="col-span-8 sm:col-span-2">
                                <label for="change" class="block text-sm font-bold text-gray-700">CHANGE</label>
                                <select id="change" name="change" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required >
                                    {{-- <option value="N">No</option> --}}
                                    <option value="Y" selected>Yes</option>
                                </select>
                            </div>
                            <div class="col-span-8 sm:col-span-2">
                                <label for="connect"  class="block text-sm font-bold text-gray-700">CONNECT</label>
                                <input type="number" name="connect" id="connect" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" value="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="my-4 text-right inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-bold text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update This Plan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
    </x-slot>
</x-currier-layout>
