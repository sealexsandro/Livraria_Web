-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2019 às 19:44
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome_imagem` varchar(70) DEFAULT NULL,
  `fk_id_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome_imagem`, `fk_id_livro`) VALUES
(16, 'pedraFilosoal_3.jpeg', 28),
(17, 'pedraFilosofal_1.jpeg', 28),
(18, 'pedraFilosofal_2.jpeg', 28),
(19, 'caliceDeFogo.jpg', 29),
(20, 'caliceDeFogo_2.jpg', 29),
(21, 'camaraSecreta_2.jpg', 30),
(22, 'prisioneiro.jpg', 31),
(23, 'Jellyfish.jpg', 32),
(24, 'Penguins.jpg', 32),
(25, 'Hydrangeas.jpg', 33),
(26, 'Lighthouse.jpg', 33),
(27, 'Chrysanthemum.jpg', 34),
(28, 'Tulips.jpg', 34),
(29, 'Desert.jpg', 35),
(30, 'Koala - Cópia.jpg', 36),
(31, 'Lighthouse.jpg', 37),
(32, 'Hydrangeas.jpg', 38),
(33, 'Tulips.jpg', 39),
(34, 'Penguins.jpg', 40),
(35, 'Lighthouse.jpg', 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `editora` varchar(100) DEFAULT NULL,
  `numero_edicao` int(11) DEFAULT NULL,
  `ano_publicacao` varchar(20) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `numero_exemplares` int(11) DEFAULT NULL,
  `autor` varchar(150) DEFAULT NULL,
  `genero` varchar(150) DEFAULT NULL,
  `resenha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `editora`, `numero_edicao`, `ano_publicacao`, `titulo`, `numero_exemplares`, `autor`, `genero`, `resenha`) VALUES
(28, 'Rocco', 4, '1997-07-26', 'Harry Potter e a Pedra Filosofal', 2452, 'J. K Rowling', 'Romance, Literatura fantástica', 'Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursley. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos.'),
(29, 'Rocco', 4, '2001-01-01', 'Harry Potter e o Cálice de Fogo', 50000, 'J. K. Rowling', 'Romance, Literatura fantástica', 'Neste 4° volume das aventuras de Harry Potter, nosso herói, cansado das férias de verão, não vê a hora de começar o ano letivo. Já é o quarto ano na Escola de Feitiçaria e Bruxaria Hogwarts. Claro, há muitos novos feitiços, poções para serem experimentada'),
(30, 'Rocco', 5, '2001-01-01', 'Harry Potter e A Câmara Secreta', 50000, 'J. K. Rowling, Rowli Ng J.K.', 'Aventura', 'Depois de férias aborrecidas na casa dos tios trouxas, está na hora de Harry Potter voltar a estudar. Coisas acontecem, no entanto, para dificultar o regresso de Harry. Persistente e astuto, o herói não se deixa intimidar pelos obstáculos e, com a ajuda d'),
(31, 'Rocco', 3, '2001-01-01', 'Harry Potter e o Prisioneiro de Azkaban', 50000, 'J. K. Rowling', 'Romance, Aventura', 'Durante 12 anos o forte de Azkaban guardou o prisioneiro Sirius Black, acusado de matar 13 pessoas e ser o principal ajudante de Voldemort, o Senhor das Trevas. Agora ele conseguiu escapar, deixando apenas uma pista: seu destino é a escola de Hogwarts.'),
(32, '2452', 3452, '52345-04-23', 'Livro Fantasia Livro Fantasia', 2345, '2452', '2345', '23452'),
(33, '32452', 23452, '0235-05-23', 'Livro Fantasia Livro Fantasia', 32452, '32523', '32452', '324523'),
(34, '324523', 23452, '5235-04-23', 'Livro Fantasia', 23452, '234523', '2452', '234523'),
(35, '23452', 23542, '5235-04-23', 'Livro Fantasia', 2345, '323', '23452', '245234'),
(36, '3423', 23452, '0235-04-23', 'Livro Fantasia', 324523, '235423', '23452', '234523523'),
(37, '234523', 234523, '0235-05-23', 'Livro Fantasia', 234523, '26523', '23452', '235235'),
(38, 'rww', 35623, '2352-05-23', 'Livro Fantasia', 23523, '34652', '23523', '234523'),
(39, '234524', 23452, '52352-04-23', 'Livro Fantasia', 23452, '23542', '23452', '24523'),
(40, '23452', 23452, '2522-05-24', '23523', 23452, '23452', '23452', '234522'),
(41, '2452', 23452, '0234-05-23', 'Livro Fantasia', 2452, '234523', '23542', '23422');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(1, 'a', '123'),
(2, 'b', '123'),
(3, 'c', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_livro` (`fk_id_livro`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`fk_id_livro`) REFERENCES `livros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
