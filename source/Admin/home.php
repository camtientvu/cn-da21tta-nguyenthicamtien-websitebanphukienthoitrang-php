<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts - Chọn font đẹp -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
        rel="stylesheet">

    <style>
    /* Đặt font mặc định cho toàn bộ trang */
    body {
        font-family: 'Roboto', sans-serif;
    }

    /* Định dạng container */
    .admin-container {
        margin-top: 50px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Định dạng tiêu đề */
    .admin-header {
        color: #0d6efd;
        font-family: 'Poppins', sans-serif;
        /* Đặt font khác cho tiêu đề */
        font-weight: 700;
        /* Đậm */
    }

    /* Định dạng văn bản */
    .welcome-message p {
        margin-top: 20px;
        /* Khoảng cách phía trên */
        margin-bottom: 30px;
        /* Khoảng cách phía dưới */
        text-align: justify;
        /* Căn giữa nội dung */
        font-family: Arial, sans-serif;
        color: #333;
    }


    /* Định dạng footer */
    .footer {
        background-color: #D3D3D3;
        color: #000000;
        padding: 30px 0;
        font-size: 1.0rem;
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body>

    <div class="admin-container text-center">
        <h1 class="admin-header">Chào mừng đến với Trang Admin</h1>
        <p class="lead fs-4 text-justify">Đây là nơi bạn có thể quản lý toàn bộ nội dung và các chức năng của trang web.
        </p>
        <p class="lead fs-4 text-justify">Chúc bạn có những trải nghiệm tuyệt vời khi quản lý trang web!</p>
    </div>

    <div class="footer text-dark text-center">
        <h5>Website bán phụ kiện thời trang - Nguyễn Thị Cẩm Tiên - Mã số sinh viên: 110121114<br>Copyright &copy; 2024
        </h5>
    </div>

</body>

</html>