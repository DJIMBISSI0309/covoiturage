-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 09 avr. 2025 à 04:25
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `idutilisateur` int DEFAULT NULL,
  `nom_admin` text,
  `Email_admin` text,
  `mot_de_passe` text,
  PRIMARY KEY (`idadmin`),
  KEY `idutilisateur` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

DROP TABLE IF EXISTS `conducteur`;
CREATE TABLE IF NOT EXISTS `conducteur` (
  `idconducteur` int NOT NULL,
  `numero_permis` varchar(100) NOT NULL,
  `assurance` varchar(255) DEFAULT NULL,
  `idutilisateur` int DEFAULT NULL,
  `vehicule_type` varchar(255) DEFAULT NULL,
  `plaque_immatriculation` varchar(255) DEFAULT NULL,
  `disponiblite` tinyint(1) DEFAULT '1',
  `date_inscriptionC` date DEFAULT NULL,
  PRIMARY KEY (`idconducteur`),
  KEY `idutilisateur` (`idutilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`idconducteur`, `numero_permis`, `assurance`, `idutilisateur`, `vehicule_type`, `plaque_immatriculation`, `disponiblite`, `date_inscriptionC`) VALUES
(1, 'qwertyyutdfdsdf', NULL, 1, 'vip', '23456yhgnjnbvfds', 1, NULL),
(2, 'qwsdcfvghuji', NULL, 2, 'vip', '12345678hgfds', 1, NULL),
(3, 'qwsdcfvghuji', NULL, 3, '', '23456yhgnjnbvfds', 1, NULL),
(11, 'fhhgjjsggfhjs', NULL, 11, 'Lux', '63672891001083787ejh', 1, NULL),
(13, '12345hbcssdfhmmkllkih', NULL, 13, 'Vip++', 'vvbnnhgdweetuikklku', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `idevaluation` int NOT NULL AUTO_INCREMENT,
  `note` int NOT NULL,
  `commentaire` text,
  `idutilisateur` int DEFAULT NULL,
  `idtrajet` int DEFAULT NULL,
  `date_evaluation` datetime NOT NULL,
  PRIMARY KEY (`idevaluation`),
  KEY `idutilisateur` (`idutilisateur`),
  KEY `idtrajet` (`idtrajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notif` int NOT NULL AUTO_INCREMENT,
  `idutilisateur` int DEFAULT NULL,
  `idconducteur` int DEFAULT NULL,
  `messages` text NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `choix` int DEFAULT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `idutilisateur` (`idutilisateur`),
  KEY `idconducteur` (`idconducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notif`, `idutilisateur`, `idconducteur`, `messages`, `is_read`, `created_at`, `choix`) VALUES
(2, 4, 1, 'Un nouveau trajet a été proposé de cnbdjjjwk à nxbcbvhdfg.', 1, '2025-02-28 09:59:13', 0),
(3, 5, 1, 'Un nouveau trajet a été proposé de cnbdjjjwk à nxbcbvhdfg.', 1, '2025-02-28 09:59:13', 0),
(4, 8, 1, 'Un nouveau trajet a été proposé de cnbdjjjwk à nxbcbvhdfg.', 1, '2025-02-28 09:59:13', 0),
(5, 9, 1, 'Un nouveau trajet a été proposé de cnbdjjjwk à nxbcbvhdfg.', 1, '2025-02-28 09:59:13', 0),
(6, 10, 1, 'Un nouveau trajet a été proposé de cnbdjjjwk à nxbcbvhdfg.', 1, '2025-02-28 09:59:13', 0),
(7, 10, 1, 'Nouvelle réservation de 2 place(s) pour votre trajet.', 1, '2025-02-28 10:01:49', 1),
(8, 4, 11, 'Un nouveau trajet a été proposé de socadar à baham.', 0, '2025-03-28 12:42:35', 0),
(9, 5, 11, 'Un nouveau trajet a été proposé de socadar à baham.', 0, '2025-03-28 12:42:35', 0),
(10, 8, 11, 'Un nouveau trajet a été proposé de socadar à baham.', 0, '2025-03-28 12:42:35', 0),
(11, 9, 11, 'Un nouveau trajet a été proposé de socadar à baham.', 0, '2025-03-28 12:42:35', 0),
(12, 10, 11, 'Un nouveau trajet a été proposé de socadar à baham.', 0, '2025-03-28 12:42:35', 0),
(13, 4, 1, 'Un nouveau trajet a été proposé de bahouan à camy.', 0, '2025-03-30 23:40:26', 0),
(14, 5, 1, 'Un nouveau trajet a été proposé de bahouan à camy.', 0, '2025-03-30 23:40:26', 0),
(15, 8, 1, 'Un nouveau trajet a été proposé de bahouan à camy.', 0, '2025-03-30 23:40:26', 0),
(16, 9, 1, 'Un nouveau trajet a été proposé de bahouan à camy.', 0, '2025-03-30 23:40:26', 0),
(17, 10, 1, 'Un nouveau trajet a été proposé de bahouan à camy.', 0, '2025-03-30 23:40:26', 0),
(18, 4, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:44:03', 0),
(19, 5, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:44:03', 0),
(20, 8, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:44:03', 0),
(21, 9, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:44:03', 0),
(22, 10, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:44:03', 0),
(23, 4, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:57:55', 0),
(24, 5, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:57:55', 0),
(25, 8, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:57:55', 0),
(26, 9, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:57:55', 0),
(27, 10, 1, 'Un nouveau trajet a été proposé de bahouan à baham.', 0, '2025-03-30 23:57:55', 0),
(28, 4, 1, 'Un nouveau trajet a été proposé de kamkop à camy.', 0, '2025-03-30 23:58:20', 0),
(29, 5, 1, 'Un nouveau trajet a été proposé de kamkop à camy.', 0, '2025-03-30 23:58:20', 0),
(30, 8, 1, 'Un nouveau trajet a été proposé de kamkop à camy.', 0, '2025-03-30 23:58:20', 0),
(31, 9, 1, 'Un nouveau trajet a été proposé de kamkop à camy.', 0, '2025-03-30 23:58:20', 0),
(32, 10, 1, 'Un nouveau trajet a été proposé de kamkop à camy.', 0, '2025-03-30 23:58:20', 0),
(33, 4, 1, 'Un nouveau trajet a été proposé de dschang à total.', 0, '2025-03-31 00:05:01', 0),
(34, 5, 1, 'Un nouveau trajet a été proposé de dschang à total.', 0, '2025-03-31 00:05:01', 0),
(35, 8, 1, 'Un nouveau trajet a été proposé de dschang à total.', 0, '2025-03-31 00:05:01', 0),
(36, 9, 1, 'Un nouveau trajet a été proposé de dschang à total.', 0, '2025-03-31 00:05:01', 0),
(37, 10, 1, 'Un nouveau trajet a été proposé de dschang à total.', 0, '2025-03-31 00:05:01', 0),
(38, 4, 1, 'Un nouveau trajet a été proposé de bahouan à baleng.', 0, '2025-03-31 01:09:01', 0),
(39, 5, 1, 'Un nouveau trajet a été proposé de bahouan à baleng.', 0, '2025-03-31 01:09:01', 0),
(40, 8, 1, 'Un nouveau trajet a été proposé de bahouan à baleng.', 0, '2025-03-31 01:09:01', 0),
(41, 9, 1, 'Un nouveau trajet a été proposé de bahouan à baleng.', 0, '2025-03-31 01:09:01', 0),
(42, 10, 1, 'Un nouveau trajet a été proposé de bahouan à baleng.', 0, '2025-03-31 01:09:01', 0),
(43, 4, 1, 'Un nouveau trajet a été proposé de socadar à doul.', 0, '2025-03-31 01:16:14', 0),
(44, 5, 1, 'Un nouveau trajet a été proposé de socadar à doul.', 0, '2025-03-31 01:16:14', 0),
(45, 8, 1, 'Un nouveau trajet a été proposé de socadar à doul.', 0, '2025-03-31 01:16:14', 0),
(46, 9, 1, 'Un nouveau trajet a été proposé de socadar à doul.', 0, '2025-03-31 01:16:14', 0),
(47, 10, 1, 'Un nouveau trajet a été proposé de socadar à doul.', 0, '2025-03-31 01:16:14', 0),
(48, 4, 1, 'Un nouveau trajet a été proposé de dschang à ertyuio.', 0, '2025-03-31 01:23:45', 0),
(49, 5, 1, 'Un nouveau trajet a été proposé de dschang à ertyuio.', 0, '2025-03-31 01:23:45', 0),
(50, 8, 1, 'Un nouveau trajet a été proposé de dschang à ertyuio.', 0, '2025-03-31 01:23:45', 0),
(51, 9, 1, 'Un nouveau trajet a été proposé de dschang à ertyuio.', 0, '2025-03-31 01:23:45', 0),
(52, 10, 1, 'Un nouveau trajet a été proposé de dschang à ertyuio.', 0, '2025-03-31 01:23:45', 0),
(53, 4, 1, 'Un nouveau trajet a été proposé de qwertyuio à ertyuio.', 0, '2025-03-31 01:28:13', 0),
(54, 5, 1, 'Un nouveau trajet a été proposé de qwertyuio à ertyuio.', 0, '2025-03-31 01:28:13', 0),
(55, 8, 1, 'Un nouveau trajet a été proposé de qwertyuio à ertyuio.', 0, '2025-03-31 01:28:13', 0),
(56, 9, 1, 'Un nouveau trajet a été proposé de qwertyuio à ertyuio.', 0, '2025-03-31 01:28:13', 0),
(57, 10, 1, 'Un nouveau trajet a été proposé de qwertyuio à ertyuio.', 0, '2025-03-31 01:28:13', 0),
(58, 14, 2, 'Nouvelle réservation de 2 place(s) pour votre trajet.', 0, '2025-04-09 04:20:45', 1),
(59, 14, 3, 'Nouvelle réservation de 1 place(s) pour votre trajet.', 0, '2025-04-09 04:22:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `idpaye` int NOT NULL AUTO_INCREMENT,
  `methode_paiement` varchar(255) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `date_paiement` datetime NOT NULL,
  `idtrajet` int DEFAULT NULL,
  `idutilisateur` int DEFAULT NULL,
  `idreservation` int DEFAULT NULL,
  PRIMARY KEY (`idpaye`),
  KEY `idtrajet` (`idtrajet`),
  KEY `idutilisateur` (`idutilisateur`),
  KEY `idreservation` (`idreservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idreservation` int NOT NULL AUTO_INCREMENT,
  `date_heure_reservation` timestamp NOT NULL,
  `idutilisateur` int DEFAULT NULL,
  `idtrajet` int DEFAULT NULL,
  `place_reserves` int DEFAULT NULL,
  `status` enum('confirmed','cancelled') DEFAULT 'confirmed',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idreservation`),
  KEY `idtrajet` (`idtrajet`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idreservation`, `date_heure_reservation`, `idutilisateur`, `idtrajet`, `place_reserves`, `status`, `created_at`) VALUES
(13, '2025-04-09 04:17:00', 14, 3, 2, 'confirmed', '2025-04-09 04:20:45'),
(14, '2025-04-09 04:21:00', 14, 5, 1, 'confirmed', '2025-04-09 04:22:03');

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
CREATE TABLE IF NOT EXISTS `trajets` (
  `idtrajet` int NOT NULL AUTO_INCREMENT,
  `Depart` text,
  `arrivee` text,
  `date_heure` datetime DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `nombres_places_disponibles` int NOT NULL,
  `idutilisateur` int DEFAULT NULL,
  `type_vehicule` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtrajet`),
  KEY `idutilisateur` (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`idtrajet`, `Depart`, `arrivee`, `date_heure`, `prix`, `nombres_places_disponibles`, `idutilisateur`, `type_vehicule`, `created_at`) VALUES
(1, 'bahouan', 'bafoussam', '2024-12-07 14:42:00', 2.00, 2400, 1, 'Vip++', '2025-03-09 15:39:29'),
(2, 'bouda', 'bafoussam', '2024-12-08 21:57:00', 2000.00, 2, 1, 'Vip', '2025-03-09 15:39:29'),
(3, 'kamkop', 'camy', '2024-12-10 00:18:00', 450.00, 1, 2, 'Lux', '2025-03-09 15:39:29'),
(5, 'socadar', 'baleng', '2024-12-10 00:23:00', 1000.00, 1, 3, 'Vip++', '2025-03-09 15:39:29');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` text,
  `prenom` text,
  `mot_de_passe` text,
  `email` text,
  `date_inscriptionU` date DEFAULT NULL,
  `tel` text,
  `ToBeDriver` int DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `prenom`, `mot_de_passe`, `email`, `date_inscriptionU`, `tel`, `ToBeDriver`) VALUES
(1, 'Tagne', 'Joel', '$2y$10$tNO/PPy0l4JXcNMkBw8YG.a0gHLV1zI3U6gy4tDWD5w2bnrxhaAKW', 'ervane866@gmail.com', NULL, '123456789', 1),
(2, 'Simoo', 'Joelle', '$2y$10$l05wo1optchJ9ofbK8iLrusAxdnjfuXjhHPy234qh.D6RaJUdXC.W', 'dt@gmail.com', NULL, '0987654', 1),
(3, 'dupont', 'Jol', '$2y$10$7dRyknNUcY0qop9hXrgCb.b6mi4k/9UmpGq7cby5aVYJ/fXIDGMG.', 'messi999@gmail.com', NULL, '6543456789', 1),
(4, 'magne', 'leaticia', '$2y$10$YQcIs/FYbBJAvx4Kcsb0suUbZ2DbtpcqTAayVnLkUmQ6pi4woTf0O', 'fg@gmail.com', NULL, '', 0),
(5, 'talla', 'doe', '$2y$10$TQDhtaCyX7hyN7d0RN09ouoj83TFDf.RUfqyiI8JHPlCp9tyhfG9K', 'talla@gmail.com', NULL, '64567890987', 0),
(8, 'dassi', 'pierre', '$2y$10$h.teZSuBbSAj4LhOUextX.9arMqnoCC6glQv3I62Jwdd5skJHCqZq', 'kj@gmail.com', NULL, '', 0),
(9, 'tamo', 'leonel', '$2y$10$jFQHlRpmE4FxBUC69bTF/e4.F8LMN31u/itc6.6JqxNUAhFflRQi.', 'nd@gmail.com', NULL, '65432340', 0),
(10, 'jean', 'werwe', '$2y$10$lXbd7PpE3.DbxliBr6z6LOHY6YeZFQ3QZGmb3SY4UT/b/TpsjIZrK', 'wd@gmail.com', NULL, '34567890', 0),
(11, 'samuel', 'kouam', '$2y$10$mfqR/DPfb4bHkcYhzU/xTehD5sJu6KOKV/H5OUA9oArin5EGsv2H2', 'kouam@gmail.com', NULL, '9876543456', 1),
(13, 'michel', 'fondo', '$2y$10$Un7IG6vFCVdAzhJh6uJzJO7RuuK/venAFBgxLvNYlGEFfxmke8ODS', 'fondo@gmail.com', NULL, '54678290883', 1),
(14, 'Motue', 'diane', '$2y$10$YUum8grpUOanzWp4Fq/vyugFwz66HOI8KV4NX66nUvW0xc5HupTTG', 'diane@gmail.com', NULL, '6544232467', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD CONSTRAINT `conducteur_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`idtrajet`) REFERENCES `trajets` (`idtrajet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`idconducteur`) REFERENCES `conducteur` (`idconducteur`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`idtrajet`) REFERENCES `trajets` (`idtrajet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiements_ibfk_2` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiements_ibfk_3` FOREIGN KEY (`idreservation`) REFERENCES `reservation` (`idreservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idtrajet`) REFERENCES `trajets` (`idtrajet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD CONSTRAINT `trajets_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
