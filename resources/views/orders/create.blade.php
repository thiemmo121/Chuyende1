@extends('layouts.app')

@section('title', 'Tạo đơn hàng')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Tạo đơn hàng</h2>
            <p class="text-muted mb-0">Nhập khách hàng và nhiều sản phẩm trong cùng một đơn.</p>
        </div>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Quay lại danh sách</a>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <form method="POST" action="{{ route('orders.store') }}" id="order-form">
                @csrf
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Tên khách</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control" required>
                    </div>
                </div>

                @php
                    $itemRows = old('items', [['product_id' => '', 'quantity' => 1]]);
                @endphp

                <div id="items-container" class="d-grid gap-3 mb-3">
                    @foreach ($itemRows as $index => $item)
                        <div class="row g-3 align-items-end item-row">
                            <div class="col-md-7">
                                <label class="form-label">Sản phẩm</label>
                                <select name="items[{{ $index }}][product_id]" class="form-select" required>
                                    <option value="">-- Chọn sản phẩm --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" @selected((string)($item['product_id'] ?? '') === (string)$product->id)>
                                            {{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Số lượng</label>
                                <input type="number" name="items[{{ $index }}][quantity]" min="1" value="{{ $item['quantity'] ?? 1 }}" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-danger w-100 remove-item">Xóa</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex gap-2 mb-4">
                    <button type="button" class="btn btn-outline-primary" id="add-item">Thêm sản phẩm</button>
                    <button type="submit" class="btn btn-success">Tạo đơn hàng</button>
                </div>
            </form>
        </div>
    </div>

    <template id="item-template">
        <div class="row g-3 align-items-end item-row">
            <div class="col-md-7">
                <label class="form-label">Sản phẩm</label>
                <select class="form-select product-select" required>
                    <option value="">-- Chọn sản phẩm --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Số lượng</label>
                <input type="number" min="1" value="1" class="form-control quantity-input" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-danger w-100 remove-item">Xóa</button>
            </div>
        </div>
    </template>
@endsection

@push('scripts')
    <script>
        (function () {
            const container = document.getElementById('items-container');
            const template = document.getElementById('item-template');
            const addButton = document.getElementById('add-item');

            function refreshFieldNames() {
                Array.from(container.querySelectorAll('.item-row')).forEach((row, index) => {
                    const select = row.querySelector('select');
                    const quantity = row.querySelector('input[type="number"]');

                    select.name = `items[${index}][product_id]`;
                    quantity.name = `items[${index}][quantity]`;
                });
            }

            function bindRemoveButtons() {
                container.querySelectorAll('.remove-item').forEach((button) => {
                    button.onclick = function () {
                        if (container.children.length > 1) {
                            this.closest('.item-row').remove();
                            refreshFieldNames();
                        }
                    };
                });
            }

            addButton.addEventListener('click', function () {
                const fragment = template.content.cloneNode(true);
                container.appendChild(fragment);
                refreshFieldNames();
                bindRemoveButtons();
            });

            bindRemoveButtons();
        })();
    </script>
@endpush
