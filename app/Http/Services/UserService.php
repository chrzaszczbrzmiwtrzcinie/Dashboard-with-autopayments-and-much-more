<?php

namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function registerUser(Request $request): array
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9_]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->status = 'unpaid';
        $user->currentdays = '0';
        $user->subscriptiondays = '0';
        $user->subscriptiondate = '0';
        $user->logindate = '0';
        $user->role = 'client';


        if (!$user->save()) {
            return ['status' => 'fail', 'message' => 'Fail try register again with different details'];
        }
        return ['status' => 'success', 'message' => 'Register Success you can login now'];
    }

    public function loginUser(request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            return ['status' => 'fail', 'message' => 'Password not matches'];
        }
        if (Hash::check($request->password, $user->password)) {
            $request->session()->put('loginId', $user->id);
            return ['status' => 'success', 'message' => 'Login success'];
        }
        return ['status' => 'fail', 'message' => 'Password not matches'];
    }

    public function backToLogin()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
    }

}

