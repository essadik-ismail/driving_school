<?php

namespace App\Services;

use App\DTO\EmployeeDto as Dto;
use App\Models\Employee as Model;
use App\Models\Employee;

class EmployeeService extends Service
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

    public function delete(Employee $employee): void
    {
        $employee->delete();
    }

    public function update(Employee $employee, Dto $dto)
    {
        $item = $employee;

        $data = $dto->toArray();
        unset($data['tenant_job_id']);
        $item->fill($data);

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}
