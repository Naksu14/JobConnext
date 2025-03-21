-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2025 at 01:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Job_connext`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` int(255) NOT NULL,
  `hash_password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicants`
--

CREATE TABLE `tbl_applicants` (
  `worker_id` int(10) NOT NULL,
  `job_post_id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_applied` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blue_collar_worker`
--

CREATE TABLE `tbl_blue_collar_worker` (
  `worker_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `otp_verification` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blue_collar_worker`
--

INSERT INTO `tbl_blue_collar_worker` (`worker_id`, `username`, `email`, `hash_password`, `status`, `otp_verification`) VALUES
(1001, 'Meko_Neko010', 'akirakarasu010@gmail.com', '$2y$10$Zo9GtqVpTZZtcTa.dkJB4uI0GCv5K.AKPh7a5UadiIaTGzELKdiUK', 1, 129532);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT '1',
  `otp_verification` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `username`, `email`, `hash_password`, `status`, `otp_verification`) VALUES
(2001, 'Aki010', 'irisalacapa010@gmail.com', '$2y$10$K4lYluRyolPSbaK47NaizehSp/j6j1wLaDkoirA4w3KeQ5.rv4nj2', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_information`
--

CREATE TABLE `tbl_client_information` (
  `id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `profile` blob DEFAULT NULL,
  `phone_no` varchar(20) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `barangay` varchar(20) NOT NULL,
  `postalcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_information`
--

INSERT INTO `tbl_client_information` (`id`, `client_id`, `firstname`, `middlename`, `lastname`, `profile`, `phone_no`, `bio`, `country`, `city`, `region`, `province`, `barangay`, `postalcode`) VALUES
(1, 2001, 'Lord Raven Flea Iris', 'Alacapa', 'Enrique', NULL, '+63-242-342-3423', 'New worker', 'philippines', 'bacoor', 'calabarzon', 'cavite', 'mambog 5', '4125');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_jobpost`
--

CREATE TABLE `tbl_client_jobpost` (
  `client_id` int(11) NOT NULL,
  `job_post_id` int(10) NOT NULL,
  `job_offer` varchar(50) NOT NULL,
  `salary` int(25) NOT NULL,
  `picture/pdf` blob NOT NULL,
  `job_status` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` int(11) NOT NULL,
  `applicants` int(11) NOT NULL,
  `year_exp` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_skills_sets`
--

CREATE TABLE `tbl_client_skills_sets` (
  `id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `skills` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_skills_sets`
--

INSERT INTO `tbl_client_skills_sets` (`id`, `client_id`, `skills`) VALUES
(1, 2001, 'Welder'),
(2, 2001, 'Electrician'),
(3, 2001, 'Truck driver'),
(4, 2001, 'Plumber');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id_skills` int(10) NOT NULL,
  `skills` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id_skills`, `skills`) VALUES
(1, 'Welder'),
(2, 'Electrician'),
(3, 'Truck driver'),
(4, 'Plumber');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker_information`
--

CREATE TABLE `tbl_worker_information` (
  `id` int(10) NOT NULL,
  `worker_id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `profile` blob DEFAULT NULL,
  `phone_no` varchar(20) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `barangay` varchar(20) NOT NULL,
  `postalcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_worker_information`
--

INSERT INTO `tbl_worker_information` (`id`, `worker_id`, `firstname`, `middlename`, `lastname`, `profile`, `phone_no`, `bio`, `country`, `city`, `region`, `province`, `barangay`, `postalcode`) VALUES
(1, 1001, 'Lord Raven Flea Iris', 'Alacapa', 'Enrique', NULL, '+63-242-342-3423', 'New worker', 'philippines', 'bacoor', 'calabarzon', 'cavite', 'mambog 5', '4125'),
(2, 1001, 'Lord Raven Flea Iris', 'Alacapa', 'Enrique', NULL, '+63-242-342-3423', 'New worker', 'philippines', 'bacoor', 'calabarzon', 'cavite', 'mambog 5', '4125');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker_resume`
--

CREATE TABLE `tbl_worker_resume` (
  `worker_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `folder_path` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_worker_resume`
--

INSERT INTO `tbl_worker_resume` (`worker_id`, `filename`, `folder_path`, `timestamp`) VALUES
(1001, 'Flag Command.pdf', 'uploads/', '2025-03-16 09:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker_skill_sets`
--

CREATE TABLE `tbl_worker_skill_sets` (
  `id` int(10) NOT NULL,
  `worker_id` int(10) NOT NULL,
  `skills` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_worker_skill_sets`
--

INSERT INTO `tbl_worker_skill_sets` (`id`, `worker_id`, `skills`) VALUES
(1, 1001, 'Welder'),
(2, 1001, 'Electrician'),
(3, 1001, 'Truck driver'),
(4, 1001, 'Plumber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  ADD KEY `worker_id_applicant` (`worker_id`),
  ADD KEY `job_post_id` (`job_post_id`);

--
-- Indexes for table `tbl_blue_collar_worker`
--
ALTER TABLE `tbl_blue_collar_worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_client_information`
--
ALTER TABLE `tbl_client_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `tbl_client_jobpost`
--
ALTER TABLE `tbl_client_jobpost`
  ADD PRIMARY KEY (`job_post_id`),
  ADD KEY `client_id_post` (`client_id`);

--
-- Indexes for table `tbl_client_skills_sets`
--
ALTER TABLE `tbl_client_skills_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_skill` (`client_id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id_skills`);

--
-- Indexes for table `tbl_worker_information`
--
ALTER TABLE `tbl_worker_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `tbl_worker_resume`
--
ALTER TABLE `tbl_worker_resume`
  ADD KEY `worker_id_resume` (`worker_id`);

--
-- Indexes for table `tbl_worker_skill_sets`
--
ALTER TABLE `tbl_worker_skill_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_id_skills` (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blue_collar_worker`
--
ALTER TABLE `tbl_blue_collar_worker`
  MODIFY `worker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- AUTO_INCREMENT for table `tbl_client_information`
--
ALTER TABLE `tbl_client_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_client_jobpost`
--
ALTER TABLE `tbl_client_jobpost`
  MODIFY `job_post_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client_skills_sets`
--
ALTER TABLE `tbl_client_skills_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id_skills` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_worker_information`
--
ALTER TABLE `tbl_worker_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_worker_skill_sets`
--
ALTER TABLE `tbl_worker_skill_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  ADD CONSTRAINT `job_post_id` FOREIGN KEY (`job_post_id`) REFERENCES `tbl_client_jobpost` (`job_post_id`),
  ADD CONSTRAINT `worker_id_applicant` FOREIGN KEY (`worker_id`) REFERENCES `tbl_blue_collar_worker` (`worker_id`);

--
-- Constraints for table `tbl_client_information`
--
ALTER TABLE `tbl_client_information`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`);

--
-- Constraints for table `tbl_client_jobpost`
--
ALTER TABLE `tbl_client_jobpost`
  ADD CONSTRAINT `client_id_post` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`);

--
-- Constraints for table `tbl_client_skills_sets`
--
ALTER TABLE `tbl_client_skills_sets`
  ADD CONSTRAINT `client_id_skill` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`);

--
-- Constraints for table `tbl_worker_information`
--
ALTER TABLE `tbl_worker_information`
  ADD CONSTRAINT `worker_id` FOREIGN KEY (`worker_id`) REFERENCES `tbl_blue_collar_worker` (`worker_id`);

--
-- Constraints for table `tbl_worker_resume`
--
ALTER TABLE `tbl_worker_resume`
  ADD CONSTRAINT `worker_id_resume` FOREIGN KEY (`worker_id`) REFERENCES `tbl_blue_collar_worker` (`worker_id`);

--
-- Constraints for table `tbl_worker_skill_sets`
--
ALTER TABLE `tbl_worker_skill_sets`
  ADD CONSTRAINT `worker_id_skills` FOREIGN KEY (`worker_id`) REFERENCES `tbl_blue_collar_worker` (`worker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
