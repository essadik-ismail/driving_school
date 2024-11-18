<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'location' => 'required|string',
        ];
    }
}
