-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2023 at 05:24 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theboxla_nzhelele`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

CREATE TABLE `contestant` (
  `sn` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `motto` varchar(300) NOT NULL,
  `picture` varchar(300) NOT NULL,
  `votes` varchar(500) NOT NULL,
  `con_num` varchar(255) NOT NULL,
  `new_returning` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`sn`, `fullname`, `lastname`, `email`, `phone`, `age`, `location`, `motto`, `picture`, `votes`, `con_num`, `new_returning`, `reg_date`) VALUES
(7, 'mutshidza kingsley', 'muenda', 'mchizakingsley@gmail.com', '0790703809', 23, 'Nzhelele Limpopo Biaba', 'esires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.who do not know ho', 'uploads/20220715_115520.jpg', '11', '794', '0', '2023-06-21 10:22:54'),
(8, 'Dakalo', 'Raphunga', 'mk@gmail.com', '0662010455', 26, 'south africa', 'mk is lo', 'uploads/IMG-20190515-WA0017.jpg', '3', '699', '0', '2023-06-22 14:21:41'),
(10, 'T', 'GADISI', 'gadisid@gmail.com', '0649731985', 30, 'south africa biaba', 'bvbvbvbvb', 'uploads/kurama.png', '', '394', '0', '2023-06-22 14:25:02'),
(11, 'Arnold', 'Masutha', 'Masutha.thebox@gmail.com', '0791904049', 25, 'Makungwi', 'I love my job bathong!!!!!!!', 'uploads/IMG-20220705-WA0043.jpg', '25', '800', '1', '2023-06-22 14:30:49'),
(12, 'Arnolodo', 'Masuthas', 'sendusgrocerycourierservice@gmail.com', '0791904049', 20, 'Makungwi', 'Hallo world', 'uploads/1687805323527.jpg', '', '172', '0', '2023-06-26 22:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(50) NOT NULL,
  `time_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `id`, `fname`, `lname`, `email`, `password`, `verified`, `token`, `time_registered`) VALUES
(4, 91707, 'arnold', 'masutha', 'mas@gmail.com', '$2y$10$V3IyjAjbAhdEaprF5pHa/uwtjtKx6wkCrog7awAhydemGZZRDjhH2', 1, 'jhnuxE5KD1LPQHM8Yb1iFNvS8g0TBp2173zJ4R2V2yq11Id6G3', '2023-06-20 20:52:23'),
(5, 48363, 'Arnolodo', 'Masutha', 'masutha.thebox@gmail.com', '$2y$10$Sjt/nYfEQkORbJA7YMpkxugj4AjvQB0G/lhyxY.JN27Mo/vmSW8n6', 1, 'h5VP21dW19fR913ybt7mJN1CLqUY6AnBlM1s122Q7i3z112cp1', '2023-06-21 16:56:37'),
(6, 61821, 'Arnold', 'Suthas', 'masuthaa17@gmail.com', '$2y$10$GLrCdAumB8mt3JW3LpLgsuT2bNTwR13cPQtYW6N46a9JIPaAPCpg6', 0, 'Zl60M1i3nyd12K1fq1IVCtvLa91S12u1zm84XJR8G1spBOE1Q7', '2023-06-22 13:54:54'),
(8, 52929, 'Mutshidza Kingsley', 'Muenda', 'Mchizakingsley@gmail.com', '$2y$10$fLadp3gmbMEqeK5rIe0k.ueMhHqx1Oq16UCNSsZ1sBZKpitRni2YS', 1, '45jSF1q41Dns172PJ1NAyQK013HBM5au18TY1EIht3v01koC2X', '2023-06-22 14:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `sn` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `date_dep` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`sn`, `uid`, `amount`, `date_dep`) VALUES
(4, 29728, '65', '2023-06-20 20:42:57'),
(5, 91707, '25', '2023-06-20 20:52:57'),
(11, 48363, '30', '2023-06-25 09:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
