<?php

namespace App\DTO;

use App\Http\Requests\CustomerRequest as request;

class CustomerDto extends DTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $adress,
        public readonly string $phone,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            adress: $request->validated('adress'),
            phone: $request->validated('phone'),
        );
    }
}