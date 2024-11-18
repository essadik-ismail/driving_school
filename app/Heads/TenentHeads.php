<?php

namespace App\Heads;

class TenentHeads extends Head
{
    public static function heads()
    {
        $lang = "tenant";
        return [
            // Head::make(title: trans($lang . '.label'), data: 'attribute'),
            
            Head::make(title: trans($lang . '.companyName'), data: 'companyName', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.address'), data: 'address', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.tel'), data: 'tel', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.gsm'), data: 'gsm', type:'text', col:'col-12 col-sm-6'),
            Head::make(title: trans($lang . '.email'), data: 'email', type:'email', col:'col-12 col-sm-6'),
            Head::make(title: trans($lang . '.website'), data: 'website', type:'text', col:'col-12 col-sm-6'),
            Head::make(title: trans($lang . '.subscription_plan_id'), data: 'plan_name', type:'text', col:'col-12 col-sm-12', forIndex:true),
        ];
    }
}