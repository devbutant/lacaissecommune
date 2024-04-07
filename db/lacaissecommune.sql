-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
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
-- Structure de la table `contributors`
--

CREATE TABLE `contributors` (
  `id_contributor` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'logo-lcc.svg',
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12, 'Eliott', 'Ricardo', 'boite-cadeau.png', 'ricardo@gmail.com', '$2y$10$VD.7XqIfJGVFjxIsgV/co.sh0t1bb7cmCYSOLp0Y1qQgV2DimFpaO', '093939399', '2014-02-27'),
(13, 'Alain', 'Robert', 'alain-robert.jpg', 'alain@yahoo.com', '$2y$10$FUe1aFTboxoI0UwU6YC3se0o1Httt5VaE/DCkgXLKfn2elrOEGsR.', '0782464222', '1989-02-06'),

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
