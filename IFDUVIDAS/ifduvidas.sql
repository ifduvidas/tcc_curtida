-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17-Ago-2018 às 09:12
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifduvidas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_comenta`
--

CREATE TABLE `aluno_comenta` (
  `id_pergunta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_comentario` date DEFAULT NULL,
  `texto_comentario` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `id_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_comenta`
--

INSERT INTO `aluno_comenta` (`id_pergunta`, `id_usuario`, `data_comentario`, `texto_comentario`, `status`, `id_comentario`) VALUES
(60, 61, '2018-08-17', 'Meu amigo, tem vÃ¡rios!', NULL, 11),
(59, 61, '2018-08-17', 'Que eu sei, existem as substantivas, adjetivas e adverbias.', NULL, 12),
(61, 60, '2018-08-17', 'Ã‰ um sistema econÃ´mico e polÃ­tico', NULL, 13),
(63, 60, '2018-08-17', 'Para mim, ler bastante colunas de jornais ajuda bastante no repertÃ³rio', NULL, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_pergunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtida`
--

INSERT INTO `curtida` (`id_usuario`, `id_pergunta`) VALUES
(58, 56),
(58, 56),
(58, 55),
(58, 56),
(58, 56),
(58, 56),
(58, 56),
(58, 56),
(58, 54),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(59, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(58, 57),
(60, 58),
(61, 62),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 60),
(61, 59),
(61, 59),
(61, 59),
(60, 61),
(60, 61),
(60, 61),
(60, 63),
(60, 63),
(60, 63),
(60, 63),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 60),
(62, 61),
(62, 61),
(62, 61),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 59),
(63, 63),
(63, 63),
(63, 63),
(63, 63),
(63, 63);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `hora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `descricao_pergunta` varchar(150) DEFAULT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `materia` varchar(30) DEFAULT NULL,
  `id_pergunta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `curso` varchar(30) NOT NULL,
  `curtidas` varchar(30) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`hora`, `data`, `descricao_pergunta`, `titulo`, `materia`, `id_pergunta`, `id_usuario`, `curso`, `curtidas`, `status`) VALUES
('11:34:15', '2018-08-17', 'Quantos tipos de oraÃ§Ã£o subordinada existem?', 'OraÃ§Ãµes Subordinadas', 'portugues', 59, 60, 'agropecuaria', '14', 1),
('11:36:09', '2018-08-17', 'Quais sÃ£o os tipos de solo aqui no estado de SC?', 'Solos', 'geografia', 60, 60, 'agropecuaria', '20', 1),
('11:38:14', '2018-08-17', 'Se discute muito sobre esse tema, mas nunca me aprofundei. O que seria exatamente?', 'Comunismo', 'geografia', 61, 61, 'informatica', '6', 1),
('11:41:20', '2018-08-17', 'Poderiam me informar sobre algumas dicas para se fazer uma boa redaÃ§Ã£o?', 'RedaÃ§Ã£o', 'portugues', 63, 61, 'informatica', '9', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_resposta`
--

CREATE TABLE `prof_resposta` (
  `id_pergunta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_resposta` date DEFAULT NULL,
  `texto_resposta` varchar(150) DEFAULT NULL,
  `id_resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prof_resposta`
--

INSERT INTO `prof_resposta` (`id_pergunta`, `id_usuario`, `data_resposta`, `texto_resposta`, `id_resposta`) VALUES
(60, 62, '2018-08-17', 'Cambissolo Bruno HÃºmico, Cambissolo Bruno, Cambissolo e Cambissolo HÃºmico correspondem a mais da metade do solo de SC', 18),
(61, 62, '2018-08-17', 'Cara estudante, Ã© uma organizaÃ§Ã£o socioeconÃ´mica baseada na propriedade coletiva dos meios de produÃ§Ã£o', 19),
(59, 63, '2018-08-17', 'OraÃ§Ã£o subordinada substantiva subjetiva; OraÃ§Ã£o subordinada substantiva objetiva direta; OraÃ§Ã£o subordinada substantiva objetiva indireta;', 20),
(59, 63, '2018-08-17', 'OraÃ§Ã£o subordinada substantiva completiva nominal; OraÃ§Ã£o subordinada substantiva predicativa; OraÃ§Ã£o subordinada substantiva apositiva.', 21),
(59, 63, '2018-08-17', 'OraÃ§Ã£o subordinada adjetiva explicativa; OraÃ§Ã£o subordinada adjetiva restritiva.', 22),
(63, 63, '2018-08-17', ' Estruture seu texto adequadamente, Anote as ideias principais que servirÃ£o como argumentos', 23),
(63, 63, '2018-08-17', 'Organize cada parÃ¡grafo do texto e Entenda as etapas de uma boa redaÃ§Ã£o', 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tip_user`
--

CREATE TABLE `tip_user` (
  `cod_tip` int(11) NOT NULL,
  `desc_tip_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tip_user`
--

INSERT INTO `tip_user` (`cod_tip`, `desc_tip_user`) VALUES
(3, 'admin'),
(4, 'professor'),
(5, 'aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Nome` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `atributo` varchar(30) DEFAULT NULL,
  `foto_perf` varchar(160) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `cod_tip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Nome`, `senha`, `email`, `data_nasc`, `atributo`, `foto_perf`, `id_usuario`, `cod_tip`) VALUES
('marcao', 'marcao', 'marcao@gmail.com', '2000-05-08', '1AGRO1', 'fotos/christian.jpg', 60, 5),
('antonia', 'antonia', 'antonia@gmail.com', '2002-12-10', '3INFO2', 'fotos/kristy.png', 61, 5),
('geraldo', 'geraldo', 'geraldo@gmail.com', '1970-11-10', 'Geografia', 'fotos/joe.jpg', 62, 4),
('rose', 'rose', 'rose@gmail.com', '1985-02-15', 'PortuguÃªs', 'fotos/ade.jpg', 63, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno_comenta`
--
ALTER TABLE `aluno_comenta`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_pergunta` (`id_pergunta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `id_usuario` (`id_usuario`);
ALTER TABLE `perguntas` ADD FULLTEXT KEY `titulo` (`titulo`,`descricao_pergunta`);

--
-- Indexes for table `prof_resposta`
--
ALTER TABLE `prof_resposta`
  ADD PRIMARY KEY (`id_resposta`),
  ADD KEY `id_pergunta` (`id_pergunta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `tip_user`
--
ALTER TABLE `tip_user`
  ADD PRIMARY KEY (`cod_tip`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `cod_tip` (`cod_tip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno_comenta`
--
ALTER TABLE `aluno_comenta`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `prof_resposta`
--
ALTER TABLE `prof_resposta`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_comenta`
--
ALTER TABLE `aluno_comenta`
  ADD CONSTRAINT `aluno_comenta_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id_pergunta`),
  ADD CONSTRAINT `aluno_comenta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `prof_resposta`
--
ALTER TABLE `prof_resposta`
  ADD CONSTRAINT `prof_resposta_ibfk_1` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id_pergunta`),
  ADD CONSTRAINT `prof_resposta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_tip`) REFERENCES `tip_user` (`cod_tip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
