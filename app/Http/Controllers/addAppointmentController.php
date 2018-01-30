<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class addAppointmentController extends Controller
{

	public function schedule() {
		$patient = DB::table('tbl_patient')->get();
        return view('nso/appointment', compact('patient'));
    }

    public function displayAppointment() {
    	$calenders = array();
	
		$first = DB::table('tbl_appointment')->get();
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
    }

    public function AppointmentAdd() {
    	$name = Input::post('pname');
    	$date = date('Y-m-d', strtotime(Input::post('date')));
    	$time = date('H:i', strtotime(Input::post('times')));
		
		$second = DB::table('tbl_patient')->where('name', $name)->get()->first();
		$patientId = $second->patientId;

		$nso = Session::get('user')->nsoId;

		$data = array('patientId'=>$patientId,'nsoId'=>$nso,'date'=>$date,'time'=>$time.":00",'remarks'=>'');

		$get = DB::table('tbl_appointment')->insert($data);

		$t = array('get'=>$get);

    	 return json_encode($t);
    }
}