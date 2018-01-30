<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class DailyDietController extends Controller


{

    public function dailydiet_makanan_new(){
       $dailydiet_makanan_create = DB::table('tbl_food')->get();
        return view('admin/daily_diet_makanan_create', compact('dailydiet_makanan_create'));
        
    }

    public function dailydiet_makanan()
    {
        $dailydiet_makanan = DB::table('tbl_food')->get();
        return view('admin/view_daily_diet_makanan', compact('dailydiet_makanan'));
    }

    public function dailydiet_makanan_create(Request $req)
    {
        

        $nama = $req->input('fld_food_name');
        $kalori = $req->input('fld_food_calories');
        
        $data = array('fld_food_name'=>$nama,'fld_food_calories'=>$kalori);

        DB::table('tbl_food')->insert($data);

        echo '<script type="text/javascript">';
        echo 'alert("BERJAYA!")';
        echo '</script>';

        return view('admin/daily_diet_makanan_create');

       
    }

    public function dailydiet_minuman_new(){
       $dailydiet_minuman_create = DB::table('tbl_drink')->get();
        return view('admin/daily_diet_minuman_create', compact('dailydiet_minuman_create'));
        
    }

    public function dailydiet_minuman_create(Request $req)
    {
        

        $nama = $req->input('Minuman');
        $kalori = $req->input('Kalorie');
        
        $data = array('Minuman'=>$nama,'Kalorie'=>$kalori);

        DB::table('tbl_drink')->insert($data);

        echo '<script type="text/javascript">';
        echo 'alert("BERJAYA!")';
        echo '</script>';

        return view('admin/daily_diet_minuman_create');

       
    }


    public function dailydiet_minuman()
    {
        $dailydiet_minuman = DB::table('tbl_drink')->get();
        return view('admin/view_daily_diet_minuman', compact('dailydiet_minuman'));
    }

     public function dailydiet_aktiviti()
    {
        $dailydiet_aktiviti = DB::table('tbl_activity')->get();
        return view('admin/view_daily_diet_aktiviti', compact('dailydiet_aktiviti'));
    }

    

    //$dailydiet = obesity_management_system::paginate(6);
    
}
?>