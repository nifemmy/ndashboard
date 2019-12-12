-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 05:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` varchar(45) NOT NULL,
  `qualification` varchar(45) NOT NULL,
  `qualify_id` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `age`, `qualification`, `qualify_id`, `salary`, `dob`, `date_joined`) VALUES
(1, 'James', 'Smith', '10', 'pry 6, SSCE,BSC', 5, '25000', '10-10 -1986', '2019-12-05 14:38:36'),
(8, 'Chidi', 'Ebere', '28', 'pry ssce bsc', 5, '50300', '10-10 -1900', '2019-12-10 13:55:22'),
(9, 'Nwachi', 'Ada', '35', 'pry 6, SSCE,NDE', 3, '50000', '1-12-1895', '2019-12-11 13:15:40'),
(10, 'Janet', 'Edo', '25', 'pry 6, SSCE', 2, '20000', '10- 10- 1988', '2019-12-11 13:20:35'),
(11, 'oke', 'Timothy', '25', 'pry ssce bsc', 5, '45000', '10-10-1992', '2019-12-11 13:21:39'),
(12, 'Sam', 'Adedayo', '43', 'pry 6, SSCE,BSC,PhD', 6, '50000', '10 10 1980', '2019-12-11 13:23:06'),
(13, 'Olumide', 'Ikeowo', '25', 'pry 6, SSCE,BSC', 5, '25000', '2019-12-27', '0000-00-00 00:00:00'),
(18, 'Olufunmi', 'Ajayi', '35', 'PhD', 6, '85000', '1984-10-10', '2019-12-11 14:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `name`, `info`) VALUES
(1, 'PRY 6', 'Primary Certificate'),
(2, 'SSCE', 'O\'level'),
(3, 'NDE', ''),
(4, 'HND', ''),
(5, 'Bsc ', 'Bachelor of Science'),
(6, 'PHD', 'Masters');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `email`) VALUES
(1, 'nifemmy', 'd8ae5776067290c4712fa454006c8ec6', 'nifemmy22@gmail.com'),
(2, 'john', '72db64f6f4298af089b237efab0ed158', 'tech@gmail.com'),
(3, 'chidi', '831384febcdc1e5363dde87c4649ed7b', 'chidi@gm.com'),
(4, 'sherif', '541880709b07ed67051d172e69169d75', 'danjuma@gmail.com'),
(5, 'johm', 'c4ceb152db108935c71875ae7eaeaaec', 'bull@gmail.com'),
(6, 'olumide', 'c0c0b3dcdf42c8f49a93a5fad6f3e6be', 'olu@gm.com'),
(7, 'sam', '332532dcfaa1cbf61e2a266bd723612c', 'sam@gmail.com'),
(8, 'omolewa', '22d9efa41aa5d63899311bf200cd948f', 'omo@gmail.com'),
(9, 'emma', '00a809937eddc44521da9521269e75c6', 'emma@gm.com'),
(10, 'tamm', 'b95cd56e3994ebdefe66572e393ab438', 'tamm@gm.com'),
(11, 'ada', '8c8d357b5e872bbacd45197626bd5759', 'ada@gm.com'),
(12, 'seun', 'f15117b4bc582e2b21cb2116f2d5c88d', 'seun@gmail.com'),
(13, 'dddd', '11ddbaf3386aea1f2974eee984542152', 'dddd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualify_id` (`qualify_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`qualify_id`) REFERENCES `qualification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
