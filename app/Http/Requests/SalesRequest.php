<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'customer_id' => 'required|integer',
            'inventory_id' => 'required|integer',
            'total_amount' => 'required|string',
            'payment_method' => 'required|string',
        ];
    }
}
