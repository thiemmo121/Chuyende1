@extends('layouts.app')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="mb-4">
        <h2 class="mb-1">Cập nhật sản phẩm</h2>
        <p class="text-muted mb-0">Thay đổi thông tin và số lượng tồn kho.</p>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product) }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label class="form-label">Tên</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Danh mục</label>
                    <input type="text" name="category" value="{{ old('category', $product->category) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Giá</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" min="0" value="{{ old('quantity', $product->quantity) }}" class="form-control" required>
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection
