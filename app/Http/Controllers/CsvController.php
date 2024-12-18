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
            $filename = $request->input('filename', 'beneficiaries.csv');

            if (pathinfo($filename, PATHINFO_EXTENSION) !== 'csv') {
                $filename .= '.csv';
            }

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

            $beneficiariesToArchive = $query->get();

            $exportResponse = (new BeneficiariesExport($request))->download($filename);

            $archiveData = $request->input('archive_data', 'false');

            if ($archiveData === 'true') {
                // Mark data as archived
                foreach ($beneficiariesToArchive as $beneficiary) {
                    $beneficiary->archived = true;
                    $beneficiary->save();
                }
            }

            DB::commit();

            return $exportResponse;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Export error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

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
