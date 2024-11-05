<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            .fullscreen-video-container {
                position: relative;
                height: 100vh; 
                width: 100vw;
                overflow: hidden;
            }
            .fullscreen-video-container video {
                position: absolute;
                width: auto;
                height: auto;
                min-width: 100%;
                min-height: 100%;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                z-index: -100;
            }
        </style>
    </head>
    <body class="font-sans relative">
        <div class="fullscreen-video-container">
            <!-- Our video and text content will live here -->
            <video autoplay muted loop>
                <source src="/png/background.mp4" type="video/mp4"></source>
            </video>
        </div>
        <div class="absolute left-0 top-0 w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black bg-opacity-70">
            <div>
                <a href="/">
                    <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#444343] bg-opacity-50 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
