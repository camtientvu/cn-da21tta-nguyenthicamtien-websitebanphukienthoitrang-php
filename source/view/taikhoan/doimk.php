<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">ĐỔI MẬT KHẨU</h5>
                </div>
                <div class="card-body">
                    <form action="index.php?act=doimk" method="post">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-envelope-fill"></i>
                                <span class="text-dark">Mật khẩu mới</span>
                            </label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Nhập mật khẩu mới của bạn">
                        </div>
                        <div class="d-flex gap-2">

                            <input type="submit" class="btn btn-success" value="Cập nhật" name="guiemail">


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