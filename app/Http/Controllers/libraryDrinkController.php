<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Drink;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class libraryDrinkController extends Controller
{
  public function createDrinkLibrary(){
     return view('admin/daily_diet_minuman_create');

  }

public function viewDrinkLibrary()
  {
    $data = Drink::paginate(10);
		return view('admin/view_daily_diet_minuman')->withData($data);
  }

  public function addDrink() {
    $drinkName = Input::get('drinkName');
    $drinkCalories = Input::get('drinkCalories');

    $count = 0;
    foreach($drinkName as $DN) {
      $count++;
    }

    for($i = 0; $i < $count;$i++) {

      $drink = array('drinkCalories'=>$drinkCalories[$i],'drinkName'=>$drinkName[$i]);
      DB::table('tbl_drink')->insert($drink);
    }

    return Redirect::to('admin/drink/');
  }


 public function destroy($drinkId)
  {

      $item = Drink::find($drinkId);
      $item->delete();
      //Page::destroy($id);
      session()->flash('Drink has been deleted.');
      return redirect('admin/drink');
  }


}
