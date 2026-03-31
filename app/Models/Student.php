<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'major', 'email'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function totalCredits(): int
    {
        return (int) $this->enrollments()
            ->join('courses', 'courses.id', '=', 'enrollments.course_id')
            ->sum('courses.credits');
    }
}
