<?php

namespace App\Heads;

class SalesHeads extends Head
{
    public static function heads()
    {
        $lang = "sales";
        return [
            // Head::make(title: trans($lang . '.label'), data: 'attribute'),
            Head::make(title: trans($lang . '.customer_id'), data: 'name', type:'text', col:'col-12 col-sm-6', readonly:true),
            Head::make(title: trans($lang . '.total_amount'), data: 'total_amount', type:'text', col:'col-12 col-sm-6', readonly:true),
            Head::make(title: trans($lang . '.payment_method'), data: 'payment_method', type:'select', options: ['cash', 'card', 'cheque'], col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.date'), data: 'date'),
        ];
    }
}