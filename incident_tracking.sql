-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 02:42 PM
-- Server version: 5.6.16
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `incident_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `ref_number` int(11) NOT NULL,
  `team_leader` varchar(100) NOT NULL,
  `investigation_date` date NOT NULL,
  `first_person` varchar(100) NOT NULL,
  `second_person` varchar(100) NOT NULL,
  `third_person` varchar(100) NOT NULL,
  `fourth_person` varchar(100) NOT NULL,
  `firth_person` varchar(100) NOT NULL,
  `sixth_person` varchar(100) NOT NULL,
  `first_sign` varchar(100) NOT NULL,
  `second_sign` varchar(100) NOT NULL,
  `third_sign` varchar(100) NOT NULL,
  `fourth_sign` varchar(100) NOT NULL,
  `firth_sign` varchar(100) NOT NULL,
  `sixth_sign` varchar(100) NOT NULL,
  `methods` varchar(100) NOT NULL,
  `findings` varchar(100) NOT NULL,
  `causes` varchar(100) NOT NULL,
  `leader_sign` varchar(100) NOT NULL,
  `leader_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`ref_number`, `team_leader`, `investigation_date`, `first_person`, `second_person`, `third_person`, `fourth_person`, `firth_person`, `sixth_person`, `first_sign`, `second_sign`, `third_sign`, `fourth_sign`, `firth_sign`, `sixth_sign`, `methods`, `findings`, `causes`, `leader_sign`, `leader_date`) VALUES
