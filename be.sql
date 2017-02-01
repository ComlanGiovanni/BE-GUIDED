-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Février 2017 à 08:05
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `be`
--

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id_offer` int(11) NOT NULL,
  `name_offer` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `place_offer` text NOT NULL,
  `dispo_offer` text NOT NULL,
  `description` text,
  `date_publication` date NOT NULL,
  `date_modification` date DEFAULT NULL,
  `price` double NOT NULL,
  `img_offer` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offers`
--

INSERT INTO `offers` (`id_offer`, `name_offer`, `city`, `place_offer`, `dispo_offer`, `description`, `date_publication`, `date_modification`, `price`, `img_offer`, `id_user`) VALUES
(1, 'test offer', 'paris', '32 rue de General Leclerc', 'jeudi 3H', 'une offre de test', '2017-01-25', '2017-01-25', 34, NULL, 4),
(2, 'trez', 'tyyyyyyyy', 'eryuuhh', 'trtrtrtrtr', 'hghjkjlm', '2017-01-25', '2017-01-25', 22.98, NULL, 4),
(3, 'trez', 'tyyyyyyyy', 'eryuuhh', 'trtrtrtrtr', 'hghjkjlm', '2017-01-25', '2017-01-25', 22.98, NULL, 4),
(4, 'offre 1', 'Paris', 'Tour Eiffel', 'Lundi-Vendredi 12H-15H', 'Une trÃ¨s bonne offre', '2017-01-25', '2017-01-25', 263.21, NULL, 4),
(5, 'zer', 'ze', 'ze', 'erzrr', 'zer', '2017-01-25', '2017-01-25', 999.08, NULL, 4),
(6, 'a', 'a', 'a', 'A', 'a', '2017-01-25', '2017-01-25', 2, NULL, 4),
(7, 'a', 'a', 'a', 'A', 'a', '2017-01-25', '2017-01-25', 2, NULL, 4),
(8, 'a', 'a', 'a', 'A', 'a', '2017-01-25', '2017-01-25', 2, NULL, 4),
(9, 'a', 'a', 'a', 'A', 'a', '2017-01-25', '2017-01-25', 2, NULL, 4),
(10, 'bbb', 'bb', 'bbb', 'bbbb', 'bbb', '2017-01-25', '2017-01-25', 444.02, NULL, 4),
(11, 'az', 'a', 'aaa', 'aaaa', 'az', '2017-01-25', '2017-01-25', 23, '01.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `password`, `email`) VALUES
(1, 'bb', 'bb', '$5$rounds=2000$salt$NKHGvOrAAmPnWHhBfySD0.QnePZQRJyZ7UoO/w4MnZ.', 'blabla@gmail.com'),
(2, 'testp', 'testabdelp', '$5$rounds=2000$salt$DfAHPBvzjTJkEfeW01pNi1z.jBPsv5yqCIFgffthG89', 'test@test.fr'),
(3, 'aaa', 'aaa', '$5$rounds=2000$salt$vgmgp9z46tp0y/RKkoYVa2K4sXJjt1iwe37HjazBcLB', 'aa@nb'),
(4, 'er', 're', '$5$rounds=2000$salt$MJUFuMx2FRUDeOKgHmRsCH59mXrk3ze9KSohC.zNStB', 're@re.re'),
(5, 'abdel', 'abdel', '$5$rounds=2000$salt$Tp40nMYbeK1YSSNqrv7n.RVKGct.8v6bORxRPNjwkH9', 'abdel.abdel@abdel.abdel'),
(6, 'red', 'rzz', '$5$rounds=2000$salt$CxAUKpnVVICFMMEY5OIKHoiIeGqTJyeOQyr2D8CKiD3', 't@j.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id_offer`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
