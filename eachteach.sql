-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 06:17 PM
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
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `forum_message_id` int(11) NOT NULL,
  `forum_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'sizwe', 'hello', ''),
(2, 'siya', 'hey bro', '');

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
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`forum_message_id`);

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
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `forum_message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
