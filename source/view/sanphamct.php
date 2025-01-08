<div class="container my-4">
    <div class="row">
        <!-- Cột trái: Chi tiết sản phẩm -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">SẢN PHẨM CHI TIẾT</h5>
                </div>
                <div class="card-body">
                    <?php extract($onesp); ?>
                    <h6 class="text-dark text-center card-title"><?= $name ?></h6>
                    <?php
                        $img = $img_path . $img;
                        echo '<div class="text-center mb-3"><img src="' . $img . '" class="img-fluid" alt="' . $name . '"></div>';
                        echo '<p>' . $mota . '</p>';
                    ?>
                </div>
                <?php 
                    $price = isset($price) ? (int)$price : 0;
                    $giamgia = isset($giamgia) ? (int)$giamgia : 0;
                    $discountedPrice = $price - ($price * $giamgia / 100);
                ?>
                <div class="card-footer">
                    <form action="index.php?act=addtocart" method="post" class="d-flex flex-column">
                        <input type="hidden" value="<?= $idpro ?>" name="id">
                        <input type="hidden" value="<?= $name ?>" name="name">
                        <input type="hidden" value="<?= $img ?>" name="img">
                        <input type="hidden" value="<?= $discountedPrice ?>" name="price">
                        <input type="submit" name="addtocart" class="btn btn-primary btn-danger w-100 mb-2"
                            value="Thêm vào giỏ hàng">
                    </form>
                </div>
            </div>

            <!-- BÌNH LUẬN & ĐÁNH GIÁ -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">BÌNH LUẬN & ĐÁNH GIÁ</h5>
                </div>
                <div class="card-body" id="binhluan">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        $("#binhluan").load("view/binhluan/binhluanform.php", {
                            idpro: <?= $id ?>
                        });
                    });
                    </script>
                </div>
            </div>

            <!-- SẢN PHẨM CÙNG LOẠI -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">SẢN PHẨM CÙNG LOẠI</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                            foreach ($sp_cung_loai as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=sanphamct&idsp=" . $idpro;
                                echo '<li class="list-group-item"><a class="text-decoration-none text-black" href="' . $linksp . '">' . $name . '</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Cột phải: Nội dung phụ -->
        <div class="col-md-4">
            <?php include "boxright.php"; ?>
        </div>
    </div>
</div>


<style>
img {
    max-width: 100%;
    height: auto;
}

.card-body {
    overflow: hidden;
    /* Ngăn nội dung tràn ra ngoài */
}
</style>