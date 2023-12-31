<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'brand',
        'ram',
        'processor',
        'status',
        'installation_date'
    ];

    public function ReportMonitoring()
    {
        return $this->hasMany(ReportMonitoring::class, 'report_monitoring_id', 'id');
    }

    public function ReportMaintenance()
    {
        return $this->hasMany(ReportMaintenance::class, 'report_maintenance_id', 'id');
    }
}
