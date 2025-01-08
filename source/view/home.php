<div class="container my-4">
    <div class="row">
        <!-- Left box (Banner & New Products) -->
        <div class="col-md-8">
            <!-- Banner Section -->
            <div class="mb-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="upload/banner1.jpg" class="d-block w-100" alt="Đồng Hồ Thông Minh">
                            <div class="carousel-caption d-none d-md-block text-white">
                                <h5>Đồng Hồ Thông Minh</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="upload/banner2.jpg" class="d-block w-100" alt="Túi Xách Gucci">
                            <div class="carousel-caption d-none d-md-block text-white">
                                <h5>Túi Xách Gucci Đẹp, Cực Sang Chảnh, Sành Điệu</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="upload/banner3.png" class="d-block w-100" alt="Nón Vành Rộng">
                            <div class="carousel-caption d-none d-md-block text-white">
                                <h5>Nón Vành Rộng Đi Biển</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- New Products Section -->
            <section>
                <h2 class="text-primary text-center mb-3">SẢN PHẨM MỚI</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <style>
                    /* Hiệu ứng hover cho ảnh sản phẩm */
                    .card-img-top {
                        transition: transform 0.3s ease, filter 0.3s ease;
                    }

                    .card:hover .card-img-top {
                        transform: scale(0.9);
                        /* Phóng to khi rê chuột */
                        filter: brightness(1.1);
                        /* Tăng độ sáng */
                    }
                    </style>
                    <?php





                    $i = 0;
                    foreach ($spnew as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $idpro;
                        $hinh = $img_path . $img;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        $danhgiasao = load_danhgia($idpro);
                        echo '<div class="col '.$mr.'">
                            <div class="card shadow-sm  h-100">
                                <a href="' . $linksp . '"><img src="' . $hinh . '" class="card-img-top" alt=""></a>
                                <div class="card-body">
                                    <a href="' . $linksp . '" class="card-text text-decoration-none fw-bold"">' . $name . '</a><br>
                                    Giá gốc: <h5 class="card-title"';
                                   
                                    if ($giamgia>0)
                                    {
                                      echo ' style ="text-decoration: line-through;" >' . number_format( $price ). ' VNĐ</h5>
                                        Giảm giá: <h5 class="card-title">' . number_format( $price -($price *$giamgia/100)). ' VNĐ</h5>';
                                    }
                                    else if($giamgia==0)
                                    {
                                        
                                        echo ' >'. number_format( $price ). 'VNĐ</h5>';
                                        
                                    }
                                    
                                    if ($danhgiasao['tongso'] > 0) {
                                        echo "<label>★" . round($danhgiasao['trungbinh'], 1) . "/5 </label>(" . $danhgiasao['tongso'] . " đánh giá)</p>";
                                   } else {
                                       echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
                                       
                                   }
                                    
                              echo' 
                                </div>'; 
                                
$price = isset($price) ? (int)$price : 0;
$giamgia = isset($giamgia) ? (int)$giamgia : 0;
$discountedPrice = $price - ($price * $giamgia / 100);

                                echo '
                                <div class="card-footer">
                                    <form action="index.php?act=addtocart" method="post" class="d-flex flex-column">
                                        <input type="hidden" value="' . $idpro . '" name="id">
                                        <input type="hidden" value="' . $name . '" name="name">
                                        <input type="hidden" value="' . $img . '" name="img">
                                        <input type="hidden" value="' . $discountedPrice. '" name="price">
                                    
                                        <input type="submit" name="addtocart" class="btn btn-primary btn btn-danger w-55 mb-2" value="Thêm vào giỏ hàng">
                                    </form>
                                        
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </section>
        </div>

        <!-- Right box (Sidebar) -->
        <div class="col-md-4">
            <?php include "boxright.php"; ?>
        </div>
    </div>
</div>

<style>
.star-rating {
    font-size: 30px;
    /* Kích thước sao */
    color: gold;
    /* Màu vàng */
}
</style>