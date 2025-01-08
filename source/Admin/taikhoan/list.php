<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH TÀI KHOẢN</h1>
        <!-- Nút Thêm Admin -->
        <div class="text-end mb-3">
            <a href="index_admin.php?act=them_admin" class="btn btn-success">Thêm Quản Lý</a>
        </div>
    </header>

    <div class="table-responsive">
        <table class="table border table-striped table-hover align-middle">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Tên Đăng Nhập</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Điện Thoại</th>
                    <th scope="col">Tên Vai Trò</th>
                    <th scope="col">Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $xoatk = "index_admin.php?act=xoatk&id=" . $iduser;
                ?>
                <tr>
                    <td><?= htmlspecialchars($user) ?></td>
                    <td><?= htmlspecialchars($hoten) ?></td>
                    <td><?= htmlspecialchars($email) ?></td>
                    <td><?= htmlspecialchars($address) ?></td>
                    <td><?= htmlspecialchars($tel) ?></td>
                    <td>
                        <?php
                        // Xác định vai trò dựa trên giá trị của $role
                        switch ($role) {
                            case '0':
                                echo 'Admin';
                                break;
                            case '1':
                                echo 'Quản lý';
                                break;
                            case '2':
                                echo 'Nhân viên';
                                break;
                            default:
                                echo 'Người dùng';
                                break;
                        }
                        ?>
                    </td>

                    <td><?= htmlspecialchars($trang_thai) ?></td>
                    <td>
                        <?php if ( $trang_thai === 'Mở'){ ?>
                        <!-- Nút xóa khi tài khoản là admin và trạng thái mở -->
                        <a href="<?= htmlspecialchars($xoatk) ?>&khoatk" class="text-decoration-none">
                            <i class="bi bi-trash" style="font-size: 12px; color: black;"></i>
                        </a>
                        <?php } if ($trang_thai === 'Khóa'){?>
                        <!-- Nút mở khi trạng thái là khóa -->
                        <a href="<?= htmlspecialchars($xoatk) ?>&motk" class="text-decoration-none">
                            <i class="bi bi-unlock" style="font-size: 12px; color: green;"></i>
                        </a>
                        <?php }?>
                    </td>
                </tr>
                <?php  }
                ?>

            </tbody>
        </table>
    </div>
</div>

<div class="footer text-center mt-3">
    <h5>Website bán phụ kiện thời trang - Nguyễn Thị Cẩm Tiên - Mã số sinh viên: 110121114<br>Copyright &copy; 2024</h5>
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