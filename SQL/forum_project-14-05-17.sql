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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.main_menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `main_menu` DISABLE KEYS */;
INSERT INTO `main_menu` (`id`, `text`, `href`, `role`) VALUES
	(9, 'Home', 'home', 1),
	(10, 'Categories', 'categories', 1),
	(11, 'Create Topic', 'create_topic', 1),
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
  `auther` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Ghost',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.posts: ~13 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `text`, `auther`, `date`) VALUES
	(1, 'if ( your mom >= boat  ) return boat; ', 'johan', '2014-03-28 21:34:23'),
	(2, 'THANK YOU', 'Ghost', '2014-03-28 21:36:07'),
	(3, 'You need to make love, You need to feel the script ', 'johan', '2014-03-29 11:25:59'),
	(4, 'I can feel it!', 'Ghost', '2014-03-29 11:29:31'),
	(5, 'Kidding..', 'johan', '2014-03-29 11:29:39'),
	(6, 'asdasd', 'samuel', '2014-05-15 09:01:06'),
	(7, 'asd', 'samuel', '2014-05-15 09:01:21'),
	(8, 'zxc', 'samuel', '2014-05-15 09:01:51'),
	(9, 'asd', 'samuel', '2014-05-15 09:03:58'),
	(10, 'asdasdasd', 'samuel', '2014-05-15 09:10:55'),
	(11, 'asdasdasd', 'samuel', '2014-05-15 09:12:48'),
	(12, 'asdasda', 'samuel', '2014-05-15 09:15:14'),
	(13, 'Yuo are whalecum!', 'johan', '2014-05-15 18:30:25');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table forum_project.posts_x_topic
DROP TABLE IF EXISTS `posts_x_topic`;
CREATE TABLE IF NOT EXISTS `posts_x_topic` (
  `pid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.posts_x_topic: ~10 rows (approximately)
/*!40000 ALTER TABLE `posts_x_topic` DISABLE KEYS */;
INSERT INTO `posts_x_topic` (`pid`, `tid`) VALUES
	(1, 1),
	(2, 1),
	(3, 4),
	(4, 4),
	(5, 4),
	(6, 4),
	(7, 4),
	(8, 4),
	(12, 4),
	(13, 1);
/*!40000 ALTER TABLE `posts_x_topic` ENABLE KEYS */;


-- Dumping structure for table forum_project.topics
DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auther` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Ghost',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.topics: ~6 rows (approximately)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `title`, `text`, `created`, `auther`) VALUES
	(1, 'How to make a boat in php', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ornare pharetra commodo. Nam mi nunc, consectetur consequat turpis sit amet, tempor mattis ante. Aliquam eleifend dui et purus pulvinar condimentum. Etiam tempor lorem eu orci varius, ut gravida nunc consequat. Etiam molestie bibendum urna. Duis a suscipit tellus. Proin dapibus mauris nunc, nec commodo enim imperdiet a. Donec luctus urna lacinia faucibus tempor. Praesent bibendum vulputate tellus, non malesuada nunc vehicula vitae. Phasellus id blandit magna. Quisque tincidunt enim pretium, consectetur metus eu, faucibus tortor. Sed lectus metus, tristique pulvinar volutpat in, molestie in tortor.\r\n', '2014-03-28 18:13:16', 'Ghost'),
	(2, 'I can make boat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nunc quam, tempus ut diam laoreet, euismod eleifend quam. Fusce vitae varius diam. Duis enim orci, sodales id mattis ac, aliquet in risus. In elementum odio nibh, vel ullamcorper tellus interdum sit amet. Maecenas a viverra purus, at luctus arcu. Proin a rhoncus ligula. Sed bibendum euismod ante gravida eleifend. Donec scelerisque lectus eu lectus gravida, non rhoncus massa congue.', '2014-03-28 18:14:16', 'Ghost'),
	(3, 'Boat is good for you', 'Pellentesque lacinia venenatis mauris, nec ultrices justo consectetur et. Curabitur nec odio ut arcu iaculis fermentum ac sed leo. Mauris quis egestas lorem. Quisque fermentum tristique eros, vel interdum sapien consequat sit amet. Vestibulum aliquet purus sed euismod consequat. Curabitur a faucibus tellus, viverra adipiscing erat. Integer laoreet vulputate purus.', '2014-03-28 18:14:40', 'Ghost'),
	(4, 'How to cook dinner with javascript', '\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2014-03-28 18:18:01', 'Ghost'),
	(5, 'ASP', 'Run you fool', '2014-03-28 18:19:12', 'Ghost'),
	(6, 'MongoDB help!', 'I have no clue what im doing', '2014-03-29 11:33:18', 'Ghost');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;


-- Dumping structure for table forum_project.topics_x_category
DROP TABLE IF EXISTS `topics_x_category`;
CREATE TABLE IF NOT EXISTS `topics_x_category` (
  `cid` int(10) unsigned NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  UNIQUE KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.topics_x_category: ~6 rows (approximately)
/*!40000 ALTER TABLE `topics_x_category` DISABLE KEYS */;
INSERT INTO `topics_x_category` (`cid`, `tid`) VALUES
	(2, 1),
	(2, 2),
	(2, 3),
	(1, 4),
	(3, 5),
	(1, 6);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table forum_project.user: ~12 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `role`, `joined`, `password`) VALUES
	(3, 'johan', 'johanjobbfalk@hotmail.com', 9, '2014-03-27 21:00:30', 'falk'),
	(4, 'asd', 'asd@asd.com', 2, '2014-03-28 12:07:29', 'asd'),
	(5, 'Ghost', 'ghost.ghost.com', 2, '2014-03-28 21:37:34', 'ghost'),
	(6, 'nicole', 'asd@asd.asd', 2, '2014-03-30 22:28:04', 'asd'),
	(7, 'asdasd', 'aaw@ad.coma', 2, '2014-04-03 08:17:03', 'awdawd'),
	(8, 'asdasdaa', 'aaw@ad.comaaw', 2, '2014-04-03 08:21:00', 'awdawd'),
	(9, 'qweasd', 'qweasd@qweasd.qweasd', 2, '2014-04-03 11:45:02', 'qweasd'),
	(10, 'johansund', 'johansund@bmail.bom', 2, '2014-04-03 12:56:26', 'sund'),
	(11, 'test4', 'test4@test4.com', 2, '2014-05-13 13:49:15', 'test4'),
	(12, 'pp', 'pp@pp.com', 2, '2014-05-14 06:17:17', 'pp'),
	(13, 'test', 'test@test.com', 2, '2014-05-14 06:55:45', 'test'),
	(14, 'asdqwe', 'asdqwe@asdqwe.asdqwe', 2, '2014-05-14 11:44:16', 'asdqwe');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
