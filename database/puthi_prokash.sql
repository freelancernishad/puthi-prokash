-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 08:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `user_id` varchar(200) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(43, '18a2394bc9b1e150a6c', 28, 1, '2023-08-23 18:28:56', '2023-08-23 18:28:56'),
(44, '54', 28, 1, '2023-08-23 18:31:09', '2023-08-23 18:31:09'),
(45, '18a23aa67fc28dfcc0', 28, 1, '2023-08-23 18:31:32', '2023-08-23 18:31:32'),
(46, '18a23b007982bc11b31', 28, 1, '2023-08-23 18:40:48', '2023-08-23 18:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `index_number` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_id`, `name`, `slug`, `icon`, `index_number`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, '1234', 'একাডেমিক বই', 'ekaaddemik-bi', 'uploaded/products/featured/2023/07/29/1690609315____47107.png', '1', NULL, '2023-07-14 09:15:19', '2023-08-05 15:59:58'),
(3, '1234', 'সৃজনশীল বই', 'srjnshiil-bi', 'uploaded/products/featured/2023/07/29/1690609989____91901.png', '1', NULL, '2023-07-14 09:15:42', '2023-08-05 16:01:02'),
(4, '1234', 'মাল্টিমিডিয়া', 'multimedia', 'uploaded/products/featured/2023/07/29/1690609996____23593.png', '1', NULL, '2023-07-14 09:16:21', '2023-07-29 05:53:16'),
(6, '1234', 'নার্সারি শ্রেণী', 'nursery-class', 'uploaded/products/featured/2023/07/29/1690610004____75932.png', '1', 2, '2023-07-15 06:28:13', '2023-07-29 05:53:24'),
(7, '1234', 'কেজি শ্রেণী', 'kg-class', 'uploaded/products/featured/2023/07/29/1690610012____65824.png', '1', 2, '2023-07-15 06:28:39', '2023-07-29 05:53:32'),
(8, '1234', 'test', 'test', 'uploaded/products/featured/2023/07/29/1690610021____92051.png', '1', NULL, '2023-07-15 07:15:52', '2023-07-29 05:53:41'),
(9, '1234', 'test2', 'test2', 'uploaded/products/featured/2023/07/29/1690610029____25242.png', '1', 8, '2023-07-15 07:17:36', '2023-07-29 05:53:49'),
(10, '1234', 'শিশুতোষ', 'childish', 'uploaded/products/featured/2023/07/29/1690610039____89229.png', '1', 2, '2023-07-29 01:40:48', '2023-07-29 05:53:59'),
(11, '1234', 'কিশোর ক্লাসিক', 'child_class', 'uploaded/products/featured/2023/07/29/1690610046____70759.png', '1', 2, '2023-07-29 01:44:05', '2023-07-29 05:54:06'),
(12, '1234', 'উপন্যাস', 'upo', 'uploaded/products/featured/2023/07/29/1690610054____79946.png', '1', 2, '2023-07-29 01:45:26', '2023-07-29 05:54:14'),
(13, '1234', 'প্রবন্ধ', 'prob', 'uploaded/products/featured/2023/07/29/1690610064____54082.png', '1', 2, '2023-07-29 01:46:19', '2023-07-29 05:54:24'),
(14, '1234', 'শিক্ষা বিষয়ক', 'shiksha', 'uploaded/products/featured/2023/07/29/1690610072____54231.png', '1', 2, '2023-07-29 01:46:46', '2023-07-29 05:54:32'),
(15, '1234', 'শিল্প ও সংস্কৃতি', 'shilpo', 'uploaded/products/featured/2023/07/29/1690610081____38249.png', '1', 2, '2023-07-29 01:47:09', '2023-07-29 05:54:41'),
(16, '1234', 'ঐতিহ্য', 'oitisho', 'uploaded/products/featured/2023/07/29/1690610089____81148.png', '1', 2, '2023-07-29 01:48:37', '2023-07-29 05:54:49'),
(17, '1234', 'শিশু বিকাশ', 'shbik', 'uploaded/products/featured/2023/07/29/1690610097____87038.png', '1', 2, '2023-07-29 01:49:15', '2023-07-29 05:54:57'),
(18, '1234', 'কমিকস', 'comic', 'uploaded/products/featured/2023/07/29/1690610105____85742.png', '1', 2, '2023-07-29 01:50:03', '2023-07-29 05:55:05'),
(19, '1234', 'বয়স ০-৩', '03', 'uploaded/products/featured/2023/07/29/1690610113____36331.png', '1', 2, '2023-07-29 01:51:26', '2023-07-29 05:55:13'),
(20, '1234', 'বয়স ৪-৬', '46', 'uploaded/products/featured/2023/07/29/1690610122____97002.png', '1', 2, '2023-07-29 01:51:53', '2023-07-29 05:55:22'),
(22, '1234', 'বড়দের বই', 'books-for-adults', 'uploaded/products/featured/2023/07/29/1690614956____83160.png', '1', 2, '2023-07-29 07:15:56', '2023-07-29 07:15:56'),
(23, '1234', 'dd', 'dd', '', '1', NULL, '2023-08-04 16:05:08', '2023-08-04 16:05:08'),
(24, '1234', 'শ্রেষ্ঠ প্রবন্ধ সিরিজ', 'shresstth-prbndh-sirij', '', '1', 3, '2023-08-05 15:44:57', '2023-08-05 15:44:57'),
(25, '1234', 'ক্রীড়াজগৎ', 'kriirraajg', '', '1', 3, '2023-08-05 15:45:09', '2023-08-05 15:46:07'),
(26, '1234', 'নির্বাচিত প্রবন্ধ', 'nirbaacit-prbndh', '', '1', 3, '2023-08-05 15:45:21', '2023-08-05 15:46:18'),
(27, '1234', 'শিশু-কিশোর', 'shishu-kishor', '', '1', 3, '2023-08-05 15:45:40', '2023-08-05 15:46:27'),
(28, '1234', 'শ্রেষ্ঠ কবিতা', 'shresstth-kbitaa', '', '1', 3, '2023-08-05 15:45:53', '2023-08-05 15:45:53'),
(29, '1234', 'বিবিধ সমগ্র', 'bibidh-smgr', '', '1', 3, '2023-08-05 15:46:46', '2023-08-05 15:46:46'),
(30, '1234', 'গবেষণা', 'gbessnnaa', '', '1', 3, '2023-08-05 15:47:01', '2023-08-05 15:47:01'),
(31, '1234', 'উপন্যাস', 'upnyaas', '', '1', 3, '2023-08-05 15:47:10', '2023-08-05 15:47:10'),
(32, '1234', 'প্রবন্ধ', 'prbndh', '', '1', 3, '2023-08-05 15:47:18', '2023-08-05 15:47:18'),
(33, '1234', 'ভৌতিক গল্প', 'bhautik-glp', '', '1', 3, '2023-08-05 15:47:31', '2023-08-05 15:47:31'),
(34, '1234', 'প্রবন্ধ সংকলন', 'prbndh-snkln', '', '1', 3, '2023-08-05 15:47:40', '2023-08-05 15:47:40'),
(35, '1234', 'কাব্য সমালোচনা', 'kaaby-smaalocnaa', '', '1', 3, '2023-08-05 15:47:51', '2023-08-05 15:47:51'),
(36, '1234', 'কমিকস্', 'kmiks', '', '1', 3, '2023-08-05 15:48:01', '2023-08-05 15:48:01'),
(37, '1234', 'ভাষা আন্দোলন', 'bhaassaa-aandoln', '', '1', 3, '2023-08-05 15:48:11', '2023-08-05 15:48:11'),
(38, '1234', 'অভিধান', 'abhidhaan', '', '1', 3, '2023-08-05 15:48:21', '2023-08-05 15:48:21'),
(39, '1234', 'জীবনী গ্রন্থমালা', 'jiibnii-grnthmaalaa', '', '1', 3, '2023-08-05 15:48:32', '2023-08-05 15:48:32'),
(40, '1234', 'নাটক', 'naattk', '', '1', 3, '2023-08-05 15:48:43', '2023-08-05 15:48:43'),
(41, '1234', 'গণিত ও বিজ্ঞান', 'gnnit-o-bijnyaan', '', '1', 3, '2023-08-05 15:48:55', '2023-08-05 15:48:55'),
(42, '1234', 'প্যারাসাইকোলজি', 'pyaaraasaaikolji', '', '1', 3, '2023-08-05 15:49:05', '2023-08-05 15:49:05'),
(43, '1234', 'সাহিত্যসমালোচনা', 'saahitysmaalocnaa', '', '1', 3, '2023-08-05 15:49:15', '2023-08-05 15:49:15'),
(44, '1234', 'জীবন দর্শন', 'jiibn-drshn', '', '1', 3, '2023-08-05 15:49:28', '2023-08-05 15:49:28'),
(45, '1234', 'আন্তর্জাতিক রাজনীতি', 'aantrjaatik-raajniiti', '', '1', 3, '2023-08-05 15:49:38', '2023-08-05 15:49:38'),
(46, '1234', 'কিশোর উপন্যাস', 'kishor-upnyaas', '', '1', 3, '2023-08-05 15:49:48', '2023-08-05 15:49:48'),
(47, '1234', 'ব্যক্তিত্ব', 'byktitb', '', '1', 3, '2023-08-05 15:49:58', '2023-08-05 15:49:58'),
(48, '1234', 'বইমেলা ২০২২', 'bimelaa-2022', '', '1', 3, '2023-08-05 15:50:10', '2023-08-05 15:50:10'),
(49, '1234', 'শিক্ষা', 'shikssaa', '', '1', 3, '2023-08-05 15:50:22', '2023-08-05 15:50:22'),
(50, '1234', 'সমাজ সংস্কৃতি রাজনীতি', 'smaaj-snskrti-raajniiti', '', '1', 3, '2023-08-05 15:50:32', '2023-08-05 15:50:32'),
(51, '1234', 'শিশু-শিক্ষা', 'shishu-shikssaa', '', '1', 3, '2023-08-05 15:50:42', '2023-08-05 15:50:42'),
(52, '1234', 'ধর্মবিষয়ক', 'dhrmbissyyk', '', '1', 3, '2023-08-05 15:50:53', '2023-08-05 15:50:53'),
(53, '1234', 'ভ্রমণ', 'bhrmnn', '', '1', 3, '2023-08-05 15:51:09', '2023-08-05 15:51:09'),
(54, '1234', 'রচনাবলি', 'rcnaabli', '', '1', 3, '2023-08-05 15:51:22', '2023-08-05 15:51:22'),
(55, '1234', 'কবিতা', 'kbitaa', '', '1', 3, '2023-08-05 15:51:36', '2023-08-05 15:51:36'),
(56, '1234', 'মুক্তিযুদ্ধ', 'muktiyuddh', '', '1', 3, '2023-08-05 15:51:57', '2023-08-05 15:51:57'),
(57, '1234', 'সম্পাদিত গ্রন্থ', 'smpaadit-grnth', '', '1', 3, '2023-08-05 15:52:09', '2023-08-05 15:52:09'),
(58, '1234', 'প্রবন্ধ-নিবন্ধ-গবেষণা', 'prbndh-nibndh-gbessnnaa', '', '1', 3, '2023-08-05 15:52:20', '2023-08-05 15:52:20'),
(59, '1234', 'রেফারেন্স/চিরায়ত', 'rephaarens-ciraayyt', '', '1', 3, '2023-08-05 15:52:36', '2023-08-05 15:52:36'),
(60, '1234', 'রবীন্দ্র-নজরুল', 'rbiindr-njrul', '', '1', 3, '2023-08-05 15:52:47', '2023-08-05 15:52:47'),
(61, '1234', 'বঙ্গবন্ধু : নানাপ্রসঙ্গ', 'bnggbndhu-naanaaprsngg', '', '1', 3, '2023-08-05 15:53:04', '2023-08-05 15:53:04'),
(62, '1234', 'অনুবাদ গ্রন্থ', 'anubaad-grnth', '', '1', 3, '2023-08-05 15:53:15', '2023-08-05 15:53:15'),
(63, '1234', 'ভাষা ও সাহিত্য', 'bhaassaa-o-saahity', '', '1', 3, '2023-08-05 15:53:26', '2023-08-05 15:53:26'),
(64, '1234', 'আত্মজীবনী/স্মৃতিকথা', 'aatmjiibnii-smrtikthaa', '', '1', 3, '2023-08-05 15:53:36', '2023-08-05 15:53:36'),
(65, '1234', 'সম্মাননা সংকলন/স্মরণগ্রন্থ', 'smmaannaa-snkln-smrnngrnth', '', '1', 3, '2023-08-05 15:53:49', '2023-08-05 15:53:49'),
(66, '1234', 'গণমাধ্যম ও চলচ্চিত্র', 'gnnmaadhym-o-clccitr', '', '1', 3, '2023-08-05 15:54:03', '2023-08-05 15:54:03'),
(67, '1234', 'স্বাস্থ্য ও চিকিৎসা', 'sbaasthy-o-cikisaa', '', '1', 3, '2023-08-05 15:54:16', '2023-08-05 15:54:16'),
(68, '1234', 'গল্প', 'glp', '', '1', 3, '2023-08-05 15:54:27', '2023-08-05 15:54:27'),
(69, '1234', 'বিজ্ঞান/সাধারণ জ্ঞান', 'bijnyaan-saadhaarnn-jnyaan', '', '1', 3, '2023-08-05 15:54:38', '2023-08-05 15:54:38'),
(70, '1234', 'সাক্ষাৎকার/নাটক', 'saakssaakaar-naattk', '', '1', 3, '2023-08-05 15:54:48', '2023-08-05 15:54:48'),
(71, '1234', 'প্রকৃতি ও পরিবেশ', 'prkrti-o-pribesh', '', '1', 3, '2023-08-05 15:54:57', '2023-08-05 15:54:57'),
(72, '1234', 'ইতিহাস', 'itihaas', 'uploaded/products/featured/2023/08/14/1692000495____30506.png', '1', 3, '2023-08-05 15:55:10', '2023-08-14 18:08:15'),
(73, '1234', 'রম্যরচনা', 'rmyrcnaa', 'uploaded/products/featured/2023/08/14/1692000489____26880.png', '1', 3, '2023-08-05 15:55:26', '2023-08-14 18:08:09'),
(74, '1234', 'রান্না', 'raannaa', 'uploaded/products/featured/2023/08/14/1692000482____73819.png', '1', 3, '2023-08-05 15:55:38', '2023-08-14 18:08:02'),
(75, '1234', 'কিশোর গল্প', 'kishor-glp', 'uploaded/products/featured/2023/08/14/1692000475____74156.png', '1', 3, '2023-08-05 15:55:47', '2023-08-14 18:07:55'),
(76, '1234', 'কিশোর রহস্য', 'kishor-rhsy', 'uploaded/products/featured/2023/08/14/1692000466____95050.png', '1', 3, '2023-08-05 15:55:59', '2023-08-14 18:07:46'),
(77, '1234', 'শিশিলিন কিশোর গোয়েন্দা সিরিজ', 'shishilin-kishor-goyyendaa-sirij', 'uploaded/products/featured/2023/08/14/1692000459____29963.png', '1', 3, '2023-08-05 15:56:08', '2023-08-14 18:07:39'),
(78, '1234', 'গোয়েন্দা কাহিনি', 'goyyendaa-kaahini', 'uploaded/products/featured/2023/08/14/1692000453____79304.png', '1', 3, '2023-08-05 15:56:21', '2023-08-14 18:07:33'),
(79, '1234', 'রূপকথা সিরিজ', 'ruupkthaa-sirij', 'uploaded/products/featured/2023/08/14/1692000446____77678.png', '1', 3, '2023-08-05 15:56:35', '2023-08-14 18:07:26'),
(80, '1234', 'ভৌতিক উপন্যাস', 'bhautik-upnyaas', 'uploaded/products/featured/2023/08/14/1692000439____63619.png', '1', 3, '2023-08-05 15:56:46', '2023-08-14 18:07:19'),
(81, '1234', 'সায়েন্স ফিকশন', 'saayyens-phikshn', 'uploaded/products/featured/2023/08/14/1692000429____37051.png', '1', 3, '2023-08-05 15:56:56', '2023-08-14 18:07:09'),
(82, '1234', 'ক্যারিয়ার', 'kyaariyyaar', 'uploaded/products/featured/2023/08/14/1692000421____44458.png', '1', 3, '2023-08-05 15:57:10', '2023-08-14 18:07:01'),
(83, '1234', 'প্লে', 'ple', '', '1', 10, '2023-08-15 20:58:34', '2023-08-15 20:58:34'),
(84, '1234', 'dxfgfg', 'dxfgfg', '', '1', NULL, '2023-08-18 09:25:49', '2023-08-18 09:25:49'),
(85, '1234', 'কমিকস1', 'kmiks1', '', '1', NULL, '2023-08-18 09:30:58', '2023-08-18 09:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `category_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 10, 'uploaded/category/image/2023/07/28/1690558989____60659.png', '2023-07-29 01:43:09', '2023-07-29 01:43:09'),
(2, 11, 'uploaded/category/image/2023/07/28/1690559692____33088.png', '2023-07-29 01:54:52', '2023-07-29 01:54:52'),
(3, 20, 'uploaded/category/image/2023/07/28/1690559706____34081.png', '2023-07-29 01:55:06', '2023-07-29 01:55:06'),
(4, 19, 'uploaded/category/image/2023/07/28/1690559715____23066.png', '2023-07-29 01:55:15', '2023-07-29 01:55:15'),
(5, 18, 'uploaded/category/image/2023/07/28/1690559725____56733.png', '2023-07-29 01:55:25', '2023-07-29 01:55:25'),
(6, 17, 'uploaded/category/image/2023/07/28/1690559737____48486.png', '2023-07-29 01:55:37', '2023-07-29 01:55:37');

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
(6, 27, NULL, NULL),
(10, 27, NULL, NULL),
(10, 28, NULL, NULL),
(10, 29, NULL, NULL),
(19, 27, NULL, NULL),
(19, 28, NULL, NULL),
(19, 29, NULL, NULL),
(27, 27, NULL, NULL),
(83, 28, NULL, NULL),
(83, 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight_from` decimal(65,2) NOT NULL,
  `weight_to` decimal(65,2) NOT NULL,
  `charge` decimal(65,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `weight_from`, `weight_to`, `charge`, `created_at`, `updated_at`) VALUES
(1, 1.00, 200.00, 10.00, '2023-08-28 05:26:33', '2023-08-28 05:42:35');

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
-- Table structure for table `feature_categories`
--

CREATE TABLE `feature_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_categories`
--

INSERT INTO `feature_categories` (`id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(2, 9, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(3, 15, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(4, 23, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(5, 26, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(6, 35, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(7, 39, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(8, 43, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(9, 13, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(10, 24, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(11, 27, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(12, 11, '2023-08-26 07:20:02', '2023-08-26 07:20:02'),
(13, 14, '2023-08-26 07:20:02', '2023-08-26 07:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `flipping_books`
--

CREATE TABLE `flipping_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flipping_books`
--

INSERT INTO `flipping_books` (`id`, `name`, `slug`, `page`, `image`, `type`, `status`, `product_id`, `created_at`, `updated_at`) VALUES
(223, 'Cover Page', 'Cover-Page', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____93030.jpeg', NULL, NULL, 27, '2023-08-15 18:00:23', '2023-08-15 18:00:23'),
(224, 'Press Information', 'Press-Information', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____51067.jpeg', NULL, NULL, 27, '2023-08-15 18:00:23', '2023-08-15 18:00:23'),
(225, '3. English Alphabet', '3.-English-Alphabet', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____42110.jpeg', NULL, NULL, 27, '2023-08-15 18:00:23', '2023-08-15 18:00:23'),
(226, '4. A, B', '4.-A,-B', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____22041.jpeg', NULL, NULL, 27, '2023-08-15 18:00:23', '2023-08-15 18:00:23'),
(227, '5. C, D', '5.-C,-D', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____54038.jpeg', NULL, NULL, 27, '2023-08-15 18:00:23', '2023-08-15 18:00:23'),
(228, '6. E, F', '6.-E,-F', NULL, 'uploaded/products/fliping/2023/08/15/1692086423____78336.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(229, '7. G, H', '7.-G,-H', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____11241.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(230, '8. I, J', '8.-I,-J', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____16675.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(231, '9. Practice the English Words', '9.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____54794.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(232, '10. Practice the English Words', '10.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____89167.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(233, '11. Practice the English Words', '11.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____45152.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(234, '12. Practice the English Words', '12.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____57363.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(235, '13. Practice the English Words', '13.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____63614.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(236, '14. K, L', '14.-K,-L', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____78722.jpeg', NULL, NULL, 27, '2023-08-15 18:00:24', '2023-08-15 18:00:24'),
(237, '15. M, N', '15.-M,-N', NULL, 'uploaded/products/fliping/2023/08/15/1692086424____73040.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(238, '16. O, P', '16.-O,-P', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____66959.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(239, '17. Q, R', '17.-Q,-R', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____58872.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(240, '18. Practice the English Words', '18.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____76846.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(241, '19. Practice the English Words', '19.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____80562.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(242, '20. Practice the English Words', '20.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____30058.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(243, '21. Practice the English Words', '21.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____53503.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(244, '22. Practice the English Words', '22.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____17051.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(245, '23. S, T', '23.-S,-T', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____73276.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(246, '24. U, V', '24.-U,-V', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____62232.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(247, '25. W, X', '25.-W,-X', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____14334.jpeg', NULL, NULL, 27, '2023-08-15 18:00:25', '2023-08-15 18:00:25'),
(248, '26. Y, Z', '26.-Y,-Z', NULL, 'uploaded/products/fliping/2023/08/15/1692086425____36873.jpeg', NULL, NULL, 27, '2023-08-15 18:00:26', '2023-08-15 18:00:26'),
(249, '27. Practice the English Words', '27.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086426____13432.jpeg', NULL, NULL, 27, '2023-08-15 18:00:26', '2023-08-15 18:00:26'),
(250, '28. Practice the English Words', '28.-Practice-the-English-Words', NULL, 'uploaded/products/fliping/2023/08/15/1692086426____47349.jpeg', NULL, NULL, 27, '2023-08-15 18:00:26', '2023-08-15 18:00:26'),
(251, '29. Cover page- End', '29.-Cover-page--End', NULL, 'uploaded/products/fliping/2023/08/15/1692086426____90015.jpeg', NULL, NULL, 27, '2023-08-15 18:00:26', '2023-08-15 18:00:26'),
(321, '০১', '০১', NULL, 'uploaded/products/fliping/2023/08/15/1692099516____52366.jpeg', NULL, NULL, 29, '2023-08-15 21:38:36', '2023-08-15 21:38:36'),
(322, '০২', '০২', NULL, 'uploaded/products/fliping/2023/08/15/1692099516____88349.jpeg', NULL, NULL, 29, '2023-08-15 21:38:36', '2023-08-15 21:38:36'),
(323, '০৩ - ০৮ সংখ্যার ধারণা', '০৩---০৮-সংখ্যার-ধারণা', NULL, 'uploaded/products/fliping/2023/08/15/1692099516____63479.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(324, '০৪', '০৪', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____35139.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(325, '০৫', '০৫', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____78225.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(326, '০৬', '০৬', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____68383.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(327, '০৭', '০৭', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____40106.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(328, '০৮', '০৮', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____18095.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(329, '০৯ - ১১ ছোট বড় চিনতে শিখ', '০৯---১১-ছোট-বড়-চিনতে-শিখ', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____34953.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(330, '১০', '১০', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____61723.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(331, '১১ মিলকরণ', '১১-মিলকরণ', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____22774.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(332, '১২ - ১৩ ছবি দেখে গুনতে শিখি', '১২---১৩-ছবি-দেখে-গুনতে-শিখি', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____88561.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(333, '১৩ - ১৪ অনুশীলন ১', '১৩---১৪-অনুশীলন-১', NULL, 'uploaded/products/fliping/2023/08/15/1692099517____51018.jpeg', NULL, NULL, 29, '2023-08-15 21:38:37', '2023-08-15 21:38:37'),
(334, '১৪', '১৪', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____32024.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(335, '১৫ - ১৬ সংখ্যার ধারণা', '১৫---১৬-সংখ্যার-ধারণা', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____21952.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(336, '১৬', '১৬', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____10689.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(337, '১৭ - ২০ সংখ্যার ধারণা', '১৭---২০-সংখ্যার-ধারণা', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____60047.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(338, '১৮', '১৮', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____11268.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(339, '১৯', '১৯', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____33182.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(340, '২০', '২০', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____44410.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(341, '২১ - জানি ও বুঝি', '২১---জানি-ও-বুঝি', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____13402.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(342, '২২ - ছবি গণনা করে সংখ্যা লিখি', '২২---ছবি-গণনা-করে-সংখ্যা-লিখি', NULL, 'uploaded/products/fliping/2023/08/15/1692099518____12499.jpeg', NULL, NULL, 29, '2023-08-15 21:38:38', '2023-08-15 21:38:38'),
(343, '২৩ - দাগ টেনে মিল করি', '২৩---দাগ-টেনে-মিল-করি', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____86025.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(344, '২৪ - টিক চিহ্ন', '২৪---টিক-চিহ্ন', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____20740.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(345, '২৫ - অনুশীলন ২', '২৫---অনুশীলন-২', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____56440.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(346, '২৬ - ছোট-বড়, কম-বেশি', '২৬---ছোট-বড়,-কম-বেশি', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____68100.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(347, '২৭ - যোগ বিয়োগ করি', '২৭---যোগ-বিয়োগ-করি', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____47682.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(348, '২৮ - জোড় বিজোড় সংখ্যা', '২৮---জোড়-বিজোড়-সংখ্যা', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____51896.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(349, '২৯ - আকৃতি শিখি ও রং করি', '২৯---আকৃতি-শিখি-ও-রং-করি', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____52809.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(350, '৩০ - গুণ অঙ্ক শিখি', '৩০---গুণ-অঙ্ক-শিখি', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____63815.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(351, '৩১ - বাংলা শতকিয়া', '৩১---বাংলা-শতকিয়া', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____45013.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(352, '৩২ - অনুশীলন ৩', '৩২---অনুশীলন-৩', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____16977.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(353, '৩৩', '৩৩', NULL, 'uploaded/products/fliping/2023/08/15/1692099519____32994.jpeg', NULL, NULL, 29, '2023-08-15 21:38:39', '2023-08-15 21:38:39'),
(354, '1', '1', NULL, 'uploaded/products/fliping/2023/08/15/1692100375____68615.jpeg', NULL, NULL, 28, '2023-08-15 21:52:55', '2023-08-15 21:52:55'),
(355, '2', '2', NULL, 'uploaded/products/fliping/2023/08/15/1692100375____17573.jpeg', NULL, NULL, 28, '2023-08-15 21:52:55', '2023-08-15 21:52:55'),
(356, '3 - 15  Lesson 1: Alphabet', '3---15--Lesson-1:-Alphabet', NULL, 'uploaded/products/fliping/2023/08/15/1692100375____93879.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(357, '4', '4', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____50145.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(358, '5', '5', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____57132.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(359, '6', '6', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____38476.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(360, '7', '7', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____75745.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(361, '8', '8', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____50664.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(362, '9', '9', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____10996.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(363, '10', '10', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____83023.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(364, '11', '11', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____85351.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(365, '12', '12', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____47054.jpeg', NULL, NULL, 28, '2023-08-15 21:52:56', '2023-08-15 21:52:56'),
(366, '13', '13', NULL, 'uploaded/products/fliping/2023/08/15/1692100376____48862.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(367, '14', '14', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____32141.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(368, '15', '15', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____82786.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(369, '16 - Lesson 2 & 3: Capital Letter', '16---Lesson-2-&-3:-Capital-Letter', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____13351.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(370, '17 - Lesson 4 & 5: Small Letter', '17---Lesson-4-&-5:-Small-Letter', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____49912.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(371, '18 - Lesson 6: ছবি দেখে বর্ণ শিখি', '18---Lesson-6:-ছবি-দেখে-বর্ণ-শিখি', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____88265.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(372, '19 - Lesson 7: মিলকরণ', '19---Lesson-7:-মিলকরণ', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____46883.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(373, '20 - Lesson 8: Word Puzzle', '20---Lesson-8:-Word-Puzzle', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____67370.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(374, '21 - Lesson 9: A E I O U ছন্দা মিলিয়ে পড়ি', '21---Lesson-9:-A-E-I-O-U-ছন্দা-মিলিয়ে-পড়ি', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____41250.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(375, '22 - Lesson 10: ছন্দা মিলিয়ে পড়ি', '22---Lesson-10:-ছন্দা-মিলিয়ে-পড়ি', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____52956.jpeg', NULL, NULL, 28, '2023-08-15 21:52:57', '2023-08-15 21:52:57'),
(376, '23 - Lesson 11 & 12: Flower and Fruits', '23---Lesson-11-&-12:-Flower-and-Fruits', NULL, 'uploaded/products/fliping/2023/08/15/1692100377____40131.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(377, '24 - Lesson 13 & 14: Animal and Birds', '24---Lesson-13-&-14:-Animal-and-Birds', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____69548.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(378, '25 - Lesson 15 & 16: Fish and Vegetables', '25---Lesson-15-&-16:-Fish-and-Vegetables', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____27833.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(379, '26 - Lesson 17: Rhymes', '26---Lesson-17:-Rhymes', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____11748.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(380, '27 - 28 Lesson 18: Conversation', '27---28-Lesson-18:-Conversation', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____77482.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(381, '28', '28', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____69443.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(382, '29 - Exercise-1', '29---Exercise-1', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____26394.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(383, '30 - Exercise-2', '30---Exercise-2', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____23971.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(384, '31 - Exercise-3', '31---Exercise-3', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____35062.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(385, '32', '32', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____87002.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(386, '33', '33', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____14410.jpeg', NULL, NULL, 28, '2023-08-15 21:52:58', '2023-08-15 21:52:58'),
(387, '34', '34', NULL, 'uploaded/products/fliping/2023/08/15/1692100378____82893.jpeg', NULL, NULL, 28, '2023-08-15 21:52:59', '2023-08-15 21:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'slider 1', NULL, '2023-08-03 17:43:59', '2023-08-03 17:43:59'),
(2, '1', '1', '2023-08-15 16:04:20', '2023-08-15 16:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploaded/gallery/image/2023/08/05/1691174082____81536.png', '2023-08-04 18:34:42', '2023-08-04 18:34:42'),
(2, 1, 'uploaded/gallery/image/2023/08/05/1691174082____99482.jpeg', '2023-08-04 18:34:42', '2023-08-04 18:34:42'),
(3, 1, 'uploaded/gallery/image/2023/08/05/1691174082____21971.jpeg', '2023-08-04 18:34:42', '2023-08-04 18:34:42'),
(4, 1, 'uploaded/gallery/image/2023/08/05/1691174082____69709.jpeg', '2023-08-04 18:34:42', '2023-08-04 18:34:42'),
(5, 1, 'uploaded/gallery/image/2023/08/05/1691174082____38277.jpeg', '2023-08-04 18:34:42', '2023-08-04 18:34:42'),
(6, 1, 'uploaded/gallery/image/2023/08/05/1691174082____75725.jpeg', '2023-08-04 18:34:42', '2023-08-04 18:34:42');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_05_25_165528_create_categories_table', 1),
(11, '2023_05_25_170137_create_products_table', 1),
(12, '2023_05_25_171019_create_product_images_table', 1),
(13, '2023_05_25_211914_create_category_product_table', 1),
(15, '2023_05_26_164157_create_orders_table', 1),
(16, '2023_05_26_165746_create_order_product_table', 1),
(17, '2023_05_26_230046_create_payments_table', 1),
(18, '2023_05_26_235857_create_galleries_table', 1),
(19, '2023_05_26_235909_create_gallery_images_table', 1),
(20, '2023_05_29_120624_create_category_images_table', 1),
(21, '2023_05_31_144610_create_flipping_books_table', 1),
(22, '2023_07_12_021015_add_discount_status_to_products_table', 2),
(23, '2023_07_12_021203_add_additional_columns_to_orders_table', 2),
(24, '2023_05_26_155316_create_carts_table', 3),
(25, '2023_07_24_141909_create_user_addresses_table', 4),
(26, '2023_08_03_230641_create_sliders_table', 5),
(27, '2023_08_04_004200_create_settings_table', 6),
(28, '2023_08_04_204334_create_feature_categories_table', 7),
(29, '2023_08_04_234047_create_pages_table', 8),
(30, '2023_08_05_235205_create_multimedia_table', 9),
(31, '2023_08_26_130805_create_the_book_of_puthiprakashes_table', 10),
(32, '2023_08_28_110514_create_delivery_charges_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `multimedia`
--

CREATE TABLE `multimedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `media_type` varchar(255) NOT NULL DEFAULT 'video',
  `media_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multimedia`
--

INSERT INTO `multimedia` (`id`, `title`, `description`, `media_type`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 'ertgrewert', NULL, 'video', 'uploaded/multimedia/2023/08/06/1691264391_pexels-artem-podrez-7234917 (2160p).mp4', '2023-08-05 19:39:51', '2023-08-05 19:39:51'),
(2, 'YouTube2', NULL, 'youtube', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/668nUCeBHyY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-08-05 19:43:33', '2023-08-05 20:04:52'),
(4, 'YouTube', NULL, 'youtube', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9ivPnx3oras\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-08-11 16:44:28', '2023-08-11 16:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03d13c1969bb97bb34a54277ef0d01238b9644e2ae2d03a9ad977a9d99d9cdc67ef511c3a9c09ca5', 1, 1, 'accessToken', '[]', 0, '2023-08-14 18:03:28', '2023-08-14 18:03:28', '2024-08-14 14:03:28'),
('071a386e813dffa1c551e72f99b1a4ee97211548089f4a702466696ec5cd7e4a1cdef4bebdcb54f1', 1, 1, 'accessToken', '[]', 0, '2023-07-22 06:09:38', '2023-07-22 06:09:38', '2024-07-22 12:09:38'),
('0fcc5f86f82ade3d23a20ac524cf45d4fba2364f8ff99d88049e03300d532ff9493f77e669ce1c8d', 63, 1, 'accessToken', '[]', 0, '2023-08-17 06:33:58', '2023-08-17 06:33:58', '2024-08-17 12:33:58'),
('146a5c4b613b25cff13d8aad0340a50c457da161b65aee4b6dfbfe136ebc433b97b60e3dd91cc1b0', 1, 1, 'accessToken', '[]', 0, '2023-07-30 06:27:55', '2023-07-30 06:27:55', '2024-07-30 12:27:55'),
('14a806fd264100600f7b2c0eec2a232c36d0653b30d51e32d2fb33ebb1a37b6cab92bc886e00938e', 63, 1, 'accessToken', '[]', 0, '2023-08-18 09:24:58', '2023-08-18 09:24:58', '2024-08-18 15:24:58'),
('1695cc9b5ecfcbd65c07d14840f9d785b7e91a20e1c1559250791d824701ad33b87fa14e6c06755e', 1, 1, 'accessToken', '[]', 0, '2023-08-11 16:40:59', '2023-08-11 16:40:59', '2024-08-11 22:40:59'),
('1764bb68d7053a9becd74c1d2153e98b536b8fc7824440916498ba705eefb7fb0934d2e28e7da1e6', 1, 1, 'accessToken', '[]', 0, '2023-08-04 14:56:28', '2023-08-04 14:56:28', '2024-08-04 20:56:28'),
('1a9c9827d1748f5238b02a6faf3c11245ea8ae223e72bb63172e24a374bf60d5a1565c686085d2dd', 1, 1, 'accessToken', '[]', 0, '2023-08-13 04:32:27', '2023-08-13 04:32:27', '2024-08-13 00:32:27'),
('1c43d3d880736e3ec55365bc6719406d265d9701d303f16332987084f928e411fb41fb52e58bdf40', 1, 1, 'accessToken', '[]', 0, '2023-07-29 01:38:48', '2023-07-29 01:38:48', '2024-07-28 21:38:48'),
('1ca31705d04aed4303fca8aeae4a692016f3859f9928e9530059c86dad2eb2aedf6b5c73c18c790f', 1, 1, 'accessToken', '[]', 0, '2023-07-26 10:35:27', '2023-07-26 10:35:27', '2024-07-26 16:35:27'),
('1f1cff9a25140c442172f38b3fba4fc8bbd655372d46ae94e43a80de24e9854558f762b3168c13ca', 63, 1, 'accessToken', '[]', 0, '2023-08-16 17:11:55', '2023-08-16 17:11:55', '2024-08-16 23:11:55'),
('223317f8cc6795f9cc6f5683f131537fbb0aafb7deedc0ebc9b6efcff0dc718f75a0a69f25f74f44', 2, 1, 'accessToken', '[]', 0, '2023-07-20 08:40:01', '2023-07-20 08:40:01', '2024-07-20 14:40:01'),
('25da90acfc8069f8952fe2ee5cfd8b953ffae7ae4f0af3ae7abd05934ad9e3a114492596223e2c14', 1, 1, 'accessToken', '[]', 0, '2023-08-14 18:30:55', '2023-08-14 18:30:55', '2024-08-14 14:30:55'),
('269d1e5d07e0c81f0bbdb26e2895f35ffd2c71f309c74a876add145e14f40a98d48d6f2befd317cb', 1, 1, 'accessToken', '[]', 0, '2023-08-16 16:29:33', '2023-08-16 16:29:33', '2024-08-16 12:29:33'),
('27755925124f71e191345886045e7ef183d13bd3d96825ff7ae4c642fa1337252b71deabe041ad68', 2, 1, 'accessToken', '[]', 0, '2023-07-20 08:58:47', '2023-07-20 08:58:47', '2024-07-20 14:58:47'),
('2e26d75792dd4e0c73cbcb20098a79f14c47dea46774bb29c8279420f92e803ffc135f66a56c99c8', 53, 1, 'accessToken', '[]', 0, '2023-07-20 17:36:37', '2023-07-20 17:36:37', '2024-07-20 23:36:37'),
('2e4abb6345d19529eb5f5b4fd69fc86667f9d448d7568f2b119fe29cec57d2ccff16597edeee9ae5', 2, 1, 'accessToken', '[]', 0, '2023-07-20 08:28:41', '2023-07-20 08:28:41', '2024-07-20 14:28:41'),
('339e9a7acf77dcc2fc20c4e4e6772acc56f579c667fbc0eeb594ac82d91ca57db2de1bc1c8746ae0', 54, 1, 'accessToken', '[]', 0, '2023-08-23 18:40:53', '2023-08-23 18:40:53', '2024-08-24 00:40:53'),
('3423462de5b1369945f9594e4334a27c30fed37daaffaa59ea1c19f3498608d3a52e7e3abb54c4e8', 49, 1, 'accessToken', '[]', 0, '2023-07-20 17:27:44', '2023-07-20 17:27:44', '2024-07-20 23:27:44'),
('379b31d5a879c77b24c06945c727689628032c35415218eb9de7dc4c94c6b6fb13d8e36bfb6ff7fd', 2, 1, 'accessToken', '[]', 0, '2023-07-20 09:01:53', '2023-07-20 09:01:53', '2024-07-20 15:01:53'),
('3c135a745060ffac8dad62727b66aba961bb9fa46ef1a22a58610e541df11059e5c9f503a63ddf02', 2, 1, 'accessToken', '[]', 0, '2023-07-24 07:35:33', '2023-07-24 07:35:33', '2024-07-24 13:35:33'),
('3db39ee9295a1267cdc36f2a0c6cacbbdf03cc60c6483b8fa99aadc27487a492cae859a4ca19ae1a', 1, 1, 'accessToken', '[]', 0, '2023-07-16 17:15:40', '2023-07-16 17:15:40', '2024-07-16 23:15:40'),
('3e5108ffb1b3ff364d355bf6788403ea82f7ff811a347d5bb8f40b5fcdd3729205ccff0416110b57', 1, 1, 'accessToken', '[]', 0, '2023-07-26 19:27:39', '2023-07-26 19:27:39', '2024-07-27 01:27:39'),
('40304dc111d2942df0bb60e73230dc885b57b21f95ec3a286c8e900c9c43b892bf16d4e95b9d9c89', 1, 1, 'accessToken', '[]', 0, '2023-08-16 05:00:51', '2023-08-16 05:00:51', '2024-08-16 01:00:51'),
('41894bf7fdd9b427e0564b4cfb4a6f0f3be66dac272a5add01e73cd0ed0517cd619cfca90eab134c', 1, 1, 'accessToken', '[]', 0, '2023-08-15 13:47:51', '2023-08-15 13:47:51', '2024-08-15 09:47:51'),
('457a662ad9b7206402141cd8f5a8d337c4a6d21d312bef6a597bf8a8384ddc0663c028ccc5b4c48d', 54, 1, 'accessToken', '[]', 0, '2023-07-20 19:23:05', '2023-07-20 19:23:05', '2024-07-21 01:23:05'),
('4dcf59d8c41103095f847f51fd054b571404f632be9c7ec6bd30a5d7d5cc895ef7833cd9a10e1995', 1, 1, 'accessToken', '[]', 0, '2023-08-12 05:54:42', '2023-08-12 05:54:42', '2024-08-12 11:54:42'),
('505813476b36e35f9b8459a6503024740f2149c2bba96b0779511f55162454237d33d06a6b3a33ec', 53, 1, 'accessToken', '[]', 0, '2023-07-20 17:39:50', '2023-07-20 17:39:50', '2024-07-20 23:39:50'),
('518a6d096299d6c6199d087023adf66ed262f0e1adc47f6a0b48e5b7f1583628cd4d5f7b54414411', 63, 1, 'accessToken', '[]', 0, '2023-08-16 17:02:30', '2023-08-16 17:02:30', '2024-08-16 23:02:30'),
('563ab5e032cee430d3322bb66c3e7f0615751219e669ee3079bcf34f10681dc03b1a143e8f42b623', 51, 1, 'accessToken', '[]', 0, '2023-07-20 17:33:45', '2023-07-20 17:33:45', '2024-07-20 23:33:45'),
('5a14ed57ca956e66dedbdc5e3a8a55d85946dbacebce02ebf285f6a0cc3a31dcd63660f2ed94a322', 1, 1, 'accessToken', '[]', 0, '2023-07-20 17:49:13', '2023-07-20 17:49:13', '2024-07-20 23:49:13'),
('5f57ebbabd104fbc9f178161cbb881ae1f00223e69c3bf02fd9f34ca544cac8785b36890c6aeb1b1', 1, 1, 'accessToken', '[]', 0, '2023-06-05 06:53:50', '2023-06-05 06:53:50', '2024-06-05 12:53:50'),
('61122d5ac0e932c5912e2aee509b3f94d1de0a247f38154e408b5434bc834b95aac4027ad35a250b', 1, 1, 'accessToken', '[]', 0, '2023-07-20 07:00:28', '2023-07-20 07:00:28', '2024-07-20 13:00:28'),
('614f2bc5ac248e1431031e6b3094fef1bc0325bdc7de6483f92772307ca6f5d4c4f01aca9de363ac', 1, 1, 'accessToken', '[]', 0, '2023-07-20 07:09:13', '2023-07-20 07:09:13', '2024-07-20 13:09:13'),
('6276fa8eb241ca21f4cae738fcc581764b0cda83f63a0783db3eddc7d388453ebce889b7ec4f9fc2', 1, 1, 'accessToken', '[]', 0, '2023-07-29 05:33:54', '2023-07-29 05:33:54', '2024-07-29 11:33:54'),
('6404f8fe50474c475a7a4be3dd852641386de414239f8b023334debc309f61c50919542f7c9b6202', 63, 1, 'accessToken', '[]', 0, '2023-08-23 07:12:15', '2023-08-23 07:12:15', '2024-08-23 13:12:15'),
('6b2c2e347032bf7529c488fa4732c625987d0468d1f3ef4f64237980118f97da1880ddced664e1ba', 1, 1, 'accessToken', '[]', 0, '2023-07-20 07:10:45', '2023-07-20 07:10:45', '2024-07-20 13:10:45'),
('6fb8123989454207f268a6108ac8b0c9dc1badf597b6c053eeede813aae3e2dc25cc4b2c230a3f13', 1, 1, 'accessToken', '[]', 0, '2023-08-17 06:33:23', '2023-08-17 06:33:23', '2024-08-17 12:33:23'),
('73ab43a2af2077b0dae2cdc1d16478c7dbec99471dab2509f4634c8d7a1fa798a350c5ea0226321a', 1, 1, 'accessToken', '[]', 0, '2023-06-08 10:46:57', '2023-06-08 10:46:57', '2024-06-08 16:46:57'),
('74f7a069f62f8e28d8ad97d4c6ff6eccc7b5c617cfaed6f1a70f9464376a85ecc5c37b6db57c62ce', 1, 1, 'accessToken', '[]', 0, '2023-06-12 08:27:45', '2023-06-12 08:27:45', '2024-06-12 14:27:45'),
('7a2c6f902ae8aa9352525c1b4dbdec4c8ec694acbb592abda370402373a8cdfdf956519ac6cf3648', 65, 1, 'accessToken', '[]', 0, '2023-08-16 17:10:34', '2023-08-16 17:10:34', '2024-08-16 23:10:34'),
('7ed597e5591c19aab078d05dc988c3d533e16db6e4bb68072fa88ebbe9356c95dc3410385bbc95e6', 47, 1, 'accessToken', '[]', 0, '2023-07-20 17:26:59', '2023-07-20 17:26:59', '2024-07-20 23:26:59'),
('80b50b22669102335465bf190c88d8059b9f68d2d610211ace413fbc2ccd94be8360f0d0d7a732d3', 1, 1, 'accessToken', '[]', 0, '2023-08-03 17:28:35', '2023-08-03 17:28:35', '2024-08-03 23:28:35'),
('823dd0a76a0915f5067d87839ce213aff59c55d493bf72cb0ad7ea4b534920aefe239419b913fec0', 63, 1, 'accessToken', '[]', 0, '2023-08-18 05:47:01', '2023-08-18 05:47:01', '2024-08-18 11:47:01'),
('82cc87379f3379a769d256e2a0bae96be4233c947de8290ecec1af117dffaaed2507a47c8b460940', 45, 1, 'accessToken', '[]', 0, '2023-07-24 16:26:23', '2023-07-24 16:26:23', '2024-07-24 22:26:23'),
('8bff27def97ab24bdc3e470443b1262cdd1625227b64b67fa7be3fa322e496e977a5578705f2b872', 63, 1, 'accessToken', '[]', 0, '2023-08-26 07:14:14', '2023-08-26 07:14:14', '2024-08-26 13:14:14'),
('8d113f42912a937eff721d9ac6ae66bf8aae8f2e4c13e2966dec76a7ded4e6c8bff15b0dd4011141', 45, 1, 'accessToken', '[]', 0, '2023-07-20 17:23:48', '2023-07-20 17:23:48', '2024-07-20 23:23:48'),
('8fc014992146e19371bb21b6b29c600cc76e6edf19eee6551153ae8af417f11dda444612a6e29122', 50, 1, 'accessToken', '[]', 0, '2023-07-20 17:28:26', '2023-07-20 17:28:26', '2024-07-20 23:28:26'),
('902c0c6f63c6cc251f79b35db730a6325ab9e253be60c896cfce08ca52f20273cabfd85cdb5132f1', 54, 1, 'accessToken', '[]', 0, '2023-08-23 18:37:15', '2023-08-23 18:37:15', '2024-08-24 00:37:15'),
('92a3955f70896ea5223264d871c04db8632edf56d0402077e34eb6aa048aa6326b5456e274d72631', 1, 1, 'accessToken', '[]', 0, '2023-07-25 17:54:11', '2023-07-25 17:54:11', '2024-07-25 23:54:11'),
('95a4f852e3af1a72212d9a78080864058de1e8709a6ac91c81c3aa7f4fdcf111c3f133d1df967b35', 63, 1, 'accessToken', '[]', 0, '2023-08-20 18:00:35', '2023-08-20 18:00:35', '2024-08-21 00:00:35'),
('986a0743811f36cba6c0239ddac37e5a030efaafeffeb11339cad4dae793ff71aa05350cf2d28920', 2, 1, 'accessToken', '[]', 0, '2023-07-20 16:57:00', '2023-07-20 16:57:00', '2024-07-20 22:57:00'),
('9b2084d9d402f237e54ac26891fbfad032ae2c6fe8cac3a1fbb1606074766a94f873b7be272ac125', 1, 1, 'accessToken', '[]', 0, '2023-08-15 15:22:20', '2023-08-15 15:22:20', '2024-08-15 11:22:20'),
('9b5fbfdec440117c3027ede29f8f41a1bfa8a09d9a0855bf5ec62d47f01351fd5af9b639472f8b13', 1, 1, 'accessToken', '[]', 0, '2023-07-29 15:21:18', '2023-07-29 15:21:18', '2024-07-29 11:21:18'),
('a9de27672fa909fec1b37bd125789e376705b1635e031b1d78af5351a57f7e53bfb53bd5446ca336', 1, 1, 'accessToken', '[]', 0, '2023-07-15 05:39:31', '2023-07-15 05:39:31', '2024-07-15 11:39:31'),
('ac6af34b36d8b08bf4b54d6394ec2634518cb69d15be2d1e14ade5876b9fdc261bb2651b4a3909e5', 1, 1, 'accessToken', '[]', 0, '2023-07-24 17:16:47', '2023-07-24 17:16:47', '2024-07-24 23:16:47'),
('acee900d458e6574fd86b8331d676ad5e8f968fa1e59a87548905be14e26d6a9cd2283ebad9ac55e', 1, 1, 'accessToken', '[]', 0, '2023-08-02 05:12:08', '2023-08-02 05:12:08', '2024-08-02 11:12:08'),
('af56334e276c903499e8b9df7fb7ce147e26f7da8986de4fbd10a9cf413a78486bae6cfa2cb5364b', 1, 1, 'accessToken', '[]', 0, '2023-07-14 09:12:27', '2023-07-14 09:12:27', '2024-07-14 15:12:27'),
('b4a8fa37fea4172b6015800005872233d6f8878831e21c48ef30de13df5e68614aa5ef7c5416ea55', 45, 1, 'accessToken', '[]', 0, '2023-07-24 17:16:31', '2023-07-24 17:16:31', '2024-07-24 23:16:31'),
('b57a64769fddbf315e4e4164284dbbe929db13b6fff5a85870b55a9d721e5746654b875e840a2dfe', 54, 1, 'accessToken', '[]', 0, '2023-07-20 17:41:29', '2023-07-20 17:41:29', '2024-07-20 23:41:29'),
('b68faba77e6340516289b3e22c8835ebc20c83b6382ea1480dfb66960461e39b371ada6fd97ce6a2', 64, 1, 'accessToken', '[]', 0, '2023-08-16 17:10:10', '2023-08-16 17:10:10', '2024-08-16 23:10:10'),
('b6e56122c3d55750ba4575f8a9c844651a85aa1be72441044561cadfb8a5e14f2fa2ec4129405d32', 1, 1, 'accessToken', '[]', 0, '2023-08-05 14:59:41', '2023-08-05 14:59:41', '2024-08-05 20:59:41'),
('b9a5dc8f23f42b4171d0833b0191fa7c7736dffa47b4021b13b8845b96de305cf7482c668564dd60', 63, 1, 'accessToken', '[]', 0, '2023-08-23 18:47:40', '2023-08-23 18:47:40', '2024-08-24 00:47:40'),
('b9c59121a3fb6c7dcdf810dccd877a33876c48b24665d6b6f08bb99c7fcb8360ded193a399a569c2', 2, 1, 'accessToken', '[]', 0, '2023-07-20 08:15:42', '2023-07-20 08:15:42', '2024-07-20 14:15:42'),
('bba575e8e0f56e51f7ee0d06d14ef5f734fb31bff60fdf86e12348af2b5a91851c7761429bb0d4f0', 2, 1, 'accessToken', '[]', 0, '2023-07-20 09:04:41', '2023-07-20 09:04:41', '2024-07-20 15:04:41'),
('bcd44da71ca509bc5e363f900c72cb7727c0d54879c730e6ab907702d9c021643f87e3870566229b', 54, 1, 'accessToken', '[]', 0, '2023-08-23 18:30:30', '2023-08-23 18:30:30', '2024-08-24 00:30:30'),
('bf1b494d4bc5fb09e452dd82c8a42acfeb16538402a241c488102cad788ae8c2ab0de5c678fe4f87', 1, 1, 'accessToken', '[]', 0, '2023-07-26 05:11:51', '2023-07-26 05:11:51', '2024-07-26 11:11:51'),
('c1248f0a8dd88641f8e1eac7efe3b1ec3956ff70ecac8c929d526f67be74d22902099b827754f117', 63, 1, 'accessToken', '[]', 0, '2023-08-27 18:30:17', '2023-08-27 18:30:17', '2024-08-28 00:30:17'),
('c5b1bb41226711bd7cf4e34c67c36032e14175b47a7a03596333bc0960d30a217a0d9fe6e5438165', 2, 1, 'accessToken', '[]', 0, '2023-07-20 08:03:04', '2023-07-20 08:03:04', '2024-07-20 14:03:04'),
('cbbd3d40617e56a814282cf3e464d55f78bde38e2e8f467c3b60085c76dcbd90f6a60ad87ee523b5', 63, 1, 'accessToken', '[]', 0, '2023-08-29 03:57:01', '2023-08-29 03:57:01', '2024-08-29 09:57:01'),
('d2a68fc15bc152b2ab2b7886384dc0cd46080d7831730ccbba2ae4b8420d3e674541dad7255c6d97', 54, 1, 'accessToken', '[]', 0, '2023-07-20 18:18:41', '2023-07-20 18:18:41', '2024-07-21 00:18:41'),
('d73c780f452ff406aa5cc626edac3beb92fab15b18e7715a55d9a4b4ac0504556d0e76b2171cc90c', 1, 1, 'accessToken', '[]', 0, '2023-07-17 16:16:04', '2023-07-17 16:16:04', '2024-07-17 22:16:04'),
('d78dc940b49e2872c4e33b292fa894305e2b94b2d59e285e380ecd4e2a1a4e8f4f8a61a0ff0a51c7', 54, 1, 'accessToken', '[]', 0, '2023-08-23 18:34:08', '2023-08-23 18:34:08', '2024-08-24 00:34:08'),
('d841ecdd45bbc46c7b59979de9babea8334d4c340f046511fc976f8bdf4594eb3c1c2ab485540f70', 63, 1, 'accessToken', '[]', 0, '2023-08-28 16:20:55', '2023-08-28 16:20:55', '2024-08-28 22:20:55'),
('db773c3b7034dd0bbc7622641958b72c6ed2220f060431ad9b89f95f8b39f556c600a7e48ba468c7', 1, 1, 'accessToken', '[]', 0, '2023-07-29 07:14:28', '2023-07-29 07:14:28', '2024-07-29 13:14:28'),
('e015429f5a257e66a765e629bb38f7be6254a98d9ca4ff95961ff5561b030ce663497a70b65f6ad6', 52, 1, 'accessToken', '[]', 0, '2023-07-20 17:34:22', '2023-07-20 17:34:22', '2024-07-20 23:34:22'),
('e18a144efcb2f2ccbcec97334269343ac85492d2706f3a6dfdbfa8027df515984ee3557d6b9a98e4', 63, 1, 'accessToken', '[]', 0, '2023-08-28 05:14:06', '2023-08-28 05:14:06', '2024-08-28 11:14:06'),
('e3196b0c7b6d9654a50f2740b33c1223ea5a81715396f74875ef60e19a5a64725016bb8d8e2c4ffe', 63, 1, 'accessToken', '[]', 0, '2023-08-26 15:58:56', '2023-08-26 15:58:56', '2024-08-26 21:58:56'),
('e6f99e02d8150bca124c48f6347c46e3303c7980b54fa15f40874ac5e753b2a667b2ee065536f14f', 1, 1, 'accessToken', '[]', 0, '2023-07-20 03:51:20', '2023-07-20 03:51:20', '2024-07-20 09:51:20'),
('e7b141a19274d8a9aa1b35fae2b437c14aa60559fa288b2dd3b254741eb1b47780138b21724ada32', 1, 1, 'accessToken', '[]', 0, '2023-08-14 04:03:00', '2023-08-14 04:03:00', '2024-08-14 00:03:00'),
('e823766e7875bc63b06210d01f64f2ef6e0d5017cfd2f6bb8f74db2db86ba16a653887ea8e966b53', 46, 1, 'accessToken', '[]', 0, '2023-07-20 17:26:08', '2023-07-20 17:26:08', '2024-07-20 23:26:08'),
('f81f53d4c3bb72c585606e94d94ec5ca302ff37a2e57758bec15fe2c4849d97bba8840112c913961', 1, 1, 'accessToken', '[]', 0, '2023-08-09 06:47:23', '2023-08-09 06:47:23', '2024-08-09 12:47:23'),
('f877cc04d44c28092921589f02d6968e3a74d894f0ba050b0d5c02d7eee460f9878c028eebd1f124', 63, 1, 'accessToken', '[]', 0, '2023-08-17 20:44:31', '2023-08-17 20:44:31', '2024-08-18 02:44:31'),
('fc6dd5c1c126544f098c34aaa7e429a9dcab7e59d1eb2c3e0db0766a38101f34ee79145d35022e76', 1, 1, 'accessToken', '[]', 0, '2023-07-28 06:14:11', '2023-07-28 06:14:11', '2024-07-28 12:14:11'),
('fcde284934f81ae1ba6607d2aff13d0a3a16664724343a822fa88edef717b1150e5e037c1af43652', 1, 1, 'accessToken', '[]', 0, '2023-07-18 11:47:26', '2023-07-18 11:47:26', '2024-07-18 17:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
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
(1, NULL, 'Laravel8.2 Personal Access Client', '3T8mGifLgAMbQOnznVmKrWNauXQbX5SMFPWzSicR', NULL, 'http://localhost', 1, 0, 0, '2023-06-05 06:52:52', '2023-06-05 06:52:52');

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
(1, 1, '2023-06-05 06:52:52', '2023-06-05 06:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` varchar(200) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(65,2) NOT NULL,
  `delevery` decimal(65,2) NOT NULL,
  `total_amount` decimal(65,2) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `paymentMethod` varchar(255) DEFAULT NULL,
  `status` enum('pending','processing','completed','canceled') NOT NULL DEFAULT 'pending',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `user_id`, `amount`, `delevery`, `total_amount`, `total_quantity`, `name`, `email`, `address`, `address2`, `country`, `state`, `zip`, `paymentMethod`, `status`, `updated_at`, `created_at`) VALUES
(1, '000001', 63, 552.00, 20.00, 572.00, 6, 'Freelancer Nishad', 'freelancernishad123@gmail.com', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', NULL, 'Bangladesh', 'Rangpur', '5020', 'Cash on Delivery', 'processing', '2023-08-28 16:59:51', '2023-08-28 06:27:08');

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

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(29, 14, 27, 2, '2023-08-23 18:27:24', '2023-08-23 18:27:24'),
(30, 1, 27, 4, '2023-08-28 06:27:08', '2023-08-28 06:27:08'),
(31, 1, 28, 1, '2023-08-28 06:27:08', '2023-08-28 06:27:08'),
(32, 1, 29, 1, '2023-08-28 06:27:08', '2023-08-28 06:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'আমাদের কথা', 'amader-kotah', '<h2 style=\"text-align: center;\">আমাদের কথা/ About Us</h2>\n<p>&nbsp;</p>\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12pt;\">পুথিপ্রকাশের ওয়েবসাইটে আপনাকে স্বাগতম।&nbsp;</span></p>\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12pt;\">২০২১ সালে ক\'জন উদ্যমী লেখক ও চিত্রশিল্পীর হাত ধরে&nbsp; শুরু হয় পুথিপ্রকাশের পথ চলা। প্রথম থেকেই শিক্ষার্থী ও সাধারণ পাঠকদের জন্য মানসম্পন্ন বই রচনায় মনোনিবেশ করে পুথিপ্রকাশ। একটি ভালো পান্ডুলিপিকে বইয়ের পর্যায়ে উন্নীত করার লক্ষ্যে বিভিন্ন ধাপের গবেষণাসম কাজগুলো সূক্ষ্মভাবে সম্পন্ন করতে শুরু থেকেই আমরা \"ধীরে চলো নীতি\" গ্রহণ করি; যে কারণে প্রতিষ্ঠার প্রায় এক বছর পর আমাদের প্রথম সৃজনশীল বই প্রকাশিত হয়।&nbsp; ঢাকা বিশ্ববিদ্যালয়ের ভাষাবিজ্ঞান বিভাগের চেয়ারম্যান অধ্যাপক ড. মুহাম্মদ আসাদুজ্জামান প্রণীত \'প্রমিত বাংলা ভাষা\' শিরোনামের গবেষণাধর্মী সৃজনশীল বইটি প্রকাশিত হতেই পাঠকমহল থেকে দারুণ ইতিবাচক সাড়া পাই।&nbsp;</span></p>\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12pt;\">আমাদের কাছে বইপ্রকাশের অন্যতম প্রধান উদ্দেশ্য হলো- পাঠককে তার আত্মস্থ জ্ঞানমূলের খোঁজ পেতে উৎসাহ দেওয়া। এজন্যই বইপড়া একান্ত জরুরি। বিভিন্ন বয়সী শিক্ষার্থীদের ক্ষেত্রেও একই কথা প্রযোজ্য। তবে, অ্যাকাডেমিক বইয়ের ভার যেন \'ওজন\' না হয়ে যায়, এ বিষয়ে একেবারে গোড়া থেকেই আমরা সচেতন। উদাহরণস্বরূপ, প্রাক-প্রাথমিক স্তরের বইগুলোর মূল বিষয়বস্তু, প্রসঙ্গ, আধেয়-বৈচিত্র্য, অঙ্গসজ্জার দিকে সবসময়ই আমাদের বিশেষ নজর থাকে। শিশুমন যেন বইকে বন্ধু মনে করে, সে চিন্তাই অগ্রাধিকার পায়। পরবর্তীতে প্রাথমিক, মাধ্যমিক, ও উচ্চ-মাধ্যমিক পর্যায়ের বই প্রণয়নের ক্ষেত্রেও একই নীতি ও অভিক্ষেপ বজায় রাখার সর্বোচ্চ চেষ্টা থেকেছে। ধাপে ধাপে অ্যাকাডেমিক অ্যাক্টিভিটি বইগুলো এভাবেই প্রকাশিত হয়ে এসেছে।&nbsp;</span></p>\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12pt;\">পরিশেষে, আমাদের ওয়েবসাইট পরিদর্শনের জন্য ধন্যবাদ। পাঠক কিংবা লেখক হিসেবে আপনার চাহিদা ও পরামর্শ জানান।&nbsp; পুথিপ্রকাশের বই পড়ুন, প্রিয়জনকে বই উপহার দিন।</span></p>\n<p style=\"text-align: justify;\">&nbsp;</p>', 'published', '2023-08-04 18:00:03', '2023-08-23 07:12:49');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `trx_date` varchar(255) DEFAULT NULL,
  `trx_month` varchar(255) DEFAULT NULL,
  `trx_year` varchar(255) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `payment_url` varchar(255) DEFAULT NULL,
  `payment_ipn` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `discount_status` tinyint(1) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `prossod` varchar(255) NOT NULL,
  `total_page` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `cover_type` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0,
  `visit` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `category_id`, `name`, `slug`, `discount_status`, `discount_type`, `discount`, `prossod`, `total_page`, `release_date`, `cover_type`, `ISBN`, `short_description`, `description`, `price`, `stock`, `weight`, `visit`, `share`, `buy`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
(27, '123', 6, 'Let\'s Learn English - Level 1', 'let-s-learn-english---level-1', 0, NULL, NULL, 'অঙ্কন- হাসিবা ইয়াসমিন, রং- সুমন কুমার বৈদ্য', '32', '2023-08-01', 'cover', '978-984-35-2937-4', 'Let\'s Learn English', '<p>প্রকাশকঃ পুথিপ্রকাশ</p>\n<p>অঙ্কনঃ রজিত কুমার ধর</p>\n<p>গ্রাফিক্সঃ শাওন সাহা</p>', 92, 555551, 300, 0, 0, 0, 'uploaded/products/featured/2023/08/15/1692082006____82134.jpeg', 62, '2023-08-15 16:46:46', '2023-08-28 06:27:08'),
(28, '123', 6, 'ABCD IN PICTURE', 'abcd-in-picture', NULL, NULL, NULL, 'অঙ্কন- হাসিবা ইয়াসমিন, রং- সুমন কুমার বৈদ্য', '32', '2023-08-01', 'cover', '978-984-35-2924-4', 'ABCD IN PICTURE', '<p>প্রকাশকঃ পুথিপ্রকাশ</p>\n<p>অঙ্কনঃ রজিত কুমার ধর</p>\n<p>গ্রাফিক্সঃ শাওন সাহা</p>', 92, 0, 20, 0, 0, 0, 'uploaded/products/featured/2023/08/15/1692097272____10651.jpeg', 62, '2023-08-15 21:01:12', '2023-08-28 06:27:08'),
(29, '123', 83, 'এসো গুনতে শিখি - প্রথম ভাগ', 'eso-gunte-shikhi---prthm-bhaag', NULL, NULL, NULL, 'অঙ্কন- হাসিবা ইয়াসমিন, রং- সুমন কুমার বৈদ্য', '32', '2023-08-01', 'cover', '978-984-35-2929-9', 'এসো গুনতে শিখি', '<p>প্রকাশকঃ পুথিপ্রকাশ</p>\n<p>অঙ্কনঃ রজিত কুমার ধর</p>\n<p>গ্রাফিক্সঃ শাওন সাহা</p>', 92, 1, 20, 0, 0, 0, 'uploaded/products/featured/2023/08/15/1692098468____27502.jpeg', 62, '2023-08-15 21:21:08', '2023-08-28 06:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `short_about` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `Books_are_the_best_gift` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_username` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `smtp_encryption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `header_logo`, `footer_logo`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`, `mail`, `whatsapp`, `phone1`, `phone2`, `address`, `address2`, `short_about`, `about`, `Books_are_the_best_gift`, `google_map`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_encryption`, `created_at`, `updated_at`) VALUES
(1, 'uploaded/header_logo/2023/08/16/1692200257____96885.png', 'uploaded/footer_logo/2023/08/16/1692200258____14227.png', '#', NULL, NULL, NULL, NULL, NULL, NULL, '+8800000000000', NULL, '৬১, দক্ষিন মালিবাগ', 'ঢাকা- ১২১৭', 'পুথিপ্রকাশের ওয়েবসাইটে আপনাকে স্বাগতম। আমাদের কাছে বইপ্রকাশের অন্যতম প্রধান উদ্দেশ্য হলো- পাঠককে তার আত্মস্থ জ্ঞানমূলের খোঁজ পেতে উৎসাহ দেওয়া।', '২০২১ সালে ক\'জন উদ্যমী লেখক ও চিত্রশিল্পীর হাত ধরে  শুরু হয় পুথিপ্রকাশের পথ চলা। প্রথম থেকেই শিক্ষার্থী ও সাধারণ পাঠকদের জন্য মানসম্পন্ন বই রচনায় মনোনিবেশ করে পুথিপ্রকাশ। একটি ভালো পান্ডুলিপিকে বইয়ের পর্যায়ে উন্নীত করার লক্ষ্যে বিভিন্ন ধাপের গবেষণাসম কাজগুলো সূক্ষ্মভাবে সম্পন্ন করতে শুরু থেকেই আমরা \"ধীরে চলো নীতি\" গ্রহণ করি; যে কারণে প্রতিষ্ঠার প্রায় এক বছর পর আমাদের প্রথম সৃজনশীল বই প্রকাশিত হয়।  ঢাকা বিশ্ববিদ্যালয়ের ভাষাবিজ্ঞান বিভাগের চেয়ারম্যান অধ্যাপক ড. মুহাম্মদ আসাদুজ্জামান প্রণীত \'প্রমিত বাংলা ভাষা\' শিরোনামের গবেষণাধর্মী সৃজনশীল বইটি প্রকাশিত হতেই পাঠকমহল থেকে দারুণ ইতিবাচক সাড়া পাই। \n\nআমাদের কাছে বইপ্রকাশের অন্যতম প্রধান উদ্দেশ্য হলো- পাঠককে তার আত্মস্থ জ্ঞানমূলের খোঁজ পেতে উৎসাহ দেওয়া। এজন্যই বইপড়া একান্ত জরুরি। বিভিন্ন বয়সী শিক্ষার্থীদের ক্ষেত্রেও একই কথা প্রযোজ্য। তবে, অ্যাকাডেমিক বইয়ের ভার যেন \'ওজন\' না হয়ে যায়, এ বিষয়ে একেবারে গোড়া থেকেই আমরা সচেতন। উদাহরণস্বরূপ, প্রাক-প্রাথমিক স্তরের বইগুলোর মূল বিষয়বস্তু, প্রসঙ্গ, আধেয়-বৈচিত্র্য, অঙ্গসজ্জার দিকে সবসময়ই আমাদের বিশেষ নজর থাকে। শিশুমন যেন বইকে বন্ধু মনে করে, সে চিন্তাই অগ্রাধিকার পায়। পরবর্তীতে প্রাথমিক, মাধ্যমিক, ও উচ্চ-মাধ্যমিক পর্যায়ের বই প্রণয়নের ক্ষেত্রেও একই নীতি ও অভিক্ষেপ বজায় রাখার সর্বোচ্চ চেষ্টা থেকেছে। ধাপে ধাপে অ্যাকাডেমিক অ্যাক্টিভিটি বইগুলো এভাবেই প্রকাশিত হয়ে এসেছে। \n\nপরিশেষে, আমাদের ওয়েবসাইট পরিদর্শনের জন্য ধন্যবাদ। পাঠক কিংবা লেখক হিসেবে আপনার চাহিদা ও পরামর্শ জানান।  পুথিপ্রকাশের বই পড়ুন, প্রিয়জনকে বই উপহার দিন।', 'পুথিপ্রকাশের বই পড়ুন, প্রিয়জনকে বই উপহার দিন', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3651.9926362978795!2d90.41229899999999!3d23.747642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjPCsDQ0JzUxLjUiTiA5MMKwMjQnNDQuMyJF!5e0!3m2!1sen!2sbd!4v1692254139485!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL, NULL, NULL, NULL, '2023-08-03 19:26:43', '2023-08-17 06:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'slide 1 - Book', NULL, 'uploaded/slider_images/2023/08/04/1691086044____55059.jpeg', 0, 1, '2023-08-03 18:07:25', '2023-08-14 04:26:07'),
(7, 'Slide-2 logo', NULL, 'uploaded/slider_images/2023/08/14/1691952814____43414.jpeg', 0, 0, '2023-08-14 04:53:34', '2023-08-14 04:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `the_book_of_puthiprakashes`
--

CREATE TABLE `the_book_of_puthiprakashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `the_book_of_puthiprakashes`
--

INSERT INTO `the_book_of_puthiprakashes` (`id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-08-26 15:59:30', '2023-08-26 15:59:30'),
(2, 6, '2023-08-26 15:59:30', '2023-08-26 15:59:30'),
(3, 7, '2023-08-26 15:59:30', '2023-08-26 15:59:30'),
(4, 10, '2023-08-26 15:59:30', '2023-08-26 15:59:30'),
(5, 14, '2023-08-26 15:59:30', '2023-08-26 15:59:30'),
(6, 18, '2023-08-26 15:59:30', '2023-08-26 15:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nameBN` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `position_type` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `permisions` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nameBN`, `type`, `email`, `email_verified_at`, `password`, `phone`, `position`, `position_type`, `description`, `permisions`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Freelancer Nishad', NULL, NULL, 'email@gmail.com', NULL, '$2y$10$RZxQnuirSI1pkAANhT3Tke5gen5baQzQFIvP2cKAGnGS2lVrZ3t4G', '+8801909756552', NULL, NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:35:31', '2023-07-24 08:03:02'),
(3, 'name', NULL, NULL, 'email2@gmail.com', NULL, '$2y$10$sVVK4MAZvNlBkkBe/yJICOCdoL8rKF2fLzPmKrn4Onp9rXIUbcMfS', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:36:07', '2023-07-17 16:36:07'),
(4, 'name', NULL, NULL, 'email3@gmail.com', NULL, '$2y$10$9v6.W2qS8SR93Y7E7qyX7e6ZU/jcSoEA/WLIrcIHHSeG/w4PJcQ8i', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:36:14', '2023-07-17 16:36:14'),
(5, 'name', NULL, NULL, 'email4@gmail.com', NULL, '$2y$10$OXVdcsIk5.2Z0H0s10hABeYzWGHCzh3y8bwS5zrTUQDC/RbWBCpSO', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 16:36:18', '2023-07-17 16:36:18'),
(6, 'name', NULL, NULL, 'email5@gmail.com', NULL, '$2y$10$w3XlJODaASMESVpvecNWp.vqu2AIWO9y3wVb8LEMKtz/PH..UE75y', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:36:22', '2023-07-17 16:36:22'),
(7, 'name', NULL, NULL, 'email6@gmail.com', NULL, '$2y$10$h495v/1a9w8ZiCaZukNhuOzdGBxOpzIOXrwLUucOXPrdsez/99ZPW', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 16:36:26', '2023-07-17 16:36:26'),
(8, 'name', NULL, NULL, 'email7@gmail.com', NULL, '$2y$10$sLUbpsVZTPM71G2evb/gbuowG7rmA17HGDYW8CuSYylCq6/lGEWE6', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:52:17', '2023-07-17 16:52:17'),
(9, 'name', NULL, NULL, 'email8@gmail.com', NULL, '$2y$10$XBkcC.PRFbYXUAoNEHvDPOVf2GpoSooruIre83CesAzZo3MY5gtrq', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 16:52:27', '2023-07-17 16:52:27'),
(10, 'name', NULL, NULL, 'email9@gmail.com', NULL, '$2y$10$elAa7X.BaUcLp1ZlooWIaeSGYX6h4.c288HQnirrFOsEHITeNiiIK', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:52:33', '2023-07-17 16:52:33'),
(11, 'name', NULL, NULL, 'email10@gmail.com', NULL, '$2y$10$ngC3U86ftIm3JU5Yhw1GF.G48WvuchuF6SY8DADe.euY.rRc/c/lS', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:52:38', '2023-07-17 16:52:38'),
(12, 'name', NULL, NULL, 'email11@gmail.com', NULL, '$2y$10$BpW0sjamtgixwkQL6bIKEeGbv4FBW3NnStK29AIFILk.HFljBtEAy', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:52:43', '2023-07-17 16:52:43'),
(13, 'name', NULL, NULL, 'email12@gmail.com', NULL, '$2y$10$TMoqfeX2BjSRxS8phdC.OuQeFGM8FisrYqGNuXTExqIS4Y1n8lVsu', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:52:58', '2023-07-17 16:52:58'),
(14, 'name', NULL, NULL, 'email13@gmail.com', NULL, '$2y$10$6y.H1tAhW7MkGvNTZ4BzjurFQSYmcaFk1cVmUOyvg.Pv/D5xwaEWq', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:53:16', '2023-07-17 16:53:16'),
(15, 'name', NULL, NULL, 'email14@gmail.com', NULL, '$2y$10$eaIHpRyZ7zsNeBNuWJ9.ceLE0i0dqsio3qQPVd2gtfeS5XWRbN6Ru', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:53:20', '2023-07-17 16:53:20'),
(16, 'name', NULL, NULL, 'email15@gmail.com', NULL, '$2y$10$7ekYiJrRxOZ0nOJiOukhkuA2Wr6Mut.7/E2.8eZtx7QbVWUwWlTAC', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:53:24', '2023-07-17 16:53:24'),
(17, 'name', NULL, NULL, 'email16@gmail.com', NULL, '$2y$10$FLjfjOCJnNAu/fxKHGP/Wu.PjIK302yKufxl3VforYGL5nCfHg.cS', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-17 16:53:36', '2023-07-17 16:53:36'),
(18, 'name', NULL, NULL, 'email17@gmail.com', NULL, '$2y$10$/LM05U/Z11T9e80zTKf61e0nh8K.i311jsrDYaya9bJBy1OkzNkri', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:53:41', '2023-07-17 16:53:41'),
(19, 'name', NULL, NULL, 'email18@gmail.com', NULL, '$2y$10$o5ht0KAJDCKo2aBjzOKe7ONKXMSOzs3Trd6schxHfic3xe2N3bQlO', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:54:00', '2023-07-17 16:54:00'),
(20, 'name', NULL, NULL, 'email19@gmail.com', NULL, '$2y$10$a0PROSiyaFb73tuu8RM0v.voMrxOsCdgxuGhQ068wUYmuB7NeeXgu', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 16:54:16', '2023-07-17 16:54:16'),
(21, 'name', NULL, NULL, 'email20@gmail.com', NULL, '$2y$10$PMoKp1XsmmE8DcUvFXQoW..ySVRPSoT8YHr9lpDxCOZ8.NRBPcmaG', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:54:21', '2023-07-17 16:54:21'),
(22, 'name', NULL, NULL, 'email21@gmail.com', NULL, '$2y$10$7d2SVLswgiUCGIYLWn2vouVPjeZNqpboBb.LIAxP8plkRZ.pBgKwG', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 16:54:33', '2023-07-17 16:54:33'),
(23, 'name', NULL, NULL, 'email22@gmail.com', NULL, '$2y$10$zmIacfAO/UtjI.lZx/D./eZO7A288/uZubSWkWLN6y/0S3yR0Yxse', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 16:54:45', '2023-07-17 16:54:45'),
(24, 'name', NULL, NULL, 'email23@gmail.com', NULL, '$2y$10$94whEG0H.0lYmWjlPbGBauYhKZ7qW/PiBfNQgH9mampWHK2PhI7jG', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 17:59:38', '2023-07-17 17:59:38'),
(25, 'name', NULL, NULL, 'email24@gmail.com', NULL, '$2y$10$rJCibvpROsriSZjQI46uqeqLq1JCpekUah8ojLSwGLwVndPlcWR.C', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 17:59:41', '2023-07-17 17:59:41'),
(26, 'name', NULL, NULL, 'email25@gmail.com', NULL, '$2y$10$hrcheFaaKGLnn/oGV.h4DeQkshynwG1IXTgrPvknxAMDup8u9k7Eu', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 17:59:45', '2023-07-17 17:59:45'),
(27, 'name', NULL, NULL, 'email26@gmail.com', NULL, '$2y$10$vo9y38rENtcFgwP6CMrMbuQjnMjcKB0q/BqIil9jWAZtqdByzcBlO', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 17:59:49', '2023-07-17 17:59:49'),
(28, 'name', NULL, NULL, 'email27@gmail.com', NULL, '$2y$10$5YI4o4xlON32H.00BPp2AOtTXNQDCRH/ArhtdGNBJSXzDsd.zu.c6', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 17:59:52', '2023-07-17 17:59:52'),
(29, 'name', NULL, NULL, 'email28@gmail.com', NULL, '$2y$10$7Vi9ff7BhYBiqmz7A/tLPuxzSH4EPTLhUKC1t7Zg71i05kLNb2jsa', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 17:59:57', '2023-07-17 17:59:57'),
(30, 'name', NULL, NULL, 'email29@gmail.com', NULL, '$2y$10$gjJLCYUFQXfMsAsB8ue8.OSgz7OqJ4GNr1nizVD8U78ChdIcK4KTu', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:00:20', '2023-07-17 18:00:20'),
(31, 'name', NULL, NULL, 'email30@gmail.com', NULL, '$2y$10$2k5R7zSiPTVimoUaf7uU/u5c6vo76bNJ03IHcy2wfmgYZzLfrtH/W', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:00:25', '2023-07-17 18:00:25'),
(32, 'name', NULL, NULL, 'email31@gmail.com', NULL, '$2y$10$bj59e6214siX8jSBJCI4oOD1bvWm0cYiWysJ94NGk3Vmc48eBn59u', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 18:00:36', '2023-07-17 18:00:36'),
(33, 'name', NULL, NULL, 'email32@gmail.com', NULL, '$2y$10$Cisrn.HtStFSuK.Vm3Uqye8Fpo5ioUPxaUkrPacDIaGaTQpMQtepa', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 18:00:54', '2023-07-17 18:00:54'),
(34, 'name', NULL, NULL, 'email33@gmail.com', NULL, '$2y$10$YmaUKrn9.qn8eoKy9gT91uf5FEzKbqc.fsj0IWEFlu9t1WoJw/9Zq', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:01:06', '2023-07-17 18:01:06'),
(35, 'name', NULL, NULL, 'email34@gmail.com', NULL, '$2y$10$ngb0528P4X9lzkLIoYf75uTobaHjIEQtn2S3oRx5yNe4MS9uJa8EK', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:01:10', '2023-07-17 18:01:10'),
(36, 'name', NULL, NULL, 'email35@gmail.com', NULL, '$2y$10$SGGv5iVYTgK4OPXmjt8At.bv4ZToGwwV984haG0nGXZpM1dfWnX8C', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 18:01:26', '2023-07-17 18:01:26'),
(37, 'name', NULL, NULL, 'email36@gmail.com', NULL, '$2y$10$f7NrYTEokLK4dLMHia9wBeNopLMdXmpWFzZO39ATs5EKkgeyPSsje', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:01:30', '2023-07-17 18:01:30'),
(38, 'name', NULL, NULL, 'email37@gmail.com', NULL, '$2y$10$I6xeuRQ10vJm7uYZ25CCpuVBo323ZabmtOhbER0kh92PVB9mqxb5y', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:01:34', '2023-07-17 18:01:34'),
(39, 'name', NULL, NULL, 'email38@gmail.com', NULL, '$2y$10$GHsNZpi/C2QGcqr40aEqYufmem5uN6AfoOHGRh0QfoA62KTDYXLFi', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:01:37', '2023-07-17 18:01:37'),
(40, 'name', NULL, NULL, 'email39@gmail.com', NULL, '$2y$10$p2VdKxTT5OuD1BHaavgjC.1RBZsUl2N55Np.Wq8Fz6HnoDtL07K4a', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 18:02:01', '2023-07-17 18:02:01'),
(41, 'name', NULL, NULL, 'email40@gmail.com', NULL, '$2y$10$5GW/tDzWTBFKiMIN8GlOze/KYNDaEuYLDys4kjzUlcvbm4uCPd8zK', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:03:00', '2023-07-17 18:03:00'),
(42, 'name', NULL, NULL, 'email41@gmail.com', NULL, '$2y$10$0ja3tlkNtsgl2mYO5LPmLOb/GSDycjUMAmEUM6v8FFVxW5OtecuVa', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:03:15', '2023-07-17 18:03:15'),
(43, 'name', NULL, NULL, 'email42@gmail.com', NULL, '$2y$10$yP24SDCcKthEUl8QjZIoD.UnnFhFpN9m690EXkNMcfh.f2duYm6hm', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-17 18:03:26', '2023-07-17 18:03:26'),
(44, 'name', NULL, NULL, 'email43@gmail.com', NULL, '$2y$10$P8Y8QtqU9XQ6nH872VJ12OrJG9BN/CjhU/SUAoph5OqcnVRJFolFa', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-17 18:03:50', '2023-07-17 18:03:50'),
(45, 'Md Nishad', NULL, NULL, 'user@gmail.com', NULL, '$2y$10$JYHiIYvkwOcbDxQ1Imvg.uf98zBiiezA2tmt.whe2Up3tAEpA09uW', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-20 17:23:48', '2023-07-20 17:23:48'),
(46, 'Md Nishad', NULL, NULL, 'user2@gmail.com', NULL, '$2y$10$qLgHU/WTAMbPIjq8rZg8aOQEpUPvf7BEQCqO2YqKRj2pLhQd7il6G', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-20 17:26:08', '2023-07-20 17:26:08'),
(47, 'Md Nishad', NULL, NULL, 'user3@gmail.com', NULL, '$2y$10$DPyEk4B3.Y/R/e.oGFuYheyhwM5kIRMN9b4L36l8/Wk2dokhyt7Te', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-20 17:26:59', '2023-07-20 17:26:59'),
(48, 'Md Nishad', NULL, NULL, 'user4@gmail.com', NULL, '$2y$10$Pi4Q/77qkKR1xNsBq2u/euh10qRl3e6ifs1e6DmA8.y2/wxPNQncu', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-20 17:27:19', '2023-07-20 17:27:19'),
(49, 'Md Nishad', NULL, NULL, 'user5@gmail.com', NULL, '$2y$10$0JbRHkosrhzfljCfZobgk.PgYCUuNeSvbF6RrI27f.qPs9.ffqOkG', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-20 17:27:44', '2023-07-20 17:27:44'),
(50, 'Md Nishad', NULL, NULL, 'user6@gmail.com', NULL, '$2y$10$19m5KmHq7gmhUNxUANgt2uE85.MiM19DZN51dMIpLuR7ZoeN9CCQS', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-20 17:28:26', '2023-07-20 17:28:26'),
(51, 'Md Nishad', NULL, NULL, 'user7@gmail.com', NULL, '$2y$10$3U45oHkJRHrjJqa7GBPX9.L8.NQePGvtgInzZqmYL1.Veta5RBuI6', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-20 17:33:45', '2023-07-20 17:33:45'),
(52, 'Md Nishad', NULL, NULL, 'user8@gmail.com', NULL, '$2y$10$MnbUCJlMtlijrA0Fl3CSuug7P/2z8Q4y3ayAf9rqxRQgoM5lRY44W', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-20 17:34:22', '2023-07-20 17:34:22'),
(53, 'ftgdfg', NULL, NULL, 'user9@gmail.com', NULL, '$2y$10$8h78gIXyihD614WAHTf4p.kNMjTo.A2f0IFGfrrbc2clJxJokp/oa', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-20 17:36:37', '2023-07-20 17:36:37'),
(54, 'sdfgdfgdfg', NULL, NULL, 'user10@gmail.com', NULL, '$2y$10$AYVxFmKIlWbDw/OeeWVeGOfhE/W.ljkufi4JyUnH3Krec1ILQl.vq', NULL, 'user', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-20 17:41:24', '2023-07-20 17:41:24'),
(55, 'writer', NULL, NULL, 'writer11@gmail.com', NULL, '$2y$10$ewvqClqfxg0u7r2KBXEep.0iuvRHVdCUtDRuNC8Fr2dGVfezOPVkq', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690525517____19156.png', NULL, NULL, '2023-07-28 06:25:17', '2023-07-28 06:25:17'),
(56, 'writer3', NULL, NULL, 'writer3@gmail.com', NULL, '$2y$10$coUi5DxRQxorS45PBUZ0FeZ7rLwYrsO4n9H54uO91RhrqdsL16YOy', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526315____48604.png', NULL, NULL, '2023-07-28 06:38:35', '2023-07-28 06:38:35'),
(57, 'writer4', NULL, NULL, 'writer4@gmail.com', NULL, '$2y$10$eumLQo1fgJXBf17hCPzw/.aReIs6p7oBo0b2Llb/4zr0X9Y.VSHfi', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/07/28/1690526332____41750.png', NULL, NULL, '2023-07-28 06:38:52', '2023-07-28 06:38:52'),
(58, 'w5', 'নাম (বাংলা)', 'কবি', 'w5@gmail.com', NULL, '$2y$10$mOFozPEfiVaoFDnz1F9NFuVAbgO6uDc/hwhN9bYi0oSXXcedDSJhO', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/08/14/1692000557____24118.png', NULL, NULL, '2023-08-03 20:26:13', '2023-08-14 18:09:17'),
(59, 'rtrt', 'নাম (বাংলা)222', 'কবি', 'rtrt@gmail.com', NULL, '$2y$10$Ta4SuX1MdQK2I.7f1A77GOokK83yFq/oBlhcj1KDOgcTPGfaOhc2W', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/08/14/1692000567____78640.png', NULL, NULL, '2023-08-03 20:26:43', '2023-08-14 18:09:27'),
(60, 'নাম (ইংলিশ্‌)', 'নাম (বাংলা)', 'গল্পকার', 'tptrVORDG1TYmwmVDj6A1691821277@puthiprokash.com', NULL, '$2y$10$x2Wnpsb/JItKCQXFD7BMU.i1hbTpPm2mwjGT3yeXl2gEVPtSLvi/m', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/08/14/1692000580____47265.png', NULL, NULL, '2023-08-12 06:21:17', '2023-08-14 18:09:40'),
(61, 'rtrt', 'নাম (বাংলা)', 'সাহিত্যিক', 'fbk1691821434@puthiprokash.com', NULL, '$2y$10$yINzBxVGT..9253nhjohTObA/aTxbw9IOstyL0vMqVEMUeYcGUhJ6', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/08/14/1692000590____25664.png', NULL, NULL, '2023-08-12 06:23:54', '2023-08-14 18:09:50'),
(62, 'M. M. Shamsuzzaman', 'এম. এম. শাসসুজ্জামান', 'গল্পকার', 'JlW1691821763@puthiprokash.com', NULL, '$2y$10$sZ90eo1Lq1m6s304u8WNQuRJQqCnkqAaPDwkmlfNx7UXuMZN6UyTe', NULL, 'writer', NULL, NULL, NULL, 'uploaded/user/writer/2023/08/14/1692000598____55499.png', NULL, NULL, '2023-08-12 06:29:23', '2023-08-15 16:09:12'),
(63, 'Md Nishad', 'Md Nishad', NULL, 'admin@gmail.com', NULL, '$2y$10$ayQ.wG7o11oVmTzqE2mptOluHBCt0oK7gJTfeVEHSGRvQJ8hpS.OW', '01909756552', 'Super Admin', 'users', NULL, NULL, NULL, NULL, NULL, '2023-08-16 17:00:14', '2023-08-16 17:02:01'),
(64, 'Product Manager', 'Product Manager', NULL, 'ProductManager@gmail.com', NULL, '$2y$10$wDyhD8q2clRDHquM11.19.q34y2drpei0ZDPEXJKD9Ag.3JWCzrpS', '01909756552', 'Product Manager', 'users', NULL, NULL, NULL, NULL, NULL, '2023-08-16 17:08:47', '2023-08-16 17:08:47'),
(65, 'Sales Manager', 'Sales Manager', NULL, 'SalesManager@gmail.com', NULL, '$2y$10$zr7HoW1OXrfPkwj.nlQbvev0xfjPaHbMqG7f/fosE9.l.OcaexJmm', '01909756552', 'Sales Manager', 'users', NULL, NULL, NULL, NULL, NULL, '2023-08-16 17:09:17', '2023-08-16 17:09:17'),
(66, 'Media Manager', 'Media Manager', NULL, 'MediaManager@gmail.com', NULL, '$2y$10$Vd/kUu8LFKN0y7fvqZ2vHeMR1ynWSZjKDMXt0goWzxuO62Uv879ju', '01909756552', 'Media Manager', 'users', NULL, NULL, NULL, NULL, NULL, '2023-08-16 17:09:48', '2023-08-16 17:09:48'),
(70, NULL, NULL, NULL, 'freelancernishad123@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-29 04:53:39', '2023-08-29 04:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `address`, `city`, `state`, `country`, `zip`, `created_at`, `updated_at`) VALUES
(1, 2, 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'Panchagarh', 'Rangpur', 'Bangladesh', '5020', '2023-07-24 08:46:09', '2023-07-24 09:06:54'),
(2, 2, 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'Panchagarh', 'Rangpur', 'Bangladesh', '5020', '2023-07-24 08:52:33', '2023-07-24 09:06:54'),
(3, 2, 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'Panchagarh', 'Rangpur', 'Bangladesh', '5020', '2023-07-24 08:52:39', '2023-07-24 09:06:54'),
(4, 45, 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'Panchagarh', 'Rangpur', 'Bangladesh', '5020', '2023-07-24 16:29:57', '2023-07-24 16:29:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_categories`
--
ALTER TABLE `feature_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_categories_category_id_foreign` (`category_id`);

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
-- Indexes for table `multimedia`
--
ALTER TABLE `multimedia`
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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_author_id_foreign` (`author_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `the_book_of_puthiprakashes`
--
ALTER TABLE `the_book_of_puthiprakashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `the_book_of_puthiprakashes_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_categories`
--
ALTER TABLE `feature_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flipping_books`
--
ALTER TABLE `flipping_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `the_book_of_puthiprakashes`
--
ALTER TABLE `the_book_of_puthiprakashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `feature_categories`
--
ALTER TABLE `feature_categories`
  ADD CONSTRAINT `feature_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `the_book_of_puthiprakashes`
--
ALTER TABLE `the_book_of_puthiprakashes`
  ADD CONSTRAINT `the_book_of_puthiprakashes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
