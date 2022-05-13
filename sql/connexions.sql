-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 11 juin 2021 à 13:49
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mycfcim_stats`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexions`
--

CREATE TABLE `connexions` (
  `id` int(6) UNSIGNED NOT NULL,
  `active_users` varchar(50) DEFAULT NULL,
  `pc` varchar(50) DEFAULT NULL,
  `ios` varchar(50) DEFAULT NULL,
  `android` varchar(50) DEFAULT NULL,
  `Evenements_ouverts` varchar(50) DEFAULT NULL,
  `CFCIM_en_video` varchar(50) DEFAULT NULL,
  `Demandes_stages_emplois` varchar(50) DEFAULT NULL,
  `BOUTIQUE_produits` varchar(50) DEFAULT NULL,
  `ECOPARC_BERRECHID` varchar(50) DEFAULT NULL,
  `MEDIATION` varchar(50) DEFAULT NULL,
  `Seminaire_en_ligne` varchar(50) DEFAULT NULL,
  `Evenements_passes` varchar(50) DEFAULT NULL,
  `Village_partenaires` varchar(50) DEFAULT NULL,
  `Participants_networking` varchar(50) DEFAULT NULL,
  `Revue_conjoncture` varchar(50) DEFAULT NULL,
  `Team_France_Export` varchar(50) DEFAULT NULL,
  `Evenements_venir` varchar(50) DEFAULT NULL,
  `Guide_privileges` varchar(50) DEFAULT NULL,
  `Kluster_CFCIM` varchar(50) DEFAULT NULL,
  `jour` date NOT NULL,
  `Demandes_contacts` varchar(50) DEFAULT NULL,
  `rendez_vous` varchar(50) DEFAULT NULL,
  `Nombre_messages` varchar(50) DEFAULT NULL,
  `Nombre_appels_videos` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexions`
--

INSERT INTO `connexions` (`id`, `active_users`, `pc`, `ios`, `android`, `Evenements_ouverts`, `CFCIM_en_video`, `Demandes_stages_emplois`, `BOUTIQUE_produits`, `ECOPARC_BERRECHID`, `MEDIATION`, `Seminaire_en_ligne`, `Evenements_passes`, `Village_partenaires`, `Participants_networking`, `Revue_conjoncture`, `Team_France_Export`, `Evenements_venir`, `Guide_privileges`, `Kluster_CFCIM`, `jour`, `Demandes_contacts`, `rendez_vous`, `Nombre_messages`, `Nombre_appels_videos`) VALUES
(5, '41', '25', '4', '14', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-03', '10', '0', '27', '0'),
(6, '52', '16', '5', '12', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-07', '10', '0', '27', '0'),
(8, '36', '17', '8', '8', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-06', '10', '0', '27', '0'),
(9, '38', '31', '6', '13', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-05', '10', '0', '27', '0'),
(10, '48', '26', '11', '16', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-04', '10', '0', '27', '0'),
(12, '32', '41', '2', '20', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-01', '10', '0', '27', '0'),
(13, '21', '35', '9', '18', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-05-31', '10', '0', '27', '0'),
(14, '33', '34', '3', '11', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-05-30', '10', '0', '27', '0'),
(18, '41', '25', '4', '14', '8', '5', '7', '6', '2', '2', '1', '9', '3', '56', '2', '3', '9', '2', '1', '2021-06-08', '10', '0', '27', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexions`
--
ALTER TABLE `connexions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexions`
--
ALTER TABLE `connexions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
