<?php

namespace App\Services;

use App\Interfaces\ServiceInterface;
use Illuminate\Database\Eloquent\Model;

class Service implements ServiceInterface
{
    public static function isColumnValueUniqueExceptSelf(Model $model, string $attr, string $value): bool
    {
        return $model->newQuery()
            ->where('id', '!=', $model->id)
            ->where($attr, $value)
            ->count();
    }
}
