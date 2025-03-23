-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 02:52 PM
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
-- Database: `eias`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `age` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` varchar(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `lastname`, `age`, `email`, `contactNo`, `username`, `password`, `role_id`, `timestamp`) VALUES
(1, 'Ronilo', 'Lim', '100', 'eiassystem2021@gmail.com', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2021-06-22 08:11:14'),
(14, 'dummy', 'account', '21', 'dummy.account@mail.com', '09495685456', 'dum', '1d153e08196eec6495edb16ecff25220', 2, '2022-07-14 13:58:18'),
(15, 'Andre Gianne', 'Gamez', '21', 'gianne.gamez.31@gmail.com', '', 'G', 'f6941f0b893117e1e1cc4e598ab43bce', 2, '2022-07-14 16:10:46'),
(16, 'Anton', 'Lagrimes', '22', 'dummy2.acc@fmail.com', '09494949665', 'dummy2', '8a270ae35d743d5188568d0fbc80e4da', 2, '2022-07-21 22:37:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
