<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 

class PDFController extends Controller
{
    public function exportPDF()
    {    
        $pdf = PDF::loadView('livewire.superadmin.viewFormData');
        return $pdf->download('social_pension_validation_form.pdf');
    }
}
