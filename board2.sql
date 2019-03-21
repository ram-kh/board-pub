-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 21 2019 г., 05:54
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
(1, 0, 'Объявление номер 1', 'Это объявление номер 1 для проверки работы стены объявлений', 'Это полный текст объявления номер 1.\r\nждлыфвопждлофывплржлржфдлыврп\r\nфывжларждлрфжылдвра\r\nждложложячлдсможядлчсомждл\r\nфывжлажфывлдаржло джлфыов ажфыов эфо фывшзщфшвп зщш фызщвшп жрфлдывпр\r\nфывпфывп', 12335465, 0, 1, 10001),
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
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `last_login` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fullname`, `phone`, `last_login`) VALUES
(1, 'admin', 'QqqCze1H8Qs9CkD23eGqnwxFPw9gsqT7', '$2y$13$ap1ppKQZo8.vImL9JsTHgeqZFzlb7kByISIU0xDvspDkd3jpgLAxG', NULL, 'ram_kh@mail.ru', 10, 1553103527, 1553103527, 'Ramil Khuzin', '+79028667790', 1553103527),
(2, 'ram_kh', 'GDdxRBbD_ltsylGzaz-IvWG-FXRvfWKP', '$2y$13$16D23YsF5J0wzLDqu7yTk.8N8DbugasHpSMCDVZ3dbjD5mY19IKG.', NULL, 'ram-kh@yandex.ru', 10, 1553109283, 1553109283, 'Хузин Рамиль Рафаилович', '+79028667790', 1553109283);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `phone`, `fullname`, `salt`, `password`, `email`, `status`, `regdate`, `lastlogon`) VALUES
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
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
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
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
