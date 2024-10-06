<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function export($id)
    {
        $beneficiary = Beneficiary::with([
            'addresses',
            'affiliation',
            'assessmentRecommendation',
            'beneficiaryInfo',
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

        $profilePhotoUrl = null;
        if ($beneficiary->profile_upload && file_exists(public_path('storage/' . $beneficiary->profile_upload))) {
            $imagePath = public_path('storage/' . $beneficiary->profile_upload);
            $imageData = base64_encode(file_get_contents($imagePath));
            $profilePhotoUrl = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . $imageData;
        }

        $options = new Options();
        $options->set('chroot', public_path());
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = PDF::loadView('layouts.form', compact('beneficiary', 'profilePhotoUrl'));
        return $pdf->stream('social_pension_validation_form.pdf');
    }
}
