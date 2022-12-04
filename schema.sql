-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 12:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12
DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

GRANT ALL PRIVILEGES ON dolphin_crm.* TO 'project2_user'@'localhost' IDENTIFIED BY 'password123';

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolphin_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `company` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'Michael', 'Scott', 'michael.scott@paper.co', '876-236-9867', 'The Paper Company', 'SALES LEAD', 2, 2, '2022-12-03 07:17:33', '2022-12-03 07:17:33'),
(2, 'Mr.', 'Dwight', 'Shrute', 'dwight.schrute@paper.co', '876-765-8765', 'The Paper Company', 'SUPPORT', 3, 2, '2022-12-03 07:27:02', '2022-12-03 07:27:02'),
(3, 'Ms.', 'Pam', 'Beesley', 'pam.beesley@dunder.co', '876-345-8456', 'Dunder Mifflin', 'SUPPORT', 5, 1, '2022-12-03 07:28:52', '2022-12-03 07:28:52'),
(4, 'Ms.', 'Angela', 'Martin', 'angela.martin@vance.co', '876-987-4567', 'Vance Refrigeration', 'SALES LEAD', 2, 4, '2022-12-03 07:31:31', '2022-12-03 07:31:31'),
(5, 'Ms.', 'Kelly', 'Kapoor', 'kelly.kapoor@vance.co', '876-456-2344', 'Vance Refrigeration', 'SUPPORT', 5, 1, '2022-12-03 07:33:40', '2022-12-03 07:33:40'),
(6, 'Mr.', 'Jim', 'Halpert', 'jim.halpert@dunder.co', '876-234-4567', 'Dunder Mifflin', 'SALES LEAD', 6, 2, '2022-12-03 07:36:25', '2022-12-03 07:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `contact_id`, `comment`, `created_by`, `created_at`) VALUES
(1, 1, 'Mr. Scott is a well-driven individual and is always on time.', 2, '2022-12-04 00:10:42'),
(2, 2, 'Mr. Shrute is a very loyal customer. ', 2, '2022-12-04 00:13:58'),
(3, 3, 'The conversation with Ms. Beesley was very enlightening.', 1, '2022-12-04 00:17:52'),
(4, 4, 'Ms. Martin added a new section to the article she was writing.', 4, '2022-12-04 00:19:40'),
(5, 5, 'The conversation with Ms. Kapoor lasted for approximately 15 minutes.', 1, '2022-12-04 00:21:34'),
(6, 6, 'Mr. Halpert had a few suggestions to make the business better.', 2, '2022-12-04 00:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'Adele', 'Fraser', '482c811da5d5b4bc6d497ffa98491e38', 'admin@project2.com', 'Admin', '2022-12-03 05:36:58'),
(2, 'Jan', 'Levinson', '6ae259fd52a5b9e8acd88a7cf4e23777', 'jan.levinson@paper.co', 'Member', '2022-12-03 06:38:59'),
(3, 'David ', 'Wallace', 'fa04e522cb88ae1064b044a53773390e', 'david.wallace@paper.co', 'Admin', '2022-12-03 06:41:16'),
(4, 'Andy', 'Bernard', '89259b230cad3e3179e98620df10d871', 'andy.bernard@paper.co', 'Member', '2022-12-03 06:42:35'),
(5, 'Darryl', 'Philbin', '6e797afef4e490fcd874549b53aa9b46', 'darryl.philbin@paper.co', 'Member', '2022-12-03 06:44:52'),
(6, 'Erin', 'Hannon', '2bb3c9974645fe54634699c4c1da246c', 'erin.hannon@paper.co', 'Member', '2022-12-03 06:46:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
