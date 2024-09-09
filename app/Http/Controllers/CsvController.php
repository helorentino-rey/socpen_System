<?php

namespace App\Http\Controllers;

use App\Exports\BeneficiariesExport;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class CsvController extends Controller
{
    public function export(Request $request)
    {
        $filename = $request->input('filename', 'beneficiaries.csv'); // Default to 'beneficiaries.csv' if no filename is provided
        return (new BeneficiariesExport($request))->download($filename);
    }
}
