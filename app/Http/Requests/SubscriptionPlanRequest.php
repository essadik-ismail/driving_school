<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionPlanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'plan_name' => 'required|string',
            'price' => 'required',
            'maxUsers' => 'required|integer',
            'maxStockItems' => 'required|integer',
        ];
    }
}
