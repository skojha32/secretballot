-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 10:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_master`
--

CREATE TABLE `tbl_admin_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_master`
--

INSERT INTO `tbl_admin_master` (`id`, `name`, `password`, `mobile`, `email`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '987654321', 'admin@gmail.com', NULL, '2021-07-14 08:03:44', NULL, '2021-07-14 04:33:12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidates_master`
--

CREATE TABLE `tbl_candidates_master` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election_master`
--

CREATE TABLE `tbl_election_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `scourse` varchar(15) DEFAULT NULL,
  `ssemester` int(2) DEFAULT NULL,
  `ssection` varchar(2) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `election_for_position` varchar(100) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_election_master`
--

INSERT INTO `tbl_election_master` (`id`, `name`, `scourse`, `ssemester`, `ssection`, `description`, `election_for_position`, `con`, `status`) VALUES
(1, 'President', NULL, NULL, NULL, 'President of the college', 'PRESIDENT', '2021-07-14 12:17:20', '1'),
(2, 'BCAVIDCR', 'BCA', 6, 'D', 'Cr for class BCA 6 D', 'CR', '2021-07-14 12:18:11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_master`
--

CREATE TABLE `tbl_result_master` (
  `id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  `winnername` varchar(100) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students_master`
--

CREATE TABLE `tbl_students_master` (
  `member_id` int(5) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `sreg_no` varchar(15) NOT NULL,
  `scourse` varchar(15) NOT NULL,
  `ssemester` int(2) NOT NULL,
  `ssection` varchar(2) NOT NULL,
  `sphone` varchar(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp(),
  `uon` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students_master`
--

INSERT INTO `tbl_students_master` (`member_id`, `sname`, `sreg_no`, `scourse`, `ssemester`, `ssection`, `sphone`, `username`, `password`, `con`, `uon`) VALUES
(1, 'Sashi Kant', '18CS2H4224', 'BCA', 6, 'D', '7899284215', 'skojha32@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:38', '0000-00-00 00:00:00'),
(2, 'Mona', '18CS2A4211', 'BCA', 6, 'D', '9876543214', 'monakumari985@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(3, 'sidhi', '18CS24H4208', 'BCA', 6, 'A', '7905423116', 'craffitibox@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(4, 'swayam', '18CO2H4290', 'BCOM', 6, 'B', '9336204406', 'nikkitaagarwal7668@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(5, 'rohit', '18BA2K4320', 'BA', 6, 'A', '9336204409', 'sidhiagarwal31@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(6, 'rahul', '19CS2A4322', 'BSC', 4, 'B', '9450151018', '18cs2a4211@kristujayanti.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(7, 'vikas', '19MG24320', 'BCOM', 4, 'C', '9450101518', '18cs2h4224@kristujayanti.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00'),
(8, 'preeti', '19CS2H4323', 'BSC', 4, 'D', '7905423117', '18cs2a4240@kristujayanti.com', '202cb962ac59075b964b07152d234b70', '2021-07-14 12:16:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes_master`
--

CREATE TABLE `tbl_votes_master` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_candidates_master`
--
ALTER TABLE `tbl_candidates_master`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `TEST` (`id`);

--
-- Indexes for table `tbl_election_master`
--
ALTER TABLE `tbl_election_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result_master`
--
ALTER TABLE `tbl_result_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `election_id` (`election_id`);

--
-- Indexes for table `tbl_students_master`
--
ALTER TABLE `tbl_students_master`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_votes_master`
--
ALTER TABLE `tbl_votes_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_candidates_master`
--
ALTER TABLE `tbl_candidates_master`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_election_master`
--
ALTER TABLE `tbl_election_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_result_master`
--
ALTER TABLE `tbl_result_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_students_master`
--
ALTER TABLE `tbl_students_master`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_votes_master`
--
ALTER TABLE `tbl_votes_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_candidates_master`
--
ALTER TABLE `tbl_candidates_master`
  ADD CONSTRAINT `TEST` FOREIGN KEY (`id`) REFERENCES `tbl_election_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_votes_master`
--
ALTER TABLE `tbl_votes_master`
  ADD CONSTRAINT `tbl_votes_master_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `tbl_students_master` (`member_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
