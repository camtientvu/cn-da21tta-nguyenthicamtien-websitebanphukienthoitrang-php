<div class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">
                        <!-- Nhúng Bootstrap Icons -->
                        <link rel="stylesheet"
                            href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
                        <!-- Biểu tượng cập nhật tài khoản -->
                        <i class="bi bi-person-gear"></i> CẬP NHẬT TÀI KHOẢN
                    </h5>
                </div>
                <div class="card-body">
                    <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
                    <form action="index.php?act=edit_taikhoan" method="post">
                        <!-- Nhúng Bootstrap -->
                        <link rel="stylesheet"
                            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-envelope-fill"></i>
                                <span class="text-dark">Email</span>
                            </label>
                            <input type="email" name="email" value="<?= $email ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-person-fill" style="color: black;"></i><span class="text-dark">Tên đăng
                                    nhập</span>
                            </label>
                            <input type="text" name="user" value="<?= $user ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-fill"></i>
                                <span class="text-dark">Họ tên</span></label>
                            <input type="text" name="hoten" value="<?= $hoten ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-geo-alt-fill" style="color: black;"></i> <span
                                    class="text-dark">Địa chỉ</span></label>
                            <input type="text" name="address" value="<?= $address ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-telephone-fill text-dark"></i> <span
                                    class="text-dark">Điện thoại</span></label>
                            <input type="text" name="tel" value="<?= $tel ?>" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="hidden" name="id" value="<?=$iduser?>">
                            <input type="submit" value="Cập nhật" name="capnhat" class="btn btn-success">
                            <input type="reset" class="btn btn-success" value="Nhập lại">
                        </div>
                    </form>
                    <h2 class="mt-3 fs-5 text-success text-center">
                        <?php

                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                    </h2>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <?php include "view/boxright.php"; ?>
        </div>
    </div>