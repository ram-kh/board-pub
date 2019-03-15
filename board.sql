-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 11 2019 г., 00:10
-- Версия сервера: 5.5.45
-- Версия PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- База данных: `board`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_release` tinyint(1) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro_text` text NOT NULL,
  `full_text` text NOT NULL,
  `date` int(10) UNSIGNED NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sum` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `is_release`, `title`, `intro_text`, `full_text`, `date`, `hits`, `user_id`, `sum`) VALUES
(1, 0, 'Объявление номер 1', 'Это объявление номер 1 для проверки работы стены объявлений', '', 0, 0, 1, 10001),
(2, 0, 'Объявление номер 2', 'Это объявление номер 2 для проверки работы стены объявлений', '', 0, 0, 2, 10002),
(3, 0, 'Объявление номер 3', 'Это объявление номер 3 для проверки работы стены объявлений', '', 0, 0, 3, 10003),
(4, 0, 'Объявление номер 4', 'Это объявление номер 4 для проверки работы стены объявления', '', 0, 0, 1, 14000),
(5, 0, 'Объявление номер 5', 'Это объявление номер 5 для проверки работы стены объявлений', '', 0, 0, 2, 15000),
(6, 0, 'Объявление номер 6', 'Это объявление номер 6 для проверки работы стены объявлений', '', 0, 0, 2, 25000);

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userid` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `regdate` date NOT NULL,
  `lastlogon` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userid`, `username`, `phone`, `fullname`, `salt`, `password`, `email`, `status`, `regdate`, `lastlogon`) VALUES
(1, 'ram', '+79028667790', 'Ramil Khuzin', '3425e679a98797b9798689f6986986986', 'Njvf', 'ram_kh@mail.ru', 1, '2019-03-01', '2019-03-02'),
(2, 'user', '+79091234567', 'John Dow', '0948673873e9869898a986986c98698698b689', 'user', 'user@mail.ru', 3, '2019-02-05', '2019-03-01'),
(3, 'looser', '+13235551025', 'User Looser', '8768768f587578575875a785775b875875', 'looser', 'loos@mail.ru', 2, '2019-02-12', '2019-03-01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userid` (`user_id`);

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`),
  ADD UNIQUE KEY `link_url` (`link_url`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


GRANT ALL PRIVILEGES ON *.* TO 'board'@'%' IDENTIFIED BY PASSWORD '*EDAA5EAA10B1B209B3D1A963FBA5B5CA66046ED2' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `board`.* TO 'board'@'%' WITH GRANT OPTION;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
