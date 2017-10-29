-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 06:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eachteach`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `appointment_location` varchar(255) DEFAULT NULL,
  `appointment_time` datetime DEFAULT NULL,
  `appointment_title` varchar(255) DEFAULT NULL,
  `appointment_status` char(1) DEFAULT NULL,
  `appointment_duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_lastname` varchar(255) DEFAULT NULL,
  `client_firstname` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_password` varchar(255) DEFAULT NULL,
  `client_security_q1` varchar(255) DEFAULT NULL,
  `client_security_q2` varchar(255) DEFAULT NULL,
  `client_security_a1` varchar(255) DEFAULT NULL,
  `client_security_a2` varchar(255) DEFAULT NULL,
  `client_rating` int(11) DEFAULT NULL,
  `client_tokens` int(11) DEFAULT NULL,
  `client_high_school` varchar(255) DEFAULT NULL,
  `client_tertiary_school` varchar(255) DEFAULT NULL,
  `client_institution` varchar(255) DEFAULT NULL,
  `client_location` varchar(255) DEFAULT NULL,
  `client_degree` varchar(255) DEFAULT NULL,
  `client_occupation` varchar(255) DEFAULT NULL,
  `client_cell_no` varchar(255) DEFAULT NULL,
  `profile_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_lastname`, `client_firstname`, `client_email`, `client_password`, `client_security_q1`, `client_security_q2`, `client_security_a1`, `client_security_a2`, `client_rating`, `client_tokens`, `client_high_school`, `client_tertiary_school`, `client_institution`, `client_location`, `client_degree`, `client_occupation`, `client_cell_no`, `profile_img`) VALUES
