

<?php $__env->startSection('title', 'Quản lý sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Quản lý sản phẩm</h2>
            <p class="text-muted mb-0">Tìm kiếm theo tên, xem trạng thái tồn kho và thao tác cập nhật/xóa.</p>
        </div>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Thêm sản phẩm</a>
    </div>

    <div class="card section-card mb-4">
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('products.index')); ?>" class="row g-3 align-items-end">
                <div class="col-md-9">
                    <label class="form-label">Tìm theo tên</label>
                    <input type="text" name="search" value="<?php echo e($search); ?>" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-primary w-100" type="submit">Tìm kiếm</button>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary w-100">Xóa</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td class="fw-semibold"><?php echo e($product->name); ?></td>
                                <td><?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                                <td><?php echo e($product->quantity); ?></td>
                                <td><?php echo e($product->category); ?></td>
                                <td><span class="badge <?php echo e($product->stock_badge_class); ?>"><?php echo e($product->stock_label); ?></span></td>
                                <td class="text-end">
                                    <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-outline-primary">Cập nhật</a>
                                    <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Chưa có sản phẩm nào.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/products/index.blade.php ENDPATH**/ ?>