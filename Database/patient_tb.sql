-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 11:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaratehospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_tb`
--

CREATE TABLE `patient_tb` (
  `hospistalrecordNo.` int(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bDate` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone_home` varchar(50) DEFAULT NULL,
  `phone_work` varchar(50) DEFAULT NULL,
  `cellNo` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `occupation` varchar(300) DEFAULT NULL,
  `employerName` varchar(300) DEFAULT NULL,
  `employerDetail` varchar(300) DEFAULT NULL,
  `workAddress` varchar(300) DEFAULT NULL,
  `nationality` varchar(300) DEFAULT 'Filipino',
  `religion` varchar(300) DEFAULT NULL,
  `maritalStatus` varchar(300) NOT NULL DEFAULT 'Single',
  `spouseName` varchar(300) DEFAULT NULL,
  `spouseContact` varchar(300) DEFAULT NULL,
  `motherName` varchar(200) DEFAULT NULL,
  `motherContact` varchar(200) NOT NULL,
  `fatherContact` varchar(200) NOT NULL,
  `phMember` varchar(100) DEFAULT NULL,
  `phNo` varchar(100) DEFAULT NULL,
  `HMO` varchar(100) DEFAULT NULL,
  `typeHMO` varchar(100) DEFAULT NULL,
  `CertNo` varchar(100) DEFAULT NULL,
  `emergencyName` varchar(100) NOT NULL,
  `patientRelationship` varchar(100) NOT NULL,
  `emergencyAddress` varchar(100) NOT NULL,
  `emergencyHome` varchar(100) NOT NULL,
  `emergencyWork` varchar(100) NOT NULL,
  `emergencyCell` varchar(100) NOT NULL,
  `patientAllergies` varchar(100) DEFAULT NULL,
  `patientsurgicalHistory` varchar(100) DEFAULT 'No History',
  `patientActiveDiag` varchar(100) DEFAULT NULL,
  `patientActiveMed` varchar(100) DEFAULT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `fatherName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_tb`
--

INSERT INTO `patient_tb` (`hospistalrecordNo.`, `lname`, `fname`, `mname`, `age`, `gender`, `bDate`, `address`, `phone_home`, `phone_work`, `cellNo`, `email`, `occupation`, `employerName`, `employerDetail`, `workAddress`, `nationality`, `religion`, `maritalStatus`, `spouseName`, `spouseContact`, `motherName`, `motherContact`, `fatherContact`, `phMember`, `phNo`, `HMO`, `typeHMO`, `CertNo`, `emergencyName`, `patientRelationship`, `emergencyAddress`, `emergencyHome`, `emergencyWork`, `emergencyCell`, `patientAllergies`, `patientsurgicalHistory`, `patientActiveDiag`, `patientActiveMed`, `createDate`, `modifiedDate`, `status`, `fatherName`) VALUES
(1, 'Test', 'Test', 'Test', '9', 'Male', '2013-08-08', 'SampleAddres', 'samplePhoneHome', 'samplePhonework', 'sampleCellNo.', 'sample@gmail.com', 'SampleOccupation', 'SampleEmployer', 'employerDetails', 'sampleWorkAdd', 'Filipino', 'Sample nationality', 'Married', 'sampleName', 'samplespouseContact', 'sampleMotherName', 'sampleMotherContact', 'samplefatherName', 'samplepgMember', 'samplepHno.', 'SampleHMO', 'sampleHmotype', 'sampleCertNo.', 'SampleEmergencyName', 'SampleRelationship', 'SampleEmergencyAddress', 'SampleEmergencyHome', 'SampleEmergencyWork', 'SampleEmergencycell', 'SamplepatientsAllergies', 'No History', 'SamplepatientsDiag', 'SamplepatientsActiveMeds', '2023-08-02 13:49:52', '2023-08-02 13:49:52', 1, NULL),
(2, 'sample', 'sample', 'sample', 'sample', 'sample', '2023-08-02', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'Filipino', 'sample', 'Single', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'No History', NULL, 'sample', '2023-08-18 13:12:09', '2023-08-18 13:12:09', 1, 'sample'),
(3, 'TestLname', 'TestFname', 'TestMname', 'TestAge ', 'Female', '2023-08-03', 'TestAddress', 'TestPhoneNo(Home)', ' TestPhoneNo(work)', 'TestPhoneNo(Cellphon', 'Testsargentoryanjoshua@gmail.com', 'TestOccupation', 'TestEmployerName', 'TestEmployerContactNo', 'sdasdas', 'TestNationality', 'TestReligion', 'Single', 'TestSpouseName', ' TestSpouseContactNo.', ' TestMotherName', 'TestMotherContactNo.', 'TestFatherName', ' NH', 'TestPHPIN', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'wdsadasd', ' Test relation Contact Home', 'Test relation Contact work', 'Test relation Contact cp', 'Test Allergy', 'sdasdas', 'Test relation Contact cp', ' sdasdasd', '2023-08-18 14:11:50', '2023-08-18 14:11:50', 1, 'TestFatherContactNo.'),
(4, 'Tabuyan', 'Kean Arthur', 'Sargento', 'sdasd ', 'Female', '2023-08-10', 'sdasd', 'dsadas', ' sdas', 'sdasd', 'kean@hr.com', 'sdasd', 'sdasd', 'sdasdas', 'asdasd', 'sdasdasd', 'asdasd', 'Single', 'Kean Arthur Sargento Tabuyan', ' dasdasd', ' asdasd', 'asdasd', '', ' NH', 'dasdasdasd', 'dasdas', 'sdasd', 'dasdasd', 'sdasdas', 'sadasd', 'sdasda', ' sdasd', 'sdasd', 'dasdasd', 'sdasd', 'asdasd', 'dasdasd', ' sdsdasd', '2023-08-18 14:14:21', '2023-08-18 14:14:21', 1, 'dasasd'),
(5, 'Tabuyan', 'Kean Arthur', 'Sargento', 'sdasd ', 'Female', '2023-08-04', 'sdasd', 'dsadas', ' sdas', 'sdasd', 'kean@hr.com', 'sdasd', 'sdasd', 'sdasdas', 'jvhvhhv , m. m. m . m', 'sdasdasd', 'mgjcjcjchj', 'NN', 'Kean Arthur Sargento Tabuyan', ' ydydccjcjcj', ' fshghvjhc', 'jcjgducjyd', 'hhzstrh ycjh', ' ', 'cjgjhgxf', 'jbkjcbzkxjbzc', 'kxbc,mzxbc,mxz', 'cjbxzkczbxcjkzx', 'xbzckjzbkxzcj', '', 'lkzxlzkczlbxck', ' jzbcxkjzbcxzkj,', 'cxkzxc,mz,bcxm', 'kxcn,zkxczn,mx', 'cm,zmxzcm,x ', 'nzkxcn,zcmx', 'kxcn,zkxczn,mx', ' zxbc,mxbzxnczmx', '2023-08-18 14:17:22', '2023-08-18 14:17:22', 1, 'hcjhcjgrs'),
(6, 'Test2LastName', 'Test2FirstName', 'Test2MiddleName', '78 ', 'Female', '2023-08-11', 'Test2Address', 'Test2PhoneNo(Home)', ' Test2PhoneNo(Work)', 'Test2PhoneNo(Cp)', 'Test2sargentoryanjoshua@gmail.com', 'Test2Occupation', 'Test2EmployerName', 'Test2EmployerContactNo', 'Test2Address', 'Test2Nationality', 'Test2Religion', 'Separated', 'Test2Spouse', ' Test2PhoneNo', ' Test2MotherName', 'Test2PhoneNo(Mother)', 'TestFatherName', ' NN', 'Test2PhilHealth', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'Test2Address', ' Test2Phone(Home)', 'Test2Phone(work)', 'Test2Phone(CP)', 'Test2Alllergies', 'Test2Surgical History', 'Test2Diag', ' Test2Meds', '2023-08-18 16:29:13', '2023-08-18 16:29:13', 1, 'Test2PhoneNo(father)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_tb`
--
ALTER TABLE `patient_tb`
  ADD PRIMARY KEY (`hospistalrecordNo.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_tb`
--
ALTER TABLE `patient_tb`
  MODIFY `hospistalrecordNo.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
