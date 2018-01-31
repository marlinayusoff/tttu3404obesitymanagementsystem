<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Food;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class libraryFoodController extends Controller
{
  public function createFoodLibrary(){
     return view('admin/daily_diet_makanan_create');

  }

public function viewFoodLibrary()
  {
    $data = Food::paginate(10);
		return view('admin/view_daily_diet_makanan')->withData($data);
  }

  public function addFood() {
    $foodName = Input::get('foodName');
    $calories = Input::get('calories');

    $count = 0;
    foreach($foodName as $FN) {
      $count++;
    }

    for($i = 0; $i < $count;$i++) {

      $food = array('calories'=>$calories[$i],'foodName'=>$foodName[$i]);
      DB::table('tbl_food')->insert($food);
    }

    return Redirect::to('admin/food/');
  }


 public function destroy($foodId)
  {

      $item = Food::find($foodId);
      $item->delete();
      //Page::destroy($id);
      session()->flash('Food has been deleted.');
      return redirect('admin/food');
  }


}
