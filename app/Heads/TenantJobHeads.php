<?php

namespace App\Heads;

class TenantJobHeads extends Head
{
    public static function heads()
    {
        $lang = "tenantJob";
        return [
            Head::make(title: trans($lang . '.title'), data: 'title' , type:'text', col:'col-12 col-sm-12', required:true),
        ];
    }
}