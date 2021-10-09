-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2021 lúc 05:00 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phoneshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ten_bl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sao` tinyint(5) NOT NULL,
  `ngay_bl` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `id_sp`, `ten_bl`, `noi_dung`, `sao`, `ngay_bl`) VALUES
(13, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:14:51'),
(14, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:15:29'),
(15, 15, 'Huu Tai', 'binh luan demo1', 3, '2021-08-11 10:15:42'),
(16, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:15:59'),
(17, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:21:10'),
(18, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:24:25'),
(19, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:24:57'),
(20, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:27:44'),
(21, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:28:12'),
(22, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:29:35'),
(23, 15, 'Huu Tai', 'binh luan demo', 5, '2021-08-11 10:30:37'),
(24, 15, 'demo', '123456', 3, '2021-08-11 11:00:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(11) NOT NULL,
  `name_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `name_dm`) VALUES
(1, 'Sony'),
(2, 'SamSung'),
(3, 'Apple'),
(4, 'Vivo'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `tong_cong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `ho_ten`, `so_dien_thoai`, `email`, `dia_chi`, `ghi_chu`, `tong_cong`) VALUES
(44, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 6290000),
(45, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 6290000),
(46, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 9490000),
(47, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 9490000),
(48, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 12990000),
(49, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 12990000),
(50, 'demo', 343642917, 'nghiemhuutai@gmail.com', 'Ha noi', '', 12990000),
(51, 'demo', 343642917, 'nghiemhuutai@gmail.com', 'Ha noi', '', 12990000),
(52, 'demo', 343642917, 'nghiemhuutai@gmail.com', 'Ha noi', '', 12990000),
(53, 'demo', 343642917, 'nghiemhuutai@gmail.com', 'Ha noi', '', 12990000),
(54, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 11500000),
(55, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 11500000),
(56, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 4600000),
(57, 'demo', 343642917, 'nghiemhuutai28@gmail.com', 'Ha noi', '', 4600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang_chitiet`
--

CREATE TABLE `giohang_chitiet` (
  `id` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang_chitiet`
--

INSERT INTO `giohang_chitiet` (`id`, `id_giohang`, `id_sanpham`, `so_luong`, `gia_sp`) VALUES
(18, 45, 11, 1, 3990000),
(19, 45, 15, 1, 2300000),
(20, 47, 21, 1, 9490000),
(21, 49, 16, 1, 3500000),
(22, 49, 21, 1, 9490000),
(23, 51, 16, 1, 3500000),
(24, 51, 21, 1, 9490000),
(25, 53, 16, 1, 3500000),
(26, 53, 21, 1, 9490000),
(27, 55, 15, 5, 2300000),
(28, 57, 15, 2, 2300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `ten_kh`, `mat_khau`, `email`, `phone`) VALUES
(1, 'demo', '123456', 'demo@gamil.com', 987654321),
(2, 'demo', '123456', 'demo@gamil.com', 987654321);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 0,
  `dac_biet` tinyint(4) NOT NULL DEFAULT 0,
  `chi_tiet_sp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `bao_hanh`, `phu_kien`, `trinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`) VALUES
(5, 1, 'Sony Xperia 1', 'sony-xperia-1-543984.jpg', 20990000, '3 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(6, 1, 'Sony Xperia 5', 'sony-xperia-5-543985.jpg', 17990000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(7, 1, 'Sony Xperia XZ3', 'sony-xperia-xz3-543983.jpg', 7000000, '5 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(8, 1, 'Sony Xperia 5 white', 'sony-xperia-5-white-600x600.jpg', 18990000, '3 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(9, 1, 'Sony Xperia Z5 Premium', '1gr2w24yhug3d.jpg', 12792000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(10, 2, 'Samsung Galaxy Note 10+ Plus', 'note_10_plus_xanh-768x768.jpg', 3800000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(11, 2, 'Samsung Galaxy S20 Ultra', '600_s20_ultra_min.jpg', 3990000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(12, 2, 'Samsung Galaxy Note 10+', '637008710284136121_ss-note-10-pl-trang-1-1_2.jpg', 3300000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(13, 2, 'Samsung Galaxy S8', 'medium_wrr1608077170.jpg', 5599000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(14, 2, 'Samsung Galaxy A70s', 'a70s-7.jpg', 2150000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(15, 3, 'iPhone 12 Mini', '4ccc8f968ae0029142282a50f8a724a0-1.jpg', 2300000, '5 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 1, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(16, 3, 'iPhone Xs Max', '1042134181.jpg', 3500000, '3 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(17, 3, 'iPhone 8', 'dien-thoai-iphone-8-cu-vang.jpg', 3890000, '3 tháng', 'Sạc, ốp', 'Mới 95%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(18, 3, 'iPhone 11 Pro Max', '1334643500.jpg', 4500000, '6 tháng', 'Sạc, ốp', 'Mới 95%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(19, 3, 'iPhone X', 'xam_j2wx-12.jpg', 2690000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 1, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(20, 4, 'Vivo Y11', 'vivo-y11-600-600-do-1-200x200.jpg', 2990000, '6 tháng', 'Sạc, ốp', 'Mới 95%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(21, 4, 'Vivo V21 5G', 'vivo-v21-5g-tim-hong-200x200.jpg', 9490000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 1, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(22, 4, 'VIVO Y20', '1608878056.jpg', 3490000, '3 tháng', 'Sạc, ốp', 'Mới 95%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(23, 4, 'Vivo Y12', 'a6f967a3a4101411828cf7e2e49e1731-300x300.jpg', 2690000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(24, 4, 'Vivo Y15', 'vivo-v15-quanghai-600x600.jpg', 4500000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 1, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(25, 5, 'Xiaomi Redmi 9A', '2055187739.jpg', 1790000, '6 tháng', 'Sạc, ốp', 'fgbhfhf', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(26, 5, 'Xiaomi Redmi 9C', 'dmcl_450_product_17008_1.png', 2990000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(27, 5, 'Xiaomi Redmi Note 8', 'xiaomi-redmi-note-8-blue-1-200x200.jpg', 3290000, '3 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(28, 5, 'Xiaomi Poco M3', 'xiaomi-poco-m3-128gb-ram-4gb-01609420266.jpg', 3569000, '3 tháng', 'Sạc, ốp', 'Mới 95%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n'),
(29, 5, 'Xiaomi Redmi Note 10', 'image-removebg-preview.png', 4290000, '6 tháng', 'Sạc, ốp', 'Mới 100%', 'Không', 0, 0, '<p>Lorem Ipsum ist ein einfacher Demo-Text f&uuml;r die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll W&ouml;rter nahm und diese durcheinander warf um ein Musterbuch zu erstellen.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `email`, `mat_khau`, `quyen_truy_cap`) VALUES
(1, 'nghiemhuutai28@gmail.com', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang_chitiet`
--
ALTER TABLE `giohang_chitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_chitiet_ibfk_1` (`id_giohang`),
  ADD KEY `giohang_chitiet_ibfk_2` (`id_sanpham`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `giohang_chitiet`
--
ALTER TABLE `giohang_chitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `giohang_chitiet`
--
ALTER TABLE `giohang_chitiet`
  ADD CONSTRAINT `giohang_chitiet_ibfk_1` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_chitiet_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `dmsanpham` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
