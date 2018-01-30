<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointment';
    protected $fillable = ['appointmentId','patientId','nsoId','date','time','remarks'];
    protected $primaryKey = 'appointmentId';

    public function Patient(){
	    return $this->hasMany('App\Patient');
	  }

	  public function NSO(){
	    return $this->hasMany('App\NSO');
	  
}

}
