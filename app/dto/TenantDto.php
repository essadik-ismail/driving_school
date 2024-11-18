<?php

namespace App\DTO;

use App\Http\Requests\TenantRequest as request;
use Illuminate\Http\UploadedFile;

class TenantDto extends DTO
{
    public function __construct(
        public readonly string $companyName,
        public readonly string $address,
        public readonly string $tel,
        public readonly string|null $gsm,
        public readonly string|null $email,
        public readonly string $website,
        public readonly int|null $subscription_plan_id,
        public readonly UploadedFile|null $logo,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            companyName: $request->validated('companyName'),
            address: $request->validated('address'),
            tel: $request->validated('tel'),
            gsm: $request->validated('gsm'),
            email: $request->validated('email'),
            website: $request->validated('website'),
            subscription_plan_id: $request->validated('subscription_plan_id'),
            logo: $request->validated('logo'),
        );
    }
}