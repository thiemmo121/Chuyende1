<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Laravel Assignment'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at top, #f6f8ff 0%, #eef2f7 42%, #e8edf5 100%);
            min-height: 100vh;
        }

        .app-shell {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
            border-radius: 1.25rem;
        }

        .page-hero {
            background: linear-gradient(135deg, #123456 0%, #1e6f8f 45%, #2aa5a1 100%);
            color: white;
            border-radius: 1.25rem;
        }

        .section-card {
            border: 0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            border-radius: 1rem;
        }

        .site-navbar {
            position: sticky;
            top: 0.75rem;
            z-index: 1030;
            background: transparent;
            margin-bottom: 1rem;
        }

        .nav-panel {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 1.5rem;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.12), inset 0 1px 0 rgba(255, 255, 255, 0.75);
            padding: 0.9rem 1.5rem;
        }

        .nav-panel::before,
        .nav-panel::after {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .nav-panel::before {
            background:
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.25) 18%, transparent 45%),
                radial-gradient(circle at 85% 15%, rgba(96, 165, 250, 0.28) 0%, transparent 24%),
                radial-gradient(circle at 70% 120%, rgba(20, 184, 166, 0.22) 0%, transparent 30%);
            mix-blend-mode: screen;
            animation: glassShift 10s ease-in-out infinite alternate;
            z-index: 0;
        }

        .nav-panel::after {
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.45), rgba(255, 255, 255, 0.1) 35%, rgba(255, 255, 255, 0.3) 60%, rgba(255, 255, 255, 0.08));
            opacity: 0.7;
            transform: translateY(-28%) skewY(-6deg);
            filter: blur(18px);
            z-index: 0;
        }

        .nav-panel > * {
            position: relative;
            z-index: 1;
        }

        .brand-link {
            position: relative;
            display: inline-flex;
            align-items: center;
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-decoration: none;
            background: linear-gradient(90deg, #0f172a, #0284c7, #10b981, #d946ef, #0f172a);
            background-size: 300% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: brandFlow 6s linear infinite;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.85), 0 6px 16px rgba(15, 23, 42, 0.18);
            transition: transform 0.25s ease, filter 0.25s ease;
        }

        .brand-link::after {
            content: attr(data-text);
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.35), rgba(2, 132, 199, 0.45), rgba(16, 185, 129, 0.45), rgba(217, 70, 239, 0.45), rgba(15, 23, 42, 0.35));
            background-size: 300% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            transform: translate(0.8px, 2.5px);
            filter: blur(5px);
            opacity: 0.45;
            z-index: -1;
            animation: brandFlow 6s linear infinite;
        }

        .brand-link:hover {
            transform: translateY(-1px) scale(1.01);
            filter: drop-shadow(0 0 10px rgba(125, 211, 252, 0.35));
        }

        .navbar .nav-link {
            border-radius: 999px;
            padding-left: 0.9rem;
            padding-right: 0.9rem;
            color: #334155;
            transition: background-color 0.2s ease, transform 0.2s ease, color 0.2s ease;
        }

        .navbar .nav-link:hover {
            background: rgba(15, 23, 42, 0.06);
            transform: translateY(-1px);
            color: #0f172a;
        }

        .navbar .nav-link svg {
            color: #0ea5e9;
        }

        @keyframes brandFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes glassShift {
            0% {
                transform: translateX(-4%) translateY(-2%);
            }
            100% {
                transform: translateX(4%) translateY(2%);
            }
        }
    </style>
</head>
<body>
    <nav class="site-navbar">
        <div class="container nav-panel navbar navbar-expand-lg navbar-light px-lg-5">
            <a class="navbar-brand brand-link" data-text="Dũng Nguyễn" href="<?php echo e(route('dashboard')); ?>">
                <span>Dũng Nguyễn</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="<?php echo e(route('dashboard')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 2 8h1v6.5A1.5 1.5 0 0 0 4.5 16h3a.5.5 0 0 0 .5-.5V10h1v5.5a.5.5 0 0 0 .5.5h3a1.5 1.5 0 0 0 1.5-1.5V8h1a.5.5 0 0 0 .354-.854l-6-6zM7 15V9.5a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5V15H7zm4 0V9.5a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5V15h3z"/>
                            </svg>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('students.index')); ?>">Sinh viên</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('products.index')); ?>">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('courses.index')); ?>">Môn học</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('enrollments.index')); ?>">Đăng ký</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('orders.index')); ?>">Đơn hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('appointments.index')); ?>">Đặt lịch</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4 py-lg-5">
        <div class="app-shell p-3 p-lg-4">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <div class="fw-semibold mb-2">Vui lòng kiểm tra lại dữ liệu:</div>
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\duyih\Downloads\Bai chương 2-2 tiếp\resources\views/layouts/app.blade.php ENDPATH**/ ?>