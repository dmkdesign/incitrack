-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2014 at 11:54 PM
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
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
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
  `helpText` varchar(1000) DEFAULT NULL,
  `css` varchar(256) DEFAULT NULL COMMENT 'CSS used to style choices',
  `page_id` int(11) NOT NULL,
  `choicesView` varchar(256) NOT NULL DEFAULT '' COMMENT 'The view name for displaying the choices',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`, `helpText`, `css`, `page_id`, `choicesView`) VALUES
(1, 'firstName', 'Employee First Name', 'VARCHAR', 255, 0, 3, '', '', '', '', '', '', '', 0, 1, NULL, NULL, 1, ''),
(22, 'lastName', 'Employee Last Name', 'VARCHAR', 255, 0, 3, '', '', '', '', '', '', '', 1, 3, '', '', 1, ''),
(23, 'dateIncident', 'Incident Date', 'DATETIME', 0, 0, 3, '', '', 'Please enter the date that the incident occured on', '', '', '', '', 1, 3, '', '', 2, '_datetime'),
(24, 'incidentaddress', 'Address of Incident', 'VARCHAR', 500, 0, 1, '', '', '', '', '', '', '', 0, 3, '', '', 2, ''),
(25, 'incidentDetails', 'Describe the injury to the body part in detail.', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 8, 3, '', '', 2, ''),
(28, 'gender', 'Gender', 'RADIO', 255, 0, 1, '', '', 'Required', '', '', '', '', 2, 3, '', 'horRadioGroup', 1, ''),
(29, 'dateOfBirth', 'Date Of Birth', 'DATE', 0, 0, 1, '', '', '', '', '', '', '', 3, 2, '', '', 1, '_datetime'),
(30, 'age', 'Age', 'INTEGER', 2, 0, 0, '', '', '', '', '', '', '', 4, 2, '', '', 1, 'dateofbirth'),
(31, 'employeeNumber', 'Employee Number', 'VARCHAR', 10, 0, 2, '', '', '', '', '', '', '', 3, 1, '', '', 1, ''),
(32, 'mailingAddress', 'Mailing Address', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 6, 1, '', '', 1, 'mailfields'),
(33, 'localAddress', 'Local Address', 'VARCHAR', 256, 0, 2, '', '', '', '', '', '', '', 7, 1, '', '', 1, ''),
(34, 'department', 'Department', 'VARCHAR', 128, 0, 2, '', '', '', '', '', '', '', 8, 2, '', '', 1, ''),
(35, 'yearscompany', 'Years with the Company', 'FLOAT', 3, 0, 1, '', '', '', '', '', '', '', 9, 2, '', '', 1, ''),
(36, 'yearsDepartment', 'Years in current department', 'FLOAT', 3, 0, 1, '', '', '', '', '', '', '', 11, 3, '', '', 1, ''),
(37, 'investigator', 'Investigator(s)', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 0, 1, '', '', 3, ''),
(38, 'dateInvestigated', 'Date and Time of Investigation', 'DATETIME', 0, 0, 1, '', '', '', '', '', '', '', 1, 2, '', '', 3, '_datetime'),
(40, 'dateReported', 'Date and Time Reported', 'DATETIME', 0, 0, 1, '', '', '', '', '', '', '{"0":"defaultDate","1":"model","2":"question","3":"form","ui-theme":"base","language":"en","createDate":"true","createTime":"true"}', 4, 3, '', '', 3, '_datetime'),
(42, 'reportedTo', 'Reported to (Employee Name/Title)', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 6, 2, '', '', 3, ''),
(43, 'employeeSupervisor', 'Employee''s Supervisor', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 0, 2, '', '', 3, ''),
(44, 'shiftStartTime', 'Shift Start Time', 'TIME', 0, 0, 1, '', '', '', '', '', '', '', 3, 2, '', '', 2, '_datetime'),
(45, 'jobNumber', 'Job Number', 'INTEGER', 10, 0, 2, '', '', '', '', '', '', '', 5, 2, '', '', 2, ''),
(46, 'incidentClassification', 'Classification of Incident', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 6, 2, '', 'horRadioGroup', 2, ''),
(47, 'whilePerforming', 'Incident While Performing', 'RADIO', 255, 0, 1, '', '', '', '', '', '', '', 7, 2, '', 'horRadioGroup', 2, ''),
(48, 'injuryType', 'Type of Injury', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 12, 3, '', 'horRadioGroup', 2, ''),
(49, 'injuryDescription', 'Injury Description', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 11, 2, '', '', 2, ''),
(50, 'bodyPartHead', 'Head', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 9, 3, '', 'horRadioGroup', 2, '_bodyPartInjured'),
(51, 'bodyPartUpperBody', 'Upper Body', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 9, 0, '', 'horRadioGroup', 2, ''),
(52, 'bodyPartLowerBody', 'Lower Body', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 10, 0, '', 'horRadioGroup', 2, ''),
(53, 'wasWorking', 'Was the employee working alone at the time of the incident?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 13, 3, '', 'YNdropdown', 2, ''),
(54, 'workedOvertime', 'Had the employee worked overtime between 9pm and their next shift?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 13, 3, '', 'YNdropdown', 2, ''),
(55, 'CATevent', 'Did it occur during a CAT Event?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 14, 3, '', 'YNdropdown', 2, ''),
(56, 'sentHome', 'Was the worker sent home?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 15, 3, '', 'YNdropdown', 2, ''),
(57, 'reportNextDay', 'Did the employee report to work the next day?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 16, 3, '', 'YNdropdown', 2, ''),
(58, 'lostTime', 'Did the employee lose time from work?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 17, 3, '', 'YNdropdown', 2, ''),
(59, 'returnSameDay', 'Did the employee return to work the same day?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 18, 3, '', 'YNdropdown', 2, ''),
(60, 'reportedInjuries', 'Did the employee have any previously reported injuries?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 19, 3, '', 'YNdropdown', 2, ''),
(61, 'processInfluenced', 'Did process contribute to the accident?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 20, 3, '', 'YNdropdown', 2, ''),
(62, 'jobsiteHazardContributed', 'Did a job site hazard contribute to the incident?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 21, 3, '', 'YNdropdown', 2, ''),
(63, 'playSports', 'Does the employee actively play sports?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 22, 3, '', 'YNdropdown', 2, ''),
(64, 'siteSafetyAssessment', 'Was a site safety assessment completed?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 1, 3, '', 'YNdropdown', 4, ''),
(65, 'assessmentReviewed', 'Was the assessment reviewed by the worker?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 2, 3, '', 'YNdropdown', 4, ''),
(66, 'sourceOnSafetyAssessment', 'Was the source identified on the site safety assessment?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 3, 3, '', 'YNdropdown', 4, ''),
(67, 'assessmentAdequate', 'Was the site safety assessment adequate?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 4, 3, '', 'YNdropdown', 4, ''),
(68, 'toolboxCompleted', 'Was a safety toolbox meeting completed?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 5, 3, '', 'YNdropdown', 4, ''),
(69, 'workerAttendToolbox', 'Did the worker attend the toolbox meeting? ', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 6, 3, '', 'YNdropdown', 4, ''),
(70, 'sourceInToolbox', 'Was the source identified in the toolbox meting?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 7, 3, '', 'YNdropdown', 4, ''),
(71, 'toolboxAdequate', 'Was the toolbox meeting adequate?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 8, 3, '', 'YNdropdown', 4, ''),
(72, 'safeWorkPracticeAvailable', 'Was a safe work practice available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 9, 3, '', 'YNdropdown', 4, ''),
(73, 'safeworkPracticeReviewed', 'Was the safe work practice reviewed by the worker?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 10, 3, '', 'YNdropdown', 4, ''),
(74, 'procedureAvailable', 'Was a safe work procedure available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 11, 3, '', 'YNdropdown', 4, ''),
(75, 'procedureReviewed', 'Was the safe work procedure reviewed by the worker', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 12, 3, '', 'YNdropdown', 4, ''),
(76, 'injurySource', 'Source of Injury', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 1, 3, '', 'horRadioGroup', 5, ''),
(77, 'typeHazard', 'Type of Hazard', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 2, 3, '', '', 5, '_hazardType'),
(78, 'descriptionTasks', 'Description of work tasks being performed at the time of incident.', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 3, 3, '', '', 5, ''),
(79, 'equipmentUsed', 'Equipment / Tool / Substance being used at the time of incident.', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 4, 3, '', '', 5, ''),
(80, 'siteSafetyStatus', 'Site Safety Action Assessment was:', 'VARCHAR', 50, 0, 1, '', '==;Incomplete==Incomplete;Appropriate==Appropriate;Improper==Improper;Inadequate==Inadequate', '', '', '', '', '', 5, 3, '', '', 5, ''),
(81, 'probabilityReocurrence', 'Probability of Reoccurence', 'VARCHAR', 50, 0, 1, '', '==;None==None;Low==Low;Moderate==Moderate;High==High', '', '', '', '', '', 6, 3, '', '', 5, ''),
(82, 'probableCause', 'Probable Cause (What action or failure to act directly caused the incident?)', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 1, 3, '', 'horRadioGroup', 6, ''),
(83, 'primaryCauseDescription', 'Add Brief Description of Primary Causes', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 2, 2, '', '', 6, ''),
(84, 'remedialAction', 'What remedial action has been or will be taken to prevent recurrence?', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 1, 3, '', 'vertRadioGroup', 7, ''),
(85, 'witness1Name', 'Witness 1 Name', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 1, 2, '', '', 8, ''),
(86, 'witness1Contact', 'Enter Contact Details', 'VARCHAR', 500, 0, 0, '', '', '', '', '', '', '', 2, 2, '', '', 8, ''),
(87, 'witness1Statement', 'Enter Witness Statement', 'TEXT', 10000, 0, 0, '', '', '', '', '', '', '', 3, 2, '', '', 8, ''),
(88, 'witness2Name', 'Witenss 2 Name', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 4, 2, '', '', 8, ''),
(89, 'witness2Contact', 'Enter Witness Statement', 'VARCHAR', 500, 0, 0, '', '', '', '', '', '', '', 5, 2, '', '', 8, ''),
(90, 'witness2Statement', 'Enter Witness Statement', 'TEXT', 10000, 0, 0, '', '', '', '', '', '', '', 6, 2, '', '', 8, ''),
(91, 'firstAidAdministered', 'Worker Received First Aid at Site?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 7, 3, '', 'YNdropdown', 8, ''),
(92, 'firstAidReport', 'Was a first aid report available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 8, 2, '', 'YNdropdown', 8, ''),
(93, 'firstAidAttendant', 'First Aid Attendant', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 9, 2, '', '', 8, ''),
(94, 'attendantContactInfo', 'First Aid Attendant Contact Info', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 10, 2, '', '', 8, ''),
(95, 'firstAidNotes', 'First Aid Report Notes', 'TEXT', 0, 10000, 0, '', '', '', '', '', '', '', 11, 2, '', '', 8, ''),
(96, 'clinicHospital', 'Did the worker got to a clinic or hospital?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 12, 2, '', 'YNdropdown', 8, ''),
(97, 'returnWorkReport', 'Physician''s Return to Work Report Available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 13, 2, '', 'YNdropdown', 8, ''),
(98, 'clinicHospitalReport', 'Clinic/Hospital Report Noted', 'TEXT', 10000, 0, 2, '', '', '', '', '', '', '', 14, 2, '', '', 8, ''),
(99, 'investigator1', 'Investigator (Completed Form)', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 15, 2, '', 'investigator', 8, ''),
(100, 'investigator2', 'Investigator', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 16, 2, '', 'investigator', 8, ''),
(101, 'worker1', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 17, 2, '', 'investigator', 8, ''),
(102, 'worker2', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 18, 2, '', 'investigator', 8, ''),
(103, 'worker3', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 19, 2, '', 'investigator', 8, ''),
(104, 'result', 'Result', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 1, 2, '', '', 9, ''),
(105, 'conclusion', 'Conclusion', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 2, 2, '', '', 9, ''),
(106, 'company', 'This should be hidden', 'INTEGER', 10, 0, 0, '', '', '', '', '0', '', '', 0, 0, '', '', 0, ''),
(107, 'branch', 'This should be hidden', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 0, 0, '', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
