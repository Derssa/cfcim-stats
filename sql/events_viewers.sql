-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 11 juin 2021 à 13:50
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
-- Structure de la table `events_viewers`
--

CREATE TABLE `events_viewers` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `eventsID` varchar(250) NOT NULL,
  `jour` date NOT NULL,
  `accountID` varchar(250) DEFAULT NULL,
  `eventName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events_viewers`
--

INSERT INTO `events_viewers` (`id`, `firstname`, `lastname`, `email`, `company`, `eventsID`, `jour`, `accountID`, `eventName`) VALUES
(37, 'Manal', 'CHAOUKI', 'mchaouki@cfcim.org', '', 'UGxhbm5pbmdfMzgxNzYx', '2021-06-08', 'RXZlbnRQZW9wbGVfMzQzNzMwMQ==', 'Rencontre digitale pour le lancement de la JournÃ©e Economique d\'Essaouira'),
(38, 'Moulay Hicham', 'Mdaghri Alaoui', 'halaoui@cfcim.org', 'CFCIM', 'UGxhbm5pbmdfMTc3MTIx', '2021-06-08', 'RXZlbnRQZW9wbGVfNjkzMjgyMQ==', 'Mission Collective Laayoune-Dakhla'),
(39, 'Karima', 'KHDIM', 'kkhdim@cfcim.org', '', 'UGxhbm5pbmdfNDc2NTU3', '2021-06-10', 'RXZlbnRQZW9wbGVfMjgzOTQyNQ==', 'La mÃ©diation, outil stratÃ©gique de rÃ©solution des conflits'),
(40, 'Karima', 'KHDIM', 'kkhdim@cfcim.org', '', 'UGxhbm5pbmdfMzMzMTg0', '2021-06-10', 'RXZlbnRQZW9wbGVfMjgzOTQyNQ==', 'Powerpoint Ã  votre service'),
(41, 'Salma', 'LITIM', 'slitim@cfcim.org', '', 'UGxhbm5pbmdfMjAwMTA2', '2021-06-10', 'RXZlbnRQZW9wbGVfMzI0NDgxMA==', 'RÃ‰UNION Dâ€™INFORMATION : ENTREPRISES EN DIFFICULTÃ‰, Ã‰CLAIRAGES SUR LA CESSION Dâ€™ACTIVITÃ‰ ET LE RÃ”LE DU SYNDIC'),
(42, 'Salma', 'LITIM', 'slitim@cfcim.org', '', 'UGxhbm5pbmdfMTY5MzIy', '2021-06-10', 'RXZlbnRQZW9wbGVfMzI0NDgxMA==', 'Les rendez-vous Ã©conomiques de la CFCIM - Point de vue de M. Najib AKESBI'),
(43, 'Salma', 'LITIM', 'slitim@cfcim.org', '', 'UGxhbm5pbmdfNDM0MDE2', '2021-06-10', 'RXZlbnRQZW9wbGVfMzI0NDgxMA==', 'Election des dÃ©lÃ©guÃ©s du personnel : les enjeux juridiques '),
(44, 'Salma', 'LITIM', 'slitim@cfcim.org', '', 'UGxhbm5pbmdfMzgxNzYx', '2021-06-10', 'RXZlbnRQZW9wbGVfMzI0NDgxMA==', 'Rencontre digitale pour le lancement de la JournÃ©e Economique d\'Essaouira'),
(45, 'Manal', 'CHAOUKI', 'mchaouki@cfcim.org', '', 'UGxhbm5pbmdfMzgxNzYx', '2021-06-10', 'RXZlbnRQZW9wbGVfMzQzNzMwMQ==', 'Rencontre digitale pour le lancement de la JournÃ©e Economique d\'Essaouira'),
(46, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfMTY2ODE3', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'Formation : Technique de vente Ã  distance'),
(47, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfNDM0MDc2', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'Election des dÃ©lÃ©guÃ©s du personnel : Le ComitÃ© dâ€™entreprise et synthÃ¨se du processus Ã©lectoral'),
(48, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfMTY2ODMy', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'SÃ©minaire : Gestion de projets'),
(49, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfNDM0MDc0', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'Election des dÃ©lÃ©guÃ©s du personnel : ComitÃ© d\'hygiÃ¨ne et de sÃ©curitÃ©'),
(50, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfMTY2ODI4', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'SÃ©minaire : PrÃ©vention des Risques, gestion des conflits et Licenciement'),
(51, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfMTY2NzY5', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'Formation : Gestion de crise'),
(52, 'Abdelilah', 'AAZZANE', 'abdelilah.aazzane@caprel.net', 'CAPREL', 'UGxhbm5pbmdfMjAwMTA2', '2021-06-10', 'RXZlbnRQZW9wbGVfNTk5NDA3OA==', 'RÃ‰UNION Dâ€™INFORMATION : ENTREPRISES EN DIFFICULTÃ‰, Ã‰CLAIRAGES SUR LA CESSION Dâ€™ACTIVITÃ‰ ET LE RÃ”LE DU SYNDIC'),
(53, 'Youssef', 'AGUNI', 'youssef.aguni@maghrebsteel.ma', 'MAGHREB STEEL', 'UGxhbm5pbmdfNDM0MDc2', '2021-06-10', 'RXZlbnRQZW9wbGVfNjI5MDI0Nw==', 'Election des dÃ©lÃ©guÃ©s du personnel : Le ComitÃ© dâ€™entreprise et synthÃ¨se du processus Ã©lectoral'),
(54, 'Mohamed', 'LAHLOU', 'gcm60@hotmail.fr', 'LES GRANDES CARRIERES DU MOYEN ATLAS ', 'UGxhbm5pbmdfMTI3Njky', '2021-06-10', 'RXZlbnRQZW9wbGVfNzk0MjA1Nw==', 'ConfÃ©rence Inaugurale : Analyse des perspectives de la reprise post-crise sanitaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events_viewers`
--
ALTER TABLE `events_viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events_viewers`
--
ALTER TABLE `events_viewers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
