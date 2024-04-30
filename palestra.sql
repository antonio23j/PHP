
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('superadmin','admin') DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS clients (
  id_client int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  phone varchar(255) DEFAULT NULL,
  training_plan enum('basic','premium','super') DEFAULT NULL,
  password VARCHAR(255) DEFAULT NULL,
  start_date datetime NOT NULL DEFAULT  CURRENT_TIMESTAMP(),
  PRIMARY KEY (id_client)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS plans (
  id_plan int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  price decimal(10,2) NOT NULL,
  PRIMARY KEY (id_plan)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS instructors (
  id_instructor int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  years_of_experience int(11) DEFAULT NULL,
  phone_number varchar(20) DEFAULT NULL,
  PRIMARY KEY (id_instructor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS classes (
  id_class int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  instructor_id int(11) DEFAULT NULL,
  time_duration varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_class),
  FOREIGN KEY (instructor_id) REFERENCES instructors (id_instructor) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


