-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Abr-2020 às 17:34
-- Versão do servidor: 5.7.25
-- versão do PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";


CREATE DATABASE prestserv;

USE prestserv;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestserv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacoes`
--

CREATE TABLE `anotacoes` (
  `cod_ant` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `corpo` text NOT NULL,
  `id_ope_ant` int(11) DEFAULT NULL,
  `id_col_ant` int(11) DEFAULT NULL,
  `cod_arq_ant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `cod_arq` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cod_ods_arq` int(11) DEFAULT NULL,
  `id_cli_arq` int(11) DEFAULT NULL,
  `id_col_arq` int(11) DEFAULT NULL,
  `id_ope_arq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributos`
--

CREATE TABLE `atributos` (
  `cod_atr` int(11) NOT NULL,
  `cod_bat_atr` int(11) NOT NULL,
  `cod_nvl_atr` int(11) NOT NULL,
  `id_col_atr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atributos`
--

INSERT INTO `atributos` (`cod_atr`, `cod_bat_atr`, `cod_nvl_atr`, `id_col_atr`) VALUES
(2, 1, 2, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `base_atributos`
--

CREATE TABLE `base_atributos` (
  `cod_bat` int(11) NOT NULL,
  `atributo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `base_atributos`
--

INSERT INTO `base_atributos` (`cod_bat`, `atributo`) VALUES
(1, 'dfdsgfbh'),
(2, 'sssssssfgas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `base_nivel`
--

CREATE TABLE `base_nivel` (
  `cod_nvl` int(11) NOT NULL,
  `nivel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `base_nivel`
--

INSERT INTO `base_nivel` (`cod_nvl`, `nivel`) VALUES
(1, 'ddddddddddfffssss'),
(2, 'aaaaaaasdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cod_logr_cli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cli`, `nome`, `cpf`, `cnpj`, `nascimento`, `telefone`, `celular`, `email`, `cod_logr_cli`) VALUES
(1, 'Paulo Augusto dos Santos Sousa', '12345678900', '', '1980-02-01', '2133525545', '21955453546', 'zdsahgh@gkfhv.cdb', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `id_col` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `cod_logr_col` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`id_col`, `usuario`, `senha`, `cpf`, `cnpj`, `nome`, `nascimento`, `cod_logr_col`) VALUES
(1, 'mariol', '$2a$08$MTkxNDAxMTQzNDVlNTk1MOssfVRiJS0go0QdXcOD4ZNfvVP4.5c.i', '12345678900', '', 'Mario Almeida Lopes', '1980-02-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logradouro`
--

CREATE TABLE `logradouro` (
  `cod_logr` int(11) NOT NULL,
  `regi` int(11) NOT NULL,
  `esta` varchar(11) NOT NULL,
  `bair` int(11) NOT NULL,
  `rua` text NOT NULL,
  `comp` text NOT NULL,
  `cep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logradouro`
--

INSERT INTO `logradouro` (`cod_logr`, `regi`, `esta`, `bair`, `rua`, `comp`, `cep`) VALUES
(1, 1, 'RJ', 7975, 'Av. das cobras, 1111', 'Apto. 105', '26255230');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
--

CREATE TABLE `operador` (
  `id_ope` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nome` text NOT NULL,
  `nascimento` date DEFAULT NULL,
  `rank` int(2) NOT NULL,
  `cod_logr_ope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `operador`
--

INSERT INTO `operador` (`id_ope`, `usuario`, `senha`, `cpf`, `nome`, `nascimento`, `rank`, `cod_logr_ope`) VALUES
(1, 'bat', '$2a$08$NjQzMTY0MDAzNWU1OTUxYe/FAOFqutX8WK7iFPO4pnusZQ8rXkm1u', '12345678999', 'Yan Goulart Fonseca', '1998-05-21', 5, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_servico`
--

CREATE TABLE `ordem_servico` (
  `cod_ods` int(11) NOT NULL,
  `descricao` longtext NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `data` date NOT NULL,
  `formapagamento` int(1) NOT NULL,
  `parcelas` int(3) DEFAULT NULL,
  `totalpagar` decimal(20,2) NOT NULL,
  `totalpago` decimal(20,2) NOT NULL,
  `id_cli_ods` int(11) DEFAULT NULL,
  `id_ope_ods` int(11) DEFAULT NULL,
  `id_col_ods` int(11) DEFAULT NULL,
  `cod_logr_ods` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordem_servico`
--

INSERT INTO `ordem_servico` (`cod_ods`, `descricao`, `tipo`, `status`, `data`, `formapagamento`, `parcelas`, `totalpagar`, `totalpago`, `id_cli_ods`, `id_ope_ods`, `id_col_ods`, `cod_logr_ods`) VALUES
(1, 'adbsffvdgvfv', 1, 1, '2020-03-09', 2, NULL, '1550.50', '1500.30', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `cod_pos` int(11) NOT NULL,
  `cod_arq_pos` int(11) DEFAULT NULL,
  `id_col_pos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD PRIMARY KEY (`cod_ant`),
  ADD KEY `cod_arq_ant` (`cod_arq_ant`),
  ADD KEY `id_ope_ant` (`id_ope_ant`),
  ADD KEY `id_col_ant` (`id_col_ant`);

--
-- Indexes for table `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`cod_arq`),
  ADD KEY `cod_ods_arq` (`cod_ods_arq`),
  ADD KEY `id_cli_arq` (`id_cli_arq`),
  ADD KEY `id_ope_arq` (`id_ope_arq`),
  ADD KEY `id_col_arq` (`id_col_arq`);

--
-- Indexes for table `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`cod_atr`),
  ADD KEY `cod_bat_atr` (`cod_bat_atr`),
  ADD KEY `cod_nvl_atr` (`cod_nvl_atr`),
  ADD KEY `id_col_atr` (`id_col_atr`);

--
-- Indexes for table `base_atributos`
--
ALTER TABLE `base_atributos`
  ADD PRIMARY KEY (`cod_bat`);

--
-- Indexes for table `base_nivel`
--
ALTER TABLE `base_nivel`
  ADD PRIMARY KEY (`cod_nvl`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `celular` (`celular`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cod_logr_cli` (`cod_logr_cli`);

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_col`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD KEY `cod_logr_col` (`cod_logr_col`);

--
-- Indexes for table `logradouro`
--
ALTER TABLE `logradouro`
  ADD PRIMARY KEY (`cod_logr`);

--
-- Indexes for table `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`id_ope`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `cod_logr_ope` (`cod_logr_ope`);

--
-- Indexes for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD PRIMARY KEY (`cod_ods`),
  ADD KEY `cod_logr_ods` (`cod_logr_ods`),
  ADD KEY `id_cli_ods` (`id_cli_ods`),
  ADD KEY `id_ope_ods` (`id_ope_ods`),
  ADD KEY `id_col_ods` (`id_col_ods`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`cod_pos`),
  ADD KEY `cod_arq_pos` (`cod_arq_pos`),
  ADD KEY `id_col_pos` (`id_col_pos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anotacoes`
--
ALTER TABLE `anotacoes`
  MODIFY `cod_ant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `cod_arq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atributos`
--
ALTER TABLE `atributos`
  MODIFY `cod_atr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `base_atributos`
--
ALTER TABLE `base_atributos`
  MODIFY `cod_bat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `base_nivel`
--
ALTER TABLE `base_nivel`
  MODIFY `cod_nvl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logradouro`
--
ALTER TABLE `logradouro`
  MODIFY `cod_logr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operador`
--
ALTER TABLE `operador`
  MODIFY `id_ope` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordem_servico`
--
ALTER TABLE `ordem_servico`
  MODIFY `cod_ods` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `cod_pos` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anotacoes`
--
ALTER TABLE `anotacoes`
  ADD CONSTRAINT `anotacoes_ibfk_1` FOREIGN KEY (`cod_arq_ant`) REFERENCES `arquivos` (`cod_arq`),
  ADD CONSTRAINT `anotacoes_ibfk_2` FOREIGN KEY (`id_ope_ant`) REFERENCES `operador` (`id_ope`),
  ADD CONSTRAINT `anotacoes_ibfk_3` FOREIGN KEY (`id_col_ant`) REFERENCES `colaborador` (`id_col`);

--
-- Limitadores para a tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`cod_ods_arq`) REFERENCES `ordem_servico` (`cod_ods`),
  ADD CONSTRAINT `arquivos_ibfk_2` FOREIGN KEY (`id_cli_arq`) REFERENCES `cliente` (`id_cli`),
  ADD CONSTRAINT `arquivos_ibfk_3` FOREIGN KEY (`id_ope_arq`) REFERENCES `operador` (`id_ope`),
  ADD CONSTRAINT `arquivos_ibfk_4` FOREIGN KEY (`id_col_arq`) REFERENCES `colaborador` (`id_col`);

--
-- Limitadores para a tabela `atributos`
--
ALTER TABLE `atributos`
  ADD CONSTRAINT `atributos_ibfk_1` FOREIGN KEY (`cod_bat_atr`) REFERENCES `base_atributos` (`cod_bat`),
  ADD CONSTRAINT `atributos_ibfk_2` FOREIGN KEY (`cod_nvl_atr`) REFERENCES `base_nivel` (`cod_nvl`),
  ADD CONSTRAINT `atributos_ibfk_3` FOREIGN KEY (`id_col_atr`) REFERENCES `colaborador` (`id_col`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_logr_cli`) REFERENCES `logradouro` (`cod_logr`);

--
-- Limitadores para a tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`cod_logr_col`) REFERENCES `logradouro` (`cod_logr`);

--
-- Limitadores para a tabela `operador`
--
ALTER TABLE `operador`
  ADD CONSTRAINT `operador_ibfk_1` FOREIGN KEY (`cod_logr_ope`) REFERENCES `logradouro` (`cod_logr`);

--
-- Limitadores para a tabela `ordem_servico`
--
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `ordem_servico_ibfk_1` FOREIGN KEY (`cod_logr_ods`) REFERENCES `logradouro` (`cod_logr`),
  ADD CONSTRAINT `ordem_servico_ibfk_2` FOREIGN KEY (`id_cli_ods`) REFERENCES `cliente` (`id_cli`),
  ADD CONSTRAINT `ordem_servico_ibfk_3` FOREIGN KEY (`id_ope_ods`) REFERENCES `operador` (`id_ope`),
  ADD CONSTRAINT `ordem_servico_ibfk_4` FOREIGN KEY (`id_col_ods`) REFERENCES `colaborador` (`id_col`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`cod_arq_pos`) REFERENCES `arquivos` (`cod_arq`),
  ADD CONSTRAINT `postagem_ibfk_2` FOREIGN KEY (`id_col_pos`) REFERENCES `colaborador` (`id_col`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
