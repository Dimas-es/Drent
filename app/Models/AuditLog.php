<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $table = 'audit_logs';

    protected $fillable = [
        'entity_name',
        'entity_id',
        'action_type',
        'changed_data',
        'admin_user',
        'action_timestamp',
    ];

    public $timestamps = false;

    protected $casts = [
        'changed_data' => 'array',
        'action_timestamp' => 'datetime',
    ];
}
