-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 24 2019 г., 16:49
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
  `is_release` tinyint(1) UNSIGNED DEFAULT '0',
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
(1, 0, 'Объявление номер 1', 'Это объявление номер 1 для проверки работы стены объявлений', 'Это полный текст объявления номер 1.\r\nждлыфвопждлофывплржлржфдлыврп\r\nфывжларждлрфжылдвра\r\nждложложячлдсможядлчсомждл\r\nфывжлажфывлдаржло джлфыов ажфыов эфо фывшзщфшвп зщш фызщвшп жрфлдывпр\r\nфывпфывп', 1552503600, 3, 1, 10001),
(2, 0, 'Объявление номер 2', 'Это объявление номер 2 для проверки работы стены объявлений', '', 1552703600, 1, 2, 10002),
(3, 0, 'Объявление номер 3', 'Это объявление номер 3 для проверки работы стены объявлений', 'Это полный текст объявления номер 3 для проверки работы стены объявлений ылдфжваожыдва\r\nыфваолджфывоаждфылов ждлыфвоа жфдылвоа жфыдлво лдождлоджлождлофыжвдлоаыфва\r\nфываджлождлофывп фыждвлп ыфвп', 1553188359, 1, 3, 10003),
(4, 0, 'Объявление номер 4', 'Это объявление номер 4 для проверки работы стены объявления', '', 1552903600, 1, 1, 14000),
(6, 0, 'Объявление номер 6', 'Это объявление номер 6 для проверки работы стены объявлений', 'Это полный текст объявления номер 6 для проверки работы стены объявлений фыждвлао ыжвдало ыфва\r\nфывопждфылвпожфыдвлоп2ц-43егпфыхвпржывдип ывапвы\r\nпвыапжлдисом ж234дл6о34 ждловпафывп\r\nыфвпывп', 1553371395, 3, 2, 25125),
(7, 0, 'Объявление 7', 'Это краткий текст объявления 7', 'gggggggggggggggggggggggghhhhhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkfffffffffffffffffffffffffffffmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm\r\njjjjjjjjjjjjjjjjjjdddddddddddddddddddddddddnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn,,,,,,,,,,,,,,,,,,,,,,\r\n', 1553371446, 1, 2, 1230);

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
(1, 'admin', 'QqqCze1H8Qs9CkD23eGqnwxFPw9gsqT7', '$2y$13$ap1ppKQZo8.vImL9JsTHgeqZFzlb7kByISIU0xDvspDkd3jpgLAxG', NULL, 'ram_kh@mail.ru', 10, 1553103527, 1553427890, 'Ramil Khuzin', '+79028667790', 1553427890),
(2, 'ram_kh', 'GDdxRBbD_ltsylGzaz-IvWG-FXRvfWKP', '$2y$13$16D23YsF5J0wzLDqu7yTk.8N8DbugasHpSMCDVZ3dbjD5mY19IKG.', 'HYDzQJ3UbdN35jkG_uxzoCbiXdXNeDs8_1553183757', 'ram-kh@yandex.ru', 10, 1553109283, 1553369567, 'Хузин Рамиль Рафаилович', '+79028667790', 1553369567),
(3, 'ram', 'q2E9HXHQ0EVSBJqPyrlWaI09fUmxLP13', '$2y$13$yqqJgpwBCD3OZ2Xd4re28ulRvPxVYJPSfiQz3GtJztn9WfFguezTm', NULL, 'ram@mail.ru', 10, 1553184532, 1553428050, 'Рамиль Хузин', '+73517234740', 1553428050);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
