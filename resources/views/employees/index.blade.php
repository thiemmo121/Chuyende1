@extends('layouts.master') 

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="card mt-4">
        <div class="d-flex justify-content-between align-items-center mt-3">
    <h4>Danh sách nhân viên</h4>
    {{-- Nút bấm dẫn đến trang tạo mới --}}
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Thêm nhân viên mới
    </a>
</div>
        <div class="card-body">
            <x-alert message="Dữ liệu nhân viên đã được tải thành công!" />

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Vị trí</th>
                        <th>Phòng ban</th>
                    </tr>
                </thead>
                <tbody>
    @forelse($employees as $emp)
        <tr>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->position }}</td>
            {{-- Chỉ hiển thị tên phòng ban, xóa các đoạn thừa --}}
            <td>{{ $emp->department->name ?? 'N/A' }}</td> 
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">Không có dữ liệu nhân viên</td>
        </tr>
    @endforelse
</tbody>
            </table>

            [cite_start]
            <div class="d-flex justify-content-center">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection