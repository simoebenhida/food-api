<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        try {
            $request->persist();

            auth()->user()->storeToken();

            return response()->json(['user' => auth()->user()], Response::HTTP_CREATED);
        } catch(\Exeption $e) {

            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
