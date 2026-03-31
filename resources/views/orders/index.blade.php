@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Hệ thống đơn hàng</h2>
            <p class="text-muted mb-0">Tạo đơn nhiều sản phẩm, xem chi tiết và cập nhật trạng thái.</p>
        </div>
        <a href="{{ route('orders.create') }}" class="btn btn-success">Tạo đơn hàng</a>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td class="fw-semibold">{{ $order->customer_name }}</td>
                                <td>{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td><span class="badge {{ $order->status_badge_class }}">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at?->format('d/m/Y H:i') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Chưa có đơn hàng nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
