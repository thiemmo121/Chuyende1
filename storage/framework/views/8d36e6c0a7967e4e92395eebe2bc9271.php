

<?php $__env->startSection('title', 'Thêm sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-4">
        <h2 class="mb-1">Thêm sản phẩm</h2>
        <p class="text-muted mb-0">Nhập thông tin sản phẩm mới vào kho.</p>
    </div>

    <div class="card section-card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('products.store')); ?>" class="row g-3">
                <?php echo csrf_field(); ?>
                <div class="col-md-6">
                    <label class="form-label">Tên</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Danh mục</label>
                    <input type="text" name="category" value="<?php echo e(old('category')); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Giá</label>
                    <input type="number" name="price" step="0.01" min="0" value="<?php echo e(old('price')); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" min="0" value="<?php echo e(old('quantity', 0)); ?>" class="form-control" required>
                </div>
                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Bai chương 2-2 tiếp\resources\views/products/create.blade.php ENDPATH**/ ?>