<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "string|nullable",
            "login" => "string|required",
            "password" => "string|required",
            "cin" => "nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048",
            "adress" => "string|nullable",
            "gsm1" => "string|nullable",
            "gsm2" => "string|nullable",
            "email" => "string|nullable",
            "website" => "url|nullable",
        ];
    }
}
