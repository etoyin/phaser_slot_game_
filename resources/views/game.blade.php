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
                
            </style>
    </head>
    <body class="">
    <!-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif -->
        <!-- remove or comment unused configs before publish -->
        <div class="fullscreen-video-container">
            <!-- Our video and text content will live here -->
            <video autoplay muted loop>
                <source src="/png/background.mp4" type="video/mp4"></source>
            </video>
        </div>

        <input type="hidden" id="user" value="{{ json_encode($user) }}">
        
        <script src="/js/slotConfig_3x5.js"></script>
        <script src="/js/mkutils.js"></script>
        <script src="/js/popups.js"></script>
        <script src="/js/state_machine.js"></script>
        <script src="/js/slot_classes.js"></script>
        <script src="/js/slotGame.js"></script>
        <script>
            var h = JSON.parse(document.getElementById('user').value);
            _new_user = h.new_user;
            // console.log(h);
            _update_new_user = (bool) => {
                fetch('/update_new_user')
                .then(res => res.json())
                .then(res => {
                    console.log(res);
                });
                // alert(bool);
            }
        </script>
        
    </body>
</html>
