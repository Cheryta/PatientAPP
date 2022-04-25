-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 avr. 2022 à 08:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_patient`
--

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `genre` varchar(254) DEFAULT NULL,
  `addresse` varchar(254) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `g_sanguin` varchar(254) DEFAULT NULL,
  `antecedant` varchar(254) DEFAULT NULL,
  `m_actuelle` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `genre`, `addresse`, `telephone`, `age`, `g_sanguin`, `antecedant`, `m_actuelle`) VALUES
(1, 'MBIAPOU', 'Cheryta', 'Feminin', 'Paspanga', 57100303, 72, 'AB-', 'Paludisme', 'Paresse'),
(2, 'ISSA', 'Frank', 'Masculin', '1200 logements', 70011212, 20, 'AB+', 'Maux de ventre', 'Maux de dent'),
(3, 'SAWADOGO', 'Fleur', 'Feminin', 'Ouaga 2000', 78545451, 40, 'O+', 'Grippe', 'Paludisme'),
(4, 'WEND-KUNI', 'Sarah', 'Feminin', 'Wemtenga', 66522323, 25, 'A-', 'Negatif', 'Diarrhee'),
(5, 'SANGUITAAH', 'Fernando', 'Masculin', 'Saaba', 56636321, 30, 'B+', 'Negatif', 'Grippe'),
(6, 'OUEDRAOGO', 'Marie', 'Feminin', 'Kalgonde', 56232310, 50, 'B+', 'Palu dengue', 'Grippe'),
(7, 'KABORE', 'Jean', 'Masculin', 'Wemtenga', 67747414, 35, 'B-', 'Negatif', 'Paludisme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
