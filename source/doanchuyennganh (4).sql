-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2025 lúc 04:07 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanchuyennganh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbinhluan` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbinhluan`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(41, 'oke man', 64, 75, '04:41:41pm 01/12/2024'),
(42, 'Xau', 64, 72, '03:13:08pm 23/12/2024'),
(43, 'Sản phẩm đẹp, giá cả hợp lý', 69, 74, '03:46:06am 30/12/2024'),
(44, 'Đẹp quá', 64, 74, '03:47:48am 30/12/2024'),
(45, 'Sản phẩm chất lượng', 64, 74, '05:10:21pm 30/12/2024'),
(46, 'hello', 69, 73, '03:39:39pm 03/01/2025'),
(47, 'sản phẩm kém', 69, 73, '03:40:06pm 03/01/2025');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idcthoadon` int(10) NOT NULL,
  `idhoadon` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `tongtien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idcthoadon`, `idhoadon`, `idpro`, `price`, `soluong`, `tongtien`) VALUES
(131, 152, 70, 240000, 1, 240000),
(132, 153, 75, 485000, 3, 1455000),
(133, 153, 74, 2000000, 4, 8000000),
(134, 153, 72, 750000, 1, 750000),
(135, 154, 74, 2000000, 5, 10000000),
(137, 155, 74, 2000000, 1, 2000000),
(138, 156, 74, 2000000, 2, 4000000),
(139, 156, 73, 2990000, 1, 2990000),
(140, 157, 74, 2000000, 2, 4000000),
(141, 157, 73, 2990000, 1, 2990000),
(142, 158, 74, 2000000, 1, 2000000),
(143, 159, 74, 2000000, 1, 2000000),
(144, 160, 74, 2000000, 1, 2000000),
(145, 161, 75, 485000, 1, 485000),
(146, 162, 74, 2000000, 1, 2000000),
(147, 163, 73, 2990000, 1, 2990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `danhgia` int(11) NOT NULL,
  `ngaydanhgia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`idpro`, `iduser`, `danhgia`, `ngaydanhgia`) VALUES
