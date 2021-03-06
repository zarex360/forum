-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for forum_project
DROP DATABASE IF EXISTS `forum_project`;
CREATE DATABASE IF NOT EXISTS `forum_project` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forum_project`;


-- Dumping structure for table forum_project.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `href` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `href` (`href`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `href`) VALUES
	(1, 'Javascript', 'This is programming language', 'javascript'),
	(2, 'Php', 'This is also a programming languare', 'php'),
	(3, 'Asp', 'Asp...', 'asp');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table forum_project.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin NOT NULL,
  `author` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.comments: ~8 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `text`, `author`, `date`, `tid`) VALUES
	(1, 'asdasd', 'johan', '2014-06-02 12:55:04', 2),
	(2, 'Get a life', 'johan', '2014-06-02 12:57:43', 9),
	(3, 'jhb', 'johan', '2014-06-03 06:49:38', 6),
	(4, 'okej', 'johan', '2014-06-03 06:50:27', 11),
	(5, 'johan', 'johan', '2014-06-03 07:55:31', 5),
	(6, 'Jasså det tycker du!? DU är inte klok', 'johan', '2014-06-05 08:05:24', 5),
	(7, 'Hej', 'redovisa', '2014-06-05 08:06:36', 5),
	(8, 'Du skriver bra ser jag, vilken tönt...', 'johan', '2014-06-05 08:09:38', 12),
	(9, 'SPAM', 'johan', '2014-06-05 09:45:49', 10);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table forum_project.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `href` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `role` int(10) unsigned NOT NULL DEFAULT '1',
  `weight` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.menus: ~10 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `type`, `name`, `href`, `role`, `weight`) VALUES
	(1, 'main', 'Home', 'home', 1, 0),
	(2, 'main', 'Categories', 'categories', 1, 1),
	(3, 'main', 'Login', 'login', 0, 10),
	(4, 'main', 'Profile', 'profile', 2, 3),
	(5, 'main', 'Configurations', 'admin/category', 9, 9),
	(6, 'main', 'Logout', 'logout', 2, 10),
	(13, 'admin', 'Categories', 'admin/category', 9, 0),
	(14, 'admin', 'Topics', 'admin/topic', 9, 0),
	(16, 'main', 'Create Topic', 'create_topic', 2, 2),
	(17, 'admin', 'Users', 'admin/users', 9, 0);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table forum_project.topics
DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(50) COLLATE utf8_bin NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.topics: ~12 rows (approximately)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `title`, `text`, `date`, `author`, `cid`) VALUES
	(1, 'Help me make a boat!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ligula nec quam rhoncus scelerisque. Nam ut metus neque. Mauris auctor lectus vitae enim tristique mattis. In justo odio, rutrum ac nibh quis, consequat accumsan lacus. Aliquam adipiscing metus eu nulla pellentesque, non tempor mauris gravida. Donec tincidunt, risus at congue eleifend, orci lacus gravida dolor, et iaculis risus magna id lorem. Praesent eu tortor nec massa imperdiet ornare. Phasellus sagittis lorem et porttitor euismod. Duis vestibulum sodales scelerisque. Duis varius leo suscipit neque mollis placerat. Nulla bibendum eu erat sit amet consequat. Donec tempor sapien nec euismod rutrum. Proin est libero, dapibus vitae commodo id, tincidunt sed metus. Aliquam sed lacinia diam. Donec aliquet, metus id adipiscing tincidunt, risus metus posuere magna, ut commodo enim orci sed mauris. In euismod pellentesque odio sit amet fermentum.', '2014-05-17 17:38:38', 'johan', 2),
	(2, 'PHP array_shift()...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ligula nec quam rhoncus scelerisque. Nam ut metus neque. Mauris auctor lectus vitae enim tristique mattis. In justo odio, rutrum ac nibh quis, consequat accumsan lacus. Aliquam adipiscing metus eu nulla pellentesque, non tempor mauris gravida. Donec tincidunt, risus at congue eleifend, orci lacus gravida dolor, et iaculis risus magna id lorem. Praesent eu tortor nec massa imperdiet ornare. Phasellus sagittis lorem et porttitor euismod. Duis vestibulum sodales scelerisque. Duis varius leo suscipit neque mollis placerat. Nulla bibendum eu erat sit amet consequat. Donec tempor sapien nec euismod rutrum. Proin est libero, dapibus vitae commodo id, tincidunt sed metus. Aliquam sed lacinia diam. Donec aliquet, metus id adipiscing tincidunt, risus metus posuere magna, ut commodo enim orci sed mauris. In euismod pellentesque odio sit amet fermentum.', '2014-05-17 17:39:24', 'johan', 2),
	(3, 'Javascript i like', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed ligula nec quam rhoncus scelerisque. Nam ut metus neque. Mauris auctor lectus vitae enim tristique mattis. In justo odio, rutrum ac nibh quis, consequat accumsan lacus. Aliquam adipiscing metus eu nulla pellentesque, non tempor mauris gravida. Donec tincidunt, risus at congue eleifend, orci lacus gravida dolor, et iaculis risus magna id lorem. Praesent eu tortor nec massa imperdiet ornare. Phasellus sagittis lorem et porttitor euismod. Duis vestibulum sodales scelerisque. Duis varius leo suscipit neque mollis placerat. Nulla bibendum eu erat sit amet consequat. Donec tempor sapien nec euismod rutrum. Proin est libero, dapibus vitae commodo id, tincidunt sed metus. Aliquam sed lacinia diam. Donec aliquet, metus id adipiscing tincidunt, risus metus posuere magna, ut commodo enim orci sed mauris. In euismod pellentesque odio sit amet fermentum.', '2014-05-17 17:39:58', 'johan', 1),
	(7, 'My own topic', 'asdknasldnasldkn', '2014-06-02 12:26:06', 'johan', 1),
	(10, 'Find email with regex', 'Does anyone have a good pattern to find emails with regex? \n\n/thx Johan', '2014-06-02 12:57:00', 'johan', 2),
	(11, 'oioihoihihoih', 'vuhbuyuvuv uyuyuyv uv uvvv yuy txtexrc', '2014-06-03 06:50:08', 'johan', 3),
	(12, 'Redovisa forum', 'Deta är ett redovsing!', '2014-06-05 08:07:23', 'redovisa', 1);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;


-- Dumping structure for table forum_project.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role` int(10) unsigned NOT NULL DEFAULT '2',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `role`, `date`, `password`) VALUES
	(1, 'johan', 'johanjobbfalk@hotmail.com', 9, '2014-05-17 14:16:36', 'falk'),
	(2, 'test', 'test@test.com', 2, '2014-05-19 17:23:43', 'test'),
	(3, 'banan', 'banan@banan.se', 2, '2014-05-26 18:00:13', 'banan'),
	(4, 'redovisa', 'redovisa@gmail.com', 2, '2014-06-05 08:06:05', 'banan');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
