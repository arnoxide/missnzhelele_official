-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 11:39 AM
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
-- Database: `missnzhelele`
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
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`sn`, `fullname`, `lastname`, `email`, `phone`, `age`, `location`, `motto`, `picture`, `votes`, `con_num`, `new_returning`, `reg_date`) VALUES
(7, 'mutshidza kingsley', 'muenda', 'mchizakingsley@gmail.com', '0790703809', 23, 'Nzhelele Limpopo Biaba', 'esires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.who do not know ho', 'uploads/20220715_115520.jpg', '8', '794', '0', '2023-06-21 10:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `sn` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contact` varchar(300) NOT NULL,
  `status` varchar(500) NOT NULL,
  `path` varchar(300) NOT NULL,
  `qr_code` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `checked_in` int(11) NOT NULL,
  `time_checked` varchar(300) NOT NULL,
  `date_bought` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`sn`, `uid`, `fname`, `lname`, `email`, `contact`, `status`, `path`, `qr_code`, `type`, `checked_in`, `time_checked`, `date_bought`) VALUES
(29, 29728, 'mojo', 'JOJO', 'muenda.testing@gmail.com', '079073809', 'Paid', 'qr/images/mutshidza kingsley32oeu601.png', '32oeu602', 'VIP', 1, '', '2023-10-24 18:00:29'),
(30, 29728, 'arnold', 'masutha', 'mchizakingsley@gmail.com', '434', 'Not Paid', 'qr/images/arnold5HP1vpl1.png', '5HP1vpl1', 'VIP', 0, '', '2023-10-25 09:35:18'),
(31, 29728, 'mutshidza', 'masutha', 'mchizakingsley@gmail.com', '5', 'Paid', 'qr/images/mutshidzaA18wH1oM.png', 'A18wH1oM', 'General', 0, '', '2023-10-25 09:37:45');

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
  `link_expiration_time` varchar(300) NOT NULL,
  `time_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `id`, `fname`, `lname`, `email`, `password`, `verified`, `token`, `link_expiration_time`, `time_registered`) VALUES
(4, 91707, 'arnold', 'masutha', 'mas@gmail.com', '$2y$10$V3IyjAjbAhdEaprF5pHa/uwtjtKx6wkCrog7awAhydemGZZRDjhH2', 1, 'jhnuxE5KD1LPQHM8Yb1iFNvS8g0TBp2173zJ4R2V2yq11Id6G3', '', '2023-06-20 20:52:23'),
(5, 43786, 'mutshidza kingsley', 'muenda', 'mchizakingsley@gmail.com', '$2y$10$1GNUrQ5XG230L5sFWOis3upiQMtsiKW3e7dgTNl24sw3hRBJF/pV.', 1, '3j7po5lh62FAv10N1rZbX802WCnkTwH193E1O14dV1f0Bit2PQ', '1698312005', '2023-10-26 08:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `sn` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `date_dep` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`sn`, `uid`, `amount`, `date_dep`) VALUES
(4, 29728, '32', '2023-06-20 20:42:57'),
(5, 91707, '15', '2023-06-20 20:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
