<?php
// Kết nối cơ sở dữ liệu
function pdo_get_connection1() {
    $dburl = "mysql:host=localhost;dbname=doanchuyennganh;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

// Hàm thêm admin vào cơ sở dữ liệu
function them_admin($user, $password, $hoten, $email, $address, $tel) {
    $conn = pdo_get_connection1();
    
    // Kiểm tra xem email đã tồn tại hay chưa
    $sql_check = "SELECT COUNT(*) FROM taikhoan WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->execute([$email]);
    $email_count = $stmt_check->fetchColumn();

    if ($email_count > 0) {
        // Email đã tồn tại
        echo '<script>
        alert("Email đã tồn tại trong hệ thống. Vui lòng sử dụng email khác!");
        window.history.back();
        </script>';
        exit();
    }
    
    // Nếu email không tồn tại, tiếp tục thêm admin
    $sql = "INSERT INTO taikhoan (user, pass, hoten, email, address, tel, role, trang_thai) 
            VALUES (?, ?, ?, ?, ?, ?, 1, 'Mở')";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user, md5($password), $hoten, $email, $address, $tel]);
}

// Xử lý form khi người dùng submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];

    them_admin($user, $password, $hoten, $email, $address, $tel);
    echo '<script>
    alert("Thêm thành công tài khoản quản lý!");
    window.location.href = "index_admin.php?act=dskh"; 
  </script>'; 
    exit();
}
?>


<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">THÊM TÀI KHOẢN QUẢN LÝ</h1>
    </header>
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="user" class="form-label text-dark fw-bold"> <i class="bi bi-person-fill"
                            style="color: black;"></i> Tên Đăng
                        Nhập</label>
                    <input type="text" class="form-control" id="user" name="user" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-dark fw-bold"><i class="bi bi-key-fill text-dark"></i>
                        Mật
                        Khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="hoten" class="form-label text-dark fw-bold"><i class="bi bi-person-fill"></i> Họ
                        Tên</label>
                    <input type="text" class="form-control" id="hoten" name="hoten" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-dark fw-bold"><i class="bi bi-envelope-fill"></i>
                        Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label text-dark fw-bold"><i class="bi bi-geo-alt-fill"
                            style="color: black;"></i> Địa Chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label text-dark fw-bold"><i class="bi bi-telephone-fill text-dark"></i>
                        Điện Thoại</label>
                    <input type="text" class="form-control" id="tel" name="tel" required>
                </div>

                <button type="submit" class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
<div class="footer text-center">
    <h5>Website bán phụ kiện thời trang - Nguyễn Thị Cẩm Tiên - Mã số sinh viên: 110121114<br>Copyright &copy; 2024
    </h5>
</div>
<style>
.footer {
    background-color: #D3D3D3;
    color: #000000;
    padding: 30px 0;
    font-size: 1.0rem;
    font-family: 'Poppins', sans-serif;
}
</style>