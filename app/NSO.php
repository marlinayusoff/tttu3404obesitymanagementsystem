<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NSO extends Model
{
    //
    protected $table = 'tbl_nso';
    protected $fillable = ['nsoId','username','name','gender','address','icNo','telNo','password','email'];
    protected $primaryKey = 'nsoId';

    public function Appointment(){
      return $this->hasMany('App\Appointment');
    }

  public function Treatment(){
    return $this->hasMany('App\Treatment');
  }
}
