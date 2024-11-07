<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src=
                "https://code.jquery.com/jquery-3.6.0.min.js">
            </script>
            <script src="/js/phaser.js"></script>
        <!-- Styles / Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
            <style type="text/css">
        
                * {
                    margin: 0;
                    padding: 0;
                }

                canvas {
                    display: block;
                    margin: 0;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 10;
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

                
                #spinner-icon{
                    display: none
                }
                .alert{
                    position: fixed;
                    left: 50%;
                    top: 0;
                }
                
            </style>
    </head>
    <body class="relative">
        <!-- remove or comment unused configs before publish -->
        <div class="fullscreen-video-container">
            <!-- Our video and text content will live here -->
            <video autoplay muted loop>
                <source src="/png/background.mp4" type="video/mp4"></source>
            </video>
        </div>
        <div id="sign_in" class="absolute bg-black bg-opacity-70 flex top-0 left-0 w-full h-full z-50">
            <div class="m-auto bg-gray-600 p-10 max-w-[700px] h-min rounded-lg bg-opacity-70 border border-black">
                <h3 class="text-4xl text-center text-white font-bold">You've Won 3 Free Slot Spins</h3>
                <h4 class="text-xl text-center font-semibold text-white">Win the Big Jackpot</h4>
                <div class="mt-5 text-center p-3">
                    <h5 class="text-white">Verify Your Email to Claim Your Spins</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input id="email" class="block mt-1 rounded w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <button type="submit" class="my-3 w-full p-2 text-white font-semibold uppercase rounded hover:bg-[#45a049] bg-[#4CAF50] email_submit" id="submit" value="Verify">
                            Verify <i id="spinner-icon" class="las la-spinner"></i>
                        </button>
                        <p class="">Email verified already? <a class="text-white" href="/login">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
        <script>
            
        </script>
        
        
    </body>
</html>
