-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 26 Octobre 2016 à 07:44
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `social_network`
--
CREATE DATABASE IF NOT EXISTS `stack overflow` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stack overflow`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `FK_COMMENT_USER` (`user_id`),
  KEY `FK_POST_COMMENT` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `content`, `date_ajout`) VALUES
(1, 3, 54, 'Tsy rariny kosa eh', '2016-10-26 07:40:42');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `commentuser`
--
CREATE TABLE IF NOT EXISTS `commentuser` (
`user_id` int(11)
,`name` char(255)
,`comment_id` int(11)
,`post_id` int(11)
,`content` text
,`date_ajout` datetime
);
-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `date_demande` datetime DEFAULT NULL,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`friend_id`,`user_id_1`,`user_id_2`),
  KEY `FK_FRIENDS` (`user_id_1`),
  KEY `FK_FRIENDS2` (`user_id_2`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `friends`
--

INSERT INTO `friends` (`friend_id`, `user_id_1`, `user_id_2`, `date_demande`, `date_ajout`) VALUES
(1, 1, 2, '2016-10-04 00:00:00', '2016-10-08 00:00:00'),
(2, 3, 1, '2016-10-10 00:00:00', '2016-10-19 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `date_ajout`) VALUES
(1, 1, 'regreg', '2016-10-25 08:55:32'),
(2, 1, '2016-10-25 09:06:00', NULL),
(3, 1, NULL, '2016-10-25 09:06:13'),
(4, 1, 'Je suis la', '2016-10-25 09:08:29'),
(54, 3, 'Tsy hay oh', '2016-10-26 06:38:14');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `postusers`
--
CREATE TABLE IF NOT EXISTS `postusers` (
`user_id` int(11)
,`name` char(255)
,`post_id` int(11)
,`content` text
,`date_ajout` datetime
);
-- --------------------------------------------------------

--
-- Structure de la table `reaction`
--

CREATE TABLE IF NOT EXISTS `reaction` (
  `reaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reactionlist_id` int(11) NOT NULL,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`reaction_id`),
  KEY `FK_REACTIONICON` (`reactionlist_id`),
  KEY `FK_REACTION_POST` (`post_id`),
  KEY `FK_REACTION_USER` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reactionlist`
--

CREATE TABLE IF NOT EXISTS `reactionlist` (
  `reactionlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  PRIMARY KEY (`reactionlist_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT NULL,
  `mail` char(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mail`, `phone`, `password`) VALUES
(1, 'manaka', 'manaka@gmail.com', 123456, 'manaka'),
(2, 'Scott Tiger', 'tiger@gmail.com', 331452635, 'scott'),
(3, 'Toavina Ralambosoa', 'toavina@gmail.com', 332565478, 'toavina');

-- --------------------------------------------------------

--
-- Structure de la vue `commentuser`
--
DROP TABLE IF EXISTS `commentuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `commentuser` AS select `users`.`user_id` AS `user_id`,`users`.`name` AS `name`,`comments`.`comment_id` AS `comment_id`,`comments`.`post_id` AS `post_id`,`comments`.`content` AS `content`,`comments`.`date_ajout` AS `date_ajout` from (`users` join `comments` on((`users`.`user_id` = `comments`.`user_id`)));

-- --------------------------------------------------------

--
-- Structure de la vue `postusers`
--
DROP TABLE IF EXISTS `postusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postusers` AS select `users`.`user_id` AS `user_id`,`users`.`name` AS `name`,`posts`.`post_id` AS `post_id`,`posts`.`content` AS `content`,`posts`.`date_ajout` AS `date_ajout`,`categorie` from (`posts` join `users` on((`users`.`user_id` = `posts`.`user_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
