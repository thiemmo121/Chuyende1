@extends('layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="mb-4">
        <h2 class="mb-1">Thêm sản phẩm</h2>
        <p class="text-muted mb-0">Nhập thông tin sản phẩm mới vào kho.</p>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.store') }}" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Tên</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Danh mục</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Giá</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" min="0" value="{{ old('quantity', 0) }}" class="form-control" required>
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection
