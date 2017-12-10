-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2009 at 10:46 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aula`
--

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `ID` int(11) NOT NULL auto_increment,
  `PRODUTO` varchar(30) NOT NULL,
  `DESCRICAO` varchar(30) NOT NULL,
  `EXIBIR` char(1) NOT NULL default '1',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`ID`, `PRODUTO`, `DESCRICAO`, `EXIBIR`) VALUES
(1, 'Bola', 'Objeto esférico que visa entre', '1'),
(2, 'Chuveiro', 'Objeto que serve para limpeza', '1'),
(3, 'CD', 'Objeto que serve para ouvir mú', '1'),
(4, 'prod3', 'Produto 3', '1'),
(5, 'pp2pp2p', 'ipip', '1'),
(6, 'ggg', '', '1'),
(7, 'dasdA', 'ggsdf', '1'),
(8, 'DQWDQ', 'dqqdw', '1'),
(9, 'qDWQ', 'agfagraw', '1'),
(10, 'efrfefwe', '', '1'),
(11, 'Mais produto', '+++', '1'),
(12, 'M&Ms', '', '1');