(70, 64, 4, '2024-12-30 03:47:58'),
(72, 64, 3, '2024-12-23 15:12:39'),
(73, 69, 5, '2025-01-03 15:43:04'),
(74, 64, 4, '2024-12-30 03:47:30'),
(74, 69, 5, '2024-12-30 03:46:20'),
(75, 64, 3, '2024-12-23 15:40:34'),
(75, 68, 5, '2024-12-01 16:26:59'),
(76, 64, 4, '2024-12-01 15:53:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(39, 'Túi Xách'),
(40, 'Đồng Hồ'),
(52, 'Mắt kính'),
(54, 'Nón Nữ ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán trực tiếp 2.Chuyển khoản 3.Thanh toán online',
  `ngaydathang` date DEFAULT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0.Đơn hàng mới 1.Đang xử lý 2.Đang giao hàng 3.Đã giao hàng 4.Hủy bỏ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `total`, `bill_status`) VALUES
(150, 64, 'Admin123', 'TP', '0348521000', 'admin@gmail.com', 1, '2024-12-01', 1000000, 3),
(152, 64, 'Admin123', 'TP', '0348521000', 'admin@gmail.com', 1, '2024-12-09', 240000, 3),
(153, 64, 'Admin', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 'camtien@gmail.com', 1, '2024-12-18', 10205000, 4),
(154, 64, 'Admin', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 'camtien@gmail.com', 1, '2024-12-25', 10000000, 3),
(155, 64, 'Admin', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 'camtien@gmail.com', 0, '2024-12-05', 3000000, 4),
(156, 69, 'Nguyễn Thị Cẩm Tiên', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898111', 'nguyenthicamtien16102001@gmail.com', 0, '2024-12-13', 6990000, 0),
(157, 69, 'Nguyễn Thị Cẩm Tiên', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898111', 'nguyenthicamtien16102001@gmail.com', 1, '2024-12-26', 6990000, 0),
(158, 64, 'Admin', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 'camtien@gmail.com', 1, '2024-12-03', 2000000, 4),
(159, 64, 'Admin', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 'camtien@gmail.com', 1, '2024-12-31', 2000000, 0),
(160, 70, 'Nguyễn Quốc Cường', '106 Nguyễn Thiện Thành', '0969898713', 'cuong@gmail.com', 1, '0000-00-00', 2000000, 0),
(161, 70, 'Nguyễn Quốc Cường', '106 Nguyễn Thiện Thành', '0969898713', 'cuong@gmail.com', 1, '0000-00-00', 485000, 0),
(162, 70, 'Nguyễn Quốc Cường', '106 Nguyễn Thiện Thành', '0969898713', 'cuong@gmail.com', 1, '2025-01-01', 2000000, 0),
(163, 69, 'Nguyễn Thị Cẩm Tiên', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898111', 'nguyenthicamtien16102001@gmail.com', 1, '2025-01-03', 2990000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luotxem`
--

CREATE TABLE `luotxem` (
  `idpro` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `luotxem`
--

INSERT INTO `luotxem` (`idpro`, `iduser`, `luotxem`) VALUES
(67, 69, 1),
(70, 69, 1),
(73, 69, 21),
(75, 64, 3),
(75, 69, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idpro` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) DEFAULT 0.00,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `iddm` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idpro`, `name`, `price`, `img`, `mota`, `iddm`, `soluong`, `luotxem`, `giamgia`) VALUES
(63, 'Mũ đi biển | Màu hồng', 70000.00, 'Mũ đi biển.jpg', 'Năm nào cũng cháy hàng các loại mũ cói đi biển, cứ vào mùa là thấy mẫu nào cũng hot, cũng cháy dk :D.\r\n Nay kho nhờ xả giúp, e ôm liền báo giá sốc luôn để CE tranh thủ ủ trước cho rẻ nhé .\r\nMŨ CÓI ĐI BIỂN có nơ gắn hoa đại cực độc luôn nha CE.\r\nSắp tới mùa đi biển rồi, xưởng xả kho giá sốc, CE ủ dần 1-2 chiếc, vào mùa e đảm bảo ko bao h mua được giá hời như thế này luôn ạ!.\r\nChe nắng đi chơi đi biển, đặc biệt gấp gọn lại được, thoải mái bỏ túi và vali mang theo nha ????????????\r\nChưa kể có 1 em sống ảo cho chất nữa .\r\nGIÁ SỐC CHỈ 70k/CHIẾC \r\nSẴN MÀU: HỒNG.', 54, 10, 12, 0),
(64, 'Mũ bucket trơn vành cụp unisex nữ | Màu be', 140000.00, 'Mũ bucket trơn vành cụp Capman Club, nón bo tròn unisex nữ.jpg', 'THÔNG TIN SẢN PHẨM :\r\n- Chất liệu vải : kaki\r\n- Xuất xứ: Việt Nam\r\n- Kiểu nón: Mũ Bucket\r\n- Loại phụ kiện: Hats\r\n- Không gây kích ứng da đầu, không ra màu.\r\n- Size: freesize, vòng đầu 52-58cm .\r\n-  Gửi từ: Trà Vinh', 54, 10, 0, 20),
(66, 'Mũ Lưỡi Trai Nữ | Màu trắng', 50000.00, 'mu-luoi-trai-cho-nu-ca-tinh.jpg', '- Nón Lưỡi Trai Phong Cách Cá Tính Form Unisex  Nữ \r\n- Bảo Hành 12 Tháng.\r\n- Màu: Trắng', 54, 10, 1, 0),
(67, 'Kính mát nữ, kiếng mắt mèo thời trang nữ nhiều màu chống tia uv400 có hộp | Màu đỏ', 38000.00, 'Kính mát nữ, kiếng mắt mèo thời trang nữ nhiều màu chống tia uv400 có hộp.jpg', '* Thông tin sản phẩm Gọng kính mắt nữ :\r\n• Gọng kính : Gọng Acetate nhựa cao cấp\r\n(được đệm lớp kim loại bên trong càng kính – độ bền cao – không kích ứng)\r\n• Mắt kính : Mắt kính phân cực hạt polycacbon cao cấp ,chống tia uv 400\r\n• Kính thước : - Mắt kính : 63mm  - Cầu kính : 16mm  - Càng kính: 144mm\r\n• Màu sắc: Đen, Đỏ, Trắng\r\n• Quy cách sản phẩm : 01 kính, 01 hộp kính, 01 khăn lau.\r\n-Tặng kèm : VÉ BÓC THĂM TRÚNG GIẢI 1 TRIỆU ĐỒNG .\r\n(1 tháng chỉ phát hành 1000 phiếu. nên nếu hết ae thông cảm nhé).\r\n* QUY ĐỊNH BẢO HÀNH : Kính mát nữ.\r\n • Thời gian bảo hành: 06 tháng .\r\n • Đổi trả trong 30 ngày nếu hàng bị lỗi bất kỳ.\r\n • BẢO HÀNH 1 ĐỔI 1 LÀ BẢO HÀNH ĐỔI NGAY CHIẾC MỚI ko cần đợi sửa.\r\n • Bảo hành online dựa vào ngày nhận hàng trên đơn hàng shopee ghi nhận.\r\n\r\n', 52, 10, 2, 0),
(68, 'Kính mắt gọng chữ D màu đen siêu hot', 500000.00, 'Kính mắt gọng chữ D màu đen siêu hot.jpg', 'Kính râm chữ D Khung vuông cổ điển Thời trang Lái xe Unisex.                  \r\n- Tính năng-Retro, Khung vuông, Thiết kế chữ D, Thời trang, Unisex, Miếng đệm mũi thoải mái, Đền cong, Bản lề gia cố\r\n-Có Một cặp kính râm mang phong cách thời trang và đơn giản với thiết kế chữ D và gọng vuông.\r\n-Sản Phẩm này thích hợp để lái xe, đi nghỉ, dự tiệc, du lịch, mua sắm, v.v.\r\nĐặc điểm kỹ thuật\r\nChất liệu: PC\r\nChiều rộng ống kính: 64mm\r\nChiều cao khung: 57mm\r\nKhoảng cách cầu mũi: 19mm\r\nChiều dài đền: 150mm\r\nGói bao gồm\r\n1 cặp kính râm\r\nKhông có hộp bán lẻ. Đóng gói an toàn trong túi OPP.', 52, 20, 0, 0),
(69, 'Kính mát thời trang Âu Mỹ màu đen siêu hot', 750000.00, 'Kính mát thời trang Âu Mỹ màu đen siêu hot.jpg', ' Giới thiệu cửa hàng:\r\nChào mừng đến với cửa hàng của chúng tôi.\r\nChúng tôi sẽ cung cấp cho bạn danh sách cập nhật hàng ngày mỗi ngày để theo dõi xu hướng thời trang, đồng bộ hóa thời trang, chú ý đến thời trang mới nhất của chúng tôi, hãy chú ý đến chúng tôi, và bạn sẽ tiếp tục theo dõi!.\r\n Kích thước:\r\n(Nếu Không có kích thước, vui lòng tham khảo chiều dài của hiệu ứng mô hình trong hình ảnh) Do các phép đo khác nhau, cho phép sử dụng sai số 3-5 CM, và lỗi không phải là lỗi Vấn đề chất lượng!\r\nBằng cách cài đặt ánh sáng và màu màn hình, màu sắc của sản phẩm có thể hơi khác so với hình ảnh. Vui lòng tham khảo sản phẩm thực tế!.\r\nNói chung, thời gian chuyển đơn hàng là 4 giờ.\r\nNó sẽ đến trong vòng 5-7 ngày và cần bảo trì. Đối với các đơn đặt hàng khẩn cấp, xin vui lòng đặt hàng một cách thận trọng!.', 52, 3, 24, 0),
(70, 'Kính râm mát thời trang nam nữ phong cách hàn quốc màu trắng ', 300000.00, 'Kính râm mát thời trang nam nữ phong cách hàn quốc màu trắng .jpg', 'Kính râm mát thời trang nữ nam phong cách retro Hàn Quốc mắt kính chống tia UV400 đi chơi biển chụp ảnh đẹp giá rẻ. \r\n✔ Mắt kính kiểu dáng thời trang, sành điệu là phụ kiện thời trang dành cho cả nam và nữ. \r\n✔ Thiết kế vừa vặn với khuôn mặt của bạn và mang lại cảm giác dễ chịu khi sử dụng.\r\n ✔Màu sắc đa dạng - Kích thước phù hợp cho mọi đối tượng .\r\n✔ Gọng kính cực kỳ PHONG CÁCH .\r\n✔ Form kính ôm vào sống mũi làm nổi bật mũi cao .\r\n✔ Kính gọng nhiều kiểu: vuông - tròn sang trọng .\r\n✔ Phù hợp với phần lớn tất cả các gương mặt (Tròn, trái xoan…) .\r\n✔ Cực kỳ sành điệu, cực kỳ phong cách - Kiểu dáng đa dạng, màu sắc phong phú.', 52, 103, 3, 20),
(71, 'Kính thời trang cho nữ màu đen sang trọng', 139000.00, 'Kính thời trang cho nữ màu đen sang trọng.jpg', '- Tên sản phẩm: KÍNH THỜI TRANG CHO NỮ MÀU ĐEN SANG TRỌNG\r\n- Phong cách: Unisex\r\n- Chất liệu: Khung kim loại cao cấp\r\n- Công dụng: Bảo VỆ UV400 CHO ĐÔI MẮT CỦA BẠN', 52, 10, 5, 0),
(72, 'Đồng hồ thông minh H Watch series 7 phiên bản thép không gỉ sang trọng', 1500000.00, 'Đồng hồ thông minh H Watch series 7.jpg', '- Bộ đồng hồ thép không gỉ + dây thép không gỉ\r\n\r\n- Bộ đế sạc nam châm cao cấp \r\n\r\n- Tặng 1 dây cao su cao cấp đi kèm trị giá 100k\r\n\r\n- Tặng củ sạc 3 chân 5w để sạc an toàn giúp tuổi thọ pin đồng hồ được bền hơn.\r\n\r\n- Phiếu bảo hành sản phẩm', 40, 22, 10, 50),
(73, 'Apple Watch Series5 Nhôm', 2990000.00, 'Apple Watch Series5 Nhôm.jpg', 'Tính năng màn hình luôn hiển thị (Always-on) giúp bạn xem giờ và thông báo tiện lợi bất cứ lúc nào. Khi không quan sát, đồng hồ sẽ tự giảm độ sáng xuống để tiết kiệm pin.  Màn hình trên Apple Watch S5 44mm sử dụng tấm nền OLED cao cấp, tiết kiệm pin hơn.', 40, 29, 25, 0),
(74, 'Túi Gucci ong', 2000000.00, 'banner2.jpg', 'Túi xách Gucci Queen Margaret GG siêu cấp kiểu cách tay, đeo chéo hoặc đeo vai  chất liệu vải casvan viền da cao cấp bền bỉ chắc túi. Túi chuẩn fom đầy đủ logo của hãng thời trang, túi bao gồm hộp hóa đơn thẻ cực sịn sò. Hàng víp chất lượng cực đẹp.', 39, 54, 50, 0),
(75, 'Túi đeo chéo màu đen thời trang phong cách mới', 485000.00, 'Túi đeo chéo màu đen thời trang phong cách mới.jpg', 'Túi xách nữ vuông nhỏ thời trang\r\n-Kích thước túi: Chiều rộng 22cm, cao 14cm, dày 8cm\r\n-Trọng lượng túi: 0.45kg\r\n- Chất liệu: Da PU\r\n-Xuất xứ: Quảng Châu', 39, 26, 132, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `iduser` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `trang_thai` varchar(50) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`iduser`, `user`, `pass`, `hoten`, `email`, `address`, `tel`, `role`, `trang_thai`, `otp`) VALUES
(64, 'quanly', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thị Lý', 'quanly@gmail.com', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898713', 1, 'Mở', 0),
(69, 'tien', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thị Cẩm Tiên', 'nguyenthicamtien16102001@gmail.com', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0969898111', 3, 'Mở', 173621),
(76, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'admin@gmail.com', '106 Nguyễn Thiện Thành', '0348521000', 0, 'Mở', 389021),
(78, 'quanly2', 'e10adc3949ba59abbe56e057f20f883e', 'Quản lý 2', 'quanly2@gmail.com', 'Số 106 Nguyễn Thiện Thành Khóm 4, Phường 5, Thành phố Trà Vinh', '0983994030', 1, 'Mở', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbinhluan`),
  ADD KEY `fk_taikhoan` (`iduser`),
  ADD KEY `fk_sanpham_binhluan` (`idpro`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idcthoadon`),
  ADD KEY `fk_sanpham` (`idpro`),
  ADD KEY `fk_hoadon` (`idhoadon`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`idpro`,`iduser`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`);

--
-- Chỉ mục cho bảng `luotxem`
--
ALTER TABLE `luotxem`
  ADD PRIMARY KEY (`idpro`,`iduser`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idpro`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbinhluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idcthoadon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_sanpham_binhluan` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`idpro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_hoadon` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`idpro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
