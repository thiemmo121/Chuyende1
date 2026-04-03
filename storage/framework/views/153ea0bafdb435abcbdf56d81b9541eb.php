

<?php $__env->startSection('title', 'Đăng ký môn học'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Đăng ký môn học</h2>
            <p class="text-muted mb-0">Không cho đăng ký trùng và giới hạn tối đa 18 tín chỉ mỗi sinh viên.</p>
        </div>
    </div>

    <div class="row g-4 mb-2">
        <div class="col-lg-5">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Đăng ký môn</h5>
                    <form method="POST" action="<?php echo e(route('enrollments.store')); ?>" class="d-grid gap-3">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label class="form-label">Sinh viên</label>
                            <select name="student_id" class="form-select" required>
                                <option value="">-- Chọn sinh viên --</option>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($student->id); ?>" <?php if(old('student_id') == $student->id): echo 'selected'; endif; ?>><?php echo e($student->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Môn học</label>
                            <select name="course_id" class="form-select" required>
                                <option value="">-- Chọn môn học --</option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>" <?php if(old('course_id') == $course->id): echo 'selected'; endif; ?>><?php echo e($course->name); ?> (<?php echo e($course->credits); ?> tín chỉ)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tổng tín chỉ của sinh viên</h5>
                    <div class="table-responsive mb-4">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sinh viên</th>
                                    <th>Ngành</th>
                                    <th>Tổng tín chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="fw-semibold"><?php echo e($student->name); ?></td>
                                        <td><?php echo e($student->major); ?></td>
                                        <td><span class="badge text-bg-info"><?php echo e($student->totalCredits()); ?> / 18</span></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Chưa có sinh viên nào.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <h5 class="card-title mb-3">Danh sách đăng ký</h5>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sinh viên</th>
                                    <th>Môn học</th>
                                    <th>Tín chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($enrollment->student?->name); ?></td>
                                        <td><?php echo e($enrollment->course?->name); ?></td>
                                        <td><?php echo e($enrollment->course?->credits); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Chưa có đăng ký nào.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <?php echo e($enrollments->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/enrollments/index.blade.php ENDPATH**/ ?>