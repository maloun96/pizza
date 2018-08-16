-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 04:21 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredientstable`
--

CREATE TABLE `ingredientstable` (
  `idIngredient` int(11) NOT NULL,
  `nameIngredient` varchar(50) NOT NULL,
  `priceIngredient` int(11) NOT NULL,
  `amountIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredientstable`
--

INSERT INTO `ingredientstable` (`idIngredient`, `nameIngredient`, `priceIngredient`, `amountIngredient`) VALUES
(1, 'Ingredient1', 100, 10),
(2, 'Ingredient2', 150, 20),
(3, 'Ingredient3', 20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pizzatable`
--

CREATE TABLE `pizzatable` (
  `idPizza` int(11) NOT NULL,
  `pizzaName` varchar(50) NOT NULL,
  `pizzaPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizzatable`
--

INSERT INTO `pizzatable` (`idPizza`, `pizzaName`, `pizzaPrice`) VALUES
(1, 'Pizza1', 10),
(2, 'cvb', 44),
(3, 'cvb', 44);

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `idPizza` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `positionIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`idPizza`, `idIngredient`, `positionIngredient`) VALUES
(1, 2, 1),
(1, 2, 2),
(1, 3, 3),
(1, 1, 4),
(1, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredientstable`
--
ALTER TABLE `ingredientstable`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Indexes for table `pizzatable`
--
ALTER TABLE `pizzatable`
  ADD PRIMARY KEY (`idPizza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
