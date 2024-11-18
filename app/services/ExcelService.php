<?php

namespace App\Services;

use App\Exports\Export;
use App\Heads\Head;
use Illuminate\Http\Request;
use App\Imports\Import;
use App\Models;
use Maatwebsite\Excel\Facades\Excel;

class ExcelService extends Service
{

    public function import(
        Request $request,
        $model,
        Array $heads,
    )
    {
        $file = $request->file('file');
        $foreignKeys = $request->input('foreign_keys', []);
        $import = new Import($model, $heads, $foreignKeys);
        Excel::import($import, $file);
    }

    public function export($model, $heads)
    {
        return Excel::download(new Export($model, $heads), 'data.xlsx');
    }
}
