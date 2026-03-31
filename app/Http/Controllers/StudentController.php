<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('search')->toString();
        $sort = $request->string('sort')->toString() === 'name_desc' ? 'desc' : 'asc';

        $students = Student::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('name', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('students.index', compact('students', 'search', 'sort'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Đã thêm sinh viên thành công.');
    }
}
