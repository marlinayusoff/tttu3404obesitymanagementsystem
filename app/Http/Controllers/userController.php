<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Patient;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class userController extends Controller
{



  // untuk user information 
  public function processForm() {
        $patientId  = Input::get('patientId') ;
        return Redirect::to('patient/info/'.$patientId);
  }

  public function show($patientId) {
        //$result = Patient::findOrfail($patientId)->where('patientId', '$patientId')->first();
        $data = Patient::where('patientId', $patientId)->get()->first();
        $health = DB::table('tbl_health_issue')->where('patientId', $patientId)->get();
        $medicine = DB::table('tbl_medicine')->where('patientId', $patientId)->get();
        $anthro_data = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get();
        $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->get();
        $treatment = DB::table('tbl_treatment')->where('patientId', $patientId)->get();

        return view('patient.user_info', compact('data','health','medicine','anthro_data','inbody','treatment'));
  }

}
