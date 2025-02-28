<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'setting_name',
        'setting_value',
    ];

    public $timestamps = false;

    protected $casts = [
        'updated_at' => 'datetime',
    ];
}
