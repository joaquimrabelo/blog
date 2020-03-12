<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
        $email = 'required|string|email|max:255|unique:users';
        $pass = 'required|string|min:6|confirmed';
        if ($this->id) {
            $email = 'required|string|email|max:255|unique:users,email,' . $this->id;
            $pass = 'nullable|string|min:6|confirmed';
        }
        return [
            'name' => 'required|string|max:255',
            'email' => $email,
            'password' => $pass,
        ];
        
    }
}
