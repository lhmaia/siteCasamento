--
-- Banco de Dados: `sitecasamento`
--
CREATE DATABASE `sitecasamento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sitecasamento`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'noivos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros_grupos`
--

CREATE TABLE IF NOT EXISTS `membros_grupos` (
  `id_grupo` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`,`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros_grupos`
--

INSERT INTO `membros_grupos` (`id_grupo`, `id_pessoa`) VALUES
(1, 1),
(1, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `quemconvidou` int(11) DEFAULT NULL,
  `aprovado` char(1) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `lembrete_senha` varchar(255)  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `logradouro`, `bairro`, `cidade`, `estado`, `telefone`, `quemconvidou`, `aprovado`, `foto`) VALUES
(1, 'luiz henrique', 'lhmaia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rua Itapetininga, 445', 'Cardoso', 'Belo Horizonte', 'MG', '3383 8149', NULL, 's', ''),
(7, 'Fernanda Cristiele Laiso', 'felaiso@yahoo.com.br', 'c33367701511b4f6020ec61ded352059', 'Rua Apompo neves da silva, 266', 'Teixeira Dias', 'Belo Horizonte', 'MG', '31 25513028', NULL, 's', '9ff681643e9a8d8f0d6affc92600ffbd.jpg'),
(8, 'Marquinhos Parana', 'paranazinho@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Rua Itapetininga, 445', 'cardoso', 'Belo Horizonte', 'MG', NULL, NULL, 's', '107d9b75d6b2696cce9413ebe3bc39b3.jpg');

--
-- Criando tabela postagens
--

CREATE TABLE postagens (
	id int(11) NOT NULL AUTO_INCREMENT,
	id_pessoa int(11) NOT NULL,
	texto varchar (255),
	foto varchar (255),
	video varchar (255),
	visibilidade int,
	horario datetime,
	
	PRIMARY KEY (id),
	CONSTRAINT postagem_pessoa FOREIGN KEY (id_pessoa) references Pessoa(id)
);


DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
