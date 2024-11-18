<?php

namespace App\DTO;

use App\Http\Requests\SubscriptionPlanRequest as request;

class SubscriptionPlanDto extends DTO
{
    public function __construct(
        public readonly string $plan_name,
        public readonly float $price,
        public readonly int $maxUsers,
        public readonly int $maxStockItems,
    ) {}

    public static function fromRequest(request $request): self
    {
        return new self(
            plan_name: $request->validated('plan_name'),
            price: $request->validated('price'),
            maxUsers: $request->validated('maxUsers'),
            maxStockItems: $request->validated('maxStockItems'),
        );
    }
}