<?php

namespace App\Exports;

use App\Heads\CategoryHeads;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export implements FromCollection, WithHeadings
{
    protected $model;
    protected $heads;

    public function __construct($model, $heads)
    {
        $this->model = $model;
        $this->heads = $heads;
    }

    public function collection()
    {
        return $this->model::all()->map(function ($item) {
            return collect($this->heads)->mapWithKeys(function ($head) use ($item) {
                // Access the title and data directly from the array
                $title = $head['title']; // Access title from the array
                $dataKey = $head['data']; // Access data from the array
                
                // Safely access the item property using the data key
                return [$dataKey => $item->{$dataKey} ?? null]; // Use null coalescing to avoid undefined property error
            });
        });
    }
    
    
    public function headings(): array
    {
        // dd($this->heads);
        return array_map(fn($head) => is_array($head) ? $head['title'] : $head->getTitle(), $this->heads);
    }
}
