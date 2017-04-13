-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 13 Avril 2017 à 21:33
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `be-guided`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `msg_comment` text NOT NULL,
  `date_comment` datetime NOT NULL,
  `date_modif_comment` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `guide`
--

CREATE TABLE `guide` (
  `id_guide` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `num_mobile` varchar(14) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `other_info` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `guide`
--

INSERT INTO `guide` (`id_guide`, `city`, `postal_code`, `address`, `num_mobile`, `languages`, `hobbies`, `other_info`, `id_user`) VALUES
(1, 'RE', 23332, '13 rue de tert', '0687496388', '', '', '', 1),
(2, 'REvolia', 23332, '13 rue de tert', '0687496344', 'anglais, franÃ§ais, espagnol', 'sport', 'rien du tout', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `value_note` int(11) DEFAULT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id_offer` int(11) NOT NULL,
  `name_offer` varchar(255) NOT NULL,
  `city_offer` varchar(255) NOT NULL,
  `postal_code_offer` int(11) NOT NULL,
  `place_offer` varchar(255) NOT NULL,
  `price_offer` double NOT NULL,
  `description` text,
  `img_offer` varchar(255) DEFAULT NULL,
  `date_publication` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  `id_guide` int(11) DEFAULT NULL,
  `id_planning` int(11) DEFAULT NULL,
  `id_note` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offers`
--

INSERT INTO `offers` (`id_offer`, `name_offer`, `city_offer`, `postal_code_offer`, `place_offer`, `price_offer`, `description`, `img_offer`, `date_publication`, `date_modification`, `id_guide`, `id_planning`, `id_note`, `duration`) VALUES
(1, 'offre a paris', 'PARIS', 75020, '23 rue de paris', 31.42, 'une offre de malade', '', '2017-03-08 00:00:00', '2017-03-08 00:00:00', 1, NULL, NULL, NULL),
(2, 'offre 1', 'offre 1', 11111, 'offre 1', 23332, 'offre 1', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(3, 'offre 2', 'offre 2', 22222, 'offre 2', 22, 'offre 2', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(4, 'offre 3', 'offre 3', 33333, 'offre 3', 33, 'offre 3', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(5, 'offre 4', 'offre 4', 44444, 'offre 4', 44, 'offre 4', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(6, 'offre 5', 'offre 5', 55555, 'offre 5', 5, 'offre 5', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(7, 'offre 6', 'offre 6', 66666, 'offre 6', 6, 'offre 6', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(8, 'offre 7', 'offre 7', 77777, 'offre 7', 7, 'offre 7', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(9, 'offre 8', 'offre 8', 88888, 'offre 8', 8, 'offre 8', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(10, 'offre 9', 'offre 9', 99999, 'offre 9', 9, 'offre 9', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(11, 'offre 10', 'offre 10', 10000, 'offre 10', 10, 'offre 10', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(12, 'offre 11', 'offre 11', 11111, 'offre 11', 11, 'offre 11', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(13, 'offre 12', 'offre 12', 12121, 'offre 12', 12, 'offre 12', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(14, 'offre 13', 'offre 13', 13131, 'offre 13', 13, 'offre 13', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(15, 'offre 14', 'offre 14', 14141, 'offre 14', 14, 'offre 14', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(16, 'offre 15', 'offre 15', 15151, 'offre 15', 15, 'offre 15', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(17, 'offre 16', 'offre 16', 16161, 'offre 16', 16, 'offre 16', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(18, 'offre 17', 'offre 17', 17171, 'offre 17', 17, 'offre 17', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(19, 'offre 18', 'offre 18', 18181, 'offre 18', 18, 'offre 18', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(20, 'offre 19', 'offre 19', 19191, 'offre 19', 19, 'offre 19', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(21, 'offre 20', 'offre 20', 20202, 'offre 20', 20, 'offre 20', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, NULL, NULL, NULL),
(22, 'offer 21', 'offer 21', 21211, 'offer 21', 21, 'offer 21', '', '2017-03-15 00:00:00', '2017-03-15 00:00:00', 2, NULL, NULL, NULL),
(23, 'offer 22', 'offer 22', 22222, 'offer 22', 22, 'offer 22', '', '2017-03-15 12:39:49', '2017-03-15 12:39:49', 2, NULL, NULL, NULL),
(24, 'offre testbimg', 'offre testbimg', 22222, 'offre testbimg', 20.23, 'offre testbimg', '', '2017-03-15 15:54:57', '2017-03-15 15:54:57', 2, NULL, NULL, NULL),
(25, 'offre testbimg3', 'offre testbimg', 33333, 'offre testbimg', 94000, 'offre testbimg', '', '2017-03-15 15:57:07', '2017-03-15 15:57:07', 2, NULL, NULL, NULL),
(26, 'testIMg', 'testIMg', 33333, 'testIMg', 33, 'testIMg', '', '2017-03-15 16:03:14', '2017-03-15 16:03:14', 2, NULL, NULL, NULL),
(27, 'testIMg4', 'testIMg', 44444, 'offre 4', 33, 'testIMg5', '', '2017-03-15 16:05:45', '2017-03-15 16:05:45', 2, NULL, NULL, NULL),
(28, 'tt', 'tt', 44444, 'tt', 44, 'tt', 'youtube-money-1.jpg', '2017-03-15 16:14:14', '2017-03-15 16:14:14', 2, NULL, NULL, NULL),
(29, 'tttt', 'tt', 44444, 'tt', 45, 'ttt', 'youtube-money-1.jpg', '2017-03-15 16:17:43', '2017-03-15 16:17:43', 2, NULL, NULL, NULL),
(30, 'tfty', 'ugvu', 44444, 'nbgv', 21, 'kuku', 'youtube-money-1.jpg', '2017-03-15 16:21:35', '2017-03-15 16:21:35', 2, NULL, NULL, NULL),
(31, 'bh', 'bh', 11111, 'bh', 23, 'bh', 'youtube-money-1.jpg', '2017-03-15 16:28:19', '2017-03-15 16:28:19', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `own`
--

CREATE TABLE `own` (
  `id_offer` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL,
  `begin_year` varchar(25) DEFAULT NULL,
  `end_year` varchar(25) DEFAULT NULL,
  `begin_month` varchar(25) DEFAULT NULL,
  `end_month` varchar(25) DEFAULT NULL,
  `begin_day` varchar(25) DEFAULT NULL,
  `end_day` varchar(25) DEFAULT NULL,
  `begin_hour` varchar(25) DEFAULT NULL,
  `end_hour` varchar(25) DEFAULT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `name_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img_profil` varchar(255) DEFAULT NULL,
  `birthday_date` date DEFAULT NULL,
  `id_guide` int(11) DEFAULT NULL,
  `certificate` tinyint(1) DEFAULT '0',
  `confirmation_token` varchar(255) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `password`, `email`, `img_profil`, `birthday_date`, `id_guide`, `certificate`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`) VALUES
(1, 't', 't', '$2y$10$piKvXAhyDzLixPS8fjtLKuX3lDwtFNk/e.RhqWWn7l5fUtX2wYdjO', 'tt@tt.fr', NULL, NULL, NULL, 0, NULL, '2017-03-08 00:00:00', NULL, NULL),
(2, 'root', 'admin', '$2y$10$fs.rI/4VVOGSQcel2bcPO.pk75PzCB0NX7zOKpryMeG3C1a1Sk0l6', 'root@root.root', 'WORLDS-2017_NO_LOGO.jpg', '2017-01-03', NULL, 0, NULL, '2017-03-15 00:00:00', NULL, NULL),
(4, 'io', 'oi', '$2y$10$RKVSfCI11F5FmQKzvMwZn.nB087hBvahWQhnVIyIOGq545Xl6ZCLm', 'i@i.i', NULL, '2018-01-01', NULL, 0, NULL, '2017-03-15 12:45:49', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_Commentaires_id_user` (`id_user`),
  ADD KEY `FK_Commentaires_id_offer` (`id_offer`);

--
-- Index pour la table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id_guide`),
  ADD KEY `FK_Guide_id_user` (`id_user`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `FK_Note_id_offer` (`id_offer`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id_offer`),
  ADD KEY `FK_Offers_id_guide` (`id_guide`),
  ADD KEY `FK_Offers_id_planning` (`id_planning`),
  ADD KEY `FK_Offers_id_note` (`id_note`);

--
-- Index pour la table `own`
--
ALTER TABLE `own`
  ADD PRIMARY KEY (`id_offer`,`id_tag`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_planning`),
  ADD KEY `FK_Planning_id_offer` (`id_offer`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_Users_id_guide` (`id_guide`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `guide`
--
ALTER TABLE `guide`
  MODIFY `id_guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_Commentaires_id_offer` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id_offer`),
  ADD CONSTRAINT `FK_Commentaires_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `FK_Guide_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_Note_id_offer` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id_offer`);

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `FK_Offers_id_guide` FOREIGN KEY (`id_guide`) REFERENCES `guide` (`id_guide`),
  ADD CONSTRAINT `FK_Offers_id_note` FOREIGN KEY (`id_note`) REFERENCES `note` (`id_note`),
  ADD CONSTRAINT `FK_Offers_id_planning` FOREIGN KEY (`id_planning`) REFERENCES `planning` (`id_planning`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `FK_Planning_id_offer` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id_offer`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Users_id_guide` FOREIGN KEY (`id_guide`) REFERENCES `guide` (`id_guide`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
