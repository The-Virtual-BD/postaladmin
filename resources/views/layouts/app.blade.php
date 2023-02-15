<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('robin.png')}}" type="image/png">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <script>
            let BASE_URL = {!! json_encode(url('/')) !!} + "/";
            var PROCESSING_IMG = "{{ asset('images/ajax-loading.gif') }}";
        </script>


        <!-- Page headcss -->
        @if (isset($headcss))
            {{ $headcss }}
        @endif
        <link rel="stylesheet" href="{{asset('css/datatable.css')}}">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-poppins flex relative">

        {{-- Barcode popup --}}
        <div class="p-2 absolute z-50 w-full h-full bg-gray-500/40 justify-center items-center hidden barcodepop">

            <div class="w-48 h-84 bg-white rounded-md p-6 flex justify-center items-center">
                <div class="" id="barcode"></div>
            </div>
        </div>


        <div class="w-52 hidden sm:block transition duration-150 ease-in-out" id="sidebar">
            @include('layouts.partials.sidebar')
        </div>

        <div class="min-h-screen bg-gray-100 flex-grow">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="p-4 sm:p-6">
                {{ $slot }}
            </main>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
            integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{asset('js/custom.js')}}"></script>
        <!-- Page Script -->
        @if (isset($script))
            {{ $script }}
        @endif
    </body>
</html>
