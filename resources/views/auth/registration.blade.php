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
        <form action="{{route('register-user')}}" method="post">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
            <div class="form-group">
                <h1>Create Account</h1>
                <input type="text" class="form-control" placeholder="Enter Login"
                       name="name" value="{{old('name')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Enter Email</label>
                <input type="text" class="form-control" placeholder="Enter Email"
                       name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" class="form-control" placeholder="Enter Password"
                       name="password" value="{{old('password')}}">
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
            </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <div>
                <button class="recaptcha btn btn-block btn-primary"
                        data-sitekey="6Lfm-DwpAAAAAERLF2_12-thP-xVtflQDytK-eJx" data-callback='onSubmit'
                        data-action='registration' type="submit">Register
                </button>
            </div>
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
                <p>Login with your personal details to use all of site features</p>
                <a href="/login">
                    <button class="hidden" id="register">Sign in</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>
</body>

</html>
