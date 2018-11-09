<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirmed_password' => 'required|same:password'
        ];
    }

    public function persist()
    {
        $user = User::create(
            collect($this->all())
                ->merge([
                'password' => bcrypt($this->password)
                ])
                ->except('confirmed_password')
                ->toArray()
        );

        auth()->setUser($user);

        return true;
    }

}
