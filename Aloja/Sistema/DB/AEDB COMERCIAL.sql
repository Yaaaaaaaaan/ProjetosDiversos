-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17-Abr-2020 às 17:35
-- Versão do servidor: 5.7.25
-- versão do PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";

CREATE DATABASE commerce;

USE commerce;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `codArq` int(11) NOT NULL,
  `tituloArq` text NOT NULL,
  `codPdtArq` int(11) DEFAULT NULL,
  `codLogrArq` int(11) DEFAULT NULL,
  `idOperatArq` int(11) DEFAULT NULL,
  `idClientArq` int(11) DEFAULT NULL,
  `idFornecArq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idClient` int(11) NOT NULL,
  `nomeCli` varchar(255) DEFAULT NULL,
  `cpfCli` varchar(20) NULL,
  `cnpjCli` varchar(20) NULL,
  `nascimentoCli` date DEFAULT NULL,
  `idOperatCli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `codCompra` int(11) NOT NULL,
  `codPdtCom` int(11) NOT NULL,
  `codProcedTrCom` int(11) NOT NULL,
  `QtdProdCom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `codCtt` int(11) NOT NULL,
  `telefoneCli` varchar(20) NOT NULL,
  `celularCli` varchar(20) NOT NULL,
  `emailCli` varchar(100) NOT NULL,
  `idOperatCtt` int(11) DEFAULT NULL,
  `idClientCtt` int(11) DEFAULT NULL,
  `idFornecCtt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `codEst` int(11) NOT NULL,
  `codPdtEst` int(11) DEFAULT NULL,
  `QtdEst` varchar(10) NOT NULL,
  `ultimarecargaEst` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idOperatEst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornec` int(11) NOT NULL,
  `nomeFnc` varchar(255) DEFAULT NULL,
  `cpfFnc` varchar(20) NOT NULL,
  `cnpjFnc` varchar(20) NOT NULL,
  `nascimentoFnc` date DEFAULT NULL,
  `idOperatFnc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logradouro`
--

