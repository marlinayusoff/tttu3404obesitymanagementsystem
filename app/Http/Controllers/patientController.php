<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Patient;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class patientController extends Controller
{

  public function processForm() {
        $patientId  = Input::get('patientId') ;
        return Redirect::to('info/'.$patientId);
  }

  public function show($patientId) {
        //$result = Patient::findOrfail($patientId)->where('patientId', '$patientId')->first();
        $data = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
        $health = DB::table('tbl_health_issue')->where('patientId', $patientId)->get();
        $medicine = DB::table('tbl_medicine')->where('patientId', $patientId)->get();
        $anthro_data = DB::table('tbl_anthro_data')->where('patientId', $patientId)->get();
        $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->get();
        $treatment = DB::table('tbl_treatment')->where('patientId', $patientId)->get();

        return view('nso.patient_info', compact('data','health','medicine','anthro_data','inbody','treatment'));
  }

  public function processDelete() {
        $patientId  = Input::get('patientId') ;
        return Redirect::to('delete/'.$patientId);
  }

  public function Deleteshow($patientId) {
        DB::table('tbl_appointment')->where('patientId', $patientId)->delete();
        DB::table('tbl_anthro_data')->where('patientId', $patientId)->delete();
        DB::table('tbl_inbody_result')->where('patientId', $patientId)->delete();
        DB::table('tbl_daily_diet')->where('patientId', $patientId)->delete();
        DB::table('tbl_treatment')->where('patientId', $patientId)->delete();
        DB::table('tbl_health_issue')->where('patientId', $patientId)->delete();
        DB::table('tbl_medicine')->where('patientId', $patientId)->delete();
        DB::table('tbl_patient')->where('patientId', $patientId)->delete();

        return Redirect::to('/patientList');
  }

  public function showSchedule($patientId) {
        Session::put('patientId', $patientId);
        return view('nso.patient_schedule');
  }

  public function schedule() {
      $calenders = array();
    if(null !== Session::get('patientId') && Session::get('patientId') != "") {
      $patientId = Session::get('patientId');
      Session::forget('patientId');
  
      $first = DB::table('tbl_appointment')->where('patientId', $patientId)->get();
      foreach($first as $row) {
        $patientId = $row->patientId;
        $nsoId = $row->nsoId;
        $date = $row->date;
        $time = $row->time;

        $patientname = DB::table('tbl_patient')->where('patientId', $patientId)->value('name');

        $time = date('h:i A', strtotime($time));
        
        if($nsoId == Session::get('user')->nsoId) {
          if(date('Y-m-d') <= $date) {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#f0ad4e","editable"=>false);
          } else {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#777","editable"=>false);
          }
        } else {
          if(date('Y-m-d') <= $date) {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#5bc0de","editable"=>false);
          } else {
            $calender = array("title"=>$time.": $patientname","start"=>$date, "color"=>"#777","editable"=>false);
          }
        }

        array_push($calenders, $calender);
      }
      return json_encode($calenders);

    } else {
      return json_encode(array());
    }
  }
  
  public function patientList(){
      //$data = DB::table('tbl_patients')->get();
      $data = Patient::paginate(10);
      return view('nso/patient_list')->withData($data);
  }

  public function searchPatient(Request $req){

      $data = DB::table('tbl_patient')->where('name', 'like', '%' . Input::get('searchby') . '%')->paginate();
      //$data = Patient->where('name','like','%'. Input::get('searchby') . '%')->get();
      return view('nso/patient_list')->withData($data);
  }

  public function addkesihatan() {
    $healthIssue = Input::get('jenispenyakit');
    $duration = Input::get('duration');
    $patientId = Input::get('patientId');

    $count = 0;
    foreach($healthIssue as $HI) {
      $count++;
    }

    for($i = 0; $i < $count;$i++) {

      $data = array('patientId'=>$patientId,'healthIssue'=>$healthIssue[$i],'duration'=>$duration[$i]);
      DB::table('tbl_health_issue')->insert($data);
    }

    return Redirect::to('info/'.$patientId);
  }

  public function addubat() {
    $jenisubat = Input::get('jenisubat');
    $patientId = Input::get('patientId');

    $count = 0;
    foreach($jenisubat as $HI) {
      $count++;
    }

    for($i = 0; $i < $count;$i++) {

      $data = array('patientId'=>$patientId,'medicineName'=>$jenisubat[$i]);
      DB::table('tbl_medicine')->insert($data);
    }

    return Redirect::to('info/'.$patientId);
  }

   public function updatespk() {
    $hipertensi = Input::get('hipertensi');
    $kardiovaskular = Input::get('kardiovaskular');
    $diabetes = Input::get('diabetes');
    $asma = Input::get('asma');
    $patientId = Input::get('patientId');

      $data = array('hipertensi'=>$hipertensi,'kardiovaskular'=>$kardiovaskular,'diabetes'=>$diabetes,'asma'=>$asma);
      DB::table('tbl_patient')->where('patientId', $patientId)->update($data);

    return Redirect::to('info/'.$patientId);
  }

  public function updatePatient() {
    $address = Input::get('address');
    $telNo = Input::get('telNo');
    $email = Input::get('email');
    $patientId = Input::get('patientId');

      $data = array('address'=>$address,'telNo'=>$telNo,'email'=>$email);
      DB::table('tbl_patient')->where('patientId', $patientId)->update($data);

    return Redirect::to('nso/patient_list');
  }
  

  public function addAntro() {
    $date = Input::post('date');
    $weight = Input::post('weight');
    $height = Input::post('height');
    $wrist = Input::post('wrist');
    $waist = Input::post('waist');
    $hip = Input::post('hip');
    $forearm = Input::post('forearm');
    $BMI = Input::post('BMI');
    $bodyFatMass = Input::post('bodyFatMass');
    $patientId = Input::post('patientId');
    $antroId = Session::get('user')->nsoId;

    $data = array('antroId'=>$antroId,'patientId'=>$patientId,'date'=>$date,'weight'=>$weight,'height'=>$height,'wrist'=>$wrist,'waist'=>$waist,'hip'=>$hip,'forearm'=>$forearm,'BMI'=>$BMI,'bodyFatMass'=>$bodyFatMass);

    DB::table('tbl_anthro_data')->insert($data);

    return Redirect::to('info/'.$patientId);
  }
}