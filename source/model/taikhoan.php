<?php
function loadall_taikhoan()
{
    $sql = "select*from taikhoan order by iduser desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into taikhoan(email,user,pass,trang_thai, role) values('$email','$user','$pass',N'Mở',3)";
    pdo_execute($sql);
}

function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where user='" . $user . "' AND pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkuserkhoa($user, $pass)
{
    $sql = "select * from taikhoan where trang_thai =N'Mở' AND user='" . $user . "' AND pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkuser1($user)
{
    $sql = "select * from taikhoan where user='" . $user . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkOTP($mail, $otp)
{
    $sql = "select * from taikhoan where  email='" . $mail . "' AND otp='" . $otp . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkuseremail($email)
{
    $sql = "select * from taikhoan where email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}


function update_taikhoan($id, $user, $hoten, $email, $address, $tel)
{
    $sql = "update taikhoan set user='" . $user . "',  hoten='".$hoten."',email='" . $email . "', address='" . $address . "', tel='" . $tel . "'  where iduser=" . $id;
    pdo_execute($sql);
}
function update_taikhoan1($email, $mk)
{

    $sql = "update taikhoan set  pass= '" . $mk . "'  where email='" . $email . "'";
    pdo_execute($sql);
}
function update_taikhoan2($email, $otp)
{

    $sql = "update taikhoan set  otp= '" . $otp . "'  where email='" . $email . "'";
    pdo_execute($sql);
}