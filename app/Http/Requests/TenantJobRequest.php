<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantJobRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
        ];
    }
}
