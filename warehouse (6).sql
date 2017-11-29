-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 10:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+06:00";


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
  `password` varchar(20) NOT NULL,
  FOREIGN KEY (emp_id) REFERENCES employee
)
-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(7) NOT NULL PRIMARY KEY,
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
('CUS0002', 'Sima', 'Dhaka', '01855400633', 'Sima@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(7) NOT NULL PRIMARY KEY,
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
('EMP0002', 'Sumi', 'Gzipur', '01600123456', 'sumi@gmail.com');

-- --------------------------------------------------------

CREATE TABLE `supplier` (
  `sup_id` varchar(7) NOT NULL PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` varchar(10) NOT NULL PRIMARY KEY,
  `order_date` date NOT NULL,
  `sup_id` varchar(7) NOT NULL,
  FOREIGN Key (sup_id) REFERENCES supplier(sup_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `ordered_product`
--
CREATE TABLE `ordered_product` (
  `ord_id` varchar(10) NOT NULL,
  `pro_id` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  FOREIGN Key (ord_id) REFERENCES `order`(ord_id),
  FOREIGN KEY (pro_id) REFERENCES product(pro_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(7) NOT NULL PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `cat_id` varchar(6) NOT NULL,
  `bra_id` varchar(6) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `warranty_yr` int(11) NOT NULL,
  FOREIGN KEY (cat_id) REFERENCES product_categoty(cat_id),
  FOREIGN KEY (bra_id) REFERENCES product_bra(bra_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

--
-- Dumping data for table `product`

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pur_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `ord_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_product`
--

CREATE TABLE `purchased_product` (
  `pur_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sal_id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE `sale_product` (
  `sal_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `pro_id` varchar(15) NOT NULL PRIMARY KEY,
  `quantity` int(11) NOT NULL,
  FOREIGN KEY (pro_id) REFERENCES product(pro_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tra_id` int(11) NOT NULL,
  `type` varchar(8) NOT NULL,
  `pur_id` int(11) NOT NULL,
  `sal_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `warranty`
--

CREATE TABLE `warranty` (
  `war_id` int(11) NOT NULL,
  `sal_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`emp_id`);

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
--c
ALTER TABLE `ordered_product`
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pur_id`),
  ADD KEY `ord_id` (`ord_id`);

--
-- Indexes for table `purchased_product`
--
ALTER TABLE `purchased_product`
  ADD KEY `pur_id` (`pur_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sal_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD KEY `sal_id` (`sal_id`),
  ADD KEY `pro_id` (`pro_id`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tra_id`);

--
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`war_id`),
  ADD KEY `sal_id` (`sal_id`),
  ADD KEY `pro_id` (`pro_id`);


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
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `order` (`ord_id`);

--
-- Constraints for table `purchased_product`
--
ALTER TABLE `purchased_product`
  ADD CONSTRAINT `purchased_product_ibfk_1` FOREIGN KEY (`pur_id`) REFERENCES `purchase` (`pur_id`),
  ADD CONSTRAINT `purchased_product_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`);

--
-- Constraints for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD CONSTRAINT `sale_product_ibfk_1` FOREIGN KEY (`sal_id`) REFERENCES `sale` (`sal_id`),
  ADD CONSTRAINT `sale_product_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `warranty`
--
ALTER TABLE `warranty`
  ADD CONSTRAINT `warranty_ibfk_1` FOREIGN KEY (`sal_id`) REFERENCES `sale` (`sal_id`),
  ADD CONSTRAINT `warranty_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
