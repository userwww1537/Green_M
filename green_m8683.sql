-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2023 lúc 11:56 AM
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
  `account_sex` varchar(3) NOT NULL,
  `account_address` varchar(80) NOT NULL,
  `account_number_pay` varchar(25) NOT NULL,
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

INSERT INTO `account` (`account_id`, `account_name`, `account_sex`, `account_address`, `account_number_pay`, `account_pay`, `account_avt`, `account_username`, `account_email`, `account_verified_mail`, `account_phone`, `account_pass`, `account_position`, `account_notify`, `account_status`, `time_reg`) VALUES
(1, 0x4e677579e1bb856e2054e1baa56e20c39d, 'Nam', '56a Cống Lỡ, Phường 15, Quận Tân Bình, TP Hồ Chí Minh', '1111222233334444', 'MBBank', 'view/images/account/Ý 30k$.jpg', 'nguyentany', 'nguyentany.tricker@gmail.com', 'Đã xác thực', '0345123856', '000', 'Shop', 'Buff đánh giá', 'Khóa', '2023-11-05 10:00:11'),
(7, 0xc490e1baad752056c4836e2044c5a96e67, '', '199 Đông Bắc, Phường Tân Chánh Hiệp, Quận 12, TP, Hồ Chí Minh', '', '', 'view/images/account/user.png', 'dauvandung', 'vandungdau583@gmail.com', 'Đã xác thực', '0358676293', '123', 'Khách hàng', '', 'Offline', '2023-11-13 06:14:55'),
(8, 0x4e677579e1bb856e205468616e68205475e1baa56e, '', '3d Tân Chánh Hiệp 17, Quận 12, TP. Hồ Chí Minh', '', '', 'view/images/account/user.png', 'nguyenthanhtuan', 'tuanxelu12@gmail.com', 'Đã xác thực', '0363156469', '123', 'Khách hàng', '', 'Offline', '2023-11-13 06:25:31'),
(9, 0x43c3b4204e616d, '', '', '', '', 'view/images/account/user.png', 'conam', 'Conam@gmail.com', 'Chưa xác thực', '', '123', 'Khách hàng', '', 'Offline', '2023-11-17 05:27:27'),
(10, 0x41646d696e, '', '', '', '', 'view/images/account/user.png', 'admin', 'admin@Green-m.Com', 'Chưa xác thực', '', '123', 'Quản trị viên', '', 'Online', '2023-11-17 08:29:37');

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
(129, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 7, 23, 9, 1, '2023-11-17 05:27:35'),
(130, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 29, 9, 1, '2023-11-17 05:27:35'),
(131, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 2, 25, 9, 1, '2023-11-17 05:27:35'),
(137, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 29, 10, 1, '2023-11-17 08:56:59'),
(138, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 1, 25, 10, 1, '2023-11-17 08:57:06'),
(141, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 1, 23, 1, 1, '2023-11-17 09:02:56');

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
(1, 'GREEN-M-8386', 30, 12, 'On', '2023-11-08 11:24:46');

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
(80, 'view/images/product/Lovepik_com-401551780-banana', 2),
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
(136, 'view/images/product/caingot1.png', 23),
(137, 'view/images/product/caingot2.png', 23),
(138, 'view/images/product/caingot3.png', 23),
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
  `account_from` int(123) NOT NULL,
  `account_to` int(123) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`mess_id`, `mess_content`, `account_from`, `account_to`, `reg_time`) VALUES
