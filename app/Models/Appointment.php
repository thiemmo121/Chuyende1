<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'appointment_date', 'appointment_time', 'status'];

    protected $casts = [
        'appointment_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'canceled' => 'bg-danger',
            default => 'bg-success',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'canceled' => 'canceled',
            default => 'scheduled',
        };
    }
}
