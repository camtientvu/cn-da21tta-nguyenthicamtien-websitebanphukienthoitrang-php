<?php
session_start();
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";
include "model/danhgia.php"; 
include "Mail/guimail.php";


$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {


        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
if(isset($_SESSION['user']))
{
    
    update_xemsanpham($id);
    update_ndxemsp($id, $_SESSION['user']['iduser']);

}
                

                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass']; // Lấy mật khẩu chưa mã hóa để kiểm tra độ dài
                $hoten = $_POST['hoten'];

                // Biến để lưu thông báo lỗi
                $error = [];

                // Kiểm tra họ tên không được để trống
                if (empty($hoten)) {
                    $error[] = "Họ và tên không được để trống.";
                }

                if (empty($user)) {
                    $error[] = "Tên đăng nhập không được để trống.";
                } else {
                    // Kiểm tra tên đăng ký không được viết hoa
                    if ($user !== strtolower($user)) {
                        $error[] = "Tên đăng nhập không được viết hoa.";
                    }
                }


                // Kiểm tra email có đúng định dạng không
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error[] = "Email không đúng định dạng.";
                }

                // Kiểm tra mật khẩu phải từ 3 ký tự trở lên
                if (strlen($pass) < 6) {
                    $error[] = "Mật khẩu phải từ 6 ký tự trở lên.";
                }

                // Nếu không có lỗi nào, tiến hành đăng ký
                if (empty($error)) {

                    if ( checkuser1($user)>0)
                    {

                        $thongbao = "Đã tồn tại tên đăng nhập ";
                    }
                    else if (checkuseremail($email)>0)
                    {
                        $thongbao = "Đã tồn tại email ";
                    }
                    else
                    {
                        $pass = md5($pass); // Mã hóa mật khẩu bằng MD5
                   

                   
                        insert_taikhoan($email, $user, $pass, $hoten);
                        $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng bình luận hoặc đặt hàng!";
                    }
                    
                } else {
                    // Gộp các thông báo lỗi lại thành một chuỗi
                    $thongbao = implode("<br>", $error);
                }
            }
            include "view/taikhoan/dangky.php";
            break;


        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];

                // Kiểm tra nếu tên đăng nhập có ký tự viết hoa
                if ($user !== strtolower($user)) {
                    $thongbao = "Tên đăng nhập không được viết hoa. Vui lòng nhập lại tên đăng nhập bằng chữ thường!";
                } else { 

                $pass = md5($_POST['pass']);
                $checkuser = checkuser($user, $pass);
                $checkuserkhoa = checkuserkhoa($user, $pass);

                if (is_array($checkuser)) {
                    if(is_array($checkuserkhoa))
                    {
                        $_SESSION['user'] = $checkuser;
                    //$thongbao = "Bạn đã dăng nhập thành công!";
                    echo "<script>window.location.href = 'index.php';</script>";

                    }else
                    {
                        echo '<script>
    alert("Tài khoản bị khóa vui lòng liên hệ Amin mở khóa!");</script>';
                         echo "<script>window.location.href = 'index.php';</script>";
                    }
                    
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
                }
                }
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_taikhoan($id, $user, $hoten, $email, $address, $tel);
                $_SESSION['user'] = checkuser1($user);
                //header('Location: index.php?act=edit_taikhoan');
                $thongbao = "Đã Cập nhật tài khoản thành công!";
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;

        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $randomNumber = rand(100000, 999999);
                $checkemail = checkuseremail($email);
                if ($checkemail>0) {
                    sendmail($email, $randomNumber );
                    $mk= md5($randomNumber);
                    update_taikhoan1($email,$mk);
                    echo '<script>
            alert("Vui lòng kiểm tra mail của bạn để lấy mật khẩu!");
            window.location.href = "index.php?act=dangnhap"; // Chuyển hướng đến trang giỏ hàng
          </script>';
                   
                } else {
                    $thongbao = "Email này không tồn tại ";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;

            case 'doimk':
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $_SESSION['pass'] = $_POST['password'];
                    $email = $_SESSION['user']['email'];
                   
                    $otp=rand(100000, 999999);
                    update_taikhoan2($email,$otp);
                    sendmail($email, $otp);
                   
                    echo '<script>
                    alert("Vui lòng kiểm tra mail của bạn xác nhận mật khẩu!");
                    window.location.href = "index.php?act=xacnhanmk"; // Chuyển hướng đến trang giỏ hàng
                  </script>';
                       
                    } else {
                        $thongbao = "Nhập mật khẩu và xác nhận mã OTP ";
                    }
                
                include "view/taikhoan/doimk.php";
                break;

            case 'xacnhanmk':
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $otp= $_POST['otp'];
                    $email = $_SESSION['user']['email'];
                   
                    $checkOTP= checkOTP($email, $otp);
                    if ($checkOTP>0) {
                        update_taikhoan1($email,md5($_SESSION['pass']));
                        echo '<script>
                    alert("Đổi mật khẩu thành công!");
                    window.location.href = "index.php"; // Chuyển hướng đến trang giỏ hàng
                  </script>';

                    }
