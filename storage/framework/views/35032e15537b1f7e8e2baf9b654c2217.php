

<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Chi tiết đơn hàng #<?php echo e($order->id); ?></h2>
            <p class="text-muted mb-0">Khách hàng: <?php echo e($order->customer_name); ?></p>
        </div>
        <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-outline-secondary">Quay lại</a>
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
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->product_name); ?></td>
                                        <td><?php echo e(number_format($item->unit_price, 0, ',', '.')); ?></td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <td><?php echo e(number_format($item->line_total, 0, ',', '.')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <p class="mb-2"><strong>Tổng tiền:</strong> <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></p>
                    <p class="mb-0"><strong>Trạng thái:</strong> <span class="badge <?php echo e($order->status_badge_class); ?>"><?php echo e($order->status); ?></span></p>
                </div>
            </div>

            <div class="card section-card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật trạng thái</h5>
                    <form method="POST" action="<?php echo e(route('orders.status', $order)); ?>" class="d-grid gap-3">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <select name="status" class="form-select">
                            <option value="pending" <?php if($order->status === 'pending'): echo 'selected'; endif; ?>>pending</option>
                            <option value="processing" <?php if($order->status === 'processing'): echo 'selected'; endif; ?>>processing</option>
                            <option value="completed" <?php if($order->status === 'completed'): echo 'selected'; endif; ?>>completed</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Lưu trạng thái</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/orders/show.blade.php ENDPATH**/ ?>