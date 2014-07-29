-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 04 Septembre 2013 à 10:38
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `whiskyonline`
--

-- --------------------------------------------------------

--
-- Structure de la table `raph`
--

CREATE TABLE IF NOT EXISTS `raph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `1` varchar(255) NOT NULL,
  `2` varchar(255) NOT NULL,
  `3` varchar(255) NOT NULL,
  `5` varchar(255) NOT NULL,
  `6` date NOT NULL,
  `7` varchar(255) NOT NULL,
  `8` varchar(255) NOT NULL,
  `9` varchar(255) NOT NULL,
  `10` float(11,0) NOT NULL,
  `24` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `raph`
--

INSERT INTO `raph` (`id`, `1`, `2`, `3`, `5`, `6`, `7`, `8`, `9`, `10`, `24`) VALUES
(1, 'cardhu', 'ecosse', 'bourgogne', 'cardhu', '2013-07-24', 'Possédé', 'regis', 'superbon', 43, ''),
(3, 'cognac', 'france', 'bourgogne', 'Maître pochetron', '2013-07-23', 'Possédé', 'regis', 'mega bon', 35, ''),
(4, 'Williamson', 'Écosse', 'Highlands', 'Hercule Poivrot', '2013-08-14', 'Possédé', 'Piqué au Leclerc', 'Bu en 2 gorgées', 0, ''),
(5, 'Jus de pomme', 'France', 'Larzac', 'Prisunic', '0000-00-00', 'Me fait de l''œil', 'Je ne l''ai pas encore', 'Il a l''air si bon', 2, ''),
(6, 'Vittel', 'France', 'Auvergne', 'Carrefour', '0000-00-00', 'Veux pas', 'Elle reste où elle est', 'Ça a l''air trop naze', 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `raph_categ`
--

CREATE TABLE IF NOT EXISTS `raph_categ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catnom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fiche_priv` tinyint(1) NOT NULL,
  `fiche_pub` tinyint(1) NOT NULL,
  `liste_priv` tinyint(1) NOT NULL,
  `liste_pub` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `raph_categ`
--

INSERT INTO `raph_categ` (`id`, `catnom`, `fiche_priv`, `fiche_pub`, `liste_priv`, `liste_pub`) VALUES
(1, 'Nom', 1, 1, 1, 1),
(2, 'Pays', 1, 1, 1, 1),
(3, 'Région', 1, 1, 1, 1),
(5, 'Société', 1, 1, 1, 1),
(6, 'Date d''acquisition', 1, 1, 1, 1),
(7, 'État', 1, 1, 1, 1),
(8, 'Provenance', 1, 1, 1, 1),
(9, 'Commentaires', 1, 1, 1, 1),
(10, 'Prix', 1, 1, 1, 1),
(24, 'Couleur', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `raph_conf`
--

CREATE TABLE IF NOT EXISTS `raph_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `raph_conf`
--

INSERT INTO `raph_conf` (`id`, `pseudo`, `passwd`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
