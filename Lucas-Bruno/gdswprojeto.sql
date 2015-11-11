-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2015 às 21:44
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gdswprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`ID` int(10) unsigned NOT NULL,
  `Descricao` varchar(60) NOT NULL,
  `Hora` time(1) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `LOCAL` varchar(64) NOT NULL,
  `TIPO` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`ID`, `Descricao`, `Hora`, `Data`, `LOCAL`, `TIPO`) VALUES
(11, 'Entregar sistema pra professora', '18:00:00.0', '2015-11-10', 'Github', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ext_vocal`
--

CREATE TABLE IF NOT EXISTS `ext_vocal` (
`ID` int(10) unsigned NOT NULL,
  `TIPO` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ext_vocal`
--

INSERT INTO `ext_vocal` (`ID`, `TIPO`) VALUES
(1, 'SOPRANO'),
(2, 'CONTRALTO'),
(3, 'BAIXO'),
(4, 'TENOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE IF NOT EXISTS `membros` (
`ID` int(10) unsigned NOT NULL,
  `NOME` varchar(64) NOT NULL,
  `FONE` int(9) unsigned NOT NULL,
  `ENDERECO` varchar(60) NOT NULL,
  `IDADE` int(11) DEFAULT NULL,
  `EX_VOCAL` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`ID`, `NOME`, `FONE`, `ENDERECO`, `IDADE`, `EX_VOCAL`) VALUES
(28, 'Lucas Gabriel', 988505504, 'Av. Senador Rui Palmeira', 20, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
`ID` int(10) unsigned NOT NULL,
  `TIPO` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_evento`
--

INSERT INTO `tipo_evento` (`ID`, `TIPO`) VALUES
(1, 'Ensaio'),
(2, 'Reunião'),
(3, 'Evento Local'),
(4, 'Evento Fora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
`ID` int(10) unsigned NOT NULL,
  `TIPO` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID`, `TIPO`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`ID` int(10) unsigned NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `senha` varchar(9) NOT NULL,
  `TIPO` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `senha`, `TIPO`) VALUES
(1, 'admin', 'admin', 1),
(43, 'junior', '12345', 1),
(44, 'Lucas', '123', 1),
(45, 'teste', 'teste', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`ID`), ADD KEY `TIPO` (`TIPO`);

--
-- Indexes for table `ext_vocal`
--
ALTER TABLE `ext_vocal`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `membros`
--
ALTER TABLE `membros`
 ADD PRIMARY KEY (`ID`), ADD KEY `EX_VOCAL` (`EX_VOCAL`);

--
-- Indexes for table `tipo_evento`
--
ALTER TABLE `tipo_evento`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `LOGIN` (`usuario`), ADD KEY `TIPO` (`TIPO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ext_vocal`
--
ALTER TABLE `ext_vocal`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tipo_evento`
--
ALTER TABLE `tipo_evento`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`TIPO`) REFERENCES `tipo_evento` (`ID`);

--
-- Limitadores para a tabela `membros`
--
ALTER TABLE `membros`
ADD CONSTRAINT `membros_ibfk_1` FOREIGN KEY (`EX_VOCAL`) REFERENCES `ext_vocal` (`ID`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`TIPO`) REFERENCES `tipo_usuario` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
