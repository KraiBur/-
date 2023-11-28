-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 28 2023 г., 13:38
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `il`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Ужасы'),
(2, 'Экшн'),
(3, 'комедия');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `path` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `video` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `year`, `category`, `count`, `path`, `created_at`, `video`) VALUES
(3, 'John Wick : Chapter 4', 4000, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Ужасы', 23, 'assets/img/Rectangle1.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(5, 'Shazam', 5325, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Экшн', 53, 'assets/img/Rectangle2.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(6, 'The Whale', 4043, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Ужасы', 11, 'assets/img/Rectangle3.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(7, 'Tetris', 1210, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Экшн', 647, 'assets/img/Rectangle4.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(8, 'John Wick', 9110, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз\n	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'комедия', 55, 'assets/img/Rectangle5.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(9, 'Euphoria', 5320, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Ужасы', 4, 'assets/img/Rectangle6.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(10, 'Shazam', 4564, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Экшн', 32, 'assets/img/Rectangle7.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(12, 'The Whale', 8624, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'комедия', 87, 'assets/img/Rectangle8.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(13, 'Tetris', 3431, 'Нью-Йорк, Париж, Осака, Берлин — месть не признаёт государственных границ. Джон Уик объявил войну Правлению Кланов, и теперь его голова — самый желанный трофей для наёмников со всего света. ', 'Киану Ривз	Джон Уик\nИэн Макшейн	Уинстон\nБилл Скарсгард', 'Ужасы', 5, 'assets/img/Rectangle9.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'ya', 'ya', 'ya', 'admin', '1@1', 'admin11', 'admin'),
(2, 'фыв', 'ваы', 'авфыа', '1', '1@1', '123456', 'client'),
(3, 'карина', 'буранбаева', 'радиковна', 'kar', 'kar12@sdfv', '123456', 'client'),
(4, 'карина', 'буранбаева', 'радиковна', 'kar', 'kar12@sdfv', '123456', 'client'),
(5, 'крми', 'имт', 'апапр', 'log', 'log@fjnv', '1234567', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
