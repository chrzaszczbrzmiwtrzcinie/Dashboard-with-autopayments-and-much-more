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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <h1>Type Email</h1>
            <div class="form-group">
                <label for="email">Account key</label>
                <input type="text" class="form-control" placeholder="Account key"
                       name="key" value="{{old('key')}}">
                <span class="text-danger">@error('key'){{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Email"
                       name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <div>
                <button class="recaptcha btn btn-block btn-primary"
                        data-sitekey="6Lfm-DwpAAAAAERLF2_12-thP-xVtflQDytK-eJx" data-callback='onSubmit'
                        data-action='resetpassword' type="submit">Reset password
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

