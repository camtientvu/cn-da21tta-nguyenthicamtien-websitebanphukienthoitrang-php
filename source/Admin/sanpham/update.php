<?php
// Kiểm tra nếu form được submit với nút 'Cập nhật'
if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    $id = $_POST['id'];
    $iddm = $_POST['iddm'];
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $giamgia = $_POST['giamgia'];
    $mota = $_POST['mota'];
    $soluong = $_POST['soluong'];

    // Xử lý upload hình ảnh nếu có
    $hinh = $_FILES['hinh']['name'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

    // Nếu người dùng chọn ảnh mới, upload ảnh
    if ($hinh != "") {
        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
    } else {
        // Nếu không chọn ảnh, giữ nguyên ảnh cũ
        $hinh = $sanpham['img'];
    }

    // Gọi hàm update_sanpham để cập nhật thông tin sản phẩm
    update_sanpham($id, $iddm, $tensp, $giasp, $giamgia,$mota, $hinh, $soluong);

    // Thông báo thành công
    $thongbao = "Cập nhật thành công sản phẩm.";

    // Tải lại thông tin sản phẩm đã cập nhật
    $sanpham = loadone_sanpham($id);
    extract($sanpham);
}

// Hiển thị lại form với dữ liệu sản phẩm sau khi cập nhật
if (isset($sanpham) && is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>
<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">CẬP NHẬT SẢN PHẨM</h1>
    </header>
    <div class="card">
        <div class="card-body">
            <form action="index_admin.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <select name="iddm" id="" class="form-select">
                        <option value="0">Tất cả</option>
                        <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        $s = ($iddm == $danhmuc['id']) ? "selected" : "";
                        echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
                    }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-tag-fill text-dark"></i> Tên sản phẩm</label><br>
                    <input type="text" name="tensp" id="" class="form-control" value="<?= $name ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-basket-fill text-dark"></i> Số lượng</label><br>
                    <input type="text" name="soluong" id="" class="form-control" value="<?= $soluong ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-currency-dollar"></i> Giá Sản Phẩm (VNĐ)
                    </label><br>
                    <input type="text" name="giasp" id="" class="form-control" value="<?= $price ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-tags-fill text-dark"></i> Giảm giá</label><br>
                    <input type="text" name="giamgia" id="" class="form-control" value="<?= $giamgia ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-camera-fill text-dark"></i> Hình ảnh</label><br>
                    <input type="file" class="form-control" name="hinh">
                    <?= $hinh ?>
                </div>
                <div class="mb-3">
                    <label class=" fw-bold"><i class="bi bi-pencil-square text-dark"></i> Mô tả</label><br>
                    <textarea name="mota" cols="30" class="form-control" rows="10"><?= $mota ?></textarea>
                </div>
                <div>
                    <input type="hidden" name="id" id="" value="<?= $idpro ?>">
                    <input type="submit" name="capnhat" id="" class="btn btn-primary" value="Cập nhật">
                    <input type="reset" class="btn btn-secondary" value="Nhập lại">
                    <a href="index_admin.php?act=listsp"><input type="button" class="btn btn-success"
                            value="Danh sách"></a>
                </div>
                <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
            </form>
        </div>
    </div>
</div>
<div class="footer text-center">
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