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
</head>
<body>
<div class="responsive-border-box">
    <div class="panel">
        <div class="panelname">Subscriptions
        </div>
        <p class="subtitle">All premium JarlSoftware license, choose best offer for you</p>
        <div class="margin"></div>
        <div class=""><span class="primarycolor">Step 1</span></div>
        <div class="products-container">
            @foreach($products as $product)
                <div class="product-item">
                    <div class="productimage">
                        <div class="productname">{{ $product->name }}
                        <div class="off"><div class="priceoff">{{ $product->device }} OFF</div></div>
                        </div>
                        <div class="product"></div>
                        <div class="clientname">Product price:  {{ $product->price }} €
                            <div class="margin2"></div>
                            <form action="{{ route('selectProduct') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
