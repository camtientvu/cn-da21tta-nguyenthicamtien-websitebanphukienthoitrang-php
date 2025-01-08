<div class="container mt-5">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH LOẠI HÀNG</h1>
    </header>

    <div class="card col-md-8 mx-auto shadow">
        <div class="card-body">
            <table class="table table-striped table-bordered align-middle">
                <thead class="bg-orange text-white">
                    <tr>
                        <th class="text-center" scope="col">Mã Loại</th>
                        <th class="text-center" scope="col">Tên Loại</th>
                        <th class="text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $suadm = "index_admin.php?act=suadm&id=" . $id;
                    $xoadm = "index_admin.php?act=xoadm&id=" . $id;

                    echo '<tr>
                                <td class="text-center">' . $id . '</td>
                                <td class="text-center">' . $name . '</td>
                                <td class="text-center">
                                <a href="' . $suadm . '"><i class="bi bi-pencil me-3" style="font-size: 12px; color: black;"></i></a>  <a href="' . $xoadm . '"><i class="bi bi-trash" style="font-size: 12px; color: black;"></i></a>
                                </td>
                            </tr>';
                }
                ?>

                </tbody>
            </table>
        </div>

        <div class="mb-3 text-center">
            <div class="col-12">
                <!-- <input type="button" class="btn btn-success" value="Chọn tất cả">
                <input type="button" class="btn btn-success" value="Bỏ chọn tất cả">
                <input type="button" class="btn btn-danger" value="Xóa các mục chọn"> -->
                <a href="index_admin.php?act=adddm"><input type="button" class="btn btn-success" value="Nhập thêm"></a>

            </div>
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
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">