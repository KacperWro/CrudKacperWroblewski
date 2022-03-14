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

-- DROP DATABASE IF EXISTS discussions_forum;

-- CREATE DATABASE`discussions_forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `discussions_forum`;

DROP TABLE IF EXISTS `forumReplies`;
DROP TABLE IF EXISTS `forumPosts`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `categories`;

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL,
  `userName` varchar(100),
  `profPic` varchar(255),
  `dateOfCreation` date,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

CREATE TABLE IF NOT EXISTS `forumPosts` (
  `postID` int(5) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `userID` int(5) NOT NULL,
  `postContent` varchar(800),
  `postTitle` varchar(100),
  `postDate` datetime,
  PRIMARY KEY (`postID`),
  FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `forumPosts`
  MODIFY `postID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `forumReplies` (
  `replyID` int(5) NOT NULL,
  `postID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `replyContent` varchar(800),
  `replyDate` datetime,
  PRIMARY KEY (`replyID`),
  FOREIGN KEY (`postID`) REFERENCES `forumPosts`(`postID`),
  FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `forumReplies`
  MODIFY `replyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, "Gaming"),
(2, "Movies and TV Shows");

INSERT INTO `users` (`userID`, `userName`, `profPic`, `dateOfCreation`) VALUES
(1, "dav77-b", "gerflag.png", "2010-01-10" ),
(2, "Olaf Trygvasson", "usa.png", "2020-03-11"),
(3, "Traum77", "can.png", "2013-08-13"),
(4, "Chad497", "egg.png", "2010-10-10"),
(5, "pj74", "moon.png", "2015-10-17"),
(6, "Snoopy826", "dog.jpg", "2011-03-13");


INSERT INTO `forumPosts` (`postID`, `categoryID`, `userID`, `postContent`, `postTitle`, `postDate`) VALUES
(1, 1, 1, "Foreign investment should be done by constructing a building in a different country which works just like any other build", "Victoria 3: Suggestion for foreign investments", "2022-02-27 22:28:00"),
(2, 1, 2, "With 29 planets in my current game my economy is crippled so much I don't know if doing anything could change the outcome, funny enough I'm not even at war right now and all ships are stationed reducing their upkeep:", "Stellaris: My economy is crippled, why?", "2022-03-01 17:00:00"),
(3, 2, 4, "I felt so much better knowing that smug scumbag was dead, and that he died painfully made it all the better.", "Better Call Saul: How happy were you when Chuck died?", "2021-05-07 12:25:00"),
(4, 2, 5, "This seasoned engineer guy who is aware he is building some super secret location for a drug lord can't holdout for probably millions of dollars? It doesn't cross his mind that they will probably kill his wife if he leaves? He was even in contact with his wife by phone on a regular basis. I just thought that his guy's behavior didn't make sense.", "Engineer Werner", "2022-01-25 21:11:00");


INSERT INTO `forumReplies` (`replyID`, `postID`, `userID`, `replyContent`, `replyDate`) VALUES
(1, 1, 2, "I'll admit, I really like this idea. Especially with warfare being super abstract, I want them to make the economic and diplomatic game way more fleshed out than any other PDX game", "2022-02-27 22:45:00"),
(2, 1, 3, "Great idea. I'm interested to see how colonies and client states will work overall - is there a benefit to having them beyond their being a part of your market? It would make sense to have the market leader/home country be able to invest into their colonies and puppets in order to extract more wealth and also (likely) bring more advanced production methods and technology to their client states.", "2022-02-28 00:14:00"),
(3, 2, 1, "You have Robot Assembly Plants everywhere, Gene Clinics everywhere, so you're really focusing a lot on pop booming, which is always going to be a strain on your economy. But then you have 8(!) planets below 30 Stability, and a few not too far above, planets that are badly designated (3x auto-designation to rural, a factory world with 2 Artisans and 6 Technicians, a Lab planet with 6 Researchers and 19 Technicians just to name a few examples), badly specialized planets, lack of basic resource specialization buildings, Piracy on your trade routes, and you're spending 162 Energy on Recycling Campaigns to save around 25 Consumer Goods in upkeep. Then there are a few Clerks here and there, and that -10% empire-wide Happiness modifier doesn't help either.", "2022-03-01 20:28:00"),
(4, 2, 3, "I feel like you have way too many worlds set to the Factory designation, especially since like half of them have just a single industrial district. Just build Civilian Industries buildings (they're cheaper than industrial districts) at choose designation that benefit the maximum number of pops.", "2022-03-01 21:47:00"),
(5, 3, 5, "He manipulated Jimmy and used Jimmy's respect for him to hurt him. Just look at what he did in the Klick episode, he pretended he was going insane to manipulate Jimmy. He stole the Mesa Verde case from Kim just to hurt Jimmy. Heck Jimmy was going to go straight and play by the rules, he idolized Chuck and in return all Chuck did was sabotage him and judge him.", "2021-05-08 02:22:00"),
(6, 3, 6, "Chuck was always 100% right about Jimmy. Look what happened to Jimmy he became a facilitator for the drug dealers and murderers and had to flee with a fake name to Nebraska. If anything Jimmy was worse than Chuck thought.", "2021-05-08 21:58:00"),
(7, 4, 4, "Yup it didn't make any sense. He was the smartest and most professional of the group and only lasted about six months before he starts to cause trouble. I understand it with Jesse most of the time as he wasn't the brightest although maybe I need to rewatch the show as it has been years.", "2022-02-01 15:20:00"),
(8, 4, 6, "Werner's behavior made absolutely no sense & felt like a total contrivance for conflict of drama. As much as I enjoyed Breaking Bad, I hated how often the writers did this sort of thing with Jesse to create conflict & move the plot forward.", "2022-02-03 12:00:00");
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

