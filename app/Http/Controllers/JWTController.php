<?php

namespace App\Http\Controllers;

use App\Http\Services\JWTService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

Class JWTController extends Controller {

    protected JWTService $JWTService;


    public function __construct(JWTService $JWTService)
    {
        $this->JWTService = $JWTService;
    }
    public function loginapp(Request $request): JsonResponse
    {
        return $this->JWTService->loginapp($request);
    }
    public function verifyToken(Request $request): JsonResponse
    {
        return $this->JWTService->verifyToken($request);
    }
}
