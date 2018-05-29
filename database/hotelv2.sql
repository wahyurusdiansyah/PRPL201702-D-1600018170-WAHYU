-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 05:03 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_payment` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `bed_type` varchar(100) NOT NULL,
  `adult` varchar(100) NOT NULL,
  `children` varchar(100) NOT NULL,
  `preference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_payment`, `nama`, `checkin`, `checkout`, `room_type`, `bed_type`, `adult`, `children`, `preference`) VALUES
('1134192620', 'Intan', '2018-05-01', '2018-05-06', 'Junior Suite Royal', '1 Single Bed', '1', '0', 'No Smooking'),
('1412764790', 'fahmi', '2018-05-10', '2018-05-11', 'Deluxe', '1 Single Bed', '1', '2', 'Smooking'),
('115731098', 'banu', '2018-05-18', '2018-05-31', 'Deluxe Loyal', '1 Single Bed', '1', '3', 'No Smooking');

-- --------------------------------------------------------

--
-- Table structure for table `priceroom`
--

CREATE TABLE `priceroom` (
  `type_room` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` float NOT NULL,
  `diskon` varchar(50) NOT NULL,
  `additionalfee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priceroom`
--

INSERT INTO `priceroom` (`type_room`, `harga`, `stock`, `discount`, `diskon`, `additionalfee`) VALUES
('superior', 100000, 40, 0.02, '2', 25000),
('deluxe', 125000, 40, 0.06, '6', 35000),
('junior suite', 150000, 40, 0.08, '8', 48000),
('executive suite', 175000, 40, 0.1, '10', 51000),
('deluxe loyal', 200000, 40, 0.1, '10', 59000),
('junior suite royal', 225000, 40, 0.15, '15', 64000),
('executive suite royal', 250000, 40, 0.2, '20', 65000),
('diplomatic suite', 275000, 40, 0.05, '5', 73000),
('presidential suite', 300000, 40, 0.13, '13', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `create_time` varchar(100) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `create_date`, `create_time`, `uname`, `name`, `pass`, `email`, `status`) VALUES
(2, '2018-05-14', '23:33:37', 'wahyu', 'wahyu rusdiansyah', 'c3ec0f7b054e729c5a716c8125839829', 'w.r.hasyim@gmail.com', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `uname` varchar(100) NOT NULL,
  `verify_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
