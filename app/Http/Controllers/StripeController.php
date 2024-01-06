<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\StripeService;
use App\Http\Services\JWTService;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class StripeController extends Controller
{
    private StripeService $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function checkout(Request $request) {
        $sessionUrl = $this->stripeService->createCheckOutSession($request);
        return redirect($sessionUrl);
    }

    public function stripesuccess(Request $request)
    {
        $this->stripeService->success($request);
        $data = User::where('id','=', Session::get('loginId'))->first();
        return view('product.checkout-success', compact('data'));
    }

    public function cancel()
    {
        return view('product.checkout-cancel');
    }

    public function webhook()
    {
        $this->stripeService->webhook();
        return response('');
    }
}
