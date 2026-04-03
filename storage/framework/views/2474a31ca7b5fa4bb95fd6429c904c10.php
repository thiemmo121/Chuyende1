

<?php $__env->startSection('title', 'Quản lý sinh viên'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Quản lý sinh viên</h2>
            <p class="text-muted mb-0">Thêm sinh viên, tìm kiếm theo tên, sắp xếp và phân trang.</p>
        </div>
    </div>

    <div class="card section-card mb-4">
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('students.index')); ?>" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label">Tìm theo tên</label>
                    <input type="text" name="search" value="<?php echo e($search); ?>" class="form-control" placeholder="Nhập tên sinh viên">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Sắp xếp</label>
                    <select name="sort" class="form-select">
                        <option value="name_asc" <?php if($sort === 'asc'): echo 'selected'; endif; ?>>Tên A-Z</option>
                        <option value="name_desc" <?php if($sort === 'desc'): echo 'selected'; endif; ?>>Tên Z-A</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-primary w-100" type="submit">Lọc dữ liệu</button>
                    <a href="<?php echo e(route('students.index')); ?>" class="btn btn-outline-secondary w-100">Xóa lọc</a>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Thêm sinh viên</h5>
                    <form method="POST" action="<?php echo e(route('students.store')); ?>" class="d-grid gap-3">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Ngành</label>
                            <input type="text" name="major" value="<?php echo e(old('major')); ?>" class="form-control" required>
                        </div>
                        <div>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Lưu sinh viên</button>
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
                                    <th>Tên</th>
                                    <th>Ngành</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($student->id); ?></td>
                                        <td class="fw-semibold"><?php echo e($student->name); ?></td>
                                        <td><?php echo e($student->major); ?></td>
                                        <td><?php echo e($student->email); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Chưa có sinh viên nào.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <?php echo e($students->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/students/index.blade.php ENDPATH**/ ?>