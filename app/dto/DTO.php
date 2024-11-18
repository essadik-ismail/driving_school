<?php

namespace App\DTO;


class DTO
{

    //return object properties as an array
    public function toArray(): array
    {
        return (array) $this;
    }

}
