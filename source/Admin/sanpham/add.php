<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">THÊM MỚI SẢN PHẨM</h1>
    </header>
    <div class="card shadow">
        <div class="card-body">
            <form action="index_admin.php?act=addsp" method="post" enctype="multipart/form-data">
                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="productCategory" class="form-label fw-bold">
                        <i class="bi bi-folder-fill"></i> Danh Mục Sản Phẩm
                    </label><br>

                    <select name="iddm" class="form-select">
                        <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>

                    </select>
                </div>
                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        <i class="bi bi-tag-fill text-dark"></i> Tên Sản Phẩm
                    </label><br>

                    <input class="form-control" type="text" name="tensp">
                </div>
                <div class="row mb10">
                    <label class="form-label fw-bold">
                        <i class="bi bi-currency-dollar"></i> Giá Sản Phẩm (VNĐ)
                    </label>

                    <input class="form-control" type="text" name="giasp">
                </div>
                <div class="row mb10">
                    <label class="form-label fw-bold">
                        <i class="bi bi-basket-fill text-dark"></i> Số lượng
                    </label><br>
                    <input class="form-control" type="number" name="soluong">
                </div>
                <div class="row mb10">
                    <label class="form-label fw-bold">
                        <i class="bi bi-camera-fill text-dark"></i> Hình ảnh</label><br>
                    <input class="form-control" type="file" name="hinh">
                </div>
                <div class="row mb10">
                    <label class=" fw-bold"><i class="bi bi-pencil-square text-dark"></i> Mô Tả
                    </label><br>
                    <textarea class="form-control description-text" name="mota" rows="5"></textarea>
                </div>
                <!-- Nút hành động -->
                <div>
                    <input type="submit" name="themmoi" class="btn btn-primary" value="Lưu">
                    <input type="reset" class="btn btn-warning" value="NHẬP LẠI">
                    <a href="index_admin.php?act=listsp"><input class="btn btn-secondary" type="button"
                            value="DANH SÁCH"></a>
                </div>


                <!-- Thông báo -->
                <div class="text-success fw-bold">
                    <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;
            ?>
                </div>
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