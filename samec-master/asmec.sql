-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Jun-2020 às 01:56
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `asmec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_end`
--

CREATE TABLE `tb_end` (
  `end_id` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `residencia` varchar(200) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_end`
--

INSERT INTO `tb_end` (`end_id`, `rua`, `residencia`, `complemento`, `bairro`, `usuario_id`) VALUES
(1, 'qr408', 'conjunto 17', 'casa ', 'samambaia ', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_manutencao`
--

CREATE TABLE `tb_manutencao` (
  `manutencao_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `val_manutencao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marcas`
--

CREATE TABLE `tb_marcas` (
  `marcas_id` int(11) NOT NULL,
  `modelos_id` int(11) NOT NULL,
  `marcas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_marcas`
--

INSERT INTO `tb_marcas` (`marcas_id`, `modelos_id`, `marcas`) VALUES
(1, 1, 'chevrolet'),
(2, 2, 'chevrolet'),
(3, 3, 'chevrolet'),
(4, 4, 'chevrolet'),
(5, 5, 'chevrolet'),
(6, 6, 'chevrolet'),
(7, 7, 'chevrolet'),
(8, 8, 'chevrolet'),
(9, 10, 'chevrolet'),
(10, 11, 'fiat'),
(11, 12, 'fiat'),
(12, 13, 'fiat'),
(13, 14, 'fiat'),
(14, 15, 'fiat'),
(15, 16, 'fiat'),
(16, 17, 'fiat'),
(17, 18, 'fiat'),
(18, 19, 'fiat'),
(19, 20, 'volkswagen'),
(20, 21, 'volkswagen'),
(21, 22, 'volkswagen'),
(22, 23, 'volkswagen'),
(23, 24, 'volkswagen'),
(24, 25, 'volkswagen');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modelos`
--

CREATE TABLE `tb_modelos` (
  `modelos_id` int(11) NOT NULL,
  `modelos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_modelos`
--

INSERT INTO `tb_modelos` (`modelos_id`, `modelos`) VALUES
(1, 'corsa'),
(2, 'celta'),
(3, 'onix'),
(4, 'prisma'),
(5, 'captiva'),
(6, 'classic'),
(7, 'vectra'),
(8, 'cobalt'),
(9, 'corsa'),
(10, 'agile'),
(11, 'punto'),
(12, 'siena'),
(13, 'uno'),
(14, 'palio'),
(15, 'mobi'),
(16, 'toro'),
(17, 'strada'),
(18, 'idea'),
(19, 'weekend'),
(20, 'gol'),
(21, 'fox'),
(22, 'up'),
(23, 'savero'),
(24, 'voyage'),
(25, 'fusca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `usuario_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `produto_id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`produto_id`, `codigo`, `nome`, `quantidade`, `valor`) VALUES
(38, 'bo4587', 'teste12', 10, '55.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tel`
--

CREATE TABLE `tb_tel` (
  `tel_id` int(11) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tel`
--

INSERT INTO `tb_tel` (`tel_id`, `telefone`, `usuario_id`) VALUES
(1, 61982844731, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `perfil` int(20) NOT NULL,
  `cpf` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usuario_id`, `nome`, `sobrenome`, `email`, `senha`, `perfil`, `cpf`) VALUES
(2, 'angelo', 'araujo', 'angelo123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(4, 'jackson', 'filho', 'jackson@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculos`
--

CREATE TABLE `tb_veiculos` (
  `id_veiculo` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `id_marcas` int(11) NOT NULL,
  `ano` int(10) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_end`
--
ALTER TABLE `tb_end`
  ADD PRIMARY KEY (`end_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `tb_manutencao`
--
ALTER TABLE `tb_manutencao`
  ADD PRIMARY KEY (`manutencao_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `tb_marcas`
--
ALTER TABLE `tb_marcas`
  ADD PRIMARY KEY (`marcas_id`),
  ADD KEY `id_modelos` (`modelos_id`);

--
-- Índices para tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  ADD PRIMARY KEY (`modelos_id`);

--
-- Índices para tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`produto_id`);

--
-- Índices para tabela `tb_tel`
--
ALTER TABLE `tb_tel`
  ADD PRIMARY KEY (`tel_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `id_marcas` (`id_marcas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_end`
--
ALTER TABLE `tb_end`
  MODIFY `end_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_manutencao`
--
ALTER TABLE `tb_manutencao`
  MODIFY `manutencao_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_marcas`
--
ALTER TABLE `tb_marcas`
  MODIFY `marcas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_modelos`
--
ALTER TABLE `tb_modelos`
  MODIFY `modelos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tb_tel`
--
ALTER TABLE `tb_tel`
  MODIFY `tel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_end`
--
ALTER TABLE `tb_end`
  ADD CONSTRAINT `tb_end_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`);

--
-- Limitadores para a tabela `tb_manutencao`
--
ALTER TABLE `tb_manutencao`
  ADD CONSTRAINT `tb_manutencao_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`);

--
-- Limitadores para a tabela `tb_marcas`
--
ALTER TABLE `tb_marcas`
  ADD CONSTRAINT `tb_marcas_ibfk_1` FOREIGN KEY (`modelos_id`) REFERENCES `tb_modelos` (`modelos_id`);

--
-- Limitadores para a tabela `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD CONSTRAINT `tb_perfil_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`);

--
-- Limitadores para a tabela `tb_tel`
--
ALTER TABLE `tb_tel`
  ADD CONSTRAINT `tb_tel_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`);

--
-- Limitadores para a tabela `tb_veiculos`
--
ALTER TABLE `tb_veiculos`
  ADD CONSTRAINT `tb_veiculos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`usuario_id`),
  ADD CONSTRAINT `tb_veiculos_ibfk_2` FOREIGN KEY (`id_marcas`) REFERENCES `tb_marcas` (`marcas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
