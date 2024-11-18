<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'adress' => 'nullable|string',
            'phone' => 'nullable|string',
            'tenant_job_id' => 'integer',
        ];
    }
}
