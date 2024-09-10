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
        try {
            $filename = $request->input('filename', 'beneficiaries.csv'); // Default to 'beneficiaries.csv' if no filename is provided

            // Ensure the filename ends with '.csv'
            if (pathinfo($filename, PATHINFO_EXTENSION) !== 'csv') {
                $filename .= '.csv';
            }

            // Validate province input
            if (!$request->has('province') || !$request->province) {
                return redirect()->back()->with('error', 'Please select a province.');
            }

            // Check if there are records for the selected province
            $provinceExists = Beneficiary::whereHas('presentAddress', function ($query) use ($request) {
                $query->where('province', $request->province);
            })->exists();

            if (!$provinceExists) {
                return redirect()->back()->with('error', 'No records found for the selected province.');
            }

            return (new BeneficiariesExport($request))->download($filename);
        } catch (\Exception $e) {
            // Log the actual error message for debugging purposes
            Log::error('Export error: ' . $e->getMessage());

            // Show a user-friendly error message
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
        }
    }
}