(116, 0x48656c6c6f, 7, 1, '2023-11-15 07:42:39'),
(117, 0x4368c3a06f, 1, 7, '2023-11-15 07:42:44'),
(118, 0x52e1baa36e68206b, 7, 1, '2023-11-15 07:42:46');

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
  `order_status` varchar(30) NOT NULL DEFAULT 'Đang xử lý',
  `account_id` int(123) NOT NULL,
  `shop_id` int(123) NOT NULL,
  `time_reg` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_total`, `order_pay`, `order_note`, `order_status`, `account_id`, `shop_id`, `time_reg`) VALUES
(71, 26.00, 'Ngân hàng', '', 'Đang vận chuyển', 1, 1, '2023-11-16'),
(75, 68.00, 'Tiền mặt', 'Anh cho vô túi dùm em', 'Đang xử lý', 8, 1, '2023-11-14'),
(76, 114.00, 'Ngân hàng', 'Nhớ bỏ dưa chua', 'Đã hủy', 1, 1, '2023-11-16'),
(77, 68.00, 'Tiền mặt', 'Anh để gọn giúp em', 'Đang xử lý', 1, 1, '2023-11-16'),
(78, 30.00, 'Tiền mặt', 'Ship nhanh nha ad', 'Đã hủy', 7, 1, '2023-11-10'),
(79, 36.00, 'Tiền mặt', 'da', 'Giao thành công', 7, 1, '2023-11-04');

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
  `order_id` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`details_id`, `details_name`, `details_price`, `details_img`, `details_qty`, `order_id`) VALUES
(64, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 1, 71),
(68, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 1, 75),
(69, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 75),
(70, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 1, 75),
(71, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 1, 76),
(72, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 76),
(73, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 1, 76),
(74, 'Khoai tây (Potato', 16.00, 'view/images/product/khoai1.png', 1, 76),
(75, 'Rau ngò (Parsley)', 30.00, 'view/images/product/raumui1.png', 1, 76),
(76, 'Rau cải ngọt (Broccoli)', 26.00, 'view/images/product/caingot1.png', 1, 77),
(77, 'Rau cải thảo (Kale)', 21.00, 'view/images/product/caithao1.png', 1, 77),
(78, 'Xà lách (Lettuce)', 21.00, 'view/images/product/xalach1.png', 1, 77),
(79, 'Đậu hà lan (Brussels sprouts)', 30.00, 'view/images/product/dauhalan1.png', 1, 78),
(80, 'Rau muống (Morning glory)', 19.00, 'view/images/product/raumuong1.png', 1, 79),
(81, 'Quả sầu riêng', 17.00, 'view/images/product/Lovepik_com-401576184-durian.png', 1, 79);

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
  `product_origin` varchar(29) NOT NULL,
  `product_view` int(123) NOT NULL,
  `category_id` int(123) NOT NULL,
  `account_id` int(123) NOT NULL,
  `time_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_del`, `product_qty`, `product_origin`, `product_view`, `category_id`, `account_id`, `time_reg`) VALUES
(1, 'Quả sầu riêng', 21.00, 17.00, -1, 'Daklak', 15, 3, 1, '2023-11-05 09:50:15'),
(2, 'Chuối', 15.00, 10.00, 200, 'Hà Tĩnh', 10, 3, 1, '2023-11-05 09:50:15'),
(3, 'Dâu tây California', 30.00, 0.00, 100, 'califonia', 10, 3, 1, '2023-11-05 09:53:12'),
(4, 'Cam Valencia', 37.00, 0.00, 200, 'Tây Ban Nha', 10, 3, 1, '2023-11-05 09:53:12'),
(5, 'Nho xanh không hạt', 21.00, 0.00, 99, 'Đà Lạt', 15, 3, 1, '2023-11-05 09:54:40'),
(6, 'Dừa xiêm', 19.00, 0.00, 200, 'Bến tre', 10, 3, 1, '2023-11-05 09:54:40'),
(7, 'Táo Fuji', 39.00, 0.00, 297, 'Nhật Bản', 14, 3, 1, '2023-11-05 09:55:54'),
(8, 'Dứa Cayenne', 32.00, 0.00, 200, 'Bình thuận', 10, 3, 1, '2023-11-05 09:55:54'),
(11, 'Lê Anh Đào\r\n', 23.00, 0.00, 100, 'Tây nguyên', 10, 3, 1, '2023-11-05 09:58:52'),
(12, 'Kiwi Hayward', 23.00, 0.00, 200, 'Hà Tĩnh', 10, 3, 1, '2023-11-05 09:58:52'),
(13, 'Khoai tây (Potato', 18.00, 16.00, 94, 'Ireland ', 13, 2, 1, '2023-11-05 10:01:23'),
(14, 'Cà rốt (Carrot)', 18.00, 0.00, 200, 'Trung quốc', 10, 2, 1, '2023-11-05 10:01:23'),
(15, 'Đậu hà lan (Brussels sprouts)', 36.00, 30.00, 299, 'Bỉ', 10, 2, 1, '2023-11-05 10:03:39'),
(16, 'Củ cải đường (Sugar beet)', 26.00, 0.00, 200, 'Nga', 10, 2, 1, '2023-11-05 10:03:39'),
(17, 'Củ cải đỏ (Beetroot)', 37.00, 0.00, 200, 'Ấn Độ', 13, 2, 1, '2023-11-05 10:05:25'),
(18, 'Củ hành (Onion)', 32.00, 0.00, 200, 'Trung Quốc', 10, 2, 1, '2023-11-05 10:05:25'),
(19, 'Củ đậu tương (Garlic) ', 30.00, 0.00, 200, 'Ireland ', 11, 2, 1, '2023-11-05 10:07:36'),
(20, 'Khoai lang (Sweet potato)', 28.00, 0.00, 200, 'Trung quốc', 10, 2, 1, '2023-11-05 10:07:36'),
(21, 'Củ cải trắng (Turnip)', 24.00, 0.00, 100, 'Nhật Bản', 13, 2, 1, '2023-11-05 10:09:05'),
(22, 'Củ cải lẻ (Radish)', 37.00, 0.00, 200, 'ÚC', 10, 2, 1, '2023-11-05 10:09:05'),
(23, 'Rau cải ngọt (Broccoli)', 26.00, 0.00, 67, ' Trung Quốc', 162, 1, 1, '2023-11-05 10:12:10'),
(24, 'Cải bắp (Cabbage)', 19.00, 0.00, 200, 'Bình thuận', 10, 1, 1, '2023-11-05 10:12:10'),
(25, 'Xà lách (Lettuce)', 21.00, 0.00, 85, 'Tây nguyên', 99, 1, 1, '2023-11-05 10:13:47'),
(26, 'Rau muống (Morning glory)', 19.00, 0.00, 199, 'Bến tre', 30, 1, 1, '2023-11-05 10:13:47'),
(27, 'Cải xanh (Spinach)', 30.00, 0.00, 200, 'Daklak', 10, 1, 1, '2023-11-05 10:15:14'),
(28, 'Rau mùi (Cilantro) ', 15.00, 0.00, 200, 'Bình thuận', 11, 1, 1, '2023-11-05 10:15:14'),
(29, 'Rau cải thảo (Kale)', 21.00, 0.00, 191, 'Tây nguyên', 118, 1, 1, '2023-11-05 10:16:21'),
(30, 'Rau diếp cá (Watercress)', 26.00, 0.00, 200, 'Bến tre', 12, 1, 1, '2023-11-05 10:16:21'),
(31, 'Rau ngò (Parsley)', 30.00, 0.00, 191, 'Nhật Bản', 98, 1, 1, '2023-11-05 10:17:16'),
(32, 'Rau dền (Amaranth)', 23.00, 0.00, 200, 'Trung quốc', 10, 1, 1, '2023-11-05 10:17:16');

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
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_comment`, `rate_star`, `product_id`, `account_id`, `time_reg`) VALUES
(1, 'Hehe', 5, 23, 1, '2023-11-02 13:42:54'),
(6, 'hàng đẹp', 5, 23, 1, '2023-11-07 16:05:17'),
(7, 'Xấu đui', 3, 23, 1, '2023-11-08 05:10:19'),
(8, 'Sản phẩm xấu vồn', 1, 23, 1, '2023-11-08 08:13:54'),
(9, 'Ổn', 5, 1, 1, '2023-11-09 17:01:44');

--
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
  ADD KEY `order_id` (`order_id`);

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
  MODIFY `account_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `code_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `image_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `new`
--
ALTER TABLE `new`
  MODIFY `new_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
