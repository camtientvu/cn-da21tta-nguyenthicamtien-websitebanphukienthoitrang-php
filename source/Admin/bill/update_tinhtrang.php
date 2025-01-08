<?php
// Lấy thông tin đơn hàng dựa trên ID được truyền từ URL
if (isset($bill)) {
    extract($bill);
    $ttdh = get_ttdh($bill_status); // Lấy tình trạng đơn hàng hiện tại
}
?>
<div class="container mt-5">
    <div class="mb-4 text-center">
        <h1 class="fw-bold fs-3 text-primary">CẬP NHẬT TÌNH TRẠNG ĐƠN HÀNG</h1>
    </div>

    <!-- Form cập nhật tình trạng đơn hàng -->
    <div class="card col-md-8 mx-auto shadow">
        <div class="card-body">
            <form action="index_admin.php?act=update_tinhtrang" method="post">
                <input type="hidden" name="id" value="<?= $idhoadon ?>"> <!-- Ẩn ID của đơn hàng -->

                <!-- Chọn tình trạng đơn hàng -->
                <div class="mb-4">
                    <label for="status" class=" fw-bold form-label">Tình trạng đơn hàng</label>
                    <select name="status" class="form-select">
                        <option value="0" <?= $bill_status == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                        <option value="1" <?= $bill_status == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                        <option value="2" <?= $bill_status == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                        <option value="3" <?= $bill_status == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                        <option value="4" <?= $bill_status == 4? 'selected' : '' ?>>Hủy bỏ</option>
                    </select>
                </div>

                <!-- Nút cập nhật và quay lại -->
                <div class="mb-3 text-center">
                    <br><input class="btn btn-primary" type="submit" name="capnhat" value="Cập nhật">
                    <a href="index_admin.php?act=listbill"><input class="btn btn-secondary" type="button"
                            value="Quay lại danh sách"></a>
                </div>
            </form>
        </div>
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