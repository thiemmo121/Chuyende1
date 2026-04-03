<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'position',
        'department_id' // Thêm cột này để làm Bài 10 về quan hệ [cite: 321]
    ];

    // Bài 10: Quan hệ với phòng ban [cite: 322]
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
