
-- --------------------------------------------------------

--
-- Структура таблиці admins
--

CREATE TABLE admins (
  id BIGSERIAL PRIMARY KEY CHECK (id >= 0),
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  mobile varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  current_team_id bigint DEFAULT NULL CHECK (current_team_id >= 0),
  profile_photo_path varchar(2048) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці admins
--

INSERT INTO admins (id, name, email, mobile, email_verified_at, password, remember_token, current_team_id, profile_photo_path, created_at, updated_at) VALUES
(1, 'Admin', 'admin@gmail.com', '+380991755316', '2022-08-23 04:28:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HeSTLcxE8WDssAotgo8RnGnQrWb3CV4MNXLvQJ64i6Sv6JCJ07wboKMyo7aU', NULL, 'profile-photos/1741961481474514.jpg', '2022-08-23 04:28:20', '2022-09-05 08:13:43'),
(2, 'John', 'john@gmail.com', '+380991755319', '2022-09-07 02:33:56', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LO624sfjoO1a4El3LJiFFZR9IDYpZpnG2AYkWInPaGd8b7z6h2IKuPCITg6M', NULL, NULL, '2022-09-07 02:33:56', '2022-09-07 02:33:56');

-- --------------------------------------------------------

create sequence admins_Seq start with 3;
alter table admins alter column id set default nextval('admins_seq');

--
-- Структура таблиці articles
--

CREATE TABLE articles (
  id BIGSERIAL PRIMARY KEY NOT NULL,
  title varchar(255) NOT NULL,
  entry_content text NOT NULL,
  entry_img varchar(255) NOT NULL,
  main_content text NOT NULL,
  category_id int NOT NULL CHECK (category_id >= 0),
  author_id int NOT NULL CHECK (author_id >= 0),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці articles
--

INSERT INTO articles (id, title, entry_content, entry_img, main_content, category_id, author_id, created_at, updated_at, deleted_at) VALUES
(1, 'Saepe atque cum eligendi eaque iste omnis a qui', '<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas.</p>', 'image/article/1662975095.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 1, 4, '2022-09-12 06:31:35', '2022-09-12 06:31:35', NULL),
(2, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem', '<p>Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.</p>', 'image/article/1662975267.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 5, 3, '2022-09-12 06:34:27', '2022-09-12 06:34:27', NULL),
(3, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint', '<p>Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.</p>', 'image/article/1662976012.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 7, 2, '2022-09-12 06:46:52', '2022-09-12 06:46:52', NULL),
(4, 'Nisi magni odit consequatur autem nulla dolorem', '<p>Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</p>', 'image/article/1662976119.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 2, 1, '2022-09-12 06:48:39', '2022-09-12 06:48:39', NULL),
(5, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia reiciendis', '<p>Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p>', 'image/article/1662976221.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 1, 3, '2022-09-12 06:50:21', '2022-09-12 10:48:50', NULL);

-- --------------------------------------------------------
create sequence articles_Seq start with 6;
alter table articles alter column id set default nextval('articles_seq');
--
-- Структура таблиці article_tag
--

CREATE TABLE article_tag (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  article_id int NOT NULL,
  tag_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці article_tag
--

INSERT INTO article_tag (id, article_id, tag_id, created_at, updated_at) VALUES
(3, 1, 7, NULL, NULL),
(4, 5, 6, NULL, NULL),
(5, 5, 9, NULL, NULL),
(6, 5, 10, NULL, NULL),
(7, 2, 4, NULL, NULL),
(9, 2, 9, NULL, NULL),
(11, 3, 2, NULL, NULL),
(12, 3, 3, NULL, NULL),
(13, 4, 1, NULL, NULL),
(15, 4, 9, NULL, NULL),
(16, 1, 6, NULL, NULL),
(17, 1, 8, NULL, NULL),
(18, 2, 10, NULL, NULL),
(19, 3, 10, NULL, NULL),
(20, 4, 4, NULL, NULL);

-- --------------------------------------------------------
create sequence article_tag_Seq start with 21;
alter table article_tag alter column id set default nextval('article_tag_seq');
--
-- Структура таблиці authors
--

CREATE TABLE authors (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  full_name varchar(255) NOT NULL,
  photo varchar(255) NOT NULL,
  about text NOT NULL,
  twitter varchar(255) NOT NULL DEFAULT '#',
  facebook varchar(255) NOT NULL DEFAULT '#',
  instagram varchar(255) NOT NULL DEFAULT '#',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці authors
--

INSERT INTO authors (id, full_name, photo, about, twitter, facebook, instagram, created_at, updated_at) VALUES
(1, 'Lucy Smith', 'image/author/1741499648221742.jpg', '<p>Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.</p>', '#', '#', '#', '2022-08-17 06:24:25', '2022-08-18 08:51:26'),
(2, 'John McClane', 'image/author/1741499843291751.jpg', '<p>Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.</p>', '#', '#', '#', '2022-08-17 06:31:04', '2022-08-18 08:54:32'),
(3, 'Dan Brown', 'image/author/1741400344688913.jpg', '<p>Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. &nbsp;</p>', '#', '#', '#', '2022-08-17 06:33:03', NULL),
(4, 'Joanne Rowling', 'image/author/1741400459904215.jpg', '<p>Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>', '#', '#', '#', '2022-08-17 06:34:53', NULL);

-- --------------------------------------------------------
create sequence authors_Seq start with 5;
alter table authors alter column id set default nextval('authors_seq');
--
-- Структура таблиці brands
--

CREATE TABLE brands (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  brand_name varchar(255) NOT NULL,
  brand_image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці brands
--

INSERT INTO brands (id, brand_name, brand_image, created_at, updated_at) VALUES
(1, 'Porsche', 'image/brand/1739690622594797.png', '2022-07-29 09:37:45', NULL),
(2, 'Ferrari', 'image/brand/1739691501255365.png', '2022-07-29 09:38:43', '2022-07-29 09:51:43'),
(3, 'Audi', 'image/brand/1740221582189815.jpg', '2022-08-04 06:17:07', NULL),
(4, 'McLaren', 'image/brand/1741205581423162.jpg', '2022-08-04 06:21:16', '2022-08-15 02:57:22');

-- --------------------------------------------------------
create sequence brands_Seq start with 5;
alter table brands alter column id set default nextval('brands_seq');
--
-- Структура таблиці categories
--

CREATE TABLE categories (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  user_id int NOT NULL,
  category_name varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці categories
--

INSERT INTO categories (id, user_id, category_name, created_at, updated_at, deleted_at) VALUES
(1, 3, 'General', '2022-07-24 08:05:55', '2022-07-25 11:52:39', NULL),
(2, 3, 'Lifestyle', '2022-07-24 08:07:51', NULL, NULL),
(3, 3, 'Travel', '2022-07-24 08:08:07', NULL, NULL),
(4, 3, 'Design', '2022-07-24 08:12:52', '2022-07-24 08:12:52', NULL),
(5, 3, 'Creative', '2022-07-24 08:23:21', '2022-07-25 06:26:30', NULL),
(6, 3, 'Education', '2022-07-24 08:25:32', NULL, NULL),
(7, 3, 'Business', '2022-07-24 08:28:45', NULL, NULL),
(8, 3, 'News', '2022-07-24 09:24:10', '2022-07-25 11:54:33', '2022-07-25 11:54:33');

-- --------------------------------------------------------
create sequence categories_Seq start with 9;
alter table categories alter column id set default nextval('categories_seq');
--
-- Структура таблиці comments
--

CREATE TABLE comments (
  id SERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  user_id int NOT NULL CHECK (user_id >= 0),
  parent_id int DEFAULT NULL CHECK (parent_id >= 0),
  body text NOT NULL,
  commentable_id int NOT NULL CHECK (commentable_id >= 0),
  commentable_type varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці comments
--

INSERT INTO comments (id, user_id, parent_id, body, commentable_id, commentable_type, created_at, updated_at, deleted_at) VALUES
(1, 1, NULL, 'Great article', 5, 'App\\Models\\Article', '2022-09-12 08:50:36', '2022-09-12 10:48:51', NULL),
(2, 2, 1, 'Are you sure?', 5, 'App\\Models\\Article', '2022-09-12 08:52:03', '2022-09-12 10:48:51', NULL),
(3, 1, 2, 'Yes, Im sure!!!', 5, 'App\\Models\\Article', '2022-09-12 08:52:59', '2022-09-12 10:48:51', NULL),
(4, 3, NULL, 'I think there is some new info already', 5, 'App\\Models\\Article', '2022-09-12 08:54:28', '2022-09-12 10:48:51', NULL),
(5, 3, 3, 'Please, be calm', 5, 'App\\Models\\Article', '2022-09-12 08:54:54', '2022-09-12 10:48:51', NULL),
(6, 2, 4, 'Well, yeah. It is some conflicting info in the article', 5, 'App\\Models\\Article', '2022-09-12 08:57:13', '2022-09-12 10:48:51', NULL),
(7, 2, NULL, 'Check info new about the object', 5, 'App\\Models\\Article', '2022-09-12 08:57:41', '2022-09-12 10:48:51', NULL);

-- --------------------------------------------------------
create sequence comments_Seq start with 8;
alter table comments alter column id set default nextval('comments_seq');
--
-- Структура таблиці contacts
--

CREATE TABLE contacts (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  address text NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці contacts
--

INSERT INTO contacts (id, address, email, phone, created_at, updated_at) VALUES
(1, 'Kyiv, Ukraine', 'yanush.polishchuk@gmail.com', '+380991755316', '2022-08-02 02:56:14', '2022-08-08 09:49:03');

-- --------------------------------------------------------
create sequence contacts_Seq start with 2;
alter table contacts alter column id set default nextval('contacts_seq');
--
-- Структура таблиці contact_forms
--

CREATE TABLE contact_forms (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  subject varchar(255) NOT NULL,
  message text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці contact_forms
--

INSERT INTO contact_forms (id, name, email, subject, message, created_at, updated_at) VALUES
(1, 'Yanush Polishchuk', 'yanush.polishchuk@gmail.com', 'I need your phone number', 'Please, send me your phone number.', '2022-08-02 03:44:04', NULL),
(2, 'Jack', 'jack@gmail.com', 'New Subject', 'How you doin ?', '2022-09-25 06:01:58', NULL);

-- --------------------------------------------------------
create sequence contact_forms_Seq start with 3;
alter table contact_forms alter column id set default nextval('contact_forms_seq');
--
-- Структура таблиці failed_jobs
--

CREATE TABLE failed_jobs (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  uuid varchar(255) NOT NULL,
  connection text NOT NULL,
  queue text NOT NULL,
  payload text NOT NULL,
  exception text NOT NULL,
  failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Структура таблиці features
--

CREATE TABLE features (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  title varchar(255) NOT NULL,
  color varchar(255) NOT NULL,
  form varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці features
--

INSERT INTO features (id, title, color, form, created_at, updated_at) VALUES
(1, 'Lorem Ipsum', '#ffbb2c', 'store', '2022-08-10 05:26:30', NULL),
(2, 'Dolor Sitema', '#5578ff', 'bar-chart-box', '2022-08-10 05:27:37', NULL),
(3, 'Sed perspiciatis', '#e80368', 'calendar-todo', '2022-08-10 05:28:10', NULL),
(4, 'Magni Dolores', '#e361ff', 'paint-brush', '2022-08-10 05:28:47', NULL),
(5, 'Nemo Enim', '#47aeff', 'database-2', '2022-08-10 05:29:23', NULL),
(6, 'Eiusmod Tempor', '#ffa76e', 'gradienter', '2022-08-10 05:29:45', NULL),
(7, 'Midela Teren', '#11dbcf', 'file-list-3', '2022-08-10 05:30:47', NULL),
(8, 'Pira Neve', '#4233ff', 'price-tag-2', '2022-08-10 05:31:24', NULL),
(9, 'Dirada Pack', '#b2904f', 'anchor', '2022-08-10 05:34:53', NULL),
(10, 'Moton Ideal', '#b20969', 'disc', '2022-08-10 05:35:21', NULL),
(11, 'Verdo Park', '#ff5828', 'base-station', '2022-08-10 05:35:44', NULL),
(12, 'Flavor Nivelanda', '#29cc61', 'fingerprint', '2022-08-10 05:36:07', NULL);

-- --------------------------------------------------------
create sequence features_Seq start with 13;
alter table features alter column id set default nextval('features_seq');
--
-- Структура таблиці f_a_q_s
--

CREATE TABLE f_a_q_s (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  question text NOT NULL,
  answer text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці f_a_q_s
--

INSERT INTO f_a_q_s (id, question, answer, created_at, updated_at) VALUES
(1, '<p>Non consectetur a erat nam at lectus urna duis?</p>', '<p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>', '2022-08-13 06:16:45', NULL),
(2, '<p>Feugiat scelerisque varius morbi enim nunc?</p>', '<p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>', '2022-08-13 06:20:31', NULL),
(3, '<p>Dolor sit amet consectetur adipiscing elit?</p>', '<p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis.</p>', '2022-08-13 06:21:17', NULL),
(4, '<p>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</p>', '<p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.</p>', '2022-08-13 06:21:56', NULL),
(5, '<p>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</p>', '<p>Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.</p>', '2022-08-13 06:22:36', NULL);

-- --------------------------------------------------------
create sequence f_a_q_s_Seq start with 6;
alter table f_a_q_s alter column id set default nextval('f_a_q_s_seq');
--
-- Структура таблиці home_abouts
--

CREATE TABLE home_abouts (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  title varchar(255) NOT NULL,
  short_des text NOT NULL,
  long_des text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці home_abouts
--

INSERT INTO home_abouts (id, title, short_des, long_des, created_at, updated_at) VALUES
(1, 'EUM IPSAM LABORUM DELENITI VELITENA', '<p>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</p>', '<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<ul class=\"tox-checklist\">\r\n<li class=\"tox-checklist--checked\">- Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>\r\n<li class=\"tox-checklist--checked\">- Duis aute irure dolor in reprehenderit in voluptate velit</li>\r\n<li class=\"tox-checklist--checked\">- Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '2022-07-30 09:35:04', '2022-08-10 12:35:25');

-- --------------------------------------------------------
create sequence home_abouts_Seq start with 2;
alter table home_abouts alter column id set default nextval('home_abouts_seq');
--
-- Структура таблиці home_services
--

CREATE TABLE home_services (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  title varchar(255) NOT NULL,
  description text NOT NULL,
  icon_color varchar(255) NOT NULL,
  icon_form varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці home_services
--

INSERT INTO home_services (id, title, description, icon_color, icon_form, created_at, updated_at) VALUES
(1, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 'blue', 'globe', '2022-07-31 13:25:26', '2022-07-31 13:36:56'),
(2, 'Sed Perspiciatis', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'orange', 'file', '2022-07-31 13:26:25', NULL),
(3, 'Magni Dolores', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia', 'pink', 'tachometer', '2022-07-31 13:27:40', NULL),
(4, 'Nemo Enim', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 'yellow', 'layer', '2022-07-31 13:28:33', NULL),
(5, 'Dele Cardo', 'Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur', 'red', 'slideshow', '2022-07-31 13:29:16', NULL),
(6, 'Divera Don', '<p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>', 'teal', 'arch', '2022-07-31 13:30:19', '2022-08-23 15:13:19');

-- --------------------------------------------------------
create sequence home_services_Seq start with 7;
alter table home_services alter column id set default nextval('home_services_seq');
--
-- Структура таблиці migrations
--

CREATE TABLE migrations (
  id SERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  migration varchar(255) NOT NULL,
  batch int NOT NULL
);

--
-- Дамп даних таблиці migrations
--

INSERT INTO migrations (id, migration, batch) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
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
(22, '2022_08_02_060003_create_contact_forms_table', 11),
(23, '2022_08_09_152537_create_features_table', 12),
(24, '2022_08_10_092951_create_team_members_table', 13),
(25, '2022_08_11_103330_create_skills_table', 14),
(26, '2022_08_12_092158_create_testimonials_table', 15),
(27, '2022_08_12_123808_create_prices_table', 16),
(28, '2022_08_13_082120_create_f_a_q_s_table', 17),
(29, '2022_08_14_063000_create_articles_table', 18),
(30, '2022_08_15_095224_create_article_category_table', 19),
(31, '2022_08_15_103810_create_articles_table', 20),
(32, '2022_08_16_132559_create_authors_table', 21),
(33, '2022_08_16_134030_create_tags_table', 21),
(34, '2022_08_16_134814_create_articles_table', 22),
(35, '2022_08_16_143144_create_tags_table', 23),
(36, '2022_08_18_071610_create_article_tag_table', 24),
(39, '2014_10_12_000000_create_users_table', 25),
(40, '2022_08_23_053403_create_admins_table', 25),
(42, '2022_09_08_081740_create_comments_table', 26),
(44, '2022_09_08_140404_create_users_table', 27),
(45, '2022_09_12_092233_create_articles_table', 28),
(46, '2022_09_12_092327_create_comments_table', 28),
(47, '2016_06_01_000001_create_oauth_auth_codes_table', 29),
(48, '2016_06_01_000002_create_oauth_access_tokens_table', 29),
(49, '2016_06_01_000003_create_oauth_refresh_tokens_table', 29),
(50, '2016_06_01_000004_create_oauth_clients_table', 29),
(51, '2016_06_01_000005_create_oauth_personal_access_clients_table', 29),
(52, '2019_05_03_000001_create_customer_columns', 30),
(53, '2019_05_03_000002_create_subscriptions_table', 30),
(54, '2019_05_03_000003_create_subscription_items_table', 30),
(56, '2022_09_22_091917_add_price_id_to_prices_table', 31),
(57, '2022_09_24_084841_create_newsletter_subscribers_table', 32),
(58, '2022_09_25_134229_add_page_id_to_sliders_table', 33);

-- --------------------------------------------------------
create sequence migrations_Seq start with 59;
alter table migrations alter column id set default nextval('migrations_seq');
--
-- Структура таблиці multipics
--

CREATE TABLE multipics (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці multipics
--

INSERT INTO multipics (id, image, created_at, updated_at) VALUES
(1, 'image/multi/1741045263786883.jpg', '2022-08-13 08:29:12', NULL),
(2, 'image/multi/1741045264908881.jpg', '2022-08-13 08:29:12', NULL),
(3, 'image/multi/1741045265507295.jpg', '2022-08-13 08:29:13', NULL),
(4, 'image/multi/1741045265890129.jpg', '2022-08-13 08:29:13', NULL),
(5, 'image/multi/1741045266223049.jpg', '2022-08-13 08:29:14', NULL),
(6, 'image/multi/1741045266522654.jpg', '2022-08-13 08:29:14', NULL),
(7, 'image/multi/1741045266797175.jpg', '2022-08-13 08:29:14', NULL),
(8, 'image/multi/1741045267171316.jpg', '2022-08-13 08:29:15', NULL),
(9, 'image/multi/1741045267504363.png', '2022-08-13 08:29:15', NULL),
(10, 'image/multi/1741045268112786.png', '2022-08-13 08:29:15', NULL),
(11, 'image/multi/1741045268653365.jpg', '2022-08-13 08:29:16', NULL),
(12, 'image/multi/1741046651954807.jpg', '2022-08-13 08:51:15', NULL);

-- --------------------------------------------------------
create sequence multipics_Seq start with 13;
alter table multipics alter column id set default nextval('multipics_seq');
--
-- Структура таблиці password_resets
--

CREATE TABLE password_resets (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці password_resets
--

INSERT INTO password_resets (email, token, created_at) VALUES
('chandler@gmail.com', '$2y$10$3fEb2wAV4TiW6Ry038BYRe2el7A10bfU2uT9TFSowuhSbZHAa0wLO', '2022-09-05 08:00:24');

-- --------------------------------------------------------

--
-- Структура таблиці personal_access_tokens
--

CREATE TABLE personal_access_tokens (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  tokenable_type varchar(255) NOT NULL,
  tokenable_id bigint NOT NULL CHECK (tokenable_id >= 0),
  name varchar(255) NOT NULL,
  token varchar(64) NOT NULL,
  abilities text,
  last_used_at timestamp NULL DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Структура таблиці prices
--

CREATE TABLE prices (
  id SERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  title varchar(255) NOT NULL,
  price_id varchar(255) NOT NULL DEFAULT 'none',
  price int NOT NULL,
  features text NOT NULL,
  advanced int NOT NULL DEFAULT '0',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці prices
--

INSERT INTO prices (id, title, price_id, price, features, advanced, created_at, updated_at) VALUES
(1, 'Free', 'none', 0, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li><s>Pharetra massa</s></li>\r\n<li><s>Massa ultricies mi</s></li>\r\n</ul>', 0, '2022-08-12 11:57:58', '2022-09-23 08:56:10'),
(2, 'Business', 'price_1LkkccAN7OPdNadIgtAYKdG7', 19, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li><s>Massa ultricies mi</s></li>\r\n</ul>', 0, '2022-08-12 12:17:31', '2022-09-23 09:13:24'),
(3, 'Developer', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 29, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li>Massa ultricies mi</li>\r\n</ul>', 0, '2022-08-12 12:18:14', '2022-09-23 09:14:43'),
(4, 'Ultimate', 'price_1LkkccAN7OPdNadIP9wlGLb5', 49, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li>Massa ultricies mi</li>\r\n</ul>', 1, '2022-08-12 12:18:49', '2022-09-23 09:15:04');

-- --------------------------------------------------------
create sequence prices_Seq start with 5;
alter table prices alter column id set default nextval('prices_seq');
--
-- Структура таблиці sessions
--

CREATE TABLE sessions (
  id varchar(255) NOT NULL,
  user_id bigint DEFAULT NULL CHECK (user_id >= 0),
  ip_address varchar(45) DEFAULT NULL,
  user_agent text,
  payload text NOT NULL,
  last_activity int NOT NULL
);

--
-- Дамп даних таблиці sessions
--

INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity) VALUES
('QO3ZP85vsoSeJlV4W46K42f6z5Oz5eg9oNHI8cNW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieE9yclR1R25ac0JCUzZZR1YwV0xZd2Ewa2dXNjBmSWsxTkh6YWFwViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2NoZWNrb3V0LzMiO319', 1664175712),
('Up5QtWogfNGAnFrUq2EsKTV53j4WKdruFSQ4l7w7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjZtWjlJQ3dSbjAxd2RGUnlSSnd3NTdPbGw0Z2dwNWcxSG9yV1NhciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1664117445);

-- --------------------------------------------------------

--
-- Структура таблиці skills
--

CREATE TABLE skills (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  skill_name varchar(255) NOT NULL,
  value int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці skills
--

INSERT INTO skills (id, skill_name, value, created_at, updated_at) VALUES
(1, 'HTML', 100, '2022-08-11 08:20:21', '2022-08-11 08:28:12'),
(2, 'CSS', 90, '2022-08-11 08:21:13', NULL),
(3, 'JavaScript', 75, '2022-08-11 08:22:00', NULL),
(4, 'PHP', 80, '2022-08-11 08:22:20', NULL),
(5, 'WordPress/CMS', 90, '2022-08-11 08:22:37', NULL),
(6, 'Photoshop', 55, '2022-08-11 08:22:51', NULL);

-- --------------------------------------------------------
create sequence skills_Seq start with 7;
alter table skills alter column id set default nextval('skills_seq');
--
-- Структура таблиці sliders
--

CREATE TABLE sliders (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  title varchar(255) DEFAULT NULL,
  page_id varchar(255) DEFAULT NULL,
  description text,
  image varchar(255) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці sliders
--

INSERT INTO sliders (id, title, page_id, description, image, created_at, updated_at) VALUES
(1, 'Slider One', 'home', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider One mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741044135700075.jpg', NULL, '2022-08-13 08:11:15'),
(2, 'Slider Image Two', 'home', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider Image Two mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741044197261046.jpg', NULL, '2022-08-13 08:12:14'),
(3, 'Slider Number Three', 'home', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741038368031160.jpg', '2022-07-30 04:29:41', '2022-08-13 06:39:35'),
(4, 'New Technologies', 'user', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider One mollitia ut. Similique ea voluptatem sanctum.</p>', 'image/slider/1744950238727613.jpg', '2022-09-25 10:57:06', '2022-09-25 11:19:47'),
(5, 'Artificial Intelligence', 'user', '<p>Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto. Sequi ea ut et est quaerat sequi nihil ut aliquam.</p>', 'image/slider/1744950408046635.jpg', '2022-09-25 10:59:47', NULL),
(6, 'Open New Horizons', 'user', '<p>Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>', 'image/slider/1744951615113594.jpg', '2022-09-25 11:00:48', '2022-09-25 11:18:59');

-- --------------------------------------------------------
create sequence sliders_Seq start with 7;
alter table sliders alter column id set default nextval('sliders_seq');
--
-- Структура таблиці subscriptions
--

CREATE TABLE subscriptions (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  user_id bigint NOT NULL CHECK (user_id >= 0),
  name varchar(255) NOT NULL,
  stripe_id varchar(255) NOT NULL,
  stripe_status varchar(255) NOT NULL,
  stripe_price varchar(255) DEFAULT NULL,
  quantity int DEFAULT NULL,
  trial_ends_at timestamp NULL DEFAULT NULL,
  ends_at timestamp NULL DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці subscriptions
--

INSERT INTO subscriptions (id, user_id, name, stripe_id, stripe_status, stripe_price, quantity, trial_ends_at, ends_at, created_at, updated_at) VALUES
(1, 1, 'plans', 'sub_1LlCr8AN7OPdNadItq5oVJ6G', 'active', 'price_1LkkccAN7OPdNadIgtAYKdG7', 1, NULL, NULL, '2022-09-23 11:27:57', '2022-09-23 11:28:00'),
(2, 1, 'plans', 'sub_1LlDLbAN7OPdNadI0aFz841d', 'active', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 1, NULL, NULL, '2022-09-23 11:59:26', '2022-09-23 11:59:29'),
(3, 2, 'plans', 'sub_1LlEqMAN7OPdNadIdNGoIpnl', 'active', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 1, NULL, NULL, '2022-09-23 13:35:17', '2022-09-23 13:35:21');

-- --------------------------------------------------------
create sequence subscriptions_Seq start with 4;
alter table subscriptions alter column id set default nextval('subscriptions_seq');
--
-- Структура таблиці subscription_items
--

CREATE TABLE subscription_items (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  subscription_id bigint NOT NULL CHECK (subscription_id >= 0),
  stripe_id varchar(255) NOT NULL,
  stripe_product varchar(255) NOT NULL,
  stripe_price varchar(255) NOT NULL,
  quantity int DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці subscription_items
--

INSERT INTO subscription_items (id, subscription_id, stripe_id, stripe_product, stripe_price, quantity, created_at, updated_at) VALUES
(1, 1, 'si_MUBDiBnMnKIzNR', 'prod_MTi2mU88FSOl2w', 'price_1LkkccAN7OPdNadIgtAYKdG7', 1, '2022-09-23 11:27:57', '2022-09-23 11:27:57'),
(2, 2, 'si_MUBjMAwaccJhYN', 'prod_MTi2mU88FSOl2w', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 1, '2022-09-23 11:59:26', '2022-09-23 11:59:26'),
(3, 3, 'si_MUDGLzJWP7JIKZ', 'prod_MTi2mU88FSOl2w', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 1, '2022-09-23 13:35:18', '2022-09-23 13:35:18');

-- --------------------------------------------------------
create sequence subscription_items_Seq start with 4;
alter table subscription_items alter column id set default nextval('subscription_items_seq');
--
-- Структура таблиці tags
--

CREATE TABLE tags (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці tags
--

INSERT INTO tags (id, name, created_at, updated_at, deleted_at) VALUES
(1, 'App', '2022-08-16 11:35:56', NULL, NULL),
(2, 'IT', '2022-08-16 11:36:04', NULL, NULL),
(3, 'Business', '2022-08-16 11:36:14', NULL, NULL),
(4, 'Design', '2022-08-16 11:36:46', NULL, NULL),
(5, 'Office', '2022-08-16 11:37:00', NULL, NULL),
(6, 'Creative', '2022-08-16 11:37:09', NULL, NULL),
(7, 'Studio', '2022-08-16 11:37:17', NULL, NULL),
(8, 'Smart', '2022-08-16 11:38:00', NULL, NULL),
(9, 'Tips', '2022-08-16 11:38:07', NULL, NULL),
(10, 'Marketing', '2022-08-16 11:38:16', NULL, NULL),
(11, 'Auto', '2022-08-16 11:39:01', '2022-08-16 11:41:53', '2022-08-16 11:41:53');

-- --------------------------------------------------------
create sequence tags_Seq start with 12;
alter table tags alter column id set default nextval('tags_seq');
--
-- Структура таблиці team_members
--

CREATE TABLE team_members (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  position varchar(255) NOT NULL,
  photo varchar(255) NOT NULL,
  twitter varchar(255) NOT NULL DEFAULT '#',
  facebook varchar(255) NOT NULL DEFAULT '#',
  instagram varchar(255) NOT NULL DEFAULT '#',
  linkedin varchar(255) NOT NULL DEFAULT '#',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці team_members
--

INSERT INTO team_members (id, name, position, photo, twitter, facebook, instagram, linkedin, created_at, updated_at) VALUES
(1, 'Ross Geller', 'Chief Executive Officer', 'image/team/1741207839465172.jpg', '#', '#', '#', '#', '2022-08-10 11:31:32', '2022-08-15 03:33:16'),
(2, 'Monica Geller', 'Product Manager', 'image/team/1740858793846876.jpg', '#', '#', '#', '#', '2022-08-10 12:19:33', '2022-08-11 07:05:20'),
(3, 'Chandler Bing', 'CTO', 'image/team/1741046942091668.jpg', '#', '#', '#', '#', '2022-08-10 12:24:03', '2022-08-13 08:55:52'),
(4, 'Rachel Green', 'Accountant', 'image/team/1741046972033677.jpg', '#', '#', '#', '#', '2022-08-10 12:31:15', '2022-08-13 08:56:20');

-- --------------------------------------------------------
create sequence team_members_Seq start with 5;
alter table team_members alter column id set default nextval('team_members_seq');
--
-- Структура таблиці testimonials
--

CREATE TABLE testimonials (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  position varchar(255) NOT NULL,
  text text NOT NULL,
  photo varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці testimonials
--

INSERT INTO testimonials (id, name, position, text, photo, created_at, updated_at) VALUES
(1, 'Saul Goodman', 'Ceo & Founder', '<p>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>', 'image/testims/1740950631243488.jpg', '2022-08-12 07:25:03', '2022-08-12 08:27:13'),
(2, 'Sara Wilsson', 'Designer', '<p>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</p>', 'image/testims/1740954510953362.jpg', '2022-08-12 08:26:43', NULL),
(3, 'Jena Karlis', 'Store Owner', '<p>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</p>', 'image/testims/1740954597100346.jpg', '2022-08-12 08:28:05', NULL),
(4, 'Matt Brandon', 'Freelancer', '<p>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</p>', 'image/testims/1740954646636602.jpg', '2022-08-12 08:28:52', NULL),
(5, 'John Larson', 'Entrepreneur', '<p>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</p>', 'image/testims/1740954689623798.jpg', '2022-08-12 08:29:33', NULL),
(6, 'Emily Harison', 'Store Owner', '<p>Eius ipsam praesentium dolor quaerat inventore rerum odio. Quos laudantium adipisci eius. Accusamus qui iste cupiditate sed temporibus est aspernatur. Sequi officiis ea et quia quidem.</p>', 'image/testims/1740954737239059.jpg', '2022-08-12 08:30:19', NULL);

-- --------------------------------------------------------
create sequence testimonials_Seq start with 7;
alter table testimonials alter column id set default nextval('testimonials_seq');
--
-- Структура таблиці users
--

CREATE TABLE users (
  id BIGSERIAL PRIMARY KEY NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  mobile varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  current_team_id bigint DEFAULT NULL CHECK (current_team_id >= 0),
  profile_photo_path varchar(2048) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  stripe_id varchar(255) DEFAULT NULL,
  pm_type varchar(255) DEFAULT NULL,
  pm_last_four varchar(4) DEFAULT NULL,
  trial_ends_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці users
--

INSERT INTO users (id, name, email, mobile, email_verified_at, password, remember_token, current_team_id, profile_photo_path, created_at, updated_at, stripe_id, pm_type, pm_last_four, trial_ends_at) VALUES
(1, 'John Gibson', 'john@gmail.com', '0991755332', '2022-09-09 05:09:29', '$2y$10$QqNbwYBz.nPArqclPs3Jg.AwGsF21zX6O651Prx7fW3bqXbWcN5ZS', NULL, NULL, NULL, '2022-09-09 05:09:14', '2022-09-23 11:27:55', 'cus_MUBDHojSFRshxh', 'visa', '4242', NULL),
(2, 'Ross Geller', 'ross@gmail.com', '0991755343', '2022-09-09 05:56:19', '$2y$10$3omYVd9erLGa6z.WJfdH7OoHCbkDVi2jwK0DYCPEcyOEiodPNoIo.', NULL, NULL, 'profile-photos/1743483882472783.jpg', '2022-09-09 05:56:08', '2022-09-23 13:35:16', 'cus_MUDGYpwJY48Fzo', 'visa', '4242', NULL),
(3, 'Rachel Green', 'rachel@gmail.com', '0991755318', '2022-09-09 06:35:10', '$2y$10$KOEfjPTxuzeYDtmxQUfZy.r1n/sbLtBz4o0S6vu.gy/h5C6V0UrUG', NULL, NULL, NULL, '2022-09-09 06:35:00', '2022-09-09 06:35:10', NULL, NULL, NULL, NULL);

create sequence users_Seq start with 4;
alter table users alter column id set default nextval('users_seq');