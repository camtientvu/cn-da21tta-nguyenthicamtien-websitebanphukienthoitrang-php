<div class="container my-4 mb-3 d-flex flex-column">
    <div class="row justify-content-center flex-grow-1">
        <div class="col-lg-6 col-md-8 col-sm-12 form-container scrollable-container">
            <header class="mb-4">
                <h1 class="text-center fw-bold fs-3 text-primary">THỐNG KÊ</h1>
            </header>
            <form action="index_admin.php?act=dstk" method="POST">
                <!-- Thống kê theo ngày -->
                <div class="form-group mb-3">
                    <label for="from-date">From Date:</label>
                    <input type="date" id="from-date" name="from_date" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="to-date">To Date:</label>
                    <input type="date" id="to-date" name="to_date" required class="form-control">
                </div>

                <!-- Thống kê theo trạng thái đơn -->
                <div class="form-group mb-3">
                    <label for="order-status">Trạng thái đơn:</label>
                    <select id="order-status" name="order_status" class="form-control">
                        <option value="">Tất cả</option>
                        <option value="0">Đơn hàng mới</option>
                        <option value="1">Đang xử lý</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Hủy bỏ</option>
                    </select>
                </div>

                <!-- Thống kê theo người dùng -->
                <div class="form-group mb-3">
                    <label for="user">Người dùng:</label>
                    <select id="user" name="user" class="form-control">
                        <option value="">Tất cả</option>
                        <?php foreach ($list_khachhang as $khachhang) { ?>
                        <option value="<?=$khachhang['iduser']?>"><?=$khachhang['hoten']?></option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Nút submit -->
                <div class="form-group">
                    <button type="submit" name="thongke" class="btn btn-success w-100">Thống kê</button>
                </div>
            </form>
        </div>
    </div>


    <?php if (isset($list_hoadon) && count($list_hoadon) > 0): ?>
    <div class="statistics-result">
        <?php
    $total_amount = 0; // Initialize total amount variable
    $status_count = []; // Array to count bill statuses

   
        foreach ($list_hoadon as $hoadon) {
            $total_amount += $hoadon['total']; // Sum up the total from each bill

            // Count bill statuses
            $status = get_ttdh( $hoadon['bill_status']);
            if (!isset($status_count[$status])) {
                $status_count[$status] = 0;
            }
            $status_count[$status]++;
        }
    ?>
        <br>
        <h1 class="text-center fw-bold fs-3 text-primary">KẾT QUẢ THỐNG KÊ</h1>
        <!-- Add the chart -->
        <div class="chart-container my-4">
            <canvas id="statusChart"></canvas>
        </div>
        <table class="table table-striped table-bordered thongke">
            <thead>
                <tr>
                    <th>Hóa đơn</th>
                    <th>Tên hóa đơn</th>
                    <th>Sản phẩm</th>
                    <th>Tổng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_hoadon as $hoadon): ?>
                <tr>
                    <td>HD<?php echo $hoadon['idhoadon']; ?></td>
                    <td><?php echo $hoadon['bill_name']; ?></td>
                    <td><?php echo nl2br($hoadon['ten_sanpham_soluong']); ?></td>
                    <td><?php echo number_format($hoadon['total']); ?> VND</td>
                    <td><?php echo $hoadon['ngaydathang']; ?></td>
                    <td><?php echo get_ttdh($hoadon['bill_status']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Display the total amount -->
        <div class="total-amount fs-5 fw-bold text-end">
            <strong class="fs-5 fw-bold">Tổng cộng:</strong> <?php echo number_format($total_amount, 2, ',', '.'); ?>
            VNĐ
        </div>
    </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <p>Không tìm thấy dữ liệu.</p>
    <?php endif; ?>
</div>

<!-- Footer Section -->
<div class="footer text-center mt-3">
    <h5>Website bán phụ kiện thời trang - Nguyễn Thị Cẩm Tiên - Mã số sinh viên: 110121114<br>Copyright &copy; 2024</h5>
</div>

<style>
.chart-container {
    max-width: 400px;
    margin: auto;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
// Prepare data for the chart
const statusData = <?php echo json_encode(array_values($status_count)); ?>;
const statusLabels = <?php echo json_encode(array_keys($status_count)); ?>;

// Create the pie chart
const ctx = document.getElementById('statusChart').getContext('2d');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusData,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#F44336'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                        const value = context.raw;
                        const percentage = ((value / total) * 100).toFixed(2);
                        return `${context.label}: ${value} (${percentage}%)`;
                    }
                }
            },
            datalabels: {
                formatter: (value, ctx) => {
                    const total = ctx.dataset.data.reduce((sum, val) => sum + val, 0);
                    const percentage = ((value / total) * 100).toFixed(2);
                    return `${percentage}%`;
                },
                color: '#fff',
                font: {
                    weight: 'bold'
                }
            }
        }
    },
    plugins: [ChartDataLabels]
});
</script>

<style>
.container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    /* Đảm bảo toàn bộ chiều cao trang sẽ được sử dụng */
}

.statistics-result {
    margin-bottom: 50px;
    /* Khoảng cách giữa thống kê và footer */
    flex-grow: 1;
    /* Giúp phần thống kê chiếm hết không gian còn lại */
}

.footer {
    background-color: #D3D3D3;
    color: #000000;
    padding: 30px 0;
    font-size: 1.0rem;
    font-family: 'Poppins', sans-serif;
    margin-top: auto;
    /* Đảm bảo footer luôn ở dưới cùng */
}
</style>