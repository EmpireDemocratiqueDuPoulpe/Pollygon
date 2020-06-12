-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 juin 2020 à 11:30
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pollygon`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`),
  KEY `survey_id` (`survey_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `survey_id`, `owner_id`, `value`) VALUES
(53, 95, 55, 1, 'vfdvsvcx'),
(54, 96, 55, 1, 'cxvcxvx'),
(55, 95, 55, 3, 'dsfsdfsdfsdfsdf'),
(56, 96, 55, 3, 'sdfsfsfsdfsfsd'),
(57, 95, 55, 6, 'sfsdfsdfsdfs'),
(58, 96, 55, 6, 'fsfsdfsdfsdf');

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Nouvelle option',
  PRIMARY KEY (`choice_id`),
  KEY `question_id` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `title`) VALUES
(1, 121, 'Abc'),
(2, 121, 'def'),
(3, 121, 'ghi'),
(4, 121, 'jhl'),
(5, 121, 'mno'),
(6, 121, 'pqr'),
(7, 121, 'stu'),
(8, 121, 'vwx'),
(9, 121, 'yz'),
(10, 122, 'Nouvelle option'),
(11, 122, 'Nouvelle option'),
(12, 122, 'Nouvelle option'),
(13, 122, 'Nouvelle option'),
(14, 122, 'Nouvelle option'),
(15, 122, 'Nouvelle option'),
(16, 123, 'Nouvelle option'),
(17, 123, 'Nouvelle option'),
(18, 123, 'Nouvelle option'),
(19, 123, 'Nouvelle option'),
(20, 123, 'Nouvelle option'),
(21, 123, 'Nouvelle option'),
(22, 125, 'Nouvelle option'),
(23, 125, 'Nouvelle option'),
(24, 125, 'Nouvelle option'),
(25, 125, 'Nouvelle option'),
(26, 125, 'Nouvelle option'),
(27, 125, 'Nouvelle option'),
(28, 125, 'Nouvelle option'),
(29, 125, 'Nouvelle option'),
(30, 127, 'Nouvelle option'),
(31, 127, 'qsdq'),
(32, 127, 'qdssqdqs'),
(33, 127, 'qsdsqdqsd'),
(34, 127, 'Nouvelle option'),
(35, 130, 'Nouvelle option'),
(42, 133, 'ui xd'),
(37, 130, 'Nouvelle option'),
(41, 133, 'ui'),
(39, 130, 'Nouvelle option'),
(40, 130, 'Nouvelle option'),
(43, 133, 'je c pa'),
(44, 133, 'haha fast car go vrooom'),
(45, 135, 'dfgfdg'),
(46, 135, 'Nouvelledgfdfgdfg option'),
(47, 135, 'Nouvelledfgdfg option'),
(48, 135, 'fg'),
(70, 145, 'Nouvelle option'),
(69, 145, 'Nouvelle option'),
(68, 144, 'Nouvelle option'),
(67, 144, 'Nouvelle option'),
(66, 141, 'Nouvelle option'),
(65, 141, 'Nouvelle option'),
(64, 141, 'Nouvelle option'),
(63, 141, 'Nouvelle option'),
(62, 141, 'Nouvelle option'),
(61, 139, 'Nouvelle option'),
(60, 139, 'Nouvelle option'),
(71, 145, 'Nouvelle option'),
(72, 146, 'Nouvelle option'),
(73, 146, 'Nouvelle option'),
(74, 146, 'Nouvelle option'),
(75, 146, 'Nouvelle option'),
(76, 146, 'Nouvelle option'),
(77, 148, 'a'),
(78, 148, 'b'),
(79, 148, 'c'),
(80, 148, 'Nouvelle option'),
(81, 150, 'Nouvelle option'),
(82, 150, 'Nouvelle option'),
(83, 151, 'Nouvelle option'),
(84, 151, 'Nouvelle option'),
(85, 152, 'a'),
(86, 152, 'b'),
(87, 152, 'c'),
(88, 152, 'd'),
(89, 155, 'Nouvelle option'),
(90, 155, 'Nouvelle option'),
(94, 159, 'Nouvelle option'),
(92, 156, 'Nouvelle option'),
(93, 156, 'Nouvelle option'),
(95, 159, 'Nouvelle option'),
(96, 160, 'Nouvelle option'),
(97, 160, 'Nouvelle option'),
(98, 161, 'Nouvelle option'),
(99, 161, 'a'),
(100, 161, 'a'),
(101, 161, 'b'),
(102, 179, 'Nouvelle option'),
(103, 179, 'Nouvelle option'),
(104, 180, 'Nouvelle option'),
(105, 180, 'Nouvelle option'),
(106, 185, 'UHU'),
(107, 185, 'Scotch'),
(108, 185, '3M'),
(109, 185, 'Cléopâtre'),
(110, 185, 'Marque distributeur'),
(111, 185, 'Autres'),
(112, 186, 'Le bâton'),
(113, 186, 'Le pot'),
(114, 186, 'Le pinceau'),
(115, 186, 'La patafix'),
(116, 186, 'Ton CACA');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Nouvelle question',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question_id`, `survey_id`, `title`, `type`) VALUES
(95, 55, 'Nouvelle question', 'input'),
(96, 55, 'Nouvelle question', 'input');

-- --------------------------------------------------------

--
-- Structure de la table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
CREATE TABLE IF NOT EXISTS `surveys` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Nouveau sondage',
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `members` int(11) NOT NULL DEFAULT 0,
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`survey_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `owner_id`, `title`, `creation_date`, `members`, `finished`) VALUES
(55, 1, 'Nouveau sondage', '1970-01-01', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `gender`, `birthdate`, `country`, `job`) VALUES
(1, 'Quechua', '293287@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$QXdpZ0NSL2xTcGhDZHlYaw$dLelL6y20hZHAyvlrSA5tgjoSbYg21O7GCzjh9uwyJE', 'Homme', '2019-03-29', 'PER', 'Indépendant'),
(2, 'Louana', '292440@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$SC93SzZHcS5wSW0ub3FCZA$QYNCh3RZnvMW/B1/Y96lRG/CtuSvo8pXzCVPoErjoto', 'Femme', '2020-05-23', 'ETH', 'Sans emploi'),
(3, 'Maximiliana', '292582@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$cWlYb09WTDcxZXVGZGE2Yg$oxuEe3tjZOaACWuwcLBZdxrhopUC66BXPxgVnQgC1jE', 'Femme', '2020-08-05', 'DEU', 'Retraité'),
(6, 'Guillaumine', '291493@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$M2ZYMzRnWFdkcG0xUFUzQw$y2pNp2lixyMBCSK0lRcqs2kfb1mhLgHwp1QHm3CHC48', 'Femme', '1934-08-10', 'DEU', 'Retraité');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
