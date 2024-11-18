<?php

namespace App\Heads;

class UserHeads
{

    public static function heads(){
        return [
            Head::make(title: 'Name', data: 'name'),
            Head::make(title: 'Email', data: 'login'),
            Head::make(title: 'cin', data: 'cin'),
            Head::make(title: 'Gsm1', data: 'gsm1'),
            Head::make(title: 'Gsm2', data: 'gsm2'),
            Head::make(title: 'Adress', data: 'adress'),
            Head::make(title: 'Website', data: 'website'),
        ];
    }
}
