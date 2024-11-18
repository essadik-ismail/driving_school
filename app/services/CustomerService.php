<?php

namespace App\Services;

use App\DTO\CustomerDto as Dto;
use App\Models\Customer as Model;
use App\Models\Customer;

class CustomerService extends Service
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

    public function delete(Customer $customer): void
    {
        $customer->delete();
    }

    public function update(Customer $customer, Dto $dto)
    {
        $item = $customer;

        $item->fill($dto->toArray());

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}
