<div class="container my-4">
    <header class="mb-4">
        <h1 class="text-center fw-bold fs-3 text-primary">DANH SÁCH SẢN PHẨM</h1>
    </header>

    <div class="table-responsive">
        <table class="table border table-striped table-hover align-middle">
            <thead class="table-warning">
                <tr>
                    <th scope="col">Hình</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Số Lượng Tồn</th>
                    <th scope="col">Tình Trạng</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP để hiển thị dữ liệu sản phẩm -->
                <?php
// Giả sử bạn đã có biến $listtonkho chứa dữ liệu sản phẩm
foreach ($listtonkho as $product) {
    // Xử lý trạng thái sản phẩm
    if ($product['trangthai'] == "Còn hàng") {
        
        $statusClass = 'text-success'; // Màu xanh cho "Còn hàng"
    } elseif ($product['trangthai'] == "Sắp hết hàng") {
        
        $statusClass = 'text-danger'; // Màu đỏ cho "Sắp hết hàng"
    } else {
        
        $statusClass = 'text-secondary'; // Màu xám cho "Hết hàng"
    }

    // Hiển thị từng hàng trong bảng
    ?>
                <tr>
                    <td class='text-center'>
                        <img src='../upload/<?= htmlspecialchars($product['img']) ?>'
                            alt='<?= htmlspecialchars($product['name']) ?>' class='img-thumbnail'
                            style='max-width: 80px; height: auto;'>
                    </td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= htmlspecialchars($product['mota']) ?></td>
                    <td class='text-center'><?= $product['soluong'] ?></td>
                    <td class='text-center <?= $statusClass ?>'>
                        <?= htmlspecialchars($product['trangthai']) ?>
                        <?php if ($product['trangthai'] === "Sắp hết hàng") : ?>
                        <a href="thongke/phieunhap.php?idpro=<?=$product['idpro']?>" class="btn btn-warning btn-sm">Tạo
                            phiếu nhập</a>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php
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