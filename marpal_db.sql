-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 17.Jan 2023, 22:40
-- Verzia serveru: 10.4.21-MariaDB
-- Verzia PHP: 8.0.11

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
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `last_login`) VALUES
(2, 'admin', '$2y$10$K6uDXMBGCxhKsjPQ2SkTzOujd/a7JZ/XZ5gxNZE67sowPVH452GSy', NULL);

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
(1, 'sidlo', 'Športová 3151, 02401KNM'),
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
(119, 81, 'obr4.jpg'),
(120, 88, 'obr0.jpg'),
(121, 90, 'obr0.png'),
(122, 90, 'obr1.png'),
(123, 90, 'obr2.png'),
(124, 90, 'obr3.png'),
(125, 90, 'obr4.png'),
(126, 90, 'obr5.jpg'),
(127, 90, 'obr6.png'),
(128, 90, 'obr7.png'),
(129, 90, 'obr8.jpg'),
(130, 91, 'obr0.png'),
(131, 91, 'obr1.png'),
(132, 91, 'obr2.png'),
(133, 91, 'obr3.png'),
(134, 91, 'obr4.png'),
(135, 91, 'obr5.jpg'),
(136, 91, 'obr6.png'),
(137, 91, 'obr7.png'),
(138, 91, 'obr8.jpg'),
(142, 97, 'obr0.jpg'),
(143, 97, 'obr1.jpg');

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
(90, 'text', '2022-11-18 13:47:31', 'web', 'Test3', 'cG9waQ==', 'jpg', 0),
(94, 'text', '2023-01-17 18:36:39', 'web', 'Tesr', 'dHN0Zw==', '', 0),
(97, 'galeria', '2023-01-17 19:03:15', 'web', 'v', 'dnZ2dnZ2dw==', 'jpg', 0);

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
(254, 'test2', 'test2_17012023_163957.jpg', 1, 'popisok'),
(257, 'test', 'test_17012023_203810.jpg', 0, 'feerr');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `kontaktne_info`
--
ALTER TABLE `kontaktne_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `obrazky_prispevkov`
--
ALTER TABLE `obrazky_prispevkov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT pre tabuľku `page_data`
--
ALTER TABLE `page_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `prispevky`
--
ALTER TABLE `prispevky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pre tabuľku `vozovypark`
--
ALTER TABLE `vozovypark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
