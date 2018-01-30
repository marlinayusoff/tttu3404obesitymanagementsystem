<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NSO;
use App\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class nsoController extends Controller{


/*
--
--
-- PATIENT
--
--
*/

public function processForm() {
        $patientId  = Input::get('patientId') ;
        return Redirect::to('info/'.$patientId) ;
	    }
	    public function show($patientId) {
       //$result = Patient::findOrfail($patientId)->where('patientId', '$patientId')->first();
      $data = DB::table('tbl_patient')->where('patientId', $patientId)->get()->first();
       $health = DB::table('tbl_health_issue')->where('patientId', $patientId)->get();
       $medicine = DB::table('tbl_medicine')->where('patientId', $patientId)->get();

       return view('nso.patient_info', compact('data','health','medicine'));
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

	public function destroy($id)
	{

      $item = Patient::find($id); //kena linkkan juga table lain untuk delete
      $item->delete();
      //Page::destroy($id);
      session()->flash('List has been deleted.');
      return redirect('nso/patient_list');
	}

  public function updateBasicInformation(Request $request, $id)
  {
      //
      $item = Patient::find($id);
      $this->validate($request,[
          'name' => 'required|string|max:100',
          'name' => 'required|string|max:15',
          'gender' => 'required|string|max:10',
          'address' => 'required|string|max:100',
          'telNo' => 'required|integer|min:10',
          'icNo' => 'required|integer|max:12',
          'password' => 'required|string|max:20',
          'email'  => 'required|string|min:10'
          ]);
      $item->username = $request->username;
      $item->name = $request->name;
      $item->gender = $request->gender;
      $item->address = $request->address;
      $item->telNo = $request->telNo;
      $item->icNo = $request->icNo;
      $item->password = $request->password;
      $item->email = $request->email;
      $item->save();
      return redirect('admin/nso_list');
  }


public function getRegisterPatient(){
		$patientId = Input::get('patientId');
	return view('nso/add_patient');
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
		$username = $req->input('username');
		
		$patientId = Input::get('patientId');

		$healthIssue = $req->input('jenisPenyakit');
		$duration = $req->input('tempohSakit');
		$medicine= $req ->input('jenisUbat');
		$duration2 = $req->input('tempohPengambilan');

		$hipertensi = $req->input('hipertensi');
	    $kardiovaskular = $req->input('kardiovaskular');
	    $diabetes = $req->input('diabetes');
	    $asma = $req->input('asma');

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

		$data = array('name'=>$name,'dateOfBirth'=>$dob,'email'=>$email,'city'=>$city,'state'=>$state,'status'=>$status,'education'=>$education,'currentInfo'=>$currentInfo,'poscode'=>$poscode,'race'=>$race,'religion'=>$religion,'gender'=>$gender,'address'=>$address,'password'=>$password,'icNo'=>$icNo,'telNo'=>$telNo,'username'=>$username,'hipertensi'=>$hipertensi,'kardiovaskular'=>$kardiovaskular,'diabetes'=>$diabetes,'asma'=>$asma);

		 $id =DB::table('tbl_patient')->insertGetId($data);



		echo '<script type="text/javascript">';
		echo 'alert("Successful!")';
		echo '</script>';

		return view('nso/add_patient');



	}


}
?>
