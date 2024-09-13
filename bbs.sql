-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2022 at 04:32 PM
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
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `u_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`u_name`, `pass`) VALUES
('BBS', '$2y$10$QhctrGv5Ww6uL/tJuE/fC.OtjMzbxU3xkUNnxlhLhhQSsvFZun57S');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_details` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `hseat` bigint(20) NOT NULL DEFAULT 1,
  `seat_no` varchar(40) NOT NULL,
  `sfrom` varchar(255) NOT NULL,
  `dto` varchar(255) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `r_id` (`r_id`),
  KEY `bus_details` (`bus_details`),
  KEY `bus_details_2` (`bus_details`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `bus_details`, `f_name`, `date`, `hseat`, `seat_no`, `sfrom`, `dto`, `booking_time`, `r_id`) VALUES
(111, '1', 'Roshan Prasad', '12/02/2021', 1, '2', 'Pune', 'Goa', '2022-05-14 15:15:17', 21),
(113, '5', ' Hrishikesh Parab ', ' 24/02/2021 ', 4, ' 1,2,3,4 ', ' Pune ', ' Goa ', '2022-05-15 14:04:04', 20),
(115, '5', '  Roshan Prasad  ', '  23/09/2021  ', 1, '  5  ', '  Pune  ', '  Delhi  ', '2022-05-15 14:57:13', 21),
(117, '2', 'asadas', '23/09/2021', 8, '1,2,3,4,5,6,7,8', 'goa', 'pune', '2022-05-15 14:40:00', 20),
(118, '3', 'Tanmay Ghule', '23/04/2021', 9, '9,8,7,6,5,4,3,2,1', 'Pune', 'Delhi', '2022-05-15 15:54:04', 20),
(120, '4', 'Sudhanshu ghule', '23/05/2022', 4, '9,8,7,6', 'Pune', 'Goa', '2022-05-24 17:51:05', 20),
(121, '1', 'Rushikesh parab', '05/03/2022', 2, '2,3', 'pune ', 'tirchi', '2022-05-24 17:55:02', 20),
(122, '1', 'prajjwal daware', '23/04/2022', 4, '9,8,6,5', 'Goa', 'pune', '2022-05-24 18:03:29', 21),
(123, '2', ' Faizan shaikh ', ' 26/05/2022 ', 5, ' 1,3,4,2,5 ', ' delhi ', ' pune ', '2022-05-25 09:44:59', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `bbus_details` varchar(255) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  KEY `f` (`bbus_details`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bbus_details`, `seats_available`, `bus_number`) VALUES
('1', 48, 'MH 14 Gu 1890'),
('2', 24, 'MH 12 PU 2157'),
('3', 45, 'MH 18 DC 1834'),
('4', 45, 'MH 07 KA 2151'),
('5', 48, 'MH 14 MD 1835');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `months` varchar(255) DEFAULT NULL,
  `years` bigint(20) DEFAULT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `r_id` (`r_id`,`b_id`),
  KEY `fk2` (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `card_holder_name`, `cvv`, `card_number`, `amount`, `months`, `years`, `payment_time`, `r_id`, `b_id`) VALUES
(66, 'Roshan prasad', '321', '3211 3211 3211 3211', 1500, 'Jan', 2030, '2022-05-14 15:15:33', 21, 111),
(68, 'Hrishikesh Parab', '123', '1233 1233 1222 1223', 6000, 'May', 2031, '2022-05-15 06:03:29', 20, 113),
(70, 'Roshan Prasad', '123', '1234 1234 1234 1234', 600, 'Jan', 2027, '2022-05-15 06:58:12', 21, 115),
(72, 'sudhanshu dubey', '123', '1231231312123123231123', 9600, 'Jan', 2021, '2022-05-15 14:40:15', 20, 117),
(73, 'Tanmay Ghule', '132', '8797 2374 2901 8739', 5400, 'Jan', 2021, '2022-05-15 15:54:25', 20, 118),
(75, 'Sudhanshu Ghule', '123', '0986 0986 6785 2134', 3600, 'Jun', 2031, '2022-05-24 17:51:25', 20, 120),
(76, 'rushikesh parab', '876', '9879 7865 4565 2312', 3000, 'May', 2028, '2022-05-24 17:55:25', 20, 121),
(77, 'prajjwal daware', '234', '1234 4567 5678 4564', 6000, 'Apr', 2032, '2022-05-24 18:03:46', 21, 122),
(78, 'Faizan Shaikh', '123', '1234 1234 1235 1256', 6500, 'Jan', 2032, '2022-05-25 09:36:46', 20, 123);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `f_name` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_address` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`f_name`, `u_name`, `email`, `phone_no`, `gender`, `pass`, `created`, `r_id`, `u_address`) VALUES
('Hrishikesh Dasharath Parab', 'hrishi', 'hrishi@gmail.com', '9889987676', 'Male', '$2y$10$JBQps0WtLBZp65lo8N8p6eiPEf.5MEhtE.ff/Q.bXYawRBsehQgXS', '2022-05-14 14:58:52', 20, 'xyz colony pqr apartments'),
('Roshan Bachaan Prasad', 'roshan', 'roshanprasad@gmail.com', '9008898987', 'Male', '$2y$10$HsSqlMowXAjvTg8i7QsX0uq/8gV7zYo5GRkvFDzYFxj4Q77MR3oCC', '2022-05-14 14:59:38', 21, 'moshi ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`r_id`) REFERENCES `register` (`r_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk` FOREIGN KEY (`r_id`) REFERENCES `register` (`r_id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
