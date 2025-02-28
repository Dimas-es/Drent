<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cars';

    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'transmission_type',
        'passenger_capacity',
        'daily_price',
        'pickup_location',
        'availability_status',
        'photo_url',
    ];

    protected $casts = [
        'year' => 'integer',
        'passenger_capacity' => 'integer',
        'daily_price' => 'decimal:2',
    ];
}
