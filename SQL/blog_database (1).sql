-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 11:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_user`
--

CREATE TABLE `blog_user` (
  `blog_id` int(16) NOT NULL,
  `blog_title` text NOT NULL,
  `date_publish` date DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `blog_story` text DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`blog_id`, `blog_title`, `date_publish`, `date_update`, `blog_story`, `user_name`) VALUES
(1004, 'dikek', '2021-03-01', '2021-03-03', 'kkkksddsds', 'aya.rose'),
(1005, 'mmm', NULL, '2021-03-01', 'dfdfdfd\r\n\r\nfdfdfd\r\nf\r\ndfdf', 'aya.rose'),
(1006, 'mmm', NULL, '2021-03-11', '# Hi am teest Rajjjjikkkzen\r\n\r\n\r\nfdfdkf\r\ndfdkfdkfdkfkdfkdkf\r\nfdfkdfkdkfdkfdfkdkfdkfkdkfkdfkdkf\r\ndfkdfkdkf\r\n\r\n\r\ndfdfkdfkdkfdkfdlfdlfd\r\n\r\n\r\ndfkdfkdkfdkfkd', 'aya.rose'),
(1007, 'nyuuu', NULL, '2021-03-01', '# How to Become a Computer Programmer\r\n\r\nIf you want to learn computer programming, there are several key steps. Your goals may vary, depending on whether you are looking for a career in web design, operating systems, video games, or mobile apps, but planning out your future is important no matter which path you take.\r\n```\r\nThere are five steps to becoming a programmer:\r\n```\r\n\r\n1. Decide which type of training is right for you;\r\n- Choose the best major/degree for your career goals;\r\n **Get an internship in a tech-related field;**\r\n*Consider earning certifications;*\r\n\r\n- Build valuable job experience.', 'aya.rose'),
(1008, 'dkfdkfkd', NULL, '2021-03-01', '# DSDSSDSd\r\n\r\ndffdfdfddsd\r\ndfdfdfd\r\n\r\n\r\nfgfgfgfgf *dfdf* fdfdf **dfdfd**\r\n', 'raikun.dffdfdf'),
(1009, 'kkkk', NULL, NULL, '# Grading-System-Android-App\r\n\r\nThis GradeIt is operated by any Android OS (KitKat and above). It can be\r\noperated in a 256MB Random Access Memory. It can consume 50MB of Storage area.\r\nThis application is easy to use and the concept of User Interface is based from the latest\r\nand updated UI and UX (user experience). This concept is basically based from the IT\r\nIndustry and the app is inspired from the most voted and trusted application in the\r\nGoogle Play Store.', 'cca.edu'),
(1010, 'kkk', NULL, NULL, 'dfdfdfdf sa\'yo ', 'raizen.sangalang'),
(1020, 'kkk', NULL, NULL, 'dfdfd', 'raizen.sangalang'),
(1021, 'kkkk', NULL, '2021-03-23', '# 2121213223dsdsds\r\n> fdfdfdfdf\r\n\r\ndsdsdsdsfsd\r\n\r\ndsdsdsdsd\r\ngfjfjfjdjfd\r\nskdksdkskdkskds\r\n## dfkkfdkfkd\r\n\r\n### dfldfldlfldfdf\r\n\r\n*djfdjfd*\r\n\r\n\r\n[<img src=\"http://www.google.com.au/images/nav_logo7.png\">](http://google.com.au/)\r\n', 'jaden.smith'),
(1022, 'jjj', NULL, '2021-03-01', 'kkkk', 'jaden.smith'),
(1023, 'jkdskdksds', NULL, '2021-03-01', '# 2121213223dsdsds\r\n> fdfdfdfdf\r\n\r\ndsdsdsdsfsd\r\n\r\ndsdsdsdsd\r\ngfjfjfjdjfd\r\nskdksdkskdkskds\r\n## dfkkfdkfkd\r\n\r\n### dfldfldlfldfdf\r\n\r\n*djfdjfd*\r\n\r\n\r\n[<img src=\"http://www.google.com.au/images/nav_logo7.png\">](http://google.com.au/)\r\n', 'jaden.smith'),
(1024, 'kkkkk', NULL, NULL, 'nnnnn', 'jaden.smith'),
(1025, 'kkkkkkkkkk', NULL, NULL, '# 2121213223dsdsds\r\n\r\ndsdsdsdsfsd\r\n\r\ndsdsdsdsd\r\ngfjfjfjdjfd\r\nskdksdkskkkkkdkskds\r\n## dfkkfdkfkd\r\n\r\n### dfldfldlfldfdf\r\n\r\n*djfdjfdkkkk*\r\n\r\n\r\n[<img src=\"http://www.google.com.au/images/nav_logo7.png\">](http://google.com.au/)\r\n', 'jaden.smith'),
(1026, 'kkkkkkkkkkkk', NULL, '2021-03-01', '# How to be cool \r\n\r\nThis is *dffd* kdfkdkf **dfkdfkd** ksksksksks \r\n\r\n1. fdfdfd\r\n2. fdkfdkfd\r\n3. dfd\r\n', 'aya.rose'),
(1027, 'kkkkk', NULL, '2021-03-01', 'nnnnnnnnnnnn', 'kaido.li'),
(1028, 'kkkkkkkkkkk', NULL, '2021-03-01', 'sgwdffwfewfew', 'aya.rose'),
(1029, '', NULL, NULL, '', 'aya.rose'),
(1030, '', NULL, NULL, '', 'aya.rose'),
(1031, '', NULL, NULL, '', 'aya.rose'),
(1032, 'test in jesus name', '2021-03-15', '2021-03-15', '<b><i>SANA GUMANA</i></b><div><b><i><br></i></b></div><div><b><i><br></i></b></div><div><b><i><br></i></b></div><h2><b><i><br></i></b><b><i>SANA GUMANA</i></b></h2>', 'aya.rose');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `user_name` varchar(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`user_name`, `first_name`, `last_name`, `email`, `password`, `full_name`) VALUES
('abc.cde', 'abc', 'cde', 'fdfdfdsd', '$2y$10$YtmchAB03opacUieZu49HuLm.0UpEifVLAWjs0w4HecQa4Lg6mStq', 'abc cde '),
('aya.rose', 'Aya', 'Rose', 'aya6@gmail.com', '$2y$10$4tSHPsHJjQ66XoU3iDwQxOZ13fLRgubYk1j1s0TNZwXnQq/ZtFkru', 'Aya Rose '),
('cca.edu', 'cca', 'edu', 'cccae@gmail.com', '$2y$10$LW.7j87Ibn8hYaTNTAyhIOdi.31WgrBP3vAynlSi5p4yIlS.xTyIW', 'cca edu '),
('jaden.smith', 'Jaden ', 'Smith', 'jademsh@gm.com', '$2y$10$OE75HudnB/wEPUVeGfWwyu5atDLGEMDhqTXcc1R10ODco6icPwMCy', 'Jaden  Smith '),
('kaido.li', 'Kaido', 'Li', 'bagonga@gmail.com', '$2y$10$uZ/tNFYsal4J1eol4sEGhu4CUJWZbbjr0VmFfPXAezmMEL2hOdGYK', 'Kaido Li '),
('lastname.hhhhhhhh', 'lastname', 'hhhhhhhh', 'lllllllll', '$2y$10$pOQ/6ffbKcT19WSfkBvhiOSAaeMNWcA58Icf9SS0rj5UxMxvytEcy', 'lastname hhhhhhhh '),
('raikun.dffdfdf', 'RaiKun', 'dffdfdf', 'sifampanga@gmail.com', '$2y$10$JNqB/FkTaaQ13WW3841Y1efSzYIMdkCt5OeWuL1VvttSgSSZ61U02', 'RaiKun dffdfdf '),
('raizen.sangalang', 'raizen', 'sangalang', 'bbnnn@gmail.com', '$2y$10$b1xhBRYTRrywaMDZtQufmePuZUzfvqWW3D1qDXYAymrUrSHNTJuM2', 'raizen sangalang ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `blog_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_user`
--
ALTER TABLE `blog_user`
  ADD CONSTRAINT `blog_user_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `login_user` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
