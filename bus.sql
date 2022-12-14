-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 04:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(225) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bus` varchar(20) NOT NULL,
  `route` varchar(50) NOT NULL,
  `company` varchar(225) NOT NULL,
  `seat` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` int(225) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `driver` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `bus`, `route`, `company`, `seat`, `date`, `amount`, `phone`, `email`, `username`, `driver`) VALUES
(1, 'karim', 'UBD 5678', 'Kampala-Mbarara', 'nile star', '13', '2022-10-23', 50000, '07845785534', 'k@gmail.com', 'karie', ''),
(2, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '23', '2022-10-23', 60000, '07845785534', 'k@gmail.com', 'karie', 'karim'),
(3, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '17', '2022-10-28', 60000, '07845785534', 'k@gmail.com', 'karie', ''),
(4, 'karim', 'UBD 5678', 'kampala-Masaka', '', '62', '0000-00-00', 90000, '', '', '', ''),
(5, 'karim', 'UBD 5678', 'Kampala-Mbarara', '', '28', '0000-00-00', 50000, '', '', '', ''),
(6, 'karim', 'UBD 5678', 'Kampala-Mbarara', '', '48', '0000-00-00', 50000, '', '', '', ''),
(7, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '5', '2022-10-28', 60000, '07845785534', 'k@gmail.com', 'karie', ''),
(8, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '15', '2022-10-28', 60000, '07845785534', 'k@gmail.com', 'karie', ''),
(9, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '16', '2022-10-28', 60000, '07845785534', 'k@gmail.com', 'karie', ''),
(10, 'karim', 'UBJ 0710', 'kampala-Arua', 'link travels', '35', '2022-10-30', 60000, '07845785534', 'k@gmail.com', 'karie', ''),
(11, '', 'UBD 5678', 'kampala-Masaka', 'nile star', '22', '2022-11-01', 90000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `reg` int(225) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `company` varchar(40) NOT NULL,
  `route` varchar(225) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `plate`, `reg`, `driver`, `company`, `route`, `amount`) VALUES
(3, 'toyota', 'UAF 5008', 214748677, 'cathy', 'link-travels', 'kampala-Hoima', 75000),
(4, 'isuzu', 'UBD 5678', 2147483647, 'dan', 'nile star', 'Kampala-Mbarara', 50000),
(10, 'scania', 'UBJ 0710', 2147483647, 'daniel', 'link travels', 'kampala-Arua', 60000),
(25, 'scania', 'UBD 5678', 2147483647, 'darren', 'nile star', 'kampala-Masaka', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(225) NOT NULL,
  `name` varchar(40) NOT NULL,
  `licence` int(225) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `licence`, `owner`, `location`, `address`) VALUES
(2, 'link travels', 2147483647, 'karim sudhir', 'kampala', 'bombo road along town avenue'),
(3, 'nile star', 2147483647, 'kagimu raphael', 'arua', 'arua along transport road');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `username`, `dob`, `gender`, `phone`, `email`, `password`) VALUES
(5, 'karim', 'laban', '2022-09-15', '2', '07845785537', 'laban@gmail.com', '@Queenma7'),
(6, 'cathy', 'cathyrina', '2022-08-28', '3', '07845785534', 'laban@gmail.com', '@Queenma7'),
(7, 'daniel', 'karie', '2022-10-12', '3', '0784578553', 'kwags@gmail.com', '@Karim1002'),
(8, 'darren', 'kajimu', '2022-09-28', '3', '0784578553', 'kajimus@gmail.com', '@Queenma7'),
(9, 'Lugobe Abdulkarim', 'karieem', '2000-04-04', '2', '0784578553', 'diegdunk@gmail.com', '@Almusalamy256');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(225) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `username`, `dob`, `gender`, `phone`, `email`, `role`, `password`) VALUES
(1, 'daniel', 'dan', '2022-08-29', 'Male', '0784578553', 'k@gmail.com', 'Driver', '1234'),
(2, 'karim', 'karie', '2022-09-15', 'male', '0784578553', 'k@gmail.com', 'Route Manager', '@Karim403455'),
(4, 'darren', 'daviddarren', '2022-09-21', 'male', '0760594051', 'darren@gmail.com', 'Driver', 'darrenD@3456');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `company` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `username`, `dob`, `gender`, `phone`, `email`, `role`, `password`, `company`) VALUES
(1, 'karim', 'karie', '2022-09-10', 'Male', '0784578553', 'darren@gmail.com', 'Manager', '@Karim403455', 'link travels');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(39, 'k@gmail.com', 'b8ee766c613adefdd9095115d171322ada3511de8ff178cbf289bbeda02bb6888d912145abda4747de3792c1819231f4283c'),
(40, 'k@gmail.com', 'ac4a8329d618eca855a511d559debd454130450e3572eb4b1288e5841065f805f4a0f8f92b609939387da6bbfbf62651e830'),
(41, 'laban@gmail.com', 'd102755e49ecafa33433f32fa03599229f4ab580afdb5d0dd551182653e902f9f4e7bbe2d94aa5c19d6941df092a504408b5'),
(42, 'k@gmail.com', 'f66d28c9c5978b582cc55723fc664720bf3d48d0706b6cda3f53fcb1a23cd875a635353ebe7f892431581a2a700e5eb542b6'),
(43, 'k@gmail.com', '922ef66025a3014ca25a8a21f7cc2a16ccf5588c44695a0f5744d85368c5364bb90257c74560326a5c466b721bcccce02528'),
(44, 'laban@gmail.com', 'b3828e02b6485a8d2e8126d3716fb8213443ba6f738e79ce90fef6f203ed8f8af517902a37a48cbcb5b40aecfd8c03285a85'),
(45, 'laban@gmail.com', '4e5b0138c271d09ade0e0a417e82a19fa557c61e31113bcc7d270b77c5804071d2310455905db779a71dc2746bdbc97d8c4f'),
(46, 'laban@gmail.com', 'fc6e72325acfd506bdd76fd518e31bbb814a3cfe774fa563c5f077b9f12813ecc6341868a8ba05315eae6cbb6b58e2f45926');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stations` int(30) NOT NULL,
  `route_manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `stations`, `route_manager`) VALUES
(5, 'kampala-Arua', 10, 'karim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
