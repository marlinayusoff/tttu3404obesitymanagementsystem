-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 02:34 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obesity_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `activityId` int(11) NOT NULL,
  `activityName` varchar(30) NOT NULL,
  `calories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`activityId`, `activityName`, `calories`) VALUES
(6001, 'jogging', '20kcal'),
(6002, 'berenang', '25kcal'),
(6003, 'Memanah', '10kcal'),
(6004, 'Memancing', '6kcal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin1', '202cb962ac59075b964b07152d234b70'),
(2, 'admin2', 'admin2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anthro_data`
--

CREATE TABLE `tbl_anthro_data` (
  `antroId` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `BMI` float NOT NULL,
  `bodyFatMass` float NOT NULL,
  `patientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `nsoId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointmentId`, `patientId`, `nsoId`, `date`, `time`, `remarks`) VALUES
(2, 10, 14, '2017-10-21', '11:00:00', 'kuat kan minum air'),
(3, 10, 14, '2017-10-09', '11:00:00', 'kuat kan minum air'),
(4, 10, 14, '2017-09-09', '11:00:00', 'kuat kan minum air'),
(5, 10, 14, '2017-09-02', '11:00:00', 'kuat kan minum air'),
(6, 10, 14, '2017-09-05', '11:00:00', 'kuat kan minum air'),
(7, 10, 14, '2017-09-08', '11:00:00', 'kuat kan minum air'),
(8, 10, 14, '2017-09-09', '11:00:00', 'kuat kan minum air'),
(9, 10, 14, '2017-08-12', '11:00:00', 'kuat kan minum air'),
(10, 10, 14, '2017-08-02', '11:00:00', 'kuat kan minum air'),
(11, 10, 14, '2017-08-07', '11:00:00', 'kuat kan minum air'),
(13, 10, 2, '2017-10-18', '09:00:00', 'Test'),
(14, 10, 2, '2017-10-19', '10:00:00', 'Test'),
(15, 10, 2, '2017-10-20', '11:00:00', 'Test'),
(16, 10, 2, '2017-10-21', '12:00:00', 'Test'),
(17, 10, 2, '2017-10-22', '13:00:00', 'Test'),
(18, 10, 2, '2017-10-23', '14:00:00', 'Test'),
(19, 10, 2, '2017-10-24', '15:00:00', 'Test'),
(20, 10, 2, '2017-10-25', '16:00:00', 'Test'),
(21, 10, 2, '2017-01-26', '17:00:00', 'Test'),
(22, 10, 2, '2017-10-27', '18:00:00', 'Test'),
(26, 10, 2, '2017-10-31', '08:00:00', 'Test'),
(27, 10, 2, '2017-09-01', '09:00:00', 'Test'),
(53, 10, 2, '2017-06-27', '01:00:00', 'Test'),
(54, 10, 2, '2017-06-28', '02:00:00', 'Test'),
(55, 10, 2, '2017-06-29', '03:00:00', 'Test'),
(56, 10, 2, '2017-06-30', '04:00:00', 'Test'),
(57, 10, 2, '2017-05-01', '05:00:00', 'Test'),
(58, 10, 2, '2017-05-02', '06:00:00', 'Test'),
(59, 10, 2, '2017-05-03', '07:00:00', 'Test'),
(60, 10, 2, '2017-05-04', '08:00:00', 'Test'),
(61, 10, 2, '2017-05-05', '09:00:00', 'Test'),
(62, 10, 2, '2017-05-06', '10:00:00', 'Test'),
(63, 10, 2, '2017-05-07', '11:00:00', 'Test'),
(64, 10, 2, '2017-05-08', '12:00:00', 'Test'),
(65, 10, 2, '2017-02-09', '13:00:00', 'Test'),
(66, 10, 2, '2017-02-10', '14:00:00', 'Test'),
(67, 10, 2, '2017-02-11', '15:00:00', 'Test'),
(68, 10, 2, '2017-02-12', '16:00:00', 'Test'),
(69, 10, 2, '2017-02-13', '17:00:00', 'Test'),
(70, 10, 2, '2017-02-14', '18:00:00', 'Test'),
(71, 10, 2, '2017-02-15', '19:00:00', 'Test'),
(72, 10, 2, '2017-02-16', '20:00:00', 'Test'),
(73, 10, 2, '2017-01-17', '21:00:00', 'Test'),
(74, 10, 2, '2017-01-18', '22:00:00', 'Test'),
(75, 10, 2, '2017-01-19', '23:00:00', 'Test'),
(76, 10, 2, '2017-01-20', '00:00:00', 'Test'),
(77, 10, 2, '2017-01-21', '01:00:00', 'Test'),
(78, 10, 2, '2017-01-22', '02:00:00', 'Test'),
(79, 10, 1, '2017-01-23', '03:00:00', 'Test'),
(80, 10, 1, '2017-01-24', '04:00:00', 'Test'),
(81, 10, 1, '2017-01-25', '05:00:00', 'Test'),
(89, 3, 14, '2017-11-02', '08:15:00', ''),
(90, 2, 14, '2017-11-01', '08:15:00', ''),
(99, 33, 14, '2017-11-01', '10:30:00', ''),
(100, 10, 14, '2017-11-08', '11:30:00', ''),
(101, 33, 14, '2017-11-08', '10:30:00', ''),
(102, 3, 14, '2017-11-17', '10:30:00', ''),
(103, 4, 14, '2017-11-20', '15:30:00', ''),
(104, 34, 14, '2017-11-21', '08:00:00', ''),
(105, 34, 14, '2017-11-21', '09:00:00', ''),
(106, 34, 14, '2017-11-21', '11:30:00', ''),
(107, 34, 14, '2017-11-30', '11:50:00', ''),
(108, 34, 14, '2017-11-24', '15:15:00', ''),
(109, 1, 14, '2017-11-22', '08:00:00', ''),
(110, 4, 14, '2017-11-22', '09:15:00', ''),
(111, 1, 14, '2017-11-26', '11:15:00', ''),
(112, 10, 14, '2017-11-26', '10:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_diet`
--

CREATE TABLE `tbl_daily_diet` (
  `dailyDietId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `drinkId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drink`
--

CREATE TABLE `tbl_drink` (
  `drinkId` int(11) NOT NULL,
  `drinkName` varchar(30) NOT NULL,
  `calories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drink`
--

INSERT INTO `tbl_drink` (`drinkId`, `drinkName`, `calories`) VALUES
(5001, 'Jus buah-buahan', '2kcal'),
(5002, 'Air Sirap', '5kcal'),
(5003, 'Milo', '7kcal'),
(5004, 'Teh', '6kcal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `foodId` int(11) NOT NULL,
  `foodName` varchar(30) NOT NULL,
  `calories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`foodId`, `foodName`, `calories`) VALUES
(4001, 'Ikan', '15kcal'),
(4002, 'Ayam', '20kcal'),
(4003, 'Daging', '20kcal'),
(4004, 'Keropok', '25kcal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health_issue`
--

CREATE TABLE `tbl_health_issue` (
  `healthIssueId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `healthIssue` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_health_issue`
--

INSERT INTO `tbl_health_issue` (`healthIssueId`, `patientId`, `healthIssue`, `duration`) VALUES
(1, 35, 'test', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbody_result`
--

CREATE TABLE `tbl_inbody_result` (
  `inbodyId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `weight` float NOT NULL,
  `BMI` float NOT NULL,
  `muscleMass` float NOT NULL,
  `bodyFatMass` float NOT NULL,
  `FatFreeMass` float NOT NULL,
  `protein` float NOT NULL,
  `mineral` float NOT NULL,
  `percentBodyFat` float NOT NULL,
  `waistHipRatio` float NOT NULL,
  `baseMetabolicRate` float NOT NULL,
  `muscleControl` float NOT NULL,
  `fatControl` float NOT NULL,
  `fitnessScore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicineId` int(11) NOT NULL,
  `medicineName` varchar(255) NOT NULL,
  `patientId` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicineId`, `medicineName`, `patientId`, `duration`) VALUES
(1, 'ubat1', 35, '6 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nso`
--

CREATE TABLE `tbl_nso` (
  `nsoId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `icNo` varchar(20) NOT NULL,
  `telNo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nso`
--

INSERT INTO `tbl_nso` (`nsoId`, `username`, `name`, `gender`, `address`, `icNo`, `telNo`, `password`, `email`) VALUES
(1, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(2, '', 'user', 'Lelaki', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(3, '', 'user', 'Lelaki', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(4, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(5, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(6, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(7, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(8, '', 'Ahmad', 'Lelaki', 'dsewrwe', '980312085028', '2147483647', '202cb962ac59075b964b07152d234b70', 'test@gmail.com'),
(9, '', 'hadi', 'Lelaki', 'dcs', '950619115637', '234', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(11, '', 'azazazm', 'Lelaki', 'asdd', '950619115368', '13222', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(13, '', 'azazazm', 'Lelaki', 'sdfsc', '950619115368', '148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(14, 'staff1', 'Siti Hairani binti Harun', 'Perempuan', 'dsewrwe', '980312085028', '2147483647', '202cb962ac59075b964b07152d234b70', 'a158034@siswa.ukm.edu.my'),
(15, 'staff2', 'Ali', 'Lelaki', 'KKKK', '950619115368', '148295569', '202cb962ac59075b964b07152d234b70', 'yaswea@yahoo.com'),
(16, 'staff3', 'newone', 'Lelaki', 'sad', '950619115368', '2314', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(17, 'staff4', 'aziz', 'Lelaki', 'dfs', '950619115368', '45', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(18, 'staff5', 'last', 'Lelaki', 'erw', '950619115368', '013222', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(19, 'staff7', 'sssssss', 'Lelaki', 'weer', '950619115368', '013222', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(20, 'staff8', 'dddddd', 'Lelaki', 'fhj', '950619115368', '013222', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(22, 'staff5', 'kl', 'Lelaki', 'jkhj', '950619115368', 'k87k', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(23, 'staff8', 'aza', 'Lelaki', 'fgd', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(25, 'staff8', 'aza', 'Lelaki', 'fgd', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(26, 'staff8', 'aza', 'Lelaki', 'fgd', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(28, 'admin1', 'sd', 'Lelaki', 'asd', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(29, 'admin1', 'ds', 'Lelaki', 'brf', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patientId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `icNo` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `poscode` int(20) NOT NULL,
  `race` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `education` varchar(20) NOT NULL,
  `currentInfo` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `telNo` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patientId`, `username`, `name`, `gender`, `dateOfBirth`, `icNo`, `address`, `city`, `state`, `poscode`, `race`, `religion`, `education`, `currentInfo`, `status`, `telNo`, `email`, `password`) VALUES
(1, 'patient1', 'Dilla', 'Perempuan', '2017-10-12', '950619115368', 'sasd', 'sdasd', 'Negeri', 2425, 'Melayu', 'lain2', 'lain', 'bekerja/', 'Berkahwin', 423532, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, '', 'Bell', 'Perempuan', '2017-10-03', '950619115368', 'faf', 'fgfdg', 'Pahang', 3245, 'Melayu', 'Islam', 'UPSR', 'on', 'Bujang', 34241, 'a@gmail.com', 'vfgrdg'),
(3, '', 'Sumairah', 'Perempuan', '2017-10-03', '950619115368', 'faf', 'fgfdg', 'Pahang', 3245, 'Melayu', 'Islam', 'UPSR', 'Tidak bekerja', 'Bujang', 34241, 'a@gmail.com', 'dfdg'),
(4, '', 'Assi', 'Perempuan', '2017-10-03', '950619115368', 'faf', 'fgfdg', 'Pahang', 3245, 'Melayu', 'Islam', 'UPSR', 'on', 'Bujang', 34241, 'a@gmail.com', 'fsg'),
(10, 'patient6', 'Aslam', 'Lelaki', '2017-10-17', '950619115368', 'jkjh', 'jkhjm', 'Pulau Pinang', 65765, 'Melayu', 'llll', 'lain', 'belajar/', 'Bujang', 7, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(27, 'staff1', 'as', 'Lelaki', '2017-10-12', '950619115368', 'sfas', 'asfasf', 'Pulau Pinang', 34324, 'Melayu', 'Islam', 'sfdsf', 'sdas', 'Bujang', 148295569, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(28, 'staff1', 'as', 'Lelaki', '2017-10-12', '950619115368', 'sfas', 'asfasf', 'Pulau Pinang', 34324, 'Melayu', 'Islam', 'sfdsf', 'sdas', 'Bujang', 148295569, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(30, 'staff1', 'as', 'Lelaki', '2017-10-12', '950619115368', 'sfas', 'asfasf', 'Pulau Pinang', 34324, 'Melayu', 'Islam', 'sfdsf', 'sdas', 'Bujang', 148295569, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(31, 'staff1', 'as', 'Lelaki', '2017-10-12', '950619115368', 'sfas', 'asfasf', 'Pulau Pinang', 34324, 'Melayu', 'Islam', 'sfdsf', 'sdas', 'Bujang', 148295569, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(32, 'staff1', 'sdas', 'Lelaki', '2017-10-24', '950619115368', 'gfdgd', 'dfsd', 'Johor', 234234, 'Melayu', 'Buddha', 'PMR/PT3', 'ukm', 'Bercerai', 148295569, 'a@gmail.com', '202cb962ac59075b964b07152d234b70'),
(33, 'patient3', 'Aina Badrul Zaman', 'Perempuan', '2017-05-17', '940123457343', 'rawang', 'bandar', 'Selangor', 0, 'Melayu', 'Islam', 'Degree', 'belajar', 'Bujang', 12334678, 'aina@gmail.com', '202cb962ac59075b964b07152d234b70'),
(34, 'testPatient1', 'Paan', 'Lelaki', '2017-11-02', '930412235433', 'Blok G ke Blok H ke yang pasti KPZ', 'Johor Jaya', 'Johor', 10001, 'Melayu', 'Islam', 'UPSR', 'Tidak bekerja', 'Berkahwin', 14234557, 'paan@gmail.com', '202cb962ac59075b964b07152d234b70'),
(35, 'marlina1', 'Marlina', 'Perempuan', '1994-11-20', '941111111111', 'Taman prima saujana', 'Kajang', 'Selangor', 43000, 'Melayu', 'Islam', 'Diploma', 'UKM', 'Bujang', 172767126, 'yusnamarlina@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE `tbl_treatment` (
  `treatmentId` int(20) NOT NULL,
  `patientId` int(20) NOT NULL,
  `nsoId` int(20) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`activityId`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_anthro_data`
--
ALTER TABLE `tbl_anthro_data`
  ADD PRIMARY KEY (`antroId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `nsoId` (`nsoId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_daily_diet`
--
ALTER TABLE `tbl_daily_diet`
  ADD PRIMARY KEY (`dailyDietId`),
  ADD KEY `activityId` (`activityId`),
  ADD KEY `drinkId` (`drinkId`),
  ADD KEY `foodId` (`foodId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_drink`
--
ALTER TABLE `tbl_drink`
  ADD PRIMARY KEY (`drinkId`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `tbl_health_issue`
--
ALTER TABLE `tbl_health_issue`
  ADD PRIMARY KEY (`healthIssueId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_inbody_result`
--
ALTER TABLE `tbl_inbody_result`
  ADD PRIMARY KEY (`inbodyId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicineId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `tbl_nso`
--
ALTER TABLE `tbl_nso`
  ADD PRIMARY KEY (`nsoId`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patientId`);

--
-- Indexes for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`treatmentId`),
  ADD UNIQUE KEY `patientId` (`patientId`),
  ADD KEY `nsoId` (`nsoId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6005;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_anthro_data`
--
ALTER TABLE `tbl_anthro_data`
  MODIFY `antroId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_daily_diet`
--
ALTER TABLE `tbl_daily_diet`
  MODIFY `dailyDietId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_drink`
--
ALTER TABLE `tbl_drink`
  MODIFY `drinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4005;

--
-- AUTO_INCREMENT for table `tbl_health_issue`
--
ALTER TABLE `tbl_health_issue`
  MODIFY `healthIssueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_inbody_result`
--
ALTER TABLE `tbl_inbody_result`
  MODIFY `inbodyId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_nso`
--
ALTER TABLE `tbl_nso`
  MODIFY `nsoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `treatmentId` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anthro_data`
--
ALTER TABLE `tbl_anthro_data`
  ADD CONSTRAINT `tbl_anthro_data_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `tbl_appointment_ibfk_1` FOREIGN KEY (`nsoId`) REFERENCES `tbl_nso` (`nsoId`),
  ADD CONSTRAINT `tbl_appointment_ibfk_2` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_daily_diet`
--
ALTER TABLE `tbl_daily_diet`
  ADD CONSTRAINT `tbl_daily_diet_ibfk_1` FOREIGN KEY (`activityId`) REFERENCES `tbl_activity` (`activityId`),
  ADD CONSTRAINT `tbl_daily_diet_ibfk_2` FOREIGN KEY (`drinkId`) REFERENCES `tbl_drink` (`drinkId`),
  ADD CONSTRAINT `tbl_daily_diet_ibfk_3` FOREIGN KEY (`foodId`) REFERENCES `tbl_food` (`foodId`),
  ADD CONSTRAINT `tbl_daily_diet_ibfk_4` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_health_issue`
--
ALTER TABLE `tbl_health_issue`
  ADD CONSTRAINT `tbl_health_issue_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_inbody_result`
--
ALTER TABLE `tbl_inbody_result`
  ADD CONSTRAINT `tbl_inbody_result_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD CONSTRAINT `tbl_medicine_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `tbl_patient` (`patientId`);

--
-- Constraints for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD CONSTRAINT `tbl_treatment_ibfk_1` FOREIGN KEY (`nsoId`) REFERENCES `tbl_nso` (`nsoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
