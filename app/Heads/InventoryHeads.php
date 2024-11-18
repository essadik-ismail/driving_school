<?php

namespace App\Heads;

class InventoryHeads extends Head
{
    public static function heads()
    {
        $lang = "inventory";
        return [
            // Head::make(title: trans($lang . '.lan'), data: 'ldata' , type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.product_name'), data: 'product_name', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.quantity'), data: 'quantity', type:'number', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.pricePerUnit'), data: 'pricePerUnit', type:'number', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.minStockLevel'), data: 'minStockLevel', type:'number', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.description'), data: 'description', type:'textarea', col:'col-12'),
        ];
    }
}