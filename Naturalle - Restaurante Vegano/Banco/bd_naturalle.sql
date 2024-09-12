-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/08/2024 às 04:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_naturalle`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastroong`
--

CREATE TABLE `cadastroong` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `tipo_ong` varchar(255) DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(51, 34, 32, 'Ratatouille', 35, 1, '9.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `ong` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `ong`) VALUES
(12, 35, 'ANA ', '777', 'marianaarashiro09@gmail.com', 'credit card', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Empada de batata doce com lentilha ( 3 )', 24, '18-Oct-2023', 'completo', 'Mundo Sem Fome'),
(13, 35, 'MARIANA', '55555', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Empada de batata doce com lentilha ( 1 ), Torta de massa filo e butternut ( 1 )', 33, '18-Oct-2023', '', 'Mundo Sem Fome'),
(14, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '33', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Empada de batata doce com lentilha ( 1 ), Pão recheado com pesto e queijo  ( 1 ), Torta de massa filo e butternut ( 1 ), Coxinhas de Jaca ( 1 )', 63, '30-Oct-2023', '', 'Mundo Sem Fome'),
(15, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '95', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Empada de batata doce com lentilha ( 1 ), Coxinhas de Jaca ( 1 )', 28, '31-Oct-2023', '', 'Mundo Sem Fome'),
(16, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '95', 'anaemari2006@gmail.com', 'cash on delivery', 'flat no. Rua Desembargador Alfredo Russel, 95  São Paulo São Paulo Brasil - 03558070', ', Abóbora recheada ( 1 ), Empada de batata doce com lentilha ( 1 )', 38, '31-Oct-2023', '', 'Mundo Sem Fome'),
(17, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '988989', 'anaemari2006@gmail.com', 'cash on delivery', 'flat no. Rua Desembargador Alfredo Russel  São Paulo Sao Paulo Brasil - 02309080', ', Empada de batata doce com lentilha ( 1 )', 8, '04-Nov-2023', 'completo', 'Mundo Sem Fome'),
(18, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '5666767', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Coxinhas de Jaca ( 1 )', 20, '04-Nov-2023', 'pending', NULL),
(19, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '87889', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - 02309080', ', Torta de massa filo e butternut ( 1 ), Molho de cogumelos cremoso ( 1 ), Empada de batata doce com lentilha ( 1 ), Coxinhas de Jaca ( 1 ), Pão recheado com pesto e queijo  ( 1 )', 78, '04-Nov-2023', 'pending', NULL),
(20, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '888990', 'anaemari2006@gmail.com', 'cash on delivery', 'flat no. Rua Desembargador Alfredo Russel  São Paulo Sao Paulo Brasil - 7878890890', ', Empada de batata doce com lentilha ( 30 )', 240, '04-Nov-2023', 'pending', NULL),
(21, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '43443', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - ', ', Torta de massa filo e butternut ( 50 )', 954, '04-Nov-2023', 'pending', NULL),
(22, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '77', 'anaemari2006@gmail.com', 'cash on delivery', 'flat no. Rua Desembargador Alfredo Russel, 95  São Paulo 464 Brasil - ', ', Coxinhas de Jaca ( 1 ), Torta de massa filo e butternut ( 1 ), Empada de batata doce com lentilha ( 1 )', -47, '04-Nov-2023', 'pending', NULL),
(23, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '111', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - ', ', Abóbora recheada ( 1 )', -470, '04-Nov-2023', 'pending', NULL),
(24, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '33', 'anaemari2006@gmail.com', 'cash on delivery', 'flat no. Rua Desembargador Alfredo Russel  São Paulo Sao Paulo Brasil - ', ', Pão recheado com pesto e queijo  ( 1 ), Empada de batata doce com lentilha ( 1 )', -82, '04-Nov-2023', 'pending', NULL),
(25, 35, 'ANA LUISA ARASHIRO DOS SANTOS FEITOSA', '888', 'marianaarashiro09@gmail.com', 'cash on delivery', 'flat no. Rua Cônego Ladeira  São Paulo SP Brasil - ', ', Torta de massa filo e butternut ( 1 )', -41, '04-Nov-2023', 'pending', NULL),
(26, 35, '', '', '', '', 'flat no.      - ', 'Empada ( 1 ), Abóbora recheada ( 1 )', 38, '10-Nov-2023', 'pending', NULL),
(27, 35, 'ADASDSA', '45353643', 'clientemariana@gmail.com', 'cash on delivery', 'flat no. SADASDSA  sAASDA ASDSAD SADASD - ', ', Empada ( 1 )', -12, '10-Nov-2023', 'pending', NULL),
(28, 35, 'yasmin', '435345', 'yasmin@gmail.com', 'Cartão de crédito ou débito', 'flat no. 332234  saadsad 432434 32432432 - ', ', Empada ( 1 )', -32, '10-Nov-2023', 'pending', NULL),
(29, 35, '', '', '', 'Cartão de crédito ou débito', 'flat no.      - ', ', Abóbora recheada ( 1 )', -170, '10-Nov-2023', 'pending', NULL),
(30, 35, 'Mariana ', '(12)31231-23', '', 'Cartão de crédito ou débito', 'Avenida Imperador, Jardim São Sebastião, São Paulo, SP, 08050000', 'Empada ( 1 )', -12, '10-Nov-2023', 'pending', NULL),
(31, 35, 'Mariana ', '(11)23232-32', '', 'Cartão de crédito ou débito', 'Avenida Imperador, Jardim São Sebastião, São Paulo, SP, 08050000', 'Abóbora recheada ( 1 ), Empada ( 1 )', -162, '10-Nov-2023', 'pending', NULL),
(32, 35, 'Mariana ', '(23)43432-43', '', 'Cartão de crédito ou débito', 'Avenida Imperador, Jardim São Sebastião, São Paulo, SP, 08050000', 'Empada ( 7 )', 36, '10-Nov-2023', 'pending', NULL),
(33, 35, 'Mariana ', '(12)33213-12', '', 'Cartão de crédito ou débito', 'Avenida Imperador, Jardim São Sebastião, São Paulo, SP, 08050000', 'Abóbora recheada ( 1 ), Empada ( 6 )', -122, '10-Nov-2023', 'pending', NULL),
(34, 35, 'Mariana ', '(12)12321-32', '', 'Cartão de crédito ou débito', 'Avenida Imperador, Jardim São Sebastião, São Paulo, SP, 08050000', 'Torta de massa filo e butternut ( 1 ), Abóbora recheada ( 1 ), Coxinhas de Jaca ( 1 )', 75, '10-Nov-2023', 'pending', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(25, 'Empada', 'acompanhamentos', 'Empada vegetariana recheadas com legumes e a massa de batata doce.', 8, '2.png'),
(26, 'Abóbora recheada', 'pratosprincipas', 'Abóbora assada recheada com quinoa.              ', 30, '3.png'),
(27, 'Pão recheado com pesto', 'acompanhamentos', 'Pão recheado com molho pesto e queijo de leite de castanha-de-caju ', 10, '4.png'),
(28, 'Torta de massa filo e butternut', 'pratosprincipas', 'Tarte de Massa Filo com Espinafres e Cogumelos.\r\n                                                              ', 25, '5.png'),
(29, 'Molho de cogumelos cremoso', 'Acompanhamentos', 'molho que leva cogumelos , caldo de legumes e levedura nutricional e amido de milho.', 15, '6.png'),
(30, 'Burrito Vegano', 'Acompanhamentos', 'Burrito recheado com uma mistura de feijão preto, milho, arroz, guacamole e alface desfiada ', 20, '7.png'),
(32, 'Ratatouille', 'Pratos principas', 'Prato com legumes como berinjela,abobrinha e tomate', 35, '9.png'),
(50, 'Macarrão com brócolis', 'Pratos principas', 'Macarrão com brócolis creme de leite e queijo  de castanha de caju', 35, '27.png'),
(57, 'Panqueca vegana', 'vegitables', 'Panqueca de aveia com molho de tomate,brócolis,ervilha,molho branco e especiarias.', 25, '7.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL,
  `pontos` int(11) NOT NULL,
  `pontos_usados` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`, `pontos`, `pontos_usados`) VALUES
(31, 'Mariana Akemi', 'marianaarashiro09@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user', 'logo (1).png', 0, 0),
(32, 'Mariana', 'admin01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'marips3.jpg', 0, 0),
(35, 'Mariana ', 'clientemariana@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 'marips3.jpg', 243, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
