<?php

namespace App\Services;

use App\DTO\TenantDto as Dto;
use App\Models\Tenant as Model;
use App\Models\Tenant;

class TenentService extends Service
{

    public function __construct(
        private FileService $fileService
        ) {}

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

    public function delete(Tenant $tenant): void
    {
        $tenant->delete();
    }

    public function update(Tenant $tenant, Dto $dto)
    {
        $item = $tenant;

        $data = $dto->toArray();
        unset($data['subscription_plan_id']);
        $item->update($data);

        if(isset($dto->logo)){
            $logo = $this->fileService->update($dto->logo, $item->logo);
            $item->update([
                'logo' => $logo,
            ]);
        }
    }
}
