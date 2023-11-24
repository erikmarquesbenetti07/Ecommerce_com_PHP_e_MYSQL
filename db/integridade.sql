-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2023 às 02:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `integridade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` bigint(20) UNSIGNED NOT NULL,
  `CliNome` varchar(30) DEFAULT NULL,
  `clistatus` char(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `IDLog` bigint(20) UNSIGNED NOT NULL,
  `nometabela` varchar(100) DEFAULT NULL,
  `IDTabela` int(11) DEFAULT NULL,
  `nomecampo` varchar(100) DEFAULT NULL,
  `valorantigo` varchar(100) DEFAULT NULL,
  `valornovo` varchar(100) DEFAULT NULL,
  `acao` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` bigint(20) UNSIGNED NOT NULL,
  `Cliente_idCliente` int(11) DEFAULT NULL,
  `DataPedido` date DEFAULT NULL,
  `ValorPedido` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProdutos` bigint(20) UNSIGNED NOT NULL,
  `NomeProduto` varchar(30) DEFAULT NULL,
  `precoproduto` decimal(12,2) DEFAULT NULL,
  `saldoproduto` int(11) DEFAULT NULL,
  `url_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProdutos`, `NomeProduto`, `precoproduto`, `saldoproduto`, `url_image`) VALUES
(1, 'Mouse sem Fio', '37.00', 12, 'https://eletronicasantana.vteximg.com.br/arquivos/ids/104865-460-460/TECLADO-COM-FIO-USB-KB216-DELL_1.jpg?v=638252060849800000'),
(2, 'Mouse com Fio', '28.00', 14, 'https://cdn.leroymerlin.com.br/products/teclado_mecanico_gamer_philco_pkb92_aluminum_outemu_brown_biv_1568930244_14ad_600x600.jpg'),
(3, 'Teclado', '10.00', 0, 'https://m.media-amazon.com/images/I/719L-+P9vPL._AC_SY300_SX300_.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_do_pedido`
--

CREATE TABLE `produtos_do_pedido` (
  `idCesta_Pedido` bigint(20) UNSIGNED NOT NULL,
  `Pedido_idPedido` int(11) DEFAULT NULL,
  `produtos_idprodutos` int(11) DEFAULT NULL,
  `cp_quantidade` int(11) DEFAULT NULL,
  `cp_precounitario` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` bigint(20) UNSIGNED NOT NULL,
  `emailusuario` varchar(45) NOT NULL,
  `cpfusuario` varchar(14) NOT NULL,
  `senhausuario` varchar(10) NOT NULL,
  `statususuario` char(1) NOT NULL DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`IDLog`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProdutos`);

--
-- Índices para tabela `produtos_do_pedido`
--
ALTER TABLE `produtos_do_pedido`
  ADD PRIMARY KEY (`idCesta_Pedido`);
  
--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `IDLog` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProdutos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos_do_pedido`
--
ALTER TABLE `produtos_do_pedido`
  MODIFY `idCesta_Pedido` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
