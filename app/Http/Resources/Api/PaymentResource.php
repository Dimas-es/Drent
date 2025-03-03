<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'booking' => [
                'id' => $this->booking->id,
                'user_id' => $this->booking->user_id,
                'car_id' => $this->booking->car_id,
                'start_date' => $this->booking->start_date,
                'end_date' => $this->booking->end_date,
                'status' => $this->booking->status,
            ],
            'payment_method' => $this->payment_method,
            'payment_amount' => $this->payment_amount,
            'payment_status' => $this->payment_status,
            'payment_date' => $this->payment_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
