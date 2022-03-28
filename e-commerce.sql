-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 03:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building` varchar(10) NOT NULL,
  `floor` varchar(5) NOT NULL,
  `flat` varchar(5) NOT NULL,
  `type` varchar(100) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 not included 1 included',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '0 is not available 1 exsts',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Acne', 'اسنى', 'default.jpg', 1, '2021-07-29 21:55:02', '2021-07-29 21:55:02'),
(2, 'Grüne Erde', '', 'default.jpg', 1, '2021-07-29 21:55:02', '2021-07-30 07:38:52'),
(4, 'Ronhill', NULL, 'default.jpg', 1, '2021-07-30 07:38:32', '2021-07-30 07:38:32'),
(5, 'Albiro', NULL, 'default.jpg', 1, '2021-07-30 07:38:32', '2021-07-30 07:38:32'),
(6, 'Oddmolly', NULL, 'default.jpg', 1, '2021-07-30 07:39:27', '2021-07-30 07:39:27'),
(7, 'Rösch creative culture', NULL, 'default.jpg', 1, '2021-07-30 07:39:27', '2021-07-30 07:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) VALUES
(94, 11, 3),
(94, 12, 1),
(94, 14, 5),
(95, 12, 1),
(96, 1, 2),
(96, 2, 1),
(96, 4, 2),
(96, 8, 2),
(96, 14, 1),
(97, 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 0 COMMENT '0 is not active 1 activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sportswear', 'ملابس رياضيه', 'default.jpg', 0, '2021-07-29 18:55:03', '2021-07-29 18:55:03'),
(2, 'men', 'رجالى', 'default.jpg', 0, '2021-07-29 18:55:40', '2021-07-29 18:55:40'),
(3, 'woman', 'سيدات', 'default.jpg', 0, '2021-07-29 18:57:29', '2021-07-29 18:57:29'),
(4, 'kids', 'اطفالى', 'default.jpg', 0, '2021-07-29 18:57:54', '2021-07-29 18:57:54'),
(5, 'shoes', 'احذيه', 'default.jpg', 0, '2021-07-29 21:47:35', '2021-07-29 21:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 not active , 1 is active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copouns`
--

CREATE TABLE `copouns` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(10) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `minimum_Price` int(5) NOT NULL,
  `maxDIscountValue` int(5) NOT NULL,
  `usageCount` tinyint(1) NOT NULL,
  `userUsageCount` int(1) NOT NULL,
  `start_Date` timestamp NULL DEFAULT NULL,
  `end_Date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copouns_products`
--

CREATE TABLE `copouns_products` (
  `copoun_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `copouns_users`
--

CREATE TABLE `copouns_users` (
  `copoun_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(200) NOT NULL,
  `discount` int(10) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 still available , 1 not avaliable',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 not paid , 1 is paid',
  `delivered_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `copoun_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `delivered_at`, `created_at`, `updated_at`, `user_id`, `address_id`, `copoun_id`) VALUES
