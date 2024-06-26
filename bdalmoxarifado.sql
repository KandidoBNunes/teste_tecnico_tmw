-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2024 às 18:18
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idprod` int(11) NOT NULL,
  `produto` varchar(120) NOT NULL,
  `preco` varchar(6) NOT NULL,
  `quantidade` varchar(10) NOT NULL,
  `prateleira` varchar(45) NOT NULL,
  `data_comp` varchar(45) NOT NULL,
  `validade` varchar(45) NOT NULL,
  `visivel` bit(1) NOT NULL DEFAULT b'1',
  `funcionario_deletou` varchar(100) DEFAULT NULL,
  `data_hora_delecao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idprod`, `produto`, `preco`, `quantidade`, `prateleira`, `data_comp`, `validade`, `visivel`, `funcionario_deletou`, `data_hora_delecao`) VALUES
(5, 'Roteador 500mbts', '90,79', '100', 'A15', '2024-06-07', '2222-12-12', b'1', NULL, NULL),
(7, 'adpatador rede/telefone', '15,00', '200', 'C13', '2017-01-31', '2030-10-22', b'1', NULL, NULL),
(8, 'Roteador 700mbts', '120,00', '39', 'A16', '2020-02-20', '2025-02-25', b'1', NULL, NULL),
(9, 'rolo 100m cat6', '300,00', '30', 'B07', '2024-06-07', '2034-06-14', b'1', NULL, NULL),
(10, 'adptador coaxial', '23,00', '0', 'B07', '2009-06-02', '2026-10-20', b'1', NULL, NULL),
(17, 'Roteador 100mbts', '120,00', '13', 'B07', '2005-11-07', '2024-06-28', b'0', 'makimacotrl@tahoo.com', '2024-06-26 15:13:08'),
(18, 'rolo 100m cat5e', '80', '378', 'D02', '2008-11-12', '2028-02-02', b'1', NULL, NULL),
(20, 'switch intelbras', '120.00', '7', 'A113', '2010-02-20', '2030-11-11', b'1', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`idnew_table`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idprod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `new_table`
--
ALTER TABLE `new_table`
  MODIFY `idnew_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
