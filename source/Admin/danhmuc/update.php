<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </header>

    <div class="card shadow p-4">
        <form action="index_admin.php?act=updatedm" method="post">
            <div class="mb-3">

                <input type="hidden" class="form-control" name="maloai" disibled>
            </div>
            <div class="mb-3">
                <label for="tenloai" class="form-label">Tên loại</label><br>
                <input type="text" class="form-control" name="tenloai"
                    value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
            </div>
            <div class="d-flex gap-2">
                <input type="hidden" class="btn btn-success" name="id"
                    value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                <input type="submit" class="btn btn-success" name="capnhat" value="Cập nhật">
                <input type="reset" class="btn btn-success" value="Nhập lại">
                <a href="index_admin.php?act=lisdm"><input class="btn btn-success" type="button" value="Danh sách"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;
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