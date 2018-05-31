-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 05:52 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careforcancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `mapicon` varchar(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(300) NOT NULL,
  `tel` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `website` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `logo`, `image`, `mapicon`, `name`, `description`, `tel`, `email`, `website`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 1', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.594730, 9.885090, 'lvl1'),
(2, 'siegel_bronze@2x.png', 'image.jpg', 'pin_bronze.png', 'Dr. Med. Praxis fur Lorem ipsum 2', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.584732, 9.875090, 'lvl2'),
(3, 'siegel_silber@2x.png', 'image.jpg', 'pin_silber.png', 'Dr. Med. Praxis fur Lorem ipsum 3', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.574730, 9.865090, 'lvl3'),
(4, 'siegel_bronze@2x.png', 'image.jpg', 'pin_bronze.png', 'Dr. Med. Praxis fur Lorem ipsum 4', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.564732, 9.855090, 'lvl4'),
(5, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 5', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.494732, 9.885090, 'lvl1'),
(6, 'siegel_silber@2x.png', 'image.jpg', 'pin_silber.png', 'Dr. Med. Praxis fur Lorem ipsum 6', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.384731, 9.875090, 'lvl2'),
(7, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 7', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.274731, 9.865090, 'lvl3'),
(8, 'siegel_silber@2x.png', 'image.jpg', 'pin_silber.png', 'Dr. Med. Praxis fur Lorem ipsum 8', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Neuer wall 43, 20354 Hamburg, Germany', 53.164734, 9.855090, 'lvl4'),
(9, 'siegel_silber@2x.png', 'image.jpg', 'pin_silber.png', 'Dr. Med. Praxis fur Lorem ipsum 9', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Berlin, Germany', 52.522121, 13.400639, 'lvl4'),
(10, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 10', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Berlin, Germany', 52.514374, 13.243169, 'lvl4'),
(11, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 11', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Berlin, Germany', 52.472610, 13.395447, 'lvl4'),
(12, 'siegel_bronze@2x.png', 'image.jpg', 'pin_bronze.png', 'Dr. Med. Praxis fur Lorem ipsum 12', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Munich, Germany', 48.143112, 11.657105, 'lvl4'),
(13, 'siegel_gold@2x.png', 'image.jpg', 'pin_gold.png', 'Dr. Med. Praxis fur Lorem ipsum 11', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+49 123 456789', 'email@email.com', 'www.test.com', 'Munich, Germany', 48.129478, 11.547959, 'lvl4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
