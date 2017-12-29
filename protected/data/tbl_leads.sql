-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2012 at 06:57 AM
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
  `roofPic` varchar(200) NOT NULL DEFAULT '' COMMENT 'Picture of roof.',
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
  `monthlyUtilities` decimal(11,2) NOT NULL COMMENT 'The average monthly utility bill of the project.',
  `visible` varchar(3) NOT NULL DEFAULT '',
  `price` varchar(20) NOT NULL DEFAULT '',
  `auction_id` int(11) NOT NULL DEFAULT '0' COMMENT 'the id of the auction in tbl_auctions',
  `numBids` int(11) NOT NULL DEFAULT '0' COMMENT 'Number of times this has been bought.',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_ID` (`user_ID`),
  KEY `auction_id` (`auction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`id`, `user_ID`, `name`, `address1`, `city`, `state`, `country`, `zipcode`, `roofComposition`, `roofPic`, `inclination`, `direction`, `systemSize`, `area_sqft`, `cellType`, `installStyle`, `deadlineProposal`, `deadlineCompletion`, `RFPFile`, `financingOptions`, `transType`, `comments`, `quality`, `likelihood`, `monthlyUtilities`, `visible`, `price`, `auction_id`, `numBids`, `views`) VALUES
(9, 35, 'you too', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '2', '200.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_14_22_43_52_yii_wizard_behavior_manual.pdf', 's:0:"";', '', '', '', '0', '0.00', '', '', 11, 0, 0),
(10, 37, 'Aaron Kennedy', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '200.00', '0', '', '', '2012-08-03 00:00:00', '2012-12-08 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '2', '', '', '0', '0.00', '', '', 16, 0, 0),
(11, 38, 'some name', '', 'vancouver', 'BC', '', 'V6X2x6', '0', '', 0, 'NE', '200.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'b:0;', '', '', '', '', '0.00', '', '', 15, 0, 0),
(12, 39, 'Tom Kinshanko', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '200.00', '0', '', '', '2017-01-01 00:00:00', '2018-05-01 00:00:00', 'C:\\wamp\\www\\solarlist\\protected/RFPFiles/yii_wizard_behavior_manual.pdf', '', '', '', '', '', '0.00', '', '', 0, 0, 0),
(13, 40, 'Kevin Starke', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '200.00', '0', '', '', '2012-08-01 00:00:00', '2012-06-01 00:00:00', '', 'b:0;', '', '', '', '', '0.00', '', '', 17, 0, 0),
(14, 41, 'testy Mcgee', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '', '200.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '2012_02_14_22_17_25_yii_wizard_behavior_manual.pdf', 's:0:"";', '0', '', '', '0', '0.00', '', '', 18, 0, 0),
(15, 41, 'testy Mcgee', '', 'Vacnouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '200.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'b:0;', '', '', '', '0', '0.00', '', '', 14, 0, 0),
(16, 41, 'testy Mcgee', 'Some place 2005', 'Chillicwack', 'BC', '', 'V6Z2x6', '0', '', 0, 'N', '0.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(17, 41, 'testy Mcgee', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '0.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'b:0;', '', 'some comments', '', '0', '0.00', '', '', 13, 0, 0),
(18, 37, 'Aaron Kennedy', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '', '250.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 's:0:"";', '1', 'some comment field', '', '', '0.00', '', '', 0, 0, 0),
(19, 43, 'NEW Account', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '250.00', '0', '', '', '2012-06-01 00:00:00', '2015-01-01 00:00:00', 'C:\\wamp\\www\\solarlist\\protected/RFPFiles/2012_01_16_21_49_42_yii_wizard_behavior_manual.pdf', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(20, 44, 'Aaron Kennedy', '', 'Vancovuer', 'BC', '', 'ladskjfaskj.', '0', '', 0, 'N', '250.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', 'C:\\wamp\\www\\solarlist\\protected/RFPFiles/2012_01_16_22_10_22_yii_wizard_behavior_manual.pdf', 's:0:"";', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(21, 45, 'Bob Yoyoyuoyoyo', '701 - 207 w.hastings st', 'Vancouver', 'BC', '', 'V6B 1H7', '1', '', 2, 'SE', '100.00', '0', '', '', '2020-04-03 00:00:00', '2022-02-02 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"2";i:2;s:1:"4";}', '2', '', '', '0', '0.00', '', '', 0, 0, 0),
(23, 47, 'testfive testfivln', '5677 Huston Rd', 'Sardis', 'BC', '', 'V2R1B1', '0', '', 0, 'N', '150.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(24, 48, 'testerfive testerfiveln', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '45.00', '0', '', '', '2012-04-01 00:00:00', '2016-04-01 00:00:00', 'C:\\wamp\\www\\solarlist\\protected/RFPFiles/2012_01_23_19_01_51_yii_wizard_behavior_manual.pdf', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(25, 49, 'some guy', 'My address', 'Calgary', 'AB', '', 'V6Z2X6', '1', '', 1, '4', '30.00', '0', '', '', '2012-01-06 00:00:00', '2017-06-01 00:00:00', '', 'a:1:{i:0;s:1:"2";}', '0', 'This is a new project and I like it.', '', '0', '0.00', '', '', 3, 0, 0),
(26, 50, 'testerseven testsevenln', '20', 'Winnipeg', 'MB', '', 'V6Z2X6', '0', '', 0, 'N', '15.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"3";}', '0', 'Some comments go here', '', '0', '0.00', '', '', 0, 0, 0),
(27, 49, 'some guy', '12314 Homer St', 'Winnipeg', 'MB', '', 'V6Z2X6', '0', '', 0, '3', '20.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '2', '', '', '0', '0.00', '', '', 4, 0, 0),
(28, 51, 'mynew name', '', 'Vancouver', 'BC', '', 'V6Z2x6', '0', '', 0, 'N', '5.00', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '', '0.00', '', '', 0, 0, 0),
(29, 51, 'mynew name', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'N', '10.00', '0', '', '', '2014-01-01 00:00:00', '2016-01-01 00:00:00', '', 'a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(32, 49, 'some guy', '1000 manitoba Ave', 'winnipeg', 'MB', '', 'V6Z2X6', '0', '', 0, '0', '1.80', '0', '', '', '2017-03-01 00:00:00', '2020-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '0', 'Some comments', '', '0', '0.00', '', '', 5, 0, 0),
(33, 53, 'riki mcbride', '501 Pacific Street', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, 'E', '0.45', '0', '', 'Residential Project', '2014-03-01 00:00:00', '2017-06-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(34, 53, 'riki mcbride', '5677 Huston Rd', 'Sardis', 'BC', '', 'V2R1B1', '0', '', 0, '2', '1.80', '0', '', 'Residential Project', '2013-01-01 00:00:00', '2014-07-31 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"2";}', '', '', '', '', '0.00', '', '', 0, 0, 0),
(35, 54, 'aaron kenendy', '501 Pacific', 'Ottawa', 'ON', '', 'V4G54W', '0', '', 0, '0', '1.50', '0', '', 'Residential Project', '2012-04-01 00:00:00', '2012-07-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(36, 55, 'First Last', '5677 Huston Rd', 'Sardis', 'BC', '', 'V2R1B1', '0', '', 0, '1', '1.80', '0', '', 'Residential Project', '2012-03-01 00:00:00', '2017-05-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '0', '0.00', '', '', 1, 0, 0),
(37, 56, 'Thomas Kineshanko', '', 'San Antonio', 'BC', '', '70011', '1', '', 0, '', '1.50', '0', '', 'Residential Project', '2015-01-01 00:00:00', '2016-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"2";}', '2', '', '', '2', '0.00', '', '', 0, 0, 0),
(38, 57, 'Aaron Kennedy', '501 Pacific Street', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 1, '1', '2.25', '0', '', 'Light Commercial Project', '2015-03-01 00:00:00', '2016-06-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '', '', '', '0', '0.00', '', '', 7, 0, 0),
(39, 57, 'Aaron Kennedy', '124 Queen Street', 'Ottawa', 'ON', '', 'V2T252', '0', '', 0, '1', '2.25', '0', '', 'Light Commercial Project', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:1:{i:0;s:1:"3";}', '', '', '', '0', '0.00', '', '', 0, 0, 0),
(40, 49, 'some guy', '', 'Huston', 'TX', '', '50077', '0', '', 1, '4', '1.55', '0', '', 'Residential Project', '2013-01-01 00:00:00', '2014-01-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '1', '0.00', '', '', 8, 0, 0),
(41, 57, 'Aaron Kennedy', '5901 Gladewoods Crescent', 'Ottawa', 'ON', '', 'V4z1E5', '1', '', 2, '1', '1.45', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 's:0:"";', '0', 'Only looking for a quote no auction wanted.', '', '0', '0.00', '', '', 9, 0, 0),
(42, 49, 'some guy', '48905 Hendersen Rd', 'Cultus Lake', 'BC', '', 'V4Z1B1', '1', '', 0, '2', '2.30', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'a:1:{i:0;s:1:"3";}', '0', 'Large surface barn type of array.', '', '0', '0.00', '', '', 10, 0, 0),
(43, 49, 'some guy', '', 'Genoa Bay', 'BC', '', 'V4R2E3', '1', '', 2, '2', '2.25', '0', '', 'Light Commercial Project', '2015-05-01 00:00:00', '2015-03-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '', '0.00', '', '', 12, 0, 0),
(44, 49, 'some guy', '', 'Black Moan', 'TN', '', '90210', '0', '', 0, '0', '1.80', '0', '', 'Residential Project', '2015-03-01 00:00:00', '2016-03-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '', '0.00', '', '', 20, 0, 0),
(45, 49, 'some guy', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '4', '2.25', '0', '', 'Light Commercial Project', '2015-04-01 00:00:00', '2014-10-01 00:00:00', '', 'a:1:{i:0;s:1:"1";}', '2', '', '', '', '0.00', '', '', 19, 0, 0),
(46, 58, 'night guy', '', 'Sakatoon', 'SK', '', 'V6Z2X6', '1', '', 0, '5', '2.00', '0', '', 'Residential Project', '2015-05-01 00:00:00', '2018-06-01 00:00:00', '2012_02_16_04_31_22_yii_wizard_behavior_manual.pdf', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '0', 'THis is a sweet site.', '', '', '500.00', '', '', 0, 0, 0),
(47, 58, 'night guy', '', 'Vancouver', 'BC', '', 'V6Z2x6', '1', '', 0, '4', '1.35', '0', '', 'Residential Project', '2016-01-01 00:00:00', '2017-01-01 00:00:00', '2012_02_16_04_27_54_yii_wizard_behavior_manual.pdf', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '', '', '', '', '65.00', '', '', 0, 0, 0),
(48, 58, 'night guy', '', 'Vancouver', 'BC', '', 'V6Z2X6', '0', '', 0, '4', '2.30', '0', '', 'Light Commercial Project', '2014-01-01 00:00:00', '2014-03-01 00:00:00', '', 'a:2:{i:0;s:1:"0";i:1;s:1:"4";}', '', '', '', '', '250.00', '', '', 22, 0, 0),
(49, 58, 'night guy', '', 'Montreal', 'QC', '', '345678', '2', '2012_02_16_04_41_08_CIMG2401.JPG', 1, '3', '2.25', '0', '', 'Light Commercial Project', '2013-01-01 00:00:00', '2014-01-01 00:00:00', '2012_02_16_04_41_08_CIMG2401.JPG', 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}', '2', '', '', '', '350.00', '', '', 21, 0, 0),
(50, 58, 'night guy', '', 'Huston', 'TX', '', '770057', '0', '', 0, '4', '0.00', '0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '2', '', '', '', '400.00', '', '', 0, 0, 0),
(51, 58, 'night guy', '', 'Huston', 'TX', '', '7700557', '3', '', 0, '4', '2.10', '0', '', '', '2012-01-01 00:00:00', '2012-01-01 00:00:00', '', 'a:1:{i:0;s:1:"0";}', '0', '', '', '', '0.00', '', '', 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD CONSTRAINT `tbl_leads_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
