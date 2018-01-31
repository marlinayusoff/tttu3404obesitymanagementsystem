<?php

namespace App\Http\Controllers ;
use DB ;
use Illuminate\Http\Request ;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class peopleController extends Controller{

    public function index(){
        return view('people/show');     
    }


    public function processForm() {
        $lastName  = Input::get('lastName') ;
        $firstName = Input::get('firstName') ;
        return Redirect::to('people/'.$lastName.'/'.$firstName) ;
    }
    public function show($lastName,$firstName) {
        $qry = 'SELECT * FROM tbl_nso WHERE name LIKE "%'.$firstName.'%" ' ;
        $ppl = DB::select($qry);
        return view('people.show')->withData($ppl) ;
    }
}
?>