<?php

namespace App\Http\Controllers;

use App\Exports\BeneficiariesExport;
use App\Imports\MyFileImport;
use Maatwebsite\Excel\Facades\Excel;
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

            // Check if there are records for the selected province or all provinces
            $query = Beneficiary::query();

            if ($request->has('province') && $request->province) {
                $query->whereHas('presentAddress', function ($query) use ($request) {
                    $query->where('province', $request->province);
                });
            }

            $provinceExists = $query->exists();

            if (!$provinceExists) {
                return response()->json(['error' => 'No records found for the selected province.'], 404);
            }

            // Set success message in session
            session()->flash('success', 'CSV file downloaded successfully.');

            // Return the download response
            return (new BeneficiariesExport($request))->download($filename);
        } catch (\Exception $e) {
            // Log the actual error message for debugging purposes
            Log::error('Export error: ' . $e->getMessage());

            // Show a user-friendly error message
            return response()->json(['error' => 'An error occurred while processing your request. Please try again later.'], 500);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        Excel::import(new MyFileImport, $request->file('file'));

        return redirect()->back()->with('success', 'Beneficiaries imported successfully.');
    }
}
