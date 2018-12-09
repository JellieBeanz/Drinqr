-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 11:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drinqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `idGallery` int(11) NOT NULL,
  `titleGallery` longtext NOT NULL,
  `barTitleGallery` longtext NOT NULL,
  `drinkCost` varchar(11) NOT NULL,
  `imgFullNameGallery` longtext NOT NULL,
  `orderGallery` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idGallery`, `titleGallery`, `barTitleGallery`, `drinkCost`, `imgFullNameGallery`, `orderGallery`) VALUES
(23, 'Tasty Guinness', 'Johns Bar', 'â‚¬4.50', 'nicewan.5bf0381b902b52.08288535.jpg', '1'),
(24, 'gewwaan', 'Murphy\'s', 'â‚¬5.20', 'blackstuff.5bf0384ac4bc47.74865615.jpg', '2'),
(25, 'Pint O\' Plain', 'Madigan\'s', 'â‚¬5.90', 'guinnesss.5bf038bd4cf699.85031539.jpg', '3'),
(26, 'test3', 'asd', '$600', 'asd.5c03f949b6d8d5.75391444.jpg', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'Testuser1', 'Testemail@test.ie', '$2y$10$b/UwpuEy7IhJo9BCsYQpPugSrTiMzuborD6lSPytIxEDmtmVnX8em'),
(2, 'testuser2', 'test@hotmail.com', '$2y$10$1S4FSdylQ.XhXxiSOYW.g.BrbPMLHH.RT4v4bNOjbvTygLg8XSHnC'),
(3, 'KevUser', 'kevintest@gmail.com', '$2y$10$P5.Z/g7ntWeufuEF7gJONuNk2NhEe6Zoiu15L/ju14f9Nc4SspBoO'),
(4, 'testDrinqr', 'testdrinqr@gmail.com', '$2y$10$6RcT/dny6apfafT90e23KeeZmTeQGA8J03FlU9UkN31B4YOjsg/Ba'),
(5, 'testDrinqr2', 'testdrinqr@gmail.com', '$2y$10$L1ZGOnXHGXRzOgpCkoDii.wrsv2t8IKRjpie0DmRo6UIEj3k6P.8u'),
(6, 'testertest', 'testetest@gmail.com', '$2y$10$au4YSlw2FHo.pNq6Mp7SwOeB33X4yvoBfu7JShGzcq5.7Nkz21wO2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idGallery`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
