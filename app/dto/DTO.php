<?php

namespace App\DTO;


class DTO
{
    public function toArray(): array
    {
        return (array) $this;
    }
}
