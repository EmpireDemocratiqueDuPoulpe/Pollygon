-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 mai 2020 à 14:13
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `gender`, `birthdate`, `country`, `job`) VALUES
(1, 'Quechua', '293287@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$d1VZY1AuZnZINWpXdnQ5NQ$TvCA3dD0eEQ5SkGuL9ExVx9aqmRtd7HUdMGbdoP6sBU', 'Homme', '2019-03-13', 'BRA', 'Indépendant'),
(2, 'Louana', '292440@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$SC93SzZHcS5wSW0ub3FCZA$QYNCh3RZnvMW/B1/Y96lRG/CtuSvo8pXzCVPoErjoto', 'Femme', '2020-05-23', 'ETH', 'Sans emploi'),
(3, 'Maximiliana', '292582@supinfo.com', '$argon2id$v=19$m=65536,t=4,p=1$cWlYb09WTDcxZXVGZGE2Yg$oxuEe3tjZOaACWuwcLBZdxrhopUC66BXPxgVnQgC1jE', 'Femme', '2020-08-05', 'BTN', 'Retraité');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
