<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <script
            async
            src="https://u.gummibeer.dev/script.js"
            data-website-id="3515b65a-2535-429c-b9d6-d1604b810f89"
            data-domains="sukuro.app"
            data-exclude-search="true"
            data-exclude-hash="true"
        ></script>

        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="relative flex p-4 items-center justify-center min-h-screen flex-col">
        {!! $slot !!}

        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>
