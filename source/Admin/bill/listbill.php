<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH ĐƠN HÀNG</h1>
    </header>

    <!-- Bảng danh sách đơn hàng -->
    <div class="table-responsive">
        <table class="table border table-striped table-hover align-middle">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Khách Hàng</th>
                    <th scope="col">Gía Trị Đơn Hàng</th>
                    <th scope="col">Tình Trạng Đơn Hàng</th>
                    <th scope="col">Ngày Đặt Hàng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $suabill = "index_admin.php?act=suabill&id=" . $idhoadon;
                    $xoabill = "index_admin.php?act=xoabill&id=" . $idhoadon;
            
                    $kh=$bill["bill_name"].'
                    <br>'.$bill["bill_email"].'
                    <br>'.$bill["bill_address"].'
                    <br>'.$bill["bill_tel"];
                    $ttdh=get_ttdh($bill["bill_status"]);
                    $countsp=loadall_cart_count($bill["idhoadon"]);
                    $countspmua=loadall_cart_countsp($bill["idhoadon"]);
                    ?>
                <?php 
                if($ttdh=="Đã giao hàng")
                {
                    echo '<tr>
                                
                                <td>DAM-' . $bill['idhoadon']. '</td>
                                <td>' . $kh . '</td>
                                <td>' . number_format($bill["total"]) . '</strong> VNĐ</td>
                                <td>' . $ttdh. '</td>
                                <td>' . $bill["ngaydathang"]. '</td>
                                <td><a  disabled><i class="bi bi-pencil me-3" style="font-size: 12px; color: black;"></i></a> <a disabled"><i class="bi bi-trash" style="font-size: 12px; color: black;"></i></a></td>
                            </tr>';
                } else
                {
                    echo '<tr>
                                
                    <td>DAM-' . $bill['idhoadon']. '</td>
                    <td>' . $kh . '</td>
                    <td>' . number_format($bill["total"]) . '</strong> VNĐ</td>
                    <td>' . $ttdh. '</td>
                    <td>' . $bill["ngaydathang"]. '</td>
                    <td><a  href="' . $suabill . '"><i class="bi bi-pencil me-3" style="font-size: 12px; color: black;"></i></a> <a href="' . $xoabill . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa toàn bộ danh sách đơn hàng này không? Hành động này sẽ không thể hoàn tác và mọi dữ liệu liên quan sẽ bị mất vĩnh viễn.\')"><i class="bi bi-trash" style="font-size: 12px; color: black;"></i></a></td>
                </tr>';

                }
                
                


                     ?>
                <?php
                }
                ?>

            <tbody>
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
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">