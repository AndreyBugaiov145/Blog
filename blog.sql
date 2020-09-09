-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 09 2020 г., 14:59
-- Версия сервера: 5.7.30-0ubuntu0.18.04.1
-- Версия PHP: 7.0.33-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `header` varchar(30) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img_src` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `header`, `short_description`, `description`, `img_src`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', '5e04c21a52a39.jpg', 1, '2020-09-01 07:35:07', '2020-09-08 09:08:29'),
(3, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', '50569ac974c29121ff9075e45a334942.jpg', 2, '2020-09-08 07:37:48', NULL),
(4, 'какой то заголовок', 'Какое то краткое содержание акой то заголовок акой то заголовок акой то заголовок ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', '1560664221_1.jpg', 5, '2020-09-08 07:37:48', '2020-09-08 08:50:39'),
(5, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', 'depositphotos_11973672-stock-photo-cupcakes.jpg', 2, '2020-09-08 07:37:48', NULL),
(6, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', 'image.jpg', 2, '2020-09-08 07:37:48', NULL),
(7, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', 'unnamed.jpg', 7, '2020-09-08 07:37:48', NULL),
(8, 'какой то заголовок', 'Какое то краткое содержание', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla delectus quibusdam. Expedita quos magni est consequuntur corrupti necessitatibus explicabo. Et beatae esse cupiditate provident, cumque blanditiis maiores fuga debitis quam, dicta commodi accusantium fugit eius dolore, sapiente voluptatibus? Quidem voluptatem eligendi officiis neque recusandae libero. Expedita facere perferendis soluta quod repellat obcaecati ratione dolorem culpa recusandae, dolore. Modi ex veritatis quae, rem placeat perspiciatis quos voluptates veniam sint! Maiores perspiciatis quasi quae corporis culpa, maxime cum fuga tempora quaerat, rerum. Rerum, delectus! Doloribus amet assumenda laborum nisi perferendis molestias delectus aperiam et quam eius unde vitae, aliquid ab aspernatur?', '1543.jpeg', 1, '2020-09-08 07:37:48', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`) VALUES
(1, 'fun', '2020-09-08 06:43:55'),
(2, 'cull', '2020-09-08 07:33:31'),
(3, 'sed', '2020-09-08 07:33:31');

-- --------------------------------------------------------

--
-- Структура таблицы `tag_article`
--

CREATE TABLE `tag_article` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag_article`
--

INSERT INTO `tag_article` (`id`, `tag_id`, `article_id`) VALUES
(3, 1, 2),
(7, 1, 4),
(4, 1, 5),
(1, 1, 6),
(13, 1, 8),
(15, 2, 3),
(8, 2, 5),
(10, 2, 7),
(14, 3, 5),
(9, 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `gender`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Аристарх', 'бубка', 'man', 'asdasdsa@sdsad.com', '123', '2020-09-08 06:28:55', '2020-09-09 08:46:45'),
(2, 'Дмитрий', 'Волошин', 'man', 'sadsd45d@dfdsfsd.com', '1231231231', '2020-09-08 07:27:31', '2020-09-09 08:46:31'),
(3, 'Дмитрий', 'Волошин', 'man', 'sadsrdsad@dfdsfsd.com', '1231231231', '2020-09-08 07:33:09', '2020-09-09 08:46:34'),
(4, 'Андрей', 'Пупкин', 'man', 'sadsdsfgad@dfdsfsd.com', '1231231231', '2020-09-08 07:33:09', '2020-09-09 08:46:23'),
(5, 'Вася', 'Васечкин', 'man', 'sadsdsvbad@dfdsfsd.com', '1231231231', '2020-09-08 07:33:09', '2020-09-09 08:46:42'),
(6, 'Коля', 'Колечкин', 'man', 'sad23sdsad@dfdsfsd.com', '1231231231', '2020-09-08 07:33:09', '2020-09-09 08:46:27'),
(7, 'Вова', 'Вовоачкин', 'man', 'sadsdsad@dfdsfsd.comgn', '1231231231', '2020-09-08 07:33:09', '2020-09-09 08:46:38'),
(9, 'asd', 'asd', 'man', 'asd', 'password', '2020-09-09 09:55:53', NULL),
(11, '123', '123123', 'man', 'bugaiov.andrey@gmail.com', '123', '2020-09-09 09:57:37', NULL),
(17, '123', '123123', 'man', 'bugaiov.andrey@gmail.come', '123', '2020-09-09 09:59:50', NULL),
(18, 'aaaaaaaaaaa', 'bbbbbbbbbbbbb', 'man', 'qweqweqw@sadsa', '123', '2020-09-09 11:57:48', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tag_article`
--
ALTER TABLE `tag_article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_id` (`tag_id`,`article_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tag_article`
--
ALTER TABLE `tag_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `tag_article`
--
ALTER TABLE `tag_article`
  ADD CONSTRAINT `tag_article_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `tag_article_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
