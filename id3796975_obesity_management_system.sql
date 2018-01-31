-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2017 at 02:17 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3796975_obesity_management_system`
--
CREATE DATABASE IF NOT EXISTS `id3796975_obesity_management_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id3796975_obesity_management_system`;

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
(6001, 'jogging', '20'),
(6002, 'berenang', '25'),
(6003, 'Memanah', '10'),
(6004, 'Memancing', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `name`, `gender`, `username`, `password`) VALUES
(1, 'admin', 'Lelaki', 'admin1', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anthro_data`
--

CREATE TABLE `tbl_anthro_data` (
  `antroId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `BMI` float NOT NULL,
  `bodyFatMass` float NOT NULL,
  `wrist` float NOT NULL,
  `waist` float NOT NULL,
  `hip` float NOT NULL,
  `forearm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anthro_data`
--

INSERT INTO `tbl_anthro_data` (`antroId`, `patientId`, `date`, `weight`, `height`, `BMI`, `bodyFatMass`, `wrist`, `waist`, `hip`, `forearm`) VALUES
(3, 1, '2017-11-30', 55, 155, 22.89, 20, 24, 24, 24, 4),
(4, 1, '2017-11-30', 55, 155, 22.89, 20, 24, 24, 24, 4),
(5, 1, '2017-12-21', 88, 170, 30.45, 28, 7, 30, 50, 10),
(6, 40, '2017-12-21', 54, 145, 25.68, 12, 32, 22, 30, 21),
(8, 43, '2017-12-22', 80, 155, 33.3, 24, 21, 40, 45, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `nsoId` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
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
(104, 34, 14, '2017-11-21', '08:00:00', ''),
(105, 34, 14, '2017-11-21', '09:00:00', ''),
(106, 34, 14, '2017-11-21', '11:30:00', ''),
(107, 34, 14, '2017-11-30', '11:50:00', ''),
(108, 34, 14, '2017-11-24', '15:15:00', ''),
(109, 1, 14, '2017-11-22', '08:00:00', ''),
(111, 1, 14, '2017-11-26', '11:15:00', ''),
(112, 10, 14, '2017-11-26', '10:30:00', ''),
(113, 34, 14, '2017-11-10', '10:15:00', ''),
(114, 10, 14, '2017-11-07', '08:30:00', ''),
(115, 1, 14, '2017-11-30', '09:15:00', ''),
(116, 1, 14, '2017-12-04', '09:15:00', ''),
(117, 3, 14, '2017-12-13', '03:15:00', ''),
(118, 1, 14, '2017-12-27', '08:15:00', ''),
(119, 10, 14, '2017-12-04', '09:15:00', ''),
(120, 41, 14, '2017-12-22', '11:45:00', ''),
(121, 43, 42, '2017-12-22', '11:45:00', '');

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

--
-- Dumping data for table `tbl_daily_diet`
--

INSERT INTO `tbl_daily_diet` (`dailyDietId`, `patientId`, `drinkId`, `foodId`, `activityId`, `date`) VALUES
(2, 1, 5001, 4001, 6001, '2017-11-01'),
(3, 10, 5003, 4004, 6002, '2017-10-18'),
(4, 1, 5001, 4001, 6001, '2017-11-02'),
(6, 1, 5002, 4003, 6002, '2017-11-01'),
(7, 1, 5003, 4002, 6002, '2017-12-21'),
(8, 1, 5003, 4002, 6003, '2017-12-21'),
(9, 43, 5001, 4001, 6003, '2017-12-21'),
(10, 43, 5002, 4009, 6002, '2017-12-21');

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
(5001, 'Jus buah-buahan', '2'),
(5002, 'Air Sirap', '5'),
(5003, 'Milo', '7'),
(5004, 'Teh', '6'),
(5005, 'Pepsi', '30');

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
(4001, 'Ikan', '15'),
(4002, 'Ayam', '20'),
(4003, 'Daging', '20'),
(4004, 'Keropok', '25'),
(4005, 'Kambing', '2000'),
(4007, 'Strawberry', '2'),
(4008, 'curry', '300'),
(4009, 'Donut', '120');

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
(1, 1, 'Thyroid', '2 Tahun'),
(2, 2, 'Heart Attack', 'wet'),
(3, 2, 'Fatty Liver', '3 Years'),
(4, 1, 'Heart Attack', '3 months'),
(5, 1, 'Others', '1 Minggu'),
(6, 1, 'Fatty Liver', '4 Tahun'),
(7, 37, 'ser', 'sd'),
(8, 38, 'dfsa', 'dsf'),
(9, 39, 'sss', '123'),
(10, 40, 'Diabetes', '3 bulan'),
(11, 2, 'Osteoarthritis', '1 months'),
(14, 43, 'Fatty Liver', '3 months'),
(15, 43, 'High Blood Pressure', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ideal_weight`
--

CREATE TABLE `tbl_ideal_weight` (
  `iw_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ideal_weight`
--

INSERT INTO `tbl_ideal_weight` (`iw_id`, `gender`, `height`, `min`, `max`) VALUES
(1, 'Lelaki', 135, 28, 35),
(2, 'Lelaki', 137, 30, 39),
(3, 'Lelaki', 140, 33, 40),
(4, 'Lelaki', 142, 35, 44),
(5, 'Lelaki', 145, 38, 46),
(6, 'Lelaki', 147, 40, 50),
(7, 'Lelaki', 150, 43, 53),
(8, 'Lelaki', 152, 45, 55),
(9, 'Lelaki', 155, 48, 59),
(10, 'Lelaki', 157, 50, 61),
(11, 'Lelaki', 160, 53, 65),
(12, 'Lelaki', 162, 55, 68),
(13, 'Lelaki', 165, 58, 70),
(14, 'Lelaki', 167, 60, 74),
(15, 'Lelaki', 170, 63, 76),
(16, 'Lelaki', 172, 65, 80),
(17, 'Lelaki', 175, 67, 83),
(18, 'Lelaki', 177, 70, 85),
(19, 'Lelaki', 180, 72, 89),
(20, 'Perempuan', 135, 28, 35),
(21, 'Perempuan', 137, 30, 37),
(22, 'Perempuan', 140, 32, 40),
(23, 'Perempuan', 142, 39, 42),
(24, 'Perempuan', 145, 36, 45),
(25, 'Perempuan', 147, 39, 47),
(26, 'Perempuan', 150, 40, 50),
(27, 'Perempuan', 152, 43, 52),
(28, 'Perempuan', 155, 45, 55),
(29, 'Perempuan', 157, 47, 57),
(30, 'Perempuan', 160, 49, 60),
(31, 'Perempuan', 162, 51, 62),
(32, 'Perempuan', 165, 53, 65),
(33, 'Perempuan', 167, 55, 67),
(34, 'Perempuan', 170, 57, 70),
(35, 'Perempuan', 172, 59, 72),
(36, 'Perempuan', 175, 61, 75),
(37, 'Perempuan', 177, 63, 77),
(38, 'Perempuan', 180, 65, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbody_result`
--

CREATE TABLE `tbl_inbody_result` (
  `inbodyId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `date` date NOT NULL,
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
  `muscleControl` varchar(15) NOT NULL,
  `fatControl` varchar(15) NOT NULL,
  `fitnessScore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbody_result`
--

INSERT INTO `tbl_inbody_result` (`inbodyId`, `patientId`, `date`, `weight`, `BMI`, `muscleMass`, `bodyFatMass`, `FatFreeMass`, `protein`, `mineral`, `percentBodyFat`, `waistHipRatio`, `baseMetabolicRate`, `muscleControl`, `fatControl`, `fitnessScore`) VALUES
(1, 10, '2017-11-02', 55, 22.89, 65, 25, 38.5, 35, 23, 20, 24, 30, '-45', '+10', '21% - 24% (Fitness)'),
(2, 10, '2017-11-03', 62, 25.81, 49, 54, 38.5, 35, 23, 20, 24, 30, '+50', '+67', '18% - 24% (Average)'),
(3, 10, '2017-11-03', 49, 20.4, 60, 25, 38.5, 35, 23, 20, 24, 30, '-40', '-20', '14% - 20% (Athletes)'),
(5, 1, '2017-11-30', 55, 22.89, 0, 20, 0, 0, 0, 0, 24, 0, '00', '00', '21% - 24% (Fitness)'),
(6, 1, '2017-11-30', 55, 22.89, 0, 20, 0, 0, 0, 0, 24, 0, '00', '00', '21% - 24% (Fitness)'),
(7, 1, '2017-12-21', 88, 30.45, 0, 28, 0, 0, 0, 0, 30, 0, '00', '00', '25% - 31% (Average)'),
(8, 40, '2017-12-21', 54, 25.68, 0, 12, 0, 0, 0, 0, 22, 0, '00', '00', '25% - 31% (Average)'),
(10, 43, '2017-12-22', 80, 33.3, 0, 24, 0, 0, 0, 0, 40, 0, '00', '00', '32% and above (Obese)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicineId` int(11) NOT NULL,
  `medicineName` varchar(255) NOT NULL,
  `patientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicineId`, `medicineName`, `patientId`) VALUES
(1, 'Propranolol 40MG', 1),
(2, 'Carbimazole 5MG', 1),
(3, 'Doa', 2),
(4, 'paracetemol', 1),
(6, 'Doa', 43),
(7, 'Panadol ActiveFast', 43);

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
(1, 'nso100', 'Fatin', 'Perempuan', 'Kajang', '950619115637', '97856745', '123', 'adala@gmail.com'),
(2, '', 'user', 'Lelaki', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(4, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(5, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(7, '', 'user', 'Perempuan', 'sas', '950619115637', '97856745', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(8, '', 'Ahmad', 'Lelaki', 'dsewrwe', '980312085028', '2147483647', '202cb962ac59075b964b07152d234b70', 'test@gmail.com'),
(9, '', 'hadi', 'Lelaki', 'dcs', '950619115637', '234', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(10, '', 'azadddd', 'Lelaki', 'sad', '950619115368', '148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
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
(27, 'staff7', 'dddddd', 'Lelaki', 'sda', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(28, 'admin1', 'sd', 'Lelaki', 'asd', '950619115368', '0148295569', '202cb962ac59075b964b07152d234b70', 'a@gmail.com'),
(30, 'yusna1', 'Yusna', 'Female', 'Kajang', '941120111111', '0172767126', 'yusna1', 'yusnamarlina@gmail.com'),
(31, 'hello1', 'Yusna', 'Female', 'No 495', '941120111111', '0172767126', 'hello1', 'yusnamarlina@gmail.com'),
(42, 'staff15', 'Test Lagi', 'Perempuan', 'No 495', '941120111111', '0123456789', '6886cd2ce3a59781a0de62584847448f', 'yusnamarlina@gmail.com'),
(43, 'abu123', 'Abu', 'Lelaki', 'Taman Abu', '941120111111', '0123456789', '09d0714edbfe6a5be5f51a8d706cefb6', 'abu@gmail.com');

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
  `password` varchar(255) NOT NULL,
  `hipertensi` varchar(5) NOT NULL,
  `kardiovaskular` varchar(5) NOT NULL,
  `diabetes` varchar(5) NOT NULL,
  `asma` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patientId`, `username`, `name`, `gender`, `dateOfBirth`, `icNo`, `address`, `city`, `state`, `poscode`, `race`, `religion`, `education`, `currentInfo`, `status`, `telNo`, `email`, `password`, `hipertensi`, `kardiovaskular`, `diabetes`, `asma`) VALUES
(1, 'patient1', 'Dilla', 'Perempuan', '1995-10-12', '950619115368', 'Kajang', 'sdasd', 'Pahang', 2425, 'Melayu', 'lain2', 'lain', 'bekerja', 'Berkahwin', 172767126, 'dilla@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ya', 'Ya', 'Tidak', 'Tidak'),
(2, '', 'Bell', 'Perempuan', '1995-10-03', '950619115368', 'faf', 'fgfdg', 'Pahang', 3245, 'Melayu', 'Islam', 'UPSR', 'on', 'Bujang', 34241, 'a@gmail.com', 'vfgrdg', 'Ya', 'Tidak', 'Ya', 'Tidak'),
(3, '', 'Sumairah', 'Perempuan', '1995-10-03', '950619115368', 'Taman Mutiara', 'fgfdg', 'Pahang', 3245, 'Melayu', 'Islam', 'UPSR', 'Tidak bekerja', 'Bujang', 1123456789, 'sumairah@gmail.com', 'dfdg', '', '', '', ''),
(4, 'patient4', 'MUHAMMAD SYAZZANY BIN SHUHAIMI', 'Lelaki', '1996-11-01', '961111111111', 'Kuala Lumpur', '-', 'Selangor', 43000, 'Malay', 'Islam', '', '', '', 11762712, 'test123@gmail.com', '', '', '', '', ''),
(5, 'patient5', 'NURUL FARAH HANI BINTI ZAIMAL', 'Perempuan', '1997-01-01', '971213111111', 'kuantan', 'kuantan', 'Pahang', 0, 'Malay', '', '', '', '', 0, '', '', '', '', '', ''),
(10, 'patient6', 'Aslam', 'Lelaki', '1995-10-17', '950619115368', 'jkjh', 'jkhjm', 'Pulau Pinang', 65765, 'Melayu', 'llll', 'lain', 'belajar', 'Bujang', 7, 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(33, 'patient3', 'Aina Badrul Zaman', 'Perempuan', '1994-05-17', '940123457343', 'rawang', 'bandar', 'Selangor', 0, 'Melayu', 'Islam', 'Degree', 'belajar', 'Bujang', 12334678, 'aina@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(34, 'testPatient1', 'Paan', 'Lelaki', '1996-11-02', '930412235433', 'Blok G ke Blok H ke yang pasti KPZ', 'Johor Jaya', 'Johor', 10001, 'Melayu', 'Islam', 'UPSR', 'Tidak bekerja', 'Berkahwin', 14234557, 'paan@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(35, 'staff23', 'awang', 'Lelaki', '2017-12-13', '950120145627', '31', 'bandar baru bangi', 'Perlis', 21300, 'Melayu', 'f', 'd', 'fs', 'Bujang', 122675896, 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(36, 'staff23', 'awang', 'Lelaki', '2017-12-13', '950120145627', '31', 'bandar baru bangi', 'Perlis', 21300, 'Melayu', 'f', 'd', 'fs', 'Bujang', 122675896, 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(37, 'staff23', 'awang', 'Lelaki', '2017-12-13', '950120145627', '31', 'bandar baru bangi', 'Perlis', 21300, 'Melayu', 'f', 'd', 'fs', 'Bujang', 122675896, 'a@gmail.com', '9f6e6800cfae7749eb6c486619254b9c', '', '', '', ''),
(38, 'staff23', 'awang', 'Lelaki', '2017-12-13', '950120145627', '31', 'bandar baru bangi', 'Perlis', 21300, 'Melayu', 'f', 'd', 'fs', 'Bujang', 122675896, 'a@gmail.com', '0244e0b239de091515c2406440c5ad00', '', '', '', ''),
(39, 'staff23', 'awang', 'Lelaki', '2017-12-13', '950120145627', '31', 'bandar baru bangi', 'Perlis', 21300, 'Melayu', 'f', 'd', 'fs', 'Bujang', 122675896, 'a@gmail.com', '4ec503be252d765ea37621a629afdaa6', '', '', '', ''),
(40, 'patient20', 'Mariam', 'Perempuan', '1994-02-01', '940102111111', 'No.3', 'Jalan Bangi', 'Selangor', 43000, 'Melayu', 'Islam', 'Diploma', 'Freelancer', 'Berkahwin', 172767126, 'yusnamarlina@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ya', 'Tidak', 'Ya', 'Ya'),
(41, 'patient30', 'Yusna Marlina', 'Perempuan', '1994-11-20', '941111111112', 'Taman prima saujana', 'Kajang', 'Selangor', 43000, 'Melayu', 'Islam', 'Diploma', 'UKM', 'Bujang', 172767126, 'yusnamarlina@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '', ''),
(43, 'patient31', 'Yusna M', 'Perempuan', '1994-11-20', '941111111111', 'Prima Saujana Kajang', 'Kajang', 'Melaka', 43000, 'Melayu', 'Islam', 'Diploma', 'UKM', 'Bujang', 172767127, 'babychoki2@rocketmail.com', '154d7a916865bc12b93fd4772e848a34', 'Tidak', 'Ya', 'Ya', 'Ya');

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
-- Dumping data for table `tbl_treatment`
--

INSERT INTO `tbl_treatment` (`treatmentId`, `patientId`, `nsoId`, `date`, `remarks`) VALUES
(4, 1, 14, '2017-11-30', 'Perlu menjalani rawatan susulan pada tiga minggu akan datang'),
(5, 1, 14, '2017-11-30', 'BMI semasa : 23.1 \r\n						                  perlu menjalani aktiviti fizikal berkala selama 2 bulan'),
(6, 1, 14, '2017-11-30', 'Test'),
(7, 1, 14, '2017-12-13', 'Berat menurun secara stabil'),
(9, 43, 42, '2017-12-22', 'Perjumpaan pertama');

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
-- Indexes for table `tbl_ideal_weight`
--
ALTER TABLE `tbl_ideal_weight`
  ADD PRIMARY KEY (`iw_id`);

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
  ADD PRIMARY KEY (`treatmentId`);

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_anthro_data`
--
ALTER TABLE `tbl_anthro_data`
  MODIFY `antroId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_daily_diet`
--
ALTER TABLE `tbl_daily_diet`
  MODIFY `dailyDietId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_drink`
--
ALTER TABLE `tbl_drink`
  MODIFY `drinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5007;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4010;

--
-- AUTO_INCREMENT for table `tbl_health_issue`
--
ALTER TABLE `tbl_health_issue`
  MODIFY `healthIssueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_ideal_weight`
--
ALTER TABLE `tbl_ideal_weight`
  MODIFY `iw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_inbody_result`
--
ALTER TABLE `tbl_inbody_result`
  MODIFY `inbodyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_nso`
--
ALTER TABLE `tbl_nso`
  MODIFY `nsoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `treatmentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
