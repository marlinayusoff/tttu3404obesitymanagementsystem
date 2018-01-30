<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NSO;
use App\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class adminController extends Controller
{
  public function create(){
    return view('admin/add_nso');
  }

  public function insert(Request $req){

    $name = $req->input('name');
    $email = $req->input('email');
    $gender = $req->input('jantina');
    $address = $req->input('address');
    $password = $req->input('password');
    $icNo = $req->input('mycard');
    $telNo = $req->input('telefon');
    $username = $req->input('username');


    $data = array('name'=>$name,'email'=>$email,'gender'=>$gender,'address'=>$address,'password'=>$password,'icNo'=>$icNo,'telNo'=>$telNo,'username'=>$username);

    DB::table('tbl_nso')->insert($data);

    echo '<script type="text/javascript">';
    echo 'alert("BERJAYA!")';
    echo '</script>';

    return view('admin/add_nso');
  }


  public function nsoList(){

    // $data = DB::table('staff')->get();

    $data = NSO::paginate(10);
    return view('admin/nso_list')->withData($data);
  } 

  public function searchNSO(Request $req){

    $data = DB::table('tbl_nso')->where('name', 'like', '%' . Input::get('searchby') . '%')->paginate();

    return view('admin/nso_list')->withData($data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $item = NSO::findOrfail($id);
    return view('admin.edit_nso',  compact('item'));

  }

  protected function validator(array $item)
    {
        return Validator::make($item, [
          'name' => 'required|string|max:100',
          'username' => 'required|string|max:20|unique:users',
          'gender' => 'required|string|max:10',
          'address' => 'required|string|max:100',
          'telNo' => 'required|integer|min:10',
          'icNo' => 'required|integer|max:12',
          'password' => 'required|string|max:20',
          'email'  => 'required|string|min:10'
        ]);
    }


  public function update()
  {
  
      $username = Input::get('username');
      $password = Input::get('password');
      $name = Input::get('name');
      $email = Input::get('email');
      $address = Input::get('address');
      $telNo = Input::get('telNo');
      $gender = Input::get('gender');
      $icNo = Input::get('icNo');
      $nsoId = Input::get('nsoId');

      $data = array('username'=>$username,'password'=>$password,'name'=>$name,'gender'=>$gender,'address'=>$address,'telNo'=>$telNo,'email'=>$email);
      DB::table('tbl_nso')->where('nsoId', $nsoId)->update($data);

    return Redirect::to('admin/nso_list/');
   
  }

//okay!!
//1/11/2017 (yusna)
  public function destroy($id)
	{

      $item = NSO::find($id);
      $item->delete();
      //Page::destroy($id);
			session()->flash('List has been deleted.');
			return redirect('admin/nso_list');
	}

}
