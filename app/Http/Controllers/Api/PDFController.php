<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use PDF;

class PDFController extends Controller
{
    //
    public function getReportePromociones()
    {
        $promociones = Promo::all();

        $pdf = PDF::loadView('pdf/reporte_promocionespdf', array('promociones' =>  $promociones))
        ->setPaper('a4', 'landscape');
    
        return $pdf->stream('reporte_promociones.pdf');
    }
}
