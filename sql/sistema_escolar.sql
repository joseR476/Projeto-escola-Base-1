-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Abr-2023 às 01:52
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ra` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `nome_responsavel` varchar(100) DEFAULT NULL,
  `email_responsavel` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `imagem`, `nome`, `ra`, `email`, `nome_responsavel`, `email_responsavel`, `telefone`, `rua`, `numero`, `bairro`, `complemento`, `estado`, `cidade`, `cep`) VALUES
(1, '1-b5c45af202086e1f798507cf0024faac.jpeg', 'Michel Fernandes Ramos', '16465465', 'michelframos@hotmail.com', NULL, NULL, '6546545646', 'Nome de Rua', '258', 'Bairro', '', 'SP', 'Presidente Prudente', '8373730'),
(3, '3-b532858df1e853c71efdcf757728de31.jpeg', 'Aluno 2', '676686876', 'michelframos@hotmail.com', 'Michel', 'michelfernandesramos@gmail.com', '', '', '', '', '', '', '', ''),
(5, NULL, 'Aluno 3', '78954', '', NULL, NULL, '', '', '', '', '', '', '', ''),
(6, NULL, 'Aluno 4', '624856', '', NULL, NULL, '', '', '', '', '', '', '', ''),
(7, NULL, 'Aluno 5', '46546', '', NULL, NULL, '', '', '', '', '', '', '', ''),
(8, NULL, 'Aluno 6', '46156', '', NULL, NULL, '', '', '', '', '', '', '', ''),
(9, NULL, 'Aluno 7', '46456', '', NULL, NULL, '', '', '', '', '', '', '', ''),
(10, NULL, 'Aluno 8', '4646893', '', NULL, NULL, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_turmas`
--

CREATE TABLE `alunos_turmas` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos_turmas`
--

INSERT INTO `alunos_turmas` (`id`, `id_turma`, `id_aluno`, `ordem`) VALUES
(14, 14, 3, 1),
(15, 14, 5, 2),
(16, 14, 6, 3),
(17, 2, 7, NULL),
(18, 2, 8, NULL),
(19, 2, 9, NULL),
(20, 3, 10, NULL),
(21, 3, 1, NULL),
(22, 14, 1, 5),
(23, 14, 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `estado_id` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00,
  `uf` varchar(4) NOT NULL DEFAULT '',
  `nome` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diario_classe`
--

CREATE TABLE `diario_classe` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `data` date NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diario_classe`
--

INSERT INTO `diario_classe` (`id`, `id_turma`, `id_materia`, `data`, `observacoes`) VALUES
(5, 14, 9, '2023-03-31', NULL),
(6, 14, 9, '2023-04-01', NULL),
(7, 14, 1, '2023-04-02', NULL),
(8, 14, 5, '2023-04-02', NULL),
(9, 14, 6, '2023-04-04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `estado_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `uf` varchar(10) NOT NULL DEFAULT '',
  `nome` varchar(20) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`estado_id`, `uf`, `nome`) VALUES
