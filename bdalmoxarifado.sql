-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2024 às 18:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `logform`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `new_table`
--

CREATE TABLE `new_table` (
  `idnew_table` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(145) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `new_table`
--

INSERT INTO `new_table` (`idnew_table`, `nome`, `email`, `telefone`, `data_nasc`, `sexo`, `senha`, `permission`, `estado`) VALUES
(1, 'Daniel Oliveira', 'daniel.oliveira@example.com', '(41) 95678-9012', '1992-06-23', 'masculino', 'daniel123', 'comum', 'inativo'),
(10, '1', '1@gmail.com', '1', '1111-11-01', 'outro', '1', 'especial', 'ativo'),
(24, 'juju', 'juju@yahoo.com', '6549564198', '2233-03-22', 'feminino', '323324232', 'comum', 'inativo'),
(27, 'Antonio', 'antonio@gmail.com', '985475251', '2006-09-01', 'masculino', '12345678', 'especial', 'inativo'),
(28, 'kandido', 'kandido@yahoo.com', '51 9999999', '2005-11-07', 'masculino', 'kandido', 'especial', 'ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`idnew_table`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `new_table`
--
ALTER TABLE `new_table`
  MODIFY `idnew_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
