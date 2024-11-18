<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    public function rules()
    {
        return [
            'unit_name' => 'required|string',
            'unit_description' => 'nullable|string',
        ];
    }
}
