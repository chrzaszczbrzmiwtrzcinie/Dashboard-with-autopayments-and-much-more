{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"--}}
{{--          crossorigin="anonymous">--}}
{{--    <title>QProfile</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">--}}
{{--            <h4>Login To QProfile</h4>--}}
{{--            <hr>--}}
{{--            <input type="hidden" name="_token" value="0S6UCxP1oowtIJK4lMlPVKMPy4ejajOo4hYITft8">--}}
{{--            <form action="{{route('login-user')}}" method="post">--}}
{{--                @if(Session::has('success'))--}}
{{--                    <div class="alert alert-success">{{Session::get('success')}}</div>--}}
{{--                @endif--}}
{{--                @if(Session::has('fail'))--}}
{{--                    <div class="alert alert-danger">{{Session::get('fail')}}</div>--}}
{{--                @endif--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="email">Enter Email</label>--}}
{{--                    <input type="text" class="form-control" placeholder="Enter Email"--}}
{{--                           name="email" value="{{old('email')}}">--}}
{{--                    <span class="text-danger">@error('email'){{$message}} @enderror</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="password">Enter Password</label>--}}
{{--                    <input type="password" class="form-control" placeholder="Enter Password"--}}
{{--                           name="password" value="">--}}
{{--                    <span class="text-danger">@error('password'){{$message}} @enderror</span>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <button class="btn btn-block btn-primary" type="submit">login</button>--}}
{{--                </div>--}}
{{--                    {!! NoCaptcha::renderJs() !!}--}}
{{--                    {!! NoCaptcha::display() !!}--}}
{{--                <br>--}}
{{--                <a href="registration">You don't have account ?</a>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
{{--        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
{{--        crossorigin="anonymous">--}}
{{--</script>--}}

{{--</html>--}}
{{--    <!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/login.css') }}" rel="stylesheet">--}}
{{--    <title>Laravel</title>--}}
{{--</head>--}}
{{--<body class="antialiased">--}}
{{--<div class="pis">--}}
{{--    <div class="rounded-squarelogin">--}}
{{--        <div class="spacebetwinbox">--}}
{{--            <div>--}}
{{--                <div class="flex items-center justify-space-between flex-nowrap">--}}
{{--                    <div class="flex items-center flex-column flex-row gap-4 gap-2">--}}
{{--                        <div class=""><span class="primarycolor">Step 3</span></div>--}}
{{--                        <h2 class=" primarycolorblack text-bold text-4xl flex-1">Payment Fail</h2></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="margin3">--}}
{{--                <h1 class="primerycolorred">User declined payment !</h1>--}}
{{--                <div class="container">--}}

{{--                            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">--}}
{{--                                <h4>Login To QProfile</h4>--}}
{{--                                <hr>--}}
{{--                                <input type="hidden" name="_token" value="0S6UCxP1oowtIJK4lMlPVKMPy4ejajOo4hYITft8">--}}
{{--                                <form action="{{route('login-user')}}" method="post">--}}
{{--                                    @if(Session::has('success'))--}}
{{--                                        <div class="alert alert-success">{{Session::get('success')}}</div>--}}
{{--                                    @endif--}}
{{--                                    @if(Session::has('fail'))--}}
{{--                                        <div class="alert alert-danger">{{Session::get('fail')}}</div>--}}
{{--                                    @endif--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="email">Enter Email</label>--}}
{{--                                        <input type="text" class="form-control" placeholder="Enter Email"--}}
{{--                                               name="email" value="{{old('email')}}">--}}
{{--                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="password">Enter Password</label>--}}
{{--                                        <input type="password" class="form-control" placeholder="Enter Password"--}}
{{--                                               name="password" value="">--}}
{{--                                        <span class="text-danger">@error('password'){{$message}} @enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <button class="btn btn-block btn-primary" type="submit">login</button>--}}
{{--                                    </div>--}}
{{--                                        {!! NoCaptcha::renderJs() !!}--}}
{{--                                        {!! NoCaptcha::display() !!}--}}
{{--                                    <br>--}}
{{--                                    <a href="registration">You don't have account ?</a>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--            <div class="checkoutcontent justify-space-between x">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>--}}
{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>Laravel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up">
            <h1>Create Account</h1>
            <span>or use your email for registeration</span>
    </div>
    <div class="form-container sign-in">
        <form action="{{ route('login-user') }}" method="post">
            <h1>Sign In</h1>
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <button class="btn btn-block btn-primary" type="submit">Sign In</button>
            <a href="#">Forget Your Password?</a>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Welcome Back!</h1>
                <p>Enter your personal details to use all of site features</p>
                <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p>Register with your personal details to use all of site features</p>
                <a href="/registration">
                <button class="hidden" id="register">Sign Up</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>
</body>

</html>
