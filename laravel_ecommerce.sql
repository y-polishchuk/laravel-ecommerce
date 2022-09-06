
CREATE TABLE IF NOT EXISTS articles (
  id bigint CHECK (id >= 0),
  title varchar(255) NOT NULL,
  entry_content text NOT NULL,
  entry_img varchar(255) NOT NULL,
  main_content text NOT NULL,
  category_id int NOT NULL CHECK (category_id >= 0),
  author_id int NOT NULL CHECK (author_id >= 0),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці articles
--

INSERT INTO articles (id, title, entry_content, entry_img, main_content, category_id, author_id, created_at, updated_at) VALUES
(1, 'Consectetur quasi id et optio praesentium aut asperiores eaque aut', '<p>Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor.</p>', 'image/article/1660729181.jpg', '<p>Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p>\r\n<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 6, 1, '2022-08-17 06:39:41', '2022-08-17 06:39:41'),
(2, 'Non rem rerum nam cum quo minus, dolor distinctio deleniti explicabo eius exercitationem', '<p>Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.</p>', 'image/article/1660729306.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<p><img style=\"height: auto;\" src=\"assets/img/blog-5.jpg\" alt=\"\"></p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 1, 3, '2022-08-17 06:41:46', '2022-08-17 06:41:46'),
(3, 'Possimus soluta ut id suscipit ea ut, in quo quia et soluta libero sit sint', '<p>Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.</p>', 'image/article/1660729400.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<p><img style=\"height: auto;\" src=\"assets/img/blog-5.jpg\" alt=\"\"></p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 1, 4, '2022-08-17 06:43:20', '2022-08-17 06:43:20'),
(4, 'Nisi magni odit consequatur autem nulla dolorem', '<p>Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.</p>', 'image/article/1660729476.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<p><img style=\"height: auto;\" src=\"assets/img/blog-5.jpg\" alt=\"\"></p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 4, 1, '2022-08-17 06:44:36', '2022-08-17 06:44:36'),
(5, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia reiciendis', '<p>Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.</p>', 'image/article/1660729541.jpg', '<p>Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n<blockquote>\r\n<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>\r\n</blockquote>\r\n<p>Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat. Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque. Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.</p>\r\n<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>\r\n<p><img style=\"height: auto;\" src=\"assets/img/blog-5.jpg\" alt=\"\"></p>\r\n<h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>\r\n<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.</p>', 7, 2, '2022-08-17 06:45:41', '2022-08-17 06:45:41');

-- --------------------------------------------------------

--
-- Структура таблиці article_tag
--

CREATE TABLE IF NOT EXISTS article_tag (
  id bigint NOT NULL CHECK (id >= 0),
  article_id int NOT NULL,
  tag_id int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці article_tag
--

INSERT INTO article_tag (id, article_id, tag_id, created_at, updated_at) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 1, 7, NULL, NULL),
(4, 5, 6, NULL, NULL),
(5, 5, 9, NULL, NULL),
(6, 5, 10, NULL, NULL),
(7, 2, 4, NULL, NULL),
(8, 2, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 3, 1, NULL, NULL),
(11, 3, 2, NULL, NULL),
(12, 3, 3, NULL, NULL),
(13, 4, 1, NULL, NULL),
(14, 4, 6, NULL, NULL),
(15, 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці authors
--

CREATE TABLE IF NOT EXISTS authors (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці brands
--

CREATE TABLE IF NOT EXISTS brands (
  id bigint NOT NULL CHECK (id >= 0),
  brand_name varchar(255) NOT NULL,
  brand_image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці brands
--

INSERT INTO brands (id, brand_name, brand_image, created_at, updated_at) VALUES
(9, 'Porsche', 'image/brand/1739690622594797.png', '2022-07-29 09:37:45', NULL),
(11, 'Ferrari', 'image/brand/1739691501255365.png', '2022-07-29 09:38:43', '2022-07-29 09:51:43'),
(13, 'Audi', 'image/brand/1740221582189815.jpg', '2022-08-04 06:17:07', NULL),
(16, 'McLaren', 'image/brand/1741205581423162.jpg', '2022-08-04 06:21:16', '2022-08-15 02:57:22');

-- --------------------------------------------------------

--
-- Структура таблиці categories
--

CREATE TABLE IF NOT EXISTS categories (
  id bigint NOT NULL CHECK (id >= 0),
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
(10, 3, 'News', '2022-07-24 09:24:10', '2022-07-25 11:54:33', '2022-07-25 11:54:33');

-- --------------------------------------------------------

--
-- Структура таблиці contacts
--

CREATE TABLE IF NOT EXISTS contacts (
  id bigint NOT NULL CHECK (id >= 0),
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
(3, 'Kyiv, Ukraine', 'yanush.polishchuk@gmail.com', '+380991755316', '2022-08-02 02:56:14', '2022-08-08 09:49:03');

-- --------------------------------------------------------

--
-- Структура таблиці contact_forms
--

CREATE TABLE IF NOT EXISTS contact_forms (
  id bigint NOT NULL CHECK (id >= 0),
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
(1, 'Yanush Polishchuk', 'yanush.polishchuk@gmail.com', 'I need your phone number', 'Please, send me your phone number.', '2022-08-02 03:44:04', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці failed_jobs
--

CREATE TABLE IF NOT EXISTS  failed_jobs (
  id bigint NOT NULL CHECK (id >= 0),
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

CREATE TABLE IF NOT EXISTS features (
  id bigint NOT NULL  CHECK (id >= 0),
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

--
-- Структура таблиці f_a_q_s
--

CREATE TABLE IF NOT EXISTS  f_a_q_s (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці home_abouts
--

CREATE TABLE IF NOT EXISTS home_abouts (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці home_services
--

CREATE TABLE IF NOT EXISTS home_services (
  id bigint NOT NULL CHECK (id >= 0),
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
(6, 'Divera Don', 'Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur', 'teal', 'arch', '2022-07-31 13:30:19', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці migrations
--

CREATE TABLE IF NOT EXISTS migrations (
  id int NOT NULL CHECK (id >= 0),
  migration varchar(255) NOT NULL,
  batch int NOT NULL
);

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
(36, '2022_08_18_071610_create_article_tag_table', 24);

-- --------------------------------------------------------

--
-- Структура таблиці multipics
--

CREATE TABLE IF NOT EXISTS multipics (
  id bigint NOT NULL CHECK (id >= 0),
  image varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці multipics
--

INSERT INTO multipics (id, image, created_at, updated_at) VALUES
(44, 'image/multi/1741045263786883.jpg', '2022-08-13 08:29:12', NULL),
(45, 'image/multi/1741045264908881.jpg', '2022-08-13 08:29:12', NULL),
(46, 'image/multi/1741045265507295.jpg', '2022-08-13 08:29:13', NULL),
(47, 'image/multi/1741045265890129.jpg', '2022-08-13 08:29:13', NULL),
(48, 'image/multi/1741045266223049.jpg', '2022-08-13 08:29:14', NULL),
(49, 'image/multi/1741045266522654.jpg', '2022-08-13 08:29:14', NULL),
(50, 'image/multi/1741045266797175.jpg', '2022-08-13 08:29:14', NULL),
(51, 'image/multi/1741045267171316.jpg', '2022-08-13 08:29:15', NULL),
(52, 'image/multi/1741045267504363.png', '2022-08-13 08:29:15', NULL),
(53, 'image/multi/1741045268112786.png', '2022-08-13 08:29:15', NULL),
(54, 'image/multi/1741045268653365.jpg', '2022-08-13 08:29:16', NULL),
(55, 'image/multi/1741046651954807.jpg', '2022-08-13 08:51:15', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці password_resets
--

CREATE TABLE IF NOT EXISTS password_resets (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці password_resets
--

INSERT INTO password_resets (email, token, created_at) VALUES
('admin@gmail.com', '$2y$10$u7bzGsYf5Dh8XmUcMIhVbOnZ3F2BqlkJk9b4u.Vmm9lRQQbwrM346', '2022-08-09 06:15:07');

-- --------------------------------------------------------

--
-- Структура таблиці personal_access_tokens
--

CREATE TABLE IF NOT EXISTS personal_access_tokens (
  id bigint NOT NULL CHECK (id >= 0),
  tokenable_type varchar(255) NOT NULL,
  tokenable_id bigint NOT NULL CHECK (id >= 0),
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

CREATE TABLE IF NOT EXISTS prices (
  id bigint NOT NULL CHECK (id >= 0),
  title varchar(255) NOT NULL,
  price int NOT NULL,
  features text NOT NULL,
  advanced int NOT NULL DEFAULT '0',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці prices
--

INSERT INTO prices (id, title, price, features, advanced, created_at, updated_at) VALUES
(1, 'Free', 0, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li><s>Pharetra massa</s></li>\r\n<li><s>Massa ultricies mi</s></li>\r\n</ul>', 0, '2022-08-12 11:57:58', NULL),
(2, 'Business', 19, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li><s>Massa ultricies mi</s></li>\r\n</ul>', 0, '2022-08-12 12:17:31', NULL),
(3, 'Developer', 29, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li>Massa ultricies mi</li>\r\n</ul>', 0, '2022-08-12 12:18:14', NULL),
(4, 'Ultimate', 49, '<ul style=\"list-style-type: none;\">\r\n<li>Aida dere</li>\r\n<li>Nec feugiat nisl</li>\r\n<li>Nulla at volutpat dola</li>\r\n<li>Pharetra massa</li>\r\n<li>Massa ultricies mi</li>\r\n</ul>', 1, '2022-08-12 12:18:49', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці sessions
--

CREATE TABLE IF NOT EXISTS sessions (
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
('Rvy5bHsN7521l84SKyswECJTzNvDo2skEqoHRxRn', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib2ljeFpoTEJ1czl5aDJYU2VUZExoSkxxSjZVRVB0OW5xbTR5U0tzSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGRObng0N0xEZ3dZekxuUDJ2NnMyb2VhNDBIcmRnYnVPWjBpb21mYmFnWHNEdFlNakdyTENhIjt9', 1660827395);

-- --------------------------------------------------------

--
-- Структура таблиці skills
--

CREATE TABLE IF NOT EXISTS skills (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці sliders
--

CREATE TABLE IF NOT EXISTS sliders (
  id bigint NOT NULL CHECK (id >= 0),
  title varchar(255) DEFAULT NULL,
  description text,
  image varchar(255) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці sliders
--

INSERT INTO sliders (id, title, description, image, created_at, updated_at) VALUES
(1, 'Slider One', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider One mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741044135700075.jpg', NULL, '2022-08-13 08:11:15'),
(3, 'Slider Image Two', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem Slider Image Two mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741044197261046.jpg', NULL, '2022-08-13 08:12:14'),
(5, 'Slider Number Three', '<p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem.</p>', 'image/slider/1741038368031160.jpg', '2022-07-30 04:29:41', '2022-08-13 06:39:35');

-- --------------------------------------------------------

--
-- Структура таблиці tags
--

CREATE TABLE IF NOT EXISTS tags (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці team_members
--

CREATE TABLE IF NOT EXISTS team_members (
  id bigint NOT NULL CHECK (id >= 0),
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
(2, 'Ross Geller', 'Chief Executive Officer', 'image/team/1741207839465172.jpg', '#', '#', '#', '#', '2022-08-10 11:31:32', '2022-08-15 03:33:16'),
(5, 'Monica Geller', 'Product Manager', 'image/team/1740858793846876.jpg', '#', '#', '#', '#', '2022-08-10 12:19:33', '2022-08-11 07:05:20'),
(6, 'Chandler Bing', 'CTO', 'image/team/1741046942091668.jpg', '#', '#', '#', '#', '2022-08-10 12:24:03', '2022-08-13 08:55:52'),
(7, 'Rachel Green', 'Accountant', 'image/team/1741046972033677.jpg', '#', '#', '#', '#', '2022-08-10 12:31:15', '2022-08-13 08:56:20');

-- --------------------------------------------------------

--
-- Структура таблиці testimonials
--

CREATE TABLE IF NOT EXISTS testimonials (
  id bigint NOT NULL CHECK (id >= 0),
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

--
-- Структура таблиці users
--

CREATE TABLE IF NOT EXISTS users (
  id bigint NOT NULL CHECK (id >= 0),
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  two_factor_secret text,
  two_factor_recovery_codes text,
  two_factor_confirmed_at timestamp NULL DEFAULT NULL,
  remember_token varchar(100)  DEFAULT NULL,
  current_team_id bigint DEFAULT NULL CHECK (id >= 0),
  profile_photo_path varchar(2048) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

--
-- Дамп даних таблиці users
--

INSERT INTO users (id, name, email, email_verified_at, password, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, remember_token, current_team_id, profile_photo_path, created_at, updated_at) VALUES
(1, 'Ross', 'admin@gmail.com', '2022-07-28 06:08:44', '$2y$10$h1HGRUTy05sVvoZukpcUPu77jG7zICEcaKO0VKTMYDdk8L7ebQDU6', NULL, NULL, NULL, NULL, NULL, 'profile-photos/1740582909830699.jpg', '2022-07-22 15:31:36', '2022-08-08 06:00:16'),
(2, 'Chandler', 'chandler@gmail.com', '2022-07-28 06:51:58', '$2y$10$gRqmpDhQEczc6Jr58yjLFu1NSp9HM.BroxMrNCFIfqsVsJt1Bkjk6', NULL, NULL, NULL, 'qwdZD7EYJjPODm4H7gKqgkGeI2uA6fptEMzPmBahYOw1RCrZlhZoMGEPK70E', NULL, 'profile-photos/1740583222711568.jpg', '2022-07-23 02:38:41', '2022-08-09 06:50:08'),
(3, 'Test', 'test@gmail.com', '2022-07-28 06:48:01', '$2y$10$dNnx47LDgwYzLnP2v6s2oea40HrdgbuOZ0iomfbagXsDtYMjGrLCa', NULL, NULL, NULL, 'irC0yVDQkNKkqQ1v8r9Mxf5VMxQuaL72GfHsK1h8vJoFRaaVJWiaWoFujeZ3', NULL, 'profile-photos/1740583291890685.jpg', '2022-07-23 07:21:30', '2022-08-09 06:56:58'),
(4, 'Joey', 'joey@gmail.com', '2022-07-28 12:22:40', '$2y$10$FevHRlCSSHo8WKwO/0WYkO6npEmpdJHZf/hhF2qAQJgCBEEtdFCOO', NULL, NULL, NULL, NULL, NULL, 'profile-photos/1740583254449891.jpg', '2022-07-28 12:22:04', '2022-08-08 06:05:45');

