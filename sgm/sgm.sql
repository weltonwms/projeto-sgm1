-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 16/03/2014 às 15h14min
-- Versão do Servidor: 5.5.35
-- Versão do PHP: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sgm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(254) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1cbd90858f7121dbce1ddaf08154b312', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:27.0) Gecko/20100101 Firefox/27.0', 1394993142, 'a:4:{s:9:"user_data";s:0:"";s:5:"login";s:6:"welton";s:6:"logado";b:1;s:3:"adm";b:1;}'),
('833a0cf263585ede7dc827624a27a320', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:27.0) Gecko/20100101 Firefox/27.0', 1394989084, 'a:4:{s:9:"user_data";s:0:"";s:5:"login";s:6:"welton";s:6:"logado";b:1;s:3:"adm";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `quadra` tinyint(4) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `casa` tinyint(4) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `cpf`, `rg`, `quadra`, `rua`, `casa`, `bairro`, `data_cadastro`, `cidade`, `telefone1`, `telefone2`, `email`) VALUES
(10, 'Ana Carolina', '998.742.021-49', 6767, 12, '14', 78, 'Céu Azul', '2014-03-02 21:36:17', 'Valparaiso de Goiás3', '(61) 3629-1344', '(62) 4567-899', 'anacarolina@yahoo.com.br'),
(11, 'Welton Moreira dos Santos', '998.742.021-49', 1212, 12, '14', 78, 'Céu Azul', '2014-03-02 22:05:35', 'Valparaíso de Goiás', '(61) 3629-1358', '(12) 1233-3333', 'weltonwms@gmail.com'),
(12, 'Beto Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(13, 'Carlos Pereira da Silva', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(14, 'Diego Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(15, 'Eduadro Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(16, 'Fabiano Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(17, 'Elaine Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(18, 'Fernando Pereira da Silva', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(19, 'Gabriel Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(20, 'Huerta Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(21, 'Jailson Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(23, 'Walisson Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 33343431', '(21) 33343400', 'walisson@gmai.com'),
(24, 'Wesley Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(25, 'jeimerons', '019.146.901-76', 2222, 127, '14', 2, 'Céu Azul', '2014-03-13 18:03:40', 'Valparaíso de Goiás', '(88) 8888-8888', '(88) 8888-8888', 'jeimerson@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conta`
--

CREATE TABLE IF NOT EXISTS `tb_conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(45) NOT NULL,
  `nr_doc` varchar(45) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `nr_mensalidade` tinyint(4) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_conta`
--

INSERT INTO `tb_conta` (`id`, `servico`, `nr_doc`, `id_cliente`, `nr_mensalidade`, `data_cadastro`) VALUES
(1, 'Tv a Cabo', 'A-01', 17, NULL, '2014-03-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensalidade`
--

CREATE TABLE IF NOT EXISTS `tb_mensalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vencimento` date NOT NULL,
  `valor` float NOT NULL,
  `nr_parcela` tinyint(4) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `quitada` tinyint(1) NOT NULL,
  `data_quitacao` datetime DEFAULT NULL,
  `valor_pago` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idconta` (`id_conta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_mensalidade`
--

INSERT INTO `tb_mensalidade` (`id`, `vencimento`, `valor`, `nr_parcela`, `id_conta`, `quitada`, `data_quitacao`, `valor_pago`) VALUES
(1, '2014-04-09', 24, 0, 1, 0, NULL, NULL),
(2, '2014-05-09', 24, 0, 1, 0, NULL, NULL),
(3, '2014-06-09', 24, 0, 1, 0, NULL, NULL),
(4, '2014-07-09', 24, 0, 1, 0, NULL, NULL),
(5, '2014-08-09', 24, 0, 1, 0, NULL, NULL),
(6, '2014-09-09', 24, 0, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacao_senha`
--

CREATE TABLE IF NOT EXISTS `tb_solicitacao_senha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `atendido` tinyint(1) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_solicitacao_senha`
--

INSERT INTO `tb_solicitacao_senha` (`id`, `nome`, `email`, `atendido`, `id_cliente`, `data_solicitacao`) VALUES
(3, 'Welton Moreira dos Santos', 'weltonwms@gmail.com', 0, 11, '2014-03-06 18:03:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_cliente1` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `login`, `senha`, `adm`, `id_cliente`) VALUES
(1, 'welton', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(2, 'andre', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(3, 'sergio', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(4, 'ana''darc', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `tb_conta`
--
ALTER TABLE `tb_conta`
  ADD CONSTRAINT `fk_idcliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_mensalidade`
--
ALTER TABLE `tb_mensalidade`
  ADD CONSTRAINT `tb_mensalidade_ibfk_1` FOREIGN KEY (`id_conta`) REFERENCES `tb_conta` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_solicitacao_senha`
--
ALTER TABLE `tb_solicitacao_senha`
  ADD CONSTRAINT `fk_id_cliente_solicitante` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;