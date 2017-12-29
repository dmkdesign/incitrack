-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2014 at 11:49 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `incidents`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chart`
--

CREATE TABLE IF NOT EXISTS `tbl_chart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(5) NOT NULL,
  `menuLabel` varchar(255) NOT NULL,
  `chartTitle` varchar(1000) NOT NULL,
  `isPie` int(1) NOT NULL DEFAULT '1',
  `isBar` int(1) NOT NULL DEFAULT '1',
  `customView` varchar(255) NOT NULL,
  `chartType` int(3) NOT NULL,
  `section` int(3) NOT NULL,
  `sequence` int(3) NOT NULL DEFAULT '99',
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_chart`
--

INSERT INTO `tbl_chart` (`id`, `q_id`, `menuLabel`, `chartTitle`, `isPie`, `isBar`, `customView`, `chartType`, `section`, `sequence`, `publish`) VALUES
(1, 46, 'Classification of Incident', 'How was this incident classified?', 1, 1, '', 3, 1, 0, 1),
(2, 54, 'Work Procedure Available', 'Was a work procedure available?', 1, 1, '', 3, 6, 0, 1),
(3, 47, 'What was the employee performing during incident', 'What was the employee performing during incident', 1, 1, '', 3, 1, 1, 1),
(6, 76, 'Source of Injury', 'Source of Injury', 1, 1, '', 3, 1, 1, 1),
(7, 23, 'Day of the Week', 'What day of the week did the incident occur on?', 1, 1, 'dayOfWeek', 3, 0, 1, 1),
(8, 23, 'Time of Day', 'What time of day did the incident occur?', 1, 1, 'timeOfDay', 3, 0, 0, 1),
(9, 54, 'Incidents with overtime prior to shift ', 'Incidents with overtime prior to shift ', 0, 1, '', 3, 6, 0, 1),
(11, 50, 'Accidents by Head Injury', 'Accidents by Head Injury', 1, 0, '', 3, 2, 1, 1),
(12, 51, 'Accidents by Upper Body Injury', 'Accidents by Upper Body Injury', 1, 0, '', 3, 2, 2, 1),
(13, 52, 'Accidents by Lower Body Injury', 'Accidents by Lower Body Injury', 1, 0, '', 3, 2, 3, 1),
(14, 50, 'Accidents by Area Injured', 'Accidents by Area Injured', 1, 0, 'areaInjured', 3, 2, 0, 1),
(17, 77, 'Accidents by Type of Hazard', 'Accidents by Type of Hazard', 1, 1, 'typeHazard', 3, 3, 0, 1),
(18, 77, 'Accidents by Type of Hazard (Slip/Trip/Fall)', 'Accidents by Type of Hazard (Slip/Trip/Fall)', 1, 0, 'typestf', 3, 3, 1, 1),
(19, 77, 'Accidents by Type of Hazard (Mechanical Hazard)', 'Accidents by Type of Hazard (Mechanical Hazard)', 1, 0, 'typemh', 3, 3, 2, 1),
(20, 77, 'Accidents by Type of Hazard (Physical Hazard)', 'Accidents by Type of Hazard (Physical Hazard)', 1, 0, 'typeph', 3, 3, 3, 1),
(21, 77, 'Accidents by Type of Hazard (Environmental Hazardl)', 'Accidents by Type of Hazard (Environmental Hazard)', 1, 1, 'typeeh', 3, 3, 4, 1),
(22, 77, 'Accidents by Type of Hazard (Chemical Hazard)', 'Accidents by Type of Hazard (Chemical Hazard)', 1, 1, 'typech', 3, 3, 5, 1),
(23, 77, 'Accidents by Type of Hazard (Biological Hazard)', 'Accidents by Type of Hazard (Biological Hazard)', 1, 1, 'typebh', 3, 3, 6, 1),
(24, 77, 'Accidents by Type of Hazard (Confined Space)', 'Accidents by Type of Hazard (Confined Space)', 1, 1, 'typecs', 3, 3, 7, 1),
(25, 23, 'Monthly Trends', 'Monthly Trends', 1, 0, 'monthlyTrend', 3, 0, 2, 1),
(26, 48, 'Type of Injury', 'Type of Injury', 1, 1, '', 3, 1, 3, 1),
(27, 82, 'Probable Cause', 'Probable Cause of Incident', 1, 1, '', 3, 4, 0, 1),
(28, 81, 'Probability of Reoccurence', 'Probability of Reoccurence', 1, 1, '', 3, 1, 5, 1),
(29, 28, 'Gender', 'Gender', 1, 1, '', 3, 5, 2, 1),
(30, 34, 'Department', 'Department of Employee', 1, 1, '', 3, 5, 2, 0),
(31, 84, 'Remedial Action', 'What remedial actions will be implemented.', 1, 1, '', 3, 4, 3, 1),
(32, 80, 'Site Safety Action Assessment', ' Site Safety Action Assessment Status', 1, 1, '', 3, 1, 4, 1),
(33, 64, 'Site Safety Assessment', 'Was a site safety assessment completed?', 1, 1, '', 3, 6, 0, 1),
(34, 65, 'Site Safety Assessment Review', 'Was the site safety assessment reviewed by the worker?', 1, 1, '', 3, 6, 1, 1),
(35, 66, 'Source Identified', 'Was the source identified on the site safety assessment?', 1, 1, '', 3, 6, 2, 1),
(36, 67, 'Safety Assessment Adequate', 'Was the site safety assessment adequate?', 1, 1, '', 3, 6, 3, 1),
(37, 68, 'Safety Toolbox Meeting', 'Was a safety toolbox meeting completed?', 1, 1, '', 3, 6, 4, 1),
(38, 69, 'Toolbox Attendance', 'Did the worker attend the toolbox meeting? ', 1, 1, '', 3, 0, 5, 1),
(39, 70, 'Source in the Toolbox Meeting?', 'Was the source identified in the toolbox meting?', 1, 1, '', 3, 6, 6, 1),
(40, 71, 'Toolbox Meeting Adequate', 'Was the toolbox meeting adequate?', 1, 1, '', 3, 6, 7, 1),
(41, 72, 'Safe Work Practice Available', 'Was a safe work practice available?', 1, 1, '', 3, 6, 8, 1),
(42, 73, 'Safe Work Practice Reviewed', 'Was the safe work practice reviewed by the worker?', 1, 1, '', 3, 6, 9, 1),
(43, 74, 'Safe Work Procedure Available', 'Was a safe work procedure available?', 1, 1, '', 3, 6, 10, 1),
(44, 75, 'Safe Work Procedure Reviewed', 'Was the safe work procedure reviewed by the worker', 1, 1, '', 3, 6, 11, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
