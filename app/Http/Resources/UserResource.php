<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform user model menjadi bentuk JSON yang diinginkan.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'driver_license_number' => $this->driver_license_number,
            'license_expiry_date' => $this->license_expiry_date,
            'ktp_photo' => $this->ktp_photo,
            'license_photo' => $this->license_photo,
            'verification_status' => $this->verification_status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}