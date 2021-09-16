-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 17 2021 г., 00:40
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `basic_web`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dates`
--

INSERT INTO `dates` (`id`, `name`) VALUES
(1, 'Less than a mounth'),
(2, 'Less than a six mounths'),
(3, 'Less than a year'),
(4, 'More than a year');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `checkbox1` int(3) DEFAULT NULL,
  `checkbox2` int(3) DEFAULT NULL,
  `checkbox3` int(3) DEFAULT NULL,
  `checkbox4` int(3) DEFAULT NULL,
  `id_date_use` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_user`, `name`, `description`, `rate`, `checkbox1`, `checkbox2`, `checkbox3`, `checkbox4`, `id_date_use`) VALUES
(1, 123, '123123', '2312313', 1, 1, 1, 0, 0, 4),
(2, 2, '213', '321321', 4, 1, 1, 1, 1, 2),
(3, 2, '1233213', '3123123123', 5, 1, 1, 1, 1, 2),
(4, 2, 'tretwretre', 'rewtretrewtr', 5, 0, 1, 1, 0, 3),
(5, 2, '3321321', '321321321', 3, 0, 0, 1, 0, 4),
(6, 5, 'Так, тест названия', 'Тест отзыва, в общем-то да, все должно работать', 5, 1, 1, 1, 0, 1),
(7, 5, '<script>alert(123)</script>', '34243', 4, 0, 0, 1, 0, 1),
(8, 4, '5654654456', '564546', 4, 0, 0, 1, 0, 2),
(9, 4, '|script|alert(123)|/script|', '|script|alert(123)|/script||script|alert(123)|/script||script|alert(123)|/script|', 5, 0, 1, 1, 1, 4),
(10, 7, 'Test name', 'Test review \' \" ` fklsjklfdjoiwerj kjfds lFJDiofsjdlkfja d\'FJiowje 9jvldsn ndsfaj9y38y2h3 \" klj f; [\' `| .|', 4, 1, 1, 1, 0, 4),
(11, 7, 'Test name', 'Evil\'); DROP TABLE feedbacks;--', 4, 1, 1, 1, 0, 4),
(12, 5, 'Evil\'); DROP TABLE drop_table;--', 'кцкцукуцк', 4, 1, 1, 1, 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`) VALUES
(1, '1234', '32132', '1312321'),
(2, '2132132@12321323', 'bb4cd54d3ee60291497f312ca145db4b', 'ce08aa8f3bb50ab026cab82f58e66617'),
(3, '1232132@31213', '0093663cee68ae97822a1df5fcbdd537', 'f4c4a0c8f49e360e9056e6245fd03ce2'),
(4, '2312321@321321432', '8a3acc96ae03558eb54bd8a1bd2268a9', 'a348fdd73f39edc415511e3c1413a90f'),
(5, '123@123', '5aef4c318ddf156d643647be2c9ddfe1', '130804c033b774b9eb890545e2eed9ba'),
(6, '321321@3123123', 'dbf3465319daf39b791ca424f7fb22ad', '4999d5432879ac6fbc4a9dc2d2b3f425'),
(7, 'test@test', 'f490d56d2056ca5262607c8fbf6805bd', '1baa29bc84726fa4b7a4ff6391662f00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
