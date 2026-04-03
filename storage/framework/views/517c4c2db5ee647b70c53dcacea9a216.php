

<?php $__env->startSection('title', 'Thêm nhân viên mới'); ?>

<?php $__env->startSection('content'); ?>
<div class="card mt-4">
    <div class="card-header">
        <h3>Thêm nhân viên mới</h3>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('employees.store')); ?>" method="POST">
            <?php echo csrf_field(); ?> 
            
            <div class="mb-3">
                <label class="form-label">Tên nhân viên</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Vị trí</label>
                <input type="text" name="position" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phòng ban</label>
                <select name="department_id" class="form-control" required>
                    <option value="">-- Chọn phòng ban --</option>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dept->id); ?>"><?php echo e($dept->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu nhân viên</button>
            <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/employees/create.blade.php ENDPATH**/ ?>