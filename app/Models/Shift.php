<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shift';

    protected $fillable = [
        'shift_start',
        'shift_name',
        'shift_end'
    ];

    public function shiftStaff(){
        return $this->hasMany(ShiftStaff::class);
    }
}
