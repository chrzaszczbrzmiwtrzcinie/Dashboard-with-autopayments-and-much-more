<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;


class SubscriptionService
{
    protected SubscriptionService $subscriptionService;
    public function dayscalculator()
    {
        $user = User::where('id','=', Session::get('loginId'))->first();
        $elapsedDays = ($user->logindate - $user->subscriptiondate) / (24 * 60 * 60);
        $remainingDays = max($user->subscriptiondays - $elapsedDays, 0);
        $user->currentdays = $remainingDays;

        if ($remainingDays <= 0) {
            $user->status = 'unpaid';
            $user->currentdays = 0;
            $user->subscriptiondays = 0;
            $user->subscriptiondate = 0;
            $user->logindate = 0;
            $user->save();

            throw new JWTException('Subscription has expired.');
        }
    }
}
