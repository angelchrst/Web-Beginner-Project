-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 10:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `name`, `password`) VALUES
('angelchrst', 'Angelia Christy', '$2y$10$TB8cwpIlsPEmY7up0OmulOZ6e3/TQh8H4QW6n6a22IOyHFbTplpV2'),
('reginaclr', 'Regina Clara', '$2y$10$RBAUkQ9kbCZsycZqmzST4OHUfAwttCvDvnkkDwV2iua/1RP1Xv.yG'),
('thalia', 'Thalia Maria', '$2y$10$Aeaf0NXsK4vh8NXGbMBKQ.u8a2/fSl3vqqPYzAsRQhiv5JlTdnAPu');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(3) NOT NULL,
  `username` char(10) NOT NULL,
  `textpost` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `username`, `textpost`, `date`) VALUES
(21, 'angelchrst', '[01.29.21] felt so extremely unmotivated to study for finals but i’m getting through hahah!! finished one today and have three left spread throughout the next week. i secured a job and am so excited for the summertime', '2021-01-29 12:58:16'),
(22, 'angelchrst', 'You are allowed to be alive. You are allowed to be somebody different. You are allowed to not say goodbye to anybody or explain a single thing to anyone, ever. (Augusten Burroughs // This Is How)', '2021-01-29 13:15:24'),
(25, 'reginaclr', '9. In Plato’s Symposium, Diotima tells Socrates how to experience the ideal form of beauty through love. From our desire to possess one body, we sense eternity.\r\n(Rebecca Lindenberg, excerpt of “Love, a Footnote”, from Love, an Index)', '2021-01-29 14:22:14'),
(26, 'reginaclr', 'you want to succeed in your life, remember this phrase. The past does not equal the future. Because you failed yesterday; or all day today, or a moment ago, or for the last six months; the last 16 years, or the last fifty years of life doesn’t mean anything…all that matters is what are you going to do, right now.\r\n-Anthony Robbins ', '2021-01-29 14:21:19'),
(28, 'thalia', 'lemme introduce', '2021-01-29 16:45:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
