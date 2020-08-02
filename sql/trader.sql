-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2020 at 09:17 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trader`
--

-- --------------------------------------------------------

--
-- Table structure for table `trader_ports`
--

CREATE TABLE `trader_ports` (
  `port_id` tinyint(3) UNSIGNED NOT NULL,
  `port_name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_ports`
--

INSERT INTO `trader_ports` (`port_id`, `port_name`, `country`) VALUES
(1, 'London', 'UK'),
(2, 'Le Havre', 'France'),
(3, 'Amsterdam', 'Netherlands'),
(4, 'Lisbon', 'Portugal'),
(5, 'Malaga', 'Spain'),
(6, 'Barcelona', 'Spain'),
(7, 'Venice', 'Italy'),
(8, 'Bissau', 'Guinea-Bissau'),
(9, 'Mumbai', 'India'),
(10, 'Kolkata', 'India'),
(11, 'Shanghai', 'China'),
(12, 'Yokohama', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `trader_users`
--

CREATE TABLE `trader_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `nick_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `character_birth_day` int(11) NOT NULL,
  `port` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `destination` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `start_travel` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `end_travel` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `character_money` float NOT NULL DEFAULT '100',
  `experience` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModify` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_users`
--

INSERT INTO `trader_users` (`user_id`, `nick_name`, `password`, `sessionID`, `user_email`, `character_birth_day`, `port`, `destination`, `start_travel`, `end_travel`, `character_money`, `experience`, `level`, `dateCreated`, `dateModify`) VALUES
(1, 'Valdas', '$2y$10$VVu.A0bMoegCQJ8Y8QIotuYu96s6VktfT1CsNvANHcMkFKDhLsC/q', 134117610, 'wild30973@gmail.com', 1592743711, 1, 0, 0, 0, 100, 0, 1, '2020-06-21 13:48:31', '2020-06-21 13:48:31'),
(100, 'Trader', '$2y$10$cXrNU1sqLyYxZPMFV03hxe63q8xz11TA1LowhePK1b38I9yW2q8Ri', 829148419, 'w@w.n', 1596295791, 1, 0, 0, 0, 100, 0, 1, '2020-08-01 16:29:51', '2020-08-01 16:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trader_ports`
--
ALTER TABLE `trader_ports`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `trader_users`
--
ALTER TABLE `trader_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nick_name` (`nick_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trader_ports`
--
ALTER TABLE `trader_ports`
  MODIFY `port_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trader_users`
--
ALTER TABLE `trader_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
