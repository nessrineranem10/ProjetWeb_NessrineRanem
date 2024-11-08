-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-3il.alwaysdata.net
-- Generation Time: Nov 08, 2024 at 11:17 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3il_projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acheter`
--

CREATE TABLE `Acheter` (
  `login` varchar(255) NOT NULL,
  `reference` int(11) NOT NULL,
  `numFacture` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE `Produits` (
  `reference` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(512) NOT NULL,
  `type` varchar(100) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Produits`
--

INSERT INTO `Produits` (`reference`, `nom`, `description`, `photo`, `type`, `prix`) VALUES
(1, 'Iphone 11 Rouge', 'iphone 11 rouge', '11rouge.jpeg', 'Téléphone ', 500),
(2, 'Iphone 16 Bleu', 'Iphone bleu', 'iphone16bleu.png', 'Téléphone ', 950),
(3, 'PC Bureau/PC Gamer', 'PC Gamer : Puissant et immersif, ce PC gamer garantit des performances fluides pour les jeux les plus exigeants.PC de Bureau : Compact et fiable, parfait pour le multitâche et une productivité quotidienne optimale.', 'ordinateurbureau.jpeg\r\n', 'PC Bureau/PC Gamer', 0),
(4, 'PC Portable ', 'Léger et élégant, ce PC portable allie performance et mobilité, idéal pour le travail, les études et le divertissement.', 'bureauportable.jpeg\r\n', 'PC Portable ', 0),
(6, 'Iphone 16 Rose', 'iphone rose', 'iphone16rose.png', 'Téléphone ', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`login`, `mdp`, `is_admin`) VALUES
('admin', 'admin', 1),
('nessrine', 'nessrine', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acheter`
--
ALTER TABLE `Acheter`
  ADD PRIMARY KEY (`numFacture`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acheter`
--
ALTER TABLE `Acheter`
  MODIFY `numFacture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `reference` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
