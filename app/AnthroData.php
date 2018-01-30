<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnthroData extends Model
{
    //
    protected $table = 'anthro_data';
    protected $fillable = ['antroId','date','weight','height','BMI','bodyFatMass','patientId'];
    protected $primaryKey = 'antroId';
    protected $indexKey = "patientId";

    public function InbodyResult(){
    	return $this->hasMany('App\InbodyResult');
    }
}
