-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 09:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `profile_image` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `bio`, `profile_image`, `password`, `created`) VALUES
(1, 'admin', 'admin@gmail.com', 'Feeling Like a God In this Universe ( Anti-Social )', 'uploads/dv.png', 'admin', '2024-02-20 09:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(3) NOT NULL,
  `post_id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `comment`, `Created`) VALUES
(9, 5, 'jay_thuturkar', 'hulk', '2024-02-17 09:38:39'),
(10, 1, 'Rose', 'hey', '2024-02-18 06:49:25'),
(15, 3, 'lucifer', 'Fury of a god ', '2024-02-19 04:02:46'),
(16, 3, 'Yash', 'Black Adam', '2024-02-19 04:07:09'),
(24, 4, 'lucifer', 'gotham Knights', '2024-02-19 05:06:01'),
(25, 1, 'lucifer', 'home comming', '2024-02-19 05:12:59'),
(29, 6, 'lucifer', 'hulk', '2024-02-19 07:32:23'),
(31, 3, 'lucifer', 'Greek God Mythology', '2024-02-19 07:36:52'),
(35, 12, 'jay_thuturkar', 'Future Pirate King ', '2024-02-20 14:09:28'),
(36, 9, 'hardik', 'Home - comming', '2024-02-21 05:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(4) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `likes` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `description`, `image`, `likes`, `username`, `session_id`, `created_at`) VALUES
(2, 'Batman', 'DC', '“It’s not who I am underneath, but what I do that defines me.” – Batman', 'uploads/b.png', 23, 'jay_thuturkar', 's2ce62qe4rt8p0s7oc0c4ng9j1', '2024-02-10 10:14:33'),
(3, 'Shazam', 'DC', '“I think you just have to appreciate who you are and hopefully they can see what a superhero is about.” – Shazam', 'uploads/shz.jpg', 41, 'lucifer', 's2ce62qe4rt8p0s7oc0c4ng9j1', '2024-02-10 10:19:42'),
(4, 'Night_wing ', 'DC', '“Intelligence is a privilege, and it needs to be used for the greater good of people.”– Night Wing', 'uploads/nw.jpg', 60, 'hardik', 's2ce62qe4rt8p0s7oc0c4ng9j1', '2024-02-10 10:20:19'),
(5, 'Hulk', 'Marvel', '“This. This is what I am. This is who I am come hell or high water. If I deny it, I deny everything I’ve ever done. Everything I’ve ever fought for.” -Hulk', 'uploads/h.jpg', 10, 'admin', 's2ce62qe4rt8p0s7oc0c4ng9j1', '2024-02-10 11:56:40'),
(6, 'Rock lee', 'Anime', ' “THE UNIVERSE IS SO BIG, IT HAS NO CENTER. WE ARE THE CENTER.” — Rock lee', 'uploads/rl.jpg', 10, 'yash', 's2ce62qe4rt8p0s7oc0c4ng9j1', '2024-02-10 16:49:03'),
(9, 'Spider-Man', 'Marvel', '“No man can win every battle, but no man should fall without a struggle.”', 'uploads/sp.jpg', 0, 'jay_thuturkar', '6qhf64oba4tofr80qhc7k15ink', '2024-02-19 12:18:39'),
(10, 'Detective', 'DC', 'Dont be what they made You', 'uploads/dv.png', 0, 'joker', '6qhf64oba4tofr80qhc7k15ink', '2024-02-19 17:25:37'),
(12, 'Luffy', 'Anime', '\" I Like Heros But I Don\'t Want to be One \"\r\n', 'uploads/luffy.jpg', 0, 'jay_thuturkar', 'cvabbl5op1g21jdpe90r6pjt77', '2024-02-20 14:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL DEFAULT 'Default_user',
  `email` varchar(30) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `bio`, `category`, `password`, `profile_image`, `Created`) VALUES
(1, 'jay_thuturkar', 'skidde7@gmail.com', 'Broken Hero', 'Anime', 'luci', 'Images/user3.jpg', '2024-02-09 17:30:07'),
(2, 'lucifer', 'devil@gmail.com', 'Head Of Curse', 'Marvel', 'luci', 'Images/user1.jpg', '2024-02-09 17:31:38'),
(4, 'yash', 'yash@gmail.com', 'Suffer with smile', 'DC', '1122', 'Images/user1.jpg', '2024-02-12 14:32:41'),
(5, 'hardik', 'harditk@gmail.com', 'Coding holick', 'KPOP', '1122', 'Images/user1.jpg', '2024-02-19 10:24:45'),
(7, 'sanji', 'Sanji@gmail.com', 'Cook', 'DC', 'nami', 'Images/luffy.jpg', '2024-02-20 14:28:31'),
(8, 'spidy', 'spider@gmail.com', 'Broken Hero', 'Anime', 'web', 'Images/images.jpg', '2024-02-21 05:17:09'),
(10, 'abdul', 'abdul@gmail.com', 'student', 'KPOP', '1122', 'Images/images.jpg', '2024-02-21 11:21:15'),
(11, 'Andrea', 'xyz@gmail.com', 'Student', 'DC, Anime ', '1122', 'Images/luffy.jpg', '2024-02-21 17:38:24'),
(12, 'neeraj', 'neeraj@gmail.com', 'student', 'Marvel , Anime ', 'neeraj', 'Images/luffy.jpg', '2024-02-21 18:42:11'),
(13, 'hardik1', 'hardik1@gmail.com', 'Student', 'Marvel , Anime ', '1122', 'Images/b.png', '2024-02-21 20:22:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
