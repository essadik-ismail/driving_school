<?php

namespace App\Services;

use App\DTO\SubscriptionPlanDto as Dto;
use App\Models\SubscriptionPlan as Model;
use App\Models\SubscriptionPlan;

class SubscriptionPlanService extends Service
{

    public function query()
    {
        return Model::query();
    }

    public function create(Dto $dto)
    {
        $data = $dto->toArray();
        // $data['tenant_id'] = tenant();
        $item = $this->query()->create($data);
        return $item;
    }

    public function delete(SubscriptionPlan $subscriptionPlan): void
    {
        $subscriptionPlan->delete();
    }

    public function update(SubscriptionPlan $subscriptionPlan, Dto $dto)
    {
        $item = $subscriptionPlan;

        $item->fill($dto->toArray());

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}
