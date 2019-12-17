-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Dez-2015 às 18:43
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `bolsistas`
--
CREATE DATABASE IF NOT EXISTS `bolsistas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bolsistas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE IF NOT EXISTS `acesso` (
  `idacesso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `nivel` int(10) unsigned DEFAULT NULL,
  `permissao` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idacesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `idBai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cidades_idcid` int(10) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idBai`),
  KEY `Bairros_FKIndex1` (`cidades_idcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsas`
--

CREATE TABLE IF NOT EXISTS `bolsas` (
  `idbolsa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Vinculos_idvinc` int(10) unsigned NOT NULL,
  `dtbolsa` date DEFAULT NULL,
  `totparc` date DEFAULT NULL,
  `parcela` int(10) unsigned DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `sit` varchar(2) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`idbolsa`),
  KEY `Bolsas_FKIndex1` (`Vinculos_idvinc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `idcal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) DEFAULT NULL,
  `dataevt` date DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`idcal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `idcid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Uf_iduf` int(10) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idcid`),
  KEY `cidades_FKIndex1` (`Uf_iduf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `idcolab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acesso_idacesso` int(10) unsigned NOT NULL,
  `Contas_idconta` int(10) unsigned NOT NULL,
  `rua_idrua` int(10) unsigned NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(13) DEFAULT NULL,
  `dtnasc` date DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `obs` text,
  `senha` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idcolab`),
  KEY `Colaboradores_FKIndex1` (`rua_idrua`),
  KEY `Colaboradores_FKIndex2` (`Contas_idconta`),
  KEY `Colaboradores_FKIndex3` (`acesso_idacesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE IF NOT EXISTS `contas` (
  `idconta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nmbanco` int(10) unsigned DEFAULT NULL,
  `banco` varchar(30) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `nmconta` varchar(15) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`idconta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idcurso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  `carga` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `iddisc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(30) DEFAULT NULL,
  `carga` int(10) unsigned DEFAULT NULL,
  `ementa` varchar(150) DEFAULT NULL,
  `requisito` int(10) unsigned DEFAULT NULL,
  `totbolsa` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`iddisc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas_has_modulos`
--

CREATE TABLE IF NOT EXISTS `disciplinas_has_modulos` (
  `Disciplinas_iddisc` int(10) unsigned NOT NULL,
  `Modulos_idmod` int(10) unsigned NOT NULL,
  `Colaboradores_idcolab` int(10) unsigned NOT NULL,
  `totvinc` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Disciplinas_iddisc`,`Modulos_idmod`),
  KEY `Disciplinas_has_Modulos_FKIndex1` (`Disciplinas_iddisc`),
  KEY `Disciplinas_has_Modulos_FKIndex2` (`Modulos_idmod`),
  KEY `Disciplinas_has_Modulos_FKIndex3` (`Colaboradores_idcolab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fsystem`
--

CREATE TABLE IF NOT EXISTS `fsystem` (
  `idsystem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `idfuncao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idfuncao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logss`
--

CREATE TABLE IF NOT EXISTS `logss` (
  `idlogs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fsystem_idsystem` int(10) unsigned NOT NULL,
  `Colaboradores_idcolab` int(10) unsigned NOT NULL,
  `dtlogs` date DEFAULT NULL,
  `operacao` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idlogs`),
  KEY `logs_2_FKIndex1` (`Colaboradores_idcolab`),
  KEY `logs_2_FKIndex2` (`fsystem_idsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `idmsg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Colaboradores_idcolab` int(10) unsigned NOT NULL,
  `iddestino` int(10) unsigned DEFAULT NULL,
  `dtmsg` date DEFAULT NULL,
  `assunto` varchar(40) DEFAULT NULL,
  `texto` text,
  `sit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idmsg`),
  KEY `Mensagens_FKIndex1` (`Colaboradores_idcolab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idmod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cursos_idcurso` int(10) unsigned NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `dtini` date NOT NULL,
  `dtfim` date DEFAULT NULL,
  `chtotal` int(10) unsigned DEFAULT NULL,
  `obs` text,
  `periodoletivo` varchar(10) DEFAULT NULL,
  `totalmat` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idmod`),
  KEY `Modulos_FKIndex2` (`Cursos_idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rua`
--

CREATE TABLE IF NOT EXISTS `rua` (
  `idrua` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Bairros_idBai` int(10) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idrua`),
  KEY `rua_FKIndex1` (`Bairros_idBai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `semanas`
--

CREATE TABLE IF NOT EXISTS `semanas` (
  `idatu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Modulos_idmod` int(10) unsigned NOT NULL,
  `semana` varchar(30) DEFAULT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`idatu`),
  KEY `semanas_FKIndex1` (`Modulos_idmod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `iduf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculos`
--

CREATE TABLE IF NOT EXISTS `vinculos` (
  `idvinc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Disciplinas_iddisc` int(10) unsigned NOT NULL,
  `Funcoes_idfuncao` int(10) unsigned NOT NULL,
  `Colaboradores_idcolab` int(10) unsigned NOT NULL,
  `Modulos_idmod` int(10) unsigned NOT NULL,
  `dtinicio` date DEFAULT NULL,
  `dtfim` date DEFAULT NULL,
  PRIMARY KEY (`idvinc`),
  KEY `Vinculos_FKIndex1` (`Modulos_idmod`),
  KEY `Vinculos_FKIndex2` (`Colaboradores_idcolab`),
  KEY `Vinculos_FKIndex3` (`Funcoes_idfuncao`),
  KEY `Vinculos_FKIndex4` (`Disciplinas_iddisc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
  ADD CONSTRAINT `bairros_ibfk_1` FOREIGN KEY (`cidades_idcid`) REFERENCES `cidades` (`idcid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `bolsas`
--
ALTER TABLE `bolsas`
  ADD CONSTRAINT `bolsas_ibfk_1` FOREIGN KEY (`Vinculos_idvinc`) REFERENCES `vinculos` (`idvinc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`Uf_iduf`) REFERENCES `uf` (`iduf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `colaboradores_ibfk_1` FOREIGN KEY (`rua_idrua`) REFERENCES `rua` (`idrua`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `colaboradores_ibfk_2` FOREIGN KEY (`Contas_idconta`) REFERENCES `contas` (`idconta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `colaboradores_ibfk_3` FOREIGN KEY (`acesso_idacesso`) REFERENCES `acesso` (`idacesso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplinas_has_modulos`
--
ALTER TABLE `disciplinas_has_modulos`
  ADD CONSTRAINT `disciplinas_has_modulos_ibfk_1` FOREIGN KEY (`Disciplinas_iddisc`) REFERENCES `disciplinas` (`iddisc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `disciplinas_has_modulos_ibfk_2` FOREIGN KEY (`Modulos_idmod`) REFERENCES `modulos` (`idmod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `disciplinas_has_modulos_ibfk_3` FOREIGN KEY (`Colaboradores_idcolab`) REFERENCES `colaboradores` (`idcolab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `logss`
--
ALTER TABLE `logss`
  ADD CONSTRAINT `logss_ibfk_1` FOREIGN KEY (`Colaboradores_idcolab`) REFERENCES `colaboradores` (`idcolab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `logss_ibfk_2` FOREIGN KEY (`fsystem_idsystem`) REFERENCES `fsystem` (`idsystem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`Colaboradores_idcolab`) REFERENCES `colaboradores` (`idcolab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`Cursos_idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rua`
--
ALTER TABLE `rua`
  ADD CONSTRAINT `rua_ibfk_1` FOREIGN KEY (`Bairros_idBai`) REFERENCES `bairros` (`idBai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `semanas`
--
ALTER TABLE `semanas`
  ADD CONSTRAINT `semanas_ibfk_1` FOREIGN KEY (`Modulos_idmod`) REFERENCES `modulos` (`idmod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vinculos`
--
ALTER TABLE `vinculos`
  ADD CONSTRAINT `vinculos_ibfk_1` FOREIGN KEY (`Modulos_idmod`) REFERENCES `modulos` (`idmod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vinculos_ibfk_2` FOREIGN KEY (`Colaboradores_idcolab`) REFERENCES `colaboradores` (`idcolab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vinculos_ibfk_3` FOREIGN KEY (`Funcoes_idfuncao`) REFERENCES `funcoes` (`idfuncao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vinculos_ibfk_4` FOREIGN KEY (`Disciplinas_iddisc`) REFERENCES `disciplinas` (`iddisc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
