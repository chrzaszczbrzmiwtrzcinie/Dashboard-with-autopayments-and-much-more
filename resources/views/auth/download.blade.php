@extends('layouts.dashboardlayout')
@section('content')
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JarlSoftware Dashboard</title>
    <link href="{{ asset('css/download.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/subscription.css') }}" rel="stylesheet">
</head>
<body>
<div class="responsive-border-box">
    <div class="panel">
        <div class="panelname">Download
        </div>
        <p class="subtitle">Here will be your download link with tutorial after you buy subscription</p>
        <div class="margin"></div>
        @if($data && $data->status == 'paid')
            <div class=""><span class="primarycolor">Step 1</span></div>
            <p class="subtitle">Click this button to start download</p>
            <span><button class="btn btn-block btn-primary"><i class="fa-solid fa-download" style="color: #ffffff;"></i>Download</button></span>

            <div class="margin"><span class="primarycolor">Step 2</span></div>
            <p class="subtitle">Watch this video and follow the instruction</p>
            <div class="products-container"><a href="https://www.youtube.com/watch?v=lLX50poWVUc" target="_blank">
                    <div class="tutorial"></div>
                </a></div>
            <div class="margin"><span class="primarycolor">Step 3</span></div>
            <p class="subtitle">If u still dont know how to install our program contact with our support we don't leave
                you alone</p>
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
        @endif
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
