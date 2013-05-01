-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2013 at 12:05 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '3', 'return isset($params["project"]) && $params["project"]->allowCurrentUser("admin");', 'N'),
('member', '4', 'return isset($params["project"]) && $params["project"]->allowCurrentUser("admin");', 'N;'),
('owner', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'admin', 'admin', 'admin'),
('member', 1, 'member', 'member', NULL),
('owner', 3, 'owner', 'owner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('owner', 'admin'),
('admin', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `issue_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_issue` (`issue_id`),
  KEY `fk_comment_owner` (`create_user_id`),
  KEY `fk_comment_update_user` (`update_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `issue_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'this is comment in issue 6, pleasse tell me why ?', 6, '2013-01-07 18:54:47', 3, '2013-01-07 18:54:47', 3),
(2, 'i live it', 6, '2013-01-07 18:58:16', 3, '2013-01-07 18:58:16', 3),
(3, 'this is comment in comment 7', 7, '2013-01-07 19:38:32', 3, '2013-01-07 19:38:32', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issue`
--

CREATE TABLE IF NOT EXISTS `tbl_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `project_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `requester_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_issue_project` (`project_id`),
  KEY `fk_issue_owner` (`owner_id`),
  KEY `fk_issue_requester` (`requester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_issue`
--

INSERT INTO `tbl_issue` (`id`, `name`, `description`, `project_id`, `type_id`, `status_id`, `owner_id`, `requester_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'I fell very bad', 'i very bad , dear sir', NULL, 0, 0, 1, 1, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(2, 'I try text process usually and i very bad', 'I love you so much', NULL, 1, 1, NULL, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(3, 'I miss you when i walking in the sun', 'the sunshine i love you very much', NULL, 0, 2, NULL, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(4, 'sfsfs', 'dfsdf', 1, 0, 2, NULL, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(6, 'test project 2', 'project 2', 2, 0, 1, NULL, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL),
(7, 'this is issue of admin', 'issue of admin', 1, 0, 1, NULL, NULL, '2013-01-07 13:38:11', 3, '2013-01-07 13:38:11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'Test project', 'I''m test project in Yii', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(2, 'new test', 'new test project', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(3, 'test', '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(4, 'This is project of admin', 'this is project of admin', '2013-01-07 13:36:50', 3, '2013-01-07 13:36:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_user_assignment`
--

CREATE TABLE IF NOT EXISTS `tbl_project_user_assignment` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `FK_user_project` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_project_user_assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_project_user_role` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`,`role`),
  KEY `user_id` (`user_id`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_project_user_role`
--

INSERT INTO `tbl_project_user_role` (`project_id`, `user_id`, `role`) VALUES
(1, 4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sys_message`
--

CREATE TABLE IF NOT EXISTS `tbl_sys_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sys_message`
--

INSERT INTO `tbl_sys_message` (`id`, `message`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 'hello user , i love my Yii ', '2013-01-12 14:16:02', 3, '2013-01-12 14:16:02', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `roles` varchar(255) NOT NULL DEFAULT 'anonymous',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `last_login_time`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `roles`) VALUES
(1, 'User One', 'test1@\r\nnotanaddress.com', '5a105e8b9d40e1329780d62ea2265d8a', NULL, NULL, NULL, NULL, NULL, ''),
(2, 'User Two', 'test2@notanaddress.\r\ncom', 'ad0234829205b9033196ba818f7a872b', NULL, NULL, NULL, NULL, NULL, ''),
(3, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '2013-01-04 17:21:14', 0, '2013-01-04 17:21:14', 0, 'admin'),
(4, 'member', 'member@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', '0000-00-00 00:00:00', '2013-01-07 14:35:09', 3, '2013-01-07 14:35:09', 3, 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `fk_comment_issue` FOREIGN KEY (`issue_id`) REFERENCES `tbl_issue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_owner` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `fk_comment_update_user` FOREIGN KEY (`update_user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_issue`
--
ALTER TABLE `tbl_issue`
  ADD CONSTRAINT `fk_issue_owner` FOREIGN KEY (`owner_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_issue_project` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_issue_requester` FOREIGN KEY (`requester_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_project_user_assignment`
--
ALTER TABLE `tbl_project_user_assignment`
  ADD CONSTRAINT `FK_project_user` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_project` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_project_user_role`
--
ALTER TABLE `tbl_project_user_role`
  ADD CONSTRAINT `tbl_project_user_role_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`),
  ADD CONSTRAINT `tbl_project_user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_project_user_role_ibfk_3` FOREIGN KEY (`role`) REFERENCES `authitem` (`name`);
