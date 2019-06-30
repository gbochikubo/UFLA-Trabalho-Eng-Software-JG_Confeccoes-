-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2019 às 06:01
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jg_confeccoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Email` varchar(45) NOT NULL,
  `Cpf` varchar(45) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Endereco` varchar(80) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Telefone` varchar(45) NOT NULL,
  `Funcionario` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`Email`, `Cpf`, `Sexo`, `Senha`, `Endereco`, `Nome`, `Telefone`, `Funcionario`) VALUES
('Admin@gmail.com', '1111111111', 'M', '302010', 'Admin', 'Admin', '1111111', 1),
('antonio@hotmail.com', '111223123', 'M', '12345', 'ufla', 'AAAAA', '888888', 0),
('guilhermebarbosa@hotmail.com', '123456789', 'M', '12345', 'Rua Anibal Teodoro', 'Guilherme', '99999999', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `idItem` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Tamanho` enum('P','M','G') NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `Preço` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Imagem` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`idItem`, `Nome`, `Tamanho`, `Categoria`, `Preço`, `Quantidade`, `Imagem`) VALUES
(2, 'Moletom Addidas', 'P', 'Moletons', 150, 10, NULL),
(3, 'Jaqueta de Couro', 'G', 'Jaquetas', 400, 30, NULL),
(4, 'Calca jeans', 'M', 'Calcas', 100, 80, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_has_pedido`
--

CREATE TABLE `item_has_pedido` (
  `Item_idItem` int(11) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Valor` float NOT NULL,
  `EnderecoEntrega` varchar(80) NOT NULL,
  `TipoEntrega_Tipo` int(11) NOT NULL,
  `Cliente_Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoentrega`
--

CREATE TABLE `tipoentrega` (
  `Tipo` int(11) NOT NULL,
  `Tempo` int(11) NOT NULL,
  `ValorFrete` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoentrega`
--

INSERT INTO `tipoentrega` (`Tipo`, `Tempo`, `ValorFrete`) VALUES
(1, 3, 55),
(2, 7, 30),
(3, 15, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItem`);

--
-- Indexes for table `item_has_pedido`
--
ALTER TABLE `item_has_pedido`
  ADD PRIMARY KEY (`Item_idItem`,`Pedido_idPedido`),
  ADD KEY `fk_Item_has_Pedido_Pedido1_idx` (`Pedido_idPedido`),
  ADD KEY `fk_Item_has_Pedido_Item_idx` (`Item_idItem`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_Pedido_TipoEntrega1_idx` (`TipoEntrega_Tipo`),
  ADD KEY `fk_Pedido_Cliente1_idx` (`Cliente_Email`);

--
-- Indexes for table `tipoentrega`
--
ALTER TABLE `tipoentrega`
  ADD PRIMARY KEY (`Tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `item_has_pedido`
--
ALTER TABLE `item_has_pedido`
  ADD CONSTRAINT `fk_Item_has_Pedido_Item` FOREIGN KEY (`Item_idItem`) REFERENCES `item` (`idItem`),
  ADD CONSTRAINT `fk_Item_has_Pedido_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_Email`) REFERENCES `cliente` (`Email`),
  ADD CONSTRAINT `fk_Pedido_TipoEntrega1` FOREIGN KEY (`TipoEntrega_Tipo`) REFERENCES `tipoentrega` (`Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
