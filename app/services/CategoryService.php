<?php

namespace App\Services;

use App\DTO\CategoryDto as Dto;
use App\Models\Category as Model;
use App\Models\Category;

class CategoryService extends Service
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

    public function delete(Category $category): void
    {
        $category->delete();
    }

    public function update(Category $category, Dto $dto)
    {
        $item = $category;

        $item->fill([
            'name' => $dto->name,
            'description' => $dto->description,
        ]);

        if ($item->isDirty()) {
            $item->save();
            $item->refresh();
        }
    }
}
