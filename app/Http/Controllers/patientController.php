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
        $inbody = DB::table('tbl_inbody_result')->where('patientId', $patientId)->orderBy('date', 'desc')->get();
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

      if($healthIssue[$i] == 'Others') {

        $heathIssue2 = Input::get('healthIssueOthers');
        $data = array('patientId'=>$patientId,'healthIssue'=>$heathIssue2,'duration'=>$duration[$i]);

      } else {

        $data = array('patientId'=>$patientId,'healthIssue'=>$healthIssue[$i],'duration'=>$duration[$i]);

      }
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

    return Redirect::to('info/'.$patientId);
  }
  

  public function addAntros() {
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

    $data = array('patientId'=>$patientId,'date'=>$date,'weight'=>$weight,'height'=>$height,'wrist'=>$wrist,'waist'=>$waist,'hip'=>$hip,'forearm'=>$forearm,'BMI'=>$BMI,'bodyFatMass'=>$bodyFatMass);

    DB::table('tbl_anthro_data')->insert($data);

    if($BMI >= 10 && $BMI <= 13) {
      $fitnessScore = "10% - 13% (Essential fat)";
    } else if($BMI >= 14 && $BMI <= 20) {
      $fitnessScore = "14% - 20% (Athletes)";
    } else if($BMI >= 21 && $BMI <= 24) {
      $fitnessScore = "21% - 24% (Fitness)";
    } else if($BMI >= 25 && $BMI <= 31) {
      $fitnessScore = "25% - 31% (Average)";
    } else if($BMI >= 32) {
      $fitnessScore = "32% and above (Obese)";
    }

    $data = array('patientId'=>$patientId,'date'=>$date,'weight'=>$weight,'BMI'=>$BMI,'bodyFatMass'=>$bodyFatMass,'waistHipRatio'=>$waist,'fitnessScore'=>$fitnessScore,'muscleMass'=>'00','FatFreeMass'=>'00','protein'=>'00','mineral'=>'00','percentBodyFat'=>'00','baseMetabolicRate'=>'00','muscleControl'=>'00','fatControl'=>'00');

    DB::table('tbl_inbody_result')->insert($data);

    return Redirect::to('info/'.$patientId);
  }

  public function getpatientDetails($patientId){
    $dailydiet_details = DB::table('tbl_daily_diet')
    ->join('tbl_food', 'tbl_daily_diet.foodId', '=', 'tbl_food.foodId')
    ->join('tbl_drink', 'tbl_daily_diet.drinkId', '=', 'tbl_drink.drinkId')
    ->join('tbl_activity', 'tbl_daily_diet.activityId', '=', 'tbl_activity.activityId')
                ->select('tbl_daily_diet.*', 'tbl_food.*', 'tbl_drink.*', 'tbl_activity.*')
                ->where('tbl_daily_diet.patientId', $patientId)
                ->groupBy('tbl_daily_diet.date')
                ->get();

    // $dailydiet_details = DB::table('tbl_daily_diet')->get();
    // $dailydiet_details2 = DB::table('tbl_food')->get()->where('tbl_daily_diet', 'foodId');

    return view('nso/view_patient_daily_diet', compact('dailydiet_details'));
  }

  public function getdailyDiet(){
    $patientId = Session::get('user')->patientId;
    $dailydiet_details = DB::table('tbl_daily_diet')
    ->join('tbl_food', 'tbl_daily_diet.foodId', '=', 'tbl_food.foodId')
    ->join('tbl_drink', 'tbl_daily_diet.drinkId', '=', 'tbl_drink.drinkId')
    ->join('tbl_activity', 'tbl_daily_diet.activityId', '=', 'tbl_activity.activityId')
                ->select('tbl_daily_diet.*', 'tbl_food.*', 'tbl_drink.*', 'tbl_activity.*')
                ->where('tbl_daily_diet.patientId', $patientId)
                ->groupBy('tbl_daily_diet.date')
                ->get();

    // $dailydiet_details = DB::table('tbl_daily_diet')->get();
    // $dailydiet_details2 = DB::table('tbl_food')->get()->where('tbl_daily_diet', 'foodId');

    return view('patient/view_patient_daily_diet', compact('dailydiet_details'));
  }

  public function addTreatment($patientId){
    $date = Input::get('date');
    $remarks = Input::get('remarks');
    $nsoId = Session::get('user')->nsoId;

    $data = array('patientId'=>$patientId,'nsoId'=>$nsoId,'date'=>$date,'remarks'=>$remarks);

    DB::table('tbl_treatment')->insert($data);

    echo '<script type="text/javascript">';
    echo 'alert("Successful!")';
    echo '</script>';

    return Redirect::to('info/'.$patientId);
  }
  
  public function getDiet(){
	$dailydiet_details = DB::table('tbl_food')->get();
	$dailydiet_details2 = DB::table('tbl_drink')->get();
	$dailydiet_details3 = DB::table('tbl_activity')->get();
	// $dailydiet_details = DB::table('tbl_daily_diet')->get();
	// $dailydiet_details2 = DB::table('tbl_food')->get()->where('tbl_daily_diet', 'foodId');

	return view('nso/add_patient_daily_diet', compact('dailydiet_details', 'dailydiet_details2', 'dailydiet_details3'));
	}

  
   public function addDiet(){
  	$foodId = Input::get('list');
  	$drinkId = Input::get('list2');
  	$activityId = Input::get('list3');
    
    $patientId = Session::get('user')->patientId;
    $date = date('Y-m-d');
      $diet = array('patientId'=>$patientId, 'foodId'=>$foodId, 'drinkId'=>$drinkId, 'activityId'=>$activityId, 'date'=>$date);
      DB::table('tbl_daily_diet')->insert($diet);

      return redirect('/nso/adddailydiet');
  }
  
}