(01, 'AC', 'Acre'),
(02, 'AL', 'Alagoas'),
(03, 'AM', 'Amazonas'),
(04, 'AP', 'Amapá'),
(05, 'BA', 'Bahia'),
(06, 'CE', 'Ceará'),
(07, 'DF', 'Distrito Federal'),
(08, 'ES', 'Espírito Santo'),
(09, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MG', 'Minas Gerais'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MT', 'Mato Grosso'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piauí'),
(18, 'PR', 'Paraná'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RO', 'Rondônia'),
(22, 'RR', 'Roraima'),
(23, 'RS', 'Rio Grande do Sul'),
(24, 'SC', 'Santa Catarina'),
(25, 'SE', 'Sergipe'),
(26, 'SP', 'São Paulo'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id`, `nome`, `observacoes`) VALUES
(1, 'Português', 'grg gregregrgrege greger'),
(5, 'Matemática', ''),
(6, 'História', ''),
(7, 'Geografia', ''),
(8, 'Educação Física', ''),
(9, 'Educação Artística', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores_turmas`
--

CREATE TABLE `professores_turmas` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros_diaro_classe`
--

CREATE TABLE `registros_diaro_classe` (
  `id` int(11) NOT NULL,
  `id_diario` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `presente_chamada1` char(1) DEFAULT NULL,
  `presente_chamada2` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registros_diaro_classe`
--

INSERT INTO `registros_diaro_classe` (`id`, `id_diario`, `id_turma`, `id_aluno`, `presente_chamada1`, `presente_chamada2`) VALUES
(5, 6, 14, 3, 'n', 'n'),
(6, 6, 14, 5, 's', 's'),
(7, 6, 14, 6, 's', 's'),
(8, 5, 14, 3, 's', 's'),
(9, 5, 14, 5, 's', 's'),
(10, 5, 14, 6, 's', 's'),
(11, 7, 14, 3, 's', 'n'),
(12, 7, 14, 5, 's', 's'),
(13, 7, 14, 6, 's', 's'),
(14, 8, 14, 3, 's', 's'),
(15, 8, 14, 5, 's', 's'),
(16, 8, 14, 6, 's', 's'),
(17, 9, 14, 3, 's', 'n'),
(18, 9, 14, 5, 's', 's'),
(19, 9, 14, 6, 's', 's'),
(20, 9, 14, 1, 's', 'n'),
(21, 9, 14, 10, 's', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `nome`) VALUES
(1, '2º Ano'),
(2, '1º Ano'),
(4, '3º Ano'),
(17, '4º Ano'),
(18, '5º Ano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `id_serie` int(11) DEFAULT NULL,
  `turma` char(1) DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `id_serie`, `turma`, `turno`) VALUES
(2, 2, 'B', 'manha'),
(3, 2, 'C', 'tarde'),
(14, 17, 'A', 'manha'),
(15, 18, 'D', 'tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas_materias`
--

CREATE TABLE `turmas_materias` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas_materias`
--

INSERT INTO `turmas_materias` (`id`, `id_turma`, `id_materia`, `id_professor`, `observacoes`) VALUES
(13, 14, 9, 4, ''),
(14, 3, 7, 4, ''),
(15, 14, 1, 6, ''),
(16, 14, 5, 6, ''),
(17, 14, 6, 6, ''),
(18, 14, 8, 7, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `rua` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `complemento` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` char(2) COLLATE latin1_general_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cep` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `login` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `status` char(1) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `imagem`, `tipo`, `nome`, `email`, `telefone`, `rua`, `numero`, `complemento`, `bairro`, `estado`, `cidade`, `cep`, `login`, `senha`, `status`) VALUES
(3, NULL, 'admin', 'Administrador', 'admin@email.com', '', '', '', '', '', '', '', '', 'admin', '202cb962ac59075b964b07152d234b70', 'a'),
(4, NULL, 'professor', 'Professor 1', '', '', '', '', '', '', '', '', '', 'teste', '$2a$08$MTMzODM2ODU0NjQyNjQ0Z.Rve.PZAmgNxrrMXxpvsG01kxiCpX/1u', 'a'),
(5, '5-450d0eb46c69cbfd891fdf912da6ebf2.jpg', 'admin', 'Michel Ramos', 'michelframos@hotmail.com', '48646546', 'fgrhtry', '', '', '', 'SP', 'Presidente Prudente', '19010280', 'michel', '$2a$08$Mzc2MDM5NDY0MzQ1N2JmYOGCDVJNt2WF1sENJNP7bemlW0fvqzz.y', 'a'),
(6, NULL, 'professor', 'Professor 2', '', '', '', '', '', '', '', '', '', 'professor2', '$2a$08$MTQ1NjEwNDEwMDY0Mjk3OOBnB2Qde7F.OnayMsjscFN9WMNhk5Zom', 'a'),
(7, NULL, 'professor', 'Professor 3', '', '', '', '', '', '', '', '', '', 'professor3', '$2a$08$MTk2MTE5NzUyMjY0MjEwN.LKVNZYRf8HRuK8PZiDLQvjuv0110doi', 'a');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_alunos_turmas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `v_alunos_turmas` (
`id` int(11)
,`ordem` int(11)
,`id_turma` int(11)
,`id_aluno` int(11)
,`nome_aluno` varchar(100)
,`ra` varchar(50)
,`email` varchar(150)
,`telefone` varchar(15)
,`nome_turma` char(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_registros_diario`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `v_registros_diario` (
`id` int(11)
,`id_diario` int(11)
,`id_turma` int(11)
,`id_aluno` int(11)
,`presente_chamada1` char(1)
,`presente_chamada2` char(1)
,`id_materia` int(11)
,`data` date
,`ordem` int(11)
,`nome` varchar(100)
,`ra` varchar(50)
,`telefone` varchar(15)
,`email` varchar(150)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_turmas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `v_turmas` (
`id` int(11)
,`id_serie` int(11)
,`turma` char(1)
,`turno` varchar(10)
,`nome_serie` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_turmas_materias`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `v_turmas_materias` (
`id` int(11)
,`id_turma` int(11)
,`id_materia` int(11)
,`id_professor` int(11)
,`observacoes` text
,`nome_turma` char(1)
,`id_serie` int(11)
,`nome_serie` varchar(20)
,`nome_materia` varchar(100)
,`nome_professor` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `v_alunos_turmas`
--
DROP TABLE IF EXISTS `v_alunos_turmas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_alunos_turmas`  AS SELECT `alunos_turmas`.`id` AS `id`, `alunos_turmas`.`ordem` AS `ordem`, `alunos_turmas`.`id_turma` AS `id_turma`, `alunos_turmas`.`id_aluno` AS `id_aluno`, `alunos`.`nome` AS `nome_aluno`, `alunos`.`ra` AS `ra`, `alunos`.`email` AS `email`, `alunos`.`telefone` AS `telefone`, `turmas`.`turma` AS `nome_turma` FROM ((`alunos_turmas` join `alunos` on(`alunos_turmas`.`id_aluno` = `alunos`.`id`)) join `turmas` on(`alunos_turmas`.`id_turma` = `turmas`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_registros_diario`
--
DROP TABLE IF EXISTS `v_registros_diario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_registros_diario`  AS SELECT `registros_diaro_classe`.`id` AS `id`, `registros_diaro_classe`.`id_diario` AS `id_diario`, `registros_diaro_classe`.`id_turma` AS `id_turma`, `registros_diaro_classe`.`id_aluno` AS `id_aluno`, `registros_diaro_classe`.`presente_chamada1` AS `presente_chamada1`, `registros_diaro_classe`.`presente_chamada2` AS `presente_chamada2`, `diario_classe`.`id_materia` AS `id_materia`, `diario_classe`.`data` AS `data`, `alunos_turmas`.`ordem` AS `ordem`, `alunos`.`nome` AS `nome`, `alunos`.`ra` AS `ra`, `alunos`.`telefone` AS `telefone`, `alunos`.`email` AS `email` FROM (((`registros_diaro_classe` join `diario_classe` on(`registros_diaro_classe`.`id_diario` = `diario_classe`.`id`)) join `alunos` on(`registros_diaro_classe`.`id_aluno` = `alunos`.`id`)) join `alunos_turmas` on(`registros_diaro_classe`.`id_aluno` = `alunos_turmas`.`id_aluno` and `registros_diaro_classe`.`id_turma` = `alunos_turmas`.`id_turma`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_turmas`
--
DROP TABLE IF EXISTS `v_turmas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_turmas`  AS SELECT `turmas`.`id` AS `id`, `turmas`.`id_serie` AS `id_serie`, `turmas`.`turma` AS `turma`, `turmas`.`turno` AS `turno`, `series`.`nome` AS `nome_serie` FROM (`turmas` join `series` on(`turmas`.`id_serie` = `series`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_turmas_materias`
--
DROP TABLE IF EXISTS `v_turmas_materias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_turmas_materias`  AS SELECT `turmas_materias`.`id` AS `id`, `turmas_materias`.`id_turma` AS `id_turma`, `turmas_materias`.`id_materia` AS `id_materia`, `turmas_materias`.`id_professor` AS `id_professor`, `turmas_materias`.`observacoes` AS `observacoes`, `turmas`.`turma` AS `nome_turma`, `turmas`.`id_serie` AS `id_serie`, `series`.`nome` AS `nome_serie`, `materias`.`nome` AS `nome_materia`, `usuarios`.`nome` AS `nome_professor` FROM ((((`turmas_materias` join `turmas` on(`turmas_materias`.`id_turma` = `turmas`.`id`)) join `series` on(`turmas`.`id_serie` = `series`.`id`)) join `materias` on(`turmas_materias`.`id_materia` = `materias`.`id`)) join `usuarios` on(`turmas_materias`.`id_professor` = `usuarios`.`id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_2` (`id`) USING BTREE;

--
-- Índices para tabela `diario_classe`
--
ALTER TABLE `diario_classe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`estado_id`) USING BTREE;

--
-- Índices para tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores_turmas`
--
ALTER TABLE `professores_turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `registros_diaro_classe`
--
ALTER TABLE `registros_diaro_classe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas_materias`
--
ALTER TABLE `turmas_materias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diario_classe`
--
ALTER TABLE `diario_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `estado_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `professores_turmas`
--
ALTER TABLE `professores_turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `registros_diaro_classe`
--
ALTER TABLE `registros_diaro_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `turmas_materias`
--
ALTER TABLE `turmas_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
