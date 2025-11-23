-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 06:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `possdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `action`, `user_id`, `category`, `business_id`, `created_at`, `updated_at`) VALUES
(105, 'Unit registered successfully', 47, 4, 40, '2023-08-31 04:58:42', '2023-08-31 04:58:42'),
(106, 'Product Category registered successfully', 47, 2, 40, '2023-08-31 04:59:08', '2023-08-31 04:59:08'),
(107, 'Product registered successfully', 47, 3, 40, '2023-08-31 05:01:03', '2023-08-31 05:01:03'),
(108, 'Supplier saved successfully', 47, 5, 40, '2023-08-31 05:09:51', '2023-08-31 05:09:51'),
(109, 'Stock registered successfully', 47, 6, 40, '2023-08-31 05:10:35', '2023-08-31 05:10:35'),
(110, 'Stock registered successfully', 47, 6, 40, '2023-08-31 05:17:08', '2023-08-31 05:17:08'),
(111, 'Expense Category registered successfully', 47, 7, 40, '2023-08-31 05:39:02', '2023-08-31 05:39:02'),
(112, 'Expense added successfully', 47, 1, 40, '2023-08-31 05:40:03', '2023-08-31 05:40:03'),
(113, 'Product Category registered successfully', 47, 2, 40, '2023-12-04 03:17:21', '2023-12-04 03:17:21'),
(114, 'Product Category registered successfully', 47, 2, 40, '2023-12-04 03:23:54', '2023-12-04 03:23:54'),
(115, 'Product Category Updated successfully', 47, 2, 40, '2023-12-04 03:24:21', '2023-12-04 03:24:21'),
(116, 'Product Category registered successfully', 47, 2, 40, '2023-12-06 04:33:56', '2023-12-06 04:33:56'),
(117, 'Product Category registered successfully', 47, 2, 40, '2023-12-06 04:58:53', '2023-12-06 04:58:53'),
(118, 'Product Category registered successfully', 47, 2, 40, '2023-12-06 04:59:21', '2023-12-06 04:59:21'),
(119, 'Product Category deleted successfully', 47, 2, 40, '2023-12-06 05:00:18', '2023-12-06 05:00:18'),
(120, 'Product Category deleted successfully', 47, 2, 40, '2023-12-06 05:00:24', '2023-12-06 05:00:24'),
(121, 'Product Category registered successfully', 47, 2, 40, '2023-12-06 05:26:00', '2023-12-06 05:26:00'),
(122, 'Supplier deleted successfully', 47, 5, 40, '2023-12-07 00:01:32', '2023-12-07 00:01:32'),
(123, 'Expense Category registered successfully', 47, 7, 40, '2023-12-07 00:30:39', '2023-12-07 00:30:39'),
(124, 'Expense deleted successfully', 47, 1, 40, '2023-12-07 03:18:26', '2023-12-07 03:18:26'),
(125, 'Expense deleted successfully', 47, 1, 40, '2023-12-07 03:20:02', '2023-12-07 03:20:02'),
(126, 'Expense deleted successfully', 47, 1, 40, '2023-12-07 03:42:55', '2023-12-07 03:42:55'),
(127, 'Expense deleted successfully', 47, 1, 40, '2023-12-07 03:43:35', '2023-12-07 03:43:35'),
(128, 'Unit registered successfully', 47, 4, 40, '2023-12-07 03:46:46', '2023-12-07 03:46:46'),
(129, 'Unit registered successfully', 47, 4, 40, '2023-12-07 08:52:57', '2023-12-07 08:52:57'),
(130, 'Unit registered successfully', 47, 4, 40, '2023-12-07 08:54:21', '2023-12-07 08:54:21'),
(131, 'Unit registered successfully', 47, 4, 40, '2023-12-07 08:55:15', '2023-12-07 08:55:15'),
(132, 'Expense Category registered successfully', 47, 7, 40, '2023-12-07 08:57:48', '2023-12-07 08:57:48'),
(133, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:07:10', '2023-12-10 03:07:10'),
(134, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:08:06', '2023-12-10 03:08:06'),
(135, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:08:16', '2023-12-10 03:08:16'),
(136, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:09:39', '2023-12-10 03:09:39'),
(137, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:16:33', '2023-12-10 03:16:33'),
(138, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:17:09', '2023-12-10 03:17:09'),
(139, 'Unit deleted successfully', 47, 4, 40, '2023-12-10 03:19:04', '2023-12-10 03:19:04'),
(140, 'Product Category deleted successfully', 47, 2, 40, '2023-12-10 03:24:42', '2023-12-10 03:24:42'),
(141, 'Product deleted successfully', 47, 3, 40, '2023-12-10 03:29:56', '2023-12-10 03:29:56'),
(142, 'Expense Category deleted successfully', 47, 7, 40, '2023-12-10 03:48:01', '2023-12-10 03:48:01'),
(143, 'Supplier updated successfully', 47, 5, 40, '2023-12-10 16:02:39', '2023-12-10 16:02:39'),
(144, 'Supplier updated successfully', 47, 5, 40, '2023-12-10 16:04:17', '2023-12-10 16:04:17'),
(145, 'Supplier updated successfully', 47, 5, 40, '2023-12-10 16:07:20', '2023-12-10 16:07:20'),
(146, 'Supplier updated successfully', 47, 5, 40, '2023-12-10 16:13:06', '2023-12-10 16:13:06'),
(147, 'Expense deleted successfully', 47, 1, 40, '2023-12-10 16:13:36', '2023-12-10 16:13:36'),
(148, 'Business deleted successfully', 1, 4, NULL, '2023-12-10 16:54:38', '2023-12-10 16:54:38'),
(149, 'Unit registered successfully', 47, 4, 40, '2024-02-02 13:58:18', '2024-02-02 13:58:18'),
(150, 'Unit deleted successfully', 47, 4, 40, '2024-02-02 13:58:27', '2024-02-02 13:58:27'),
(151, 'Unit registered successfully', 49, 4, 41, '2024-02-03 05:39:00', '2024-02-03 05:39:00'),
(152, 'Unit registered successfully', 50, 4, 42, '2024-02-03 05:42:58', '2024-02-03 05:42:58'),
(153, 'Supplier saved successfully', 50, 5, NULL, '2024-03-17 05:16:05', '2024-03-17 05:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `batchno` varchar(255) NOT NULL,
  `expirydate` date NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `product_id`, `batchno`, `expirydate`, `business_id`, `created_at`, `updated_at`) VALUES
(38, '4', '123d', '2023-11-30', 40, '2023-08-31 05:36:21', '2023-08-31 05:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `business_contact` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_logo` varchar(255) DEFAULT NULL,
  `business_enddate` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_name`, `business_email`, `business_contact`, `business_address`, `business_logo`, `business_enddate`, `status`, `created_at`, `updated_at`) VALUES
(41, 'Garage', 'garage@gmail.com', '09999999', 'jinja', '1706938648.png', '2024-12-31', 1, '2024-02-03 05:37:28', '2024-05-30 16:23:54'),
(42, 'Shop', 'shop@gmail.com', '0788999981', 'kira', '1706938858.png', '2024-12-31', 1, '2024-02-03 05:40:58', '2024-03-16 18:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `selling_priceid` varchar(255) NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coreproducts`
--

