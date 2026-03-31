@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-hero p-4 p-lg-5 mb-4">
        <div class="row align-items-center gy-4">
            <div class="col-lg-8">
                <p class="text-uppercase small opacity-75 mb-2">Web Vip</p>
                <h1 class="display-6 fw-bold mb-3">Hệ thống quản lý tổng hợp</h1>
                <p class="lead mb-0">Bao gồm sinh viên, sản phẩm, đăng ký môn học, đơn hàng và đặt lịch với validation, migration và giao diện Bootstrap.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                    <div class="badge text-bg-light text-dark fs-6 px-3 py-2 rounded-pill">Web Vip</div>
            </div>
        </div>
    </div>

    <div class="row g-3 g-lg-4">
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 1: Sinh viên</h5>
                    <p class="card-text text-muted">Thêm, tìm kiếm, sắp xếp, phân trang và kiểm tra email không trùng.</p>
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Mở quản lý sinh viên</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 2: Sản phẩm</h5>
                    <p class="card-text text-muted">Quản lý kho, tìm kiếm, cập nhật tồn, xóa, hiển thị trạng thái tồn kho.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Mở quản lý sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 3: Đăng ký môn</h5>
                    <p class="card-text text-muted">Thêm môn học, đăng ký không trùng và giới hạn tối đa 18 tín chỉ.</p>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Mở đăng ký môn</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 4: Đơn hàng</h5>
                    <p class="card-text text-muted">Tạo đơn nhiều sản phẩm, tính tổng tự động và đổi trạng thái.</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Mở hệ thống đơn hàng</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 5: Đặt lịch</h5>
                    <p class="card-text text-muted">Đặt lịch, chống trùng giờ, cấm đặt trong quá khứ và hủy lịch.</p>
                    <a href="{{ route('appointments.index') }}" class="btn btn-primary">Mở hệ thống đặt lịch</a>
                </div>
            </div>
        </div>
    </div>
@endsection