(1, 'abdc', 'javamc', 'javamc@sinclair.com', '$2y$10$oqWQ4MeSbSRYVDbVqsp16eEa4gvmt8NNJs5QIJXsNy0k2yRoVW25.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'McLauren College', 'McLauren Business School', 'BCom Information Systems', 'Systems Administrator', 'Jamaica', NULL, 'Profile_Blank.png'),
(2, 'James', 'Chimombe', 'jchimombe@gmail.com', '$2y$10$zC5C7PEAlNDOHXodWfiZienmRPhNhaP9K72nfMONG6G9PNdgTu2wO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'University of Witwatersrand', 'University of Witwatersrand', 'BSc Eng in Chemical Engineering', 'Student', 'Braamfontein', NULL, 'Profile_Blank.png'),
(3, 'Malcolm', 'Ngura', 'malcolmn@gmail.com', '0d1e93babce2d5af9ea89031fad96e43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WITS University', 'University ', 'BCom Accounting', '', 'Braamfontein', NULL, 'bond_of_union.jpg'),
(4, 'Jana', 'Nkosi', 'jn@mail.org', 'b33231bc107b3595adf955d940a74915', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'University of Cape Town', 'University', 'MSc Mathematical Sciences', 'Actuarial Scientist', 'Sandton', NULL, 'Profile_Blank.png'),
(5, 'nkomo', 'sizwe', 'sizwe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'Tshego', 'Masala', 'tmasala@hua.ac.za', '3f9a53f995fe8c7e1bc45f2d8fe2c158', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'University of Johannesburg', 'University', 'BEconSci in Economics and Mathematics', 'Financial Manager', 'Kaapstad', NULL, 'IMG-20160202-WA0003.jpg'),
(7, 'Yvonne', 'Mushandi', 'missy@ua.co.za', '2e8164cb1177a22d635ad7f29886fda4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Monash University', 'University', '', 'Student', 'Midrand', NULL, ''),
(8, 'Jamal', 'Ebo', 'jamalebo@gmail.com', '29cb7c0274c9b9141e8f1707e54c9f09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'WITS University', 'University', 'BSc Eng Aeronautical Engineering', 'Student', 'Parktown', NULL, ''),
(9, 'Kim', 'Thompson', 'kt@mail.com', '06e336587b9034e8e5aae7cc19bd9b6a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'High School', '', '', 'Midrand', NULL, ''),
(13, 'Tendaishe', 'Mushaikwa', 'mushorwell@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, 5, NULL, NULL, 'WITS University', 'University', 'BCom Information Systems', 'Student', 'Parktown', NULL, ''),
(14, 'Trevor', 'Manuel', 'tman@nightlive.com', '448d3329673855058968b0df796852a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'University', 'University of Cape Town', 'Pretoria', 'Bachelor of Arts in Linguistics', 'Comedian', NULL, ''),
(16, 'Mushaikwa', 'Tendaishe', 'mushorwell@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 'International School of Cape Town', 'University of Witwatersrand', 'University', 'Parktown', 'BCom in Information Systems', 'Student', NULL, ''),
(17, 'mgavu', 'inga', 'ingamgavu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 'images.jpg'),
(60, 'nkomo', 'siya', 'siya@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `client_appointments`
--

CREATE TABLE `client_appointments` (
  `client_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_topics`
--

CREATE TABLE `client_topics` (
  `client_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `connection_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `connected_with` int(11) NOT NULL,
  `connection_type` varchar(255) DEFAULT NULL,
  `Date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `post_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_date_time` datetime DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `post_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `a_id`, `a_name`, `a_answer`, `a_datetime`) VALUES
(2, 1, 'sizwe', 'reply', '27/10/17 13:56:02'),
(2, 2, 'david', 'second reply', '27/10/17 13:57:28'),
(3, 1, 'sizwe', 'first reply', '27/10/17 14:02:26'),
(3, 2, 'sizwe', 'first reply', '27/10/17 14:03:13'),
(15, 1, 'sizwe', 'first comment', '27/10/17 15:18:06'),
(15, 2, 'sizwe', 'second comment', '27/10/17 15:20:24'),
(4, 1, 'sizwe', 'this thing is so hard', '27/10/17 15:21:48'),
(17, 1, 'sizwe', 'first comment', '27/10/17 15:25:50'),
(4, 2, 'siya', 'you can say that again', '27/10/17 15:56:46'),
(14, 1, 'sizwe', 'first comment', '27/10/17 16:02:26'),
(4, 3, 'dave', 'bruh ?', '27/10/17 16:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `fcategory`
--

CREATE TABLE `fcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcategory`
--

INSERT INTO `fcategory` (`id`, `category`, `name`, `detail`, `email`, `datetime`) VALUES
(1, 'Life', 'sizwe', 'Psychology', 'sizwe@gmail.com', '27/10/17 02:14:51'),
(2, 'bio', 'sizwe', 'animals', 'sizwe@gmail.com', '27/10/17 02:15:46'),
(4, 'fiction', 'sizwe', 'harry potter', 'sizwe@gmail.com', '27/10/17 02:17:36'),
(5, 'science', 'sizwe', 'natural science', 'sizwe@gmail.com', '27/10/17 02:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `fcomment`
--

CREATE TABLE `fcomment` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcomment`
--

INSERT INTO `fcomment` (`id`, `postid`, `comment`, `name`, `datetime`) VALUES
(1, 4, 'first comment', 'sizwe', '27/10/17 03:58:29'),
(2, 4, 'second comment', 'siya', '27/10/17 04:01:19'),
(3, 14, 'first reply', 'sizwe', '27/10/17 04:02:51'),
(4, 15, 'first reply', 'sizwe', '27/10/17 04:11:36'),
(5, 3, 'my reply to your reply', 'sizwe', '27/10/17 04:13:48'),
(6, 15, 'second reply', 'sizwe', '27/10/17 06:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE `fquestions` (
  `id` int(4) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `categoryid`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(2, 1, 'astronomy', 'stars', 'sizwe', 'sizwe@gmail.com', '27/10/17 01:51:21', 38, 2),
(3, 2, 'ux', 'user design', 'sizwe', 'sizwe@gmail.com', '27/10/17 01:54:44', 7, 2),
(4, 4, 'Math', 'Algo', 'sizwe', 'sizwe@gmail.com', '27/10/17 02:13:21', 12, 3),
(5, 0, 'Accounting', 'Auditing', 'Sizwe', 'sizwe@gmail.com', '27/10/17 02:47:29', 0, 0),
(9, 0, 'Accounting', 'Auditing', 'Sizwe', 'sizwe@gmail.com', '27/10/17 02:48:45', 0, 0),
(14, 4, 'trig', 'function', 'sizwe', 'sizwe@gmail.com', '27/10/17 02:58:45', 4, 1),
(15, 5, 'Atoms', 'Particles', 'sizwe', 'sizwe@gmail.com', '27/10/17 03:15:44', 10, 2),
(16, 5, 'Einstein', 'Relativity', 'sizwe', 'sizwe@gmail.com', '27/10/17 03:21:08', 5, 0),
(18, 5, 'Boson', 'Atomic whatever', 'sizwe', 'sizwe@gmail.com', '27/10/17 04:03:42', 4, 0),
(21, 4, 'Harry Potter', 'New Series', 'sizwe', 'sizwe@gmail.com', '27/10/17 04:18:38', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`) VALUES
(1, 'Rembrandt - Old Man in Militray Costume.jpg', ''),
(2, 'Rembrandt - old-man-large-smk.jpg', ''),
(3, 'dragon.jpg', ''),
(4, 'Rembrandt - old-man-large-smk.jpg', ''),
(5, 'Rembrandt - old-man-large-smk.jpg', ''),
(6, 'another_world.jpg', ''),
(7, 'Rembrandt - Old Man in Militray Costume.jpg', ''),
(8, 'Rembrandt - Old Man in Militray Costume.jpg', ''),
(9, 'Rembrandt - old-man-large-smk.jpg', ''),
(10, 'Rembrandt - old-man-large-smk.jpg', ''),
(11, 'Rembrandt - Old Man in Militray Costume.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `msg`, `to`) VALUES
(1, 'sizwe', 'hello', 'siya'),
(2, 'siya', 'hey bro', 'sizwe'),
(3, 'sizwe', 'hello', 'siya'),
(4, 'sizwe', 'hello', 'siya'),
(5, 'sizwe', 'hello', 'siya'),
(6, 'sizwe', 'hello', 'siya'),
(7, 'sizwe', 'hello', 'siya'),
(8, 'sizwe', 'hello', 'siya'),
(9, 'sizwe', 'hello', 'siya'),
(10, 'sizwe', 'hello', 'siya'),
(11, 'sizwe', 'hello', 'siya'),
(12, 'sizwe', 'hello', 'siya'),
(13, 'sizwe', 'hello', 'siya'),
(14, 'sizwe', 'jjj', 'siya'),
(15, 'sizwe', 'ft', 'siya'),
(16, 'sizwe', 'ft', 'siya'),
(17, 'sizwe', 'ft', 'siya'),
(18, 'sizwe', 'ft', 'siya'),
(19, 'sizwe', 'ft', 'siya'),
(20, 'sizwe', 'ft', 'siya'),
(21, 'sizwe', 'ft', 'siya'),
(22, 'sizwe', 'ft', 'siya'),
(23, 'sizwe', 'ft', 'siya'),
(24, 'sizwe', 'ft', 'siya'),
(25, 'sizwe', 'ft', 'siya'),
(26, 'sizwe', 'ft', 'siya'),
(27, 'sizwe', 'ft', 'siya'),
(28, 'sizwe', 'rt', 'siya'),
(29, 'sizwe', 'siya', 'siya'),
(30, 'siya', 'sizwe', 'sizwe');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `php` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `php`, `username`) VALUES
(1, 4, 'sizwe');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `review_poster_id` int(11) DEFAULT NULL,
  `review_poster_name` varchar(100) DEFAULT NULL,
  `Message` varchar(250) DEFAULT NULL,
  `review_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `client_id`, `review_poster_id`, `review_poster_name`, `Message`, `review_date_time`) VALUES
(1, 17, 17, 'inga', 'urt867u', '2017-10-24 20:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_description` varchar(255) DEFAULT NULL,
  `topic_field` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_appointments`
--
ALTER TABLE `client_appointments`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `client_topics`
--
ALTER TABLE `client_topics`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `fanswer`
--
ALTER TABLE `fanswer`
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `fcategory`
--
ALTER TABLE `fcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcomment`
--
ALTER TABLE `fcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fquestions`
--
ALTER TABLE `fquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fcategory`
--
ALTER TABLE `fcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fcomment`
--
ALTER TABLE `fcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fquestions`
--
ALTER TABLE `fquestions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`);

--
-- Constraints for table `client_appointments`
--
ALTER TABLE `client_appointments`
  ADD CONSTRAINT `client_appointments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `client_appointments_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`);

--
-- Constraints for table `client_topics`
--
ALTER TABLE `client_topics`
  ADD CONSTRAINT `client_topics_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `client_topics_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`);

--
-- Constraints for table `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `forums` (`forum_message_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
