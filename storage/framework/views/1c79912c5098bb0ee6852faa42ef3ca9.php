<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống Quản lý Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark text-white p-3 mb-4">
        <div class="container">
            <h1 class="h3">Hệ thống Quản lý Sản phẩm</h1>
            <nav class="nav">
                <a class="nav-link text-white" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                <a class="nav-link text-white" href="<?php echo e(route('products.index')); ?>">Sản phẩm</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?> </div>
</body>
</html><?php /**PATH E:\Quàng Văn Thiếm_20221002_Bài thực hành chương 3-1\resources\views/layouts/master.blade.php ENDPATH**/ ?>