-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/04/2014 às 23h28min
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `cpf`, `rg`, `quadra`, `rua`, `casa`, `bairro`, `data_cadastro`, `cidade`, `telefone1`, `telefone2`, `email`) VALUES
(10, 'Ana Carolina', '998.742.021-49', 6767, 12, '14', 78, 'Céu Azul', '2014-03-02 21:36:17', 'Valparaiso de Goiás3', '(61) 3629-1344', '(62) 4567-899', 'anacarolina@yahoo.com.br'),
(11, 'Welton Moreira dos Santos', '998.742.021-49', 1212, 12, '14', 78, 'Céu Azul', '2014-03-02 22:05:35', 'Valparaíso de Goiás', '(61) 3629-1358', '(12) 1233-3333', 'weltonwms@gmail.com'),
(12, 'Beto Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'beto@gmail.com'),
(13, 'Carlos Pereira da Silva', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(14, 'Diego Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(17, 'Elaine Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(18, 'Fernando Pereira da Silva', '022.714.331-00', 23456, 34, '16', 9, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(61) 3233-3333', 'walisson@gmai.com'),
(19, 'Gabriel Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(20, 'Huerta Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'huerta@gmail.com'),
(21, 'Jailson Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(23, 'Walisson Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 33343431', '(21) 33343400', 'walisson@gmai.com'),
(24, 'Wesley Pereira', '998.742.021-49', 23456, 34, '16', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmai.com'),
(26, 'raul', '603.444.581-72', 677777, 56, '43', 10, 'park', '2014-03-19 21:59:20', 'ocidental', '(88) 8888-8888', '(66) 6666-6666', 'evandodinim@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `tb_conta`
--

INSERT INTO `tb_conta` (`id`, `servico`, `nr_doc`, `id_cliente`, `nr_mensalidade`, `data_cadastro`) VALUES
(25, 'Tv a Cabo', 'A-01', 12, NULL, '2014-04-05'),
(26, 'Tv a Cabo Plus', 'A-02', 17, NULL, '2014-04-05'),
(27, 'Internet de 20MB', 'A-03', 18, NULL, '2014-04-05'),
(28, 'Tv a Cabo', 'A-0123', 17, NULL, '2014-04-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensalidade`
--

CREATE TABLE IF NOT EXISTS `tb_mensalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vencimento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `nr_parcela` tinyint(4) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `quitada` tinyint(1) NOT NULL,
  `data_quitacao` date DEFAULT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idconta` (`id_conta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Extraindo dados da tabela `tb_mensalidade`
--

INSERT INTO `tb_mensalidade` (`id`, `vencimento`, `valor`, `nr_parcela`, `id_conta`, `quitada`, `data_quitacao`, `valor_pago`) VALUES
(143, '2014-04-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(144, '2014-05-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(145, '2014-06-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(146, '2014-07-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(147, '2014-08-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(148, '2014-09-09', 24.00, 0, 25, 1, '2014-04-05', 24.00),
(149, '2014-10-09', 25.00, 0, 25, 1, '2014-04-05', 25.00),
(152, '2014-05-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(153, '2014-06-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(154, '2014-07-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(155, '2014-08-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(156, '2014-09-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(157, '2014-10-09', 24.00, 0, 26, 1, '2014-04-05', 24.00),
(158, '2014-05-09', 30.00, 0, 27, 1, '2014-04-05', 30.00),
(159, '2014-06-09', 30.00, 0, 27, 1, '2014-04-04', 25.00),
(160, '2014-07-09', 30.00, 0, 27, 1, '2014-04-06', 35.00),
(173, '2015-01-09', 30.00, 0, 27, 1, '2014-04-10', 30.00),
(176, '2014-12-12', 30.00, 0, 27, 1, '2014-04-10', 30.00),
(178, '2015-01-29', 30.00, 0, 27, 1, '2014-04-10', 30.00),
(179, '2014-09-09', 23.00, 0, 28, 0, NULL, NULL),
(180, '2014-10-09', 23.00, 0, 28, 0, NULL, NULL),
(181, '2014-11-09', 23.00, 0, 28, 0, NULL, NULL),
(182, '2014-12-09', 23.00, 0, 28, 0, NULL, NULL),
(183, '2015-01-09', 23.00, 0, 28, 0, NULL, NULL),
(184, '2015-02-09', 23.00, 0, 28, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_solicitacao_senha`
--

CREATE TABLE IF NOT EXISTS `tb_solicitacao_senha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atendida` tinyint(1) NOT NULL,
  `rejeitada` tinyint(1) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_solicitacao_senha`
--

INSERT INTO `tb_solicitacao_senha` (`id`, `atendida`, `rejeitada`, `id_cliente`, `data_solicitacao`) VALUES
(6, 1, 1, 20, '2014-04-20 21:11:46'),
(8, 1, 1, 10, '2014-04-20 23:17:31'),
(9, 1, 1, 12, '2014-04-20 23:24:16'),
(10, 1, 0, 23, '2014-04-20 23:08:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `login`, `senha`, `adm`, `id_cliente`) VALUES
(1, 'welton', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(2, 'andre', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(5, 'aninha', 'e10adc3949ba59abbe56e057f20f883e', 0, 10),
(6, 'betowms', 'e10adc3949ba59abbe56e057f20f883e', 0, 12),
(15, 'walisson', 'e10adc3949ba59abbe56e057f20f883e', 0, 23);

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