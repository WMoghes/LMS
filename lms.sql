-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 02:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `location`, `created_at`, `updated_at`) VALUES
(6, 'Waleed Ali', 'Cairo', '2018-02-12 00:03:40', '2018-02-12 00:03:40'),
(7, 'Sara Wafik', 'New Cairo', '2018-02-13 17:44:23', '2018-02-13 17:44:23'),
(8, 'Sara Hamed Mohamed', 'Cairo', '2018-02-13 17:44:41', '2018-02-13 17:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `edition` varchar(100) DEFAULT NULL,
  `publication` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `description` text,
  `image_name` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `code`, `title`, `edition`, `publication`, `status`, `price`, `quantity`, `description`, `image_name`, `author_id`, `created_at`, `updated_at`, `category_id`) VALUES
(3, '003', 'First Head Design Pattern', '3', '2005', 'Good', '180', '12', 'What’s so special about design patterns?At any given moment, someone struggles with the same software design problems you have. And, chances are, someone else has already solved your problem.', '1518816754.jpg', 8, '2018-02-16 19:32:05', '2018-02-16 19:32:34', 3),
(4, '005', 'XML and JSON Recipes for SQL Server', '3', '2007', 'Avaliable', '350', '15', 'Quickly find solutions to dozens of common problems encountered while using XML and JSON features that are built into SQL Server. Content is presented in the popular problem-solution format. Look up the problem that you want to solve. Read the solution. Apply the solution directly in your own code. Problem solved!', '1518823139.jpg', 7, '2018-02-16 21:18:59', '2018-02-16 21:18:59', 2),
(5, 'sdw2', 'Practical Machine Learning with Python', '1', '2012', 'Avaliable', '632', '3', 'Master the essential skills needed to recognize and solve complex problems with machine learning and deep learning. Using real-world examples that leverage the popular Python machine learning ecosystem, this book is your perfect companion for learning the art and science of machine learning to become a successful practitioner. The concepts, techniques', '1518823215.jpg', 6, '2018-02-16 21:20:15', '2018-02-16 21:20:15', 7),
(6, 'dd3', 'Modern Java Recipes', '4', '2015', 'Good', '34', '4', 'The introduction of functional programming concepts in Java SE 8 was a drastic change for this venerable object-oriented language. Lambda expressions, method references, and streams fundamentally changed the idioms of the language, and many developers have been trying to catch up ever since', '1518823295.jpg', 8, '2018-02-16 21:21:35', '2018-02-16 21:21:35', 8),
(7, 'de2', 'Learning TensorFlow', '1', '2017', 'Avaliable', '50', '3', 'Roughly inspired by the human brain, deep neural networks trained with large amounts of data can solve complex tasks with unprecedented accuracy. This practical book provides an end-to-end guide to TensorFlow, the leading open source software library that helps you build and train neural networks for computer vision', '1518823349.jpg', 7, '2018-02-16 21:22:29', '2018-02-16 21:22:29', 2),
(8, 'df4', 'Guide to Data Structures and Algorithms', '6', '2014', 'Avaliable', '355', '5', 'Use Big O notation, the primary tool for evaluating algorithms, to measure and articulate the efficiency of your code, and modify your algorithm to make it faster. Find out how your choice of arrays, linked lists, and hash tables can dramatically affect the code you write. Use recursion to solve tricky problems and create algorithms that run exponentially faster than the alternatives', '1518823403.jpg', 6, '2018-02-16 21:23:23', '2018-02-16 21:23:42', 2),
(9, 'd44', 'Mastering Modular JavaScript', '2', '2010', 'Avaliable', '15', '5', 'Tackle two aspects of JavaScript development, modularity and ECMAScript 6 (ES6). With this practical guide, frontend and backend Node.js developers alike will learn how to scale out JavaScript applications by breaking codebases', '1518826898.jpg', 6, '2018-02-16 22:21:38', '2018-02-16 22:21:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `books_borrowed`
--

CREATE TABLE `books_borrowed` (
  `id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_borrowed`
--

INSERT INTO `books_borrowed` (`id`, `from`, `to`, `status`, `created_at`, `updated_at`, `user_id`, `book_id`) VALUES
(2, '2018-02-17', '2018-02-25', 'borrowing', '2018-02-16 22:56:48', '2018-02-16 22:56:48', 5, 3),
(3, '2018-02-17', '2018-02-25', 'borrowing', '2018-02-16 23:04:52', '2018-02-16 23:04:52', 5, 5),
(4, '2018-02-17', '2018-02-25', 'borrowing', '2018-02-16 23:10:15', '2018-02-16 23:10:15', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Web Development', '2018-02-13 17:55:59', '2018-02-13 17:55:59'),
(3, 'Servers', '2018-02-13 17:56:05', '2018-02-13 17:56:05'),
(4, 'PHP', '2018-02-13 19:57:55', '2018-02-13 19:57:55'),
(5, 'C#', '2018-02-16 17:45:16', '2018-02-16 17:45:16'),
(6, 'Networking', '2018-02-16 18:47:11', '2018-02-16 18:47:11'),
(7, 'Python', '2018-02-16 21:19:21', '2018-02-16 21:19:21'),
(8, 'Java', '2018-02-16 21:20:29', '2018-02-16 21:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `names`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL),
(3, 'Supervisor ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `delay_cost` int(11) NOT NULL,
  `limit_borrowing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `delay_cost`, `limit_borrowing`) VALUES
(1, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `isBlocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`, `birthdate`, `remember_token`, `created_at`, `updated_at`, `role_id`, `isBlocked`) VALUES
(1, 'Ahmed Elsayed', 'wmoghes@gmail.com', '$2y$10$cU/9TC610NKdcw5KOqM48eYQQDzw2EpjrnKvRH74opXOh0XP1me7u', '321222', '22222', '2004-10-29', 'zDHJXl1hJGHQXNRJ9oCU0tHfxVeYMmMoxbwZkp8RNXXQsokklzQHbH36s1dh', '2018-02-03 20:00:40', '2018-02-16 22:21:41', 1, 1),
(3, 'Ahmed Mohamed Ali', 'ahmed@gmail.com', '$2y$10$.dR3BFDjsIeuVXjJHxXuVuOroWf.upxHdt5/Xet0s1cFx/WePrHCi', '321321312', 'Cairo', '2014-12-31', NULL, '2018-02-13 19:36:35', '2018-02-13 19:57:43', 1, 0),
(4, 'Sara Hamed Mohamed', 'sara@google.com', '$2y$10$tg7Ihyqg3uWWNlshnUbPuex4QP/NO0R3Snnn3MekXqmCuL8tNF7JG', '321546213', 'New Cairo', '2021-02-03', NULL, '2018-02-13 19:37:51', '2018-02-13 19:37:51', 2, 0),
(5, 'student', 'student@gmail.com', '$2y$10$CH1sIUAMxSjVQj.yIQUOr.TZ.7Zn3zP8.V2OBxLUtOKCfRdx1WMQe', '555555555', '', '2015-11-28', 'oEzd6dHwUPqmVBfNr7QbMPBN3KmQaUhTmGzZXMjg4YFphDqDxd9SoW6zSRo9', '2018-02-16 20:22:12', '2018-02-16 23:27:48', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_borrowed`
--
ALTER TABLE `books_borrowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books_borrowed`
--
ALTER TABLE `books_borrowed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
