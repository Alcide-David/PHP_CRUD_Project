-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2024 at 03:24 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `codeAdmin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codeAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`codeAdmin`, `nom`, `prenom`, `email`, `password`) VALUES
(7, 'Massey', 'Rothschild', 'massrot@gmail.com', 'Massey@123'),
(10, 'Alcide', 'David', 'davidalcide@gmail.com', 'Alcide@123'),
(13, 'Charlemagne', 'Dimitrov Angelo', 'angelodimi@gmail.com', 'Angelo@123');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `codeInscription` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `datNaissance` date NOT NULL,
  `sexe` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `classe` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `fraisInscription` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`codeInscription`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`codeInscription`, `nom`, `prenom`, `datNaissance`, `sexe`, `classe`, `fraisInscription`, `dateInscription`) VALUES
(17, 'Alcide', 'David', '2000-10-01', 'Homme', '3ieme', '1500', '2024-01-17'),
(14, 'Cerisier', 'Rosemana', '2024-01-01', 'Femme', '3ieme', '1000', '2024-01-24'),
(13, 'Massey', 'Rothschild', '2024-01-11', 'Homme', '3ieme', '560', '2024-02-01'),
(15, 'Jules', 'Roodley', '2024-01-05', 'Homme', '3ieme', '1000', '2024-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idPaiement` int NOT NULL AUTO_INCREMENT,
  `codeInscription` int NOT NULL,
  `montant` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idPaiement`),
  KEY `FK_Inscription_Paiement` (`codeInscription`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paiement`
--

INSERT INTO `paiement` (`idPaiement`, `codeInscription`, `montant`, `date`) VALUES
(12, 15, 3445, '2024-01-09'),
(11, 14, 9800, '2024-01-22'),
(10, 17, 56000, '2024-01-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
