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
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(6) UNSIGNED NOT NULL,
  `Start_date` varchar(20) DEFAULT NULL,
  `End_date` varchar(20) DEFAULT NULL,
  `Format` varchar(50) DEFAULT NULL,
  `Type` varchar(250) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Topics` varchar(50) DEFAULT NULL,
  `Internal_id` varchar(250) DEFAULT NULL,
  `External_id` varchar(250) DEFAULT NULL,
  `Linked_exhibitors` varchar(50) DEFAULT NULL,
  `Registered_attendees` varchar(50) DEFAULT '0',
  `Unique_viewer` varchar(50) DEFAULT NULL,
  `Average_watching` varchar(50) DEFAULT NULL,
  `Title` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `Start_date`, `End_date`, `Format`, `Type`, `Location`, `Topics`, `Internal_id`, `External_id`, `Linked_exhibitors`, `Registered_attendees`, `Unique_viewer`, `Average_watching`, `Title`) VALUES
(300, '7-23-20 9:30 AM', '7-23-20 11:00 AM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3Njky', '', 'BOUTIQUE', '23', '', '', 'ConfÃ©rence Inaugurale : Analyse des perspectives de la reprise post-crise sanitaire'),
(301, '7-23-20 11:00 AM', '7-23-20 11:15 AM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzAz', '', 'BOUTIQUE', '17', '', '', 'PrÃ©sentation de My CFCIM'),
(302, '7-23-20 11:30 AM', '7-23-20 12:30 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzQw', '', 'Fidaroc Grant Thornton', '19', '', '', 'Atelier 1: Changement de paradigmes dans la gouvernance dâ€™entreprise'),
(303, '7-23-20 12:30 PM', '7-23-20 1:30 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzQx', '', '', '12', '', '', 'Atelier 2: La crise sanitaire, accÃ©lÃ©rateur dâ€™opportunitÃ©s en matiÃ¨re de digitalisation et de tÃ©lÃ©travail.'),
(304, '7-23-20 2:00 PM', '7-23-20 3:00 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzQy', '', '', '14', '', '', 'Atelier 3: Financement de la relance, Made in Morocco : futurs enjeux de la redynamisation de lâ€™industrie marocaine .'),
(305, '7-23-20 3:00 PM', '7-23-20 4:00 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzQ0', '', '', '17', '', '', 'Atelier 4: Le e-commerceÂ : un levier de relance et de croissance'),
(306, '7-23-20 4:30 PM', '7-23-20 5:30 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTI3NzQ2', '', '', '15', '', '', 'Atelier 5: Le digital learning: facilitateur de relance'),
(307, '9-10-20 11:00 AM', '9-10-20 12:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY0MTQ1', '', '', '15', '', '', 'ConfÃ©rence de presse : L\'EFA devient l\'ESA de Casablanca'),
(308, '9-10-20 3:00 PM', '9-10-20 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY0MTQ4', '', '', '10', '', '', 'Table ronde ESA Entreprises'),
(309, '9-24-20 3:00 PM', '9-24-20 5:10 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2Njk2', '', '', '45', '', '', 'Formation : Comment Optimiser le Recouvrement de vos crÃ©ances?'),
(310, '10-1-20 3:10 PM', '10-1-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2NzY5', '', '', '96', '', '', 'Formation : Gestion de crise'),
(311, '10-8-20 3:16 PM', '10-8-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODE3', '', '', '133', '', '', 'Formation : Technique de vente Ã  distance'),
(312, '11-19-20 3:00 PM', '11-19-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODE5', '', '', '20', '', '', 'SÃ©minaire : Management'),
(313, '12-10-20 3:00 PM', '12-10-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODIx', '', '', '37', '', '', 'SÃ©minaire : EXCEL : MaÃ®trise AvancÃ©e'),
(314, '10-22-20 3:00 PM', '10-22-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODI0', '', '', '28', '', '', 'SÃ©minaire : Gestion du Temps et des PrioritÃ©s'),
(315, '11-5-20 3:00 PM', '11-5-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODI2', '', '', '20', '', '', 'SÃ©minaire : Marketing Digital'),
(316, '11-12-20 3:00 PM', '11-12-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', '', '', 'UGxhbm5pbmdfMTY2ODI4', '', '', '16', '', '', 'SÃ©minaire : PrÃ©vention des Risques, gestion des conflits et Licenciement'),
(317, '12-3-20 3:00 PM', '12-3-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODMx', '', '', '15', '', '', 'SÃ©minaire : Les contrats SpÃ©ciaux de Formation-OFPPT'),
(318, '11-26-20 3:00 PM', '11-26-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODMy', '', '', '21', '', '', 'SÃ©minaire : Gestion de projets'),
(319, '10-15-20 3:05 PM', '10-15-20 5:30 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY2ODMz', '', '', '46', '', '', 'SÃ©minaire : Prise de parole en public'),
(320, '9-15-20 5:00 PM', '9-15-20 7:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMTY5MTg3', '', '', '4', '', '', 'RÃ©union d\'information - Licenciements, plans sociaux, restructurations et rÃ©duction du temps de travail dans ce contexte de crise sanitaire'),
(321, '9-16-20 6:00 PM', '9-16-20 8:00 PM', 'ON_DEMAND', 'Rendez-vous Economique', 'Casablanca', '', 'UGxhbm5pbmdfMTY5MzIy', '', '', '8', '', '', 'Les rendez-vous Ã©conomiques de la CFCIM - Point de vue de M. Najib AKESBI'),
(322, '9-25-20 10:30 AM', '9-25-20 1:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfMTczMzUy', '', '', '6', '', '', 'Table ronde ESA-Entreprises'),
(323, '9-22-20 5:00 PM', '9-22-20 6:00 PM', 'ON_DEMAND', 'Ateliers', 'Casablanca', '', 'UGxhbm5pbmdfMTc0NzA1', '', '', '25', '', '', 'Comment rÃ©ussir sa stratÃ©gie dâ€™entreprise post-confinement ?'),
(324, '10-6-20 10:00 AM', '10-6-20 12:50 PM', 'ON_DEMAND', 'Missions Collectives (France-Maroc)', 'Casablanca', '', 'UGxhbm5pbmdfMTc3MTIx', '', '', '11', '1', '82.73', 'Mission Collective Laayoune-Dakhla'),
(325, '9-29-20 5:00 PM', '9-29-20 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfMTgwNzI5', '', '', '83', '', '', 'RÃ©union d\'information :  FlexibilitÃ© de l\'emploi au Maroc, dÃ©fis et opportunitÃ©s'),
(326, '9-30-20 10:00 AM', '9-30-20 11:00 AM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfMTgxMDAw', '', '', '71', '', '', 'RÃ©union d\'information - Quels apports du programme Dun Trade aux entreprises en matiÃ¨re dâ€™optimisation de recouvrement durant la pÃ©riode de crise sanitaire ?'),
(327, '10-1-20 6:00 PM', '10-1-20 8:00 PM', 'ON_DEMAND', 'Forum AdhÃ©rents', 'Casablanca', '', 'UGxhbm5pbmdfMTgzNTE1', '', '', '75', '', '', 'Forum AdhÃ©rents - Perspectives et ambitions de relance de l\'activitÃ© touristique au Maroc'),
(328, '10-20-20 9:00 AM', '10-20-20 11:00 AM', 'ON_DEMAND', 'Missions Collectives (France-Maroc)', 'Casablanca', '', 'UGxhbm5pbmdfMTk4NzA4', '', '', '6', '', '', 'Mission collective Auvergne RhÃ´ne alpes / Secteur de l\'agroalimentaire'),
(329, '11-10-20 9:00 AM', '11-10-20 12:00 PM', 'ON_DEMAND', 'Missions Collectives (France-Maroc)', 'Casablanca', '', 'UGxhbm5pbmdfMTk4NzE0', '', '', '9', '', '', 'MISSION COLLECTIVE COSMÃ‰TIQUE'),
(330, '10-13-20 5:10 PM', '10-13-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjAwMTA2', '', '', '14', '', '', 'RÃ‰UNION Dâ€™INFORMATION : ENTREPRISES EN DIFFICULTÃ‰, Ã‰CLAIRAGES SUR LA CESSION Dâ€™ACTIVITÃ‰ ET LE RÃ”LE DU SYNDIC'),
(331, '11-11-20 6:00 PM', '11-11-20 7:30 PM', 'ON_DEMAND', 'Rendez-vous Economique', '', '', 'UGxhbm5pbmdfMjAwMTQz', '', '', '12', '', '', 'LES RENDEZ-VOUS Ã‰CONOMIQUES DE LA CFCIM â€“ POINT DE VUE DE M. AHMED RÃ‰DA CHAMI'),
(332, '10-15-20 11:00 AM', '10-15-20 2:00 PM', 'ON_DEMAND', 'Missions Collectives (France-Maroc)', 'Casablanca', '', 'UGxhbm5pbmdfMjAzMzk2', '', '', '15', '', '', 'Mission d\'affaires en ligne des exportateurs Russes de produits agricoles au Royaume du Maroc'),
(333, '10-20-20 5:00 PM', '10-20-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjE0MDU3', '', '', '22', '', '', 'RÃ©union d\'information : La digitalisation une grande rÃ©volution Ã©conomique et sociale'),
(334, '10-21-20 4:00 PM', '10-21-20 6:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjE3MzE5', '', '', '29', '', '', 'RÃ©union d\'information - le plan de continuitÃ© des activitÃ©s : pour une pÃ©rennitÃ© des entreprises en pÃ©riode de crise - 21 octobre 2020'),
(335, '11-3-20 5:00 PM', '11-3-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjQxNzAz', '', '', '10', '', '', 'RÃ©union dâ€™Information : Projet de Loi de Finances 2021, quels impacts sur les entreprises ?'),
(336, '11-10-20 5:30 PM', '11-10-20 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjUyNzQ0', '', '', '4', '', '', 'RÃ©union d\'information : Quelles alternatives aux tribunaux pour rÃ©soudre les conflits commerciaux ? Regards croisÃ©s sur la mÃ©diation et lâ€™arbitrage'),
(337, '11-12-20 5:00 PM', '11-12-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjUyODU0', '', '', '13', '', '', 'RÃ©union d\'information : Quel traitement juridique, fiscal et financier pour lâ€™abandon de crÃ©ances commerciales et financiÃ¨res ?'),
(338, '11-17-20 5:00 PM', '11-17-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', '', '', 'UGxhbm5pbmdfMjYxOTYx', '', '', '12', '', '', 'RÃ©union d\'Information sur le thÃ¨me : La dÃ©claration rectificative, opportunitÃ© ou risque fiscal ?'),
(339, '11-24-20 5:00 PM', '11-24-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjczODE3', '', '', '9', '', '', 'RÃ©union d\'Information : Conventions d\'avances en comptes courants d\'associÃ©s, enjeux juridiques, fiscaux et financiers'),
(340, '12-1-20 5:00 PM', '12-1-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', '', '', 'UGxhbm5pbmdfMjczODE5', '', '', '7', '', '', 'La fonction RH de demain, rÃ´les et dÃ©fis'),
(341, '12-9-20 5:00 PM', '12-9-20 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMjgyNTg3', '', '', '37', '', '', 'Les relations sociales en entreprise : prioritÃ©s et perspectives'),
(342, '12-16-20 6:00 PM', '12-16-20 7:25 PM', 'ON_DEMAND', 'Rendez-vous Economique', 'Casablanca', '', 'UGxhbm5pbmdfMjg3ODIz', '', '', '37', '', '', 'Rendez-vous Ã©conomique avec M. Abdelmalek ALAOUI'),
(343, '12-23-20 3:00 PM', '12-23-20 4:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Oudja', '', 'UGxhbm5pbmdfMjk1MjQ4', '', '', '18', '', '', 'Les remises gracieuses sur les pÃ©nalitÃ©s de retard, les astreintes  et les frais de recouvrement'),
(344, '1-7-21 10:00 AM', '1-7-21 11:30 AM', 'ON_DEMAND', 'Missions Collectives (France-Maroc)', 'Casablanca', '', 'UGxhbm5pbmdfMjk3Mjg5', '', '', '9', '', '', 'Quel avenir pour le secteur des Ã©nergies renouvelables au Maroc ?'),
(345, '1-12-21 5:00 PM', '1-12-21 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzA1MDE5', '', '', '35', '', '', 'RÃ©union d\'information - Â« Leadership et performance en temps de crise : stratÃ©gies de rÃ©silience Â»'),
(346, '1-20-21 6:00 PM', '1-20-21 8:00 PM', 'ON_DEMAND', 'Rendez-vous Economique', 'Casablanca', '', 'UGxhbm5pbmdfMzA1NTgx', '', '', '55', '', '', 'Rendez-vous Ã©conomique de la CFCIM'),
(347, '2-2-21 5:00 PM', '2-2-21 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzE4MjYy', '', '', '38', '', '', 'Comment la digitalisation de lâ€™administration peut-elle contribuer Ã  la relance des entreprises ?'),
(348, '1-27-21 4:00 PM', '1-27-21 6:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfMzE4Mjcx', '', '', '34', '', '', 'RÃ©union d\'information Â« Prospection et gestion du risque Ã  l\'international, les outils data de Dun&Bradstreet Â»'),
(349, '1-28-21 5:05 PM', '1-28-21 7:00 PM', 'ON_DEMAND', 'Forum AdhÃ©rents', 'Casablanca', '', 'UGxhbm5pbmdfMzE5NTcz', '', '', '116', '', '', 'Forum AdhÃ©rents : CNSS, les mesures de soutien Ã  l\'entreprise'),
(350, '2-11-21 4:15 PM', '2-11-21 7:15 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Marrakech', '', 'UGxhbm5pbmdfMzMxNzA2', '', '', '19', '', '', 'RÃ©union d\'information sur la Loi de Finances 2021'),
(351, '2-4-21 3:00 PM', '2-4-21 5:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfMzMyOTgx', '', '', '30', '', '', 'La mÃ©diation, un outil rapide et peu coÃ»teux de gestion des conflits affectant lâ€™entreprise'),
(352, '2-11-21 3:05 PM', '2-11-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTc1', '', '', '116', '', '', 'Recouvrement des crÃ©ances & Gestion de trÃ©sorerie'),
(353, '2-18-21 3:00 PM', '2-18-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTc2', '', '', '34', '', '', 'SÃ©minaire d\'initiation en Marketing digital et gestion commerciale'),
(354, '2-25-21 3:00 PM', '2-25-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTc3', '', '', '25', '', '', 'Community management ou gestion des rÃ©seaux sociaux'),
(355, '3-4-21 3:00 PM', '3-4-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTc4', '', '', '24', '', '', 'Comment rÃ©pondre et remporter un appel dâ€™offre'),
(356, '3-18-21 3:00 PM', '3-18-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTc5', '', '', '33', '', '', 'RÃ©glementation internationale pour l\'export et la logistique'),
(357, '3-25-21 3:00 PM', '3-25-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTgw', '', '', '30', '', '', 'Accompagner son Ã©quipe dans le changement'),
(358, '4-1-21 3:00 PM', '4-1-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTgx', '', '', '27', '', '', 'Manager les situations de stress'),
(359, '4-22-21 3:30 PM', '4-22-21 5:00 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTgy', '', '', '41', '', '', 'Communication interne en entreprise'),
(360, '5-6-21 3:00 PM', '5-6-21 5:00 PM', 'LIVE_STREAM', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTgz', '', '', '39', '', '', 'Excel : analyse de donnÃ©es'),
(361, '5-27-21 3:00 PM', '5-27-21 5:00 PM', 'LIVE_STREAM', 'EvÃ¨nements et formations ouverts', '', '', 'UGxhbm5pbmdfMzMzMTg0', '', '', '26', '', '', 'Powerpoint Ã  votre service'),
(362, '6-3-21 3:10 PM', '6-3-21 5:00 PM', 'LIVE_STREAM', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzMzMTg1', '', '', '34', '', '', 'Management'),
(363, '2-9-21 5:35 PM', '2-9-21 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzM2OTM1', '', '', '102', '', '', ' Impact de la retraite sur le dÃ©veloppement sociÃ©tal '),
(364, '2-8-21 4:00 PM', '2-8-21 5:00 PM', 'ON_DEMAND', 'ConfÃ©rence de presse', 'Casablanca', '', 'UGxhbm5pbmdfMzQxNjc4', '', '', '4', '', '', 'Signature de conventions de partenariat en faveur de l\'entrepreunariat et du dÃ©veloppement des compÃ©tences dans l\'industrie'),
(365, '2-17-21 6:00 PM', '2-17-21 8:31 PM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', 'Casablanca', '', 'UGxhbm5pbmdfMzQ4OTQ4', '', '', '56', '', '', 'Crise sanitaire et recrutement : focus sur ces secteurs qui recrutent '),
(366, '2-23-21 5:00 PM', '2-23-21 6:35 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzU0NDM0', '', '', '44', '', '', 'La notion de force majeure dans les contrats commerciaux'),
(367, '3-3-21 5:48 PM', '3-3-21 7:05 PM', 'ON_DEMAND', 'Point de vue', 'Casablanca', '', 'UGxhbm5pbmdfMzY1OTUx', '', '', '29', '', '', 'Point de vue de M. Fabien CAPARROS'),
(368, '3-9-21 5:00 PM', '3-9-21 7:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', '', '', 'UGxhbm5pbmdfMzY2MTk4', '', '', '31', '', '', 'Analyse juridique, fiscale et jurisprudentielle du rÃ©gime du dirigeant salariÃ© dans la SociÃ©tÃ© Anonyme '),
(369, '3-24-21 5:57 PM', '3-24-21 7:10 PM', 'ON_DEMAND', 'Point de vue', 'Casablanca', '', 'UGxhbm5pbmdfMzcxODcx', '', '', '39', '', '', 'Point de vue avec M. Christian HARBULOT'),
(370, '3-11-21 11:00 AM', '3-11-21 12:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzc0Njk2', '', '', '8', '', '', 'Comment se positionner sur les secteurs Ã©mergents et profiter du climat des affaires favorable'),
(371, '3-18-21 5:00 PM', '3-18-21 6:45 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzgwMDU0', '', '', '32', '', '', 'Le remboursement escomptÃ© de la TVA : mode opÃ©ratoire de lâ€™affacturage '),
(372, '3-31-21 9:00 AM', '3-31-21 11:00 AM', 'ON_DEMAND', 'EvÃ¨nements et formations ouverts', '', '', 'UGxhbm5pbmdfMzgxNzYx', '', '', '65', '1', '0.00', 'Rencontre digitale pour le lancement de la JournÃ©e Economique d\'Essaouira'),
(373, '3-31-21 5:06 PM', '3-31-21 6:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Maroc', '', 'UGxhbm5pbmdfMzkxNjg4', '', '', '13', '', '', 'Les conventions d\'investissement : un levier juridique  pour un meilleur climat d\'affaires au Maroc'),
(374, '3-30-21 5:00 PM', '3-30-21 6:56 PM', 'ON_DEMAND', 'RÃ©union d\'information (1)', 'Casablanca', '', 'UGxhbm5pbmdfMzk5NDQ3', '', '', '23', '', '', 'FÃ©minisation des organes de gouvernance et Ã©galitÃ© des rÃ©munÃ©rations en entreprise'),
(375, '4-21-21 2:00 PM', '4-21-21 2:55 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDI2NTI0', '', '', '50', '', '', 'Importance de la mise en place des instances reprÃ©sentatives  des salariÃ©s au sein de l\'entreprise'),
(376, '4-28-21 2:00 PM', '4-28-21 3:00 PM', 'LIVE_STREAM', 'RÃ©union d\'information (2)', '', '', 'UGxhbm5pbmdfNDM0MDE2', '', '', '45', '', '', 'Election des dÃ©lÃ©guÃ©s du personnel : les enjeux juridiques '),
(377, '4-28-21 2:50 PM', '4-28-21 4:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', '', '', 'UGxhbm5pbmdfNDM0MDI1', '', '', '26', '', '', 'Election des dÃ©lÃ©guÃ©s du personnel : la prÃ©paration des listes Ã©lectorales '),
(378, '5-5-21 2:10 PM', '5-5-21 3:00 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDM0MDcw', '', '', '40', '', '', 'Election des reprÃ©sentants du personnel : La commission Ã©lectorale'),
(379, '5-12-21 2:05 PM', '5-12-21 3:10 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDM0MDcx', '', '', '36', '', '', 'Election des reprÃ©sentants du personnel : Le dÃ©pÃ´t des candidatures'),
(380, '5-19-21 5:00 PM', '5-19-21 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDM0MDcy', '', '', '39', '', '', 'Election des dÃ©lÃ©guÃ©s du personnel : Le quotient Ã©lectoral'),
(381, '5-26-21 5:00 PM', '5-26-21 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDM0MDc0', '', '', '37', '', '', 'Election des dÃ©lÃ©guÃ©s du personnel : ComitÃ© d\'hygiÃ¨ne et de sÃ©curitÃ©'),
(382, '6-3-21 4:58 PM', '6-3-21 6:00 PM', 'LIVE_STREAM', 'RÃ©union d\'information (2)', '', '', 'UGxhbm5pbmdfNDM0MDc2', '', '', '35', '', '', 'Election des dÃ©lÃ©guÃ©s du personnel : Le ComitÃ© dâ€™entreprise et synthÃ¨se du processus Ã©lectoral'),
(383, '5-11-21 2:00 PM', '5-11-21 3:33 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDUzNzkw', '', '', '53', '', '', 'Le crowdfunding : OpportunitÃ©s et risques pour les porteurs de projets'),
(384, '5-25-21 5:01 PM', '5-25-21 6:30 PM', 'ON_DEMAND', 'RÃ©union d\'information (2)', 'Casablanca', '', 'UGxhbm5pbmdfNDc2NTU3', '', '', '39', '', '', 'La mÃ©diation, outil stratÃ©gique de rÃ©solution des conflits');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
