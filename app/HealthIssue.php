<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthIssue extends Model
{
    //
    protected $table = 'tbl_health_issue';
    protected $fillable = ['healthIssueId','patientId','healthIssue','duration'];
    protected $primaryKey = 'healthIssueId';
    protected $indexKey = 'patientId';
}
