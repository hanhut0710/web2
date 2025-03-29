-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2025 lúc 07:14 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'hanhut', 'anhnhutdeptrai'),
(2, 'minleo', 'say_gex'),
(3, 'ngnuyen', 'say_gex'),
(4, 'ngnhuan', 'say_gex'),
(5, 'nguyenan', 'pass123'),
(6, 'tranbinh', 'pass456'),
(7, 'lecuong', 'pass789'),
(8, 'phamduy', 'pass159'),
(9, 'dangha', 'pass753'),
(10, 'votuan', 'pass951'),
(11, 'hoanglinh', 'pass357'),
(12, 'buitrung', 'pass852'),
(13, 'maiquang', 'pass741'),
(14, 'doanhuy', 'pass369'),
(15, 'truongkhoa', 'pass258'),
(16, 'phunglam', 'pass147'),
(17, 'caominh', 'pass654'),
(18, 'ngokhang', 'pass852'),
(19, 'lyson', 'pass321'),
(20, 'dinhphuoc', 'pass987'),
(21, 'tanghieu', 'pass654'),
(22, 'hanhuy', 'pass753'),
(23, 'vuvan', 'pass852'),
(24, 'duongthanh', 'pass159');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `address_line` varchar(255) NOT NULL DEFAULT '0',
  `ward` varchar(255) NOT NULL DEFAULT '0',
  `district` varchar(255) NOT NULL DEFAULT '0',
  `city` varchar(255) NOT NULL DEFAULT '0',
  `default` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT 0,
  `acc_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `phone`, `role`, `acc_id`) VALUES
(1, 'Huỳnh Anh Nhựt', '0123123123', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quanlity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sneakers'),
(2, 'Running Shoes'),
(3, 'Football Shoes'),
(4, 'Basketball Shoes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `id` int(11) NOT NULL,
  `func_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `functions`
--

INSERT INTO `functions` (`id`, `func_name`) VALUES
(1, 'Quản lý nhân viên'),
(2, 'Quản lý sản phẩm'),
(3, 'Quản lý khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quanlity` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `pay_method` enum('cash','banking') NOT NULL,
  `total_price` double NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `quanlity` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `Column 4` varchar(50) NOT NULL DEFAULT '0',
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `img_src` varchar(255) DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `img_src`, `category_id`) VALUES
(1, 'Adidas Superstar', 2590000, 10, './img/shoes/adidassuperstar_white.png', 1),
(2, 'Adidas Samba', 2690000, 10, './img/shoes/adidassamba_white.png', 1),
(3, 'Vans old skool', 2199000, 10, './img/shoes/vansoldskool_black.png', 1),
(4, 'Coverse Chuck 70', 2190000, 10, './img/shoes/coversechuck_black.png', 1),
(5, 'Puma Caven', 1890000, 10, './img/shoes/pumacaven_white.png', 1),
(6, 'Puma SpeedCat', 2490000, 10, './img/shoes/pumaspeedcat_black.png', 1),
(7, 'Nike Air Force 1', 2490000, 10, './img/shoes/nikeairforce_white.png', 1),
(8, 'Nike Jordan Low', 3490000, 10, './img/shoes/jordanlow_white.png', 1),
(9, 'Nike Jordan 1', 3900000, 10, './img/shoes/jordan1_black.png', 1),
(10, 'Coverse Star', 1990000, 10, './img/shoes/conversestar_black.png', 1),
(11, 'New Balance 530', 2590000, 10, './img/shoes/nb530_white.png', 2),
(12, 'New Balance 1906R', 2590000, 10, './img/shoes/nb1906R_black.png', 2),
(13, 'Nike Air Max', 2990000, 10, './img/shoes/nikeairmax_black.png', 2),
(14, 'Nike Basket Precision', 3890000, 10, './img/shoes/nikebasketprecision_black.png', 4),
(15, 'Nike Mercurial', 1850000, 10, './img/shoes/nikemercurial_black.png', 3),
(16, 'Nike Running Pegasus', 3190000, 10, './img/shoes/nikerunningpegasus_black.png', 2),
(17, 'Nike Vapor', 7390000, 10, './img/shoes/nikevapor_blue.png', 3),
(18, 'Vans SK8', 2190000, 10, './img/shoes/vanssk8_black.png', 1),
(19, 'Adidas Copa', 5590000, 10, './img/shoes/adidascopa_black.png', 3),
(20, 'Adidas Forum', 2690000, 10, './img/shoes/adidasforum_white.png', 4),
(21, 'Adidas Running Duramo ', 1700000, 10, './img/shoes/adidasrunningduramo_black.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(10) NOT NULL DEFAULT '',
  `brand` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `size`, `brand`) VALUES
