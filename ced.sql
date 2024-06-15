-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2024 às 13:02
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
-- Banco de dados: `ced`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `cpf`, `senha`) VALUES
(1, 'admin', '123.456.789-10', 'ced123'),
(2, 'aaaa', '111.111.111-11', 'ced123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `datanasc` date DEFAULT NULL,
  `escola` varchar(100) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `mensalidade` decimal(10,2) DEFAULT NULL,
  `pagamentos` varchar(45) NOT NULL,
  `consultas` date DEFAULT NULL,
  `relatorio` text DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `dia` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `psicologo` varchar(45) NOT NULL,
  `pix` varchar(90) NOT NULL,
  `comprovante` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome`, `datanasc`, `escola`, `serie`, `diagnostico`, `responsavel`, `mensalidade`, `pagamentos`, `consultas`, `relatorio`, `cpf`, `senha`, `dia`, `horario`, `psicologo`, `pix`, `comprovante`) VALUES
(5, 'matheus', '1998-12-09', 'gunnar', 'completa', 'hahahaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'adrianes', 0.00, '123231', '0000-00-00', '13132123', '185.281.427-60', 'matheusfo1', '0000-00-00', '00:00:00', 'flavia', '21128912312378912378', ''),
(29, 'adriane', '1975-01-13', 'gunnar', 'completo', 'hahaha', 'adriane', 200.00, 'Aprovado', '0000-00-00', '12312123', '934.734.197-53', 'adrianefo1', '2024-01-17', '09:10:00', 'flavia', '11233', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `id_parceiro` int(11) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `assistidos` int(11) DEFAULT NULL,
  `agenda` text DEFAULT NULL,
  `folha_recebidos` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `parceiro`
--

INSERT INTO `parceiro` (`id_parceiro`, `cnpj`, `nome`, `senha`, `especialidade`, `assistidos`, `agenda`, `folha_recebidos`) VALUES
(0, '24.885.089/0001-85', 'flavia', 'matheusfo1', 'psicologa', 15, '06/12/2024', 12.00),
(3, '24.885.089/0001-89', 'alberto', 'ced123', 'medico', 15, '06/12/2024', 1.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`id_parceiro`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
