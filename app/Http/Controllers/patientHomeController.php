<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class patientHomeController extends Controller{
	public function Home(){
        return view('patient/patienthome') ;
	}

	public function calender() {

		$calenders = array();
		$patientId = Session::get('user')->patientId;
		$first = DB::table('tbl_appointment')->where('patientId', $patientId)->get();

		foreach($first as $row) {
			$nsoId = $row->nsoId;
			$remark = $row->remarks;
			$date = $row->date;
			$body = "";

			$first2 = DB::table('tbl_appointment')->where('date', $date)->get();
			foreach($first2 as $row2) {
				$nsoName2 = $row2->nsoId;
				$time = $row2->time;

			$second = DB::table('tbl_nso')->where('nsoId', $nsoName2)->get()->first();
			$nsoName1 = $second->name;
			$tel = $second->telNo;
			$email = $second->email;

			$body .= "<p class='lead'>Time: $time <br><br>NSO Details</p> <h4>Name: $nsoName1 <br>Tel: $tel <br>Email: $email </h4><br><h4>$remark</h4><hr>";
			}
			if(date('Y-m-d') <= $date) {
				$calender = array("date"=>$date,"badge"=>true,"title"=>"Your Appointment","body"=>"$body","footer"=>"","classname"=>"orange-event");
			} else if(date('Y-m-d') >= $date) {
				$calender = array("date"=>$date,"badge"=>false,"title"=>"Your Appointment","body"=>"$body","footer"=>"","classname"=>"purple-event");
			}
			

			array_push($calenders, $calender);
		}

		return json_encode($calenders);
	}
}
?>