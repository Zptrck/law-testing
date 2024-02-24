-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 04:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blotter`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `case_no` varchar(255) NOT NULL,
  `case_title` varchar(255) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `complainant_address` varchar(255) NOT NULL,
  `respondent` varchar(255) NOT NULL,
  `respondent_address` varchar(255) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `dates` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`case_no`, `case_title`, `complainant_name`, `complainant_address`, `respondent`, `respondent_address`, `nature`, `date`, `time`, `dates`, `remarks`) VALUES
('2021001', 'qwe', 'qew', 'qew', 'qwe', 'qew', 'qew', '2023-05-23', '02:03:00', '0000-00-00', 'Pending'),
('2021004', 'Dhenmark  Pares vs John Lester Reyes', 'Dhenmark  Pares', 'Purok 1 Brgy. Bambang', 'John Lester Reyes', 'Purok 1 Brgy. Bambang', 'Fighting', '2022-06-02', '10:00:00', '2022-06-04', 'Closed'),
('2021005', 'John Kim Balagbag vs Waren  Masilang', 'John Kim Balagbag', 'Purok 5 Brgy. Bambang', 'Waren  Masilang', 'Purok 1 Brgy. Bambang', 'Civil', '2022-01-17', '11:00:00', '2022-01-07', 'Closed'),
('2022003', 'Raymond Guiterez vs Coring Markini', 'Dhenmark  Pares', 'Purok 2 Brgy. Bambang', 'Coring Markini', 'Purok 3 Brgy. Bambang', 'Debt', '2023-09-23', '12:00:00', '2022-07-25', 'Closed'),
('2023001', 'John Mark Montecillo vs  James Simon Gonzales', 'John Mark Montecillo', 'Purok 4 Brgy. Bambang', 'James Simon Gonzales', 'Purok 4 Brgy. Bambang', 'Civil', '2023-05-20', '11:00:00', '0000-00-00', 'Pending'),
('2023002', 'Loyd  Sanchez vs Coring Markini', 'Raymond Guiterez', 'Purok 2 Brgy. Bambang', 'Coring Markini', 'Purok 3 Brgy. Bambang', 'Debt', '2023-09-03', '12:00:00', '0000-00-00', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`case_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
