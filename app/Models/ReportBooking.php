<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportBooking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'report_bookings';

    protected $fillable = [
        'report_id',
        'booking_id',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
