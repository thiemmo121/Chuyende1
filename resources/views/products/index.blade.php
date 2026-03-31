@extends('layouts.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Quản lý sản phẩm</h2>
            <p class="text-muted mb-0">Tìm kiếm theo tên, xem trạng thái tồn kho và thao tác cập nhật/xóa.</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-success">Thêm sản phẩm</a>
    </div>

    <div class="card section-card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('products.index') }}" class="row g-3 align-items-end">
                <div class="col-md-9">
                    <label class="form-label">Tìm theo tên</label>
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-primary w-100" type="submit">Tìm kiếm</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">Xóa</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td class="fw-semibold">{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td><span class="badge {{ $product->stock_badge_class }}">{{ $product->stock_label }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Cập nhật</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Chưa có sản phẩm nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
