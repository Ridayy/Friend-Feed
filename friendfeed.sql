-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 11:44 AM
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
-- Database: `swirlfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `posted_to` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'What?', 'rida_arif1', 'fizza_syed', '2019-11-26 20:02:17', 'no', 8),
(2, 'Need Help in project', 'fizza_syed', 'rida_arif1', '2019-11-28 13:43:46', 'no', 8),
(3, 'Email me the details', 'rida_arif1', 'fizza_syed', '2019-11-28 13:43:49', 'no', 8),
(4, 'Sure', 'fizza_syed', 'rida_arif1', '2019-11-28 13:43:50', 'no', 8),
(5, 'Woww', 'muskan_jawad', 'fizza_syed', '2019-11-28 13:43:52', 'no', 8),
(6, '', 'rida_arif1', 'fizza_syed', '2019-11-28 21:01:10', 'no', 8),
(7, 'ðŸ˜§', 'rida_arif1', 'fizza_syed', '2019-11-28 21:14:29', 'no', 8),
(8, 'ðŸ’—', 'rida_arif1', 'fizza_syed', '2019-11-30 13:02:38', 'no', 8),
(9, 'What?', 'rida_arif1', 'muskan_jawad', '2019-11-30 13:56:57', 'no', 14);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(1, 'This is the first post', 'rida_arif1', 'none', '2019-11-12 14:23:47', 'no', 'no', 0),
(2, 'I Love Rida', 'ammar_hassan', 'none', '2019-11-12 22:32:15', 'no', 'no', 0),
(3, 'Had Fun Today!', 'ammar_hassan', 'none', '2019-11-12 22:33:10', 'no', 'no', 0),
(4, 'Hello Everyone!', 'muskan_jawad', 'none', '2019-11-13 18:38:11', 'no', 'no', 0),
(5, 'I am new on this media!', 'muskan_jawad', 'none', '2019-11-13 18:38:24', 'no', 'no', 0),
(6, 'I am From Karachi', 'muskan_jawad', 'none', '2019-11-13 18:38:36', 'no', 'no', 0),
(7, 'Anyone There?', 'fizza_syed', 'none', '2019-11-13 18:40:16', 'no', 'no', 0),
(8, 'I need some help!', 'fizza_syed', 'none', '2019-11-13 18:40:31', 'no', 'no', 0),
(9, 'Yes??', 'rida_arif1', 'none', '2019-11-13 18:40:49', 'no', 'no', 0),
(10, 'My Tag Is Not Working Dude!', 'rida_arif1', 'none', '2019-11-13 18:41:02', 'no', 'no', 0),
(11, 'Have too much work to do', 'rida_arif1', 'none', '2019-11-13 18:41:27', 'no', 'no', 0),
(12, 'Alhamdullilah for everything! ', 'rida_arif1', 'none', '2019-11-13 18:44:36', 'no', 'no', 0),
(13, 'Hello?\r\n\r\n', 'rida_arif1', 'none', '2019-11-30 11:50:53', 'no', 'no', 0),
(14, 'Testing...', 'muskan_jawad', 'none', '2019-11-30 13:21:57', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sign_up_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `sign_up_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Rida', 'Arif', 'rida_arif', '123', 'Rayyan123', '2019-09-02', 'paths', 1, 1, 'no', ''),
(2, 'Rida', 'Arif', 'rida_arif1', 'ridaarif23@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_2.png', 6, 0, 'no', ',muskan_jawad,fizza_syed,'),
(3, 'Rida', 'Arif', 'rida_arif2', 'ridaarif25@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_10.png', 0, 0, 'no', ','),
(4, 'Rida', 'Arif', 'rida_arif3', 'ridaarif28@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_6.png', 0, 0, 'no', ','),
(5, 'Rida', 'Arif', 'rida_arif4', 'ridaarif29@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_10.png', 0, 0, 'no', ','),
(6, 'Rida', 'Arif', 'rida_arif5', 'ridaarif30@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_1.png', 0, 0, 'no', ','),
(7, 'Fizza', 'Syed', 'fizza_syed', 'fizza@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_8.png', 2, 0, 'no', ',rida_arif1,'),
(8, 'Muskan', 'Jawad', 'muskan_jawad', 'momo@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_10.png', 4, 0, 'no', ',rida_arif1,'),
(9, 'Ammar', 'Hassan', 'ammar_hassan', 'brohiammar@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-04', 'assets/images/profile_pics/defaults/image_8.png', 2, 0, 'no', ','),
(10, 'Maryam', 'Nadeem', 'maryam_nadeem', 'maryam@gmail.com', 'e1bdf3e39b509f41e818c7436fc8798e', '2019-11-25', 'assets/images/profile_pics/defaults/image_3.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
