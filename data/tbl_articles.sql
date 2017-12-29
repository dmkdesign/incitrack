-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2012 at 09:29 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gridbiddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `framecode` varchar(50) NOT NULL COMMENT 'the frame name customer will use to edit site',
  `content` varchar(3000) NOT NULL DEFAULT '' COMMENT 'the content, can include html markup',
  `framename` varchar(50) NOT NULL DEFAULT 'not defined',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '0-viewable, 1-meta, 2-text, 3-slideshow',
  PRIMARY KEY (`id`),
  UNIQUE KEY `framecode` (`framecode`,`framename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`id`, `framecode`, `content`, `framename`, `type`) VALUES
(8, 'metaTitle', 'Solar panel installation | Get the best deal on solar panels', 'Meta Tag Title', 1),
(9, 'metaDescription', 'Save up to 30% on solar installation when solar installers compete online \r\nfor your roof on Gridbid. Auction your roof today and get the best \r\ndeal!', 'Meta Tag Description', 1),
(10, 'metaKeywords', 'solar panels installation,solar installation, solar installers,commercial \r\nsolar,residential solar installation,California solar installers,solar \r\ninstallers in California,solar power systems,solar estimate, solar \r\nauction', 'Meta Tag Keywords', 1),
(11, 'roofH1', '<img src="images/home_title.png" alt="Get the best price for your roof!" />', 'roof Header 1', 0),
(12, 'roofH2', '<p style="margin-top:20px;margin-bottom:20px;font-size:16px;line-height:25px;">Save up to 30% on rooftop solar when solar installers compete for your roof on Gridbid</p>', 'roof Header 2', 0),
(13, 'roofAuctionButtonText', 'Auction Your Roof', 'Roof Landing Page Auction Button Text', 2),
(14, 'solarRedirectStatic', 'Are you a solar contractor?  ', 'Solar Redirect Static Text', 2),
(15, 'solarRedirectLink', 'Get exclusive solar leads<br />', 'Solar Redirect Link', 2),
(16, 'roofCaption1', 'Find the right installer, fast', 'Roof Page Caption 1', 2),
(17, 'roofCaption2', 'Auction any size of project', 'Roof Page Caption 1', 2),
(18, 'roofCaption3', 'Guarantee your best deal', 'Roof Page Caption 3', 2),
(19, 'roofCaption4', 'Compare bids side-by-side', 'Roof Page Caption 4', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
