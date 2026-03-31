

<?php $__env->startSection('title', 'Đặt lịch'); ?>

<?php $__env->startSection('content'); ?>
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
                    <form method="POST" action="<?php echo e(route('appointments.store')); ?>" class="d-grid gap-3">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="form-label">Tên khách</label>
                            <input type="text" name="customer_name" value="<?php echo e(old('customer_name')); ?>" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Ngày</label>
                            <input type="date" name="appointment_date" value="<?php echo e(old('appointment_date')); ?>" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Giờ</label>
                            <input type="time" name="appointment_time" value="<?php echo e(old('appointment_time')); ?>" class="form-control" required>
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
                                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="fw-semibold"><?php echo e($appointment->customer?->name); ?></td>
                                        <td><?php echo e($appointment->appointment_date?->format('d/m/Y')); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($appointment->appointment_time, 5, '')); ?></td>
                                        <td><span class="badge <?php echo e($appointment->status_badge_class); ?>"><?php echo e($appointment->status); ?></span></td>
                                        <td class="text-end">
                                            <?php if($appointment->status !== 'canceled'): ?>
                                                <form method="POST" action="<?php echo e(route('appointments.cancel', $appointment)); ?>" class="d-inline" onsubmit="return confirm('Hủy lịch này?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hủy lịch</button>
                                                </form>
                                            <?php else: ?>
                                                <span class="text-muted small">Đã hủy</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Chưa có lịch nào.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <?php echo e($appointments->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\duyih\Downloads\Bai chương 2-2 tiếp\resources\views/appointments/index.blade.php ENDPATH**/ ?>