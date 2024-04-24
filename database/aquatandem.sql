-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 20 2024 г., 01:11
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
-- База данных: `aquatandem`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `ID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`ID`, `SRC`) VALUES
(1, 'img/slider/65d2698ef036b.png'),
(2, 'img/slider/65d269f707b43.jpg'),
(3, 'img/slider/65d26b9f68611.jpg'),
(4, 'img/slider/65d26bb700e4c.jpg'),
(5, 'img/slider/65d26bd69ab19.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `NAME`) VALUES
(1, 'Прямоугольные аквариумы'),
(2, 'Панорамные аквариумы'),
(3, 'Угловые аквариумы'),
(4, 'Настенные аквариумы'),
(5, 'Круглые аквариумы');

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `ID` int NOT NULL,
  `IDUSER` int NOT NULL,
  `IDPROD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `favourites`
--

INSERT INTO `favourites` (`ID`, `IDUSER`, `IDPROD`) VALUES
(8, 1, 6),
(9, 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `IDUSER` int NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `STATUS` int NOT NULL,
  `AMOUNT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `CITY` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `IDUSER`, `DATE`, `STATUS`, `AMOUNT`, `NAME`, `MAIL`, `NUMBER`, `CITY`, `ADDRESS`) VALUES
(2, 1, '20.02.2024 г.', 1, 159002, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999 99 99', 'Москва', 'ул. Толстого д.3 кв.10'),
(3, 1, '20.02.2024 г.', 3, 120632, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999 99 99', 'Москва', 'ул. Толстого д.3 кв.10');

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `IDORDER` int NOT NULL,
  `IDPROD` int NOT NULL,
  `COLOR` varchar(255) NOT NULL,
  `QUANTITY` int NOT NULL,
  `AMOUNT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`IDORDER`, `IDPROD`, `COLOR`, `QUANTITY`, `AMOUNT`) VALUES
(1, 4, '123', 1, 123),
(1, 4, 'asdfasdf', 1, 123),
(2, 7, 'Отбеленный дуб', 1, 120632),
(2, 6, 'Отбеленный дуб', 2, 38370),
(3, 7, 'Отбеленный дуб', 1, 120632);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `IDCAT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CODE` int NOT NULL,
  `SHORTDESC` varchar(255) NOT NULL,
  `PRICE` int NOT NULL,
  `PRODUCER` varchar(255) NOT NULL,
  `CONTRY` varchar(255) NOT NULL,
  `LIGHT` int NOT NULL,
  `GLASS` int NOT NULL,
  `HEIGHT` int NOT NULL,
  `VOLUME` int NOT NULL,
  `XSIZE` int NOT NULL,
  `YSIZE` int NOT NULL,
  `ZSIZE` int NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `IDCAT`, `NAME`, `CODE`, `SHORTDESC`, `PRICE`, `PRODUCER`, `CONTRY`, `LIGHT`, `GLASS`, `HEIGHT`, `VOLUME`, `XSIZE`, `YSIZE`, `ZSIZE`, `DESCRIPTION`) VALUES
