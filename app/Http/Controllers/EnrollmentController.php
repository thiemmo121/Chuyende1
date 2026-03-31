<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('name')->get();
        $enrollments = Enrollment::with(['student', 'course'])->latest()->paginate(10);

        return view('enrollments.index', compact('students', 'courses', 'enrollments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => ['required', 'exists:courses,id'],
        ]);

        if (Enrollment::where('student_id', $data['student_id'])->where('course_id', $data['course_id'])->exists()) {
            return back()->withInput()->withErrors(['course_id' => 'Sinh viên này đã đăng ký môn học này.']);
        }

        $student = Student::findOrFail($data['student_id']);
        $course = Course::findOrFail($data['course_id']);

        if ($student->totalCredits() + $course->credits > 18) {
            return back()->withInput()->withErrors(['course_id' => 'Vượt quá giới hạn 18 tín chỉ.']);
        }

        Enrollment::create($data);

        return redirect()->route('enrollments.index')->with('success', 'Đã đăng ký môn học.');
    }
}
