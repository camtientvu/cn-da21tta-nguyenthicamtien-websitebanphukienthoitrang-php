<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $soluong)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm,soluong) values('$tensp','$giasp','$hinh','$mota','$iddm','$soluong')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "delete from sanpham where idpro=" . $id;
    pdo_execute($sql);
}

function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by idpro desc limit 0, 6";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 5";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by idpro desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}


function loadone_sanpham($id)
{
    $sql = "select * from sanpham where idpro=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm=" . $iddm . " AND idpro <> " . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp,$giamgia, $mota, $hinh, $soluong)
{
    if ($hinh != "")
        $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "', giamgia='" . $giamgia . "', mota='" . $mota . "', soluong='" . $soluong . "', img='" . $hinh . "' where idpro=" . $id;
    else
        $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "', giamgia='" . $giamgia . "',  soluong='" . $soluong . "', mota='" . $mota . "' where idpro=" . $id;

    pdo_execute($sql);
}


function update_xemsanpham($id)
{
   
        $sql = "update sanpham set luotxem=luotxem+1 where idpro=" . $id;

    pdo_execute($sql);
}

function update_ndxemsp($id, $user) {
    // Kiểm tra nếu sản phẩm và người dùng đã tồn tại
    $sql_check = "SELECT * FROM luotxem WHERE idpro='$id' AND iduser='$user'";
    $exists = pdo_query_one($sql_check); // Giả sử pdo_query_value trả về giá trị đơn.

    if (is_array($exists)) {
        // Nếu đã tồn tại, cập nhật lượt xem
        $sql = "UPDATE luotxem SET luotxem = luotxem + 1 WHERE idpro='$id' AND iduser='$user'";
        
        pdo_execute($sql);
    } else {
        // Nếu chưa tồn tại, thêm mới
        $sql = "INSERT INTO luotxem (idpro, iduser, luotxem) VALUES ('$id', '$user', 1)";
        
        pdo_execute($sql);
    }
}



function delete_bill($id)
{
    $sql = "delete from hoadon where idhoadon=" . $id;
    pdo_execute($sql);
}