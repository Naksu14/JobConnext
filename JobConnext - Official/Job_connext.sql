-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 02:13 AM
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
-- Database: `job_connext`
--
CREATE DATABASE IF NOT EXISTS `job_connext` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `job_connext`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Admin_id`, `username`, `email`, `hash_password`) VALUES
(101000014, '@jobconnext', 'jobconnext@gmail', '$2y$10$I12TngIIp7uQzrmwUip54.9sGmEdcOKt6C0OFqjbxBxU7yKHHrw2a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicants`
--

CREATE TABLE `tbl_applicants` (
  `worker_id` int(10) NOT NULL,
  `job_post_id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
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
(1001, 'Aki010', 'irisalacapa010@gmail.com', '$2y$10$GimVai.qjk.lQ8PMHB.80e8ZZpy6EfHqoAYDbROZcEGAWjFkW/CRG', 0, 504773),
(1002, 'iris', 'fleris143@gmail.com', '$2y$10$1cEp.0rrUJ3Z/Ty4GjWpLOwTZlNXLfltxDLJIVomTLPtP9EADK37.', 1, NULL),
(1003, 'iris', 'fleris143@gmail.com', '$2y$10$hkmUVxbJaq1v3SRJ9yPVdOPTuSEeNtq1dglpNWE/SE7CJIigGsAHa', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chats`
--

CREATE TABLE `tbl_chats` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `reciever` int(255) NOT NULL,
  `message` longtext NOT NULL,
  `seen_status` varchar(100) NOT NULL DEFAULT 'unseen',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'asmith', 'asmith@example.com', 'f6e5d4c3b2a1', 'inactive', 654321),
(3, 'mjones', 'mjones@example.com', 'abc123xyz789', 'active', 111222),
(4, 'bwilliams', 'bwilliams@example.com', 'xyz789abc123', 'pending', 333444),
(5, 'kwhite', 'kwhite@example.com', '1a2b3c4d5e6f', 'active', 555666),
(6, 'lgreen', 'lgreen@example.com', '6f5e4d3c2b1a', 'inactive', 777888),
(7, 'tblack', 'tblack@example.com', 'x1y2z3a4b5c6', 'active', 999000),
(8, 'egray', 'egray@example.com', 'z9y8x7w6v5u4', 'pending', 112233),
(9, 'rking', 'rking@example.com', 'm1n2b3v4c5x6', 'active', 445566),
(10, 'dlee', 'dlee@example.com', 'p0o9i8u7y6t5', 'inactive', 778899),
(11, 'Meko_Neko010', 'akirakarasu010@gmail.com', '$2y$10$GimVai.qjk.lQ8PMHB.80e8ZZpy6EfHqoAYDbROZcEGAWjFkW/CRG', '0', 278318),
(12, 'jdoe', 'jdoe@example.com', 'a1b2c3d4e5f6', 'active', 123456),
(13, 'raven', 'example0123@gmail.com', '$2y$10$56AxQjfMBZRygURiXqR23en7XSKjSBQzyEn0VUXlXDEUHNyfPDz7C', '1', NULL);

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
  `postal_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_information`
--

