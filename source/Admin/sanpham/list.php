<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH SẢN PHẨM</h1>
    </header>

    <!-- Form tìm kiếm sản phẩm -->
    <form action="index_admin.php?act=listsp" method="post" class="mb-4 d-flex align-items-center gap-3">
        <!-- <input type="text" value="kyw" class="form-control" placeholder="Nhập từ khóa tìm kiếm"> -->
        <select name="iddm" class="form-select">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="listok" class="btn btn-primary" value="Lọc">
    </form>

    <!-- Danh sách sản phẩm -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-warning text-center">
                <tr>
                    <th>MÃ Loại</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Lượt Xem</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index_admin.php?act=suasp&id=" . $idpro;
                    $xoasp = "index_admin.php?act=xoasp&id=" . $idpro;
                    $hinhpath = "../upload/" . $img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '<tr>
                                <td class="text-center">' . $idpro . '</td>
                                <td>' . $name . '</td>
                                <td class="text-center climg-tumbnail" style="max-width: 80px; height: auto;">' . $hinh . '</td>
                                <td class="text-end">' . number_format( $price ). ' VNĐ</td>
                                <td class="text-center">'.$luotxem.'</td>
                                <td class="text-center">
                                    <a href="' . $suasp . '"><i class="bi bi-pencil me-3" style="font-size: 12px; color: black;"></i></a> 
                                    <a href="' . $xoasp . '"><i class="bi bi-trash" style="font-size: 12px; color: black;"></i></a>
                                </td>
                            </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

    <div class="text-center mb-3">
        <!-- <input type="button" class="btn btn-secondary" value="Chọn tất cả">
        <input type="button" class="btn btn-secondary" value="Bỏ chọn tất cả">
        <input type="button" class="btn btn-danger" value="Xóa các mục chọn"> -->
        <a href="index_admin.php?act=addsp"><input class="btn btn-success" type="button" value="Nhập thêm"></a>

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