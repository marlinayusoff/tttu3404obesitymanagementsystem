<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InbodyResult extends Model
{
    //
    protected $table = 'inbody_result';
    protected $fillable = ['inbodyId'];
    protected $primaryKey = 'inbodyId';
}
