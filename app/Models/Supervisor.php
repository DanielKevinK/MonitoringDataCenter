<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'supervisor';

    protected $fillable = [
        'name',
        'feedback',
        'report_monitoring_id'
    ];

    public function reportMonitoring()
    {
        return $this->belongsTo(ReportMonitoring::class, 'report_monitoring_id', 'id');
    }
}
