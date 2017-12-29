-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2012 at 08:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dinkydon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL COMMENT 'filename of graphic',
  `category` int(11) NOT NULL DEFAULT '-1' COMMENT '0-site, 1-collection,',
  `associate_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'id of record in specified category',
  `alt_text` varchar(256) NOT NULL DEFAULT '' COMMENT 'the text to go in the alt attribute of image',
  `caption` varchar(512) NOT NULL DEFAULT '' COMMENT 'A caption if desired.  Can be used for photoslider etc.',
  `isMain` int(3) NOT NULL DEFAULT '0' COMMENT '0-false, 1-true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Uploaded images can be associated with articles and/or whatever else.' AUTO_INCREMENT=24 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
