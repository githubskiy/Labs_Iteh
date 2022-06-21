-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 21 2022 г., 13:43
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_online123`
--
CREATE DATABASE IF NOT EXISTS `shop_online123` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `shop_online123`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Computers'),
(2, 'Smartphones'),
(3, 'Appliances'),
(4, 'Sports and hobbies'),
(5, 'Cottage, garden');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_items` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `quality` text NOT NULL,
  `fid_vendors` int(11) NOT NULL,
  `fid_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_items`, `name`, `price`, `quantity`, `quality`, `fid_vendors`, `fid_category`) VALUES
(1, 'ASUS S500MC-5114000380 (90PF02H1-M00KX0)', 27999, 25, 'excellent', 2, 1),
(2, 'ASUS U500MA-R5300G0080 (90PF02F2-M00AL0)', 14599, 37, 'excellent', 2, 1),
(3, 'Samsung Galaxy S20', 17399, 54, 'excellent', 1, 2),
(4, 'Samsung Galaxy A32', 9799, 58, 'excellent', 1, 2),
(5, 'Стиральная машина WW80R42LHFWDUA', 16699, 22, 'excellent', 1, 5),
(6, 'Цепная электропила Makita UC3541A', 5979, 16, 'excellent', 3, 5),
(7, 'Бензокоса Makita EBH341U', 13845, 42, 'excellent', 3, 5),
(8, 'Мяч Adidas Finale 2022 Training H57813', 669, 39, 'excellent', 4, 4),
(9, 'Перчатки ADIDAS PREDATOR TRAINING CF1366', 650, 29, 'excellent', 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE `vendors` (
  `id_vendors` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`id_vendors`, `name`) VALUES
(1, 'Samsung'),
(2, 'Asus'),
(3, 'Makita'),
(4, 'Adidas');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`),
  ADD KEY `fk_items_1` (`fid_vendors`),
  ADD KEY `fk_items_2` (`fid_category`);

--
-- Индексы таблицы `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id_vendors`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_1_v` FOREIGN KEY (`fid_vendors`) REFERENCES `vendors` (`id_vendors`),
  ADD CONSTRAINT `fk_items_2_c` FOREIGN KEY (`fid_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