(0, 'Lab Technician', '2016-08-20', 'Peter Ndebi', 'Joshua Ndebi', 'Tungu Ndebi', '', '', '', 'hkdhckg', 'hvhghchfdk', 'vbchdfbd', '', '', '', 'Staff Interviews', 'The sample was spilled from the test tube.', 'improper packaging of sample', 'hfgfhkdghgkgv', '2016-08-20'),
(0, 'Zephaniah Banda', '2016-08-21', 'Charles Mulenga', 'Purity Banda', '', '', '', '', 'hkdhckg', 'hvhghchfdk', '', '', '', '', 'Fishbone diagram', 'The finds here are not important', 'This was done by good faith.', 'hfgfhkdghgkgv', '2016-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`ref_number`, `selected`) VALUES
(13, 'Hardware failure');

-- --------------------------------------------------------

--
-- Table structure for table `corrective_actions`
--

CREATE TABLE `corrective_actions` (
  `ref_number` int(11) NOT NULL,
  `correctiveAction` varchar(200) NOT NULL,
  `correctiveDate` date NOT NULL,
  `correctiveName` varchar(50) NOT NULL,
  `correctiveSign` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corrective_actions`
--

INSERT INTO `corrective_actions` (`ref_number`, `correctiveAction`, `correctiveDate`, `correctiveName`, `correctiveSign`) VALUES
(0, '', '0000-00-00', '', ''),
(0, '', '0000-00-00', '', ''),
(57, '', '0000-00-00', '', ''),
(57, '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `corrective_review`
--

CREATE TABLE `corrective_review` (
  `ref_number` varchar(100) NOT NULL,
  `effectiveName` varchar(100) NOT NULL,
  `effectiveDate` date NOT NULL,
  `effectiveSign` varchar(100) NOT NULL,
  `correctiveReview` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corrective_review`
--

INSERT INTO `corrective_review` (`ref_number`, `effectiveName`, `effectiveDate`, `effectiveSign`, `correctiveReview`) VALUES
('', '', '0000-00-00', '', ''),
('', '', '0000-00-00', '', ''),
('57b83386861ea', '', '0000-00-00', '', ''),
('57b98c5d0e91c', 'Joshua', '2016-08-21', 'nblnnblk', ''),
('2', 'demo', '2016-11-09', 'demo', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `departmet`
--

CREATE TABLE `departmet` (
  `department_id` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmet`
--

INSERT INTO `departmet` (`department_id`, `department_name`) VALUES
('1', 'BACTERIOLOGY'),
('10', 'PREMIER'),
('11', 'SEXUALLY TRANSMITTED INFECTIONS (STI)'),
('12', 'TUBERCULOSIS (TB)'),
('13', 'VIROLOGY'),
('14', 'GENERAL'),
('2', 'CHEMISTRY'),
('3', 'HISTOLOGY'),
('4', 'CYTOLOGY'),
('5', 'MORTUARY'),
('6', 'HAEMATOLOGY'),
('7', 'PEDIATRICS'),
('8', 'PARASITOLOGY'),
('9', 'CENTRAL SPECIMEN RECEPTION');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_information`
--

CREATE TABLE `form_information` (
  `ref_number` int(11) NOT NULL,
  `dateOfIncident` date NOT NULL,
  `incidentTime` time NOT NULL,
  `labUnit` varchar(70) NOT NULL,
  `incidentSite` varchar(100) NOT NULL,
  `nameOfPatient` varchar(100) NOT NULL,
  `lotId` varchar(100) NOT NULL,
  `specimen` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `clinicalArea` varchar(100) NOT NULL,
  `personNotified` varchar(100) NOT NULL,
  `notificationDate` date NOT NULL,
  `responsiblePerson` varchar(100) NOT NULL,
  `reporterName` varchar(100) NOT NULL,
  `dateReported` date NOT NULL,
  `reportInitiator` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `reportedToPosition` varchar(100) NOT NULL,
  `formAction` varchar(15) NOT NULL,
  `specimenOther` varchar(100) NOT NULL,
  `identifierOther` varchar(100) NOT NULL,
  `actionTaken` varchar(300) NOT NULL,
  `closeOut` varchar(200) NOT NULL,
  `classification` varchar(15) NOT NULL,
  `rootCause` varchar(300) NOT NULL,
  `correctiveAction` varchar(200) NOT NULL,
  `completionDate` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `extendedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_information`
--

INSERT INTO `form_information` (`ref_number`, `dateOfIncident`, `incidentTime`, `labUnit`, `incidentSite`, `nameOfPatient`, `lotId`, `specimen`, `identifier`, `clinicalArea`, `personNotified`, `notificationDate`, `responsiblePerson`, `reporterName`, `dateReported`, `reportInitiator`, `designation`, `reportedToPosition`, `formAction`, `specimenOther`, `identifierOther`, `actionTaken`, `closeOut`, `classification`, `rootCause`, `correctiveAction`, `completionDate`, `status`, `extendedDate`) VALUES
(2, '2016-08-21', '12:59:00', 'Cytology', 'UTH-Lab', 'Zulu Charles', '1233490', 'Swab', 'Clinical Staff', 'lab unit', 'NURSE', '2016-08-21', 'Doctor', 'cathia', '2016-08-21', 'Lab Technician', 'dhgifhgiiufguihufh', 'fkhkhgkfhgjkkhgf', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00'),
(12, '2017-05-27', '21:58:46', 'Chemistry', 'Lusaka', 'Centrifuge', '65652', 'Urine', 'Clinical Staff', 'yes', 'Doctor', '2017-05-27', 'Dr. H.D Turna', 'J Soko', '2017-05-27', 'LabTechnician', 'Children''s ward', 'Lab Techinician', 'corrective', '', '', 'the specimen got lot in transit to the lab. I do not know what happened\r\n                                            ', 'yet to respond', 'medium', 'The vehicle carrying the specimen went missing', 'Asked for another specimen', '2017-05-29', 'closed', '2017-05-27'),
(13, '2017-05-27', '22:13:43', 'Haemotology', 'Ndola', 'Fridge', '124578', 'Blood', 'Clinical Staff', 'not_required', 'Nurse', '2017-05-27', 'Jacky Chan', 'Don Wuliyo', '2017-05-27', 'LabTechnician', 'Cancer ward', 'position', 'preventive', '', '', 'The computer that was handling the analysis just froze and would not start again. This caused the specimen to get corrupt rendering it useless.                       ', 'This incident was a mistake, period.', 'high', 'Computer crash', 'Need to maintain computers regularly', '2017-05-30', 'Extent', '2017-05-27'),
(15, '2017-05-28', '22:45:33', 'Sexually transmitted infections (STI)', 'Ndola', 'Storage room', '7895', 'Blood', 'Clinical Staff', 'yes', 'Doctor', '2017-05-28', 'I. Thomas', 'I. Thomas', '2017-05-28', 'LabTechnician', 'repcetion', 'moderator', 'corrective', '', '', 'Management has did not authorize this operation in advance. thus, the delayed work\r\n                                            ', 'yet to respond', 'low', 'Delayed authorization', 'send request well in advance', '2017-05-30', 'closed', '2017-05-28'),
(16, '2017-05-29', '15:07:25', 'Chemistry', 'Lusaka', 'Sringe', '7896', 'Blood', 'Clinical Staff', 'yes', 'Doctor', '2017-05-29', 'Dr. H.D Turna', 'B. Jordan', '2017-05-29', 'LabTechnician', 'Children''s ward', 'Head Of Department', 'preventive', '', '', 'Something about the syringe breaking and blood everywhere. Kay hat happened \r\n                                            ', 'Yet to respond', 'medium', 'Syringe break happened', 'took dude to the ER', '2017-05-29', 'closed', '2017-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `mls_banned`
--

CREATE TABLE `mls_banned` (
  `userid` int(11) NOT NULL,
  `until` int(11) NOT NULL,
  `by` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mls_groups`
--

CREATE TABLE `mls_groups` (
  `groupid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `canban` int(11) NOT NULL,
  `canhideavt` int(11) NOT NULL,
  `canedit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mls_groups`
--

INSERT INTO `mls_groups` (`groupid`, `name`, `type`, `priority`, `color`, `canban`, `canhideavt`, `canedit`) VALUES
(1, 'Guest', 0, 1, '', 0, 0, 0),
(2, 'Lab Technician', 1, 1, '#08c', 0, 0, 0),
(3, 'Head Of Lab Unit', 2, 1, 'green', 1, 1, 1),
(4, 'Quality Officer', 3, 1, '#F0A02D', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mls_privacy`
--

CREATE TABLE `mls_privacy` (
  `userid` int(11) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mls_privacy`
--

INSERT INTO `mls_privacy` (`userid`, `email`) VALUES
(1, 0),
(3, 0),
(4, 0),
(5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mls_settings`
--

CREATE TABLE `mls_settings` (
  `settings_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'Demo Site',
  `url` varchar(300) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `max_ban_period` int(11) NOT NULL DEFAULT '10',
  `register` int(11) NOT NULL DEFAULT '1',
  `email_validation` int(11) NOT NULL DEFAULT '0',
  `captcha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mls_settings`
--

INSERT INTO `mls_settings` (`settings_id`, `site_name`, `url`, `admin_email`, `max_ban_period`, `register`, `email_validation`, `captcha`) VALUES
(1, 'Non-Conformance DB', 'http://localhost/project/', 'johndoe@gmail.com', 10, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mls_users`
--

CREATE TABLE `mls_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(50) NOT NULL,
  `validated` varchar(100) NOT NULL,
  `groupid` int(11) NOT NULL DEFAULT '2',
  `lastactive` int(11) NOT NULL,
  `showavt` int(11) NOT NULL DEFAULT '1',
  `banned` int(11) NOT NULL,
  `regtime` int(11) NOT NULL,
  `department_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mls_users`
--

INSERT INTO `mls_users` (`userid`, `username`, `display_name`, `password`, `email`, `key`, `validated`, `groupid`, `lastactive`, `showavt`, `banned`, `regtime`, `department_id`) VALUES
(1, 'QualityOfficer', 'QualityOfficer', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin@gmail.com', '', '1', 4, 1496145520, 1, 0, 1469000262, '0'),
(3, 'HeadOfLabUnit', 'Head Of Lab Unit', '4b8373d016f277527198385ba72fda0feb5da015', 'peterndebi@gmail.com', '', '1', 3, 1496214348, 1, 0, 1469078427, '2'),
(4, 'Pedro', 'Lab Technician', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pedro@gmail.com', '', '1', 2, 1469142715, 1, 0, 1469082541, '3'),
(5, 'LabTechnician', 'Lab Technician', '4b8373d016f277527198385ba72fda0feb5da015', 'lab@uth.com', '', '1', 2, 1496221447, 1, 0, 1469143796, '4');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qc_eqa`
--

CREATE TABLE `qc_eqa` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safety`
--

CREATE TABLE `safety` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specimen_management`
--

CREATE TABLE `specimen_management` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specimen_management`
--

INSERT INTO `specimen_management` (`ref_number`, `selected`) VALUES
(0, ''),
(0, ''),
(0, ''),
(0, ''),
(0, ''),
(0, ''),
(13, 'Specimen lost'),
(16, 'Specimen lost');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `ref_number` int(11) NOT NULL,
  `selected` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmet`
--
ALTER TABLE `departmet`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `form_information`
--
ALTER TABLE `form_information`
  ADD PRIMARY KEY (`ref_number`);

--
-- Indexes for table `mls_banned`
--
ALTER TABLE `mls_banned`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `mls_groups`
--
ALTER TABLE `mls_groups`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `mls_privacy`
--
ALTER TABLE `mls_privacy`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `mls_settings`
--
ALTER TABLE `mls_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `mls_users`
--
ALTER TABLE `mls_users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_information`
--
ALTER TABLE `form_information`
  MODIFY `ref_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mls_groups`
--
ALTER TABLE `mls_groups`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mls_settings`
--
ALTER TABLE `mls_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mls_users`
--
ALTER TABLE `mls_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
