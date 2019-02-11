-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 02:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accused information`
--

CREATE TABLE `accused information` (
  `AccusedID` int(11) NOT NULL,
  `CaseNo` int(11) NOT NULL,
  `AccusedLname` varchar(50) NOT NULL,
  `AccusedFname` varchar(50) NOT NULL,
  `AccusedMi` varchar(3) NOT NULL,
  `AccusedAlias` varchar(50) NOT NULL,
  `AccusedDOB` date NOT NULL,
  `AccusedGender` varchar(25) NOT NULL,
  `AccusedStatus` varchar(50) NOT NULL,
  `AccusedAge` int(11) NOT NULL,
  `AccusedContactNo` int(15) NOT NULL,
  `AccusedAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accused information`
--

INSERT INTO `accused information` (`AccusedID`, `CaseNo`, `AccusedLname`, `AccusedFname`, `AccusedMi`, `AccusedAlias`, `AccusedDOB`, `AccusedGender`, `AccusedStatus`, `AccusedAge`, `AccusedContactNo`, `AccusedAddress`) VALUES
(1, 12345, 'Last Name', 'First Name', 'Mid', 'Alias Name', '2019-02-01', 'Gender', 'Status', 12345, 12345, 'Address'),
(3, 666666, 'QQQQQQ', 'QQQQQQ', 'QQQ', 'QQQQQQ', '2019-02-02', 'QQQQQQ', 'QQQQQQ', 666666, 666666, 'QQQQQQ'),
(4, 666666, 'QQQQQQ', 'QQQQQQ', 'QQQ', 'QQQQQQ', '2019-02-02', 'QQQQQQ', 'QQQQQQ', 666666, 666666, 'QQQQQQ'),
(19, 999, 'ppppp', '', '', '', '0000-00-00', '', '', 0, 0, ''),
(20, 999, 'ooo', '', '', '', '0000-00-00', '', '', 0, 0, ''),
(28, 0, '', '', '', '', '0000-00-00', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `arraignment pre-trial`
--

CREATE TABLE `arraignment pre-trial` (
  `CaseNo` text NOT NULL,
  `AccusedStatus` varchar(25) NOT NULL,
  `DateofDetention` date NOT NULL,
  `DateofArrest` date NOT NULL,
  `DateofBail` date NOT NULL,
  `DateofVoluntarySurrender` date NOT NULL,
  `PlaceofDetention` text NOT NULL,
  `DateofReleased` date NOT NULL,
  `ReasonforRelease` text NOT NULL,
  `InitialSettingDate` date NOT NULL,
  `Plea` varchar(15) NOT NULL,
  `ActualArraignmentDate` date NOT NULL,
  `PleaBargainDate` date NOT NULL,
  `PreTrialDate` date NOT NULL,
  `DateRevived` date NOT NULL,
  `PromulgationDate` date NOT NULL,
  `DateArchived` date NOT NULL,
  `NextHearingSchedule` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrow transaction`
--

