-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Juin 2017 à 10:13
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `fonds`
--

CREATE TABLE `fonds` (
  `NumVer` int(11) NOT NULL,
  `MontantCotisation` varchar(255) NOT NULL DEFAULT '0',
  `MontantContribution` varchar(255) DEFAULT '0',
  `Date` datetime DEFAULT NULL,
  `Id` int(11) NOT NULL,
  `numCarteBancaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonds`
--

INSERT INTO `fonds` (`NumVer`, `MontantCotisation`, `MontantContribution`, `Date`, `Id`, `numCarteBancaire`) VALUES
(14, '100', '1000', '2017-06-16 08:53:56', 59, '1010101010'),
(17, '100', '1000', '2017-06-16 09:57:07', 65, '1010101010'),
(18, '0', '40000', '2017-06-16 10:54:13', 59, '1010101010');

-- --------------------------------------------------------

--
-- Structure de la table `laureats`
--

CREATE TABLE `laureats` (
  `Id` int(11) NOT NULL,
  `carteNatio` varchar(7) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Diplome` varchar(255) NOT NULL,
  `datePromDoctorat` varchar(5) NOT NULL,
  `datePromIngenieur` varchar(5) NOT NULL,
  `datePromMaster` varchar(5) NOT NULL,
  `Fonction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `laureats`
--

INSERT INTO `laureats` (`Id`, `carteNatio`, `Nom`, `Prenom`, `Adresse`, `Diplome`, `datePromDoctorat`, `datePromIngenieur`, `datePromMaster`, `Fonction`) VALUES
(59, '123456', 'El Mekki', 'Rachid', 'Hay tassahoul rue NÂ°6 ', 'Doctorant, Ingenieur', '2007', '2011', '', 'Administration'),
(65, 'w402326', 'Berrada', 'Zineb', 'NÂ°71 Lotissement Amani Legnanet Settat', 'Ingenieur', '', '2016', '', 'Administration');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fonds`
--
ALTER TABLE `fonds`
  ADD PRIMARY KEY (`NumVer`),
  ADD KEY `Id` (`Id`);

--
-- Index pour la table `laureats`
--
ALTER TABLE `laureats`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `carteNatio` (`carteNatio`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fonds`
--
ALTER TABLE `fonds`
  MODIFY `NumVer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `laureats`
--
ALTER TABLE `laureats`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fonds`
--
ALTER TABLE `fonds`
  ADD CONSTRAINT `fonds_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `laureats` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
