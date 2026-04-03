 

<?php $__env->startSection('title', 'Danh sách nhân viên'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mt-4">
        <div class="d-flex justify-content-between align-items-center mt-3">
    <h4>Danh sách nhân viên</h4>
    
    <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Thêm nhân viên mới
    </a>
</div>
        <div class="card-body">
            <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['message' => 'Dữ liệu nhân viên đã được tải thành công!'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Vị trí</th>
                        <th>Phòng ban</th>
                    </tr>
                </thead>
                <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($emp->name); ?></td>
            <td><?php echo e($emp->email); ?></td>
            <td><?php echo e($emp->position); ?></td>
            
            <td><?php echo e($emp->department->name ?? 'N/A'); ?></td> 
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="4" class="text-center">Không có dữ liệu nhân viên</td>
        </tr>
    <?php endif; ?>
</tbody>
            </table>

            [cite_start]
            <div class="d-flex justify-content-center">
                <?php echo e($employees->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/employees/index.blade.php ENDPATH**/ ?>