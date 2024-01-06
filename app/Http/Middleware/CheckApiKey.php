<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = env('API_KEY');
        if ($request->header('API_KEY') !== $apiKey) {
            return response()->json(['message' => 'Not Authorized'], 401);
        }

        return $next($request);
    }
}
