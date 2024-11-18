<?php

namespace App\DTO;

use App\Http\Requests\CategoryRequest as request;

class CategoryDto extends DTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $unit_id,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            name: $request->validated('name'),
            description: $request->validated('description'),
            unit_id: $request->validated('unit_id'),
        );
    }
}
