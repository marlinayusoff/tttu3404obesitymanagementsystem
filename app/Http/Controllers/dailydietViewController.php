<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NSO;
use App\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class dailydietViewController extends Controller{

public function process() {
	$id = Input::get('dailyDietId');
	$dailydiet_ = DB::table('tbl_daily_diet')
->join('tbl_food', 'tbl_daily_diet.foodId', '=', 'tbl_food.foodId')
->join('tbl_drink', 'tbl_daily_diet.drinkId', '=', 'tbl_drink.drinkId')
->join('tbl_activity', 'tbl_daily_diet.activityId', '=', 'tbl_activity.activityId')
            ->select('tbl_daily_diet.*', 'tbl_food.*', 'tbl_drink.*', 'tbl_activity.*')
            ->where('tbl_daily_diet.dailyDietId', $id)
            ->get();
foreach ($dailydiet_ as $key) {
	$date = $key->date;
}
$detail = '<form action="" method="post" id="details">
						<div class="panel panel-default" style="padding: 10px 10px 40px;">
						<table class="table">
						<tbody>
						<tr>
							<td><font size="5">Patient Daily Diet</font></td>
							<td align="right" >
								<h5>'.$date.'</h5></td>
						</tr>
							
						</tbody>
						</table>
								<table class="table table-hover table-bordered text-center">
								  <thead class="thead-inverse">';

$grandtotal = 0;
$drink = 0;
$food = 0;
$activity = 0;


									$detail .='<tr><td colspan="2"><font color="" size="4">Makanan</td></tr><tr><th>Butiran</th>
										<th style="background-color: #4fc6e8;color: #000;">+ Kalori (Kcal)</th></tr>';
$dailydiet_details = DB::table('tbl_daily_diet')
->join('tbl_food', 'tbl_daily_diet.foodId', '=', 'tbl_food.foodId')
            ->select('tbl_food.*')
            ->where('tbl_daily_diet.date', $date)
            ->get();

foreach ($dailydiet_details as $d) {	
										$detail .='<tr><td style="background-color: #fff;">'.$d->foodName.'</td>
										<td style="background-color: #fff;">'.$d->calories.' Kcal</td>
										</tr>';
										$food += $d->calories;
}
$detail .='<tr><td colspan="2" style="padding-top: 40px;"><font color="" size="4">Minuman</td></tr><tr><th>Butiran</th>
										<th style="background-color: #4fc6e8;color: #000;">+ Kalori (Kcal)</th></tr>';
$dailydiet_details = DB::table('tbl_daily_diet')
->join('tbl_drink', 'tbl_daily_diet.drinkId', '=', 'tbl_drink.drinkId')
            ->select('tbl_drink.*')
            ->where('tbl_daily_diet.date', $date)
            ->get();
foreach ($dailydiet_details as $d) {
										$detail .='<tr><td style="background-color: #fff;">'.$d->drinkName.'</td>
										<td style="background-color: #fff;">'.$d->calories.' Kcal</td>
										</tr>';
										$drink += $d->calories;
}
$detail .='<tr><td colspan="2" style="padding-top: 40px;"><font color="" size="4">Aktiviti</td></tr><tr><th>Butiran</th>
										<th style="background-color: #e84f4f;color: #000;">- Kalori (Kcal)</th></tr>';
$dailydiet_details = DB::table('tbl_daily_diet')
->join('tbl_activity', 'tbl_daily_diet.activityId', '=', 'tbl_activity.activityId')
            ->select('tbl_activity.*')
            ->where('tbl_daily_diet.date', $date)
            ->get();
foreach ($dailydiet_details as $d) {
										$detail .='<tr><td style="background-color: #fff;">'.$d->activityName.'</td>
										<td style="background-color: #fff;">'.$d->calories.' Kcal</td>
										</tr>';
										$activity += $d->calories;
}
    									$grandtotal += $drink + $food - $activity;
											$detail .='<tr><td colspan="1" align="text-center" style="background-color: #292b2c"><font color="white" size="4">Jumlah</font></td>
											<td style="background-color: #4fe87c;color:#000;"><font size="4" style="bold">'.$grandtotal.' Kcal</font></td>
										</tr>
										</thead>
									</table>
								  </form>';

return $detail;
}

}
