<div class="container my-4">
    <div class="row">
        <!-- Cột trái chứa thông tin đặt hàng -->
        <div class="col-md-8">
            <form action="index.php?act=billcomfirm" method="post">
                <!-- Thông tin đặt hàng -->
                <div class="mb-4">
                    <h5 class="bg-primary text-white p-2">THÔNG TIN ĐẶT HÀNG</h5>
                    <div class="p-3 border">
                        <div class="mb-3">
                            <?php
                        if (isset($_SESSION['user'])) {
                            $hoten = isset($_SESSION['user']['hoten']) ? $_SESSION['user']['hoten'] : "";
                            $address = isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] : "";
                            $email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : "";
                            $tel = isset($_SESSION['user']['tel']) ? $_SESSION['user']['tel'] : "";
                        } else {
                            $hoten = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                        }

                        // Biến để kiểm tra thiếu thông tin
                        $missing_info = false;
                        $message = "";

                        if (empty($hoten) || empty($address) || empty($email) || empty($tel)) {
                            $missing_info = true;
                            $message = "Vui lòng cập nhật đầy đủ thông tin trước khi đặt hàng.";
                        }
                        ?>
                            <div class="mb-3">
                                <label class="form-label">Người đặt hàng</label>
                                <input type="text" class="form-control" name="hoten" placeholder="Nhập họ tên"
                                    value="<?= $hoten ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ"
                                    value="<?= $address ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Nhập email"
                                    value="<?= $email ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Điện thoại</label>
                                <input type="text" class="form-control" name="tel" placeholder="Nhập số điện thoại"
                                    value="<?= $tel ?>"></td>
                            </div>
                            <?php if ($missing_info): ?>
                            <div class="alert alert-danger">
                                <?= $message ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div><br>

                    <!-- Phương thức thanh toán -->
                    <div class="mb-4">
                        <h5 class="bg-primary text-white p-2">PHƯƠNG THỨC THANH TOÁN</h5>
                        <div class="p-3 border">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pttt" value="1">
                                <label class="form-check-label">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pttt" value="2">
                                <label class="form-check-label">Thanh toán Chuyển khoản</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pttt" value="3">
                                <label class="form-check-label">Thanh toán Online</label>
                            </div>
                        </div>
                    </div>

                    <!-- Thông tin giỏ hàng -->
                    <div class="mb-4">
                        <h5 class="bg-primary text-white p-2">THÔNG TIN GIỎ HÀNG</h5>
                        <div class="table-responsive border">
                            <table class="table table-striped table-bordered">
                                <?php viewcart(0); ?>
                            </table>
                        </div>
                    </div>

                    <!-- Nút xác nhận đơn hàng -->
                    <div class="mb-4 text-center">
                        <?php if (!$missing_info): ?>
                        <input class="btn btn-primary w-60 btn-group" type="submit" value="ĐỒNG Ý ĐẶT HÀNG"
                            name="dongydathang">
                        <?php else: ?>
                        <input type="button" class="btn btn-warning" value="CẬP NHẬT THÔNG TIN"
                            onclick="alert('Vui lòng cập nhật đầy đủ thông tin tài khoản để đặt hàng.')">
                        <?php endif; ?>
                    </div>
            </form>
        </div>
    </div>
    <!-- Cột phải chứa nội dung khác -->
    <div class="col-md-4">
        <?php include "view/boxright.php"; ?>
    </div>
</div>