else{
    $thongbao = "Sai mã OTP. Vui lòng kiểm tra lại ";

}
                   
                    
                   
                  
                       
                    } else {
                        $thongbao = "Nhập mật khẩu và xác nhận mã OTP ";
                    }
                    
                    include "view/taikhoan/xacnhanmk.php";
                    break;

        case 'thoat':
            session_unset();
            //header('Location:index.php');
            echo "<script>window.location.href = 'index.php';</script>";
            break;



        case 'addtocart':
        
            if (!isset($_SESSION['user']))
            
            {
            echo '<script>
            alert("Bạn cần đăng nhập để thêm vào giỏ hàng!");
            window.location.href = "index.php?atc=dangnhap"; // Chuyển hướng đến trang giỏ hàng
          </script>';

         } else
            {

        
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];

                // Kiểm tra số lượng sản phẩm
                if (isset($_POST['soluong']) && ($_POST['soluong'] > 0)) {
                    $soluong = $_POST['soluong'];
                } else {
                    $soluong = 1; // Mặc định số lượng là 1
                }

                // Lấy số lượng có sẵn trong kho
                $stock_quantity = get_product_stock($id); // Hàm lấy số lượng trong kho

                // Kiểm tra nếu sản phẩm đã có trong giỏ
                if (isset($_SESSION['mycart'][$id])) {
                    // Sản phẩm đã có, kiểm tra số lượng có đủ không
                    if ($_SESSION['mycart'][$id]['SoLuong'] + $soluong <= $stock_quantity[0]['soluong']) {
                        // Tăng số lượng
                        $_SESSION['mycart'][$id]['SoLuong'] += $soluong;
                        $_SESSION['mycart'][$id]['ThanhTien'] = $_SESSION['mycart'][$id]['SoLuong'] * $_SESSION['mycart'][$id]['DonGia'];
                        echo '<script>
                        window.location.href = "index.php?act=viewcart"; // Chuyển hướng đến trang giỏ hàng
                      </script>';
                        exit(); // Dừng script sau khi chuyển hướng
                    } else {
                        echo '<script>
                        alert("Không đủ hàng trong kho!");
                        window.location.href = "index.php"; // Chuyển hướng đến trang giỏ hàng
                      </script>';
                        exit(); // Dừng script sau khi chuyển hướng
                    }
                } else {
                    // Sản phẩm chưa có, kiểm tra số lượng trước khi thêm mới
                    if ($soluong <= $stock_quantity[0]['soluong']) {
                        $_SESSION['mycart'][$id] = [
                            'MaSP' => $id,
                            'TenSP' => $name,
                            'HinhAnh' => $img,
                            'DonGia' => $price,
                            'SoLuong' => $soluong,
                            'ThanhTien' => $price * $soluong
                        ];
                        // header('Location: index.php?act=viewcart');
                    } else {
                        echo '<script>
                        alert("Không đủ hàng trong kho!");
                        window.location.href = "index.php"; // Chuyển hướng đến trang giỏ hàng
                      </script>';
                        exit(); // Dừng script sau khi chuyển hướng
                    }
                }
            }
        }
            echo '<script>
            
            window.location.href = "index.php"; // Chuyển hướng đến trang giỏ hàng
          </script>';
            break;

            case 'addcart1':
                if (isset($_SESSION['mycart'])) unset($_SESSION['mycart']);
                header('Location: index.php');
                break;


        case 'delcart':
            if (isset($_SESSION['mycart'])) unset($_SESSION['mycart']);
            header('Location: index.php');
            break;

        case 'deletecart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];

                foreach ($_SESSION['mycart'] as $key => $product) {
                    if ($product['MaSP'] == $idcart) {
                        // Giảm số lượng sản phẩm đi 1
                        $_SESSION['mycart'][$key]['SoLuong']--;
        
                        // Nếu số lượng về 0 thì xóa sản phẩm khỏi giỏ hàng
                        if ($_SESSION['mycart'][$key]['SoLuong'] <= 0) {
                            unset($_SESSION['mycart'][$key]);
                            // Đặt lại chỉ số của giỏ hàng để đảm bảo tính liên tục
                            $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                        } else {
                            // Cập nhật thành tiền khi số lượng giảm
                            $_SESSION['mycart'][$key]['ThanhTien'] = $_SESSION['mycart'][$key]['SoLuong'] * $_SESSION['mycart'][$key]['DonGia'];
                        }
        
                        // Thông báo xóa sản phẩm thành công
                        echo '<script>window.location.href = "index.php?act=viewcart";</script>';
                        break; // Thoát vòng lặp sau khi cập nhật
                    }
                }
            } else {
                // Thông báo nếu không tìm thấy mã sản phẩm
                echo '<script>alert("Mã sản phẩm không tồn tại trong giỏ hàng.");</script>';
                echo '<script>
            
                window.location.href = "index.php?act=viewcart"; // Chuyển hướng đến trang giỏ hàng
              </script>';
            }

            // Hiển thị lại trang giỏ hàng
            include "view/cart/viewcart.php";
            break;

        case 'viewcart':
            include "view/cart/viewcart.php";
            break;

        case 'bill':
            include "view/cart/bill.php";
            break;

        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['iduser'];
                else $id = 0;
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : '';
                $ngaydathang = date("Y/m/d");
                $tongdonhang = tongdonhang();
                //tạo bill
                $idbill = insert_bill($iduser, $hoten, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);

                //insert into cart: $session['mycart'] & idbill
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart(
                       
                        $cart['MaSP'],    // Mã sản phẩm
                        
                        $cart['DonGia'],   // Đơn giá
                        $cart['SoLuong'],  // Số lượng
                        $cart['ThanhTien'], // Thành tiền
                        $idbill            // ID hóa đơn
                    );
                }

                //xóa session cart
                unset($_SESSION['mycart']);
            }

            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/cart/billcomfirm.php";
            break;

        case 'mybill':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $idhoadon = $_POST['idhoadon']; // Mã hóa đơn
            
                try {
                    update_order_and_stock($idhoadon);
            
                    echo '<script>
                        alert("Hủy đơn hàng thành công và số lượng sản phẩm đã được cập nhật!");
                        window.location.href = "index.php?act=mybill";
                    </script>';
                } catch (Exception $e) {
                    echo '<script>
                        alert("Có lỗi xảy ra: ' . $e->getMessage() . '");
                        window.history.back();
                    </script>';
                }
            }
            
            $listbill = loadall_bill($_SESSION['user']['iduser']);
            include "view/cart/mybill.php";
            break;

        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";