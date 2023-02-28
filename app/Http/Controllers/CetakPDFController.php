<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class CetakPDFController extends Controller
{
    //
    public function exportPDF() {
       
       
      $aidi = User::all();
      $pdf = PDF::loadView('admin.akun', [           
        'title' => 'Halaman Edit',
        'user' => $aidi,
      ]);
   
        return $pdf->stream();
        
      }
}
