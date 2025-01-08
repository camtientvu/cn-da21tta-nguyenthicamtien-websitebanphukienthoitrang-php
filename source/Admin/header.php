<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<!-- <link rel="stylesheet" href="view/css/style.css"> -->

<body>
    <div class="container-fluid boxcenter">
        <header class="row mb-3 py-5 position-relativ bg-primary text-white ">
            <h1 class="fw-bold text-white text-center fs-7">QUẢN TRỊ HỆ THỐNG BÁN PHỤ KIỆN THỜI TRANG</h1>
        </header>
        <!-- Menu -->
        <nav class="row mb-3 border">
            <ul class="nav justify-content-center py-3" style="background-color: #D3D3D3;">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="../index.php">
                        <span class="ms-1 fs-5 fw-bold text-dark "><i class="fs-5 bi bi-house-fill text-dark"></i>
                            Trang chủ
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=adddm">
                        <span class="ms-1 fs-5 text-dark fw-bold"><i class="fs-5 bi bi-list text-dark"></i>
                            Danh mục
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" class="nav-link d-flex align-items-center"
                        href="index_admin.php?act=addsp">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="bi bi-bag fs-5 black-icon"></i>
                            Sản phẩm
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <?php if($_SESSION['user']['role'] == 0): ?>
                    <!-- Hiển thị link nếu là admin -->
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=dskh">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-person-fill text-dark"></i>
                            Khách hàng
                        </span>
                    </a>
                    <?php else: ?>
                    <!-- Hiển thị thông báo nếu không phải admin -->
                    <a href="#" class="nav-link d-flex align-items-center" onclick="alert('Bạn không phải là admin');">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-person-fill text-dark"></i>
                            Khách hàng
                        </span>
                    </a>
                    <?php endif; ?>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=dsbl">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-chat-fill text-dark"></i> Bình
                            luận</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=dstk">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-pie-chart-fill text-dark"></i>
                            Thống kê
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=tonkho">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-box-fill text-dark"></i>
                            Tồn kho
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="index_admin.php?act=dsdh">
                        <span class="ms-1 fs-5 fw-bold text-dark"><i class="fs-5 bi bi-card-checklist"></i>
                            Danh sách đơn hàng
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Bootstrap JavaScript (tùy chọn nếu cần chức năng JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    .nav-link:hover span {
        color: red !important;
        /* Đổi màu chữ sang đỏ khi rê chuột vào */
    }
    </style>