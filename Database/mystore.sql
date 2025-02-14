-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 07:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(10, 'mahmud', 'mahmud@gmail.com', '$2y$10$VmAnMBt0m7vcQEP6lYCuEOaq0t0qDc5FRIVqh6g7GbZzNxcmZCKCW'),
(11, 'hasan', 'sshanto12344321@gmail.com', '$2y$10$fmJTMRm.vGQgz5W97BDrJeFAacXz74LDGuxpCxd6cRmwLNqmOej6e'),
(12, 'sara', 'sara@gmail.com', '$2y$10$NlaYrtYH3j1onbc.viOYuOvK1joSUfzpcIRZFWRxHP2Szu/s3v2Wm'),
(13, 'senlam', 'senlam@gmail.com', '$2y$10$YIirPlsuXrVTkv/R647W4.W080axpgEdweiIVNgO2HMKkLURdDulq');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `latitude`, `longitude`) VALUES
(1, 'Head Office', '23.81030000', '90.41250000'),
(2, 'Uttara Branch', '23.78060000', '90.34960000'),
(3, 'Mohammadpur Branch', '23.72710000', '90.39750000'),
(4, 'Gulshan Branch', '23.79300000', '90.40490000'),
(5, 'Dhanmondi Branch', '23.75940000', '90.37880000'),
(6, 'Mirpur Branch', '23.73400000', '90.39030000');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(11, 'Starcosmos'),
(12, 'Unilever'),
(13, 'Nestlé'),
(14, 'PepsiCo'),
(16, 'Pizza Hut'),
(17, 'Dairy Queen'),
(24, 'grambangla'),
(25, 'healthy Bites');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(11, 'Pizza'),
(12, 'Burgers'),
(14, 'Italian'),
(15, 'Thai'),
(16, 'Japanese'),
(17, 'Vegetarian/Vegan'),
(18, 'Desserts'),
(19, 'Fast Food'),
(21, 'salads'),
(22, 'fruttica'),
(23, 'Vegetables'),
(24, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_inputs`
--

CREATE TABLE `diet_plan_inputs` (
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` int(11) NOT NULL,
  `activity_level` int(11) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet_plan_inputs`
--

INSERT INTO `diet_plan_inputs` (`id`, `age`, `weight`, `height`, `activity_level`, `goal`, `created_at`) VALUES
(1, 25, '80.00', 175, 4, 'Loss', '2025-01-18 22:04:24'),
(2, 18, '80.00', 180, 5, 'Gain', '2025-01-18 22:04:24'),
(3, 18, '80.00', 180, 5, 'Loss', '2025-01-18 22:08:44'),
(4, 20, '20.00', 427, 1, 'Loss', '2025-01-18 22:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `taste` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `taste`, `price`, `availability`) VALUES
(1, 'Pasta', 8, '300.00', 1),
(2, 'Egg', 20, '12.00', 2),
(3, 'Burger', 7, '150.00', 0),
(4, 'Salad', 6, '120.00', 1),
(5, 'Mango', 6, '12.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_suggestions`
--

CREATE TABLE `food_suggestions` (
  `id` int(11) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `vitamins` int(11) NOT NULL,
  `minerals` int(11) NOT NULL,
  `suggested_dish` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `message`, `created_at`) VALUES
(11, 0, 'mahmud', 'mahmud@gmail.com', 'your website is not good enough', '2024-05-08 03:27:01'),
(12, 0, 'cosmic', 'cos@gmail.com', 'gd', '2024-05-08 06:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `offer_prices`
--

CREATE TABLE `offer_prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `offer_price` decimal(10,2) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_prices`
--

INSERT INTO `offer_prices` (`id`, `product_id`, `offer_price`, `offer_start_date`, `offer_end_date`, `created_at`, `updated_at`) VALUES
(12, 46, '170.00', '2025-01-11', '2025-01-14', '2025-01-10 19:39:39', '2025-01-10 19:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `delivered` varchar(1) DEFAULT NULL,
  `track_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_track`
--

INSERT INTO `order_track` (`id`, `invoice_number`, `delivered`, `track_date`) VALUES
(1, '369115472', 'D', '2024-04-30 11:33:31'),
(3, '420462036', 'D', '2024-05-01 00:42:53'),
(4, '	241688606', 'D', '2024-05-03 12:25:13'),
(5, '1912534344', 'D', '2024-05-07 20:23:58'),
(6, '238312710', 'D', '2024-05-08 03:23:22'),
(7, '	241688606', 'D', '2024-05-08 05:16:24'),
(8, '	241688606', 'D', '2024-05-08 06:08:54'),
(9, '1912534344', 'D', '2024-09-25 15:37:35'),
(10, '	241688606', NULL, '2024-12-04 17:16:51'),
(11, '	241688606', NULL, '2024-12-28 14:46:07'),
(12, '1912534344', NULL, '2025-01-05 08:30:07'),
(13, '	241688606', NULL, '2025-01-05 08:41:56'),
(14, '1912534344', NULL, '2025-01-05 09:06:56'),
(15, '1912534344', NULL, '2025-01-05 09:07:37'),
(16, '	241688606', NULL, '2025-01-23 14:24:49'),
(17, '	1615967072', NULL, '2025-01-25 17:58:30'),
(18, '	241688606', NULL, '2025-01-25 17:58:40'),
(19, '	241688606', NULL, '2025-01-25 17:58:44'),
(20, '	241688606', NULL, '2025-01-26 08:54:36'),
(21, '1912534344', NULL, '2025-01-26 08:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(46, 'Banana ', 'Calories: 89 kcal Carbohydrates: 22.8g (mostly natural sugars and fiber) Protein: 1.1g Fiber: 2.6g Vitamins: Rich in vitamin B6 and vitamin C Minerals: Contains potassium (358mg), magnesium, and manganese', 'Ban, Banana, banana, ban', 17, 11, 'ban.jpg', 'ban3.jpg', 'ban2.jpg', '200', '2024-12-28 18:22:06', 'true'),
(47, 'oats', 'Calories: 150 kcal per 100g Protein: 5g Fiber: 4g Vitamins: B vitamins Minerals: Manganese, phosphorus, and magnesium', 'oat, ot, oats, OAT, OATS', 15, 17, 'ot.jpg', 'ot2.jpg', 'ot3.jpg', '150', '2024-12-28 18:24:51', 'true'),
(48, 'Apple', 'Calories: 52 kcal Carbohydrates: 13.8 g Protein: 0.3 g Fat: 0.2 g Fiber: 2.4 g Vitamin C: 4.6 mg Vitamin A: 54 IU Potassium: 107 mg', 'apple, Apple, app, Aple', 24, 25, 'apple3.jpg', 'apple2.png', 'apple1.jpg', '350', '2024-12-30 05:49:34', 'true'),
(49, 'Orange', 'Calories: 47 kcal Carbohydrates: 11.8 g Protein: 0.9 g Fat: 0.1 g Fiber: 2.4 g Vitamin C: 53.2 mg Vitamin A: 225 IU Potassium: 181 mg', 'orange, Orange, org , Org', 24, 25, 'orange3.jpg', 'orange1.jpg', 'orange2.jpg', '240', '2024-12-30 06:17:34', 'true'),
(50, 'Mango', 'Calories: 60 kcal Carbohydrates: 14.98 g Protein: 0.8 g Fat: 0.4 g Fiber: 1.6 g Vitamin C: 36.4 mg Vitamin A: 1082 IU Potassium: 168 mg', 'mango,Mango, mang', 24, 25, 'mango3.jpg', 'mango2.jpg', 'mango1.jpg', '399', '2024-12-30 06:43:25', 'true'),
(51, 'Broccoli', 'Calories: 34 kcal Carbohydrates: 6.6 g Protein: 2.8 g Fat: 0.4 g Fiber: 2.6 g Vitamin A: 623 IU Vitamin C: 89.2 mg Potassium: 316 mg', 'broccoli, Broccoli, bro, Bro', 23, 24, 'bro1.jpg', 'bro2.jpg', 'bro3.jpg', '60', '2024-12-30 07:00:21', 'true'),
(52, ' Cauliflower', 'Calories: 25 kcal Carbohydrates: 4.97 g Protein: 1.9 g Fat: 0.3 g Fiber: 2 g Vitamin A: 0 IU Vitamin C: 48.2 mg Potassium: 299 mg', 'cauliflower, CAULIFLOWER, caul', 23, 24, 'flower1.jpg', 'flower3.jpg', 'flower2.jpg', '50', '2024-12-30 07:03:58', 'true'),
(53, 'Tomatoes', 'Calories: 18 kcal Carbohydrates: 3.9 g Protein: 0.9 g Fat: 0.2 g Fiber: 1.2 g Vitamin A: 833 IU Vitamin C: 13.7 mg Potassium: 237 mg', 'tomatoes, Tomatoes, TOMATTOS, tom', 23, 24, 'tom1.jpg', 'tom2.jpg', 'tom3.jpg', '120', '2024-12-30 07:13:24', 'true'),
(54, 'Carrots', 'Calories: 41 kcal Carbohydrates: 9.6 g Protein: 0.9 g Fat: 0.2 g Fiber: 2.8 g Vitamin A: 16706 IU Vitamin C: 5.9 mg Potassium: 320 mg', 'carrots, CARROTS, carrot', 23, 24, 'carrot1.jpg', 'carrot2.jpg', 'carrots3.jpg', '70', '2024-12-30 07:24:27', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_name`, `rating`, `review`, `created_at`) VALUES
(1, 'pizza', 3, 'goiiid ', '2024-04-30 10:23:31'),
(5, 'dim vaji', 4, 'grt for brkfast', '2024-05-01 00:44:39'),
(6, 'juice', 5, 'awesome one', '2024-05-08 03:24:57'),
(7, 'pizza', 4, 'gd one', '2024-05-08 05:17:12'),
(8, 'cock', 4, 'gd', '2024-05-08 06:10:35'),
(9, 'cat', 1, 'we are the best', '2025-01-25 17:59:36'),
(10, 'ciliflower', 5, 'this is good', '2025-01-26 08:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(59, 19, 50, 1157700802, 1, '2025-01-25 17:58:00', 'Complete'),
(60, 19, 60, 1082373122, 1, '2025-01-27 03:48:46', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(18, 59, 1157700802, 50, 'Rocket', '2025-01-25 17:58:00'),
(19, 60, 1082373122, 60, 'Nogod', '2025-01-27 03:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(19, 'shanto', 'shanto@gmail.com', '$2y$10$YFhh4cAubW0EmtxQwbtysemJtB9oz0R83ADBmkba/eyWXHkF64K0C', '436413630_2075339576171118_2200061964816111284_n.jpg', '::1', 'dhaka-1200', '09876543'),
(22, 'ABC', 'ABC@gmil.com', '$2y$10$5ef4.Qq7k8.sbk5QEGWVf.H6iWnkLfI2vJHM6BVgoX7LDNgiIoJD2', '436413630_2075339576171118_2200061964816111284_n - Copy.jpg', '::1', 'dhaka-1000', '0987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `diet_plan_inputs`
--
ALTER TABLE `diet_plan_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_suggestions`
--
ALTER TABLE `food_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `offer_prices`
--
ALTER TABLE `offer_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_useid` (`user_id`),
  ADD KEY `fk_productid` (`product_id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_userid` (`user_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `diet_plan_inputs`
--
ALTER TABLE `diet_plan_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_suggestions`
--
ALTER TABLE `food_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offer_prices`
--
ALTER TABLE `offer_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `offer_prices`
--
ALTER TABLE `offer_prices`
  ADD CONSTRAINT `offer_prices_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id2` FOREIGN KEY (`id`) REFERENCES `offer_prices` (`id`);

--
-- Constraints for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`order_id`),
  ADD CONSTRAINT `fk_productid` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `fk_useid` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
