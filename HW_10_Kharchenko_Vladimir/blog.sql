-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2023 г., 10:26
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
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `login` char(12) NOT NULL,
  `password` char(255) NOT NULL,
  `first_name` char(255) NOT NULL,
  `last_name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `login`, `password`, `first_name`, `last_name`) VALUES
(1, 'test1', '12345', 'Test', 'Testerok'),
(2, 'test2', '12345', 'Test2', 'test2'),
(3, 'molxs', '$2y$10$Iyqb5xIJgDemXCUSa69zqOwXDs0BwmUMojWLiDxRa4AcQtOockDsK', 'Vladimir', 'Kharchenko');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `code` int NOT NULL,
  `categories_image` char(255) NOT NULL,
  `name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `code`, `categories_image`, `name`) VALUES
(1, 1, '1.png', 'TestKategory'),
(2, 222, '5.png', 'Про животных');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int NOT NULL,
  `author_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `link_image` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `active`, `title`, `content`, `category_id`, `author_id`, `date`, `description`, `link_image`) VALUES
(1, 1, 'Тестовое название статьи', 'С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание направлений прогрессивного развития. Значимость этих проблем настолько очевидна, что укрепление и развитие структуры позволяет оценить значение существенных финансовых и административных условий. Разнообразный и богатый опыт реализация намеченных плановых заданий в значительной степени обуславливает создание существенных финансовых и административных условий. Значимость этих проблем настолько очевидна, что рамки и место обучения кадров представляет собой интересный эксперимент проверки соответствующий условий активизации. Повседневная практика показывает, что укрепление и развитие структуры представляет собой интересный эксперимент проверки соответствующий условий активизации.', 1, 1, '2023-06-13 20:48:15', 'Краткое описание статьи', 'bg.jpg'),
(2, 1, 'Популяция жирафов в зоопарке города Минска', 'Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение дальнейших направлений развития. Не следует, однако забывать, что консультация с широким активом играет важную роль в формировании систем массового участия. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий. Товарищи! начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Таким образом постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание форм развития.\r\n\r\n', 1, 1, '2023-06-14 17:15:17', 'Про жирафов', '2.jpg'),
(3, 1, 'В рамках спецификации современных стандартов', 'В рамках спецификации современных стандартов, явные признаки победы институционализации призывают нас к новым свершениям, которые, в свою очередь, должны быть своевременно верифицированы. Мы вынуждены отталкиваться от того, что реализация намеченных плановых заданий однозначно фиксирует необходимость существующих финансовых и административных условий. Как уже неоднократно упомянуто, независимые государства могут быть ассоциативно распределены по отраслям.', 2, 1, '2023-06-14 19:44:16', 'В рамках спецификации современных стандартов, явные признаки победы институционализации ', '2.jpg'),
(4, 1, ' своём стремлении улучшить пользовательский', 'В своём стремлении улучшить пользовательский опыт мы упускаем, что явные признаки победы институционализации являются только методом политического участия и объективно рассмотрены соответствующими инстанциями! Ясность нашей позиции очевидна: выбранный нами инновационный путь предполагает независимые способы реализации прогресса профессионального сообщества. Задача организации, в особенности же понимание сути ресурсосберегающих технологий представляет собой интересный эксперимент проверки своевременного выполнения сверхзадачи.', 2, 1, '2023-06-14 19:58:31', 'В своём стремлении улучшить пользовательский опыт мы упускаем, что явные признаки победы институционализации являются только методом политического участия и объективно', '2.jpg'),
(5, 1, 'Следует отметить, что разбавленное изрядной долей эмпатии', 'Следует отметить, что разбавленное изрядной долей эмпатии, рациональное мышление в значительной степени обусловливает важность направлений прогрессивного развития. В целом, конечно, постоянный количественный рост и сфера нашей активности выявляет срочную потребность анализа существующих паттернов поведения. В своём стремлении повысить качество жизни, они забывают, что высокотехнологичная концепция общественного уклада не оставляет шанса для как самодостаточных, так и внешне зависимых концептуальных решений.', 2, 3, '2023-06-15 12:06:14', 'Следует отметить, что разбавленное изрядной долей эмпатии, рациональное мышление в значительной степени обусловливает важность направлений прогрессивного развития', 'bg.jpg'),
(6, 1, 'тест для пагинации 1', 'тест для пагинации 1', 1, 3, '2023-06-15 12:55:58', 'тест для пагинации 1', '2.jpg'),
(7, 1, 'тест для пагинации 2', 'тест для пагинации 2', 1, 3, '2023-06-15 12:56:08', 'тест для пагинации 2', '2.jpg'),
(8, 1, 'тест для пагинации 3', 'тест для пагинации 3', 1, 3, '2023-06-15 12:56:18', 'тест для пагинации 3', '2.jpg'),
(9, 1, 'тест для пагинации 4', 'тест для пагинации 4', 1, 3, '2023-06-15 12:56:27', 'тест для пагинации 4', '2.jpg'),
(10, 1, 'тест для пагинации 5', 'тест для пагинации 5', 1, 3, '2023-06-15 12:56:35', 'тест для пагинации 5', '2.jpg'),
(11, 1, 'тест для пагинации 6', 'тест для пагинации 6', 1, 3, '2023-06-15 12:56:42', 'тест для пагинации 6', '2.jpg'),
(12, 1, 'тест для пагинации 7', 'тест для пагинации 7', 1, 3, '2023-06-15 12:56:49', 'тест для пагинации 7', '2.jpg'),
(13, 1, 'тест для пагинации 8', 'тест для пагинации 8', 1, 3, '2023-06-15 12:56:55', 'тест для пагинации 8', '2.jpg'),
(14, 1, 'тест для пагинации 9', 'тест для пагинации 9', 1, 3, '2023-06-15 12:57:02', 'тест для пагинации 9', '2.jpg'),
(15, 1, 'тест для пагинации 10', 'тест для пагинации 10', 1, 3, '2023-06-15 12:57:10', 'тест для пагинации 10', '2.jpg'),
(16, 1, 'тест для пагинации 11', 'тест для пагинации 11', 1, 3, '2023-06-15 12:57:16', 'тест для пагинации 11', '2.jpg'),
(17, 1, 'тест для пагинации 12', 'тест для пагинации 12', 1, 3, '2023-06-15 12:57:22', 'тест для пагинации 12', '2.jpg'),
(18, 1, 'тест для пагинации 13', 'тест для пагинации 13', 1, 3, '2023-06-15 12:57:49', 'тест для пагинации 13', '2.jpg'),
(19, 1, 'тест для пагинации 14', 'тест для пагинации 14', 1, 3, '2023-06-15 12:57:55', 'тест для пагинации 14', '2.jpg'),
(20, 1, 'тест для пагинации 15', 'тест для пагинации 15', 1, 3, '2023-06-15 12:58:01', 'тест для пагинации 15', '2.jpg'),
(21, 1, 'тест для пагинации 16', 'тест для пагинации 16', 1, 3, '2023-06-15 12:58:07', 'тест для пагинации 16', '2.jpg'),
(22, 1, 'тест для пагинации 17', 'тест для пагинации 17', 1, 3, '2023-06-15 12:58:13', 'тест для пагинации 17', '2.jpg'),
(23, 1, 'Тест пагинации для категории животные 1', 'Тест пагинации для категории животные 1', 2, 3, '2023-06-16 06:43:57', 'Тест пагинации для категории животные 1', '2.jpg'),
(24, 1, 'Тест пагинации для категории животные 2', 'Тест пагинации для категории животные 2', 2, 3, '2023-06-16 06:44:09', 'Тест пагинации для категории животные 2', '2.jpg'),
(25, 1, 'Тест пагинации для категории животные 3', 'Тест пагинации для категории животные 3', 2, 3, '2023-06-16 06:44:24', 'Тест пагинации для категории животные 3', '2.jpg'),
(26, 1, 'Тест пагинации для категории животные 4', 'Тест пагинации для категории животные 4', 2, 3, '2023-06-16 06:44:37', 'Тест пагинации для категории животные 4', '2.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
