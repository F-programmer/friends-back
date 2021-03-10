-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2021 às 03:31
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `tb_color` (
  `id_color` int(11) NOT NULL,
  `name_color` varchar(50) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tb_food` (
  `id_food` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `favorite_color` int(11) DEFAULT NULL,
  `favorite_food` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tb_color`
  ADD PRIMARY KEY (`id_color`);

ALTER TABLE `tb_food`
  ADD PRIMARY KEY (`id_food`);

ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_color` (`favorite_color`),
  ADD KEY `fk_food` (`favorite_food`);



ALTER TABLE `tb_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`favorite_color`) REFERENCES `tb_color` (`id_color`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_food` FOREIGN KEY (`favorite_food`) REFERENCES `tb_food` (`id_food`) ON DELETE SET NULL ON UPDATE CASCADE;

INSERT INTO `tb_color` (`id_color`, `name_color`, `code`) VALUES
(1, 'Success', '#009944'),
(2, 'Error', '#c9000f'),
(3, 'Info', '#2196f3'),
(4, 'Text Dark', '#555'),
(5, 'Eh um eh dois eh três e já!', '#e1e2e3'),
(6, 'Branco', '#ffffff'),
(7, 'Preto', '#000000'),
(8, 'Rosé', '#fc2032'),
(9, 'Sunset', '#f17861'),
(10, 'Pink Summer', '#bd3d6d'),
(11, 'Purple Summer', '#8313CF'),
(12, 'Green Pastel', '#7b8771'),
(13, 'Green Pastel Light', '#cbe6c7'),
(14, 'Purple', '#735ac2'),
(15, 'Purple Light', '#6A6180'),
(16, 'Rocket Seat... Purple', '#191622'),
(17, 'Alert', '#FFD000'),
(18, 'Golden', '#E8A90C'),
(19, 'Turquesa', '#2581E8'),
(20, 'Azul do mar', '#142433'),
(21, 'Sandy', '#C4B99D'),
(22, 'A parede do meu quarto vai ser dessa cor', '#445c6a'),
(23, 'Pastel de feira', '#e4d4a4');

INSERT INTO `tb_user` (`id`, `name`, `birth_date`, `favorite_color`, `favorite_food`) VALUES
(1, 'Flávio', '2021-03-17', 22, NULL),
(2, 'Lucas', '2021-03-20', 10, NULL),
(3, 'Matheus', '2021-03-22', 18, NULL),
(4, 'Thalles', '2021-03-13', 8, NULL);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
