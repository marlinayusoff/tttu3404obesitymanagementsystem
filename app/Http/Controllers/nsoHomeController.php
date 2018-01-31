<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class nsoHomeController extends Controller{
	public function Home(){

		$jan = DB::table('tbl_appointment')->where('date', 'like', '%-01-%')->count();
		$fab = DB::table('tbl_appointment')->where('date', 'like', '%-02-%')->count();
		$mar = DB::table('tbl_appointment')->where('date', 'like', '%-03-%')->count();
		$apr = DB::table('tbl_appointment')->where('date', 'like', '%-04-%')->count();
		$may = DB::table('tbl_appointment')->where('date', 'like', '%-05-%')->count();
		$jun = DB::table('tbl_appointment')->where('date', 'like', '%-06-%')->count();
		$jul = DB::table('tbl_appointment')->where('date', 'like', '%-07-%')->count();
		$aug = DB::table('tbl_appointment')->where('date', 'like', '%-08-%')->count();
		$sep = DB::table('tbl_appointment')->where('date', 'like', '%-09-%')->count();
		$oct = DB::table('tbl_appointment')->where('date', 'like', '%-10-%')->count();
		$nov = DB::table('tbl_appointment')->where('date', 'like', '%-11-%')->count();
		$dec = DB::table('tbl_appointment')->where('date', 'like', '%-12-%')->count();
		$visit = array ( $jan, $fab, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec );

        return view('nso/nsohome', compact('visit')) ;
	}

	public function calender() {

		$calenders = array();
	
		$first = DB::table('tbl_appointment')->get();

		foreach($first as $row) {
			$patientId = $row->patientId;
			$nsoId = $row->nsoId;
			$remark = $row->remarks;
			$date = $row->date;
			$body = "";

			$first2 = DB::table('tbl_appointment')->where('date', $date)->get();
			foreach($first2 as $row2) {
				$nsoName2 = $row2->nsoId;
				$time = $row2->time;

			$second = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
			$patientname = $second->name;
			$tel = $second->telNo;
			$email = $second->email;
			
			$nsoName1 = DB::table('tbl_nso')->where('nsoId', $nsoName2)->value('name');

			$body .= "<p class='lead'>$time <br>$patientname <br>Tel: $tel <br>Email: $email </p><p>$remark <br>NSO: $nsoName1</p><hr>";
			}

			if($nsoId == Session::get('user')->nsoId) {
				$calender = array("date"=>$date,"badge"=>true,"title"=>"Patient Appointment","body"=>"$body","footer"=>"","classname"=>"purple-event");
			} else {
				$calender = array("date"=>$date,"badge"=>false,"title"=>"Patient Appointment","body"=>"$body","footer"=>"","classname"=>"purple-event");
			}

			array_push($calenders, $calender);
		}

		return json_encode($calenders);
	}
}
?>