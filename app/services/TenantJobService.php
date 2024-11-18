<?php

namespace App\Services;

use App\DTO\TenantJobDto as Dto;
use App\Models\TenantJob as Model;
use App\Models\TenantJob;

class TenantJobService extends Service
{

    public function query()
    {
        return Model::query();
    }

    public function create(Dto $dto)
    {
        $data = $dto->toArray();
        $data['tenant_id'] = tenant();
        $item = $this->query()->create($data);
        return $item;
    }

    public function delete(TenantJob $tenantJob): void
    {
        $tenantJob->delete();
    }

    public function update(TenantJob $tenantJob, Dto $dto)
    {
        $item = $tenantJob;

        $item->fill($dto->toArray());

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}
