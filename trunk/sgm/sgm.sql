-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 03/03/2014 às 11h21min
-- Versão do Servidor: 5.5.34
-- Versão do PHP: 5.3.10-1ubuntu3.9

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
('44dcb05620d4426af0dfa2e2db0aaefb', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1393805383, 'a:4:{s:9:"user_data";s:0:"";s:5:"login";s:6:"welton";s:6:"logado";b:1;s:3:"adm";b:1;}'),
('e6576345ba074e2b629b4df5987e4156', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1393814509, 'a:4:{s:9:"user_data";s:0:"";s:5:"login";s:6:"welton";s:6:"logado";b:1;s:3:"adm";b:1;}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `nome`, `cpf`, `rg`, `quadra`, `rua`, `casa`, `bairro`, `data_cadastro`, `cidade`, `telefone1`, `telefone2`, `email`) VALUES
(1, 'Wanderlei Dias Costa3', '332.333.099-00 3', 127, 127, '23 3', 123, 'Jardim Oriente3', '2014-03-02 00:00:00', 'Valparaiso de Goiás3', '(21) 333434343', '(21) 333434343', 'wanderlei@gmai.com3'),
(10, 'Ana Carolina', '12345678900', 6767, 12, '14', 78, 'Céu Azul', '2014-03-02 21:36:17', 'Valparaiso de Goiás3', '6136291344', '62 4567899', 'anacarolina@yahoo.com.br'),
(11, 'Welton Moreira dos Santos', '998.742.021-49', 6767, 12, '14', 78, 'Céu Azul', '2014-03-02 22:05:35', 'Valparaíso de Goiás', '6136291344', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conta`
--

CREATE TABLE IF NOT EXISTS `tb_conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(45) NOT NULL,
  `nr_doc` varchar(45) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `nr_mensalidade` tinyint(4) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensalidade`
--

CREATE TABLE IF NOT EXISTS `tb_mensalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vencimento` datetime NOT NULL,
  `valor` float NOT NULL,
  `nr_parcela` tinyint(4) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `quitada` tinyint(1) NOT NULL,
  `data_quitacao` datetime DEFAULT NULL,
  `valor_pago` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idconta` (`id_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `data_solicitacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idcliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'welton', '123456', 1, NULL),
(2, 'andre', '123456', 1, NULL),
(3, 'sergio', '123', 1, NULL),
(4, 'ana''darc', '123456', 1, NULL);

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
  ADD CONSTRAINT `fk_idconta` FOREIGN KEY (`id_conta`) REFERENCES `tb_conta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
