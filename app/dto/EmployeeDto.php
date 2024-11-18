<?php

namespace App\DTO;

use App\Http\Requests\EmployeeRequest as request;

class EmployeeDto extends DTO
{
    public function __construct(
        public readonly string $name,
        public readonly string|null $email,
        public readonly string|null $adress,
        public readonly string|null $phone,
        public readonly int|null $tenant_job_id,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            adress: $request->validated('adress'),
            phone: $request->validated('phone'),
            tenant_job_id: $request->validated('tenant_job_id'),
        );
    }
}