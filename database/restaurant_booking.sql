-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2026 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Burgers', 'Delicious grilled and stacked burgers', 'category1.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(2, 'Pizzas', 'Hot, cheesy pizzas with fresh toppings', 'category2.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(3, 'Drinks', 'Cold and hot beverages', 'category9.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(4, 'Salads', 'Fresh salads made with crisp greens', 'category3.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(5, 'Sandwiches', 'Handheld sandwiches and wraps', 'category4.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(6, 'Pasta', 'Creamy and saucy pasta dishes', 'category5.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(7, 'Soups', 'Warm soups cooked to comfort', 'category6.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(8, 'Seafood', 'Fresh seafood plates and grills', 'category7.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(9, 'Desserts', 'Sweet desserts and pastries', 'category8.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(10, 'Snacks', 'Tasty quick bites and starters', 'category10.jpg', '2026-07-03 00:09:04', '2026-07-03 00:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` text DEFAULT NULL,
  `item_image` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `item_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_description`, `item_image`, `category_id`, `item_price`, `created_at`, `updated_at`) VALUES
(1, 'Classic Burger', 'Beef patty with lettuce<span style=\"font-size: 1rem;\">Chicken patty with lettuce</span><p><br>Description</p><table class=\"table table-bordered\" style=\"width: 744.725px;\"><tbody><tr><td>Name</td><td>Ingradiance</td></tr><tr><td>Patty</td><td>make it oil deep fry</td></tr><tr><td>Cheese</td><td>make by cow milk</td></tr></tbody></table><p><br></p><p><br></p>', 'classic_burger.jpg', 1, 5.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(2, 'Cheese Burger', 'Beef with cheese', 'cheese_burger.jpg', 1, 6.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(3, 'Margherita', 'Tomato, mozzarella', 'margherita.jpg', 2, 8.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(4, 'Pepperoni', 'Pepperoni & cheese', 'pepperoni.jpg', 2, 9.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(5, 'Coke', 'Chilled soft drink', 'coke.jpg', 3, 1.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(6, 'Orange Juice', 'Freshly squeezed', 'orange_juice.jpg', 3, 2.99, '2026-07-02 10:31:39', '2026-07-02 10:31:39'),
(7, 'Burgers Item 1', 'Cooked Burgers dish number 1', 'c1_i1.jpg', 1, 6.41, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(8, 'Burgers Item 2', 'Cooked Burgers dish number 2', 'c1_i2.jpg', 1, 13.01, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(9, 'Burgers Item 3', 'Cooked Burgers dish number 3', 'c1_i3.jpg', 1, 19.39, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(10, 'Burgers Item 4', 'Cooked Burgers dish number 4', 'c1_i4.jpg', 1, 11.59, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(11, 'Burgers Item 5', 'Cooked Burgers dish number 5', 'c1_i5.jpg', 1, 14.68, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(12, 'Burgers Item 6', 'Cooked Burgers dish number 6', 'c1_i6.jpg', 1, 11.89, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(13, 'Burgers Item 7', 'Cooked Burgers dish number 7', 'c1_i7.jpg', 1, 18.43, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(14, 'Burgers Item 8', 'Cooked Burgers dish number 8', 'c1_i8.jpg', 1, 14.92, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(15, 'Burgers Item 9', 'Cooked Burgers dish number 9', 'c1_i9.jpg', 1, 16.19, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(16, 'Burgers Item 10', 'Cooked Burgers dish number 10', 'c1_i10.jpg', 1, 5.56, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(17, 'Burgers Item 11', 'Cooked Burgers dish number 11', 'c1_i11.jpg', 1, 9.03, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(18, 'Burgers Item 12', 'Cooked Burgers dish number 12', 'c1_i12.jpg', 1, 10.78, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(19, 'Burgers Item 13', 'Cooked Burgers dish number 13', 'c1_i13.jpg', 1, 11.17, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(20, 'Burgers Item 14', 'Cooked Burgers dish number 14', 'c1_i14.jpg', 1, 3.24, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(21, 'Burgers Item 15', 'Cooked Burgers dish number 15', 'c1_i15.jpg', 1, 12.13, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(22, 'Burgers Item 16', 'Cooked Burgers dish number 16', 'c1_i16.jpg', 1, 5.48, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(23, 'Burgers Item 17', 'Cooked Burgers dish number 17', 'c1_i17.jpg', 1, 4.74, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(24, 'Burgers Item 18', 'Cooked Burgers dish number 18', 'c1_i18.jpg', 1, 10.37, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(25, 'Burgers Item 19', 'Cooked Burgers dish number 19', 'c1_i19.jpg', 1, 11.82, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(26, 'Burgers Item 20', 'Cooked Burgers dish number 20', 'c1_i20.jpg', 1, 2.84, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(27, 'Pizzas Item 1', 'Cooked Pizzas dish number 1', 'c2_i1.jpg', 2, 19.70, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(28, 'Pizzas Item 2', 'Cooked Pizzas dish number 2', 'c2_i2.jpg', 2, 16.24, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(29, 'Pizzas Item 3', 'Cooked Pizzas dish number 3', 'c2_i3.jpg', 2, 2.78, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(30, 'Pizzas Item 4', 'Cooked Pizzas dish number 4', 'c2_i4.jpg', 2, 3.02, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(31, 'Pizzas Item 5', 'Cooked Pizzas dish number 5', 'c2_i5.jpg', 2, 5.50, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(32, 'Pizzas Item 6', 'Cooked Pizzas dish number 6', 'c2_i6.jpg', 2, 12.01, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(33, 'Pizzas Item 7', 'Cooked Pizzas dish number 7', 'c2_i7.jpg', 2, 11.92, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(34, 'Pizzas Item 8', 'Cooked Pizzas dish number 8', 'c2_i8.jpg', 2, 11.64, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(35, 'Pizzas Item 9', 'Cooked Pizzas dish number 9', 'c2_i9.jpg', 2, 11.45, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(36, 'Pizzas Item 10', 'Cooked Pizzas dish number 10', 'c2_i10.jpg', 2, 10.44, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(37, 'Pizzas Item 11', 'Cooked Pizzas dish number 11', 'c2_i11.jpg', 2, 19.67, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(38, 'Pizzas Item 12', 'Cooked Pizzas dish number 12', 'c2_i12.jpg', 2, 6.92, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(39, 'Pizzas Item 13', 'Cooked Pizzas dish number 13', 'c2_i13.jpg', 2, 16.69, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(40, 'Pizzas Item 14', 'Cooked Pizzas dish number 14', 'c2_i14.jpg', 2, 9.27, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(41, 'Pizzas Item 15', 'Cooked Pizzas dish number 15', 'c2_i15.jpg', 2, 19.21, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(42, 'Pizzas Item 16', 'Cooked Pizzas dish number 16', 'c2_i16.jpg', 2, 14.75, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(43, 'Pizzas Item 17', 'Cooked Pizzas dish number 17', 'c2_i17.jpg', 2, 16.65, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(44, 'Pizzas Item 18', 'Cooked Pizzas dish number 18', 'c2_i18.jpg', 2, 13.16, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(45, 'Pizzas Item 19', 'Cooked Pizzas dish number 19', 'c2_i19.jpg', 2, 9.08, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(46, 'Pizzas Item 20', 'Cooked Pizzas dish number 20', 'c2_i20.jpg', 2, 17.88, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(47, 'Drinks Item 1', 'Cooked Drinks dish number 1', 'c3_i1.jpg', 3, 17.78, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(48, 'Drinks Item 2', 'Cooked Drinks dish number 2', 'c3_i2.jpg', 3, 7.61, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(49, 'Drinks Item 3', 'Cooked Drinks dish number 3', 'c3_i3.jpg', 3, 15.27, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(50, 'Drinks Item 4', 'Cooked Drinks dish number 4', 'c3_i4.jpg', 3, 4.61, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(51, 'Drinks Item 5', 'Cooked Drinks dish number 5', 'c3_i5.jpg', 3, 16.91, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(52, 'Drinks Item 6', 'Cooked Drinks dish number 6', 'c3_i6.jpg', 3, 4.65, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(53, 'Drinks Item 7', 'Cooked Drinks dish number 7', 'c3_i7.jpg', 3, 11.06, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(54, 'Drinks Item 8', 'Cooked Drinks dish number 8', 'c3_i8.jpg', 3, 10.22, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(55, 'Drinks Item 9', 'Cooked Drinks dish number 9', 'c3_i9.jpg', 3, 12.77, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(56, 'Drinks Item 10', 'Cooked Drinks dish number 10', 'c3_i10.jpg', 3, 15.40, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(57, 'Drinks Item 11', 'Cooked Drinks dish number 11', 'c3_i11.jpg', 3, 9.64, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(58, 'Drinks Item 12', 'Cooked Drinks dish number 12', 'c3_i12.jpg', 3, 9.90, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(59, 'Drinks Item 13', 'Cooked Drinks dish number 13', 'c3_i13.jpg', 3, 9.78, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(60, 'Drinks Item 14', 'Cooked Drinks dish number 14', 'c3_i14.jpg', 3, 5.65, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(61, 'Drinks Item 15', 'Cooked Drinks dish number 15', 'c3_i15.jpg', 3, 11.66, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(62, 'Drinks Item 16', 'Cooked Drinks dish number 16', 'c3_i16.jpg', 3, 7.36, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(63, 'Drinks Item 17', 'Cooked Drinks dish number 17', 'c3_i17.jpg', 3, 7.13, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(64, 'Drinks Item 18', 'Cooked Drinks dish number 18', 'c3_i18.jpg', 3, 18.63, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(65, 'Drinks Item 19', 'Cooked Drinks dish number 19', 'c3_i19.jpg', 3, 7.19, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(66, 'Drinks Item 20', 'Cooked Drinks dish number 20', 'c3_i20.jpg', 3, 19.73, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(67, 'Salads Item 1', 'Cooked Salads dish number 1', 'c4_i1.jpg', 4, 13.24, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(68, 'Salads Item 2', 'Cooked Salads dish number 2', 'c4_i2.jpg', 4, 12.44, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(69, 'Salads Item 3', 'Cooked Salads dish number 3', 'c4_i3.jpg', 4, 12.23, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(70, 'Salads Item 4', 'Cooked Salads dish number 4', 'c4_i4.jpg', 4, 8.12, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(71, 'Salads Item 5', 'Cooked Salads dish number 5', 'c4_i5.jpg', 4, 3.77, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(72, 'Salads Item 6', 'Cooked Salads dish number 6', 'c4_i6.jpg', 4, 14.39, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(73, 'Salads Item 7', 'Cooked Salads dish number 7', 'c4_i7.jpg', 4, 15.99, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(74, 'Salads Item 8', 'Cooked Salads dish number 8', 'c4_i8.jpg', 4, 6.05, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(75, 'Salads Item 9', 'Cooked Salads dish number 9', 'c4_i9.jpg', 4, 5.91, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(76, 'Salads Item 10', 'Cooked Salads dish number 10', 'c4_i10.jpg', 4, 11.00, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(77, 'Salads Item 11', 'Cooked Salads dish number 11', 'c4_i11.jpg', 4, 17.52, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(78, 'Salads Item 12', 'Cooked Salads dish number 12', 'c4_i12.jpg', 4, 17.68, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(79, 'Salads Item 13', 'Cooked Salads dish number 13', 'c4_i13.jpg', 4, 12.16, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(80, 'Salads Item 14', 'Cooked Salads dish number 14', 'c4_i14.jpg', 4, 6.72, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(81, 'Salads Item 15', 'Cooked Salads dish number 15', 'c4_i15.jpg', 4, 5.09, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(82, 'Salads Item 16', 'Cooked Salads dish number 16', 'c4_i16.jpg', 4, 7.10, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(83, 'Salads Item 17', 'Cooked Salads dish number 17', 'c4_i17.jpg', 4, 15.07, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(84, 'Salads Item 18', 'Cooked Salads dish number 18', 'c4_i18.jpg', 4, 14.22, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(85, 'Salads Item 19', 'Cooked Salads dish number 19', 'c4_i19.jpg', 4, 2.01, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(86, 'Salads Item 20', 'Cooked Salads dish number 20', 'c4_i20.jpg', 4, 6.54, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(87, 'Sandwiches Item 1', 'Cooked Sandwiches dish number 1', 'c5_i1.jpg', 5, 8.91, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(88, 'Sandwiches Item 2', 'Cooked Sandwiches dish number 2', 'c5_i2.jpg', 5, 10.98, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(89, 'Sandwiches Item 3', 'Cooked Sandwiches dish number 3', 'c5_i3.jpg', 5, 2.46, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(90, 'Sandwiches Item 4', 'Cooked Sandwiches dish number 4', 'c5_i4.jpg', 5, 10.11, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(91, 'Sandwiches Item 5', 'Cooked Sandwiches dish number 5', 'c5_i5.jpg', 5, 8.03, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(92, 'Sandwiches Item 6', 'Cooked Sandwiches dish number 6', 'c5_i6.jpg', 5, 17.46, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(93, 'Sandwiches Item 7', 'Cooked Sandwiches dish number 7', 'c5_i7.jpg', 5, 17.84, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(94, 'Sandwiches Item 8', 'Cooked Sandwiches dish number 8', 'c5_i8.jpg', 5, 7.98, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(95, 'Sandwiches Item 9', 'Cooked Sandwiches dish number 9', 'c5_i9.jpg', 5, 5.64, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(96, 'Sandwiches Item 10', 'Cooked Sandwiches dish number 10', 'c5_i10.jpg', 5, 11.00, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(97, 'Sandwiches Item 11', 'Cooked Sandwiches dish number 11', 'c5_i11.jpg', 5, 16.34, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(98, 'Sandwiches Item 12', 'Cooked Sandwiches dish number 12', 'c5_i12.jpg', 5, 9.20, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(99, 'Sandwiches Item 13', 'Cooked Sandwiches dish number 13', 'c5_i13.jpg', 5, 3.32, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(100, 'Sandwiches Item 14', 'Cooked Sandwiches dish number 14', 'c5_i14.jpg', 5, 17.16, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(101, 'Sandwiches Item 15', 'Cooked Sandwiches dish number 15', 'c5_i15.jpg', 5, 5.16, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(102, 'Sandwiches Item 16', 'Cooked Sandwiches dish number 16', 'c5_i16.jpg', 5, 10.20, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(103, 'Sandwiches Item 17', 'Cooked Sandwiches dish number 17', 'c5_i17.jpg', 5, 5.30, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(104, 'Sandwiches Item 18', 'Cooked Sandwiches dish number 18', 'c5_i18.jpg', 5, 9.98, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(105, 'Sandwiches Item 19', 'Cooked Sandwiches dish number 19', 'c5_i19.jpg', 5, 2.03, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(106, 'Sandwiches Item 20', 'Cooked Sandwiches dish number 20', 'c5_i20.jpg', 5, 19.11, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(107, 'Pasta Item 1', 'Cooked Pasta dish number 1', 'c6_i1.jpg', 6, 10.89, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(108, 'Pasta Item 2', 'Cooked Pasta dish number 2', 'c6_i2.jpg', 6, 7.11, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(109, 'Pasta Item 3', 'Cooked Pasta dish number 3', 'c6_i3.jpg', 6, 15.40, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(110, 'Pasta Item 4', 'Cooked Pasta dish number 4', 'c6_i4.jpg', 6, 13.83, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(111, 'Pasta Item 5', 'Cooked Pasta dish number 5', 'c6_i5.jpg', 6, 4.62, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(112, 'Pasta Item 6', 'Cooked Pasta dish number 6', 'c6_i6.jpg', 6, 9.03, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(113, 'Pasta Item 7', 'Cooked Pasta dish number 7', 'c6_i7.jpg', 6, 12.64, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(114, 'Pasta Item 8', 'Cooked Pasta dish number 8', 'c6_i8.jpg', 6, 3.97, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(115, 'Pasta Item 9', 'Cooked Pasta dish number 9', 'c6_i9.jpg', 6, 11.65, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(116, 'Pasta Item 10', 'Cooked Pasta dish number 10', 'c6_i10.jpg', 6, 5.30, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(117, 'Pasta Item 11', 'Cooked Pasta dish number 11', 'c6_i11.jpg', 6, 16.55, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(118, 'Pasta Item 12', 'Cooked Pasta dish number 12', 'c6_i12.jpg', 6, 8.35, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(119, 'Pasta Item 13', 'Cooked Pasta dish number 13', 'c6_i13.jpg', 6, 17.33, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(120, 'Pasta Item 14', 'Cooked Pasta dish number 14', 'c6_i14.jpg', 6, 19.93, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(121, 'Pasta Item 15', 'Cooked Pasta dish number 15', 'c6_i15.jpg', 6, 8.83, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(122, 'Pasta Item 16', 'Cooked Pasta dish number 16', 'c6_i16.jpg', 6, 10.01, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(123, 'Pasta Item 17', 'Cooked Pasta dish number 17', 'c6_i17.jpg', 6, 3.18, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(124, 'Pasta Item 18', 'Cooked Pasta dish number 18', 'c6_i18.jpg', 6, 15.72, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(125, 'Pasta Item 19', 'Cooked Pasta dish number 19', 'c6_i19.jpg', 6, 8.26, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(126, 'Pasta Item 20', 'Cooked Pasta dish number 20', 'c6_i20.jpg', 6, 3.29, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(127, 'Soups Item 1', 'Cooked Soups dish number 1', 'c7_i1.jpg', 7, 3.67, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(128, 'Soups Item 2', 'Cooked Soups dish number 2', 'c7_i2.jpg', 7, 7.88, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(129, 'Soups Item 3', 'Cooked Soups dish number 3', 'c7_i3.jpg', 7, 17.01, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(130, 'Soups Item 4', 'Cooked Soups dish number 4', 'c7_i4.jpg', 7, 4.95, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(131, 'Soups Item 5', 'Cooked Soups dish number 5', 'c7_i5.jpg', 7, 10.02, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(132, 'Soups Item 6', 'Cooked Soups dish number 6', 'c7_i6.jpg', 7, 15.10, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(133, 'Soups Item 7', 'Cooked Soups dish number 7', 'c7_i7.jpg', 7, 2.44, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(134, 'Soups Item 8', 'Cooked Soups dish number 8', 'c7_i8.jpg', 7, 2.77, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(135, 'Soups Item 9', 'Cooked Soups dish number 9', 'c7_i9.jpg', 7, 19.02, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(136, 'Soups Item 10', 'Cooked Soups dish number 10', 'c7_i10.jpg', 7, 10.94, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(137, 'Soups Item 11', 'Cooked Soups dish number 11', 'c7_i11.jpg', 7, 16.33, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(138, 'Soups Item 12', 'Cooked Soups dish number 12', 'c7_i12.jpg', 7, 19.28, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(139, 'Soups Item 13', 'Cooked Soups dish number 13', 'c7_i13.jpg', 7, 13.24, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(140, 'Soups Item 14', 'Cooked Soups dish number 14', 'c7_i14.jpg', 7, 6.40, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(141, 'Soups Item 15', 'Cooked Soups dish number 15', 'c7_i15.jpg', 7, 13.20, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(142, 'Soups Item 16', 'Cooked Soups dish number 16', 'c7_i16.jpg', 7, 2.57, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(143, 'Soups Item 17', 'Cooked Soups dish number 17', 'c7_i17.jpg', 7, 6.59, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(144, 'Soups Item 18', 'Cooked Soups dish number 18', 'c7_i18.jpg', 7, 4.10, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(145, 'Soups Item 19', 'Cooked Soups dish number 19', 'c7_i19.jpg', 7, 2.94, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(146, 'Soups Item 20', 'Cooked Soups dish number 20', 'c7_i20.jpg', 7, 16.71, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(147, 'Seafood Item 1', 'Cooked Seafood dish number 1', 'c8_i1.jpg', 8, 18.65, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(148, 'Seafood Item 2', 'Cooked Seafood dish number 2', 'c8_i2.jpg', 8, 4.19, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(149, 'Seafood Item 3', 'Cooked Seafood dish number 3', 'c8_i3.jpg', 8, 15.25, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(150, 'Seafood Item 4', 'Cooked Seafood dish number 4', 'c8_i4.jpg', 8, 15.42, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(151, 'Seafood Item 5', 'Cooked Seafood dish number 5', 'c8_i5.jpg', 8, 15.08, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(152, 'Seafood Item 6', 'Cooked Seafood dish number 6', 'c8_i6.jpg', 8, 2.50, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(153, 'Seafood Item 7', 'Cooked Seafood dish number 7', 'c8_i7.jpg', 8, 4.92, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(154, 'Seafood Item 8', 'Cooked Seafood dish number 8', 'c8_i8.jpg', 8, 13.62, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(155, 'Seafood Item 9', 'Cooked Seafood dish number 9', 'c8_i9.jpg', 8, 12.91, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(156, 'Seafood Item 10', 'Cooked Seafood dish number 10', 'c8_i10.jpg', 8, 19.65, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(157, 'Seafood Item 11', 'Cooked Seafood dish number 11', 'c8_i11.jpg', 8, 19.18, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(158, 'Seafood Item 12', 'Cooked Seafood dish number 12', 'c8_i12.jpg', 8, 9.07, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(159, 'Seafood Item 13', 'Cooked Seafood dish number 13', 'c8_i13.jpg', 8, 17.14, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(160, 'Seafood Item 14', 'Cooked Seafood dish number 14', 'c8_i14.jpg', 8, 14.38, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(161, 'Seafood Item 15', 'Cooked Seafood dish number 15', 'c8_i15.jpg', 8, 3.02, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(162, 'Seafood Item 16', 'Cooked Seafood dish number 16', 'c8_i16.jpg', 8, 12.38, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(163, 'Seafood Item 17', 'Cooked Seafood dish number 17', 'c8_i17.jpg', 8, 12.61, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(164, 'Seafood Item 18', 'Cooked Seafood dish number 18', 'c8_i18.jpg', 8, 19.67, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(165, 'Seafood Item 19', 'Cooked Seafood dish number 19', 'c8_i19.jpg', 8, 5.46, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(166, 'Seafood Item 20', 'Cooked Seafood dish number 20', 'c8_i20.jpg', 8, 5.67, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(167, 'Desserts Item 1', 'Cooked Desserts dish number 1', 'c9_i1.jpg', 9, 15.65, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(168, 'Desserts Item 2', 'Cooked Desserts dish number 2', 'c9_i2.jpg', 9, 13.12, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(169, 'Desserts Item 3', 'Cooked Desserts dish number 3', 'c9_i3.jpg', 9, 19.94, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(170, 'Desserts Item 4', 'Cooked Desserts dish number 4', 'c9_i4.jpg', 9, 2.72, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(171, 'Desserts Item 5', 'Cooked Desserts dish number 5', 'c9_i5.jpg', 9, 17.95, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(172, 'Desserts Item 6', 'Cooked Desserts dish number 6', 'c9_i6.jpg', 9, 17.58, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(173, 'Desserts Item 7', 'Cooked Desserts dish number 7', 'c9_i7.jpg', 9, 14.51, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(174, 'Desserts Item 8', 'Cooked Desserts dish number 8', 'c9_i8.jpg', 9, 10.03, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(175, 'Desserts Item 9', 'Cooked Desserts dish number 9', 'c9_i9.jpg', 9, 11.16, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(176, 'Desserts Item 10', 'Cooked Desserts dish number 10', 'c9_i10.jpg', 9, 5.89, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(177, 'Desserts Item 11', 'Cooked Desserts dish number 11', 'c9_i11.jpg', 9, 11.86, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(178, 'Desserts Item 12', 'Cooked Desserts dish number 12', 'c9_i12.jpg', 9, 3.81, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(179, 'Desserts Item 13', 'Cooked Desserts dish number 13', 'c9_i13.jpg', 9, 17.38, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(180, 'Desserts Item 14', 'Cooked Desserts dish number 14', 'c9_i14.jpg', 9, 2.57, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(181, 'Desserts Item 15', 'Cooked Desserts dish number 15', 'c9_i15.jpg', 9, 17.71, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(182, 'Desserts Item 16', 'Cooked Desserts dish number 16', 'c9_i16.jpg', 9, 10.91, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(183, 'Desserts Item 17', 'Cooked Desserts dish number 17', 'c9_i17.jpg', 9, 4.98, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(184, 'Desserts Item 18', 'Cooked Desserts dish number 18', 'c9_i18.jpg', 9, 12.86, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(185, 'Desserts Item 19', 'Cooked Desserts dish number 19', 'c9_i19.jpg', 9, 15.06, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(186, 'Desserts Item 20', 'Cooked Desserts dish number 20', 'c9_i20.jpg', 9, 16.14, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(187, 'Snacks Item 1', 'Cooked Snacks dish number 1', 'c10_i1.jpg', 10, 12.70, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(188, 'Snacks Item 2', 'Cooked Snacks dish number 2', 'c10_i2.jpg', 10, 12.92, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(189, 'Snacks Item 3', 'Cooked Snacks dish number 3', 'c10_i3.jpg', 10, 12.16, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(190, 'Snacks Item 4', 'Cooked Snacks dish number 4', 'c10_i4.jpg', 10, 13.04, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(191, 'Snacks Item 5', 'Cooked Snacks dish number 5', 'c10_i5.jpg', 10, 15.86, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(192, 'Snacks Item 6', 'Cooked Snacks dish number 6', 'c10_i6.jpg', 10, 19.69, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(193, 'Snacks Item 7', 'Cooked Snacks dish number 7', 'c10_i7.jpg', 10, 13.11, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(194, 'Snacks Item 8', 'Cooked Snacks dish number 8', 'c10_i8.jpg', 10, 16.40, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(195, 'Snacks Item 9', 'Cooked Snacks dish number 9', 'c10_i9.jpg', 10, 6.19, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(196, 'Snacks Item 10', 'Cooked Snacks dish number 10', 'c10_i10.jpg', 10, 10.44, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(197, 'Snacks Item 11', 'Cooked Snacks dish number 11', 'c10_i11.jpg', 10, 9.22, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(198, 'Snacks Item 12', 'Cooked Snacks dish number 12', 'c10_i12.jpg', 10, 17.97, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(199, 'Snacks Item 13', 'Cooked Snacks dish number 13', 'c10_i13.jpg', 10, 16.23, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(200, 'Snacks Item 14', 'Cooked Snacks dish number 14', 'c10_i14.jpg', 10, 15.32, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(201, 'Snacks Item 15', 'Cooked Snacks dish number 15', 'c10_i15.jpg', 10, 3.82, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(202, 'Snacks Item 16', 'Cooked Snacks dish number 16', 'c10_i16.jpg', 10, 11.04, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(203, 'Snacks Item 17', 'Cooked Snacks dish number 17', 'c10_i17.jpg', 10, 17.07, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(204, 'Snacks Item 18', 'Cooked Snacks dish number 18', 'c10_i18.jpg', 10, 5.95, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(205, 'Snacks Item 19', 'Cooked Snacks dish number 19', 'c10_i19.jpg', 10, 7.63, '2026-07-03 00:09:05', '2026-07-03 00:09:05'),
(206, 'Snacks Item 20', 'Cooked Snacks dish number 20', 'c10_i20.jpg', 10, 5.56, '2026-07-03 00:09:05', '2026-07-03 00:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `item_prices`
--

CREATE TABLE `item_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_price_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_03_090229_create_roles_table', 1),
(6, '2023_03_03_131156_create_role_user_table', 1),
(7, '2023_03_11_185847_create_categories_table', 1),
(8, '2023_03_11_190022_create_items_table', 1),
(9, '2023_03_11_190126_create_orders_table', 1),
(10, '2023_03_11_190149_create_order_details_table', 1),
(11, '2023_03_11_190218_create_item_prices_table', 1),
(12, '2023_03_11_190330_create_reviews_table', 1),
(13, '2023_03_11_190430_create_customer_feedback_table', 1),
(14, '2026_07_03_000000_alter_item_description_to_text', 2),
(15, '2026_07_03_000001_create_sliders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_item` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_payment_method` varchar(255) DEFAULT NULL,
  `total_amount` decimal(8,2) DEFAULT NULL,
  `order_position` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_person_name` varchar(255) DEFAULT NULL,
  `order_person_mobile` varchar(255) DEFAULT NULL,
  `order_total_person` varchar(255) DEFAULT NULL,
  `order_table_no` varchar(255) DEFAULT NULL,
  `order_contact_name` varchar(255) DEFAULT NULL,
  `order_contact_mobile` varchar(255) DEFAULT NULL,
  `order_contact_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `total_item`, `order_status`, `payment_status`, `order_payment_method`, `total_amount`, `order_position`, `user_id`, `order_person_name`, `order_person_mobile`, `order_total_person`, `order_table_no`, `order_contact_name`, `order_contact_mobile`, `order_contact_address`, `created_at`, `updated_at`) VALUES
(1, '202607021733483', 2, 'Completed', 'Paid', 'cashOnDelivery', 33.98, 'present', 5, 'customer1', '01756659874', '2', 'Table 1', NULL, NULL, NULL, '2026-07-02 11:33:48', '2026-07-02 11:37:41'),
(2, '202607030726023', 2, 'New', 'Paid', 'bkash', 45.19, 'takeaway', 15, 'Tushi Dhar', NULL, NULL, 'Table 1', 'mou tushi', '01756987452', '4 nawabpur, dhaka-1100', '2026-07-03 01:26:02', '2026-07-03 01:26:02'),
(3, '202607030744142', 2, 'New', 'Not Paid', 'cashOnDelivery', 17.58, 'takeaway', 15, 'Tushi Dhar', NULL, NULL, 'Table 1', 'mou tushi', '01756987452', 'xjkl', '2026-07-03 01:44:14', '2026-07-03 01:44:14'),
(4, '202607030753384', 1, 'New', 'Not Paid', 'cashOnDelivery', 55.92, 'present', 15, 'Tushi Dhar', '01756659874', '1', 'Table 1', NULL, NULL, NULL, '2026-07-03 01:53:38', '2026-07-03 01:53:38'),
(5, '202607030754434', 1, 'New', 'Paid', 'bkash', 59.90, 'present', 15, 'Tushi Dhar', '01756659874', '1', 'Table 1', NULL, NULL, NULL, '2026-07-03 01:54:43', '2026-07-03 01:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_quentity` varchar(255) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_name`, `item_price`, `item_quentity`, `order_id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 'Burgers Item 1', '3.34', '2', 1, 5, 7, NULL, NULL),
(2, 'Burgers Item 4', '13.65', '2', 1, 5, 10, NULL, NULL),
(3, 'Burgers Item 3', '19.39', '2', 2, 15, 9, NULL, NULL),
(4, 'Burgers Item 1', '6.41', '1', 2, 15, 7, NULL, NULL),
(5, 'Classic Burger', '5.99', '1', 3, 15, 1, NULL, NULL),
(6, 'Burgers Item 4', '11.59', '1', 3, 15, 10, NULL, NULL),
(7, 'Cheese Burger', '6.99', '8', 4, 15, 2, NULL, NULL),
(8, 'Classic Burger', '5.99', '10', 5, 15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `review_name` varchar(255) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `review_name`, `review_text`, `created_at`, `updated_at`) VALUES
(1, 15, 'Tushi Dhar', 'test review of the resturent', '2026-07-03 01:29:11', '2026-07-03 01:29:11'),
(2, 1, 'admin', 'thanks for review', '2026-07-03 01:29:34', '2026-07-03 01:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2026-07-03 00:09:03', '2026-07-03 00:09:03'),
(4, 'customer', 'Customer', '2026-07-03 00:09:03', '2026-07-03 00:09:03'),
(5, 'manager', 'Manager', '2026-07-03 00:09:03', '2026-07-03 00:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 1),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(3, 5),
(4, 5),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Our Popular Item', 'This is our popular item. this item hot and spicy', '1783061031-1.jpg', 1, 1, '2026-07-03 00:43:51', '2026-07-03 00:45:24'),
(2, 'This is our 2nd popular item', 'This is our 2nd popular item This is our 2nd popular item This is our 2nd popular item', '1783061177-2.jpg', 2, 1, '2026-07-03 00:46:17', '2026-07-03 00:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HOvla.JzJdsQktuIT1tiY.gL6EtkTR.COfL9iyOzC4KSltjHMw0gq', 'avatar5.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(3, 'manager1', 'manager1@example.com', NULL, '$2y$10$huPtmyZ5UKVAr2S/Mgy.1eNsTv6hvqvKJ/nw74/KwEXLSWxN8t21i', 'manager1.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(4, 'manager2', 'manager2@example.com', NULL, '$2y$10$oDndUlIVBwjgGDg8ixAFne2ZhorhTWKkOEAbHlbryS48un4qp32ae', 'manager2.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(5, 'customer1', 'customer1@example.com', NULL, '$2y$10$do1s/ddHd2jEpMZWZw9SqO0Vpo2nJu6Aah3Kux355HEsJBN94SzCi', 'customer1.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(6, 'customer2', 'customer2@example.com', NULL, '$2y$10$bwirYtI38ZyaSBhDtRgFXuvgiKUOUQ7fzC2an5heXetSpkGschnSO', 'customer2.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(7, 'customer3', 'customer3@example.com', NULL, '$2y$10$ZssM9Yb0e6Ajva7oRsxKOOqSqbzZlkug8YvjkqOBDlr.tGnzHO18W', 'customer3.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(8, 'customer4', 'customer4@example.com', NULL, '$2y$10$VCIkKsknXVYHQIfyEgWF6upcE9hYtkuoOmGrtaB3lfkjpdiGcO6mK', 'customer4.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(9, 'customer5', 'customer5@example.com', NULL, '$2y$10$noiCQId3XnevVnwxgDiX/uD/0JkUiRMSjXY/nLlkQ5Yvrp.0IBk.y', 'customer5.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(10, 'customer6', 'customer6@example.com', NULL, '$2y$10$pd8fxjfe78/ZUHFBNUQwaOMplwYnfd0qZDW2vdf7TwDvNILy8/P2a', 'customer6.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(11, 'customer7', 'customer7@example.com', NULL, '$2y$10$QcjAA/4EKRY3FU4PHz.N5eOCnoDjkCFjZ02dku83hg86zERcboTpm', 'customer7.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(12, 'customer8', 'customer8@example.com', NULL, '$2y$10$jV4w2XFXVtZwIFbKTbXMmOZKtG2Tp4JIihoIWJzJ3bBcVzYVe.AtK', 'customer8.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(13, 'customer9', 'customer9@example.com', NULL, '$2y$10$mfptIJOPLlwy76Hx.xqPtu.mGYgwW7J67.erkoY9RjKqTw0JLy4BW', 'customer9.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(14, 'customer10', 'customer10@example.com', NULL, '$2y$10$yTPQziV1G3rLIzDEVjafXePwxU0rHNVWwdeLlskCs6/7Puq/F9Wqa', 'customer10.png', NULL, '2026-07-03 00:09:04', '2026-07-03 00:09:04'),
(15, 'Tushi Dhar', 'tushi867@gmail.com', NULL, '$2y$10$DToYyaRKkY.zr2IttGpxfOzsb0QZZFh2bsoLE3ZQYmRkx4Ty6gtJy', '1783062339-bbq_pork_salad.jfif', NULL, '2026-07-03 00:58:47', '2026-07-03 01:05:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_prices`
--
ALTER TABLE `item_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_prices_item_id_foreign` (`item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `item_prices`
--
ALTER TABLE `item_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_prices`
--
ALTER TABLE `item_prices`
  ADD CONSTRAINT `item_prices_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
