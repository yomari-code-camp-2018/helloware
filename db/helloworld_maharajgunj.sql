-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 03:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helloworld_maharajgunj`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_expense`
--

CREATE TABLE `billing_expense` (
  `expense_id` int(11) NOT NULL,
  `expense_category` varchar(100) NOT NULL,
  `expense_transaction` varchar(150) NOT NULL,
  `expense_amount` bigint(255) NOT NULL,
  `user_name` varchar(112) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_expense`
--

INSERT INTO `billing_expense` (`expense_id`, `expense_category`, `expense_transaction`, `expense_amount`, `user_name`, `expense_date`, `expense_time`) VALUES
(1, 'Water', 'water', 135, '', '2018-01-19', '11:30:16'),
(2, 'Veg', 'veg', 265, '', '2018-01-19', '11:31:51'),
(3, 'Tea', 'milk', 40, '', '2018-01-19', '13:18:33'),
(4, 'Tea', 'milk', 40, '', '2018-01-19', '15:42:32'),
(5, 'Tea', 'srijana tips', 500, '', '2018-01-19', '16:44:50'),
(6, 'Tea', 'srijana tips', 500, '', '2018-01-19', '16:44:50'),
(7, 'Tea', 'srijana tips', 500, '', '2018-01-19', '16:44:50'),
(8, 'Veg', 'veg', 200, '', '2018-01-20', '11:11:58'),
(9, 'Non-veg', 'chicken', 550, '', '2018-01-20', '11:12:24'),
(10, 'Tea', 'milk', 80, '', '2018-01-20', '14:10:20'),
(11, 'Tea', 'khaja', 480, '', '2018-01-20', '14:12:18'),
(12, 'Tea', 'khaja', 480, '', '2018-01-20', '14:12:18'),
(13, 'Water', 'water', 90, '', '2018-01-21', '15:10:20'),
(14, 'Veg', 'veg', 315, '', '2018-01-21', '15:10:35'),
(15, 'Stationery expenses ', 'balloon n flowers', 1090, '', '2018-01-21', '15:11:19'),
(16, 'Tea', 'milk', 40, '', '2018-01-21', '15:11:32'),
(17, 'Tea', 'milk/biscuit', 200, '', '2018-01-22', '10:09:22'),
(18, 'Tea', 'milk/biscuit', 200, '', '2018-01-22', '10:09:22'),
(19, 'Tea', 'cake', 450, '', '2018-01-22', '10:09:52'),
(20, 'Tea', 'cake', 450, '', '2018-01-22', '10:09:52'),
(21, 'Veg', 'veg', 300, '', '2018-01-23', '10:20:30'),
(22, 'Veg', 'veg', 300, '', '2018-01-23', '10:20:31'),
(23, 'Tea', 'milk', 40, '', '2018-01-23', '13:53:17'),
(24, 'Tea', 'coffee', 755, '', '2018-01-23', '13:53:38'),
(25, 'Tea', 'sir khaja', 65, '', '2018-01-23', '18:09:38'),
(26, 'Veg', 'veg', 500, '', '2018-01-24', '10:28:35'),
(27, 'grocery', 'tissue paper,dettol', 1169, '', '2018-01-24', '13:23:24'),
(28, 'grocery', 'tissue paper,dettol', 1169, '', '2018-01-24', '13:23:24'),
(29, 'Milk', 'milk', 40, '', '2018-01-24', '14:00:19'),
(30, 'Milk', 'milk', 40, '', '2018-01-24', '14:00:19'),
(31, 'Water', 'water', 90, '', '2018-01-24', '14:37:56'),
(32, 'Veg', 'veg', 200, '', '2018-01-25', '10:35:44'),
(33, 'Electronicity expenses ', 'cfl bulb', 750, '', '2018-01-25', '13:04:35'),
(34, 'Tea', 'milk', 40, '', '2018-01-25', '14:17:39'),
(35, 'Veg', 'veg', 130, '', '2018-01-26', '10:45:32'),
(36, 'Water', 'water jar', 135, '', '2018-01-26', '13:41:38'),
(37, 'Tea', 'milk', 120, '', '2018-01-26', '13:41:50'),
(38, 'Veg', 'chicken', 600, '', '2018-01-27', '10:36:33'),
(39, 'Veg', 'veg', 250, '', '2018-01-27', '10:37:22'),
(40, 'Veg', 'salt', 50, '', '2018-01-27', '10:37:38'),
(41, 'Milk', 'milk', 80, '', '2018-01-27', '14:12:38'),
(42, 'Staff khaja ', 'khaja', 200, '', '2018-01-27', '14:13:04'),
(43, 'Veg', 'veg', 250, '', '2018-01-28', '10:27:45'),
(44, 'Water', 'water jar', 135, '', '2018-01-28', '13:15:09'),
(45, 'Water', 'water jar', 135, '', '2018-01-28', '13:15:09'),
(46, 'Milk', 'milk', 70, '', '2018-01-28', '14:03:20'),
(47, 'grocery', 'coffee', 755, '', '2018-01-28', '14:04:02'),
(48, 'Veg', 'veg', 215, '', '2018-01-29', '11:23:03'),
(49, 'Milk', 'milk', 80, '', '2018-01-29', '13:50:56'),
(50, 'Veg', 'veg', 140, '', '2018-01-30', '10:42:09'),
(51, 'Veg', 'masaura', 40, '', '2018-01-30', '10:42:26'),
(52, 'Rice', 'rice', 225, '', '2018-01-30', '10:42:39'),
(53, 'Rice', 'rice', 225, '', '2018-01-30', '10:42:39'),
(54, 'Water', 'water jar', 90, '', '2018-01-30', '12:36:53'),
(55, 'Tea', 'milk', 80, '', '2018-01-30', '13:50:17'),
(56, 'Veg', 'veg', 380, '', '2018-01-31', '11:05:05'),
(57, 'Veg', 'veg', 380, '', '2018-01-31', '11:05:05'),
(58, 'Water', 'water', 90, '', '2018-01-31', '13:31:13'),
(59, 'Milk', 'milk', 80, '', '2018-01-31', '14:07:06'),
(60, 'grocery', 'prill,dettol.tissue paper,toilet paper', 2800, '', '2018-01-31', '15:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `billing_purchase`
--

CREATE TABLE `billing_purchase` (
  `purchase_id` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch_name` varchar(1000) NOT NULL DEFAULT 'Koteshwor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_purchase_transaction`
--

CREATE TABLE `billing_purchase_transaction` (
  `purchase_order_id` int(11) NOT NULL,
  `transaction_type` varchar(500) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_quantity` varchar(50) NOT NULL DEFAULT '1',
  `purchase_paid` varchar(50) NOT NULL,
  `purchase_tran_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_sales`
--

CREATE TABLE `billing_sales` (
  `sales_id` int(11) NOT NULL,
  `member_name` varchar(200) NOT NULL,
  `member_card` varchar(2000) NOT NULL,
  `sales_amount` bigint(100) NOT NULL,
  `recieved_amount` bigint(20) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `discount_reason` varchar(150) NOT NULL,
  `member_discount` int(150) NOT NULL,
  `payment_type` varchar(1000) NOT NULL,
  `billing_date` date NOT NULL,
  `billing_time` time NOT NULL,
  `sales_type` varchar(100) NOT NULL,
  `service_by` varchar(500) NOT NULL,
  `terminate` varchar(200) NOT NULL,
  `terminate_reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_sales`
--

INSERT INTO `billing_sales` (`sales_id`, `member_name`, `member_card`, `sales_amount`, `recieved_amount`, `discount_rate`, `discount_reason`, `member_discount`, `payment_type`, `billing_date`, `billing_time`, `sales_type`, `service_by`, `terminate`, `terminate_reason`) VALUES
(1, '', '', 50000, 222, 0, '', 0, 'Cash', '2018-02-02', '20:15:37', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing_sales_order`
--

CREATE TABLE `billing_sales_order` (
  `sales_order_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_name` varchar(2000) NOT NULL,
  `product_price` decimal(65,0) NOT NULL,
  `billing_qty` bigint(100) NOT NULL DEFAULT '1',
  `service_by` varchar(2000) DEFAULT NULL,
  `employee_id` bigint(65) DEFAULT NULL,
  `tran_total` decimal(65,0) NOT NULL,
  `billing_date` date NOT NULL,
  `billing_time` time NOT NULL,
  `sales_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_sales_order`
--

INSERT INTO `billing_sales_order` (`sales_order_id`, `sales_id`, `product_id`, `product_name`, `category_name`, `product_price`, `billing_qty`, `service_by`, `employee_id`, `tran_total`, `billing_date`, `billing_time`, `sales_type`) VALUES
(1, 1, 1, 'test', 'Laptop', '50000', 1, '', NULL, '0', '2018-02-02', '20:15:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing_stock`
--

CREATE TABLE `billing_stock` (
  `stock_tr_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `sales_order_id` bigint(25) DEFAULT NULL,
  `product_name` varchar(500) NOT NULL,
  `stock_in` bigint(11) NOT NULL,
  `stock_out` bigint(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `branch_name` varchar(200) NOT NULL,
  `stock_tr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_stock`
--

INSERT INTO `billing_stock` (`stock_tr_id`, `purchase_id`, `sales_order_id`, `product_name`, `stock_in`, `stock_out`, `user_name`, `category_name`, `branch_name`, `stock_tr_date`) VALUES
(1, NULL, NULL, 'BIG COMB', 1, 0, 'hwc_root', NULL, 'Koteshwor', '2018-01-17 23:23:56'),
(37, NULL, 49, 'COLOUR-STREAX-2', 0, 1, NULL, 'Product', '', '2018-01-19 15:42:55'),
(50, NULL, 62, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 2, NULL, 'Product', '', '2018-01-19 16:11:20'),
(51, NULL, 63, 'LOTUS-PHYTORX-PROTECTIVE LOTION', 0, 1, NULL, 'Product', '', '2018-01-19 16:11:56'),
(53, NULL, 65, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 2, NULL, 'Product', '', '2018-01-19 16:12:57'),
(54, NULL, 66, 'LOTUS-PHYTORX-PROTECTIVE LOTION', 0, 1, NULL, 'Product', '', '2018-01-19 16:13:33'),
(57, NULL, 69, 'DENIM AFTER SHAVE', 0, 1, NULL, 'Product', '', '2018-01-19 16:18:15'),
(97, NULL, 109, 'KOREAN COLOUR-DARK BROWN S6', 0, 1, NULL, 'Product', '', '2018-01-19 17:52:14'),
(99, NULL, 111, 'KOREAL DEVELOPER', 0, 1, NULL, 'Product', '', '2018-01-19 17:52:26'),
(100, NULL, NULL, 'LOTUS-4 LAYER AGEING KIT', 5, 0, 'meena', NULL, 'Pulchowk', '2018-01-19 18:09:48'),
(102, NULL, 113, 'RICHFEEL-BRAHMI HAIR PACK 500GM', 0, 1, NULL, 'Product', '', '2018-01-20 11:13:48'),
(103, NULL, 114, 'SCHWARZKOFP-BC- REPAIR RESCUE TREATMENT-750ML', 0, 1, NULL, 'Product', '', '2018-01-20 11:14:32'),
(124, NULL, 135, 'COLOUR-STREAX-4', 0, 1, NULL, 'Product', '', '2018-01-20 11:40:00'),
(125, NULL, 136, 'COLOUR-STREAX-4', 0, 1, NULL, 'Product', '', '2018-01-20 11:40:00'),
(160, NULL, 171, 'GILLETE BLADE', 0, 1, NULL, 'Product', '', '2018-01-20 14:07:50'),
(174, NULL, 185, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-20 14:52:21'),
(183, NULL, 194, 'HAIR SPRAY BOTTLE', 0, 1, NULL, 'Product', '', '2018-01-21 11:38:44'),
(186, NULL, 197, 'ROSE WATER', 0, 1, NULL, 'Product', '', '2018-01-21 11:39:15'),
(187, NULL, 198, 'ROSE WATER', 0, 1, NULL, 'Product', '', '2018-01-21 11:39:15'),
(188, NULL, 199, 'LOTUS-REJUVINA LOTION', 0, 1, NULL, 'Product', '', '2018-01-21 11:45:10'),
(196, NULL, 207, 'SCHWARZKOFP-BC- VOLUME BOOST SHAMPOO-250ML', 0, 1, NULL, 'Product', '', '2018-01-21 11:50:58'),
(197, NULL, 208, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 1, NULL, 'Product', '', '2018-01-21 11:51:46'),
(225, NULL, 236, 'LOTUS-PHYTORX-W/B DAY CREAM', 0, 1, NULL, 'Product', '', '2018-01-22 11:08:56'),
(233, NULL, 244, 'HIGHLIGHT-CAP', 0, 1, NULL, 'Product', '', '2018-01-22 11:49:34'),
(235, NULL, 246, 'LOLANE CONDITIONER', 0, 1, NULL, 'Product', '', '2018-01-22 15:05:18'),
(236, NULL, 247, 'LOLANE CONDITIONER', 0, 1, NULL, 'Product', '', '2018-01-22 15:05:18'),
(237, NULL, 248, 'COLOUR-SCHWARZKOF-6-0', 0, 1, NULL, 'Product', '', '2018-01-22 15:05:39'),
(238, NULL, 249, 'COLOUR-SCHWARZKOF-6-0', 0, 1, NULL, 'Product', '', '2018-01-22 15:05:49'),
(261, NULL, 272, 'WAX PAPER', 0, 1, NULL, 'Product', '', '2018-01-23 11:08:09'),
(263, NULL, 274, 'COTTON', 0, 1, NULL, 'Product', '', '2018-01-23 11:08:24'),
(267, NULL, 278, 'LOTUS-HYDRA-CLEANSER', 0, 1, NULL, 'Product', '', '2018-01-23 12:29:03'),
(276, NULL, 287, 'LOTUS-PHYTORX-ANTI BLEMISH CREAM', 0, 1, NULL, 'Product', '', '2018-01-23 13:28:50'),
(277, NULL, 288, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 1, NULL, 'Product', '', '2018-01-23 13:29:12'),
(284, NULL, 295, 'LOTUS-PHYTORX-SPF 70', 0, 1, NULL, 'Product', '', '2018-01-23 14:12:29'),
(291, NULL, 302, 'LOTUS-PHYTORX-W/B FACEWASH ', 0, 1, NULL, 'Product', '', '2018-01-23 15:29:32'),
(292, NULL, 303, 'LOTUS-PHYTORX-SPF 30', 0, 1, NULL, 'Product', '', '2018-01-23 15:30:12'),
(295, NULL, 306, 'LOTUS-PHYTORX-ANTI AGEING DAY CREAM', 0, 1, NULL, 'Product', '', '2018-01-23 15:33:36'),
(299, NULL, 310, 'COCUNUT OIL', 0, 1, NULL, 'Product', '', '2018-01-23 16:23:19'),
(301, NULL, 323, 'ROSE WATER', 0, 1, NULL, 'Product', '', '2018-01-24 10:16:15'),
(331, NULL, 353, 'STREAX-DEVELOPER-6% 20 VOLUME', 0, 1, NULL, 'Product', '', '2018-01-24 18:07:20'),
(332, NULL, 354, 'COLOUR-STREAX-5', 0, 1, NULL, 'Product', '', '2018-01-24 18:07:49'),
(345, NULL, 367, 'LOTUS-PHYTORX-PROTECTIVE LOTION', 0, 1, NULL, 'Product', '', '2018-01-25 10:48:00'),
(348, NULL, 370, 'LOTUS-PHYTORX-ANTI AGEING DAY CREAM', 0, 1, NULL, 'Product', '', '2018-01-25 11:47:04'),
(352, NULL, 374, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 1, NULL, 'Product', '', '2018-01-25 11:52:45'),
(353, NULL, 375, 'LOTUS-PHYTORX-W/B DAY CREAM', 0, 1, NULL, 'Product', '', '2018-01-25 11:53:19'),
(365, NULL, 387, 'GILLETE BLADE', 0, 1, NULL, 'Product', '', '2018-01-25 14:15:59'),
(367, NULL, 389, 'NECK PAPER', 0, 1, NULL, 'Product', '', '2018-01-25 15:01:06'),
(372, NULL, 402, 'NECK PAPER', 0, 2, NULL, 'Product', '', '2018-01-25 16:45:04'),
(378, NULL, 408, 'BRILLARE-HEAVY MOISTURISING CONDITIONER-125ML', 0, 1, NULL, 'Product', '', '2018-01-26 11:50:45'),
(379, NULL, 409, 'COLOUR-STREAX-3', 0, 1, NULL, 'Product', '', '2018-01-26 11:57:42'),
(383, NULL, 413, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-26 12:42:09'),
(403, NULL, 433, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-26 14:35:49'),
(412, NULL, 442, 'LOTUS-PHYTORX-DAILY DEEP CLEANSING FACEWASH', 0, 1, NULL, 'Product', '', '2018-01-26 16:10:16'),
(423, NULL, 453, 'SCHWARZKOFP-BC- MOISTURE KICK SHAMPOO 250ML', 0, 1, NULL, 'Product', '', '2018-01-26 17:30:29'),
(426, NULL, 456, 'SCHWARZKOFP-BC- REPAIR RESCUE TREATMENT-200ML', 0, 1, NULL, 'Product', '', '2018-01-26 17:30:55'),
(432, NULL, 462, 'STREAX-DEVELOPER-9% 30 VOLUME', 0, 1, NULL, 'Product', '', '2018-01-27 09:37:40'),
(454, NULL, 484, 'GILLETE AFTER SHAVE', 0, 1, NULL, 'Product', '', '2018-01-27 12:01:15'),
(473, NULL, 503, 'ORGANIC MEHANDI', 0, 1, NULL, 'Product', '', '2018-01-27 13:53:33'),
(479, NULL, 509, 'LOTUS-PHYTORX-SPF 50', 0, 1, NULL, 'Product', '', '2018-01-27 14:30:37'),
(480, NULL, 510, 'STREAX-HAIR SERUM(SMALL)', 0, 1, NULL, 'Product', '', '2018-01-27 14:39:08'),
(502, NULL, 532, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-27 15:16:20'),
(504, NULL, 534, 'BRILLARE-HEAVY MOISTURISING SHAMPOO-300ML', 0, 1, NULL, 'Product', '', '2018-01-27 15:20:00'),
(505, NULL, 535, 'BRILLARE-HEAVY MOISTURISING CONDITIONER-125ML', 0, 1, NULL, 'Product', '', '2018-01-27 15:20:15'),
(514, NULL, 544, 'BRILLARE-STYLE CARE SHAMPOO-300ML', 0, 1, NULL, 'Product', '', '2018-01-27 16:05:21'),
(544, NULL, 574, 'ROSE WATER', 0, 1, NULL, 'Product', '', '2018-01-28 10:28:00'),
(557, NULL, 587, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-28 11:24:08'),
(559, NULL, 589, 'LOTUS-4 LAYER AGEING KIT', 0, 1, NULL, 'Product', '', '2018-01-28 12:33:13'),
(561, NULL, 591, 'LOTUS-4 LAYER WHITENING KIT', 0, 1, NULL, 'Product', '', '2018-01-28 12:33:22'),
(569, NULL, 599, 'KOREAN COLOUR-DARK BROWN S6', 0, 1, NULL, 'Product', '', '2018-01-28 13:51:39'),
(570, NULL, 600, 'KOREAN COLOUR-DARK BROWN S6', 0, 1, NULL, 'Product', '', '2018-01-28 13:51:50'),
(571, NULL, 601, 'KOREAN COLOUR-DARK BROWN S6', 0, 1, NULL, 'Product', '', '2018-01-28 13:51:50'),
(572, NULL, 602, 'KOREAN COLOUR-DARK BROWN S6', 0, 1, NULL, 'Product', '', '2018-01-28 13:51:56'),
(574, NULL, 604, 'KOREAL DEVELOPER', 0, 4, NULL, 'Product', '', '2018-01-28 13:52:22'),
(586, NULL, 616, 'LOTUS-PHYTORX-DEEP MOISTURISING CREAM ', 0, 1, NULL, 'Product', '', '2018-01-28 14:14:16'),
(587, NULL, 617, 'LOTUS-PHYTORX-PROTECTIVE LOTION', 0, 1, NULL, 'Product', '', '2018-01-28 14:15:16'),
(594, NULL, 633, 'BRILLARE-HEAVY MOISTURISING SHAMPOO-300ML', 0, 1, NULL, 'Product', '', '2018-01-28 16:20:46'),
(595, NULL, 634, 'BRILLARE-HEAVY MOISTURISING CONDITIONER-125ML', 0, 1, NULL, 'Product', '', '2018-01-28 16:21:03'),
(617, NULL, 656, 'ROSE WATER', 0, 1, NULL, 'Product', '', '2018-01-29 09:36:10'),
(626, NULL, 691, 'LOTUS-PHYTORX-W/B FACEWASH ', 0, 1, NULL, 'Product', '', '2018-01-30 12:13:15'),
(627, NULL, 692, 'LOTUS-PHYTORX-CLARIFYING & SMOOTH TONER', 0, 1, NULL, 'Product', '', '2018-01-30 12:13:48'),
(631, NULL, 696, 'LOTUS-PHYTORX-SPF 50', 0, 1, NULL, 'Product', '', '2018-01-30 12:34:32'),
(639, NULL, 707, 'MEMBERSHIP CARD', 0, 1, NULL, 'Product', '', '2018-01-30 14:02:55'),
(652, NULL, 720, 'scintilla-aloe vera hand and body lotion', 0, 1, NULL, 'Product', '', '2018-01-30 16:58:48'),
(653, NULL, 721, 'scintilla-anti ageing hand and body lotion', 0, 1, NULL, 'Product', '', '2018-01-30 16:58:55'),
(654, NULL, 722, 'LOTUS-HYDRA-MASSAGE CREAM', 0, 1, NULL, 'Product', '', '2018-01-30 16:59:13'),
(670, NULL, 738, 'COLOUR-SCHWARZKOF-IGORA-7-0', 0, 1, NULL, 'Product', '', '2018-01-31 11:08:58'),
(671, NULL, 739, 'COLOUR-SCHWARZKOF-IGORA-7-0', 0, 1, NULL, 'Product', '', '2018-01-31 11:08:58'),
(688, NULL, 756, 'SCHWARZKOFP-BC- COLOR FREEZE SHAMPOO 250ML', 0, 1, NULL, 'Product', '', '2018-01-31 13:11:23'),
(689, NULL, 757, 'SCHWARZKOFP-BC- REPAIR RESCUE TREATMENT-200ML', 0, 1, NULL, 'Product', '', '2018-01-31 13:11:58'),
(691, NULL, 759, 'COLOUR-SCHWARZKOF-IGORA-7-0', 0, 1, NULL, 'Product', '', '2018-01-31 13:17:18'),
(692, NULL, 1, 'test', 0, 1, NULL, 'Laptop', '', '2018-02-02 20:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `billing_user`
--

CREATE TABLE `billing_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` bigint(25) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_user`
--

INSERT INTO `billing_user` (`user_id`, `user_name`, `user_password`, `first_name`, `last_name`, `user_address`, `user_mobile`, `user_email`, `status`) VALUES
(1, 'jyoti', 'jyoti', 'test', 'test', 'test', 9845000000, 'nepaljyoti@gmail.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `billing_user_access`
--

CREATE TABLE `billing_user_access` (
  `user_access_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `bank_menu` varchar(12) NOT NULL,
  `bank_cash_deposite` varchar(12) NOT NULL,
  `suppliers_menu` varchar(12) NOT NULL,
  `suppliers_create_purchase` varchar(12) NOT NULL,
  `suppliers_create_purchase_return` varchar(12) NOT NULL,
  `suppliers_purchase_transaction` varchar(12) NOT NULL,
  `suppliers_purchase_payment` varchar(12) NOT NULL,
  `stock_management_menu` varchar(12) NOT NULL,
  `stock_check` varchar(12) NOT NULL,
  `report_menu` varchar(12) NOT NULL,
  `report_today` varchar(12) NOT NULL,
  `dashboard_do_sales` varchar(12) NOT NULL,
  `dashboard_complimentry_sales` varchar(12) NOT NULL,
  `dashboard_sales_report` varchar(12) NOT NULL,
  `dashboard_do_expense` varchar(12) NOT NULL,
  `dashboard_total_invoice` varchar(12) NOT NULL,
  `dashboard_total_sales` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_user_access`
--

INSERT INTO `billing_user_access` (`user_access_id`, `user_name`, `bank_menu`, `bank_cash_deposite`, `suppliers_menu`, `suppliers_create_purchase`, `suppliers_create_purchase_return`, `suppliers_purchase_transaction`, `suppliers_purchase_payment`, `stock_management_menu`, `stock_check`, `report_menu`, `report_today`, `dashboard_do_sales`, `dashboard_complimentry_sales`, `dashboard_sales_report`, `dashboard_do_expense`, `dashboard_total_invoice`, `dashboard_total_sales`) VALUES
(1, 'jyoti', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_expense`
--
ALTER TABLE `billing_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `billing_purchase`
--
ALTER TABLE `billing_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `billing_purchase_transaction`
--
ALTER TABLE `billing_purchase_transaction`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `billing_sales`
--
ALTER TABLE `billing_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `billing_sales_order`
--
ALTER TABLE `billing_sales_order`
  ADD PRIMARY KEY (`sales_order_id`);

--
-- Indexes for table `billing_stock`
--
ALTER TABLE `billing_stock`
  ADD PRIMARY KEY (`stock_tr_id`);

--
-- Indexes for table `billing_user`
--
ALTER TABLE `billing_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `billing_user_access`
--
ALTER TABLE `billing_user_access`
  ADD PRIMARY KEY (`user_access_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_expense`
--
ALTER TABLE `billing_expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `billing_purchase`
--
ALTER TABLE `billing_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_purchase_transaction`
--
ALTER TABLE `billing_purchase_transaction`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_sales`
--
ALTER TABLE `billing_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_sales_order`
--
ALTER TABLE `billing_sales_order`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_stock`
--
ALTER TABLE `billing_stock`
  MODIFY `stock_tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=693;

--
-- AUTO_INCREMENT for table `billing_user`
--
ALTER TABLE `billing_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_user_access`
--
ALTER TABLE `billing_user_access`
  MODIFY `user_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
