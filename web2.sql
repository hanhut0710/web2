-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2025 lúc 03:38 AM
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
(24, 'duongthanh', 'pass159'),
(25, 'nguyenchodebienthaitop1sv', 'nguyenchode');

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
(3, 'Huỳnh Anh Nhựt', '0926213561', 2, 1);

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
(1, 'Casualwear'),
(2, 'Running Shoes'),
(3, 'Football Shoes'),
(4, 'Basketball Shoes'),
(5, 'Sportwear');

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
  `img_src` varchar(255) DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img_src`, `category_id`) VALUES
(1, 'Adidas Superstar', 2590000, './img/shoes/adidassuperstar_black.png', 1),
(2, 'Adidas Samba', 2690000, './img/shoes/adidassamba_black.png', 1),
(3, 'Vans old skool', 2199000, './img/shoes/vansoldskool_black.png', 1),
(4, 'Converse Chuck 70', 2190000, './img/shoes/conversechuck_black.png', 1),
(5, 'Puma Caven', 1890000, './img/shoes/pumacaven_black.png', 5),
(6, 'Puma SpeedCat', 2490000, './img/shoes/pumaspeedcat_black.png', 5),
(7, 'Nike Air Force 1', 2490000, './img/shoes/nikeairforce_black.png', 5),
(8, 'Nike Jordan Low', 3490000, './img/shoes/jordanlow_black.png', 5),
(9, 'Nike Jordan 1', 3900000, './img/shoes/jordan1_black.png', 5),
(10, 'Converse Star', 1990000, './img/shoes/conversestar_black.png', 1),
(11, 'New Balance 530', 2590000, './img/shoes/nb530_white.png', 5),
(12, 'New Balance 1906R', 2590000, './img/shoes/nb1906R_black.png', 5),
(13, 'Nike Air Max', 2990000, './img/shoes/nikeairmax_black.png', 5),
(14, 'Nike Basket Precision', 3890000, './img/shoes/nikebasketprecision_black.png', 4),
(15, 'Nike Mercurial', 1850000, './img/shoes/nikemercurial_black.png', 3),
(16, 'Nike Running Pegasus', 3190000, './img/shoes/nikerunningpegasus_black.png', 2),
(17, 'Nike Vapor', 7390000, './img/shoes/nikevapor_blue.png', 3),
(18, 'Vans SK8', 2190000, './img/shoes/vanssk8_black.png', 1),
(19, 'Adidas Copa', 5590000, './img/shoes/adidascopa_black.png', 3),
(20, 'Adidas Forum', 2690000, './img/shoes/adidasforum_white.png', 1),
(21, 'Adidas Running Duramo ', 1700000, './img/shoes/adidasrunningduramo_black.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '',
  `size` varchar(10) NOT NULL DEFAULT '',
  `brand` varchar(50) NOT NULL DEFAULT '',
  `img_src` varchar(255) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color`, `size`, `brand`, `img_src`, `stock`) VALUES
