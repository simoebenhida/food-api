<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        try {
            $request->persist();

            auth()->user()->storeToken();

            return response()->json(['user' => auth()->user()], 201);
        } catch(\Exeption $e) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
