<div class="container my-4">
    <div class="row">
        <div class="col-md-8">
            <div class="col-12">
                <div class="boxtitle text-center fw-bold py-3 bg-primary text-white">
                    GIỎ HÀNG
                </div>
            </div>

            <div class="boxcontent cart border rounded p-3 bg-light">
                <table class="table table-striped">
                    <?php
                    viewcart(1);
                    ?>

                </table>
            </div>

            <div class="row mb-3 mt-3">
                <?php
            // Kiểm tra nếu người dùng đã đăng nhập
            if (isset($_SESSION['user'])) {
                // Nếu đã đăng nhập, hiển thị nút tiếp tục đặt hàng
                echo '<div class="col-3"><a href="index.php?act=bill"><input type="submit"  class="btn btn-success w-60 btn-group" role="group"" value="TIẾP TỤC ĐẶT HÀNG"></a></div>';
            } else {
                // Nếu chưa đăng nhập, hiển thị yêu cầu đăng nhập hoặc đăng ký
                echo '<p>Vui lòng <a href="index.php?act=login">đăng nhập</a> hoặc <a href="index.php?act=register">đăng ký</a> để tiếp tục đặt hàng.</p>';
            }
            ?>
                <div class="col-6">
                    <a href="index.php?act=delcart"><input class="btn btn-danger w-60 " type="button"
                            value="XÓA GIỎ HÀNG"></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <?php include "view/boxright.php"; ?>
        </div>
    </div>
</div>