<div class="container my-4">
    <!--Cột trái-->
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">ĐƠN HÀNG CỦA BẠN</h5>
                </div>
                <div class="row boxcontent cart">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>MÃ ĐƠN HÀNG</th>
                                        <th>NGÀY ĐẶT</th>
                                        <th>SỐ LƯỢNG MẶT HÀNG</th>
                                        <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                                        <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                                        <th>HÀNH ĐỘNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    if (is_array($listbill)) {
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadall_cart_count($bill['idhoadon']);?>

                                    <tr>
                                        <td>DAM-<?=$bill['idhoadon']?></td>
                                        <td><?=$bill['ngaydathang']?></td>
                                        <td><?=loadall_cart_count($bill['idhoadon'])?></td>
                                        <td><strong><?=number_format($bill['total'])?></strong> VNĐ</td>
                                        <td><?=get_ttdh($bill['bill_status'])?></td>
                                        <td>

                                            <?php if ($bill['bill_status'] == 0): ?>
                                            <form id="cancelOrderForm" method="POST" action="">
                                                <input type="hidden" name="idhoadon" id="idhoadon"
                                                    value="<?=$bill['idhoadon']?>">



                                                <button type="submit" class="btn btn-danger">Hủy đơn</button>
                                            </form>

                                            <?php else: ?>
                                            <button class="btn btn-secondary" disabled>Không thể hủy</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php      }
                    }
                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cột phải-->
        <div class="col-md-4 boxphai">
            <?php include "view/boxright.php"; ?>
        </div>
    </div>
</div>