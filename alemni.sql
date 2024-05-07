-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 mai 2024 à 16:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alemni`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id_event` int(20) NOT NULL,
  `nom_event` varchar(100) NOT NULL,
  `lieux_event` varchar(100) NOT NULL,
  `prix_event` int(30) NOT NULL,
  `date_event` varchar(100) NOT NULL,
  `nb_personne` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `nom_event`, `lieux_event`, `prix_event`, `date_event`, `nb_personne`) VALUES
(9005, 'aaaaaa', 'aaa', 77, '2222-02-22', 7),
(9007, 'Ssssssssss', 'ssssssssssssssss', 444, '1111-11-11', 4),
(9008, 'Ssssssssss', 'ssssssssssssssss', 444, '1111-11-11', 4),
(9010, 'Ssssssssss', 'ssssssssssssssss', 444, '1111-11-11', 4),
(9011, 'Aaaaaaaaaaaa', 'Aaaaaaaaaaaa', 3333, '1333-12-13', 33),
(9012, 'pkaaaaaaaaaaaaaay', 'pkaaaaaaaaaaay', 44, '2022-04-04', 44);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `table_concernee` varchar(255) NOT NULL,
  `id_ligne_modifiee` int(11) NOT NULL,
  `date_action` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `action_type`, `table_concernee`, `id_ligne_modifiee`, `date_action`) VALUES
(1, 'ajout', 'event', 9010, '2024-05-05 02:20:26'),
(2, 'ajout', 'event', 9011, '2024-05-05 02:21:19'),
(3, 'suppression', 'event', 9009, '2024-05-05 12:28:35'),
(4, 'ajout', 'event', 9012, '2024-05-05 12:29:06'),
(5, 'Création', 'Réservation', 10, '2024-05-05 12:30:12'),
(6, 'ajout', 'event', 9013, '2024-05-05 21:12:19'),
(7, 'Modification', 'Événement', 9005, '2024-05-06 13:56:07'),
(8, 'Modification', 'Événement', 9013, '2024-05-06 13:56:14'),
(9, 'suppression', 'event', 9013, '2024-05-06 13:56:18'),
(10, 'Création', 'Réservation', 11, '2024-05-06 13:56:32'),
(11, 'listing', 'reservation', -1, '2024-05-06 13:58:44'),
(12, 'listing', 'reservation', -1, '2024-05-06 13:58:47'),
(13, 'listing', 'reservation', -1, '2024-05-06 13:59:00'),
(14, 'Création', 'Réservation', 12, '2024-05-06 13:59:53'),
(15, 'listing', 'reservation', -1, '2024-05-06 13:59:53'),
(16, 'Modification', 'Réservation', 5, '2024-05-06 14:00:03'),
(17, 'listing', 'reservation', -1, '2024-05-06 14:00:03'),
(18, 'Suppression', 'Réservation', 9, '2024-05-06 14:00:08'),
(19, 'listing', 'reservation', -1, '2024-05-06 14:00:08');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `montant_a_payer` int(11) NOT NULL,
  `statut_reservation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `nom_client`, `id_event`, `montant_a_payer`, `statut_reservation`) VALUES
(5, 'arara', 9010, 554, 'confirmé'),
(8, 'aaaaaaaa', 9005, 666, 'en attente'),
(10, 'EspritTZZ', 9005, 221, 'en attente'),
(11, 'Z?Z?Z?', 9007, 4444, 'en attente'),
(12, 'aaaaaaaa', 9010, 3333, 'en attente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_event` (`id_event`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9014;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
