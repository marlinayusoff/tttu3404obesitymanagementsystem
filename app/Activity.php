<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 'tbl_activity';
    protected $fillable = ['activityId','activityName','activityCalories'];
    protected $primaryKey = 'activityId';
}
