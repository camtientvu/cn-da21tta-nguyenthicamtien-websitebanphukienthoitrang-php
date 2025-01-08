<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH TÀI KHOẢN</h1>
    </header>

    <!-- Nội dung danh sách -->
    <div class="table-responsive mb-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-warning boder">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nội Dung</th>
                    <th scope="col">Người dùng</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Ngày Bình Luận</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                   
                    $xoabl = "index_admin.php?act=xoabl&id=" . $idbinhluan;

                    echo '<tr>
                                <td>' . $idbinhluan . '</td>
                                <td>' . $noidung . '</td>
                                <td>' . $hoten . '</td>
                                <td>' . $name . '</td>
                                <td>' . $ngaybinhluan . '</td>              
                                <td> <a href="' . $xoabl . '"><i class="bi bi-trash" style="font-size: 12px; color: black;"></a></td>
                            </tr>';
                }
                ?>

            </tbody>
        </table>
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