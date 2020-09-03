<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/app.js') }}?{{ time() }}" defer></script>
    <link href="{{ asset('css/app.css') }}?{{ time() }}" rel="stylesheet">
    @stack('css')
</head>

{{-- <body class="flex h-screen bg-gray-900 text-gray-700 mx-auto"> --}}

<body class="bg-gray-900 text-gray-600">

    @hasSection('content')

    @hasSection('header')
    @include('layouts.header')
    @endif

    <div class="flex h-screen-nav">
        @hasSection('sidebar')
        @include('layouts.sidebar')
        @endif

        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto bg-gray-200">
                @yield('content')
            </main>
        </div>


        {{-- <main class="h-full ">
            <div class="container px-6 mx-auto grid">
                @yield('content')
            </div>
        </main> --}}
        {{-- </div> --}}
    </div>
    @endif

    @hasSection('auth')
    <div class="flex h-screen justify-center py-6 w-full">
        @yield('auth')
    </div>
    @endif
</body>

@stack('js')

</html>