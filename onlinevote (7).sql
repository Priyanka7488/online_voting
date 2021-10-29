-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 03, 2021 at 09:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevote`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_candidate`
--

CREATE TABLE `add_candidate` (
  `id_no` int(11) NOT NULL,
  `partyname` varchar(30) NOT NULL,
  `symbol` varchar(35) NOT NULL,
  `countvote` int(100) DEFAULT 0,
  `candidatename` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_candidate`
--

INSERT INTO `add_candidate` (`id_no`, `partyname`, `symbol`, `countvote`, `candidatename`) VALUES
(5, 'inc', 'cons1.png', 29, 'xyz'),
(6, 'bjp', 'bjp.jpg', 5, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `lname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `email`, `password`, `lname`) VALUES
(3, 'KUMARI', 'kripriyanka7488@gmail.com', '12', 'PRIYANKA'),
(4, 'KUMARI', 'kripriyanka9934@gmail.com', '12', 'PRIYANKA');

-- --------------------------------------------------------

--
-- Table structure for table `district_id`
--

CREATE TABLE `district_id` (
  `did` int(30) NOT NULL,
  `dname` varchar(35) NOT NULL,
  `state_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district_id`
--

INSERT INTO `district_id` (`did`, `dname`, `state_id`) VALUES
(1, '', 0),
(7, 'darbhanga', 1),
(8, 'bhagalpur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_no` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `midname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fpname` varchar(20) NOT NULL,
  `pmidname` varchar(20) NOT NULL,
  `plname` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nation` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `constituency` varchar(30) NOT NULL,
  `segment` varchar(30) NOT NULL,
  `mblno` varchar(13) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `adhar` varchar(12) NOT NULL,
  `voterid` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `img` varchar(40) NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `otpfinal` varchar(15) DEFAULT NULL,
  `vote_otp` varchar(10) DEFAULT NULL,
  `flag` varchar(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id_no`, `fname`, `midname`, `lname`, `fpname`, `pmidname`, `plname`, `dob`, `gender`, `nation`, `state`, `constituency`, `segment`, `mblno`, `pincode`, `adhar`, `voterid`, `email`, `password`, `cpassword`, `img`, `otp`, `otpfinal`, `vote_otp`, `flag`) VALUES
(24, 'priyam', '', 'PRIYANKA', 'xyz', '', 'PRIYANKA', '1998-08-22', 'Female', 'INDIAN', '1', '7', '4', '07672849996', '846001', '22', '33', 'priyamguptastm98@gmail.com', '123', '123', 'mcelogo.png', '', '', '19714', '1');

-- --------------------------------------------------------

--
-- Table structure for table `segment_id`
--

CREATE TABLE `segment_id` (
  `seg_id` int(11) NOT NULL,
  `signame` varchar(30) NOT NULL,
  `district` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `segment_id`
--

INSERT INTO `segment_id` (`seg_id`, `signame`, `district`) VALUES
(1, 'pph', 1),
(2, 'bbb', 1),
(3, '', 7),
(4, 'laheriasarai', 7);

-- --------------------------------------------------------

--
-- Table structure for table `state_id`
--

CREATE TABLE `state_id` (
  `cid` int(100) NOT NULL,
  `cname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_id`
--

INSERT INTO `state_id` (`cid`, `cname`) VALUES
(1, 'Bihar'),
(2, 'Gujrat'),
(3, 'jharkhand');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id_no` int(10) NOT NULL,
  `votername` varchar(30) NOT NULL,
  `voter_id` varchar(15) NOT NULL,
  `adhar` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id_no`, `votername`, `voter_id`, `adhar`, `dob`) VALUES
(7, 'priyam', '33', '22', '1998-06-25'),
(8, 'shivani', '21', '31', '1999-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `vote_claim`
--

CREATE TABLE `vote_claim` (
  `id_no` int(11) NOT NULL,
  `party_name` varchar(15) NOT NULL,
  `candidate_name` varchar(30) NOT NULL,
  `otp` int(11) NOT NULL,
  `voter_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_candidate`
--
ALTER TABLE `add_candidate`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_id`
--
ALTER TABLE `district_id`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id_no` (`id_no`),
  ADD UNIQUE KEY `adhar` (`adhar`),
  ADD UNIQUE KEY `voterid` (`voterid`);

--
-- Indexes for table `segment_id`
--
ALTER TABLE `segment_id`
  ADD PRIMARY KEY (`seg_id`);

--
-- Indexes for table `state_id`
--
ALTER TABLE `state_id`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id_no`),
  ADD UNIQUE KEY `voter_id` (`voter_id`),
  ADD UNIQUE KEY `adhar` (`adhar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_candidate`
--
ALTER TABLE `add_candidate`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district_id`
--
ALTER TABLE `district_id`
  MODIFY `did` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `segment_id`
--
ALTER TABLE `segment_id`
  MODIFY `seg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_id`
--
ALTER TABLE `state_id`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
