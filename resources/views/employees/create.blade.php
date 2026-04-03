@extends('layouts.master')

@section('title', 'Thêm nhân viên mới')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h3>Thêm nhân viên mới</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf {{-- Bắt buộc phải có để bảo mật form --}}
            
            <div class="mb-3">
                <label class="form-label">Tên nhân viên</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Vị trí</label>
                <input type="text" name="position" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phòng ban</label>
                <select name="department_id" class="form-control" required>
                    <option value="">-- Chọn phòng ban --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu nhân viên</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection