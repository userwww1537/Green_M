-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
<<<<<<< HEAD
-- Thời gian đã tạo: Th10 27, 2023 lúc 10:55 AM
=======
-- Thời gian đã tạo: Th12 04, 2023 lúc 03:16 PM
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `green_m8683`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account_id` int(123) NOT NULL,
  `account_name` longblob NOT NULL,
  `account_address` varchar(80) NOT NULL,
  `account_number_pay` varchar(30) NOT NULL,
  `account_pay` varchar(15) NOT NULL,
  `account_avt` varchar(299) NOT NULL DEFAULT 'view/images/account/user.png',
  `account_username` varchar(30) NOT NULL,
  `account_email` varchar(40) NOT NULL,
  `account_verified_mail` varchar(15) NOT NULL DEFAULT 'Chưa xác thực',
  `account_phone` varchar(10) NOT NULL,
  `account_pass` varchar(100) NOT NULL,
  `account_position` varchar(20) NOT NULL DEFAULT 'Khách hàng',
  `account_notify` varchar(100) NOT NULL,
  `account_status` varchar(30) NOT NULL DEFAULT 'Offline',
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

<<<<<<< HEAD
INSERT INTO `account` (`account_id`, `account_name`, `account_sex`, `account_address`, `account_number_pay`, `account_pay`, `account_avt`, `account_username`, `account_email`, `account_verified_mail`, `account_phone`, `account_pass`, `account_position`, `account_notify`, `account_status`, `time_reg`) VALUES
(1, 0x4e677579e1bb856e2054e1baa56e20c39d, 'Nam', '56a Cống Lỡ, Phường 15, Quận Tân Bình, TP Hồ Chí Minh', '1234999977774444', 'MBBank', 'view/images/account/Ý 30k$.jpg', 'nguyentany', 'nguyentany.tricker@gmail.com', 'Đã xác thực', '0345123856', '000', 'Shop', '', 'Online', '2023-11-05 10:00:11'),
(7, 0xc490e1baad752056c4836e2044c5a96e67, '', '199 Đông Bắc, Phường Tân Chánh Hiệp, Quận 12, TP, Hồ Chí Minh', '1234123412341234', 'MBBank', 'view/images/account/user.png', 'dauvandung', 'vandungdau583@gmail.com', 'Đã xác thực', '0358676293', '123', 'Shop', '', 'Online', '2023-11-13 06:14:55'),
(8, 0x4e677579e1bb856e205468616e68205475e1baa56e, '', '3d Tân Chánh Hiệp 17, Quận 12, TP. Hồ Chí Minh', '', '', 'view/images/account/user.png', 'nguyenthanhtuan', 'tuanxelu12@gmail.com', 'Đã xác thực', '0363156469', '123', 'Khách hàng', '', 'Offline', '2023-11-13 06:25:31'),
(9, 0x43c3b4204e616d, '', '', '', '', 'view/images/account/user.png', 'conam', 'Conam@gmail.com', 'Chưa xác thực', '', '123', 'Khách hàng', '', 'Offline', '2023-11-17 05:27:27'),
(10, 0x41646d696e20f09f9888, '', '148/3 Hùng vương easup đắk lắk', '', '', 'view/images/account/user.png', 'admin', 'admin@Green-m.Com', 'Đã xác thực', '0388322426', '123', 'Quản trị viên', '', 'Offline', '2023-11-17 08:29:37'),
(11, 0x43c394206e616d, '', 'Hùng vương kakakakaka', '', '', 'view/images/account/user.png', 'conamkaka', 'Conamkaka@gmail.com', 'Đã xác thực', '0999999999', '123123123', 'Khách hàng', '', 'Offline', '2023-11-27 05:30:08');
=======
INSERT INTO `account` (`account_id`, `account_name`, `account_address`, `account_number_pay`, `account_pay`, `account_avt`, `account_username`, `account_email`, `account_verified_mail`, `account_phone`, `account_pass`, `account_position`, `account_notify`, `account_status`, `time_reg`) VALUES
(1, 0x4e677579e1bb856e2054e1baa56e20c39d, '56a Cống Lỡ, Phường 15, Quận Tân Bình, TP Hồ Chí Minh', '2204049999', 'MBBank', 'view/images/account/Ý 30k$.jpg', 'nguyentany', 'nguyentany.tricker@gmail.com', 'Đã xác thực', '0345123856', '123', 'Shop', '', 'Online', '2023-11-05 10:00:11'),
(7, 0xc490e1baad752056c4836e2044c5a96e67, '199 Đông Bắc, Phường Tân Chánh Hiệp, Quận 12, TP, Hồ Chí Minh', '', '', 'view/images/account/user.png', 'dauvandung', 'vandungdau583@gmail.com', 'Đã xác thực', '0358676293', '123', 'Shop', '', 'Offline', '2023-11-13 06:14:55'),
(8, 0x4e677579e1bb856e205468616e68205475e1baa56e, '3d Tân Chánh Hiệp 17, Quận 12, TP. Hồ Chí Minh', '', '', 'view/images/account/user.png', 'nguyenthanhtuan', 'tuanxelu12@gmail.com', 'Đã xác thực', '0363156469', '123', 'Khách hàng', '', 'Offline', '2023-11-13 06:25:31'),
(10, 0x41646d696e20f09f9888, '148/3 Hùng vương easup đắk lắk', '1234567', 'Techcombank', 'view/images/account/user.png', 'admin', 'hotro.greenm@gmail.com\n', 'Đã xác thực', '0388322426', '123', 'Quản trị viên', '', 'Online', '2023-11-17 08:29:37');
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(123) NOT NULL,
  `cart_name` varchar(100) NOT NULL,
  `cart_price` double(10,2) NOT NULL,
  `cart_img` varchar(100) NOT NULL,
  `cart_qty` int(3) NOT NULL,
  `product_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `shop_id` int(123) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_name`, `cart_price`, `cart_img`, `cart_qty`, `product_id`, `account_id`, `shop_id`, `time_reg`) VALUES
(130, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 2, 29, 9, 1, '2023-11-17 05:27:35'),
(131, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 2, 25, 9, 1, '2023-11-17 05:27:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(123) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_img` varchar(100) NOT NULL DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/3/30/%28none%29.png',
  `category_status` varchar(20) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `category_status`, `time_reg`) VALUES
