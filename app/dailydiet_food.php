<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailydiet_food extends Model
{
    protected $fillable = [
        'fld_food_name', 'fld_food_calories',
    ];}
