<?php
session_start();
if (isset($_SESSION['user']) and $_SESSION['user']['role']!=1 and $_SESSION['user']['role']!=0){
    echo '<script>
    alert("Bạn không phải admin!");
    window.location.href = "../index.php"; 
  </script>';  
  exit;
} else 
{


include "../model/danhmuc.php";
include "../model/thongke.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/pdo.php";
include "../model/cart.php";
include "header.php";
include "footer.php";

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;

        case 'lisdm':
            $sql = "select * from danhmuc order by id desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "delete from danhmuc where id=" . $_GET['id'];
                pdo_execute($sql);
            }
            $sql = "select * from danhmuc order by name";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "select * from danhmuc where id=" . $_GET['id'];
                $dm = pdo_query_one($sql);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                $sql = "update danhmuc set name='" . $tenloai . "' where id=" . $id;
                pdo_execute($sql);
                $thongbao = "Cập nhật thành công";
            }
            $sql = "select * from danhmuc order by id desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

            /*controler sản phẩm*/

        case 'addsp':
            //kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }

                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $soluong);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            // var_dump($listdanhmuc);
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $giamgia = $_POST['giamgia'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp,$giamgia, $mota, $hinh, $soluong);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'dskh':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
            case 'them_admin':
                
                include "taikhoan/them.php";
                break;


        case 'dstk':
            if (isset($_POST['thongke'])) {
                $from_date = $_POST['from_date'];
                $to_date = $_POST['to_date'];

                // Nếu trạng thái đơn hàng không được chọn, gán giá trị null
    $trangthai = ($_POST['order_status'] === '') ? null : $_POST['order_status'];
    
    // Nếu người dùng không được chọn, gán giá trị null
    $khachhang = ($_POST['user'] === '') ? null : $_POST['user'];
    
    // Gọi hàm thống kê hóa đơn với các tham số
    $list_hoadon = thongke_hoadon($from_date, $to_date, $trangthai, $khachhang);
            }
$list_khachhang= listkhachhang();
            include "thongke/doanhthu.php";
            break;
        case 'tonkho':
            $listtonkho = thongke_tonkho();

            include "thongke/tonkho.php";
            break;

            /*Contrel bình luân*/
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;

        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "DELETE FROM binhluan WHERE idbinhluan=" . $_GET['id'];
                pdo_execute($sql);
            }
            $sql = "SELECT * FROM binhluan ORDER BY idbinhluan DESC"; // Lấy danh sách bình luận
            $listbinhluan = pdo_query($sql); // Lưu danh sách bình luận vào biến
            include "binhluan/list.php"; // Hiển thị danh sách bình luận
            break;


        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                if(isset($_GET['khoatk']))
                {
                    $sql = "UPDATE taikhoan SET trang_thai='Khóa' WHERE iduser=" . $_GET['id'];
                    echo '<script>
            alert("Khóa tài khoản thành công!");
            window.location.href = "index_admin.php?act=dskh"; // Chuyển hướng đến trang giỏ hàng
          </script>';
                }else if(isset($_GET['motk']))
                {
                    $sql = "UPDATE taikhoan SET trang_thai='Mở' WHERE iduser=" . $_GET['id'];
                    echo '<script>
            alert("Mở tài khoản thành công!");
            window.location.href = "index_admin.php?act=dskh"; // Chuyển hướng đến trang giỏ hàng
          </script>';
                }
                
                pdo_execute($sql);
            }
            $sql = "SELECT * FROM taikhoan ORDER BY iduser DESC"; // Lấy danh sách bình luận
            $listtaikhoan = pdo_query($sql); // Lưu danh sách bình luận vào biến
            include "taikhoan/list.php"; // Hiển thị danh sách bình luận
            break;


        case 'thongke':
            include "thongke/list.php";
            break;

            /*control listbill */
        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill($kyw); // Gọi hàm để lấy danh sách đơn hàng
            //if($listbill)
            // echo $kyw;
           
            include "bill/listbill.php"; // Hiển thị danh sách đơn hàng
            break;


        case 'dsdh':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill1();
            include "bill/listbill.php";
            break;


        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Thực hiện xóa đơn hàng với id được truyền từ URL
                $sql = "DELETE FROM hoadon WHERE idhoadon=" . $_GET['id']; // Chỉnh lại tên bảng nếu cần
                pdo_execute($sql);
            }
            $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
            $listbill = loadall_bill1(); // Tải lại danh sách đơn hàng sau khi xóa
            include "bill/listbill.php";
            break;

            case 'update_tinhtrang':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $status = $_POST['status']; // Tình trạng mới của đơn hàng
            
                    // Cập nhật tình trạng đơn hàng vào cơ sở dữ liệu
                    $sql = "UPDATE hoadon SET bill_status='" . $status . "' WHERE idhoadon=" . $id;
                    pdo_execute($sql);
            
                    // Nếu đơn hàng đã giao, cập nhật số lượng tồn kho
                    if ($status == 3) {
                        // Lấy danh sách sản phẩm trong đơn hàng
                        $sql = "SELECT idpro, soluong FROM chitiethoadon WHERE idhoadon=" . $id;
                        $products = pdo_query($sql);
            
                       
                        // Duyệt qua danh sách sản phẩm trong đơn hàng
                        foreach ($products as $product) {
                            $productId = $product['idpro'];
                            $quantity = $product['soluong'];
            
                            // Lấy số lượng tồn kho hiện tại của sản phẩm
                            $sql = "SELECT soluong FROM sanpham WHERE idpro=" . $productId;
                            $currentStock = pdo_query_one($sql);
            
                            // Cập nhật số lượng tồn kho
                            if ($currentStock) {
                                $newStock = $currentStock['soluong'] - $quantity;
            
                                // Đảm bảo số lượng không âm
                                if ($newStock < 0) {
                                    $newStock = 0;
                                }
            
                                // Cập nhật lại số lượng tồn kho trong cơ sở dữ liệu
                                $sql = "UPDATE sanpham SET soluong=" . $newStock . " WHERE idpro=" . $productId;
                                pdo_execute($sql);
                            }
                        }
                    }
            
                    $thongbao = "Cập nhật tình trạng đơn hàng thành công và đã cập nhật tồn kho.";
                }
            
                // Load lại danh sách đơn hàng sau khi cập nhật
                $listbill = loadall_bill1();
                include "bill/listbill.php";
                break;
            
            

        case 'suabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "SELECT * FROM hoadon WHERE idhoadon=" . $_GET['id'];
                $bill = pdo_query_one($sql);

                // Kiểm tra xem $bill có chứa dữ liệu không
                if (!$bill) {
                    echo "Không tìm thấy đơn hàng.";
                    exit;
                }
            } else {
                echo "ID không hợp lệ.";
                exit;
            }
            include "bill/update_tinhtrang.php";
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
}