INSERT INTO `tbl_client_information` (`id`, `client_id`, `firstname`, `middlename`, `lastname`, `profile`, `phone_no`, `bio`, `country`, `city`, `region`, `province`, `barangay`, `postal_code`) VALUES
(1, 1, 'John', 'Michael', 'Doe', 0x6a6f686e5f646f652e6a7067, '09171234567', 'Web developer and tech enthusiast.', 'Philippines', 'Quezon City', 'NCR', 'Metro Manila', 'Bagumbayan', '1109'),
(2, 2, 'Alice', 'Marie', 'Smith', 0x616c6963655f736d6974682e6a7067, '09281234567', 'Digital artist who loves UI design.', 'Philippines', 'Manila', 'NCR', 'Metro Manila', 'Sampaloc', '1008'),
(3, 3, 'Mark', 'Joseph', 'Jones', 0x6d61726b5f6a6f6e65732e6a7067, '09181234567', 'Freelance software engineer.', 'Philippines', 'Cebu City', 'Region VII', 'Cebu', 'Mabolo', '6000'),
(4, 4, 'Brian', 'Lee', 'Williams', 0x627269616e5f77696c6c69616d732e6a7067, '09391234567', 'SEO expert and blogger.', 'Philippines', 'Davao City', 'Region XI', 'Davao del Sur', 'Talomo', '8000'),
(5, 5, 'Karen', 'Ann', 'White', 0x6b6172656e5f77686974652e6a7067, '09191234567', 'Front-end developer passionate about UX.', 'Philippines', 'Baguio City', 'CAR', 'Benguet', 'Camp 7', '2600'),
(6, 6, 'Liam', 'James', 'Green', 0x6c69616d5f677265656e2e6a7067, '09491234567', 'Mobile app developer.', 'Philippines', 'Iloilo City', 'Region VI', 'Iloilo', 'Jaro', '5000'),
(7, 7, 'Tina', 'Rose', 'Black', 0x74696e615f626c61636b2e6a7067, '09501234567', 'E-commerce business owner.', 'Philippines', 'Bacoor', 'Region IV-A', 'Cavite', 'Salinas', '4102'),
(8, 8, 'Ethan', 'Paul', 'Gray', 0x657468616e5f677261792e6a7067, '09601234567', 'Full-stack developer.', 'Philippines', 'Dasmariñas', 'Region IV-A', 'Cavite', 'Paliparan', '4114'),
(9, 9, 'Rachel', 'Mae', 'King', 0x72616368656c5f6b696e672e6a7067, '09701234567', 'Student and junior developer.', 'Philippines', 'San Fernando', 'Region III', 'Pampanga', 'Dolores', '2000'),
(10, 10, 'Daniel', 'Scott', 'Lee', 0x64616e69656c5f6c65652e6a7067, '09801234567', 'System analyst and coder.', 'Philippines', 'Legazpi City', 'Region V', 'Albay', 'Rawis', '4500'),
(11, 11, 'lanceivanlistana15@g', 'reyes', 'listana', NULL, '+63-967-805-5024', 'dfasdfas', 'Philippines', 'IMUS CITY', 'CAVITE', 'dasf', 'dsfs', '4103'),
(12, 12, 'lanceivanlistana15@g', 'reyes', 'listana', NULL, '+63-967-805-5024', 'dfasdfas', 'Philippines', 'IMUS CITY', 'CAVITE', 'dasf', 'dsfs', '4103'),
(13, 13, 'lanceivanlistana15@g', 'reyes', 'listana', NULL, '+63-967-805-5024', 'dfasdfas', 'Philippines', 'IMUS CITY', 'CAVITE', 'dasf', 'dsfs', '4103'),
(14, 14, 'lanceivanlistana15@g', 'reyes', 'listana', NULL, '+63-967-805-5024', 'dfasdfas', 'Philippines', 'IMUS CITY', 'CAVITE', 'dasf', 'dsfs', '4103'),
(15, 15, 'lanceivanlistana15@g', 'reyes', 'listana', NULL, '+63-967-805-5024', 'dfasdfas', 'Philippines', 'IMUS CITY', 'CAVITE', 'dasf', 'dsfs', '4103');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_jobpost`
--

CREATE TABLE `tbl_client_jobpost` (
  `client_id` int(11) NOT NULL,
  `job_title` varchar(55) NOT NULL,
  `job_post_id` int(10) NOT NULL,
  `job_offer` varchar(50) NOT NULL,
  `salary_start` int(25) NOT NULL,
  `salary_end` int(25) NOT NULL,
  `picture/pdf` blob NOT NULL,
  `job_status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(55) NOT NULL,
  `applicants` int(11) NOT NULL,
  `year_exp` int(11) NOT NULL,
  `start_posted` date NOT NULL DEFAULT current_timestamp(),
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_jobpost`
--

INSERT INTO `tbl_client_jobpost` (`client_id`, `job_title`, `job_post_id`, `job_offer`, `salary_start`, `salary_end`, `picture/pdf`, `job_status`, `description`, `location`, `applicants`, `year_exp`, `start_posted`, `deadline`) VALUES
(11, 'Electrician', 92, 'Full-time', 18000, 25000, 0x656c65637472696369616e5f6a6f622e706466, 0, 'Licensed electrician needed for wiring and maintenance tasks.', 'Quezon City, Metro Manila', 0, 2, '2025-05-06', '2025-06-15'),
(12, 'Plumber', 93, 'Full-time', 17000, 24000, 0x706c756d6265725f6a6f622e706466, 0, 'Skilled plumber required for pipe installation and repairs.', 'Manila, Metro Manila', 0, 1, '2025-05-06', '2025-06-18'),
(13, 'Welder', 94, 'Contract', 19000, 26000, 0x77656c6465725f6a6f622e706466, 0, 'Welder with MIG/TIG skills needed for fabrication tasks.', 'Cebu City, Cebu', 0, 2, '2025-05-06', '2025-06-20'),
(4, 'Delivery Driver', 95, 'Full-time', 16000, 22000, 0x6472697665725f6a6f622e706466, 0, 'Responsible driver with license required for delivery routes.', 'Davao City, Davao del Sur', 0, 1, '2025-05-06', '2025-06-22'),
(5, 'Construction Worker', 96, 'Full-time', 15000, 20000, 0x636f6e737472756374696f6e5f776f726b65722e706466, 0, 'Laborers needed for various on-site construction projects.', 'Baguio City, Benguet', 0, 0, '2025-05-06', '2025-06-25'),
(6, 'Mechanic', 97, 'Full-time', 18000, 25000, 0x6d656368616e69635f6a6f622e706466, 0, 'Auto mechanic for vehicle diagnostics and repairs.', 'Iloilo City, Iloilo', 0, 2, '2025-05-06', '2025-06-28'),
(7, 'Warehouse Helper', 98, 'Full-time', 14000, 18000, 0x77617265686f7573655f68656c7065722e706466, 0, 'Assist in warehouse loading/unloading and inventory.', 'Bacoor, Cavite', 0, 0, '2025-05-06', '2025-06-12'),
(8, 'House Painter', 99, 'Contract', 16000, 21000, 0x7061696e7465725f6a6f622e706466, 0, 'Experienced painter needed for residential jobs.', 'Dasmariñas, Cavite', 0, 1, '2025-05-06', '2025-06-30'),
(9, 'Security Guard', 100, 'Full-time', 15000, 20000, 0x73656375726974795f6a6f622e706466, 0, 'Licensed security guard needed for night shift.', 'San Fernando, Pampanga', 0, 1, '2025-05-06', '2025-06-20'),
(10, 'Janitor', 101, 'Full-time', 13000, 17000, 0x6a616e69746f725f6a6f622e706466, 0, 'Clean and maintain office and public spaces.', 'Legazpi City, Albay', 0, 0, '2025-05-06', '2025-06-10'),
(1, 'Electrician', 102, 'Full-time', 18000, 25000, 0x656c65637472696369616e5f6a6f622e706466, 0, 'Licensed electrician needed for wiring and maintenance tasks.', 'Quezon City, Metro Manila', 0, 2, '2025-05-06', '2025-06-15'),
(2, 'Plumber', 103, 'Full-time', 17000, 24000, 0x706c756d6265725f6a6f622e706466, 0, 'Skilled plumber required for pipe installation and repairs.', 'Manila, Metro Manila', 0, 1, '2025-05-06', '2025-06-18'),
(3, 'Welder', 104, 'Contract', 19000, 26000, 0x77656c6465725f6a6f622e706466, 0, 'Welder with MIG/TIG skills needed for fabrication tasks.', 'Cebu City, Cebu', 0, 2, '2025-05-06', '2025-06-20'),
(4, 'Delivery Driver', 105, 'Full-time', 16000, 22000, 0x6472697665725f6a6f622e706466, 0, 'Responsible driver with license required for delivery routes.', 'Davao City, Davao del Sur', 0, 1, '2025-05-06', '2025-06-22'),
(5, 'Construction Worker', 106, 'Full-time', 15000, 20000, 0x636f6e737472756374696f6e5f776f726b65722e706466, 0, 'Laborers needed for various on-site construction projects.', 'Baguio City, Benguet', 0, 0, '2025-05-06', '2025-06-25'),
(6, 'Mechanic', 107, 'Full-time', 18000, 25000, 0x6d656368616e69635f6a6f622e706466, 0, 'Auto mechanic for vehicle diagnostics and repairs.', 'Iloilo City, Iloilo', 0, 2, '2025-05-06', '2025-06-28'),
(7, 'Warehouse Helper', 108, 'Full-time', 14000, 18000, 0x77617265686f7573655f68656c7065722e706466, 0, 'Assist in warehouse loading/unloading and inventory.', 'Bacoor, Cavite', 0, 0, '2025-05-06', '2025-06-12'),
(8, 'House Painter', 109, 'Contract', 16000, 21000, 0x7061696e7465725f6a6f622e706466, 0, 'Experienced painter needed for residential jobs.', 'Dasmariñas, Cavite', 0, 1, '2025-05-06', '2025-06-30'),
(9, 'Security Guard', 110, 'Full-time', 15000, 20000, 0x73656375726974795f6a6f622e706466, 0, 'Licensed security guard needed for night shift.', 'San Fernando, Pampanga', 0, 1, '2025-05-06', '2025-06-20'),
(10, 'Janitor', 111, 'Full-time', 13000, 17000, 0x6a616e69746f725f6a6f622e706466, 0, 'Clean and maintain office and public spaces.', 'Legazpi City, Albay', 0, 0, '2025-05-06', '2025-06-10');

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
(1, 1, 'Welder'),
(2, 1, 'Electrician'),
(3, 1, 'Truck driver'),
(4, 1, 'Plumber'),
(5, 2, 'Welder'),
(6, 2, 'Electrician'),
(7, 2, 'Truck driver'),
(8, 2, 'Plumber'),
(9, 3, 'Pipe installation'),
(10, 4, 'MIG welding'),
(11, 5, 'Defensive driving'),
(12, 6, 'Masonry'),
(13, 7, 'Engine diagnostics'),
(14, 8, 'Inventory handling'),
(15, 9, 'Wall preparation'),
(16, 10, 'Surveillance monitor'),
(17, 11, 'Sweeping');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `company_name` varchar(255) NOT NULL,
  `company_aboutUs` varchar(1000) NOT NULL,
  `company_Address` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company_info`
