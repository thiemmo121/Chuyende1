@extends('layouts.app')

@section('title', 'Đặt lịch')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Hệ thống đặt lịch</h2>
            <p class="text-muted mb-0">Đặt lịch, kiểm tra trùng giờ và hủy lịch khi cần.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Đặt lịch</h5>
                    <form method="POST" action="{{ route('appointments.store') }}" class="d-grid gap-3">
                        @csrf
                        <div>
                            <label class="form-label">Tên khách</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Ngày</label>
                            <input type="date" name="appointment_date" value="{{ old('appointment_date') }}" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Giờ</label>
                            <input type="time" name="appointment_time" value="{{ old('appointment_time') }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Đặt lịch</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card section-card h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Ngày</th>
                                    <th>Giờ</th>
                                    <th>Trạng thái</th>
                                    <th class="text-end">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td class="fw-semibold">{{ $appointment->customer?->name }}</td>
                                        <td>{{ $appointment->appointment_date?->format('d/m/Y') }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($appointment->appointment_time, 5, '') }}</td>
                                        <td><span class="badge {{ $appointment->status_badge_class }}">{{ $appointment->status }}</span></td>
                                        <td class="text-end">
                                            @if ($appointment->status !== 'canceled')
                                                <form method="POST" action="{{ route('appointments.cancel', $appointment) }}" class="d-inline" onsubmit="return confirm('Hủy lịch này?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hủy lịch</button>
                                                </form>
                                            @else
                                                <span class="text-muted small">Đã hủy</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Chưa có lịch nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
