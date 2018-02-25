-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 08:53 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_inventory`
--

CREATE TABLE `ci_inventory` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `products` int(11) DEFAULT '0',
  `price` varchar(50) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `date` date NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_items`
--

CREATE TABLE `ci_items` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productcode` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_items`
--

INSERT INTO `ci_items` (`id`, `productname`, `productcode`, `created_by`, `created_at`, `update_by`, `update_at`) VALUES
(1, 'Pigrolac', 'hrksfiq', 'admin', '2018-02-14 11:48:50', NULL, NULL),
(2, 'Beams', 'kjasfa', 'admin', '2018-02-14 14:37:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_purchase_order`
--

CREATE TABLE `ci_purchase_order` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vendor_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `date_payment` date NOT NULL,
  `date_delivered` date NOT NULL,
  `recieved` datetime DEFAULT NULL,
  `defective` int(11) NOT NULL DEFAULT '0',
  `inactive` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(50) NOT NULL,
  `annual` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_purchase_order`
--

INSERT INTO `ci_purchase_order` (`id`, `product_id`, `quantity`, `amount`, `supplier`, `vendor_address`, `date_payment`, `date_delivered`, `recieved`, `defective`, `inactive`, `created_by`, `created_at`, `update_by`, `update_at`, `date`, `month`, `annual`) VALUES
(2, '2', 2, '50', 'sklfjas', 'sajfa', '2018-02-16', '2018-02-14', '2018-02-14 02:37:44', 0, 1, 'admin', '2018-02-14 02:37:33', NULL, '2018-02-14 03:12:08', '2018-02-14', '2018-02', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `ci_retail`
--

CREATE TABLE `ci_retail` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `unit_description` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(50) NOT NULL,
  `annual` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_retail`
--

INSERT INTO `ci_retail` (`id`, `product_id`, `quantity`, `amount`, `unit_description`, `created_by`, `created_at`, `update_by`, `update_at`, `date`, `month`, `annual`) VALUES
(1, '1', 5, '35', 'kg', 'admin', '2018-02-14 01:49:00', NULL, NULL, '2018-02-14', '2018-02', '2018'),
(2, '2', 2, '15', 'kg', 'admin', '2018-02-14 02:55:20', NULL, NULL, '2018-02-14', '2018-02', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('v1at9uo1ujvfjk69t2sgg3oa0h6qmk6c', '::1', 1519107673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393130373636353b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('c546aik8gf5t0dcqq2dp59rp0hd55brb', '::1', 1519112463, ''),
('tds5u05s53d5bmpiorellnfsatkq7h54', '::1', 1519115005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393131343937383b),
('ch9k4b0fj8kfveiqq0e56g7rntov17pa', '::1', 1519198980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393139383936383b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `ci_transaction`
--

CREATE TABLE `ci_transaction` (
  `id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `products` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(15) NOT NULL,
  `price` varchar(11) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `paycheck` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(50) NOT NULL,
  `annual` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_transaction`
--

INSERT INTO `ci_transaction` (`id`, `c_name`, `products`, `category`, `quantity`, `price`, `subtotal`, `paycheck`, `created_at`, `added_by`, `date`, `month`, `annual`) VALUES
(1, 'fasfa', 'Pigrolac', 'undefined', 5, '35', '175', '200', '2018-02-20 03:51:47', 'cashier', '2018-02-20', '2018-02', '2018'),
(2, 'test', 'Beams', 'undefined', 20, '15', '300', '500', '2018-02-20 03:54:27', 'cashier', '2018-02-20', '2018-02', '2018'),
(3, 'test', 'Pigrolac', 'undefined', 5, '35', '175', NULL, '2018-02-20 03:54:27', 'cashier', '2018-02-20', '2018-02', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` int(2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_code` varchar(255) DEFAULT NULL,
  `reset_date` datetime DEFAULT NULL,
  `activated` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`userid`, `username`, `role`, `email`, `first_name`, `last_name`, `password`, `reset_code`, `reset_date`, `activated`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'test@test.com', 'test01', 'test01', 'e7f3e0fddb84c4b14e9578bfc45a8453100862ad9bff79d819955620a3a828723b135eeaf0b1783fb56e2c80842466741e2e19293f77631928383e7dbd597db4', NULL, NULL, 1, '2017-12-08 08:14:03', NULL),
(2, 'cashier', 4, 'cashier@cashier.com', 'cashier', 'cashier', 'e7f3e0fddb84c4b14e9578bfc45a8453100862ad9bff79d819955620a3a828723b135eeaf0b1783fb56e2c80842466741e2e19293f77631928383e7dbd597db4', 'LW75r9fvX7Liiqo', '2018-01-06 10:46:23', 1, '2017-12-08 08:15:05', NULL),
(3, 'taliffsss', 1, 'taliffssss@taliffsss.com', 'taliff', 'sss', 'e7f3e0fddb84c4b14e9578bfc45a8453100862ad9bff79d819955620a3a828723b135eeaf0b1783fb56e2c80842466741e2e19293f77631928383e7dbd597db4', NULL, NULL, 1, '2018-01-06 12:06:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_role`
--

CREATE TABLE `ci_user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_user_role`
--

INSERT INTO `ci_user_role` (`id`, `role_name`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'manager'),
(4, 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_inventory`
--
ALTER TABLE `ci_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_items`
--
ALTER TABLE `ci_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_purchase_order`
--
ALTER TABLE `ci_purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_retail`
--
ALTER TABLE `ci_retail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ci_user_role`
--
ALTER TABLE `ci_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_inventory`
--
ALTER TABLE `ci_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_items`
--
ALTER TABLE `ci_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_purchase_order`
--
ALTER TABLE `ci_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_retail`
--
ALTER TABLE `ci_retail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_user_role`
--
ALTER TABLE `ci_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
