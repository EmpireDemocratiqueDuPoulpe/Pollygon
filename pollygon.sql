-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 mai 2020 à 13:32
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
-- Structure de la table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
CREATE TABLE IF NOT EXISTS `surveys` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `survey` text NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `owner_id`, `survey`) VALUES
(8, 1, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:1:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(6, 1, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:4:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:1;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:2;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:3;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(7, 1, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:11:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:1;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:2;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:3;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:4;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:5;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:6;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:7;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:8;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:9;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:10;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(9, 1, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:2:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:1;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(10, 1, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:3:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:1;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:2;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(11, 2, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:1:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}'),
(12, 6, 'O:6:\"Survey\":4:{s:13:\"\0Survey\0title\";s:15:\"Nouveau sondage\";s:20:\"\0Survey\0creationDate\";s:10:\"15/05/2020\";s:20:\"\0Survey\0membersCount\";i:0;s:21:\"\0Survey\0questionArray\";a:9:{i:0;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:1;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:2;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:3;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:4;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:5;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:6;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:7;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}i:8;O:13:\"QuestionInput\":1:{s:8:\"\0*\0title\";s:17:\"Nouvelle question\";}}}');

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
(3, 'Maximiliana', '292582@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$cWlYb09WTDcxZXVGZGE2Yg$oxuEe3tjZOaACWuwcLBZdxrhopUC66BXPxgVnQgC1jE', 'Femme', '2020-08-05', 'BTN', 'Retraité'),
(6, 'Guillaumine', '291493@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$M2ZYMzRnWFdkcG0xUFUzQw$y2pNp2lixyMBCSK0lRcqs2kfb1mhLgHwp1QHm3CHC48', 'Femme', '1934-08-10', 'DEU', 'Retraité');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
