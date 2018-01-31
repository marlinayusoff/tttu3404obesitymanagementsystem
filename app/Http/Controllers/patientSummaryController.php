<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DB;
use App\HealthIssue;
use App\Patient;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class patientSummaryController extends Controller
{
    public function show(){

    	//total patient
    	$female = Patient::where('gender', 'like', 'Perempuan')->count();
		$male = Patient::where('gender', 'like', 'Lelaki')->count();
		$total = Patient::count();

		//count ikut bulan semasa appointment mengikut jantina

		$maleThisMonth = DB::table('tbl_appointment')->join('tbl_patient', 'tbl_appointment.patientId', '=', 'tbl_patient.patientId')
			->whereBetween('tbl_appointment.date', [
		    Carbon::now()->startOfMonth(),
		    Carbon::now()->endOfMonth(),
			])->where('tbl_patient.gender', 'like', 'Lelaki')->count();

		$femaleThisMonth = DB::table('tbl_appointment')->join('tbl_patient', 'tbl_appointment.patientId', '=', 'tbl_patient.patientId')
			->whereBetween('tbl_appointment.date', [
		    Carbon::now()->startOfMonth(),
		    Carbon::now()->endOfMonth(),
			])->where('tbl_patient.gender', 'like', 'Perempuan')->count();

		//count ikut bulan semasa appointment mengikut jantina

		$maleThisWeek = DB::table('tbl_appointment')->join('tbl_patient', 'tbl_appointment.patientId', '=', 'tbl_patient.patientId')
			->whereBetween('tbl_appointment.date', [
		    Carbon::now()->startOfWeek(),
		    Carbon::now()->endOfWeek(),
			])->where('tbl_patient.gender', 'like', 'Lelaki')->count();

		$femaleThisWeek = DB::table('tbl_appointment')->join('tbl_patient', 'tbl_appointment.patientId', '=', 'tbl_patient.patientId')
			->whereBetween('tbl_appointment.date', [
		    Carbon::now()->startOfWeek(),
		    Carbon::now()->endOfWeek(),
			])->where('tbl_patient.gender', 'like', 'Perempuan')->count();


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

		//peta Malaysia
		$brunei = DB::table('tbl_patient')->where('state', 'like', 'Brunei')->count();
		$johor = DB::table('tbl_patient')->where('state', 'like', 'Johor')->count();
		$melaka = DB::table('tbl_patient')->where('state', 'like', 'Melaka')->count();
		$negeri9 = DB::table('tbl_patient')->where('state', 'like', 'Negeri Sembilan')->count();
		$kedah = DB::table('tbl_patient')->where('state', 'like', 'Kedah')->count();
		$kelantan = DB::table('tbl_patient')->where('state', 'like', 'Kelantan')->count();
		$terengganu = DB::table('tbl_patient')->where('state', 'like', 'Terengganu')->count();
		$kedah = DB::table('tbl_patient')->where('state', 'like', 'Kedah')->count();
		$pahang = DB::table('tbl_patient')->where('state', 'like', 'Pahang')->count();
		$ppinang = DB::table('tbl_patient')->where('state', 'like', 'Pulau Pinang')->count();
		$perak = DB::table('tbl_patient')->where('state', 'like', 'Perak')->count();
		$perlis = DB::table('tbl_patient')->where('state', 'like', 'Perlis')->count();
		$selangor = DB::table('tbl_patient')->where('state', 'like', 'Selangor')->count();
		$labuan = DB::table('tbl_patient')->where('state', 'like', 'Labuan')->count();
		$sabah = DB::table('tbl_patient')->where('state', 'like', 'Sabah')->count();
		$sarawak = DB::table('tbl_patient')->where('state', 'like', 'Sarawak')->count();
		$state = array ( $brunei, $johor, $melaka, $negeri9, $kedah, $kelantan, $terengganu, $kedah, $pahang, $ppinang, $perak, $perlis, $selangor, $labuan, $sabah, $sarawak );



		$heartAttack = HealthIssue::where('healthIssue', 'Heart Attack')->count();
    	$diabetes = HealthIssue::where('healthIssue', 'Diabetes')->count();
    	$fattyLiver = HealthIssue::where('healthIssue', 'Fatty Liver')->count();
    	$osteoarthritis = HealthIssue::where('healthIssue', 'Osteoarthritis')->count(); 
    	$highBloodPressure = HealthIssue::where('healthIssue', 'High Blood Pressure')->count();
    	$kidney = HealthIssue::where('healthIssue', 'Kidney Problem')->count();
    	$others = HealthIssue::where('healthIssue', 'Others')->count();

    	$healthIssueNumber = array( $heartAttack, $diabetes, $fattyLiver, $osteoarthritis, $highBloodPressure, $others);




		 return view('nso/patient_summary', compact('male','female','total','maleThisMonth','femaleThisMonth', 'maleThisWeek','femaleThisWeek','visit','state','healthIssueNumber', 'brunei', 'johor', 'melaka', 'negeri9', 'kedah', 'kelantan', 'terengganu', 'kedah', 'pahang', 'ppinang', 'perak', 'perlis', 'selangor', 'labuan', 'sabah', 'sarawak'));



    }
}
