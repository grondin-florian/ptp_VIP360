SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Create user, the database and grant all privileges to him
--

CREATE USER 'ptp_vip360_db'@'localhost' IDENTIFIED BY 'Niv4870CEWp2DGHI';
GRANT USAGE ON *.* TO 'ptp_vip360_db'@'localhost' IDENTIFIED BY 'Niv4870CEWp2DGHI' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `ptp_vip360_db`;
GRANT ALL PRIVILEGES ON `ptp\_vip360\_db`.* TO 'ptp_vip360_db'@'localhost';

-- --------------------------------------------------------

--
-- Base de données :  `ptp_vip360_db`
--

USE `ptp_vip360_db`;

-- --------------------------------------------------------

--
-- Structure de la table `ptp_vip360_user`
--

CREATE TABLE IF NOT EXISTS `ptp_vip360_user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `position` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `ptp_vip360_user`
--

INSERT INTO `ptp_vip360_user` (`id`, `first_name`, `last_name`, `username`, `password`, `image`) VALUES
  (1, 'Admin', 'VIP360', 'administratorVIP360', '$2y$10$W6GbGwIgqe4oG1QC43e4iOtniPuNHaCFxPkWTHAhQO8Poe2iOUvR.', 'user.png'),
  (2, 'Technique', 'VIP360', 'techniqueVIP360', '$2y$10$bvoCMvNN7OfcPTA5jxQaiOYV/vda43Uhbl5wvC9d/hJJHVSKsMvAS', 'user.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