CREATE TABLE `borrow transaction` (
  `BorrowID` int(11) NOT NULL,
  `CaseNo` text NOT NULL,
  `BorrowersName` text NOT NULL,
  `BorrowReason` text NOT NULL,
  `DateTimeBorrowed` date NOT NULL,
  `DateTimeReturned` date NOT NULL,
  `BorrowStatus` varchar(50) NOT NULL,
  `ReleasedBy` text NOT NULL,
  `ApprovedBy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow transaction`
--

INSERT INTO `borrow transaction` (`BorrowID`, `CaseNo`, `BorrowersName`, `BorrowReason`, `DateTimeBorrowed`, `DateTimeReturned`, `BorrowStatus`, `ReleasedBy`, `ApprovedBy`) VALUES
(37, 'QQQQ', 'QQQQ', 'QQQQ', '0000-00-00', '0000-00-00', 'QQQQ', 'QQQQ', 'QQQQ'),
(38, 'Case Number', 'Borrowers Name', 'Reason', '0000-00-00', '0000-00-00', 'Borrow', 'Released By', 'Approved By'),
(39, 'QQQQ', 'QQQQ', 'QQQQ', '2019-02-22', '0000-00-00', 'QQQQ', 'QQQQ', ''),
(40, 'QQQQ', 'QQQQ', 'QQQQ', '2019-02-23', '0000-00-00', 'QQQQ', 'QQQQ', '');

-- --------------------------------------------------------

--
-- Table structure for table `case category`
--

CREATE TABLE `case category` (
  `CaseCategoryCode` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case category`
--

INSERT INTO `case category` (`CaseCategoryCode`, `Description`, `Status`) VALUES
('CaseCat1', 'Child and Family Cases', 'AC'),
('CaseCat2', 'Commercial Cases', 'AC'),
('CaseCat3', 'Drug Cases', 'AC'),
('CaseCat4', 'Environmental Cases', 'AC'),
('CaseCat5', 'Intellectual Property Rights Cases', 'AC'),
('CaseCat6', 'Other Criminal Cases', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `case information`
--

CREATE TABLE `case information` (
  `CaseNo` int(11) NOT NULL,
  `CaseTitle` varchar(100) NOT NULL,
  `DateFiled` date NOT NULL,
  `DateReceived` date NOT NULL,
  `CaseCategory` varchar(50) NOT NULL,
  `CaseNature` varchar(50) NOT NULL,
  `NatureDescription` varchar(50) NOT NULL,
  `CaseStatus` varchar(50) NOT NULL,
  `AmountInvolved` int(11) NOT NULL,
  `WeightinGrams` int(11) NOT NULL,
  `DateReturnedorTransfered` date NOT NULL,
  `DateRemoved` date NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `OtherDetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case information`
--

INSERT INTO `case information` (`CaseNo`, `CaseTitle`, `DateFiled`, `DateReceived`, `CaseCategory`, `CaseNature`, `NatureDescription`, `CaseStatus`, `AmountInvolved`, `WeightinGrams`, `DateReturnedorTransfered`, `DateRemoved`, `Reason`, `OtherDetails`) VALUES
(0, '', '0000-00-00', '0000-00-00', '', '', '', '', 0, 0, '0000-00-00', '0000-00-00', '', ''),
(909, 'qweqqqqqqq', '0000-00-00', '0000-00-00', '', '', '', '', 0, 0, '0000-00-00', '0000-00-00', '', ''),
(1111, 'CASE TITLE', '0000-00-00', '0000-00-00', 'CASE CATEGORY', '', '', '', 0, 0, '0000-00-00', '0000-00-00', '', '\''),
(12345, 'khiim', '2019-02-07', '0000-00-00', '', '', '', '', 0, 0, '0000-00-00', '0000-00-00', '', ''),
(123456, 'CASE TITLE', '2019-02-01', '2019-02-02', 'CASE CATEGORY', 'NATURE CASE', 'NATURE DESCRIPTION', 'CASE STATUS', 666666, 123456, '2019-02-03', '2019-02-04', 'REASON', 'Other Detailszzzz'),
(555555, '', '0000-00-00', '0000-00-00', '', '', '', '', 0, 0, '0000-00-00', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `case nature`
--

CREATE TABLE `case nature` (
  `CaseNatureCode` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case nature`
--

INSERT INTO `case nature` (`CaseNatureCode`, `Description`, `Status`) VALUES
('CC1', 'All other Commercial Cases', 'AC'),
('CF1', 'All other Child and Family Cases', 'AC'),
('CF2', 'Child Abuse (R.A. 7610)', 'AC'),
('CF3', 'Drug Cases (Involving Minors)', 'AC'),
('CF4', 'Human Trafficking (Involving Minors)', 'AC'),
('CF5', 'Rape (with Minor Victim and/or Accused', 'AC'),
('CF6', 'Violence Against Women and Children (R.A. 9262)', 'AC'),
('DC1', 'All other Drug Cases', 'AC'),
('DC10', 'Section 12. Possession of Equipment, Instrument, Apparatus and other Paraphernalia for Dangerous Dru', 'AC'),
('DC11', 'Section 13. Possession of Dangerous Drugs during Parties, Social Gathering or Meetings.', 'AC'),
('DC12', 'Section 14. Possession of Equipment, Instrument, Apparatus and other Paraphernalia.', 'AC'),
('DC13', 'Section 15. Use of Dangerous Drugs.', 'AC'),
('DC14', 'Section 16. Cultivation or Culture of Plants Classified as Dangerous Drugs or are Sources thereof.', 'AC'),
('DC15', 'Section 17. Maintenance and Keeping of Original Records of Transactions.', 'AC'),
('DC16', 'Section 18. Unnecessary Prescription of Dangerous Drugs.', 'AC'),
('DC17', 'Section 19. Unlawful Prescription of Dangerous Drugs', 'AC'),
('DC18', 'Section 27. Criminal Liability of a Public Officer or Employee.', 'AC'),
('DC19', 'Section 28. Criminal Liability of Government Officials and Employees.', 'AC'),
('DC2', 'Section 04. Importation of Dangerous Drugs and/or Controlled Precursors and Essential Chemicals.', 'AC'),
('DC20', 'Section 29. Criminal Liability for Planting of Evidence.', 'AC'),
('DC3', 'Section 05. Sale,Trading,Administration,Dispensation,Delivery,Distribution and Transportation', 'AC'),
('DC4', 'Section 06. Maintenance of a Den, Dive or Resort', 'AC'),
('DC5', 'Section 07. Employeess and Visitors of a Den, Dive or Resort.', 'AC'),
('DC6', 'Section 08. Manufacture of Dangerous Drugs and/or Controlled Precursors and Essential Chemicals.', 'AC'),
('DC7', 'Section 09. Illegal Chemical Diversion of Controlled Precursors and Essential Chemicals.', 'AC'),
('DC8', 'Section 10. Manufacture or Delivery', 'AC'),
('DC9', 'Section 11. Possession of Dangerous Drugs', 'AC'),
('EC1', 'ACT NO. 3572, PROHIBITION AGAINST CUTTING OF TINDALO, AKLI, AND MOLAVE TREES;', 'AC'),
('EC10', 'PROVISIONS IN C.A. NO. 141, THE PUBLIC LAND ACT; R.A. NO. 6657, COMPREHENSIVE AGRARIAN REFORM LAW OF', 'AC'),
('EC11', 'R.A. NO. 3751, PROHIBITION AGAINST CUTTING, DESTROYING OR INJURING OF PLANTED OR GROWING TREES, FLOW', 'AC'),
('EC12', 'R.A NO. 7586, NATIONAL INTEGRATED PROTECTED AREAS SYSTEM ACT INCLUDING ALL LAWS, DECREES, ORDERS, PR', 'AC'),
('EC13', 'R.A. NO. 7611, STRATEGIC ENVIRONMENTAL PLAN FOR PALAWAN ACT;', 'AC'),
('EC14', 'R.A. NO. 9003, ECOLOGICAL SOLID WASTE MANAGEMENT ACT;', 'AC'),
('EC15', 'R.A. NO. 9072, NATIONAL CAVES AND CAVE RESOURCES MANAGEMENT ACT;', 'AC'),
('EC16', 'R.A. NO. 4850, LAGUNA LAKE DEVELOPMENT AUTHORITY ACT;', 'AC'),
('EC17', 'R.A. NO. 6969, TOXIC SUBSTANCES AND HAZARDOUS WASTE ACT;', 'AC'),
('EC18', 'R.A. NO. 7076, PEOPLE\'S SMALL-SCALE MINING ACT;', 'AC'),
('EC19', 'R.A NO. 7942, PHILIPPINE MINING ACT;', 'AC'),
('EC2', 'ALL OTHER ENVIRONMENTAL CASES', 'AC'),
('EC20', 'R.A. NO. 8371, INDIGENOUS PEOPLE RIGHTS ACT;', 'AC'),
('EC21', 'R.A. NO. 8550, PHILIPPINE FISHERIES CODE;', 'AC'),
('EC22', 'R.A. NO. 8749, CLEAN AIR ACT;', 'AC'),
('EC23', 'R.A. NO. 9147, WILDLIFE CONSERVATION AND PROTECTION ACT;', 'AC'),
('EC24', 'R.A. NO. 9175, CHAINSAW ACT;', 'AC'),
('EC25', 'R.A. NO. 9275, CLEAN WATER ACT;', 'AC'),
('EC26', 'R.A. NO. 9483, OIL SPILL COMPENSATION ACT OF 2007;', 'AC'),
('EC3', 'P.D. NO. 705, REVISED FORESTRY CODE;', 'AC'),
('EC4', 'P.D. NO. 1067, WATER CODE;', 'AC'),
('EC5', 'P.D. NO. 1151, PHILIPPINE ENVIRONMENTAL POLICY OF 1977;', 'AC'),
('EC6', 'P.D. NO. 1433, PLANT QUARANTINE LAW OF 1978;', 'AC'),
('EC7', 'P.D. NO. 1586, ESTABLISHING AN ENVIRONMENTAL IMPACT STATEMENT SYSTEM INCLUDING OTHER ENVIRONMENTAL M', 'AC'),
('EC8', 'P.D. NO. 856, SANITATION CODE;', 'AC'),
('EC9', 'P.D. NO. 979, MARINE POLLUTION DECREE;', 'AC'),
('IPRC1', 'ALL OTHER IPRC CASES', 'AC'),
('IPRC10', 'RA 10088 (ANTI-CAMCORDING ACT [2010])', 'AC'),
('IPRC11', 'RA 10175 (CYBERCRIME PREVENTION ACT [2012])', 'AC'),
('IPRC12', 'RA 10667 (PHILIPPINE COMPETITION ACT [2015])', 'AC'),
('IPRC13', 'RA 3720 (FOODS, DRUGS & DEVICES, AND COSMETICS ACT [1987])', 'AC'),
('IPRC14', 'RA 623 (USE OF DULY-STAMPED AND MARKED CONTAINERS [1951], AS AMENDED BY R.A. 5700)', 'AC'),
('IPRC15', 'RA 7394 (CONSUMER ACT [1992])', 'AC'),
('IPRC16', 'RA 8203 (SPECIAL LAW ON COUNTERFEIT DRUGS [1996])', 'AC'),
('IPRC17', 'RA 8792 (E-COMMERCE ACT [2000]', 'AC'),
('IPRC18', 'RA 9160 (ANTI-MONEY LAUNDERING ACT [2001] AND ITS AMENDMENTS R.A. 9194 [2002], R.A. 10167 [2001], R.', 'AC'),
('IPRC19', 'RA 9168 (PHILIPPINE PLANT VARIETY PROTECTION ACT [2002])', 'AC'),
('IPRC2', 'FALSE DESIGNATIONS OF ORIGIN; FALSE DESCRIPTION OR PRESENTATION (SECTION 169.1 IN RELATION TO SECTIO', 'AC'),
('IPRC20', 'RA 9239 (OPTICAL MEDIA ACT[2003])', 'AC'),
('IPRC21', 'RA 9502 (UNIVERSALLY ACCESSIBLE CHEAPER AND QUALITY MEDICINES ACT [2008])', 'AC'),
('IPRC22', 'RA 9711 (FOOD AND DRUG ADMINISTRATION ACT [2009])', 'AC'),
('IPRC23', 'REPETITION OF INFRINGEMENT OF INDUSTRIAL DESIGN (SECTION 119}', 'AC'),
('IPRC24', 'REPETITION OF INFRINGEMENT OF PATENT (SECTION 84)', 'AC'),
('IPRC25', 'REPETITION OF INFRINGEMENT OF UTILITY MODEL (SECTION 108)', 'AC'),
('IPRC26', 'TRADEMARK INFRINGEMENT (SECTION 155 IN RELATION TO SECTION 170)', 'AC'),
('IPRC27', 'UNFAIR COMPETITION (SECTION 168 IN RELATION TO SECTION 170)', 'AC'),
('IPRC28', 'VIOLATIONS UNDER THE FOLLOWING STATUTES:', 'AC'),
('IPRC3', 'INFRINGEMENT OF BROADCASTING RIGHTS (SECTION 211 IN RELATION TO SECTION 217)', 'AC'),
('IPRC4', 'INFRINGEMENT OF COPYRIGHT (SECTION 177 IN RELATION TO SECTION 217)', 'AC'),
('IPRC5', 'INFRINGEMENT OF MORAL RIGHTS (SECTION 193 IN RELATION TO SECTION 217', 'AC'),
('IPRC6', 'INFRINGEMENT OF PERFORMERS\' RIGHTS (SECTION 203 IN RELATION TO SECTION 217)', 'AC'),
('IPRC7', 'INFRNGEMENT OF PRODUCERS\' RIGHTS (SECTION 208 IN RELATION TO SECTION 217)', 'AC'),
('IPRC8', 'OTHER VIOLATIONS OF INTELLECTUAL PROPERTY RIGHTS AS MAY BE DEFINED BY LAW', 'AC'),
('IPRC9', 'RA 10055 (PHILIPPINE TECHNOLOGY TRANSFER ACT [2009])', 'AC'),
('OCC1', 'ADULTERY', 'AC'),
('OCC10', 'HUMAN TRAFFICKING (R.A. 9208)', 'AC'),
('OCC11', 'ILLEGAL POSSESSION OF FIREARMS AND AMMUNITIONS', 'AC'),
('OCC12', 'ILLEGAL RECRUITMENT', 'AC'),
('OCC13', 'KIDNAPPING', 'AC'),
('OCC14', 'LESS PHYSICAL INJURIES', 'AC'),
('OCC15', 'LIBEL', 'AC'),
('OCC16', 'MURDER', 'AC'),
('OCC17', 'OTHER FORMS OF ARSON', 'AC'),
('OCC18', 'PARRICIDE', 'AC'),
('OCC19', 'PIRACY', 'AC'),
('OCC2', 'ALL OTHER CRIMINAL CASES', 'AC'),
('OCC20', 'QUALIFIED PIRACY', 'AC'),
('OCC21', 'RAPE', 'AC'),
('OCC22', 'RAPE (R.A. 8353)', 'AC'),
('OCC23', 'ROBBERY', 'AC'),
('OCC24', 'SERIOUS PHYSICAL INJURIES', 'AC'),
('OCC25', 'SIMULATION OF BIRTHS', 'AC'),
('OCC26', 'TAX EVASION OR VIOLATION OF TAX / CUSTOMS LAW', 'AC'),
('OCC27', 'THEFT', 'AC'),
('OCC28', 'TREASON', 'AC'),
('OCC29', 'VIOLATION OF ENVIRONMENTAL LAWS', 'AC'),
('OCC3', 'ARBITRARY DETENTION', 'AC'),
('OCC4', 'BIGAMY', 'AC'),
('OCC5', 'CARNAPPING', 'AC'),
('OCC6', 'ESTAFA/SWINDLING', 'AC'),
('OCC7', 'FORCIBLE ABDUCTION', 'AC'),
('OCC8', 'GRAFT AND CORRUPTION', 'AC'),
('OCC9', 'HOMICIDE', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `caseremarks`
--

CREATE TABLE `caseremarks` (
  `RemarksCode` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caseremarks`
--

INSERT INTO `caseremarks` (`RemarksCode`, `Description`, `Status`) VALUES
('RC1', 'Archived', 'AC'),
('RC10', 'Submitted for Decision', 'AC'),
('RC11', 'Suspended Judgment', 'AC'),
('RC12', 'Suspended Proceedings', 'AC'),
('RC13', 'Others', 'AC'),
('RC2', 'Arraignment and Pre-Trial', 'AC'),
('RC3', 'Decided', 'AC'),
('RC4', 'Dismissed', 'AC'),
('RC5', 'Mediation', 'AC'),
('RC6', 'Newly Raffled', 'AC'),
('RC7', 'Presentation of Defense Evidence', 'AC'),
('RC8', 'Presentation of Prosecution Evidence', 'AC'),
('RC9', 'Promulgation', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `client information`
--

CREATE TABLE `client information` (
  `ClientIDno` int(11) NOT NULL,
  `ClientLastName` varchar(25) NOT NULL,
  `ClientFirstName` varchar(25) NOT NULL,
  `ClientMi` varchar(3) NOT NULL,
  `ClientAddress` text NOT NULL,
  `ClientContactNo` int(11) NOT NULL,
  `ClientEmailAddress` varchar(25) NOT NULL,
  `ClientDOB` date NOT NULL,
  `ClientAge` int(11) NOT NULL,
  `ClientGender` varchar(6) NOT NULL,
  `ClientStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judge information`
--

CREATE TABLE `judge information` (
  `JudgeRollNo` int(11) NOT NULL,
  `JudgeLastName` varchar(100) NOT NULL,
  `JudgeFirstName` varchar(100) NOT NULL,
  `JudgeMi` varchar(3) NOT NULL,
  `JudgeContactNo` int(11) NOT NULL,
  `JudgeStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff information`
--

CREATE TABLE `staff information` (
  `StaffIDno` int(11) NOT NULL,
  `StaffLastName` varchar(50) NOT NULL,
  `StaffFirstName` varchar(50) NOT NULL,
  `StaffMi` varchar(3) NOT NULL,
  `StaffDOB` date NOT NULL,
  `StaffContactNo` int(11) NOT NULL,
  `StaffAge` int(11) NOT NULL,
  `StaffAddress` text NOT NULL,
  `StaffGender` varchar(20) NOT NULL,
  `StaffStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accused information`
--
ALTER TABLE `accused information`
  ADD PRIMARY KEY (`AccusedID`);

--
-- Indexes for table `borrow transaction`
--
ALTER TABLE `borrow transaction`
  ADD PRIMARY KEY (`BorrowID`);

--
-- Indexes for table `case category`
--
ALTER TABLE `case category`
  ADD PRIMARY KEY (`CaseCategoryCode`);

--
-- Indexes for table `case information`
--
ALTER TABLE `case information`
  ADD PRIMARY KEY (`CaseNo`);

--
-- Indexes for table `case nature`
--
ALTER TABLE `case nature`
  ADD PRIMARY KEY (`CaseNatureCode`);

--
-- Indexes for table `caseremarks`
--
ALTER TABLE `caseremarks`
  ADD PRIMARY KEY (`RemarksCode`);

--
-- Indexes for table `client information`
--
ALTER TABLE `client information`
  ADD PRIMARY KEY (`ClientIDno`);

--
-- Indexes for table `judge information`
--
ALTER TABLE `judge information`
  ADD PRIMARY KEY (`JudgeRollNo`);

--
-- Indexes for table `staff information`
--
ALTER TABLE `staff information`
  ADD PRIMARY KEY (`StaffIDno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accused information`
--
ALTER TABLE `accused information`
  MODIFY `AccusedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `borrow transaction`
--
ALTER TABLE `borrow transaction`
  MODIFY `BorrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `client information`
--
ALTER TABLE `client information`
  MODIFY `ClientIDno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judge information`
--
ALTER TABLE `judge information`
  MODIFY `JudgeRollNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff information`
--
ALTER TABLE `staff information`
  MODIFY `StaffIDno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
