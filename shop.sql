-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 07:33 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--
INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`,`level` , `avatar` ,`created_at`, `update_at`) VALUES
(1, 'Phan Văn Thông', 'K123/14 Đỗ Thúc Tịnh, Khuê Trung, Cẩm Lệ, Đà Nẵng', 'thong.phan109@gmail.com', 123321, 0778960402, 1, 2,NULL, '2020-09-07 15:39:21', '2020-09-28 08:18:43'),
(2, 'Alex Nguyen', 'K123/14 Phan Đăng Lưu, Cẩm Lệ, Đà Nẵng', 'thong@gmail.com',123321, 0778960403 , 1, 1,NULL, '2020-09-07 15:39:21', '2020-09-28 08:18:43');
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `update_at`) VALUES
(8, 'Burger', 'burger', NULL, NULL, 1, 1, '2020-09-07 15:39:21', '2020-09-28 08:18:43'),
(9, 'Value', 'value', NULL, NULL, 0, 1, '2017-07-02 15:06:28', '2017-07-02 15:06:28'),
(10, 'Rice', 'rice', NULL, NULL, 1, 1, '2017-07-02 16:18:20', '2017-07-02 16:38:55'),
(11, 'Set', 'set', NULL, NULL, 0, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06'),
(12, 'Drinks', 'drinks', NULL, NULL, 1, 1, '2017-07-03 03:10:10', '2017-07-03 03:10:10'),
(13, 'Dessert', 'dessert', NULL, NULL, 0, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06'),
(14, 'Chicken Set', 'chicken-set', NULL, NULL, 0, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06'),
(15, 'Chicken', 'chicken', NULL, NULL, 0, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06'),
(16, 'Promotion', 'promotion', NULL, NULL, 0, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06'),
(17, 'Combo', 'combo', NULL, NULL, 1, 1, '2017-07-02 16:18:46', '2017-07-02 16:42:06');
-- --------------------------------------------------------
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `update_at`) VALUES
(1, 'Chương Trình Khuyến Mãi', 'chuong-trinh-khuyen-mai', NULL, NULL, 1, 1, NULL, NULL),
(2, 'Tin tức', 'tin-tuc', NULL, NULL, 1, 1,NULL,NULL);


-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `order`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `update_at`) VALUES
(1, 1, 6, 127, NULL,'2020-09-07 15:39:21', '2020-09-28 08:18:43');

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `pay` int(11)	DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `pay`, `hot`, `created_at`, `update_at`) VALUES
(5, 'Hawaii Burger', 'hawaii-burger', 60000, 0, 'hawaii_burger_1_2.jpg', 8 , 'Thành phần bao gồm : Bánh Mì , Salad , Phô Mai ăn kèm với khoai tây chiên và một số nguyên liệu khác .',20, 0, 0, 0,0, NULL,NULL),
(6, 'Mozzarella Burger', 'mozzarella-burger', 60000, 0, 'mozzarella-burger_5.jpg', 8 , 'Thành Phần Bao Gồm : Bánh Mì , Salad , Thịt Cỡ Bự và một số nguyên liệu khác .',20, 0, 0, 0,0, NULL,NULL),
(7, 'Super Jumbo Burger', 'super-jumbo-burger', 60000, 0, 'jumbo-chicken-burger_4.jpg', 8 , 'Thành Phần Bao Gồm : Gà Chiên Giòn , Salad , Bánh Mì và một số nguyên liệu khác .',20, 0, 0, 0,0, NULL,NULL),
(8, 'Big Star Burger', 'big-star-burger', 56000, 0, 'burger_bigstar_4.png', 8 , 'Thành Phần Bao Gồm : Bánh Mì , Salad , Thịt các loại và một số nguyên liệu khác .',20, 0, 0, 0,0, NULL,NULL),
(9, 'Big Star Burger Combo', 'big-star-burger-combo', 86000, 0, 'combo_big-star_4.png', 17 , 'Burger Big Star ăn kèm khoai tây chiên và nước ngọt các loại .',20, 0, 0, 0,0, NULL,NULL),
(10, 'Combo Burger Tôm', 'combo-burger-tom', 77000, 0, 'combo_shrimp_4.png', 17 , 'Burger Shrimp ăn kèm khoai tây chiên và nước ngọt các loại .',20, 0, 0, 0,0, NULL,NULL),
(11, 'Bulgogi Burger Combo', 'bulgogi-burger-combo', 74000, 0, 'combo_bulgogi_4.png', 17 , 'Burger Bulgogi ăn kèm khoai tây chiên và nước ngọt các loại .',20, 0, 0, 0,0, NULL,NULL),
(12, 'Set Gà Thượng Hạng', 'set-ga-thuong-hang', 74000, 0, 'combo_premium-chicken_4.png', 17, 'Burger gà thượng hạng kèm khoai tây chiên và nước ngọt (tự chọn) .',20, 0, 0, 0,0, NULL,NULL),
(13, 'Nước Cam', 'nuoc-cam', 28000, 0, 'orangejuice_4.png', 12 , 'Nước cam thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(14, '7 Up Cherry', '7-up-cherry', 25000, 0, '7_up_cherry.jpg', 12 , 'Nước Soda cherry thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(15, '7 Up Rose', '7-up-rose', 25000, 0, '7_up_rose.jpg', 12 , 'Nước Soda Atiso thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(16, 'Milo', 'milo', 25000, 0, 'milo.png', 12 , 'Milo thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(17, 'Cơm Gà Góc Tư (Grilled Chicken Quater Leg Rice)', 'com-ga-goc-tu-grilled-chicken-quater-leg-rice', 58000, 0, 'c_m_g_n_ng_g_c_t_.png', 10 , 'Cơm gà thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(18, 'Cơm Gà Hoàng Gia (Royal Chicken Rice)', 'com-ga-hoang-gia-royal-chicken-rice', 45000, 0, 'com-gahoanggia-rice22222.jpg', 10 , 'Cơm gà hoàng gia thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(19, 'Cơm Gà Nướng (Grilled Chicken Rice)', 'com-ga-nuong-grilled-chicken-rice', 45000, 0, 'c_m_g_n_ng.png', 10 , 'Cơm gà nướng thơm ngon .',20, 0, 0, 0,0, NULL,NULL),
(20, 'Cơm Gà Sốt Đậu (Soybean Chicken Rice)', 'com-ga-sot-dau-soybean-chicken-rice', 45000, 0, 'soybeanchickenrice_4.png', 10 , 'Gà và đậu .',20, 0, 0, 0,0, NULL,NULL);





CREATE TABLE `car_parts`(
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `thunbar` varchar(100) DEFAULT NULL,
  `parts_id` int(11) DEFAULT NULL,
  `content` text,
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



  INSERT INTO `car_parts` (`id`, `name`, `slug`, `thunbar`, `parts_id`, `content`, `head`, `view`, `created_at`, `update_at`) VALUES
(4, 'MUA COMBO, NHẬN DORAEMON', 'mua-combo-nhan-doraemon', 'doraemon_-_fb_post.png', 1 , 'Các "fan cứng" của nhân vật mèo ú Doraemon thì chắc chắn không thể bỏ qua khuyến mãi này của Lotteria được rồi. 
 
Chỉ cần mua 1 combo 169K là bạn sẽ được ôm trong tay 1 chú Doraemon siêu yêu luôn. Có 2 combo để bạn lựa chọn:
 
- COMBO 1: 2 Gà rán, Burger bulgogi, Khoai tây lắc, 2 Pepsi (M)
- COMBO 2: Burger hawaii, Gà rán, Mì ý, Khoai tây chiên (M), 2 Pepsi (M)
 
Chương trình sẽ bắt đầu từ ngày 5/12 tại các cửa hàng Lotteria chính thức nha. Nhanh nhanh đến ngay vì số lượng có hạn, bạn nha.

Thời gian áp dụng: 05 ~ 31.12.2020.', 0, 0, '2020-12-30 14:57:54','2020-12-30 14:57:54'),
(5, 'TỨ VỊ GÀ, ĂN QUÁ ĐÃ', 'tu-vi-ga-an-qua-da', 'gatuvi_-_fb_post.png', 1 , 'Vậy là mong ước bao lâu nay của các "người chơi hệ gà tứ vị" đã thành hiện thực rồi đây. Combo gà tứ vị đã quay lại với chúng ta. Một combo tứ vị tụ hôi nào gà HS thơm cay, gà phô mai béo béo, gà sốt đậu đậm đà và gà sốt kim sa lấp la lấp lánh. tất cả cùng tụ hội trong combo mới này với giá chỉ 129000 thôi nha.


Combo gà tứ vị gồm 4 miếng gà: Gà sốt H&S, Gà sốt đậu, Gà sốt phô mai, Gà sốt kim sa và 2 Pepsi (M)

Đặc biệt là combo lần này các bạn còn thể lựa chọn loại sốt mà mình yêu thích nữa.
Thời gian áp dụng: 05 ~ 31.12.2020', 0, 0, '2020-12-30 14:57:54','2020-12-30 14:57:54'),
(6, 'ĐẠI TIỆC SẮC MÀU', 'dai-tiec-sac-mau', 'daitiecsacmau-fb_post.png', 1 , 'Khởi đầu tháng mới với thật nhiều hy vọng, Lotteria mong muốn mang đến cuộc sống thật nhiều sắc màu tươi sáng và lạc quan, với khuyến mãi mới gồm 3 combo Đại Tiệc Sắc Màu mới hấp dẫn và đa dạng, vừa tiết kiệm chi phí, vừa thôm ngon hấp dẫn.

- Combo 86.000: Bulgogi burger, Gà rán, Khoai tây lắc, Pepsi (M);

- Combo 135.000: Gà sốt HS, Gà sốt Phô mai, Khoai tây lắc, Tornado dâu, Tornado hạt điều, 2 Pepsi (M);

- Combo 135.000: Burger tôm, Burger Teriyaki, Gà rán, Khoai tây chiên (M), 2 Nestea.

-----

Thời gian áp dụng: 31/7 ~ 31/8/2020

Khách hàng có thể đổi Gà có sốt ==> gà không sốt.', 0, 0, '2020-12-30 14:57:54','2020-12-30 14:57:54'),
(7, 'MÓN MỚI GIÁ HỜI - ĂN NGON ĐÃ ĐỜI', 'mon-moi-gia-hoi---an-ngon-da-doi', 'monmoigiahoi_-_fb_cover.png', 1 , 'Khuyến mãi mới đi kèm với món mới nóng hổi tại Lotteria: gà xiên que và mì Ý sốt kem gà viên. 

Gà xiên que và Mì Ý sốt kem gà viên được làm từ thịt gà tươi ngon, tẩm ướp kỹ càng bằng nước sốt đặc trưng của Lotteria, mang đến cảm giác thơm ngon lạ miệng.

Lotteria ưu đãi nhân dịp ra mắt 2 sản phẩm mới:

- Mua 1 gà xiên que: tặng 1 Pepsi (M) - Giá chỉ 30.000

- Mua Mì Ý sốt kem gà viên: tặng 1 Pepsi (M) - Giá chỉ 45.000

- Mua Mì Ý thịt bò: tặng 1 ly Pepsi (M) - Giá chỉ 39.000

---------

Thời gian áp dụng: 31/7 ~ 31/8/2020.', 0, 0, '2020-12-30 14:57:54','2020-12-30 14:57:54'),
(8, 'TƯNG BỪNG KHAI TRƯƠNG CỬA HÀNG LOTTERIA E-BEST', 'tung-bung-khai-truong-cua-hang-lotteria-e-best', 'e-best2.jpg', 2 , 'Tiếp nối những tin vui khai trương của tháng cuối năm, Lotteria lại tiếp tục mang đến niềm vui cho các khách hàng với sự quay lại và "lợi hại hơn xưa" của cửa hàng Lotteria E-best.
Mừng ngày khai trương, Lotteria E-best đã dành nhiều ưu đãi hấp dẫn cho quý khách hàng đến chung vui cùng cửa hàng, các bạn nhớ ghé qua nha.
Lotteria hy vọng rằng người bạn E-best sẽ ngày càng được các bạn yêu mến và ủng hộ, là lựa chọn ăn uống lý tưởng cho những người bạn yêu quý của Lotteria.
---------------------
Địa chỉ cửa hàng: Tầng 1 ViettelPost, quốc lộ 32, P.Minh Khai, Q Bắc Từ Liêm, Hà Nội
Ngày khai trương: 18/12/2020
 
Lotteria chân thành cảm ơn sự ủng hộ của các bạn!', 0, 0, '2020-12-30 14:57:54','2020-12-30 14:57:54');


-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_parts`
--
ALTER TABLE `car_parts`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;