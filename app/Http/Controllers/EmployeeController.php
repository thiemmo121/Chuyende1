<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Quan trọng: Dòng này để Controller hiểu được Model Employee 

class EmployeeController extends Controller
{
    // Hàm index để hiển thị danh sách nhân viên
    public function index()
    {
        // 1. Lấy dữ liệu kèm quan hệ phòng ban và phân trang 10 người/trang [cite: 335]
        $employees = Employee::with('department')->paginate(10); 
        
        // 2. Trả về file index.blade.php nằm trong thư mục resources/views/employees [cite: 247]
        return view('employees.index', compact('employees')); 
    }
    // 1. Hàm hiển thị form thêm mới
public function create()
{
    $departments = \App\Models\Department::all(); // Lấy danh sách phòng ban để chọn
    return view('employees.create', compact('departments'));
}

// 2. Hàm xử lý lưu dữ liệu vào Database
public function store(\Illuminate\Http\Request $request)
{
    // Tạo nhân viên mới từ dữ liệu form
    \App\Models\Employee::create($request->all());

    // Quay lại trang danh sách kèm thông báo thành công
    return redirect()->route('employees.index')->with('message', 'Đã thêm nhân viên mới thành công!');
}
}