<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{

    // Display the form
    public function show($id)
    {
        $beneficiary = Beneficiary::with([
            'addresses',
            'affiliation',
            'assessmentRecommendation',
            'beneficiaryInfo',
            'caregiver',
            'child',
            'economicInformation',
            'healthInformation',
            'housingLivingStatus',
            'mothersMaidenName',
            'representative',
            'spouse',
        ])->find($id);

        if (!$beneficiary) {
            return response()->json(['error' => 'Beneficiary not found'], 404);
        }

        return view('layouts.form', compact('beneficiary'));
    }

    public function export()
    {
        $pdf = PDF::loadView('layouts.form');
        return $pdf->stream('social_pension_validation_form.pdf');
    }
}
