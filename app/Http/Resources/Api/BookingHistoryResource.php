<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'full_name' => $this->user->full_name,
                'email' => $this->user->email,
            ],
            'car' => [
                'id' => $this->car->id,
                'name' => $this->car->name,
                'brand' => $this->car->brand,
                'model' => $this->car->model,
            ],
            'booking_date' => $this->booking_date,
            'booking_status' => $this->booking_status,
            'total_cost' => $this->total_cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
