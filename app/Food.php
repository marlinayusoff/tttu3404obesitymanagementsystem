<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = 'tbl_food';
    protected $fillable = ['foodId','foodName','foodCalories'];
    protected $primaryKey = 'foodId';
}
