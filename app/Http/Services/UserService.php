<?php

namespace App\Http\Services;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    public function forgetservice(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $token = Str::random(64);
        $key = Str::random(9);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'key' => $key,
            'created_at' => Carbon::now()
        ]);
        Mail::send('auth.resetpassword', ['token' => $token, 'key' => $key], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        session()->flash('success', 'We sent an email. Check your inbox.');
        return redirect()->route('login');
    }

    public function resetpasswordpostservice(Request $request)
    {
        $request->validate([
            'key' => 'required|string|exists:password_resets,key',
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|max:12|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatepassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'key' => $request->key,
            ])->first();

        if (!$updatepassword) {
            return redirect()->to(route('forget.password'))->with('error', 'Invalid token.');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password is updated.');
    }
}

