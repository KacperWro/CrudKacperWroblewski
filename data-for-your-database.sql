-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 20, 2022 at 06:31 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE DATABASE IF NOT EXISTS `discussions_forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `discussions_forum`;

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL,
  `userName` varchar(100),
  `profPic` varchar(255),
  `dateOfCreation` datetime,
  `bio` varchar(500),
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `forumPosts` (
  `postID` int(5) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(5) NOT NULL,
  `postContent` varchar(500),
  `postTitle` varchar(100),
  `postImage` varchar(255),
  `upVotes` int(5),
  `downVotes` int(5),
  `postDate` datetime,
  `postViews` int(5),
  PRIMARY KEY (`postID`),
  FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `forumReplies` (
  `replyID` int(5) NOT NULL,
  `postID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `replyContent` varchar(500),
  `replyImage` varchar(255),
  PRIMARY KEY (`replyID`),
  FOREIGN KEY (`postID`) REFERENCES `forumPosts`(`postID`),
  FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--



-- --------------------------------------------------------

--
-- Table structure for table `records`
--

/*
CREATE TABLE `records` (
  `recordID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `records`
--

INSERT INTO `records` (`recordID`, `categoryID`, `name`, `price`, `image`) VALUES
(1, 1, 'Some text', '12.00', '644471.jpg'),
(2, 1, 'Some text', '15.00', '233012.jpg'),
(3, 1, 'Some text', '18.00', '329484.jpg'),
(4, 1, 'Some text', '10.00', '644055.jpg'),
(5, 2, 'Some text', '16.00', '373465.jpg'),
(6, 2, 'Some text', '19.00', '373989.jpg'),
(7, 2, 'Some text', '12.00', '374104.jpg'),
(8, 2, 'Some text', '10.00', '4733.jpg'),
(9, 2, 'Some text', '15.00', '834551.jpg'),
(10, 3, 'Some text', '13.00', '908783.jpg'),
(11, 3, 'Some text', '17.00', '835545.jpg'),
(12, 3, 'Some text', '19.00', '119273.jpg');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--

ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;
*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

