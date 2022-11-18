-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 172.17.0.1:3306
-- Čas generovania: Št 17.Nov 2022, 16:54
-- Verzia serveru: 10.3.36-MariaDB-1:10.3.36+maria~ubu2004-log
-- Verzia PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `marpal_db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` int(11) NOT NULL,
  `token` text COLLATE utf8mb4_bin NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Sťahujem dáta pre tabuľku `access_tokens`
--

INSERT INTO `access_tokens` (`id`, `token`, `is_active`, `date_created`) VALUES
(6, 'EAAGMo02DhvYBABknjrJ1pT5md5Na7D7c9DhECuFIZBXh9AHfvH7ExmeW84ufqKIZAG5iMxYaQHjMmdN14n6ZCMylRZBQjH84pbMEQnZB99gnFQ6LnL2nVlZAMFv9aDbQ4xEUUQPkDbWZCyC77GHQjERpgODBTcM4zurRgx1ogTV7wVd6l3qZCs6A', 0, '2022-01-15'),
(7, 'EAAGMo02DhvYBAHNrui624EVRFXrD85iufFaHESUEkTwGznvxgGWef3d7ZCvAlnaK1TkZA5kx6aAADjvZAjTXlHcKqrkyAOEn5ZAdnjvxJxky3HxcR2JeFCxMaMiZCmJvShw8mEWWNZAviCJbgsaxdobnI2SGIiwHPEx7qUsZBdilxOCipVVczqQ', 0, '2022-01-29'),
(8, 'EAAGMo02DhvYBAJHEQ0ZBezKp3tKElVirAxsu2CqMwQkx6bfPBPdJoNzexjqBFqFAcGqArgL3j0ZCfgYk8tXmLzCWnFieY7WhOzl4kobgFCGFZBILNqdZB9F2T1X69hhGeNFji8WEWEG3VII0asVwjG5rYsp4X0jboJ43dzh2rOSX8M66Ya37', 0, '2022-01-29'),
(9, 'EAAGMo02DhvYBAH4wH0lBZBwmpT9a2WZCQliSLi02xFGP3YJIPwwg1fDJRc9V6o2GSGZBw8Pbh8ZBfZCRwZA2mkZAZAwgyCasz9BDejMny5ykSwLvIZBRWS08YSon59e9B2iBYoSCO9no40ANHZBVZBGjtaI0ZAcjqACjLZAsjILdwdFbrNGG5anrosmkM', 0, '2022-01-29'),
(10, 'EAAGMo02DhvYBAKThNpgW4jSSZBfgLlSqlh2yfXrjNQ2r7XYejbdhPQeQisAXa2BqfJwGXqBFFtyMIu1TZAP1jrHaRFbJuAWbk3GZAozUxGQBoDlGNXOTtzks55QoQedRjZCLi5TKswhTWTZCGqNJ7h8DzqHtNFZAwO6dPvK5TLb9IBCZBX2XYkI', 0, '2022-02-15'),
(11, 'EAAGMo02DhvYBAPTZBxKuOB5fmYLcKG8zx9nIOUlCwUA8NwnatQMgpMFR6EM9eOWHRqNeiQDAIlf8BkU6yTvDfIx02b346VHJAbNVNRokegEtcMP0OHCYMPutTK7KXmzjF1WlMeuAvGxIceL7s3CHZAodylVPyghZCBWR8MtBY1E34GJZBcoz', 1, '2022-03-15');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `last_login`) VALUES
(1, 'admin', 'marecek9', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kontaktne_info`
--

CREATE TABLE `kontaktne_info` (
  `id` int(11) NOT NULL,
  `typ` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `hodnota` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Sťahujem dáta pre tabuľku `kontaktne_info`
--

INSERT INTO `kontaktne_info` (`id`, `typ`, `hodnota`) VALUES
(1, 'sidlo', 'Športová 3151, 02401 KNM'),
(2, 'korAdresa', 'Štúrová 1211/63 02404 KNM'),
(3, 'iban', 'SK66 1100 0000 0029 2888 9969'),
(4, 'konatel', 'Pavol Kubala'),
(5, 'ico', '46947035'),
(6, 'icdph', 'SK20236669791');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `obrazky_prispevkov`
--

CREATE TABLE `obrazky_prispevkov` (
  `id` int(11) NOT NULL,
  `id_prispevok` int(11) NOT NULL,
  `cesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `obrazky_prispevkov`
--

INSERT INTO `obrazky_prispevkov` (`id`, `id_prispevok`, `cesta`) VALUES
(53, 59, 'obr0.jpg'),
(54, 59, 'obr1.jpg'),
(55, 59, 'obr2.jpg'),
(56, 59, 'obr3.jpg'),
(57, 60, 'obr0.jpg'),
(58, 60, 'obr1.jpg'),
(59, 60, 'obr2.jpg'),
(60, 60, 'obr3.jpg'),
(61, 61, 'obr0.jpg'),
(62, 61, 'obr1.jpg'),
(63, 61, 'obr2.jpg'),
(64, 61, 'obr3.jpg'),
(65, 61, 'obr4.jpg'),
(66, 61, 'obr5.jpg'),
(67, 62, 'obr0.jpg'),
(68, 62, 'obr1.jpg'),
(69, 62, 'obr2.jpg'),
(70, 62, 'obr3.jpg'),
(71, 62, 'obr4.jpg'),
(72, 62, 'obr5.jpg'),
(73, 63, 'obr0.jpg'),
(74, 63, 'obr1.jpg'),
(75, 63, 'obr2.jpg'),
(76, 63, 'obr3.jpg'),
(77, 63, 'obr4.jpg'),
(78, 63, 'obr5.jpg'),
(79, 63, 'obr6.png'),
(80, 64, 'obr0.jpg'),
(81, 64, 'obr1.jpg'),
(82, 64, 'obr2.jpg'),
(83, 64, 'obr3.jpg'),
(84, 64, 'obr4.jpg'),
(85, 64, 'obr5.jpg'),
(86, 64, 'obr6.png'),
(87, 65, 'obr0.png'),
(88, 65, 'obr1.jpg'),
(89, 65, 'obr2.jpg'),
(90, 65, 'obr3.jpg'),
(91, 65, 'obr4.jpg'),
(92, 65, 'obr5.jpg'),
(93, 66, 'obr0.png'),
(94, 66, 'obr1.jpg'),
(95, 66, 'obr2.jpg'),
(96, 66, 'obr3.jpg'),
(97, 66, 'obr4.jpg'),
(98, 66, 'obr5.jpg'),
(99, 67, 'obr0.jpg'),
(100, 67, 'obr1.jpg'),
(101, 67, 'obr2.jpg'),
(102, 67, 'obr3.jpg'),
(103, 67, 'obr4.jpg'),
(104, 68, 'obr0.jpg'),
(105, 68, 'obr1.jpg'),
(106, 68, 'obr2.jpg'),
(107, 71, 'obr0.jpg'),
(108, 72, 'obr0.jpg'),
(109, 73, 'obr0.jpg'),
(110, 73, 'obr1.jpg'),
(111, 73, 'obr2.jpg'),
(112, 73, 'obr3.jpg'),
(113, 73, 'obr4.jpg'),
(114, 73, 'obr5.jpg'),
(115, 81, 'obr0.jpg'),
(116, 81, 'obr1.jpg'),
(117, 81, 'obr2.jpg'),
(118, 81, 'obr3.jpg'),
(119, 81, 'obr4.jpg');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `page_data`
--

CREATE TABLE `page_data` (
  `id` int(11) NOT NULL,
  `page` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Sťahujem dáta pre tabuľku `page_data`
--

INSERT INTO `page_data` (`id`, `page`, `title`, `description`) VALUES
(1, 'domov', 'Marpal.eu • Domov', 'Firma sa zameriava na vrty pre tepelné čerpadlá, geologické, prieskumné odvodňovacie a stavebné vrty. Taktiež ponúka všetky druhy stavebných a výkopových prác.'),
(2, 'galeria', 'Marpal.eu • Galéria', 'Galéria našich prác a projektov. Galériu sa snažíme pravidelne aktualizovať.'),
(3, 'hydraulicka-ruka', 'Marpal.eu • Práce s hydraulickou rukou', 'Pracujeme s hydraulickou rukou, plošinou alebo špeciálnym košom, ktorý si poradí s presunom nákladu alebo zeminy.'),
(4, 'kontakt', 'Marpal.eu • Kontakt', 'Ak máte záujem o niektorú z našich služieb, neváhajte využiť náš kontaktný formulár a napíšte nám správu.'),
(5, 'referencie', 'Marpal.eu • Referencie', 'Keďže firma napreduje najmä vďaka referenciám a ďalšiemu odporúčaniu spokojných klientov, dávame si preto záležať na poctivo vykonanej práci.'),
(6, 'stavebne-prace', 'Marpal.eu • Stavebné práce', 'Stavba rodinných domov na kľúč • Rekonštrukcia a modernizácia budov • Realizácia všetkých typov stavieb • HSV a PSV'),
(7, 'vozovy-park', 'Marpal.eu • Vozový park', 'Naša firma má k dispozícii najmodernejšiu techniku vyrábanú poprednými svetovými výrobcami a ovládanú profesionálnymi pracovníkmi.'),
(8, 'vrtne-prace', 'Marpal.eu • Vrtné práce', 'Ponúkame realizáciu stavebných a geologických vrtov. Stavebné vrty sú s nami možné až do hĺbky 22m a priemeru 900 mm. Geologické vrty vŕtame do 500m (štandardný priemer 219mm).\r\n\r\n'),
(9, 'zemne-vykopove-prace', 'Marpal.eu • Zemné a výkopové práce', 'Naša spoločnosť sa zameriava najmä na výkopy základov rodinných domov, vodovodné, plynové a kanalizačné prípojky alebo výkopy pre oplotenie a oporné múry.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `prispevky`
--

CREATE TABLE `prispevky` (
  `id` int(11) NOT NULL,
  `typ` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `datum_pridania` datetime NOT NULL,
  `ciel_pridania` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nadpis` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `popis` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `koncovka_nahladu` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `fb_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Sťahujem dáta pre tabuľku `prispevky`
--

INSERT INTO `prispevky` (`id`, `typ`, `datum_pridania`, `ciel_pridania`, `nadpis`, `popis`, `koncovka_nahladu`, `fb_post_id`) VALUES
(62, 'galeria', '2022-01-31 08:33:47', 'fb,web', 'Práce s hydraulickou rukou', '', 'jpg', 0),
(64, 'galeria', '2022-01-31 08:56:45', 'fb,web', 'Vrtné práce', 'UmVhbGl6w6FjaWEgdmlhY2Vyw71jaCB2cnRvdiDinJTvuI8NCg0KDQrFoGlyxaFpdSDFoWvDoWx1IG5hxaFpY2ggcHLDoWMgc2kgbcO0xb5ldGUgcG96cmllxaUgbmEgbmHFoWVqIHdlYm92ZWogc3Ryw6Fua2UNCg0KaHR0cHM6Ly9tYXJwYWwuZXUvDQoNCg0K4oCiDQoNCuKAog0KDQrigKINCg0KI21hcnBhbCAjdnJ0YW5pZXN0dWRuaSAjdnJ0bmVwcmFjZSAjc3RhdmVibmVwcmFjZSAjc3R1ZG5hbmFrbHVjICN6ZW1uZXByYWNlICN2eWtvcG92ZXByYWNlICNzdGF2YmFyb2Rpbm55Y2hkb21vdg0K', 'jpg', 0),
(65, 'galeria', '2022-01-31 09:04:33', 'fb,web', 'Výkopové práce', 'WmVtbsOpIGEgdsO9a29wb3bDqSBwcsOhY2Ug8J+Sr/CfkpkNCg0KDQpBayBtw6F0ZSB6w6F1amVtIG8gbmlla3RvcsO6IHogbmHFoWljaCBzbHXFvmllYiwgbmV2w6FoYWp0ZSB2eXXFvmnFpSBrb250YWt0bsO9IGZvcm11bMOhciBuYSBuYcWhZWogc3Ryw6Fua2UNCg0KaHR0cHM6Ly9tYXJwYWwuZXUva29udGFrdA0KDQrigKINCuKAog0K4oCiDQojbWFycGFsICN2cnRhbmllc3R1ZG5pICN2cnRuZXByYWNlICNzdGF2ZWJuZXByYWNlICNzdHVkbmFuYWtsdWMgI3plbW5lcHJhY2UgI3Z5a29wb3ZlcHJhY2UgI3N0YXZiYXJvZGlubnljaGRvbW92DQo=', 'jpg', 0),
(67, 'galeria', '2022-01-31 09:13:40', 'fb,web', 'Stavebné práce', 'U3RhdmVibsOpIHByw6FjZSDwn4+gDQpBayB2w6FzIG5hxaFhIHByw6FjYSBvc2xvdmlsYSwgbmV2w6FoYWp0ZSB2eXXFvmnFpSBrb250YWt0bsO9IGZvcm11bMOhciBuYSBuYcWhZWogc3Ryw6Fua2UNCmh0dHBzOi8vbWFycGFsLmV1L2tvbnRha3QNCg0K4oCiDQrigKINCuKAog0KI21hcnBhbCAjdnJ0YW5pZXN0dWRuaSAjdnJ0bmVwcmFjZSAjc3RhdmVibmVwcmFjZSAjc3R1ZG5hbmFrbHVjICN6ZW1uZXByYWNlICN2eWtvcG92ZXByYWNlICNzdGF2YmFyb2Rpbm55Y2hkb21vdg0K', 'jpg', 0),
(68, 'galeria', '2022-02-02 09:34:03', 'fb,web', 'Zlý deň :(', 'WmzDvSBkZcWIIPCfmJYNCg0KTmllIGthxb5kw70gZGXFiCBqZSBuZWRlxL5hLi4uDQoNCuKAog0K4oCiDQrigKINCiNtYXJwYWwgI3ZydGFuaWVzdHVkbmkgI3ZydG5lcHJhY2UgI3N0YXZlYm5lcHJhY2UgI3N0dWRuYW5ha2x1YyAjemVtbmVwcmFjZSAjdnlrb3BvdmVwcmFjZSAjc3RhdmJhcm9kaW5ueWNoZG9tb3YNCg==', 'jpg', 0),
(73, 'galeria', '2022-02-02 09:42:13', 'web', 'Rôzne', '', 'jpg', 0),
(80, 'medium', '2022-02-02 10:00:24', 'fb,web', 'Ľudia ľudom', 'xL11ZGlhIMS+dcSPb20g8J+SmQ0KDQoNCuKAog0K4oCiDQrigKINCiNtYXJwYWwgI3ZydGFuaWVzdHVkbmkgI3ZydG5lcHJhY2UgI3N0YXZlYm5lcHJhY2UgI3N0dWRuYW5ha2x1YyAjemVtbmVwcmFjZSAjdnlrb3BvdmVwcmFjZSAjc3RhdmJhcm9kaW5ueWNoZG9tb3YNCg==', 'jpg', 2147483647),
(81, 'galeria', '2022-02-02 10:05:31', 'fb,web', 'Vrtná súprava v malom priestore', 'UHJlamF6ZCB2cnRuZWogc8O6cHJhdnkgdiBtYWxvbSBwcmllc3RvcmUuIFbDvXp2eSBwcmUgbsOhcyBuZWV4aXN0dWrDuiDwn5Kv8J+SmQ0KDQoNCuKAog0K4oCiDQrigKINCiNtYXJwYWwgI3ZydGFuaWVzdHVkbmkgI3ZydG5lcHJhY2UgI3N0YXZlYm5lcHJhY2UgI3N0dWRuYW5ha2x1YyAjemVtbmVwcmFjZSAjdnlrb3BvdmVwcmFjZSAjc3RhdmJhcm9kaW5ueWNoZG9tb3YNCg==', 'jpg', 0),
(82, 'medium', '2022-02-02 10:10:11', 'fb,web', 'Veľkopriem. vrtná súprava Tescar CF3', 'TmHFoWEgdmXEvmtvcHJpZW1lcm92w6EgdnJ0bsOhIHPDunByYXZhIFRlc2NhciBDRjMg8J+Yjg0KDQpBayB2w6FzIG5hxaFhIHByw6FjYSBvc2xvdmlsYSwgbmV2w6FoYWp0ZSB2eXXFvmnFpSBrb250YWt0bsO9IGZvcm11bMOhciBuYSBuYcWhZWogc3Ryw6Fua2UNCg0KaHR0cHM6Ly9tYXJwYWwuZXUva29udGFrdA0KDQrigKINCuKAog0K4oCiDQojbWFycGFsICN2cnRhbmllc3R1ZG5pICN2cnRuZXByYWNlICNzdGF2ZWJuZXByYWNlICNzdHVkbmFuYWtsdWMgI3plbW5lcHJhY2UgI3Z5a29wb3ZlcHJhY2UgI3N0YXZiYXJvZGlubnljaGRvbW92DQo=', 'jpg', 2147483647),
(83, 'medium', '2022-02-02 10:13:40', 'fb,web', 'Comacchio 601 v akcii', 'VnJ0bsOhIHPDunByYXZhIENvbWFjY2hpbyA2MDEgdiBha2NpaSDwn6SpDQoNCg0KQWsgdsOhcyBuYcWhYSBwcsOhY2Egb3Nsb3ZpbGEsIG5ldsOhaGFqdGUgdnl1xb5pxaUga29udGFrdG7DvSBmb3JtdWzDoXIgbmEgbmHFoWVqIHN0csOhbmtlDQpodHRwczovL21hcnBhbC5ldS9rb250YWt0DQoNCuKAog0K4oCiDQrigKINCiNtYXJwYWwgI3ZydGFuaWVzdHVkbmkgI3ZydG5lcHJhY2UgI3N0YXZlYm5lcHJhY2UgI3N0dWRuYW5ha2x1YyAjemVtbmVwcmFjZSAjdnlrb3BvdmVwcmFjZSAjc3RhdmJhcm9kaW5ueWNoZG9tb3YNCg==', 'mp4', 2147483647),
(84, 'medium', '2022-02-02 11:37:32', 'fb,web', 'Výstavba betónového monolitu', 'VsO9c3RhdmJhIGJldMOzbm92w6lobyBtb25vbGl0dSDwn5qnDQoNClYgbmHFoW9tIHJlcGVydG/DoXJpIG5lY2jDvWJhIMW+aWFkZW4gdHlwIHN0YXZieS4gViBwcsOtcGFkZSB6w6F1am11IGFsZWJvIG90w6F6b2sgc2EgbsOhbSBvenZpdGUuIE9ka2F6IG5hIG5hxaF1IHdlYnN0csOhbmt1IGplIG5pxb7FoWllDQoNCmh0dHBzOi8vbWFycGFsLmV1L2tvbnRha3QNCg0K4oCiDQrigKINCuKAog0KI21hcnBhbCAjdnJ0YW5pZXN0dWRuaSAjdnJ0bmVwcmFjZSAjc3RhdmVibmVwcmFjZSAjc3R1ZG5hbmFrbHVjICN6ZW1uZXByYWNlICN2eWtvcG92ZXByYWNlICNzdGF2YmFyb2Rpbm55Y2hkb21vdg==', 'jpg', 2147483647);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `typy_prispevkov`
--

CREATE TABLE `typy_prispevkov` (
  `id` int(11) NOT NULL,
  `typ` varchar(30) NOT NULL,
  `farba` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `typy_prispevkov`
--

INSERT INTO `typy_prispevkov` (`id`, `typ`, `farba`) VALUES
(1, 'text', '#5a98ac'),
(2, 'galeria', '#ac5a5a'),
(4, 'medium', '#ac5a5a');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `vozovypark`
--

CREATE TABLE `vozovypark` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `is_hydraulicke` tinyint(1) NOT NULL,
  `popis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `vozovypark`
--

INSERT INTO `vozovypark` (`id`, `title`, `preview`, `is_hydraulicke`, `popis`) VALUES
(229, 'Iveco 6x6 valník', 'iveco-6x6-valnik-s-hydraulickou-rukou_02022022_075020.jpg', 1, 'S hydraulickou rukou'),
(230, 'Vrtná súprava comacchio 405', 'vrtna-suprava-comacchio-405_02022022_075138.jpg', 0, ''),
(231, 'Iveco sklápač 6 x 6 board matic', 'iveco-sklapac-6-x-6-board-matic_02022022_075201.jpg', 0, ''),
(232, 'Hákový nosič kontajnerov 6x6', 'hakovy-nosic-kontajnerov-6x6-s-hr-a-drapakom_02022022_075254.jpg', 1, 'S hydraulickou rukou a drapákom'),
(233, 'Otočné pásové rýpadlo 15t takeuchi 1140', 'otocne-pasove-rypadlo-15t-takeuchi-1140_02022022_075337.jpg', 0, ''),
(234, 'Sprievodné vozidlo Mercedes Vito 4x4', 'sprievodne-vozidlo-mercedes-vito-4x4_02022022_075429.jpg', 0, ''),
(235, 'Kolesový dumper sklápač', 'kolesovy-dumper-trojstranny-sklapac-6t_02022022_075532.jpg', 0, 'Trojstránný, do 6 ton'),
(236, 'Rýpadlo nakladač CAT432F2', 'rypadlo-nakladac-cat432f2_02022022_075636.jpg', 0, ''),
(237, 'Dozer komatsu 65 ex', 'dozer-komatsu-65-ex-vaha-24t_02022022_075715.jpg', 0, 'Váha 24 ton'),
(238, 'Vrtná súprava Tescar CF 3', 'velkopriemer-vrtna-suprava-tescar-cf-3_02022022_080045.jpg', 0, 'Veľkopriemerová'),
(239, 'Vrtná súprava Wirth B1', 'malopriemer-vrtna-suprava-wirth-b1-do-300mm_02022022_080212.jpg', 0, 'Málopriemerová (do 300mm)'),
(240, 'Otočné rýpadlo takeuchi 80ha 8t', 'otocne-rypadlo-takeuchi-80ha-8t_02022022_080257.jpg', 0, ''),
(241, 'Pojazdná dielňa Ford Transit 4x4 (2ks)', 'pojazdna-dielna-ford-transit-4x4-2ks_02022022_080646.jpg', 0, ''),
(242, 'Spriev. vozidlo Toyota HILUX 4x4 (2ks)', 'spriev-vozidlo-toyota-hilux-4x4-2ks_02022022_080724.jpg', 0, ''),
(243, 'Pásový dumper 1t', 'pasovy-dumper-1t_02022022_080754.jpg', 0, ''),
(245, 'Rýpadlo nakladač Caterpillar 432f 2', 'rypadlo-nakladac-caterpillar-432f2_02022022_080940.jpg', 0, ''),
(246, 'Otočné rýpadlo takeuchi FR 138', 'otocne-rypadlo-takeuchi-fr-138_02022022_081103.jpg', 0, 'S komplet príslušenstvom ako zbíjacie kladivo, vŕtacie zariadenie, 30 40 50 70 90 120 lyžice'),
(247, 'Dvojstranný sklápač Iveco 6x6', 'dvojstranny-sklapac-iveco-6x6-s-hr_02022022_081725.jpg', 1, 'S hydraulickou rukou'),
(249, 'Šmykom riadený nakladač GEHL', 'smykom-riadeny-nakladac-gehl_02022022_102330.jpg', 0, 'Výkon 52KW, dokáže poháňať lesnú frézu, paletizačné vidly, plochá lyžica aj lyžica na zimnú údržbu'),
(250, 'Pásové otočné rýpadlo takeuchi 280s', 'pasove-otocne-rypadlo-takeuchi-280s_02022022_102821.jpg', 0, 'S lyžicami 30 40 50 60 70 90 120 140, s vŕtacím zariadením, zbíjacím kladivom, hydraulickým rýchloupínakom'),
(251, 'Pásová vrtná súprava Comacchio', 'pasova-vrtna-suprava-comacchio_02022022_103715.jpg', 0, 'S gumeným podvozkom rozmer od 160 do 230 cm šírky s výškou 245 cm, vŕta priemery od 89 do 325m, maximálna možná hĺbka podľa výrobcu 700 m'),
(252, 'Pásová vrtná súprava Fraste XL', 'pasova-vrtna-suprava-fraste-xl_02022022_104455.jpg', 0, 'Na gumených pásoch, šírka 2,1m  váha 8,5t, vŕtanie priemerov od 56 do 280 mm hĺbka 320m');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `kontaktne_info`
--
ALTER TABLE `kontaktne_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `obrazky_prispevkov`
--
ALTER TABLE `obrazky_prispevkov`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `page_data`
--
ALTER TABLE `page_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `prispevky`
--
ALTER TABLE `prispevky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `typy_prispevkov`
--
ALTER TABLE `typy_prispevkov`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `vozovypark`
--
ALTER TABLE `vozovypark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `kontaktne_info`
--
ALTER TABLE `kontaktne_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `obrazky_prispevkov`
--
ALTER TABLE `obrazky_prispevkov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pre tabuľku `page_data`
--
ALTER TABLE `page_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `prispevky`
--
ALTER TABLE `prispevky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pre tabuľku `typy_prispevkov`
--
ALTER TABLE `typy_prispevkov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `vozovypark`
--
ALTER TABLE `vozovypark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
