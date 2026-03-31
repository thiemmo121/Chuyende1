@extends('layouts.app')

@section('title', 'Đăng ký môn học')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Đăng ký môn học</h2>
            <p class="text-muted mb-0">Không cho đăng ký trùng và giới hạn tối đa 18 tín chỉ mỗi sinh viên.</p>
        </div>
    </div>

    <div class="row g-4 mb-2">
        <div class="col-lg-5">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Đăng ký môn</h5>
                    <form method="POST" action="{{ route('enrollments.store') }}" class="d-grid gap-3">
                        @csrf
                        <div>
                            <label class="form-label">Sinh viên</label>
                            <select name="student_id" class="form-select" required>
                                <option value="">-- Chọn sinh viên --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Môn học</label>
                            <select name="course_id" class="form-select" required>
                                <option value="">-- Chọn môn học --</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>{{ $course->name }} ({{ $course->credits }} tín chỉ)</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tổng tín chỉ của sinh viên</h5>
                    <div class="table-responsive mb-4">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sinh viên</th>
                                    <th>Ngành</th>
                                    <th>Tổng tín chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td class="fw-semibold">{{ $student->name }}</td>
                                        <td>{{ $student->major }}</td>
                                        <td><span class="badge text-bg-info">{{ $student->totalCredits() }} / 18</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Chưa có sinh viên nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h5 class="card-title mb-3">Danh sách đăng ký</h5>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sinh viên</th>
                                    <th>Môn học</th>
                                    <th>Tín chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enrollments as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->student?->name }}</td>
                                        <td>{{ $enrollment->course?->name }}</td>
                                        <td>{{ $enrollment->course?->credits }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Chưa có đăng ký nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $enrollments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
