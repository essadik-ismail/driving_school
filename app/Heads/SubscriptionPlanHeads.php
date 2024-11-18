<?php

namespace App\Heads;

class SubscriptionPlanHeads extends Head
{
    public static function heads()
    {
        $lang = "subscriptionPlan";
        return [
            // Head::make(title: trans($lang . '.label'), data: 'attribute'),
            
            Head::make(title: trans($lang . '.plan_name'), data: 'plan_name', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.price'), data: 'price', type:'number', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.maxUsers'), data: 'maxUsers', type:'number', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.maxStockItems'), data: 'maxStockItems', type:'number', col:'col-12 col-sm-6', required:true),
        ];
    }
}