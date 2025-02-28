<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'booking_history';

    protected $fillable = [
        'user_id',
        'car_id',
        'booking_date',
        'booking_status',
        'total_cost',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'total_cost' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
