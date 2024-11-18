<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Export;
use App\Imports\Import;
use Livewire\Component;
use Livewire\WithFileUploads;

class Datatable extends Component
{
    use WithPagination, WithFileUploads;

    protected $listeners = ['delete'];

    //properties
    protected $data;
    public $perPage = 10;
    public $search;
    public $searchKey;
    public $heads;
    public $model;
    public $conditions;
    public $relation;
    public $method;
    public $join;
    public $editRoute;
    public $addRoute;
    public $title;
    public $file;
    public $importSelects = [];
    public $showModal = true;

    public function mount($heads = [], $model = '', $relation = '', $conditions = [], $join = [], $method = '', $editRoute = '', $addRoute = '', $title = '', $file = '', $importSelects = '')
    {
        $this->heads = $heads;
        $this->searchKey = isset($heads[0]) ? $heads[0]->data : "";
        $this->relation = $relation;
        $this->model = $model;
        $this->conditions = $conditions;
        $this->method = $method;
        $this->join = $join;
        $this->editRoute = $editRoute;
        $this->addRoute = $addRoute;
        $this->title = $title;
        $this->file = $file;
        $this->importSelects = $importSelects;
    }

    public function render()
    {
        $this->loadDataFromModel();
        return view('livewire.datatable', [
            'data' => $this->data,
        ]);
    }

    public function loadDataFromModel()
    {
        $instance = app($this->model);
        $query = $instance->query();

        foreach ($this->conditions as $column => $condition) {
            if (is_string($condition) && stripos($condition, 'LIKE') !== false) {
                preg_match("/LIKE\s+(.+)/i", $condition, $matches);
                $value = trim($matches[1], "'% ");
                $query->where($column, 'LIKE', '%' . $value . '%');
            } else {
                $query->where($column, $condition);
            }
        }

        if (!empty($this->join)) {
            foreach($this->join as$join){
                $query->join($join['table'], $join['id'], '=', $join['foreign_key']);
            }
        }

        if (!empty($this->search)) {
            $query->where($this->searchKey, 'like', '%' . $this->search . '%');
        }
        
        $this->data = $query->paginate($this->perPage);
    }

    public function exportCSV()
    {
        return Excel::download(new Export(app($this->model), $this->heads), 'data.csv');
    }

    public function exportExcel()
    {
        return Excel::download(new Export(app($this->model), $this->heads), 'data.xlsx');
    }

    public function delete($id)
    {
        app($this->model)::destroy($id);
        $this->loadDataFromModel();
    }

    // public function importData()
    // {
    //     $this->validate([
    //         'file' => 'required|file|mimes:csv,xlsx|max:2048', // Limit file size to 2MB
    //     ]);
    //     try {
    //         Excel::import(new Import(app($this->model), $this->heads), $this->file->getRealPath());
    //         session()->flash('message', 'File imported successfully!');
    //     } catch (\Exception $e) {
    //         session()->flash('error', 'Error importing file: ' . $e->getMessage());
    //     }
    //     $this->file = null;
    // }

    
}
