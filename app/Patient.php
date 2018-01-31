<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'tbl_patient';
    protected $fillable = ['patientId','username','password','name','icNo','dateOfBirth','gender','religion','currentInfo','race','address','status','telNo','education','email','created_at','updated_at'];
    protected $primaryKey = 'patientId';

    public function Appointment(){
      return $this->hasMany('App\Appointment');
    }

  public function AnthroData(){
    return $this->hasMany('App\AnthroData');
  }

  public function Medicine(){
    return $this->hasMany('App\Medicine');
  }

  public function Treatment(){
    return $this->hasMany('App\Treatment');
  }
}
