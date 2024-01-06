<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;
use App\Http\Services\SubscriptionService;

class JWTService {

    protected SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService) {
        $this->SubscriptionService = $subscriptionService;
    }
    public function loginapp(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = JWTAuth::user();
        $user->logindate = time();

        // Logika subskrypcji
        try {
            $this->handleSubscription($user);
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }

        $user->save();

        return response()->json([
            'token' => $token,
            'subscriptionDaysLeft' => $user->currentdays
        ], 200);
    }

    public function verifyToken(Request $request): JsonResponse
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        try {
            JWTAuth::setToken($token)->checkOrFail();
            $user = JWTAuth::authenticate($token);

            if ($user->currentdays <= 0) {
                return response()->json(['error' => 'Subscription has expired.'], 403);
            }

            return response()->json(['valid' => true], 200);
        } catch (JWTException $e) {
            return response()->json(['valid' => false, 'error' => $e->getMessage()], 401);
        }
    }

    /**
     * @throws JWTException
     */
    public function handleSubscription()
    {
        // Calc Subscription #Logic
        $this->SubscriptionService->dayscalculator();
    }
}
