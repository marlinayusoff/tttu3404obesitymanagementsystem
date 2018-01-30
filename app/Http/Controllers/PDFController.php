<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;

class PDFController extends Controller

{

    public function processPdfPatientInformation() {
        $patientId  = Input::get('patientId') ;
        return Redirect::to('pdfPatientInformation/'.$patientId) ;
        
    }
        public function pdfPatientInformation($patientId) {
       //$result = Patient::findOrfail($patientId)->where('patientId', '$patientId')->first();
        $data = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
        $health = DB::table('tbl_health_issue')->where('patientId', $patientId)->get();
        $medicine = DB::table('tbl_medicine')->where('patientId', $patientId)->get();
        $anthro_data = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get();
        $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->get();
        $treatment = DB::table('tbl_treatment')->where('patientId', $patientId)->get();

        if(Request::has('download')){
            $pdf = PDF::loadView('pdfPatientInformation');
            return $pdf->download('pdfPatientInformation');
        }
    
        return view('pdfPatientInformation', compact('data','health','medicine','anthro_data','inbody','treatment'));
   }

    
}


