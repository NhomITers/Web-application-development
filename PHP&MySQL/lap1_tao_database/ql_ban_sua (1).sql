-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2020 lúc 04:29 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `So_Hoa_Don` varchar(5) NOT NULL,
  `Ma_Sua` varchar(6) NOT NULL,
  `So_Luong` int(11) DEFAULT NULL,
  `Don_Gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`So_Hoa_Don`, `Ma_Sua`, `So_Luong`, `Don_Gia`) VALUES
('00001', 'NTF001', 10, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sua`
--

CREATE TABLE `hang_sua` (
  `Ma_Hang_Sua` varchar(20) NOT NULL,
  `Ten_Hang_Sua` varchar(100) NOT NULL,
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hang_sua`
--

INSERT INTO `hang_sua` (`Ma_Hang_Sua`, `Ten_Hang_Sua`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', '8741258', 'abbott@ab.com'),
('DL', 'Dutch Lady', 'Khu công nghiệp Biên Hoà - Đồng Nai', '7826451', 'dutchlady@dl.com'),
('DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '6258943', 'dumex@dm.com'),
('DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', '7456987', 'daisy@ds.com'),
('MJ', 'Mead Jonhson', 'Công ty nhập khẩu Việt Nam', '8741258', 'meadjohn@mj.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutrifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1- Tp.HCM', '8794561', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `So_Hoa_Don` varchar(5) NOT NULL,
  `Ngay_HD` date NOT NULL,
  `Ma_Khach_Hang` varchar(5) NOT NULL,
  `Tri_Gia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`So_Hoa_Don`, `Ngay_HD`, `Ma_Khach_Hang`, `Tri_Gia`) VALUES
('00001', '2020-12-01', 'kh001', 2000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `Ma_Khach_Hang` varchar(5) NOT NULL,
  `Ten_Khach_Hang` varchar(100) NOT NULL,
  `Phai` tinyint(1) DEFAULT NULL,
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`Ma_Khach_Hang`, `Ten_Khach_Hang`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('kh001', 'Khuất Thuỳ Phương', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125', 'khuanthuyphuong@gmail.com'),
('kh002', 'Đỗ Lâm Thiên', 0, 'Lê Hồng Phong Q.10', '8351056', 'dolamthien@gmail.com'),
('kh003', 'Phạm Thị Nhung', 1, '56 Đinh Tiên Hoàng Q.1', '9874125', 'phamthinhung@gmail.com'),
('kh004', 'Nguyễn Khắc Thiện', 0, '12 Đường 3-2 Q.10', '8769128', 'nguyenkhacthien@gmail.com'),
('kh005', 'Tô Trần Hồ Giảng', 0, '75 Nguyễn Kiệm Quận Gò Vấp', '5792564', 'totranhogiang@gmail.com'),
('kh006', 'Nguyễn Kiến Thi', 1, '357 Lê Hồng Phong Q.10', '9874125', 'nguyenkienthi@gmail.com'),
('kh007', 'Huỳnh Duy Mạnh', 0, '20 Đường Mai Xuân Thưởng Quận Bình Thạnh', '9874525', 'manhhuynhduy@gmail.com'),
('kh008', 'Nguyễn Anh Tuấn', 0, '1/2bis Nơ Trang Long quận Bình Thạnh TP.HCM', '8753159', 'nguyenanhtuan@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sua`
--

CREATE TABLE `loai_sua` (
  `Ma_Loai_Sua` varchar(3) NOT NULL,
  `Ten_Loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_sua`
--

INSERT INTO `loai_sua` (`Ma_Loai_Sua`, `Ten_Loai`) VALUES
('SB', 'Sữa bột'),
('SC', 'Sữa chua'),
('ST', 'Sữa tươi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sua`
--

CREATE TABLE `sua` (
  `Ma_Sua` varchar(6) NOT NULL,
  `Ten_Sua` varchar(100) NOT NULL,
  `Ma_Hang_Sua` varchar(20) NOT NULL,
  `Ma_Loai_Sua` varchar(3) NOT NULL,
  `Trong_Luong` int(11) DEFAULT NULL,
  `Don_Gia` int(11) DEFAULT NULL,
  `TP_Dinh_Duong` text DEFAULT NULL,
  `Loi_Ich` text DEFAULT NULL,
  `Hinh` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sua`
--

INSERT INTO `sua` (`Ma_Sua`, `Ten_Sua`, `Ma_Hang_Sua`, `Ma_Loai_Sua`, `Trong_Luong`, `Don_Gia`, `TP_Dinh_Duong`, `Loi_Ich`, `Hinh`) VALUES
('NTF001', 'Sữa tươi tiệt trùng NUTRIFOOD', 'NTF', 'ST', 800, 200000, 'Các vitamin, chất khoán, canxi...', 'Bổ sung các chất dinh dưỡng dành cho trẻ em và phụ nữ mang thai', './img/nutrifood.jpg'),
('NTF002', 'Sửa bột NUTRIFOOD', 'NTF', 'SB', 800, 400000, 'vitamin D,Vitamin E', 'dinh dưỡng cho phụ nữ mang thai và trẻ nhỏ', './img/nutrifood2.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`So_Hoa_Don`,`Ma_Sua`),
  ADD KEY `Ma_Sua` (`Ma_Sua`);

--
-- Chỉ mục cho bảng `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`Ma_Hang_Sua`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`So_Hoa_Don`),
  ADD KEY `Ma_Khach_Hang` (`Ma_Khach_Hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`Ma_Khach_Hang`);

--
-- Chỉ mục cho bảng `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`Ma_Loai_Sua`);

--
-- Chỉ mục cho bảng `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`Ma_Sua`),
  ADD KEY `Ma_Hang_Sua` (`Ma_Hang_Sua`),
  ADD KEY `Ma_Loai_Sua` (`Ma_Loai_Sua`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`So_Hoa_Don`) REFERENCES `hoa_don` (`So_Hoa_Don`),
  ADD CONSTRAINT `ct_hoadon_ibfk_2` FOREIGN KEY (`Ma_Sua`) REFERENCES `sua` (`Ma_Sua`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`Ma_Khach_Hang`) REFERENCES `khach_hang` (`Ma_Khach_Hang`);

--
-- Các ràng buộc cho bảng `sua`
--
ALTER TABLE `sua`
  ADD CONSTRAINT `sua_ibfk_1` FOREIGN KEY (`Ma_Hang_Sua`) REFERENCES `hang_sua` (`Ma_Hang_Sua`),
  ADD CONSTRAINT `sua_ibfk_2` FOREIGN KEY (`Ma_Loai_Sua`) REFERENCES `loai_sua` (`Ma_Loai_Sua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
