-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2012 at 06:36 PM
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
-- Table structure for table `tbl_auctions`
--

CREATE TABLE IF NOT EXISTS `tbl_auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL COMMENT 'foreign_key from project table.  Not unique.',
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'the date the auction was created',
  `winningBid` int(11) NOT NULL COMMENT 'id of the winning bid.',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 is inactive, 1 is active',
  `auctionType` int(11) NOT NULL DEFAULT '0' COMMENT '0-blind, 1 - silent, 2-traditional',
  `duration` int(11) NOT NULL DEFAULT '720' COMMENT 'number of hours the auction is live for past the time_start',
  PRIMARY KEY (`id`),
  KEY `project` (`project_id`),
  KEY `winningbid` (`winningBid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table holds active and inactive auctions.' AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tbl_auctions`
--

INSERT INTO `tbl_auctions` (`id`, `project_id`, `time_start`, `winningBid`, `status`, `auctionType`, `duration`) VALUES
(2, 1, '2012-02-06 23:05:58', 0, 1, 0, 720),
(3, 2, '2012-02-06 23:11:11', 0, 1, 0, 720),
(4, 3, '2012-02-07 22:02:50', 0, 1, 0, 720),
(5, 4, '2012-02-10 18:58:55', 0, 1, 0, 720),
(6, 5, '2012-02-12 21:54:39', 0, 1, 0, 720),
(7, 6, '2012-02-13 04:04:45', 0, 1, 0, 720),
(8, 7, '2012-02-16 08:01:16', 0, 1, 0, 720),
(9, 8, '2012-02-16 17:03:39', 0, 1, 0, 720),
(10, 9, '2012-02-16 23:19:10', 0, 1, 0, 720),
(11, 10, '2012-02-17 02:05:33', 0, 1, 0, 720),
(12, 11, '2012-02-17 02:26:51', 0, 1, 0, 720),
(13, 12, '2012-02-17 02:37:31', 0, 1, 0, 720),
(14, 13, '2012-02-17 02:49:48', 0, 1, 0, 720),
(15, 14, '2012-02-17 22:35:33', 0, 1, 0, 720),
(16, 16, '2012-02-20 19:56:18', 0, 1, 0, 720),
(17, 18, '2012-02-21 08:22:18', 0, 1, 0, 720),
(18, 15, '2012-02-21 08:27:52', 0, 1, 0, 720),
(19, 19, '2012-02-21 08:30:39', 0, 1, 0, 720),
(20, 21, '2012-02-21 19:04:51', 0, 1, 0, 720),
(21, 22, '2012-02-22 20:08:49', 0, 1, 0, 720),
(22, 23, '2012-02-22 20:45:19', 0, 1, 0, 720),
(23, 24, '2012-02-22 21:50:31', 0, 1, 0, 720),
(24, 25, '2012-02-22 22:23:35', 0, 1, 0, 720),
(25, 26, '2012-02-23 01:16:39', 0, 1, 0, 720),
(26, 20, '2012-02-23 01:21:16', 0, 1, 0, 720),
(27, 27, '2012-02-23 08:23:39', 0, 1, 0, 720),
(28, 28, '2012-02-23 15:27:02', 0, 1, 0, 720),
(29, 17, '2012-02-23 16:10:18', 0, 1, 0, 720),
(30, 29, '2012-02-23 21:49:07', 0, 1, 0, 720),
(31, 30, '2012-02-23 22:17:24', 0, 1, 0, 720),
(32, 31, '2012-02-23 23:00:13', 0, 1, 0, 720),
(33, 32, '2012-02-23 23:20:47', 0, 1, 0, 720),
(34, 33, '2012-02-24 00:17:04', 0, 1, 0, 720),
(35, 34, '2012-02-24 00:53:35', 0, 1, 0, 720),
(36, 36, '2012-02-24 01:04:11', 0, 1, 0, 720),
(37, 37, '2012-02-24 01:09:05', 0, 1, 0, 720),
(38, 38, '2012-02-24 02:23:14', 0, 1, 0, 720),
(39, 41, '2012-02-24 06:50:35', 0, 1, 0, 720),
(40, 40, '2012-02-24 06:52:48', 0, 1, 0, 720),
(41, 46, '2012-02-25 01:56:16', 0, 1, 0, 720),
(42, 47, '2012-02-27 21:25:56', 0, 1, 0, 720),
(43, 49, '2012-02-29 04:09:07', 0, 1, 0, 720),
(44, 51, '2012-03-05 05:33:02', 0, 1, 0, 720),
(45, 53, '2012-03-06 19:46:44', 0, 1, 0, 720),
(46, 55, '2012-03-07 07:16:15', 0, 1, 0, 720),
(47, 56, '2012-03-07 18:55:58', 0, 1, 0, 720),
(48, 54, '2012-03-08 19:17:30', 0, 1, 0, 720),
(49, 58, '2012-03-10 21:25:42', 0, 1, 0, 720),
(50, 59, '2012-03-18 00:00:42', 0, 1, 0, 720),
(51, 61, '2012-03-18 03:59:55', 0, 1, 0, 720),
(52, 62, '2012-03-18 19:43:03', 0, 1, 0, 720),
(53, 63, '2012-03-19 20:03:34', 0, 1, 0, 720),
(54, 65, '2012-03-20 16:37:29', 0, 1, 0, 720),
(55, 39, '2012-03-20 18:49:24', 0, 1, 0, 720),
(56, 66, '2012-03-20 19:09:26', 0, 1, 0, 720),
(57, 67, '2012-03-21 05:50:39', 0, 1, 0, 720),
(58, 68, '2012-03-23 00:58:37', 0, 1, 0, 720),
(59, 69, '2012-03-26 01:52:41', 0, 1, 0, 720),
(60, 70, '2012-03-27 02:48:32', 0, 1, 0, 720),
(61, 71, '2012-03-28 18:28:57', 0, 1, 0, 720);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bids`
--

CREATE TABLE IF NOT EXISTS `tbl_bids` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL DEFAULT '0',
  `soco_id` int(11) NOT NULL COMMENT 'the id of the solar company who put the bid in',
  `score` int(10) NOT NULL DEFAULT '0',
  `installations` int(10) NOT NULL DEFAULT '0',
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `price_kwh` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT 'Price per kWh (dollars)',
  `down_payment` decimal(11,2) NOT NULL DEFAULT '0.00',
  `lease_payment` decimal(11,2) NOT NULL DEFAULT '0.00',
  `new_monthly_cost` decimal(11,2) NOT NULL DEFAULT '0.00',
  `fin_opt_details1` varchar(256) NOT NULL DEFAULT '' COMMENT 'finanacing option details',
  `fin_opt_details2` varchar(256) NOT NULL DEFAULT '',
  `fin_opt_details3` varchar(256) NOT NULL DEFAULT '',
  `fin_opt_details4` varchar(256) NOT NULL DEFAULT '',
  `panel_manufacturer` varchar(256) NOT NULL DEFAULT '',
  `estimated_yearly_production` int(11) NOT NULL DEFAULT '0' COMMENT 'in kWh',
  `panel_details` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex: 18xSunPower E20/327 Solar panel',
  `system_specs` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex: 5.89kW(DC), 5.18 kW(AC) System',
  `roof_mounting_system` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex: Non-SunPower Roof Mounting System',
  `home_sale_options` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex: But out lease, transfer lease to buyer',
  `power_warranty` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex:25 year power',
  `system warranty` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex:10 year system',
  `lbs_co2` varchar(256) NOT NULL DEFAULT '' COMMENT 'ex: 100,000lbs',
  `noteworthy1` varchar(256) NOT NULL DEFAULT '',
  `noteworthy2` varchar(256) NOT NULL DEFAULT '',
  `bidTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The timestamp of when the bid was created.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `soco_id` (`soco_id`),
  KEY `auction_id` (`auction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table maps the bids to the auctions.';

--
-- Dumping data for table `tbl_bids`
--

INSERT INTO `tbl_bids` (`id`, `auction_id`, `soco_id`, `score`, `installations`, `amount`, `price_kwh`, `down_payment`, `lease_payment`, `new_monthly_cost`, `fin_opt_details1`, `fin_opt_details2`, `fin_opt_details3`, `fin_opt_details4`, `panel_manufacturer`, `estimated_yearly_production`, `panel_details`, `system_specs`, `roof_mounting_system`, `home_sale_options`, `power_warranty`, `system warranty`, `lbs_co2`, `noteworthy1`, `noteworthy2`, `bidTime`) VALUES
(0, 0, 1, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2012-02-06 23:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '',
  `source` varchar(50) NOT NULL DEFAULT '' COMMENT 'where did this autocontact come from',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id`, `email`, `source`) VALUES
