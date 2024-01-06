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
    <link href="{{ asset('css/subscription.css') }}" rel="stylesheet">
    <link href="{{ asset('css/socialmedia.css') }}" rel="stylesheet">
</head>
<body>
<div class="responsive-border-box">
    <div class="panel">
        <div class="panelname">Social media
        </div>
        <p class="subtitle">All JarlSoftware videos while useing Qradar </p>
        <div class="margin"></div>

        <div class="products-container">
            <a href="https://youtu.be/jv3B2nxzGfo?si=a8zfeKUcfkFRyjWI" class="freespace">
                <div class="video1"></div>
            </a>
            <a href="https://youtu.be/lj5RtTG4w1k?si=_qwVbkZ0QGpP-ZDj" class="freespace">
                <div class="video2"></div>
            </a>
            <a href="https://youtu.be/kSO_YZgy-_s?si=eWc7BEukGDQN6S-j" class="freespace">
                <div class="video3"></div>
            </a>
            <a href="https://youtu.be/ml840m_Wn04?si=KZoNLYL3YZC25rPZ" class="freespace">
                <div class="chanel"></div>
            </a>
            <a href="https://youtu.be/1luqoxNQK74?si=HPhr7CjnbFTzpNnR" class="freespace">
                <div class="video4"></div>
            </a>
            <a href="https://youtu.be/pz6UK_rD7xA?si=cEa6bvFWY3byiQU-" class="freespace">
                <div class="video5"></div>
            </a>
        </div>
    </div>
</div>
</body>
</html>
