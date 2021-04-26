-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2020 lúc 02:05 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `danatao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL,
  `last_out` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`, `last_sign_in_at`, `last_out`) VALUES
(3, 'nhân viên 1', 'nhanvien1@gmail.com', NULL, '$2y$10$jVRlr7QB1K1s8cyBHxGlAO85dgIUii9.VdrJL65nbV6DDO4NueKHS', NULL, '2020-03-20 05:27:48', '2020-03-25 04:29:46', '2020-03-25 04:29:46', NULL),
(5, 'nhân viên 2', 'nhanvien2@gmail.com', NULL, '$2y$10$jVRlr7QB1K1s8cyBHxGlAO85dgIUii9.VdrJL65nbV6DDO4NueKHS', NULL, '2020-03-20 05:50:59', '2020-03-20 05:50:59', NULL, NULL),
(16, 'nhân viên 3', 'nhanvien3@gmail.com', NULL, '$2y$10$jVRlr7QB1K1s8cyBHxGlAO85dgIUii9.VdrJL65nbV6DDO4NueKHS', NULL, '2020-03-20 07:16:23', '2020-03-20 07:16:23', NULL, NULL),
(17, 'admin', 'admin@gmail.com', NULL, '$2y$10$NYNrD4bMN1Yqx/eElraHdefHZLhR9jEHALpB80RZIG2Mznfa0hOxe', NULL, '2020-03-20 07:24:55', '2020-03-25 04:32:03', '2020-03-25 04:32:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bieuphihas`
--

CREATE TABLE `bieuphihas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bieuphihas`
--

INSERT INTO `bieuphihas` (`id`, `tieude`, `img`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'qq', 'BIEUPHIDICHVU.png', '12e', NULL, '2020-05-11 17:56:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `key`, `user_id`, `created_at`, `updated_at`) VALUES
('1c952bd15e26f6a284c511a0021d00af', '3b152d29713a782e2603085b5bc6257d', NULL, '2020-06-11 00:52:44', '2020-06-11 00:52:44'),
('1cdefd673c726ec27ba9fe6bbb55ab30', '7df9c2e13f85ba82c2bcd01f83c57d9d', NULL, '2020-06-11 18:22:35', '2020-06-11 18:22:35'),
('5373953b04ba3aa8ee30f61e0b3ed511', 'b2cc7e1efe8c7d71bdde0b50d2f28848', NULL, '2020-09-17 02:59:21', '2020-09-17 02:59:21'),
('79bee9b5c7ecd0d18bf27eb4007b1620', '541584d0e4834212fe5ea8c975870c39', NULL, '2020-07-23 03:15:57', '2020-07-23 03:15:57'),
('e673bc9105c48bc54ef206eacafe24ce', 'afc61630333f2a27657295a627291909', 11, '2020-02-27 01:16:24', '2020-02-27 01:16:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aliwangwang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopId` int(11) DEFAULT NULL,
  `shopName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopLink` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemImage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itemLink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `saleLocation` int(11) DEFAULT NULL,
  `itemPriceNDT` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `aliwangwang`, `shopId`, `shopName`, `shopLink`, `website`, `itemImage`, `itemName`, `itemLink`, `size`, `color`, `price`, `saleLocation`, `itemPriceNDT`, `quantity`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(72, 'e673bc9105c48bc54ef206eacafe24ce', '12222', 2, 'taobao', 'taobaoi1', 'taobaoi2', NULL, 'ghế gỗ3', NULL, 'xl', 'xanh', 393, NULL, 131, 3, NULL, '0', '2020-06-11 01:20:33', '2020-07-30 19:19:57'),
(73, '1cdefd673c726ec27ba9fe6bbb55ab30', '12222', 2, 'taobao', 'taobaoi1', 'taobaoi2', NULL, 'ghế gỗ3', NULL, 'xl', 'xanh', 393, NULL, 131, 3, NULL, '0', '2020-06-11 18:22:44', '2020-06-11 18:22:44'),
(75, '79bee9b5c7ecd0d18bf27eb4007b1620', '12222', 2, 'taobao', 'taobaoi1', 'taobaoi2', NULL, 'ghế gỗ3', NULL, 'xl', 'xanh', 262, NULL, 131, 2, NULL, '0', '2020-07-23 03:16:38', '2020-07-23 03:18:52'),
(76, '79bee9b5c7ecd0d18bf27eb4007b1620', '12222', 2, 'taobao', 'taobaoi1', 'taobaoi2', NULL, 'ghế gỗ', NULL, 'xl', 'xanh', 262, NULL, 131, 2, NULL, '0', '2020-07-23 03:19:00', '2020-07-23 03:19:00'),
(77, '5373953b04ba3aa8ee30f61e0b3ed511', '12222', 2, 'taobao', 'taobaoi1', 'taobaoi2', NULL, 'ghế gỗ', NULL, 'xl', 'xanh', 262, NULL, 131, 2, NULL, '0', '2020-09-17 02:59:57', '2020-09-17 02:59:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhangs`
--

CREATE TABLE `chitietdonhangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhangs`
--

INSERT INTO `chitietdonhangs` (`id`, `donhang_id`, `image`, `name_product`, `url`, `size`, `length`, `width`, `height`, `weight`, `color`, `price`, `price_product`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(80, 12, '//gd4.alicdn.com/imgextra/i1/2273991402/O1CN01siKHA91ME9oWdXnBM_!!2273991402.jpg_400x400.jpg', '短款棒球衫外套女春秋季新款休闲立领夹克外衣长袖修身印花棒球服', 'https://item.taobao.com/item.htm?spm=2013.1.0.0.7fb23628AbsyD0&id=594651841338', 'xl', NULL, NULL, NULL, NULL, 'xanh', 232, 116, 2, NULL, '2020-03-28 04:49:56', '2020-03-28 04:49:56'),
(81, 13, '//gd4.alicdn.com/imgextra/i4/2483012241/TB2W34mjH8kpuFjy0FcXXaUhpXa_!!2483012241.jpg_400x400.jpg', 'túi1', 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.1.41cab6cbFfllS4&scm=1007.15423.84311.100200300000005&id=547622726143&pvid=f9020fee-9ac1-415f-b3f8-d4c9b40cb25e', 'xl', NULL, NULL, NULL, NULL, 'xanh', 24, 12, 2, NULL, '2020-03-30 01:24:51', '2020-03-30 01:24:51'),
(82, 14, '//gd4.alicdn.com/imgextra/i1/2273991402/TB29.CVrb1YBuNjSszeXXablFXa_!!2273991402.png_400x400.jpg', 'ádasd', 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.1.41cab6cbjXtrni&scm=1007.15423.84311.100200300000005&id=569694250190&pvid=10ff137c-41f2-4b2c-95fa-337ed3dcc16f', 'xl', NULL, NULL, NULL, NULL, 'xanh', 24, 12, 2, NULL, '2020-03-29 20:27:34', '2020-03-29 20:27:34'),
(83, 15, NULL, 'ghế gỗ', NULL, 'xl', NULL, NULL, NULL, NULL, 'xanh', 131, 131, 1, NULL, '2020-03-29 20:55:05', '2020-03-29 20:55:05'),
(84, 16, NULL, 'ghế gỗ', NULL, 'xl', NULL, NULL, NULL, NULL, 'xanh', 131, 131, 1, NULL, '2020-03-30 20:03:28', '2020-03-30 20:03:28'),
(85, 17, '//gd3.alicdn.com/imgextra/i4/2483012241/TB2W34mjH8kpuFjy0FcXXaUhpXa_!!2483012241.jpg_400x400.jpg', 'túi1', 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.1.41cab6cbFfllS4&scm=1007.15423.84311.100200300000005&id=547622726143&pvid=f9020fee-9ac1-415f-b3f8-d4c9b40cb25e', 'xl', NULL, NULL, NULL, NULL, 'xanh', 24, 12, 2, NULL, '2020-03-31 19:30:36', '2020-03-31 19:30:36'),
(87, 19, '//gd1.alicdn.com/imgextra/i4/2483012241/TB2W34mjH8kpuFjy0FcXXaUhpXa_!!2483012241.jpg_400x400.jpg', 'tui1', 'https://item.taobao.com/item.htm?spm=a21wu.241046-global.4691948847.1.41cab6cbFfllS4&scm=1007.15423.84311.100200300000005&id=547622726143&pvid=f9020fee-9ac1-415f-b3f8-d4c9b40cb25e', 'xl', NULL, NULL, NULL, NULL, 'xanh', 24, 12, 2, 'assss', '2020-04-02 18:54:42', '2020-04-02 18:54:42'),
(88, 20, NULL, 'ghế gỗ', NULL, 'xl', NULL, NULL, NULL, NULL, 'xanh', 131, 131, 1, NULL, '2020-04-06 23:18:09', '2020-04-06 23:18:09'),
(89, 22, NULL, 'ghế gỗ3', NULL, 'xl', NULL, NULL, NULL, NULL, 'xanh', 393, 131, 3, NULL, '2020-06-11 18:37:56', '2020-06-11 18:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietusers`
--

CREATE TABLE `chitietusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `userss_id` int(10) UNSIGNED DEFAULT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanhpho` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietusers`
--

INSERT INTO `chitietusers` (`id`, `userss_id`, `hoten`, `gioitinh`, `ngaysinh`, `facebook`, `sodienthoai`, `diachi`, `thanhpho`, `created_at`, `updated_at`) VALUES
(10, 11, 'trần quang thanh liêu', NULL, NULL, NULL, '0767130156', '76 nguyễn thái bình', 'đà nẵng', '2020-02-28 09:06:22', '2020-03-18 08:44:16'),
(11, 41, 'trần quang thanh liêu1', 'nam', '5/2/1998', 'ádas', '0767130156', NULL, 'đà nẵng', '2020-03-02 02:17:21', '2020-03-02 03:01:37'),
(12, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-11 00:00:32', '2020-03-11 00:00:32'),
(18, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-25 02:39:57', '2020-03-25 02:39:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtiens`
--

CREATE TABLE `congtiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sotien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congtiens`
--

INSERT INTO `congtiens` (`id`, `user_id`, `sotien`, `created_at`, `updated_at`) VALUES
(3, 11, 497872, '2020-03-28 04:18:38', '2020-04-07 00:39:52'),
(5, 41, 1000000, '2020-03-28 04:27:16', '2020-03-28 04:27:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangs`
--

CREATE TABLE `donhangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `thongtinkh_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `madonhang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_item_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chinhanh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalqty` int(11) DEFAULT NULL,
  `coc` int(11) DEFAULT NULL,
  `hoantien` int(11) DEFAULT NULL,
  `nhanlaihang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kiemhang` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangs`
--

INSERT INTO `donhangs` (`id`, `user_id`, `thongtinkh_id`, `admin_id`, `madonhang`, `cart_item_id`, `chinhanh`, `totalqty`, `coc`, `hoantien`, `nhanlaihang`, `note`, `kiemhang`, `sale`, `status`, `created_at`, `updated_at`) VALUES
(12, NULL, 8, 17, 'DH000002', NULL, '1', 824164, 824164, NULL, NULL, 'thanh toán đủ', 1, NULL, 'Khách trả hàng', '2020-04-28 04:49:56', '2020-03-29 20:51:04'),
(13, NULL, 8, 17, 'DH000003', NULL, '1', 78624, 32000, NULL, NULL, NULL, 1, NULL, 'Đã về kho', '2020-05-30 01:24:50', '2020-03-30 21:26:08'),
(14, NULL, 9, 17, 'DH000004', NULL, '1', 78672, NULL, NULL, NULL, NULL, 1, NULL, 'đã hết hàng', '2020-03-29 20:27:34', '2020-03-29 20:50:31'),
(15, 11, NULL, NULL, 'DH000005', NULL, NULL, 450476, NULL, NULL, NULL, NULL, 0, NULL, 'Hủy đơn hàng', '2020-03-29 20:55:00', '2020-03-29 20:57:06'),
(16, 11, NULL, NULL, 'DH000006', NULL, NULL, 524939, NULL, NULL, NULL, NULL, 1, 0, 'chờ xác nhận', '2020-03-30 20:03:20', '2020-03-30 20:03:28'),
(17, NULL, 9, 17, 'DH000007', NULL, '1', 157400, 157400, NULL, NULL, 'thanh toán đủ', 1, NULL, 'Đã về kho', '2020-03-31 19:30:36', '2020-04-02 18:14:51'),
(19, NULL, 8, 17, 'DH000009', NULL, '1', 90720, 50000, NULL, NULL, 'thanh toán sau', 1, NULL, 'Đã về kho', '2020-04-02 18:54:42', '2020-04-02 19:02:16'),
(20, 11, NULL, NULL, 'DH0000010', NULL, NULL, 502128, 502128, NULL, NULL, 'thanh toán đủ', 1, 1, 'chờ đơn hàng', '2020-04-06 23:17:35', '2020-04-07 00:40:06'),
(21, 11, NULL, NULL, 'DH0000011', NULL, NULL, 1564817, NULL, NULL, NULL, NULL, 1, 0, 'chờ xác nhận', '2020-06-11 18:29:35', '2020-06-11 18:32:27'),
(22, 11, NULL, NULL, 'DH0000012', NULL, NULL, 1564817, NULL, NULL, NULL, NULL, 1, 0, 'chờ xác nhận', '2020-06-11 18:37:28', '2020-06-11 18:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvans`
--

CREATE TABLE `donvans` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `nhavanchuyen_id` int(10) UNSIGNED NOT NULL,
  `madonvan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phitravanchuyen` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yeucau` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvans`
--

INSERT INTO `donvans` (`id`, `donhang_id`, `nhavanchuyen_id`, `madonvan`, `phitravanchuyen`, `note`, `yeucau`, `status`, `created_at`, `updated_at`) VALUES
(17, 12, 8, 'DV000002', NULL, 'Shop trả', 'Cho xem hàng, không cho thử', 'chờ giao hàng', '2020-03-29 20:43:59', '2020-03-29 20:43:59'),
(18, 17, 8, 'DV000003', NULL, 'Khách trả', 'Cho xem hàng, cho thử', 'chờ giao hàng', '2020-04-02 18:15:02', '2020-04-02 18:15:02'),
(20, 19, 8, 'DV001410', 20000, 'Khách trả', 'Cho xem hàng, không cho thử', 'chờ giao hàng', '2020-04-02 19:02:49', '2020-04-02 19:02:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khieunais`
--

CREATE TABLE `khieunais` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lydo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoiluongs`
--

CREATE TABLE `khoiluongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight_qd` int(11) DEFAULT NULL,
  `weight_tt` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoiluongs`
--

INSERT INTO `khoiluongs` (`id`, `donhang_id`, `length`, `width`, `height`, `weight_qd`, `weight_tt`, `status`, `created_at`, `updated_at`) VALUES
(39, 12, 20, 20, 20, 2, 4, NULL, '2020-03-29 20:34:32', '2020-03-29 20:34:32'),
(40, 12, 20, 20, 20, 2, 4, NULL, '2020-03-29 20:34:32', '2020-03-29 20:34:32'),
(41, 13, 20, 20, 20, 2, 4, NULL, '2020-03-30 21:26:08', '2020-03-30 21:26:08'),
(42, 17, 20, 20, 20, 2, 4, NULL, '2020-04-02 18:14:39', '2020-04-02 18:14:39'),
(44, 19, 20, 20, 20, 2, 4, NULL, '2020-04-02 18:56:10', '2020-04-02 18:56:10'),
(45, 20, 20, 20, 20, 2, 4, NULL, '2020-04-07 00:32:10', '2020-04-07 00:32:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhes`
--

CREATE TABLE `lienhes` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhes`
--

INSERT INTO `lienhes` (`id`, `hoten`, `email`, `tieude`, `noidung`, `status`, `created_at`, `updated_at`) VALUES
(1, 'nguyên văn A', 'lieu@gmail.com', 'đồ tốt', 'ok', 'đã trả lời', '2020-03-30 19:16:18', '2020-03-31 19:26:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luulinks`
--

CREATE TABLE `luulinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name_product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_17_020125_create_users_table', 1),
(4, '2019_09_18_012545_create_slides_table', 1),
(5, '2019_09_23_024608_create_theloais_table', 1),
(6, '2019_09_23_025226_create_tintucs_table', 1),
(8, '2019_09_27_024404_create_tuyendungs_table', 2),
(9, '2019_10_02_015549_create_usersses_table', 3),
(10, '2019_10_02_020534_create_usersses_table', 4),
(11, '2019_10_02_020727_create_social_accounts_table', 5),
(13, '2019_11_01_084135_create_bieuphihas_table', 6),
(20, '2019_11_15_092129_create_chitietusers_table', 7),
(23, '2019_11_15_093000_create_nccs_table', 8),
(24, '2019_11_15_093017_create_products_table', 8),
(36, '2019_11_19_085706_create_chitietusers_table', 10),
(37, '2019_11_19_085814_create_nccs_table', 10),
(38, '2019_11_19_085841_create_products_table', 10),
(50, '2020_02_11_144625_create_admins_tables', 14),
(88, '2020_02_11_185907_create_carts_table', 23),
(89, '2020_02_11_185908_create_cart_items_table', 23),
(91, '2020_02_11_185936_create_chitietdonhangs_table', 23),
(92, '2020_03_04_094444_create_table_phivanchuyens_table', 24),
(93, '2020_03_05_094444_create_table_phivanchuyens_table', 25),
(94, '2020_03_06_092208_create_table_khoiluongs_table', 26),
(98, '2020_02_05_091645_create_table_transations_table', 29),
(99, '2020_03_12_093404_create_table_chats_table', 30),
(100, '2020_03_16_114419_create_table_luulinks_table', 30),
(101, '2020_03_16_125637_create_table_khieunais_table', 31),
(104, '2020_02_28_015336_create_table_truycaps_table', 34),
(105, '2020_03_19_085639_create_table_nhomkhs_table', 35),
(106, '2020_03_17_083142_create_table_thongtinkhs_table', 36),
(109, '2020_02_11_144626_create_roles_table', 37),
(110, '2020_02_11_144627_create_roleadmins_table', 37),
(111, '2020_02_11_144628_create_permissions_table', 37),
(112, '2020_02_11_144629_create_rolepermission_table', 37),
(113, '2020_03_25_104934_add_sign_in_at_to_users', 38),
(114, '2020_03_25_105236_add_sign_in_at_to_admins', 39),
(115, '2020_03_25_113637_create_table_nhatkys_table', 40),
(116, '2020_02_11_185909_create_donhangs_table', 41),
(118, '2020_03_26_144708_create_table_donvans_table', 42),
(119, '2020_03_26_144558_create_table_nhavanchuyens_table', 43),
(120, '2020_02_05_091551_create_table_paymethods_table', 44),
(121, '2020_03_28_093433_create_table_congtiens_table', 45),
(122, '2020_03_28_093553_create_table_thongsos_table', 45),
(123, '2020_03_28_093554_create_table_naptiens_table', 45),
(124, '2020_03_31_020142_create_table_lienhes_table', 46),
(125, '2020_04_06_081013_create_table_tuvans_table', 47);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `naptiens`
--

CREATE TABLE `naptiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `congtien_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `naptiens`
--

INSERT INTO `naptiens` (`id`, `user_id`, `donhang_id`, `congtien_id`, `created_at`, `updated_at`) VALUES
(3, 11, 20, 3, '2020-04-07 00:18:00', '2020-04-07 00:18:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nccs`
--

CREATE TABLE `nccs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nccs`
--

INSERT INTO `nccs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tao bao', '2019-11-19 17:00:00', '2019-11-19 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkys`
--

CREATE TABLE `nhatkys` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `thoigian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thaotac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatkys`
--

INSERT INTO `nhatkys` (`id`, `admin_id`, `thoigian`, `thaotac`, `created_at`, `updated_at`) VALUES
(29, 17, '2020-09-17 09:55:05', 'đăng nhập', '2020-03-26 01:51:50', '2020-09-17 02:55:05'),
(32, 17, '2020-03-26 09:12:49', 'tạo đơn hàng DH000001', '2020-03-26 02:12:49', '2020-03-26 02:12:49'),
(33, 17, '2020-03-26 10:11:55', 'đã duyệt đơn hàngDH000001', '2020-03-26 03:11:55', '2020-03-26 03:11:55'),
(34, 17, '2020-03-26 10:12:35', 'xác nhận cọc tiền DH000001', '2020-03-26 03:12:35', '2020-03-26 03:12:35'),
(35, 17, '2020-03-26 10:12:42', 'xác nhận mua hàng DH000001', '2020-03-26 03:12:42', '2020-03-26 03:12:42'),
(36, 17, '2020-03-26 10:12:53', 'nhập thông tin đơn hàng DH000001', '2020-03-26 03:12:53', '2020-03-26 03:12:53'),
(37, 17, '2020-03-26 10:14:22', 'xác nhận kết thúc đơn hàng DH000001', '2020-03-26 03:14:22', '2020-03-26 03:14:22'),
(38, 17, '2020-03-26 10:59:18', 'tạo đơn hàng DH000002', '2020-03-26 03:59:18', '2020-03-26 03:59:18'),
(39, 17, '2020-03-26 10:59:26', 'đã duyệt đơn hàngDH000002', '2020-03-26 03:59:26', '2020-03-26 03:59:26'),
(40, 17, '2020-03-26 11:00:24', 'xác nhận cọc tiền DH000002', '2020-03-26 04:00:24', '2020-03-26 04:00:24'),
(41, 17, '2020-03-26 11:00:28', 'xác nhận mua hàng DH000002', '2020-03-26 04:00:28', '2020-03-26 04:00:28'),
(42, 17, '2020-03-26 11:00:43', 'nhập thông tin đơn hàng DH000002', '2020-03-26 04:00:43', '2020-03-26 04:00:43'),
(43, 17, '2020-03-26 11:01:44', 'xác nhận kết thúc đơn hàng DH000002', '2020-03-26 04:01:44', '2020-03-26 04:01:44'),
(44, 17, '2020-03-26 11:25:13', 'tạo đơn hàng DH000003', '2020-03-26 04:25:13', '2020-03-26 04:25:13'),
(45, 17, '2020-03-26 11:25:22', 'đã duyệt đơn hàngDH000003', '2020-03-26 04:25:22', '2020-03-26 04:25:22'),
(46, 17, '2020-03-26 11:26:03', 'xác nhận cọc tiền DH000003', '2020-03-26 04:26:03', '2020-03-26 04:26:03'),
(47, 17, '2020-03-26 11:26:31', 'xác nhận mua hàng DH000003', '2020-03-26 04:26:31', '2020-03-26 04:26:31'),
(48, 17, '2020-03-26 11:27:01', 'nhập thông tin đơn hàng DH000003', '2020-03-26 04:27:01', '2020-03-26 04:27:01'),
(49, 17, '2020-03-26 11:30:12', 'xác nhận kết thúc đơn hàng DH000003', '2020-03-26 04:30:12', '2020-03-26 04:30:12'),
(50, 17, '2020-03-27 08:30:24', 'tạo đơn hàng DH000004', '2020-03-27 01:30:24', '2020-03-27 01:30:24'),
(51, 17, '2020-03-27 11:39:34', 'đã duyệt đơn hàngDH000004', '2020-03-27 04:39:34', '2020-03-27 04:39:34'),
(52, 17, '2020-03-27 11:39:41', 'xác nhận cọc tiền DH000004', '2020-03-27 04:39:41', '2020-03-27 04:39:41'),
(53, 17, '2020-03-27 11:39:45', 'xác nhận mua hàng DH000004', '2020-03-27 04:39:45', '2020-03-27 04:39:45'),
(54, 17, '2020-03-27 11:39:53', 'nhập thông tin đơn hàng DH000004', '2020-03-27 04:39:53', '2020-03-27 04:39:53'),
(55, 17, '2020-03-27 14:09:10', 'in đơn hàng DH000004', '2020-03-27 07:09:10', '2020-03-27 07:09:10'),
(56, 17, '2020-03-27 14:09:10', 'in đơn hàng DH000004', '2020-03-27 07:09:10', '2020-03-27 07:09:10'),
(57, 17, '2020-03-27 14:21:40', 'in đơn hàng DH000004', '2020-03-27 07:21:40', '2020-03-27 07:21:40'),
(58, 17, '2020-03-27 14:22:01', 'in đơn hàng DH000004', '2020-03-27 07:22:01', '2020-03-27 07:22:01'),
(59, 17, '2020-03-27 14:23:51', 'in đơn hàng DH000004', '2020-03-27 07:23:51', '2020-03-27 07:23:51'),
(60, 17, '2020-03-27 14:26:17', 'in đơn hàng DH000004', '2020-03-27 07:26:17', '2020-03-27 07:26:17'),
(61, 17, '2020-03-27 14:30:50', 'in đơn hàng DH000004', '2020-03-27 07:30:50', '2020-03-27 07:30:50'),
(62, 17, '2020-03-27 15:47:15', 'in đơn hàng DH000004', '2020-03-27 08:47:15', '2020-03-27 08:47:15'),
(63, 17, '2020-03-27 15:48:15', 'in đơn hàng DH000004', '2020-03-27 08:48:15', '2020-03-27 08:48:15'),
(64, 17, '2020-03-27 15:52:26', 'in đơn hàng DH000004', '2020-03-27 08:52:26', '2020-03-27 08:52:26'),
(65, 17, '2020-03-27 15:54:02', 'in đơn hàng DH000004', '2020-03-27 08:54:02', '2020-03-27 08:54:02'),
(66, 17, '2020-03-27 15:54:26', 'in đơn hàng DH000004', '2020-03-27 08:54:26', '2020-03-27 08:54:26'),
(67, 17, '2020-03-27 15:57:07', 'in đơn hàng DH000004', '2020-03-27 08:57:07', '2020-03-27 08:57:07'),
(68, 17, '2020-03-27 15:57:21', 'in đơn hàng DH000004', '2020-03-27 08:57:21', '2020-03-27 08:57:21'),
(69, 17, '2020-03-27 16:00:22', 'in đơn hàng DH000004', '2020-03-27 09:00:22', '2020-03-27 09:00:22'),
(70, 17, '2020-03-27 16:01:44', 'in đơn hàng DH000004', '2020-03-27 09:01:44', '2020-03-27 09:01:44'),
(71, 17, '2020-03-27 16:02:08', 'in đơn hàng DH000004', '2020-03-27 09:02:08', '2020-03-27 09:02:08'),
(72, 17, '2020-03-27 16:03:06', 'in đơn hàng DH000004', '2020-03-27 09:03:06', '2020-03-27 09:03:06'),
(73, 17, '2020-03-27 16:03:59', 'in đơn hàng DH000004', '2020-03-27 09:03:59', '2020-03-27 09:03:59'),
(74, 17, '2020-03-27 16:04:15', 'in đơn hàng DH000004', '2020-03-27 09:04:15', '2020-03-27 09:04:15'),
(75, 17, '2020-03-27 16:04:20', 'in đơn hàng DH000004', '2020-03-27 09:04:20', '2020-03-27 09:04:20'),
(76, 17, '2020-03-27 16:04:55', 'in đơn hàng DH000004', '2020-03-27 09:04:55', '2020-03-27 09:04:55'),
(77, 17, '2020-03-27 16:05:38', 'in đơn hàng DH000004', '2020-03-27 09:05:38', '2020-03-27 09:05:38'),
(78, 17, '2020-03-27 16:31:01', 'xác nhận kết thúc đơn hàng DH000004', '2020-03-27 09:31:01', '2020-03-27 09:31:01'),
(79, 17, '2020-03-27 16:47:16', 'đã duyệt đơn hàngDH000005', '2020-03-27 09:47:16', '2020-03-27 09:47:16'),
(80, 17, '2020-03-27 16:48:46', 'xác nhận mua hàng DH000005', '2020-03-27 09:48:46', '2020-03-27 09:48:46'),
(81, 17, '2020-03-27 16:48:57', 'nhập thông tin đơn hàng DH000005', '2020-03-27 09:48:57', '2020-03-27 09:48:57'),
(82, 17, '2020-03-28 06:12:03', 'đã duyệt đơn hàngDH000006', '2020-03-27 23:12:03', '2020-03-27 23:12:03'),
(83, 17, '2020-03-28 06:14:31', 'xác nhận nạp tiền hco khách hàng tên lieu', '2020-03-27 23:14:31', '2020-03-27 23:14:31'),
(84, 17, '2020-03-28 06:14:45', 'xác nhận mua hàng DH000006', '2020-03-27 23:14:45', '2020-03-27 23:14:45'),
(85, 17, '2020-03-28 06:14:54', 'nhập thông tin đơn hàng DH000006', '2020-03-27 23:14:54', '2020-03-27 23:14:54'),
(86, 17, '2020-03-28 06:52:44', 'đã duyệt đơn hàngDH000007', '2020-03-27 23:52:44', '2020-03-27 23:52:44'),
(87, 17, '2020-03-28 06:53:04', 'xác nhận mua hàng DH000007', '2020-03-27 23:53:04', '2020-03-27 23:53:04'),
(88, 17, '2020-03-28 06:53:13', 'nhập thông tin đơn hàng DH000007', '2020-03-27 23:53:13', '2020-03-27 23:53:13'),
(89, 17, '2020-03-28 06:58:14', 'đã duyệt đơn hàngDH000008', '2020-03-27 23:58:14', '2020-03-27 23:58:14'),
(90, 17, '2020-03-28 06:58:24', 'xác nhận mua hàng DH000008', '2020-03-27 23:58:24', '2020-03-27 23:58:24'),
(91, 17, '2020-03-28 06:58:35', 'nhập thông tin đơn hàng DH000008', '2020-03-27 23:58:35', '2020-03-27 23:58:35'),
(92, 17, '2020-03-28 08:04:00', 'in đơn hàng DH000008', '2020-03-28 01:04:00', '2020-03-28 01:04:00'),
(93, 17, '2020-03-28 08:04:34', 'in đơn hàng DH000008', '2020-03-28 01:04:34', '2020-03-28 01:04:34'),
(94, 17, '2020-03-28 08:04:43', 'xác nhận in hóa đơn ', '2020-03-28 01:04:43', '2020-03-28 01:04:43'),
(95, 17, '2020-03-28 08:05:11', 'xác nhận in hóa đơn ', '2020-03-28 01:05:11', '2020-03-28 01:05:11'),
(96, 17, '2020-03-28 08:05:15', 'xác nhận in hóa đơn ', '2020-03-28 01:05:15', '2020-03-28 01:05:15'),
(97, 17, '2020-03-28 08:05:42', 'xác nhận in hóa đơn ', '2020-03-28 01:05:42', '2020-03-28 01:05:42'),
(98, 17, '2020-03-28 08:05:51', 'xác nhận in hóa đơn ', '2020-03-28 01:05:51', '2020-03-28 01:05:51'),
(99, 17, '2020-03-28 08:06:24', 'xác nhận in hóa đơn ', '2020-03-28 01:06:24', '2020-03-28 01:06:24'),
(100, 17, '2020-03-28 08:07:07', 'xác nhận in hóa đơn ', '2020-03-28 01:07:07', '2020-03-28 01:07:07'),
(101, 17, '2020-03-28 08:13:20', 'xác nhận kết thúc đơn hàng DH000008', '2020-03-28 01:13:20', '2020-03-28 01:13:20'),
(102, 17, '2020-03-28 08:24:34', 'giải quyết khiếu nại', '2020-03-28 01:24:34', '2020-03-28 01:24:34'),
(103, 17, '2020-03-28 08:47:32', 'giải quyết khiếu nại', '2020-03-28 01:47:32', '2020-03-28 01:47:32'),
(104, 17, '2020-03-28 10:13:22', 'nap tiền cho khách hàng', '2020-03-28 03:13:22', '2020-03-28 03:13:22'),
(105, 17, '2020-03-28 10:27:18', 'đã duyệt đơn hàngDH000009', '2020-03-28 03:27:18', '2020-03-28 03:27:18'),
(106, 17, '2020-03-28 10:32:05', 'xác nhận mua hàng DH000009', '2020-03-28 03:32:05', '2020-03-28 03:32:05'),
(107, 17, '2020-03-28 10:32:15', 'nhập thông tin đơn hàng DH000009', '2020-03-28 03:32:15', '2020-03-28 03:32:15'),
(108, 17, '2020-03-28 11:00:25', 'nap tiền cho khách hàng', '2020-03-28 04:00:25', '2020-03-28 04:00:25'),
(109, 17, '2020-03-28 11:13:12', 'nap tiền cho khách hàng', '2020-03-28 04:13:12', '2020-03-28 04:13:12'),
(110, 17, '2020-03-28 11:13:24', 'nap tiền cho khách hàng', '2020-03-28 04:13:24', '2020-03-28 04:13:24'),
(111, 17, '2020-03-28 11:15:15', 'nap tiền cho khách hàng', '2020-03-28 04:15:15', '2020-03-28 04:15:15'),
(112, 17, '2020-03-28 11:15:20', 'nap tiền cho khách hàng', '2020-03-28 04:15:20', '2020-03-28 04:15:20'),
(113, 17, '2020-03-28 11:18:38', 'nap tiền cho khách hàng', '2020-03-28 04:18:38', '2020-03-28 04:18:38'),
(114, 17, '2020-03-28 11:18:46', 'nap tiền cho khách hàng', '2020-03-28 04:18:46', '2020-03-28 04:18:46'),
(115, 17, '2020-03-28 11:19:06', 'nap tiền cho khách hàng', '2020-03-28 04:19:06', '2020-03-28 04:19:06'),
(116, 17, '2020-03-28 11:19:12', 'nap tiền cho khách hàng', '2020-03-28 04:19:12', '2020-03-28 04:19:12'),
(117, 17, '2020-03-28 11:20:17', 'nap tiền cho khách hàng', '2020-03-28 04:20:17', '2020-03-28 04:20:17'),
(118, 17, '2020-03-28 11:20:41', 'nap tiền cho khách hàng', '2020-03-28 04:20:41', '2020-03-28 04:20:41'),
(119, 17, '2020-03-28 11:20:47', 'nap tiền cho khách hàng', '2020-03-28 04:20:47', '2020-03-28 04:20:47'),
(120, 17, '2020-03-28 11:24:03', 'nap tiền cho khách hàng', '2020-03-28 04:24:03', '2020-03-28 04:24:03'),
(121, 17, '2020-03-28 11:27:16', 'nap tiền cho khách hàng', '2020-03-28 04:27:16', '2020-03-28 04:27:16'),
(122, 17, '2020-03-28 11:48:13', 'tạo đơn hàng DH000001', '2020-03-28 04:48:13', '2020-03-28 04:48:13'),
(123, 17, '2020-03-28 11:48:20', 'đã duyệt đơn hàngDH000001', '2020-03-28 04:48:20', '2020-03-28 04:48:20'),
(124, 17, '2020-03-28 11:48:26', 'xác nhận cọc tiền DH000001', '2020-03-28 04:48:26', '2020-03-28 04:48:26'),
(125, 17, '2020-03-28 11:48:30', 'xác nhận mua hàng DH000001', '2020-03-28 04:48:30', '2020-03-28 04:48:30'),
(126, 17, '2020-03-28 11:48:39', 'nhập thông tin đơn hàng DH000001', '2020-03-28 04:48:39', '2020-03-28 04:48:39'),
(127, 17, '2020-03-28 11:48:53', 'xác nhận kết thúc đơn hàng DH000001', '2020-03-28 04:48:53', '2020-03-28 04:48:53'),
(128, 17, '2020-03-28 11:49:22', 'xác nhận nạp tiền hco khách hàng tên lieu', '2020-03-28 04:49:22', '2020-03-28 04:49:22'),
(129, 17, '2020-03-28 11:49:40', 'tạo đơn hàng DH000001', '2020-03-28 04:49:40', '2020-03-28 04:49:40'),
(130, 17, '2020-03-28 11:49:56', 'tạo đơn hàng DH000002', '2020-03-28 04:49:56', '2020-03-28 04:49:56'),
(131, 17, '2020-03-28 11:50:03', 'đã duyệt đơn hàngDH000001', '2020-03-28 04:50:03', '2020-03-28 04:50:03'),
(132, 17, '2020-03-28 11:52:15', 'xác nhận cọc tiền DH000001', '2020-03-28 04:52:15', '2020-03-28 04:52:15'),
(133, 17, '2020-03-28 11:52:18', 'xác nhận mua hàng DH000001', '2020-03-28 04:52:18', '2020-03-28 04:52:18'),
(134, 17, '2020-03-28 11:52:27', 'nhập thông tin đơn hàng DH000001', '2020-03-28 04:52:27', '2020-03-28 04:52:27'),
(135, 17, '2020-03-28 11:53:23', 'xác nhận kết thúc đơn hàng DH000001', '2020-03-28 04:53:23', '2020-03-28 04:53:23'),
(136, 17, '2020-03-30 08:24:51', 'tạo đơn hàng DH000003', '2020-03-30 01:24:51', '2020-03-30 01:24:51'),
(137, 17, '2020-03-30 03:27:34', 'tạo đơn hàng DH000004', '2020-03-29 20:27:34', '2020-03-29 20:27:34'),
(138, 17, '2020-03-30 03:34:13', 'đã duyệt đơn hàngDH000002', '2020-03-29 20:34:13', '2020-03-29 20:34:13'),
(139, 17, '2020-03-30 03:34:20', 'xác nhận cọc tiền DH000002', '2020-03-29 20:34:20', '2020-03-29 20:34:20'),
(140, 17, '2020-03-30 03:34:24', 'xác nhận mua hàng DH000002', '2020-03-29 20:34:24', '2020-03-29 20:34:24'),
(141, 17, '2020-03-30 03:34:32', 'nhập thông tin đơn hàng DH000002', '2020-03-29 20:34:32', '2020-03-29 20:34:32'),
(142, 17, '2020-03-30 03:34:32', 'nhập thông tin đơn hàng DH000002', '2020-03-29 20:34:32', '2020-03-29 20:34:32'),
(143, 17, '2020-03-30 03:50:31', 'xác nhận đơn hàng DH000004đã hủy', '2020-03-29 20:50:31', '2020-03-29 20:50:31'),
(144, 17, '2020-03-30 03:50:59', 'xác nhận kết thúc đơn hàng DH000002', '2020-03-29 20:50:59', '2020-03-29 20:50:59'),
(145, 17, '2020-03-30 03:55:26', 'đã duyệt đơn hàngDH000005', '2020-03-29 20:55:26', '2020-03-29 20:55:26'),
(146, 17, '2020-03-31 03:15:34', 'thêm tỷ giá', '2020-03-30 20:15:34', '2020-03-30 20:15:34'),
(147, 17, '2020-03-31 03:30:07', 'thêm tỷ giá', '2020-03-30 20:30:07', '2020-03-30 20:30:07'),
(148, 17, '2020-03-31 03:30:20', 'thêm tỷ giá', '2020-03-30 20:30:20', '2020-03-30 20:30:20'),
(149, 17, '2020-03-31 03:31:02', 'thêm tỷ giá', '2020-03-30 20:31:02', '2020-03-30 20:31:02'),
(150, 17, '2020-03-31 03:34:05', 'thêm tỷ giá', '2020-03-30 20:34:05', '2020-03-30 20:34:05'),
(151, 17, '2020-03-31 03:37:04', 'thêm tỷ giá', '2020-03-30 20:37:04', '2020-03-30 20:37:04'),
(152, 17, '2020-03-31 03:40:05', 'thêm tỷ giá', '2020-03-30 20:40:05', '2020-03-30 20:40:05'),
(153, 17, '2020-03-31 03:40:15', 'thêm tỷ giá', '2020-03-30 20:40:15', '2020-03-30 20:40:15'),
(154, 17, '2020-03-31 03:40:55', 'thêm tỷ giá', '2020-03-30 20:40:55', '2020-03-30 20:40:55'),
(155, 17, '2020-03-31 03:41:02', 'thêm tỷ giá', '2020-03-30 20:41:02', '2020-03-30 20:41:02'),
(156, 17, '2020-03-31 04:25:47', 'đã duyệt đơn hàngDH000003', '2020-03-30 21:25:47', '2020-03-30 21:25:47'),
(157, 17, '2020-03-31 04:25:53', 'xác nhận cọc tiền DH000003', '2020-03-30 21:25:53', '2020-03-30 21:25:53'),
(158, 17, '2020-03-31 04:25:57', 'xác nhận mua hàng DH000003', '2020-03-30 21:25:57', '2020-03-30 21:25:57'),
(159, 17, '2020-03-31 04:26:08', 'nhập thông tin đơn hàng DH000003', '2020-03-30 21:26:08', '2020-03-30 21:26:08'),
(160, 17, '2020-04-01 02:30:36', 'tạo đơn hàng DH000007', '2020-03-31 19:30:36', '2020-03-31 19:30:36'),
(161, 17, '2020-04-03 01:13:44', 'đã duyệt đơn hàngDH000007', '2020-04-02 18:13:44', '2020-04-02 18:13:44'),
(162, 17, '2020-04-03 01:14:23', 'xác nhận cọc tiền DH000007', '2020-04-02 18:14:23', '2020-04-02 18:14:23'),
(163, 17, '2020-04-03 01:14:27', 'xác nhận mua hàng DH000007', '2020-04-02 18:14:27', '2020-04-02 18:14:27'),
(164, 17, '2020-04-03 01:14:39', 'nhập thông tin đơn hàng DH000007', '2020-04-02 18:14:39', '2020-04-02 18:14:39'),
(165, 17, '2020-04-03 01:15:58', 'in đơn hàng DH000007', '2020-04-02 18:15:58', '2020-04-02 18:15:58'),
(166, 17, '2020-04-03 01:32:02', 'tạo đơn hàng DH000008', '2020-04-02 18:32:02', '2020-04-02 18:32:02'),
(167, 17, '2020-04-03 01:32:10', 'đã duyệt đơn hàngDH000008', '2020-04-02 18:32:10', '2020-04-02 18:32:10'),
(168, 17, '2020-04-03 01:32:18', 'xác nhận cọc tiền DH000008', '2020-04-02 18:32:18', '2020-04-02 18:32:18'),
(169, 17, '2020-04-03 01:32:21', 'xác nhận mua hàng DH000008', '2020-04-02 18:32:21', '2020-04-02 18:32:21'),
(170, 17, '2020-04-03 01:32:31', 'nhập thông tin đơn hàng DH000008', '2020-04-02 18:32:31', '2020-04-02 18:32:31'),
(171, 17, '2020-04-03 01:54:42', 'tạo đơn hàng DH000009', '2020-04-02 18:54:42', '2020-04-02 18:54:42'),
(172, 17, '2020-04-03 01:55:46', 'đã duyệt đơn hàngDH000009', '2020-04-02 18:55:46', '2020-04-02 18:55:46'),
(173, 17, '2020-04-03 01:55:55', 'xác nhận cọc tiền DH000009', '2020-04-02 18:55:55', '2020-04-02 18:55:55'),
(174, 17, '2020-04-03 01:55:59', 'xác nhận mua hàng DH000009', '2020-04-02 18:55:59', '2020-04-02 18:55:59'),
(175, 17, '2020-04-03 01:56:10', 'nhập thông tin đơn hàng DH000009', '2020-04-02 18:56:10', '2020-04-02 18:56:10'),
(176, 17, '2020-04-03 02:12:49', 'in đơn hàng DH000008', '2020-04-02 19:12:49', '2020-04-02 19:12:49'),
(177, 17, '2020-04-03 02:13:37', 'in đơn hàng DH000008', '2020-04-02 19:13:37', '2020-04-02 19:13:37'),
(178, 17, '2020-04-07 07:17:53', 'đã duyệt đơn hàngDH0000010', '2020-04-07 00:17:53', '2020-04-07 00:17:53'),
(179, 17, '2020-04-07 07:24:15', 'xác nhận mua hàng DH0000010', '2020-04-07 00:24:15', '2020-04-07 00:24:15'),
(180, 17, '2020-04-07 07:32:10', 'nhập thông tin đơn hàng DH0000010', '2020-04-07 00:32:10', '2020-04-07 00:32:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhavanchuyens`
--

CREATE TABLE `nhavanchuyens` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhavanchuyen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennhavanchuyen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaidoitac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhavanchuyens`
--

INSERT INTO `nhavanchuyens` (`id`, `manhavanchuyen`, `tennhavanchuyen`, `loaidoitac`, `email`, `phone`, `diachi`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(8, 'DT000001', 'nguyễn trân a', 'Shipper của cửa hàng', 'trana@gmail.com', '1213123456', '76 Nguyễn thái bình đà năgxx', NULL, 17, '2020-03-27 02:52:24', '2020-03-27 02:52:24'),
(9, 'DT000002', 'nguyễn trân b', 'Shipper của cửa hàng', 'tranb@gmail.com', '1213123452', '76 Nguyễn thái bình đà năgxx', NULL, 17, '2020-03-27 02:52:41', '2020-03-27 02:52:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomkhs`
--

CREATE TABLE `nhomkhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennhom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomkhs`
--

INSERT INTO `nhomkhs` (`id`, `manhom`, `tennhom`, `mota`, `status`, `created_at`, `updated_at`) VALUES
(2, 'kldnt', 'khách lẽ', 'khách lẽ', NULL, '2020-03-19 02:52:59', '2020-03-19 02:52:59'),
(4, 'kbdnt', 'khách buôn', 'khách buôn', NULL, '2020-03-19 03:01:34', '2020-03-19 03:01:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paymethods`
--

CREATE TABLE `paymethods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotien` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paymethods`
--

INSERT INTO `paymethods` (`id`, `user_id`, `ten`, `image`, `mota`, `sotien`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'lieu', 'IMG_0390.PNG', 'chuyển khoản VCB', 1000000, 'đã xác nhận', '2020-03-28 03:19:47', '2020-03-28 04:49:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `Name`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'user-add', 'Thêm user', NULL, NULL),
(2, 'user-list', 'Danh Sách User', NULL, NULL),
(3, 'user-edit', 'Sửa User', NULL, NULL),
(4, 'user-delete', 'Xóa User', NULL, NULL),
(5, 'role-list', 'Danh Sách Role', NULL, NULL),
(6, 'role-add', 'Thêm Role', NULL, NULL),
(7, 'role-edit', 'Sửa Role', NULL, NULL),
(8, 'role-delete', 'Xóa Role', NULL, NULL),
(9, 'permission-add', 'Thêm vai trò', NULL, NULL),
(10, 'list-donhhang', 'quản lý đơn hàng', '2020-03-20 06:26:49', '2020-03-20 06:26:49'),
(11, 'list-khachhang', 'quản lý khách hàng', '2020-03-20 06:47:55', '2020-03-20 06:47:55'),
(12, 'khachhang-add', 'thêm khách hàng', '2020-03-20 06:49:12', '2020-03-20 06:49:12'),
(13, 'edit-khachhang', 'sửa thông tin khách hàng', '2020-03-20 06:49:54', '2020-03-20 06:49:54'),
(14, 'nhomkhachhang-add', 'thêm nhóm khách hàng', '2020-03-20 06:50:18', '2020-03-20 06:50:18'),
(15, 'list-nhomkhachhang', 'danh sách nhóm khách hàng', '2020-03-20 06:50:45', '2020-03-20 06:50:45'),
(16, 'delete-khachhang', 'xóa khách hàng', '2020-03-20 07:36:32', '2020-03-20 07:36:32'),
(17, 'list-nap', 'danh sách nạp tiền', '2020-03-20 07:47:52', '2020-03-20 07:47:52'),
(18, 'donhhang-add', 'tạo đơn hàng', '2020-03-20 07:57:10', '2020-03-20 07:57:10'),
(19, 'khieunai-list', 'khiếu nại', '2020-03-30 21:09:45', '2020-03-30 21:09:45'),
(20, 'trahang-list', 'danh sách trả hàng', '2020-03-30 21:11:20', '2020-03-30 21:11:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phivanchuyens`
--

CREATE TABLE `phivanchuyens` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED DEFAULT NULL,
  `phinoidia` int(11) DEFAULT NULL,
  `phivc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phivanchuyens`
--

INSERT INTO `phivanchuyens` (`id`, `donhang_id`, `phinoidia`, `phivc`, `created_at`, `updated_at`) VALUES
(56, 12, 6, 32000, '2020-03-29 20:34:13', '2020-03-29 20:34:32'),
(58, 13, 6, 32000, '2020-03-30 21:25:47', '2020-03-30 21:26:08'),
(59, 17, 6, 32000, '2020-04-02 18:13:44', '2020-04-02 18:14:39'),
(61, 19, 6, 32000, '2020-04-02 18:55:46', '2020-04-02 18:56:10'),
(62, 20, 6, 32000, '2020-04-07 00:17:53', '2020-04-07 00:32:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `mota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ncc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `promotion_price`, `mota`, `img`, `id_ncc`, `created_at`, `updated_at`) VALUES
(1, 'an tran', '10000', 0, 'trterwe', '69279384_2330964000499431_3137470616135794688_o.jpg', 1, '2019-11-20 06:57:49', '2019-11-20 06:57:49'),
(2, 'túi xách', '100000', 0, 'hàng đài loan', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `Name`, `Description`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'quản trị', NULL, NULL, '2020-03-30 21:11:27'),
(2, 'nhanvien', 'nhân viên', NULL, NULL, '2020-03-20 06:43:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_admins`
--

CREATE TABLE `role_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `Admin_id` int(10) UNSIGNED NOT NULL,
  `Role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_admins`
--

INSERT INTO `role_admins` (`id`, `Admin_id`, `Role_id`, `created_at`, `updated_at`) VALUES
(12, 17, 1, NULL, NULL),
(13, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(17, 2, 10, NULL, NULL),
(136, 1, 1, NULL, NULL),
(137, 1, 2, NULL, NULL),
(138, 1, 3, NULL, NULL),
(139, 1, 4, NULL, NULL),
(140, 1, 5, NULL, NULL),
(141, 1, 6, NULL, NULL),
(142, 1, 7, NULL, NULL),
(143, 1, 8, NULL, NULL),
(144, 1, 9, NULL, NULL),
(145, 1, 10, NULL, NULL),
(146, 1, 11, NULL, NULL),
(147, 1, 12, NULL, NULL),
(148, 1, 13, NULL, NULL),
(149, 1, 14, NULL, NULL),
(150, 1, 15, NULL, NULL),
(151, 1, 16, NULL, NULL),
(152, 1, 17, NULL, NULL),
(153, 1, 18, NULL, NULL),
(154, 1, 19, NULL, NULL),
(155, 1, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `img`, `tieude`, `slug`, `created_at`, `updated_at`) VALUES
(17, 'slite1.jpg', 'slite1', 'slite1', '2019-11-28 01:45:59', '2019-11-28 01:45:59'),
(18, 'banner-search.png', 'slide2', 'slide-2', '2020-05-15 09:24:43', '2020-05-15 09:24:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloais`
--

CREATE TABLE `theloais` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloais`
--

INSERT INTO `theloais` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kinh doanh', NULL, NULL),
(2, 'Giải đáp thắc mắc', NULL, NULL),
(3, 'Tin tức cửa hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsos`
--

CREATE TABLE `thongsos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaythem` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tygia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsos`
--

INSERT INTO `thongsos` (`id`, `ngaythem`, `tygia`, `created_at`, `updated_at`) VALUES
(12, '2020-03-31', 3780, '2020-03-30 20:41:02', '2020-03-30 20:41:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinkhs`
--

CREATE TABLE `thongtinkhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `nhomkh_id` int(10) UNSIGNED DEFAULT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thanhpho` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `gioitinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinkhs`
--

INSERT INTO `thongtinkhs` (`id`, `admin_id`, `nhomkh_id`, `hoten`, `diachi`, `thanhpho`, `email`, `sdt`, `gioitinh`, `ngaysinh`, `facebook`, `note`, `created_at`, `updated_at`) VALUES
(8, 3, 2, 'nguyễn văn b', '76 nguyễn thái bình', 'đà nẵng', 'b@gmail.com', 125555542, 'nam', '2020-03-06', 'https://www.facebook.com/', NULL, '2020-03-25 07:16:25', '2020-03-25 07:16:25'),
(9, 17, 2, 'nguyên văn c', '76 nguyễn thái bình', 'đà nẵng', 'c@gmail.com', 125555543, 'nam', '2020-03-04', 'https://www.facebook.com/', NULL, '2020-03-27 01:17:50', '2020-03-27 01:17:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintucs`
--

CREATE TABLE `tintucs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tl` int(10) UNSIGNED NOT NULL,
  `noidungtt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintucs`
--

INSERT INTO `tintucs` (`id`, `tieude`, `img`, `slug`, `noidung`, `id_tl`, `noidungtt`, `created_at`, `updated_at`) VALUES
(16, 'KINH NGHIỆM NHẬP HÀNG', 'Thumb.png', 'kinh-nghiep-nhap-hang', '<h2><strong>Nhu cầu tìm nguồn hàng phụ kiện Concept</strong></h2>\r\n\r\n<p>Hiện nay, thị trường quần áo, giày dép, túi xách đã bão hòa. Chúng ta có thể thấy người người, nhà nhà đều bán online, xuất hiện nhan nhản bán trên facebook, zalo. Nếu bạn xác định kinh doanh là công việc chính. Một là bạn phải thực sự khác biệt với những người kinh doanh còn lại. Hai là tìm cho mình thị trường, đối tượng buôn bán tuy ít nhưng lời cao.</p>\r\n\r\n<p><img alt=\"Nhu cầu tìm nguồn hàng phụ kiện Concept\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-phu-kien-concept-1.png\" /></p>\r\n\r\n<p>Kinh doanh phụ kiện Concept nghe có vẻ lạ lẫm nhưng đây là thị trường ngách đặc biệt hời cho những ai biết tận dụng thời cơ và khả năng kinh doanh tốt. Nguồn hàng phụ kiện Concept có thể bạn chưa biết như: quần áo cổ trang, những bộ trang phục châu âu, nguồn hàng đầm quý tộc, phụ kiện chụp ảnh cưới… dành cho những bữa tiệc, lễ hội, chương trình ca nhạc. Đây là thị trường ít ai để ý bởi những bộ trang phục này không sử dụng hàng ngày như quần áo thông thường. Nhưng hầu như lúc nào cũng có nhu cầu sử dụng, hàng ngày cũng có vô số đơn vị, tổ chức cần thuê trang phục để biểu diễn và chụp ảnh.</p>\r\n\r\n<p>Ngoài kinh doanh nguồn hàng phụ kiện concept giá sỉ, bạn cũng có thể tự mở 1 shop cho thuê những bộ phụ kiện chụp ảnh quần áo. Vừa ít phải cạnh tranh với nhiều shop quần áo vừa có thương hiệu riêng. Bởi vậy, tìm được địa chỉ bán phụ kiện và concept giá sỉ sẽ giúp bạn thuận lợi hơn.</p>\r\n\r\n<h2><strong>Cách tìm nguồn hàng phụ kiện Concept</strong></h2>\r\n\r\n<p>Tìm nguồn hàng phụ kiện Concept ở đâu là câu hỏi khiến nhiều người kinh doanh băn khoăn. Bởi lẽ, những nguồn hàng Concept và phụ kiện không hề dễ kiếm, phải có thời gian tìm hiểu mới tìm được nơi phân phối tốt, đúng với yêu cầu. Dưới đây là 3 cách tìm nguồn hàng phụ kiện Concept:</p>\r\n\r\n<p>+ Trực tiếp đến các chợ đầu mối: Nếu muốn kiểm tra chất lượng sản phẩm, bạn có thể trực tiếp đến các khu chợ đầu mối trong nước. Tuy nhiên hàng hóa không thực sự phong phú và cũng ít cửa hàng bán bộ phụ kiện concept make-up. Để đa dạng hơn, bạn có thể sang các phụ chợ đầu mối Quảng Châu tìm nguồn. Ở những khu chợ Quảng Châu nguồn hàng sẽ nhiều, mẫu mã và chất lượng tốt, giá cả tận gốc.</p>\r\n\r\n<p>Tuy nhiên, nếu sang Trung Quốc đánh hàng bạn cần bỏ ra 1 số vốn lớn. Chi phí làm visa, hộ chiếu và chi phí đi lại, ăn uống sẽ tốn khá nhiều. Chưa kể bạn không biết tiếng Trung.</p>\r\n\r\n<p>+ Tìm và order nguồn hàng phụ kiện Concept trên Web TMĐT Trung Quốc: Các hệ thống TMĐT Trung Quốc như&nbsp;<a href=\"https://www.taobaodanang.com/tin-tuc/kinh-doanh/nhung-ly-do-ban-nen-nhap-hang-taobao-ve-kinh-doanh-tai-viet-nam-1049.html\" target=\"_blank\">nhập hàng taobao</a>, Tmall, 1688… là địa chỉ tìm nguồn hàng giá tốt. Thậm chí, trên các trang này còn phong phú, nhiều nguồn hàng hơn sang chợ Trung Quốc. Nhiều cửa hàng, shop bán uy tín đặt những gian hàng cho dân buôn khắp nơi lựa chọn. Đây là cách là phổ biến và tiết kiệm được nhiều người kinh daonh áp dụng. Tuy nhiên, khó khăn về ngôn ngữ và cách&nbsp; đặt hàng khiến cho nhiều người e ngại.</p>\r\n\r\n<p>+ Sử dụng dịch vụ đặt hàng của Taobao Đà Nẵng: Taobao Đà Nẵng cung cấp gói dịch vụ tìm nguồn hàng trên các trang TMĐT Taobao, Tmall, 1688. Chúng tôi sẽ hỗ trợ bạn tìm nguồn hàng phụ kiện và Concept đúng yêu cầu, giá sỉ ưu đãi nhất. Ngoài ra, Taobao Đà Nẵng còn cung cấp các dịch vụ trọn gói như thanh toán hộ, cho thuê kho, kí gửi hàng hóa tại Trung Quốc và vận chuyển hàng về tận tay cho bạn. Đội ngũ mua hàng thuần thục tiếng Trung sẽ tận tình giải đáp từ A đến Z.</p>\r\n\r\n<p><img alt=\"Cách tìm nguồn hàng phụ kiện Concept\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-phu-kien-concept-2.png\" /></p>', 1, 'Nguồn hàng phụ kiện Concept – Ngành hàng phụ kiện Concept chưa bao giờ hết hót bởi nhu cầu làm đẹp, thời trang của mỗi người. Ngày nay những bộ đồ phụ kiện theo concept được ưa chuộng bởi nhu cầu chụp ảnh đẹp và đã có phong cách thời trang định hình, không mất thời gian để suy nghĩ bộ đồ phù hợp.', '2020-03-30 00:08:11', '2020-03-30 01:22:52'),
(17, 'NGUỒN HÀNG GẤU BÔNG QUẢNG CHÂU ĐẸP & RẺ CHO NGƯỜI MỚI KINH DOANH', 'Thumb (1).png', 'nguon-hang-gau-bong-quang-chau-dep-re-cho-nguoi-moi-kinh-doanh', '<p>Với những ai mới bước vào con đường kinh doanh thú nhồi bông thì tìm nguồn hàng gấu bông ở đâu giá sỉ không phải dễ dàng. Tiện đây, Taobao Đà Nẵng xin chia sẻ cách tìm nguồn hàng thú nhồi bông giá sỉ.</p>\r\n\r\n<h2><strong>Tại sao nguồn hàng gấu bông Quảng Châu lại được ưa chuộng?</strong></h2>\r\n\r\n<p>Trong nhiều năm trở lại đây, người Việt ưa chuộng sử dụng quần áo, phụ kiện giày dép, túi xách… hàng Quảng Châu, Trung Quốc. Nguồn hàng thú nhồi bông cũng không ngoại lệ. Thú bông được bày bán khắp nơi, từ những cửa hàng tiện lợi, bán hàng online, khu vực, trung tâm thương mại. Bạn yêu thích thú nhồi bông hay muốn tìm nguồn hàng kinh doanh mới, thì kinh doanh gấu bông chính là một gợi ý không thể bỏ qua.</p>\r\n\r\n<p>&gt;&gt;&gt; Click here:&nbsp;&nbsp;Quà tặng thương hiệu – Tạo dấu ấn riêng cho doanh nghiệp của bạn</p>\r\n\r\n<p><img alt=\"Tại sao nguồn hàng gấu bông Quảng Châu lại được ưa chuộng?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-gau-bong-quang-chau-3.png\" /></p>\r\n\r\n<p>So với các nguồn hàng nhập khẩu thì nguồn hàng gấu bông Quảng Châu được dân kinh doanh yêu thích hơn cả. Mẫu mã đa dạng, kiểu dáng ngộ nghĩnh và màu sắc bắt mắt không chỉ thu hút trẻ em mà giới trẻ cũng cực kỳ yêu thích. Quan trọng hơn là nguồn hàng sỉ gấu bông Quảng Châu rất rẻ, phù hợp với túi tiền của đại đa số khách hàng Việt. Chính những lí do trên đã giúp cho hàng gấu bông xuất xứ Quảng Châu được bán chạy trong thời gian gần đây.</p>\r\n\r\n<h2><strong>Tìm nguồn hàng gấu bông Quảng Châu ở đâu?</strong></h2>\r\n\r\n<p>Dù bạn bán gấu bông theo cách nào và tại đâu thì phải tìm được nguồn hàng gấu bông giá sỉ. Một số cách tìm nguồn hàng thú nhồi bông giá rẻ như:</p>\r\n\r\n<p>+ Nguồn hàng thú nhồi bông tại chợ đầu mối: đây là cách nhập hàng truyền thống từ trước đến nay của nhiều chủ cửa hàng. Bạn có thể tìm hàng gấu bông Trung Quốc tại các chợ như Kim Biên, Tân BÌnh, Đồng Xuân, Long Biện, Ninh Hiệp, Bằng Tường, Móng Cái.</p>\r\n\r\n<p>Nhập hàng tại đây mẫu mã khá nghèo nàn và ít được cập nhật theo xu hướng. Chưa kể, chất lượng không được kiểm duyệt, tuổi thọ kém. Thêm nữa, bạn cần phải mạnh dạn thương lượng giá, bởi nhiều chủ buôn bắt nạt, hét giá cao khiến bạn lo lắng khi nhập hàng gấu bông.</p>\r\n\r\n<p>+ Lấy sỉ gấu bông Quảng Châu tại qua cửa hàng, shop đồ chơi: Lấy qua các cửa hàng đồ chơi cùng là một cách lấy nguồn hàng gấu bông cho bạn. Bạn không cần mất thời gian đi lại, trực tiếp xem hàng hóa và được chia sẻ cách bán. Nhưng nhập theo cách này không phong phú nguồn hàng, giá cả cao hơn vì phải qua nhiều khâu trung gian. Và nếu xác định kinh doanh lâu dài, không nên chọn cách tìm hàng qua shop đồ chơi.</p>\r\n\r\n<p><img alt=\"Tìm nguồn hàng gấu bông Quảng Châu ở đâu?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-gau-bong-quang-chau-2.png\" /></p>\r\n\r\n<p>+ Trực tiếp sang xưởng tại Quảng Châu: Đây cũng là cách mà trước đây nhiều thương nhân kinh doanh lựa chọn khi muốn nhập hàng giá xuất xưởng. Mặt hàng phong phú, đa dạng, giá cả sỉ. Có nhu cầu sang Quảng Châu nhập hàng bạn cần chuẩn bị một số vốn lớn. Đi lại tốn thời gian, tiền bạc và cần nhiều thủ tục rườm rà khi xuất nhập cảnh sang Trung Quốc.</p>\r\n\r\n<p>Những chi phí như làm visa, vé máy bay, ăn uống cũng khá tốn chi phí nên bạn có thể cân nhắc. Đặc biệt, khi nhập hàng số lượng lớn bạn phải lo lắng đầu ra, khó tiêu thụ hết dẫn tới tồn hàng và phải chịu lỗ.</p>\r\n\r\n<p>+ Nhập nguồn hàng gấu bông trên Tmall, Taobao, 1688: Cách nhập hàng gấu bông qua các trang TMĐT Trung Quốc hiện đang rất được ưa chuộng trong giới kinh doanh. Bạn không cần phải đi xa, ngồi tại nhà có thể tìm được shop giá sỉ xuất xưởng. Nguồn hàng uy tín và đã được kiểm duyệt bởi các trang web. Với cách nhập này, bạn cần phải có tài khoản trang, thẻ thanh toán visa, Trung Quốc và tìm cách vận chuyển hàng về Việt Nam.&nbsp;</p>\r\n\r\n<h2><strong>Đơn vị nhập nguồn hàng gấu bông Quảng Châu tại Đà Nẵng</strong></h2>\r\n\r\n<p>Mặc dù, tìm nguồn hàng gấu bông Trung Quốc trên các trang TMĐT như Taobao, Tmall, 1688 phổ biến nhất hiện nay nhưng cũng gặp 1 số khó khăn như đã nói ở trên. Hình thức thanh toán với các chủ shop không giống với Việt Nam, không nhiều cửa hàng nhận tiền Việt để thanh toán. Hơn nữa, bạn cần phải tìm một đơn vị vận chuyển hàng hóa về Việt Nam nên cũng khá khó khăn cho người có nhu cầu nhập hàng thú nhồi bông tại Đà Nẵng.</p>\r\n\r\n<p>Hiểu được điều này, Taobao Đà Nẵng mang đến những dịch vụ nhập và vận chuyển hàng về Đà Nẵng. Nếu bạn đang khó khăn khi nhập tìm nguồn hàng gấu bông Quảng Châu, nhân viên mua hàng của chúng tôi sẽ tìm chính xác hàng theo yêu cầu với mức giá sỉ tận gốc. Các dịch vụ thanh toán hộ hay kí gửi hàng hóa đều mức cước phí thấp cạnh tranh nhất. Chưa kể khâu vận chuyển từ Trung Quốc về Việt Nam nhanh chóng.</p>\r\n\r\n<p>Taobao Đà Nẵng cam kết vận chuyển hàng về an toàn, đóng gói cẩn thận. Bất cứ sai sót thiếu hàng hóa hay hư hỏng đều được chúng tôi bồi thường thỏa đáng. Chi phí vận chuyển tính theo kilo, không giới hạn số lượng và khối lượng vận chuyển. Đối với những bạn chưa có kinh nghiệm tự đi đánh hàng hay tự order trên các website. Giải pháp an toàn, nhanh chóng nhất là sử dụng dịch vụ của chúng tôi.</p>\r\n\r\n<p><img alt=\"Nguồn hàng gấu bông Quảng Châu tại Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-gau-bong-quang-chau-1.png\" /></p>\r\n\r\n<p>Tham khảo ngay nguồn hàng gấu bông giá gốc tận xưởng sản xuất do Taobao Đà Nẵng tổng hợp dưới đây nhé:</p>\r\n\r\n<p>➤ Từ khóa: 泰迪熊</p>', 1, 'Với những ai mới bước vào con đường kinh doanh thú nhồi bông thì tìm nguồn hàng gấu bông ở đâu giá sỉ không phải dễ dàng. Tiện đây, Taobao Đà Nẵng xin chia sẻ cách tìm nguồn hàng thú nhồi bông giá sỉ.', '2020-03-30 00:12:43', '2020-03-30 01:23:20'),
(18, 'QUÀ TẶNG THƯƠNG HIỆU – TẠO DẤU ẤN RIÊNG CHO DOANH NGHIỆP CỦA BẠN', 'Thumb (2).png', 'qua-tang-thuong-hieu-tao-dau-an-rieng-cho-doanh-nghiep-cua-ban', '<p>Cụm từ “quà tặng thương hiệu” là một trong những từ khóa được tìm kiếm nhiều trong năm 2019. Rất nhiều doanh nghiệp tích cực sử dụng món quà tặng cho doanh nghiệp khác như một cách Marketing hiệu quả. Xu hướng này hứa hẹn sẽ bùng nổ và giúp tạo giá trị thương hiệu cho doanh nghiệp.</p>\r\n\r\n<h2><strong>Quà tặng thương hiệu là gì?&nbsp;</strong></h2>\r\n\r\n<p>Quà tặng thương hiệu hay quà tặng doanh nghiệp là những vật phẩm có sẵn được in, khắc logo, tên công ty, brand thương hiệu, slogan để làm quà tặng tri ân khách hàng, đối tác hoặc nhân viên vào những dịp đặc biệt nào đó. Đây là cách truyền tải những lời cảm ơn, món quà ý nghĩa của doanh nghiệp đối với nhiều đối tượng khách hàng.</p>\r\n\r\n<p>&gt;&gt;&gt; Xem thêm:&nbsp;&nbsp;Chia sẻ cách tìm nguồn hàng phụ kiện trang trí Tết 2020</p>\r\n\r\n<p><img alt=\"Gợi ý mẫu quà tặng thương hiệu độc đáo và tiết kiệm\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-2.png\" /></p>\r\n\r\n<p>Từ lâu nay, người Việt thường yêu thích những món quà để biếu, tặng và thể hiện tình cảm đối với người khách. Dù là món quà giá trị nhỏ hay lớn đều dành được thiện cảm từ người được nhận. Bởi vậy, chiến thuật quảng bá thương hiệu qua sản phẩm quà tặng được các doanh nghiệp chú ý. Quà tặng thương hiệu gắn chặt với thương hiệu của công ty bạn, chắc chắn sẽ “lấy lòng” và khắc sâu trong lòng người nhận. Không những thế còn góp phần ghi điểm với nhóm khách hàng mục tiêu.</p>\r\n\r\n<p>Trong thời buổi, làm ăn kinh doanh ngày 1 khó khăn, ngày càng nhiều công ty cùng cạnh tranh trong 1 lĩnh vực, làm thế nào để khác biệt so với các đơn vị khác không phải là điều dễ dàng. Dùng những món quà ý nghĩa tặng khách hàng là một gợi ý không thể bỏ qua cho bất cứ ai muốn tạo dấu ấn riêng.</p>\r\n\r\n<h2><strong>Doanh nghiệp nên dùng quà tặng thương hiệu vào dịp nào?</strong></h2>\r\n\r\n<p>Vậy những dịp đặc biệt nào nên sử dụng quà tặng thương hiệu? Có phải chỉ dành quà tặng tri ân khách hàng cuối năm?</p>\r\n\r\n<h3><strong><em>Quà tặng tri ân khách hàng</em></strong></h3>\r\n\r\n<p>Các dịp trọng đại như thành lập công ty, kỷ niệm sinh nhật công ty, ngày kỷ niệm, ngày truyền thống ngành, hội nghị hay hội thảo thì các tổ chức, doanh nghiệp thường sẽ có những phần quà tặng tri ân khách hàng, quà tặng cho nhân viên, quà tặng đối tác. Mục đích là để thắt chặt thêm các mối quan hệ, thay lời cảm ơn của doanh nghiệp đối với khách hàng, đối tác.</p>\r\n\r\n<p>Những món quà này thường in logo, số năm kỷ niệm, hình ảnh, oem sản phẩm theo yêu cầu giúp tạo ấn tượng cho doanh nghiệp của bạn.</p>\r\n\r\n<h3><strong><em>Quà tặng thương hiệu dịp Tết, cuối năm</em></strong></h3>\r\n\r\n<p>Quà tặng tri ân khách hàng cuối năm đã trở thành thông lệ quen thuộc của hầu hết các doanh nghiệp, đơn đơn vị kinh doanh. Nó đánh dấu một năm làm việc, hợp tác. Sau đó công ty sẽ tổng kết và dành 1 khoản ngân sách để chuẩn bị quà tri ân khách hàng, đối tác. Đó như một lời cảm ơn và thông qua quà tặng thương hiệu, khách hàng sẽ nhớ đến công ty nhiều hơn.</p>\r\n\r\n<p>Những món quà dịp Tết nên có giá trị, giá vừa phải, dễ dàng in logo, tên thương hiệu để quảng bá thương hiệu.</p>\r\n\r\n<p><img alt=\"Quà tặng thương hiệu dịp Tết, cuối năm\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-3.png\" /></p>\r\n\r\n<h3><strong><em>Quà tặng khuyến mãi, quà tặng Marketing</em></strong></h3>\r\n\r\n<p>Trong suốt một năm kinh doanh, chắc chắn không thể thiếu những chương trình khuyến mãi, tặng quà cho khách hàng. Đây là cách Marketing cực kỳ hiệu quả giúp thu hút khách hàng và “ghi điểm” trong mắt người mua, khách hàng tiềm năng.</p>\r\n\r\n<p>Với hình thức này, bạn nên dùng quà tặng doanh nghiệp giá rẻ, có tính phổ thông, sử dụng thường xuyên trong cuộc sống và có thể oem sản phẩm. Đây cũng là cách đánh vào tâm lý người tiêu dùng, luôn muốn nhận thêm nhiều lợi ích từ giá trị đồng tiền bỏ ra.</p>\r\n\r\n<h3><strong><em>Quà tặng các dịp 8/3, 20/10, trung thu, 30/4, 1/5, 2/9…</em></strong></h3>\r\n\r\n<p>Tùy vào đối tượng khách hàng hay dịp lễ mà bạn nên lựa chọn những mẫu quà tặng doanh nghiệp phù hợp. Chỉ cần một món quà nhỏ có in logo công ty, slogan hay brand và lời chúc chân thành cũng đủ làm cho khách hàng mãi ghi nhớ doanh nghiệp của bạn.</p>\r\n\r\n<h2><strong>Gợi ý mẫu quà tặng thương hiệu độc đáo và tiết kiệm</strong></h2>\r\n\r\n<p>Có rất nhiều quà tặng cho doanh nghiệp độc đáo, giá cả phù hợp có thể lựa chọn làm quà tặng. Trước khi lên ý tưởng tri ân khách hàng nên tặng gì, bạn cần dự trù ngân sách cho phù hợp với đối tượng khách hàng và nhân dịp nào.</p>\r\n\r\n<p>Một số mẫu quà tặng doanh nghiệp giá rẻ, thông dụng như móc chìa khóa, ví đựng thẻ ngân hàng, cốc uống nước, bình giữ nhiệt, hộp bút… Các mẫu quà tặng thương hiệu giá trị hơn như sổ da, áo mưa, mũ bảo hiểm, ô dù, sạc dự phòng. Bộ chén sứ, đồng hồ, túi xách, balo… có thể in khắc thương hiệu.</p>\r\n\r\n<p><img alt=\"Quà tặng thương hiệu là gì? \" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-1.png\" /></p>\r\n\r\n<h2><strong>Đơn vị nhận in khắc tên thương hiệu, oem sản phẩm, quà tặng thương hiệu</strong></h2>\r\n\r\n<p>Taobao Đà Nẵng nhận in khắc thương hiệu các loại sản phẩm quà tặng cho doanh nghiệp. Công nghệ in khắc tiên tiến, hiện đại mang đến dấu ấn riêng cho đơn vị của bạn. Đặc biệt, chúng tôi sẽ tìm nguồn hàng quà tặng giá rẻ tận gốc, hình ảnh chi tiết, mới lạ. Kèm theo đó là dịch vụ in khắc logo, thương hiệu giá rẻ tận xưởng.</p>\r\n\r\n<p>Ngoài ra, Taobao Đà Nẵng còn cung cấp dịch vụ oem,&nbsp;in thương hiệu lên&nbsp;sản phẩm&nbsp;hay gia công sản phẩm theo yêu cầu của doanh nghiệp. Chỉ cần bạn có ý tưởng, mẫu thiết kế, chúng tôi sẽ biến ý tưởng thành sản phẩm mang đậm dấu ấn cá nhân. Đội ngũ tư vấn viên am hiểu sản phẩm, sẵn sàng hỗ trợ mọi lúc và cam kết sản phẩm đúng theo yêu cầu.</p>\r\n\r\n<p>Trên đây là toàn bộ chia sẻ về quà tặng thương hiệu giúp tạo điểm nhấn riêng trong mắt đối tác và khách hàng. Liên hệ ngay qua Hotline&nbsp;<strong>090 598 12 43</strong>&nbsp;nếu gặp khó khăn khi lựa chọn quà tặng doanh nghiệp nhé!</p>', 1, 'Cụm từ “quà tặng thương hiệu” là một trong những từ khóa được tìm kiếm nhiều trong năm 2019. Rất nhiều doanh nghiệp tích cực sử dụng món quà tặng cho doanh nghiệp khác như một cách Marketing hiệu quả. Xu hướng này hứa hẹn sẽ bùng nổ và giúp tạo giá trị thương hiệu cho doanh nghiệp.', '2020-03-30 00:14:16', '2020-03-30 01:23:41'),
(19, 'QUÀ TẶNG THƯƠNG HIỆU – TẠO DẤU ẤN RIÊNG CHO DOANH NGHIỆP CỦA BẠN', 'Thumb (2).png', 'qua-tang-thuong-hieu-tao-dau-an-rieng-cho-doanh-nghiep-cua-ban', '<p>Cụm từ “quà tặng thương hiệu” là một trong những từ khóa được tìm kiếm nhiều trong năm 2019. Rất nhiều doanh nghiệp tích cực sử dụng món quà tặng cho doanh nghiệp khác như một cách Marketing hiệu quả. Xu hướng này hứa hẹn sẽ bùng nổ và giúp tạo giá trị thương hiệu cho doanh nghiệp.</p>\r\n\r\n<h2><strong>Quà tặng thương hiệu là gì?&nbsp;</strong></h2>\r\n\r\n<p>Quà tặng thương hiệu hay quà tặng doanh nghiệp là những vật phẩm có sẵn được in, khắc logo, tên công ty, brand thương hiệu, slogan để làm quà tặng tri ân khách hàng, đối tác hoặc nhân viên vào những dịp đặc biệt nào đó. Đây là cách truyền tải những lời cảm ơn, món quà ý nghĩa của doanh nghiệp đối với nhiều đối tượng khách hàng.</p>\r\n\r\n<p>&gt;&gt;&gt; Xem thêm:&nbsp;&nbsp;Chia sẻ cách tìm nguồn hàng phụ kiện trang trí Tết 2020</p>\r\n\r\n<p><img alt=\"Gợi ý mẫu quà tặng thương hiệu độc đáo và tiết kiệm\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-2.png\" /></p>\r\n\r\n<p>Từ lâu nay, người Việt thường yêu thích những món quà để biếu, tặng và thể hiện tình cảm đối với người khách. Dù là món quà giá trị nhỏ hay lớn đều dành được thiện cảm từ người được nhận. Bởi vậy, chiến thuật quảng bá thương hiệu qua sản phẩm quà tặng được các doanh nghiệp chú ý. Quà tặng thương hiệu gắn chặt với thương hiệu của công ty bạn, chắc chắn sẽ “lấy lòng” và khắc sâu trong lòng người nhận. Không những thế còn góp phần ghi điểm với nhóm khách hàng mục tiêu.</p>\r\n\r\n<p>Trong thời buổi, làm ăn kinh doanh ngày 1 khó khăn, ngày càng nhiều công ty cùng cạnh tranh trong 1 lĩnh vực, làm thế nào để khác biệt so với các đơn vị khác không phải là điều dễ dàng. Dùng những món quà ý nghĩa tặng khách hàng là một gợi ý không thể bỏ qua cho bất cứ ai muốn tạo dấu ấn riêng.</p>\r\n\r\n<h2><strong>Doanh nghiệp nên dùng quà tặng thương hiệu vào dịp nào?</strong></h2>\r\n\r\n<p>Vậy những dịp đặc biệt nào nên sử dụng quà tặng thương hiệu? Có phải chỉ dành quà tặng tri ân khách hàng cuối năm?</p>\r\n\r\n<h3><strong><em>Quà tặng tri ân khách hàng</em></strong></h3>\r\n\r\n<p>Các dịp trọng đại như thành lập công ty, kỷ niệm sinh nhật công ty, ngày kỷ niệm, ngày truyền thống ngành, hội nghị hay hội thảo thì các tổ chức, doanh nghiệp thường sẽ có những phần quà tặng tri ân khách hàng, quà tặng cho nhân viên, quà tặng đối tác. Mục đích là để thắt chặt thêm các mối quan hệ, thay lời cảm ơn của doanh nghiệp đối với khách hàng, đối tác.</p>\r\n\r\n<p>Những món quà này thường in logo, số năm kỷ niệm, hình ảnh, oem sản phẩm theo yêu cầu giúp tạo ấn tượng cho doanh nghiệp của bạn.</p>\r\n\r\n<h3><strong><em>Quà tặng thương hiệu dịp Tết, cuối năm</em></strong></h3>\r\n\r\n<p>Quà tặng tri ân khách hàng cuối năm đã trở thành thông lệ quen thuộc của hầu hết các doanh nghiệp, đơn đơn vị kinh doanh. Nó đánh dấu một năm làm việc, hợp tác. Sau đó công ty sẽ tổng kết và dành 1 khoản ngân sách để chuẩn bị quà tri ân khách hàng, đối tác. Đó như một lời cảm ơn và thông qua quà tặng thương hiệu, khách hàng sẽ nhớ đến công ty nhiều hơn.</p>\r\n\r\n<p>Những món quà dịp Tết nên có giá trị, giá vừa phải, dễ dàng in logo, tên thương hiệu để quảng bá thương hiệu.</p>\r\n\r\n<p><img alt=\"Quà tặng thương hiệu dịp Tết, cuối năm\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-3.png\" /></p>\r\n\r\n<h3><strong><em>Quà tặng khuyến mãi, quà tặng Marketing</em></strong></h3>\r\n\r\n<p>Trong suốt một năm kinh doanh, chắc chắn không thể thiếu những chương trình khuyến mãi, tặng quà cho khách hàng. Đây là cách Marketing cực kỳ hiệu quả giúp thu hút khách hàng và “ghi điểm” trong mắt người mua, khách hàng tiềm năng.</p>\r\n\r\n<p>Với hình thức này, bạn nên dùng quà tặng doanh nghiệp giá rẻ, có tính phổ thông, sử dụng thường xuyên trong cuộc sống và có thể oem sản phẩm. Đây cũng là cách đánh vào tâm lý người tiêu dùng, luôn muốn nhận thêm nhiều lợi ích từ giá trị đồng tiền bỏ ra.</p>\r\n\r\n<h3><strong><em>Quà tặng các dịp 8/3, 20/10, trung thu, 30/4, 1/5, 2/9…</em></strong></h3>\r\n\r\n<p>Tùy vào đối tượng khách hàng hay dịp lễ mà bạn nên lựa chọn những mẫu quà tặng doanh nghiệp phù hợp. Chỉ cần một món quà nhỏ có in logo công ty, slogan hay brand và lời chúc chân thành cũng đủ làm cho khách hàng mãi ghi nhớ doanh nghiệp của bạn.</p>\r\n\r\n<h2><strong>Gợi ý mẫu quà tặng thương hiệu độc đáo và tiết kiệm</strong></h2>\r\n\r\n<p>Có rất nhiều quà tặng cho doanh nghiệp độc đáo, giá cả phù hợp có thể lựa chọn làm quà tặng. Trước khi lên ý tưởng tri ân khách hàng nên tặng gì, bạn cần dự trù ngân sách cho phù hợp với đối tượng khách hàng và nhân dịp nào.</p>\r\n\r\n<p>Một số mẫu quà tặng doanh nghiệp giá rẻ, thông dụng như móc chìa khóa, ví đựng thẻ ngân hàng, cốc uống nước, bình giữ nhiệt, hộp bút… Các mẫu quà tặng thương hiệu giá trị hơn như sổ da, áo mưa, mũ bảo hiểm, ô dù, sạc dự phòng. Bộ chén sứ, đồng hồ, túi xách, balo… có thể in khắc thương hiệu.</p>\r\n\r\n<p><img alt=\"Quà tặng thương hiệu là gì? \" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/qua-tang-thuong-hieu-1.png\" /></p>\r\n\r\n<h2><strong>Đơn vị nhận in khắc tên thương hiệu, oem sản phẩm, quà tặng thương hiệu</strong></h2>\r\n\r\n<p>Taobao Đà Nẵng nhận in khắc thương hiệu các loại sản phẩm quà tặng cho doanh nghiệp. Công nghệ in khắc tiên tiến, hiện đại mang đến dấu ấn riêng cho đơn vị của bạn. Đặc biệt, chúng tôi sẽ tìm nguồn hàng quà tặng giá rẻ tận gốc, hình ảnh chi tiết, mới lạ. Kèm theo đó là dịch vụ in khắc logo, thương hiệu giá rẻ tận xưởng.</p>\r\n\r\n<p>Ngoài ra, Taobao Đà Nẵng còn cung cấp dịch vụ oem,&nbsp;in thương hiệu lên&nbsp;sản phẩm&nbsp;hay gia công sản phẩm theo yêu cầu của doanh nghiệp. Chỉ cần bạn có ý tưởng, mẫu thiết kế, chúng tôi sẽ biến ý tưởng thành sản phẩm mang đậm dấu ấn cá nhân. Đội ngũ tư vấn viên am hiểu sản phẩm, sẵn sàng hỗ trợ mọi lúc và cam kết sản phẩm đúng theo yêu cầu.</p>\r\n\r\n<p>Trên đây là toàn bộ chia sẻ về quà tặng thương hiệu giúp tạo điểm nhấn riêng trong mắt đối tác và khách hàng. Liên hệ ngay qua Hotline&nbsp;<strong>090 598 12 43</strong>&nbsp;nếu gặp khó khăn khi lựa chọn quà tặng doanh nghiệp nhé!</p>', 1, 'Cụm từ “quà tặng thương hiệu” là một trong những từ khóa được tìm kiếm nhiều trong năm 2019. Rất nhiều doanh nghiệp tích cực sử dụng món quà tặng cho doanh nghiệp khác như một cách Marketing hiệu quả. Xu hướng này hứa hẹn sẽ bùng nổ và giúp tạo giá trị thương hiệu cho doanh nghiệp.', '2020-03-30 00:14:16', '2020-03-30 01:23:41'),
(20, 'DỊCH VỤ IN THƯƠNG HIỆU LÊN SẢN PHẨM THEO YÊU CẦU', 'Thumb (3).png', 'dich-vu-thuong-hieu-len-san-pham-theo-yeu-cau', '<p>In thương hiệu lên sản phẩm là một trong nhiều cách giúp quảng bá doanh nghiệp của bạn đến khách hàng, đối tác, nhân viên. Hệ thống nhận diện thương hiệu có thể gồm hình ảnh, màu sắc, logo, slogan… của công ty. Tất cả đều nhằm mục đích tạo dấu ấn để khách hàng luôn nhớ đến và tiếp tục ủng hộ sản phẩm.</p>\r\n\r\n<h2><strong>Tại sao cần in thương hiệu lên sản phẩm?</strong></h2>\r\n\r\n<p>Trên thị trường phát triển như hiện nay, “trăm người bán, một người mua” cuộc chay đua thươn hiệu giữa các doanh nghiệp càng trở nên gay gắt. Bởi vậy, phát triển thương hiệu là điều không thể thiếu với bất cứ một doanh nghiệp nào. Chú trọng vào hình ảnh thương hiệu của công ty cũng là một trong những bước đi khôn ngoan. In thương hiệu lên sản phẩm được giới chuyên gia đánh giá là hiệu quả và phù hợp nhất. In thương hiệu bao gồm việc in ấn, gia công sản phẩm oem để tri ân hoặc làm quà tặng tới khách hàng trung thành, khách hàng mục tiêu, đối tác làm ăn.</p>\r\n\r\n<p><img alt=\"Dịch vụ in thương hiệu lên sản phẩm theo yêu cầu\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/in-thuong-hieu-len-san-pham-thumb.png\" /></p>\r\n\r\n<p>Thông thường, vào các dịp lễ, Tết, chương trình khuyến mãi, các doanh nghiệp chú trọng vào quà tặng thương hiệu. Các món quà được in thương hiệu lên sản phẩm thể hiện độ chuyên nghiệp hơn đối thủ, góp phần đạt mục tiêu doanh số. Để gây ấn tượng mạnh với khách hàng, không còn các nào khác là các đơn vị doanh nghiệp cần có những món quà độc đáo và ý nghĩa.</p>\r\n\r\n<h2><strong>Một số sản phẩm nên in thương hiệu lên sản phẩm hiệu quả</strong></h2>\r\n\r\n<p>In thương hiệu lên sản phẩm hay có thể hiểu đơn giản là in logo lên sản phẩm đáp ứng yêu cầu về thẩm mỹ: Đẹp, độc đáo và chuyên nghiệp. Ngày nay in ấn lên sản phẩm cực kỳ đa dạng về chất liệu.</p>\r\n\r\n<p><strong><em>Phân loại quà tặng khách hàng</em>:&nbsp;</strong>Tùy theo mục đích cũng như đối tượng được tặng nên lựa quàn tặng cho phù hợp. Món quà tặng độc đáo dành cho những khách hàng thích sự tìm tòi, khám phá.&nbsp;<a href=\"https://www.taobaodanang.com/tin-tuc/cach-tim-nguon-hang/qua-tang-thuong-hieu-13261.html\">Quà tặng thương hiệu</a>&nbsp;cao cấp dành cho khách hàng vip, lâu năm, trung thành. Món quà tặng giá rẻ dành cho những chương trình khuyến mãi, các sự kiện, tri ân.</p>\r\n\r\n<p><img alt=\"Một số sản phẩm nên in thương hiệu lên sản phẩm hiệu quả\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/in-thuong-hieu-len-san-pham-2.png\" /></p>\r\n\r\n<p><strong><em>In thương hiệu lên sản phẩm giấy, thùng carton, bao bì:&nbsp;</em></strong>Sản phẩm chính là cầu nối để doanh nghiệp tiếp cận được khách hàng. Chính vì vậy, logo, slogan, nhận diện thương hiệu phải đẹp mắt và hấp dẫn mới để lại ấn tượng trong lòng khách hàng. Ngay từ bao bì đầu tiên có in logo công ty sẽ giúp người mua dễ dàng ghi nhớ thương hiệu của mình.</p>\r\n\r\n<p><strong><em>In gia công oem lên sản phẩm nhựa, Inox, gỗ, da</em>:&nbsp;</strong>Làm quà tặng thương hiệu cho khách hàng có nhiều loại chất liệu khác nhau như nhựa, inox hay gỗ. Một số sản phẩm thường được in, khắc thương hiệu lên gồm bình giữ nhiệt, cốc uống nược, USB, móc chìa khóa, hộp đựng card visit, hộp đựng bút hay tai nghe điện thoại…</p>\r\n\r\n<p><strong><em>Khắc in thương hiệu lên sản phẩm thủy tinh, sứ</em>:&nbsp;</strong>Các sản phẩm thủy tinh, tô, chén, sứ thường là món quà tặng trong những dịp cuối năm hay kỉ niệm thành lập công ty. Sản phẩm này thường xuyên sử dụng và dùng được lâu dài nên in ấn, khắc logo giúp cho thương hiệu của bạn tạo ấn tượng lâu dài trong mắt khách hàng.</p>\r\n\r\n<p>Ngoài in khắc logo lên sản phẩm, bạn còn có thể oem sản phẩm theo yêu cầu. Rất nhiều đơn vị gia công sản phẩm oem theo mong muốn của bạn. Hàng oem là gì? Hiểu đơn giản là bạn có một ý tưởng hay mô hình sản phẩm có sẵn, công ty oem sẽ sản xuất sản phẩm dựa trên ý tưởng đó. Đây là cách giải quyết dành cho những đơn vị không quá đầu tư vào dây chuyền sản xuất mà vẫn có thể có sản phẩm theo đúng yêu cầu.</p>\r\n\r\n<h2><strong>In thương hiệu lên sản phẩm tại Đà Nẵng</strong></h2>\r\n\r\n<p>Ngành in ấn tại Đà Nẵng thực sự chưa phát triển. Những nhu cầu in ấn lớn đều phải thuê các đơn vị tại TP Hồ Chí Minh hoặc Hà Nội. Do đó, nhiều doanh nghiệp thắc mắc in logo lên sản phẩm Đà Nẵng ở đâu hay thương hiệu oem ở đâu. Để đáp ứng những khó khăn ấy,&nbsp;<a href=\"http://taobaodanang.com/\">Taobao Đà Nẵng</a>&nbsp;cung cấp thêm một dịch vụ in thương hiệu lên sản phẩm cho doanh nghiệp, tổ chức tại Đà Nẵng.</p>\r\n\r\n<p><img alt=\"In thương hiệu lên sản phẩm tại Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/in-thuong-hieu-len-san-pham-2(1).png\" /></p>\r\n\r\n<p>Lợi thế của Taobao Đà Nẵng khi cung cấp dịch vụ này là nguồn hàng sản phẩm trên các trang TMĐT Trung Quốc để oem, in ấn cực kỳ phong phú. Bất cứ mặt hàng nào bạn cần tìm để in logo thương hiệu, chúng tôi sẽ tìm kiếm đầy đù hình ảnh chi tiết, mức giá sỉ xuất xưởng cho bạn. Giá của sản phẩm rẻ giúp bạn hạn chế tối đa ngân sách phải sử dụng. Kèm theo đó là dịch vụ in ấn thương hiệu lên sản phẩm và vận chuyển về Đà Nẵng trọn gói với mức giá ưu đãi mang đến sự yên tâm tối đa.</p>\r\n\r\n<p>Taobao Đà Nẵng cam kết mẫu mã thiết kế độc quyền theo yêu cầu của khách hàng, Sản phẩm đến tay người tiêu dùng hoàn thiện từ a đến z mẫu mã sản phẩm đẹp, bắt mắt. Có giấy tờ đạt chuẩn kiểm nghiệp y tế và hóa đơn đầy đủ. Đội ngũ chuyên gia giàu kinh nghiệm trong lĩnh vực oem sản phẩm sẽ tư vấn và giải đáp thắc mắc của bạn.</p>\r\n\r\n<p>Trên đây là toàn bộ thông tin về in thương hiệu lên sản phẩm và gợi ý đơn vị gia công sản phẩm oem Đà Nẵng. Liên hệ ngay với chúng tôi để nhận mức giá ưu đãi nhất!</p>', 1, 'In thương hiệu lên sản phẩm là một trong nhiều cách giúp quảng bá doanh nghiệp của bạn đến khách hàng, đối tác, nhân viên. Hệ thống nhận diện thương hiệu có thể gồm hình ảnh, màu sắc, logo, slogan… của công ty. Tất cả đều nhằm mục đích tạo dấu ấn để khách hàng luôn nhớ đến và tiếp tục ủng hộ sản phẩm.', '2020-03-30 00:15:30', '2020-03-30 01:23:56'),
(21, 'TÌM NGUỒN HÀNG TRUNG QUỐC TẠI ĐÀ NẴNG GIÁ RẺ', 'Thumb (4).png', 'tim-nguon-hang-trung-quoc-tai-da-nang-gia-re', '<p>Nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng &ndash; Với c&aacute;c chủ doanh nghiệp, kinh doanh bu&ocirc;n b&aacute;n th&igrave; nguồn h&agrave;ng Quảng Ch&acirc;u (Trung Quốc) lu&ocirc;n được ưu ti&ecirc;n hơn cả. Từ mẫu m&atilde;, gi&aacute; cả đến chất lượng đều ph&ugrave; hợp với người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<h2><strong>Nhu cầu t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng</strong></h2>\r\n\r\n<p>Đ&agrave; Nẵng l&agrave; th&agrave;nh phố năng động v&agrave; ph&aacute;t triển bậc nhất của nước ta. L&agrave;n s&oacute;ng nhập cư từ c&aacute;c tỉnh th&agrave;nh kh&aacute;c ng&agrave;y 1 đ&ocirc;ng. V&igrave; vậy m&agrave; nhu cầu sử dụng h&agrave;ng h&oacute;a ng&agrave;y 1 tăng. H&agrave;ng h&oacute;a trong nước kh&ocirc;ng đủ cung cấp cho nhu cầu của người d&acirc;n. Với mức sống trung b&igrave;nh kh&ocirc;ng cao ở Đ&agrave; Nẵng th&igrave; nhu cầu sử dụng h&agrave;ng h&oacute;a Trung Quốc rất lớn v&agrave; đ&acirc;y cũng l&agrave; cơ hội kinh doanh cho c&aacute;c chủ doanh nghiệp. Bởi vậy m&agrave; d&acirc;n kinh doanh phải t&igrave;m th&ecirc;m nguồn h&agrave;ng Trung Quốc để đ&aacute;p ứng y&ecirc;u cầu mẫu m&atilde; v&agrave; gi&aacute; cả.</p>\r\n\r\n<p><img alt=\"Nhu cầu tìm nguồn hàng Trung Quốc tại Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-trung-quoc-tai-da-nang-1(1).png\" /></p>\r\n\r\n<p>Đ&atilde; từ l&acirc;u người kinh doanh lu&ocirc;n đau đầu về t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng. L&agrave;m sao để t&igrave;m được nguồn h&agrave;ng vừa đa dạng, gi&aacute; cả tốt m&agrave; lại chất lượng đảm bảo kh&ocirc;ng hề đơn giản. Chưa kể những chi ph&iacute; ph&aacute;t sinh, h&agrave;ng tồn v&agrave; kh&ocirc;ng đ&uacute;ng với nhu cầu ti&ecirc;u d&ugrave;ng chung của người d&acirc;n Đ&agrave; Nẵng. Cho n&ecirc;n nguồn h&agrave;ng Trung Quốc l&agrave; giải ph&aacute;p tối ưu cho người muốn kinh doanh, bu&ocirc;n b&aacute;n tại Đ&agrave; Nẵng.</p>\r\n\r\n<h2><strong>C&aacute;ch t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng</strong></h2>\r\n\r\n<p>Để t&igrave;m được nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng c&oacute; rất nhiều c&aacute;ch, sau đ&acirc;y Taobao Đ&agrave; Nẵng xin chia sẻ 1 số c&aacute;ch đơn giản nhất để t&igrave;m được nguồn order h&agrave;ng Quảng Ch&acirc;u tại Đ&agrave; Nẵng như &yacute;.</p>\r\n\r\n<h3><strong><em>T&igrave;m nguồn h&agrave;ng tại c&aacute;c chợ Trung Quốc</em></strong></h3>\r\n\r\n<p>Nếu như trước kia, chủ kinh doanh thường t&igrave;m nguồn h&agrave;ng Quảng Ch&acirc;u tại chợ đầu mối ở Việt Nam, th&igrave; b&acirc;y giờ nhiều người ưu ti&ecirc;n sang hẳn Trung Quốc t&igrave;m h&agrave;ng h&oacute;a tại c&aacute;c chợ. Với c&aacute;ch n&agrave;y, bạn sẽ t&igrave;m được nguồn h&agrave;ng tận xưởng, gi&aacute; rẻ kh&ocirc;ng cần qua tay d&acirc;n bu&ocirc;n Việt Nam, hơn nữa mẫu m&atilde; đa dạng. Tuy nhi&ecirc;n muốn sang Trung Quốc t&igrave;m nguồn h&agrave;ng bạn gặp kh&aacute; nhiều trở ngại như l&agrave;m visa, chi ph&iacute; đi lại, t&igrave;m phi&ecirc;n dịch. Gợi &yacute; 1 số&nbsp;<a href=\"https://www.taobaodanang.com/tin-tuc/kinh-doanh/tong-hop-nhung-cho-va-trung-tam-mua-sam-tot-nhat-tai-quang-chau-39.html\" target=\"_blank\">chợ quảng ch&acirc;u</a>&nbsp;cho bạn:</p>\r\n\r\n<p><img alt=\"Tìm nguồn hàng tại các chợ Trung Quốc\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-trung-quoc-tai-da-nang-2.png\" /></p>\r\n\r\n<p>+ Chợ Bạch M&atilde;: số 16, đường Trạm Nam, Quảng Ch&acirc;u</p>\r\n\r\n<p>+ Chợ điện tử Thi&ecirc;n Hồ: địa chỉ đường Tianhe Lu v&agrave; Shipai XuLu</p>\r\n\r\n<p>+ Chợ vải : đường Xin Gang Xi</p>\r\n\r\n<p>+ Chợ Shin Shan Hang: đường Shin Shan Hang, đại lộ Renminan, Quảng Ch&acirc;u</p>\r\n\r\n<p>+ Chợ nội thất: Phật Sơn, Quảng Ch&acirc;u</p>\r\n\r\n<h3><strong><em>Nguồn h&agrave;ng Trung Quốc ở Đ&agrave; Nẵng qua c&aacute;c trang TMĐT (Thương mại điện tử)</em></strong></h3>\r\n\r\n<p>Bạn c&oacute; thể t&igrave;m nguồn h&agrave;ng Quảng Ch&acirc;u chỉ cần ngồi nh&agrave; m&agrave; kh&ocirc;ng cần đi xa. Th&ocirc;ng qua c&aacute;c trang TMĐT của Trung Quốc như Taobao, Tmall,&nbsp;<a href=\"https://www.taobaodanang.com/tin-tuc/kinh-doanh/trai-nghiem-mua-hang-cuc-re-va-cuc-chat-tren-1688-40.html\" target=\"_blank\">mua h&agrave;ng 1688</a>, Aliexpress&hellip; l&agrave; h&agrave;ng loạt c&aacute;c xưởng, c&ocirc;ng ty sản xuất tiếp cận đến bạn. Bạn n&ecirc;n nhập h&agrave;ng số lượng lớn mới c&oacute; mức gi&aacute; sỉ ưu đ&atilde;i nhất. B&ecirc;n cạnh đ&oacute;, bạn phải thanh to&aacute;n đủ tiền h&agrave;ng, họ mới giao h&agrave;ng.</p>\r\n\r\n<p><img alt=\"Nguồn hàng Trung Quốc ở Đà Nẵng qua các trang TMĐT (Thương mại điện tử)\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-trung-quoc-tai-da-nang-1.png\" /></p>\r\n\r\n<p>Với c&aacute;c t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng như n&agrave;y, nếu kh&ocirc;ng may mắn bạn sẽ chịu rủi ro với shop kh&ocirc;ng uy t&iacute;n. Bạn cũng cần phải t&igrave;m đơn vị vận chuyển h&agrave;ng TQ về Đ&agrave; Nẵng, v&igrave; chủ xưởng sẽ kh&ocirc;ng d&agrave;nh thời gian t&igrave;m đơn vị vận chuyển cho bạn. Ngo&agrave;i ra những kh&oacute; khăn như đăng k&yacute; t&agrave;i khoản, thanh to&aacute;n v&agrave; mua h&agrave;ng khiến cho nhiều người e ngại.</p>\r\n\r\n<h3><strong><em>Nguồn h&agrave;ng Quảng Ch&acirc;u tại Đ&agrave; Nẵng qua đơn vị trung gian nhập h&agrave;ng</em></strong></h3>\r\n\r\n<p>Hiện nay, c&aacute;ch t&igrave;m nguồn h&agrave;ng th&ocirc;ng qua c&aacute;c đơn vị nhận order h&agrave;ng được nhiều d&acirc;n kinh doanh lựa chọn hơn cả. Tức l&agrave; sẽ c&oacute; 1 đơn vị, c&ocirc;ng ty (c&oacute; giấy ph&eacute;p kinh doanh) đứng ra t&igrave;m nguồn h&agrave;ng cho bạn tr&ecirc;n c&aacute;c trang TMĐT như Taobao, Tmall, 1688, nhận giao dịch, thanh to&aacute;n v&agrave; ship h&agrave;ng Trung Quốc về Đ&agrave; Nẵng.</p>\r\n\r\n<p>Với c&aacute;ch t&igrave;m nguồn h&agrave;ng đ&oacute;, bạn sẽ an t&acirc;m hơn v&igrave; đơn vị uy t&iacute;n sẽ cam kết h&agrave;ng của bạn an to&agrave;n, đủ số lượng. Thậm ch&iacute;, họ c&ograve;n gi&uacute;p bạn thương lượng gi&aacute; cả tốt nhất. Quan trọng hơn cả l&agrave; những kh&oacute; khăn khi vận chuyển, qua hải quan sẽ kh&ocirc;ng gặp bất cứ rủi ro n&agrave;o.</p>\r\n\r\n<h2><strong>Đơn vị t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng trọn g&oacute;i</strong></h2>\r\n\r\n<p>Đơn vị trung gian nhận order Trung Quốc tại Đ&agrave; Nẵng xuất hiện kh&aacute; nhiều, nhưng kh&ocirc;ng phải đơn vị n&agrave;o cũng uy t&iacute;n v&agrave; cam kết l&agrave;m việc đ&uacute;ng như giao dịch. Ch&iacute;nh v&igrave; vậy, bạn cần phải t&igrave;m hiểu kỹ lưỡng v&agrave; trao đổi trước với b&ecirc;n cung cấp dịch vụ. Một trong những đơn vị nhận t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng uy t&iacute;n l&agrave; Taobao Đ&agrave; Nẵng. Đơn vị đ&atilde; c&oacute; nhiều năm kinh nghiệm trong lĩnh vực order h&agrave;ng h&oacute;a Trung Quốc n&ecirc;n sẽ giải đ&aacute;p được nhiều kh&uacute;c mắc của bạn.</p>\r\n\r\n<p><img alt=\"Đơn vị tìm nguồn hàng Trung Quốc tại Đà Nẵng trọn gói\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nguon-hang-trung-quoc-tai-da-nang-4.png\" /></p>\r\n\r\n<p>Đội ngũ mua h&agrave;ng chuy&ecirc;n nghiệp sẽ gi&uacute;p bạn t&igrave;m nguồn h&agrave;ng ưng &yacute; nhất, gi&aacute; cả tận gốc. Nếu bạn gặp kh&oacute; khăn trong việc thương lượng v&agrave; thanh to&aacute;n với b&ecirc;n b&aacute;n. Taobao Đ&agrave; Nẵng hỗ trợ bạn nhiệt t&igrave;nh. Th&ecirc;m v&agrave;o đ&oacute; l&agrave; dịch vụ vận chuyển h&agrave;ng Trung Quốc về Đ&agrave; Nẵng gi&uacute;p bạn an t&acirc;m h&agrave;ng h&oacute;a về an to&agrave;n v&agrave; nguy&ecirc;n số lượng. Đặc biệt, hệ thống đặt h&agrave;ng, thanh to&aacute;n v&agrave; theo d&otilde;i lộ tr&igrave;nh h&agrave;ng h&oacute;a ngay tr&ecirc;n điện thoại gi&uacute;p người kinh doanh dễ d&agrave;ng theo d&otilde;i, kiểm tra h&agrave;ng h&oacute;a của m&igrave;nh đ&atilde; về Đ&agrave; Nẵng chưa. Uy t&iacute;n v&agrave; quyền lợi của kh&aacute;ch h&agrave;ng đặt l&ecirc;n h&agrave;ng đầu n&ecirc;n bạn c&oacute; thể an t&acirc;m nhập h&agrave;ng Trung Quốc nh&eacute;!</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những chia sẻ hữu &iacute;ch về c&aacute;ch t&igrave;m nguồn h&agrave;ng Trung Quốc tại Đ&agrave; Nẵng. Hy vọng Taobao Đ&agrave; Nẵng sẽ l&agrave; người bạn đồng h&agrave;nh của bạn tr&ecirc;n bước đường th&agrave;nh c&ocirc;ng. Li&ecirc;n hệ ngay với ch&uacute;ng t&ocirc;i qua Hotline&nbsp;<strong>090 598 12 43</strong>&nbsp;để được tư vấn miễn ph&iacute; nh&eacute;!</p>', 2, NULL, '2020-03-30 00:25:24', '2020-03-30 00:25:24'),
(22, 'MÁCH BẠN NHẬP HÀNG TRUNG QUỐC Ở ĐÂU GIÁ TẬN GỐC', 'Thumb (5).png', 'mach-ban-nhap-hang-trung-quoc-o-dau-gia-tan-goc', '<p>Nhập h&agrave;ng Trung Quốc&nbsp;ở đ&acirc;u l&agrave; c&acirc;u hỏi đầu ti&ecirc;n của những người kinh doanh, bu&ocirc;n b&aacute;n h&agrave;ng h&oacute;a Trung Quốc. Hầu hết những người mới bắt đầu kinh doanh chưa c&oacute; kinh nghiệm nhập h&agrave;ng Quảng Ch&acirc;u v&agrave; chưa t&igrave;m được nguồn h&agrave;ng gi&aacute; tối ưu nhất. Chia sẻ c&aacute;ch nhập nguồn h&agrave;ng Trung Quốc gi&aacute; gốc sẽ gi&uacute;p bạn bước đầu kinh doanh thuận lợi.</p>\r\n\r\n<h2><strong>Nhập h&agrave;ng Trung Quốc ở đ&acirc;u? &ndash; Những c&aacute;ch nhập h&agrave;ng phổ biến hiện nay</strong></h2>\r\n\r\n<p>Với những ưu điểm như mẫu m&atilde; đa dạng, sản phẩm chất lượng, gi&aacute; cả rẻ tận gốc, h&agrave;ng Quảng Ch&acirc;u được hầu hết người kinh doanh Việt lựa chọn để phục vụ nhu cầu trong nước. Từ những mặt h&agrave;ng như đồ trang tr&iacute; nh&agrave; cửa, đồ gia dụng, đến đồ thủ c&ocirc;ng mĩ nghệ, v&agrave; đặc biệt l&agrave; quần &aacute;o, phụ kiện thời trang, gi&agrave;y d&eacute;p l&agrave; những mặt h&agrave;ng gi&aacute; v&ocirc; c&ugrave;ng thấp c&oacute; thể b&aacute;n gấp 4 &ndash; 5 lần so với gi&aacute; gốc tại Việt Nam.</p>\r\n\r\n<p><img alt=\"Nhập hàng Trung Quốc ở đâu? – Những cách nhập hàng phổ biến hiện nay\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nhap-hang-trung-quoc-o-dau-2.png\" /></p>\r\n\r\n<p>Những năm về trước, d&acirc;n bu&ocirc;n b&aacute;n chỉ thường lấy h&agrave;ng ở c&aacute;c chợ đầu mối c&oacute; cả người Việt v&agrave; người Trung b&aacute;n gi&aacute; sỉ. C&aacute;c chợ đầu mối như Ninh Hiệp, M&oacute;ng C&aacute;i, B&Igrave;nh T&acirc;n, Đồng Xu&acirc;n&hellip;nườm nượp d&acirc;n kinh doanh th&igrave; b&acirc;y giờ vắng b&oacute;ng v&agrave; kh&ocirc;ng c&ograve;n nhộn nhịp như trước nữa. Tuy nhi&ecirc;n mức gi&aacute; nhập sỉ vẫn chưa tận gốc v&agrave; kh&ocirc;ng phong ph&uacute; nguồn h&agrave;ng. Hiện nay, d&acirc;n bu&ocirc;n kh&ocirc;ng c&ograve;n lo lắng nhập h&agrave;ng Trung Quốc ở đ&acirc;u nữa m&agrave; c&oacute; thể nhập h&agrave;ng Quảng Ch&acirc;u theo 3 c&aacute;ch sau:</p>\r\n\r\n<h3><strong><em>+ Nhập h&agrave;ng Trung Quốc gi&aacute; gốc bằng c&aacute;ch đi đ&aacute;nh h&agrave;ng ngay tại xưởng</em></strong></h3>\r\n\r\n<p>Đ&acirc;y l&agrave; c&aacute;ch được kh&aacute; nhiều người lựa chọn. Do tự sang Trung Quốc đ&aacute;nh h&agrave;ng bạn c&oacute; thể mua được gi&aacute; tận &ldquo;gốc&rdquo;. H&agrave;ng h&oacute;a kh&ocirc;ng giới hạn số lượng v&agrave; mẫu m&atilde;. Thậm ch&iacute; c&ograve;n nhập được những loại h&agrave;ng độc, theo trend mới nhất. Vừa tự đi đ&aacute;nh h&agrave;ng bạn c&oacute; thể tận dụng để du lịch.</p>\r\n\r\n<p><img alt=\"Cách nhập hàng Trung Quốc giá gốc bằng cách đi đánh hàng ngay tại xưởng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nhap-hang-trung-quoc-o-dau-3.png\" /></p>\r\n\r\n<p>Nhược điểm của c&aacute;ch nhập h&agrave;ng Trung Quốc n&agrave;y gặp kh&oacute; khăn bởi nhiều người kh&ocirc;ng biết ng&ocirc;n ngữ. Th&ecirc;m v&agrave;o đ&oacute; l&agrave; bạn phải chuẩn bị số tiền lớn để nhập h&agrave;ng số lượng lớn cho 1 lần đ&aacute;nh h&agrave;ng. C&aacute;c chi ph&iacute; như visa, đi lại v&agrave; thu&ecirc; kh&aacute;ch sạn cũng khiến bạn mất 1 khoản kha kh&aacute;.</p>\r\n\r\n<h3><strong><em>+ Nhập h&agrave;ng Trung Quốc ở đ&acirc;u? &ndash; Qua c&aacute;c website b&aacute;n h&agrave;ng Trung Quốc</em></strong></h3>\r\n\r\n<p>Nhờ c&ocirc;ng nghệ th&ocirc;ng tin ph&aacute;t triển m&agrave; h&igrave;nh thức kinh doanh qua website được nhiều người biết đến hơn. C&aacute;ch nhập h&agrave;ng Trung Quốc Taobao, Tmall, Alibaba, 1688 ng&agrave;y c&agrave;ng phổ biến trong giới bu&ocirc;n b&aacute;n. Nơi đ&acirc;y c&oacute; nguồn h&agrave;ng cực kỳ phong ph&uacute;, c&aacute;c gian h&agrave;ng đầy đủ cho bạn lựa chọn ngay tại nh&agrave;. Bạn c&oacute; thể mua được gi&aacute; gốc, nhiều shop c&ograve;n khuyến m&atilde;i, giảm gi&aacute; cho bạn. Do c&aacute;c trang web Trung Quốc c&oacute; kiểm duyệt n&ecirc;n bạn an t&acirc;m về chất lượng sản phẩm nh&eacute;. Những shop uy t&iacute;n, đ&aacute;ng tin cậy cũng hiển thị tr&ecirc;n trang gi&uacute;p bạn hiểu v&agrave; tr&aacute;nh được những sai s&oacute;t.</p>\r\n\r\n<p><img alt=\"Nhập hàng Trung Quốc ở đâu? – Qua các website bán hàng Trung Quốc\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nhap-hang-trung-quoc-o-dau-3(1).png\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n order h&agrave;ng Trung Quốc qua c&aacute;c website cũng khiến d&acirc;n kinh doanh gặp kh&aacute; nhiều rắc rồi. Bạn cần phải đăng k&yacute; t&agrave;i khoản tr&ecirc;n web Trung Quốc, việc đăng k&yacute; kh&oacute; khăn nếu bạn kh&ocirc;ng hiểu tiếng Trung. Đến bước thanh to&aacute;n, bạn cũng cần c&oacute; t&agrave;i khoản Alipay hoặc thẻ ng&acirc;n h&agrave;ng Trung Quốc. Nhiều thủ tục đ&ograve;i hỏi bạn cần phải c&oacute; hiểu biết n&ecirc;n kh&aacute; kh&ocirc;ng về đơn giản nếu bạn nhập h&agrave;ng Quảng Ch&acirc;u tr&ecirc;n Tmall hay&nbsp;nhập h&agrave;ng taobao&hellip;</p>\r\n\r\n<h3><strong><em>+ C&ocirc;ng ty nhập h&agrave;ng Trung Quốc về Việt Nam</em></strong></h3>\r\n\r\n<p>Những thắc mắc của d&acirc;n bu&ocirc;n như nhập h&agrave;ng Trung Quốc ở đ&acirc;u uy t&iacute;n? L&agrave;m thế n&agrave;o khắc phục những kh&oacute; khăn khi nhập h&agrave;ng Quảng Ch&acirc;u qua website giờ đ&acirc;y được c&aacute;c c&ocirc;ng ty nhập h&agrave;ng Trung Quốc giải quyết. Những đơn vị n&agrave;y c&oacute; đội ngũ mua h&agrave;ng biết tiếng Trung, kinh nghiệm đặt h&agrave;ng gi&aacute; gốc hố trợ mua h&agrave;ng Trung Quốc. Dịch vụ thanh to&aacute;n hay vận chuyển về Việt Nam gi&uacute;p cho d&acirc;n order kh&ocirc;ng thấy kh&oacute; khăn khi nhập h&agrave;ng Trung Quốc nữa.</p>\r\n\r\n<h2><strong>C&ocirc;ng ty nhập h&agrave;ng Trung Quốc ở đ&acirc;u uy t&iacute;n tại Đ&agrave; Nẵng</strong></h2>\r\n\r\n<p>C&aacute;c c&ocirc;ng ty nhập h&agrave;ng Quảng Ch&acirc;u xuất hiện ng&agrave;y c&agrave;ng nhiều v&agrave; đa dạng c&oacute; dịch vụ cho kh&aacute;ch h&agrave;ng. Tuy vậy, kh&ocirc;ng phải đơn vị n&agrave;o cũng uy t&iacute;n v&agrave; thực hiện như đ&uacute;ng cam kết. Để phục vu nhu cầu của người d&acirc;n kinh doanh tại Đ&agrave; Nẵng, Taobao Đ&agrave; Nẵng l&agrave; c&ocirc;ng ty order, thanh to&aacute;n v&agrave; vận chuyển h&agrave;ng Trung Quốc uy t&iacute;n v&agrave; trọn g&oacute;i gi&aacute; tốt.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/nhap-hang-trung-quoc-o-dau-1.png\" /></p>\r\n\r\n<p>Nếu bạn kh&ocirc;ng biết tiếng Trung, đội ngũ chăm s&oacute;c kh&aacute;ch h&agrave;ng sẽ gi&uacute;p bạn giao dịch với shop b&aacute;n h&agrave;ng người Trung. Kh&ocirc;ng c&oacute; t&agrave;i khoản Trung Quốc để thanh to&aacute;n đ&atilde; c&oacute; dịch vụ thanh to&aacute;n hộ cho bạn. Kh&ocirc;ng t&igrave;m được nguồn nhập h&agrave;ng Trung Quốc ở đ&acirc;u, Taobao Đ&agrave; Nẵng gi&uacute;p t&igrave;m h&agrave;ng miễn ph&iacute;. Hay kh&ocirc;ng t&igrave;m được đơn vị vận chuyển n&agrave;o chuy&ecirc;n nghiệp đ&atilde; c&oacute; dịch vụ vận chuyển h&agrave;ng Trung Quốc về Đ&agrave; Nẵng nhanh ch&oacute;ng.</p>\r\n\r\n<p>Bạn c&oacute; thể t&igrave;m t&ecirc;n sản phẩm, kiểm tra v&iacute; tiền, quản l&yacute; đơn h&agrave;ng v&agrave; theo d&otilde;i lộ tr&igrave;nh h&agrave;ng về Việt Nam chưa quan c&ocirc;ng cụ đặt h&agrave;ng hiện đại của Taobao Đ&agrave; Nẵng. Tất cả đều minh bạch, r&otilde; r&agrave;ng v&agrave; đơn giản nhất cho người d&ugrave;ng. Thậm ch&iacute; với những người yếu về c&ocirc;ng nghệ vẫn c&oacute; thể sử dụng c&ocirc;ng cụ&nbsp;order h&agrave;ng Quảng Ch&acirc;u&nbsp;Trung Quốc của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những c&aacute;ch nhập h&agrave;ng Trung Quốc d&agrave;nh cho những ai đang loay hoay kh&ocirc;ng biết t&igrave;m nguồn h&agrave;ng v&agrave; nhập h&agrave;ng ra sao. Hy vọng b&agrave;i viết n&agrave;y gi&uacute;p bạn trả lời được c&acirc;u hỏi nhập h&agrave;ng Trung Quốc ở đ&acirc;u uy t&iacute;n.</p>', 2, NULL, '2020-03-30 00:26:41', '2020-03-30 00:26:41');
INSERT INTO `tintucs` (`id`, `tieude`, `img`, `slug`, `noidung`, `id_tl`, `noidungtt`, `created_at`, `updated_at`) VALUES
(23, 'VẬN CHUYỂN HÀNG HÓA Ở TAOBAO ĐÀ NẴNG CÓ UY TÍN KHÔNG?', 'Thumb (6).png', 'van-chuyen-hang-hoa-o-taobao-da-nang-co-uy-tin-khong', '<p>Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? L&agrave; c&acirc;u hỏi của nhiều d&acirc;n bu&ocirc;n Đ&agrave; Nẵng thắc mắc khi t&igrave;m 1 đơn vị vận chuyển h&agrave;ng h&oacute;a? T&igrave;m được một địa chỉ uy t&iacute;n để gửi gắm những l&ocirc; h&agrave;ng gi&aacute; trị của bạn l&agrave; kh&ocirc;ng phải chuyện đơn giản. Đừng tin v&agrave;o những lời hứa! H&atilde;y tin v&agrave;o sự tin tưởng của những kh&aacute;ch h&agrave;ng đi trước đ&atilde; sử dụng dịch vụ.</p>\r\n\r\n<h2><strong>Nhu cầu vận chuyển h&agrave;ng h&oacute;a ở Đ&agrave; Nẵng</strong></h2>\r\n\r\n<p>Trong nhiều năm trở lại đ&acirc;y, mối quan hệ giao thương giữa Trung Quốc v&agrave; Việt Nam ph&aacute;t triển mạnh mẽ. Số lượng người Việt sinh sống v&agrave; l&agrave;m việc tại Trung Quốc rất đ&ocirc;ng v&agrave; ngược lại người Trung tại Việt Nam cũng nhiều n&ecirc;n nhu cầu h&agrave;ng h&oacute;a ti&ecirc;u d&ugrave;ng của người d&acirc;n 2 nước k&eacute;o theo ng&agrave;nh kinh doanh bu&ocirc;n b&aacute;n ph&aacute;t triển.</p>\r\n\r\n<p>Tại Đ&agrave; Nẵng, th&agrave;nh phố năng động v&agrave; ph&aacute;t triển, d&acirc;n số đ&ocirc;ng dẫn đến hệ lụy nguồn h&agrave;ng h&oacute;a sản xuất ở đ&acirc;y kh&ocirc;ng đủ cung cấp nhu cầu ti&ecirc;u d&ugrave;ng của họ. Từ đ&oacute; người d&acirc;n chuyển sang sử dụng c&aacute;c mặt h&agrave;ng c&oacute; xuất xứ từ nước ngo&agrave;i, trong đ&oacute; h&agrave;ng h&oacute;a Quảng ch&acirc;u được ưa chuộng hơn cả v&igrave; gi&aacute; rẻ m&agrave; chất lượng đảm bảo.</p>\r\n\r\n<p><img alt=\"Nhu cầu vận chuyển hàng hóa ở Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-2(1).png\" /></p>\r\n\r\n<p>Trước đ&acirc;y, d&acirc;n bu&ocirc;n b&aacute;n thường mua sỉ tại c&aacute;c chợ đầu mối trong nước hoặc tự sang Quảng Ch&acirc;u đ&aacute;nh h&agrave;ng. Nhưng sự lớn mạnh của trang thương mại điện từ như Taobao, Tmall, 1688 c&ugrave;ng dịch vụ vận chuyển h&agrave;ng h&oacute;a Trung Quốc đi Đ&agrave; Nẵng v&agrave; ngược lại gi&uacute;p d&acirc;n bu&ocirc;n giảm bớt được những kh&oacute; khăn khi nhập h&agrave;ng theo c&aacute;ch truyền thống như thời gian, đi lại. Nhờ vậy m&agrave; nhu cầu vận chuyển h&agrave;ng h&oacute;a ở Đ&agrave; Nẵng kh&ocirc;ng ngừng mở rộng. Vận chuyển nhanh ch&oacute;ng, mức gi&aacute; cạnh tranh v&agrave; người kinh doanh được hưởng lợi.</p>\r\n\r\n<h2><strong>C&aacute;ch t&igrave;m một đơn vị vận chuyển h&agrave;ng TQ uy t&iacute;n tại Đ&agrave; Nẵng?</strong></h2>\r\n\r\n<p>Để đ&aacute;nh gi&aacute; một&nbsp;vận chuyển h&agrave;ng trung quốc&nbsp;uy t&iacute;n v&agrave; chuy&ecirc;n nghiệp hay kh&ocirc;ng phải dựa v&agrave;o rất nhiều yếu tố. Hiện nay kh&ocirc;ng &iacute;t những ph&agrave;n n&agrave;n, &ldquo;b&oacute;c phốt&rdquo; dịch vụ vận chuyển từ ph&iacute;a người d&ugrave;ng. Bởi vậy t&igrave;m được đơn vị đ&aacute;ng tin cậy kh&ocirc;ng hề đơn giản. Đầu ti&ecirc;n đơn vị vận chuyển h&agrave;ng tại Đ&agrave; Nẵng phải đảm bảo h&agrave;ng của bạn an to&agrave;n, kh&ocirc;ng bị hư hại hay thất tho&aacute;t trong qu&aacute; tr&igrave;nh chuyển đồ. Nếu c&oacute; bị hư hại, ph&iacute;a vận chuyển cam kết đền b&ugrave; tổn thất 1 c&aacute;ch minh bạch v&agrave; xứng đ&aacute;ng với gi&aacute; trị h&agrave;ng h&oacute;a. H&atilde;y mạnh dạn n&oacute;i tới đền b&ugrave; tổn thất bởi đ&oacute; l&agrave; quyền lợi của người kinh doanh, đừng ngậm đắng nuốt cay chịu tổn thất.</p>\r\n\r\n<p>Kế đến đơn vị vận chuyển nhanh ch&oacute;ng v&agrave; giao h&agrave;ng đ&uacute;ng hẹn. Th&ocirc;ng thường c&aacute;c b&ecirc;n vận chuyển đều cố gắng chuyển h&agrave;ng về nhanh nhất. Tuy nhi&ecirc;n những l&yacute; do như Tắc bi&ecirc;n l&agrave; điều bất khả kh&aacute;ng. Nếu 1 đơn vị vận chuyển chuy&ecirc;n nghiệp họ sẽ c&oacute; mối quan hệ rộng v&agrave; khắc phục tắc bi&ecirc;n nhanh để h&agrave;ng của bạn kh&ocirc;ng bị ứ động, tiền h&agrave;ng kh&ocirc;ng bị nằm im 1 chỗ chờ th&ocirc;ng bi&ecirc;n.</p>\r\n\r\n<p>Cuối c&ugrave;ng l&agrave; chi ph&iacute; rẻ v&agrave; kh&ocirc;ng ph&aacute;t sinh ph&iacute; dịch vụ kh&aacute;c. Hiện nay thị trường dịch vụ vận chuyển h&agrave;ng h&oacute;a tại Đ&agrave; Nẵng cạnh tranh n&ecirc;n người kinh doanh được hưởng lợi rất nhiều đặc biệt l&agrave; gi&aacute; cả. Địa chỉ cung cấp dịch vụ vận chuyển uy t&iacute;n sẽ kh&ocirc;ng thu th&ecirc;m c&aacute;c ph&iacute; phụ hay ph&iacute; ngo&agrave;i luồng của bạn, mức ph&iacute; thu cạnh tranh thị trường.</p>\r\n\r\n<h2><strong>Trả lời c&acirc;u hỏi: Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng?</strong></h2>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng có uy tín không?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-3.png\" /></p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng c&oacute; quan niệm &ldquo;100 % th&agrave;nh c&ocirc;ng th&igrave; chỉ 20% l&agrave; kỹ năng chuy&ecirc;n m&ocirc;n v&agrave; 80% ch&iacute;nh l&agrave; th&aacute;i độ&rdquo;. Đến với ch&uacute;ng t&ocirc;i, bạn sẽ hiểu được tinh thần, tr&aacute;ch nhiệm v&agrave; ứng xử của nh&acirc;n vi&ecirc;n với kh&aacute;ch h&agrave;ng. Hơn 5000 kh&aacute;ch h&agrave;ng đ&atilde; tin tưởng ch&uacute;ng t&ocirc;i, dự kiến đến năm 2021 con số ấy tăng l&ecirc;n 15000. Sự lớn mạnh của Taobao Đ&agrave; Nẵng thể hiện cho uy t&iacute;n, chuy&ecirc;n nghiệp v&agrave; dịch vụ tận t&acirc;m với kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Chắc hẳn nhiều kh&aacute;ch h&agrave;ng đặt c&acirc;u hỏi Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? Đ&atilde; c&oacute; hơn 5000 kh&aacute;ch h&agrave;ng tr&ecirc;n khắp dải đất h&igrave;nh chữ S n&agrave;y tin tưởng sử dụng dịch vụ vận chuyển h&agrave;ng từ Trung Quốc về Việt Nam v&agrave; ngược lại. &ldquo;Tiếng l&agrave;nh đồn xa&rdquo;, tất cả c&aacute;c kh&aacute;ch h&agrave;ng đều truyền tai nhau về những lợi &iacute;ch khi đồng h&agrave;ng c&ugrave;ng Taobao Đ&agrave; Nẵng. Hơn 5000 kh&aacute;ch h&agrave;ng đ&oacute; vẫn tiếp tục duy tr&igrave; l&agrave; đối t&aacute;c tin cậy của Taobao Đ&agrave; Nẵng.</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng đến với ch&uacute;ng t&ocirc;i trước hết l&agrave; dịch vụ vận chuyển đảm bảo an to&agrave;n, đ&uacute;ng số lượng, nguy&ecirc;n đai nguy&ecirc;n kiện, đền b&ugrave; 100% gi&aacute; trị h&agrave;ng. Vận chuyển h&agrave;ng nhanh ch&oacute;ng, bốc dỡ h&agrave;ng h&oacute;a kể cả ng&agrave;y chủ nhật, lễ gi&uacute;p bạn tiết kiệm được thời gian v&agrave; tiền bạc. Mức ph&iacute; vận chuyển của Taobao Đ&agrave; Nẵng được đăng tải c&ocirc;ng khai r&otilde; r&agrave;ng, kh&ocirc;ng ph&aacute;t sinh bất cứ chi ph&iacute; n&agrave;o tham khảo&nbsp;TẠI Đ&Acirc;Y. Với ti&ecirc;u ch&iacute; &ldquo;lu&ocirc;n đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng&rdquo;, nếu bạn kh&ocirc;ng biết đặt h&agrave;ng hay t&igrave;m nguồn h&agrave;ng gi&aacute; tốt, đội ngữ tư vấn vi&ecirc;n của Taobao Đ&agrave; Nẵng sẽ li&ecirc;n hệ ngay cho bạn khi t&igrave;m được nguồn h&agrave;ng chất lượng v&agrave; gi&aacute; rẻ.</p>\r\n\r\n<p>Đặc biệt những th&ocirc;ng tin của kh&aacute;ch h&agrave;ng hay h&agrave;ng h&oacute;a của bạn đều được bảo mật tuyệt đối, tr&aacute;nh c&aacute;c đối thủ của bạn. D&ugrave; bạn vận chuyển h&agrave;ng &iacute;t hay nhiều, số lượng lớn hay nhỏ đều được Taobao Đ&agrave; Nẵng phục vụ tận t&igrave;nh v&agrave; chuy&ecirc;n nhiệp nhất.</p>\r\n\r\n<p><img alt=\"Vận chuyển hàng hóa ở Taobao Đà Nẵng có uy tín không?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-1.png\" /></p>\r\n\r\n<p>Hy vọng b&agrave;i viết tr&ecirc;n gi&uacute;p bạn trả lời được c&acirc;u hỏi: &ldquo;Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? Tựu chung lại, nếu bạn l&agrave; người kinh doanh, bu&ocirc;n b&aacute;n h&agrave;ng h&oacute;a t&igrave;m được đơn vị vận chuyển h&agrave;ng Trung Quốc &ndash; Đ&agrave; Nẵng cực kỳ quan trọng.#</p>', 2, NULL, '2020-03-30 00:28:24', '2020-03-30 00:28:24'),
(24, 'VẬN CHUYỂN HÀNG HÓA Ở TAOBAO ĐÀ NẴNG CÓ UY TÍN KHÔNG?', 'Thumb (6).png', 'van-chuyen-hang-hoa-o-taobao-da-nang-co-uy-tin-khong', '<p>Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? L&agrave; c&acirc;u hỏi của nhiều d&acirc;n bu&ocirc;n Đ&agrave; Nẵng thắc mắc khi t&igrave;m 1 đơn vị vận chuyển h&agrave;ng h&oacute;a? T&igrave;m được một địa chỉ uy t&iacute;n để gửi gắm những l&ocirc; h&agrave;ng gi&aacute; trị của bạn l&agrave; kh&ocirc;ng phải chuyện đơn giản. Đừng tin v&agrave;o những lời hứa! H&atilde;y tin v&agrave;o sự tin tưởng của những kh&aacute;ch h&agrave;ng đi trước đ&atilde; sử dụng dịch vụ.</p>\r\n\r\n<h2><strong>Nhu cầu vận chuyển h&agrave;ng h&oacute;a ở Đ&agrave; Nẵng</strong></h2>\r\n\r\n<p>Trong nhiều năm trở lại đ&acirc;y, mối quan hệ giao thương giữa Trung Quốc v&agrave; Việt Nam ph&aacute;t triển mạnh mẽ. Số lượng người Việt sinh sống v&agrave; l&agrave;m việc tại Trung Quốc rất đ&ocirc;ng v&agrave; ngược lại người Trung tại Việt Nam cũng nhiều n&ecirc;n nhu cầu h&agrave;ng h&oacute;a ti&ecirc;u d&ugrave;ng của người d&acirc;n 2 nước k&eacute;o theo ng&agrave;nh kinh doanh bu&ocirc;n b&aacute;n ph&aacute;t triển.</p>\r\n\r\n<p>Tại Đ&agrave; Nẵng, th&agrave;nh phố năng động v&agrave; ph&aacute;t triển, d&acirc;n số đ&ocirc;ng dẫn đến hệ lụy nguồn h&agrave;ng h&oacute;a sản xuất ở đ&acirc;y kh&ocirc;ng đủ cung cấp nhu cầu ti&ecirc;u d&ugrave;ng của họ. Từ đ&oacute; người d&acirc;n chuyển sang sử dụng c&aacute;c mặt h&agrave;ng c&oacute; xuất xứ từ nước ngo&agrave;i, trong đ&oacute; h&agrave;ng h&oacute;a Quảng ch&acirc;u được ưa chuộng hơn cả v&igrave; gi&aacute; rẻ m&agrave; chất lượng đảm bảo.</p>\r\n\r\n<p><img alt=\"Nhu cầu vận chuyển hàng hóa ở Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-2(1).png\" /></p>\r\n\r\n<p>Trước đ&acirc;y, d&acirc;n bu&ocirc;n b&aacute;n thường mua sỉ tại c&aacute;c chợ đầu mối trong nước hoặc tự sang Quảng Ch&acirc;u đ&aacute;nh h&agrave;ng. Nhưng sự lớn mạnh của trang thương mại điện từ như Taobao, Tmall, 1688 c&ugrave;ng dịch vụ vận chuyển h&agrave;ng h&oacute;a Trung Quốc đi Đ&agrave; Nẵng v&agrave; ngược lại gi&uacute;p d&acirc;n bu&ocirc;n giảm bớt được những kh&oacute; khăn khi nhập h&agrave;ng theo c&aacute;ch truyền thống như thời gian, đi lại. Nhờ vậy m&agrave; nhu cầu vận chuyển h&agrave;ng h&oacute;a ở Đ&agrave; Nẵng kh&ocirc;ng ngừng mở rộng. Vận chuyển nhanh ch&oacute;ng, mức gi&aacute; cạnh tranh v&agrave; người kinh doanh được hưởng lợi.</p>\r\n\r\n<h2><strong>C&aacute;ch t&igrave;m một đơn vị vận chuyển h&agrave;ng TQ uy t&iacute;n tại Đ&agrave; Nẵng?</strong></h2>\r\n\r\n<p>Để đ&aacute;nh gi&aacute; một&nbsp;vận chuyển h&agrave;ng trung quốc&nbsp;uy t&iacute;n v&agrave; chuy&ecirc;n nghiệp hay kh&ocirc;ng phải dựa v&agrave;o rất nhiều yếu tố. Hiện nay kh&ocirc;ng &iacute;t những ph&agrave;n n&agrave;n, &ldquo;b&oacute;c phốt&rdquo; dịch vụ vận chuyển từ ph&iacute;a người d&ugrave;ng. Bởi vậy t&igrave;m được đơn vị đ&aacute;ng tin cậy kh&ocirc;ng hề đơn giản. Đầu ti&ecirc;n đơn vị vận chuyển h&agrave;ng tại Đ&agrave; Nẵng phải đảm bảo h&agrave;ng của bạn an to&agrave;n, kh&ocirc;ng bị hư hại hay thất tho&aacute;t trong qu&aacute; tr&igrave;nh chuyển đồ. Nếu c&oacute; bị hư hại, ph&iacute;a vận chuyển cam kết đền b&ugrave; tổn thất 1 c&aacute;ch minh bạch v&agrave; xứng đ&aacute;ng với gi&aacute; trị h&agrave;ng h&oacute;a. H&atilde;y mạnh dạn n&oacute;i tới đền b&ugrave; tổn thất bởi đ&oacute; l&agrave; quyền lợi của người kinh doanh, đừng ngậm đắng nuốt cay chịu tổn thất.</p>\r\n\r\n<p>Kế đến đơn vị vận chuyển nhanh ch&oacute;ng v&agrave; giao h&agrave;ng đ&uacute;ng hẹn. Th&ocirc;ng thường c&aacute;c b&ecirc;n vận chuyển đều cố gắng chuyển h&agrave;ng về nhanh nhất. Tuy nhi&ecirc;n những l&yacute; do như Tắc bi&ecirc;n l&agrave; điều bất khả kh&aacute;ng. Nếu 1 đơn vị vận chuyển chuy&ecirc;n nghiệp họ sẽ c&oacute; mối quan hệ rộng v&agrave; khắc phục tắc bi&ecirc;n nhanh để h&agrave;ng của bạn kh&ocirc;ng bị ứ động, tiền h&agrave;ng kh&ocirc;ng bị nằm im 1 chỗ chờ th&ocirc;ng bi&ecirc;n.</p>\r\n\r\n<p>Cuối c&ugrave;ng l&agrave; chi ph&iacute; rẻ v&agrave; kh&ocirc;ng ph&aacute;t sinh ph&iacute; dịch vụ kh&aacute;c. Hiện nay thị trường dịch vụ vận chuyển h&agrave;ng h&oacute;a tại Đ&agrave; Nẵng cạnh tranh n&ecirc;n người kinh doanh được hưởng lợi rất nhiều đặc biệt l&agrave; gi&aacute; cả. Địa chỉ cung cấp dịch vụ vận chuyển uy t&iacute;n sẽ kh&ocirc;ng thu th&ecirc;m c&aacute;c ph&iacute; phụ hay ph&iacute; ngo&agrave;i luồng của bạn, mức ph&iacute; thu cạnh tranh thị trường.</p>\r\n\r\n<h2><strong>Trả lời c&acirc;u hỏi: Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng?</strong></h2>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng có uy tín không?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-3.png\" /></p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng c&oacute; quan niệm &ldquo;100 % th&agrave;nh c&ocirc;ng th&igrave; chỉ 20% l&agrave; kỹ năng chuy&ecirc;n m&ocirc;n v&agrave; 80% ch&iacute;nh l&agrave; th&aacute;i độ&rdquo;. Đến với ch&uacute;ng t&ocirc;i, bạn sẽ hiểu được tinh thần, tr&aacute;ch nhiệm v&agrave; ứng xử của nh&acirc;n vi&ecirc;n với kh&aacute;ch h&agrave;ng. Hơn 5000 kh&aacute;ch h&agrave;ng đ&atilde; tin tưởng ch&uacute;ng t&ocirc;i, dự kiến đến năm 2021 con số ấy tăng l&ecirc;n 15000. Sự lớn mạnh của Taobao Đ&agrave; Nẵng thể hiện cho uy t&iacute;n, chuy&ecirc;n nghiệp v&agrave; dịch vụ tận t&acirc;m với kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Chắc hẳn nhiều kh&aacute;ch h&agrave;ng đặt c&acirc;u hỏi Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? Đ&atilde; c&oacute; hơn 5000 kh&aacute;ch h&agrave;ng tr&ecirc;n khắp dải đất h&igrave;nh chữ S n&agrave;y tin tưởng sử dụng dịch vụ vận chuyển h&agrave;ng từ Trung Quốc về Việt Nam v&agrave; ngược lại. &ldquo;Tiếng l&agrave;nh đồn xa&rdquo;, tất cả c&aacute;c kh&aacute;ch h&agrave;ng đều truyền tai nhau về những lợi &iacute;ch khi đồng h&agrave;ng c&ugrave;ng Taobao Đ&agrave; Nẵng. Hơn 5000 kh&aacute;ch h&agrave;ng đ&oacute; vẫn tiếp tục duy tr&igrave; l&agrave; đối t&aacute;c tin cậy của Taobao Đ&agrave; Nẵng.</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng đến với ch&uacute;ng t&ocirc;i trước hết l&agrave; dịch vụ vận chuyển đảm bảo an to&agrave;n, đ&uacute;ng số lượng, nguy&ecirc;n đai nguy&ecirc;n kiện, đền b&ugrave; 100% gi&aacute; trị h&agrave;ng. Vận chuyển h&agrave;ng nhanh ch&oacute;ng, bốc dỡ h&agrave;ng h&oacute;a kể cả ng&agrave;y chủ nhật, lễ gi&uacute;p bạn tiết kiệm được thời gian v&agrave; tiền bạc. Mức ph&iacute; vận chuyển của Taobao Đ&agrave; Nẵng được đăng tải c&ocirc;ng khai r&otilde; r&agrave;ng, kh&ocirc;ng ph&aacute;t sinh bất cứ chi ph&iacute; n&agrave;o tham khảo&nbsp;TẠI Đ&Acirc;Y. Với ti&ecirc;u ch&iacute; &ldquo;lu&ocirc;n đồng h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng&rdquo;, nếu bạn kh&ocirc;ng biết đặt h&agrave;ng hay t&igrave;m nguồn h&agrave;ng gi&aacute; tốt, đội ngữ tư vấn vi&ecirc;n của Taobao Đ&agrave; Nẵng sẽ li&ecirc;n hệ ngay cho bạn khi t&igrave;m được nguồn h&agrave;ng chất lượng v&agrave; gi&aacute; rẻ.</p>\r\n\r\n<p>Đặc biệt những th&ocirc;ng tin của kh&aacute;ch h&agrave;ng hay h&agrave;ng h&oacute;a của bạn đều được bảo mật tuyệt đối, tr&aacute;nh c&aacute;c đối thủ của bạn. D&ugrave; bạn vận chuyển h&agrave;ng &iacute;t hay nhiều, số lượng lớn hay nhỏ đều được Taobao Đ&agrave; Nẵng phục vụ tận t&igrave;nh v&agrave; chuy&ecirc;n nhiệp nhất.</p>\r\n\r\n<p><img alt=\"Vận chuyển hàng hóa ở Taobao Đà Nẵng có uy tín không?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-co-uy-tin-khong-1.png\" /></p>\r\n\r\n<p>Hy vọng b&agrave;i viết tr&ecirc;n gi&uacute;p bạn trả lời được c&acirc;u hỏi: &ldquo;Taobao Đ&agrave; Nẵng c&oacute; uy t&iacute;n kh&ocirc;ng? Tựu chung lại, nếu bạn l&agrave; người kinh doanh, bu&ocirc;n b&aacute;n h&agrave;ng h&oacute;a t&igrave;m được đơn vị vận chuyển h&agrave;ng Trung Quốc &ndash; Đ&agrave; Nẵng cực kỳ quan trọng.#</p>', 2, NULL, '2020-03-30 00:28:25', '2020-03-30 00:28:25'),
(25, 'THANH TOÁN HỘ TIỀN HÀNG TAOBAO LÀ GÌ? MUỐN THANH TOÁN HỘ TRUNG QUỐC THÌ ĐẾN ĐÂU?', 'Thumb (7).png', 'thanh-toan-ho-tien-hang-taobao-la-gi', '<p>Nhiều người mua h&agrave;ng v&agrave; nhập h&agrave;ng Quảng Ch&acirc;u tr&ecirc;n c&aacute;c trang Taobao, 1688, Tmall nhưng kh&ocirc;ng biết l&agrave;m c&aacute;ch n&agrave;o để thanh to&aacute;n? Kh&oacute; khăn khi tự thanh to&aacute;n với b&ecirc;n b&aacute;n. Dịch vụ thanh to&aacute;n hộ tiền h&agrave;ng Taobao ra đời gi&uacute;p bạn v&agrave; những người chưa biết thuận tiện hơn khi giao dịch.</p>\r\n\r\n<h2><strong>Nhược điểm của h&igrave;nh thức tự thanh to&aacute;n Taobao hay Alipay</strong></h2>\r\n\r\n<p>Thanh to&aacute;n qua Taobao hay Alipay l&agrave; h&igrave;nh thức thanh to&aacute;n phổ biến khi mua h&agrave;ng qua c&aacute;c trang thương mại điện tử của Trung Quốc. Bạn c&oacute; thể tự thanh to&aacute;n tr&ecirc;n Alipay nếu bạn hiểu ng&ocirc;n ngữ, c&aacute;ch giao dịch v&agrave; l&agrave;m thẻ ng&acirc;n h&agrave;ng Trung Quốc. Nhưng nhiều d&acirc;n bu&ocirc;n, người kinh doanh Việt Nam gặp phải r&agrave;o cản về ng&ocirc;n v&agrave; c&aacute;ch sử dụng t&agrave;i khoản. Nhất l&agrave; với những ai lần đầu sử dụng v&iacute; Alipay, bước đặt cọc v&agrave; nạp tiền kh&ocirc;ng hề dễ d&agrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/thanh-toan-ho-tien-hang-taobao-la-gi-1.png\" /></p>\r\n\r\n<p>L&yacute; do l&agrave; bởi v&igrave; thanh to&aacute;n tiền h&agrave;ng Taobao hay Alipay đ&ograve;i hỏi người d&ugrave;ng phải kết nối t&agrave;i khoản Alipay với ng&acirc;n h&agrave;ng tại Trung Quốc. Trong khi đ&oacute;, người Việt kh&oacute; c&oacute; thể sở hữu t&agrave;i khoản ng&acirc;n h&agrave;ng Trung Quốc.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, để&nbsp;thanh to&aacute;n alipay&nbsp;th&agrave;nh c&ocirc;ng đ&ograve;i hỏi bạn phải thường xuy&ecirc;n giao dịch, sử dụng t&agrave;i khoản ổn định v&agrave; tu&acirc;n thủ nhiều quy định khắt khe của Alipay. Nếu kh&ocirc;ng t&agrave;i khoản của bạn c&oacute; thể sẽ bị kh&oacute;a bất cứ l&uacute;c n&agrave;o g&acirc;y cản trở cho c&ocirc;ng việc kinh doanh.</p>\r\n\r\n<h2><strong>Thanh to&aacute;n hộ tiền h&agrave;ng Taobao l&agrave; g&igrave;?</strong></h2>\r\n\r\n<p>Với những kh&oacute; khăn khi tự thanh to&aacute;n hộ tiền h&agrave;ng Taobao, bạn c&oacute; thể sử dụng dịch vụ thanh to&aacute;n hộ tiền h&agrave;ng Taobao. Thanh to&aacute;n hộ tiền h&agrave;ng Taobao nghĩa l&agrave; sẽ c&oacute; b&ecirc;n thứ 3 hay b&ecirc;n cung cấp dịch vụ sẽ gi&uacute;p bạn thanh to&aacute;n th&ocirc;ng qua t&agrave;i khoản Alipay. Bạn c&oacute; thể mua bất cứ mặt h&agrave;ng n&agrave;o tr&ecirc;n Taobao, Tmall, 1688&hellip; sau đ&oacute;, thỏa thuận với b&ecirc;n thanh to&aacute;n hộ tiền h&agrave;ng, chuyển tiền qua t&agrave;i khoản của b&ecirc;n thứ 3. Cuối c&ugrave;ng, khoản tiền của bạn sẽ chuyển đến b&ecirc;n b&aacute;n h&agrave;ng v&agrave; giao dịch được ho&agrave;n tất.</p>\r\n\r\n<h3><strong>Thanh to&aacute;n hộ tiền h&agrave;ng Taobao c&oacute; ưu điểm g&igrave;?</strong></h3>\r\n\r\n<p>Với c&aacute;ch thanh to&aacute;n hộ tiền h&agrave;ng Taobao hay Alipay, người kinh doanh sẽ kh&ocirc;ng gặp kh&oacute; khăn của Alipay như y&ecirc;u cầu phải x&aacute;c thực, y&ecirc;u cầu x&agrave;i kh&ocirc;ng qu&aacute; hạn mức từng loại t&agrave;i khoản, đ&ocirc;i khi kh&oacute;a số dư m&agrave; kh&ocirc;ng cần l&yacute; do, đ&ocirc;i khi lại y&ecirc;u cầu th&ecirc;m thẻ ng&acirc;n h&agrave;ng x&aacute;c minh.</p>\r\n\r\n<p>+ Bạn c&oacute; thể chủ động nguồn vốn nhập h&agrave;ng. Kh&ocirc;ng tốn thời gian thực hiện giao dịch nếu chưa biết tiếng trung. Bạn kh&ocirc;ng phải tốn ph&iacute; dịch vụ duy tr&igrave; h&agrave;ng th&aacute;ng.</p>\r\n\r\n<p>+ Thanh to&aacute;n nhanh gọn, kh&ocirc;ng lo bị đ&oacute;ng băng t&agrave;i khoản.</p>\r\n\r\n<p><img alt=\"Muốn thanh toán hộ Trung Quốc thì đến đâu?\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/thanh-toan-ho-tien-hang-taobao-la-gi-2.png\" /></p>\r\n\r\n<h2><strong>Taobao Đ&agrave; Nẵng - Đơn vị nhận thanh to&aacute;n hộ tiền h&agrave;ng Taobao</strong></h2>\r\n\r\n<p>Hiện c&oacute; kh&ocirc;ng &iacute;t đơn vị cung cấp dịch vụ thanh to&aacute;n hộ tiền h&agrave;ng Taobao. Nhưng t&igrave;m được 1 đơn vị uy t&iacute;n, chuy&ecirc;n nghiệp xử l&yacute; c&aacute;ch t&igrave;nh huống khi thanh to&aacute;n qua v&iacute; Alipay. Taobao Đ&agrave; Nẵng l&agrave; được nhiều kh&aacute;ch h&agrave;ng tin tưởng v&agrave; giao tr&aacute;ch nhiệm thanh to&aacute;n hộ 1688, Taobao v&agrave; Tmall một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n\r\n<p>Bạn c&oacute; thể sử dụng t&agrave;i khoản Alipay dễ d&agrave;ng m&agrave; kh&ocirc;ng gặp bất cứ kh&oacute; khăn, phức tạp n&agrave;o. Mọi qu&aacute; tr&igrave;nh giao dịch, order mua h&agrave;ng, thanh to&aacute;n đều được thực hiện qua t&agrave;i khoản Alipay . Bạn chỉ cần gửi link nguồn h&agrave;ng cần order + th&ocirc;ng tin sản phẩm ch&iacute;nh x&aacute;c, ch&uacute;ng t&ocirc;i sẽ thực hiện giao dịch mua, thanh to&aacute;n v&agrave; thậm ch&iacute; l&agrave; vận chuyển, giao h&agrave;ng tận tay cho bạn từ Trung Quốc trong thời gian ngắn nhất.</p>\r\n\r\n<p>Kh&ocirc;ng y&ecirc;u cầu bạn cần phải đổi tiền, sau khi cam kết sử dụng dịch vụ, bạn chỉ cần chuyển khoản bằng tiền Việt (dựa v&agrave;o tỷ gi&aacute; tiền tệ hiện thời), việc c&ograve;n lại l&agrave; của Taobao Đ&agrave; Nẵng. Cước ph&iacute; thanh to&aacute;n hộ Taobao rẻ cạnh tranh nhất, mọi th&ocirc;ng tin minh bạch, thủ tục nhanh gọn &amp; đơn giản sẽ gi&uacute;p cho c&ocirc;ng việc kinh doanh của bạn &ldquo;thuận buồn xu&ocirc;i gi&oacute;&rdquo; hơn rất nhiều.</p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng - Đơn vị nhận thanh toán hộ tiền hàng Taobao\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/thanh-toan-ho-tien-hang-taobao-la-gi-3(1).png\" /></p>\r\n\r\n<h3><strong>Quy tr&igrave;nh thực hiện thanh to&aacute;n hộ tiền h&agrave;ng Taobao của Taobao Đ&agrave; Nẵng</strong></h3>\r\n\r\n<p>Để gi&uacute;p bạn r&otilde; r&agrave;ng về c&aacute;c thao t&aacute;c v&agrave; thủ tục khi bạn sử dụng dịch vụ của Taobao Đ&agrave; Nẵng, dưới đ&acirc;y l&agrave; c&aacute;ch thanh to&aacute;n hộ tiền h&agrave;ng Taobao, Alipay.</p>\r\n\r\n<p>Bước 1: Tiếp nhận y&ecirc;u cầu thanh to&aacute;n hộ của bạn.</p>\r\n\r\n<p>Bước 2: T&iacute;nh to&aacute;n quy đổi tiền Việt v&agrave; tổng số tiền Việt v&agrave; b&aacute;o lại cho bạn.</p>\r\n\r\n<p>Bước 3: Bạn kiểm tra v&agrave; t&iacute;nh ch&iacute;nh x&aacute;c số tiền cần chuyển cho ch&uacute;ng t&ocirc;i &ndash; Chuyển khoản tiền v&agrave;o t&agrave;i khoản của ch&uacute;ng t&ocirc;i. Sau khi chuyển khoản th&agrave;nh c&ocirc;ng, chụp ảnh giao dịch gửi lại ch&uacute;ng t&ocirc;i để x&aacute;c minh tiền đ&atilde; chuyển.</p>\r\n\r\n<p>Bước 4: Taobao Đ&agrave; Nẵng x&aacute;c nhận đ&atilde; nhận tiền Vnđ với qu&yacute; kh&aacute;ch h&agrave;ng, thực hiện thanh to&aacute;n hộ giao dịch Alipay m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; gửi, đ&atilde; th&ocirc;ng b&aacute;o. Ch&uacute;ng t&ocirc;i chụp h&igrave;nh ảnh v&agrave; gửi bạn h&igrave;nh ảnh.</p>\r\n\r\n<p>Bước 5: Cuối c&ugrave;ng, bạn kiểm tra&nbsp; v&agrave; giao dịch 2 b&ecirc;n được ho&agrave;n tất.</p>\r\n\r\n<p>Lưu &yacute; khi chuyển khoản bạn nhớ ghi r&otilde; số điện thoại để ch&uacute;ng t&ocirc;i tiện li&ecirc;n lạc lại x&aacute;c nhận.</p>\r\n\r\n<p>Nhờ c&oacute; dịch vụ thanh to&aacute;n hộ tiền h&agrave;ng Taobao Đ&agrave; Nẵng, người kinh doanh kh&ocirc;ng c&ograve;n phải lo lắng v&agrave; đau đầu mỗi giao dịch nhập h&agrave;ng Quảng Ch&acirc;u. Mọi thắc mắc v&agrave; y&ecirc;u cầu về dịch vụ thanh to&aacute;n hộ tiền h&agrave;ng Taobao, bạn li&ecirc;n hệ ngay với ch&uacute;ng t&ocirc;i qua Hotline&nbsp;<strong>0906 461 243.&nbsp;</strong>Ch&uacute;ng t&ocirc;i h&acirc;n hạnh được phục vụ c&aacute;c bạn!</p>', 2, NULL, '2020-03-30 00:29:52', '2020-03-30 00:29:52'),
(26, 'YEAR END PARTY TAOBAO ĐÀ NẴNG', 'Thumb (8).png', 'year-end-party-taobao-danang', '<p>Vậy l&agrave; năm 2019 đầy m&agrave;u sắc đang đi đến những ng&agrave;y cuối c&ugrave;ng. Trong suốt gần 365 ng&agrave;y vừa qua, tập thể nh&acirc;n vi&ecirc;n Taobao Đ&agrave; Nẵng đ&atilde; lu&ocirc;n nỗ lực hết m&igrave;nh để mang đến cho kh&aacute;ch h&agrave;ng những trải nghiệm tốt nhất về dịch vụ.</p>\r\n\r\n<p>Để tổng kết một năm cũ sắp qua v&agrave; c&ugrave;ng nhau hướng tới một năm mới đầy hứa hẹn, Taobao Đ&agrave; Nẵng đ&atilde; tổ chức một buổi tiệc Party đầm ấm với sự tham gia đầy đủ của c&aacute;c th&agrave;nh vi&ecirc;n trong đại gia đ&igrave;nh.</p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-1.png\" /></p>\r\n\r\n<p>Year End Party l&agrave; bữa tiệc cuối năm đ&aacute;nh dấu một năm th&agrave;nh c&ocirc;ng v&agrave; ph&aacute;t triển của Taobao Đ&agrave; Nẵng. Đ&acirc;y cũng l&agrave; dịp c&ocirc;ng ty vinh danh v&agrave; trao giải thưởng cho c&aacute;c th&agrave;nh vi&ecirc;n đ&atilde; đ&oacute;ng g&oacute;p v&agrave;o sự th&agrave;nh c&ocirc;ng của Taobao Đ&agrave; Nẵng trong năm vừa qua.</p>\r\n\r\n<p><img alt=\"Công ty vinh danh và trao giải thưởng cho các thành viên xuất sắc\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-2.png\" /></p>\r\n\r\n<p><img alt=\"Công ty vinh danh và trao giải thưởng cho các thành viên cống hiến\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-3.png\" /></p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng 1\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-4.png\" /></p>\r\n\r\n<p>C&ugrave;ng điểm lại một số h&igrave;nh ảnh th&uacute; vị trong chương tr&igrave;nh Year End Party 2019 để &ldquo;l&ecirc;n d&acirc;y c&oacute;t&rdquo; cho một năm mới thật ho&agrave;nh tr&aacute;ng nh&eacute;!!!</p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng 2\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-6.png\" /></p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng - 3\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-7.png\" /></p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng - 4\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-5.png\" /></p>\r\n\r\n<p><img alt=\"Year End Party Taobao Đà Nẵng - 5\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/year-end-party-taobao-da-nang-8.png\" /></p>', 3, NULL, '2020-03-30 00:31:20', '2020-03-30 00:31:20'),
(27, 'THÔNG BÁO LỊCH NGHỈ TẾT NGUYÊN ĐÁN CANH TÝ 2020', 'Thumb (9).png', 'thông-bao-lich-nghi-tet-nguyen-dan-canh-ty-2020', '<p>K&iacute;nh Gửi Qu&yacute; Kh&aacute;ch H&agrave;ng!</p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng xin th&ocirc;ng b&aacute;o lịch l&agrave;m việc trước v&agrave; sau Tết Nguy&ecirc;n Đ&aacute;n 2020 như sau:</p>\r\n\r\n<p><strong>A. Lịch nghĩ Tết Nguy&ecirc;n Đ&aacute;n 2020:</strong></p>\r\n\r\n<p>- Thời gian nhận đơn h&agrave;ng đến 17h45&#39; ng&agrave;y 04/01/2020 (10/12 &acirc;m lịch).&nbsp;</p>\r\n\r\n<p>&nbsp;- Thời&nbsp; gian giao nhận h&agrave;ng tại kho 152 L&ecirc; Ch&acirc;n Đ&agrave; Nẵng đến 17h45&#39; ng&agrave;y 18/01/2020 (24/12 &acirc;m lịch).&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>Lưu &yacute;: Những đơn h&agrave;ng đặt sau ng&agrave;y 04/01/2020, Taobao Đ&agrave; Nẵng kh&ocirc;ng cam kết h&agrave;ng ho&aacute; sẽ được vận chuyển kịp về tới tay qu&yacute; kh&aacute;ch trước khi nghỉ Tết do những ảnh hưởng từ b&ecirc;n vận chuyển thứ ba.</p>\r\n\r\n<p><img alt=\"Thông báo lịch nghỉ Tết Nguyên Đán Canh Tý 2020\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/thong-bao-lich-nghi-tet-nguyen-dan-canh-ty-2020-1(3).png\" /></p>\r\n\r\n<p><strong>B. Lịch hoạt động sau Tết Nguy&ecirc;n Đ&aacute;n 2020:</strong></p>\r\n\r\n<p>- Nhận đặt h&agrave;ng lại b&igrave;nh thường v&agrave;o ng&agrave;y 03/02/2020 (m&ugrave;ng 10 Tết).</p>\r\n\r\n<p>Lịch nghỉ tr&ecirc;n sẽ phụ thuộc v&agrave;o t&igrave;nh h&igrave;nh vận chuyển h&agrave;ng ho&aacute; cuối năm, trường hợp c&oacute; bất kỳ điều chỉnh n&agrave;o kh&aacute;c,</p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng sẽ chủ động cập nhật th&ocirc;ng tin tới Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng xin tr&acirc;n trọng k&iacute;nh b&aacute;o để Qu&yacute; Kh&aacute;ch h&agrave;ng nắm th&ocirc;ng tin v&agrave; chủ động trong hoạt động kinh doanh của m&igrave;nh.<br />\r\nTr&acirc;n trọng!</p>', 3, NULL, '2020-03-30 00:32:33', '2020-03-30 00:32:33'),
(28, 'TAOBAO ĐÀ NẴNG TỔ CHỨC CUỘC THI “I LOVE COMPANY”', 'Thumb (10).png', 'taobao-da-nang-to-chuc-cuoc-thi', '<p>Với mong muốn tạo một m&ocirc;i trường l&agrave;m việc th&acirc;n thiện, thoải m&aacute;i nhằm th&uacute;c đẩy tinh thần l&agrave;m việc cho nh&acirc;n vi&ecirc;n; đồng thời khuyến kh&iacute;ch nh&acirc;n vi&ecirc;n ph&aacute;t huy tinh thần đo&agrave;n kết v&agrave; khả năng s&aacute;ng tạo của m&igrave;nh, ng&agrave;y 29/09/2019&nbsp;&nbsp;đ&atilde; tổ chức cuộc thi &ldquo;I LOVE COMPANY&rdquo; d&agrave;nh ri&ecirc;ng cho nội bộ c&ocirc;ng ty.</p>\r\n\r\n<h2><strong>Th&ocirc;ng tin về cuộc thi</strong></h2>\r\n\r\n<p>Slogan: C&ocirc;ng ty hạnh ph&uacute;c - Đội nh&oacute;m đo&agrave;n kết</p>\r\n\r\n<p>Chủ đề: Xanh tươi - Th&acirc;n thiện - Động lực</p>\r\n\r\n<p>Với sự tham gia của c&aacute;c ph&ograve;ng ban:</p>\r\n\r\n<p>Team 1: Bộ phận xử l&yacute; đơn</p>\r\n\r\n<p>Team 2: Bộ phận Sale &ndash; CSKH</p>\r\n\r\n<p>Team 3: Bộ phận Nh&acirc;n sự - Kế to&aacute;n &ndash; Marketing</p>\r\n\r\n<p>Team 4: Bộ phận kho b&atilde;i</p>\r\n\r\n<p><img alt=\"Slogan: Công ty hạnh phúc - Đội nhóm đoàn kết\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-thumb.png\" /></p>\r\n\r\n<h2><strong>Thể lệ chấm thi</strong></h2>\r\n\r\n<p>V&ograve;ng b&igrave;nh chọn (50% điểm): C&aacute;c Team k&ecirc;u gọi b&igrave;nh chọn để c&oacute; cơ hội sở hữu những giải thưởng hấp dẫn: 1 like = 1 điểm, 1 share = 1 điểm (Tối đa 50 điểm).</p>\r\n\r\n<p>V&ograve;ng chấm điểm (50% điểm): C&aacute;c Team thuyết tr&igrave;nh về g&oacute;c l&agrave;m việc v&agrave; th&ocirc;ng điệp muốn gửi gắm. Ban gi&aacute;m đốc sẽ chấm điểm v&agrave; đưa ra kết quả c&ocirc;ng t&acirc;m nhất!</p>\r\n\r\n<h2><strong>Cơ cấu giải thưởng</strong></h2>\r\n\r\n<p>🎁 Giải nhất: 1,000,000 VNĐ</p>\r\n\r\n<p>🎁 Giải nh&igrave;: 800,000 VNĐ</p>\r\n\r\n<p>🎁 Giải ba: 500,000 VNĐ</p>\r\n\r\n<p>🎁 Giải khuyến kh&iacute;ch: 300,000 VNĐ</p>\r\n\r\n<p>Đ&atilde; qua 7 ng&agrave;y kể từ khi ph&aacute;t động, từng Ph&ograve;ng/Ban, từng nh&acirc;n vi&ecirc;n Taobao Đ&agrave; Nẵng đang trở n&ecirc;n h&aacute;o hứng v&agrave; s&ocirc;i động hơn bao giờ hết. Mặc d&ugrave; kh&aacute; bận rộn với c&ocirc;ng việc h&agrave;ng ng&agrave;y nhưng mọi người vẫn đang rất hứng khởi, tr&agrave;n đầy nhiệt huyết với quyết t&acirc;m gi&agrave;nh giải thưởng từ Ban tổ chức.</p>\r\n\r\n<p>V&agrave; đ&acirc;y l&agrave; th&agrave;nh&nbsp;quả...</p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng tổ chức cuộc thi “I LOVE COMPANY”\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-1.png\" /></p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng đã tổ chức cuộc thi “I LOVE COMPANY” dành riêng cho công ty của mình.\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-2.jpg\" /></p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng đã tổ chức cuộc thi “I LOVE COMPANY” 2\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-3.jpg\" /></p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng đã tổ chức cuộc thi “I LOVE COMPANY” 3\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-4.png\" /></p>\r\n\r\n<p>Cuộc thi diễn ra gồm 2 v&ograve;ng căng thẳng nhưng cũng kh&ocirc;ng k&eacute;m phần th&uacute; vị dưới sự đ&aacute;nh gi&aacute; kh&aacute;ch quan v&agrave; c&ocirc;ng bằng của cộng đồng c&ugrave;ng Ban tổ chức.&nbsp;V&agrave; sau một ng&agrave;y d&agrave;i c&acirc;n đo đong đếm, đổ mồ h&ocirc;i s&ocirc;i nước mắt th&igrave; Ban tổ chức cũng đ&atilde; chọn ra được nh&agrave; v&ocirc; địch giữa c&aacute;c ph&ograve;ng ban đầy tiềm năng.</p>\r\n\r\n<p>Kết quả ch&iacute;nh thức đ&atilde; kh&ocirc;ng l&agrave;m mọi người thất vọng, Team 3 vươn lễ dẫn đầu v&agrave; nhận được giải Nhất với tổng số điểm l&agrave; 97 điểm. Team 1 đạt giải Nh&igrave; với tổng điểm l&agrave; 94, giải Ba thuộc về Team 2 v&agrave; Team 4 đạt giải khuyến kh&iacute;ch.</p>\r\n\r\n<p>Gi&aacute;m đốc Đỗ Trọng Anh Vũ chia sẻ: &ldquo;Qua cuộc thi n&agrave;y, t&ocirc;i &nbsp;tin rằng ngo&agrave;i việc kh&iacute;ch lệ tinh thần s&aacute;ng tạo v&agrave; tinh thần đo&agrave;n kết, gi&uacute;p đỡ lẫn nhau, nh&acirc;n vi&ecirc;n Taobao Đ&agrave; Nẵng sẽ gặt h&aacute;i được nhiều kinh nghiệm v&agrave; ph&aacute;t triển th&ecirc;m c&aacute;c kỹ năng cần thiết như kỹ năng l&agrave;m việc nh&oacute;m, kỹ năng thuyết tr&igrave;nh trước đ&aacute;m đ&ocirc;ng v&agrave; khả năng ứng biến linh hoạt trong việc xử l&yacute; t&igrave;nh huống&rdquo;.</p>\r\n\r\n<p><img alt=\"Kết quả cuộc thi “I LOVE COMPANY”\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/taobao-da-nang-to-chuc-cuoc-thi-i-love-company-5.png\" /></p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng mong rằng th&ocirc;ng qua những cuộc thi như thế n&agrave;y, c&aacute;c th&agrave;nh vi&ecirc;n trong c&ocirc;ng ty sẽ hiểu về nhau hơn, qua đ&oacute; g&oacute;p phần gắn kết, hỗ trợ để c&ugrave;ng hướng tới một mục ti&ecirc;u chung l&agrave; x&acirc;y dựng Taobao Đ&agrave; Nẵng ng&agrave;y c&agrave;ng vững mạnh.</p>', 3, NULL, '2020-03-30 00:33:26', '2020-03-30 00:33:26'),
(29, 'TAOBAO ĐÀ NẴNG KÍNH CHÚC QUÝ KHÁCH MỘT MÙA TRUNG THU THẮM TÌNH THÂN', 'Thumb (11).png', 'taobao-danang-kinh-chuc-quy-khach-mot-mua-trung-thu-tham-tinh-than', '<p>K&iacute;nh gửi Qu&yacute; Kh&aacute;ch h&agrave;ng, Qu&yacute; đối t&aacute;c!</p>\r\n\r\n<p>Lời đầu ti&ecirc;n, xin thay mặt to&agrave;n thể nh&acirc;n vi&ecirc;n trong&nbsp;C&ocirc;ng ty TNHH MTV &nbsp;xin ch&acirc;n th&agrave;nh cảm ơn Qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; v&agrave; đang quan t&acirc;m, sử dụng dịch vụ order - vận chuyển h&agrave;ng Trung Quốc của Taobao Đ&agrave; Nẵng trong suốt thời gian qua.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i lu&ocirc;n quan niệm rằng sự ủng hộ, y&ecirc;u mến v&agrave; niềm tin đến từ ph&iacute;a kh&aacute;ch h&agrave;ng d&agrave;nh cho Taobao Đ&agrave; Nẵng trong suốt thời gian qua ch&iacute;nh l&agrave; th&agrave;nh c&ocirc;ng lớn nhất của c&ocirc;ng ty. Nh&acirc;n dịp Tết Trung thu năm 2019, Taobao Đ&agrave; Nẵng k&iacute;nh ch&uacute;c qu&yacute; kh&aacute;ch h&agrave;ng v&agrave; to&agrave;n thể c&aacute;n bộ nh&acirc;n vi&ecirc;n lời ch&uacute;c sức khỏe, k&iacute;nh ch&uacute;c qu&yacute; kh&aacute;ch v&agrave; gia đ&igrave;nh c&oacute; một m&ugrave;a Trung Thu&nbsp;trọn vẹn, vi&ecirc;n m&atilde;n b&ecirc;n người th&acirc;n.</p>\r\n\r\n<p>&ldquo;Cầu ch&uacute;c cho t&acirc;m hồn mọi người m&atilde;i lu&ocirc;n đẹp như &aacute;nh trăng rằm &amp; cuộc sống lu&ocirc;n ngọt ng&agrave;o như những chiếc b&aacute;nh Trung thu&rdquo;.</p>\r\n\r\n<p><img alt=\"Taobao Đà Nẵng xin chúc quý khách một mùa Trung thu thắm tình thân\" src=\"https://www.taobaodanang.com/Thumb.ashx?s=900&amp;file=/UploadImages/mua-trung-thu-tham-tinh-than-1(1).png\" /></p>\r\n\r\n<p>Taobao Đ&agrave; Nẵng hy vọng sẽ được tiếp tục phục vụ v&agrave; nhận được sự tin tưởng của Qu&yacute; kh&aacute;ch trong thời gian sắp tới.</p>\r\n\r\n<p>Th&acirc;n &aacute;i!</p>', 3, NULL, '2020-03-30 00:34:52', '2020-03-30 00:34:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transations`
--

CREATE TABLE `transations` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `pay_id` int(10) UNSIGNED NOT NULL,
  `masogiaodich` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truycaps`
--

CREATE TABLE `truycaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `dem` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truycaps`
--

INSERT INTO `truycaps` (`id`, `dem`, `ngay`, `created_at`, `updated_at`) VALUES
(1, 61, '2020-03-19', '2020-03-19 06:54:34', '2020-03-19 07:40:26'),
(2, 99, '2020-03-20', '2020-03-20 00:58:08', '2020-03-20 07:25:14'),
(3, 1, '2020-03-23', '2020-03-23 01:13:28', '2020-03-23 01:13:28'),
(4, 1, '2020-03-23', '2020-03-23 01:13:28', '2020-03-23 01:13:28'),
(5, 1, '2020-03-23', '2020-03-23 02:57:24', '2020-03-23 02:57:24'),
(6, 1, '2020-03-23', '2020-03-23 03:04:13', '2020-03-23 03:04:13'),
(7, 1, '2020-03-23', '2020-03-23 03:04:43', '2020-03-23 03:04:43'),
(8, 1, '2020-03-23', '2020-03-23 03:04:59', '2020-03-23 03:04:59'),
(9, 1, '2020-03-23', '2020-03-23 03:06:14', '2020-03-23 03:06:14'),
(10, 1, '2020-03-23', '2020-03-23 03:07:47', '2020-03-23 03:07:47'),
(11, 1, '2020-03-23', '2020-03-23 03:08:05', '2020-03-23 03:08:05'),
(12, 1, '2020-03-23', '2020-03-23 03:08:25', '2020-03-23 03:08:25'),
(13, 1, '2020-03-23', '2020-03-23 03:08:54', '2020-03-23 03:08:54'),
(14, 1, '2020-03-23', '2020-03-23 03:09:09', '2020-03-23 03:09:09'),
(15, 1, '2020-03-23', '2020-03-23 03:09:31', '2020-03-23 03:09:31'),
(16, 1, '2020-03-23', '2020-03-23 03:10:22', '2020-03-23 03:10:22'),
(17, 1, '2020-03-23', '2020-03-23 03:10:43', '2020-03-23 03:10:43'),
(18, 1, '2020-03-23', '2020-03-23 03:11:16', '2020-03-23 03:11:16'),
(19, 1, '2020-03-23', '2020-03-23 03:13:44', '2020-03-23 03:13:44'),
(20, 1, '2020-03-23', '2020-03-23 03:13:53', '2020-03-23 03:13:53'),
(21, 1, '2020-03-23', '2020-03-23 03:13:53', '2020-03-23 03:13:53'),
(22, 1, '2020-03-23', '2020-03-23 03:13:53', '2020-03-23 03:13:53'),
(23, 1, '2020-03-23', '2020-03-23 03:13:54', '2020-03-23 03:13:54'),
(24, 1, '2020-03-23', '2020-03-23 03:14:30', '2020-03-23 03:14:30'),
(25, 1, '2020-03-23', '2020-03-23 03:20:28', '2020-03-23 03:20:28'),
(26, 1, '2020-03-23', '2020-03-23 03:21:05', '2020-03-23 03:21:05'),
(27, 1, '2020-03-23', '2020-03-23 03:21:21', '2020-03-23 03:21:21'),
(28, 1, '2020-03-23', '2020-03-23 03:21:26', '2020-03-23 03:21:26'),
(29, 1, '2020-03-23', '2020-03-23 06:13:38', '2020-03-23 06:13:38'),
(30, 1, '2020-03-23', '2020-03-23 06:14:35', '2020-03-23 06:14:35'),
(31, 1, '2020-03-23', '2020-03-23 08:51:11', '2020-03-23 08:51:11'),
(32, 1, '2020-03-23', '2020-03-23 12:48:27', '2020-03-23 12:48:27'),
(33, 1, '2020-03-23', '2020-03-23 12:48:27', '2020-03-23 12:48:27'),
(34, 1, '2020-03-23', '2020-03-23 13:40:01', '2020-03-23 13:40:01'),
(35, 1, '2020-03-23', '2020-03-23 13:40:08', '2020-03-23 13:40:08'),
(36, 1, '2020-03-23', '2020-03-23 13:41:40', '2020-03-23 13:41:40'),
(37, 1, '2020-03-23', '2020-03-23 13:41:46', '2020-03-23 13:41:46'),
(38, 1, '2020-03-23', '2020-03-23 13:51:37', '2020-03-23 13:51:37'),
(39, 1, '2020-03-23', '2020-03-23 13:51:39', '2020-03-23 13:51:39'),
(40, 1, '2020-03-23', '2020-03-23 13:51:50', '2020-03-23 13:51:50'),
(41, 1, '2020-03-23', '2020-03-23 13:51:55', '2020-03-23 13:51:55'),
(42, 1, '2020-03-23', '2020-03-23 13:52:00', '2020-03-23 13:52:00'),
(43, 1, '2020-03-23', '2020-03-23 13:52:06', '2020-03-23 13:52:06'),
(44, 1, '2020-03-23', '2020-03-23 13:52:18', '2020-03-23 13:52:18'),
(45, 1, '2020-03-23', '2020-03-23 13:52:24', '2020-03-23 13:52:24'),
(46, 1, '2020-03-23', '2020-03-23 14:15:50', '2020-03-23 14:15:50'),
(47, 1, '2020-03-23', '2020-03-23 14:15:57', '2020-03-23 14:15:57'),
(48, 1, '2020-03-23', '2020-03-23 14:18:11', '2020-03-23 14:18:11'),
(49, 1, '2020-03-23', '2020-03-23 14:18:25', '2020-03-23 14:18:25'),
(50, 1, '2020-03-23', '2020-03-23 14:40:12', '2020-03-23 14:40:12'),
(51, 1, '2020-03-23', '2020-03-23 14:40:17', '2020-03-23 14:40:17'),
(52, 71, '2020-03-24', '2020-03-24 01:15:17', '2020-03-24 13:01:27'),
(53, 184, '2020-03-25', '2020-03-25 01:20:09', '2020-03-25 11:34:31'),
(54, 16, '2020-03-26', '2020-03-26 01:27:01', '2020-03-26 07:29:48'),
(55, 22, '2020-03-27', '2020-03-27 01:09:48', '2020-03-27 09:48:13'),
(56, 1, '2020-03-28', '2020-03-27 22:46:21', '2020-03-27 22:46:21'),
(57, 1, '2020-03-28', '2020-03-27 22:46:21', '2020-03-27 22:46:21'),
(58, 1, '2020-03-28', '2020-03-27 22:47:10', '2020-03-27 22:47:10'),
(59, 1, '2020-03-28', '2020-03-27 22:47:14', '2020-03-27 22:47:14'),
(60, 1, '2020-03-28', '2020-03-27 22:47:20', '2020-03-27 22:47:20'),
(61, 1, '2020-03-28', '2020-03-27 22:47:24', '2020-03-27 22:47:24'),
(62, 1, '2020-03-28', '2020-03-27 22:47:27', '2020-03-27 22:47:27'),
(63, 1, '2020-03-28', '2020-03-27 22:51:15', '2020-03-27 22:51:15'),
(64, 1, '2020-03-28', '2020-03-27 22:51:36', '2020-03-27 22:51:36'),
(65, 1, '2020-03-28', '2020-03-27 22:53:25', '2020-03-27 22:53:25'),
(66, 1, '2020-03-28', '2020-03-27 22:53:57', '2020-03-27 22:53:57'),
(67, 1, '2020-03-28', '2020-03-27 23:11:29', '2020-03-27 23:11:29'),
(68, 1, '2020-03-28', '2020-03-27 23:11:32', '2020-03-27 23:11:32'),
(69, 1, '2020-03-28', '2020-03-27 23:11:35', '2020-03-27 23:11:35'),
(70, 1, '2020-03-28', '2020-03-27 23:11:38', '2020-03-27 23:11:38'),
(71, 1, '2020-03-28', '2020-03-27 23:11:40', '2020-03-27 23:11:40'),
(72, 1, '2020-03-28', '2020-03-27 23:11:42', '2020-03-27 23:11:42'),
(73, 1, '2020-03-28', '2020-03-27 23:11:45', '2020-03-27 23:11:45'),
(74, 1, '2020-03-28', '2020-03-27 23:14:09', '2020-03-27 23:14:09'),
(75, 1, '2020-03-28', '2020-03-27 23:14:11', '2020-03-27 23:14:11'),
(76, 1, '2020-03-28', '2020-03-27 23:14:33', '2020-03-27 23:14:33'),
(77, 1, '2020-03-28', '2020-03-27 23:14:35', '2020-03-27 23:14:35'),
(78, 1, '2020-03-28', '2020-03-27 23:15:02', '2020-03-27 23:15:02'),
(79, 1, '2020-03-28', '2020-03-27 23:15:07', '2020-03-27 23:15:07'),
(80, 1, '2020-03-28', '2020-03-27 23:15:15', '2020-03-27 23:15:15'),
(81, 1, '2020-03-28', '2020-03-27 23:42:26', '2020-03-27 23:42:26'),
(82, 1, '2020-03-28', '2020-03-27 23:52:14', '2020-03-27 23:52:14'),
(83, 1, '2020-03-28', '2020-03-27 23:52:16', '2020-03-27 23:52:16'),
(84, 1, '2020-03-28', '2020-03-27 23:52:19', '2020-03-27 23:52:19'),
(85, 1, '2020-03-28', '2020-03-27 23:52:22', '2020-03-27 23:52:22'),
(86, 1, '2020-03-28', '2020-03-27 23:52:24', '2020-03-27 23:52:24'),
(87, 1, '2020-03-28', '2020-03-27 23:52:28', '2020-03-27 23:52:28'),
(88, 1, '2020-03-28', '2020-03-27 23:52:30', '2020-03-27 23:52:30'),
(89, 1, '2020-03-28', '2020-03-27 23:52:48', '2020-03-27 23:52:48'),
(90, 1, '2020-03-28', '2020-03-27 23:52:50', '2020-03-27 23:52:50'),
(91, 1, '2020-03-28', '2020-03-27 23:52:56', '2020-03-27 23:52:56'),
(92, 1, '2020-03-28', '2020-03-27 23:53:20', '2020-03-27 23:53:20'),
(93, 1, '2020-03-28', '2020-03-27 23:53:24', '2020-03-27 23:53:24'),
(94, 1, '2020-03-28', '2020-03-27 23:53:35', '2020-03-27 23:53:35'),
(95, 1, '2020-03-28', '2020-03-27 23:57:32', '2020-03-27 23:57:32'),
(96, 1, '2020-03-28', '2020-03-27 23:57:34', '2020-03-27 23:57:34'),
(97, 1, '2020-03-28', '2020-03-27 23:57:38', '2020-03-27 23:57:38'),
(98, 1, '2020-03-28', '2020-03-27 23:57:40', '2020-03-27 23:57:40'),
(99, 1, '2020-03-28', '2020-03-27 23:57:44', '2020-03-27 23:57:44'),
(100, 1, '2020-03-28', '2020-03-27 23:57:48', '2020-03-27 23:57:48'),
(101, 1, '2020-03-28', '2020-03-27 23:57:51', '2020-03-27 23:57:51'),
(102, 1, '2020-03-28', '2020-03-27 23:58:17', '2020-03-27 23:58:17'),
(103, 1, '2020-03-28', '2020-03-27 23:58:19', '2020-03-27 23:58:19'),
(104, 1, '2020-03-28', '2020-03-27 23:58:40', '2020-03-27 23:58:40'),
(105, 1, '2020-03-28', '2020-03-27 23:58:45', '2020-03-27 23:58:45'),
(106, 1, '2020-03-28', '2020-03-28 00:00:09', '2020-03-28 00:00:09'),
(107, 1, '2020-03-28', '2020-03-28 00:02:24', '2020-03-28 00:02:24'),
(108, 1, '2020-03-28', '2020-03-28 00:09:45', '2020-03-28 00:09:45'),
(109, 1, '2020-03-28', '2020-03-28 00:09:50', '2020-03-28 00:09:50'),
(110, 1, '2020-03-28', '2020-03-28 00:23:05', '2020-03-28 00:23:05'),
(111, 1, '2020-03-28', '2020-03-28 01:17:08', '2020-03-28 01:17:08'),
(112, 1, '2020-03-28', '2020-03-28 01:17:35', '2020-03-28 01:17:35'),
(113, 1, '2020-03-28', '2020-03-28 01:20:08', '2020-03-28 01:20:08'),
(114, 1, '2020-03-28', '2020-03-28 01:20:20', '2020-03-28 01:20:20'),
(115, 1, '2020-03-28', '2020-03-28 01:20:23', '2020-03-28 01:20:23'),
(116, 1, '2020-03-28', '2020-03-28 01:20:34', '2020-03-28 01:20:34'),
(117, 1, '2020-03-28', '2020-03-28 01:20:46', '2020-03-28 01:20:46'),
(118, 1, '2020-03-28', '2020-03-28 01:22:28', '2020-03-28 01:22:28'),
(119, 1, '2020-03-28', '2020-03-28 01:23:25', '2020-03-28 01:23:25'),
(120, 1, '2020-03-28', '2020-03-28 01:24:47', '2020-03-28 01:24:47'),
(121, 1, '2020-03-28', '2020-03-28 01:25:02', '2020-03-28 01:25:02'),
(122, 1, '2020-03-28', '2020-03-28 01:25:07', '2020-03-28 01:25:07'),
(123, 1, '2020-03-28', '2020-03-28 01:36:08', '2020-03-28 01:36:08'),
(124, 1, '2020-03-28', '2020-03-28 01:36:53', '2020-03-28 01:36:53'),
(125, 1, '2020-03-28', '2020-03-28 01:36:55', '2020-03-28 01:36:55'),
(126, 1, '2020-03-28', '2020-03-28 01:37:02', '2020-03-28 01:37:02'),
(127, 1, '2020-03-28', '2020-03-28 01:40:44', '2020-03-28 01:40:44'),
(128, 1, '2020-03-28', '2020-03-28 01:41:04', '2020-03-28 01:41:04'),
(129, 1, '2020-03-28', '2020-03-28 01:42:12', '2020-03-28 01:42:12'),
(130, 1, '2020-03-28', '2020-03-28 01:47:49', '2020-03-28 01:47:49'),
(131, 1, '2020-03-28', '2020-03-28 01:52:41', '2020-03-28 01:52:41'),
(132, 1, '2020-03-28', '2020-03-28 02:20:16', '2020-03-28 02:20:16'),
(133, 1, '2020-03-28', '2020-03-28 02:32:17', '2020-03-28 02:32:17'),
(134, 1, '2020-03-28', '2020-03-28 03:17:29', '2020-03-28 03:17:29'),
(135, 1, '2020-03-28', '2020-03-28 03:17:37', '2020-03-28 03:17:37'),
(136, 1, '2020-03-28', '2020-03-28 03:17:51', '2020-03-28 03:17:51'),
(137, 1, '2020-03-28', '2020-03-28 03:19:47', '2020-03-28 03:19:47'),
(138, 1, '2020-03-28', '2020-03-28 03:21:04', '2020-03-28 03:21:04'),
(139, 1, '2020-03-28', '2020-03-28 03:24:00', '2020-03-28 03:24:00'),
(140, 1, '2020-03-28', '2020-03-28 03:26:32', '2020-03-28 03:26:32'),
(141, 1, '2020-03-28', '2020-03-28 03:26:34', '2020-03-28 03:26:34'),
(142, 1, '2020-03-28', '2020-03-28 03:26:38', '2020-03-28 03:26:38'),
(143, 1, '2020-03-28', '2020-03-28 03:26:41', '2020-03-28 03:26:41'),
(144, 1, '2020-03-28', '2020-03-28 03:26:44', '2020-03-28 03:26:44'),
(145, 1, '2020-03-28', '2020-03-28 03:26:46', '2020-03-28 03:26:46'),
(146, 1, '2020-03-28', '2020-03-28 03:26:48', '2020-03-28 03:26:48'),
(147, 1, '2020-03-28', '2020-03-28 03:26:55', '2020-03-28 03:26:55'),
(148, 1, '2020-03-28', '2020-03-28 03:27:24', '2020-03-28 03:27:24'),
(149, 1, '2020-03-28', '2020-03-28 03:30:20', '2020-03-28 03:30:20'),
(150, 1, '2020-03-28', '2020-03-28 03:31:14', '2020-03-28 03:31:14'),
(151, 1, '2020-03-28', '2020-03-28 03:31:32', '2020-03-28 03:31:32'),
(152, 1, '2020-03-28', '2020-03-28 03:31:38', '2020-03-28 03:31:38'),
(153, 1, '2020-03-28', '2020-03-28 03:31:52', '2020-03-28 03:31:52'),
(154, 1, '2020-03-28', '2020-03-28 03:32:18', '2020-03-28 03:32:18'),
(155, 1, '2020-03-28', '2020-03-28 03:32:23', '2020-03-28 03:32:23'),
(156, 1, '2020-03-28', '2020-03-28 03:33:31', '2020-03-28 03:33:31'),
(157, 1, '2020-03-28', '2020-03-28 03:33:37', '2020-03-28 03:33:37'),
(158, 1, '2020-03-28', '2020-03-28 03:33:58', '2020-03-28 03:33:58'),
(159, 1, '2020-03-28', '2020-03-28 03:41:42', '2020-03-28 03:41:42'),
(160, 1, '2020-03-28', '2020-03-28 03:45:34', '2020-03-28 03:45:34'),
(161, 1, '2020-03-28', '2020-03-28 03:58:00', '2020-03-28 03:58:00'),
(162, 1, '2020-03-28', '2020-03-28 04:00:36', '2020-03-28 04:00:36'),
(163, 1, '2020-03-28', '2020-03-28 04:00:36', '2020-03-28 04:00:36'),
(164, 1, '2020-03-28', '2020-03-28 04:16:20', '2020-03-28 04:16:20'),
(165, 1, '2020-03-28', '2020-03-28 04:34:53', '2020-03-28 04:34:53'),
(166, 1, '2020-03-28', '2020-03-28 04:39:49', '2020-03-28 04:39:49'),
(167, 154, '2020-03-30', '2020-03-30 01:17:04', '2020-03-30 02:42:58'),
(168, 151, '2020-03-31', '2020-03-30 18:25:53', '2020-03-30 23:35:28'),
(169, 35, '2020-04-01', '2020-03-31 18:36:33', '2020-03-31 20:45:23'),
(170, 18, '2020-04-03', '2020-04-02 18:06:33', '2020-04-02 19:17:33'),
(171, 10, '2020-04-06', '2020-04-06 01:00:45', '2020-04-06 01:16:33'),
(172, 160, '2020-04-07', '2020-04-06 18:13:54', '2020-04-07 01:39:22'),
(173, 1, '2020-04-11', '2020-04-10 21:47:21', '2020-04-10 21:47:21'),
(174, 5, '2020-04-21', '2020-04-21 01:02:28', '2020-04-21 01:03:23'),
(175, 1, '2020-05-04', '2020-05-04 02:01:05', '2020-05-04 02:01:05'),
(176, 201, '2020-05-06', '2020-05-05 17:59:59', '2020-05-05 22:31:37'),
(177, 29, '2020-05-07', '2020-05-06 18:03:51', '2020-05-06 18:25:30'),
(178, 40, '2020-05-11', '2020-05-10 20:15:41', '2020-05-11 01:58:50'),
(179, 31, '2020-05-12', '2020-05-11 17:27:00', '2020-05-11 18:14:37'),
(180, 81, '2020-05-13', '2020-05-12 21:38:08', '2020-05-13 00:26:47'),
(181, 25, '2020-05-15', '2020-05-15 09:02:15', '2020-05-15 09:24:47'),
(182, 1, '2020-05-14', '2020-05-14 11:51:18', '2020-05-14 11:51:18'),
(183, 1, '2020-05-14', '2020-05-14 11:51:18', '2020-05-14 11:51:18'),
(184, 1, '2020-05-14', '2020-05-14 11:51:33', '2020-05-14 11:51:33'),
(185, 1, '2020-05-14', '2020-05-14 11:51:45', '2020-05-14 11:51:45'),
(186, 1, '2020-05-14', '2020-05-14 11:51:49', '2020-05-14 11:51:49'),
(187, 1, '2020-05-14', '2020-05-14 11:51:51', '2020-05-14 11:51:51'),
(188, 1, '2020-05-14', '2020-05-14 11:51:59', '2020-05-14 11:51:59'),
(189, 1, '2020-05-14', '2020-05-14 11:52:05', '2020-05-14 11:52:05'),
(190, 1, '2020-05-14', '2020-05-14 11:57:11', '2020-05-14 11:57:11'),
(191, 1, '2020-05-14', '2020-05-14 11:58:07', '2020-05-14 11:58:07'),
(192, 1, '2020-05-14', '2020-05-14 11:59:25', '2020-05-14 11:59:25'),
(193, 1, '2020-05-14', '2020-05-14 11:59:46', '2020-05-14 11:59:46'),
(194, 1, '2020-05-14', '2020-05-14 12:07:01', '2020-05-14 12:07:01'),
(195, 1, '2020-05-14', '2020-05-14 12:09:02', '2020-05-14 12:09:02'),
(196, 1, '2020-05-14', '2020-05-14 12:09:24', '2020-05-14 12:09:24'),
(197, 1, '2020-05-14', '2020-05-14 12:09:25', '2020-05-14 12:09:25'),
(198, 1, '2020-05-14', '2020-05-14 12:09:25', '2020-05-14 12:09:25'),
(199, 1, '2020-05-14', '2020-05-14 12:09:25', '2020-05-14 12:09:25'),
(200, 1, '2020-05-14', '2020-05-14 12:09:25', '2020-05-14 12:09:25'),
(201, 1, '2020-05-14', '2020-05-14 12:09:26', '2020-05-14 12:09:26'),
(202, 1, '2020-05-14', '2020-05-14 12:09:26', '2020-05-14 12:09:26'),
(203, 1, '2020-05-14', '2020-05-14 12:10:11', '2020-05-14 12:10:11'),
(204, 1, '2020-05-14', '2020-05-14 12:10:12', '2020-05-14 12:10:12'),
(205, 1, '2020-05-14', '2020-05-14 12:10:12', '2020-05-14 12:10:12'),
(206, 1, '2020-05-14', '2020-05-14 12:10:12', '2020-05-14 12:10:12'),
(207, 1, '2020-05-14', '2020-05-14 12:10:13', '2020-05-14 12:10:13'),
(208, 1, '2020-05-14', '2020-05-14 12:10:49', '2020-05-14 12:10:49'),
(209, 1, '2020-05-14', '2020-05-14 12:10:49', '2020-05-14 12:10:49'),
(210, 1, '2020-05-14', '2020-05-14 12:10:50', '2020-05-14 12:10:50'),
(211, 1, '2020-05-14', '2020-05-14 12:11:11', '2020-05-14 12:11:11'),
(212, 1, '2020-05-14', '2020-05-14 12:11:12', '2020-05-14 12:11:12'),
(213, 1, '2020-05-14', '2020-05-14 12:11:13', '2020-05-14 12:11:13'),
(214, 1, '2020-05-14', '2020-05-14 12:11:29', '2020-05-14 12:11:29'),
(215, 1, '2020-05-14', '2020-05-14 12:11:43', '2020-05-14 12:11:43'),
(216, 1, '2020-05-14', '2020-05-14 12:11:44', '2020-05-14 12:11:44'),
(217, 1, '2020-05-14', '2020-05-14 12:11:44', '2020-05-14 12:11:44'),
(218, 1, '2020-05-14', '2020-05-14 12:11:44', '2020-05-14 12:11:44'),
(219, 1, '2020-05-14', '2020-05-14 12:11:44', '2020-05-14 12:11:44'),
(220, 1, '2020-05-14', '2020-05-14 12:11:44', '2020-05-14 12:11:44'),
(221, 1, '2020-05-14', '2020-05-14 12:11:45', '2020-05-14 12:11:45'),
(222, 1, '2020-05-14', '2020-05-14 12:12:22', '2020-05-14 12:12:22'),
(223, 1, '2020-05-14', '2020-05-14 12:13:02', '2020-05-14 12:13:02'),
(224, 1, '2020-05-14', '2020-05-14 12:13:03', '2020-05-14 12:13:03'),
(225, 1, '2020-05-14', '2020-05-14 12:13:17', '2020-05-14 12:13:17'),
(226, 1, '2020-05-14', '2020-05-14 12:13:18', '2020-05-14 12:13:18'),
(227, 1, '2020-05-14', '2020-05-14 12:13:18', '2020-05-14 12:13:18'),
(228, 1, '2020-05-14', '2020-05-14 12:13:18', '2020-05-14 12:13:18'),
(229, 1, '2020-05-14', '2020-05-14 12:13:18', '2020-05-14 12:13:18'),
(230, 1, '2020-05-14', '2020-05-14 12:13:51', '2020-05-14 12:13:51'),
(231, 1, '2020-05-14', '2020-05-14 12:14:10', '2020-05-14 12:14:10'),
(232, 1, '2020-05-14', '2020-05-14 12:14:29', '2020-05-14 12:14:29'),
(233, 1, '2020-05-14', '2020-05-14 12:14:32', '2020-05-14 12:14:32'),
(234, 1, '2020-05-14', '2020-05-14 12:14:56', '2020-05-14 12:14:56'),
(235, 1, '2020-05-14', '2020-05-14 12:14:57', '2020-05-14 12:14:57'),
(236, 1, '2020-05-14', '2020-05-14 12:14:57', '2020-05-14 12:14:57'),
(237, 1, '2020-05-14', '2020-05-14 12:14:57', '2020-05-14 12:14:57'),
(238, 1, '2020-05-14', '2020-05-14 12:14:58', '2020-05-14 12:14:58'),
(239, 1, '2020-05-14', '2020-05-14 12:14:58', '2020-05-14 12:14:58'),
(240, 1, '2020-05-14', '2020-05-14 12:15:49', '2020-05-14 12:15:49'),
(241, 1, '2020-05-14', '2020-05-14 12:15:49', '2020-05-14 12:15:49'),
(242, 1, '2020-05-14', '2020-05-14 12:15:50', '2020-05-14 12:15:50'),
(243, 1, '2020-05-14', '2020-05-14 12:15:50', '2020-05-14 12:15:50'),
(244, 1, '2020-05-14', '2020-05-14 12:15:50', '2020-05-14 12:15:50'),
(245, 1, '2020-05-14', '2020-05-14 12:16:11', '2020-05-14 12:16:11'),
(246, 1, '2020-05-14', '2020-05-14 12:17:31', '2020-05-14 12:17:31'),
(247, 1, '2020-05-14', '2020-05-14 12:17:31', '2020-05-14 12:17:31'),
(248, 1, '2020-05-14', '2020-05-14 12:17:31', '2020-05-14 12:17:31'),
(249, 1, '2020-05-14', '2020-05-14 12:17:31', '2020-05-14 12:17:31'),
(250, 1, '2020-05-14', '2020-05-14 12:17:32', '2020-05-14 12:17:32'),
(251, 1, '2020-05-14', '2020-05-14 12:17:32', '2020-05-14 12:17:32'),
(252, 1, '2020-05-14', '2020-05-14 12:17:33', '2020-05-14 12:17:33'),
(253, 1, '2020-05-14', '2020-05-14 12:17:43', '2020-05-14 12:17:43'),
(254, 1, '2020-05-14', '2020-05-14 12:20:10', '2020-05-14 12:20:10'),
(255, 1, '2020-05-14', '2020-05-14 12:21:05', '2020-05-14 12:21:05'),
(256, 1, '2020-05-14', '2020-05-14 12:22:35', '2020-05-14 12:22:35'),
(257, 1, '2020-05-14', '2020-05-14 12:23:13', '2020-05-14 12:23:13'),
(258, 1, '2020-05-14', '2020-05-14 12:25:02', '2020-05-14 12:25:02'),
(259, 1, '2020-05-14', '2020-05-14 12:45:16', '2020-05-14 12:45:16'),
(260, 1, '2020-05-14', '2020-05-14 12:45:16', '2020-05-14 12:45:16'),
(261, 1, '2020-05-14', '2020-05-14 12:45:56', '2020-05-14 12:45:56'),
(262, 1, '2020-05-14', '2020-05-14 12:46:20', '2020-05-14 12:46:20'),
(263, 1, '2020-05-14', '2020-05-14 12:46:28', '2020-05-14 12:46:28'),
(264, 1, '2020-05-14', '2020-05-14 12:47:49', '2020-05-14 12:47:49'),
(265, 1, '2020-05-14', '2020-05-14 12:54:38', '2020-05-14 12:54:38'),
(266, 1, '2020-05-14', '2020-05-14 12:55:36', '2020-05-14 12:55:36'),
(267, 1, '2020-05-14', '2020-05-14 12:55:36', '2020-05-14 12:55:36'),
(268, 1, '2020-05-14', '2020-05-14 12:55:36', '2020-05-14 12:55:36'),
(269, 1, '2020-05-14', '2020-05-14 12:55:36', '2020-05-14 12:55:36'),
(270, 1, '2020-05-14', '2020-05-14 12:55:37', '2020-05-14 12:55:37'),
(271, 1, '2020-05-14', '2020-05-14 12:56:08', '2020-05-14 12:56:08'),
(272, 1, '2020-05-14', '2020-05-14 12:56:18', '2020-05-14 12:56:18'),
(273, 1, '2020-05-14', '2020-05-14 12:56:28', '2020-05-14 12:56:28'),
(274, 1, '2020-05-14', '2020-05-14 12:56:41', '2020-05-14 12:56:41'),
(275, 23, '2020-06-12', '2020-06-11 18:19:28', '2020-06-11 18:38:03'),
(276, 19, '2020-07-31', '2020-07-30 19:16:49', '2020-07-30 19:19:59'),
(277, 12, '2020-09-17', '2020-09-17 02:53:39', '2020-09-17 03:02:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuvans`
--

CREATE TABLE `tuvans` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuvans`
--

INSERT INTO `tuvans` (`id`, `hoten`, `email`, `sdt`, `noidung`, `created_at`, `updated_at`) VALUES
(1, 'nguyên văn A', 'lieu@gmail.com', '0125555543', 'sdf', '2020-04-06 01:15:42', '2020-04-06 01:15:42'),
(2, 'nguyên văn B', 'c@gmail.com', '0125555544', 'sadas', '2020-05-06 18:19:27', '2020-05-06 18:19:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendungs`
--

CREATE TABLE `tuyendungs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyendungs`
--

INSERT INTO `tuyendungs` (`id`, `tieude`, `noidung`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'aasdasd33332', '<h1 style=\"text-align:center\"><strong>asdasd3333</strong></h1>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://localhost/k34-vietpro-blog/public/upload/images/ao-quang-chau.jpg\" style=\"border-style:solid; border-width:2px; height:300px; margin:2px; width:600px\" /></p>', 'asdasd333', '0000-00-00 00:00:00', '2019-10-15 04:11:33'),
(6, 'ankoko', '<p>asdasd</p>', 'asdasd', '2019-10-06 19:53:22', '2019-10-06 19:53:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`, `remember_token`, `created_at`, `updated_at`, `last_sign_in_at`) VALUES
(11, 'lieu', 'lieu@gmail.com', '$2y$10$oam26lRiYbu2.hBAtNr3h.yKLXKUedjmpMVHCbAXk1g/Qyg5uQ8oG', NULL, NULL, '2020-02-11 07:27:49', '2020-02-11 07:27:49', NULL),
(41, 'lieuq', 'lieuq@gmail.com', '$2y$10$IAlP3/PxqSnpLV7.ExwOCep8lVHocOu93i5T3Em/nunXAp2CQtVcu', '2020-03-25', NULL, '2020-03-24 17:00:00', '2020-03-02 02:17:21', NULL),
(42, 'lieu', 'lieu1234@gmail.com', '$2y$10$Eb1K0jXAJO7Iv/MxyUQtUePDcfNNneL5IKBQbmSw1Yzq9XPrcu1.y', NULL, NULL, '2020-03-11 00:00:32', '2020-03-11 00:00:32', NULL),
(48, 'lieu1', 'lieu1@gmail.com', '$2y$10$gAZFy5I03EpRdkdsQU4OH.Z2wDpYaMEmg1n/L1a/9tCBmpQmejRUC', '2020-03-25', NULL, '2020-03-25 02:39:57', '2020-03-25 02:39:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userss`
--

CREATE TABLE `userss` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `userss`
--

INSERT INTO `userss` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'antran', 'tranminhan@gmail.com', '$2y$10$Rwv3sYy1lTlilFcOFyCc2uVD5AMVLehTVjkidNCx4AFHra7KrU3QC', NULL, NULL, NULL),
(2, 'asd@qwsd', 'dasd@asd', '123123', NULL, '2019-11-06 02:11:38', '2019-11-06 02:11:38'),
(4, 'qweqwe@qweqwe', 'qwe@weadf', 'qwqeqwe', NULL, '2019-11-06 02:13:10', '2019-11-06 02:13:10'),
(6, 'asd@qwsd', 'asdasd@adasd', 'asd', NULL, '2019-11-06 03:03:40', '2019-11-06 03:03:40'),
(7, 'asd', 'tranminhan48@gmail.com', '123123', NULL, '2019-11-06 03:04:35', '2019-11-06 03:04:35'),
(9, 'qweqwe@qweqwe', 'tranminhan111@gmail.com', '123123', NULL, '2019-11-06 03:05:50', '2019-11-06 03:05:50'),
(11, 'asd@qwsd', 'asdas@qweqweqweqwe', '123123', NULL, '2019-11-06 03:10:11', '2019-11-06 03:10:11'),
(12, 'an tran', '123@123', '123123', NULL, '2019-11-06 03:37:44', '2019-11-06 03:37:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `bieuphihas`
--
ALTER TABLE `bieuphihas`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`);

--
-- Chỉ mục cho bảng `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhangs_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `chitietusers`
--
ALTER TABLE `chitietusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietusers_userss_id_foreign` (`userss_id`);

--
-- Chỉ mục cho bảng `congtiens`
--
ALTER TABLE `congtiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `congtiens_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhangs_user_id_foreign` (`user_id`),
  ADD KEY `donhangs_thongtinkh_id_foreign` (`thongtinkh_id`),
  ADD KEY `donhangs_cart_item_id_foreign` (`cart_item_id`),
  ADD KEY `donhangs_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `donvans`
--
ALTER TABLE `donvans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donvans_donhang_id_foreign` (`donhang_id`),
  ADD KEY `donvans_nhavanchuyen_id_foreign` (`nhavanchuyen_id`);

--
-- Chỉ mục cho bảng `khieunais`
--
ALTER TABLE `khieunais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khieunais_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `khoiluongs`
--
ALTER TABLE `khoiluongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khoiluongs_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `lienhes`
--
ALTER TABLE `lienhes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luulinks`
--
ALTER TABLE `luulinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `luulinks_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `naptiens`
--
ALTER TABLE `naptiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naptiens_user_id_foreign` (`user_id`),
  ADD KEY `naptiens_donhang_id_foreign` (`donhang_id`),
  ADD KEY `naptiens_congtien_id_foreign` (`congtien_id`);

--
-- Chỉ mục cho bảng `nccs`
--
ALTER TABLE `nccs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatkys`
--
ALTER TABLE `nhatkys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhatkys_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `nhavanchuyens`
--
ALTER TABLE `nhavanchuyens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhavanchuyens_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `nhomkhs`
--
ALTER TABLE `nhomkhs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `paymethods`
--
ALTER TABLE `paymethods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymethods_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phivanchuyens`
--
ALTER TABLE `phivanchuyens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phivanchuyens_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_ncc_foreign` (`id_ncc`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_admins_role_id_foreign` (`Role_id`),
  ADD KEY `role_admins_admin_id_foreign` (`Admin_id`);

--
-- Chỉ mục cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloais`
--
ALTER TABLE `theloais`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongsos`
--
ALTER TABLE `thongsos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinkhs`
--
ALTER TABLE `thongtinkhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thongtinkhs_admin_id_foreign` (`admin_id`),
  ADD KEY `thongtinkhs_nhomkh_id_foreign` (`nhomkh_id`);

--
-- Chỉ mục cho bảng `tintucs`
--
ALTER TABLE `tintucs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tintucs_id_tl_foreign` (`id_tl`);

--
-- Chỉ mục cho bảng `transations`
--
ALTER TABLE `transations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transations_donhang_id_foreign` (`donhang_id`),
  ADD KEY `transations_pay_id_foreign` (`pay_id`);

--
-- Chỉ mục cho bảng `truycaps`
--
ALTER TABLE `truycaps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuvans`
--
ALTER TABLE `tuvans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuyendungs`
--
ALTER TABLE `tuyendungs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userss_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `bieuphihas`
--
ALTER TABLE `bieuphihas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `chitietusers`
--
ALTER TABLE `chitietusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `congtiens`
--
ALTER TABLE `congtiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `donvans`
--
ALTER TABLE `donvans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `khieunais`
--
ALTER TABLE `khieunais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khoiluongs`
--
ALTER TABLE `khoiluongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `lienhes`
--
ALTER TABLE `lienhes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `luulinks`
--
ALTER TABLE `luulinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `naptiens`
--
ALTER TABLE `naptiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nccs`
--
ALTER TABLE `nccs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhatkys`
--
ALTER TABLE `nhatkys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT cho bảng `nhavanchuyens`
--
ALTER TABLE `nhavanchuyens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhomkhs`
--
ALTER TABLE `nhomkhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `paymethods`
--
ALTER TABLE `paymethods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `phivanchuyens`
--
ALTER TABLE `phivanchuyens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloais`
--
ALTER TABLE `theloais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thongsos`
--
ALTER TABLE `thongsos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `thongtinkhs`
--
ALTER TABLE `thongtinkhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tintucs`
--
ALTER TABLE `tintucs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `transations`
--
ALTER TABLE `transations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `truycaps`
--
ALTER TABLE `truycaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT cho bảng `tuvans`
--
ALTER TABLE `tuvans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tuyendungs`
--
ALTER TABLE `tuyendungs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD CONSTRAINT `chitietdonhangs_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietusers`
--
ALTER TABLE `chitietusers`
  ADD CONSTRAINT `chitietusers_userss_id_foreign` FOREIGN KEY (`userss_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `congtiens`
--
ALTER TABLE `congtiens`
  ADD CONSTRAINT `congtiens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  ADD CONSTRAINT `donhangs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donhangs_cart_item_id_foreign` FOREIGN KEY (`cart_item_id`) REFERENCES `cart_items` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donhangs_thongtinkh_id_foreign` FOREIGN KEY (`thongtinkh_id`) REFERENCES `thongtinkhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donhangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donvans`
--
ALTER TABLE `donvans`
  ADD CONSTRAINT `donvans_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donvans_nhavanchuyen_id_foreign` FOREIGN KEY (`nhavanchuyen_id`) REFERENCES `nhavanchuyens` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khieunais`
--
ALTER TABLE `khieunais`
  ADD CONSTRAINT `khieunais_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khoiluongs`
--
ALTER TABLE `khoiluongs`
  ADD CONSTRAINT `khoiluongs_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `luulinks`
--
ALTER TABLE `luulinks`
  ADD CONSTRAINT `luulinks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `naptiens`
--
ALTER TABLE `naptiens`
  ADD CONSTRAINT `naptiens_congtien_id_foreign` FOREIGN KEY (`congtien_id`) REFERENCES `congtiens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `naptiens_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `naptiens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhatkys`
--
ALTER TABLE `nhatkys`
  ADD CONSTRAINT `nhatkys_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhavanchuyens`
--
ALTER TABLE `nhavanchuyens`
  ADD CONSTRAINT `nhavanchuyens_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `paymethods`
--
ALTER TABLE `paymethods`
  ADD CONSTRAINT `paymethods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phivanchuyens`
--
ALTER TABLE `phivanchuyens`
  ADD CONSTRAINT `phivanchuyens_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_ncc_foreign` FOREIGN KEY (`id_ncc`) REFERENCES `nccs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_admins`
--
ALTER TABLE `role_admins`
  ADD CONSTRAINT `role_admins_admin_id_foreign` FOREIGN KEY (`Admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_admins_role_id_foreign` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thongtinkhs`
--
ALTER TABLE `thongtinkhs`
  ADD CONSTRAINT `thongtinkhs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thongtinkhs_nhomkh_id_foreign` FOREIGN KEY (`nhomkh_id`) REFERENCES `nhomkhs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tintucs`
--
ALTER TABLE `tintucs`
  ADD CONSTRAINT `tintucs_id_tl_foreign` FOREIGN KEY (`id_tl`) REFERENCES `theloais` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transations`
--
ALTER TABLE `transations`
  ADD CONSTRAINT `transations_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transations_pay_id_foreign` FOREIGN KEY (`pay_id`) REFERENCES `paymethods` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
