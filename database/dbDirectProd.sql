-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 17 mai 2022 à 08:19
-- Version du serveur : 10.3.32-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbDirectProd`
--
CREATE DATABASE IF NOT EXISTS `dbDirectProd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbDirectProd`;

-- --------------------------------------------------------

--
-- Structure de la table `ADVERTISEMENT`
--

CREATE TABLE `ADVERTISEMENT` (
  `idAdvertisement` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `isOrganic` tinyint(4) NOT NULL,
  `isValid` tinyint(4) DEFAULT 0,
  `USER_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PICTURE`
--

CREATE TABLE `PICTURE` (
  `idPicture` int(11) NOT NULL,
  `path` varchar(45) NOT NULL,
  `ADVERTISEMENT_idAdvertisement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `RATE`
--

CREATE TABLE `RATE` (
  `idUser` int(11) NOT NULL,
  `idAdvertisement` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `idUser` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(45) DEFAULT 'Anonyme',
  `city` varchar(45) NOT NULL,
  `canton` varchar(45) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `isAdmin` tinyint(4) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADVERTISEMENT`
--
ALTER TABLE `ADVERTISEMENT`
  ADD PRIMARY KEY (`idAdvertisement`),
  ADD KEY `fk_ADVERTISEMENT_USER_idx` (`USER_idUser`);

--
-- Index pour la table `PICTURE`
--
ALTER TABLE `PICTURE`
  ADD PRIMARY KEY (`idPicture`),
  ADD KEY `fk_PICTURE_ADVERTISEMENT1_idx` (`ADVERTISEMENT_idAdvertisement`);

--
-- Index pour la table `RATE`
--
ALTER TABLE `RATE`
  ADD PRIMARY KEY (`idUser`,`idAdvertisement`),
  ADD KEY `fk_USER_has_ADVERTISEMENT_ADVERTISEMENT1_idx` (`idAdvertisement`),
  ADD KEY `fk_USER_has_ADVERTISEMENT_USER1_idx` (`idUser`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADVERTISEMENT`
--
ALTER TABLE `ADVERTISEMENT`
  MODIFY `idAdvertisement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `PICTURE`
--
ALTER TABLE `PICTURE`
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ADVERTISEMENT`
--
ALTER TABLE `ADVERTISEMENT`
  ADD CONSTRAINT `fk_ADVERTISEMENT_USER` FOREIGN KEY (`USER_idUser`) REFERENCES `USER` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PICTURE`
--
ALTER TABLE `PICTURE`
  ADD CONSTRAINT `fk_PICTURE_ADVERTISEMENT1` FOREIGN KEY (`ADVERTISEMENT_idAdvertisement`) REFERENCES `ADVERTISEMENT` (`idAdvertisement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `RATE`
--
ALTER TABLE `RATE`
  ADD CONSTRAINT `fk_USER_has_ADVERTISEMENT_ADVERTISEMENT1` FOREIGN KEY (`idAdvertisement`) REFERENCES `ADVERTISEMENT` (`idAdvertisement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_has_ADVERTISEMENT_USER1` FOREIGN KEY (`idUser`) REFERENCES `USER` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
