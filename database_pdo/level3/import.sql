-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2022 at 07:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netland`
--
CREATE DATABASE IF NOT EXISTS `netland` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `netland`;

-- --------------------------------------------------------

--
-- Table structure for table `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `username`, `password`) VALUES
(1, 'Marc', 'Geheim'),
(2, 'Henk', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `mediatype` enum('serie','film') DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `awards` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `releasedate` date DEFAULT NULL,
  `seasons` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `lang` enum('EN','NL') DEFAULT NULL,
  `trailerid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `mediatype`, `title`, `rating`, `description`, `awards`, `duration`, `releasedate`, `seasons`, `country`, `lang`, `trailerid`) VALUES
(1, 'serie', 'The Good Place', '4', 'De serie gaat over een vrouw, Eleanor Shellstrop, die zich in het hiernamaals bevindt.', 0, 0, '2017-09-21', 4, 'UK', 'EN', ' '),
(2, 'film', 'The Dark Knight', '5', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice', 1, 152, '2008-07-24', 0, 'US', 'EN', 'UwrOQ2pYDxY'),
(3, 'serie', 'Game of Thrones', '5', 'Op het continent Westeros regeert koning Robert Baratheon al meer dan zeventien jaar lang over de Zeven Koninkrijken', 1, 0, '2017-09-21', 7, 'US', 'EN', ' '),
(4, 'film', 'Dune', '4', 'Feature adaptation of Frank Herberts science fiction novel about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.', 2, 155, '2021-09-16', 0, 'US', 'EN', 'n9xhJrPXop4'),
(5, 'serie', 'Ozark', '3', 'Een hoop gedoe en zenuwen', 0, 0, '2022-01-03', 3, 'VS', 'EN', 'dssd'),
(6, 'serie', 'Penoza', '4', 'Hoofdrolspeelster Carmen van Walraven (Monic Hendrickx) ontdekt dat haar man Frans (Thomas Acda) een veel belangrijker rol in de onderwereld speelt dan ze dacht. ', 0, 0, '2010-09-12', 3, 'NL', 'NL', ''),
(7, 'film', 'Pulp Fiction', '5', 'The lives of two mob hitmen, a boxer, a gangster a...', 1, 154, '1994-12-01', 0, 'US', 'EN', 's7EdQ4FqbhY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
