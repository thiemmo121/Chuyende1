@extends('layouts.app')

@section('title', 'Quản lý sinh viên')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Quản lý sinh viên</h2>
            <p class="text-muted mb-0">Thêm sinh viên, tìm kiếm theo tên, sắp xếp và phân trang.</p>
        </div>
    </div>

    <div class="card section-card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('students.index') }}" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label">Tìm theo tên</label>
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Nhập tên sinh viên">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Sắp xếp</label>
                    <select name="sort" class="form-select">
                        <option value="name_asc" @selected($sort === 'asc')>Tên A-Z</option>
                        <option value="name_desc" @selected($sort === 'desc')>Tên Z-A</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-primary w-100" type="submit">Lọc dữ liệu</button>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary w-100">Xóa lọc</a>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Thêm sinh viên</h5>
                    <form method="POST" action="{{ route('students.store') }}" class="d-grid gap-3">
                        @csrf
                        <div>
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Ngành</label>
                            <input type="text" name="major" value="{{ old('major') }}" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu sinh viên</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card section-card h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Ngành</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td class="fw-semibold">{{ $student->name }}</td>
                                        <td>{{ $student->major }}</td>
                                        <td>{{ $student->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Chưa có sinh viên nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
