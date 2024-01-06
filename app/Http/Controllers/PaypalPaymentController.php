<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\PaypalService;

class PaypalPaymentController extends Controller
{
    protected PaypalService $paypalService;

    public function __construct(PaypalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }
    public function pay(Request $request)
    {
        $this->paypalService->payserive($request);
    }

    public function paypalsuccess(Request $request)
    {
        if (!$request->input('paymentId') || !$request->input('PayerID')){
            return view('product.checkout-cancel');
    }
        $this->paypalService->getpayerdata($request);

        $data = User::where('id', '=', Session::get('loginId'))->first();
        return view('product.checkout-success', compact('data'));
    }

    public function error()
    {
        return view('product.checkout-cancel');
    }

}

