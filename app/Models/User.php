<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasName;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasName
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'password',
        'address',
        'driver_license_number',
        'license_expiry_date',
        'ktp_photo',
        'license_photo',
        'verification_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'license_expiry_date' => 'date',
        'verification_status' => 'boolean',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Gunakan full_name sebagai nama di Filament
    public function getFilamentName(): string
    {
        return $this->full_name ?? 'User';
    }

    // Mutator: Jika admin dibuat tanpa phone_number, isi dengan default
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->phone_number) {
                $user->phone_number = '0000000000'; // Bisa disesuaikan
            }
        });
    }
}