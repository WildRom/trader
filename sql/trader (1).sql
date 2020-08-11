-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2020 at 07:21 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `trader_players`
--

CREATE TABLE `trader_players` (
  `player_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `ship_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `port_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `dest_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `arrive` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL DEFAULT '100',
  `experience` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(3) NOT NULL DEFAULT '1',
  `dateCreated` int(11) UNSIGNED NOT NULL,
  `dateModify` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_players`
--

INSERT INTO `trader_players` (`player_id`, `user_id`, `ship_id`, `port_id`, `dest_id`, `start`, `arrive`, `money`, `experience`, `level`, `dateCreated`, `dateModify`) VALUES
(1, 1, 1, 1, 0, 0, 0, 100, 0, 1, 1592743711, '2020-08-06 16:26:15'),
(100, 100, 1, 1, 0, 0, 0, 100, 0, 1, 1596295791, '2020-08-06 16:26:15'),
(101, 103, 1, 1, 0, 0, 0, 100, 0, 1, 1596728797, '2020-08-06 16:46:37');

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
-- Table structure for table `trader_ships`
--

CREATE TABLE `trader_ships` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_name` varchar(20) NOT NULL,
  `cargo` smallint(5) UNSIGNED NOT NULL,
  `speed` tinyint(3) UNSIGNED NOT NULL,
  `defence_lvl` tinyint(3) UNSIGNED NOT NULL,
  `user_lvl` tinyint(3) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_ships`
--

INSERT INTO `trader_ships` (`ship_id`, `ship_name`, `cargo`, `speed`, `defence_lvl`, `user_lvl`, `price`) VALUES
(1, 'Lugger', 100, 6, 2, 1, 1000),
(2, 'Barque', 150, 4, 1, 1, 2000),
(3, 'Schooner', 200, 8, 3, 2, 4000),
(4, 'Fluyt', 300, 10, 3, 3, 6000),
(5, 'Caravel', 32, 14, 4, 4, 15000),
(6, 'Galleon', 400, 15, 5, 5, 30000);

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
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModify` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_users`
--

INSERT INTO `trader_users` (`user_id`, `nick_name`, `password`, `sessionID`, `user_email`, `dateCreated`, `dateModify`) VALUES
(1, 'Valdas', '$2y$10$VVu.A0bMoegCQJ8Y8QIotuYu96s6VktfT1CsNvANHcMkFKDhLsC/q', 134117610, 'wild30973@gmail.com', '2020-06-21 13:48:31', '2020-06-21 13:48:31'),
(100, 'Trader', '$2y$10$cXrNU1sqLyYxZPMFV03hxe63q8xz11TA1LowhePK1b38I9yW2q8Ri', 829148419, 'w@w.n', '2020-08-01 16:29:51', '2020-08-01 16:29:51'),
(103, 'Test', '$2y$10$W2eONjw9NRqrRTP5d8mr4upRDDHFOhZIrORBc4h4BnKU4RolRCegq', 425417187, 'ssd@rsdf', '2020-08-06 16:46:37', '2020-08-06 16:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trader_players`
--
ALTER TABLE `trader_players`
  ADD UNIQUE KEY `player_id` (`player_id`,`user_id`);

--
-- Indexes for table `trader_ports`
--
ALTER TABLE `trader_ports`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `trader_ships`
--
ALTER TABLE `trader_ships`
  ADD PRIMARY KEY (`ship_id`);

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
-- AUTO_INCREMENT for table `trader_players`
--
ALTER TABLE `trader_players`
  MODIFY `player_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `trader_ports`
--
ALTER TABLE `trader_ports`
  MODIFY `port_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trader_ships`
--
ALTER TABLE `trader_ships`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trader_users`
--
ALTER TABLE `trader_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
