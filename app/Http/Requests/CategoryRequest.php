<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            "name" => "string|required",
            "description" => "string|nullable",
            "unit_id" => "integer|required",
        ];
    }
}
