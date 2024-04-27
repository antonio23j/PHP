-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `level` enum('superadmin','admin') DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS clients (
  id_client int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) DEFAULT NULL,
  email varchar(150) DEFAULT NULL,
  phone varchar(150) DEFAULT NULL,
  training_plan enum('basic','premium','super') DEFAULT NULL,
  message text DEFAULT NULL,
  start_date datetime NOT NULL DEFAULT  CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_client)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS plans (
  id_plan int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) DEFAULT NULL,
  description text DEFAULT NULL,
  price decimal(10,2) NOT NULL,
  PRIMARY KEY (id_plan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS instructors (
  id_instructor int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) DEFAULT NULL,
  years_of_experience int(11) DEFAULT NULL,
  phone_number varchar(20) DEFAULT NULL,
  PRIMARY KEY (id_instructor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS classes (
  id_class int(11) NOT NULL AUTO_INCREMENT,
  name varchar(150) DEFAULT NULL,
  instructor_id int(11) DEFAULT NULL,
  time_duration varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_class),
  FOREIGN KEY (instructor_id) REFERENCES instructors (id_instructor) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- Dumping data for table palestra.clients: ~4 rows (approximately)
INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `training_plan`, `message`, `start_date`) VALUES
	(1, 'fbgb', 'hoteloda2020@gmail.com', '+355695302933', 'premium', 'fgbfgb', '2022-06-20 00:00:00'),
	(2, 'fbgb', 'hoteloda2020@gmail.com', '+355695302933', 'premium', 'fgbfgb', '2022-06-20 00:00:00'),
	(3, 'fbgb', 'hoteloda2020@gmail.com', '+355695302933', 'premium', 'fgbfgb', '2022-06-20 00:00:00'),
	(4, 'fbgb', 'hoteloda2020@gmail.com', '+355695302933', 'premium', 'fgbfgb', '2022-06-20 00:00:00');


-- Dumping data for table palestra.admins: ~2 rows (approximately)
INSERT INTO `admins` (`id`, `username`, `email`, `password`, `level`) VALUES
	(1, 'admin', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'superadmin'),
	(2, 'elton', 'eltonshpuza@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
