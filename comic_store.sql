-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 08:39 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(30) COLLATE utf8_bin NOT NULL,
  `admin_fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `admin_lname` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`, `admin_fname`, `admin_lname`) VALUES
('admin1', '1234', 'rtp', 'snr');

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE `comic` (
  `comic_id` varchar(6) COLLATE utf8_bin NOT NULL,
  `comic_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `author` varchar(40) COLLATE utf8_bin NOT NULL,
  `publisher` varchar(30) COLLATE utf8_bin NOT NULL,
  `comic_price` int(4) NOT NULL,
  `comic_available` varchar(15) COLLATE utf8_bin NOT NULL,
  `comic_pic` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`comic_id`, `comic_name`, `author`, `publisher`, `comic_price`, `comic_available`, `comic_pic`) VALUES
('0001', 'book1', 'rtp', 'luck', 60, 'available', 'book_detail_large.gif');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `customer_password` varchar(30) COLLATE utf8_bin NOT NULL,
  `customer_fname` varchar(20) COLLATE utf8_bin NOT NULL,
  `customer_lname` varchar(20) COLLATE utf8_bin NOT NULL,
  `pocket` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `purchase_number` int(10) NOT NULL,
  `comic_id` varchar(6) COLLATE utf8_bin NOT NULL,
  `customer_id` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`comic_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`purchase_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
