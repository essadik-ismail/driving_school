<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    public static  function  isColumnValueUniqueExceptSelf(Model $model , string $attr ,string $value):bool;
}
