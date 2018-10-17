-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2018 at 07:58 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GestionDeStage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `phone`) VALUES
(1, 1, 'Pavel Zaharciuc', '450-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `buildings_types`
--

CREATE TABLE IF NOT EXISTS `buildings_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings_types`
--

INSERT INTO `buildings_types` (`id`, `name`) VALUES
(1, 'Autre (précisez dans Remarques)'),
(2, 'Centre hospitalier'),
(3, 'Centre réadaptation'),
(4, 'CHSLD'),
(5, 'Clinique privée'),
(6, 'CLSC');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE IF NOT EXISTS `internships` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrative_region` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `buildingType_id` int(11) NOT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `supervisor_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `title`, `address`, `city`, `province`, `postal_code`, `administrative_region`, `description`, `buildingType_id`, `actif`, `supervisor_id`, `created`, `modified`) VALUES
(1, 'Testy', 'Test Address 1111', 'Test', 'Test', 'Test', 'Québec', 'Vous allez travailler sur tel et tel chose', 6, 1, 3, '2018-10-02', '2018-10-03'),
(2, 'Bell', '1111 Bell', 'Montréal', 'Québec', 'H3A3A3', 'Québec', 'Bell', 5, 1, 5, '2018-10-02', '2018-10-02'),
(3, 'Videotron', '123 Rue de Videotron', 'Montréal', 'Québec', 'H1A1A1', 'Québec', 'Un stage de programmation PhP', 1, 1, 3, '2018-10-03', '2018-10-03'),
(4, 'Tester des truc', '6360 Rue des testeurs', 'TestCity', 'floride', 'cakeall', 'BakeAll', 'Tester des programmes qui font des affaire sur des trucs', 5, 1, 6, '2018-10-03', '2018-10-03'),
(5, '123', '123 Rue de Videotron', 'Montréal', 'Québec', 'h7g1s4', 'Québec', 'Un stage de programmation PhP', 3, 1, 7, '2018-10-03', '2018-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `internships_missions`
--

CREATE TABLE IF NOT EXISTS `internships_missions` (
  `internship_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships_missions`
--

INSERT INTO `internships_missions` (`internship_id`, `mission_id`) VALUES
(1, 1),
(3, 1),
(5, 1),
(3, 2),
(5, 2),
(3, 3),
(5, 3),
(3, 4),
(2, 5),
(2, 6),
(2, 7),
(5, 7),
(2, 8),
(4, 14),
(1, 23),
(5, 27),
(5, 29),
(4, 31),
(5, 31);

-- --------------------------------------------------------

--
-- Table structure for table `internships_students`
--

CREATE TABLE IF NOT EXISTS `internships_students` (
  `id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships_students`
--

INSERT INTO `internships_students` (`id`, `internship_id`, `student_id`) VALUES
(1, 2, 5),
(3, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `internships_types`
--

CREATE TABLE IF NOT EXISTS `internships_types` (
  `internship_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships_types`
--

INSERT INTO `internships_types` (`internship_id`, `type_id`) VALUES
(1, 17),
(3, 17),
(3, 18),
(4, 18),
(5, 18),
(3, 19),
(4, 19),
(5, 19),
(3, 20),
(4, 20),
(5, 20),
(3, 21),
(4, 21),
(5, 21),
(4, 22),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(2, 35),
(2, 36),
(2, 37),
(4, 42);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `name`) VALUES
(1, 'CDJ et soins clientèle hébergée'),
(2, 'Centre de jour'),
(3, 'Centre de jour et hôpital de jour'),
(4, 'Centre de jour et soins à domicile'),
(5, 'Centre de jour, soins de clientèle hébergée'),
(6, 'Hôpital de jour'),
(7, 'Recherche clinique'),
(8, 'Soins clientèle à domicile'),
(9, 'Soins clientèle à domicile et clientèle externe'),
(10, 'Soins clientèle à domicile et en hébergement, Centre de jour'),
(11, 'Soins clientèle externe'),
(12, 'Soins clientèle externe et à domicile'),
(13, 'Soins clientèle externe et hébergée'),
(14, 'Soins clientèle externe et hospitalisée'),
(15, 'Soins clientèle externe et interne'),
(16, 'Soins clientèle externe, rééducation au travail'),
(21, 'Soins clientèle hébergé et possibilité de Centre de jour'),
(22, 'Soins clientèle hébergée'),
(23, 'Soins clientèle hébergée et externe'),
(24, 'Soins clientèle hébergée et hospitalisée'),
(25, 'Soins clientèle hébergée, soins de clientèle en convalescence'),
(26, 'Soins clientèle hospitalisée'),
(27, 'Soins de clientèle externe'),
(28, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail'),
(29, 'Soins de clientèle hébergée et externe'),
(30, 'Soins de clientèle hébergée et hôpital de jour'),
(31, 'UTRF');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_number` int(10) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `grade` decimal(3,0) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_number`, `last_name`, `first_name`, `phone`, `info`, `grade`, `actif`) VALUES
(5, 3, 222, 'Test 2', 'Test 2', '450-222-2222', 'Test 2', NULL, NULL),
(6, 7, 333, 'Test 3', 'Test 3', '450-333-3333', 'Test 3', NULL, 1),
(7, NULL, 111, 'Test 1', 'Test 1', '450-111-1111', 'Test 1', NULL, 1),
(12, 16, 111222333, 'Trump', 'Donald', '450.333.3333', 'douchbag3', '100', 1),
(13, 20, 112233123, 'Bouchard', 'Louis', '450.325.7744', '', '85', 1),
(14, NULL, 201159247, 'Sylvain', 'Frederik', '514.888.8888', 'Je ne sais pas ce que je fait', '100', 1),
(15, 23, 111111111, 'Aa', 'Aa', '999.999.9999', 'a', '89', 1),
(16, 24, 111111112, 'Hello', 'Maybe Want to patch that', '999.999.9999', 'hahaha', '99', 1),
(17, 25, 111111113, 'Hello', 'Again', '999.999.9999', 'Its the last one', '100', 1),
(18, 26, 222222222, 'Test', 'Michel', '555.555.5555', '', '2', 1),
(19, 28, 201159245, 'Sylvain', 'Frederik', '514.666.6666', '', '70', 1),
(20, 29, 123412312, 'A', 'A', '222.222.2222', '2', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE IF NOT EXISTS `supervisors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `user_id`, `gender`, `first_name`, `last_name`, `title`, `location`, `address`, `city`, `province`, `postal_code`, `email`, `phone`, `extension`, `cellphone`, `fax`) VALUES
(3, 17, 'Male', 'Roger', 'Michel', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'michel@mail.com', '450.111.1111', '111', '450.111.1111', '450.111.1111'),
(5, 19, 'Female', 'Mary', 'Popins', 'Bell', 'Canada', '111 Rue Test', 'Montréal', 'Québec', 'H2A2A2', 'popins@mail.com', '450.222.2222', '444', '450.222.2222', '450.222.2222'),
(6, 22, 'Unknown', 'Bla', 'Blabla', 'Blabla master', 'Not here', '6060 perdu', 'lavalpas', 'QC', '666420', 'super@mail.com', '222.222.2222', '40', '222.222.2222', '222.222.2223'),
(7, 27, 'Unknown', 'Louis', 'Bouchard', 'Prof', '', '', '', '', '', 'lBouchard@mail.com', '111.111.1111', '', '111.111.1111', '111.111.1111');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(17, 'CDJ et soins clientèle hébergée'),
(18, 'Centre de jour'),
(19, 'Centre de jour et hôpital de jour'),
(20, 'Centre de jour et soins à domicile'),
(21, 'Centre de jour, soins de clientèle hébergée'),
(22, 'Hôpital de jour'),
(23, 'Neurologie, pédiatrie poss d''ortho/rhumato'),
(24, 'Ortho/rhumato'),
(25, 'Ortho/rhumato et perte d''autonomie'),
(26, 'Orthopédie/rhumatologie'),
(27, 'Orthopédie/rhumatologie principalement'),
(28, 'Orthopédie/rhumatologie, Perte d''autonomie'),
(29, 'Perte autonomie fonctionnelle'),
(30, 'Perte d''autonomie'),
(31, 'Perte d''autonomie et ortho/rhumato'),
(32, 'Perte d''autonomie un peu de neuro et d''ortho'),
(33, 'Perte d''autonomie, cardiorespiratoire, palliatif'),
(34, 'Perte d''autonomie, neuro et quelques cas ortho'),
(35, 'Perte d''autonomie, neurologie (cas séquélaires et évolutifs)'),
(36, 'Perte d''autonomie, ortho, cardio, neuro'),
(37, 'Perte d''autonomie, ortho/rhumato'),
(38, 'Perte d''autonomie, ortho/rhumato, cardiorespiratoire'),
(39, 'Perte d''autonomie, ortopédie/rhumato, neuro'),
(40, 'Perte d''autonomie, Orthopédie/rhumatologie'),
(41, 'Perte d''autonomie, orthopédie/rhumatologie,neuro'),
(42, 'Perte d''autonomie, orthopédie/rhumatologie, neuro, cardiorespiratoire'),
(43, 'Principalement ortho/rhumato, un eu de perte d''autonomie'),
(44, 'Soins clientèle à domicile'),
(45, 'Soins clientèle à domicile et clientèle externe'),
(46, 'Soins clientèle à domicile et en hébergement, Centre de jour'),
(47, 'Soins clientèle externe'),
(48, 'Soins clientèle externe et à domicile'),
(49, 'Soins clientèle externe et hébergée'),
(50, 'Soins clientèle externe et hospitalisée'),
(51, 'Soins clientèle externe et interne'),
(52, 'Soins clientèle externe, rééducation au trvail'),
(53, 'Soins clientèle hébergé et possibilité de Centre de jour'),
(54, 'Soins clientèle hébergée et externe'),
(55, 'Soins clientèle hébergée et hospitalisée'),
(56, 'Soins clientèle hébergée, soins de clientèle en convalescence'),
(57, 'Soins clientèle hospitalisée'),
(58, 'Soins de clientèle externe'),
(59, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail'),
(60, 'Soins de clientèle hébergée et externe'),
(61, 'Soins de clientèle hébergée et hôpital de jour'),
(62, 'UTRF');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@mail.com', '$2y$10$npgIDB2lHgPZsiCs1JnjzuNKz27c8poSvu/JaaA8/RvSYrfbkJvce', 'admin'),
(3, 'test@mail.com', '$2y$10$Z3vo5a3brlvW5dWoIecCmOy5Y4ljkD1svICQ/SvVyoJYN8vtffTD6', 'student'),
(7, 'test3@mail.com', '$2y$10$CPSCx1wkIdV5v/nmC.CocOdstB9h8d3nt8KXudP5UdfF/TUtGEqLu', 'student'),
(16, 'dtrump@mail.com', '$2y$10$x82HYeqAjnZP0.K6KLhx9.JZPVyfqA3zpOAbUm/DBP0guuq/GRpR.', 'student'),
(17, 'michel@mail.com', '$2y$10$JqNXR8UtwxezPGIvb8WYhen1c.vFqPbxMIhcI7NXWA8MhXtAE5Oty', 'supervisor'),
(19, 'popins@mail.com', '$2y$10$5rAZIEKfjGilAD5hlOg7mepcvfI5.Qwud7Zkt4EK4Y2.JQ93ehy3G', 'supervisor'),
(20, 'bouchard@mail.com', '$2y$10$wAK7NTghxsNGB9CmMSPVAOAObxyCIA9bQeL4JSk42mwrtdNLLLbN.', 'student'),
(22, 'super@mail.com', '$2y$10$bWDwCD4is3RVzra0xZLg/OIW5ypXxUWogHE7V9TnanmDZAQVtDfdC', 'supervisor'),
(23, 'aa@aa.ca', '$2y$10$D9.TUMrKIeCs8iSlCATGG.b2LGBhbTPZHbCRTlBDZaLVumclXM3TG', 'student'),
(24, 'oups@got.trooled', '$2y$10$SP7M8vLUc8SfnASXTQx/rOxm4aDgrBaCidQY.Xn/vyZWMJ6AuXTwq', 'student'),
(25, 'aa@aa.com', '$2y$10$S.zHI712ou4dp93oOGbIcu/77ps4UZOBMcqwLRquFcFHMLe/1R5yi', 'student'),
(26, 'test1@mail.com', '$2y$10$82pefjqy5XdcbK9O0TYCO.Mp0H7pduIafm1ajz7mUMJP/cJl3680e', 'student'),
(27, 'lbouchard@mail.com', '$2y$10$q9qMtouPLkeJKokt8fDM2uzzj.uVIKfkUkszvKIV/8wS5.E5C6JFG', 'supervisor'),
(28, 'fred@mail.com', '$2y$10$qnqBB/JMSWy5Wkbr4d0lcOvbMms7uBpsPv0nzs13m6UzQ.lB6mDhi', 'student'),
(29, '222@gmail.com', '$2y$10$uSYBbPEX9peu0y3tNrLkUOC8l3Lw0GX6vHvWs1N67HPUDBVWv7lQ.', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buildings_types`
--
ALTER TABLE `buildings_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `id_buildingType` (`buildingType_id`);

--
-- Indexes for table `internships_missions`
--
ALTER TABLE `internships_missions`
  ADD PRIMARY KEY (`internship_id`,`mission_id`),
  ADD KEY `id_mission` (`mission_id`);

--
-- Indexes for table `internships_students`
--
ALTER TABLE `internships_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_id` (`internship_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `internships_types`
--
ALTER TABLE `internships_types`
  ADD PRIMARY KEY (`internship_id`,`type_id`),
  ADD KEY `id_type` (`type_id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buildings_types`
--
ALTER TABLE `buildings_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `internships_students`
--
ALTER TABLE `internships_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_ibfk_2` FOREIGN KEY (`buildingType_id`) REFERENCES `buildings_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internships_missions`
--
ALTER TABLE `internships_missions`
  ADD CONSTRAINT `internships_missions_ibfk_1` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_missions_ibfk_2` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internships_students`
--
ALTER TABLE `internships_students`
  ADD CONSTRAINT `internships_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_students_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internships_types`
--
ALTER TABLE `internships_types`
  ADD CONSTRAINT `internships_types_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_types_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
