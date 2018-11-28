-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 28 Novembre 2018 à 19:11
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `GestionDeStage`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `phone`) VALUES
(1, 1, 'Pavel Zaharciuc', '450-555-5555');

-- --------------------------------------------------------

--
-- Structure de la table `buildings_types`
--

CREATE TABLE IF NOT EXISTS `buildings_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `buildings_types`
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
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `student_id`) VALUES
(13, '23_La Peur.rtf', 'students/', 23),
(14, '23_New Text Document.txt', 'students/', 23);

-- --------------------------------------------------------

--
-- Structure de la table `internships`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `internships`
--

INSERT INTO `internships` (`id`, `title`, `address`, `city`, `province`, `postal_code`, `administrative_region`, `description`, `buildingType_id`, `actif`, `supervisor_id`, `created`, `modified`) VALUES
(6, 'testPavel', 'test', 'test', 'test', 'H7l4w7', 'frsjfe', 'TestDePlace', 4, 1, 8, '2018-11-21', '2018-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `internships_missions`
--

CREATE TABLE IF NOT EXISTS `internships_missions` (
  `internship_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `internships_missions`
--

INSERT INTO `internships_missions` (`internship_id`, `mission_id`) VALUES
(6, 2),
(6, 10),
(6, 14);

-- --------------------------------------------------------

--
-- Structure de la table `internships_students`
--

CREATE TABLE IF NOT EXISTS `internships_students` (
  `id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `internships_students`
--

INSERT INTO `internships_students` (`id`, `internship_id`, `student_id`) VALUES
(11, 6, 23);

-- --------------------------------------------------------

--
-- Structure de la table `internships_types`
--

CREATE TABLE IF NOT EXISTS `internships_types` (
  `internship_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `internships_types`
--

INSERT INTO `internships_types` (`internship_id`, `type_id`) VALUES
(6, 22),
(6, 26),
(6, 30),
(6, 51);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `missions`
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
-- Structure de la table `students`
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_number`, `last_name`, `first_name`, `phone`, `info`, `grade`, `actif`) VALUES
(5, NULL, 222333676, 'Test 2', 'Test 2', '450-222-2222', 'Test 2', '32', 1),
(12, NULL, 111222333, 'Trump', 'Donald', '450.333.3333', 'douchbag3', '100', 1),
(13, NULL, 112233123, 'Bouchard', 'Louis', '450.325.7744', '', '85', 1),
(14, NULL, 201159247, 'Sylvain', 'Frederik', '514.888.8888', 'Je ne sais pas ce que je fait', '100', 1),
(15, NULL, 111111111, 'Aa', 'Aa', '999.999.9999', 'a', '89', 1),
(16, NULL, 111111112, 'Hello', 'Maybe Want to patch that', '999.999.9999', 'hahaha', '99', 1),
(17, NULL, 111111113, 'Hello', 'Again', '999.999.9999', 'Its the last one', '100', 1),
(18, NULL, 222222222, 'Test', 'Michel', '555.555.5555', '', '2', 1),
(19, NULL, 201159245, 'Sylvain', 'Frederik', '514.666.6666', '', '70', 1),
(20, NULL, 123412312, 'A', 'A', '222.222.2222', '2', '2', 1),
(21, NULL, 201111336, 'Sylvain', 'Frederik', '450.666.2222', '', '80', 1),
(22, NULL, 200862745, 'Vaillancourt', 'Étienne', '514.515.8685', '', '90', 1),
(23, 32, 123456789, 'Sylvain', 'Frederik', '450.682.6593', '', '99', 1);

-- --------------------------------------------------------

--
-- Structure de la table `supervisors`
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
  `fax` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `supervisors`
--

INSERT INTO `supervisors` (`id`, `user_id`, `gender`, `first_name`, `last_name`, `title`, `location`, `address`, `city`, `province`, `postal_code`, `email`, `phone`, `extension`, `cellphone`, `fax`, `active`) VALUES
(8, 33, 'M.', 'Pavel', 'Zaka', '', '', '', '', '', '', 'zaharpl@hotmail.com', '514.639.2126', '', '514.639.2126', '514.639.2126', 0);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `types`
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
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@mail.com', '$2y$10$npgIDB2lHgPZsiCs1JnjzuNKz27c8poSvu/JaaA8/RvSYrfbkJvce', 'admin'),
(32, 'frederik.sylvain6@hotmail.com', '$2y$10$4TqpX7xuA5D.yB5qtFRbjuWL5IVePgmOlkeLb7o1phX47Fp89v22.', 'student'),
(33, 'zaharpl@hotmail.com', '$2y$10$GSkwgCN/xM9JT.ja0iYMouTaPCiTw2mEZl0uv7gK/KHTMiSXH44g6', 'supervisor');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `buildings_types`
--
ALTER TABLE `buildings_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `id_buildingType` (`buildingType_id`);

--
-- Index pour la table `internships_missions`
--
ALTER TABLE `internships_missions`
  ADD PRIMARY KEY (`internship_id`,`mission_id`),
  ADD KEY `id_mission` (`mission_id`);

--
-- Index pour la table `internships_students`
--
ALTER TABLE `internships_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_id` (`internship_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `internships_types`
--
ALTER TABLE `internships_types`
  ADD PRIMARY KEY (`internship_id`,`type_id`),
  ADD KEY `id_type` (`type_id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_number` (`student_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `buildings_types`
--
ALTER TABLE `buildings_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `internships_students`
--
ALTER TABLE `internships_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_ibfk_2` FOREIGN KEY (`buildingType_id`) REFERENCES `buildings_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `internships_missions`
--
ALTER TABLE `internships_missions`
  ADD CONSTRAINT `internships_missions_ibfk_1` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_missions_ibfk_2` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `internships_students`
--
ALTER TABLE `internships_students`
  ADD CONSTRAINT `internships_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_students_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `internships_types`
--
ALTER TABLE `internships_types`
  ADD CONSTRAINT `internships_types_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internships_types_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
