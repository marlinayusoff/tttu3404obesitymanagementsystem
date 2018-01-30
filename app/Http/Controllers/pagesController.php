<?php

namespace App\Http\Controllers;

use Session;
use Auth;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\nsoHomeController;
use Illuminate\Routing\Redirector;

class pagesController extends Controller{

	public function getIndex(){
		if(Session::has('category')) {

			if(Session::get('category') == 'admin') {
				return view('admin/adminhome');
			} elseif(Session::get('category') == 'staff') {
				$controller = new nsoHomeController;
    			return $controller->home();
			} elseif(Session::get('category') == 'patient') {
				return view('patient/patienthome');
			}
		}
		return view('login');
	}

	public function loginprocess(Request $req){
		$username = $req->input('userName');
		$password = md5($req->input('userPassword'));

		$check_user = DB::table('tbl_admin')->where('username', '=', $username)->where('password', '=', $password)->first();

		if($check_user){
			Session::put('category', 'admin');
			Session::put('user', $check_user);
			return view('admin/adminhome');
		} else {
			$check_user2 = DB::table('tbl_nso')->where('username', '=', $username)->where('password', '=', $password)->first();
			if($check_user2){
				Session::put('category', 'staff');
				Session::put('user', $check_user2);
				$controller = new nsoHomeController;
    			return $controller->home();
			} else {
				$check_user3 = DB::table('tbl_patient')->where('username', '=', $username)->where('password', '=', $password)->first();

				if($check_user3){
					Session::put('category', 'patient');
					Session::put('user', $check_user3);
					return view('patient/patienthome');
				} else {
					echo '<script type="text/javascript">';
					echo 'alert("Nama Pengguna atau Kata Laluan yang salah.")';
					echo '</script>';
					return view('login');
				}
			}
		}
	}

	public function logoutprocess() {
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	}

	public function insertPatientBasic(Request $req){

		$name = $req->input('nama');
		$gender = $req->input('jantina');
		$dob= $req->input('dob');
		$icNo = $req->input('mycard');
		$address = $req->input('alamat');
		$city = $req->input('bandar');
		$state = $req->input('negeri');
		$poscode = $req->input('poskod');
		$race = $req->input('bangsa');
		$religion = $req->input('agama');
		$education = $req->input('pendidikan');
		$currentInfo = $req->input('currentInfo');
		$status = $req->input('status');
		$telNo = $req->input('telefon');
		$email = $req->input('email');
		$password = md5($req->input('password'));
		$patientId = $req->input('patientId');

		$healthIssue = $req->input('jenisPenyakit');
		$duration = $req->input('tempohSakit');
		$medicine= $req ->input('jenisUbat');
		$duration2 = $req->input('tempohPengambilan');
		$hipertensi = $req->input('hipertensi');
    	$kardiovaskular = $req->input('kardiovaskular');
    	$diabetes = $req->input('diabetes');
    	$asma = $req->input('asma');

    	$date = $req->input('date');
    	$weight = $req->input('weight');
    	$height = $req->input('height');
    	$wrist = $req->input('wrist');
    	$waist = $req->input('waist');
    	$hip = $req->input('hip');
    	$forearm = $req->input('forearm');
    	$BMI = $req->input('BMI');
    	$bodyFatMass = $req->input('bodyFatMass');
    	



		if($religion == "lain") {
			$religion = $req->input('input');
		}
		if($education == "other") {
			$education = $req->input('input2');
		}
		if($currentInfo == "belajar" ){
			$currentInfo = $req->input('input3');
		}
		else if($currentInfo == "bekerja"){
			$currentInfo = $req->input('input4');
		}


		
		$data = array('name'=>$name,'dateOfBirth'=>$dob,'email'=>$email,'city'=>$city,'state'=>$state,'status'=>$status,'education'=>$education,'currentInfo'=>$currentInfo,'poscode'=>$poscode,'race'=>$race,'religion'=>$religion,'gender'=>$gender,'address'=>$address,'password'=>$password,'icNo'=>$icNo,'telNo'=>$telNo,'username'=>$patientId,'hipertensi'=>$hipertensi,'kardiovaskular'=>$kardiovaskular,'diabetes'=>$diabetes,'asma'=>$asma);
		
		 $id =DB::table('tbl_patient')->insertGetId($data);

		 $data = array('healthIssue'=>$healthIssue, 'duration'=>$duration, 'patientId'=>$id);
		DB::table('tbl_health_issue')->insert($data);

		$data = array('medicineName'=>$medicine, 'duration'=>$duration2, 'patientId'=>$id);
		DB::table('tbl_medicine')->insert($data);

		$data = array('patientId'=>$id,'date'=>$date,'weight'=>$weight,'height'=>$height,'wrist'=>$wrist,'waist'=>$waist,'hip'=>$hip,'forearm'=>$forearm,'BMI'=>$BMI,'bodyFatMass'=>$bodyFatMass);
		DB::table('tbl_anthro_data')->insert($data);


		echo '<script type="text/javascript">';
		echo 'alert("Successful!")';
		echo '</script>';

		return redirect()->action('pagesController@getRegisterPatient');

		

	}
}