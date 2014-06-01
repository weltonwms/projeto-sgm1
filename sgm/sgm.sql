-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/06/2014 às 19h37min
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
('ee3dc44de418038ab52cbf367a21aec0', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:27.0) Gecko/20100101 Firefox/27.0', 1401635019, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` int(11) DEFAULT NULL,
  `quadra` tinyint(4) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `casa` tinyint(4) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `cpf`, `rg`, `quadra`, `rua`, `casa`, `bairro`, `data_cadastro`, `cidade`, `telefone1`, `telefone2`, `email`) VALUES
(10, 'Ana Carolina de matos', '043.786.736-65', 6767, 12, '14', 78, 'Céu Azul', '2014-03-02 21:36:17', 'Valparaiso de Goiás3', '(61) 3629-1344', '(62) 4567-899', 'anacarolina@yahoo.com.br'),
(11, 'Welton Moreira dos Santos', '998.742.021-49', 1212, 12, '14', 78, 'Céu Azul', '2014-03-02 22:05:35', 'Valparaíso de Goiás', '(61) 3629-1358', '(12) 1233-3333', 'weltonwms@gmail.com'),
(12, 'Beto Pereira', '252.432.046-41', 23456, 40, 'Santo Amaro', 20, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'beto@gmail.com'),
(13, 'Carlos Pereira da Silva', '375.514.536-79', 23456, 23, 'Caxias', 2, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'carlos@gmail.com'),
(14, 'Diego Pereira', '617.148.024-00', 23456, 42, 'Aparecida do Sul', 3, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'diego@gmail.com'),
(17, 'Elaine Pereira', '742.554.401-66', 23456, 12, 'Zacarias', 55, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'elaine@gmail.com'),
(18, 'Fernando Pereira da Silva', '022.714.331-00', 23456, 78, '12', 45, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(61) 3233-3333', 'fernando@gmail.com'),
(19, 'Gabriel Pereira', '166.636.213-19', 23456, 34, 'Brigadeiro Machado', 12, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'gabriel@gmai.com'),
(20, 'Huerta Pereira', '669.824.071-0', 23456, 127, 'Maria da Cruz', 3, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'huerta@gmail.com'),
(21, 'Jailson Pereira', '485.345.818-27', 23456, 90, '378', 127, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'jailson@gmai.com'),
(23, 'Walisson Pereira', '275.725.496-08', 23456, 124, 'Jonas Tadeu', 68, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'walisson@gmail.com'),
(24, 'Wesley Pereira', '339.064.482-23', 23456, 14, '09', 35, 'Jardim Oriente', '2014-03-08 00:00:00', 'Valparaiso de Goiás', '(21) 3334-3431', '(21) 3334-3400', 'wesley@gmail.com'),
(26, 'raul', '603.444.581-72', 677777, 56, '43', 10, 'park', '2014-03-19 21:59:20', 'ocidental', '(88) 8888-8888', '(66) 6666-6666', 'evandodinim@gmail.com'),
(27, 'MAURICIO XIMENES', '725.167.631-15', 898999, 12, '09', 78, 'Céu Azul', '2014-05-01 14:41:37', 'Valparaíso de Goiás 222', '(99) 9999-9999', '(99) 9999-9999', 'mauricio@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conta`
--

CREATE TABLE IF NOT EXISTS `tb_conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(60) NOT NULL,
  `nr_doc` varchar(45) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `nr_mensalidade` tinyint(4) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `tb_conta`
--

INSERT INTO `tb_conta` (`id`, `servico`, `nr_doc`, `id_cliente`, `nr_mensalidade`, `data_cadastro`) VALUES
(25, 'Tv a Cabo', 'A-01', 12, NULL, '2014-04-05'),
(26, 'Tv a Cabo Plus', 'A-02', 17, NULL, '2014-04-05'),
(27, 'Internet de 20MB', 'A-03', 18, NULL, '2014-04-05'),
(36, 'Internet de 10MB', 'A-08', 27, NULL, '2014-05-01'),
(40, 'Tv a Cabo2', 'A-13', 10, NULL, '2014-05-17'),
(41, 'Tv a Cabo Plus', 'A-041', 14, NULL, '2014-05-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensalidade`
--

CREATE TABLE IF NOT EXISTS `tb_mensalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vencimento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `quitada` tinyint(1) NOT NULL,
  `data_quitacao` date DEFAULT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idconta` (`id_conta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=276 ;

--
-- Extraindo dados da tabela `tb_mensalidade`
--

INSERT INTO `tb_mensalidade` (`id`, `vencimento`, `valor`, `id_conta`, `quitada`, `data_quitacao`, `valor_pago`) VALUES
(143, '2014-04-09', 24.00, 25, 1, '2014-04-05', 24.00),
(144, '2014-05-09', 24.00, 25, 1, '2014-04-05', 24.00),
(145, '2014-06-09', 24.00, 25, 1, '2014-04-05', 24.00),
(146, '2014-07-09', 24.00, 25, 1, '2014-04-05', 24.00),
(147, '2014-08-09', 24.00, 25, 1, '2014-04-05', 24.00),
(148, '2014-09-09', 24.00, 25, 1, '2014-04-05', 24.00),
(152, '2014-05-09', 24.00, 26, 1, '2014-04-05', 24.00),
(153, '2014-06-09', 24.00, 26, 1, '2014-04-05', 24.00),
(154, '2014-07-09', 24.00, 26, 1, '2014-04-05', 24.00),
(155, '2014-08-09', 24.00, 26, 1, '2014-04-05', 24.00),
(156, '2014-09-09', 24.00, 26, 1, '2014-04-05', 24.00),
(157, '2014-10-09', 24.00, 26, 1, '2014-04-05', 24.00),
(158, '2014-05-09', 30.00, 27, 1, '2014-04-05', 30.00),
(159, '2014-06-09', 30.00, 27, 1, '2014-04-04', 25.00),
(160, '2014-07-09', 30.00, 27, 1, '2014-04-06', 35.00),
(173, '2015-01-09', 30.00, 27, 1, '2014-04-10', 30.00),
(176, '2014-12-12', 30.00, 27, 1, '2014-04-10', 30.00),
(178, '2015-01-29', 30.00, 27, 1, '2014-04-10', 30.00),
(226, '2014-05-02', 25.00, 36, 1, '2014-05-01', 25.00),
(227, '2014-06-02', 25.00, 36, 0, NULL, NULL),
(228, '2014-07-02', 25.00, 36, 0, NULL, NULL),
(229, '2014-08-02', 25.00, 36, 0, NULL, NULL),
(230, '2014-09-02', 25.00, 36, 0, NULL, NULL),
(231, '2014-10-02', 25.00, 36, 0, NULL, NULL),
(256, '2014-05-12', 25.00, 40, 0, NULL, NULL),
(257, '2014-06-20', 25.00, 40, 0, NULL, NULL),
(258, '2014-07-20', 25.00, 40, 0, NULL, NULL),
(259, '2014-08-20', 25.00, 40, 0, NULL, NULL),
(260, '2014-09-20', 25.00, 40, 0, NULL, NULL),
(261, '2014-10-20', 25.00, 40, 0, NULL, NULL),
(262, '2014-11-20', 25.00, 40, 0, NULL, NULL),
(263, '2014-12-20', 25.00, 40, 1, '2014-05-22', 25.00),
(264, '2014-09-09', 30.00, 41, 0, NULL, NULL),
(265, '2014-10-09', 30.00, 41, 0, NULL, NULL),
(266, '2014-11-09', 30.00, 41, 0, NULL, NULL),
(267, '2014-12-09', 30.00, 41, 0, NULL, NULL),
(268, '2015-01-09', 30.00, 41, 0, NULL, NULL),
(269, '2015-02-09', 30.00, 41, 0, NULL, NULL),
(270, '2015-03-09', 30.00, 41, 0, NULL, NULL),
(271, '2015-04-09', 30.00, 41, 0, NULL, NULL),
(272, '2015-05-09', 30.00, 41, 0, NULL, NULL),
(273, '2015-06-09', 30.00, 41, 0, NULL, NULL),
(274, '2015-07-09', 30.00, 41, 0, NULL, NULL),
(275, '2015-08-09', 30.00, 41, 0, NULL, NULL);

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
  UNIQUE KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_solicitacao_senha`
--

INSERT INTO `tb_solicitacao_senha` (`id`, `atendida`, `rejeitada`, `id_cliente`, `data_solicitacao`) VALUES
(1, 0, 0, 10, '2014-05-21 19:05:36');

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
  UNIQUE KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `login`, `senha`, `adm`, `id_cliente`) VALUES
(1, 'welton', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(2, 'andre', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
(5, 'aninha', 'e10adc3949ba59abbe56e057f20f883e', 0, 10),
(18, 'ximenes', 'e10adc3949ba59abbe56e057f20f883e', 0, 27);

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
