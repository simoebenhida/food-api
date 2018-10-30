<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function hasToken()
    {
        $user = User::where('email', $this->email)->first();

        if($user && $this->checkPassword($this->password, $user->password)) {
            auth()->setUser($user);
            return !! auth()->user()->storeToken();
        }

        return false;
    }

    public function checkPassword($password, $hashedPassword)
    {
        return Hash::check($password, $hashedPassword);
    }
}
