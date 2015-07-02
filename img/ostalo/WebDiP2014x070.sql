-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 19 2015 г., 04:54
-- Версия сервера: 5.0.51
-- Версия PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `WebDiP2014x070`
--

-- --------------------------------------------------------

--
-- Структура таблицы `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL auto_increment,
  `korime` varchar(50) NOT NULL,
  `url_slika` varchar(40) NOT NULL,
  `ime` varchar(45) default NULL,
  `prezime` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `lozinka` varchar(20) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `zupanija` varchar(90) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `spol` varchar(1) NOT NULL,
  `datum_registracije` timestamp NULL default CURRENT_TIMESTAMP,
  `datum_zadnjeg_pristupa` timestamp NULL default NULL,
  `tip_korisnika_id` int(11) NOT NULL,
  `aktivacijski_kod` varchar(36) NOT NULL,
  `status_korisnika_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_id`),
  KEY `fk_korisnik_status_korisnika1_idx` (`status_korisnika_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `korisnik`
--

INSERT INTO `korisnik` (`id`, `korime`, `url_slika`, `ime`, `prezime`, `email`, `lozinka`, `grad`, `zupanija`, `datum_rodjenja`, `spol`, `datum_registracije`, `datum_zadnjeg_pristupa`, `tip_korisnika_id`, `aktivacijski_kod`, `status_korisnika_id`) VALUES
(1, 'bell2', 'img/usrpic_bell2.jpg', 'Stringer', 'Bell', 'bell123@sharklasers.com', 'Admin123', 'Zagreb', 'Grad Zagreb', '1980-11-01', 'm', '2015-03-11 00:00:00', '2015-06-03 12:30:01', 1, '', 1),
(24, 'adminfoi', 'img/no_pic.jpg', 'Admin', 'Adminovski', 'administratorfoihr@guerrillamail.biz', 'admin_hd6t', 'Varazdin', 'Vukovarsko-srijemska', '1900-06-03', 'm', '2015-05-06 22:21:11', '2015-06-19 04:49:30', 3, '', 1),
(29, 'dvertovszd', 'img/no_pic.jpg', 'Darijan', 'VertovÅ¡ek', 'dare22@sharklasers.com', 'ASDFGh3', 'Zadar', 'Zadarska', '1993-09-09', 'm', '2015-05-30 14:59:36', '2015-06-19 03:22:51', 2, 'aAo8wiPx5RQhPcKzg_lBc7c3_OpjxBcX7FX', 1),
(37, 'gonzaga', 'img/usrpic_gonzaga.png', 'Gabriel', 'Gonzaga', 'gonzaga@spam4.me', 'gonzagA2', 'OmiÅ¡', 'Splitsko-dalmatinska', '1989-08-07', 'm', '2015-06-03 11:10:17', '2015-06-11 10:36:18', 1, 'lrdge9efbpzIBckYoJBTdpOTYBAQU?JRttz', 1),
(38, 'officialdanawhite', 'img/officialdanawhite.jpg', 'Dana', 'White', 'danawhiteofficial@sharklasers.com', 'antimo44R', 'Nin', 'Zadarska', '1976-02-01', 'm', '2015-06-17 10:45:27', '2015-06-18 21:56:24', 2, 'hM5rSU927Uo8P2_nFijnLZad4OZFE4GglX7', 1),
(39, 'tinakatanic', 'img/tinakatanic.jpg', 'Tina', 'Katanic', 'tinakatanic@spam4.me', 'tina123D', 'Zagreb', 'Grad Zagreb', '1981-06-19', 'z', '2015-06-18 06:34:19', '2015-06-19 03:18:54', 1, 'iesAEIC10SwuoBcT58GJgYn3RspGRinEiCA', 1),
(41, 'nikolijabg', 'img/nikolijabg.JPG', 'Nikolija', 'Jovanovic', 'nikolijabg@guerrillamail.biz', 'nikolija123D', 'Beograd', 'Splitsko-dalmatinska', '1981-04-04', 'z', '2015-06-18 07:49:30', NULL, 1, 'yovF1uYvNKWOggiSw5lAdkupi9w3xKvbHhp', 1),
(42, 'katarinagrujic', 'img/katarinagrujic.jpg', 'Katarina', 'Grujic', 'kacagrujic@spam4.me', 'kaca123D', 'NiÅ¡', 'Splitsko-dalmatinska', '1992-06-11', 'z', '2015-06-18 22:06:51', '2015-06-18 22:13:22', 1, 'qb4CTPiGUtozFuV64zbjymKEFi5GRyJeBcb', 1),
(43, 'lpalaic', 'img/no_pic.jpg', 'Leon', 'Palaica', 'lpalaic@spam4.me', 'lpalaicDF2', 'Sisak', 'SisaÄko-moslavaÄka', '1993-06-02', 'm', '2015-06-18 23:04:13', NULL, 1, 'KX50e4zNbVa2AbpyKFHQpeJ76BBjLs_m8Gq', 1),
(44, 'usmarines', 'img/no_pic.jpg', 'Us', 'MarinesOfficial', 'usmarines@spam4.me', 'usMAR23', 'Zadar', 'Grad Zagreb', '2015-06-10', 'm', '2015-06-18 23:06:41', NULL, 1, 'ZKbSklU_LJoDPBM7RaT6sBcLY1uz7eWld46', 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_status_korisnika1` FOREIGN KEY (`status_korisnika_id`) REFERENCES `status_korisnika` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
