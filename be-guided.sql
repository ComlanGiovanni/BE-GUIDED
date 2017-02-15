-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Février 2017 à 14:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
  `date_comment` date NOT NULL,
  `date_modif_comment` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `msg_comment`, `date_comment`, `date_modif_comment`, `id_user`, `id_offer`) VALUES
(1, 'Ce produit est excellent', '2017-02-15', NULL, 1, 1),
(2, 'encore ', '2017-02-15', '2017-02-15', 1, 2);

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
(1, 'RE', 23332, '13 rue de tert', '0687496388', '  anglais espagnol      ', '    literature    ', NULL, 1);

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
  `date_publication` date NOT NULL,
  `date_modification` date DEFAULT NULL,
  `id_guide` int(11) DEFAULT NULL,
  `id_planning` int(11) DEFAULT NULL,
  `id_note` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offers`
--

INSERT INTO `offers` (`id_offer`, `name_offer`, `city_offer`, `postal_code_offer`, `place_offer`, `price_offer`, `description`, `img_offer`, `date_publication`, `date_modification`, `id_guide`, `id_planning`, `id_note`, `duration`) VALUES
(1, 'a', 'a', 1, 'a', 0.04, 'a', NULL, '2017-02-08', '2017-02-08', 1, NULL, NULL, NULL),
(2, 'test2', 'londres', 4555, '12 street blabla', 55.6, NULL, NULL, '2017-02-15', NULL, 1, NULL, NULL, NULL);

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
  `certificate` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `password`, `email`, `img_profil`, `birthday_date`, `id_guide`, `certificate`) VALUES
(1, 'T1', 't1', '$5$rounds=2000$salt$lhuw.ir8WwXA2z2dL1g5yy3EE5A9RT5pfEbosBeFYSD', 't@t.t', NULL, NULL, NULL, NULL),
(2, 'aze', 'aze', '$5$rounds=2000$salt$r2fKA3boRWXafQRCZODAb6IJTQ7DY6y/8oOu5tr4Vg/', 'aze@az.az', NULL, NULL, NULL, NULL),
(3, 'laurent', 'panek', '$5$rounds=2000$salt$nXENdXA8cybE7hPmIjpGIzweHp.XNv90c1MGDu4Qqt3', 'laurent.panek@ynov.com', NULL, NULL, NULL, 0);

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
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `guide`
--
ALTER TABLE `guide`
  MODIFY `id_guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
