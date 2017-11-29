-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 05:25 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `emp_id` varchar(7) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`emp_id`, `user_name`, `password`) VALUES
('EMP0001', 'admin', 'admin'),
('EMP0002', 'sumi', 'sumi');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(7) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `name`, `address`, `contact_no`, `email`) VALUES
('CUS0001', 'Nasrin', 'Dhaka', '01749307467', 'nasrin@gmail.com'),
('CUS0002', 'Sima', 'Dhaka', '01855400633', 'Sima@gmail.com'),
('CUS0003', 'Minu', 'tongi', '01684123456', 's@gmail.com'),
('CUS0004', 'Nishat', 'IUBAT', '01684123456', 'mail@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(7) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `address`, `contact_no`, `email`) VALUES
('EMP0001', 'admin', 'Dhaka', '01500123456', 'admin@google.com'),
('EMP0002', 'Sumi', 'Gzipur', '01600123456', 'sumi@gmail.com'),
('EMP0003', 'munni', 'C gate', '01749307467', 'munni@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` varchar(10) NOT NULL,
  `order_date` date NOT NULL,
  `sup_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ord_id`, `order_date`, `sup_id`) VALUES
('ORD0000001', '2017-11-29', 'SUP0001'),
('ORD0000002', '2017-11-29', 'SUP0001'),
('ORD0000003', '2017-11-29', 'SUP0001'),
('ORD0000004', '2017-11-29', 'SUP0001');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE `ordered_product` (
  `ord_id` varchar(10) NOT NULL,
  `pro_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_product`
--

INSERT INTO `ordered_product` (`ord_id`, `pro_id`, `quantity`) VALUES
('ORD0000001', 'PRO001001000001', 1),
('ORD0000002', 'PRO001001000001', 10),
('ORD0000002', 'PRO002002000002', 10),
('ORD0000003', 'PRO002002000002', 6),
('ORD0000003', 'PRO001001000001', 3),
('ORD0000004', 'PRO001001000001', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cat_id` varchar(6) NOT NULL,
  `bra_id` varchar(6) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `warranty_yr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `cat_id`, `bra_id`, `purchase_price`, `sale_price`, `warranty_yr`) VALUES
('PRO001001000001', 'LG smart 40 inch', 'CAT001', 'BRA001', 50000, 70000, 5),
('PRO002002000002', 'Eco AC 1 TON', 'CAT002', 'BRA002', 70000, 100000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `bra_id` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`bra_id`, `name`) VALUES
('BRA001', 'LG'),
('BRA002', 'Panasonic');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `name`) VALUES
('CAT001', 'TV'),
('CAT002', 'AirConditioner'),
('CAT003', 'Refrigerator');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `pro_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`pro_id`, `quantity`) VALUES
('PRO001001000001', 0),
('PRO002002000002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` varchar(7) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `company_name`, `address`, `contact_no`, `email`) VALUES
('SUP0001', 'Butterfly LTD', 'Dhaka', '01844400633', 'support@bfly.com'),
('SUP0002', 'Rangs Ltd', 'Dhaka', '01749307467', 'support@rangs.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `bra_id` (`bra_id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`bra_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`);

--
-- Constraints for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD CONSTRAINT `ordered_product_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `order` (`ord_id`),
  ADD CONSTRAINT `ordered_product_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `product_category` (`cat_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`bra_id`) REFERENCES `product_brand` (`bra_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
