<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDiet extends Model
{
    //
     protected $table = 'daily_diet';
    protected $fillable = ['dailyDietId','patientId','drinkId','foodId','activityId','date'];
    protected $primaryKey = 'dailyDietId';
    protected $indexKey = "patientId";
    protected $indexKey = "drinkId";
    protected $indexKey = "foodId";
    protected $indexKey = "activityId";

    public function Drink(){
    	return $this->hasOne('App\Drink');
    }

    public function Food(){
    	return $this->hasOne('App\Food');
    }

    public function Activity(){
    	return $this->hasOne('App\Activity');
    }
}
