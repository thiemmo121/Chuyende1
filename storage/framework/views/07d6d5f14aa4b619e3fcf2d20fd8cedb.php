

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-hero p-4 p-lg-5 mb-4">
        <div class="row align-items-center gy-4">
            <div class="col-lg-8">
                <p class="text-uppercase small opacity-75 mb-2">Web Vip</p>
                <h1 class="display-6 fw-bold mb-3">Hệ thống quản lý tổng hợp</h1>
                <p class="lead mb-0">Bao gồm sinh viên, sản phẩm, đăng ký môn học, đơn hàng và đặt lịch với validation, migration và giao diện Bootstrap.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="badge text-bg-light text-dark fs-6 px-3 py-2 rounded-pill">Web Vip</div>
            </div>
        </div>
    </div>

    <!-- Thống kê: tổng sản phẩm, tổng danh mục, danh sách 5 sản phẩm mới -->
    <div class="mt-4">
        <h2 class="mb-4">Hệ thống Thống kê (Dashboard)</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số sản phẩm</h5>
                        <h2 class="display-4"><?php echo e($totalProducts ?? 0); ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số danh mục</h5>
                        <h2 class="display-4"><?php echo e($totalCategories ?? 0); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">5 Sản phẩm mới nhất</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($latestProducts)): ?>
                            <?php $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> đ</td>
                                <td><?php echo e($product->created_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">Không có sản phẩm nào.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Quản lý sản phẩm</a>
        </div>
    </div>

    <!-- Giữ nguyên phần card chức năng (Bài 1..5) -->
    <div class="row g-3 g-lg-4 mt-4">
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 1: Sinh viên</h5>
                    <p class="card-text text-muted">Thêm, tìm kiếm, sắp xếp, phân trang và kiểm tra email không trùng.</p>
                    <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary">Mở quản lý sinh viên</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 2: Sản phẩm</h5>
                    <p class="card-text text-muted">Quản lý kho, tìm kiếm, cập nhật tồn, xóa, hiển thị trạng thái tồn kho.</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Mở quản lý sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 3: Đăng ký môn</h5>
                    <p class="card-text text-muted">Thêm môn học, đăng ký không trùng và giới hạn tối đa 18 tín chỉ.</p>
                    <a href="<?php echo e(route('enrollments.index')); ?>" class="btn btn-primary">Mở đăng ký môn</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 4: Đơn hàng</h5>
                    <p class="card-text text-muted">Tạo đơn nhiều sản phẩm, tính tổng tự động và đổi trạng thái.</p>
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-primary">Mở hệ thống đơn hàng</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card section-card h-100">
                <div class="card-body">
                    <h5 class="card-title">Bài 5: Đặt lịch</h5>
                    <p class="card-text text-muted">Đặt lịch, chống trùng giờ, cấm đặt trong quá khứ và hủy lịch.</p>
                    <a href="<?php echo e(route('appointments.index')); ?>" class="btn btn-primary">Mở hệ thống đặt lịch</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/dashboard.blade.php ENDPATH**/ ?>