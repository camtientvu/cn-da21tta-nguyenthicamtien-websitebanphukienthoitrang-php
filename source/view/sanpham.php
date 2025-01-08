<?php
// Define the number of products per page
$products_per_page = 3; // Adjust this number as needed

// Get the total number of products
$total_products = count($dssp); // Assuming $dssp is an array of all products
$total_pages = ceil($total_products / $products_per_page); // Calculate total pages

// Get the current page from the URL, if not set, default to 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting index for the current page
$start_index = ($current_page - 1) * $products_per_page;

// Slice the product array to get the products for the current page
$dssp_current_page = array_slice($dssp, $start_index, $products_per_page);
?>
<style>
.pagination {
    justify-content: center;
    /* Center align pagination links */
    margin-top: 20px;
    /* Space above pagination */
}
</style>



<div class="container my-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="boxtitle ">
                <h2 class="text-primary text-center">SẢN PHẨM</h2>
                <h5>Danh mục: <?= $tendm ?></h2>
            </div>
            <div class=" row">
                <?php
                $i = 0;
                foreach ($dssp_current_page as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $idpro;
                    $hinh = $img_path . $img;
                    ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <a href="<?= $linksp ?>">
                            <img src="<?=$hinh?>" class="card-img-top" alt="' . $name . '">
                        </a>
                        <div class="card-body">
                            <a href="<?= $linksp ?>" class="card-text text-decoration-none fw-bold"><?= $name ?></a><br>

                            <?php if ($giamgia>0)
                                {?>

                            Giá gốc: <h5 class="card-title" style="text-decoration: line-through;">
                                <?=number_format( $price )?> VNĐ</h5>
                            Giảm giá: <h5 class="card-title"><?= number_format( $price -($price *$giamgia/100))?>'
                                VNĐ
                            </h5>

                            <?php } else {  ?>


                            Giá gốc: <h5 class="card-title">
                                <?=number_format( $price )?> VNĐ</h5>

                            <?php }?>

                            <div class="star-rating">
                                <label for="5">★</label>
                                <label for="4">★</label>
                                <label for="3">★</label>
                                <label for="2">★</label>
                                <label for="1">★</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="index.php?act=addtocart" method="post" class="d-flex flex-column">
                            <input type="hidden" value="<?= $idpro ?>" name="id">
                            <input type="hidden" value="<?= $name ?>" name="name">
                            <input type="hidden" value="<?= $img ?>" name="img">
                            <input type="hidden" value="<?=$price -($price *$giamgia/100) ?>" name="price">
                            <div class="card-body">
                                <input type="submit" name="addtocart"
                                    class="border btn btn-primary btn btn-danger w-100 mb-2" value="Thêm vào giỏ hàng">
                            </div>
                        </form>
                    </div>
                </div>
                <?php                   
                    $i += 1;
                }
                ?>
            </div>
            <div class="pagination">
                <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                <a href="index.php?act=sanpham&iddm=<?php echo $_GET['iddm']; ?>&page=<?php echo $page; ?>"
                    class="btn btn-outline-primary <?php echo ($page == $current_page) ? 'active' : ''; ?>">
                    <?php echo $page; ?>
                </a>
                <?php endfor; ?>
            </div>
        </div>
        <div class="col-md-4">
            <?php include "boxright.php"; ?>
        </div>
    </div>
</div>
<style>
.pagination {
    justify-content: center;
    /* Center align pagination links */
    margin-top: 20px;
    /* Space above pagination */
}

/* Hiệu ứng nhô lên cho sản phẩm */
.card {
    transition: transform 0.3s ease;
    /* Thay đổi hiệu ứng chuyển động */
}

.card:hover {
    transform: translateY(-10px) !important;
    /* Nhô lên 10px khi rê chuột */
}
</style>