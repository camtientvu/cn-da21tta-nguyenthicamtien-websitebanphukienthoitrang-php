<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">THÊM MỚI LOẠI HÀNG HÓA</h1>
    </header>

    <!-- Form thêm mới loại hàng -->
    <div class="card shadow p-4">
        <form action="index_admin.php?act=adddm" method="post">
            <div class="mb-3">
                <label for="tenloai" class="form-label fw-bold">Tên Loại</label><br>
                <input type="text" class="form-control" name="tenloai">
            </div>
            <div class="d-flex gap-2">
                <input type="submit" class="btn btn-primary" name="themmoi" value="Lưu">
                <input type="reset" class="btn btn-warning" value="Nhập Lại">
                <a href="index_admin.php?act=lisdm"><input class="btn btn-secondary" type="button"
                        value="Danh sách"></a>
            </div>
            <div class="text-success fw-bold">
                <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;
            ?>
            </div>
        </form>
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