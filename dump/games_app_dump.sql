-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2023 г., 03:13
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `games_app_dump`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achievement`
--

CREATE TABLE `achievement` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `game_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `achievement`
--

INSERT INTO `achievement` (`id`, `title`, `description`, `game_id`, `created_at`, `updated_at`) VALUES
(7, 'Achievement 1', 'Description 1', 4, '2023-11-16 12:44:06', '2023-11-16 12:44:06'),
(8, 'Achievement 2', 'Description 2', 5, '2023-11-16 12:44:06', '2023-11-16 12:44:06'),
(9, 'Achievement 3', 'Description 3', 6, '2023-11-16 12:44:06', '2023-11-16 12:44:06');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Новинки', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(2, 'Старые', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(3, 'Популярные', '2023-11-16 12:38:06', '2023-11-16 12:38:06');

-- --------------------------------------------------------

--
-- Структура таблицы `developer`
--

CREATE TABLE `developer` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `developer`
--

INSERT INTO `developer` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GameStax', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(2, 'FastReboot', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(3, 'SameDeveloper', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(4, 'GameStax', '2023-11-16 12:39:30', '2023-11-16 12:39:30'),
(5, 'FastReboot', '2023-11-16 12:39:30', '2023-11-16 12:39:30'),
(6, 'SameDeveloper', '2023-11-16 12:39:30', '2023-11-16 12:39:30');

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre_id` int NOT NULL,
  `category_id` int NOT NULL,
  `release_year` int NOT NULL,
  `developer_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `title`, `genre_id`, `category_id`, `release_year`, `developer_id`, `created_at`, `updated_at`, `description`, `image`) VALUES
(4, 'Ведьмак 3', 1, 1, 2021, 1, '2023-11-16 12:38:06', '2023-11-16 15:10:28', 'Description for Game 1', 'uploads/vedmak.jpg'),
(5, 'EuroTrack', 2, 2, 2022, 2, '2023-11-16 12:38:06', '2023-11-16 15:10:22', 'Description for Game 2', 'uploads/track.jpg'),
(6, 'CS', 3, 3, 2023, 3, '2023-11-16 12:38:06', '2023-11-16 14:12:26', 'Description for Game 3', 'uploads/cs.jpg'),
(7, 'Ведьмак 3', 1, 1, 2021, 1, '2023-11-16 12:39:44', '2023-11-16 14:58:16', 'Description for Game 1', 'uploads/vedmak.jpg'),
(8, 'EuroTrack', 2, 2, 2022, 2, '2023-11-16 12:39:44', '2023-11-16 14:58:29', 'Description for Game 2', 'uploads/track.jpg'),
(9, 'CS', 3, 3, 2023, 3, '2023-11-16 12:39:44', '2023-11-16 14:12:31', 'Description for Game 3', 'uploads/cs.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Экшн', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(2, 'Симуляторы', '2023-11-16 12:38:06', '2023-11-16 12:38:06'),
(3, 'Шутеры', '2023-11-16 12:38:06', '2023-11-16 12:38:06');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `auth_key` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `role_id`, `auth_key`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.ru', 'admin', 2, 'foqAjkPNTiKqoDpo_G351lyXG0BfTMSv', '2023-11-12 19:40:25', '2023-11-16 22:51:05'),
(4, 'root', 'root', 'root', 'root@root.ru', 'root', 1, 'krdrbL3QCGTh7Xs5UKw4LdvSAdbYvLpm', '2023-11-12 20:37:33', '2023-11-12 20:37:33'),
(5, 'ura', 'Юрий', 'Пухов', 'ura1@gmail.com', 'uraura', 1, 'cc9gyo_5wFwh6p6_7Ih6EMSt8YUvOAAQ', '2023-11-13 15:02:32', '2023-11-13 15:02:32'),
(6, 'kleyfiexx', 'Артем', 'Ступаченко', 'tema.terin@gmail.com', 'asdasdasd', 1, 'wsmMYR4mykkzgHrG3NH8t6FckcOLXNfi', '2023-11-15 22:32:01', '2023-11-15 22:32:01');

-- --------------------------------------------------------

--
-- Структура таблицы `user_achievement`
--

CREATE TABLE `user_achievement` (
  `id` int NOT NULL,
  `user_game_id` int DEFAULT NULL,
  `achievement_id` int DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_achievement`
--

INSERT INTO `user_achievement` (`id`, `user_game_id`, `achievement_id`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 7, 7, 0, '2023-11-16 12:45:14', '2023-11-16 12:45:14'),
(2, 8, 8, 0, '2023-11-16 12:45:14', '2023-11-16 12:45:14'),
(3, 9, 9, 0, '2023-11-16 12:45:14', '2023-11-16 12:45:14');

-- --------------------------------------------------------

--
-- Структура таблицы `user_game`
--

CREATE TABLE `user_game` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `game_id` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `completion_percentage` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `in_wishlist` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_game`
--

INSERT INTO `user_game` (`id`, `user_id`, `game_id`, `status`, `completion_percentage`, `start_date`, `end_date`, `in_wishlist`, `created_at`, `updated_at`) VALUES
(7, 6, 6, 'В процессе', '50.00', '2023-01-01', '2023-02-01', 0, '2023-11-16 12:43:01', '2023-11-16 14:52:44'),
(8, 6, 7, 'Пройдена', '100.00', '2023-03-01', '2023-03-15', 0, '2023-11-16 12:43:01', '2023-11-16 14:52:50'),
(9, 6, 8, 'В процессе', '21.21', NULL, NULL, 1, '2023-11-16 12:43:01', '2023-11-16 14:54:11');

-- --------------------------------------------------------

--
-- Структура таблицы `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `bio` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `avatar`, `bio`, `created_at`, `updated_at`) VALUES
(1, 6, 'avatar1.jpg', 'О себе', '2023-11-16 12:46:00', '2023-11-16 12:46:00');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `game_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `game_id`, `created_at`, `updated_at`) VALUES
(1, 6, 8, '2023-11-16 12:46:28', '2023-11-16 12:46:28'),
(2, 6, 8, '2023-11-16 12:46:43', '2023-11-16 12:46:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `developer_id` (`developer_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_fk` (`role_id`);

--
-- Индексы таблицы `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_game_id` (`user_game_id`),
  ADD KEY `achievement_id` (`achievement_id`);

--
-- Индексы таблицы `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_achievement`
--
ALTER TABLE `user_achievement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_game`
--
ALTER TABLE `user_game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `achievement_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Ограничения внешнего ключа таблицы `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD CONSTRAINT `user_achievement_ibfk_1` FOREIGN KEY (`user_game_id`) REFERENCES `user_game` (`id`),
  ADD CONSTRAINT `user_achievement_ibfk_2` FOREIGN KEY (`achievement_id`) REFERENCES `achievement` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `user_game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_game_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
