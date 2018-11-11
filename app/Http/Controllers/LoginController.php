<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store()
    {
        if($request->hasToken())
        {
            return response()->json(['user' => auth()->user()], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function destroy(LogoutRequest $request)
    {
        $request->persist();

        return response()->json('You have been succesfully logged out', 200);
    }
}
