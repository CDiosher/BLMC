-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2018 at 09:13 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `themark4_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_clist`
--

CREATE TABLE `ci_clist` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(2) DEFAULT NULL,
  `processed_by` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_clist`
--

INSERT INTO `ci_clist` (`id`, `full_name`, `address`, `dob`, `age`, `processed_by`, `date_created`) VALUES
(1, 'diosher', NULL, NULL, NULL, 'cashier', '2018-02-25 00:00:00'),
(2, 'clint', NULL, NULL, NULL, 'cashier', '2018-02-25 16:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `ci_inventory`
--

CREATE TABLE `ci_inventory` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vendor_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(50) NOT NULL,
  `annual` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_inventory`
--

INSERT INTO `ci_inventory` (`id`, `product_id`, `quantity`, `amount`, `supplier`, `vendor_address`, `created_by`, `created_at`, `update_by`, `update_at`, `date`, `month`, `annual`) VALUES
(1, '2', 3, '50', 'sklfjas', 'sajfa', 'admin', '2018-02-23 09:28:59', 'admin', '2018-02-25 14:25:00', '2018-02-23', '2018-02', '2018');

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
(2, 'Beams', 'kjasfa', 'admin', '2018-02-14 14:37:18', NULL, NULL),
(3, 'Tocino', '1cta45', 'admin', '2018-02-23 09:34:07', NULL, NULL),
(4, 'Footlong', '32regf', 'admin', '2018-02-23 09:40:49', NULL, NULL);

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
(2, '2', 2, '50', 'sklfjas', 'sajfa', '2018-02-16', '2018-02-14', '2018-02-14 02:37:44', 0, 0, 'admin', '2018-02-14 02:37:33', NULL, '2018-02-14 03:12:08', '2018-02-14', '2018-02', '2018'),
(3, '3', 10, '10.00', 'URC', 'Bansud', '2018-02-23', '2018-02-24', '2018-02-23 09:36:03', 0, 0, 'admin', '2018-02-23 09:35:31', NULL, '2018-02-23 09:36:46', '2018-02-23', '2018-02', '2018'),
(4, '3', 5, '10', 'URC', 'Bansud', '2018-02-23', '2018-02-24', '2018-02-23 09:40:08', 0, 0, 'admin', '2018-02-23 09:39:56', NULL, NULL, '2018-02-23', '2018-02', '2018'),
(5, '4', 5, '50', 'URC', 'Bansud', '2018-02-23', '2018-02-24', '2018-02-23 09:42:37', 0, 0, 'admin', '2018-02-23 09:41:24', NULL, NULL, '2018-02-23', '2018-02', '2018');

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
(2, '2', 2, '15', 'kg', 'admin', '2018-02-14 02:55:20', 'admin', '2018-02-23 09:25:56', '2018-02-14', '2018-02', '2018'),
(3, '3', 5, '10', 'kg', 'admin', '2018-02-23 09:37:05', NULL, NULL, '2018-02-23', '2018-02', '2018'),
(4, '2', 2, '50', 'kg', 'admin', '2018-02-25 02:29:03', NULL, NULL, '2018-02-25', '2018-02', '2018');

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
('ch9k4b0fj8kfveiqq0e56g7rntov17pa', '::1', 1519198980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393139383936383b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b),
('0b27fda747d1f8db276e57d6b875f61d218400fb', '202.151.35.180', 1519275160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393237353135323b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('d9a956893f31fac823eec6c5e507157286caf6b7', '202.151.35.180', 1519275137, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393237353133373b),
('943e1b4d466716fb6c1d4ebabde19e5595d05068', '122.52.217.71', 1519280325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238303332353b),
('5db4892f5532864b01916db5ee8f5a7b9fa52c03', '122.52.217.71', 1519287283, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238373230313b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('c228d1c9474a1d7525cd3a7b98d9d769d614a7d0', '202.151.35.180', 1519281618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238313631383b),
('d5310a8076aadc18136289454a0ed7621543bd03', '202.151.35.180', 1519283587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238333538373b),
('db83d04efb86579d748e9b9cd2e9805b9eec72ab', '122.52.217.71', 1519285998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238353939383b),
('129407298096cd4e582d4b12bab9b84cf3b78bd4', '202.151.35.180', 1519283604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238333537333b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b),
('02a6e8e47174da3603dfe0f6a3cadb551dccd353', '122.52.217.71', 1519287183, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393238373138333b),
('8a4e8aa6903440dc93069c1873432328a45baaf4', '64.233.172.221', 1519348077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393334383037373b),
('47224077423c40c4427997417762617097f19636', '122.52.217.71', 1519349181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393334393138313b),
('71445250ca86d2f5c82fc33f3da560e1e47765a8', '122.52.217.71', 1519350251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393334393936393b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('4e8055bd5b040c5d19daf211806b39ad40c52bde', '122.52.217.71', 1519349380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393334393039313b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b737563636573737c733a3232323a223c646976203c64697620636c6173733d22616c65727420616c6572742d7375636365737320616c6572742d6469736d69737361626c6520746578742d63656e74657222207374796c653d2277696474683a3530253b223e3c6120687265663d22232220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c6572742220617269612d6c6162656c3d22636c6f7365223e2674696d65733b3c2f613e3c7374726f6e672069643d226e6f74466f756e64223e5472616e73616374696f6e20436f6d706c657465213c2f7374726f6e673e3c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('2bbf22ed99665064aa8777bad40d18f6dfcdcc23', '122.52.217.71', 1519349629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393334393632363b),
('691e33ea36e31e1be2f4a3c008f1de7e552c0364', '64.233.172.193', 1519448777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393434383737373b),
('afe9d520c653b508bec28865f794b3059e8f7cc2', '64.233.172.193', 1519529351, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393532393335313b),
('732de59934a0be18568816f7e20bfb355207102b', '110.54.180.208', 1519529746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393532393734363b),
('97aaa379cc3b2375a7b566e5ceddcd3d6ad39e10', '110.54.180.208', 1519529756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393532393735363b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b),
('30ab36ac6eed7920cecb3974163c2228150edc9b', '110.54.129.59', 1519542373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393534323334393b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('367b8fba94902659ea1dff1fc3de5e56d7b3853e', '110.54.151.201', 1519539395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393533393339353b),
('93e0a3c0a0b59029d668c987ab1a0c466850ab26', '110.54.151.201', 1519543560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393534333535353b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b),
('f8d805028688a1621891586ad223d8df09ab4a19', '110.54.129.59', 1519539758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393533393735383b),
('808e1c746cd5715d143b80e43d749f6e843c4e16', '110.54.129.59', 1519540111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393534303038323b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('30ab36ac6eed7920cecb3974163c2228150edc9b', '110.54.130.111', 1519543488, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393534333237303b66697273747c733a363a22746573743031223b6c6173747c733a363a22746573743031223b757365726e616d657c733a353a2261646d696e223b7573657269647c733a313a2231223b656d61696c7c733a31333a227465737440746573742e636f6d223b726f6c657c733a313a2231223b6c6f676765645f696e7c623a313b),
('98a5f9f2ae36995f42872816b2afbaab10d13b95', '127.0.0.1', 1519546293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393534363233343b66697273747c733a373a2263617368696572223b6c6173747c733a373a2263617368696572223b757365726e616d657c733a373a2263617368696572223b7573657269647c733a313a2232223b656d61696c7c733a31393a226361736869657240636173686965722e636f6d223b726f6c657c733a313a2234223b6c6f676765645f696e7c623a313b);

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
(3, 'test', 'Pigrolac', 'undefined', 5, '35', '175', NULL, '2018-02-20 03:54:27', 'cashier', '2018-02-20', '2018-02', '2018'),
(4, 'maraf', 'Beams', 'retail', 2, '15', '30', '100', '2018-02-22 03:01:44', 'cashier', '2018-02-22', '2018-02', '2018'),
(5, 'maraf', 'Beams', 'retail', 1, '15', '15', '100', '2018-02-22 03:02:27', 'cashier', '2018-02-22', '2018-02', '2018'),
(6, 'deyn', 'Beams', 'retail', 3, '15', '45', '100', '2018-02-22 03:54:33', 'cashier', '2018-02-22', '2018-02', '2018'),
(7, 'deyn', 'Beams', 'retail', 2, '15', '30', '100', '2018-02-22 03:55:12', 'cashier', '2018-02-22', '2018-02', '2018'),
(8, 'deyn', 'Beams', 'retail', 2, '15', '30', '100', '2018-02-22 04:02:53', 'cashier', '2018-02-22', '2018-02', '2018'),
(9, 'deyn', 'Beams', 'retail', 1, '15', '15', '1000', '2018-02-22 04:03:13', 'cashier', '2018-02-22', '2018-02', '2018'),
(10, 'deyn', 'Beams', 'retail', 1, '15', '15', '1000', '2018-02-22 04:03:21', 'cashier', '2018-02-22', '2018-02', '2018'),
(11, 'marc', 'Beams', 'retail', 10, '15', '142.5', '1000', '2018-02-23 09:27:15', 'cashier', '2018-02-23', '2018-02', '2018'),
(12, 'marc', 'Beams', 'wholesale', 3, '50', '150', '1000', '2018-02-23 09:29:39', 'cashier', '2018-02-23', '2018-02', '2018'),
(13, 'diosher', 'Beams', 'retail', 3, '15', '44.1', '100', '2018-02-25 03:52:08', 'cashier', '2018-02-25', '2018-02', '2018'),
(14, 'diosher', 'Beams', 'retail', 3, '15', '44.1', '100', '2018-02-25 03:53:33', 'cashier', '2018-02-25', '2018-02', '2018'),
(15, 'diosher', 'Beams', 'retail', 3, '15', '44.1', '100', '2018-02-25 03:54:03', 'cashier', '2018-02-25', '2018-02', '2018'),
(16, 'diosher', 'Beams', 'retail', 3, '15', '44.1', '100', '2018-02-25 03:55:21', 'cashier', '2018-02-25', '2018-02', '2018'),
(17, 'diosher', 'Beams', 'retail', 3, '15', '44.1', '100', '2018-02-25 03:56:22', 'cashier', '2018-02-25', '2018-02', '2018'),
(18, 'diosher', 'Beams', 'retail', 2, '15', '30', '40', '2018-02-25 03:57:00', 'cashier', '2018-02-25', '2018-02', '2018'),
(19, 'diosher', 'Beams', 'retail', 2, '15', '30', '40', '2018-02-25 03:57:17', 'cashier', '2018-02-25', '2018-02', '2018'),
(20, 'diosher', 'Beams', 'retail', 2, '15', '30', '50', '2018-02-25 03:57:56', 'cashier', '2018-02-25', '2018-02', '2018'),
(21, 'clint', 'Beams', 'wholesale', 4, '50', '194', '200', '2018-02-25 04:09:32', 'cashier', '2018-02-25', '2018-02', '2018');

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
-- Indexes for table `ci_clist`
--
ALTER TABLE `ci_clist`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ci_clist`
--
ALTER TABLE `ci_clist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_inventory`
--
ALTER TABLE `ci_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_items`
--
ALTER TABLE `ci_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_purchase_order`
--
ALTER TABLE `ci_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ci_retail`
--
ALTER TABLE `ci_retail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_transaction`
--
ALTER TABLE `ci_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
