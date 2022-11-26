-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 05:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be17_cr5_animal_adoption_hüseyinbasol`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `vaccinated` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `picture`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`) VALUES
(2, 'Lion', NULL, 'Afrika', 'King of the Lions', '250cm', 8, 'Yes', 'Lion Breed'),
(3, 'Dog', NULL, 'Dog City', 'This is a Dog', '150cm', 5, 'Yes', 'Dog Breed'),
(4, 'Monkey', NULL, 'Afrika', 'Climbing Monkey', '175cm', 12, 'Yes', 'Monkey Breed'),
(5, 'Snake', NULL, 'Australian', 'Poisonous Snake', '275cm', 9, 'Yes', 'Snake Breed'),
(6, 'Eagle', NULL, 'Jamaika', 'Eagle\'s have good eyes', '155cm', 10, 'Yes', 'Eagle Breed'),
(7, 'Spider', NULL, 'Japan', 'He cant\'t turn you into Spider-Man', '75cm', 11, 'Yes', 'Spider Breed'),
(8, 'Tiger', NULL, 'Jungle of the Tiger', ' Young Strong Tiger', '50cm', 5, 'Yes', 'Tiger Breed'),
(9, 'Cat', NULL, 'Türkiye', 'Angora Cat', '75cm', 3, 'Yes', 'Cat Breed'),
(10, 'Chameleon', NULL, 'China', 'Camouflage Chameleon', '35cm', 1, 'Yes', 'Chameleon Breed'),
(11, 'Goat', NULL, 'Arabia', 'Fluffy Goat', '65cm', 4, 'Yes', 'Goat Breed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone_number`, `picture`, `password`, `status`) VALUES
(1, 'Haram', 'Salam', 'haram123@gmx.at', '', 0, '638127bb0f1e5.jpg', '4949d08c62f4dda967aef2696388afe217ea02bce5a7eae883e8da8f889186a0', 'user'),
(2, 'Salam', 'Haram', 'salam123@gmx.at', '', 0, 'avatar.png', '7508f65a129e0b9cd1d9153ce631f4fed24b3c124018ece868508977e2f1f8d9', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
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
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
