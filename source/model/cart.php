<?php
/*Xem giỏ hàng */
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    
    $xoasp_th = $del == 1 ? '<th>Thao Tác</th>' : '';
    $xoasp_td2 = $del == 1 ? '<td></td>' : '';

    echo '<tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Tình Trạng</th>
            ' . $xoasp_th . '
          </tr>';

    if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
        foreach ($_SESSION['mycart'] as $spadd) {
            $id = $spadd['MaSP']; // Use the correct key based on your session structure
            $hinh = $img_path . $spadd['HinhAnh'];
            $ttien = $spadd['DonGia'] * $spadd['SoLuong']; // Calculate total price
            $tong += $ttien;

            // Get product stock using product ID from the cart
            $stock_quantity = get_product_stock($id); // Fetch stock quantity

            $status = ($stock_quantity[0]['soluong'] > 0) ? 'Còn hàng' : 'Hết hàng'; // Determine status

            $xoasp_td = $del == 1 ? '<td><a href="index.php?act=deletecart&idcart=' . $id . '"><input type="button" class="btn btn-danger btn-sm" value="Xóa"></a></td>' : '';
            $giamsp_td = $del == 1 ? '<a href="index.php?act=deletecart&idcart=' . $id . '">
            <input type="button" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; font-size: 12px; width: 20px; padding: 5px 5px; border-radius: 4px;" value="-">
        </a>' : '';
        
        $tangsp_td = $del == 1 ? '<form action="index.php?act=addtocart" method="POST">
        <input type="hidden" value="' . $id . '" name ="id">
            <input type="submit" name="addtocart" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; width: 20px;font-size: 12px; padding: 5px 5px; border-radius: 4px;" value="+">
        </form>' : '';
        
            
            echo '<tr>
                    <td><img src="' . $hinh . '" alt="" height="50px"></td>
                    <td>' . $spadd['TenSP'] . '</td> <!-- Use the correct key for product name -->
                    <td>' .number_format( $spadd['DonGia'] ).'VNĐ</td> <!-- Use the correct key for price -->
                    <td class="text-center">' . $giamsp_td . '<br>' . $spadd['SoLuong'] . '<br>' . $tangsp_td . '</td> <!-- Use the correct key for quantity -->
                    <td>' . number_format($ttien) . 'VNĐ</td> <!-- Total price -->
                    <td>' . $status . '</td> <!-- Display stock status -->
                    ' . $xoasp_td . '
                  </tr>';
            $i++;
        }
    }




    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' .number_format( $tong) .'VNĐ</td>
            ' . $xoasp_td2 . '
          </tr>';
}


function get_product_stock($idsp)
{
    $sql = "SELECT soluong FROM sanpham WHERE idpro = '$idsp'"; // Use named parameter
    $listsoluong = pdo_query($sql);
    return $listsoluong;
}


/*chi tiết hóa đơn*/
function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    echo '<tr>
            <th>Hình</th>
            <th>Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>';

    foreach ($listbill as $spadd) {
        $hinh = $img_path . $spadd['img'];
        $tong += $spadd['tongtien'];
        echo ' <tr>
                    <td><img src="' . $hinh . '" alt="" height=50px"></td>
                    <td>' . $spadd['name'] . '</td>
                    <td>' . $spadd['price'] . '</td>
                    <td>' . $spadd['soluong'] . '</td>
                    <td>' . $spadd['tongtien'] . '</td>
                </tr>';
        $i++;
    }
    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td>' . $tong . '</td>
            </tr>';
}


function tongdonhang()
{
    $tong = 0;
    //echo var_dump($_SESSION['giohang']);
    //if ((isset($_SESSION['mycart'])) && (count($_SESSION['mycart']) > 0)) {
    foreach ($_SESSION['mycart'] as $spadd) {
        $ttien = $spadd['DonGia'] * $spadd['SoLuong']; // Calculate total price
        $tong += $ttien;
    }
    return $tong;
}

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into hoadon(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('.$iduser.','$name', '$email', '$address', '$tel','$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

/*
function insert_cart($iduser, $idpro, $img,$name, $price,$soluong, $thanhtoan, $idbill)
    {
        $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtoan,idbill) values('$iduser', '$idpro', '$img','$name', '$price','$soluong', '$thanhtoan', '$idbill'')";
        return pdo_execute($sql);
    }*/

function insert_cart( $idpro, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO chitiethoadon( idpro, price, soluong, tongtien, idhoadon) 
                VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $idpro,  $price, $soluong, $thanhtien, $idbill);
}

function update_order_and_stock($idhoadon) 
{
    // Lấy danh sách sản phẩm và số lượng từ chi tiết hóa đơn
    $sqlGetDetails = "SELECT idpro, soluong FROM chitiethoadon WHERE idhoadon = ?";
    $details = pdo_query($sqlGetDetails, $idhoadon);

    // Cập nhật lại số lượng sản phẩm trong bảng sản phẩm
    foreach ($details as $detail) {
        $idpro = $detail['idpro'];
        $soluong = $detail['soluong'];

        $sqlUpdateStock = "UPDATE sanpham SET soluong = soluong + ? WHERE idpro = ?";
        pdo_execute($sqlUpdateStock, $soluong, $idpro);
    }

    // Cập nhật trạng thái hóa đơn thành "Cancelled"
    $sqlUpdateStatus = "UPDATE hoadon SET bill_status = 4 WHERE idhoadon = ?";
    pdo_execute($sqlUpdateStatus, $idhoadon);
}


function loadone_bill($id)
{
    $sql = "select * from hoadon where idhoadon=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from chitiethoadon,sanpham where chitiethoadon.idpro=sanpham.idpro and idhoadon=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_cart_count($idbill)
{
    $sql = "select * from chitiethoadon where idhoadon=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function loadall_cart_countsp($idbill)
{
    $sql = "select sum(soluong) as tong from chitiethoadon where idhoadon=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($dk)
{
    $sql = "SELECT * FROM hoadon WHERE iduser like '%$dk%' or idhoadon like '%$dk%' or bill_name like '%$dk%'"; // Bắt đầu với điều kiện luôn đúng
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_bill1()
{
    $sql = "SELECT * FROM hoadon "; // Bắt đầu với điều kiện luôn đúng



    $listbill = pdo_query($sql,);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;

        case '1':
            $tt = "Đang xử lý";
            break;

        case '2':
            $tt = "Đang giao hàng";
            break;

        case '3':
            $tt = "Đã giao hàng";
            break;

        case '4':
            $tt = "Hủy bỏ";
            break;

        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}