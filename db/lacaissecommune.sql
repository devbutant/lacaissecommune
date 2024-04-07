-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 23 mars 2023 à 18:29
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lacaissecommune`
--

-- --------------------------------------------------------

--
-- Structure de la table `conceive`
--

CREATE TABLE `conceive` (
  `id_pots` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conceive`
--

INSERT INTO `conceive` (`id_pots`, `id_user`) VALUES
(1, 7),
(3, 7),
(4, 7),
(5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `contribute`
--

CREATE TABLE `contribute` (
  `id_pots` int(11) NOT NULL,
  `id_contributor` int(11) NOT NULL,
  `sum` float DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contribute`
--

INSERT INTO `contribute` (`id_pots`, `id_contributor`, `sum`, `comment`, `date`) VALUES
(1, 16, 5, '', '2022-06-17 11:03:38'),
(1, 19, 33.5, '', '2022-06-17 13:35:37'),
(1, 49, 29, 'zrfebg', '2023-03-23 19:17:22'),
(4, 17, 33.5, '', '2022-06-17 11:23:09'),
(4, 18, 0, 'sfg', '2022-06-17 11:23:17'),
(4, 21, 0, 'Je ne donne pas d\'argent, mais un simple commentaire', '2022-06-17 13:40:54'),
(4, 22, 10, '', '2022-06-17 13:41:10'),
(4, 23, 5, '', '2022-06-17 13:47:17'),
(4, 24, 5, '', '2022-06-17 13:47:27'),
(4, 25, 0, 'zeg', '2022-06-17 13:47:34'),
(4, 26, 0, 'rzgeth', '2022-06-17 13:47:44'),
(4, 27, 0, 'ok', '2022-06-17 13:52:51'),
(4, 28, 0, 'g', '2022-06-17 13:55:30'),
(4, 29, 0, 'g', '2022-06-17 13:55:34'),
(4, 30, 0, 'rgetfh', '2022-06-17 13:56:03'),
(4, 31, 0, 'rgetfh', '2022-06-17 13:56:43'),
(4, 32, 0, 'rgetfh', '2022-06-17 13:56:44'),
(4, 33, 0, 'rgetfh', '2022-06-17 13:56:49'),
(4, 34, 0, 'rgetfh', '2022-06-17 13:57:36'),
(4, 35, 0, 'rgetfh', '2022-06-17 13:58:21'),
(4, 36, 0, 'rgetfh', '2022-06-17 13:58:34'),
(4, 37, 0, 'rgetfh', '2022-06-17 13:58:51'),
(4, 38, 0, 'rgetfh', '2022-06-17 13:59:02'),
(4, 39, 0, 'rr', '2022-06-17 14:13:36'),
(4, 40, 0, 'r', '2022-06-17 14:13:43'),
(4, 41, 5, '', '2022-06-17 14:13:51'),
(4, 42, 0, 'efzr', '2022-06-17 14:16:01'),
(4, 43, 0, 'efrgz', '2022-06-17 14:21:11'),
(4, 44, 0, 'efeef', '2022-06-17 14:21:33'),
(4, 45, 0, 'Test', '2022-06-17 14:22:44'),
(4, 46, 0, 'fezr', '2022-06-17 14:25:39'),
(4, 47, 0, 'grz', '2022-06-17 14:26:33'),
(4, 48, 33.5, 'rrr', '2022-06-17 14:27:36');

-- --------------------------------------------------------

--
-- Structure de la table `contributors`
--

CREATE TABLE `contributors` (
  `id_contributor` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'logo-lcc.svg',
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contributors`
--

INSERT INTO `contributors` (`id_contributor`, `name`, `photo`, `e_mail`) VALUES
(16, 'Emmanuel - LCC', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(17, 'r', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(18, 'r', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(19, 'rr', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(20, 'Albert', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(21, 'Albert', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(22, 'Argent sans com', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(23, 'rr', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(24, 'RRRR', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(25, 'RR', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(26, 'zrgte', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(27, 'lea', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(28, 'r', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(29, 'r', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(30, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(31, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(32, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(33, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(34, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(35, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(36, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(37, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(38, 'rtegb', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(39, 'rr', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(40, 'r', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(41, '\'', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(42, 'ezrfg', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(43, 'ezrg', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(44, 'okok', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(45, 'Dupont', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(46, 'ezfr', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(47, 'frzg', 'logo-lcc.svg', 'def-une-adresse@gmail.fr'),
(48, 'rrr', 'Capture d’écran 2022-06-15 à 20.21.53.png', 'def-une-adresse@gmail.fr'),
(49, 'Dup', '1.jpg', 'def-une-adresse@gmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `pots`
--

CREATE TABLE `pots` (
  `id_pots` int(11) NOT NULL,
  `id` int(11) NOT NULL DEFAULT '4',
  `slug` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'chat.png',
  `sum_limit` float NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `organizer` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `public` tinyint(1) NOT NULL,
  `my_pot` tinyint(1) NOT NULL DEFAULT '1',
  `total` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pots`
--

INSERT INTO `pots` (`id_pots`, `id`, `slug`, `name`, `description`, `photo`, `sum_limit`, `recipient`, `organizer`, `date_start`, `date_end`, `public`, `my_pot`, `total`) VALUES
(1, 2, 'soutenir-lacaissecommune', 'Soutenir LCC', 'Cette caisse a pour but de soutenir le projet LaCaisseCommune', 'logo-lcc.svg', 100000, 'LaCaisseCommune', 'LaCaisseCommune', '2022-06-12', '2030-01-12', 1, 1, 51517.9),
(3, 2, 'fabrice-', 'Fabrice', 'Anniversaire de Fab', 'boite-cadeau.png', 5000, 'Fab', 'Manu', '2022-06-13', '2022-06-30', 0, 1, 33.4),
(4, 2, 'ezgrte', 'test', 'test', 'Capture d’écran 2022-06-15 à 20.25.11.png', 2000, 'fzrg', 'efzrgt', '2022-06-17', '2022-06-17', 1, 1, 125),
(5, 2, 'fesgrdtgnfh', 'ezrget', 'zrge', 'Capture d’écran 2022-06-15 à 20.25.11.png', 500, 'fsrgd', 'sgrd', '2022-06-17', '2022-06-17', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pot_categories`
--

CREATE TABLE `pot_categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'logo-lcc.svg',
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pot_categories`
--

INSERT INTO `pot_categories` (`id_category`, `name`, `id`, `photo`, `slug`) VALUES
(1, 'Anniversaire', 1, 'anniversaire.jpg', 'anniversaire'),
(2, 'Pot de départ', 1, 'depart.jpg', 'pot-de-depart'),
(3, 'Mariage / PACS', 1, 'mariage.jpg', 'mariage-pacs'),
(4, 'Naissance / Baptême', 1, 'naissance.jpg', 'naissance-bapteme'),
(5, 'Crémaillère', 1, 'cremaillere.jpg', 'cremaillere'),
(6, 'Remerciements', 1, 'remerciements.jpg', 'remerciements'),
(7, 'Thèse / Diplôme', 1, 'diplome.jpg', 'diplome'),
(8, 'Médical', 2, 'medical.jpg', 'medical'),
(9, 'Entraide', 2, 'entraide.jpg', 'entraide'),
(10, 'Animaux', 2, 'animaux.jpg', 'animaux'),
(11, 'Humanitaire', 2, 'humanitaire.jpg', 'humanitaire'),
(12, 'Soirée', 3, 'soiree.jpg', 'soiree'),
(13, 'Vacances / Week-end', 3, 'vacances.jpg', 'vacances-weekend'),
(14, 'Achats / Réparations', 3, 'reparations.jpg', 'achats-reparations'),
(15, 'Remboursement', 3, 'remboursement.jpg', 'remboursement'),
(16, 'Mariage Abdou', 4, 'logo-lcc.svg', 'mariage-abdou'),
(17, 'Visiter Google', 4, 'logo-lcc.svg', 'visiter-google'),
(18, 'Pool party', 4, 'logo-lcc.svg', 'pool-party'),
(19, 'Anniversaire Huguette', 4, 'logo-lcc.svg', 'anniversaire-huguette'),
(20, 'Autre cadeau commun', 1, 'autre-cadeau.jpg', 'autre'),
(21, 'Études', 2, 'etudes.jpg', 'etudes'),
(22, 'Environnement', 2, 'environnement.jpg', 'environnement'),
(23, 'Entrepreneuriat', 2, 'entrepreneuriat.jpg', 'entrepreneuriat'),
(24, 'Association', 2, 'association.jpg', 'association'),
(25, 'Sport', 2, 'sport.jpg', 'sport'),
(26, 'Voyage', 2, 'voyage.jpg', 'voyage'),
(27, 'Art / Culture', 2, 'culture.jpg', 'art-culture'),
(28, 'Autre projet', 2, 'autre-projet.jpg', 'autre-projet'),
(29, 'Sortie / Restaurant', 3, 'restaurant.jpg', 'sortie-restaurant'),
(30, 'Autre dépense à plusieurs', 3, 'autre-depense.jpg', 'autre-depense');

-- --------------------------------------------------------

--
-- Structure de la table `pot_types`
--

CREATE TABLE `pot_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `slug` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pot_types`
--

INSERT INTO `pot_types` (`id`, `name`, `description`, `slug`) VALUES
(1, 'Un cadeau commun', 'Cotisez-vous pour un cadeau plus conséquent', 'cadeau'),
(2, 'Un projet personnel ou solidaire', 'Entraide, humanitaire, médical, animaux', 'projet'),
(3, 'Une dépense à plusieurs', 'Soirée, vacances, commande de café...', 'depense'),
(4, 'Mes caisses', 'Je retrouve ici, l\'ensemble des caisses que j\'ai conçues', 'mes-caisses');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `fname`, `name`, `photo`, `email`, `pass`, `phone`, `dob`) VALUES
(6, 'Emmanuel', 'Niasse', 'user.jpg', 'emmanuelniasse@gmail.com', '$2y$10$hAxH7OsKLMnZLzC8zkgFbuZSAmQu9YdvaPjlfTTA3aPS2if7gEXCC', '0782464332', '1996-10-01'),
(7, 'Myriam', 'O', 'user.jpg', 'myriam.ou@gmail.com', '$2y$10$YsJL5K8.uTXOL/FtDkyNfe8K.DwngFQzzrrbbPvMhz7EKw5.PFVK6', '0782464222', '1998-06-08'),
(12, 'Eliott', 'Ricardo', 'boite-cadeau.png', 'ricardo@gmail.com', '$2y$10$VD.7XqIfJGVFjxIsgV/co.sh0t1bb7cmCYSOLp0Y1qQgV2DimFpaO', '093939399', '2014-02-27'),
(13, 'Alain', 'Robert', 'alain-robert.jpg', 'alain@yahoo.com', '$2y$10$FUe1aFTboxoI0UwU6YC3se0o1Httt5VaE/DCkgXLKfn2elrOEGsR.', '0782464222', '1989-02-06'),
(14, 'rte', 'Ok', 'Capture d’écran 2022-06-15 à 20.25.11.png', 'test@yahoo.com', '$2y$10$2QsrTfndHAgTupc0U6DLD.LtVkIvVammb9pZg6wHLsa.RJplF1NXa', '0600000000', '1990-06-17'),
(15, 'Test', 'Essaie', NULL, 'pk@yahoo.com', '$2y$10$hKeQo8OVp0Erj7/guppxfONS0II0YQ7omFEHX07lB3aSWzVd4qQi6', '0929292929', '2000-06-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conceive`
--
ALTER TABLE `conceive`
  ADD PRIMARY KEY (`id_pots`,`id_user`),
  ADD KEY `conceive_users0_FK` (`id_user`);

--
-- Index pour la table `contribute`
--
ALTER TABLE `contribute`
  ADD PRIMARY KEY (`id_pots`,`id_contributor`,`date`) USING BTREE,
  ADD KEY `contribute_contributors0_FK` (`id_contributor`);

--
-- Index pour la table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`id_contributor`);

--
-- Index pour la table `pots`
--
ALTER TABLE `pots`
  ADD PRIMARY KEY (`id_pots`),
  ADD KEY `pots_pot_type_FK` (`id`);

--
-- Index pour la table `pot_categories`
--
ALTER TABLE `pot_categories`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `pot_cat_pot_type_FK` (`id`);

--
-- Index pour la table `pot_types`
--
ALTER TABLE `pot_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `id_contributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `pots`
--
ALTER TABLE `pots`
  MODIFY `id_pots` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pot_categories`
--
ALTER TABLE `pot_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `pot_types`
--
ALTER TABLE `pot_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conceive`
--
ALTER TABLE `conceive`
  ADD CONSTRAINT `conceive_pots_FK` FOREIGN KEY (`id_pots`) REFERENCES `pots` (`id_pots`),
  ADD CONSTRAINT `conceive_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `contribute`
--
ALTER TABLE `contribute`
  ADD CONSTRAINT `contribute_contributors0_FK` FOREIGN KEY (`id_contributor`) REFERENCES `contributors` (`id_contributor`),
  ADD CONSTRAINT `contribute_pots_FK` FOREIGN KEY (`id_pots`) REFERENCES `pots` (`id_pots`);

--
-- Contraintes pour la table `pots`
--
ALTER TABLE `pots`
  ADD CONSTRAINT `pots_pot_type_FK` FOREIGN KEY (`id`) REFERENCES `pot_types` (`id`);

--
-- Contraintes pour la table `pot_categories`
--
ALTER TABLE `pot_categories`
  ADD CONSTRAINT `pot_cat_pot_type_FK` FOREIGN KEY (`id`) REFERENCES `pot_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
