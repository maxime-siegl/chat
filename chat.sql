-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 déc. 2020 à 10:40
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `channels`
--

DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_channel` varchar(255) NOT NULL,
  `admin_channel` int(11) NOT NULL,
  `salon_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `channels`
--

INSERT INTO `channels` (`id`, `name_channel`, `admin_channel`, `salon_parent`) VALUES
(1, 'Règlement', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `erreurs`
--

DROP TABLE IF EXISTS `erreurs`;
CREATE TABLE IF NOT EXISTS `erreurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_erreur` varchar(255) NOT NULL,
  `message_erreur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `erreurs`
--

INSERT INTO `erreurs` (`id`, `type_erreur`, `message_erreur`) VALUES
(1, 'short_password', 'Votre mot de passe doit contenir plus de 8 caractères.'),
(2, 'error_password', 'Vos mots de passe ne sont pas identiques.'),
(3, 'empty_pseudo', 'Le champ pseudo est vide, veuillez le renseigner.'),
(4, 'short_pseudo', 'Votre pseudo doit contenir plus de 3 caractères.'),
(5, 'format_email', 'Veuillez saisir une adresse e-mail avec le format suivant : monadresse@email.com'),
(9, 'unknown_email', 'Nous ne reconnaissons pas votre adresse e-mail.'),
(7, 'empty_confirm', 'Le champ de confirmation du mot de passe est vide. Veuillez le renseigner.'),
(6, 'empty_email', 'Le champ e-mail est vide, veuillez le renseigner.'),
(8, 'empty_password', 'Le champ mot de passe est vide. Veuillez le renseigner.'),
(10, 'wrong_password', 'Votre mot de passe est incorrect.');

-- --------------------------------------------------------

--
-- Structure de la table `jonction_channel`
--

DROP TABLE IF EXISTS `jonction_channel`;
CREATE TABLE IF NOT EXISTS `jonction_channel` (
  `id` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `droits` tinyint(4) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  KEY `channel_id_channel` (`id_channel`),
  KEY `users_id_users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jonction_channel`
--

INSERT INTO `jonction_channel` (`id`, `id_channel`, `id_user`, `droits`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `jonction_salon`
--

DROP TABLE IF EXISTS `jonction_salon`;
CREATE TABLE IF NOT EXISTS `jonction_salon` (
  `id` int(11) NOT NULL,
  `id_salon` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `droits` tinyint(4) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  KEY `salon_id_salon` (`id_salon`),
  KEY `user_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `id_creator` int(11) NOT NULL,
  `id_channel` int(11) DEFAULT NULL,
  `id_salon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `date`, `id_creator`, `id_channel`, `id_salon`) VALUES
(1, 'Bonjour', '2020-11-20 11:47:40', 1, NULL, 3),
(2, 'Bienvenu sur notre chat instantané', '2020-11-20 11:48:08', 1, NULL, 3),
(3, 'Ici vous pouvez communiquer avec une communauté qui partage vos centres d\'interet', '2020-11-20 12:18:11', 1, NULL, 3),
(4, 'Alors le scénario de TLOU 2 ca vaut le coup ?', '2020-11-20 14:59:17', 1, NULL, 2),
(5, 'Qui a une recette tiramisu nutella ? (avec huile de palme)', '2020-11-21 11:45:02', 1, NULL, 5),
(6, 'J\'aime aussi les lasagnes mais ca je connais la recette ', '2020-11-21 11:45:30', 1, NULL, 5),
(7, 'Le règlement est simple, pas de propo injurieux\n', '2020-11-21 17:09:39', 1, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `salons`
--

DROP TABLE IF EXISTS `salons`;
CREATE TABLE IF NOT EXISTS `salons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_salon` varchar(255) NOT NULL,
  `admin_salon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salons`
--

INSERT INTO `salons` (`id`, `name_salon`, `admin_salon`) VALUES
(1, 'God Of War', 1),
(2, 'The Last Of Us', 2),
(3, 'Général', 3),
(4, 'Assassin\'s Creed', 1),
(5, 'Recette Cuisine', 3),
(6, 'LaPlateforme_', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `administrateur_discord` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `image`, `administrateur_discord`) VALUES
(1, 'Maxime', 'maxime.siegl@gmail.com', '$2y$10$1cgHc3Krso4rdBCRkEKhReWAexEr82Et2GewF9C9TMBGKqrqWln8m', 'ours.jpg', 1),
(2, 'Cecile', 'cecile@laplateforme.io', '$2y$10$vOOFdAgigiVlV3eIPfHMXebIpQHWZtvi.u6J.3vXOly0pdVQ4Zkeu', NULL, 1),
(3, 'Administrator', 'admin@admin.com', '$2y$10$C1dU9maYPfMZGzERt0Lobes2U3A1TXhIh5xGrY.wGF9RIkec8GSEK', NULL, 1),
(4, 'Martin', 'martin@laplateforme.io', '$2y$10$lirH2GRnbOmtRzn3UY.S4.MwzePSMeGTkmK6bH84tbfPh79EbJfW.', NULL, 0),
(5, 'Celine', 'celine@laplateforme.io', '$2y$10$rPOB5pmWZTJ6nuYoCrCFeOAkJRlXbxx6ob7u4rkL2ST08kPf11imG', NULL, 0),
(8, 'Louise', 'louise@laplteforme.io', '$2y$10$Sy3jRBCI6j8LO4iNqgMTe.3uHkzPzk9za1Ucqc7C8EFCYy9xMKx7i', 'basic.png', 0),
(11, 'blob', 'blob@lapateforme.io', '$2y$10$2MJrH3v11U1I/eTeSf5nKe3hYQdDX0cmQQrSjhWwhqnYRcpvMlsT.', 'basic.png', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `jonction_channel`
--
ALTER TABLE `jonction_channel`
  ADD CONSTRAINT `channel_id_channel` FOREIGN KEY (`id_channel`) REFERENCES `channels` (`id`),
  ADD CONSTRAINT `users_id_users` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `jonction_salon`
--
ALTER TABLE `jonction_salon`
  ADD CONSTRAINT `salon_id_salon` FOREIGN KEY (`id_salon`) REFERENCES `salons` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
