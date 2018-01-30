<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Activity;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class libraryActivityController extends Controller
{
  public function createActivityLibrary(){
     return view('admin/daily_diet_aktiviti_create');

  }

public function viewActivityLibrary()
  {
    $data = Activity::paginate(10);
		return view('admin/view_daily_diet_aktiviti')->withData($data);
  }

  public function addActivity() {
    $activityName = Input::get('activityName');
    $activityCalories = Input::get('activityCalories');

    $count = 0;
    foreach($activityName as $AN) {
      $count++;
    }

    for($i = 0; $i < $count;$i++) {

      $activity = array('activityCalories'=>$activityCalories[$i],'activityName'=>$activityName[$i]);
      DB::table('tbl_activity')->insert($activity);
    }

    return Redirect::to('admin/activity/');
  }


 public function destroy($activityId)
  {

      $item = Activity::find($activityId);
      $item->delete();
      //Page::destroy($id);
      session()->flash('Activity has been deleted.');
      return redirect('admin/activity');
  }


}
