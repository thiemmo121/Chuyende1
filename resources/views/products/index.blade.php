@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Thêm sản phẩm mới</a>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.index') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Nhập tên sản phẩm cần tìm..." value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <select name="sort" class="form-select">
    <option value="">-- Sắp xếp theo giá --</option>
    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
</select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-secondary w-100">Lọc dữ liệu</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">Xóa lọc</a>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Ảnh</th> <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="60" class="img-thumbnail">
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td> <td>{{ $product->quantity }}</td>
                <td>
                    <span class="badge {{ $product->stock_badge_class }}">
                        {{ $product->stock_label }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection