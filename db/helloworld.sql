-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 03:40 PM
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
-- Database: `helloworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_bank`
--

CREATE TABLE `billing_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_bank`
--

INSERT INTO `billing_bank` (`bank_id`, `bank_name`, `account_no`) VALUES
(1, 'Investment Bank', '0121552452'),
(2, 'Nabil Bank', '001452252');

-- --------------------------------------------------------

--
-- Table structure for table `billing_bank_balance`
--

CREATE TABLE `billing_bank_balance` (
  `bb_id` int(11) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `bb_user` varchar(150) NOT NULL,
  `bb_cheque_number` varchar(150) NOT NULL,
  `deposite_date` date NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction` varchar(200) NOT NULL,
  `transaction_by` varchar(250) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `branch_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_category`
--

CREATE TABLE `billing_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_category`
--

INSERT INTO `billing_category` (`category_id`, `category_name`) VALUES
(1, 'Product'),
(2, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `billing_costumer`
--

CREATE TABLE `billing_costumer` (
  `cid` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `mob_no` bigint(15) NOT NULL,
  `loc_id` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `land_con` bigint(15) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `cuser` varchar(25) NOT NULL,
  `cpass` varchar(25) NOT NULL,
  `cques` varchar(50) NOT NULL,
  `csec_ans` varchar(25) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_discount`
--

CREATE TABLE `billing_discount` (
  `discount_id` int(11) NOT NULL,
  `discount_title` varchar(100) NOT NULL,
  `discount_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_employee`
--

CREATE TABLE `billing_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_first_name` varchar(100) NOT NULL,
  `employee_last_name` varchar(100) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_contact` bigint(100) NOT NULL,
  `employee_designation` varchar(100) NOT NULL,
  `employee_joined` date NOT NULL,
  `employee_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'Working'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_employee`
--

INSERT INTO `billing_employee` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_address`, `employee_contact`, `employee_designation`, `employee_joined`, `employee_add_date`, `status`) VALUES
(1, 'Nitesh', 'Kafle', 'Kathmandu', 9845608537, 'Salesman', '2018-02-01', '2018-02-02 08:51:17', 'Working');

-- --------------------------------------------------------

--
-- Table structure for table `billing_expense_category`
--

CREATE TABLE `billing_expense_category` (
  `expense_cat_id` int(11) NOT NULL,
  `expense_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_expense_category`
--

INSERT INTO `billing_expense_category` (`expense_cat_id`, `expense_category`) VALUES
(1, 'Tea'),
(2, 'Water');

-- --------------------------------------------------------

--
-- Table structure for table `billing_location`
--

CREATE TABLE `billing_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_location`
--

INSERT INTO `billing_location` (`location_id`, `location_name`) VALUES
(1, 'Pulchowk'),
(2, 'New Baneshwor'),
(3, 'Old Baneshwor'),
(4, 'Maharajgunj');

-- --------------------------------------------------------

--
-- Table structure for table `billing_member`
--

CREATE TABLE `billing_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(200) NOT NULL,
  `member_phone` bigint(100) NOT NULL,
  `member_card` varchar(2000) NOT NULL,
  `member_discount` bigint(100) NOT NULL DEFAULT '15',
  `member_valid_upto` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_product`
--

CREATE TABLE `billing_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `product_price` bigint(100) NOT NULL,
  `product_editable` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_product`
--

INSERT INTO `billing_product` (`product_id`, `product_name`, `category_name`, `initials`, `product_price`, `product_editable`) VALUES
(1, 'test', 'Product', '', 50000, '');

-- --------------------------------------------------------

--
-- Table structure for table `billing_purchase`
--

CREATE TABLE `billing_purchase` (
  `purchase_id` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_purchase`
--

INSERT INTO `billing_purchase` (`purchase_id`, `vendor_name`, `user_name`, `purchase_date`, `branch_name`) VALUES
(1, 'aaa', 'jyoti', '2018-02-02 14:34:52', 'Koteshwor'),
(2, 'aaa', 'jyoti', '2018-02-02 14:35:17', 'Koteshwor');

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

--
-- Dumping data for table `billing_purchase_transaction`
--

INSERT INTO `billing_purchase_transaction` (`purchase_order_id`, `transaction_type`, `purchase_id`, `product_name`, `item_price`, `item_quantity`, `purchase_paid`, `purchase_tran_date`, `branch_name`) VALUES
(1, 'Purchase', 2, 'test', '50', '5', '', '2018-02-02 14:39:51', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `billing_sales`
--

CREATE TABLE `billing_sales` (
  `sales_id` int(11) NOT NULL,
  `table_number` varchar(100) NOT NULL DEFAULT '0',
  `client_name` varchar(200) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `billing_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `terminate` varchar(200) NOT NULL,
  `terminate_reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_sales_order`
--

CREATE TABLE `billing_sales_order` (
  `sales_order_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` bigint(100) NOT NULL,
  `billing_qty` bigint(100) NOT NULL DEFAULT '1',
  `billing_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_site`
--

CREATE TABLE `billing_site` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(25) NOT NULL,
  `com_phone` bigint(25) NOT NULL,
  `com_email` varchar(50) NOT NULL,
  `com_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_site`
--

INSERT INTO `billing_site` (`com_id`, `com_name`, `com_phone`, `com_email`, `com_address`) VALUES
(1, 'Hello Ware', 0, 'info@helloware.com', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `billing_stock`
--

CREATE TABLE `billing_stock` (
  `stock_tr_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `stock_tr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_stock`
--

INSERT INTO `billing_stock` (`stock_tr_id`, `purchase_id`, `product_name`, `stock_in`, `stock_out`, `user_name`, `stock_tr_date`, `branch_name`) VALUES
(1, 2, 'test', 5, 0, '', '2018-02-02 20:24:52', '');

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
  `user_email` varchar(250) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_user`
--

INSERT INTO `billing_user` (`user_id`, `user_name`, `user_password`, `first_name`, `last_name`, `user_address`, `user_mobile`, `user_email`, `status`) VALUES
(1, 'jyoti', 'jyoti', 'Jyoti', 'Nepal', 'New Baneshwor', 9845608537, 'nepaljyoti2011@gmail.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `billing_user_access`
--

CREATE TABLE `billing_user_access` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `dashboard_menu` varchar(12) NOT NULL,
  `dashboard_koteshwor` varchar(12) NOT NULL,
  `dashboard_maharajgunj` varchar(12) NOT NULL,
  `control_pannel_menu` varchar(12) NOT NULL,
  `control_pannel_product` varchar(12) NOT NULL,
  `control_pannel_vendor` varchar(12) NOT NULL,
  `control_pannel_bank` varchar(12) NOT NULL,
  `control_pannel_category` varchar(12) NOT NULL,
  `control_pannel_user_manage` varchar(12) NOT NULL,
  `control_pannel_location` varchar(12) NOT NULL,
  `control_panel_expense` varchar(12) NOT NULL,
  `control_panel_employee` varchar(12) NOT NULL,
  `branch_control_menu` varchar(12) NOT NULL,
  `branch_control_koteshwor` varchar(12) NOT NULL,
  `branch_control_pulchowk` varchar(12) NOT NULL,
  `branch_control_maharajgunj` varchar(12) NOT NULL,
  `suppliers_menu` varchar(12) NOT NULL,
  `suppliers_create_purchase` varchar(12) NOT NULL,
  `suppliers_create_purchase_return` varchar(12) NOT NULL,
  `suppliers_purchase_transaction` varchar(12) NOT NULL,
  `suppliers_purchase_payment` varchar(12) NOT NULL,
  `suppliers_enter_opening_balance` varchar(12) NOT NULL,
  `bank_menu` varchar(12) NOT NULL,
  `bank_cash_deposit` varchar(12) NOT NULL,
  `bank_cash_withdrawn` varchar(12) NOT NULL,
  `bank_bank_balance` varchar(12) NOT NULL,
  `stock_menu` varchar(12) NOT NULL,
  `stock_check_stock` varchar(12) NOT NULL,
  `stock_check_out_to_branch` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_user_access`
--

INSERT INTO `billing_user_access` (`user_id`, `user_name`, `dashboard_menu`, `dashboard_koteshwor`, `dashboard_maharajgunj`, `control_pannel_menu`, `control_pannel_product`, `control_pannel_vendor`, `control_pannel_bank`, `control_pannel_category`, `control_pannel_user_manage`, `control_pannel_location`, `control_panel_expense`, `control_panel_employee`, `branch_control_menu`, `branch_control_koteshwor`, `branch_control_pulchowk`, `branch_control_maharajgunj`, `suppliers_menu`, `suppliers_create_purchase`, `suppliers_create_purchase_return`, `suppliers_purchase_transaction`, `suppliers_purchase_payment`, `suppliers_enter_opening_balance`, `bank_menu`, `bank_cash_deposit`, `bank_cash_withdrawn`, `bank_bank_balance`, `stock_menu`, `stock_check_stock`, `stock_check_out_to_branch`) VALUES
(1, 'jyoti', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `billing_vendor`
--

CREATE TABLE `billing_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_loc` varchar(150) NOT NULL,
  `vendor_address` varchar(150) NOT NULL,
  `vendor_contact` bigint(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_vendor`
--

INSERT INTO `billing_vendor` (`vendor_id`, `vendor_name`, `vendor_loc`, `vendor_address`, `vendor_contact`) VALUES
(1, 'aaa', 'Pulchowk', 'Bagbazar', 9845000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_bank`
--
ALTER TABLE `billing_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `billing_bank_balance`
--
ALTER TABLE `billing_bank_balance`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `billing_category`
--
ALTER TABLE `billing_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `billing_costumer`
--
ALTER TABLE `billing_costumer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `cuser` (`cuser`);

--
-- Indexes for table `billing_discount`
--
ALTER TABLE `billing_discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `billing_employee`
--
ALTER TABLE `billing_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `billing_expense_category`
--
ALTER TABLE `billing_expense_category`
  ADD PRIMARY KEY (`expense_cat_id`);

--
-- Indexes for table `billing_location`
--
ALTER TABLE `billing_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `billing_member`
--
ALTER TABLE `billing_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `billing_product`
--
ALTER TABLE `billing_product`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `billing_site`
--
ALTER TABLE `billing_site`
  ADD PRIMARY KEY (`com_id`);

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
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `billing_vendor`
--
ALTER TABLE `billing_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_bank`
--
ALTER TABLE `billing_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_bank_balance`
--
ALTER TABLE `billing_bank_balance`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_category`
--
ALTER TABLE `billing_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_costumer`
--
ALTER TABLE `billing_costumer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_discount`
--
ALTER TABLE `billing_discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_employee`
--
ALTER TABLE `billing_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_expense_category`
--
ALTER TABLE `billing_expense_category`
  MODIFY `expense_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_location`
--
ALTER TABLE `billing_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_member`
--
ALTER TABLE `billing_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_product`
--
ALTER TABLE `billing_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_purchase`
--
ALTER TABLE `billing_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_purchase_transaction`
--
ALTER TABLE `billing_purchase_transaction`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_sales`
--
ALTER TABLE `billing_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_sales_order`
--
ALTER TABLE `billing_sales_order`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_site`
--
ALTER TABLE `billing_site`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_stock`
--
ALTER TABLE `billing_stock`
  MODIFY `stock_tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_user`
--
ALTER TABLE `billing_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_user_access`
--
ALTER TABLE `billing_user_access`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_vendor`
--
ALTER TABLE `billing_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `MemberDayDeduct` ON SCHEDULE EVERY 1 DAY STARTS '2018-02-02 05:50:00' ENDS '2023-09-15 11:39:38' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Auto Membership Day Deduct.' DO UPDATE hwc_billing_member SET member_valid_upto=member_valid_upto-1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
