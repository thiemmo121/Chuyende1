<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 1. Cho phép nạp dữ liệu hàng loạt vào các cột này
    protected $fillable = ['name', 'price', 'quantity', 'category_id', 'image'];

    // 2. Ép kiểu dữ liệu để tính toán chính xác
    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    // 3. QUAN TRỌNG: Khai báo để Laravel tự động đính kèm các thuộc tính ảo vào Model
    protected $appends = ['stock_label', 'stock_badge_class'];

    // 4. Thiết lập mối quan hệ: 1 Sản phẩm thuộc về 1 Danh mục
    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Thuộc tính ảo: Trả về nhãn trạng thái kho
     * Gọi ngoài View: $product->stock_label
     */
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

    /**
     * Thuộc tính ảo: Trả về class màu sắc của Bootstrap (bg-danger, bg-success...)
     * Gọi ngoài View: $product->stock_badge_class
     */
    public function getStockBadgeClassAttribute(): string
    {
        if ($this->quantity <= 0) {
            return 'bg-danger'; // Màu đỏ cho sản phẩm hết hàng
        }

        if ($this->quantity < 5) {
            return 'bg-warning text-dark'; // Màu vàng cho sản phẩm sắp hết
        }

        return 'bg-success'; // Màu xanh cho sản phẩm còn hàng
    }
}