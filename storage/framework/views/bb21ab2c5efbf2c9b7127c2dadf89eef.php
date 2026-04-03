

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách sản phẩm</h2>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">+ Thêm sản phẩm mới</a>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="row g-3">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Nhập tên sản phẩm cần tìm..." value="<?php echo e(request('search')); ?>">
                </div>

                <div class="col-md-4">
                    <select name="sort" class="form-select">
    <option value="">-- Sắp xếp theo giá --</option>
    <option value="price_asc" <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>>Giá tăng dần</option>
    <option value="price_desc" <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>>Giá giảm dần</option>
</select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-secondary w-100">Lọc dữ liệu</button>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary w-100">Xóa lọc</a>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Ảnh</th> <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th> 
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" width="60" class="img-thumbnail">
                    <?php else: ?>
                        <span class="text-muted">No image</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> đ</td>
                <td><?php echo e($product->category->name ?? 'N/A'); ?></td> <td><?php echo e($product->quantity); ?></td>
                <td>
                    <span class="badge <?php echo e($product->stock_badge_class); ?>">
                        <?php echo e($product->stock_label); ?>

                    </span>
                </td>
                <td>
                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-warning">Sửa</a>

                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/products/index.blade.php ENDPATH**/ ?>