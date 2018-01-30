<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    //
    protected $table = 'tbl_drink';
    protected $fillable = ['drinkId','drinkName','drinkCalories'];
    protected $primaryKey = 'drinkId';
}
