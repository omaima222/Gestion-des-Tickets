-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 nov. 2022 à 14:18
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_des_tickets`
--

-- --------------------------------------------------------


-- Dumping database structure for gestion_des_tickets
CREATE DATABASE IF NOT EXISTS `gestion_des_tickets`;
USE `gestion_des_tickets`;




-- Dumping structure for table gestion_des_tickets.stadium
CREATE TABLE IF NOT EXISTS `stadium` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `capacity` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion_des_tickets.stadium: ~8 rows (approximately)
INSERT INTO `stadium` (`id`, `name`, `capacity`, `address`, `image`) VALUES
	(14, 'Al Bayt Stadium', 68, 'Al Khor City 35km north of Doha', 'Image22121332026.jpg'),
	(15, 'Lusail Stadium', 88, 'Lusail City 20km north of central Doha', 'Image22121340162.jpg'),
	(16, 'Ahmad Bin Ali Stadium', 45, 'Umm Al Afaei 20km west of central Doha', 'Image2212136913.jpg'),
	(17, 'Al Janoub Stadium', 44, 'Al Wakrah 22km south of central Doha', 'Image22121333557.jpeg'),
	(18, 'Al Thumama Stadium', 44, 'Al Thumama Stadium 12km south of central Doha', 'Image22121371128.jpg'),
	(19, 'Education City Stadium', 44, 'Al Rayyan 7km north west of central Doha', 'Image22121360153.jpg'),
	(20, 'Khalifa International Stadium', 45, 'Aspire 5km west of central Doha', 'Image22121312275.jpg'),
	(21, 'Stadium 974', 44, 'Ras Abu Aboud 10km east of central Doha', 'Image22121382818.jpg');




-- Dumping structure for table gestion_des_tickets.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion_des_tickets.team: ~32 rows (approximately)
INSERT INTO `team` (`id`, `name`, `logo`, `image`, `groupe`) VALUES
	(9, 'Netherlands', 'Image22121335108.png', 'Image2212139126.jpg', 'A'),
	(10, 'Qatar', 'Image22121341218.png', 'Image22121346887.jpg', 'A'),
	(11, 'Senegal', 'Image22121355119.png', 'Image22121348150.jpeg', 'A'),
	(12, 'Ecuador', 'Image22121384406.png', 'Image22121334199.jpg', 'A'),
	(13, 'England', 'Image22121320309.png', 'Image22121384377.jpg', 'B'),
	(14, 'Iran', 'Image2212132837.png', 'Image22121393197.jpg', 'B'),
	(15, 'United States', 'Image2212134999.png', 'Image22121365051.jpg', 'B'),
	(16, 'Wales', 'Image22121327790.png', 'Image22121336793.jpg', 'B'),
	(17, 'Argentina', 'Image22121313788.png', 'Image22121341807.jpg', 'C'),
	(18, 'Mexico', 'Image22121345707.png', 'Image22121313731.jpg', 'C'),
	(19, 'Poland', 'Image22121390269.png', 'Image22121355315.jpg', 'C'),
	(20, 'Saudi Arabia', 'Image22121376450.png', 'Image22121390439.jpg', 'C'),
	(21, 'Australia', 'Image22121346607.png', 'Image22121375010.jpg', 'D'),
	(22, 'Denmark', 'Image22121347814.png', 'Image22121387369.jpg', 'D'),
	(23, 'France', 'Image22121339510.png', 'Image22121356089.jpg', 'D'),
	(24, 'Tunisia', 'Image22121388698.png', 'Image2212134441.jpg', 'D'),
	(25, 'Costa Rica', 'Image22121315731.png', 'Image22121332260.jpg', 'E'),
	(26, 'Germany', 'Image2212131701.png', 'Image22121349682.jpg', 'E'),
	(27, 'Japan', 'Image22121332056.png', 'Image22121394276.jpg', 'E'),
	(28, 'Spain', 'Image22121384765.png', 'Image22121372848.jpg', 'E'),
	(29, 'Belgium', 'Image22121356491.png', 'Image22121382551.jpg', 'F'),
	(30, 'Canada', 'Image22121465107.png', 'Image22121432088.jpg', 'F'),
	(31, 'Croatia', 'Image22121473992.png', 'Image22121491338.jpg', 'F'),
	(32, 'Morocco', 'Image22121497620.png', 'Image22121488637.jpg', 'F'),
	(33, 'Brazil', 'Image22121444199.png', 'Image22121480427.jpg', 'G'),
	(34, 'Cameroon', 'Image22121443719.png', 'Image22121499450.jpg', 'G'),
	(35, 'Serbia', 'Image22121494262.png', 'Image22121430689.jpg', 'G'),
	(36, 'Switzerland', 'Image2212143544.png', 'Image22121471704.jpg', 'G'),
	(37, 'Ghana', 'Image2212149626.png', 'Image22121477006.jpeg', 'H'),
	(38, 'Korea Republic', 'Image22121411053.png', 'Image22121450943.jpg', 'H'),
	(39, 'Portugal', 'Image22121412207.png', 'Image22121487922.jpg', 'H'),
	(40, 'Uruguay', 'Image22121498867.png', 'Image2212147306.jpg', 'H');




-- Dumping structure for table gestion_des_tickets.matchs
CREATE TABLE IF NOT EXISTS `matchs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team1_id` int NOT NULL,
  `team2_id` int NOT NULL,
  `stadium_id` int NOT NULL,
  `ticket_price` double NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stadium_id` (`stadium_id`),
  KEY `team1_id` (`team1_id`),
  KEY `team2_id` (`team2_id`),
  CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`stadium_id`) REFERENCES `stadium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`team1_id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`team2_id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion_des_tickets.matchs: ~3 rows (approximately)
INSERT INTO `matchs` (`id`, `team1_id`, `team2_id`, `stadium_id`, `ticket_price`, `date`, `description`, `image`) VALUES
	(37, 32, 39, 18, 1000, '2022-12-16 12:00:00', 'SUIIIUUUUUUUUUUUUUUUUUUUUUUU', 'Image22121423540.jpg'),
	(38, 27, 31, 17, 835, '2023-10-28 22:43:00', 'Accusantium corporis', 'Image22121472508.jpg'),
	(39, 13, 23, 14, 2000, '2022-12-31 17:09:00', 'Goaaaaaaaaaaaaaaaaaaaaaaaaal', 'Image22121473020.jpg');




-- Dumping structure for table gestion_des_tickets.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion_des_tickets.user: ~5 rows (approximately)
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `is_admin`, `image`) VALUES
	(3, 'Hicham', 'El Arfaouy', 'hicham@gmail.com', '12345678', 0, 'user.png'),
	(5, 'SQUAD', 'SQUAD', 'squad@gmail.com', '12345678', 1, 'user.png');





-- Dumping structure for table gestion_des_tickets.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `spectator_id` int NOT NULL,
  `match_id` int NOT NULL,
  `quantity` int NOT NULL,
  `reservation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`),
  KEY `spectator_id` (`spectator_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matchs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`spectator_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion_des_tickets.reservations: ~0 rows (approximately)
INSERT INTO `reservations` (`id`, `spectator_id`, `match_id`, `quantity`, `reservation_date`) VALUES
	(34, 3, 39, 1, '2022-12-14 16:21:11');




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
