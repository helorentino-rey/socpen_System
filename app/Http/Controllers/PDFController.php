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
            'caregiver',
            'child',
            'economicInformation',
            'healthInformation',
            'housingLivingStatus',
            'mothersMaidenName',
            'representative',
            'spouse',
        ])->find($id); // Fetch the first beneficiary

        if (!$beneficiary) {
            return response()->json(['error' => 'Beneficiary not found'], 404);
        }

        // Base64 encoding for the profile photo
        $profilePhotoUrl = null;
        if ($beneficiary->profile_upload && file_exists(public_path('storage/' . $beneficiary->profile_upload))) {
            $imagePath = public_path('storage/' . $beneficiary->profile_upload);
            $imageData = base64_encode(file_get_contents($imagePath));
            $profilePhotoUrl = 'data:image/' . pathinfo($imagePath, PATHINFO_EXTENSION) . ';base64,' . $imageData;
        }

        // Configure DomPDF options
        $options = new Options();
        $options->set('chroot', public_path()); // Allow DomPDF to access public folder
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $options->set('isRemoteEnabled', true); // Enable remote access to images

        // Load the view and render the PDF
        $pdf = PDF::loadView('layouts.form', compact('beneficiary', 'profilePhotoUrl'));
        return $pdf->stream('social_pension_validation_form.pdf');
    }
}
