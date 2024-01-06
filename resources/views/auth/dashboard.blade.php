@extends('layouts.dashboardlayout')
@section('content')
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JarlSoftware Dashboard</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
<div class="responsive-border-box">
    <div class="panel">
        <div class="panelname">Desktop</div>
        <ul class="custom-list">
            <li class="list-header">
                <span>Name</span>
                <span>Email</span>
                <span>Status</span>
                <span>Current Days</span>
                <span>Change Password</span>
            </li>
            <li class="list-row phone">
                <span>{{$data->name}}</span>
                <span>{{$data->email}}</span>
                <span>{{$data->status}}</span>
                <span>{{$data->currentdays}}</span>
                <span><button class="btn btn-block btn-primary">Change Password</button></span>
            </li>
        </ul>
        <div>
            <div class="panelname margin">You have problem with subscription or some other questions ?</div>
            <div class="container">
                <a href="https://discord.com/invite/QrkW8yFKcU" class="decorator">
                    <div class="box">
                        <div class="insidebox">
                            <span class="discord"></span>
                            <div>Discord</div>
                        </div>
                    </div>
                </a>
                <button class="box" onclick="copyEmail()">
                    <div class="insidebox">
                        <span class="email"></span>
                        <div>Email</div>
                        <span id="emailToCopy" class="email-text">albionradar@protonmail.com</span>
                    </div>
                </button>
                <a href="/" class="decorator">
                    <div class="box">
                        <div class="insidebox">
                            <span class="telegram"></span>
                            <div>Telegram</div>
                        </div>
                    </div>
                </a>
                <a href="https://www.facebook.com/jarlsoftware/" class="decorator">
                    <div class="box">
                        <div class="insidebox">
                            <span class="facebook"></span>
                            <div>Facebook</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function copyEmail() {
        var email = document.getElementById("emailToCopy").innerText;
        var textarea = document.createElement("textarea");
        textarea.textContent = email;
        document.body.appendChild(textarea);

        textarea.select();
        try {
            document.execCommand("copy");
            alert("Email copied to clipboard!");
        } catch (err) {
            alert("Error in copying email: " + err);
        }
        document.body.removeChild(textarea);
    }
</script>
</body>
</html>

