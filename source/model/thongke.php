<?php
function thongke_hoadon($from_date, $to_date, $trangthai = null, $khachhang = null)
{
    // Xây dựng câu truy vấn cơ bản
    $sql = "SELECT 
                hoadon.idhoadon, 
                hoadon.bill_name, 
                GROUP_CONCAT(CONCAT(sanpham.name, ' - Số lượng: ', chitiethoadon.soluong) SEPARATOR '<br> ') AS ten_sanpham_soluong, 
                hoadon.bill_address, 
                hoadon.bill_tel, 
                hoadon.bill_email, 
                hoadon.bill_pttt, 
                hoadon.ngaydathang, 
                hoadon.total, 
                hoadon.bill_status
            FROM 
                hoadon
            JOIN 
                chitiethoadon ON hoadon.idhoadon = chitiethoadon.idhoadon
            JOIN 
                sanpham ON chitiethoadon.idpro = sanpham.idpro
            WHERE 
                hoadon.ngaydathang BETWEEN '$from_date' AND '$to_date'";

    // Thêm điều kiện trạng thái đơn nếu có
    if ($trangthai !== null) {
        $sql .= " AND hoadon.bill_status = $trangthai";
    }

    // Thêm điều kiện khách hàng nếu có
    if ($khachhang !== null) {
        $sql .= " AND hoadon.iduser = $khachhang";
    }

    // Tiến hành nhóm các trường cần thiết
    $sql .= " GROUP BY 
                hoadon.idhoadon, 
                hoadon.bill_name,
                hoadon.bill_address,
                hoadon.bill_tel,
                hoadon.bill_email,
                hoadon.bill_pttt,
                hoadon.ngaydathang,
                hoadon.total,
                hoadon.bill_status
            ORDER BY 
                hoadon.ngaydathang ASC";

    // Sử dụng pdo_query để thực thi câu truy vấn và trả về kết quả
    return pdo_query($sql);
}

function listkhachhang()
{
    $sql="select * from taikhoan";
    $list_khachhang = pdo_query($sql);
    return $list_khachhang;
}



function thongke_tonkho()
{
    $sql = "SELECT 
    `idpro`, 
    `name`, 
    `price`, 
    `img`, 
    `mota`, 
    `luotxem`, 
    `iddm`, 
    `soluong`, 
    CASE 
        WHEN `soluong` = 0 THEN 'Hết hàng'
        WHEN `soluong` <= 5 THEN 'Sắp hết hàng' -- Thay đổi giá trị này tùy thuộc vào ngưỡng bạn định nghĩa là sắp hết
        ELSE 'Còn hàng'
    END AS `trangthai`
FROM 
    `sanpham`
ORDER BY 
    `soluong` ASC;
";
    $list_tonkho = pdo_query($sql);
    return $list_tonkho;
}