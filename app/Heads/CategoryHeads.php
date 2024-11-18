<?php

namespace App\Heads;

class CategoryHeads extends Head
{
    public static function heads()
    {
        $lang = "category";
        return [
            Head::make(title: trans($lang . '.name'), data: 'name', type: 'text', col: 'col-12', required: true),
            Head::make(title: trans($lang . '.description'), data: 'description', type: 'textarea', col: 'col-12', required: false),
            Head::make(title: trans($lang . '.unit_id'), data: 'unit_name', type: 'textarea', col: 'col-12', forIndex:true),
        ];
    }
}
