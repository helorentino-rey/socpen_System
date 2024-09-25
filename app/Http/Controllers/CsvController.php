<?php

namespace App\Http\Controllers;

use App\Exports\BeneficiariesExport;
use App\Imports\MyFileImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CsvController extends Controller
{
    public function export(Request $request)
    {
        DB::beginTransaction(); // Begin transaction

        try {
            $filename = $request->input('filename', 'beneficiaries.csv'); // Default to 'beneficiaries.csv' if no filename is provided

            // Ensure the filename ends with '.csv'
            if (pathinfo($filename, PATHINFO_EXTENSION) !== 'csv') {
                $filename .= '.csv';
            }

            // Query for beneficiaries based on province filter
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

            // Store the beneficiaries to be deleted later if needed
            $beneficiariesToDelete = $query->get();

            // Export the data
            $exportResponse = (new BeneficiariesExport($request))->download($filename);

            // Check if the user wants to delete the data
            $deleteData = $request->input('delete_data', false); // Default is 'false'

            if ($deleteData) {
                // If export was successful and user chose to delete, delete the beneficiaries
                Beneficiary::destroy($beneficiariesToDelete->pluck('id')->toArray());
            }

            DB::commit(); // Commit the transaction

            return $exportResponse;
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction if something goes wrong

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
