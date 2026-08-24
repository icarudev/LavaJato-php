-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2026 at 05:50 PM
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
-- Database: `lavarapido`
--

-- --------------------------------------------------------

--
-- Table structure for table `comuns`
--

CREATE TABLE `comuns` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `pagamento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comuns`
--

INSERT INTO `comuns` (`id`, `data`, `placa`, `modelo`, `valor`, `pagamento`) VALUES
(9, '2026-08-24', 'ABC1D23', 'TESTE123', 125, 'Dinheiro');

-- --------------------------------------------------------

--
-- Table structure for table `empresariais`
--

CREATE TABLE `empresariais` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `porte` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresariais`
--

INSERT INTO `empresariais` (`id`, `data`, `placa`, `modelo`, `valor`, `km`, `porte`) VALUES
(15, '2026-08-24', 'TESTEEMPRE', '121313', 35, 12222, 'grande'),
(16, '2026-08-24', 'PLACATESTE', '1212', 15, 12000, 'maquina'),
(17, '2026-09-07', 'TESTEGRAN', 'TESTEGRAN', 155, 231, 'grande');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comuns`
--
ALTER TABLE `comuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresariais`
--
ALTER TABLE `empresariais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comuns`
--
ALTER TABLE `comuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `empresariais`
--
ALTER TABLE `empresariais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
