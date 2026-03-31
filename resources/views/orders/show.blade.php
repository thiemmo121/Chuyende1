@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Chi tiết đơn hàng #{{ $order->id }}</h2>
            <p class="text-muted mb-0">Khách hàng: {{ $order->customer_name }}</p>
        </div>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card section-card h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->line_total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card section-card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Thông tin đơn hàng</h5>
                    <p class="mb-2"><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    <p class="mb-0"><strong>Trạng thái:</strong> <span class="badge {{ $order->status_badge_class }}">{{ $order->status }}</span></p>
                </div>
            </div>

            <div class="card section-card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật trạng thái</h5>
                    <form method="POST" action="{{ route('orders.status', $order) }}" class="d-grid gap-3">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select">
                            <option value="pending" @selected($order->status === 'pending')>pending</option>
                            <option value="processing" @selected($order->status === 'processing')>processing</option>
                            <option value="completed" @selected($order->status === 'completed')>completed</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Lưu trạng thái</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
