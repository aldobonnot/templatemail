-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Novembre 2016 à 00:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pperso`
--

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE IF NOT EXISTS `liens` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `idRub` int(8) NOT NULL,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `affL` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  UNIQUE KEY `id_liens_2` (`id`),
  KEY `id_liens` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `liens`
--

INSERT INTO `liens` (`id`, `idRub`, `nom`, `url`, `affL`) VALUES
(1, 1, 'Parisenphotos', 'http://www.parisenphotos.com/', 'Y'),
(2, 1, 'Tksom', 'http://www.shota-tksom.com', 'Y'),
(5, 2, 'Google', 'https://www.google.fr', 'Y'),
(6, 2, 'Météo France', 'http://www.meteofrance.com/previsions-meteo-france/metropole', 'Y'),
(7, 2, 'FDJ', 'https://www.fdj.fr/accueil/', 'Y'),
(8, 2, 'Pole Emploi', 'https://candidat.pole-emploi.fr/candidat/espacepersonnel/authentification', 'Y'),
(9, 3, 'W3SCHOOL', 'http://www.w3schools.com/', 'Y'),
(10, 3, 'Aston', 'http://www.parisenphotos.com/CMSAston/', 'Y'),
(11, 3, 'Couleurs HTML', 'http://html-color-codes.info/Codes-couleur-HTML/', 'Y'),
(14, 1, 'Bert', 'http://bert-the-madsilkscreamer.com/', 'Y'),
(15, 1, 'Dixon', 'http://www.dixon-securite.fr/', 'Y'),
(16, 1, 'Z-Workshop', 'http://www.z-workshop.fr/', 'Y'),
(17, 1, 'Mellino', 'http://mellino.fr/', 'Y'),
(18, 1, 'Cheminements-Solidaire', 'http://www.cheminements-solidaires.com/', 'Y'),
(19, 1, 'Guillemette Buffault', 'http://guillemette-buffault.com/', 'Y'),
(20, 1, '1+1 production', 'http://1plus1production.com/', 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statut` enum('adminNT','other') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `statut`) VALUES
(1, 'aldoNT', 'aldo393pp', 'adminNT');

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE IF NOT EXISTS `rubriques` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `aff` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `var_nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `rubriques`
--

INSERT INTO `rubriques` (`id`, `nom`, `aff`, `var_nom`) VALUES
(1, 'Sites', 'Y', 'sites'),
(2, 'Utilitaires', 'Y', 'utilitaires'),
(3, 'Liens utiles', 'Y', 'liens_utiles'),
(4, 'Gestion', 'Y', 'gestion'),
(9, 'Job', 'Y', ''),
(8, 'Actualités', 'Y', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
