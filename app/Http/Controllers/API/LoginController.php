<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        if($request->hasToken())
        {
            return response()->json(['user' => auth()->user()]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
