<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="relative flex p-4 items-center justify-center min-h-screen flex-col">
        {!! $slot !!}

        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>
