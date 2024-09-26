<?php

namespace App\Http\Controllers;

use App\Exports\BeneficiariesExport;
use App\Imports\MyFileImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class CsvController extends Controller
{
    public function export(Request $request)
    {
        DB::beginTransaction(); // Begin transaction

        try {
            // Get filename from request or default to 'beneficiaries.csv'
            $filename = $request->input('filename', 'beneficiaries.csv');

            // Ensure the filename ends with '.csv'
            if (pathinfo($filename, PATHINFO_EXTENSION) !== 'csv') {
                $filename .= '.csv';
            }

            // Query for beneficiaries with optional province filter
            $query = Beneficiary::query();
            if ($request->has('province') && $request->province) {
                $query->whereHas('presentAddress', function ($query) use ($request) {
                    $query->where('province', $request->province);
                });
            }

            // Check if any beneficiaries exist for the given filter
            $provinceExists = $query->exists();
            if (!$provinceExists) {
                return response()->json(['error' => 'No records found for the selected province.'], 404);
            }

            // Get beneficiaries to potentially delete later
            $beneficiariesToDelete = $query->get();

            // Export the beneficiaries to a CSV
            $exportResponse = (new BeneficiariesExport($request))->download($filename);

            // Check if the user wants to delete the data after export
            $deleteData = $request->input('delete_data', 'false');  // Ensure it defaults to 'false'

            if ($deleteData === 'true') { // Only delete if the flag is explicitly 'true'
                Beneficiary::destroy($beneficiariesToDelete->pluck('id')->toArray());
            }

            DB::commit(); // Commit transaction if everything is successful

            return $exportResponse;
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of any error

            // Log the error for debugging purposes
            Log::error('Export error: ' . $e->getMessage());

            // Return a user-friendly error message
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
