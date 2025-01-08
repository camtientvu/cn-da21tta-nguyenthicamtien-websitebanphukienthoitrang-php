<?php
if (!function_exists('insert_danhgia')) {
    function insert_danhgia($rating, $iduser, $idpro, $ngaydanhgia) {
        $sql = "INSERT INTO danhgia (danhgia, iduser, idpro, ngaydanhgia) VALUES ('$rating', '$iduser', '$idpro', '$ngaydanhgia')";
        pdo_execute($sql);
    }
}

if (!function_exists('load_danhgia')) {
    function load_danhgia($idpro) {
        $sql = "SELECT AVG(danhgia) as trungbinh, COUNT(*) as tongso FROM danhgia WHERE idpro = '$idpro'";
        return pdo_query_one($sql);
    }
}


function ktradanhgia ($idpro, $iduser)

{

    $sql = "SELECT * FROM hoadon,`chitiethoadon` WHERE hoadon.idhoadon=chitiethoadon.idhoadon and hoadon.iduser=$iduser and idpro=$idpro";
    return pdo_query_one($sql);
}

function ktradadanhgia ($idpro, $iduser)
{
    $sql = "SELECT * FROM danhgia WHERE iduser='$iduser' and idpro='$idpro'";
    return pdo_query_one($sql);
}
?>