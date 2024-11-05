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
                #sign_in{
                    position: absolute;
                    background-color: #3a3a3993;
                    z-index: 50;
                    display: flex;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                }
                body{
                    position: relative;
                }
                #sign_in > div{
                    align-items: center;
                    margin: auto;
                    width: 600px;
                    vertical-align: middle;
                    border-radius: 10px;
                    border: 1px solid black;
                    height: 300px;
                    background-color: #444343;
                    padding: 20px;
                    text-align: center;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }
                
                h3{
                    font-size: 30px;
                    color: whitesmoke;
                    margin: 20px
                }
                h4{
                    font-size: 20px;
                    color: whitesmoke;
                    margin: 10px
                }
                h5{
                    font-size: 15px;
                    color: whitesmoke;
                    margin: 5px
                }
                input[type=email], select {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                button {
                    width: 100%;
                    background-color: #4CAF50;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 20px;
                }

                button:hover {
                    background-color: #45a049;
                }

                .form-div {
                    padding: 20px;
                    /* background-color: aqua; */
                    width: 400px;
                    margin: auto;
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
        <div id="sign_in">
            <div>
                <h3>You've Won 3 Free Slot Spins</h3>
                <h4>Win the Big Jackpot</h4>
                <div class="form-div">
                    <h5>Verify Your Email to Claim Your Spins</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <button type="submit" class="email_submit" id="submit" value="Verify">
                            Verify <i id="spinner-icon" class="las la-spinner"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script>
            let submit = document.getElementById('submit');
            const validateEmail = (email) => {
                return email.match(
                    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            };
            submit.addEventListener('click', function(e){
                e.preventDefault();
                let email = document.getElementById('email').value;

                if(validateEmail(email)){
                    document.querySelector("#spinner-icon").style.display = 'inline';
                    let formData = new FormData();
                    formData.append('email', email);
                    // formData.append('_token', "{{csrf_token()}}");
                    // fetch('http://localhost:8000/api/csrf-token')
                    // .then(res => res.json())
                    // .then(res => {
                    //     const csrf_token = res.csrf_token;
                    //     fetch('http://localhost:8000/api/register', {
                    //         method: 'post',
                    //         headers: {
                    //             'Content-Type': 'application/x-www-form-urlencoded',
                    //             'XSRF-TOKEN': csrf_token
                    //         },
                    //         body: formData
                    //     })
                    //     .then(res => res.json())
                    //     .then(res => console.log(res))
                    //     .catch(error => console.log(error))
                    // })
                    // .catch(error => {
                    //     console.error('Error fetching CSRF token:', error);
                    // })
                    
                    
                    $.post('/register',
                        {
                            email: email
                        },
                        function(data, status){
                            alert("Data: "+data+"\nStatus: "+ status)
                        }
                    );
                    
                }else{
                    alert("Email is invalid!")
                }
            })
            function doU (spinCount, loggedIn){
                if(!loggedIn){
                    alert("nmnmnmnm")
                }
            }
        </script> -->
        
        
    </body>
</html>
