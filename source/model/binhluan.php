<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idpro)
{
    $sql = "select * from binhluan, taikhoan, sanpham where binhluan.iduser=taikhoan.iduser and binhluan.idpro=sanpham.idpro";
    if ($idpro > 0) $sql .= " AND binhluan.idpro='" . $idpro . "'";
    $sql .= " order by idbinhluan desc";
    $listbl = pdo_query($sql);
    return $listbl;
}