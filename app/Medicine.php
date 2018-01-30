<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $table = 'medicine';
    protected $fillable = ['medicineId','medicineName','patientId','duration'];
    protected $primaryKey = 'medicineId';
    protected $indexKey = 'patientId';
}
