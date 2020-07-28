-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 28, 2020 lúc 04:25 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thuchanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `cart_session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `prd_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `prd_id`, `cart_session`, `prd_name`, `prd_price`, `quantity`, `prd_image`) VALUES
(35, 3, 'hngth3v5um8v4v1sienjhvjdf9', 'Iphone 8 Plus', '55000000', 3, 'iphone8plus.jpg'),
(36, 1, 'hngth3v5um8v4v1sienjhvjdf9', 'iPhone Gold', '25000000', 5, 'iphonegold.jpg'),
(41, 4, 'c506v1741j3r12nl4vpm6hsa28', 'Iphone X', '90000000', 1, 'iPhoneX64.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Blackberry'),
(3, 'HTC'),
(1, 'iPhone'),
(4, 'Nokia'),
(7, 'OPPO'),
(2, 'Samsung'),
(5, 'Sony'),
(9, 'Vivo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(51, 3, 'asd', 'sad@gmail.com', '2020-06-02 06:18:29', 'asdvsadfsad'),
(52, 16, 'vancsd', 'sfffad@gmail.com', '2020-06-02 06:19:02', 'dsafdsafasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `email`, `address`, `password`) VALUES
(2, 'D2', '12312312', 'admin@gmail.com', '20', '123456'),
(3, 'D2', '12312312', 'vanco@gmail.com', '20', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'C5', '12312312', 'sd@gmail.com', '20', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `prd_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `prd_price` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `prd_id`, `customer_id`, `prd_name`, `quantity`, `prd_price`, `prd_image`, `status`, `date_order`) VALUES
(1, 4, 3, 'Iphone X', 1, '90000000', 'iPhoneX64.png', 0, '2020-07-28 13:43:59'),
(2, 5, 4, 'IPhone XR', 2, '200000000', 'iphoneXR.jpg', 0, '2020-07-28 13:43:59'),
(3, 28, 4, 'BlackBerry Key One', 1, '12000000', 'blackberryKey1.jpg', 0, '2020-07-28 13:43:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_details`) VALUES
(1, 1, 'iPhone Gold', 'iphonegold.jpg', 25000000, ' 1 nam', 'cap, sac', 'chinh hang', 'tv', 0, ''),
(3, 1, 'Iphone 8 Plus', 'iphone8plus.jpg', 55000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 0, ''),
(4, 1, 'Iphone X', 'iPhoneX64.png', 90000000, '2 nam', 'ca, sac', 'chinh hang', 'YES', 0, ''),
(5, 1, 'IPhone XR', 'iphoneXR.jpg', 100000000, '2 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(6, 2, 'samsung S9 Plus', 'Samsung-Galaxy-S9-Plus-Black-128GB.png', 20000000, ' 1 nam', 'cap, sac', 'may', 'D�n M�', 1, ''),
(7, 2, 'Samsung S8 Plus', 'samsungS8plus.jpg', 13000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(8, 2, 'Samsung A70', 'samsungA70.png', 11000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 1, ''),
(9, 2, 'Samsung S10', 'samsungS10.png', 75000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(10, 2, 'Samsung Note 10', 'samsungNote10.jpg', 80000000, '2 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(11, 3, 'HTC 10', 'htc10.png', 5000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(12, 3, 'HTC U12', 'htcU12.png', 5500000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(13, 3, 'HTC Desire 19+', 'htcDesire19plus.jpg', 55000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(14, 3, 'HTC One M8', 'htcOneM8.jpg', 6000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 0, ''),
(15, 3, 'HTC Desire 19S', 'htcDesire19s.jpg', 60000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(16, 4, 'Nokia 4.2+', 'nokia4-2.jpg', 4000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(17, 4, 'Nokia 7.1', 'nokia7-1.png', 11000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 0, ''),
(18, 4, 'Nokia 8.1', 'nokia8-1.png', 17000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(19, 4, 'Nokia 9', 'nokia9.jpg', 24000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(20, 4, 'Nokia X71', 'nokiax71.jpg', 34000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(21, 5, 'Sony X5', 'sonyx5.png', 33000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(22, 5, 'Sony XA1', 'sonyxa1.png', 46000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(23, 5, 'Sony L4', 'sonyxl4.jpg', 51000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(24, 5, 'Sony Z2', 'sonyxz2.png', 29000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(25, 5, 'Sony Z4', 'sonyxz4.png', 39000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(27, 6, 'BlackBerry Evolve', 'BlackBerryEvolve.jpg', 33000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(28, 6, 'BlackBerry Key One', 'blackberryKey1.jpg', 12000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(29, 6, 'BlackBerry Key2', 'blackberryKey2.jpg', 14000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(30, 6, 'BlackBerry Q10', 'blackberryQ10.png', 1000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(31, 7, 'Oppo Realme 5', 'oppeRealme5.jpg', 26000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(32, 7, 'Oppo A1K', 'oppoA1K.png', 30000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(33, 7, 'Oppo A5', 'oppoA5.png', 36000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(34, 7, 'Oppo A9', 'oppoA9.jpg', 44000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(35, 7, 'Oppo K5', 'oppoK5.jpg', 28000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(36, 8, 'xiaomi', 'Xiaomi-Mi-8-Pro-Black.png', 57000000, ' 1 nam', 'cap, sac', 'M�y M?i ', 'D�n ', 1, ''),
(37, 8, 'XiaoMi 7A', 'xiaomi7A.jpg', 57000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(38, 8, 'XiaoMi Mi9T', 'xiaomiMi9T.png', 70000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(39, 8, 'XiaoMi MiA3', 'xiaomiMiA3.jpg', 77000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(40, 8, 'XiaoMi Note 8', 'xiaomiNote8.jpg', 88000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(41, 9, 'vivo 69', 'Vivo-Y69-Gold.png', 69000000, ' 1 nam', 'cap, sac', 'M�y M', 'dddddddddddddddd', 1, ''),
(42, 9, 'ViVo V15', 'vivoV15.jpg', 91000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(43, 9, 'ViVO Y11', 'vivoY11.png', 84000000, '1 nam', 'cap, sac', 'chinh hang', 'NO', 1, ''),
(44, 9, 'ViVo Y19', 'vivoY19.jpg', 99000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(45, 9, 'ViVo Y91C', 'vivoY91c.jpg', 93000000, '1 nam', 'cap, sac', 'chinh hang', 'YES', 0, ''),
(50, 0, 'asc', 'a1f0eb1019.jpeg', 123, '1', '123', 'waef', '213', 1, '32qrqr');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Vietpro Academy', 'vietpro.edu.vn@gmail.com', '123456', 1),
(2, 'Administrator', 'admin@gmail.com', '123456', 1),
(3, 'Nguyễn Van A', 'nguyenvana@gmail.com', '123456', 2),
(4, 'Nguyễn Van B', 'nguyenvanb@gmail.com', '123456', 2),
(5, 'Nguyễn Van C', 'nguyenvanc@gmail.com', '123456', 2),
(6, 'Nguyễn Van D', 'nguyenvand@gmail.com', '123456', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
