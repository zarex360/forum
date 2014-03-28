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


-- Dumping structure for table forum_project.category_menu
DROP TABLE IF EXISTS `category_menu`;
CREATE TABLE IF NOT EXISTS `category_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `href` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.category_menu: ~3 rows (approximately)
/*!40000 ALTER TABLE `category_menu` DISABLE KEYS */;
INSERT INTO `category_menu` (`id`, `name`, `description`, `href`) VALUES
	(1, 'Javascript', 'If you like javascript and want to help or get help please tune in', 'javascript'),
	(2, 'Php', 'Its a language for web applications ', 'php'),
	(3, 'ASP', 'Don\'t go there', 'asp');
/*!40000 ALTER TABLE `category_menu` ENABLE KEYS */;


-- Dumping structure for table forum_project.main_menu
DROP TABLE IF EXISTS `main_menu`;
CREATE TABLE IF NOT EXISTS `main_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(50) COLLATE utf8_bin NOT NULL,
  `href` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.main_menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `main_menu` DISABLE KEYS */;
INSERT INTO `main_menu` (`id`, `text`, `href`, `role`) VALUES
	(9, 'Home', 'home', 1),
	(10, 'Categories', 'categories', 1),
	(11, 'Create Post', 'create_post', 1),
	(12, 'Profile', 'profile', 2),
	(13, 'Admin/config', 'admin_config', 9),
	(14, 'Logout', 'logout', 2),
	(15, 'Login', 'login', 0);
/*!40000 ALTER TABLE `main_menu` ENABLE KEYS */;


-- Dumping structure for table forum_project.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table forum_project.topics
DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.topics: ~5 rows (approximately)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `title`, `text`, `created`) VALUES
	(1, 'How to make a boat in php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ornare pharetra commodo. Nam mi nunc, consectetur consequat turpis sit amet, tempor mattis ante. Aliquam eleifend dui et purus pulvinar condimentum. Etiam tempor lorem eu orci varius, ut gravida nunc consequat. Etiam molestie bibendum urna. Duis a suscipit tellus. Proin dapibus mauris nunc, nec commodo enim imperdiet a. Donec luctus urna lacinia faucibus tempor. Praesent bibendum vulputate tellus, non malesuada nunc vehicula vitae. Phasellus id blandit magna. Quisque tincidunt enim pretium, consectetur metus eu, faucibus tortor. Sed lectus metus, tristique pulvinar volutpat in, molestie in tortor.\r\n', '2014-03-28 18:13:16'),
	(2, 'I can make boat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nunc quam, tempus ut diam laoreet, euismod eleifend quam. Fusce vitae varius diam. Duis enim orci, sodales id mattis ac, aliquet in risus. In elementum odio nibh, vel ullamcorper tellus interdum sit amet. Maecenas a viverra purus, at luctus arcu. Proin a rhoncus ligula. Sed bibendum euismod ante gravida eleifend. Donec scelerisque lectus eu lectus gravida, non rhoncus massa congue.', '2014-03-28 18:14:16'),
	(3, 'Boat is good for you', 'Pellentesque lacinia venenatis mauris, nec ultrices justo consectetur et. Curabitur nec odio ut arcu iaculis fermentum ac sed leo. Mauris quis egestas lorem. Quisque fermentum tristique eros, vel interdum sapien consequat sit amet. Vestibulum aliquet purus sed euismod consequat. Curabitur a faucibus tellus, viverra adipiscing erat. Integer laoreet vulputate purus.', '2014-03-28 18:14:40'),
	(4, 'How to cook dinner with javascript', '\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2014-03-28 18:18:01'),
	(5, 'ASP', 'Run you fools', '2014-03-28 18:19:12');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;


-- Dumping structure for table forum_project.topics_x_category
DROP TABLE IF EXISTS `topics_x_category`;
CREATE TABLE IF NOT EXISTS `topics_x_category` (
  `cid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.topics_x_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `topics_x_category` DISABLE KEYS */;
INSERT INTO `topics_x_category` (`cid`, `tid`) VALUES
	(2, 1),
	(2, 2),
	(2, 3),
	(1, 4),
	(3, 5);
/*!40000 ALTER TABLE `topics_x_category` ENABLE KEYS */;


-- Dumping structure for table forum_project.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `role` int(1) NOT NULL DEFAULT '2',
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `role`, `joined`, `password`) VALUES
	(2, 'test', 'test@test.com', 2, '2014-03-27 20:40:17', 'test'),
	(3, 'johan', 'johanjobbfalk@hotmail.com', 9, '2014-03-27 21:00:30', 'falk'),
	(4, 'asd', 'asd@asd.com', 2, '2014-03-28 12:07:29', 'asd');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
