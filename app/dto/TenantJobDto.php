<?php

namespace App\DTO;

use App\Http\Requests\TenantJobRequest as request;

class TenantJobDto extends DTO
{

    public function __construct(
        public readonly string $title,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            title: $request->validated('title'),
        );
    }
}
