-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 12:04 AM
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
  `emp_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`emp_id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'sumi', 'sumi');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `name`, `address`, `contact_no`, `email`) VALUES
(1, 'Nasrin', 'Dhaka', '01749307467', 'nasrin@gmail.com'),
(2, 'Sima', 'Dhaka', '01855400633', 'Sima@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `address`, `contact_no`, `email`) VALUES
(1, 'admin', 'Dhaka', '01500123456', 'admin@google.com'),
(2, 'Sumi', 'Gzipur', '01600123456', 'sumi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `sup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ord_id`, `order_date`, `sup_id`) VALUES
(1710001, '2017-11-20', 2),
(1710002, '2017-11-20', 1),
(1710003, '2017-11-20', 1),
(1710004, '2017-11-20', 2),
(1710005, '2017-11-21', 1),
(1710006, '2017-11-21', 1),
(1710007, '2017-11-21', 1),
(1710008, '2017-11-21', 1),
(1710009, '2017-11-21', 1),
(1710010, '2017-11-21', 1),
(1710011, '2017-11-21', 1),
(1710012, '2017-11-21', 1),
(1710013, '2017-11-21', 1),
(1710014, '2017-11-21', 1),
(1710015, '2017-11-21', 1),
(1710016, '2017-11-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE `ordered_product` (
  `ord_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_product`
--

INSERT INTO `ordered_product` (`ord_id`, `pro_id`, `quantity`) VALUES
(1710002, 1011100001, 20),
(1710002, 1011100002, 20),
(1710001, 1011100002, 1),
(1710003, 1011100004, 20),
(1710004, 1011100004, 19),
(1710005, 1011100001, 1),
(1710006, 1011100001, 1),
(1710007, 1011100001, 30),
(1710007, 1011100003, 21),
(1710007, 1011100005, 21),
(1710008, 1011100001, 1),
(1710009, 1011100001, 1),
(1710010, 1011100003, 1),
(1710011, 1011100005, 2),
(1710012, 1011100001, 1),
(1710013, 1011100001, 1),
(1710014, 1011100002, 1),
(1710015, 1011100001, 1),
(1710016, 1011100003, 20),
(1710016, 1011100004, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `warranty_yr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `category`, `brand`, `purchase_price`, `sale_price`, `warranty_yr`) VALUES
(1011100001, 'Smart TV 56 in', 'TV', 'LG', 50000, 75000, 5),
(1011100002, 'Bravia 40 inch', 'TV', 'Sony', 50000, 60000, 10),
(1011100003, 'Split AC 1.5 Ton', 'Air Conditioner', 'Sony', 60000, 85000, 10),
(1011100004, 'LG TV', 'TV', 'LG', 30000, 35000, 5),
(1011100005, 'Sony TV', 'TV', 'Sony', 30000, 35000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pur_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `ord_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pur_id`, `purchase_date`, `ord_id`) VALUES
(172001, '2017-11-23', 1710002),
(172002, '2017-11-23', 1710016);

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

INSERT INTO `purchased_product` (`pur_id`, `pro_id`, `quantity`) VALUES
(172001, 1011100001, 20),
(172001, 1011100002, 20),
(172002, 1011100003, 20),
(172002, 1011100004, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sal_id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sal_id`, `sale_date`, `cus_id`) VALUES
(1730001, '2017-11-07', 2),
(1730002, '2017-11-23', 1),
(1730003, '2017-11-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE `sale_product` (
  `sal_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`sal_id`, `pro_id`, `quantity`) VALUES
(1730001, 1011100001, 2),
(1730001, 1011100002, 2),
(1730002, 1011100001, 3),
(1730002, 1011100002, 2),
(1730003, 1011100003, 6),
(1730003, 1011100004, 7);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`pro_id`, `quantity`) VALUES
(1011100001, 15),
(1011100002, 16),
(1011100003, 14),
(1011100004, 13),
(1011100005, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `name`, `address`, `contact_no`, `email`) VALUES
(1, 'LG LTD', 'Dhaka', '01749307467', 'lg@gmail.com'),
(2, 'Sony LTD', 'Mirpur', '01855400633', 'sony@gmail.com');

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

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tra_id`, `type`, `pur_id`, `sal_id`, `amount`) VALUES
(1740001, 'Purchase', 172001, 0, 2000000),
(1740002, 'sale', 0, 1730001, 270000),
(1740003, 'sale', 0, 1730002, 345000),
(1740004, 'Purchase', 172002, 0, 1800000),
(1740005, 'sale', 0, 1730003, 755000);

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
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`war_id`, `sal_id`, `pro_id`) VALUES
(17500001, 1730001, 1011100001),
(17500002, 1730001, 1011100001),
(17500003, 1730001, 1011100002),
(17500004, 1730001, 1011100002),
(17500005, 1730002, 1011100001),
(17500006, 1730002, 1011100001),
(17500007, 1730002, 1011100001),
(17500008, 1730002, 1011100002),
(17500009, 1730002, 1011100002),
(17500010, 1730003, 1011100003),
(17500011, 1730003, 1011100003),
(17500012, 1730003, 1011100003),
(17500013, 1730003, 1011100003),
(17500014, 1730003, 1011100003),
(17500015, 1730003, 1011100003),
(17500016, 1730003, 1011100004),
(17500017, 1730003, 1011100004),
(17500018, 1730003, 1011100004),
(17500019, 1730003, 1011100004),
(17500020, 1730003, 1011100004),
(17500021, 1730003, 1011100004),
(17500022, 1730003, 1011100004);

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
--
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1710017;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011100006;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172003;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1730004;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1740006;
--
-- AUTO_INCREMENT for table `warranty`
--
ALTER TABLE `warranty`
  MODIFY `war_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17500023;
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
