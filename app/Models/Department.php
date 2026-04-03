<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Cho phép lưu dữ liệu vào các cột này [cite: 212, 213]
    protected $fillable = ['name', 'description'];

    // Bài 10: Thiết lập quan hệ - Một phòng ban có nhiều nhân viên 
    public function employees() 
    {
        return $this->hasMany(Employee::class);
    }
}