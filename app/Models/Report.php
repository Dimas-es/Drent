<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'report_type',
        'date_range',
        'total_revenue',
        'total_bookings',
        'vehicle_usage',
        'generated_at',
    ];

    protected $casts = [
        'total_revenue' => 'decimal:2',
        'generated_at' => 'datetime',
    ];
}