CREATE TABLE `coreproducts` (
  `id` int(20) UNSIGNED NOT NULL,
  `core_product` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expensecategories`
--

CREATE TABLE `expensecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `expense_category` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_amount` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `expense_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` bigint(20) DEFAULT NULL,
  `expensecategory_id` int(11) DEFAULT NULL,
  `enroll` int(11) NOT NULL DEFAULT 1,
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
-- Table structure for table `flyroles`
--

CREATE TABLE `flyroles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `staffuser_id` varchar(255) NOT NULL,
  `leave_name` varchar(255) NOT NULL,
  `leave_days` int(11) NOT NULL,
  `business_id` bigint(22) NOT NULL,
  `status` int(22) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from` bigint(22) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `business_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, '2023_01_09_082838_create_orders_table', 1),
(6, '2023_01_09_083252_create_order__details_table', 1),
(7, '2023_01_09_083605_create_products_table', 1),
(8, '2023_01_12_170543_create_productcategories_table', 1),
(9, '2023_01_14_172227_create_barcodes_table', 1),
(10, '2023_01_14_181844_create_purchases_table', 1),
(11, '2023_01_14_194943_create_expenses_table', 1),
(12, '2023_01_16_062103_create_suppliers_table', 1),
(13, '2023_01_16_071011_create_pos_table', 1),
(14, '2023_01_19_173532_create_stocks_table', 1),
(15, '2023_01_25_130357_create_units_table', 1),
(16, '2023_01_25_135733_create_carts_table', 1),
(17, '2023_01_30_144302_create_sales_table', 1),
(18, '2023_02_01_124137_create_saledetails_table', 1),
(19, '2023_02_02_091836_create_stockcarts_table', 1),
(20, '2023_03_02_090711_create_audits_table', 1),
(21, '2023_03_03_123823_create_toasties_table', 1),
(22, '2023_03_06_130455_create_userpermissions_table', 1),
(23, '2023_03_06_135904_create_salesreports_table', 1),
(24, '2023_03_07_175040_create_stockreports_table', 1),
(25, '2023_03_08_061032_create_staff_table', 1),
(26, '2023_03_27_134712_create_businesses_table', 2),
(27, '2023_03_29_131515_laratrust_setup_tables', 3),
(28, '2023_01_12_170546_create_expensecategories_table', 4),
(29, '2023_04_20_173607_create_flyrole_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order__details`
--

CREATE TABLE `order__details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dan@gmail.com', '$2y$10$j3m07s2iUJ/.Q4lJYygudujYDFBOENElIPsNRLcTxchrIptXmB8yO', '2023-04-06 03:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2023-03-29 10:25:41', '2023-03-29 10:25:41'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2023-03-29 10:25:42', '2023-03-29 10:25:42'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2023-03-29 10:25:42', '2023-03-29 10:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_categoryid` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `barcode` text DEFAULT NULL,
  `unit_id` varchar(255) NOT NULL,
  `alert_stock` int(11) NOT NULL,
  `buying_price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `expirydate` date DEFAULT NULL,
  `batchno` varchar(255) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasecarts`
--

CREATE TABLE `purchasecarts` (
  `id` int(11) NOT NULL,
  `coreproduct_id` bigint(20) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `buyingunit` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expirydate` varchar(255) NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `id` int(11) NOT NULL,
  `coreproduct_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `buyingunit` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `batchno` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `discount` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `supplier_contact` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `business_id`, `status`, `discount`, `supplier_name`, `total`, `supplier_contact`, `created_at`, `updated_at`) VALUES
(30, 40, 1, '9', 'larry', '50000', '987654565', '2023-08-31 05:36:21', '2023-08-31 05:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2023-03-29 10:25:40', '2023-03-29 10:25:40'),
(2, 'user', 'User', 'User', '2023-03-29 10:25:42', '2023-03-29 10:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 12, 'App\\Models\\User'),
(1, 13, 'App\\Models\\User'),
(2, 14, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

CREATE TABLE `saledetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `selling_priceid` varchar(255) NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(255) DEFAULT NULL,
  `paid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_contact` varchar(255) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `product_total` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesreports`
--

CREATE TABLE `salesreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `staff_email` varchar(255) DEFAULT NULL,
  `staff_dob` varchar(255) DEFAULT NULL,
  `staff_contact` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `leave_days` int(22) DEFAULT NULL,
  `staff_address` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `enroll` int(11) NOT NULL DEFAULT 0,
  `business_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_name`, `staff_email`, `staff_dob`, `staff_contact`, `gender`, `leave_days`, `staff_address`, `status`, `enroll`, `business_id`, `created_at`, `updated_at`) VALUES
(29, 'jack', 'jack@gmail.com', '2003-04-30', '0998765566', 'male', 28, 'jinja', 1, 1, '40', '2023-08-31 05:42:04', '2023-12-07 17:30:25'),
(30, 'Nora', 'nora@gmail.com', '1997-09-10', '0752888665', 'female', 21, 'Mbuya', 1, 0, '40', '2023-09-21 13:32:48', '2023-12-10 03:52:40'),
(31, 'kevin', 'kevin@gmail.com', '2024-01-18', '0998765566', 'male', 8, 'kira', 1, 0, '40', '2024-01-18 14:48:48', '2024-01-18 14:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `stockcarts`
--

CREATE TABLE `stockcarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `qty_id` varchar(255) DEFAULT NULL,
  `buying_price` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockreports`
--

CREATE TABLE `stockreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `buying_price` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `qty`, `buying_price`, `date`, `business_id`, `created_at`, `updated_at`) VALUES
(20, '23', '3', '80000', '2023-08-31', 40, '2023-08-31 05:01:03', '2024-01-14 04:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `supplier_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `address`, `phone`, `email`, `supplier_date`, `status`, `business_id`, `created_at`, `updated_at`) VALUES
(5, 'Leo', 'Mbuya', '098765444', 'balvin@nugsoft.com', '2024-03-17', 1, 42, '2024-03-17 05:16:05', '2024-03-17 05:16:05'),
(6, 'mike', 'kityo', '9871234', 'kito@gmail.com', 'Sunday', 1, NULL, '2024-03-17 07:11:12', '2024-03-17 07:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `business_id` int(22) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toasties`
--

CREATE TABLE `toasties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `symbol`, `status`, `business_id`, `created_at`, `updated_at`) VALUES
(21, 'Kilograms', 'kg', 1, 41, '2024-02-03 05:39:00', '2024-02-03 05:39:00'),
(22, 'Piece', 'pcs', 1, 42, '2024-02-03 05:42:58', '2024-02-03 05:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `userpermissions`
--

CREATE TABLE `userpermissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `view_productcategory` tinyint(1) NOT NULL DEFAULT 0,
  `add_productcategory` tinyint(1) NOT NULL DEFAULT 0,
  `update_productcategory` tinyint(1) NOT NULL DEFAULT 0,
  `delete_productcategory` tinyint(1) NOT NULL DEFAULT 0,
  `view_product` tinyint(1) NOT NULL DEFAULT 0,
  `add_product` tinyint(1) NOT NULL DEFAULT 0,
  `update_product` tinyint(1) NOT NULL DEFAULT 0,
  `delete_product` tinyint(1) NOT NULL DEFAULT 0,
  `view_unit` tinyint(1) NOT NULL DEFAULT 0,
  `add_unit` tinyint(1) NOT NULL DEFAULT 0,
  `update_unit` tinyint(1) NOT NULL DEFAULT 0,
  `delete_unit` tinyint(1) NOT NULL DEFAULT 0,
  `view_supplier` int(11) NOT NULL DEFAULT 0,
  `add_supplier` int(11) NOT NULL DEFAULT 0,
  `update_supplier` int(11) NOT NULL DEFAULT 0,
  `delete_supplier` int(11) NOT NULL DEFAULT 0,
  `add_staff` int(11) NOT NULL DEFAULT 0,
  `view_staff` int(11) NOT NULL DEFAULT 0,
  `delete_staff` int(11) NOT NULL DEFAULT 0,
  `view_expense` int(11) NOT NULL DEFAULT 0,
  `add_expense` int(11) NOT NULL DEFAULT 0,
  `update_expense` int(11) NOT NULL DEFAULT 0,
  `delete_expense` int(11) NOT NULL DEFAULT 0,
  `view_stockcart` tinyint(1) NOT NULL DEFAULT 0,
  `view_audits` tinyint(1) NOT NULL DEFAULT 0,
  `view_stocklist` tinyint(1) NOT NULL DEFAULT 0,
  `view_cart` tinyint(1) NOT NULL DEFAULT 0,
  `view_barcode` tinyint(1) NOT NULL DEFAULT 0,
  `view_salesreport` int(11) NOT NULL DEFAULT 0,
  `view_stockreport` int(11) NOT NULL DEFAULT 0,
  `view_saleslist` int(11) NOT NULL DEFAULT 0,
  `view_permissions` int(11) NOT NULL DEFAULT 0,
  `business_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userpermissions`
--

INSERT INTO `userpermissions` (`id`, `rolename`, `view_productcategory`, `add_productcategory`, `update_productcategory`, `delete_productcategory`, `view_product`, `add_product`, `update_product`, `delete_product`, `view_unit`, `add_unit`, `update_unit`, `delete_unit`, `view_supplier`, `add_supplier`, `update_supplier`, `delete_supplier`, `add_staff`, `view_staff`, `delete_staff`, `view_expense`, `add_expense`, `update_expense`, `delete_expense`, `view_stockcart`, `view_audits`, `view_stocklist`, `view_cart`, `view_barcode`, `view_salesreport`, `view_stockreport`, `view_saleslist`, `view_permissions`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL),
(36, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 41, '2024-02-03 05:37:29', '2024-02-03 05:37:29'),
(37, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 42, '2024-02-03 05:40:58', '2024-02-03 05:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `business_id` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `role_id`, `business_id`, `updated_at`) VALUES
(1, 'Dan', 'dan@gmail.com', NULL, '$2y$10$2yvJwJz0HRxS4LZIgtdoTOaF0Eou7A.CcR2c8zKp7O2vQwym8VdyO', '39P8Vs2uMvQJTxb3v7jIVas9uPsGEvabf4IM1O3vCM1NPDUwZ4acHffMoCVu', '2023-03-15 02:00:48', 0, NULL, '2023-03-15 02:00:48'),
(49, 'lee', 'lee@gmail.com', NULL, '$2y$10$0aBk9pLUHQij3PyYp/Ktx.6KVNNhzTEKlTqhoxjmh0eKofACaII..', NULL, '2024-02-03 05:37:29', 36, 41, '2024-02-03 05:37:29'),
(50, 'meg', 'meg@gmail.com', NULL, '$2y$10$pEIzmRYpbe8R05qzjv4upOkVWybQaRTVzJsG8FGDJHnRSpT80p30m', NULL, '2024-02-03 05:40:58', 37, 42, '2024-02-03 05:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `businesses_business_email_unique` (`business_email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coreproducts`
--
ALTER TABLE `coreproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensecategories`
--
ALTER TABLE `expensecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flyroles`
--
ALTER TABLE `flyroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__details`
--
ALTER TABLE `order__details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreports`
--
ALTER TABLE `salesreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_staff_email_unique` (`staff_email`);

--
-- Indexes for table `stockcarts`
--
ALTER TABLE `stockcarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockreports`
--
ALTER TABLE `stockreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toasties`
--
ALTER TABLE `toasties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpermissions`
--
ALTER TABLE `userpermissions`
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
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `coreproducts`
--
ALTER TABLE `coreproducts`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expensecategories`
--
ALTER TABLE `expensecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flyroles`
--
ALTER TABLE `flyroles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order__details`
--
ALTER TABLE `order__details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `salesreports`
--
ALTER TABLE `salesreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stockcarts`
--
ALTER TABLE `stockcarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stockreports`
--
ALTER TABLE `stockreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `toasties`
--
ALTER TABLE `toasties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `userpermissions`
--
ALTER TABLE `userpermissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
