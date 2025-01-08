<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồ án chuyên ngành</title>
    <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
    <script src="view/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div>
        <!-- Header -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Header cho Tên Shop -->
        <div class="bg-danger text-white py-5 position-relative">
            <!-- Khu vực Logo và Tên Shop -->
            <div class="container d-flex align-items-center">
                <!-- Logo -->
                <div class="me-3">
                    <img src="upload/logo.png" alt="Logo" class="rounded-circle" style="width: 80px; height: 80px;">
                </div>

                <!-- Tên Shop -->
                <h1 class="fw-bold mb-0 fs-7">PHỤ KIỆN THỜI TRANG</h1>
            </div>

            <!-- Dòng chào động -->
            <div class="mt-2 w-100">
                <marquee behavior="scroll" direction="left" class="text-light fs-5">
                    Rất hân hạnh được phục vụ quý khách hàng!
                </marquee>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="my-4 navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <div class="boxfooter searbox mt-3">
                <form action="index.php?act=sanpham" method="post" class="input-group">
                    <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit" class="btn btn-outline-secondary" name="tiemkiem">
                        <i class="bi bi-search" style="color: white;"></i>
                    </button>
                </form>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="index.php"><img
                                src="upload/bieutuongtrangchu.png" class="d-block" style="width: 31px; height: 31px;">
                            <span class="ms-1 fw-bold">Trang chủ</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="index.php?act=gioithieu"><img
                                src="upload/gioithieu.png" class="d-block" style="width: 26px; height: 26px;"><span
                                class="ms-1 fw-bold">Giới thiệu</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="index.php?act=lienhe">
                            <img src="upload/lienhe.png" class="d-block" style="width: 21px; height: 21px;">
                            <span class="ms-2 fw-bold">Liên hệ</span>
                        </a>

                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link fw-bold" href="index.php?act=gopy">Góp ý</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="index.php?act=hoidap">Hỏi đáp</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="index.php?act=viewcart">
                            <img src="upload/giohang.png" class="d-block" style="width: 21px; height: 21px;">
                            <span class="ms-2 fw-bold">Giỏ hàng</span>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
    .navbar-nav .nav-item {
        margin: 0 15px;
        /* Khoảng cách giữa các mục */
    }

    /* Thêm hiệu ứng khi rê chuột vào các liên kết menu */
    .navbar-nav .nav-link:hover {
        color: red !important;
    }
    </style>

    </div>
</body>

</html>