
-- База даних: laravel_ecommerce
--

-- --------------------------------------------------------

--
-- Структура таблиці brands
--

--
-- Структура таблиці brands
--

-- CREATE TABLE IF NOT EXISTS brands (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   brand_name varchar(255) NOT NULL,
--   brand_image varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці brands
--

INSERT INTO brands (id, brand_name, brand_image, created_at, updated_at) VALUES
(9, 'Porsche', 'image/brand/1739690622594797.png', '2022-07-29 09:37:45', NULL),
(11, 'Ferrari', 'image/brand/1739691501255365.png', '2022-07-29 09:38:43', '2022-07-29 09:51:43'),
(13, 'Audi', 'image/brand/1740221582189815.jpg', '2022-08-04 06:17:07', NULL),
(16, 'McLaren', 'image/brand/1740221842478317.jpg', '2022-08-04 06:21:16', NULL),
(17, 'Lamborghini', 'image/brand/1740301232068878.png', '2022-08-05 03:03:40', '2022-08-05 03:23:07');

-- --------------------------------------------------------

--
-- Структура таблиці categories
--

-- CREATE TABLE IF NOT EXISTS categories (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   user_id int NOT NULL,
--   category_name varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   deleted_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці categories
--

INSERT INTO categories (id, user_id, category_name, created_at, updated_at, deleted_at) VALUES
(1, 3, 'Sailing', '2022-07-24 08:05:55', '2022-07-25 11:52:39', NULL),
(2, 2, 'Woman', '2022-07-24 08:07:51', NULL, NULL),
(3, 3, 'Watches', '2022-07-24 08:08:07', NULL, NULL),
(4, 1, 'Fish', '2022-07-24 08:12:52', '2022-07-24 08:12:52', NULL),
(5, 3, 'MotorSport', '2022-07-24 08:23:21', '2022-07-25 06:26:30', NULL),
(6, 3, 'Gaming', '2022-07-24 08:25:32', NULL, NULL),
(7, 1, 'Computers', '2022-07-24 08:28:45', NULL, NULL),
(8, 2, 'Cars', '2022-07-24 08:30:13', NULL, NULL),
(10, 3, 'News', '2022-07-24 09:24:10', '2022-07-25 11:54:33', '2022-07-25 11:54:33');

-- --------------------------------------------------------

--
-- Структура таблиці contacts
--

-- CREATE TABLE IF NOT EXISTS contacts (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   address text COLLATE utf8mb4_unicode_ci NOT NULL,
--   email varchar(255) NOT NULL,
--   phone varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці contacts
--

INSERT INTO contacts (id, address, email, phone, created_at, updated_at) VALUES
(3, '20 W 34th St., New York, NY 10001, USA', 'info@ecommerce.com', '+380991755316', '2022-08-02 02:56:14', '2022-08-02 02:57:45');

-- --------------------------------------------------------

--
-- Структура таблиці contact_forms
--

-- CREATE TABLE IF NOT EXISTS contact_forms (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   name varchar(255) NOT NULL,
--   email varchar(255) NOT NULL,
--   subject varchar(255) NOT NULL,
--   message text NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці contact_forms
--

INSERT INTO contact_forms (id, name, email, subject, message, created_at, updated_at) VALUES
(1, 'Yanush Polishchuk', 'yanush.polishchuk@gmail.com', 'I need your phone number', 'Please, send me your phone number.', '2022-08-02 03:44:04', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці failed_jobs
--

-- CREATE TABLE IF NOT EXISTS failed_jobs (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   uuid varchar(255) NOT NULL,
--   connection text NOT NULL,
--   queue text NOT NULL,
--   payload longtext NOT NULL,
--   exception longtext NOT NULL,
--   failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (id),
--   UNIQUE KEY failed_jobs_uuid_unique (uuid)
-- );

-- --------------------------------------------------------

--
-- Структура таблиці home_abouts
--

-- CREATE TABLE IF NOT EXISTS home_abouts (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   title varchar(255) NOT NULL,
--   short_des text NOT NULL,
--   long_des text NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці home_abouts
--

INSERT INTO home_abouts (id, title, short_des, long_des, created_at, updated_at) VALUES
(1, 'EUM IPSAM LABORUM DELENITI VELITENA', 'Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Ullamco laboris nisi ut aliquip ex ea commodo consequa Duis aute irure dolor in reprehenderit in voluptate velit Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n- Ullamco laboris nisi ut aliquip ex ea commodo consequa\r\n- Duis aute irure dolor in reprehenderit in voluptate velit\r\n- Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-07-30 09:35:04', '2022-07-30 13:16:03');

-- --------------------------------------------------------

--
-- Структура таблиці home_services
--

-- CREATE TABLE IF NOT EXISTS home_services (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   title varchar(255) NOT NULL,
--   description text NOT NULL,
--   icon_color varchar(255) NOT NULL,
--   icon_form varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці home_services
--

INSERT INTO home_services (id, title, description, icon_color, icon_form, created_at, updated_at) VALUES
(1, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 'blue', 'globe', '2022-07-31 13:25:26', '2022-07-31 13:36:56'),
(2, 'Sed Perspiciatis', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'orange', 'file', '2022-07-31 13:26:25', NULL),
(3, 'Magni Dolores', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia', 'pink', 'tachometer', '2022-07-31 13:27:40', NULL),
(4, 'Nemo Enim', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 'yellow', 'layer', '2022-07-31 13:28:33', NULL),
(5, 'Dele Cardo', 'Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur', 'red', 'slideshow', '2022-07-31 13:29:16', NULL),
(6, 'Divera Don', 'Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur', 'teal', 'arch', '2022-07-31 13:30:19', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці migrations
--

-- CREATE TABLE IF NOT EXISTS migrations (
--   id int NOT NULL SERIAL CHECK (id >= 0),
--   migration varchar(255) NOT NULL,
--   batch int NOT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці migrations
--

INSERT INTO migrations (id, migration, batch) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_08_19_000000_create_failed_jobs_table', 2),
(6, '2022_07_22_181144_create_sessions_table', 2),
(7, '2022_07_23_111417_create_categories_table', 3),
(8, '2022_07_25_150719_create_brands_table', 4),
(9, '2022_07_27_103624_create_multipics_table', 5),
(10, '2022_07_29_133458_create_sliders_table', 6),
(11, '2022_07_30_090759_create_home_abouts_table', 7),
(19, '2022_07_31_162003_create_home_services_table', 8),
(20, '2022_08_01_154828_create_contacts_table', 9),
(21, '2022_08_01_163629_create_contacts_table', 10),
(22, '2022_08_02_060003_create_contact_forms_table', 11);

-- --------------------------------------------------------

--
-- Структура таблиці multipics
--

-- CREATE TABLE IF NOT EXISTS multipics (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   image varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці multipics
--

INSERT INTO multipics (id, image, created_at, updated_at) VALUES
(20, 'image/multi/1740126807662332.png', '2022-08-03 05:10:43', NULL),
(21, 'image/multi/1740127062485570.png', '2022-08-03 05:14:46', NULL),
(34, 'image/multi/1740130723140388.jpg', '2022-08-03 06:12:58', NULL),
(35, 'image/multi/1740130723611060.jpg', '2022-08-03 06:12:58', NULL),
(36, 'image/multi/1740130724010839.jpg', '2022-08-03 06:12:58', NULL),
(37, 'image/multi/1740219565730039.jpg', '2022-08-04 05:45:04', NULL),
(38, 'image/multi/1740220220179190.jpg', '2022-08-04 05:55:29', NULL),
(39, 'image/multi/1740220238839006.jpg', '2022-08-04 05:55:46', NULL),
(40, 'image/multi/1740220251567738.jpg', '2022-08-04 05:55:58', NULL),
(41, 'image/multi/1740220382390796.jpg', '2022-08-04 05:58:03', NULL),
(42, 'image/multi/1740220573543855.jpg', '2022-08-04 06:01:06', NULL),
(43, 'image/multi/1740220913013359.jpg', '2022-08-04 06:06:29', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці password_resets
--

-- CREATE TABLE IF NOT EXISTS password_resets (
--   email varchar(255) NOT NULL,
--   token varchar(255) NOT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   KEY password_resets_email_index (email)
-- );

--
-- Дамп даних таблиці password_resets
--

INSERT INTO password_resets (email, token, created_at) VALUES
('admin@gmail.com', '$2y$10$0cboDgv6ebYlKlq3h7WsourAYJhULEeUeUDzV2F/oeK3InVkRVZfi', '2022-07-28 02:38:02');

-- --------------------------------------------------------

--
-- Структура таблиці personal_access_tokens
--

-- CREATE TABLE IF NOT EXISTS personal_access_tokens (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   tokenable_type varchar(255) NOT NULL,
--   tokenable_id bigint NOT NULL CHECK (tokenable_id >= 0),
--   name varchar(255) NOT NULL,
--   token varchar(64) NOT NULL,
--   abilities text,
--   last_used_at timestamp NULL DEFAULT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id),
--   UNIQUE KEY personal_access_tokens_token_unique (token),
--   KEY personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type,tokenable_id)
-- );

-- --------------------------------------------------------

--
-- Структура таблиці sessions
--

-- CREATE TABLE IF NOT EXISTS sessions (
--   id varchar(255) NOT NULL,
--   user_id bigint DEFAULT NULL CHECK (user_id >= 0),
--   ip_address varchar(45) DEFAULT NULL,
--   user_agent text,
--   payload longtextNOT NULL,
--   last_activity int NOT NULL,
--   PRIMARY KEY (id),
--   KEY sessions_user_id_index (user_id),
--   KEY sessions_last_activity_index (last_activity)
-- );

--
-- Дамп даних таблиці sessions
--

INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity) VALUES
('0DvhFtdsO7HyR4IgBs5zcUkPQmzUcwduHmEIKDqd', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNEpFUG1MWldESGdvejI0cGhLV2d5Y0I1alA4eXRKa2lPN0pRaHhBbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lL2JyYW5kcy9lZGl0LzE3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRGZXZIUmxDU1NIbzhXS3dPLzBXWWtPNm5wRW1wZEpIWmYvaGhGMnFBUUpnQ0JFRXRkRkNPTyI7fQ==', 1659680588),
('z0wLNhXmf9uKfFnJeYS6UL89vQ1AG4AUWE6d2tkD', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWDdZRjNpN2ZGU0tVVlkxRGtJYlJHR0tXWUdtWTZaaW9FU1FKb3BJNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEZldkhSbENTU0hvOFdLd08vMFdZa082bnBFbXBkSkhaZi9oaEYycUFRSmdDQkVFdGRGQ09PIjt9', 1659621543);

-- --------------------------------------------------------

--
-- Структура таблиці sliders
--

-- CREATE TABLE IF NOT EXISTS sliders (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   title varchar(255) DEFAULT NULL,
--   description text,
--   image varchar(255) DEFAULT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id)
-- );

--
-- Дамп даних таблиці sliders
--

INSERT INTO sliders (id, title, description, image, created_at, updated_at) VALUES
(1, 'Slider One', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider One mollitia ut. Similique ea voluptatem.', 'image/slider/1739761153161272.jpg', NULL, '2022-07-30 04:18:48'),
(3, 'Slider Image Two', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider Image Two mollitia ut. Similique ea voluptatem.', 'image/slider/1739701330750482.jpg', NULL, NULL),
(5, 'Slider Number Three', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem.', 'image/slider/1739761837834855.jpg', '2022-07-30 04:29:41', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці users
--

-- CREATE TABLE IF NOT EXISTS users (
--   id bigint NOT NULL SERIAL CHECK (id >= 0),
--   name varchar(255) NOT NULL,
--   email varchar(255) NOT NULL,
--   email_verified_at timestamp NULL DEFAULT NULL,
--   password varchar(255) NOT NULL,
--   two_factor_secret text,
--   two_factor_recovery_codes text,
--   two_factor_confirmed_at timestamp NULL DEFAULT NULL,
--   remember_token varchar(100) DEFAULT NULL,
--   current_team_id bigint DEFAULT NULL CHECK (current_team_id >= 0),
--   profile_photo_path varchar(2048) DEFAULT NULL,
--   created_at timestamp NULL DEFAULT NULL,
--   updated_at timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (id),
--   UNIQUE KEY users_email_unique (email)
-- );

--
-- Дамп даних таблиці users
--

INSERT INTO users (id, name, email, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, current_team_id, profile_photo_path, created_at, updated_at) VALUES
(1, 'John', 'admin@gmail.com', '2022-07-28 06:08:44', '$2y$10$h1HGRUTy05sVvoZukpcUPu77jG7zICEcaKO0VKTMYDdk8L7ebQDU6', NULL, NULL, NULL, NULL, NULL, 'profile-photos/CYcF6QsKPrG6guKnkvVn0315weHoJw6Z4cu2xfCX.jpg', '2022-07-22 15:31:36', '2022-07-28 06:08:44'),
(2, 'Chandler', 'chandler@gmail.com', '2022-07-28 06:51:58', '$2y$10$WSR268RIUZDdCuOLPA9lGOlMWpzPP5wp1iXeDIkT/Nw/N5hutfZQO', NULL, NULL, NULL, NULL, NULL, 'profile-photos/uz7fG8syyLayBXFfg6B7MedhRIInq9PnuZ3WvG9q.jpg', '2022-07-23 02:38:41', '2022-07-28 06:51:58'),
(3, 'Test', 'test@gmail.com', '2022-07-28 06:48:01', '$2y$10$1PYbDGlZmSoPiL.fk3HrIuEPTH4KcVxHtNIepyhiNIizto5PjPlda', NULL, NULL, NULL, 'hGZNPzf3TaEkcbNGVbo86szBGbvPu8CobHvw6GYbMaibndzmbnDkoiUVoBLQ', NULL, 'profile-photos/oErCA9vSRKxQVfYFlcAwy7ZWpaKsJRkYmgNS3z1b.jpg', '2022-07-23 07:21:30', '2022-07-28 06:48:22'),
(4, 'Joey', 'joey@gmail.com', '2022-07-28 12:22:40', '$2y$10$FevHRlCSSHo8WKwO/0WYkO6npEmpdJHZf/hhF2qAQJgCBEEtdFCOO', NULL, NULL, NULL, NULL, NULL, 'profile-photos/1740299595935411.jpg', '2022-07-28 12:22:04', '2022-08-05 02:57:07');
COMMIT;
