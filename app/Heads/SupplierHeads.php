<?php

namespace App\Heads;

class SupplierHeads extends Head
{
    public static function heads()
    {
        $lang = "supplier";
        return [
            Head::make(title: trans($lang . '.name'), data: 'name', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.email'), data: 'email', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.adress'), data: 'adress', type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.phone'), data: 'phone', type:'text', col:'col-12 col-sm-6', required:true),
        ];
    }
}