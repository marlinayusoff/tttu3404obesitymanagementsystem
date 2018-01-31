<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointment';
    protected $fillable = ['appointmentId','patientId','nsoId','date','time','remarks'];
    protected $primaryKey = 'appointmentId';
    protected $indexKey = 'patientId';
    protected $indexKey = 'nsoId';
}
