<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>
<body class="antialiased">
<div class="pis">
    <div class="rounded-square">
        <a href="/subscription" class="primarycolor decorator"><i class="fa-solid fa-arrow-left fa-xl icon" style="color: #6d4aff;"></i></a>
        <div class="spacebetwinbox">
            <div>
                <div class="flex items-center justify-space-between flex-nowrap">
                    <div class="flex items-center flex-column flex-row gap-4 gap-2">
                        <div class=""><span class="primarycolor">Step 3</span></div>
                        <h2 class=" primarycolorblack text-bold text-4xl flex-1">Payment Fail</h2></div>
                </div>
            </div>
            <div class="margin3">
                <h1 class="primerycolorred">User declined payment !</h1>
            </div>
            <div class="checkoutcontent justify-space-between x">
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>
</body>
</html>
