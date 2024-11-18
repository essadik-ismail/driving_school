<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventorieRequest extends FormRequest
{

    public function rules()
    {
        return [
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'pricePerUnit' => 'required|integer',
            'minStockLevel' => 'nullable|integer',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
        ];
    }
}
