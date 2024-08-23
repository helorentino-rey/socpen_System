<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryInfo;
use Illuminate\Http\Request;

class AddBeneficiaryController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'osca_id' => 'required|integer|unique:beneficiaries,osca_id',
            'ncsc_rrn' => 'nullable|integer',
            'profile_upload' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'middle_name' => 'nullable|string|max:20',
            'name_extension' => 'nullable|string|max:4',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_upload')) {
            $file = $request->file('profile_upload');
            $filePath = $file->store('profile_pictures', 'public');
        }

        // Create a new beneficiary record
        $beneficiary = Beneficiary::create([
            'osca_id' => $request->input('osca_id'),
            'ncsc_rrn' => $request->input('ncsc_rrn'),
            'profile_upload' => $filePath,
        ]);

        // Create a new beneficiary info record
        BeneficiaryInfo::create([
            'beneficiary_id' => $beneficiary->osca_id, // Use the ID of the newly created beneficiary
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'name_extension' => $request->input('name_extension'),
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Beneficiary added successfully!');
    }
}