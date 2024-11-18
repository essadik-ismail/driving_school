<?php

namespace App\Heads;

class EmployeeHeads extends Head
{
    public static function heads()
    {
        $lang = "employee";
        return [
            Head::make(title: trans($lang . '.name'), data: 'name' , type:'text', col:'col-12 col-sm-6', required:true),
            Head::make(title: trans($lang . '.email'), data: 'email', type:'email', col:'col-12 col-sm-6',),
            Head::make(title: trans($lang . '.adress'), data: 'adress', type:'text', col:'col-12 col-sm-6',),
            Head::make(title: trans($lang . '.phone'), data: 'phone', type:'text', col:'col-12 col-sm-6',),
        ];
    }
}