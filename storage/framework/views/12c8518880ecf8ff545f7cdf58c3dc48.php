

<?php $__env->startSection('title', 'Quản lý môn học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Quản lý môn học</h2>
            <p class="text-muted mb-0">Thêm môn học và số tín chỉ để dùng cho đăng ký.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Thêm môn học</h5>
                    <form method="POST" action="<?php echo e(route('courses.store')); ?>" class="d-grid gap-3">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="form-label">Tên môn</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Số tín chỉ</label>
                            <input type="number" name="credits" min="1" max="30" value="<?php echo e(old('credits', 1)); ?>" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu môn học</button>
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
                                    <th>#</th>
                                    <th>Tên môn</th>
                                    <th>Tín chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($course->id); ?></td>
                                        <td class="fw-semibold"><?php echo e($course->name); ?></td>
                                        <td><?php echo e($course->credits); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Chưa có môn học nào.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/courses/index.blade.php ENDPATH**/ ?>