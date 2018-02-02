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
-- Database: `helloworld_koteshwor`
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
(1, '', '', 50000, 555, 0, '', 0, 'Cash', '2018-02-02', '15:42:11', '', '', '', ''),
(2, '', '', 100000, 555, 0, '', 0, 'Cash', '2018-02-02', '20:11:39', '', '', '', '');

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
(1, 1, 1, 'test', 'Laptop', '50000', 1, '', NULL, '0', '2018-02-02', '15:42:36', ''),
(2, 2, 1, 'test', 'Laptop', '50000', 1, '', NULL, '0', '2018-02-02', '20:11:47', ''),
(3, 2, 1, 'test', 'Laptop', '50000', 1, '', NULL, '0', '2018-02-02', '20:11:52', '');

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
(1, NULL, 1, 'test', 0, 1, NULL, 'Laptop', '', '2018-02-02 15:42:36'),
(2, NULL, 2, 'test', 0, 1, NULL, 'Laptop', '', '2018-02-02 20:11:47'),
(3, NULL, 3, 'test', 0, 1, NULL, 'Laptop', '', '2018-02-02 20:11:52');

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
(1, 'jyoti', 'jyoti', 'Jyoti', 'Nepal', 'New Baneshwor', 9845608537, 'nepaljyoti2011@gmail.com', 'Active'),
(2, 'test', 'test1', 'test', 't', 'test1', 98456085371, 'nepaljyoti1@gmail.com', 'Active');

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
(1, 'jyoti', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(2, 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_sales_order`
--
ALTER TABLE `billing_sales_order`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_stock`
--
ALTER TABLE `billing_stock`
  MODIFY `stock_tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_user`
--
ALTER TABLE `billing_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_user_access`
--
ALTER TABLE `billing_user_access`
  MODIFY `user_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
