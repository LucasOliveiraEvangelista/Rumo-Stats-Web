-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/06/2021 às 14:18
-- Versão do servidor: 5.6.50
-- Versão do PHP: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rumostats`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id_jogador` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(2) NOT NULL,
  `posicao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `selecao` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pe` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogador`, `nome`, `numero`, `posicao`, `selecao`, `pe`, `id_user`) VALUES
(1, 'Richarlison', 7, 'Centroavante', '3', 'Direita', 1),
(2, 'Arana', 13, 'Lateral - Esquerdo', '3', 'Esquerda', 28435331);

-- --------------------------------------------------------

--
-- Estrutura para tabela `selecao`
--

CREATE TABLE `selecao` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `continente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `selecao`
--

INSERT INTO `selecao` (`id`, `nome`, `continente`) VALUES
(2, 'Portugal', 2),
(3, 'Brasil', 1),
(4, 'Alemanha', 2),
(5, 'Holanda', 2),
(6, 'Egito', 3),
(7, 'Austrália', 5),
(8, 'China', 4),
(9, 'Japão', 4),
(10, 'Argentina', 1),
(11, 'Uruguai', 1),
(12, 'Paraguai', 1),
(13, 'França', 2),
(14, 'Nigéria', 3),
(15, 'África do sul', 3),
(16, 'Canada', 1),
(17, 'Inglaterra', 2),
(18, 'Arábia Saudita', 4),
(19, 'Siría', 4),
(20, 'Zimbabwe', 3),
(21, 'Angola', 3),
(22, 'Senegal', 3),
(23, 'Hungria', 2),
(24, 'Itália', 2),
(25, 'Espanha', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `temporada`
--

CREATE TABLE `temporada` (
  `id` int(11) NOT NULL,
  `temporada` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jogos` int(4) NOT NULL,
  `gols` int(4) NOT NULL,
  `assitencias` int(4) NOT NULL,
  `liga` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `copa` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `supercopa` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `champions` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `europa` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `libertadores` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `goldenball` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `id_jogador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Lucas', 'lucas@lu.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(28435331, 'pablo', 'pablo@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(671916087, 'Neto', 'neto@neto.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id_jogador`);

--
-- Índices de tabela `selecao`
--
ALTER TABLE `selecao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id_jogador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `selecao`
--
ALTER TABLE `selecao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
