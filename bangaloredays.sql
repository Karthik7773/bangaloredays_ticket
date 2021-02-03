-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 11:27 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangaloredays`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `cardname` varchar(30) NOT NULL,
  `cardnumber` int(50) NOT NULL,
  `expmonth` varchar(8) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `cardname`, `cardnumber`, `expmonth`, `cvv`) VALUES
(1, 'ganesh', 2147483647, '2021-04', 123),
(2, 'ganesh', 2147483647, '2021-04', 113),
(3, 'ganesh', 2147483647, '2021-08', 123),
(4, 'ganesh', 2147483647, '2021-04', 123),
(5, 'ganesh', 2147483647, '2021-03', 234),
(6, 'ganesh', 2147483647, '2021-08', 123),
(7, 'ganesh', 2147483647, '2021-08', 123),
(8, 'ganesh', 2147483647, '2021-08', 123),
(9, 'ganesh', 2147483647, '2021-04', 123),
(10, 'ganesh', 2147483647, '2021-08', 123),
(11, 'ganesh', 2147483647, '2021-12', 123),
(12, 'ganesh', 2147483647, '2021-07', 123),
(13, 'ganesh', 2147483647, '2021-08', 234),
(14, 'ganesh', 2147483647, '2021-03', 234),
(15, 'ganesh', 2147483647, '2021-08', 345),
(16, 'ganesh', 2147483647, '2021-08', 345),
(17, 'ganesh', 2147483647, '2021-04', 234);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `pid` int(10) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `busnumber` varchar(20) NOT NULL,
  `buscategory` varchar(20) NOT NULL,
  `inplace` varchar(20) NOT NULL,
  `deplace` varchar(50) NOT NULL,
  `departime` varchar(8) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`pid`, `busname`, `busnumber`, `buscategory`, `inplace`, `deplace`, `departime`, `amount`) VALUES
(1, 'Vishal Tourist', 'C20', 'Non AC Sleeper', 'Karkala', 'Nelamangala, Bangalore', '10:10PM', 500),
(2, 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '10:00PM', 500),
(3, 'Vishal Tourist', 'C10', 'Non AC Sleeper', 'Mangalore', 'Electronic City', '9:30PM', 600);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `busname` varchar(20) NOT NULL,
  `busnumber` varchar(20) NOT NULL,
  `buscategory` varchar(20) NOT NULL,
  `inplace` varchar(20) NOT NULL,
  `deplace` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `departime` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`uid`, `username`, `busname`, `busnumber`, `buscategory`, `inplace`, `deplace`, `date`, `departime`, `amount`) VALUES
(1, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-04', '10:00:00', 500),
(2, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-04', '10:00:00', 500),
(3, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-04', '10:00:00', 500),
(4, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-04', '10:00:00', 500),
(5, 'ganesh', '', '', '', '', '', '0000-00-00', '00:00:00', 0),
(6, 'ganesh', '', '0', '', '', '', '0000-00-00', '00:00:00', 0),
(7, 'ganesh', '', '0', '', 'Karkala', 'Yeshwantpur, Bangalore', '2021-03-04', '00:00:00', 0),
(8, 'ganesh', 'Vishal Tourist', '0', 'Non AC Sleeper', 'Karkala', 'Nelamangala, Bangalore', '2021-02-24', '10:10:00', 500),
(9, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-18', '10:00:00', 500),
(10, 'ganesh', 'Vishal Tourist', 'C20', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-24', '10:10:00', 500),
(11, 'ganesh', 'Reshma Tourist', 'C10', 'Non AC Sleeper', 'Karkala', 'Yeshwantpur, Bangalore', '2021-02-04', '10:00:00', 500),
(12, 'ganesh', 'Vishal Tourist', 'C10', 'Non AC Sleeper', 'Mangalore', 'Electronic City', '2021-02-24', '09:30:00', 600),
(13, 'ganesh', 'Vishal Tourist', 'C10', 'Non AC Sleeper', 'Mangalore', 'Electronic City', '2021-02-04', '09:30:00', 600),
(14, 'ganesh', 'Vishal Tourist', 'C20', 'Non AC Sleeper', 'Karkala', 'Nelamangala, Bangalore', '2021-03-04', '10:10:00', 500),
(15, 'ganesh', 'Vishal Tourist', 'C10', 'Non AC Sleeper', 'Mangalore', 'Electronic City', '2021-02-04', '09:30:00', 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `useremail` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `useremail`, `contact`, `password`) VALUES
(2, 'karthik', 'karthik@gmail.com', 1112223334, '$2y$10$CNjFwIo4KkdMR'),
(3, 'karthik', 'karthik1@gmail.com', 1111111111, '$2y$10$YwlEHm39hP5qj'),
(4, 'noor', 'noor@gmail.com', 1234567890, '$2y$10$Wj1Qgxz69mnJ5'),
(5, 'noor', 'j@g.com', 1122334455, '$2y$10$2C8Y.S./N.Ia1'),
(6, 'ganesh', 'ganesh@gmail.com', 1122334455, 'ganesh'),
(7, 'sukka', 'sukka@gmail.com', 1112223334, 'sukka12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
