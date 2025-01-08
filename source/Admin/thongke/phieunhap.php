<?php

// Hàm kết nối với cơ sở dữ liệu
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=doanchuyennganh;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

// Hàm thực hiện câu truy vấn
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Hàm lấy thông tin sản phẩm theo id
function phieunhap($idpro)
{
    $sql = "SELECT * FROM sanpham WHERE idpro = ?";
    $list_sanpham = pdo_query($sql, $idpro);
    return $list_sanpham;
}

// Lấy id sản phẩm từ URL
$list_sanpham = phieunhap($_GET['idpro']); // Getting product details based on the id

// Thời gian để tạo tên file
$tg = time();

// Đặt header để tải file Word
header('Content-Type: application/msword');
header("Content-Disposition: attachment; filename=Phieu_de_nghi_nhap_hang_$tg.doc");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Đề Nghị Nhập Hàng</title>
    <style>
    body {
        font-family: 'Times New Roman', serif;
        margin: 0;
        padding: 20px;
        background-color: #f9f9f9;
        line-height: 1.6;
    }

    .container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 900px;
        margin: auto;
    }

    .header-text {
        text-align: center;
    }

    .header-text h2 {
        margin: 5px 0;
        font-size: 1.5rem;
        color: #333;
    }

    .header-text p {
        font-size: 1rem;
        color: #555;
    }

    .header-text hr {
        margin: 20px auto;
        border: none;
        border-top: 2px solid #4e73df;
        width: 20%;
    }

    .date-text {
        text-align: right;
        margin-top: 20px;
        font-style: italic;
        font-size: 0.9rem;
    }

    .info-section {
        margin-top: 20px;
        font-size: 1rem;
    }

    .info-section strong {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 1rem;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
        color: #333;
    }

    table .text-center {
        text-align: center;
    }

    .signature-section {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
    }

    .signature-section div {
        text-align: center;
        width: 45%;
    }

    .signature-section div p {
        margin-top: 20px;
        font-size: 0.9rem;
        font-style: italic;
    }

    .footer {
        text-align: center;
        margin-top: 50px;
        font-size: 0.9rem;
        color: #555;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-text">
            <h2>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
            <h4>Độc lập - Tự do - Hạnh phúc</h4>
            <hr>
            <div class="date-text">
                Trà Vinh, ngày .......... tháng .......... năm ..........
            </div>
            <h2>PHIẾU ĐỀ NGHỊ NHẬP HÀNG</h2>
        </div>

        <div class="info-section">
            <strong>Họ và tên:</strong>
            <p>...................................................................................................................
            </p>
        </div>

        <div class="info-section">
            <strong>Lý do nhập hàng:</strong>
            <p>.............................................................................................................................................
            </p>
            <p>.............................................................................................................................................
            </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng đề nghị</th>
                    <th>Thành tiền</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list_sanpham)): ?>
                <?php $stt = 1; ?>
                <?php foreach ($list_sanpham as $sanpham): ?>
                <tr>
                    <td class="text-center"><?= $stt++ ?></td>
                    <td><?= htmlspecialchars($sanpham['name']) ?></td>
                    <td class="text-center"><?= number_format($sanpham['price'], 0, ',', '.') ?> VNĐ</td>
                    <td class="text-center">100</td>
                    <td class="text-center"><?=number_format($sanpham['price']*100, 0, ',', '.')?>VNĐ</td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu sản phẩm.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <!-- Bảng ký tên -->
        <table style="border: none;">
            <tr style="border: none; text-align: center;">
                <td style="border: none; text-align: center;">
                    <strong style="text-align: center;">NGƯỜI DUYỆT</strong>
                    <p style="text-align: center;">(Ký, ghi rõ họ tên)</p>
                </td>
                <td style="border: none; text-align: center;">
                    <strong style="text-align: center;">NGƯỜI ĐỀ NGHỊ</strong>
                    <p style="text-align: center;">(Ký, ghi rõ họ tên)</p>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>