<?php

namespace App\Heads;

class UnitHeads extends Head
{
    public static function heads()
    {
        $lang = "unit";
        return [
            Head::make(title: trans($lang . '.unit_name'), data: 'unit_name', type:'text', col:'col-12 col-sm-12', required:true),
            Head::make(title: trans($lang . '.description'), data: 'unit_description', type:'text', col:'col-12 col-sm-12'),
        ];
    }
}