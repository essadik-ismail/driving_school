<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import implements ToModel, WithHeadingRow
{
    protected $model;
    protected $heads;
    protected $foreignKeys;

    public function __construct($model, $heads, $foreignKeys = [])
    {
        $this->model = $model;
        $this->heads = $heads;
        $this->foreignKeys = $foreignKeys;
    }

    public function model(array $row)
    {
        $mappedRow = [];

        foreach ($this->heads as $head) {
            $mappedRow[$head->getData()] = $row[$head->getData()] ?? null;
        }

        if (isset($this->foreignKeys)) {
            foreach ($this->foreignKeys as $key => $value) {
                $mappedRow[$key] = $value;
            }
        }
        
        return new $this->model($mappedRow);
    }
}