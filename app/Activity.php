<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = 'tbl_activity';
    protected $fillable = ['activityId','activityName','calories'];
    protected $primaryKey = 'activityId';
}
