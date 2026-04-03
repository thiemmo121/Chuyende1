 <?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="price" value="<?php echo e($product->price); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="quantity" value="<?php echo e($product->quantity); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e($product->category_id == $cat->id ? 'selected' : ''); ?>>
                        <?php echo e($cat->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/'.$product->image)); ?>" width="100" class="mt-2">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-warning">Cập nhật</button>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/products/edit.blade.php ENDPATH**/ ?>