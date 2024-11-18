<?php

namespace App\Heads;

class WarehouseHeads extends Head
{
    public static function heads()
    {
        $lang = "warehouse";
        return [
            // Head::make(title: trans($lang . '.label'), data: 'attribute'),
            
            Head::make(title: trans($lang . '.name'), data: 'name', type:'text', col:'col-12 col-sm-12', required:true),
            Head::make(title: trans($lang . '.location'), data: 'location', type:'textarea', col:'col-12 col-sm-12', required:true),
        ];
    }
}