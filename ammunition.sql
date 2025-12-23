-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 25 2025 г., 19:24
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ammunition`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'BAIKAL'),
(2, 'HUGLU'),
(3, 'ATA ARMS'),
(4, 'BENELLI'),
(5, 'ASELKON');

-- --------------------------------------------------------

--
-- Структура таблицы `weapons`
--

CREATE TABLE `weapons` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `name` varchar(45) NOT NULL,
  `id_brand` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `weapons`
--

INSERT INTO `weapons` (`id`, `img_path`, `name`, `id_brand`, `description`, `cost`) VALUES
(1, 'baikal_mr27m.jpeg', 'BAIKAL MR27M', 1, 'Простая и надежная конструкция, широкий выбор исполнений и калибров делают это ружье отличным выбором как для начинающих охотников, так и для настоящих ценителей охоты с двуствольными ружьями.', 56500),
(2, 'baikal_mr_18m.jpeg', 'BAIKAL MR18M', 1, 'Гладкоствольное ружье МР-18М является наследником популярного охотничьего ружья ИЖ-18, запущенного в серию в 1964 году и снискавшего широкую популярность у нескольких поколений охотников в нашей стране и за рубежом', 23667),
(3, 'aselkon_ask_23_ejector_wood.jpeg', 'ASELKON ASK23 EJECTOR WOOD', 5, 'Двуствольное ружье Aselkon ASK-23 Ejector Wood – переломная модель с вертикальным расположением стволов и одним спусковым крючком, в основном предназначенная для спортивной стрельбы, но может использоваться и как охотничья.', 101250),
(4, 'ata_arms_sp_black.jpeg', 'ATA ARMS SP BLACK', 3, 'Ata Arms SP Black – классическое охотничье двуствольное ружье. Один спусковой крючок. Селекторное переключение стволов. Цевьё и приклад данной модели выполнены из ореха, покрытого лаком.', 126990),
(5, 'benelli_vinci_black.jpeg', 'BENELLI VINCI BLACK', 4, 'Benelli Vinci Black - первое и единственное самозарядное ружье, магазин которого в целях наибольшей безопасности и практичности может быть полностью разряжен простым нажатием кнопки.', 414100),
(6, 'huglu_renova_black_wood.jpeg', 'HUGLU RENOVA BLACK WOOD', 2, 'Полуавтоматическое гладкоствольное ружье Huglu Renova 12 калибра сочетает в себе простоту, отточенный механизм, эргономичный дизайн.', 54000),
(7, 'baikal_mr_43.jpeg', 'BAIKAL MR43', 1, 'Двуствольное ружье МР-43 Русич - модель в улучшенном исполнении, калибра 12x70 мм, с переломным типом заряжания, с горизонтальным расположением стволов и двумя спусковыми крючками', 52630),
(8, 'benelli_colombo.jpeg', 'BENELLI COLOMBO', 4, 'Самозарядное ружьё «Colombo» разработано специально для охоты на диких голубей. Новый криочок «long shot», которым комплектуются ружья со стволом 710 мм, предназначен для стрельбы вертикально вверх и на дальние дистанции (50-60 м) при охоте на перелётах. ', 321904),
(9, 'baikal_mr_155.jpeg', 'BAIKAL MR155', 1, 'Ружье МР-155 Tactical в исполнении Русич (повышенного качества) от Ижевского механического завода представляет собой полуавтомат с газоотводной системой автоматики, в тактическом исполнении, предназначенный главным образом для охоты. ', 84468),
(10, 'baikal_mr_156.jpeg', 'BAIKAL MR156', 1, 'МР 156 12 калибра первое гладкоствольное самозарядное ружье с инерционной системой перезарядки производства Ижевского механического завода.', 54418),
(11, 'aselkon_ask_22.jpeg', 'ASELKON ASK22', 5, 'Двуствольное ружье с вертикальным расположением стволов и одним спусковым крючком, переломного типа, от турецкого производителя Aselkon, позиционируется производителем как спортивное, но может использоваться и для охоты.', 94500),
(12, 'baikal_mr_135.jpeg', 'BAIKAL MR135', 1, 'Гладкоствольное ружье МР-135 с ручной перезарядкой при помощи подвижного цевья (\"помповая\" перезарядка) является удобным и надежным оружием, подходящим для любых типов патронов, от \"легких\" спортивных и \"травматических\" патронов с резиновой картечью до мо', 46013),
(13, 'benelli_raffaello_lord.jpeg', 'BENELLI RAFFAELLO LORD', 4, 'Аристократичность, точная геометрия и неповторимый стиль – первое впечатление при взгляде на охотничье ружье Benelli Raffaello.', 276000),
(14, 'benelli_montefeltro_mygra.jpeg', 'BENELLI MONTEFELTRO MYGRA', 4, 'Лёгкое, надежное и быстрое, это ружьё создано поражать цель с первого выстрела. ', 345276),
(15, 'ata_arms_neo_12.jpeg', 'ATA ARMS NEO 12', 3, 'ATA ARMS NEO – это инерционный полуавтомат, разработанный с использованием новейших технологий.', 129990),
(16, 'huglu_103_de.jpeg', 'HUGLU 103 DE', 2, ' Представляет собой двуствольное ружье переломного типа, с вертикальным расположением стволов и одинарным спусковым крючком', 77940),
(17, 'aselkon_x3.jpeg', 'ASELKON X3', 5, 'Фирменные усовершенствования сверхнадежного «плавающего затвора» Бруно Чиволани гарантируют, что ружья Aselkon способны быстро перезаряжать патроны даже с самым легким зарядом 12 калибра.', 38500),
(18, 'baikal_mr_133.jpeg', 'BAIKAL MR133', 1, 'Baikal МР 133 – самое популярное отечественное помповое ружье. ', 15800),
(19, 'huglu_veyron.jpeg', 'HUGLU VEYRON', 2, 'Полуавтоматическое ружьё с газоотводной системой перезарядки. Алюминиевое основание УСМ. Предохранитель спереди под указательный палец. Более быстрый усовершенствованный газовый поршень, который меньше загрязняется.', 57330),
(20, 'aselkon_x4.jpeg', 'ASELKON X4', 5, 'Самозарядное ружье марки X4 от турецкого производителя Aselkon - полуавтоматическая модель калибра 12x76 мм, с инерционной системой перезарядки.', 52000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_1` (`id_brand`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `weapons`
--
ALTER TABLE `weapons`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
