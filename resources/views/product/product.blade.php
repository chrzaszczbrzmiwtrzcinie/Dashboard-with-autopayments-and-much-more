<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Square with Flattened Angles</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="pis">
    <div class="rounded-square">
        <a href="/subscription" class="primarycolor decorator"><i class="fa-solid fa-arrow-left fa-xl icon" style="color: #6d4aff;"></i></a>
        <div class="spacebetwinbox">
            <div>
                <div class="flex items-center justify-space-between flex-nowrap">
                    <div class="flex items-center flex-column flex-row gap-4 gap-2">
                        <div class=""><span class="primarycolor">Step 2</span></div>
                        <h2 class="text-bold text-4xl flex-1">Checkout</h2></div>
                </div>
            </div>
            <div class="checkoutcontent justify-space-between x">
                <div class="productimage">
                    <div class="productname">{{ $selectedProduct->name }}
                        <div class="off">
                            <div class="priceoff">{{ $selectedProduct->device }} OFF</div>
                        </div>
                    </div>
                    <div class="product"></div>
                    <div class="clientname">Product for: {{$data->name}}</div>
                </div>
                <div class="chujsection">
                    <div class="productinfo">

                        <div class="rounded-xl flexpanel flex-row py-4">
                            <div class="primarycolorblacksmall">JarlSoftware Premium License</div>
                            <div class="gap-2 flex">
                                <div class="rounded-xl flex flex-column gap-1 border border-weak">
                                    <div class="primarycolorblack">{{ $selectedProduct->name }}</div>
                                    <div class="primarycolorblack"><i class="fa-solid fa-crown"
                                                                      style="color: #6d4aff;"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-xl flex flex-column gap-1 padding border-weak">
                            <div class="">Total Price</div>
                            <div class="">{{ $selectedProduct->price }} €*</div>
                        </div>
                    </div>

                    <!-- CAPTCHA Form -->
                    <form method="POST">
                        <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"
                             data-callback="onCaptchaCompleted" data-expired-callback="onCaptchaExpired"></div>
                    </form>

                    <button type="button" id="select-method" class="paybutton" disabled> Pay</button>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <!-- CreditCard Form -->
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $selectedProduct->id }}">
                            <button type="submit" class="paybutton buttonstripe">
                                <i class="fa-regular fa-credit-card" style="color: #ffffff;"></i> CreditCard
                            </button>
                        </form>

                        <!-- PayPal Form -->
                        <form action="{{ route('payment') }}" method="post">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $selectedProduct->price }}">
                            <button type="submit" class="paybutton buttonpaypal darkblue">
                                <i class="fa-brands fa-paypal" style="color: #2790c3;"></i> PayPal
                            </button>
                        </form>

                        <button class="paybutton buttonfunpay">
                            <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> FunPay
                        </button>
                    </div>

                    <p>By clicking on "Pay", you agree to our terms and conditions.</p>
                </div>

                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <script src="https://kit.fontawesome.com/0d88b2fdb5.js" crossorigin="anonymous"></script>
                <script>
                    function onCaptchaCompleted() {
                        document.getElementById('select-method').disabled = false;
                        document.getElementById('dropdown-menu').classList.remove('disabled');
                    }

                    function onCaptchaExpired() {
                        resetButton();
                        document.getElementById('dropdown-menu').classList.remove('show');
                    }

                    function resetButton() {
                        document.getElementById('select-method').disabled = true;
                        document.getElementById('dropdown-menu').classList.add('disabled');
                    }

                    document.getElementById('select-method').addEventListener('click', function () {
                        if (!document.getElementById('dropdown-menu').classList.contains('disabled')) {
                            document.getElementById('dropdown-menu').classList.toggle('show');
                        }
                    });

                    document.addEventListener('DOMContentLoaded', function () {
                        resetButton();
                    });
                </script>
</body>
</html>


