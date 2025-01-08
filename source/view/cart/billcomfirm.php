<div class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <div class="mb-4">
                <!-- Cảm ơn -->
                <div class="card mb-4 text-center">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">CẢM ƠN</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="text-success">Cảm ơn quý khách đã đặt hàng!</h2>
                    </div>
                </div>

                <!-- Thông tin đơn hàng -->
                <?php
        if(isset($bill)&&(is_array($bill))){
            extract($bill);
        }
            ?>
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">THÔNG TIN ĐƠN HÀNG</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group text-center">
                            <li class="list-group-item">- Mã đơn hàng: DAM-<?=$bill['idhoadon'];?></li>
                            <li class="list-group-item">- Ngày đặt hàng: <?=$bill['ngaydathang'];?></li>
                            <li class="list-group-item">- Tổng đơn hàng: <?=$bill['total'];?></li>
                            <li class="list-group-item">- Phương thức thanh toán: <?=$bill['bill_pttt'];?></li>
                        </ul>
                    </div>
                </div>

                <!-- Thông tin đặt hàng -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">THÔNG TIN ĐẶT HÀNG</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Người đặt hàng</td>
                                <td><?=$bill['bill_name'];?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?=$bill['bill_address'];?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?=$bill['bill_email'];?></td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td><?=$bill['bill_tel'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Chi tiết giỏ hàng -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-dark">
                        <h5 class="mb-0">CHI TIẾT GIỎ HÀNG</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <?php
                            bill_chi_tiet($billct);
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <?php include "view/boxright.php"; ?>
        </div>
    </div>
</div>