(37, 1, 'Black', '36', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(38, 1, 'Black', '37', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(39, 1, 'Black', '38', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(40, 1, 'Black', '39', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(41, 1, 'Black', '40', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(42, 1, 'Black', '41', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(43, 1, 'Black', '42', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(44, 1, 'Black', '43', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(45, 1, 'Black', '44', 'Adidas', './img/shoes/adidassuperstar_black.png', 10),
(46, 1, 'Green', '36', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(47, 1, 'Green', '37', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(48, 1, 'Green', '38', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(49, 1, 'Green', '39', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(50, 1, 'Green', '40', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(51, 1, 'Green', '41', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(52, 1, 'Green', '42', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(53, 1, 'Green', '43', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(54, 1, 'Green', '44', 'Adidas', './img/shoes/adidassuperstar_green.png', 10),
(55, 1, 'Red', '36', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(56, 1, 'Red', '37', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(57, 1, 'Red', '38', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(58, 1, 'Red', '39', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(59, 1, 'Red', '40', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(60, 1, 'Red', '41', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(61, 1, 'Red', '42', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(62, 1, 'Red', '43', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(63, 1, 'Red', '44', 'Adidas', './img/shoes/adidassuperstar_red.png', 10),
(64, 1, 'White', '36', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(65, 1, 'White', '37', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(66, 1, 'White', '38', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(67, 1, 'White', '39', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(68, 1, 'White', '40', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(69, 1, 'White', '41', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(70, 1, 'White', '42', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(71, 1, 'White', '43', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(72, 1, 'White', '44', 'Adidas', './img/shoes/adidassuperstar_white.png', 10),
(109, 2, 'Black', '36', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(110, 2, 'Black', '37', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(111, 2, 'Black', '38', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(112, 2, 'Black', '39', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(113, 2, 'Black', '40', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(114, 2, 'Black', '41', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(115, 2, 'Black', '42', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(116, 2, 'Black', '43', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(117, 2, 'Black', '44', 'Adidas', './img/shoes/adidassamba_black.png', 10),
(118, 2, 'Blue', '36', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(119, 2, 'Blue', '37', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(120, 2, 'Blue', '38', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(121, 2, 'Blue', '39', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(122, 2, 'Blue', '40', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(123, 2, 'Blue', '41', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(124, 2, 'Blue', '42', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(125, 2, 'Blue', '43', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(126, 2, 'Blue', '44', 'Adidas', './img/shoes/adidassamba_blue.png', 10),
(127, 2, 'Red', '36', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(128, 2, 'Red', '37', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(129, 2, 'Red', '38', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(130, 2, 'Red', '39', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(131, 2, 'Red', '40', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(132, 2, 'Red', '41', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(133, 2, 'Red', '42', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(134, 2, 'Red', '43', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(135, 2, 'Red', '44', 'Adidas', './img/shoes/adidassamba_red.png', 10),
(136, 2, 'White', '36', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(137, 2, 'White', '37', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(138, 2, 'White', '38', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(139, 2, 'White', '39', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(140, 2, 'White', '40', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(141, 2, 'White', '41', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(142, 2, 'White', '42', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(143, 2, 'White', '43', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(144, 2, 'White', '44', 'Adidas', './img/shoes/adidassamba_white.png', 10),
(145, 3, 'Black', '36', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(146, 3, 'Black', '37', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(147, 3, 'Black', '38', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(148, 3, 'Black', '39', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(149, 3, 'Black', '40', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(150, 3, 'Black', '41', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(151, 3, 'Black', '42', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(152, 3, 'Black', '43', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(153, 3, 'Black', '44', 'Vans', './img/shoes/vansoldskool_black.png', 10),
(154, 3, 'Blue', '36', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(155, 3, 'Blue', '37', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(156, 3, 'Blue', '38', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(157, 3, 'Blue', '39', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(158, 3, 'Blue', '40', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(159, 3, 'Blue', '41', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(160, 3, 'Blue', '42', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(161, 3, 'Blue', '43', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(162, 3, 'Blue', '44', 'Vans', './img/shoes/vansoldskool_blue.png', 10),
(163, 3, 'Green', '36', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(164, 3, 'Green', '37', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(165, 3, 'Green', '38', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(166, 3, 'Green', '39', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(167, 3, 'Green', '40', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(168, 3, 'Green', '41', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(169, 3, 'Green', '42', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(170, 3, 'Green', '43', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(171, 3, 'Green', '44', 'Vans', './img/shoes/vansoldskool_green.png', 10),
(172, 3, 'White', '36', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(173, 3, 'White', '37', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(174, 3, 'White', '38', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(175, 3, 'White', '39', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(176, 3, 'White', '40', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(177, 3, 'White', '41', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(178, 3, 'White', '42', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(179, 3, 'White', '43', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(180, 3, 'White', '44', 'Vans', './img/shoes/vansoldskool_white.png', 10),
(181, 4, 'Black', '36', 'Converse', './img/shoes/conversechuck_black.png', 10),
(182, 4, 'Black', '37', 'Converse', './img/shoes/conversechuck_black.png', 10),
(183, 4, 'Black', '38', 'Converse', './img/shoes/conversechuck_black.png', 10),
(184, 4, 'Black', '39', 'Converse', './img/shoes/conversechuck_black.png', 10),
(185, 4, 'Black', '40', 'Converse', './img/shoes/conversechuck_black.png', 10),
(186, 4, 'Black', '41', 'Converse', './img/shoes/conversechuck_black.png', 10),
(187, 4, 'Black', '42', 'Converse', './img/shoes/conversechuck_black.png', 10),
(188, 4, 'Black', '43', 'Converse', './img/shoes/conversechuck_black.png', 10),
(189, 4, 'Black', '44', 'Converse', './img/shoes/conversechuck_black.png', 10),
(190, 4, 'Blue', '36', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(191, 4, 'Blue', '37', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(192, 4, 'Blue', '38', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(193, 4, 'Blue', '39', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(194, 4, 'Blue', '40', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(195, 4, 'Blue', '41', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(196, 4, 'Blue', '42', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(197, 4, 'Blue', '43', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(198, 4, 'Blue', '44', 'Converse', './img/shoes/conversechuck_blue.png', 10),
(199, 4, 'Green', '36', 'Converse', './img/shoes/conversechuck_green.png', 10),
(200, 4, 'Green', '37', 'Converse', './img/shoes/conversechuck_green.png', 10),
(201, 4, 'Green', '38', 'Converse', './img/shoes/conversechuck_green.png', 10),
(202, 4, 'Green', '39', 'Converse', './img/shoes/conversechuck_green.png', 10),
(203, 4, 'Green', '40', 'Converse', './img/shoes/conversechuck_green.png', 10),
(204, 4, 'Green', '41', 'Converse', './img/shoes/conversechuck_green.png', 10),
(205, 4, 'Green', '42', 'Converse', './img/shoes/conversechuck_green.png', 10),
(206, 4, 'Green', '43', 'Converse', './img/shoes/conversechuck_green.png', 10),
(207, 4, 'Green', '44', 'Converse', './img/shoes/conversechuck_green.png', 10),
(208, 4, 'White', '36', 'Converse', './img/shoes/conversechuck_white.png', 10),
(209, 4, 'White', '37', 'Converse', './img/shoes/conversechuck_white.png', 10),
(210, 4, 'White', '38', 'Converse', './img/shoes/conversechuck_white.png', 10),
(211, 4, 'White', '39', 'Converse', './img/shoes/conversechuck_white.png', 10),
(212, 4, 'White', '40', 'Converse', './img/shoes/conversechuck_white.png', 10),
(213, 4, 'White', '41', 'Converse', './img/shoes/conversechuck_white.png', 10),
(214, 4, 'White', '42', 'Converse', './img/shoes/conversechuck_white.png', 10),
(215, 4, 'White', '43', 'Converse', './img/shoes/conversechuck_white.png', 10),
(216, 4, 'White', '44', 'Converse', './img/shoes/conversechuck_white.png', 10),
(217, 5, 'Black', '36', 'Puma', './img/shoes/pumacaven_black.png', 10),
(218, 5, 'Black', '37', 'Puma', './img/shoes/pumacaven_black.png', 10),
(219, 5, 'Black', '38', 'Puma', './img/shoes/pumacaven_black.png', 10),
(220, 5, 'Black', '39', 'Puma', './img/shoes/pumacaven_black.png', 10),
(221, 5, 'Black', '40', 'Puma', './img/shoes/pumacaven_black.png', 10),
(222, 5, 'Black', '41', 'Puma', './img/shoes/pumacaven_black.png', 10),
(223, 5, 'Black', '42', 'Puma', './img/shoes/pumacaven_black.png', 10),
(224, 5, 'Black', '43', 'Puma', './img/shoes/pumacaven_black.png', 10),
(225, 5, 'Black', '44', 'Puma', './img/shoes/pumacaven_black.png', 10),
(226, 5, 'Green', '36', 'Puma', './img/shoes/pumacaven_green.png', 10),
(227, 5, 'Green', '37', 'Puma', './img/shoes/pumacaven_green.png', 10),
(228, 5, 'Green', '38', 'Puma', './img/shoes/pumacaven_green.png', 10),
(229, 5, 'Green', '39', 'Puma', './img/shoes/pumacaven_green.png', 10),
(230, 5, 'Green', '40', 'Puma', './img/shoes/pumacaven_green.png', 10),
(231, 5, 'Green', '41', 'Puma', './img/shoes/pumacaven_green.png', 10),
(232, 5, 'Green', '42', 'Puma', './img/shoes/pumacaven_green.png', 10),
(233, 5, 'Green', '43', 'Puma', './img/shoes/pumacaven_green.png', 10),
(234, 5, 'Green', '44', 'Puma', './img/shoes/pumacaven_green.png', 10),
(235, 5, 'Red', '36', 'Puma', './img/shoes/pumacaven_red.png', 10),
(236, 5, 'Red', '37', 'Puma', './img/shoes/pumacaven_red.png', 10),
(237, 5, 'Red', '38', 'Puma', './img/shoes/pumacaven_red.png', 10),
(238, 5, 'Red', '39', 'Puma', './img/shoes/pumacaven_red.png', 10),
(239, 5, 'Red', '40', 'Puma', './img/shoes/pumacaven_red.png', 10),
(240, 5, 'Red', '41', 'Puma', './img/shoes/pumacaven_red.png', 10),
(241, 5, 'Red', '42', 'Puma', './img/shoes/pumacaven_red.png', 10),
(242, 5, 'Red', '43', 'Puma', './img/shoes/pumacaven_red.png', 10),
(243, 5, 'Red', '44', 'Puma', './img/shoes/pumacaven_red.png', 10),
(244, 5, 'White', '36', 'Puma', './img/shoes/pumacaven_white.png', 10),
(245, 5, 'White', '37', 'Puma', './img/shoes/pumacaven_white.png', 10),
(246, 5, 'White', '38', 'Puma', './img/shoes/pumacaven_white.png', 10),
(247, 5, 'White', '39', 'Puma', './img/shoes/pumacaven_white.png', 10),
(248, 5, 'White', '40', 'Puma', './img/shoes/pumacaven_white.png', 10),
(249, 5, 'White', '41', 'Puma', './img/shoes/pumacaven_white.png', 10),
(250, 5, 'White', '42', 'Puma', './img/shoes/pumacaven_white.png', 10),
(251, 5, 'White', '43', 'Puma', './img/shoes/pumacaven_white.png', 10),
(252, 5, 'White', '44', 'Puma', './img/shoes/pumacaven_white.png', 10),
(253, 6, 'Black', '36', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(254, 6, 'Black', '37', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(255, 6, 'Black', '38', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(256, 6, 'Black', '39', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(257, 6, 'Black', '40', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(258, 6, 'Black', '41', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(259, 6, 'Black', '42', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(260, 6, 'Black', '43', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(261, 6, 'Black', '44', 'Adidas', './img/shoes/pumaspeedcat_black.png', 10),
(262, 6, 'Blue', '36', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(263, 6, 'Blue', '37', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(264, 6, 'Blue', '38', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(265, 6, 'Blue', '39', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(266, 6, 'Blue', '40', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(267, 6, 'Blue', '41', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(268, 6, 'Blue', '42', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(269, 6, 'Blue', '43', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(270, 6, 'Blue', '44', 'Adidas', './img/shoes/pumaspeedcat_blue.png', 10),
(271, 6, 'Red', '36', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(272, 6, 'Red', '37', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(273, 6, 'Red', '38', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(274, 6, 'Red', '39', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(275, 6, 'Red', '40', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(276, 6, 'Red', '41', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(277, 6, 'Red', '42', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(278, 6, 'Red', '43', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(279, 6, 'Red', '44', 'Adidas', './img/shoes/pumaspeedcat_red.png', 10),
(280, 6, 'Yellow', '36', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(281, 6, 'Yellow', '37', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(282, 6, 'Yellow', '38', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(283, 6, 'Yellow', '39', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(284, 6, 'Yellow', '40', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(285, 6, 'Yellow', '41', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(286, 6, 'Yellow', '42', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(287, 6, 'Yellow', '43', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(288, 6, 'Yellow', '44', 'Adidas', './img/shoes/pumaspeedcat_yellow.png', 10),
(289, 7, 'Black', '36', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(290, 7, 'Black', '37', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(291, 7, 'Black', '38', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(292, 7, 'Black', '39', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(293, 7, 'Black', '40', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(294, 7, 'Black', '41', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(295, 7, 'Black', '42', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(296, 7, 'Black', '43', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(297, 7, 'Black', '44', 'Nike', './img/shoes/nikeairforce_black.png', 10),
(298, 7, 'Blue', '36', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(299, 7, 'Blue', '37', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(300, 7, 'Blue', '38', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(301, 7, 'Blue', '39', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(302, 7, 'Blue', '40', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(303, 7, 'Blue', '41', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(304, 7, 'Blue', '42', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(305, 7, 'Blue', '43', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(306, 7, 'Blue', '44', 'Nike', './img/shoes/nikeairforce_blue.png', 10),
(307, 7, 'Red', '36', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(308, 7, 'Red', '37', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(309, 7, 'Red', '38', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(310, 7, 'Red', '39', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(311, 7, 'Red', '40', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(312, 7, 'Red', '41', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(313, 7, 'Red', '42', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(314, 7, 'Red', '43', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(315, 7, 'Red', '44', 'Nike', './img/shoes/nikeairforce_red.png', 10),
(316, 7, 'White', '36', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(317, 7, 'White', '37', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(318, 7, 'White', '38', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(319, 7, 'White', '39', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(320, 7, 'White', '40', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(321, 7, 'White', '41', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(322, 7, 'White', '42', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(323, 7, 'White', '43', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(324, 7, 'White', '44', 'Nike', './img/shoes/nikeairforce_white.png', 10),
(325, 8, 'Black', '36', 'Nike', './img/shoes/jordanlow_black.png', 10),
(326, 8, 'Black', '37', 'Nike', './img/shoes/jordanlow_black.png', 10),
(327, 8, 'Black', '38', 'Nike', './img/shoes/jordanlow_black.png', 10),
(328, 8, 'Black', '39', 'Nike', './img/shoes/jordanlow_black.png', 10),
(329, 8, 'Black', '40', 'Nike', './img/shoes/jordanlow_black.png', 10),
(330, 8, 'Black', '41', 'Nike', './img/shoes/jordanlow_black.png', 10),
(331, 8, 'Black', '42', 'Nike', './img/shoes/jordanlow_black.png', 10),
(332, 8, 'Black', '43', 'Nike', './img/shoes/jordanlow_black.png', 10),
(333, 8, 'Black', '44', 'Nike', './img/shoes/jordanlow_black.png', 10),
(334, 8, 'Blue', '36', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(335, 8, 'Blue', '37', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(336, 8, 'Blue', '38', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(337, 8, 'Blue', '39', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(338, 8, 'Blue', '40', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(339, 8, 'Blue', '41', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(340, 8, 'Blue', '42', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(341, 8, 'Blue', '43', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(342, 8, 'Blue', '44', 'Nike', './img/shoes/jordanlow_blue.png', 10),
(343, 8, 'Red', '36', 'Nike', './img/shoes/jordanlow_red.png', 10),
(344, 8, 'Red', '37', 'Nike', './img/shoes/jordanlow_red.png', 10),
(345, 8, 'Red', '38', 'Nike', './img/shoes/jordanlow_red.png', 10),
(346, 8, 'Red', '39', 'Nike', './img/shoes/jordanlow_red.png', 10),
(347, 8, 'Red', '40', 'Nike', './img/shoes/jordanlow_red.png', 10),
(348, 8, 'Red', '41', 'Nike', './img/shoes/jordanlow_red.png', 10),
(349, 8, 'Red', '42', 'Nike', './img/shoes/jordanlow_red.png', 10),
(350, 8, 'Red', '43', 'Nike', './img/shoes/jordanlow_red.png', 10),
(351, 8, 'Red', '44', 'Nike', './img/shoes/jordanlow_red.png', 10),
(352, 8, 'White', '36', 'Nike', './img/shoes/jordanlow_white.png', 10),
(353, 8, 'White', '37', 'Nike', './img/shoes/jordanlow_white.png', 10),
(354, 8, 'White', '38', 'Nike', './img/shoes/jordanlow_white.png', 10),
(355, 8, 'White', '39', 'Nike', './img/shoes/jordanlow_white.png', 10),
(356, 8, 'White', '40', 'Nike', './img/shoes/jordanlow_white.png', 10),
(357, 8, 'White', '41', 'Nike', './img/shoes/jordanlow_white.png', 10),
(358, 8, 'White', '42', 'Nike', './img/shoes/jordanlow_white.png', 10),
(359, 8, 'White', '43', 'Nike', './img/shoes/jordanlow_white.png', 10),
(360, 8, 'White', '44', 'Nike', './img/shoes/jordanlow_white.png', 10),
(361, 9, 'Black', '36', 'Nike', './img/shoes/jordan1_black.png', 10),
(362, 9, 'Black', '37', 'Nike', './img/shoes/jordan1_black.png', 10),
(363, 9, 'Black', '38', 'Nike', './img/shoes/jordan1_black.png', 10),
(364, 9, 'Black', '39', 'Nike', './img/shoes/jordan1_black.png', 10),
(365, 9, 'Black', '40', 'Nike', './img/shoes/jordan1_black.png', 10),
(366, 9, 'Black', '41', 'Nike', './img/shoes/jordan1_black.png', 10),
(367, 9, 'Black', '42', 'Nike', './img/shoes/jordan1_black.png', 10),
(368, 9, 'Black', '43', 'Nike', './img/shoes/jordan1_black.png', 10),
(369, 9, 'Black', '44', 'Nike', './img/shoes/jordan1_black.png', 10),
(370, 9, 'Blue', '36', 'Nike', './img/shoes/jordan1_blue.png', 10),
(371, 9, 'Blue', '37', 'Nike', './img/shoes/jordan1_blue.png', 10),
(372, 9, 'Blue', '38', 'Nike', './img/shoes/jordan1_blue.png', 10),
(373, 9, 'Blue', '39', 'Nike', './img/shoes/jordan1_blue.png', 10),
(374, 9, 'Blue', '40', 'Nike', './img/shoes/jordan1_blue.png', 10),
(375, 9, 'Blue', '41', 'Nike', './img/shoes/jordan1_blue.png', 10),
(376, 9, 'Blue', '42', 'Nike', './img/shoes/jordan1_blue.png', 10),
(377, 9, 'Blue', '43', 'Nike', './img/shoes/jordan1_blue.png', 10),
(378, 9, 'Blue', '44', 'Nike', './img/shoes/jordan1_blue.png', 10),
(379, 9, 'Red', '36', 'Nike', './img/shoes/jordan1_red.png', 10),
(380, 9, 'Red', '37', 'Nike', './img/shoes/jordan1_red.png', 10),
(381, 9, 'Red', '38', 'Nike', './img/shoes/jordan1_red.png', 10),
(382, 9, 'Red', '39', 'Nike', './img/shoes/jordan1_red.png', 10),
(383, 9, 'Red', '40', 'Nike', './img/shoes/jordan1_red.png', 10),
(384, 9, 'Red', '41', 'Nike', './img/shoes/jordan1_red.png', 10),
(385, 9, 'Red', '42', 'Nike', './img/shoes/jordan1_red.png', 10),
(386, 9, 'Red', '43', 'Nike', './img/shoes/jordan1_red.png', 10),
(387, 9, 'Red', '44', 'Nike', './img/shoes/jordan1_red.png', 10),
(388, 9, 'Green', '36', 'Nike', './img/shoes/jordan1_green.png', 10),
(389, 9, 'Green', '37', 'Nike', './img/shoes/jordan1_green.png', 10),
(390, 9, 'Green', '38', 'Nike', './img/shoes/jordan1_green.png', 10),
(391, 9, 'Green', '39', 'Nike', './img/shoes/jordan1_green.png', 10),
(392, 9, 'Green', '40', 'Nike', './img/shoes/jordan1_green.png', 10),
(393, 9, 'Green', '41', 'Nike', './img/shoes/jordan1_green.png', 10),
(394, 9, 'Green', '42', 'Nike', './img/shoes/jordan1_green.png', 10),
(395, 9, 'Green', '43', 'Nike', './img/shoes/jordan1_green.png', 10),
(396, 9, 'Green', '44', 'Nike', './img/shoes/jordan1_green.png', 10),
(397, 10, 'Black', '36', 'Coverse', './img/shoes/conversestar_black.png', 10),
(398, 10, 'Black', '37', 'Coverse', './img/shoes/conversestar_black.png', 10),
(399, 10, 'Black', '38', 'Coverse', './img/shoes/conversestar_black.png', 10),
(400, 10, 'Black', '39', 'Coverse', './img/shoes/conversestar_black.png', 10),
(401, 10, 'Black', '40', 'Coverse', './img/shoes/conversestar_black.png', 10),
(402, 10, 'Black', '41', 'Coverse', './img/shoes/conversestar_black.png', 10),
(403, 10, 'Black', '42', 'Coverse', './img/shoes/conversestar_black.png', 10),
(404, 10, 'Black', '43', 'Coverse', './img/shoes/conversestar_black.png', 10),
(405, 10, 'Black', '44', 'Coverse', './img/shoes/conversestar_black.png', 10),
(407, 10, 'White', '36', 'Coverse', './img/shoes/conversestar_white.png', 10),
(408, 10, 'White', '37', 'Coverse', './img/shoes/conversestar_white.png', 10),
(409, 10, 'White', '38', 'Coverse', './img/shoes/conversestar_white.png', 10),
(410, 10, 'White', '39', 'Coverse', './img/shoes/conversestar_white.png', 10),
(411, 10, 'White', '40', 'Coverse', './img/shoes/conversestar_white.png', 10),
(412, 10, 'White', '41', 'Coverse', './img/shoes/conversestar_white.png', 10),
(413, 10, 'White', '42', 'Coverse', './img/shoes/conversestar_white.png', 10),
(414, 10, 'White', '43', 'Coverse', './img/shoes/conversestar_white.png', 10),
(415, 10, 'White', '44', 'Coverse', './img/shoes/conversestar_white.png', 10),
(417, 11, 'White', '36', 'New Balance', './img/shoes/nb530_white.png', 10),
(418, 11, 'White', '37', 'New Balance', './img/shoes/nb530_white.png', 10),
(419, 11, 'White', '38', 'New Balance', './img/shoes/nb530_white.png', 10),
(420, 11, 'White', '39', 'New Balance', './img/shoes/nb530_white.png', 10),
(421, 11, 'White', '40', 'New Balance', './img/shoes/nb530_white.png', 10),
(422, 11, 'White', '41', 'New Balance', './img/shoes/nb530_white.png', 10),
(423, 11, 'White', '42', 'New Balance', './img/shoes/nb530_white.png', 10),
(424, 11, 'White', '43', 'New Balance', './img/shoes/nb530_white.png', 10),
(425, 11, 'White', '44', 'New Balance', './img/shoes/nb530_white.png', 10),
(427, 12, 'Black', '36', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(428, 12, 'Black', '37', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(429, 12, 'Black', '38', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(430, 12, 'Black', '39', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(431, 12, 'Black', '40', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(432, 12, 'Black', '41', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(433, 12, 'Black', '42', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(434, 12, 'Black', '43', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(435, 12, 'Black', '44', 'New Balance', './img/shoes/nb1906R_black.png', 10),
(437, 12, 'White', '36', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(438, 12, 'White', '37', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(439, 12, 'White', '38', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(440, 12, 'White', '39', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(441, 12, 'White', '40', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(442, 12, 'White', '41', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(443, 12, 'White', '42', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(444, 12, 'White', '43', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(445, 12, 'White', '44', 'New Balance', './img/shoes/nb1906R_white.png', 10),
(507, 13, 'Black', '36', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(508, 13, 'Black', '37', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(509, 13, 'Black', '38', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(510, 13, 'Black', '39', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(511, 13, 'Black', '40', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(512, 13, 'Black', '41', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(513, 13, 'Black', '42', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(514, 13, 'Black', '43', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(515, 13, 'Black', '44', 'Nike', './img/shoes/nikeairmax_black.png', 10),
(517, 13, 'Red', '36', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(518, 13, 'Red', '37', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(519, 13, 'Red', '38', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(520, 13, 'Red', '39', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(521, 13, 'Red', '40', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(522, 13, 'Red', '41', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(523, 13, 'Red', '42', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(524, 13, 'Red', '43', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(525, 13, 'Red', '44', 'Nike', './img/shoes/nikeairmax_red.png', 10),
(527, 13, 'White', '36', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(528, 13, 'White', '37', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(529, 13, 'White', '38', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(530, 13, 'White', '39', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(531, 13, 'White', '40', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(532, 13, 'White', '41', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(533, 13, 'White', '42', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(534, 13, 'White', '43', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(535, 13, 'White', '44', 'Nike', './img/shoes/nikeairmax_white.png', 10),
(537, 14, 'Black', '36', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(538, 14, 'Black', '37', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(539, 14, 'Black', '38', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(540, 14, 'Black', '39', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(541, 14, 'Black', '40', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(542, 14, 'Black', '41', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(543, 14, 'Black', '42', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(544, 14, 'Black', '43', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(545, 14, 'Black', '44', 'Nike', './img/shoes/nikebasketprecision_black.png', 10),
(547, 14, 'Red', '36', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(548, 14, 'Red', '37', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(549, 14, 'Red', '38', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(550, 14, 'Red', '39', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(551, 14, 'Red', '40', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(552, 14, 'Red', '41', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(553, 14, 'Red', '42', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(554, 14, 'Red', '43', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(555, 14, 'Red', '44', 'Nike', './img/shoes/nikebasketprecision_red.png', 10),
(557, 15, 'Black', '36', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(558, 15, 'Black', '37', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(559, 15, 'Black', '38', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(560, 15, 'Black', '39', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(561, 15, 'Black', '40', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(562, 15, 'Black', '41', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(563, 15, 'Black', '42', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(564, 15, 'Black', '43', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(565, 15, 'Black', '44', 'Nike', './img/shoes/nikemercurial_black.png', 10),
(567, 15, 'Blue', '36', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(568, 15, 'Blue', '37', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(569, 15, 'Blue', '38', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(570, 15, 'Blue', '39', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(571, 15, 'Blue', '40', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(572, 15, 'Blue', '41', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(573, 15, 'Blue', '42', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(574, 15, 'Blue', '43', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(575, 15, 'Blue', '44', 'Nike', './img/shoes/nikemercurial_blue.png', 10),
(577, 15, 'Yellow', '36', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(578, 15, 'Yellow', '37', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(579, 15, 'Yellow', '38', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(580, 15, 'Yellow', '39', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(581, 15, 'Yellow', '40', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(582, 15, 'Yellow', '41', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(583, 15, 'Yellow', '42', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(584, 15, 'Yellow', '43', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(585, 15, 'Yellow', '44', 'Nike', './img/shoes/nikemercurial_yellow.png', 10),
(587, 16, 'Black', '36', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(588, 16, 'Black', '37', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(589, 16, 'Black', '38', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(590, 16, 'Black', '39', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(591, 16, 'Black', '40', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(592, 16, 'Black', '41', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(593, 16, 'Black', '42', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(594, 16, 'Black', '43', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(595, 16, 'Black', '44', 'Nike', './img/shoes/nikerunningpegasus_black.png', 10),
(597, 16, 'Blue', '36', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(598, 16, 'Blue', '37', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(599, 16, 'Blue', '38', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(600, 16, 'Blue', '39', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(601, 16, 'Blue', '40', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(602, 16, 'Blue', '41', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(603, 16, 'Blue', '42', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(604, 16, 'Blue', '43', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(605, 16, 'Blue', '44', 'Nike', './img/shoes/nikerunningpegasus_blue.png', 10),
(607, 16, 'Red', '36', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(608, 16, 'Red', '37', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(609, 16, 'Red', '38', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(610, 16, 'Red', '39', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(611, 16, 'Red', '40', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(612, 16, 'Red', '41', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(613, 16, 'Red', '42', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(614, 16, 'Red', '43', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(615, 16, 'Red', '44', 'Nike', './img/shoes/nikerunningpegasus_red.png', 10),
(617, 16, 'White', '36', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(618, 16, 'White', '37', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(619, 16, 'White', '38', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(620, 16, 'White', '39', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(621, 16, 'White', '40', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(622, 16, 'White', '41', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(623, 16, 'White', '42', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(624, 16, 'White', '43', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(625, 16, 'White', '44', 'Nike', './img/shoes/nikerunningpegasus_white.png', 10),
(627, 17, 'Blue', '36', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(628, 17, 'Blue', '37', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(629, 17, 'Blue', '38', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(630, 17, 'Blue', '39', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(631, 17, 'Blue', '40', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(632, 17, 'Blue', '41', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(633, 17, 'Blue', '42', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(634, 17, 'Blue', '43', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(635, 17, 'Blue', '44', 'Nike', './img/shoes/nikevapor_blue.png', 10),
(637, 17, 'Red', '36', 'Nike', './img/shoes/nikevapor_red.png', 10),
(638, 17, 'Red', '37', 'Nike', './img/shoes/nikevapor_red.png', 10),
(639, 17, 'Red', '38', 'Nike', './img/shoes/nikevapor_red.png', 10),
(640, 17, 'Red', '39', 'Nike', './img/shoes/nikevapor_red.png', 10),
(641, 17, 'Red', '40', 'Nike', './img/shoes/nikevapor_red.png', 10),
(642, 17, 'Red', '41', 'Nike', './img/shoes/nikevapor_red.png', 10),
(643, 17, 'Red', '42', 'Nike', './img/shoes/nikevapor_red.png', 10),
(644, 17, 'Red', '43', 'Nike', './img/shoes/nikevapor_red.png', 10),
(645, 17, 'Red', '44', 'Nike', './img/shoes/nikevapor_red.png', 10),
(647, 18, 'Black', '36', 'Vans', './img/shoes/vanssk8_black.png', 10),
(648, 18, 'Black', '37', 'Vans', './img/shoes/vanssk8_black.png', 10),
(649, 18, 'Black', '38', 'Vans', './img/shoes/vanssk8_black.png', 10),
(650, 18, 'Black', '39', 'Vans', './img/shoes/vanssk8_black.png', 10),
(651, 18, 'Black', '40', 'Vans', './img/shoes/vanssk8_black.png', 10),
(652, 18, 'Black', '41', 'Vans', './img/shoes/vanssk8_black.png', 10),
(653, 18, 'Black', '42', 'Vans', './img/shoes/vanssk8_black.png', 10),
(654, 18, 'Black', '43', 'Vans', './img/shoes/vanssk8_black.png', 10),
(655, 18, 'Black', '44', 'Vans', './img/shoes/vanssk8_black.png', 10),
(657, 18, 'Blue', '36', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(658, 18, 'Blue', '37', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(659, 18, 'Blue', '38', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(660, 18, 'Blue', '39', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(661, 18, 'Blue', '40', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(662, 18, 'Blue', '41', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(663, 18, 'Blue', '42', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(664, 18, 'Blue', '43', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(665, 18, 'Blue', '44', 'Vans', './img/shoes/vanssk8_blue.png', 10),
(667, 19, 'Black', '36', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(668, 19, 'Black', '37', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(669, 19, 'Black', '38', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(670, 19, 'Black', '39', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(671, 19, 'Black', '40', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(672, 19, 'Black', '41', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(673, 19, 'Black', '42', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(674, 19, 'Black', '43', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(675, 19, 'Black', '44', 'Adidas', './img/shoes/adidascopa_black.png', 10),
(677, 19, 'Red', '36', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(678, 19, 'Red', '37', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(679, 19, 'Red', '38', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(680, 19, 'Red', '39', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(681, 19, 'Red', '40', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(682, 19, 'Red', '41', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(683, 19, 'Red', '42', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(684, 19, 'Red', '43', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(685, 19, 'Red', '44', 'Adidas', './img/shoes/adidascopa_red.png', 10),
(687, 20, 'White', '36', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(688, 20, 'White', '37', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(689, 20, 'White', '38', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(690, 20, 'White', '39', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(691, 20, 'White', '40', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(692, 20, 'White', '41', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(693, 20, 'White', '42', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(694, 20, 'White', '43', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(695, 20, 'White', '44', 'Adidas', './img/shoes/adidasforum_white.png', 10),
(697, 20, 'Blue', '36', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(698, 20, 'Blue', '37', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(699, 20, 'Blue', '38', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(700, 20, 'Blue', '39', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(701, 20, 'Blue', '40', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(702, 20, 'Blue', '41', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(703, 20, 'Blue', '42', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(704, 20, 'Blue', '43', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(705, 20, 'Blue', '44', 'Adidas', './img/shoes/adidasforum_blue.png', 10),
(707, 21, 'Black', '36', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(708, 21, 'Black', '37', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(709, 21, 'Black', '38', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(710, 21, 'Black', '39', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(711, 21, 'Black', '40', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(712, 21, 'Black', '41', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(713, 21, 'Black', '42', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(714, 21, 'Black', '43', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(715, 21, 'Black', '44', 'Adidas', './img/shoes/adidasrunningduramo_black.png', 10),
(717, 21, 'Blue', '36', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(718, 21, 'Blue', '37', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(719, 21, 'Blue', '38', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(720, 21, 'Blue', '39', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(721, 21, 'Blue', '40', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(722, 21, 'Blue', '41', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(723, 21, 'Blue', '42', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(724, 21, 'Blue', '43', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(725, 21, 'Blue', '44', 'Adidas', './img/shoes/adidasrunningduramo_blue.png', 10),
(727, 21, 'Red', '36', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(728, 21, 'Red', '37', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(729, 21, 'Red', '38', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(730, 21, 'Red', '39', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(731, 21, 'Red', '40', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(732, 21, 'Red', '41', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(733, 21, 'Red', '42', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(734, 21, 'Red', '43', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(735, 21, 'Red', '44', 'Adidas', './img/shoes/adidasrunningduramo_red.png', 10),
(737, 21, 'White', '36', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(738, 21, 'White', '37', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(739, 21, 'White', '38', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(740, 21, 'White', '39', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(741, 21, 'White', '40', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(742, 21, 'White', '41', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(743, 21, 'White', '42', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(744, 21, 'White', '43', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10),
(745, 21, 'White', '44', 'Adidas', './img/shoes/adidasrunningduramo_white.png', 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;

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
