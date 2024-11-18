<?php

namespace App\Http\Controllers;

use App\Exports\Export;
use App\Imports\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importData(Request $request)
    {
        $model = $request->input('model');
        $heads = json_decode($request->input('heads'));

        try {
            Excel::import(new Import($model, $heads), $request->file('file'));  // File needs to be uploaded
            return response()->json(['message' => 'Data Imported Successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to Import Data: ' . $e->getMessage()], 500);
        }
    }


    public function exportCSV(Request $request)
    {
        $model = $request->input('model');
        $heads = json_decode($request->input('heads'));
        return Excel::download(new Export(app($model), $heads), 'data.csv');
    }

    public function exportExcel(Request $request)
    {
        $model = $request->input('model');
        $heads = json_decode($request->input('heads'));
        return Excel::download(new Export(app($model), $heads), 'data.xlsx');
    }

    public function exportPDF()
    {
        // You can generate the PDF here using a package like DOMPDF
    }
}
