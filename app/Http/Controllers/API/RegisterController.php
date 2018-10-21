<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        if(! $request->isRegister())
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        auth()->user()->storeToken();

        return response()->json(['user' => auth()->user()]);
    }
}
