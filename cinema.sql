-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 08:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `text`) VALUES
(0, '<p>O nama</p>'),
(3, '<p>Dusan</p>'),
(4, '<p>bfkjsabcnka klcakscmlaksm</p>'),
(5, '<p>fasdfsafsadfasfas</p>');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `director` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `durationTime` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating` double NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT 'web/images/no-image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `name`, `year`, `director`, `genre`, `durationTime`, `description`, `rating`, `youtube_url`, `path`) VALUES
(22, 'Mad Max: Fury Road', 2015, 'George Miller', 'Akcija', 120, 'A woman rebels against a tyrannical ruler in postapocalyptic Australia in search for her home-land with the help of a group of female prisoners, a psychotic worshipper, and a drifter named Max.', 8.1, 'https://www.youtube.com/embed/b_4nzm9ICuo', 'web/images/mad-max.jpg'),
(23, 'Cargo', 2017, 'Ben Howling, Yolanda Ramke', 'Drama', 120, 'After an epidemic spread all over Australia, a father searches for someone willing to protect his daughter.', 6, 'https://www.youtube.com/embed/W5QJW0M5pik', 'web/images/cargo(1).jpg'),
(26, 'Wonder Woman', 2017, 'Patty Jenkins', 'Action', 141, 'When a pilot crashes and tells of conflict in the outside world, Diana, an Amazonian warrior in training, leaves home to fight a war, discovering her full powers and true destiny.', 7, 'https://www.youtube.com/embed/1Q8fG0TtVAY', 'web/images/wonder-woman.jpg'),
(27, 'Justice League', 2017, 'Zack Snyder', 'Action', 120, 'Fueled by his restored faith in humanity and inspired by Superman\'s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.', 7, 'https://www.youtube.com/embed/r9-DM9uBtVI', 'web/images/justicce-league(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projection`
--

CREATE TABLE `projection` (
  `id` int(11) NOT NULL,
  `filmId` int(11) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `hall` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projection`
--

INSERT INTO `projection` (`id`, `filmId`, `date`, `start`, `end`, `hall`, `price`) VALUES
(67, 22, '2019-06-16', '01:00:00', '02:00:00', 3, 300),
(68, 23, '2019-06-15', '01:00:00', '02:00:00', 2, 500),
(69, 26, '2019-06-17', '01:00:00', '02:00:00', 1, 500),
(70, 27, '2019-06-17', '01:00:00', '02:00:00', 3, 200),
(71, 26, '2019-06-18', '01:00:00', '02:00:00', 1, 500),
(72, 22, '2019-06-16', '04:00:00', '05:00:00', 2, 500),
(73, 22, '2019-06-17', '03:00:00', '04:00:00', 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `projectionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `seat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `reservationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `projectionId`, `userId`, `seat`, `reservationDate`) VALUES
(1, 68, 29, '7:5:69', '2019-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobilePhone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'web/images/no-image.png',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `role`, `password`, `gender`, `country`, `mobilePhone`, `path`, `confirmation_code`, `confirmed`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'admin', '96797532893bebd9a1a0fa43337fdc6b', 'male', 'Serbia', '060255444', 'web/images/no-image.png', '0', 1),
(15, 'Marko', 'Cajic', 'markocajic@gmail.com', 'user', '4e2e7e083690ec349fef826f56cacd9d', 'male', 'Srbija', '0600782807', 'web/images/no-image.png', '0', 1),
(16, 'Slaven', 'Djuric', 'slaven.djuric1996@gmail.com', 'user', '4e2e7e083690ec349fef826f56cacd9d', 'male', 'Srbija', '0600782807', 'web/images/no-image.png', '0', 1),
(17, 'Aleksandar', 'Stanojevic', 'aleksandarstanojevic@gmail.com', 'user', '4e2e7e083690ec349fef826f56cacd9d', 'male', 'Srbija', '0600782807', 'web/images/no-image.png', '0', 1),
(29, 'Dusan', 'Cajic', 'dusancajic5@gmail.com', 'user', '2b217718ffa17d23759f514c456d54b8', 'male', 'Srbija', '0600782807', 'web/images/no-image.png', '0', 1),
(30, 'Dusan', 'Cajic', 'dusan@gmail.com', 'user', '4e2e7e083690ec349fef826f56cacd9d', 'male', 'Srbija', 'fsdafas', 'web/images/no-image.png', 'UDb2wQA1gFawqf1Aelrv', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projection`
--
ALTER TABLE `projection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `projection`
--
ALTER TABLE `projection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
