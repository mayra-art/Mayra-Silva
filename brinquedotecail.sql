-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2019 às 18:44
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brinquedotecail`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `IdAgenda` int(11) NOT NULL,
  `IdFunc` int(11) NOT NULL,
  `NomeEvento` varchar(30) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `CorReserva` varchar(10) DEFAULT NULL,
  `IdprodutoUsado` int(11) DEFAULT NULL,
  `IdVisit` int(11) NOT NULL,
  `IdTurma` int(11) NOT NULL,
  `IdDisciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`IdAgenda`, `IdFunc`, `NomeEvento`, `start`, `end`, `CorReserva`, `IdprodutoUsado`, `IdVisit`, `IdTurma`, `IdDisciplina`) VALUES
(1, 0, 'Fisioterapia', '2019-03-03 17:00:00', '2019-03-03 17:50:00', 'Azul', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_itens`
--

CREATE TABLE `agenda_itens` (
  `IdAgenda_itens` int(11) NOT NULL,
  `IdProdutoUsado` int(11) NOT NULL,
  `IdAgenda` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Qntd` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `IdDisciplina` int(11) NOT NULL,
  `DescricaoDisciplina` varchar(100) CHARACTER SET utf8 NOT NULL,
  `IdTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`IdDisciplina`, `DescricaoDisciplina`, `IdTurma`) VALUES
(1, 'Didática II', 1),
(2, 'Língua Portuguesa', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `IdFunc` int(10) NOT NULL,
  `Login` varchar(10) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `RA` int(13) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Turma` varchar(60) DEFAULT NULL,
  `Cargo` enum('1','2','3') NOT NULL,
  `RACoordenadorResponsavel` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`IdFunc`, `Login`, `Senha`, `RA`, `Nome`, `Turma`, `Cargo`, `RACoordenadorResponsavel`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 99999999, 'Administrador', '00', '3', 999999999),
(7, 'monitor', '9796809f7dae482d3123c16585f2b60f97407796', 999999, 'Monitor', '4A', '1', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario`
--

CREATE TABLE `inventario` (
  `IdProduto` int(11) NOT NULL,
  `Descricao` varchar(40) NOT NULL,
  `Qntd` decimal(5,2) NOT NULL,
  `Medida` varchar(4) NOT NULL,
  `QntdMinima` decimal(5,2) DEFAULT NULL,
  `Categoria` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inventario`
--

INSERT INTO `inventario` (`IdProduto`, `Descricao`, `Qntd`, `Medida`, `QntdMinima`, `Categoria`) VALUES
(1, 'Giz ', '10.00', 'UN', '5.00', 'PortuguÃªs'),
(2, 'Pandeiro', '2.00', 'UN', '1.00', 'Brinquedo'),
(3, 'Apagador', '5.00', 'UN', '1.00', 'Material'),
(9, 'Canetinha', '10.00', 'UN', '5.00', 'ConsumÃ­ve'),
(10, 'Teste', '40.00', 'UN', '20.00', 'PortuguÃªs'),
(12, 'Teste ', '11.00', 'UN', '11.00', 'PortuguÃªs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `IdTurma` int(11) NOT NULL,
  `DescricaoTurma` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`IdTurma`, `DescricaoTurma`) VALUES
(1, '2A'),
(2, '1A'),
(3, '3A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `IdVisit` int(11) NOT NULL,
  `CPFVisitante` int(12) NOT NULL,
  `RACoordenadorUMC` int(12) DEFAULT NULL,
  `NomeVisitante` varchar(60) NOT NULL,
  `EnderecoVisitante` varchar(100) DEFAULT NULL,
  `InstituicaoVisitante` varchar(60) DEFAULT NULL,
  `TelefoneVisitante` int(11) NOT NULL,
  `QntAlunosVisita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`IdVisit`, `CPFVisitante`, `RACoordenadorUMC`, `NomeVisitante`, `EnderecoVisitante`, `InstituicaoVisitante`, `TelefoneVisitante`, `QntAlunosVisita`) VALUES
(1, 391913398, NULL, 'Daniela', 'R. Heitor Passos Leite, 290 , Jardim Paulista', 'EMEF Pitangueiras ', 99888888, 10),
(5, 2147483647, NULL, 'Lucas', 'R. Durval Fernandes Chaves, 282 - Jardim Snt Elias', 'Escola Formiguinha Pascoal', 39013650, 50),
(6, 2147483647, NULL, 'Vitor', 'R. Domingo Sergio dos Anjos, 555 - Pirituba', 'EE Antonio F Redondo', 988911809, 20),
(7, 2147483647, NULL, '', 'R. Domingo Sergio dos Anjos, 555 - Pirituba', 'EE Antonio F Redondo', 39013650, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IdAgenda`);

--
-- Índices para tabela `agenda_itens`
--
ALTER TABLE `agenda_itens`
  ADD PRIMARY KEY (`IdAgenda_itens`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`IdDisciplina`),
  ADD KEY `IdTurma` (`IdTurma`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`IdFunc`);

--
-- Índices para tabela `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`IdProduto`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`IdTurma`);

--
-- Índices para tabela `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`IdVisit`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IdAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `agenda_itens`
--
ALTER TABLE `agenda_itens`
  MODIFY `IdAgenda_itens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `IdDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `IdFunc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `inventario`
--
ALTER TABLE `inventario`
  MODIFY `IdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `IdTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `visitante`
--
ALTER TABLE `visitante`
  MODIFY `IdVisit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `IdprodutoUsado` FOREIGN KEY (`IdprodutoUsado`) REFERENCES `inventario` (`IdProduto`);

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `IdTurma` FOREIGN KEY (`IdTurma`) REFERENCES `turma` (`IdTurma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
