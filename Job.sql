-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 13 2020 г., 20:39
-- Версия сервера: 5.7.28-0ubuntu0.18.04.4
-- Версия PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Job`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(3, 'Горловка'),
(1, 'Донецк'),
(5, 'Енакиево'),
(2, 'Макеевка'),
(4, 'Шахтерск');

-- --------------------------------------------------------

--
-- Структура таблицы `educations`
--

CREATE TABLE `educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `educations`
--

INSERT INTO `educations` (`id`, `name`) VALUES
(5, 'Бакалавр'),
(6, 'Магистр'),
(4, 'Неоконченное высшее'),
(1, 'Среднее'),
(3, 'Среднее специальное'),
(2, 'Среднее техническое');

-- --------------------------------------------------------

--
-- Структура таблицы `employments`
--

CREATE TABLE `employments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employments`
--

INSERT INTO `employments` (`id`, `name`) VALUES
(4, 'Волонтерство'),
(1, 'Полная'),
(3, 'Стажировка'),
(2, 'Частичная');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_23_220547_create_languages_table', 1),
(4, '2020_03_23_225027_create_cities_table', 1),
(5, '2020_03_23_225028_create_universities_table', 1),
(6, '2020_03_23_225050_create_professions_table', 1),
(7, '2020_03_23_225122_create_schedules_table', 1),
(8, '2020_03_23_225435_create_employments_table', 1),
(9, '2020_03_23_225513_create_vacancies_table', 1),
(10, '2020_03_23_225532_create_my_vacancies_table', 1),
(11, '2020_03_23_225650_create_educations_table', 1),
(12, '2020_03_23_234434_create_resume_table', 1),
(13, '2020_03_24_000536_create_resume_languages_table', 1),
(14, '2020_03_24_001118_create_resume_experience_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `my_vacancies`
--

CREATE TABLE `my_vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `vacancy_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `my_vacancies`
--

INSERT INTO `my_vacancies` (`id`, `user_id`, `vacancy_id`) VALUES
(4, 1, 3),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `professions`
--

CREATE TABLE `professions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `professions`
--

INSERT INTO `professions` (`id`, `name`) VALUES
(5, 'Водитель'),
(1, 'Медик'),
(2, 'Программист'),
(4, 'Сантехник'),
(3, 'Слесарь');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_birth` date NOT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `education_id` int(10) UNSIGNED DEFAULT NULL,
  `university_id` int(10) UNSIGNED DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_graduation` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `date_birth`, `sex`, `phone`, `city_id`, `education_id`, `university_id`, `specialization`, `year_of_graduation`, `user_id`) VALUES
(1, '1997-02-12', 'М', '+38 (071) 77-77-777', 3, 5, 1, 'ИС', 2019, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedules`
--

INSERT INTO `schedules` (`id`, `name`) VALUES
(2, 'Гибкий'),
(1, 'Полный день'),
(4, 'Сменный'),
(3, 'Удаленная работа');

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE `universities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `universities`
--

INSERT INTO `universities` (`id`, `name`, `city_id`) VALUES
(1, 'ДонНТУ', 1),
(2, 'ДонНУ', 1),
(3, 'ДонАУиГС', 1),
(4, 'ДонНАСА', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_employer` tinyint(1) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_link` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_employer`, `company_name`, `photo_link`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dmitry', 'some_email@dpi.dpr', 0, 'Иванов Иван Иванович', 'images/user-3-128.jpg', NULL, '$2y$10$B9e1laWhCWmssBnm8dETB.s4eZDu.YLtfU06WXg.L3aUV78GSzaZe', 'QAAFsmyVtALU0dX9NU3zvJBxTRiR15wZ8ss7GEg6Rfs2LmXgIFT2niKSfADE', '2020-03-24 10:27:12', '2020-04-27 20:03:06'),
(2, 'dmitry1', 'some_email1@dpi.dpr', 1, '\"Феникс\"', 'images/феникс-1.jpg', NULL, '$2y$10$MIBvplwURygvF8PkQIJzhOY.viZfi.u3cFB.CmoyV2nFoSXl2TrKy', '1df9HtR9OHSTerXm28c3AUeNwEG93uFk2jZDCUrQt4S9OHJWsElci21ptLvZ', '2020-03-24 10:29:32', '2020-03-31 22:33:35'),
(3, 'dmitry3', 'some_email3@dpi.dpr', 0, NULL, NULL, NULL, '$2y$10$N3BMj7/DtIxalXDaniOYxugasCYmOJPlH.03ibZNxwwCDa9uFrg1O', NULL, '2020-04-01 11:38:39', '2020-04-01 11:38:39'),
(4, 'dmitry4', 'some_email4@dpi.dpr', 1, NULL, NULL, NULL, '$2y$10$/C0SD8wR5I04hPsnBdbgoef9V1tS1IrLW8TQJg2pXmz4HFycikzsy', NULL, '2020-04-01 13:38:09', '2020-04-01 13:38:09');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_min` int(11) NOT NULL,
  `salary_max` int(11) NOT NULL,
  `schedule_id` int(10) UNSIGNED DEFAULT NULL,
  `employment_id` int(10) UNSIGNED DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `profession_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `name`, `salary_min`, `salary_max`, `schedule_id`, `employment_id`, `experience`, `profession_id`, `city_id`, `requirements`, `description`, `publication_date`, `user_id`, `phone`) VALUES
(3, 'Веб-дизайнер', 15000, 18000, 2, 1, 0, 2, 1, 'блаблабла', 'блаблабла', '2020-03-31', 2, '+38 (071) 34-25-235'),
(5, 'Водитель маршрутки', 12000, 15000, 4, 1, 3, 5, 2, 'Права категории В', 'Необходимо осуществлять регулярные пассажирские перевозки', '2020-03-31', 2, '+38 (071) 34-25-235');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`);

--
-- Индексы таблицы `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `educations_name_unique` (`name`);

--
-- Индексы таблицы `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employments_name_unique` (`name`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `my_vacancies`
--
ALTER TABLE `my_vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_vacancies_user_id_foreign` (`user_id`),
  ADD KEY `my_vacancies_vacancy_id_foreign` (`vacancy_id`);

--
-- Индексы таблицы `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professions_name_unique` (`name`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resume_city_id_foreign` (`city_id`),
  ADD KEY `resume_education_id_foreign` (`education_id`),
  ADD KEY `resume_university_id_foreign` (`university_id`),
  ADD KEY `resume_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedules_name_unique` (`name`);

--
-- Индексы таблицы `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universities_city_id_foreign` (`city_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacancies_schedule_id_foreign` (`schedule_id`),
  ADD KEY `vacancies_employment_id_foreign` (`employment_id`),
  ADD KEY `vacancies_profession_id_foreign` (`profession_id`),
  ADD KEY `vacancies_city_id_foreign` (`city_id`),
  ADD KEY `vacancies_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `employments`
--
ALTER TABLE `employments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `my_vacancies`
--
ALTER TABLE `my_vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `my_vacancies`
--
ALTER TABLE `my_vacancies`
  ADD CONSTRAINT `my_vacancies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `my_vacancies_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`);

--
-- Ограничения внешнего ключа таблицы `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `resume_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `educations` (`id`),
  ADD CONSTRAINT `resume_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `resume_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `vacancies_employment_id_foreign` FOREIGN KEY (`employment_id`) REFERENCES `employments` (`id`),
  ADD CONSTRAINT `vacancies_profession_id_foreign` FOREIGN KEY (`profession_id`) REFERENCES `professions` (`id`),
  ADD CONSTRAINT `vacancies_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`),
  ADD CONSTRAINT `vacancies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