--

INSERT INTO `tbl_company_info` (`company_name`, `company_aboutUs`, `company_Address`, `company_id`, `client_id`) VALUES
('BuildRight Construction Co.', 'A trusted name in residential and commercial construction projects.', 'Lot 5, Concrete St., Barangay Bagumbayan, Quezon City', 1, 1),
('MetalCraft Fabricators', 'We specialize in metal works, welding, and structural steel fabrication.', 'Blk 3, Industrial Zone, Sampaloc, Manila', 2, 2),
('FastHaul Logistics', 'A logistics and trucking company focused on quick and safe deliveries.', 'Warehouse 12, Portside Road, Mabolo, Cebu City', 3, 3),
('GreenThumb Landscaping Services', 'Experts in garden landscaping and maintenance for homes and buildings.', 'Zone 8, Palm Road, Talomo, Davao City', 4, 4),
('NorthPeak Builders', 'General contractors for mid-rise buildings and government infrastructure.', 'Baguio Hilltop Avenue, Camp 7, Baguio City', 5, 5),
('Iloilo Marine Services', 'Providing dockside maintenance, marine repairs, and manpower solutions.', 'Pier Zone, Port Area, Jaro, Iloilo City', 6, 6),
('Cavite Plumbers & Co.', 'Your go-to plumbing team for residential and industrial needs.', 'Blk 9, Waterlane Subdivision, Salinas, Bacoor, Cavite', 7, 7),
('SteelForce Manufacturing', 'Heavy-duty equipment and tool manufacturing for construction and mining.', 'Unit 4, Steelworks Drive, Paliparan, Dasmariñas, Cavite', 8, 8),
('Pampanga HVAC Experts', 'Specializing in air conditioning installation and repair services.', 'Shop 6, Appliance Row, Dolores, San Fernando, Pampanga', 9, 9),
('Albay Auto Mechanics Inc.', 'We provide automotive repair, diagnostics, and fleet maintenance.', 'Corner Route 5, Rawis Autozone, Legazpi City', 10, 10),
('CURRENT_TIMESTAMP', '', 'BLK 4 LOT 13 California Drive, Barcelona 3, Buhay na Tubig, Imus Cavite, 4103', 11, 2019),
('asfw34rsra', '', 'BLK 4 LOT 13 California Drive, Barcelona 3, Buhay na Tubig, Imus Cavite, 4103', 12, 2020);

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
(2, 1002, 'Lord Raven Flea Iris', 'Alacapa', 'Enrique', NULL, '+63-242-342-3423', 'New worker', 'philippines', 'bacoor', 'calabarzon', 'cavite', 'mambog 5', '4125'),
(3, 1003, 'Lord Raven Flea Iris', 'Alacapa', 'Enrique', NULL, '+63-242-342-3423', 'New worker', 'philippines', 'bacoor', 'calabarzon', 'cavite', 'mambog 5', '4125');

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
(1001, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 04:40:27'),
(1002, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 05:05:03'),
(1003, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 05:14:34'),
(1001, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 04:40:27'),
(1002, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 05:05:03'),
(1003, 'Introduction-Network-Management.pdf', 'uploads/', '2025-03-10 05:14:34');

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
(4, 1001, 'Plumber'),
(5, 1002, 'Welder'),
(6, 1002, 'Electrician'),
(7, 1002, 'Truck driver'),
(8, 1002, 'Plumber'),
(9, 1003, 'Welder'),
(10, 1003, 'Electrician'),
(11, 1003, 'Truck driver'),
(12, 1003, 'Plumber');

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
-- Indexes for table `tbl_chats`
--
ALTER TABLE `tbl_chats`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`company_id`);

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
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101000015;

--
-- AUTO_INCREMENT for table `tbl_blue_collar_worker`
--
ALTER TABLE `tbl_blue_collar_worker`
  MODIFY `worker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tbl_chats`
--
ALTER TABLE `tbl_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;

--
-- AUTO_INCREMENT for table `tbl_client_information`
--
ALTER TABLE `tbl_client_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_client_jobpost`
--
ALTER TABLE `tbl_client_jobpost`
  MODIFY `job_post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_client_skills_sets`
--
ALTER TABLE `tbl_client_skills_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id_skills` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_worker_information`
--
ALTER TABLE `tbl_worker_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_worker_skill_sets`
--
ALTER TABLE `tbl_worker_skill_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
