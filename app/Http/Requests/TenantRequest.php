<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    public function rules()
    {
        return [
            'companyName' => 'required|string',
            'address' => 'required|string',
            'subscription_plan_id' => 'nullable|string',
            'tel' => 'required|string',
            'gsm' => 'nullable|string',
            'email' => 'nullable|string',
            'website' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ];
    }
}
