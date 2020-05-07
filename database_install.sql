-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 07 2020 г., 11:49
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tasks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(320) NOT NULL,
  `TEXT` text NOT NULL,
  `STATUS` set('В работе','Завершена','','') NOT NULL,
  `LAST_CHANGE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CREATED` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`ID`, `NAME`, `EMAIL`, `TEXT`, `STATUS`, `LAST_CHANGE`, `CREATED`) VALUES
(1, 'Роман', 'admin@ruplex.net', 'Проверяем задачу', 'В работе', '2020-05-07 05:00:00', '2020-05-07 08:00:00'),
(2, 'Поддержка', 'support@ruplex.net', 'Проверяем задачу ', 'Завершена', '2020-05-07 05:00:00', '2020-05-07 08:00:00'),
(3, 'Денис', 'denis@ruplex.net', 'Проверяем задачу', 'В работе', '2020-05-07 05:00:00', '2020-05-07 08:00:00'),
(5, 'Александр', 'sdfsdf@dsfsdf.sd', 'Тут текст', 'Завершена', '2020-05-07 03:15:40', '2020-05-07 07:15:40'),
(7, 'XSS', 'xss@guard.ru', 'test xss@guard.ru', 'Завершена', '2020-05-07 06:11:44', '2020-05-07 07:24:31'),
(8, 'XSS', 'xss@guard.ru', '&lt;script&gt;alert(''xss not workings'');&lt;/script&gt;', 'В работе', '2020-05-07 05:16:12', '2020-05-07 07:25:36'),
(9, 'проверка 1', 'check@mail.ru', 'Проверка', 'В работе', '2020-05-07 05:20:07', '2020-05-07 09:20:07'),
(10, 'Тест', 'test@test.ru', 'XSS NOT', 'Завершена', '2020-05-07 05:20:35', '2020-05-07 09:20:35'),
(11, 'Олег', 'oleg@ruplex.net', 'dsaa asdasd', 'В работе', '2020-05-07 05:21:10', '2020-05-07 09:21:10'),
(12, 'asd', 'asd@sad.asd', 'sad asdasd asd', 'В работе', '2020-05-07 05:21:33', '2020-05-07 09:21:33'),
(13, 'Филе', 'file@yandex.ru', 'sadasd sad', 'В работе', '2020-05-07 05:22:03', '2020-05-07 09:22:03'),
(14, 'Амур', 'amur@asdsa.sd', 'sad asd asfg', 'В работе', '2020-05-07 05:22:30', '2020-05-07 09:22:30'),
(15, 'dsfdf', 'sdfsdf@das.asd', 'asdas asdasd', 'В работе', '2020-05-07 05:22:53', '2020-05-07 09:22:53'),
(16, 'gdsdas', 'sdfsdf@sadsad.asd', 'dsg dhj fd hd', 'В работе', '2020-05-07 05:23:12', '2020-05-07 09:23:12'),
(17, 'Артём', 'artem@dfsds.dsf', 'sasda sda sd', 'В работе', '2020-05-07 05:23:39', '2020-05-07 09:23:39'),
(18, 'fghfgh', 'sdfsdf@dfsdf.sdf', 'sdfsdf sdf sdfsd', 'В работе', '2020-05-07 05:23:57', '2020-05-07 09:23:57'),
(19, 'xss', 'xss@xss.xss', 'adsa asd aasd', 'В работе', '2020-05-07 05:24:32', '2020-05-07 09:24:32'),
(20, 'Тест 3', 'test@sad.asd', '&lt;script&gt;alert();&lt;/script&gt;', 'В работе', '2020-05-07 05:25:11', '2020-05-07 09:25:11'),
(21, 'sdf', 'fgdgfd@dsf.sdf', 'dsf sdfsdfsdf', 'В работе', '2020-05-07 05:25:34', '2020-05-07 09:25:34'),
(22, 'dfg', 'asd@dfsdf.dsf', 'sdfsdf sdf sfd', 'Завершена', '2020-05-07 05:25:55', '2020-05-07 09:25:55'),
(23, 'check', 'dfsdf@dsf.sdf', 'dsf sdf sdf sdf', 'В работе', '2020-05-07 05:26:15', '2020-05-07 09:26:15'),
(24, 'fgvcb', 'fdgf@dsf.dsf', 'hgfh ghd f', 'Завершена', '2020-05-07 05:26:35', '2020-05-07 09:26:35'),
(25, 'Виктор', 'viktor@osvobodiel.ru', 'fdg dfgdfg', 'В работе', '2020-05-07 05:27:04', '2020-05-07 09:27:04'),
(26, 'hgdf', 'fdg@asd.asd', 'fdsdf sdfsd fsdf', 'В работе', '2020-05-07 05:27:22', '2020-05-07 09:27:22'),
(27, 'Андрей', 'andrei@sadasd.asd', 'asd asd asddsa', 'В работе', '2020-05-07 05:27:47', '2020-05-07 09:27:47'),
(28, 'bcx', 'asd@dfsdg.sdg', 'sdgsd dgssdg', 'Завершена', '2020-05-07 06:38:49', '2020-05-07 09:28:20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(15) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`,`LOGIN`),
  KEY `ID_2` (`ID`,`LOGIN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
