<?php

namespace App\Http\Services;


use App\Models\User;
use Illuminate\Support\Facades\Session;

class GetDataClient {
    protected GetDataClient $getDataClient;

    public function getUserEmail()
    {
        $userId = Session::get('loginId');
        $user = User::find($userId);
        return $user ? $user->email : '';
    }
}
