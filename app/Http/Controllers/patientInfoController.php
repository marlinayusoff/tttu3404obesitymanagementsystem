<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Patient;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class patientInfoController extends Controller
{

  public function inbodyPro() {
        $patientId  = Input::get('patientId');
        $dates  = Input::get('date');
        return Redirect::to('inbody/'.$patientId.'/'.$dates);
    }
      public function inbodyResult($patientId, $dates) {
      $data = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
      $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->where('date', $dates)->get()->first();
      $anthro = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get()->first();

      $ideal_weight = DB::table('tbl_ideal_weight')->where('gender', $data->gender)->where('height', 'LIKE', $anthro->height)->get()->first();

       return view('nso/inbodyResult', compact('data','inbody', 'anthro', 'dates', 'ideal_weight'));
   }

      public function inbodyResultPatient($patientId, $dates) {
      $data = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
      $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->where('date', $dates)->get()->first();
      $anthro = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get()->first();

      $ideal_weight = DB::table('tbl_ideal_weight')->where('gender', $data->gender)->where('height', 'LIKE', $anthro->height)->get()->first();

       return view('patient/inbodyResult', compact('data','inbody', 'anthro', 'dates', 'ideal_weight'));
   }
}