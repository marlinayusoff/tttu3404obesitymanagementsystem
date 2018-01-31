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

  public function show() {
        $patientId = Session::get('user')->patientId;
        $data = Patient::where('patientId', $patientId)->get()->first();
        $health = DB::table('tbl_health_issue')->where('patientId', $patientId)->get();
        $medicine = DB::table('tbl_medicine')->where('patientId', $patientId)->get();
        $anthro_data = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get();
        $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->get();
        $treatment = DB::table('tbl_treatment')->where('patientId', $patientId)->get();

        return view('patient.user_info', compact('data','health','medicine','anthro_data','inbody','treatment'));
  }

  public function showScheduleUser() {
        return view('patient.user_schedule');
  }

  public function schedule() {
      $calenders = array();
      $patientId = Session::get('user')->patientId;
  
      $first = DB::table('tbl_appointment')->where('patientId', $patientId)->get();
      foreach($first as $row) {
        $patientId = $row->patientId;
        $nsoId = $row->nsoId;
        $date = $row->date;
        $time = $row->time;

        $patientname = DB::table('tbl_patient')->where('patientId', $patientId)->value('name');

        $time = date('h:i A', strtotime($time));

          if(date('Y-m-d') <= $date) {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#f0ad4e","editable"=>false);
          } else {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#777","editable"=>false);
          }

        array_push($calenders, $calender);
      }
      return json_encode($calenders);
  }
  
  public function updatePatient() {
    $address = Input::get('address');
    $telNo = Input::get('telNo');
    $email = Input::get('email');
    $patientId = Session::get('user')->patientId;

      $data = array('address'=>$address,'telNo'=>$telNo,'email'=>$email);
      DB::table('tbl_patient')->where('patientId', $patientId)->update($data);

    return Redirect::to('patient/info');
  }

}