(37, 1, 'Black', '36', 'Adidas'),
(38, 1, 'Black', '37', 'Adidas'),
(39, 1, 'Black', '38', 'Adidas'),
(40, 1, 'Black', '39', 'Adidas'),
(41, 1, 'Black', '40', 'Adidas'),
(42, 1, 'Black', '41', 'Adidas'),
(43, 1, 'Black', '42', 'Adidas'),
(44, 1, 'Black', '43', 'Adidas'),
(45, 1, 'Black', '44', 'Adidas'),
(46, 1, 'Green', '36', 'Adidas'),
(47, 1, 'Green', '37', 'Adidas'),
(48, 1, 'Green', '38', 'Adidas'),
(49, 1, 'Green', '39', 'Adidas'),
(50, 1, 'Green', '40', 'Adidas'),
(51, 1, 'Green', '41', 'Adidas'),
(52, 1, 'Green', '42', 'Adidas'),
(53, 1, 'Green', '43', 'Adidas'),
(54, 1, 'Green', '44', 'Adidas'),
(55, 1, 'Red', '36', 'Adidas'),
(56, 1, 'Red', '37', 'Adidas'),
(57, 1, 'Red', '38', 'Adidas'),
(58, 1, 'Red', '39', 'Adidas'),
(59, 1, 'Red', '40', 'Adidas'),
(60, 1, 'Red', '41', 'Adidas'),
(61, 1, 'Red', '42', 'Adidas'),
(62, 1, 'Red', '43', 'Adidas'),
(63, 1, 'Red', '44', 'Adidas'),
(64, 1, 'White', '36', 'Adidas'),
(65, 1, 'White', '37', 'Adidas'),
(66, 1, 'White', '38', 'Adidas'),
(67, 1, 'White', '39', 'Adidas'),
(68, 1, 'White', '40', 'Adidas'),
(69, 1, 'White', '41', 'Adidas'),
(70, 1, 'White', '42', 'Adidas'),
(71, 1, 'White', '43', 'Adidas'),
(72, 1, 'White', '44', 'Adidas'),
(73, 1, 'Black', '36', 'Adidas'),
(74, 1, 'Black', '37', 'Adidas'),
(75, 1, 'Black', '38', 'Adidas'),
(76, 1, 'Black', '39', 'Adidas'),
(77, 1, 'Black', '40', 'Adidas'),
(78, 1, 'Black', '41', 'Adidas'),
(79, 1, 'Black', '42', 'Adidas'),
(80, 1, 'Black', '43', 'Adidas'),
(81, 1, 'Black', '44', 'Adidas'),
(82, 1, 'Green', '36', 'Adidas'),
(83, 1, 'Green', '37', 'Adidas'),
(84, 1, 'Green', '38', 'Adidas'),
(85, 1, 'Green', '39', 'Adidas'),
(86, 1, 'Green', '40', 'Adidas'),
(87, 1, 'Green', '41', 'Adidas'),
(88, 1, 'Green', '42', 'Adidas'),
(89, 1, 'Green', '43', 'Adidas'),
(90, 1, 'Green', '44', 'Adidas'),
(91, 1, 'Red', '36', 'Adidas'),
(92, 1, 'Red', '37', 'Adidas'),
(93, 1, 'Red', '38', 'Adidas'),
(94, 1, 'Red', '39', 'Adidas'),
(95, 1, 'Red', '40', 'Adidas'),
(96, 1, 'Red', '41', 'Adidas'),
(97, 1, 'Red', '42', 'Adidas'),
(98, 1, 'Red', '43', 'Adidas'),
(99, 1, 'Red', '44', 'Adidas'),
(100, 1, 'White', '36', 'Adidas'),
(101, 1, 'White', '37', 'Adidas'),
(102, 1, 'White', '38', 'Adidas'),
(103, 1, 'White', '39', 'Adidas'),
(104, 1, 'White', '40', 'Adidas'),
(105, 1, 'White', '41', 'Adidas'),
(106, 1, 'White', '42', 'Adidas'),
(107, 1, 'White', '43', 'Adidas'),
(108, 1, 'White', '44', 'Adidas'),
(109, 2, 'Black', '36', 'Adidas'),
(110, 2, 'Black', '37', 'Adidas'),
(111, 2, 'Black', '38', 'Adidas'),
(112, 2, 'Black', '39', 'Adidas'),
(113, 2, 'Black', '40', 'Adidas'),
(114, 2, 'Black', '41', 'Adidas'),
(115, 2, 'Black', '42', 'Adidas'),
(116, 2, 'Black', '43', 'Adidas'),
(117, 2, 'Black', '44', 'Adidas'),
(118, 2, 'Blue', '36', 'Adidas'),
(119, 2, 'Blue', '37', 'Adidas'),
(120, 2, 'Blue', '38', 'Adidas'),
(121, 2, 'Blue', '39', 'Adidas'),
(122, 2, 'Blue', '40', 'Adidas'),
(123, 2, 'Blue', '41', 'Adidas'),
(124, 2, 'Blue', '42', 'Adidas'),
(125, 2, 'Blue', '43', 'Adidas'),
(126, 2, 'Blue', '44', 'Adidas'),
(127, 2, 'Red', '36', 'Adidas'),
(128, 2, 'Red', '37', 'Adidas'),
(129, 2, 'Red', '38', 'Adidas'),
(130, 2, 'Red', '39', 'Adidas'),
(131, 2, 'Red', '40', 'Adidas'),
(132, 2, 'Red', '41', 'Adidas'),
(133, 2, 'Red', '42', 'Adidas'),
(134, 2, 'Red', '43', 'Adidas'),
(135, 2, 'Red', '44', 'Adidas'),
(136, 2, 'White', '36', 'Adidas'),
(137, 2, 'White', '37', 'Adidas'),
(138, 2, 'White', '38', 'Adidas'),
(139, 2, 'White', '39', 'Adidas'),
(140, 2, 'White', '40', 'Adidas'),
(141, 2, 'White', '41', 'Adidas'),
(142, 2, 'White', '42', 'Adidas'),
(143, 2, 'White', '43', 'Adidas'),
(144, 2, 'White', '44', 'Adidas'),
(145, 3, 'Black', '36', 'Vans'),
(146, 3, 'Black', '37', 'Vans'),
(147, 3, 'Black', '38', 'Vans'),
(148, 3, 'Black', '39', 'Vans'),
(149, 3, 'Black', '40', 'Vans'),
(150, 3, 'Black', '41', 'Vans'),
(151, 3, 'Black', '42', 'Vans'),
(152, 3, 'Black', '43', 'Vans'),
(153, 3, 'Black', '44', 'Vans'),
(154, 3, 'Blue', '36', 'Vans'),
(155, 3, 'Blue', '37', 'Vans'),
(156, 3, 'Blue', '38', 'Vans'),
(157, 3, 'Blue', '39', 'Vans'),
(158, 3, 'Blue', '40', 'Vans'),
(159, 3, 'Blue', '41', 'Vans'),
(160, 3, 'Blue', '42', 'Vans'),
(161, 3, 'Blue', '43', 'Vans'),
(162, 3, 'Blue', '44', 'Vans'),
(163, 3, 'Green', '36', 'Vans'),
(164, 3, 'Green', '37', 'Vans'),
(165, 3, 'Green', '38', 'Vans'),
(166, 3, 'Green', '39', 'Vans'),
(167, 3, 'Green', '40', 'Vans'),
(168, 3, 'Green', '41', 'Vans'),
(169, 3, 'Green', '42', 'Vans'),
(170, 3, 'Green', '43', 'Vans'),
(171, 3, 'Green', '44', 'Vans'),
(172, 3, 'White', '36', 'Vans'),
(173, 3, 'White', '37', 'Vans'),
(174, 3, 'White', '38', 'Vans'),
(175, 3, 'White', '39', 'Vans'),
(176, 3, 'White', '40', 'Vans'),
(177, 3, 'White', '41', 'Vans'),
(178, 3, 'White', '42', 'Vans'),
(179, 3, 'White', '43', 'Vans'),
(180, 3, 'White', '44', 'Vans'),
(181, 4, 'Black', '36', 'Converse'),
(182, 4, 'Black', '37', 'Converse'),
(183, 4, 'Black', '38', 'Converse'),
(184, 4, 'Black', '39', 'Converse'),
(185, 4, 'Black', '40', 'Converse'),
(186, 4, 'Black', '41', 'Converse'),
(187, 4, 'Black', '42', 'Converse'),
(188, 4, 'Black', '43', 'Converse'),
(189, 4, 'Black', '44', 'Converse'),
(190, 4, 'Blue', '36', 'Converse'),
(191, 4, 'Blue', '37', 'Converse'),
(192, 4, 'Blue', '38', 'Converse'),
(193, 4, 'Blue', '39', 'Converse'),
(194, 4, 'Blue', '40', 'Converse'),
(195, 4, 'Blue', '41', 'Converse'),
(196, 4, 'Blue', '42', 'Converse'),
(197, 4, 'Blue', '43', 'Converse'),
(198, 4, 'Blue', '44', 'Converse'),
(199, 4, 'Green', '36', 'Converse'),
(200, 4, 'Green', '37', 'Converse'),
(201, 4, 'Green', '38', 'Converse'),
(202, 4, 'Green', '39', 'Converse'),
(203, 4, 'Green', '40', 'Converse'),
(204, 4, 'Green', '41', 'Converse'),
(205, 4, 'Green', '42', 'Converse'),
(206, 4, 'Green', '43', 'Converse'),
(207, 4, 'Green', '44', 'Converse'),
(208, 4, 'White', '36', 'Converse'),
(209, 4, 'White', '37', 'Converse'),
(210, 4, 'White', '38', 'Converse'),
(211, 4, 'White', '39', 'Converse'),
(212, 4, 'White', '40', 'Converse'),
(213, 4, 'White', '41', 'Converse'),
(214, 4, 'White', '42', 'Converse'),
(215, 4, 'White', '43', 'Converse'),
(216, 4, 'White', '44', 'Converse'),
(217, 5, 'Black', '36', 'Puma'),
(218, 5, 'Black', '37', 'Puma'),
(219, 5, 'Black', '38', 'Puma'),
(220, 5, 'Black', '39', 'Puma'),
(221, 5, 'Black', '40', 'Puma'),
(222, 5, 'Black', '41', 'Puma'),
(223, 5, 'Black', '42', 'Puma'),
(224, 5, 'Black', '43', 'Puma'),
(225, 5, 'Black', '44', 'Puma'),
(226, 5, 'Green', '36', 'Puma'),
(227, 5, 'Green', '37', 'Puma'),
(228, 5, 'Green', '38', 'Puma'),
(229, 5, 'Green', '39', 'Puma'),
(230, 5, 'Green', '40', 'Puma'),
(231, 5, 'Green', '41', 'Puma'),
(232, 5, 'Green', '42', 'Puma'),
(233, 5, 'Green', '43', 'Puma'),
(234, 5, 'Green', '44', 'Puma'),
(235, 5, 'Red', '36', 'Puma'),
(236, 5, 'Red', '37', 'Puma'),
(237, 5, 'Red', '38', 'Puma'),
(238, 5, 'Red', '39', 'Puma'),
(239, 5, 'Red', '40', 'Puma'),
(240, 5, 'Red', '41', 'Puma'),
(241, 5, 'Red', '42', 'Puma'),
(242, 5, 'Red', '43', 'Puma'),
(243, 5, 'Red', '44', 'Puma'),
(244, 5, 'White', '36', 'Puma'),
(245, 5, 'White', '37', 'Puma'),
(246, 5, 'White', '38', 'Puma'),
(247, 5, 'White', '39', 'Puma'),
(248, 5, 'White', '40', 'Puma'),
(249, 5, 'White', '41', 'Puma'),
(250, 5, 'White', '42', 'Puma'),
(251, 5, 'White', '43', 'Puma'),
(252, 5, 'White', '44', 'Puma'),
(253, 6, 'Black', '36', 'Adidas'),
(254, 6, 'Black', '37', 'Adidas'),
(255, 6, 'Black', '38', 'Adidas'),
(256, 6, 'Black', '39', 'Adidas'),
(257, 6, 'Black', '40', 'Adidas'),
(258, 6, 'Black', '41', 'Adidas'),
(259, 6, 'Black', '42', 'Adidas'),
(260, 6, 'Black', '43', 'Adidas'),
(261, 6, 'Black', '44', 'Adidas'),
(262, 6, 'Blue', '36', 'Adidas'),
(263, 6, 'Blue', '37', 'Adidas'),
(264, 6, 'Blue', '38', 'Adidas'),
(265, 6, 'Blue', '39', 'Adidas'),
(266, 6, 'Blue', '40', 'Adidas'),
(267, 6, 'Blue', '41', 'Adidas'),
(268, 6, 'Blue', '42', 'Adidas'),
(269, 6, 'Blue', '43', 'Adidas'),
(270, 6, 'Blue', '44', 'Adidas'),
(271, 6, 'Red', '36', 'Adidas'),
(272, 6, 'Red', '37', 'Adidas'),
(273, 6, 'Red', '38', 'Adidas'),
(274, 6, 'Red', '39', 'Adidas'),
(275, 6, 'Red', '40', 'Adidas'),
(276, 6, 'Red', '41', 'Adidas'),
(277, 6, 'Red', '42', 'Adidas'),
(278, 6, 'Red', '43', 'Adidas'),
(279, 6, 'Red', '44', 'Adidas'),
(280, 6, 'Yellow', '36', 'Adidas'),
(281, 6, 'Yellow', '37', 'Adidas'),
(282, 6, 'Yellow', '38', 'Adidas'),
(283, 6, 'Yellow', '39', 'Adidas'),
(284, 6, 'Yellow', '40', 'Adidas'),
(285, 6, 'Yellow', '41', 'Adidas'),
(286, 6, 'Yellow', '42', 'Adidas'),
(287, 6, 'Yellow', '43', 'Adidas'),
(288, 6, 'Yellow', '44', 'Adidas'),
(289, 7, 'Black', '36', 'Nike'),
(290, 7, 'Black', '37', 'Nike'),
(291, 7, 'Black', '38', 'Nike'),
(292, 7, 'Black', '39', 'Nike'),
(293, 7, 'Black', '40', 'Nike'),
(294, 7, 'Black', '41', 'Nike'),
(295, 7, 'Black', '42', 'Nike'),
(296, 7, 'Black', '43', 'Nike'),
(297, 7, 'Black', '44', 'Nike'),
(298, 7, 'Blue', '36', 'Nike'),
(299, 7, 'Blue', '37', 'Nike'),
(300, 7, 'Blue', '38', 'Nike'),
(301, 7, 'Blue', '39', 'Nike'),
(302, 7, 'Blue', '40', 'Nike'),
(303, 7, 'Blue', '41', 'Nike'),
(304, 7, 'Blue', '42', 'Nike'),
(305, 7, 'Blue', '43', 'Nike'),
(306, 7, 'Blue', '44', 'Nike'),
(307, 7, 'Red', '36', 'Nike'),
(308, 7, 'Red', '37', 'Nike'),
(309, 7, 'Red', '38', 'Nike'),
(310, 7, 'Red', '39', 'Nike'),
(311, 7, 'Red', '40', 'Nike'),
(312, 7, 'Red', '41', 'Nike'),
(313, 7, 'Red', '42', 'Nike'),
(314, 7, 'Red', '43', 'Nike'),
(315, 7, 'Red', '44', 'Nike'),
(316, 7, 'White', '36', 'Nike'),
(317, 7, 'White', '37', 'Nike'),
(318, 7, 'White', '38', 'Nike'),
(319, 7, 'White', '39', 'Nike'),
(320, 7, 'White', '40', 'Nike'),
(321, 7, 'White', '41', 'Nike'),
(322, 7, 'White', '42', 'Nike'),
(323, 7, 'White', '43', 'Nike'),
(324, 7, 'White', '44', 'Nike'),
(325, 8, 'Black', '36', 'Nike'),
(326, 8, 'Black', '37', 'Nike'),
(327, 8, 'Black', '38', 'Nike'),
(328, 8, 'Black', '39', 'Nike'),
(329, 8, 'Black', '40', 'Nike'),
(330, 8, 'Black', '41', 'Nike'),
(331, 8, 'Black', '42', 'Nike'),
(332, 8, 'Black', '43', 'Nike'),
(333, 8, 'Black', '44', 'Nike'),
(334, 8, 'Blue', '36', 'Nike'),
(335, 8, 'Blue', '37', 'Nike'),
(336, 8, 'Blue', '38', 'Nike'),
(337, 8, 'Blue', '39', 'Nike'),
(338, 8, 'Blue', '40', 'Nike'),
(339, 8, 'Blue', '41', 'Nike'),
(340, 8, 'Blue', '42', 'Nike'),
(341, 8, 'Blue', '43', 'Nike'),
(342, 8, 'Blue', '44', 'Nike'),
(343, 8, 'Red', '36', 'Nike'),
(344, 8, 'Red', '37', 'Nike'),
(345, 8, 'Red', '38', 'Nike'),
(346, 8, 'Red', '39', 'Nike'),
(347, 8, 'Red', '40', 'Nike'),
(348, 8, 'Red', '41', 'Nike'),
(349, 8, 'Red', '42', 'Nike'),
(350, 8, 'Red', '43', 'Nike'),
(351, 8, 'Red', '44', 'Nike'),
(352, 8, 'White', '36', 'Nike'),
(353, 8, 'White', '37', 'Nike'),
(354, 8, 'White', '38', 'Nike'),
(355, 8, 'White', '39', 'Nike'),
(356, 8, 'White', '40', 'Nike'),
(357, 8, 'White', '41', 'Nike'),
(358, 8, 'White', '42', 'Nike'),
(359, 8, 'White', '43', 'Nike'),
(360, 8, 'White', '44', 'Nike'),
(361, 9, 'Black', '36', 'Nike'),
(362, 9, 'Black', '37', 'Nike'),
(363, 9, 'Black', '38', 'Nike'),
(364, 9, 'Black', '39', 'Nike'),
(365, 9, 'Black', '40', 'Nike'),
(366, 9, 'Black', '41', 'Nike'),
(367, 9, 'Black', '42', 'Nike'),
(368, 9, 'Black', '43', 'Nike'),
(369, 9, 'Black', '44', 'Nike'),
(370, 9, 'Blue', '36', 'Nike'),
(371, 9, 'Blue', '37', 'Nike'),
(372, 9, 'Blue', '38', 'Nike'),
(373, 9, 'Blue', '39', 'Nike'),
(374, 9, 'Blue', '40', 'Nike'),
(375, 9, 'Blue', '41', 'Nike'),
(376, 9, 'Blue', '42', 'Nike'),
(377, 9, 'Blue', '43', 'Nike'),
(378, 9, 'Blue', '44', 'Nike'),
(379, 9, 'Red', '36', 'Nike'),
(380, 9, 'Red', '37', 'Nike'),
(381, 9, 'Red', '38', 'Nike'),
(382, 9, 'Red', '39', 'Nike'),
(383, 9, 'Red', '40', 'Nike'),
(384, 9, 'Red', '41', 'Nike'),
(385, 9, 'Red', '42', 'Nike'),
(386, 9, 'Red', '43', 'Nike'),
(387, 9, 'Red', '44', 'Nike'),
(388, 9, 'Green', '36', 'Nike'),
(389, 9, 'Green', '37', 'Nike'),
(390, 9, 'Green', '38', 'Nike'),
(391, 9, 'Green', '39', 'Nike'),
(392, 9, 'Green', '40', 'Nike'),
(393, 9, 'Green', '41', 'Nike'),
(394, 9, 'Green', '42', 'Nike'),
(395, 9, 'Green', '43', 'Nike'),
(396, 9, 'Green', '44', 'Nike'),
(397, 10, 'Black', '36', 'Coverse'),
(398, 10, 'Black', '37', 'Coverse'),
(399, 10, 'Black', '38', 'Coverse'),
(400, 10, 'Black', '39', 'Coverse'),
(401, 10, 'Black', '40', 'Coverse'),
(402, 10, 'Black', '41', 'Coverse'),
(403, 10, 'Black', '42', 'Coverse'),
(404, 10, 'Black', '43', 'Coverse'),
(405, 10, 'Black', '44', 'Coverse'),
(406, 10, 'Black', '45', 'Coverse'),
(407, 10, 'White', '36', 'Coverse'),
(408, 10, 'White', '37', 'Coverse'),
(409, 10, 'White', '38', 'Coverse'),
(410, 10, 'White', '39', 'Coverse'),
(411, 10, 'White', '40', 'Coverse'),
(412, 10, 'White', '41', 'Coverse'),
(413, 10, 'White', '42', 'Coverse'),
(414, 10, 'White', '43', 'Coverse'),
(415, 10, 'White', '44', 'Coverse'),
(416, 10, 'White', '45', 'Coverse'),
(417, 11, 'White', '36', 'New Balance'),
(418, 11, 'White', '37', 'New Balance'),
(419, 11, 'White', '38', 'New Balance'),
(420, 11, 'White', '39', 'New Balance'),
(421, 11, 'White', '40', 'New Balance'),
(422, 11, 'White', '41', 'New Balance'),
(423, 11, 'White', '42', 'New Balance'),
(424, 11, 'White', '43', 'New Balance'),
(425, 11, 'White', '44', 'New Balance'),
(426, 11, 'White', '45', 'New Balance'),
(427, 12, 'Black', '36', 'New Balance'),
(428, 12, 'Black', '37', 'New Balance'),
(429, 12, 'Black', '38', 'New Balance'),
(430, 12, 'Black', '39', 'New Balance'),
(431, 12, 'Black', '40', 'New Balance'),
(432, 12, 'Black', '41', 'New Balance'),
(433, 12, 'Black', '42', 'New Balance'),
(434, 12, 'Black', '43', 'New Balance'),
(435, 12, 'Black', '44', 'New Balance'),
(436, 12, 'Black', '45', 'New Balance'),
(437, 12, 'White', '36', 'New Balance'),
(438, 12, 'White', '37', 'New Balance'),
(439, 12, 'White', '38', 'New Balance'),
(440, 12, 'White', '39', 'New Balance'),
(441, 12, 'White', '40', 'New Balance'),
(442, 12, 'White', '41', 'New Balance'),
(443, 12, 'White', '42', 'New Balance'),
(444, 12, 'White', '43', 'New Balance'),
(445, 12, 'White', '44', 'New Balance'),
(446, 12, 'White', '45', 'New Balance'),
(507, 13, 'Black', '36', 'Nike'),
(508, 13, 'Black', '37', 'Nike'),
(509, 13, 'Black', '38', 'Nike'),
(510, 13, 'Black', '39', 'Nike'),
(511, 13, 'Black', '40', 'Nike'),
(512, 13, 'Black', '41', 'Nike'),
(513, 13, 'Black', '42', 'Nike'),
(514, 13, 'Black', '43', 'Nike'),
(515, 13, 'Black', '44', 'Nike'),
(516, 13, 'Black', '45', 'Nike'),
(517, 13, 'Red', '36', 'Nike'),
(518, 13, 'Red', '37', 'Nike'),
(519, 13, 'Red', '38', 'Nike'),
(520, 13, 'Red', '39', 'Nike'),
(521, 13, 'Red', '40', 'Nike'),
(522, 13, 'Red', '41', 'Nike'),
(523, 13, 'Red', '42', 'Nike'),
(524, 13, 'Red', '43', 'Nike'),
(525, 13, 'Red', '44', 'Nike'),
(526, 13, 'Red', '45', 'Nike'),
(527, 13, 'White', '36', 'Nike'),
(528, 13, 'White', '37', 'Nike'),
(529, 13, 'White', '38', 'Nike'),
(530, 13, 'White', '39', 'Nike'),
(531, 13, 'White', '40', 'Nike'),
(532, 13, 'White', '41', 'Nike'),
(533, 13, 'White', '42', 'Nike'),
(534, 13, 'White', '43', 'Nike'),
(535, 13, 'White', '44', 'Nike'),
(536, 13, 'White', '45', 'Nike'),
(537, 14, 'Black', '36', 'Nike'),
(538, 14, 'Black', '37', 'Nike'),
(539, 14, 'Black', '38', 'Nike'),
(540, 14, 'Black', '39', 'Nike'),
(541, 14, 'Black', '40', 'Nike'),
(542, 14, 'Black', '41', 'Nike'),
(543, 14, 'Black', '42', 'Nike'),
(544, 14, 'Black', '43', 'Nike'),
(545, 14, 'Black', '44', 'Nike'),
(546, 14, 'Black', '45', 'Nike'),
(547, 14, 'Red', '36', 'Nike'),
(548, 14, 'Red', '37', 'Nike'),
(549, 14, 'Red', '38', 'Nike'),
(550, 14, 'Red', '39', 'Nike'),
(551, 14, 'Red', '40', 'Nike'),
(552, 14, 'Red', '41', 'Nike'),
(553, 14, 'Red', '42', 'Nike'),
(554, 14, 'Red', '43', 'Nike'),
(555, 14, 'Red', '44', 'Nike'),
(556, 14, 'Red', '45', 'Nike'),
(557, 15, 'Black', '36', 'Nike'),
(558, 15, 'Black', '37', 'Nike'),
(559, 15, 'Black', '38', 'Nike'),
(560, 15, 'Black', '39', 'Nike'),
(561, 15, 'Black', '40', 'Nike'),
(562, 15, 'Black', '41', 'Nike'),
(563, 15, 'Black', '42', 'Nike'),
(564, 15, 'Black', '43', 'Nike'),
(565, 15, 'Black', '44', 'Nike'),
(566, 15, 'Black', '45', 'Nike'),
(567, 15, 'Blue', '36', 'Nike'),
(568, 15, 'Blue', '37', 'Nike'),
(569, 15, 'Blue', '38', 'Nike'),
(570, 15, 'Blue', '39', 'Nike'),
(571, 15, 'Blue', '40', 'Nike'),
(572, 15, 'Blue', '41', 'Nike'),
(573, 15, 'Blue', '42', 'Nike'),
(574, 15, 'Blue', '43', 'Nike'),
(575, 15, 'Blue', '44', 'Nike'),
(576, 15, 'Blue', '45', 'Nike'),
(577, 15, 'Yellow', '36', 'Nike'),
(578, 15, 'Yellow', '37', 'Nike'),
(579, 15, 'Yellow', '38', 'Nike'),
(580, 15, 'Yellow', '39', 'Nike'),
(581, 15, 'Yellow', '40', 'Nike'),
(582, 15, 'Yellow', '41', 'Nike'),
(583, 15, 'Yellow', '42', 'Nike'),
(584, 15, 'Yellow', '43', 'Nike'),
(585, 15, 'Yellow', '44', 'Nike'),
(586, 15, 'Yellow', '45', 'Nike'),
(587, 16, 'Black', '36', 'Nike'),
(588, 16, 'Black', '37', 'Nike'),
(589, 16, 'Black', '38', 'Nike'),
(590, 16, 'Black', '39', 'Nike'),
(591, 16, 'Black', '40', 'Nike'),
(592, 16, 'Black', '41', 'Nike'),
(593, 16, 'Black', '42', 'Nike'),
(594, 16, 'Black', '43', 'Nike'),
(595, 16, 'Black', '44', 'Nike'),
(596, 16, 'Black', '45', 'Nike'),
(597, 16, 'Blue', '36', 'Nike'),
(598, 16, 'Blue', '37', 'Nike'),
(599, 16, 'Blue', '38', 'Nike'),
(600, 16, 'Blue', '39', 'Nike'),
(601, 16, 'Blue', '40', 'Nike'),
(602, 16, 'Blue', '41', 'Nike'),
(603, 16, 'Blue', '42', 'Nike'),
(604, 16, 'Blue', '43', 'Nike'),
(605, 16, 'Blue', '44', 'Nike'),
(606, 16, 'Blue', '45', 'Nike'),
(607, 16, 'Red', '36', 'Nike'),
(608, 16, 'Red', '37', 'Nike'),
(609, 16, 'Red', '38', 'Nike'),
(610, 16, 'Red', '39', 'Nike'),
(611, 16, 'Red', '40', 'Nike'),
(612, 16, 'Red', '41', 'Nike'),
(613, 16, 'Red', '42', 'Nike'),
(614, 16, 'Red', '43', 'Nike'),
(615, 16, 'Red', '44', 'Nike'),
(616, 16, 'Red', '45', 'Nike'),
(617, 16, 'White', '36', 'Nike'),
(618, 16, 'White', '37', 'Nike'),
(619, 16, 'White', '38', 'Nike'),
(620, 16, 'White', '39', 'Nike'),
(621, 16, 'White', '40', 'Nike'),
(622, 16, 'White', '41', 'Nike'),
(623, 16, 'White', '42', 'Nike'),
(624, 16, 'White', '43', 'Nike'),
(625, 16, 'White', '44', 'Nike'),
(626, 16, 'White', '45', 'Nike'),
(627, 17, 'Blue', '36', 'Nike'),
(628, 17, 'Blue', '37', 'Nike'),
(629, 17, 'Blue', '38', 'Nike'),
(630, 17, 'Blue', '39', 'Nike'),
(631, 17, 'Blue', '40', 'Nike'),
(632, 17, 'Blue', '41', 'Nike'),
(633, 17, 'Blue', '42', 'Nike'),
(634, 17, 'Blue', '43', 'Nike'),
(635, 17, 'Blue', '44', 'Nike'),
(636, 17, 'Blue', '45', 'Nike'),
(637, 17, 'Red', '36', 'Nike'),
(638, 17, 'Red', '37', 'Nike'),
(639, 17, 'Red', '38', 'Nike'),
(640, 17, 'Red', '39', 'Nike'),
(641, 17, 'Red', '40', 'Nike'),
(642, 17, 'Red', '41', 'Nike'),
(643, 17, 'Red', '42', 'Nike'),
(644, 17, 'Red', '43', 'Nike'),
(645, 17, 'Red', '44', 'Nike'),
(646, 17, 'Red', '45', 'Nike'),
(647, 18, 'Black', '36', 'Vans'),
(648, 18, 'Black', '37', 'Vans'),
(649, 18, 'Black', '38', 'Vans'),
(650, 18, 'Black', '39', 'Vans'),
(651, 18, 'Black', '40', 'Vans'),
(652, 18, 'Black', '41', 'Vans'),
(653, 18, 'Black', '42', 'Vans'),
(654, 18, 'Black', '43', 'Vans'),
(655, 18, 'Black', '44', 'Vans'),
(656, 18, 'Black', '45', 'Vans'),
(657, 18, 'Blue', '36', 'Vans'),
(658, 18, 'Blue', '37', 'Vans'),
(659, 18, 'Blue', '38', 'Vans'),
(660, 18, 'Blue', '39', 'Vans'),
(661, 18, 'Blue', '40', 'Vans'),
(662, 18, 'Blue', '41', 'Vans'),
(663, 18, 'Blue', '42', 'Vans'),
(664, 18, 'Blue', '43', 'Vans'),
(665, 18, 'Blue', '44', 'Vans'),
(666, 18, 'Blue', '45', 'Vans'),
(667, 19, 'Black', '36', 'Adidas'),
(668, 19, 'Black', '37', 'Adidas'),
(669, 19, 'Black', '38', 'Adidas'),
(670, 19, 'Black', '39', 'Adidas'),
(671, 19, 'Black', '40', 'Adidas'),
(672, 19, 'Black', '41', 'Adidas'),
(673, 19, 'Black', '42', 'Adidas'),
(674, 19, 'Black', '43', 'Adidas'),
(675, 19, 'Black', '44', 'Adidas'),
(676, 19, 'Black', '45', 'Adidas'),
(677, 19, 'Red', '36', 'Adidas'),
(678, 19, 'Red', '37', 'Adidas'),
(679, 19, 'Red', '38', 'Adidas'),
(680, 19, 'Red', '39', 'Adidas'),
(681, 19, 'Red', '40', 'Adidas'),
(682, 19, 'Red', '41', 'Adidas'),
(683, 19, 'Red', '42', 'Adidas'),
(684, 19, 'Red', '43', 'Adidas'),
(685, 19, 'Red', '44', 'Adidas'),
(686, 19, 'Red', '45', 'Adidas'),
(687, 20, 'White', '36', 'Adidas'),
(688, 20, 'White', '37', 'Adidas'),
(689, 20, 'White', '38', 'Adidas'),
(690, 20, 'White', '39', 'Adidas'),
(691, 20, 'White', '40', 'Adidas'),
(692, 20, 'White', '41', 'Adidas'),
(693, 20, 'White', '42', 'Adidas'),
(694, 20, 'White', '43', 'Adidas'),
(695, 20, 'White', '44', 'Adidas'),
(696, 20, 'White', '45', 'Adidas'),
(697, 20, 'Blue', '36', 'Adidas'),
(698, 20, 'Blue', '37', 'Adidas'),
(699, 20, 'Blue', '38', 'Adidas'),
(700, 20, 'Blue', '39', 'Adidas'),
(701, 20, 'Blue', '40', 'Adidas'),
(702, 20, 'Blue', '41', 'Adidas'),
(703, 20, 'Blue', '42', 'Adidas'),
(704, 20, 'Blue', '43', 'Adidas'),
(705, 20, 'Blue', '44', 'Adidas'),
(706, 20, 'Blue', '45', 'Adidas'),
(707, 21, 'Black', '36', 'Adidas'),
(708, 21, 'Black', '37', 'Adidas'),
(709, 21, 'Black', '38', 'Adidas'),
(710, 21, 'Black', '39', 'Adidas'),
(711, 21, 'Black', '40', 'Adidas'),
(712, 21, 'Black', '41', 'Adidas'),
(713, 21, 'Black', '42', 'Adidas'),
(714, 21, 'Black', '43', 'Adidas'),
(715, 21, 'Black', '44', 'Adidas'),
(716, 21, 'Black', '45', 'Adidas'),
(717, 21, 'Blue', '36', 'Adidas'),
(718, 21, 'Blue', '37', 'Adidas'),
(719, 21, 'Blue', '38', 'Adidas'),
(720, 21, 'Blue', '39', 'Adidas'),
(721, 21, 'Blue', '40', 'Adidas'),
(722, 21, 'Blue', '41', 'Adidas'),
(723, 21, 'Blue', '42', 'Adidas'),
(724, 21, 'Blue', '43', 'Adidas'),
(725, 21, 'Blue', '44', 'Adidas'),
(726, 21, 'Blue', '45', 'Adidas'),
(727, 21, 'Red', '36', 'Adidas'),
(728, 21, 'Red', '37', 'Adidas'),
(729, 21, 'Red', '38', 'Adidas'),
(730, 21, 'Red', '39', 'Adidas'),
(731, 21, 'Red', '40', 'Adidas'),
(732, 21, 'Red', '41', 'Adidas'),
(733, 21, 'Red', '42', 'Adidas'),
(734, 21, 'Red', '43', 'Adidas'),
(735, 21, 'Red', '44', 'Adidas'),
(736, 21, 'Red', '45', 'Adidas'),
(737, 21, 'White', '36', 'Adidas'),
(738, 21, 'White', '37', 'Adidas'),
(739, 21, 'White', '38', 'Adidas'),
(740, 21, 'White', '39', 'Adidas'),
(741, 21, 'White', '40', 'Adidas'),
(742, 21, 'White', '41', 'Adidas'),
(743, 21, 'White', '42', 'Adidas'),
(744, 21, 'White', '43', 'Adidas'),
(745, 21, 'White', '44', 'Adidas'),
(746, 21, 'White', '45', 'Adidas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `right`
--

CREATE TABLE `right` (
  `id` int(11) NOT NULL,
  `right_name` varchar(255) NOT NULL DEFAULT '0',
  `acc_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `right`
--

INSERT INTO `right` (`id`, `right_name`, `acc_id`) VALUES
(1, 'admin', 1),
(9, 'User', 5),
(10, 'User', 6),
(11, 'User', 7),
(12, 'User', 8),
(13, 'User', 9),
(14, 'User', 10),
(15, 'User', 11),
(16, 'User', 12),
(17, 'User', 13),
(18, 'User', 14),
(19, 'User', 15),
(20, 'User', 16),
(21, 'User', 17),
(22, 'User', 18),
(23, 'User', 19),
(24, 'User', 20),
(25, 'User', 21),
(26, 'User', 22),
(27, 'User', 23),
(28, 'User', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `right_func`
--

CREATE TABLE `right_func` (
  `id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL DEFAULT 0,
  `func_id` int(11) NOT NULL DEFAULT 0,
  `action` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `right_func`
--

INSERT INTO `right_func` (`id`, `right_id`, `func_id`, `action`) VALUES
(1, 1, 1, 'thêm'),
(2, 1, 1, 'sửa'),
(3, 1, 1, 'xoa'),
(4, 1, 2, 'thêm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `sup_name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `sup_name`, `email`, `phone`) VALUES
(1, 'Pou Chen Group', 'ir@pouchen.com', '8864 2461 5678'),
(2, 'TBS Group', 'hotmail@thienphusi.com', '0272 3775 544'),
(3, 'Yeu Yuen Industrial Holdings', 'investor@yeuyuen.com', '852 2370 5111'),
(4, 'Stella International', 'ir@stella.com.hk', '852 2956 1383'),
(5, 'Samho VietNam', 'caovanxanh@samho.com', '0274 222 0346 ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `acc_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone`, `acc_id`) VALUES
(1, 'Nguyễn An', '0987654321', 5),
(2, 'Trần Bình', '0978123456', 6),
(3, 'Lê Cường', '0967345678', 7),
(4, 'Phạm Duy', '0956789123', 8),
(5, 'Đặng Hà', '0945678901', 9),
(6, 'Võ Tuấn', '0934567890', 10),
(7, 'Hoàng Linh', '0923456789', 11),
(8, 'Bùi Trung', '0912345678', 12),
(9, 'Mai Quang', '0909876543', 13),
(10, 'Doãn Huy', '0898765432', 14),
(11, 'Trương Khoa', '0887654321', 15),
(12, 'Phùng Lâm', '0876543210', 16),
(13, 'Cao Minh', '0865432109', 17),
(14, 'Ngô Khang', '0854321098', 18),
(15, 'Lý Sơn', '0843210987', 19),
(16, 'Đinh Phước', '0832109876', 20),
(17, 'Tăng Hiếu', '0821098765', 21),
(18, 'Hàn Huy', '0810987654', 22),
(19, 'Vũ Văn', '0809876543', 23),
(20, 'Dương Thành', '0798765432', 24);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__users` (`user_id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_admin_accounts` (`acc_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_users` (`user_id`),
  ADD KEY `FK_cart_products` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__supplier` (`sup_id`),
  ADD KEY `FK_import_products` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_oders_users` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_details_products` (`product_id`),
  ADD KEY `FK_order_details_orders` (`order_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_status_orders` (`order_id`),
  ADD KEY `FK_order_status_admin` (`admin_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__products` (`product_id`);

--
-- Chỉ mục cho bảng `right`
--
ALTER TABLE `right`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__accounts` (`acc_id`);

--
-- Chỉ mục cho bảng `right_func`
--
ALTER TABLE `right_func`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__right` (`right_id`),
  ADD KEY `FK_right_func_functions` (`func_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_accounts` (`acc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=747;

--
-- AUTO_INCREMENT cho bảng `right`
--
ALTER TABLE `right`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `right_func`
--
ALTER TABLE `right_func`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_accounts` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_cart_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `FK__supplier` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_import_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_oders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_order_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_order_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `FK_order_status_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_order_status_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `FK__products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `right`
--
ALTER TABLE `right`
  ADD CONSTRAINT `FK__accounts` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `right_func`
--
ALTER TABLE `right_func`
  ADD CONSTRAINT `FK__right` FOREIGN KEY (`right_id`) REFERENCES `right` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_right_func_functions` FOREIGN KEY (`func_id`) REFERENCES `functions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_accounts` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
