<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Http\Services\SubscriptionService;

class CustomAuthController extends Controller
{
    protected UserService $userService;
    protected SubscriptionService $subscriptionService;

    public function __construct(UserService $userService, SubscriptionService $subscriptionService)
    {
        $this->userService = $userService;
        $this->SubscriptionService = $subscriptionService;
    }

    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function registerUser(Request $request): RedirectResponse
    {
        $response = $this->userService->registerUser($request);

        if ($response['status'] == 'success') {
            return redirect()->back()->with('success', $response['message']);
        }
            return redirect()->back()->with('fail', $response['message']);
    }

    public function loginUser(Request $request)
    {
        $response = $this->userService->loginUser($request);

        if (!$response['status'] == 'success') {
            return redirect()->back()->with('fail', $response['message']);
        }
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $data = User::where('id','=', Session::get('loginId'))->first();
        return view("auth.dashboard", compact('data', ));
    }

    public function logout()
    {
        $this->userService->backToLogin();
        return redirect('login');
    }

    public function subscription() {
        $this->SubscriptionService->dayscalculator();

        $products = Product::all();
        $data = User::where('id','=', Session::get('loginId'))->first();
        return view("auth.subscription", compact('data', 'products'));
    }
    public function socialmedia() {
        return view("auth.socialmedia");
    }

    public function download() {
        $this->SubscriptionService->dayscalculator();
        $data = User::where('id','=', Session::get('loginId'))->first();
        return view("auth.download", compact('data'));
    }

    public function forgetPassword() {
        return view('auth.forgetpassword');
    }
    public function forgetPasswordPost(Request $request) {
        $this->userService->forgetservice($request);
    }
    public function resetPassword(Request $request) {
        $token = $request->query('token');
        return view('auth.newpassword', compact('token'));
    }
    public function resetPasswordPost(Request $request){
        $this->userService->resetpasswordpostservice($request);
        $token = $request->query('token');
        return view('auth.newpassword', compact('token'));
    }

}
