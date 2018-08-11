-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 11 2018 г., 07:10
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testovoe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `name`, `parent_id`) VALUES
(1, 'Мобильные телефоны', 0),
(2, 'Apple', 1),
(3, 'Xiaomi', 1),
(4, 'Планшеты', 0),
(5, 'Samsung', 4),
(6, 'LG', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(5) UNSIGNED NOT NULL,
  `available` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `price` int(5) UNSIGNED NOT NULL,
  `optprice` int(5) UNSIGNED NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `picture` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `articul` int(5) UNSIGNED NOT NULL,
  `vendor` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `extprops_season` varchar(250) NOT NULL,
  `extprops_name` varchar(250) NOT NULL,
  `status_new` varchar(250) NOT NULL,
  `status_action` varchar(250) NOT NULL,
  `status_top` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `available`, `url`, `price`, `optprice`, `category_id`, `picture`, `name`, `articul`, `vendor`, `description`, `extprops_season`, `extprops_name`, `status_new`, `status_action`, `status_top`) VALUES
(1, 'true', 'http://www.shop.com/detail.php?ID=1', 3000, 2000, 2, 'http://www.shop.com/jpeg', 'Apple Iphone 7', 1123123, 'APPLE', 'Описание товара', 'Красный', 'Iphone 7', 'true', 'false', 'false'),
(2, 'true', 'http://www.shop.com/detail.php?ID=2', 5000, 4000, 3, 'http://www.shop.com/jpeg', 'Xiaomi Phone', 0, 'Xiaomi', 'Описание xiaomi', 'Черный', 'A56', 'true', 'true', 'false'),
(3, 'true', 'http://www.shop.com/detail.php?ID=3', 50000, 14000, 5, 'http://www.shop.com/jpeg', 'Samsung Tablet', 0, 'Samsung', 'Описание samsung', 'Серый', 'Планшет Samsung', 'true', 'true', 'true'),
(4, 'true', 'http://www.shop.com/detail.php?ID=4', 3400, 400, 6, 'http://www.shop.com/jpeg', 'LG tablet', 0, 'LG', 'Описание lg', 'Синий', 'A526', 'true', 'false', 'true');

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(5) UNSIGNED NOT NULL,
  `shop_name` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `shop_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `company`, `shop_url`) VALUES
(1, 'SHOP', 'SHOP', 'http://www.shop.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