(6, 1, 'Аквариум Biodesign Риф 100 (100 л)', 19742, 'Прямоугольный аквариум объемом 100 литров.', 19185, 'Biodesign', 'Россия', 30, 6, 100, 100, 56, 44, 52, 'Аквариум Риф 100, имеющий форму куба, изготовлен из высокотехнологичного стекла Pilkington Optifloat, что обеспечивает его особую прочность. Технология производства полностью соответствует европейским стандартам. Все края имеют специальную обработку, обеспечивающую плотное прилегание стенок и их герметичное склеивание. А значит и отсутствие протечек.\r\n\r\nТумба, на которую устанавливается аквариум, изготавливается из качественных материалов: ЛДСП разных цветов и фактур и стильной современной фурнитуры. Современное производство и технологии, которые используются при изготовлении данной модели, обеспечивают великолепное качество продукции.\r\n\r\nК числу очевидных преимуществ аквариумов Риф 100 можно отнести:\r\n\r\nиспользование специальных стекол PILKINGTON, которые имеют повышенный коэффициент устойчивости к нагрузкам и возможным механическим воздействиям;\r\nособая прочность конструкции;\r\nсовременный дизайн;\r\nсоответствие всем современным стандартам;\r\nкомплектация специальными энергосберегающими, безопасными лампами, каждая из которых помещена в герметичную колбу.'),
(7, 1, 'Аквариум Biodesign Атолл 1000 (825 л)', 19673, 'Большой прямоугольный аквариум объемом 850 литров.', 120632, 'Biod', 'Россия', 312, 12, 100, 825, 201, 66, 76, 'Аквариум Атолл 1000 от компании Biodesign – это одна из самых габаритных моделей в классической линейке \"Атолл\". Солидные размеры данного образца позволяют создавать впечатляющие композиции и содержать рыб самых разных размеров.\r\n\r\nДля выпуска аквариумов Атолл 1000 производитель использует самые передовые технологии и только качественные материалы. Вся продукция полностью соответствует строгим европейским стандартам.\r\n\r\nСтекла PIKINGTON, которые используются для изготовления, имеют оптимальную толщину, обеспечивающую необходимую стойкость к нагрузкам и различного рода воздействиям.\r\n\r\nВ зависимости от пожелания заказчика аквариум может быть установлен на специальную тумбу, дизайн и стиль которой может быть также выбран индивидуально.\r\n\r\nОсновные преимущества аквариумов «Атолл 1000»:\r\n\r\nбольшой объем - 825 л;\r\nвнешняя эстетика;\r\nкачественные материалы RENOLIT и LG HAUSYS;  \r\nособая конструкция крышки;\r\nравномерное распределение нагрузки, так называемая «технология плавающего дна»;\r\nвстроенное освещение;\r\nгарантия 5 лет.');

-- --------------------------------------------------------

--
-- Структура таблицы `products_color`
--

CREATE TABLE `products_color` (
  `IDPROD` int NOT NULL,
  `COLOR1` varchar(255) NOT NULL,
  `COLOR2` varchar(255) NOT NULL,
  `COLOR3` varchar(255) NOT NULL,
  `COLOR4` varchar(255) NOT NULL,
  `COLOR5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_color`
--

INSERT INTO `products_color` (`IDPROD`, `COLOR1`, `COLOR2`, `COLOR3`, `COLOR4`, `COLOR5`) VALUES
(6, 'Отбеленный дуб', 'Белый', 'Бук', '', ''),
(7, 'Отбеленный дуб', 'Белый', 'Бук', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `products_img`
--

CREATE TABLE `products_img` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_img`
--

INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) VALUES
(15, 6, 'img/product/65d3d0044c63c.jpg'),
(16, 6, 'img/product/65d3d0044cbc7.jpg'),
(17, 6, 'img/product/65d3d0044d0c8.jpg'),
(18, 7, 'img/product/65d3d0e4ade46.jpg'),
(19, 7, 'img/product/65d3d0e4ae640.jpg'),
(20, 7, 'img/product/65d3d0e4aeebd.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_new`
--

CREATE TABLE `products_new` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_new`
--

INSERT INTO `products_new` (`ID`, `IDPROD`) VALUES
(7, 6),
(8, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `products_sale`
--

CREATE TABLE `products_sale` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_sale`
--

INSERT INTO `products_sale` (`ID`, `IDPROD`) VALUES
(9, 6),
(10, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `product_aqua`
--

CREATE TABLE `product_aqua` (
  `ID` int NOT NULL,
  `SRC` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product_aqua`
--

INSERT INTO `product_aqua` (`ID`, `SRC`, `TITLE`, `DESCR`) VALUES
(4, 'img/accessories/65d29433dfa6d.png', 'Автокормушки', 'удобное решение автоматизации процесса кормления обитателей аквариума, особенно актуально их применение в период вашего длительного отсутствия;');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `CITY` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `MAIL`, `NUMBER`, `CITY`, `ADDRESS`) VALUES
(1, 'user', 'u', 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999 99 99', 'Москва', 'ул. Толстого д.3 кв.10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_new`
--
ALTER TABLE `products_new`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_sale`
--
ALTER TABLE `products_sale`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `product_aqua`
--
ALTER TABLE `product_aqua`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `products_img`
--
ALTER TABLE `products_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `products_new`
--
ALTER TABLE `products_new`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products_sale`
--
ALTER TABLE `products_sale`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product_aqua`
--
ALTER TABLE `product_aqua`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
