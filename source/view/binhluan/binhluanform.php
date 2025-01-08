<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/danhgia.php"; // Thêm file xử lý đánh giá
if(isset($_REQUEST['idpro']))
{
    $idpro = $_REQUEST['idpro'];
    

$dsbl = loadall_binhluan($idpro);
    $danhgiasao = load_danhgia($idpro); // Lấy thông tin đánh giá của sản phẩm 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá sản phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .binhluan table {
        width: 60%;

    }

    .binhluan table {
        width: 100%;

    }

    .binhluan table td:nth-child(1) {
        width: 50%;
    }

    .binhluan table td:nth-child(2) {
        width: 20%;
    }

    .binhluan table td:nth-child(3) {
        width: 30%;
    }

    /* Style cho đánh giá sao */
    .star-rating {
        direction: rtl;
        display: inline-block;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 30px;
        color: #ddd;
        cursor: pointer;
    }

    .star-rating input:checked~label,
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #f5b301;
    }

    .binhluan {
        min-height: 50px;
    }
    </style>
</head>

<body>

    <div class="row mb">
        <div class="boxcontent2 boxcontent binhluan">
            <table>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr> <td>' . $user . '</td>
                    ';
                    echo '<td>' . $noidung . '</td>';
                   
                    echo '<td>' . $ngaybinhluan . '</td></tr>';
                }
                ?>
            </table>
            <div class="boxfooter2">
                <!-- Form gửi bình luận -->
                <?php
                     if (isset($_SESSION['user'])) {
                ?>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="idpro" value="<?= $idpro ?>"><br>
                    <input type="text" name="noidung" placeholder="Nhập nội dung bình luận" required>


                    <input type="submit" name="guibinhluan" value="Gửi">
                </form>


                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="star-rating">
                        <input type="radio" required name="rating" value="5" id="5"><label for="5">★</label>
                        <input type="radio" required name="rating" value="4" id="4"><label for="4">★</label>
                        <input type="radio" required name="rating" value="3" id="3"><label for="3">★</label>
                        <input type="radio" required name="rating" value="2" id="2"><label for="2">★</label>
                        <input type="radio" required name="rating" value="1" id="1"><label for="1">★</label>
                    </div>
                    <input type="hidden" name="idpro" value="<?= $idpro ?>">
                    <input type="submit" name="guidanhgia" value="Đánh giá">
                </form>
                <?php
                
                        $danhgiasao = load_danhgia($idpro);
                        if ($danhgiasao['tongso'] > 0) {
                             echo "<p>Đánh giá trung bình: " . round($danhgiasao['trungbinh'], 1) . "/5 (" . $danhgiasao['tongso'] . " đánh giá)</p>";
                        } else {
                            echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
                            
                        }
                    ?>

                <?php
                } else {
                    echo '<p>Vui lòng đăng nhập để bình luận và đánh giá.</p>';
                }
            ?>
            </div>
        </div>
        <?php }
        // Xử lý gửi bình luận
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            if (isset($_SESSION['user'])) {
                $noidung = $_POST['noidung'];
               
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['user']['iduser'];
                $ngaybinhluan = date("h:i:sa d/m/Y");
                insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "<script>alert('Bạn cần đăng nhập để bình luận!');</script>";
                header("Location: /login.php");
            }
        }

        // Xử lý gửi đánh giá sao
        if (isset($_POST['guidanhgia']) && ($_POST['guidanhgia'])) {

          
            if (isset($_SESSION['user'])) {

                $rating = $_POST['rating'];
                        $idpro = $_POST['idpro'];
                        $iduser = $_SESSION['user']['iduser'];
                        $ngaydanhgia = date("Y-m-d H:i:s");
                        
                if(ktradanhgia($idpro,$iduser)>0 )
                {
                    if(ktradadanhgia($_POST['idpro'],$_SESSION['user']['iduser'])>0)
                    {
                        echo "<script>alert('Bạn đã đánh giá sản phẩm rồi!');</script>";
                        header("Location: http://localhost/DACN/index.php");
                    }
                    else
                    {
                        
                       $sql= insert_danhgia($rating, $iduser, $idpro, $ngaydanhgia);
                        
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    }


                   
                }
                
                else
                {
                    echo "<script>alert('Bạn chưa mua sản phẩm!');</script>";
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            } else {
                echo "<script>alert('Bạn cần đăng nhập để đánh giá!');</script>";
                header("Location: /login.php");
            }
        }

        ?>
    </div>
</body>

</html>