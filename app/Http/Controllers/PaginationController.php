<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function index(Request $request)
    {
        $beneficiaries = Beneficiary::with([
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
        ])->paginate(10); // Paginate the query

        if ($request->ajax()) {
            return view('layouts.partials', compact('beneficiaries'))->render();
        }


        return view('layouts.file', compact('beneficiaries'));
    }
}
