-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 08:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_25_094522_create_tbl_admin_table', 1),
(2, '2020_04_26_081308_create_tbl_category_table', 2),
(3, '2020_04_26_153331_create_tbl_brand_table', 3),
(4, '2020_04_26_164956_create_tbl_products_table', 4),
(5, '2020_04_27_090506_create_tbl_slider_table', 5),
(6, '2020_04_28_112429_create_tbl_customer_table', 6),
(7, '2020_04_28_120748_create_tbl_shipping_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '016000000', '2020-04-16 09:49:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'ACNE', 'ACNE', 0, NULL, NULL),
(2, 'ACNE', 'ACNE', 1, NULL, NULL),
(3, '1111', '111111', 0, NULL, NULL),
(5, 'Apex', 'this is apex brand', 1, NULL, NULL),
(6, 'Bata', 'Bata', 1, NULL, NULL),
(7, 'Lotto', 'Lotto', 1, NULL, NULL),
(8, 'Baby Shop', 'Baby Shop', 1, NULL, NULL),
(9, 'Aarong', 'Aarong', 1, NULL, NULL),
(10, 'Top Ten', 'Top Ten', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'This Is A Man Category', 1, NULL, NULL),
(2, 'Women', 'This Is A Women Category.', 1, '2020-04-26 08:48:58', NULL),
(5, 'Electronic', 'This Is Electronic', 1, '2020-04-26 09:03:03', NULL),
(8, 'Kids', 'This Is For Kids', 1, '2020-04-26 15:12:47', NULL),
(9, 'FASHION', 'This Is For FASHION', 1, '2020-04-26 15:13:15', NULL),
(10, 'HOUSEHOLDS', 'HOUSEHOLDS', 0, '2020-04-26 15:13:33', NULL),
(11, 'INTERIORS', 'INTERIORS', 1, '2020-04-26 15:13:50', NULL),
(12, 'CLOTHING', 'CLOTHING', 1, '2020-04-26 15:13:55', NULL),
(13, 'BAGS', 'BAGS', 1, '2020-04-26 15:14:05', NULL),
(14, 'SHOES', 'SHOES', 1, '2020-04-26 15:14:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `cutomer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cutomer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cutomer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `cutomer_name`, `cutomer_phone`, `cutomer_email`, `customer_password`, `created_at`, `updated_at`) VALUES
(1, 'Test', '1111', 'test@gmail.com', '1', NULL, NULL),
(2, 'AbiR', '111', 'ABIR@GMAIL.COM', '1', NULL, NULL),
(3, 'adsd', '3434', '213!@sfaf', '34', NULL, NULL),
(4, 'Test', '123456', 'test11@gmail.com', '112', NULL, NULL),
(7, 'Test', '012222', 'test1234@gmail.com', '1', NULL, NULL),
(8, 'Mansura', '1234567', 'manusra@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Product One', 'This Is Short Desc', 'This Is Long Desc', 2000.00, 'product_images/0CiS5218a0u1myVyG5sA.webp', '12', '2222222', 0, NULL, NULL),
(2, 2, 5, 'Test', 'asd', 'sad', 23.00, 'product_images/XWoYCs43iBWrqk2yqMI1.png', 'sad', 'asdasd', 0, NULL, NULL),
(3, 14, 5, 'DR. MAUCH Women\'s Sandal', 'Reflex zone insoles, because well-being starts with the feet', 'Reflex zone insoles, because well-being starts with the feet', 2290.00, 'product_images/DoBJSrLfKtPhIXt22KJU.jpeg', '36', 'Yellow', 1, NULL, NULL),
(4, 14, 5, 'Moochie', 'MOOCHIE Women\'s Pearl Work Jutti', 'MOOCHIE Women\'s Pearl Work Jutti', 3190.00, 'product_images/qiT0To3SdVxR0Xx53TJL.jpeg', '39', 'Black', 0, NULL, NULL),
(5, 1, 9, 'White Printed Slim Fit Cotton Panjabi', 'White Printed Slim Fit Cotton Panjabi', 'White Printed Slim Fit Cotton Panjabi', 1102.00, 'product_images/qerEoJGF2a5dy3ZzrbAH.jpg', '40', 'White', 0, NULL, NULL),
(6, 1, 9, 'White Printed Slim Fit Cotton Panjabi', 'White Printed Slim Fit Cotton Panjabi', 'White Printed Slim Fit Cotton Panjabi', 1102.00, 'product_images/qCjvblo0pLqvORaAttne.jpg', '40', 'White', 1, NULL, NULL),
(7, 1, 9, 'Red Printed Viscose-Cotton Slim Fit Panjabi', 'Red Printed Viscose-Cotton Slim Fit Panjabi', 'Red Printed Viscose-Cotton Slim Fit Panjabi', 1102.00, 'product_images/iaJ5ZDtobJ4jKNJbxRiF.jpg', '45', 'Red', 0, NULL, NULL),
(8, 8, 9, 'Yellow Printed and Hand Painted Linen', 'Yellow Printed and Hand Painted Linen', 'Yellow Printed and Hand Painted Linen Shalwar Kameez Set', 1400.00, 'product_images/Lw4f63g9Rmse4YoowgzL.jpg', '2 to 3 year', 'Yellow', 0, NULL, NULL),
(9, 8, 8, 'Shalwar Kameez Set', 'Yellow printed and Embroidered Linen', 'Yellow printed and Embroidered Linen Shalwar Kameez Set', 1441.00, 'product_images/fvJrVo1hCar0DoA6wS3B.jpg', '3 to 5 year', 'Yellow', 1, NULL, NULL),
(10, 8, 8, 'Orange Printed Linen Shalwar Kameez Set', 'Shalwar Kameez Set', 'Orange Printed Linen Shalwar Kameez Set', 2000.00, 'product_images/V2IRrpGqtCW1S5sXnvsz.jpg', '4 to 5 year', 'Red', 0, NULL, NULL),
(11, 8, 9, 'Aqua Printed Cotton T-Shirt', 'Aqua Printed Cotton T-Shirt', 'Aqua Printed Cotton T-Shirt', 3000.00, 'product_images/zXadk1rtu4fnnf0jxAa6.jpg', '3 to 5 year', 'Light blue', 0, NULL, NULL),
(12, 8, 9, 'Turquoise Printed Cotton Shirt Pant Set', 'Turquoise Printed Cotton Shirt Pant Set', 'Turquoise Printed Cotton Shirt Pant Set', 3000.00, 'product_images/MOyEQ18Gzo6UZlVgFopz.jpg', '3 to 5 year', 'White', 1, NULL, NULL),
(13, 8, 8, 'Red Printed Cotton Fatua', 'Red Printed Cotton Fatua', 'Red Printed Cotton Fatua', 3000.00, 'product_images/EbbAkxTMpZnxyugDBMra.jpg', '4 to 7 year', 'Red', 0, NULL, NULL),
(14, 8, 8, 'Mint Green Printed Cotton', 'Shirt Pant Set', 'Mint Green Printed Cotton Shirt Pant Set', 4500.00, 'product_images/EYXXxnknzhkqYKkovUAs.jpg', '4 to 6 year', 'Yellow', 1, NULL, NULL),
(15, 2, 9, 'Cotton Saree', 'White Printed and Painted', 'White Printed and Painted Cotton Saree', 6000.00, 'product_images/TydjTbqHZZsB4mzYxt40.jpg', '40', 'White', 1, NULL, NULL),
(16, 2, 9, 'Printed Cotton Saree', 'White Tie-Dyed and Printed', 'White Tie-Dyed and Printed Cotton Saree', 4000.00, 'product_images/UraJaL6R15xkXsWgY3zX.jpg', '39', 'Red', 0, NULL, NULL),
(17, 2, 9, 'Shalwar Kameez Set', 'Red Printed and Embroidered Viscose-Cotton', 'Red Printed and Embroidered Viscose-Cotton Shalwar Kameez Set', 3600.00, 'product_images/72bHenqCwbrfpWUlIkJG.jpg', '36', 'Red', 1, NULL, NULL),
(18, 2, 9, 'Light Turquoise Printed and Embroidered', 'Hand Loomed  Cotton Shalwar Kameez Set', 'Light Turquoise Printed and Embroidered Hand Loomed  Cotton Shalwar Kameez Set', 6800.00, 'product_images/yOJu8urNiGJ6jVYVnHZq.jpg', '41', 'Red', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_MobileNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_Email`, `shipping_FirstName`, `shipping_LastName`, `shipping_Address`, `shipping_MobileNumber`, `shipping_City`, `created_at`, `updated_at`) VALUES
(1, 'abir@gmail.com', 'Dhali', 'Abir', '282 south paik para', '22222222', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(4, 'slider/Hwnopy3xpU_slider.png', '1', NULL, NULL),
(5, 'slider/UqEb8tny5F_slider.jpg', '1', NULL, NULL),
(6, 'slider/fp6xXRpKH6_slider.png', '2', NULL, NULL),
(7, 'slider/uo6B1RSpsF_slider.jpg', '2', NULL, NULL),
(8, 'slider/BMmhEDB10w_slider.jpg', '1', NULL, NULL),
(9, 'slider/hV833KS3QS_slider.jpg', '0', NULL, NULL),
(10, 'slider/cR3H3GLq34_slider.jpg', '0', NULL, NULL),
(11, 'slider/OZQAVw9JeP_slider.jpg', '1', NULL, NULL),
(12, 'slider/t4Xmqv7szJ_slider.jpg', '0', NULL, NULL),
(13, 'slider/JOzUvOPQPX_slider.jpg', '0', NULL, NULL),
(14, 'slider/EbUnbTttRT_slider.jpg', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
