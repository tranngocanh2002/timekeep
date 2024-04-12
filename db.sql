-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 09:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `login` time DEFAULT NULL,
  `logout` time DEFAULT NULL,
  `type` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `date`, `login`, `logout`, `type`) VALUES
(15, 4, '2024-04-11', '14:38:00', '22:38:00', 398),
(18, 4, '2024-04-12', '08:46:00', '14:45:00', 46),
(19, 1, '2024-04-12', '01:18:00', NULL, 0),
(20, 6, '2024-04-12', '11:23:00', NULL, 203),
(21, 7, '2024-04-12', '11:27:00', NULL, 207),
(22, 4, '2024-04-10', '07:46:00', '14:35:00', 0),
(23, 4, '2024-04-09', '07:46:00', '17:35:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(255) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `full_name` varchar(255) DEFAULT NULL COMMENT 'Fist name',
  `room` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(255) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `workday` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `room`, `avatar`, `jobs`, `workday`, `status`, `created_at`, `updated_at`) VALUES
(1, 'anh', '$2y$10$r/VIfh2KAHVJuOlIOXjFleda7ynFusN0g5AMi.Ql..gL9XCrztMI2', 'Đỗ Anh Đứcsss', 'Phòng nhân sự', '1712805938-user-5.png', 'Thực tập sinh', '2024-07-09 17:00:00', 0, '2022-07-24 08:43:43', NULL),
(4, 'admin', '$2y$10$r/VIfh2KAHVJuOlIOXjFleda7ynFusN0g5AMi.Ql..gL9XCrztMI2', 'Trần Ngọc Ánh T', 'Phòng hành chính', '1712907886-user-7d5bce6487950a109108c03091ed0513.jpg', 'Thực tập sinh', '2024-04-26 17:00:00', 0, '2022-07-24 08:43:43', NULL),
(6, '20d190001', '$2y$10$f6FIjQsPPreK6k8CKLgu3.j/MXEuWi19YUo4E1sARRAH.ymy44Xui', 'Trần Ngọc Ánh', 'Phòng kỹ thuật', '1712893479-user-7d5bce6487950a109108c03091ed0513.jpg', 'Nhân viên chính thức', '2024-04-18 17:00:00', 0, '2024-04-12 03:43:13', NULL),
(7, '20D190002', '$2y$10$d4cvFQOwUAHq8GhzMR8cSOmIzcPkcfPyF1ZCGfox2WY8a8kgbYHTi', 'Đỗ Anh Đứcdd', 'Phòng kỹ thuật', NULL, 'Nhân viên chính thức', NULL, 0, '2024-04-12 04:27:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