(1, 'Rau', 'view/images/rau.jpg', 'Đang hoạt động', '2023-11-05 09:39:37'),
(2, 'Củ', 'view/images/cu.jpg', 'Đang hoạt động', '2023-11-05 09:39:37'),
(3, 'Quả', 'view/images/qua.jpg', 'Đang hoạt động', '2023-11-05 09:40:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `code_id` int(123) NOT NULL,
  `code_gift` varchar(30) NOT NULL,
  `code_reduced` int(2) NOT NULL,
  `code_qty` int(123) NOT NULL,
  `code_status` varchar(20) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`code_id`, `code_gift`, `code_reduced`, `code_qty`, `code_status`, `reg_time`) VALUES
(1, 'GREEN-M-8386', 30, 15, 'On', '2023-11-08 11:24:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `image_id` int(123) NOT NULL,
  `image_file` varchar(299) NOT NULL,
  `product_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`image_id`, `image_file`, `product_id`) VALUES
(76, 'view/images/product/Lovepik_com-401576184-durian.png', 1),
(77, 'view/images/product/thuviendohoa.vn_163.png', 1),
(78, 'view/images/product/kisspng-camping-food-durio-zibethinus-tropical-fruit-5b21f3e7c83b54.5216137915289517838202.png', 1),
(79, 'view/images/product/Lovepik_com-401551780-banana.png', 2),
(80, 'view/images/product/Lovepik_com-401551780-banana.png', 2),
(81, 'view/images/product/green-banana-01.png', 2),
(82, 'view/images/product/thuvienvector.com_1055.png', 3),
(83, 'view/images/product/pngegg (2).png', 3),
(84, 'view/images/product/thuvienvector.com_1056.png', 3),
(85, 'view/images/product/cam1.png', 4),
(86, 'view/images/product/cam2.png', 4),
(87, 'view/images/product/cam3.png', 4),
(88, 'view/images/product/nho1.png', 5),
(89, 'view/images/product/nho2.png', 5),
(90, 'view/images/product/nho3.png', 5),
(91, 'view/images/product/dua1.png', 6),
(92, 'view/images/product/dua2.png', 6),
(93, 'view/images/product/dua3.png', 6),
(94, 'view/images/product/tao1.png', 7),
(95, 'view/images/product/tao2.png', 7),
(96, 'view/images/product/tao3.png', 7),
(97, 'view/images/product/quadua.png', 8),
(98, 'view/images/product/quadua2.png', 8),
(99, 'view/images/product/quadua3.png', 8),
(100, 'view/images/product/le1.png', 11),
(101, 'view/images/product/le2.png', 11),
(102, 'view/images/product/le3.png', 11),
(103, 'view/images/product/ki1.png', 12),
(104, 'view/images/product/ki2.png', 12),
(105, 'view/images/product/ki3.png', 12),
(106, 'view/images/product/khoai1.png', 13),
(107, 'view/images/product/khoai2.png', 13),
(108, 'view/images/product/khoai3.png', 13),
(109, 'view/images/product/carot1.png', 14),
(110, 'view/images/product/carot2.png', 14),
(111, 'view/images/product/carot3.png', 14),
(112, 'view/images/product/dauhalan1.png', 15),
(113, 'view/images/product/dauhalan2.png', 15),
(114, 'view/images/product/dauhalan3.png', 15),
(115, 'view/images/product/cucaiduong1.png', 16),
(116, 'view/images/product/cucaiduong2.png', 16),
(117, 'view/images/product/cucaiduong3.png', 16),
(118, 'view/images/product/cucaido1.png', 17),
(119, 'view/images/product/cucaido2.png', 17),
(120, 'view/images/product/cucaido3.png', 17),
(121, 'view/images/product/cuhanh1.png', 18),
(122, 'view/images/product/cuhanh2.png', 18),
(123, 'view/images/product/cuhanh3.png', 18),
(124, 'view/images/product/dautuong1.png', 19),
(125, 'view/images/product/dautuong2.png', 19),
(126, 'view/images/product/dautuong3.png', 19),
(127, 'view/images/product/khoailang1.png', 20),
(128, 'view/images/product/khoailang2.png', 20),
(129, 'view/images/product/khoailang3.png', 20),
(130, 'view/images/product/cucaitrang1.png', 21),
(131, 'view/images/product/cucaitrang2.png', 21),
(132, 'view/images/product/cucaitrang3.png', 21),
(133, 'view/images/product/cucaile1.png', 22),
(134, 'view/images/product/cucaile2.png', 22),
(135, 'view/images/product/cucaile3.png', 22),
(139, 'view/images/product/bapcai1.png', 24),
(140, 'view/images/product/bapcai2.png', 24),
(141, 'view/images/product/bapcai3.png', 24),
(142, 'view/images/product/xalach1.png', 25),
(143, 'view/images/product/xalach2.png', 25),
(144, 'view/images/product/raumuong1.png', 26),
(145, 'view/images/product/raumuong2.png', 26),
(146, 'view/images/product/caixanh1.png', 27),
(147, 'view/images/product/caixanh2.png', 27),
(148, 'view/images/product/raungo1.png', 28),
(149, 'view/images/product/raungo2.png', 28),
(150, 'view/images/product/raungo3.png', 28),
(151, 'view/images/product/caithao1.png', 29),
(152, 'view/images/product/caithao2.png', 29),
(153, 'view/images/product/diepca1.png', 30),
(154, 'view/images/product/diepca2.png', 30),
(155, 'view/images/product/raumui1.png', 31),
(156, 'view/images/product/raumui2.png', 31),
(157, 'view/images/product/raumui3.png', 31),
(158, 'view/images/product/rauden1.png', 32),
(159, 'view/images/product/rauden3.png', 32),
(160, 'view/images/product/rauden2.png', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(123) NOT NULL,
  `mess_content` longblob NOT NULL,
  `mess_status` varchar(15) NOT NULL DEFAULT 'Chưa xem',
  `account_from` int(123) NOT NULL,
  `account_to` int(123) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`mess_id`, `mess_content`, `mess_status`, `account_from`, `account_to`, `reg_time`) VALUES
(119, 0x436861666f2062616e6a, 'Đã xem', 1, 10, '2023-11-21 17:35:39'),
(120, 0x436f73206368757965656e6a20676966, 'Đã xem', 10, 1, '2023-11-21 17:35:47'),
(121, 0x4b636a, 'Đã xem', 1, 10, '2023-11-21 17:35:50'),
(127, 0x436861666f, 'Đã xem', 1, 10, '2023-11-23 18:24:07'),
(128, 0x313233, 'Đã xem', 1, 10, '2023-11-23 18:24:55'),
(129, 0xc490616e67206cc3a06d2067c3ac, 'Đã xem', 1, 10, '2023-11-24 07:14:22'),
(130, 0x52e1baa36e68206b68c3b46e673f, 'Đã xem', 1, 10, '2023-11-24 07:14:29'),
(131, 0x4b6b6b, 'Đã xem', 1, 10, '2023-11-24 07:15:25'),
(132, 0x646a6173686461, 'Đã xem', 1, 10, '2023-11-24 07:15:34'),
(133, 0x64616b736a6461, 'Đã xem', 1, 10, '2023-11-24 07:16:20'),
(134, 0x4b6b6b, 'Đã xem', 10, 1, '2023-11-24 07:16:27'),
(135, 0x4b6b6b, 'Đã xem', 10, 1, '2023-11-24 07:16:35'),
(136, 0x68c3a1646a6173686b, 'Đã xem', 10, 1, '2023-11-24 07:16:44'),
(137, 0x4368c3a06f, 'Đã xem', 10, 1, '2023-11-24 07:33:31'),
(138, 0x436861666f, 'Đã xem', 10, 1, '2023-11-24 07:37:39'),
(139, 0x43c3a070, 'Đã xem', 10, 1, '2023-11-24 07:40:08'),
(140, 0x6468616a, 'Đã xem', 10, 1, '2023-11-24 07:47:07'),
(141, 0x436861666f, 'Đã xem', 10, 1, '2023-11-24 07:53:55'),
(142, 0x4368c3a06f2062e1baa16e, 'Đã xem', 10, 1, '2023-11-24 07:54:00'),
(143, 0x4368c3a06f, 'Đã xem', 10, 1, '2023-11-24 07:54:16'),
(144, 0x4368c3a06f, 'Đã xem', 10, 1, '2023-11-24 07:56:07'),
(145, 0x434861666f, 'Đã xem', 10, 1, '2023-11-24 07:58:49'),
(146, 0x4b616b6b61, 'Đã xem', 10, 1, '2023-11-24 07:58:54'),
(147, 0x617364616173, 'Đã xem', 10, 1, '2023-11-24 07:58:56'),
(148, 0x68666a6b61686164736b, 'Đã xem', 10, 1, '2023-11-24 07:59:02'),
(149, 0x636861666f, 'Đã xem', 10, 1, '2023-11-24 08:00:05'),
(150, 0x436861666f, 'Đã xem', 10, 1, '2023-11-24 08:00:11'),
(151, 0x4368c3a06f, 'Đã xem', 10, 1, '2023-11-24 08:00:41'),
(152, 0x4368c3a06f, 'Đã xem', 10, 1, '2023-11-24 08:01:32'),
(153, 0x4348c3804f, 'Đã xem', 10, 1, '2023-11-24 08:02:21'),
(154, 0x5343484441534a44414b53, 'Đã xem', 10, 1, '2023-11-24 08:02:28'),
(155, 0x444a414b444153, 'Đã xem', 10, 1, '2023-11-24 08:02:35'),
(156, 0x444841534a44474841534b4a, 'Đã xem', 10, 1, '2023-11-24 08:02:38'),
(157, 0x4448414b4a53415348, 'Đã xem', 10, 1, '2023-11-24 08:03:05'),
(158, 0x424441424441534b4a48444153, 'Đã xem', 10, 1, '2023-11-24 08:03:11'),
(159, 0xc38144414153, 'Đã xem', 10, 1, '2023-11-24 08:03:15'),
(160, 0x4448414b4a5348, 'Đã xem', 10, 1, '2023-11-24 08:03:24'),
(161, 0x4348c3804f, 'Đã xem', 1, 10, '2023-11-24 08:03:35'),
(162, 0xc490c38253, 'Đã xem', 1, 10, '2023-11-24 08:03:38'),
(163, 0x6348c3804f, 'Đã xem', 10, 1, '2023-11-24 08:03:58'),
(164, 0x6864736b6a6164686173, 'Đã xem', 10, 1, '2023-11-24 08:04:29'),
(165, 0xc491c3a273, 'Đã xem', 10, 1, '2023-11-24 08:04:32'),
(166, 0xc491e1baa5, 'Đã xem', 10, 1, '2023-11-24 08:04:55'),
(167, '', 'Đã xem', 10, 1, '2023-11-24 08:04:57'),
(168, 0xc491c3a27361, 'Đã xem', 10, 1, '2023-11-24 08:04:58'),
(169, '', 'Đã xem', 10, 1, '2023-11-24 08:04:59'),
(170, '', 'Đã xem', 10, 1, '2023-11-24 08:04:59'),
(171, '', 'Đã xem', 10, 1, '2023-11-24 08:04:59'),
(172, '', 'Đã xem', 10, 1, '2023-11-24 08:04:59'),
(173, 0xc491c3a273, 'Đã xem', 10, 1, '2023-11-24 08:05:37'),
(174, 0xc3a1646173, 'Đã xem', 10, 1, '2023-11-24 08:05:42'),
(175, 0xc491e1baa5, 'Đã xem', 10, 1, '2023-11-24 08:06:22'),
(176, 0x64617361, 'Đã xem', 10, 1, '2023-11-24 08:09:17'),
(177, 0x4b6565, 'Đã xem', 10, 1, '2023-11-24 08:09:24'),
(178, 0x676966207a, 'Đã xem', 1, 10, '2023-11-24 08:09:32'),
(179, 0x73616f, 'Đã xem', 1, 10, '2023-11-24 08:09:37'),
(180, 0x4c6f6f, 'Đã xem', 10, 1, '2023-11-24 08:10:23'),
(181, 0x6c6f6f, 'Đã xem', 10, 1, '2023-11-24 08:10:29'),
(182, 0x6b616b616b61, 'Đã xem', 10, 1, '2023-11-24 08:10:31'),
(183, 0x6361686a646b6861736b6a6461, 'Đã xem', 10, 1, '2023-11-24 08:10:33'),
<<<<<<< HEAD
(184, 0x7364686b6a646173, 'Chưa xem', 1, 10, '2023-11-24 08:10:41'),
(185, 0x646168736a6164736b, 'Chưa xem', 1, 10, '2023-11-24 08:10:43'),
(186, 0x4464616e67206c616d6620676966, 'Chưa xem', 1, 10, '2023-11-24 08:15:40'),
(187, 0x52616e6872206b68, 'Chưa xem', 1, 10, '2023-11-24 08:15:51'),
(188, 0x6461646173, 'Chưa xem', 1, 10, '2023-11-24 08:15:53'),
(190, 0x4b686f6f6e6720636f7320676966, 'Chưa xem', 1, 10, '2023-11-24 08:19:25'),
=======
(184, 0x7364686b6a646173, 'Đã xem', 1, 10, '2023-11-24 08:10:41'),
(185, 0x646168736a6164736b, 'Đã xem', 1, 10, '2023-11-24 08:10:43'),
(186, 0x4464616e67206c616d6620676966, 'Đã xem', 1, 10, '2023-11-24 08:15:40'),
(187, 0x52616e6872206b68, 'Đã xem', 1, 10, '2023-11-24 08:15:51'),
(188, 0x6461646173, 'Đã xem', 1, 10, '2023-11-24 08:15:53'),
(190, 0x4b686f6f6e6720636f7320676966, 'Đã xem', 1, 10, '2023-11-24 08:19:25'),
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
(257, 0x61646173, 'Đã xem', 7, 1, '2023-11-27 05:16:37'),
(258, 0x646173647361, 'Đã xem', 7, 1, '2023-11-27 05:16:38'),
(259, 0x617364617364, 'Đã xem', 7, 1, '2023-11-27 05:16:40'),
(260, 0x6173646173647361, 'Đã xem', 7, 1, '2023-11-27 05:16:42'),
(261, 0x64616461736473616173, 'Đã xem', 7, 1, '2023-11-27 05:16:50'),
(262, 0x6461736461736b34, 'Đã xem', 7, 1, '2023-11-27 05:17:00'),
(263, 0x6461736a6864736b6173, 'Đã xem', 7, 1, '2023-11-27 05:17:03'),
(264, 0x6173646173, 'Đã xem', 7, 1, '2023-11-27 05:17:50'),
<<<<<<< HEAD
(265, 0xc38168646173, 'Đã xem', 11, 1, '2023-11-27 05:33:54'),
(266, 0x616864617364, 'Đã xem', 11, 1, '2023-11-27 05:33:56'),
(267, 0x7a68647361736a, 'Đã xem', 1, 11, '2023-11-27 05:34:03');
=======
(268, 0x686a6b686b6a, 'Đã xem', 1, 10, '2023-11-28 08:05:37'),
(269, 0x6a6b686a6b68, 'Đã xem', 1, 10, '2023-11-28 08:05:50'),
(270, 0x68646b6a6173, 'Chưa xem', 10, 1, '2023-11-28 14:05:56'),
(271, 0x6a6b617364676861736b6a, 'Chưa xem', 10, 1, '2023-11-28 14:05:57'),
(272, 0x6861736b6a646861736b6a, 'Chưa xem', 10, 1, '2023-11-28 14:05:58'),
(273, 0x686b6a646861736b646173, 'Chưa xem', 10, 1, '2023-11-28 14:06:01'),
(274, 0x6e6861, 'Chưa xem', 10, 1, '2023-11-28 15:33:57'),
(275, 0x6473, 'Chưa xem', 10, 1, '2023-11-28 15:34:03'),
(276, 0x7364, 'Chưa xem', 10, 1, '2023-11-28 15:34:04'),
(277, 0x73, 'Chưa xem', 10, 1, '2023-11-28 15:34:04'),
(278, 0x73, 'Chưa xem', 10, 1, '2023-11-28 15:34:04'),
(279, 0x64, 'Chưa xem', 10, 1, '2023-11-28 15:34:04'),
(280, 0x7364736473, 'Chưa xem', 10, 1, '2023-11-28 15:34:05'),
(281, 0x64, 'Chưa xem', 10, 1, '2023-11-28 15:34:05'),
(282, 0x7364, 'Chưa xem', 10, 1, '2023-11-28 15:34:05'),
(283, 0x73, 'Chưa xem', 10, 1, '2023-11-28 15:34:05'),
(284, 0x6461206d61207465, 'Chưa xem', 10, 1, '2023-11-28 15:34:12');
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new`
--

CREATE TABLE `new` (
  `new_id` int(123) NOT NULL,
  `new_title` varchar(100) NOT NULL,
  `news_content` varchar(299) NOT NULL,
  `news_img` varchar(100) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new`
--

INSERT INTO `new` (`new_id`, `new_title`, `news_content`, `news_img`, `reg_time`) VALUES
(1, 'Nước ép rau quả nào giúp giảm cân?', 'Tôi đang muốn giảm cân, nên dùng loại nước ép rau quả nào và lưu ý gì để an toàn, hiệu quả? (Xuân Đào, Vũng Tàu)\r\n\r\nTrả lời:\r\n\r\nNước ép từ trái cây, rau xanh chứa các dưỡng chất và chất chống oxy hóa quan trọng nhưng thường không có chất xơ (trừ trường hợp xay nhuyễn rau quả hoàn toàn). Một số loại', '1.png', '2023-11-05 09:48:56'),
(2, 'Ăn rau quả gì giảm đau đầu?', 'Tôi hay căng thẳng, đau đầu, thích ăn rau củ quả, nên chọn những loại nào để cải thiện tình trạng này? (Trần Hạnh, TP HCM)\r\n\r\nTrả lời:\r\n\r\nĐau đầu xảy ra do nhiều nguyên nhân như mệt mỏi, căng thẳng, thời tiết, các bệnh lý liên quan. Chọn thực phẩm đúng cách giúp giảm đau đầu.\r\n\r\nBan nên ưu tiên ăn ', '2.png', '2023-11-05 09:48:56'),
(3, 'Có nên gọt vỏ trái cây, rau củ?', 'Vỏ quả táo, cà rốt chứa nhiều dưỡng chất, có thể ăn mà không nên loại bỏ, trong khi trái cây có múi, bơ, bí đỏ, dưa gang cần gọt trước khi ăn.\r\n\r\nĂn nhiều trái cây và rau củ có thể mang đến nhiều lợi ích cho sức khỏe. Nhiều người đến khám dinh dưỡng băn khoăn có nên bỏ vỏ trái cây trước khi ăn để t', '3.png', '2023-11-05 10:04:38'),
(4, '7 loại rau củ giúp giảm viêm, ngừa lão hóa', 'Tỏi, hành tây, cà rốt, rau lá xanh, ớt chuông… là những loại rau củ vừa có giá trị dinh dưỡng vừa chứa các chất giúp giảm viêm, ngừa lão hóa.\r\n\r\nTình trạng viêm xảy ra khi một người bị thương hoặc bị bệnh. Tình trạng viêm trở thành mạn tính khi cơ thể tiếp tục xuất hiện biểu hiện viêm nhiễm ngay cả', '4.png', '2023-11-05 10:04:38'),
(5, 'Các chất trong thực phẩm góp phần bảo vệ tế bào\r\n', 'Rau lá xanh, quả mọng, đậu, cà chua, cà rốt chứa chất chống oxy hóa, chất xơ… góp phần giúp tế bào hạn chế đột biến, làm chậm tiến triển của chúng.\r\n\r\nChế độ ăn uống lành mạnh có thể hỗ trợ hệ thống miễn dịch và giúp cơ thể chống lại bệnh tật. Chế độ ăn uống cân bằng thường có trái cây, rau, ngũ cố', '5.png', '2023-11-05 10:04:38'),
(6, 'Ăn chay đúng cách giảm nguy cơ mắc nhiều bệnh', 'Giảm nguy cơ mắc bệnh ung thư tiêu hóa, tăng cường trao đổi chất, có lợi cho gan... là những lợi ích do ăn chay mang lại.\r\n\r\nĂn chay ngày càng phổ biến ở nhiều lứa tuổi. Bác sĩ Đào Trần Tiến (Phó khoa Tiêu hóa, Bệnh viện Đa khoa Tâm Anh Hà Nội) cho biết ăn chay có thể cung cấp các chất dinh dưỡng t', '6.png', '2023-11-05 10:04:38'),
(7, 'Vì sao ăn khoai tây có mầm, chuyển màu xanh có thể gây ngộ độc?', 'Tôi nghe nói khoai tây mọc mầm, vỏ chuyển sang màu xanh là rất độc không ăn được, xin hỏi bác sĩ vì sao, có thể gọt bớt đi để ăn không? ( Lê Tuyết , 38 tuổi, ở Bình Dương )\r\nPhó giáo sư, tiến sĩ, bác sĩ Lâm Vĩnh Niên, Trưởng khoa Dinh dưỡng, tiết chế, Bệnh viện Đại học Y Dược TP.HCM, trả lời:\r\n\r\nMầ', '7.png', '2023-11-05 10:04:38'),
(8, 'Lợi ích khi cho trẻ ăn đu đủ', 'Đu đủ không chỉ là loại trái cây ăn dặm tốt dành cho trẻ, có thể mang đến nhiều lợi ích như hỗ trợ hệ tiêu hóa, giảm táo bón.\r\n\r\nViệc đưa thức ăn đặc như trái cây và rau củ vào chế độ ăn dặm có thể giúp trẻ tránh tình trạng kén ăn; đồng thời, giảm nguy cơ mắc các vấn đề về ăn uống, béo phì và dị ứn', '8.png', '2023-11-05 10:04:38'),
(9, 'Giàn nho Pháp trĩu quả trên ban công chưa đầy 5m2', 'Mê trồng nho nhưng không có nhiều diện tích, người phụ nữ ở TP.HCM đã biến ban công rộng chưa đầy 5m vuông của căn nhà thành giàn nho Pháp lúc lỉu trái.\r\nGiàn nho trên ban công\r\n\r\nMở cửa cho con gái út ra ban công tầng 1, chị Lê Thị Tới (ngụ Quận Tân Bình, TP.HCM) để cho bé gái vít cành, hái những ', '9.png', '2023-11-05 10:04:38'),
(10, 'Bắp cải Trung Quốc màu lạ, tới tấp đặt mua, rước về đón Tết', 'Loại bắp cải Trung Quốc có màu sắc sặc sỡ với giá bán lên tới cả 100 nghìn đồng mỗi cây đang được các chị em tới tấp đặt mua chơi Tết này dù không ăn được.\r\n\r\nBắp cải vốn là loại rau quen thuộc với người Việt, đặc biệt là vào mùa Đông. Giá bắp cải chỉ dao động từ 10.000-30.000 đồng/kg/cây. Một số g', '10.png', '2023-11-05 10:04:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(123) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_pay` varchar(15) NOT NULL,
  `order_note` varchar(299) NOT NULL DEFAULT 'Không có ghi chú',
  `order_promo` int(2) NOT NULL DEFAULT 0,
  `order_status` varchar(30) NOT NULL DEFAULT 'Đang chờ duyệt',
  `order_cancel` int(1) NOT NULL DEFAULT 0,
  `account_id` int(123) NOT NULL,
  `shop_id` int(123) NOT NULL,
  `time_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

<<<<<<< HEAD
=======
--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_total`, `order_pay`, `order_note`, `order_promo`, `order_status`, `order_cancel`, `account_id`, `shop_id`, `time_reg`) VALUES
(130, 21.00, 'Ngân hàng', 'Nhớ đóng gói cho em', 0, 'Đã hủy', 1, 10, 1, '2023-12-04'),
(131, 49.00, 'Tiền mặt', 'Nhớ', 0, 'Giao thành công', 0, 10, 1, '2023-12-04'),
(132, 21.00, 'Tiền mặt', 'Nhớ', 0, 'Đang chờ duyệt', 0, 10, 7, '2023-12-04');

>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(123) NOT NULL,
  `details_name` varchar(100) NOT NULL,
  `details_price` double(10,2) NOT NULL,
  `details_img` varchar(299) NOT NULL,
  `details_qty` int(3) NOT NULL,
  `details_feedback` int(1) NOT NULL DEFAULT 0,
  `product_id` int(123) NOT NULL,
  `order_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

<<<<<<< HEAD
=======
--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `details_name`, `details_price`, `details_img`, `details_qty`, `details_feedback`, `product_id`, `order_id`) VALUES
(158, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 0, 29, 130),
(159, 'Rau ngò (Parsley)', 30.00, 'view/images/product/raumui1.png', 1, 0, 31, 131),
(160, 'Rau muống (Morning glory)', 19.00, 'view/images/product/raumuong1.png', 1, 0, 26, 131),
(161, 'Nho xanh không hạt', 21.00, 'view/images/product/nho1.png', 1, 0, 5, 132);

>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(123) NOT NULL,
  `product_name` varchar(299) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_del` double(10,2) NOT NULL DEFAULT 0.00,
  `product_qty` int(3) NOT NULL,
  `product_view` int(123) NOT NULL,
  `product_des` longblob NOT NULL,
  `category_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `time_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

<<<<<<< HEAD
INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_del`, `product_qty`, `product_view`, `category_id`, `account_id`, `time_reg`) VALUES
(1, 'Quả sầu riêng', 21.00, 17.00, 0, 27, 3, 1, '2023-11-05'),
(2, 'Chuối', 15.00, 10.00, 0, 16, 3, 1, '2023-11-05'),
(3, 'Dâu tây California', 30.00, 0.00, 95, 14, 3, 7, '2023-11-05'),
(4, 'Cam Valencia', 37.00, 0.00, 200, 10, 3, 7, '2023-11-05'),
(5, 'Nho xanh không hạt', 21.00, 0.00, 96, 15, 3, 7, '2023-11-05'),
(6, 'Dừa xiêm', 19.00, 0.00, 200, 10, 3, 7, '2023-11-05'),
(7, 'Táo Fuji', 39.00, 0.00, 296, 15, 3, 1, '2023-11-05'),
(8, 'Dứa Cayenne', 32.00, 0.00, 200, 10, 3, 1, '2023-11-05'),
(11, 'Lê Anh Đào\r\n', 23.00, 0.00, 100, 10, 3, 1, '2023-11-05'),
(12, 'Kiwi Hayward', 23.00, 0.00, 200, 10, 3, 1, '2023-11-05'),
(13, 'Khoai tây (Potato', 18.00, 16.00, 94, 14, 2, 1, '2023-11-05'),
(14, 'Cà rốt (Carrot)', 18.00, 0.00, 200, 10, 2, 1, '2023-11-05'),
(15, 'Đậu hà lan (Brussels sprouts)', 36.00, 30.00, 299, 10, 2, 1, '2023-11-05'),
(16, 'Củ cải đường (Sugar beet)', 26.00, 0.00, 200, 10, 2, 1, '2023-11-05'),
(17, 'Củ cải đỏ (Beetroot)', 37.00, 0.00, 200, 13, 2, 1, '2023-11-05'),
(18, 'Củ hành (Onion)', 32.00, 0.00, 200, 10, 2, 1, '2023-11-05'),
(19, 'Củ đậu tương (Garlic) ', 30.00, 0.00, 200, 11, 2, 1, '2023-11-05'),
(20, 'Khoai lang (Sweet potato)', 28.00, 0.00, 200, 10, 2, 1, '2023-11-05'),
(21, 'Củ cải trắng (Turnip)', 24.00, 0.00, 100, 13, 2, 1, '2023-11-05'),
(22, 'Củ cải lẻ (Radish)', 37.00, 0.00, 200, 10, 2, 1, '2023-11-05'),
(24, 'Cải bắp (Cabbage)', 19.00, 0.00, 200, 10, 1, 1, '2023-11-05'),
(25, 'Xà lách (Lettuce)', 21.00, 0.00, 55, 111, 1, 1, '2023-11-05'),
(26, 'Rau muống (Morning glory)', 19.00, 0.00, 191, 30, 1, 1, '2023-11-05'),
(27, 'Cải xanh (Spinach)', 30.00, 0.00, 200, 10, 1, 1, '2023-11-05'),
(28, 'Rau mùi (Cilantro) ', 15.00, 0.00, 200, 12, 1, 1, '2023-11-05'),
(29, 'Rau cải thảo (Kale)', 21.00, 0.00, 171, 190, 1, 1, '2023-11-05'),
(30, 'Rau diếp cá (Watercress)', 26.00, 0.00, 199, 12, 1, 1, '2023-11-05'),
(31, 'Rau ngò (Parsley)', 30.00, 0.00, 181, 99, 1, 1, '2023-11-05'),
(32, 'Rau dền (Amaranth)', 23.00, 0.00, 199, 10, 1, 1, '2023-11-05');
=======
INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_del`, `product_qty`, `product_view`, `product_des`, `category_id`, `account_id`, `time_reg`) VALUES
(1, 'Quả sầu riêng', 21.00, 17.00, 0, 29, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(2, 'Chuối', 15.00, 10.00, 0, 17, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(3, 'Dâu tây California', 30.00, 0.00, 95, 14, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 7, '2023-11-05'),
(4, 'Cam Valencia', 37.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 7, '2023-11-05'),
(5, 'Nho xanh không hạt', 21.00, 0.00, 95, 15, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 7, '2023-11-05'),
(6, 'Dừa xiêm', 19.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 7, '2023-11-05'),
(7, 'Táo Fuji', 39.00, 0.00, 296, 15, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(8, 'Dứa Cayenne', 32.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(11, 'Lê Anh Đào\r\n', 23.00, 0.00, 100, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(12, 'Kiwi Hayward', 23.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 3, 1, '2023-11-05'),
(13, 'Khoai tây (Potato', 18.00, 16.00, 94, 14, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(14, 'Cà rốt (Carrot)', 18.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(15, 'Đậu hà lan (Brussels sprouts)', 36.00, 30.00, 299, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(16, 'Củ cải đường (Sugar beet)', 26.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(17, 'Củ cải đỏ (Beetroot)', 37.00, 0.00, 200, 13, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(18, 'Củ hành (Onion)', 32.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(19, 'Củ đậu tương (Garlic) ', 30.00, 0.00, 200, 11, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(20, 'Khoai lang (Sweet potato)', 28.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(21, 'Củ cải trắng (Turnip)', 24.00, 0.00, 100, 14, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(22, 'Củ cải lẻ (Radish)', 37.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 2, 1, '2023-11-05'),
(24, 'Cải bắp (Cabbage)', 19.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(25, 'Xà lách (Lettuce)', 21.00, 0.00, 53, 112, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(26, 'Rau muống (Morning glory)', 19.00, 0.00, 190, 33, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(27, 'Cải xanh (Spinach)', 30.00, 0.00, 200, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(28, 'Rau mùi (Cilantro) ', 15.00, 0.00, 200, 13, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(29, 'Rau cải thảo (Kale)', 21.00, 0.00, 168, 194, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(30, 'Rau diếp cá (Watercress)', 26.00, 0.00, 199, 12, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(31, 'Rau ngò (Parsley)', 30.00, 0.00, 179, 100, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05'),
(32, 'Rau dền (Amaranth)', 23.00, 0.00, 199, 10, 0x4e68e1baad70206dc3b42074e1baa3206e67e1baaf6e2076c3b420c491c3a279206e686120f09f9898, 1, 1, '2023-11-05');
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(123) NOT NULL,
  `rate_comment` varchar(100) NOT NULL,
  `rate_star` int(1) NOT NULL,
  `product_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
<<<<<<< HEAD
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_comment`, `rate_star`, `product_id`, `account_id`, `time_reg`) VALUES
(13, 'asda', 5, 29, 7, '2023-11-27 06:40:15'),
(14, 'asdasd', 5, 31, 7, '2023-11-27 06:41:31'),
(15, 'adsasda', 4, 29, 7, '2023-11-27 06:42:06'),
(16, 'asdas', 3, 29, 7, '2023-11-27 06:43:03');

--
=======
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`code_id`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `account_from` (`account_from`),
  ADD KEY `account_to` (`account_to`);

--
-- Chỉ mục cho bảng `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
<<<<<<< HEAD
  MODIFY `account_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
=======
  MODIFY `account_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
<<<<<<< HEAD
  MODIFY `cart_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
=======
  MODIFY `cart_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `code_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `image_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
<<<<<<< HEAD
  MODIFY `mess_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;
=======
  MODIFY `mess_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- AUTO_INCREMENT cho bảng `new`
--
ALTER TABLE `new`
  MODIFY `new_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
<<<<<<< HEAD
  MODIFY `order_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
=======
  MODIFY `order_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
<<<<<<< HEAD
  MODIFY `details_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
=======
  MODIFY `details_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
<<<<<<< HEAD
  MODIFY `rate_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
=======
  MODIFY `rate_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`account_from`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`account_to`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
<<<<<<< HEAD
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
=======
>>>>>>> bd174ab99adb975ecb64a6b12a9b7c8872218439
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
