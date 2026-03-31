<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'category'];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function getStockLabelAttribute(): string
    {
        if ($this->quantity <= 0) {
            return 'Hết hàng';
        }

        if ($this->quantity < 5) {
            return 'Sắp hết hàng';
        }

        return 'Còn hàng';
    }

    public function getStockBadgeClassAttribute(): string
    {
        if ($this->quantity <= 0) {
            return 'bg-danger';
        }

        if ($this->quantity < 5) {
            return 'bg-warning text-dark';
        }

        return 'bg-success';
    }
}
