<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'adress' => 'nullable|string',
            'phone' => 'required|string',
        ];
    }
}