(10, 'danielj.lafferty@gmail.com', 'soco'),
(19, 'dannyhoward@skyfireenergy.com', 'soco'),
(20, 'mr.josue.evilla@gmail.com', 'soco'),
(21, 'mr.josue.evilla@gmail.com', 'soco'),
(22, 'donna.b.ward@gmail.com', 'soco'),
(23, 'info@puresolar.ca', 'soco'),
(24, 'aron@clarysolar.com', 'soco'),
(25, 'Nick@greenconception.com', 'soco'),
(26, 'firposs@hotmail.com', 'soco'),
(27, 'firposs@hotmail.com', 'soco'),
(28, 'brett@westhavenconstruction.com', 'soco'),
(29, 'leads@spearheadsolar.com', 'soco'),
(30, 'leads@spearheadsolar.com', 'soco'),
(31, 'r.bonewitz@alternativetechnology.ca', 'soco'),
(32, 'kim_winberry@msn.com', 'soco');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE IF NOT EXISTS `tbl_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT '',
  `zipcode` varchar(50) NOT NULL DEFAULT '',
  `roofComposition` varchar(20) NOT NULL DEFAULT '',
  `roofPic` varchar(200) NOT NULL DEFAULT '',
  `inclination` int(11) NOT NULL DEFAULT '0',
  `direction` varchar(20) NOT NULL DEFAULT '',
  `systemSize` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT 'this value should be in kWatts',
  `area_sqft` varchar(20) NOT NULL DEFAULT '0',
  `cellType` varchar(50) NOT NULL DEFAULT '',
  `installStyle` varchar(50) NOT NULL DEFAULT '',
  `deadlineProposal` datetime NOT NULL DEFAULT '2012-01-01 00:00:00',
  `deadlineCompletion` datetime NOT NULL DEFAULT '2012-01-01 00:00:00',
  `RFPFile` varchar(100) NOT NULL DEFAULT '' COMMENT 'The location of the RFP file if uploaded.',
  `financingOptions` varchar(100) NOT NULL DEFAULT '',
  `transType` varchar(120) NOT NULL DEFAULT '',
  `comments` varchar(255) NOT NULL DEFAULT '',
  `quality` varchar(20) NOT NULL DEFAULT '',
  `likelihood` varchar(20) NOT NULL DEFAULT '',
  `monthlyUtilities` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT 'Amount of monthly utility bill average',
  `visible` varchar(3) NOT NULL DEFAULT '',
  `price` varchar(20) NOT NULL DEFAULT '',
  `auction_id` int(11) NOT NULL DEFAULT '0' COMMENT 'the id of the auction in tbl_auctions',
  `numBids` int(11) NOT NULL DEFAULT '0' COMMENT 'Number of times this has been bought.',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_ID` (`user_ID`),
  KEY `auction_id` (`auction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`id`, `user_ID`, `name`, `address1`, `city`, `state`, `country`, `zipcode`, `roofComposition`, `roofPic`, `inclination`, `direction`, `systemSize`, `area_sqft`, `cellType`, `installStyle`, `deadlineProposal`, `deadlineCompletion`, `RFPFile`, `financingOptions`, `transType`, `comments`, `quality`, `likelihood`, `monthlyUtilities`, `visible`, `price`, `auction_id`, `numBids`, `views`) VALUES
(1, 1, 'Aaron Kennedy', '501 Pacific', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '4', '1.57', '0', '', 'Residential Project', '2012-03-01 00:00:00', '2013-01-01 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"4";}', '', '', '', '0', '0.00', '', '', 2, 0, 0),
(2, 1, 'Aaron Kennedy', '', 'Winnipeg', 'MB', '', 'V6Z2X6', '0', '', 0, '0', '1.54', '0', '', 'Residential Project', '2016-01-01 00:00:00', '2018-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '0', '0.00', '', '', 3, 0, 0),
(3, 2, 'Chris Hornor', '145 Southampton Ave', 'Berkeley', 'CA', '', '94710', '2', '', 1, '6', '4.00', '0', '', 'Light Commercial Project', '2012-03-01 00:00:00', '2012-06-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '2', '0.00', '', '', 4, 0, 0),
(4, 3, 'Yolasha Keenesha', '2801-1529 w.pender st', 'vancouver', 'BC', '', 'v6g 3j3', '2', '', 0, '0', '1.80', '0', '', 'Residential Project', '2012-02-19 00:00:00', '2012-05-28 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '0', '0.00', '', '', 5, 0, 0),
(5, 3, 'Yolasha Keenesha', '2801 - 1529 w.pender st', 'Vancouver', 'BC', '', 'V6G3J3', '0', '', 0, '0', '100000.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'b:0;', '0', 'what the heck is "yoga" anyway?\r\n\r\nAnswer: breadcat', '', '0', '0.00', '', '', 6, 0, 0),
(6, 4, 'Aaron Kennedy', '501 pacific St', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 1, '1', '1.80', '0', '', 'Residential Project', '2014-01-01 00:00:00', '2017-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '0', '0.00', '', '', 7, 0, 0),
(7, 5, 'Someone whocares', '501 Pacific', 'Huston', 'TX', '', '52686', '0', '2012_02_24_21_53_57_CIMG2428.JPG', 0, '1', '1.80', '0', '', 'Residential Project', '2016-04-01 00:00:00', '2019-05-01 00:00:00', '2012_02_16_07_52_49_yii_wizard_behavior_manual.pdf', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '', '250.00', '', '', 8, 0, 0),
(8, 6, 'test testlast', '', 'Calgary', 'AB', '', 'v4rt3r', '1', '', 1, '4', '4.30', '0', '', 'Light Commercial Project', '2014-01-01 00:00:00', '2014-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '34.00', '', '', 9, 0, 0),
(9, 7, 'Tom Lin', '2801 - 1529 w.pender st', 'Vancouver', 'BC', '', 'V6G3J3', '2', '', 0, '4', '2000.00', '0', '', 'Industrial Project', '2012-01-01 00:00:00', '2012-05-10 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '1500.00', '', '', 10, 0, 0),
(10, 8, 'Kevin Starke', '1 East Cordova Street', 'Vancouver', 'BC', '', 'V6A 4H3', '3', '2012_02_24_00_56_03_test name.jpg', 0, '4', '5.40', '0', '', 'Light Commercial Project', '2012-03-10 00:00:00', '2012-05-10 00:00:00', '', '', '', '', '', '', '40.00', '', '', 11, 0, 0),
(11, 8, 'Kevin Starke', '4504 McLeery Road', 'Armstrong', 'BC', '', 'V6B 1H7', '0', '2012_02_24_17_27_09_raccoons.jpeg', 2, '5', '3.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_16_19_54_01_Screen shot 2012-02-16 at 11.26.21 AM.png', 's:0:"";', '0', 'Where do these comments go?', '', '', '60.00', '', '', 12, 0, 0),
(12, 8, 'Kevin Starke', '', 'vancouver', 'BC', '', 'V6B 1H7', '1', '', 0, '0', '22.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'b:0;', '', '', '', '', '2000.00', '', '', 13, 0, 0),
(13, 8, 'Kevin Starke', '33 Smithe Street', 'Vancouver', 'BC', '', 'V6B 0B5', '3', '2012_02_24_17_27_38_weird animal.jpeg', 0, '0', '5.17', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '1800.00', '', '', 14, 0, 0),
(14, 9, 'Tom Kineshanko', '816 Bancroft Way', 'Berkeley', 'CA', '', '94710', '2', '2012_02_17_22_10_48_walled.jpg', 0, '5', '22.50', '0', '', 'Heavy Commercial Project', '2012-02-28 00:00:00', '2012-06-10 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '150.00', '', '', 15, 0, 0),
(15, 5, 'Someone whocares', '816 Bancroft Way', 'Berkely', 'CA', '', '94710', '2', '', 0, '3', '22.50', '0', '', 'Heavy Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 18, 0, 0),
(16, 10, 'kevin starke', '4504 McLeery Road', 'armstrong', 'BC', '', 'V0E 1B3', '0', '', 2, '5', '3.60', '0', '', 'Light Commercial Project', '2012-07-01 00:00:00', '2012-09-01 00:00:00', '', 's:0:"";', '', '', '', '', '120.00', '', '', 16, 0, 0),
(17, 9, 'Tom Kineshanko', '701 - 207 w.hastings st', 'Vancouver', 'BC', '', 'V6B 1H7', '0', '', 0, '0', '0.00', '0', '', 'Industrial Project', '2012-01-01 00:00:00', '2013-04-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '0', '', '', '', '400.00', '', '', 29, 0, 0),
(18, 11, 'Aaron Ward', '', 'Huston', 'TX', '', '70557', '1', '', 1, '4', '2.00', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '25.00', '', '', 17, 0, 0),
(19, 5, 'Someone whocares', '2008 501 Pacific ST', 'vancouver', 'BC', '', 'V6Z2X6', '1', '', 0, '4', '2.60', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'b:0;', '', '', '', '', '0.00', '', '', 19, 0, 0),
(20, 12, 'Kevin Starke', '101 Hastings Street', 'Vancouver', 'BC', '', 'V6B1H7', '2', '2012_02_24_01_06_17_test name.jpg', 0, '3', '4.00', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', '', '', '', '', '', '50.00', '', '', 26, 0, 0),
(21, 12, 'Kevin Starke', '', '1', 'BC', '', '2', '', '', 0, '4', '0.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 20, 0, 0),
(22, 9, 'Tom Kineshanko', '701 - 207 w.hastings st', 'Vancouver', 'BC', '', 'V6B 1H7', '2', '', 0, '4', '514.00', '0', '', 'Industrial Project', '2012-01-01 00:00:00', '2016-05-04 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '5000.00', '', '', 21, 0, 0),
(23, 13, 'kevin starke', '4515 Landsdowne Road', 'Armstrong', 'BC', '', 'V0E1B3', '0', '2012_02_22_20_46_23_GridBid_Logo_twitter_128x128.png', 1, '3', '2.25', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '80.00', '', '', 22, 0, 0),
(24, 12, 'Kevin Starke', '', 'a', 'BC', '', 'c', '', '', 0, '4', '0.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 23, 0, 0),
(25, 12, 'Kevin Starke', '', 'a', 'AB', '', 'c', '', '', 0, '4', '0.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 24, 0, 0),
(26, 8, 'Kevin Starke', '', 'a', 'BC', '', 'c', '', '', 0, '', '0.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'b:0;', '', '', '', '', '0.00', '', '', 25, 0, 0),
(27, 4, 'Aaron Kennedy', '501 Pacific Street', 'Vancouver', 'BC', '', 'V6Z2X5', '2', '', 0, '3', '3.00', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '25.00', '', '', 27, 0, 0),
(28, 8, 'Kevin Starke', '701 207 West Hastings Street', 'Vancouver', 'BC', '', 'V6B1H7', '3', '', 0, '4', '1.80', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 's:0:"";', '', '', '', '', '50.00', '', '', 28, 0, 0),
(29, 9, 'Tom Kineshanko', '2801 - 1529 w.pender st', 'Vancouver', 'BC', '', 'V6G3J3', '1', '', 0, '1', '1000.00', '0', '', 'Industrial Project', '2012-01-01 00:00:00', '2013-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '500.00', '', '', 30, 0, 0),
(30, 14, 'Alia Lamaadar', '505 Muskoka Beach Road', 'Gravenhurst', 'ON', '', 'P1P1B3', '0', '', 1, '3', '3.60', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_23_22_09_59_HG Forest Trends 2007.pdf', 's:0:"";', '', '', '', '', '100.00', '', '', 31, 0, 0),
(31, 15, 'Kevin Starke', '439 North Fairfax Ave ', 'LA', 'CA', '', '90036', '2', '2012_02_23_22_55_42_GridBid_Logo_twitter_128x128.png', 0, '4', '4.00', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:5:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";i:4;s:1:"4";}', '', '', '', '', '80.00', '', '', 32, 0, 0),
(32, 16, 'Laura Crawford', '4428 Marine Drive', 'West Vancouver', 'BC', '', 'V6B 0B5 ', '0', '', 1, '3', '36.00', '0', '', 'Heavy Commercial Project', '2012-04-01 00:00:00', '2012-09-01 00:00:00', '', 'a:5:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";i:4;s:1:"4";}', '', '', '', '', '0.00', '', '', 33, 0, 0),
(33, 9, 'Tom Kineshanko', '701 - 207 w.hastings st', 'Vancouver', 'BC', '', 'V6G3J3', '2', '', 0, '4', '3.60', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2013-02-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '2000.00', '', '', 34, 0, 0),
(34, 8, 'Kevin Starke', '4511 Landsdowne Rd', 'Armstrong', 'BC', '', 'V0e1b3', '0', '2012_02_24_00_51_26_puppies!.jpeg', 1, '5', '2.50', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_24_00_52_18_Pool Schedule_Jan-Feb 2012.pdf', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";}', '', '', '', '', '50.00', '', '', 35, 0, 0),
(35, 17, 'asdf asdf', 'vancouver', 'vancouver', 'empty', '', '124556', '1', '', 2, '1', '234.00', '0', '', 'Industrial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:5:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";i:4;s:1:"4";}', '', '', '', '', '999999999.99', '', '', 0, 0, 0),
(36, 18, 'Mac lugay', 'Vancouver', 'Vancouver', 'BC', '', 'V6R 1W2', '0', '', 1, '0', '0.90', '0', '', 'Residential Project', '2013-08-07 00:00:00', '2017-08-06 00:00:00', '', 'a:1:{i:0;s:1:"3";}', '', '', '', '', '250.00', '', '', 36, 0, 0),
(37, 10, 'kevin starke', '1 toronto st', 'victoria', 'BC', '', 'V6b1h7', '1', '2012_02_24_01_07_51_test name.jpg', 1, '1', '7.20', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '300.00', '', '', 37, 0, 0),
(38, 19, 'Tom Kineshanko', '8301 stoneridge drive', 'Coldstream', 'BC', '', 'V6B 2T8', '0', '', 1, '2', '0.90', '0', '', 'Residential Project', '2012-04-01 00:00:00', '2012-05-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '100.00', '', '', 38, 0, 0),
(39, 4, 'Aaron Kennedy', '501pacific', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 1, '2', '2.00', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_24_04_01_28_yii_wizard_behavior_manual.pdf', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '0.00', '', '', 55, 0, 0),
(40, 20, 'Riki McBride', 'Parlaiment', 'Victoria', 'BC', '', 'V6Z2X6', '2', '', 2, '4', '2.00', '0', '', 'Residential Project', '2017-02-01 00:00:00', '2017-04-01 00:00:00', '2012_02_24_06_43_33_001-021-Plate Column Cap_150mm .pdf', 'a:1:{i:0;s:1:"1";}', '', '', '', '', '45.00', '', '', 40, 0, 0),
(41, 20, 'Riki McBride', 'Some location', 'Victoria', 'BC', '', '5646', '2', '2012_02_24_06_49_30_DSC01868.JPG', 1, '4', '4.00', '0', '', 'Light Commercial Project', '2016-03-01 00:00:00', '2018-04-01 00:00:00', '2012_02_24_06_50_07_001-020-Base Guide_134.pdf', 's:0:"";', '', '', '', '', '45.00', '', '', 39, 0, 0),
(42, 20, 'Riki McBride', '501 pacific St', 'Vancouver', 'BC', '', 'V6Z2X6', '1', '', 1, '4', '2.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '56.00', '', '', 0, 0, 0),
(43, 20, 'Riki McBride', '501 pacific St', 'Vancouver', 'BC', '', '25a', '0', '', 0, '4', '14.00', '0', '', 'Heavy Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '45.00', '', '', 0, 0, 0),
(45, 8, 'Kevin Starke', 's', 'd', 'SK', '', 'f', '1', '', 0, '', '0.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 0, 0, 0),
(46, 21, 'Rob Drapala', '2401 Pheasant Ridge Drive', 'Armstrong', 'BC', '', 'V6Z1C1', '4', '', 1, '1', '22.50', '0', '', 'Small Commercial Project', '2014-02-01 00:00:00', '2014-09-01 00:00:00', '', 'a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";i:3;s:1:"4";}', '', '', '', '', '100.00', '', '', 41, 0, 0),
(47, 22, 'andrew Fursman', '28 Tawny Place', 'Victoria', 'BC', '', 'V8Z 0C3', '4', '', 0, '4', '18.00', '0', '', 'Small Commercial Project', '2012-04-10 00:00:00', '2012-06-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '150.00', '', '', 42, 0, 0),
(48, 23, 'Stephane Guerraz', '301-345 Water Street', 'Vancouver', 'BC', '', 'V6B 1B8', '2', '', 1, '5', '6.00', '0', '', 'Residential Project', '2012-07-01 00:00:00', '2012-10-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '200.00', '', '', 0, 0, 0),
(49, 24, 'Chad Hamre', '30 Marriott Place', 'Saskatoon', 'SK', '', 's7l4g1', '0', '', 1, '3', '2.70', '0', '', 'Residential Project', '2012-05-01 00:00:00', '2013-05-01 00:00:00', '', 'a:1:{i:0;s:1:"3";}', '', '', '', '', '200.00', '', '', 43, 0, 0),
(50, 25, 'Kevin Starke', '777 dunsmuir street', 'vancouver', 'BC', '', 'V6B1H7', '3', '', 0, '', '5.00', '0', '', 'Residential Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '', '', '', '', '50.00', '', '', 0, 0, 0),
(51, 26, 'JIN JUN', '233 VIEW DR.', 'LAS VEGAS', 'NV', '', '89107', '0', '', 1, '5', '11.70', '0', '', 'Small Commercial Project', '2012-03-10 00:00:00', '2012-05-10 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"3";}', '', '', '', '', '150.00', '', '', 44, 0, 0),
(52, 27, 'Danny Howard', '219 Rusholme Rd.', 'Toronto', 'ON', '', 'M6H 2Y9', '0', '', 2, '5', '4.00', '0', '', 'Residential Project', '2012-03-10 00:00:00', '2012-06-05 00:00:00', '', 'a:5:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";i:4;s:1:"4";}', '', '', '', '', '150.00', '', '', 0, 0, 0),
(53, 28, 'donovan woollard', '535 Richards Street', 'Vancouver', 'BC', '', 'v6b 1z5', '3', '', 0, '5', '153.00', '0', '', 'Large Commercial Project', '2012-04-01 00:00:00', '2012-06-01 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"3";i:2;s:1:"4";}', '', '', '', '', '0.00', '', '', 45, 0, 0),
(54, 29, 'jame crowe', '1444 belmont park rd', 'oceanside', 'CA', '', '92057', '3', '', 1, '5', '5.50', '0', '', 'Residential Project', '2012-03-10 00:00:00', '2012-05-01 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";}', '', '', '', '', '277.00', '', '', 48, 0, 0),
(55, 30, 'Fernando Rios', '43 hemingway ct', 'trabuco canyon', 'CA', '', '92679', '0', '', 1, '5', '5.35', '0', '', 'Residential Project', '2012-03-15 00:00:00', '2012-06-15 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '180.00', '', '', 46, 0, 0),
(56, 31, 'Chris Savage', '511 Sixth Street', 'Keewatin', 'ON', '', 'P0X 1C0', '0', '', 1, '4', '2.70', '0', '', 'Residential Project', '2012-04-01 00:00:00', '2014-09-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '200.00', '', '', 47, 0, 0),
(57, 32, 'kenneth seal', '7831 w washburn rd ', 'las vegas', 'NV', '', '89149', '0', '', 1, '4', '18.00', '0', '', 'Small Commercial Project', '2012-04-01 00:00:00', '2012-09-01 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";}', '', '', '', '', '257.00', '', '', 0, 0, 0),
(58, 33, 'Tracy Stoneman', '73250 Ironwood Street', 'Palm Desert', 'CA', '', '92260', '4', '', 0, '4', '10000.00', '0', '', 'Large Commercial Project', '2012-04-01 00:00:00', '2012-08-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"2";}', '', '', '', '', '600.00', '', '', 49, 0, 0),
(59, 34, 'Jim Lafos', '307 Austin street', 'San Francisco', 'CA', '', '94109', '1', '', 1, '5', '5000.00', '0', '', 'Large Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '300.00', '', '', 50, 0, 0),
(60, 35, 'krystal CWalker', '10404 Hwy A12', 'montague', 'CA', '', '96067', '1', '', 1, '1', '16.20', '0', '', 'Small Commercial Project', '2012-12-01 00:00:00', '2014-01-01 00:00:00', '', 'a:1:{i:0;s:1:"3";}', '', '', '', '', '300.00', '', '', 0, 0, 0),
(61, 36, 'Stephen Pearce', '42850 Castillejo Court', 'Fremont', 'CA', '', '94539', '0', '', 1, '4', '4.50', '0', '', 'Residential Project', '2012-03-24 00:00:00', '2012-04-20 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"2";}', '', '', '', '', '190.00', '', '', 51, 0, 0),
(62, 37, 'Eugene Macsurak', '2530 Camino Doce SW', 'Deming', 'NM', '', '88030', '1', '', 1, '4', '10.00', '0', '', 'Small Commercial Project', '2012-03-30 00:00:00', '2012-05-30 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '110.00', '', '', 52, 0, 0),
(63, 38, 'Laurie Nipp', '857 Montevino Dr', 'Pleasanton', 'CA', '', '94566', '0', '', 1, '5', '648.00', '0', '', 'Large Commercial Project', '2012-03-25 00:00:00', '2012-06-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '125.00', '', '', 53, 0, 0),
(64, 39, 'Jay Jones', '4952 Brummett''s Crk Rd', 'Bloomington ', 'IN', '', '47408', '1', '', 1, '4', '8.00', '0', '', 'Residential Project', '2012-03-25 00:00:00', '2012-08-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '0.00', '', '', 0, 0, 0),
(65, 40, 'Phil Fremon', '1010 Los Coyotes Way', 'Landers', 'CA', '', '92285', '1', '', 1, '2', '4.00', '0', '', 'Residential Project', '2012-04-01 00:00:00', '2012-08-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '150.00', '', '', 54, 0, 0),
(66, 1, 'Aaron Kennedy', '1120 Montreal Road', 'Montreal', 'QC', '', 'f3tr4e', '1', '', 0, '4', '2.25', '0', '', 'Residential Project', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 's:0:"";', '', '', '', '', '0.00', '', '', 56, 0, 0),
(67, 41, 'Kris Widdison', '4742 Casa Loma ave', 'Yorba linda', 'CA', '', '92886', '4', '', 1, '2', '3.00', '0', '', 'Residential Project', '2012-04-01 00:00:00', '2012-08-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"3";}', '', '', '', '', '125.00', '', '', 57, 0, 0),
(68, 42, 'roger carpenter', '2331 melon road', 'holtville', 'CA', '', '92250', '0', '', 1, '6', '18.00', '0', '', 'Small Commercial Project', '2012-05-01 00:00:00', '2012-12-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '', '235.00', '', '', 58, 0, 0),
(69, 43, 'Jim Stevenson', '7 San Andreas drive', 'Danville', 'CA', '', '94526', '0', '', 1, '2', '3000.00', '0', '', 'Large Commercial Project', '2012-03-30 00:00:00', '2012-05-30 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '', '', '', '', '490.00', '', '', 59, 0, 0),
(70, 44, 'Jon Cartwright', '27 east 4th ave', 'vancouver', 'BC', '', 'v5t4s2', '2', '', 0, '0', '9.00', '0', '', 'Residential Project', '2012-05-01 00:00:00', '2012-08-01 00:00:00', '', 'a:6:{i:0;s:1:"0";i:1;s:1:"5";i:2;s:1:"1";i:3;s:1:"2";i:4;s:1:"3";i:5;s:1:"4";}', '', '', '', '', '100.00', '', '', 60, 0, 0),
(71, 45, 'Joel Rue', '517 West Bay Ave', 'Newport Beach', 'CA', '', '92661', '2', '2012_03_28_18_26_07_Roof.JPG', 1, '3', '6.00', '0', '', 'Residential Project', '2012-04-10 00:00:00', '2012-08-01 00:00:00', '', 'a:2:{i:0;s:1:"5";i:1;s:1:"2";}', '', '', '', '', '300.00', '', '', 61, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `address1` varchar(100) NOT NULL DEFAULT '',
  `address2` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `zipcode` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(20) NOT NULL DEFAULT '',
  `country` varchar(30) NOT NULL DEFAULT '',
  `postal` varchar(10) NOT NULL DEFAULT '',
  `businessPhone` varchar(30) NOT NULL DEFAULT '',
  `cellPhone` varchar(30) NOT NULL DEFAULT '',
  `userType` varchar(10) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `company`, `address1`, `address2`, `city`, `zipcode`, `state`, `country`, `postal`, `businessPhone`, `cellPhone`, `userType`, `birthday`) VALUES
(1, 'Kennedy', 'Aaron', 'DMK Design', '', '', '', '', '', '', '', '7782418544', '', 'admin', '0000-00-00'),
(2, 'Hornor', 'Chris', '', '', '', '', '', '', '', '', '+1646 675 4240', '', 'roof', '0000-00-00'),
(3, 'Kineshanko', 'Tom', 'Habitat Enterprises', '', '', '', '', '', '', '', '6043172756', '', 'admin', '0000-00-00'),
(4, 'Kennedy', 'Aaron', 'DMK Design', '', '', '', '', '', '', '', '7782418544', '', 'roof', '0000-00-00'),
(5, 'whocares', 'Someone', 'I care ', '', '', '', '', '', '', '', '6048583634', '', 'roof', '0000-00-00'),
(6, 'testlast', 'test', '', '', '', '', '', '', '', '', '6048583634', '', 'roof', '0000-00-00'),
(7, 'Lin', 'Tom', '', '', '', '', '', '', '', '', '6043172756', '', 'roof', '0000-00-00'),
(8, 'Starke', 'Kevin', 'Habitat Enterprises', '701-207 West Hastings St', '', '', '', 'British Columbia', 'Canada', 'V6B1H7', '604-639-2220', '', 'admin', '0000-00-00'),
(9, 'Kineshanko', 'Tom', 'You momma''s pizzria and dollar shop', '', '', '', '', '', '', '', '6046392220', '', 'roof', '0000-00-00'),
(10, 'starke', 'kevin', '', '', '', '', '', '', '', '', '7789680780', '', 'roof', '0000-00-00'),
(11, 'Ward', 'Aaron', 'DmkDesign', '', '', '', '', '', '', '', '1.800555.6325', '', 'roof', '0000-00-00'),
(12, 'Starke', 'Kevin', '', '', '', '', '', '', '', '', '7789680780', '', 'roof', '0000-00-00'),
(13, 'starke', 'kevin', '', '', '', '', '', '', '', '', '7789680780', '', 'roof', '0000-00-00'),
(14, 'Lamaadar', 'Alia', 'CleanTech Community Gateway', '', '', '', '', '', '', '', '77', '', 'roof', '0000-00-00'),
(15, 'Starke', 'Kevin', '', '', '', '', '', '', '', '', '7789680780', '', 'roof', '0000-00-00'),
(16, 'Crawford', 'Laura', '', '', '', '', '', '', '', '', '604 506 3069', '', 'roof', '0000-00-00'),
(17, 'lafferty', 'Dan', '', '', '', '', '', '', '', '', 'asdfasdf', '', 'roof', '0000-00-00'),
(18, 'lugay', 'Mac', 'Habitat', '', '', '', '', '', '', '', '604-602-3745', '', 'roof', '0000-00-00'),
(19, 'Kineshanko', 'Tom', 'You momma''s pizzria and dollar shop', '', '', '', '', '', '', '', '6043172756', '', 'roof', '0000-00-00'),
(20, 'McBride', 'Riki', '', '', '', '', '', '', '', '', '7782418544', '', 'roof', '0000-00-00'),
(21, 'Drapala', 'Rob', '', '', '', '', '', '', '', '', '6047679556', '', 'roof', '0000-00-00'),
(22, 'Fursman', 'andrew', 'FAC', '', '', '', '', '', '', '', '8883877626', '', 'roof', '0000-00-00'),
(23, 'Guerraz', 'Stephane', 'Other', '', '', '', '', '', '', '', '6046006262', '', 'roof', '0000-00-00'),
(24, 'Hamre', 'Chad', '', '', '', '', '', '', '', '', '1-416-568-8812', '', 'roof', '0000-00-00'),
(25, 'Starke', 'Kevin', '', '', '', '', '', '', '', '', '1-778-968-0780', '', 'roof', '0000-00-00'),
(26, 'JUN', 'JIN', '', '', '', '', '', '', '', '', '626-215-2030', '', 'roof', '0000-00-00'),
(27, 'Howard', 'Danny', 'SkyFire Energy', '', '', '', '', '', '', '', '4165362786', '', 'roof', '0000-00-00'),
(28, 'woollard', 'donovan', 'Alterrus Systems', '', '', '', '', '', '', '', '604-720-4223', '', 'roof', '0000-00-00'),
(29, 'crowe', 'jame', '', '', '', '', '', '', '', '', '7608154000', '', 'roof', '0000-00-00'),
(30, 'Rios', 'Fernando', '', '', '', '', '', '', '', '', '9496350312', '', 'roof', '0000-00-00'),
(31, 'Savage', 'Chris', '', '', '', '', '', '', '', '', '807-547-2634', '', 'roof', '0000-00-00'),
(32, 'seal', 'kenneth', '', '', '', '', '', '', '', '', '7028108148', '', 'roof', '0000-00-00'),
(33, 'Stoneman', 'Tracy', 'House or Residence', '', '', '', '', '', '', '', '7197830303', '', 'roof', '0000-00-00'),
(34, 'Lafos', 'Jim', '', '', '', '', '', '', '', '', '408-384-8384', '', 'roof', '0000-00-00'),
(35, 'CWalker', 'krystal', '', '', '', '', '', '', '', '', '5309382818', '', 'roof', '0000-00-00'),
(36, 'Pearce', 'Stephen', '', '', '', '', '', '', '', '', '9782897896', '', 'roof', '0000-00-00'),
(37, 'Macsurak', 'Eugene', '', '', '', '', '', '', '', '', '575-544-4175', '', 'roof', '0000-00-00'),
(38, 'Nipp', 'Laurie', '', '', '', '', '', '', '', '', '925-226-0708', '', 'roof', '0000-00-00'),
(39, 'Jones', 'Jay', '', '', '', '', '', '', '', '', '909-982-4857', '', 'roof', '0000-00-00'),
(40, 'Fremon', 'Phil', '', '', '', '', '', '', '', '', '7143487503', '', 'roof', '0000-00-00'),
(41, 'Widdison', 'Kris', '', '', '', '', '', '', '', '', '7145248807', '', 'roof', '0000-00-00'),
(42, 'carpenter', 'roger', '', '', '', '', '', '', '', '', '7603560447', '', 'roof', '0000-00-00'),
(43, 'Stevenson', 'Jim', '', '', '', '', '', '', '', '', '9256835884', '', 'roof', '0000-00-00'),
(44, 'Cartwright', 'Jon', '', '', '', '', '', '', '', '', '6045065472', '', 'roof', '0000-00-00'),
(45, 'Rue', 'Joel', '', '', '', '', '', '', '', '', '9492746670', '', 'roof', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'company', 'Company', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 2, 3),
(4, 'address1', 'Address Line 1', 'VARCHAR', 50, 0, 2, '', '', 'Please enter your address.', '', '', '', '', 3, 3),
(5, 'address2', 'Address Line 2', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 4, 3),
(6, 'state', 'State/Province', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 6, 3),
(7, 'country', 'Country', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 7, 3),
(8, 'businessPhone', 'Business Phone', 'VARCHAR', 30, 0, 1, '', '', '', '', '', '', '', 8, 3),
(9, 'cellPhone', 'Cell Phone', 'VARCHAR', 30, 0, 2, '', '', '', '', '', '', '', 9, 3),
(10, 'userType', 'User Type', 'VARCHAR', 10, 0, 3, '', '', '', '', 'NOTSET', '', '', 11, 0),
(11, 'postal', 'Postal or Zip', 'VARCHAR', 10, 0, 2, '', '', 'Please enter your postal code.', '', '', '', '', 10, 3),
(13, 'birthday', 'Birthday', 'DATE', 0, 0, 0, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'aaron_1', '28a34010e84b881fb087359c7e280a08', 'aaron@dmkdesign.ca', 'f54887b86d1e34be64a5fd77af8c3e6f', 1328569387, 1332445148, 1, 1),
(2, 'chris_2', '9c2314aa069f17034910dba43e13d27c', 'chris@tread.com', 'c81a07aac07088d3c45aa4473eab6d6d', 1328652155, 1328652155, 0, 1),
(3, 'thomas_3', '7a88d790479c7f048e18f60e4a718ea0', 'thomas@habitatenterprises.ca', '597aa3e1666ce34722eb7ca72dae5a69', 1328899565, 1332362729, 1, 1),
(4, 'akennedy69_4', '28a34010e84b881fb087359c7e280a08', 'akennedy69@msn.com', '0fbacc80e82a22c61aaab56258083be1', 1329105844, 1329526658, 0, 1),
(5, 'whocares_5', '28a34010e84b881fb087359c7e280a08', 'whocares@hotmail.com', 'ef8ddb05662f2ab793a8d1114d3274f7', 1329378834, 1329812867, 0, 1),
(6, 'test_6', '28a34010e84b881fb087359c7e280a08', 'test@hotmail.com', '074561a54b48b7f59f18efc21cbe6252', 1329411659, 1329411749, 0, 1),
(7, 'thomas_7', '7a88d790479c7f048e18f60e4a718ea0', 'thomas@kineshanko.com', '58569a65b4519a0029cc87d2e77254d6', 1329434340, 1332871415, 0, 1),
(8, 'kevin_8', '50cf19912960f65490b334ea9c196eea', 'kevin@habitatenterprises.ca', 'a720c1322f54625efcfa5ad7f45a6bc2', 1329444147, 1332978746, 1, 1),
(9, 'thomas_9', '5d1a4e2d48970bc7a47fae9404899208', 'thomas@habitatcarbon.com', 'ee1992f5cc5166d693862e3b3d30fc32', 1329517502, 1331095644, 0, 1),
(10, 'kstarke_10', '50cf19912960f65490b334ea9c196eea', 'kstarke@habitatenterprises.ca', '3c98d6b533fd334ba9514daf0128febd', 1329767471, 1329767471, 0, 1),
(11, 'aaronward_11', '28a34010e84b881fb087359c7e280a08', 'aaronward@hotmail.com', 'c8e409ab2aa7a15b0b46c00e7ae40958', 1329812511, 1329812511, 0, 1),
(12, 'kstarke_12', '50cf19912960f65490b334ea9c196eea', 'kstarke@habitatcarbon.com', '153635603123c132b3bd0e9edf7dcc7f', 1329850522, 1330125587, 0, 1),
(13, 'kstarke_13', '50cf19912960f65490b334ea9c196eea', 'kstarke@uvic.ca', '201caf88984e3f23ad640970c1343b33', 1329943495, 1329943495, 0, 1),
(14, 'Alia_14', '81dc9bdb52d04dc20036dbd8313ed055', 'alianoelle@gmail.com', '772311e2350281a447f494c9acfc009c', 1330035189, 1330035189, 0, 1),
(15, 'Kevin_15', '50cf19912960f65490b334ea9c196eea', 'kevint.starke@gmail.com', '94c0c57104bf0cdb46bab987dad235d1', 1330037958, 1330045780, 0, 1),
(16, 'Laura_16', '1faf791ab17ce69b07894b325ef8cf5d', 'laura@mcnak.com', '870d944a38ef58e540d3e930c2a0c2b8', 1330039223, 1330039223, 0, 1),
(17, 'asdf_17', '098f6bcd4621d373cade4e832627b4f6', 'danlaffer@gmail.com', '71b0a8756bcdfde8db1cbac082bde9a0', 1330045087, 1330045087, 0, 1),
(18, 'Mac_18', '553f124b30168f040d8ade996c9b3a89', 'lugay.m@gmail.com', '12d8d4e3b6c9ecbd4ecdf4beb2246e1a', 1330045436, 1330045436, 0, 1),
(19, 'Tom_19', '5d1a4e2d48970bc7a47fae9404899208', 'support@gridbid.com', '6ed4e6b1ce618da4114dc101f123edc7', 1330049872, 1330049872, 0, 1),
(20, 'Riki_20', '28a34010e84b881fb087359c7e280a08', 'riki-ann@hotmail.com', 'badd2605b5f55c83c4390015d42375a9', 1330065905, 1330065905, 0, 1),
(21, 'Rob_21', 'd16d377af76c99d27093abc22244b342', 'drapala03@hotmail.com', '944954f4c65cae19d1de981af2b9d455', 1330134924, 1330134924, 0, 1),
(22, 'andrew_22', '5ed6110d2b6ba00a381cbfb0d67c5083', 'Andrew@Fursman.com', '6eef8e5326d6efe63380232cf567eb0a', 1330371642, 1330371642, 0, 1),
(23, 'stephane', '6bcb1c5e2fac90b389e39e61b5ce0e1f', 'guerraz.stephane@gmail.com', '80b0e69658490a599afeb4d448be3e64', 1330398846, 1330398846, 0, 1),
(24, 'Chad_24', '595fd62cec333990417a2841c4e6e8f3', 'chadhamre@gmail.com', 'db286e05398353c37c4182ff45186300', 1330488521, 1330488521, 0, 1),
(25, 'Kevin_25', '50cf19912960f65490b334ea9c196eea', 'kevin@gridbid.com', '8b5960869eaa3bdc07d63751a71c3270', 1330536642, 1330536642, 0, 1),
(26, 'JIN_26', 'cb8a08a240f3ea7c99b220d24f54f477', 'JINJUN@YAHOO.COM', '77573fa2206f6bd6cf439dade8d5824b', 1330925435, 1330925435, 0, 1),
(27, 'Danny_27', 'ba85a262ec2af983251b6b56d6a11d61', 'dannyhoward@skyfireenergy.com', 'e94fa9515e1b1f6ce1589a1a02a2853f', 1330992125, 1330992125, 0, 1),
(28, 'donovan_28', '6e0cf0d0169abe347130a939d3c907d9', 'dwoollard@alterrussystems.com', '362c954ed2b91a36eca2f3b576a0d30b', 1331062921, 1331062921, 0, 1),
(29, 'jame_29', '7e8839755973be7f2095da75c2331b2b', 'crowenation@sbcglobal.net', '38e4e46d00e6016cede51e212dddfe4f', 1331100281, 1332343817, 0, 1),
(30, 'Fernando_30', '2d5219b4e6a96a0d2331c5eefe78ad21', 'andoxxxiv@yahoo.com', '8c522f83f9b0c050d064b331986ec4af', 1331104488, 1331104488, 0, 1),
(31, 'Chris_31', '85f5a4416691830651577222e94dd1d6', 'chrissav66@hotmail.com', '7c1343dad58ed22afaa269ea2abb60b5', 1331146408, 1331146408, 0, 1),
(32, 'kenneth_32', '9b182bf800fce8b27a4d13c105cf7feb', 'ken2win2004@yahoo.com', '5645a180ea73686b7c8cd19400ec9945', 1331180747, 1331180747, 0, 1),
(33, 'Tracy_33', '3b16dc694c38d04f7d7451cc37d3c654', 'Tracy@brokeragerfraud.com', 'fa4358cb90311b33896f021f8ad3f018', 1331414709, 1331414709, 0, 1),
(34, 'Jim_34', '09a135c37a082a8129482dd896513c6a', 'workinghard888@gmail.com', '5aaaa7ee1b93652d930fb2a9a0926821', 1332028815, 1332028815, 0, 1),
(35, 'krystal_35', '23a78182fb07aae24e6cba8433399586', 'krystal@cwalker.ws', '5fb078bbee30033653def409e4f455ee', 1332037591, 1332037591, 0, 1),
(36, 'Stephen_36', '33de839bddc1c96a99eb4c66108bfdd6', 'pearce_stephenj@yahoo.com', '7cf5beb8008c50053fdbfad0b2806f26', 1332043098, 1332043098, 0, 1),
(37, 'Eugene_37', '3425345cc9ecc23a5dbdfe691501f328', 'gmac52@netzero.com', '6bb3e8cd91be7cf1efc338e1da8f1d82', 1332099154, 1332099154, 0, 1),
(38, 'Laurie_38', '965c4e432e4592ee2ee6aaec450cc794', 'laurie@evaluplay.com', '848fa58634f87f5adee42bf4200daf62', 1332187272, 1332187272, 0, 1),
(39, 'Jay_39', '971020ee4be5aae6e868ba6a26c97729', 'jjones@laverne.edu', '8ebb146123608c0367fb290476ef034d', 1332203411, 1332203411, 0, 1),
(40, 'Phil_40', '26983d684a5b9a2953df704591631d2b', 'phil@fremon.com', 'eee8e0b0de304b0d60f61db5be33aa0e', 1332261375, 1332261375, 0, 1),
(41, 'Kris_41', '0c899877ad977eef7579e7aa36f67e1d', 'Akwidd@mail.com', '1701545422743d4ba4e7bd7ffac1032e', 1332308819, 1332308819, 0, 1),
(42, 'roger_42', 'b166ceb14c073ef1323e3dee77fe9242', 'boltsblow@hotmail.com', 'fca6a1d25af8688a2a364d8941885dda', 1332464226, 1332464226, 0, 1),
(43, 'Jim_43', 'a12e2704da6dfdf064fb07a7c11f24ba', 'jimolie@gmail.com', 'd85cf6e456b8bb1f16c5b1b83b36b91e', 1332726587, 1332726587, 0, 1),
(44, 'Jon_44', 'caa84394d719694060ca0c7c19ef914c', 'jon@food.ee', '7af686d7b85b9771c2a2f6b67b88ff56', 1332816477, 1332816477, 0, 1),
(45, 'Joel_45', 'a6b3600622fc63e4986a3006e0ed157a', 'Tmonay0702@yahoo.com', '03944b57eab9d300e9498c6767ae8301', 1332959300, 1332959300, 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_auctions`
--
ALTER TABLE `tbl_auctions`
  ADD CONSTRAINT `tbl_auctions_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_leads` (`id`),
  ADD CONSTRAINT `tbl_auctions_ibfk_2` FOREIGN KEY (`winningBid`) REFERENCES `tbl_bids` (`id`);

--
-- Constraints for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD CONSTRAINT `tbl_leads_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