(1, '123456', 0, '2021-07-31 08:31:30', '2021-07-31 08:31:30', '2021-07-31 08:31:30', 96, NULL, NULL),
(2, 'A23654', 0, '2021-07-31 08:31:30', '2021-07-31 08:31:30', '2021-07-31 08:31:30', 95, NULL, NULL),
(3, 'b4785', 0, '2021-07-31 08:32:32', '2021-07-31 08:32:32', '2021-07-31 08:32:32', 94, NULL, NULL),
(4, 'xc2563', 0, '2021-07-31 08:33:01', '2021-07-31 08:33:01', '2021-07-31 08:33:01', 96, NULL, NULL),
(5, 'ju5620', 0, '2021-07-31 08:38:11', '2021-07-31 08:38:11', '2021-07-31 08:38:11', 95, NULL, NULL),
(6, 'er4558', 0, '2021-07-31 08:38:11', '2021-07-31 08:38:11', '2021-07-31 08:38:11', 94, NULL, NULL),
(7, 'we8542', 0, '2021-07-31 08:38:11', '2021-07-31 08:38:11', '2021-07-31 08:38:11', 96, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT 0,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 2, 2, NULL),
(2, 7, 2, NULL),
(3, 5, 2, NULL),
(4, 1, 1, NULL),
(4, 2, 1, NULL),
(4, 4, 4, NULL),
(6, 2, 3, NULL),
(6, 3, 1, NULL),
(6, 4, 5, NULL),
(8, 1, 3, NULL),
(13, 6, 2, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productbrands`
-- (See below for the actual view)
--
CREATE TABLE `productbrands` (
`id` int(10) unsigned
,`brand_id` int(10) unsigned
,`subcategory_id` int(10) unsigned
,`name_en` varchar(255)
,`name_ar` varchar(255)
,`cond` enum('new','ordinary')
,`price` decimal(10,0)
,`amount` int(5)
,`code` varchar(10)
,`image` varchar(100)
,`status` tinyint(1)
,`details_en` varchar(100)
,`details_ar` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
,`brand_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `cond` enum('new','ordinary') NOT NULL DEFAULT 'new',
  `price` decimal(10,0) NOT NULL,
  `amount` int(5) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `view` int(10) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT 'deafult.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '''0'' not available, ''1'' exists',
  `details_en` varchar(100) DEFAULT NULL,
  `details_ar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `subcategory_id`, `name_en`, `name_ar`, `cond`, `price`, `amount`, `code`, `view`, `image`, `status`, `details_en`, `details_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Easy edition', '   ', 'ordinary', '265', 6, NULL, 10, 'product7.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:43:07', '2021-08-01 00:04:59'),
(2, 5, 7, 'Easy edition', '', 'new', '300', 2, NULL, 3, 'product12.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:43:07', '2021-07-31 23:08:51'),
(3, 6, 12, 'Easy edition', '', 'new', '125', 2, NULL, 19, 'product9.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-08-01 11:48:18'),
(4, 6, 9, 'Easy Edition', '', 'new', '500', 9, NULL, 2, 'product11.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-07-31 22:54:09'),
(5, 2, 1, 'Easy Edition', '', 'new', '458', 4, NULL, 3, 'product10.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-07-31 23:23:03'),
(6, 7, 12, 'Easy Edition', '', 'new', '1000', 5, NULL, 13, 'product9.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-07-31 22:53:20'),
(7, 4, 5, 'Easy Edition', '', 'new', '695', 2, NULL, 3, 'product7.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-07-31 22:52:18'),
(8, 2, 6, 'Easy Edition', '', 'new', '2000', 6, NULL, 2, 'product8.jpg', 0, 'Anne Klein Sleeveless Colorblock Scuba', NULL, '2021-07-30 07:53:12', '2021-07-31 19:45:33'),
(10, 4, 6, 'something', '', 'new', '239', 8, NULL, 18, 'product9.jpg', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lor', NULL, '2021-07-30 18:29:03', '2021-08-01 08:37:17'),
(11, 5, 3, 'Neue', '', 'new', '2365', 2, NULL, 5, 'product11.jpg', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting ', NULL, '2021-07-30 18:42:23', '2021-08-01 00:05:27'),
(12, 7, 1, 'Hose', '', 'ordinary', '258', 3, NULL, 13, 'product12.jpg', 0, 'lorem lorem loremm', NULL, '2021-07-31 07:17:22', '2021-08-01 11:48:37'),
(13, 1, 12, 'Jacke', '', 'new', '256', 5, NULL, 16, 'product9.jpg', 0, 'lorem lorem lorem', NULL, '2021-07-31 07:19:14', '2021-08-01 07:13:32'),
(14, 1, 4, 'Lc', '', 'new', '1500', 3, NULL, 9, 'product10.jpg', 0, 'lorem lorem lorem', NULL, '2021-07-31 07:19:14', '2021-07-31 23:48:20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `productscount`
-- (See below for the actual view)
--
CREATE TABLE `productscount` (
`brand_id` int(10) unsigned
,`brand_name` varchar(50)
,`product_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productsperbrand`
-- (See below for the actual view)
--
CREATE TABLE `productsperbrand` (
`product_count` bigint(21)
,`name_en` varchar(50)
,`id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productspersubcategory`
-- (See below for the actual view)
--
CREATE TABLE `productspersubcategory` (
`name_en` varchar(255)
,`id` int(10) unsigned
,`price` decimal(10,0)
,`image` varchar(100)
,`subcategory_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productsreview`
-- (See below for the actual view)
--
CREATE TABLE `productsreview` (
`review_number` bigint(21)
,`product_name` varchar(255)
,`product_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  `radius` float NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 is inactive , 1 is active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `city_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `value` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `title`, `comment`, `value`, `created_at`, `updated_at`) VALUES
(94, 1, '', 'average', 2, '2021-07-31 19:44:37', '2021-07-31 19:44:37'),
(94, 2, 'titleLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, 3, '2021-07-30 19:26:20', '2021-07-30 19:26:20'),
(94, 3, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(94, 4, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(94, 5, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 3, '2021-07-30 15:33:43', '2021-07-30 15:33:43'),
(94, 6, '', 'this product ist sehr gut', 3, '2021-07-31 19:11:02', '2021-07-31 19:11:02'),
(94, 10, '', 'not bad', 3, '2021-07-31 19:15:12', '2021-07-31 19:15:12'),
(94, 11, 'anything', 'lorem lorem lorem', 5, '2021-07-30 20:01:33', '2021-07-30 20:01:33'),
(94, 12, '', 'good', 4, '2021-08-01 09:56:03', '2021-08-01 09:56:03'),
(94, 14, '', 'bad', 1, '2021-07-31 19:43:06', '2021-07-31 19:43:06'),
(95, 1, '', 'hi there', 2, '2021-07-31 20:34:35', '2021-07-31 20:34:35'),
(95, 3, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 4, '2021-07-30 15:33:43', '2021-07-30 15:33:43'),
(95, 6, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(95, 8, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(95, 10, '', 'very good', 5, '2021-07-31 19:14:44', '2021-07-31 19:14:44'),
(95, 11, 'any', 'lorem lorem lorem', 5, '2021-07-31 07:55:09', '2021-07-31 07:55:09'),
(96, 1, '', 'very good', 5, '2021-07-31 19:45:01', '2021-07-31 19:45:01'),
(96, 2, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(96, 3, 'top', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 3, '2021-07-30 19:27:14', '2021-07-30 19:27:14'),
(96, 6, 'something', 'lorem lorem lorem', 5, '2021-07-31 07:56:26', '2021-07-31 07:56:26'),
(96, 7, 'lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5, '2021-07-30 15:36:28', '2021-07-30 15:36:28'),
(96, 11, 'comment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 5, '2021-07-30 19:26:00', '2021-07-30 19:26:00'),
(97, 3, '', 'Very efficient', 3, '2021-07-31 19:20:21', '2021-07-31 19:20:21'),
(97, 8, '', 'interested', 3, '2021-07-31 19:45:33', '2021-07-31 19:45:33'),
(97, 14, '', 'bad', 1, '2021-07-31 19:43:20', '2021-07-31 19:43:20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reviewsdata`
-- (See below for the actual view)
--
CREATE TABLE `reviewsdata` (
`comment` varchar(255)
,`value` tinyint(1)
,`created_at` timestamp
,`name_en` varchar(255)
,`image` varchar(100)
,`product_id` int(10) unsigned
,`price` decimal(10,0)
,`username` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `subcatogries`
--

CREATE TABLE `subcatogries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 is not available , 1 exists',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcatogries`
--

INSERT INTO `subcatogries` (`id`, `name_en`, `name_ar`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'نيك', 'default.jpg', 0, 1, '2021-07-29 21:15:20', '2021-07-30 07:31:00'),
(2, 'Under Armour ', 'اندر ارمر', 'default.jpg', 0, 1, '2021-07-29 21:15:20', '2021-07-30 07:31:40'),
(3, 'Adidas', 'اديدس', 'default.jpg', 0, 1, '2021-07-29 21:16:13', '2021-07-30 07:32:08'),
(4, 'Puma', '', 'default.jpg', 0, 1, '2021-07-29 21:16:13', '2021-07-30 07:33:11'),
(5, 'Fendi', '', 'default.jpg', 0, 2, '2021-07-29 21:16:40', '2021-07-30 07:33:40'),
(6, 'Guess', '', 'default.jpg', 0, 2, '2021-07-29 21:16:40', '2021-07-30 07:34:20'),
(7, 'Valentino', NULL, 'default.jpg', 0, 2, '2021-07-30 07:36:26', '2021-07-30 07:36:26'),
(8, 'Dolce and Gabbana', NULL, 'default.jpg', 0, 2, '2021-07-30 07:36:26', '2021-07-30 07:36:26'),
(9, 'Versace', NULL, 'default.jpg', 0, 2, '2021-07-30 07:36:26', '2021-07-30 07:36:26'),
(10, 'Guess', NULL, 'default.jpg', 0, 3, '2021-07-30 07:36:26', '2021-07-30 07:36:26'),
(11, 'Versace', NULL, 'default.jpg', 0, 3, '2021-07-30 07:36:57', '2021-07-30 07:36:57'),
(12, 'Dior', NULL, 'default.jpg', 0, 3, '2021-07-30 07:36:57', '2021-07-30 07:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `code` int(5) DEFAULT NULL,
  `userType` tinyint(1) DEFAULT 0 COMMENT '0 client , 1 admin , 2 supplier',
  `status` tinyint(1) DEFAULT 0 COMMENT '0 not verified 1 active 2 banned',
  `image` varchar(255) DEFAULT 'img.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `gender`, `code`, `userType`, `status`, `image`, `created_at`, `updated_at`) VALUES
(94, 'shaimaa kamal', 'shaimaakamal36@gmail.com', '01020414320', '7114cc6ff8eca0db5abcb43e634c990fff7ee72d', 'f', 46463, 0, 1, '1627818129-user-id-94.jpg', '2021-07-29 18:16:00', '2021-08-01 11:42:09'),
(95, 'hossam soliman', 'hossamsoliman@gmail.com', '0125687426', '7114cc6ff8eca0db5abcb43e634c990fff7ee72d', 'm', 39201, 0, 1, 'img.png', '2021-07-30 15:30:48', '2021-07-30 15:31:10'),
(96, 'ahmed atta', 'ahmedatta@gmail.com', '01023654890', '7114cc6ff8eca0db5abcb43e634c990fff7ee72d', 'm', 45730, 0, 1, 'img.png', '2021-07-30 15:32:07', '2021-07-30 15:32:22'),
(97, 'arwa mahmoud', 'arwa@yahoo.com', '0123658942', '7114cc6ff8eca0db5abcb43e634c990fff7ee72d', 'f', 51970, 0, 1, 'img.png', '2021-07-31 19:19:44', '2021-07-31 19:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES
(94, 11),
(95, 13),
(96, 2),
(96, 4),
(96, 6),
(96, 12),
(96, 13),
(97, 2),
(97, 3),
(97, 4);

-- --------------------------------------------------------

--
-- Structure for view `productbrands`
--
DROP TABLE IF EXISTS `productbrands`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productbrands`  AS   (select `products`.`id` AS `id`,`products`.`brand_id` AS `brand_id`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`name_en` AS `name_en`,`products`.`name_ar` AS `name_ar`,`products`.`cond` AS `cond`,`products`.`price` AS `price`,`products`.`amount` AS `amount`,`products`.`code` AS `code`,`products`.`image` AS `image`,`products`.`status` AS `status`,`products`.`details_en` AS `details_en`,`products`.`details_ar` AS `details_ar`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`brands`.`name_en` AS `brand_name` from (`products` join `brands`) where `brands`.`id` = `products`.`brand_id`)  ;

-- --------------------------------------------------------

--
-- Structure for view `productscount`
--
DROP TABLE IF EXISTS `productscount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productscount`  AS   (select `brands`.`id` AS `brand_id`,`brands`.`name_en` AS `brand_name`,`productsperbrand`.`product_count` AS `product_count` from (`brands` join `productsperbrand`) where `brands`.`id` = `productsperbrand`.`id` group by `brands`.`name_en`)  ;

-- --------------------------------------------------------

--
-- Structure for view `productsperbrand`
--
DROP TABLE IF EXISTS `productsperbrand`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsperbrand`  AS   (select count(`products`.`id`) AS `product_count`,`brands`.`name_en` AS `name_en`,`brands`.`id` AS `id` from (`products` join `brands`) where `products`.`brand_id` = `brands`.`id` group by `brands`.`id`)  ;

-- --------------------------------------------------------

--
-- Structure for view `productspersubcategory`
--
DROP TABLE IF EXISTS `productspersubcategory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productspersubcategory`  AS   (select `products`.`name_en` AS `name_en`,`products`.`id` AS `id`,`products`.`price` AS `price`,`products`.`image` AS `image`,`subcatogries`.`id` AS `subcategory_id` from (`products` join `subcatogries`) where `products`.`subcategory_id` = `subcatogries`.`id`)  ;

-- --------------------------------------------------------

--
-- Structure for view `productsreview`
--
DROP TABLE IF EXISTS `productsreview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productsreview`  AS   (select count(`products`.`id`) AS `review_number`,`products`.`name_en` AS `product_name`,`products`.`id` AS `product_id` from (`products` join `reviews`) where `products`.`id` = `reviews`.`product_id` group by `products`.`id`)  ;

-- --------------------------------------------------------

--
-- Structure for view `reviewsdata`
--
DROP TABLE IF EXISTS `reviewsdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reviewsdata`  AS   (select `reviews`.`comment` AS `comment`,`reviews`.`value` AS `value`,`reviews`.`created_at` AS `created_at`,`products`.`name_en` AS `name_en`,`products`.`image` AS `image`,`products`.`id` AS `product_id`,`products`.`price` AS `price`,`users`.`name` AS `username` from ((`reviews` join `products`) join `users` on(`products`.`id` = `reviews`.`product_id` and `reviews`.`user_id` = `users`.`id`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_user_fk` (`user_id`),
  ADD KEY `address_region_fk` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`) USING BTREE,
  ADD KEY `cart_product_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copouns`
--
ALTER TABLE `copouns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `copouns_products`
--
ALTER TABLE `copouns_products`
  ADD PRIMARY KEY (`copoun_id`,`product_id`),
  ADD KEY `prod_fk` (`product_id`);

--
-- Indexes for table `copouns_users`
--
ALTER TABLE `copouns_users`
  ADD PRIMARY KEY (`copoun_id`,`user_id`),
  ADD KEY `us_fk` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_fk` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `produc_fk` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `order_user_fk` (`user_id`),
  ADD KEY `address_order_fk` (`address_id`),
  ADD KEY `copoun_order_fk` (`copoun_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_fk` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `brand_product_fk` (`brand_id`),
  ADD KEY `product_subcategory_id` (`subcategory_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_region_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `review_product_fk` (`product_id`) USING BTREE;

--
-- Indexes for table `subcatogries`
--
ALTER TABLE `subcatogries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_subcategory_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `wishlist_product_fk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copouns`
--
ALTER TABLE `copouns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcatogries`
--
ALTER TABLE `subcatogries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `address_region_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `address_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `copouns_products`
--
ALTER TABLE `copouns_products`
  ADD CONSTRAINT `copoun_fk` FOREIGN KEY (`copoun_id`) REFERENCES `copouns` (`id`),
  ADD CONSTRAINT `prod_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `copouns_users`
--
ALTER TABLE `copouns_users`
  ADD CONSTRAINT `cop_user_fk` FOREIGN KEY (`copoun_id`) REFERENCES `copouns` (`id`),
  ADD CONSTRAINT `us_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offer_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `produc_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `address_order_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `copoun_order_fk` FOREIGN KEY (`copoun_id`) REFERENCES `copouns` (`id`),
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand_product_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `product_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcatogries` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `city_region_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `review_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcatogries`
--
ALTER TABLE `subcatogries`
  ADD CONSTRAINT `category_subcategory_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
