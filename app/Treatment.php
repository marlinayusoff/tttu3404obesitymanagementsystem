<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    //
    protected $table = 'treatment';
    protected $fillable = ['treatmentId','patientId','nsoId','date','remarks'];
    protected $primaryKey = 'treatmentId';
    protected $indexKey = 'patientId';
    protected $indexKey = 'nsoId';
}
