-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 06:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `text` varchar(222) NOT NULL,
  `author` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `meta_k` varchar(200) NOT NULL,
  `meta_d` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`id`, `title`, `date`, `type`, `photo`, `text`, `author`, `description`, `meta_k`, `meta_d`) VALUES
(6, 'title1', '2021-05-01', 'type1', '?', '?', '?', '?', '?', '?'),
(7, 'title2', '2021-05-01', '_', '_', '_', '_', '_', '_', '_'),
(8, 'title3', '2021-05-01', '_', '_', '_', '_', '_', '_', '_'),
(9, 'title4', '2021-05-01', '_', '_', '_', '_', '_', '_', '_'),
(10, 'title5', '2021-05-01', '_', '_', '_', '_', '_', '_', '_');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `meta_k` varchar(200) NOT NULL,
  `meta_d` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `meta_k`, `meta_d`, `text`) VALUES
(11, 'main', 'main page', 'main page desc', '??'),
(12, 'news', 'news keyword', 'news page', '?'),
(13, 'about', 'about keyword', 'about desc', '?'),
(14, 'contact', 'contact_k', 'contact_desc', '?'),
(15, 'page_1', 'k', 'd', '?');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `last_name`, `age`, `reg_date`, `password`, `gender`) VALUES
(4, 'gio', 'giodze', 22, '2021-05-01', '123456', 'male'),
(5, 'dato', 'datodze', 18, '2021-05-01', '123456', 'male'),
(6, 'sofo', 'sofodze', 18, '2021-05-01', '123456', 'female'),
(7, 'mari', 'maridze', 18, '2021-05-01', '123456', 'female'),
(8, 'nino', 'ninodze', 18, '2021-05-01', '123456', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data1`
--
ALTER TABLE `data1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data1`
--
ALTER TABLE `data1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
