-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 12:34 PM
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
-- Database: `graduate_student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_info`
--

CREATE TABLE `applicant_info` (
  `applicant_info_id` int(11) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(70) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_info`
--

INSERT INTO `applicant_info` (`applicant_info_id`, `father_name`, `mother_name`, `email`, `phone`, `address`, `age`) VALUES
(1, 'muneza', 'golorie', 'fdjfhdfhd@gmail.com', '072123323', 'butare', 23),
(2, 'kalisa', 'domina', 'eric@gmail.com', '0798877565', 'gasb0', 24),
(3, 'ezer', 'munyana', 'petre@gmail.com', '078671223', 'kabarore', 22),
(5, 'murerwa', 'Didier', 'didasbirimimana03@gmail.com', '987654345678', 'dfg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `credits_number` int(11) NOT NULL,
  `semester_offered` varchar(50) NOT NULL,
  `grade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_id`, `student_id`, `course_title`, `department`, `credits_number`, `semester_offered`, `grade`) VALUES
(1, 1, 'JAVA', 'BIT', 15, '2', 'A'),
(2, 4, 'bzness mgt', 'BIT', 10, '1', 'B'),
(3, 1, 'economics', 'acc', 20, '2', 'B'),
(12, 4, 'Web Technology', 'Bit', 10, '3', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `financial_issues_info`
--

CREATE TABLE `financial_issues_info` (
  `financial_info_id` int(11) NOT NULL,
  `school_fees` varchar(200) NOT NULL,
  `library_status` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_issues_info`
--

INSERT INTO `financial_issues_info` (`financial_info_id`, `school_fees`, `library_status`, `student_id`) VALUES
(1, 'Cleared', 'Not Cleared', 4),
(2, 'Not Cleared', 'Cleared', 1),
(4, 'Cleared', 'Cleared', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_research_info`
--

CREATE TABLE `project_research_info` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_purpose` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `project_invigilator_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_research_info`
--

INSERT INTO `project_research_info` (`project_id`, `project_name`, `project_purpose`, `student_id`, `project_invigilator_name`) VALUES
(1, 'nursing project', 'to care patient', 1, 'emmy'),
(3, 'system of study ', 'well study', 4, 'bela'),
(11, 'Ict in rural areas project', 'Development', 4, 'Munyandekwe ');

-- --------------------------------------------------------

--
-- Table structure for table `semester_info`
--

CREATE TABLE `semester_info` (
  `semester_info_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_code` varchar(50) NOT NULL,
  `total_number_of_modules` int(11) NOT NULL,
  `failed_modules` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester_info`
--

INSERT INTO `semester_info` (`semester_info_id`, `start_date`, `ending_date`, `student_id`, `semester_code`, `total_number_of_modules`, `failed_modules`) VALUES
(2, '2022-08-07', '2023-02-10', 1, '3', 17, 2),
(6, '2024-04-09', '2024-04-11', 4, '2', 45, 0),
(7, '2024-04-18', '2024-04-04', 1, '2', 55, 4),
(8, '2024-04-18', '2024-04-04', 1, '2', 676, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `date_of_birth`, `email`, `phone_number`, `gender`) VALUES
(1, 'elyze', 'Mugisha', '2000-01-02', 'elyz@gmail.com', '079899998', 'Male'),
(4, 'Ndiho', 'Ben', '2004-01-03', 'GG@gmail.com', '079899998', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'DIDAS', 'BIRIMIMANA', 'Didas03', 'birimimanad@gmail.com', '0788903506', '$2y$10$/o9.mYptFPXc0N6wN6mKT.xoKEo1zMdzSP4c2E1qVT36EsDlPBix.', '2024-04-20 06:25:47', '65432', 0),
(3, 'ELYSEE', 'didie', 'ddiddie', 'didieelys@gmail.com', '0788903506', '$2y$10$Pn9gyib.uXwrxIgls3eHx.eGsaVzwFirjOVjH0V7QshF3lL61sWeW', '2024-04-20 06:27:39', '55544', 0),
(4, 'DIDAS', 'BIRIMIMANA', 'Didas07', 'didasbirimimana03@gmail.com', '0788903506', '$2y$10$f.c/HZtGd9HuGltcQVYykeO344GuoaYHAb.fT4pmeBqu5R7A.UBA.', '2024-04-20 06:30:54', '45', 0),
(8, 'DIDAS', 'BIRIMIMANA', 'Didas09', 'd!@gmail.com', '0788903506', '$2y$10$zxTLI6BE6frKyC.zD9GzaOl2Ik0iVOs.gafpFGoI4JJYVizk88UeW', '2024-04-21 18:18:30', '8888', 0),
(9, 'tttt', 'hhh', 'Didas90', 'yz@gmail.com', '23456789', '$2y$10$Bluz5s580g.XFv.hEDI7eOzWPSwvKolvwJyOHt7a0N5WWKSol2BNi', '2024-04-21 18:20:45', '900', 0),
(10, 'Ishimwe', 'claudette', 'Ishimwe07', 'ishimwe@gmail.com', '0788903506', '$2y$10$bye7b84jk2sYeyDEs4fOpOe/Kc0./Qjf41OtUCTBbs2MlmUWA1UkO', '2024-04-23 15:42:37', '8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_info`
--
ALTER TABLE `applicant_info`
  ADD PRIMARY KEY (`applicant_info_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `financial_issues_info`
--
ALTER TABLE `financial_issues_info`
  ADD PRIMARY KEY (`financial_info_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `project_research_info`
--
ALTER TABLE `project_research_info`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `semester_info`
--
ALTER TABLE `semester_info`
  ADD PRIMARY KEY (`semester_info_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_info`
--
ALTER TABLE `applicant_info`
  MODIFY `applicant_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `financial_issues_info`
--
ALTER TABLE `financial_issues_info`
  MODIFY `financial_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_research_info`
--
ALTER TABLE `project_research_info`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `semester_info`
--
ALTER TABLE `semester_info`
  MODIFY `semester_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_info`
--
ALTER TABLE `course_info`
  ADD CONSTRAINT `course_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `financial_issues_info`
--
ALTER TABLE `financial_issues_info`
  ADD CONSTRAINT `financial_issues_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `project_research_info`
--
ALTER TABLE `project_research_info`
  ADD CONSTRAINT `project_research_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `semester_info`
--
ALTER TABLE `semester_info`
  ADD CONSTRAINT `semester_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