CREATE TABLE `logradouro` (
  `CodLogr` int(11) NOT NULL,
  `regiLogr` int(11) NOT NULL,
  `estaLogr` varchar(255) DEFAULT NULL,
  `bairLogr` int(11) NOT NULL,
  `ruaLogr` text NOT NULL,
  `compLogr` text NOT NULL,
  `cepLogr` text NOT NULL,
  `idOperatLogr` int(11) DEFAULT NULL
,  `idClientLogr` int(11) DEFAULT NULL,
  `idFornecLogr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
--

CREATE TABLE `operador` (
  `idOperat` int(11) NOT NULL,
  `usuarioOp` varchar(25) NOT NULL,
  `senhaOp` varchar(255) NOT NULL,
  `cpfOp` varchar(20) NOT NULL,
  `nomeOp` text NOT NULL,
  `nascimentoOp` date NOT NULL,
  `rankOp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codPdt` int(11) NOT NULL,
  `nomePdt` varchar(255) DEFAULT NULL,
  `descricaoPdt` longtext NOT NULL,
  `validadePdt` date NOT NULL,
  `valorcompraPdt` decimal(20,2) NOT NULL,
  `valorvendaPdt` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `codProcedTr` int(11) NOT NULL,
  `dataTr` timestamp NOT NULL,
  `formapagamentoTr` varchar(5) NOT NULL,
  `parcelasTr` int(3) DEFAULT NULL,
  `totalpagarTr` decimal(20,2) NULL,
  `totalpagoTr` decimal(20,2) NULL,
  `idClientTr` int(11) DEFAULT NULL,
  `idOperatTr` int(11) NOT NULL,
  `idFornecTr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`codArq`),
  ADD KEY `codPdtArq` (`codPdtArq`),
  ADD KEY `codLogrArq` (`codLogrArq`),
  ADD KEY `idOperatArq` (`idOperatArq`),
  ADD KEY `idClientArq` (`idClientArq`),
  ADD KEY `idFornecArq` (`idFornecArq`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `cpfCli` (`cpfCli`),
  ADD UNIQUE KEY `cnpjCli` (`cnpjCli`),
  ADD KEY `idOperatCli` (`idOperatCli`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`codCompra`),
  ADD KEY `codPdtCom` (`codPdtCom`),
  ADD KEY `codProcedTrCom` (`codProcedTrCom`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`codCtt`),
  ADD UNIQUE KEY `celularCli` (`celularCli`),
  ADD UNIQUE KEY `emailCli` (`emailCli`),
  ADD KEY `idOperatCtt` (`idOperatCtt`),
  ADD KEY `idClientCtt` (`idClientCtt`),
  ADD KEY `idFornecCtt` (`idFornecCtt`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`codEst`),
  ADD KEY `codPdtEst` (`codPdtEst`),
  ADD KEY `idOperatEst` (`idOperatEst`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornec`),
  ADD UNIQUE KEY `cpfFnc` (`cpfFnc`),
  ADD UNIQUE KEY `cnpjFnc` (`cnpjFnc`),
  ADD KEY `idOperatFnc` (`idOperatFnc`);

--
-- Indexes for table `logradouro`
--
ALTER TABLE `logradouro`
  ADD PRIMARY KEY (`CodLogr`),
  ADD KEY `idOperatLogr` (`idOperatLogr`),
  ADD KEY `idClientLogr` (`idClientLogr`),
  ADD KEY `idFornecLogr` (`idFornecLogr`);

--
-- Indexes for table `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`idOperat`),
  ADD UNIQUE KEY `usuarioOp` (`usuarioOp`),
  ADD UNIQUE KEY `cpfOp` (`cpfOp`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codPdt`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`codProcedTr`),
  ADD KEY `idClientTr` (`idClientTr`),
  ADD KEY `idOperatTr` (`idOperatTr`),
  ADD KEY `idFornecTr` (`idFornecTr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `codArq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `codCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `codCtt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `codEst` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logradouro`
--
ALTER TABLE `logradouro`
  MODIFY `CodLogr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operador`
--
ALTER TABLE `operador`
  MODIFY `idOperat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codPdt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transacao`
--
ALTER TABLE `transacao`
  MODIFY `codProcedTr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`codPdtArq`) REFERENCES `produto` (`codPdt`),
  ADD CONSTRAINT `arquivo_ibfk_2` FOREIGN KEY (`codLogrArq`) REFERENCES `logradouro` (`CodLogr`),
  ADD CONSTRAINT `arquivo_ibfk_3` FOREIGN KEY (`idOperatArq`) REFERENCES `cliente` (`idClient`),
  ADD CONSTRAINT `arquivo_ibfk_4` FOREIGN KEY (`idClientArq`) REFERENCES `operador` (`idOperat`),
  ADD CONSTRAINT `arquivo_ibfk_5` FOREIGN KEY (`idFornecArq`) REFERENCES `fornecedor` (`idFornec`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idOperatCli`) REFERENCES `operador` (`idOperat`);

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`codPdtCom`) REFERENCES `produto` (`codPdt`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`codProcedTrCom`) REFERENCES `transacao` (`codProcedTr`);

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`idOperatCtt`) REFERENCES `operador` (`idOperat`),
  ADD CONSTRAINT `contato_ibfk_2` FOREIGN KEY (`idClientCtt`) REFERENCES `cliente` (`idClient`),
  ADD CONSTRAINT `contato_ibfk_3` FOREIGN KEY (`idFornecCtt`) REFERENCES `fornecedor` (`idFornec`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`codPdtEst`) REFERENCES `produto` (`codPdt`),
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`idOperatEst`) REFERENCES `operador` (`idOperat`);

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`idOperatFnc`) REFERENCES `operador` (`idOperat`);

--
-- Limitadores para a tabela `logradouro`
--
ALTER TABLE `logradouro`
  ADD CONSTRAINT `logradouro_ibfk_1` FOREIGN KEY (`idOperatLogr`) REFERENCES `operador` (`idOperat`),
  ADD CONSTRAINT `logradouro_ibfk_2` FOREIGN KEY (`idClientLogr`) REFERENCES `cliente` (`idClient`),
  ADD CONSTRAINT `logradouro_ibfk_3` FOREIGN KEY (`idFornecLogr`) REFERENCES `fornecedor` (`idFornec`);

--
-- Limitadores para a tabela `transacao`
--
ALTER TABLE `transacao`
  ADD CONSTRAINT `transacao_ibfk_1` FOREIGN KEY (`idClientTr`) REFERENCES `cliente` (`idClient`),
  ADD CONSTRAINT `transacao_ibfk_2` FOREIGN KEY (`idOperatTr`) REFERENCES `operador` (`idOperat`),
  ADD CONSTRAINT `transacao_ibfk_3` FOREIGN KEY (`idFornecTr`) REFERENCES `operador` (`idOperat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
