-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cloud_db
CREATE DATABASE IF NOT EXISTS `cloud_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cloud_db`;

-- Dumping structure for table cloud_db.contact_admin
CREATE TABLE IF NOT EXISTS `contact_admin` (
  `ca_id` int(10) NOT NULL AUTO_INCREMENT,
  `ca_fname` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ca_password` varchar(50) DEFAULT NULL,
  `ca_email` varchar(50) DEFAULT NULL,
  `ca_lname` varchar(50) DEFAULT NULL,
  `ca_phone_num` bigint(20) DEFAULT NULL,
  `verification_status` int(1) DEFAULT 0,
  `verification_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ca_id`),
  UNIQUE KEY `ca_email` (`ca_email`),
  UNIQUE KEY `ca_phone_num` (`ca_phone_num`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cloud_db.contact_admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `contact_admin` DISABLE KEYS */;
INSERT INTO `contact_admin` (`ca_id`, `ca_fname`, `created_at`, `updated_at`, `ca_password`, `ca_email`, `ca_lname`, `ca_phone_num`, `verification_status`, `verification_key`) VALUES
	(2, 'sharvari', '2021-06-01 17:59:11', '2021-06-01 18:14:45', '@virat', 'sharvaritendolkar36@gmail.com', 'tendolkar', 7666779248, 1, '52ab8703fc23dead2377ef3613b04214'),
	(13, 'sharvari', '2021-06-01 19:19:43', '2021-06-01 19:20:57', 'lalit123', 'sharvari.tendolkar24@gmail.com', 'tendolkar', 9423944754, 1, '5505ce2a9baf8d0de6e719413e8f3a47');
/*!40000 ALTER TABLE `contact_admin` ENABLE KEYS */;

-- Dumping structure for table cloud_db.contact_login_track
CREATE TABLE IF NOT EXISTS `contact_login_track` (
  `co_Id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `IpAddress` varbinary(100) DEFAULT NULL,
  `TryTime` int(10) DEFAULT NULL,
  PRIMARY KEY (`co_Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cloud_db.contact_login_track: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_login_track` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_login_track` ENABLE KEYS */;

-- Dumping structure for table cloud_db.contact_table
CREATE TABLE IF NOT EXISTS `contact_table` (
  `ct_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ct_fname` varchar(50) NOT NULL,
  `ct_lname` varchar(50) NOT NULL,
  `ct_phone_num` varchar(100) DEFAULT NULL,
  `ct_email` varchar(50) DEFAULT NULL,
  `ct_address` varchar(255) NOT NULL,
  `ct_status` bit(1) NOT NULL DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ct_company` varchar(100) DEFAULT NULL,
  `ct_nickname` varchar(50) DEFAULT NULL,
  `ca_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`ct_id`),
  KEY `ca_id` (`ca_id`),
  CONSTRAINT `ca_id` FOREIGN KEY (`ca_id`) REFERENCES `contact_admin` (`ca_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cloud_db.contact_table: ~5 rows (approximately)
/*!40000 ALTER TABLE `contact_table` DISABLE KEYS */;
INSERT INTO `contact_table` (`ct_id`, `ct_fname`, `ct_lname`, `ct_phone_num`, `ct_email`, `ct_address`, `ct_status`, `created_at`, `update_at`, `ct_company`, `ct_nickname`, `ca_id`) VALUES
	(1, 'Amey', 'Tendolkar', '123456789', 'amey123@gmail.com', 'sawantwadi', b'1', '2021-05-31 16:45:15', '2021-06-02 01:13:31', '', 'amu', 2),
	(17, 'sarita', 'kharat', '2345678912', 'sarita@gmail.com', '', b'1', '2021-06-01 12:34:51', '2021-06-01 19:26:22', '', '', 13),
	(18, 'Narayan', 'tendolkar', '02363271834', 'narayan@gmail.com', '', b'1', '2021-06-02 00:49:29', '2021-06-02 09:59:11', '', '', 2),
	(19, 'Vidya', 'mane', '1234567890', 'vidya@gmail.com', '', b'1', '2021-06-02 10:15:48', '2021-06-02 10:15:48', '', '', 2),
	(20, 'sharvari', '', '24', 'sradhha@gmail.com', '', b'1', '2021-06-02 10:44:48', '2021-06-02 10:44:48', '', '', 2),
	(21, 'dfsdfds', '', '1234567890', 'dsfsdfsd@gmail.com', '', b'1', '2021-06-02 10:46:34', '2021-06-02 10:46:34', '', '', 2);
/*!40000 ALTER TABLE `contact_table` ENABLE KEYS */;

-- Dumping structure for table cloud_db.share_link
CREATE TABLE IF NOT EXISTS `share_link` (
  `sl_id` int(10) NOT NULL AUTO_INCREMENT,
  `sl_token` varchar(500) NOT NULL,
  `ct_id` int(10) DEFAULT NULL,
  `exp_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cloud_db.share_link: ~8 rows (approximately)
/*!40000 ALTER TABLE `share_link` DISABLE KEYS */;
INSERT INTO `share_link` (`sl_id`, `sl_token`, `ct_id`, `exp_time`) VALUES
	(17, '67bfba7cf52b382c671f5cdffb204f7f', 1, 1622573730),
	(18, 'c5393c994a5f9e889852ffd4ccec75e5', 1, 1622575482),
	(19, 'a4c91c0200737f1621af053f49e658ee', 1, 1622609454),
	(20, '0cef411e368794027de20ecf3b526225', 1, 1622609465),
	(21, '86887c119cc80bafa1b1afbc7c4a1f2e', 18, 1622609605),
	(22, '75fb1c9e8973afa2ebd6fe6d8b6b95c9', 1, 1622609711),
	(23, '10d9407fa4cd4d10430fbd1eb81852b4', 1, 1622609963),
	(24, 'efab7f34b05eec0bffc162912d38f6c6', 1, 1622610768);
/*!40000 ALTER TABLE `share_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
