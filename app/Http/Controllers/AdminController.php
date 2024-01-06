<?php

namespace App\Http\Controllers;


use App\Http\Services\AdminService;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Services\JWTService;


class AdminController extends Controller
{
    protected JWTService $subscriptionService;
    protected AdminService $adminService;
    public function __construct(JWTService $subscriptionService, AdminService $adminService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->AdminService = $adminService;
    }

    public function adminpanel()
    {
        $data = User::where('id', '=', Session::get('loginId'))->first();
        $users = User::all();
        return view("auth.adminpanel", compact('users', 'data'));
    }

    public function updateLoginDate() {
        $currentTimestamp = time();

        User::query()->each(function($user) use ($currentTimestamp) {
            try {

                $elapsedDays = ($user->logindate - $user->subscriptiondate) / (24 * 60 * 60);
                $remainingDays = max($user->subscriptiondays - $elapsedDays, 0);
                $user->currentdays = $remainingDays;

                if ($user->subscriptiondate > 0 && $user->subscriptiondays > 0) {
                    $user->logindate = $currentTimestamp;
                }
            } catch (JWTException $e) {

            }

            $user->save();
        });

        return response()->json(['message' => 'User data updated successfully']);
    }
}
