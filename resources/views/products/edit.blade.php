@extends('layouts.master') @section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-warning">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection