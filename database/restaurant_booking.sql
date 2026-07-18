-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2026 at 09:10 AM
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
  `category_description` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Burgers', 'Delicious grilled and stacked burgers', 'category1.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(2, 'Pizzas', 'Hot, cheesy pizzas with fresh toppings', 'category2.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(3, 'Salads', 'Fresh salads made with crisp greens', 'category3.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(4, 'Sandwiches', 'Handheld sandwiches and wraps', 'category4.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(5, 'Pasta', 'Creamy and saucy pasta dishes', 'category5.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(6, 'Soups', 'Warm soups cooked to comfort', 'category6.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(7, 'Seafood', 'Fresh seafood plates and grills', 'category7.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(8, 'Desserts', 'Sweet desserts and pastries', 'category8.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(9, 'Drinks', 'Cold and hot beverages', 'category9.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(10, 'Snacks', 'Tasty quick bites and starters', 'category10.jpg', '2026-07-17 10:55:51', '2026-07-17 10:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
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
(1, 'Burgers Item 1', 'Cooked Burgers dish number 1', 'c1_i1.jpg', 1, 2.51, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(2, 'Burgers Item 2', 'Cooked Burgers dish number 2', 'c1_i2.jpg', 1, 2.31, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(3, 'Burgers Item 3', 'Cooked Burgers dish number 3', 'c1_i3.jpg', 1, 9.92, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(4, 'Burgers Item 4', 'Cooked Burgers dish number 4', 'c1_i4.jpg', 1, 9.71, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(5, 'Burgers Item 5', 'Cooked Burgers dish number 5', 'c1_i5.jpg', 1, 8.81, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(6, 'Burgers Item 6', 'Cooked Burgers dish number 6', 'c1_i6.jpg', 1, 16.89, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(7, 'Burgers Item 7', 'Cooked Burgers dish number 7', 'c1_i7.jpg', 1, 12.00, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(8, 'Burgers Item 8', 'Cooked Burgers dish number 8', 'c1_i8.jpg', 1, 11.47, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(9, 'Burgers Item 9', 'Cooked Burgers dish number 9', 'c1_i9.jpg', 1, 9.59, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(10, 'Burgers Item 10', 'Cooked Burgers dish number 10', 'c1_i10.jpg', 1, 18.34, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(11, 'Burgers Item 11', 'Cooked Burgers dish number 11', 'c1_i11.jpg', 1, 7.94, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(12, 'Burgers Item 12', 'Cooked Burgers dish number 12', 'c1_i12.jpg', 1, 8.95, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(13, 'Burgers Item 13', 'Cooked Burgers dish number 13', 'c1_i13.jpg', 1, 7.09, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(14, 'Burgers Item 14', 'Cooked Burgers dish number 14', 'c1_i14.jpg', 1, 9.73, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(15, 'Burgers Item 15', 'Cooked Burgers dish number 15', 'c1_i15.jpg', 1, 8.39, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(16, 'Burgers Item 16', 'Cooked Burgers dish number 16', 'c1_i16.jpg', 1, 18.93, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(17, 'Burgers Item 17', 'Cooked Burgers dish number 17', 'c1_i17.jpg', 1, 12.35, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(18, 'Burgers Item 18', 'Cooked Burgers dish number 18', 'c1_i18.jpg', 1, 15.92, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(19, 'Burgers Item 19', 'Cooked Burgers dish number 19', 'c1_i19.jpg', 1, 15.60, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(20, 'Burgers Item 20', 'Cooked Burgers dish number 20', 'c1_i20.jpg', 1, 5.32, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(21, 'Pizzas Item 1', 'Cooked Pizzas dish number 1', 'c2_i1.jpg', 2, 8.45, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(22, 'Pizzas Item 2', 'Cooked Pizzas dish number 2', 'c2_i2.jpg', 2, 17.68, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(23, 'Pizzas Item 3', 'Cooked Pizzas dish number 3', 'c2_i3.jpg', 2, 4.38, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(24, 'Pizzas Item 4', 'Cooked Pizzas dish number 4', 'c2_i4.jpg', 2, 3.16, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(25, 'Pizzas Item 5', 'Cooked Pizzas dish number 5', 'c2_i5.jpg', 2, 10.33, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(26, 'Pizzas Item 6', 'Cooked Pizzas dish number 6', 'c2_i6.jpg', 2, 2.54, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(27, 'Pizzas Item 7', 'Cooked Pizzas dish number 7', 'c2_i7.jpg', 2, 11.18, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(28, 'Pizzas Item 8', 'Cooked Pizzas dish number 8', 'c2_i8.jpg', 2, 3.22, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(29, 'Pizzas Item 9', 'Cooked Pizzas dish number 9', 'c2_i9.jpg', 2, 9.27, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(30, 'Pizzas Item 10', 'Cooked Pizzas dish number 10', 'c2_i10.jpg', 2, 11.38, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(31, 'Pizzas Item 11', 'Cooked Pizzas dish number 11', 'c2_i11.jpg', 2, 9.60, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(32, 'Pizzas Item 12', 'Cooked Pizzas dish number 12', 'c2_i12.jpg', 2, 17.47, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(33, 'Pizzas Item 13', 'Cooked Pizzas dish number 13', 'c2_i13.jpg', 2, 5.25, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(34, 'Pizzas Item 14', 'Cooked Pizzas dish number 14', 'c2_i14.jpg', 2, 5.97, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(35, 'Pizzas Item 15', 'Cooked Pizzas dish number 15', 'c2_i15.jpg', 2, 13.62, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(36, 'Pizzas Item 16', 'Cooked Pizzas dish number 16', 'c2_i16.jpg', 2, 12.16, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(37, 'Pizzas Item 17', 'Cooked Pizzas dish number 17', 'c2_i17.jpg', 2, 7.64, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(38, 'Pizzas Item 18', 'Cooked Pizzas dish number 18', 'c2_i18.jpg', 2, 19.32, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(39, 'Pizzas Item 19', 'Cooked Pizzas dish number 19', 'c2_i19.jpg', 2, 3.28, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(40, 'Pizzas Item 20', 'Cooked Pizzas dish number 20', 'c2_i20.jpg', 2, 9.18, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(41, 'Salads Item 1', 'Cooked Salads dish number 1', 'c3_i1.jpg', 3, 8.44, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(42, 'Salads Item 2', 'Cooked Salads dish number 2', 'c3_i2.jpg', 3, 9.27, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(43, 'Salads Item 3', 'Cooked Salads dish number 3', 'c3_i3.jpg', 3, 9.56, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(44, 'Salads Item 4', 'Cooked Salads dish number 4', 'c3_i4.jpg', 3, 6.22, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(45, 'Salads Item 5', 'Cooked Salads dish number 5', 'c3_i5.jpg', 3, 5.80, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(46, 'Salads Item 6', 'Cooked Salads dish number 6', 'c3_i6.jpg', 3, 14.82, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(47, 'Salads Item 7', 'Cooked Salads dish number 7', 'c3_i7.jpg', 3, 9.12, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(48, 'Salads Item 8', 'Cooked Salads dish number 8', 'c3_i8.jpg', 3, 6.14, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(49, 'Salads Item 9', 'Cooked Salads dish number 9', 'c3_i9.jpg', 3, 19.66, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(50, 'Salads Item 10', 'Cooked Salads dish number 10', 'c3_i10.jpg', 3, 7.61, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(51, 'Salads Item 11', 'Cooked Salads dish number 11', 'c3_i11.jpg', 3, 5.91, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(52, 'Salads Item 12', 'Cooked Salads dish number 12', 'c3_i12.jpg', 3, 10.24, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(53, 'Salads Item 13', 'Cooked Salads dish number 13', 'c3_i13.jpg', 3, 4.87, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(54, 'Salads Item 14', 'Cooked Salads dish number 14', 'c3_i14.jpg', 3, 10.49, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(55, 'Salads Item 15', 'Cooked Salads dish number 15', 'c3_i15.jpg', 3, 13.77, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(56, 'Salads Item 16', 'Cooked Salads dish number 16', 'c3_i16.jpg', 3, 19.73, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(57, 'Salads Item 17', 'Cooked Salads dish number 17', 'c3_i17.jpg', 3, 9.99, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(58, 'Salads Item 18', 'Cooked Salads dish number 18', 'c3_i18.jpg', 3, 11.38, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(59, 'Salads Item 19', 'Cooked Salads dish number 19', 'c3_i19.jpg', 3, 8.00, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(60, 'Salads Item 20', 'Cooked Salads dish number 20', 'c3_i20.jpg', 3, 6.75, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(61, 'Sandwiches Item 1', 'Cooked Sandwiches dish number 1', 'c4_i1.jpg', 4, 10.22, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(62, 'Sandwiches Item 2', 'Cooked Sandwiches dish number 2', 'c4_i2.jpg', 4, 6.78, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(63, 'Sandwiches Item 3', 'Cooked Sandwiches dish number 3', 'c4_i3.jpg', 4, 2.75, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(64, 'Sandwiches Item 4', 'Cooked Sandwiches dish number 4', 'c4_i4.jpg', 4, 15.09, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(65, 'Sandwiches Item 5', 'Cooked Sandwiches dish number 5', 'c4_i5.jpg', 4, 19.75, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(66, 'Sandwiches Item 6', 'Cooked Sandwiches dish number 6', 'c4_i6.jpg', 4, 7.84, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(67, 'Sandwiches Item 7', 'Cooked Sandwiches dish number 7', 'c4_i7.jpg', 4, 18.79, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(68, 'Sandwiches Item 8', 'Cooked Sandwiches dish number 8', 'c4_i8.jpg', 4, 7.29, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(69, 'Sandwiches Item 9', 'Cooked Sandwiches dish number 9', 'c4_i9.jpg', 4, 12.63, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(70, 'Sandwiches Item 10', 'Cooked Sandwiches dish number 10', 'c4_i10.jpg', 4, 2.11, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(71, 'Sandwiches Item 11', 'Cooked Sandwiches dish number 11', 'c4_i11.jpg', 4, 11.96, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(72, 'Sandwiches Item 12', 'Cooked Sandwiches dish number 12', 'c4_i12.jpg', 4, 7.82, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(73, 'Sandwiches Item 13', 'Cooked Sandwiches dish number 13', 'c4_i13.jpg', 4, 8.86, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(74, 'Sandwiches Item 14', 'Cooked Sandwiches dish number 14', 'c4_i14.jpg', 4, 10.94, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(75, 'Sandwiches Item 15', 'Cooked Sandwiches dish number 15', 'c4_i15.jpg', 4, 12.16, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(76, 'Sandwiches Item 16', 'Cooked Sandwiches dish number 16', 'c4_i16.jpg', 4, 13.13, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(77, 'Sandwiches Item 17', 'Cooked Sandwiches dish number 17', 'c4_i17.jpg', 4, 17.68, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(78, 'Sandwiches Item 18', 'Cooked Sandwiches dish number 18', 'c4_i18.jpg', 4, 10.09, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(79, 'Sandwiches Item 19', 'Cooked Sandwiches dish number 19', 'c4_i19.jpg', 4, 8.83, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(80, 'Sandwiches Item 20', 'Cooked Sandwiches dish number 20', 'c4_i20.jpg', 4, 19.02, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(81, 'Pasta Item 1', 'Cooked Pasta dish number 1', 'c5_i1.jpg', 5, 9.03, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(82, 'Pasta Item 2', 'Cooked Pasta dish number 2', 'c5_i2.jpg', 5, 10.81, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(83, 'Pasta Item 3', 'Cooked Pasta dish number 3', 'c5_i3.jpg', 5, 3.25, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(84, 'Pasta Item 4', 'Cooked Pasta dish number 4', 'c5_i4.jpg', 5, 7.75, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(85, 'Pasta Item 5', 'Cooked Pasta dish number 5', 'c5_i5.jpg', 5, 12.28, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(86, 'Pasta Item 6', 'Cooked Pasta dish number 6', 'c5_i6.jpg', 5, 4.29, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(87, 'Pasta Item 7', 'Cooked Pasta dish number 7', 'c5_i7.jpg', 5, 7.55, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(88, 'Pasta Item 8', 'Cooked Pasta dish number 8', 'c5_i8.jpg', 5, 15.16, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(89, 'Pasta Item 9', 'Cooked Pasta dish number 9', 'c5_i9.jpg', 5, 8.03, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(90, 'Pasta Item 10', 'Cooked Pasta dish number 10', 'c5_i10.jpg', 5, 11.77, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(91, 'Pasta Item 11', 'Cooked Pasta dish number 11', 'c5_i11.jpg', 5, 12.24, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(92, 'Pasta Item 12', 'Cooked Pasta dish number 12', 'c5_i12.jpg', 5, 19.72, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(93, 'Pasta Item 13', 'Cooked Pasta dish number 13', 'c5_i13.jpg', 5, 16.01, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(94, 'Pasta Item 14', 'Cooked Pasta dish number 14', 'c5_i14.jpg', 5, 14.73, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(95, 'Pasta Item 15', 'Cooked Pasta dish number 15', 'c5_i15.jpg', 5, 5.30, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(96, 'Pasta Item 16', 'Cooked Pasta dish number 16', 'c5_i16.jpg', 5, 10.55, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(97, 'Pasta Item 17', 'Cooked Pasta dish number 17', 'c5_i17.jpg', 5, 2.80, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(98, 'Pasta Item 18', 'Cooked Pasta dish number 18', 'c5_i18.jpg', 5, 11.84, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(99, 'Pasta Item 19', 'Cooked Pasta dish number 19', 'c5_i19.jpg', 5, 13.49, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(100, 'Pasta Item 20', 'Cooked Pasta dish number 20', 'c5_i20.jpg', 5, 12.59, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(101, 'Soups Item 1', 'Cooked Soups dish number 1', 'c6_i1.jpg', 6, 19.39, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(102, 'Soups Item 2', 'Cooked Soups dish number 2', 'c6_i2.jpg', 6, 19.08, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(103, 'Soups Item 3', 'Cooked Soups dish number 3', 'c6_i3.jpg', 6, 15.65, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(104, 'Soups Item 4', 'Cooked Soups dish number 4', 'c6_i4.jpg', 6, 10.98, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(105, 'Soups Item 5', 'Cooked Soups dish number 5', 'c6_i5.jpg', 6, 19.14, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(106, 'Soups Item 6', 'Cooked Soups dish number 6', 'c6_i6.jpg', 6, 12.13, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(107, 'Soups Item 7', 'Cooked Soups dish number 7', 'c6_i7.jpg', 6, 3.90, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(108, 'Soups Item 8', 'Cooked Soups dish number 8', 'c6_i8.jpg', 6, 6.55, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(109, 'Soups Item 9', 'Cooked Soups dish number 9', 'c6_i9.jpg', 6, 5.83, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(110, 'Soups Item 10', 'Cooked Soups dish number 10', 'c6_i10.jpg', 6, 12.57, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(111, 'Soups Item 11', 'Cooked Soups dish number 11', 'c6_i11.jpg', 6, 13.83, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(112, 'Soups Item 12', 'Cooked Soups dish number 12', 'c6_i12.jpg', 6, 17.00, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(113, 'Soups Item 13', 'Cooked Soups dish number 13', 'c6_i13.jpg', 6, 14.57, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(114, 'Soups Item 14', 'Cooked Soups dish number 14', 'c6_i14.jpg', 6, 15.73, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(115, 'Soups Item 15', 'Cooked Soups dish number 15', 'c6_i15.jpg', 6, 19.17, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(116, 'Soups Item 16', 'Cooked Soups dish number 16', 'c6_i16.jpg', 6, 19.21, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(117, 'Soups Item 17', 'Cooked Soups dish number 17', 'c6_i17.jpg', 6, 7.10, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(118, 'Soups Item 18', 'Cooked Soups dish number 18', 'c6_i18.jpg', 6, 3.39, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(119, 'Soups Item 19', 'Cooked Soups dish number 19', 'c6_i19.jpg', 6, 6.73, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(120, 'Soups Item 20', 'Cooked Soups dish number 20', 'c6_i20.jpg', 6, 2.18, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(121, 'Seafood Item 1', 'Cooked Seafood dish number 1', 'c7_i1.jpg', 7, 2.69, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(122, 'Seafood Item 2', 'Cooked Seafood dish number 2', 'c7_i2.jpg', 7, 8.61, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(123, 'Seafood Item 3', 'Cooked Seafood dish number 3', 'c7_i3.jpg', 7, 5.97, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(124, 'Seafood Item 4', 'Cooked Seafood dish number 4', 'c7_i4.jpg', 7, 8.90, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(125, 'Seafood Item 5', 'Cooked Seafood dish number 5', 'c7_i5.jpg', 7, 14.94, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(126, 'Seafood Item 6', 'Cooked Seafood dish number 6', 'c7_i6.jpg', 7, 10.25, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(127, 'Seafood Item 7', 'Cooked Seafood dish number 7', 'c7_i7.jpg', 7, 17.27, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(128, 'Seafood Item 8', 'Cooked Seafood dish number 8', 'c7_i8.jpg', 7, 14.45, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(129, 'Seafood Item 9', 'Cooked Seafood dish number 9', 'c7_i9.jpg', 7, 10.87, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(130, 'Seafood Item 10', 'Cooked Seafood dish number 10', 'c7_i10.jpg', 7, 10.94, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(131, 'Seafood Item 11', 'Cooked Seafood dish number 11', 'c7_i11.jpg', 7, 2.26, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(132, 'Seafood Item 12', 'Cooked Seafood dish number 12', 'c7_i12.jpg', 7, 12.57, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(133, 'Seafood Item 13', 'Cooked Seafood dish number 13', 'c7_i13.jpg', 7, 5.21, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(134, 'Seafood Item 14', 'Cooked Seafood dish number 14', 'c7_i14.jpg', 7, 4.94, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(135, 'Seafood Item 15', 'Cooked Seafood dish number 15', 'c7_i15.jpg', 7, 18.02, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(136, 'Seafood Item 16', 'Cooked Seafood dish number 16', 'c7_i16.jpg', 7, 9.32, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(137, 'Seafood Item 17', 'Cooked Seafood dish number 17', 'c7_i17.jpg', 7, 9.34, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(138, 'Seafood Item 18', 'Cooked Seafood dish number 18', 'c7_i18.jpg', 7, 2.83, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(139, 'Seafood Item 19', 'Cooked Seafood dish number 19', 'c7_i19.jpg', 7, 14.70, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(140, 'Seafood Item 20', 'Cooked Seafood dish number 20', 'c7_i20.jpg', 7, 10.44, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(141, 'Desserts Item 1', 'Cooked Desserts dish number 1', 'c8_i1.jpg', 8, 10.14, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(142, 'Desserts Item 2', 'Cooked Desserts dish number 2', 'c8_i2.jpg', 8, 16.14, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(143, 'Desserts Item 3', 'Cooked Desserts dish number 3', 'c8_i3.jpg', 8, 9.08, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(144, 'Desserts Item 4', 'Cooked Desserts dish number 4', 'c8_i4.jpg', 8, 6.22, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(145, 'Desserts Item 5', 'Cooked Desserts dish number 5', 'c8_i5.jpg', 8, 14.14, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(146, 'Desserts Item 6', 'Cooked Desserts dish number 6', 'c8_i6.jpg', 8, 2.57, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(147, 'Desserts Item 7', 'Cooked Desserts dish number 7', 'c8_i7.jpg', 8, 12.39, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(148, 'Desserts Item 8', 'Cooked Desserts dish number 8', 'c8_i8.jpg', 8, 12.67, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(149, 'Desserts Item 9', 'Cooked Desserts dish number 9', 'c8_i9.jpg', 8, 14.92, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(150, 'Desserts Item 10', 'Cooked Desserts dish number 10', 'c8_i10.jpg', 8, 6.90, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(151, 'Desserts Item 11', 'Cooked Desserts dish number 11', 'c8_i11.jpg', 8, 6.38, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(152, 'Desserts Item 12', 'Cooked Desserts dish number 12', 'c8_i12.jpg', 8, 11.11, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(153, 'Desserts Item 13', 'Cooked Desserts dish number 13', 'c8_i13.jpg', 8, 5.97, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(154, 'Desserts Item 14', 'Cooked Desserts dish number 14', 'c8_i14.jpg', 8, 10.72, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(155, 'Desserts Item 15', 'Cooked Desserts dish number 15', 'c8_i15.jpg', 8, 11.57, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(156, 'Desserts Item 16', 'Cooked Desserts dish number 16', 'c8_i16.jpg', 8, 10.24, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(157, 'Desserts Item 17', 'Cooked Desserts dish number 17', 'c8_i17.jpg', 8, 10.17, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(158, 'Desserts Item 18', 'Cooked Desserts dish number 18', 'c8_i18.jpg', 8, 18.37, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(159, 'Desserts Item 19', 'Cooked Desserts dish number 19', 'c8_i19.jpg', 8, 9.30, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(160, 'Desserts Item 20', 'Cooked Desserts dish number 20', 'c8_i20.jpg', 8, 11.77, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(161, 'Drinks Item 1', 'Cooked Drinks dish number 1', 'c9_i1.jpg', 9, 15.90, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(162, 'Drinks Item 2', 'Cooked Drinks dish number 2', 'c9_i2.jpg', 9, 5.45, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(163, 'Drinks Item 3', 'Cooked Drinks dish number 3', 'c9_i3.jpg', 9, 14.96, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(164, 'Drinks Item 4', 'Cooked Drinks dish number 4', 'c9_i4.jpg', 9, 7.81, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(165, 'Drinks Item 5', 'Cooked Drinks dish number 5', 'c9_i5.jpg', 9, 4.34, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(166, 'Drinks Item 6', 'Cooked Drinks dish number 6', 'c9_i6.jpg', 9, 12.73, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(167, 'Drinks Item 7', 'Cooked Drinks dish number 7', 'c9_i7.jpg', 9, 13.89, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(168, 'Drinks Item 8', 'Cooked Drinks dish number 8', 'c9_i8.jpg', 9, 8.04, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(169, 'Drinks Item 9', 'Cooked Drinks dish number 9', 'c9_i9.jpg', 9, 10.55, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(170, 'Drinks Item 10', 'Cooked Drinks dish number 10', 'c9_i10.jpg', 9, 3.38, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(171, 'Drinks Item 11', 'Cooked Drinks dish number 11', 'c9_i11.jpg', 9, 13.56, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(172, 'Drinks Item 12', 'Cooked Drinks dish number 12', 'c9_i12.jpg', 9, 15.60, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(173, 'Drinks Item 13', 'Cooked Drinks dish number 13', 'c9_i13.jpg', 9, 6.91, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(174, 'Drinks Item 14', 'Cooked Drinks dish number 14', 'c9_i14.jpg', 9, 18.02, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(175, 'Drinks Item 15', 'Cooked Drinks dish number 15', 'c9_i15.jpg', 9, 7.80, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(176, 'Drinks Item 16', 'Cooked Drinks dish number 16', 'c9_i16.jpg', 9, 7.06, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(177, 'Drinks Item 17', 'Cooked Drinks dish number 17', 'c9_i17.jpg', 9, 6.60, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(178, 'Drinks Item 18', 'Cooked Drinks dish number 18', 'c9_i18.jpg', 9, 3.89, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(179, 'Drinks Item 19', 'Cooked Drinks dish number 19', 'c9_i19.jpg', 9, 3.40, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(180, 'Drinks Item 20', 'Cooked Drinks dish number 20', 'c9_i20.jpg', 9, 15.36, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(181, 'Snacks Item 1', 'Cooked Snacks dish number 1', 'c10_i1.jpg', 10, 19.47, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(182, 'Snacks Item 2', 'Cooked Snacks dish number 2', 'c10_i2.jpg', 10, 8.84, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(183, 'Snacks Item 3', 'Cooked Snacks dish number 3', 'c10_i3.jpg', 10, 6.22, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(184, 'Snacks Item 4', 'Cooked Snacks dish number 4', 'c10_i4.jpg', 10, 15.08, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(185, 'Snacks Item 5', 'Cooked Snacks dish number 5', 'c10_i5.jpg', 10, 15.50, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(186, 'Snacks Item 6', 'Cooked Snacks dish number 6', 'c10_i6.jpg', 10, 8.22, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(187, 'Snacks Item 7', 'Cooked Snacks dish number 7', 'c10_i7.jpg', 10, 18.83, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(188, 'Snacks Item 8', 'Cooked Snacks dish number 8', 'c10_i8.jpg', 10, 17.59, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(189, 'Snacks Item 9', 'Cooked Snacks dish number 9', 'c10_i9.jpg', 10, 15.19, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(190, 'Snacks Item 10', 'Cooked Snacks dish number 10', 'c10_i10.jpg', 10, 7.97, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(191, 'Snacks Item 11', 'Cooked Snacks dish number 11', 'c10_i11.jpg', 10, 5.98, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(192, 'Snacks Item 12', 'Cooked Snacks dish number 12', 'c10_i12.jpg', 10, 17.95, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(193, 'Snacks Item 13', 'Cooked Snacks dish number 13', 'c10_i13.jpg', 10, 18.89, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(194, 'Snacks Item 14', 'Cooked Snacks dish number 14', 'c10_i14.jpg', 10, 2.64, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(195, 'Snacks Item 15', 'Cooked Snacks dish number 15', 'c10_i15.jpg', 10, 12.83, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(196, 'Snacks Item 16', 'Cooked Snacks dish number 16', 'c10_i16.jpg', 10, 12.22, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(197, 'Snacks Item 17', 'Cooked Snacks dish number 17', 'c10_i17.jpg', 10, 7.24, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(198, 'Snacks Item 18', 'Cooked Snacks dish number 18', 'c10_i18.jpg', 10, 12.84, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(199, 'Snacks Item 19', 'Cooked Snacks dish number 19', 'c10_i19.jpg', 10, 19.40, '2026-07-17 10:55:52', '2026-07-17 10:55:52'),
(200, 'Snacks Item 20', 'Cooked Snacks dish number 20', 'c10_i20.jpg', 10, 4.02, '2026-07-17 10:55:52', '2026-07-17 10:55:52');

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
(14, '2026_07_03_000000_alter_item_description_to_text', 1),
(15, '2026_07_03_000001_create_sliders_table', 1),
(16, '2026_07_03_100000_create_order_cancel_requests_table', 1),
(17, '2026_07_17_000000_create_permissions_table', 1);

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
  `order_payment_method` varchar(255) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `order_position` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_person_name` varchar(255) NOT NULL,
  `order_person_mobile` varchar(255) NOT NULL,
  `order_total_person` varchar(255) NOT NULL,
  `order_table_no` varchar(255) NOT NULL,
  `order_contact_name` varchar(255) NOT NULL,
  `order_contact_mobile` varchar(255) NOT NULL,
  `order_contact_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel_requests`
--

CREATE TABLE `order_cancel_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cancel_reason` text NOT NULL,
  `admin_description` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(6, 'User.View', 'View users', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(7, 'User.Create', 'Create users', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(8, 'User.Update', 'Update users', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(9, 'User.Delete', 'Delete users', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(10, 'Role.View', 'View roles', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(11, 'Role.Create', 'Create roles', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(12, 'Role.Update', 'Update roles', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(13, 'Role.Delete', 'Delete roles', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(14, 'Category.View', 'View categories', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(15, 'Category.Create', 'Create categories', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(16, 'Category.Update', 'Update categories', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(17, 'Category.Delete', 'Delete categories', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(18, 'Item.View', 'View items', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(19, 'Item.Create', 'Create items', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(20, 'Item.Update', 'Update items', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(21, 'Item.Delete', 'Delete items', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(22, 'Slider.View', 'View sliders', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(23, 'Slider.Create', 'Create sliders', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(24, 'Slider.Update', 'Update sliders', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(25, 'Slider.Delete', 'Delete sliders', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(26, 'Order.View', 'View orders (new / processing / completed lists & detail)', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(27, 'Order.Create', 'Place an order', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(28, 'Order.Process', 'Move an order to Processing', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(29, 'Order.Complete', 'Mark an order Completed', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(30, 'Order.Paid', 'Mark an order Paid', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(31, 'Order.Cancel', 'Cancel an order', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(32, 'CancelRequest.Create', 'Submit an order cancel request', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(33, 'CancelRequest.View', 'View order cancel requests', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(34, 'CancelRequest.Approve', 'Approve a cancel request', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(35, 'CancelRequest.Reject', 'Reject a cancel request', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(36, 'Review.View', 'View reviews', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(37, 'Review.Create', 'Post a review', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(38, 'Profile.View', 'View own profile', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(39, 'Profile.Update', 'Update own profile / image', '2026-07-17 10:55:50', '2026-07-17 10:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 6, 6, NULL, NULL),
(7, 7, 6, NULL, NULL),
(8, 8, 6, NULL, NULL),
(9, 9, 6, NULL, NULL),
(10, 10, 6, NULL, NULL),
(11, 11, 6, NULL, NULL),
(12, 12, 6, NULL, NULL),
(13, 13, 6, NULL, NULL),
(14, 14, 6, NULL, NULL),
(15, 15, 6, NULL, NULL),
(16, 16, 6, NULL, NULL),
(17, 17, 6, NULL, NULL),
(18, 18, 6, NULL, NULL),
(19, 19, 6, NULL, NULL),
(20, 20, 6, NULL, NULL),
(21, 21, 6, NULL, NULL),
(22, 22, 6, NULL, NULL),
(23, 23, 6, NULL, NULL),
(24, 24, 6, NULL, NULL),
(25, 25, 6, NULL, NULL),
(26, 26, 6, NULL, NULL),
(27, 27, 6, NULL, NULL),
(28, 28, 6, NULL, NULL),
(29, 29, 6, NULL, NULL),
(30, 30, 6, NULL, NULL),
(31, 31, 6, NULL, NULL),
(32, 32, 6, NULL, NULL),
(33, 33, 6, NULL, NULL),
(34, 34, 6, NULL, NULL),
(35, 35, 6, NULL, NULL),
(36, 36, 6, NULL, NULL),
(37, 37, 6, NULL, NULL),
(38, 38, 6, NULL, NULL),
(39, 39, 6, NULL, NULL),
(40, 6, 7, NULL, NULL),
(41, 7, 7, NULL, NULL),
(42, 8, 7, NULL, NULL),
(43, 9, 7, NULL, NULL),
(44, 10, 7, NULL, NULL),
(45, 11, 7, NULL, NULL),
(46, 12, 7, NULL, NULL),
(47, 13, 7, NULL, NULL),
(48, 14, 7, NULL, NULL),
(49, 15, 7, NULL, NULL),
(50, 16, 7, NULL, NULL),
(51, 17, 7, NULL, NULL),
(52, 18, 7, NULL, NULL),
(53, 19, 7, NULL, NULL),
(54, 20, 7, NULL, NULL),
(55, 21, 7, NULL, NULL),
(56, 22, 7, NULL, NULL),
(57, 23, 7, NULL, NULL),
(58, 24, 7, NULL, NULL),
(59, 25, 7, NULL, NULL),
(60, 26, 7, NULL, NULL),
(61, 27, 7, NULL, NULL),
(62, 28, 7, NULL, NULL),
(63, 29, 7, NULL, NULL),
(64, 30, 7, NULL, NULL),
(65, 31, 7, NULL, NULL),
(66, 32, 7, NULL, NULL),
(67, 33, 7, NULL, NULL),
(68, 34, 7, NULL, NULL),
(69, 35, 7, NULL, NULL),
(70, 36, 7, NULL, NULL),
(71, 37, 7, NULL, NULL),
(72, 38, 7, NULL, NULL),
(73, 39, 7, NULL, NULL),
(77, 32, 8, NULL, NULL),
(78, 36, 8, NULL, NULL),
(79, 37, 8, NULL, NULL),
(80, 38, 8, NULL, NULL),
(81, 39, 8, NULL, NULL),
(82, 14, 9, NULL, NULL),
(83, 18, 9, NULL, NULL),
(84, 19, 9, NULL, NULL),
(85, 20, 9, NULL, NULL),
(86, 22, 9, NULL, NULL),
(87, 26, 9, NULL, NULL),
(88, 28, 9, NULL, NULL),
(89, 29, 9, NULL, NULL),
(90, 30, 9, NULL, NULL),
(91, 31, 9, NULL, NULL),
(92, 33, 9, NULL, NULL),
(93, 34, 9, NULL, NULL),
(94, 35, 9, NULL, NULL),
(95, 36, 9, NULL, NULL),
(96, 38, 9, NULL, NULL),
(97, 39, 9, NULL, NULL);

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
(6, 'super_admin', 'Super Administrator', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(7, 'admin', 'Administrator', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(8, 'customer', 'Customer', '2026-07-17 10:55:50', '2026-07-17 10:55:50'),
(9, 'manager', 'Manager', '2026-07-17 10:55:50', '2026-07-17 10:55:50');

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
(4, 6),
(5, 7),
(6, 9),
(7, 9),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(16, 8),
(17, 8);

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
(4, 'superadmin', 'superadmin@example.com', NULL, '$2y$10$WwU9zqQR3aMK5m81K7dBJuGMVKqe7eFdW8s8Lqwix7/3cqiac/SBy', 'avatar5.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$10$goFIQwqusSVYZrqPt2N4Uu9W1CnML4J5o4n4IIZ8eTgji/yuYfpTq', 'avatar5.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(6, 'manager1', 'manager1@example.com', NULL, '$2y$10$onlb5zK7E8XXeOF0iX8Q1udlbKDP9NGcgomLkNco1YrhEmYI49aBO', 'manager1.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(7, 'manager2', 'manager2@example.com', NULL, '$2y$10$RQrM.sdrXvSCaJEhwOpD1.H7NO9jhGcQBOqr4VUGOKiq5XugoKYPi', 'manager2.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(8, 'customer1', 'customer1@example.com', NULL, '$2y$10$RjAGbeorU.i0XRVR.K37jO4yoTL.TlI.1ZYBwWnrnYEpkv4DqKA8S', 'customer1.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(9, 'customer2', 'customer2@example.com', NULL, '$2y$10$IrBUP7BZZnrty6G6uEApt.DE5NfNxP2hPLxxL0p6uHptWgiLa4HuS', 'customer2.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(10, 'customer3', 'customer3@example.com', NULL, '$2y$10$o8hbIG4moUAzv6vw66EP4e05WQLIkTsaXuXV96yXEEbXtEilllEEi', 'customer3.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(11, 'customer4', 'customer4@example.com', NULL, '$2y$10$nyac1eFyUnEczlufUX.gbeo7cJ8QjJGgpxv6m/Gha9T0tgVXSnwA6', 'customer4.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(12, 'customer5', 'customer5@example.com', NULL, '$2y$10$8VzMCcQpShd1r64cdQDbGuTb/jZ5i1vQwG2UsGPt.YOdopc5Djh5q', 'customer5.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(13, 'customer6', 'customer6@example.com', NULL, '$2y$10$YJfRYIDlB9CJxEv8.zdxt.HtaKbscfHmiuN/180uGXgkazU7S.T3m', 'customer6.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(14, 'customer7', 'customer7@example.com', NULL, '$2y$10$/QQf0fFkcegFVUPVP9GY2eSal7MV8uoJBJ1Pn0RRNNpUuFKkJWdwK', 'customer7.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(15, 'customer8', 'customer8@example.com', NULL, '$2y$10$ZhS5d7nAED3vg7D4xS0lzeKbtwxMccz.w7dZGXcdO09CK1WkBjfXC', 'customer8.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(16, 'customer9', 'customer9@example.com', NULL, '$2y$10$BFwr0Nz/X2SzYZMRt5OvSuBOoxVjesWKVKAZ75CezrmWUfeGSiryy', 'customer9.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51'),
(17, 'customer10', 'customer10@example.com', NULL, '$2y$10$fRZdBFJGNiyCaj2p5VLuxeGQgH1vCqxpxQC1wsrCOMThGZeleDEYi', 'customer10.png', NULL, '2026-07-17 10:55:51', '2026-07-17 10:55:51');

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
-- Indexes for table `order_cancel_requests`
--
ALTER TABLE `order_cancel_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_cancel_requests_order_id_foreign` (`order_id`),
  ADD KEY `order_cancel_requests_user_id_foreign` (`user_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `item_prices`
--
ALTER TABLE `item_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_cancel_requests`
--
ALTER TABLE `order_cancel_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `order_cancel_requests`
--
ALTER TABLE `order_cancel_requests`
  ADD CONSTRAINT `order_cancel_requests_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_cancel_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
