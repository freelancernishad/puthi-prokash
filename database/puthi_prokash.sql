-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 06:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puthi_prokash`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `index_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_id`, `name`, `slug`, `parent_id`, `index_number`, `created_at`, `updated_at`) VALUES
(16, '1234', 'name2333', 'name2', NULL, 1, '2023-05-28 12:05:23', '2023-05-28 17:11:36'),
(17, '1234', 'name2', 'name2', 16, 1, '2023-05-28 12:05:24', '2023-05-28 12:05:24'),
(18, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:05:26', '2023-05-28 12:05:26'),
(19, '1234', 'name2', 'name2', 18, 1, '2023-05-28 12:05:27', '2023-05-28 17:11:50'),
(20, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:05:28', '2023-05-28 12:05:28'),
(21, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:05:30', '2023-05-28 12:05:30'),
(22, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:05:31', '2023-05-28 12:05:31'),
(27, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:07', '2023-05-28 12:22:07'),
(28, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:09', '2023-05-28 12:22:09'),
(29, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:11', '2023-05-28 12:22:11'),
(30, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:12', '2023-05-28 12:22:12'),
(31, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:14', '2023-05-28 12:22:14'),
(32, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:15', '2023-05-28 12:22:15'),
(33, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:16', '2023-05-28 12:22:16'),
(34, '1234', 'name2', 'name2', NULL, 1, '2023-05-28 12:22:18', '2023-05-28 12:22:18'),
(50, '1234', 'hello', 'hello', NULL, 1, '2023-05-28 16:42:50', '2023-05-28 16:42:50'),
(51, '1234', 'rfsfr', 'rfsfr', NULL, 1, '2023-05-28 16:43:39', '2023-05-28 16:43:39'),
(52, '1234', 'ewrrt', 'ewrrt', NULL, 1, '2023-05-28 16:44:26', '2023-05-28 16:44:26'),
(53, '1234', 'tyryy', 'tyryy', NULL, 1, '2023-05-28 16:44:42', '2023-05-28 16:44:42'),
(55, '1234', 'fff', 'fff', NULL, 1, '2023-05-29 10:17:23', '2023-05-29 10:17:23'),
(56, '1234', 'Product Name', 'Product Slug', NULL, 1, '2023-05-29 18:30:43', '2023-05-29 18:30:43'),
(57, '1234', 'sdf', 'dfgdfg', NULL, 1, '2023-05-29 18:39:44', '2023-05-29 18:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image_path`, `created_at`, `updated_at`) VALUES
(12, 16, 'uploaded/category/image/2023/05/29/1685353677____52883.jpeg', '2023-05-29 09:47:57', '2023-05-29 09:47:57'),
(13, 16, 'uploaded/category/image/2023/05/29/1685353677____46255.jpeg', '2023-05-29 09:47:57', '2023-05-29 09:47:57'),
(14, 55, 'uploaded/category/image/2023/05/29/1685355787____56845.jpeg', '2023-05-29 10:23:07', '2023-05-29 10:23:07'),
(15, 55, 'uploaded/category/image/2023/05/29/1685355787____40028.jpeg', '2023-05-29 10:23:07', '2023-05-29 10:23:07'),
(16, 55, 'uploaded/category/image/2023/05/29/1685355787____68810.png', '2023-05-29 10:23:07', '2023-05-29 10:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(16, 10, NULL, NULL),
(16, 11, NULL, NULL),
(16, 12, NULL, NULL),
(16, 13, NULL, NULL),
(16, 14, NULL, NULL),
(16, 15, NULL, NULL),
(16, 16, NULL, NULL),
(16, 18, NULL, NULL),
(17, 18, NULL, NULL),
(18, 18, NULL, NULL),
(21, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flipping_books`
--

CREATE TABLE `flipping_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flipping_books`
--

INSERT INTO `flipping_books` (`id`, `name`, `slug`, `page`, `image`, `type`, `status`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 'page 1', 'page-1', NULL, 'uploaded/products/fliping/2023/05/31/1685551033____15050.jpeg', NULL, NULL, 10, '2023-05-31 16:37:13', '2023-05-31 16:37:13'),
(5, 'page2', 'page2', NULL, 'uploaded/products/fliping/2023/05/31/1685551033____67003.jpeg', NULL, NULL, 10, '2023-05-31 16:37:13', '2023-05-31 16:37:13'),
(6, 'page 3', 'page-3', NULL, 'uploaded/products/fliping/2023/05/31/1685551033____92155.jpeg', NULL, NULL, 10, '2023-05-31 16:37:13', '2023-05-31 16:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'title', 'fg', '2023-05-26 18:12:32', '2023-05-29 20:17:16'),
(3, 'title', NULL, '2023-05-26 18:16:44', '2023-05-26 18:16:44'),
(4, 'sdfsfdsdf', NULL, '2023-05-29 20:07:07', '2023-05-29 20:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_path`, `created_at`, `updated_at`) VALUES
(3, 4, 'uploaded/gallery/image/2023/05/30/1685391128____78070.jpeg', '2023-05-29 20:12:08', '2023-05-29 20:12:08'),
(4, 1, 'uploaded/gallery/image/2023/05/30/1685391568____51967.png', '2023-05-29 20:19:28', '2023-05-29 20:19:28'),
(5, 1, 'uploaded/gallery/image/2023/05/30/1685391568____24328.jpeg', '2023-05-29 20:19:28', '2023-05-29 20:19:28'),
(6, 3, 'uploaded/gallery/image/2023/05/30/1685391579____93894.jpeg', '2023-05-29 20:19:39', '2023-05-29 20:19:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_05_25_165528_create_categories_table', 2),
(11, '2023_05_25_170137_create_products_table', 2),
(12, '2023_05_25_171019_create_product_images_table', 2),
(14, '2023_05_25_211914_create_category_product_table', 3),
(15, '2023_05_26_155316_create_carts_table', 4),
(16, '2023_05_26_164157_create_orders_table', 5),
(17, '2023_05_26_165746_create_order_product_table', 6),
(18, '2023_05_26_174353_add_status_to_orders', 7),
(19, '2023_05_26_230046_create_payments_table', 8),
(20, '2023_05_26_235857_create_galleries_table', 9),
(21, '2023_05_26_235909_create_gallery_images_table', 9),
(22, '2023_05_29_120624_create_category_images_table', 10),
(23, '2023_05_31_144610_create_flipping_books_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('14d2e1d02fa0a227c2c07526c8266c631a6ad9e4a8f0c3c3a78c65f27a87f540b97cac737ac6c9da', 1, 1, 'accessToken', '[]', 0, '2023-05-31 16:04:34', '2023-05-31 16:04:34', '2024-05-31 22:04:34'),
('1c14bb8f299954f256294396ced3f3bf6573988586efc7b8bc741bec9345fed51db0ab96800ea1d2', 1, 1, 'accessToken', '[]', 0, '2023-05-28 15:01:46', '2023-05-28 15:01:46', '2024-05-28 21:01:46'),
('43d4a42d3040ed1c402191c47fa3d95478199f47585dea9eda8f0a00e2d5d3bc085f134934ff35c0', 1, 1, 'accessToken', '[]', 0, '2023-05-29 17:40:30', '2023-05-29 17:40:30', '2024-05-29 23:40:30'),
('9d89ed79d096d18769329ab6aa22ef35c69649c1af396ee4b079feec33c518cc07de321271fb78c9', 1, 1, 'accessToken', '[]', 0, '2023-05-15 14:50:07', '2023-05-15 14:50:07', '2024-05-15 20:50:07'),
('a245fb578664c29152014474e5e300d52aceda83cfd3756ae87f674851bcab23814c62356638bf7f', 1, 1, 'accessToken', '[]', 0, '2023-05-28 10:06:56', '2023-05-28 10:06:56', '2024-05-28 16:06:56'),
('b0ed77e659e07046cf90c83af6057192dd1af8d1d1ea7df752b9d60ab159bb4501480f03599caaa8', 1, 1, 'accessToken', '[]', 0, '2023-05-25 10:30:21', '2023-05-25 10:30:21', '2024-05-25 16:30:21'),
('c34fa4d27e73cf9365ebbb0e1c095198a01dc6e83528ebe9dc478a8b8b1c0b663e03a76d1d325b87', 1, 1, 'accessToken', '[]', 0, '2023-05-15 17:40:17', '2023-05-15 17:40:17', '2024-05-15 23:40:17'),
('ee3fcf3389028286be48a24655ec151c65d227a74ec966ab59c615ded3ace73b1cee062b2e7dd061', 1, 1, 'accessToken', '[]', 0, '2023-05-29 04:26:54', '2023-05-29 04:26:54', '2024-05-29 10:26:54'),
('f151f64313e4ebeeafa995d532ae1e8355793d5311baada9e72f6a4ac328079334354d8b9783ce39', 1, 1, 'accessToken', '[]', 0, '2023-05-27 17:18:03', '2023-05-27 17:18:03', '2024-05-27 23:18:03'),
('f4dea12229648d3d0b7a4106d256860309d9beda83e99f65c4e2819b44bc268eb5086ffc26b25bca', 1, 1, 'accessToken', '[]', 0, '2023-05-31 08:29:09', '2023-05-31 08:29:09', '2024-05-31 14:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel8.2 Personal Access Client', 'eLUoLOJlls6TE1t27fbDaz4v19Y5Fi9FpdctJtCR', NULL, 'http://localhost', 1, 0, 0, '2023-05-15 14:49:22', '2023-05-15 14:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-15 14:49:22', '2023-05-15 14:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','processing','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `total_quantity`, `created_at`, `updated_at`, `status`) VALUES
(7, 1, '4000.00', 20, '2023-05-26 11:47:34', '2023-05-26 11:51:04', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_ipn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `trx_id`, `trx_date`, `trx_month`, `trx_year`, `amount`, `payment_status`, `payment_url`, `payment_ipn`, `created_at`, `updated_at`) VALUES
(1, 7, 'mMwOWKifWG', '2023-05-26', 'May', '2023', '4000.00', 'Pending', 'payment url', 'payment_ipn', '2023-05-26 17:41:11', '2023-05-26 17:41:11'),
(2, 7, 'Yc8RbsvgaF', '2023-05-26', 'May', '2023', '4000.00', 'Pending', 'payment url', 'payment_ipn', '2023-05-26 17:41:17', '2023-05-26 17:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `visit` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `category_id`, `name`, `slug`, `short_description`, `description`, `price`, `visit`, `share`, `buy`, `image`, `created_at`, `updated_at`) VALUES
(10, '123', 16, 'book3', 'slug', 'short_description', '<p>description</p>', 200, 0, 0, 0, 'image', '2023-05-29 17:42:11', '2023-05-29 19:37:37'),
(11, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:14', '2023-05-29 17:42:14'),
(12, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:16', '2023-05-29 17:42:16'),
(13, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:19', '2023-05-29 17:42:19'),
(14, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:20', '2023-05-29 17:42:20'),
(15, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:21', '2023-05-29 17:42:21'),
(16, '123', 16, 'book3', 'slug', 'short_description', 'description', 200, 0, 0, 0, 'image', '2023-05-29 17:42:22', '2023-05-29 17:42:22'),
(18, '123', 16, 'book3', 'slug', 'short_description', '<p>description</p>', 200, 0, 0, 0, 'image', '2023-05-29 17:43:01', '2023-05-29 19:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(18, 11, 'product_images/RefaWH7NPP8McPPZKKhgVfLQtWNS0ovgTgQy9w8r.png', '2023-05-29 17:42:14', '2023-05-29 17:42:14'),
(19, 12, 'product_images/7miYkncSeiOujksJ6tyAYEXm2HzP4wHAjBgdiFE4.png', '2023-05-29 17:42:16', '2023-05-29 17:42:16'),
(20, 13, 'product_images/8eoiAUAFZ4RvlOz7s15O9ggroT4offGW5r1jMbpy.png', '2023-05-29 17:42:19', '2023-05-29 17:42:19'),
(21, 14, 'product_images/Wl1UKlPl1lQgguoqO5ieqPFlmUH0orYxfdtvB7yH.png', '2023-05-29 17:42:20', '2023-05-29 17:42:20'),
(22, 15, 'product_images/L393Rb0sb2pl9CEnJsi72jTUyCL5DfNZGjAK4LaG.png', '2023-05-29 17:42:21', '2023-05-29 17:42:21'),
(23, 16, 'product_images/PCf1hOEhawnQTMEniCxArJeto1PjbUZMY41QFduW.png', '2023-05-29 17:42:22', '2023-05-29 17:42:22'),
(28, 10, 'uploaded/category/image/2023/05/30/1685387272____48063.jpeg', '2023-05-29 19:07:52', '2023-05-29 19:07:52'),
(29, 18, 'uploaded/category/image/2023/05/30/1685389102____78575.jpeg', '2023-05-29 19:38:22', '2023-05-29 19:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permisions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `position`, `description`, `permisions`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Freelancer Nishad', 'freelancernishad123@gmail.com', NULL, '$2y$10$.0KQTz0eCZn94WQtls6qfuhz3bqs0va/QjU.oa5XCcvFhW.t/6cDi', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, '2023-05-15 14:39:21', '2023-05-15 14:39:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_images_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_id`,`product_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flipping_books`
--
ALTER TABLE `flipping_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flipping_books_product_id_foreign` (`product_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flipping_books`
--
ALTER TABLE `flipping_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_images`
--
ALTER TABLE `category_images`
  ADD CONSTRAINT `category_images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flipping_books`
--
ALTER TABLE `flipping_books`
  ADD CONSTRAINT `flipping_books_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
